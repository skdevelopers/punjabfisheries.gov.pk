<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PublicStocking extends Model
{
    use HasFactory;

    protected $fillable = [
        'species',
        'no',
        'water_body_name',
    ];

    // Species constants
    const SPECIES = [
        'Rohu' => 'Rohu',
        'Mori' => 'Mori',
        'Thalia' => 'Thalia',
        'Grass Carp' => 'Grass Carp',
        'Silver Carp' => 'Silver Carp',
        'Big Head' => 'Big Head',
        'Clarias' => 'Clarias',
        'Mullee' => 'Mullee',
        'Tilapia' => 'Tilapia',
        'Trout' => 'Trout',
        'Other' => 'Other'
    ];
}
