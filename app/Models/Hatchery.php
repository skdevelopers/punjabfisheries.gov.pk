<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hatchery extends Model
{
    protected $fillable = [
        'hatchery_name',
        'contact_person',
        'mobile_number',
        'office_number',
        'division',
        'district',
        'office_address',
        'longitude',
        'latitude',
        'office_type',
        'dd_adf_name',
        'dd_adf_contact_number',
    ];

    protected $casts = [
        'longitude' => 'decimal:8',
        'latitude' => 'decimal:8',
    ];

    public function scopeByOfficeType($query, $type)
    {
        return $query->where('office_type', $type);
    }

    public function scopeByDivision($query, $division)
    {
        return $query->where('division', $division);
    }

    public function scopeByDistrict($query, $district)
    {
        return $query->where('district', $district);
    }
}
