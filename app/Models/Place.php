<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int         $id
 * @property int|null    $division_id
 * @property int|null    $district_id
 * @property int|null    $tehsil_id
 * @property string      $name
 * @property string      $type        hatchery|farm|office
 * @property string|null $owner
 * @property string|null $phone
 * @property string      $status      draft|published|archived
 * @property array       $geometry    GeoJSON geometry
 * @property array|null  $properties
 * @property float|null  $centroid_lat
 * @property float|null  $centroid_lng
 */
class Place extends Model
{
    protected $fillable = [
        'division_id','district_id','tehsil_id',
        'name','type','owner','phone',
        'status','published_at','geometry','properties',
        'centroid_lat','centroid_lng',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'geometry'     => 'array',
        'properties'   => 'array',
    ];

    public function scopePublished(Builder $q): Builder
    {
        return $q->where('status','published');
    }

    public function scopeType(Builder $q, ?string $type): Builder {
        if ($type && $type !== 'all') $q->where('type',$type);
        return $q;
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
    public function tehsil(): BelongsTo
    {
        return $this->belongsTo(Tehsil::class);
    }
}
