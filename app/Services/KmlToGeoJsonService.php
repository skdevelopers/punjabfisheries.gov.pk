<?php
declare(strict_types=1);

namespace App\Services;

use RuntimeException;
use ZipArchive;

/**
 * Convert KML/KMZ/GeoJSON file to GeoJSON FeatureCollection.
 * - Supports Point, Polygon, MultiPolygon, and simple MultiGeometry (unrolled).
 * - For .geojson/.json, passes-through (validates basic structure).
 */
class KmlToGeoJsonService
{
    /**
     * @param  string $absolutePath
     * @return array{type:string,features:array}
     */
    public function convert(string $absolutePath): array
    {
        $ext = strtolower(pathinfo($absolutePath, PATHINFO_EXTENSION));

        if (in_array($ext, ['geojson','json'], true)) {
            $raw = json_decode(file_get_contents($absolutePath), true);
            if (!is_array($raw)) throw new RuntimeException('Invalid GeoJSON');
            if (($raw['type'] ?? '') === 'FeatureCollection') return $raw;
            if (($raw['type'] ?? '') === 'Feature') return ['type'=>'FeatureCollection','features'=>[$raw]];
            if (($raw['type'] ?? '') === 'GeometryCollection') {
                $features = array_map(fn($g) => ['type'=>'Feature','geometry'=>$g,'properties'=>[]], $raw['geometries'] ?? []);
                return ['type'=>'FeatureCollection','features'=>$features];
            }
            // geometry only
            if (isset($raw['type']) && isset($raw['coordinates'])) {
                return ['type'=>'FeatureCollection', 'features'=>[['type'=>'Feature','geometry'=>$raw,'properties'=>[]]]];
            }
            throw new RuntimeException('Unsupported GeoJSON');
        }

        $xmlString = $this->extractKml($absolutePath);
        $xml = simplexml_load_string($xmlString);
        if (!$xml) throw new RuntimeException('Invalid KML');
        $xml->registerXPathNamespace('k', 'http://www.opengis.net/kml/2.2');

        $features = [];
        foreach ($xml->xpath('//k:Placemark') as $pm) {
            $name = (string) ($pm->name ?? '');
            // 1) Point
            if ($coords = $pm->xpath('.//k:Point/k:coordinates')) {
                $pair = array_filter(explode(',', trim((string)$coords[0])));
                if (count($pair) >= 2) {
                    $geometry = ['type'=>'Point','coordinates'=>[floatval($pair[0]), floatval($pair[1])]];
                    $features[] = ['type'=>'Feature','geometry'=>$geometry,'properties'=>['name'=>$name]];
                    continue;
                }
            }
            // 2) Polygon
            if ($ring = $pm->xpath('.//k:Polygon/k:outerBoundaryIs/k:LinearRing/k:coordinates')) {
                $coords = preg_split('/\s+/', trim((string)$ring[0]));
                $line = [];
                foreach ($coords as $c) {
                    if ($c==='') continue;
                    $pair = array_map('floatval', explode(',', $c));
                    if (count($pair) >= 2) $line[] = [$pair[0], $pair[1]];
                }
                if ($line && ($line[0] !== end($line))) $line[] = $line[0];
                if ($line) {
                    $geometry = ['type'=>'Polygon','coordinates'=>[ $line ]];
                    $features[] = ['type'=>'Feature','geometry'=>$geometry,'properties'=>['name'=>$name]];
                    continue;
                }
            }
            // 3) MultiGeometry (Point + Polygon...) — unroll into multiple Features
            foreach ($pm->xpath('.//k:MultiGeometry') as $mg) {
                // collect points
                foreach ($mg->xpath('.//k:Point/k:coordinates') as $pt) {
                    $pair = array_filter(explode(',', trim((string)$pt)));
                    if (count($pair) >= 2) {
                        $geometry = ['type'=>'Point','coordinates'=>[floatval($pair[0]), floatval($pair[1])]];
                        $features[] = ['type'=>'Feature','geometry'=>$geometry,'properties'=>['name'=>$name]];
                    }
                }
                // collect polygons
                foreach ($mg->xpath('.//k:Polygon/k:outerBoundaryIs/k:LinearRing/k:coordinates') as $pg) {
                    $coords = preg_split('/\s+/', trim((string)$pg));
                    $line = [];
                    foreach ($coords as $c) {
                        if ($c==='') continue;
                        $pair = array_map('floatval', explode(',', $c));
                        if (count($pair) >= 2) $line[] = [$pair[0], $pair[1]];
                    }
                    if ($line && ($line[0] !== end($line))) $line[] = $line[0];
                    if ($line) {
                        $geometry = ['type'=>'Polygon','coordinates'=>[ $line ]];
                        $features[] = ['type'=>'Feature','geometry'=>$geometry,'properties'=>['name'=>$name]];
                    }
                }
            }
        }

        return ['type'=>'FeatureCollection','features'=>$features];
    }

    /** @return string KML contents */
    private function extractKml(string $path): string
    {
        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        if ($ext === 'kml') return file_get_contents($path);
        if ($ext !== 'kmz') throw new RuntimeException('Unsupported file extension');

        $zip = new ZipArchive();
        if ($zip->open($path) !== true) throw new RuntimeException('Cannot open KMZ');
        $kmlIndex = $zip->locateName('doc.kml', ZipArchive::FL_NODIR);
        if ($kmlIndex === false) {
            for ($i=0; $i<$zip->numFiles; $i++) {
                $name = strtolower($zip->getNameIndex($i));
                if (str_ends_with($name, '.kml')) { $kmlIndex = $i; break; }
            }
        }
        if ($kmlIndex === false) { $zip->close(); throw new RuntimeException('KML not found in KMZ'); }
        $data = $zip->getFromIndex($kmlIndex); $zip->close();
        return $data ?: '';
    }
}
