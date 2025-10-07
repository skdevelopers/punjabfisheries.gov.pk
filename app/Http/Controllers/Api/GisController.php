<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Services\KmlToGeoJsonService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * GIS API (JSONB geometry; no PostGIS)
 *
 * Endpoints:
 *  GET  /api/gis/places       → FeatureCollection (optional ?type=&status=&limit=&bbox=)
 *  GET  /api/gis/search       → FeatureCollection (q on published)
 *  POST /api/gis/bulk-upsert  → Upsert Feature[]
 *  POST /api/gis/import-kml   → Upload KML/KMZ/GeoJSON; store as draft Feature[]
 */
class GisController extends Controller
{
    /** @var string[] */
    private const TYPES = ['hatchery','farm','office'];

    /**
     * GET /api/gis/places
     * @param  Request $request
     * @return JsonResponse GeoJSON FeatureCollection
     *
     * Query:
     *  - type=all|hatchery|farm|office
     *  - status=draft|published|archived (default: published)
     *  - limit=1..10000 (default 5000)
     *  - bbox=minLng,minLat,maxLng,maxLat (optional; uses centroid if present, else includes all)
     */
    public function places(Request $request): JsonResponse
    {
        $type   = strtolower($request->string('type', 'all')->toString());
        $status = strtolower($request->string('status', 'published')->toString());
        $limit  = (int) $request->integer('limit', 5000);
        $limit  = max(1, min(10000, $limit));

        $q = Place::query()
            ->with(['division:id,name','district:id,name','tehsil:id,name'])
            ->select([
                'id','name','type','division_id','district_id','tehsil_id',
                'owner','phone','status','geometry','properties',
                'centroid_lat','centroid_lng'
            ]);

        if (in_array($status, ['draft','published','archived'], true)) {
            $q->where('status',$status);
        }
        if ($type !== 'all' && in_array($type, self::TYPES, true)) {
            $q->where('type',$type);
        }

        // bbox filter (fast if centroid columns populated)
        if ($bbox = $request->string('bbox')->toString()) {
            $parts = array_map('floatval', explode(',', $bbox));
            if (count($parts) === 4) {
                [$minLng,$minLat,$maxLng,$maxLat] = $parts;
                $q->whereBetween('centroid_lat', [$minLat, $maxLat])
                    ->whereBetween('centroid_lng', [$minLng, $maxLng]);
            }
        }

        $rows = $q->limit($limit)->get();

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $rows->map(fn(Place $r) => $this->toFeature($r)),
        ]);
    }

    /**
     * GET /api/gis/search?q=term
     * Search within published places by name/type/district/tehsil.
     */
    public function search(Request $request): JsonResponse
    {
        $q = trim($request->string('q')->toString());
        if ($q === '') return $this->places($request);

        $rows = Place::query()
            ->published()
            ->with(['division:id,name','district:id,name','tehsil:id,name'])
            ->where(function($qq) use ($q) {
                $qq->where('name','ilike',"%{$q}%")
                    ->orWhere('type','ilike',"%{$q}%")
                    ->orWhereHas('district', fn($d) => $d->where('name','ilike',"%{$q}%"))
                    ->orWhereHas('tehsil',   fn($t) => $t->where('name','ilike',"%{$q}%"));
            })
            ->select(['id','name','type','division_id','district_id','tehsil_id',
                'owner','phone','status','geometry','properties',
                'centroid_lat','centroid_lng'])
            ->limit(2000)
            ->get();

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $rows->map(fn(Place $r) => $this->toFeature($r)),
        ]);
    }

    /**
     * POST /api/gis/bulk-upsert
     * Body: { "features": [ Feature, ... ] }
     */
    public function bulkUpsert(Request $request): JsonResponse
    {
        Validator::make($request->all(), [
            'features' => ['required','array','min:1'],
            'features.*.type' => ['required','in:Feature'],
            'features.*.geometry' => ['required','array'],
            'features.*.properties' => ['nullable','array'],
        ])->validate();

        $ids = [];
        DB::transaction(function () use ($request, &$ids) {
            foreach ($request->input('features', []) as $f) {
                $props = $f['properties'] ?? [];

                $name = trim((string)($props['name'] ?? 'Untitled'));
                $type = strtolower((string)($props['type'] ?? 'farm'));
                if (!in_array($type, self::TYPES, true)) $type = 'farm';

                $status = strtolower((string)($props['status'] ?? 'published'));
                if (!in_array($status, ['draft','published','archived'], true)) $status = 'published';

                $payload = [
                    'name'        => $name,
                    'type'        => $type,
                    'division_id' => $props['division_id'] ?? null,
                    'district_id' => $props['district_id'] ?? null,
                    'tehsil_id'   => $props['tehsil_id']   ?? null,
                    'owner'       => $props['owner']       ?? null,
                    'phone'       => $props['phone']       ?? null,
                    'status'      => $status,
                    'published_at'=> $status === 'published' ? now() : null,
                    'properties'  => $props,
                    'geometry'    => $f['geometry'],
                    'updated_at'  => now(),
                ];

                // update centroid
                [$clat, $clng] = $this->centroidFromGeometry($f['geometry']);
                $payload['centroid_lat'] = $clat;
                $payload['centroid_lng'] = $clng;

                $existingId = isset($props['id']) ? (int)$props['id'] : null;

                if ($existingId) {
                    DB::table('places')->where('id',$existingId)->update($payload);
                    $ids[] = $existingId;
                } else {
                    $payload['created_at'] = now();
                    $ids[] = (int) DB::table('places')->insertGetId($payload);
                }
            }
        });

        return response()->json(['ok'=>true,'ids'=>$ids]);
    }

    /**
     * POST /api/gis/import-kml
     * Accepts .kml/.kmz/.geojson; converts to GeoJSON Features, stores as DRAFT.
     */
    public function importKml(Request $request, KmlToGeoJsonService $svc): JsonResponse
    {
        $request->validate(['file' => ['required','file','mimes:kml,kmz,geojson,json']]);
        $path = $request->file('file')->store('kml_uploads');

        $geojson = $svc->convert(storage_path('app/'.$path));
        $features = [];

        foreach ($geojson['features'] as $f) {
            $props = $f['properties'] ?? [];
            $name  = trim((string)($props['name'] ?? 'Imported'));
            $type  = strtolower((string)($props['type'] ?? 'farm'));
            if (!in_array($type, self::TYPES, true)) $type = 'farm';

            [$clat, $clng] = $this->centroidFromGeometry($f['geometry']);

            $id = Place::query()->insertGetId([
                'name'        => $name,
                'type'        => $type,
                'status'      => 'draft',
                'geometry'    => $f['geometry'],
                'properties'  => $props,
                'centroid_lat'=> $clat,
                'centroid_lng'=> $clng,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);

            $f['properties']['id'] = $id;
            $features[] = $f;
        }

        return response()->json(['type'=>'FeatureCollection','features'=>$features]);
    }

    /** ---------- Helpers ---------- */

    /** @return array{type:string,geometry:array,properties:array} */
    private function toFeature(Place $r): array
    {
        return [
            'type'     => 'Feature',
            'geometry' => $r->geometry,
            'properties' => array_merge([
                'id'       => (int)$r->id,
                'name'     => $r->name,
                'type'     => $r->type,
                'division' => $r->division?->name,
                'district' => $r->district?->name,
                'tehsil'   => $r->tehsil?->name,
                'owner'    => $r->owner,
                'phone'    => $r->phone,
                'status'   => $r->status,
                'centroid' => ($r->centroid_lat && $r->centroid_lng) ? [$r->centroid_lng, $r->centroid_lat] : null,
            ], $r->properties ?? []),
        ];
    }

    /**
     * Compute a simple centroid from a GeoJSON geometry (Point/Polygon/MultiPolygon).
     * @param  array $geom
     * @return array{0:float|null,1:float|null} [lat,lng] or [null,null]
     */
    private function centroidFromGeometry(array $geom): array
    {
        try {
            if (($geom['type'] ?? '') === 'Point') {
                [$lng,$lat] = $geom['coordinates'];
                return [(float)$lat,(float)$lng];
            }

            $ring = [];
            if ($geom['type'] === 'Polygon') {
                $ring = $geom['coordinates'][0] ?? [];
            } elseif ($geom['type'] === 'MultiPolygon') {
                $ring = $geom['coordinates'][0][0] ?? [];
            }
            if (!$ring) return [null,null];

            $minLat=90; $maxLat=-90; $minLng=180; $maxLng=-180;
            foreach ($ring as [$lng,$lat]) {
                $minLat = min($minLat, $lat); $maxLat = max($maxLat, $lat);
                $minLng = min($minLng, $lng); $maxLng = max($maxLng, $lng);
            }
            return [($minLat+$maxLat)/2, ($minLng+$maxLng)/2];
        } catch (\Throwable) {
            return [null,null];
        }
    }
}
