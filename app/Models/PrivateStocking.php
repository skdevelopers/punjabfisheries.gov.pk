<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrivateStocking extends Model
{
    use HasFactory;

    protected $fillable = [
        'species',
        'no',
        'income_from_fish_seed',
    ];

    protected $casts = [
        'income_from_fish_seed' => 'decimal:2',
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
