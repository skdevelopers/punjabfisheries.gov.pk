<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeedProduction extends Model
{
    use HasFactory;

    protected $fillable = [
        'species',
        'size_range',
        'rate',
        'quantity',
        'total_amount',
    ];

    protected $casts = [
        'rate' => 'decimal:2',
        'quantity' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    // Species constants for fish seed - individual species
    const SPECIES = [
        'Post Larvae - Silver Carp' => 'Post Larvae - Silver Carp',
        'Post Larvae - Grass Carp' => 'Post Larvae - Grass Carp',
        'Post Larvae - Rohu' => 'Post Larvae - Rohu',
        'Post Larvae - Mori' => 'Post Larvae - Mori',
        'Post Larvae - Theila' => 'Post Larvae - Theila',
        'Post Larvae - Big Head' => 'Post Larvae - Big Head',
        'Post Larvae - Clarias' => 'Post Larvae - Clarias',
        'Post Larvae - Mullee' => 'Post Larvae - Mullee',
        'Major/Chinese Carp' => 'Major/Chinese Carp',
        'Masheer' => 'Masheer',
        'Trout' => 'Trout',
        'Saul' => 'Saul',
        'Singharee' => 'Singharee',
        'Mullee' => 'Mullee',
        'Clarias' => 'Clarias',
        'Pangasius' => 'Pangasius',
        'GIFT (Genetically Improved Farmed Tilapia)' => 'GIFT (Genetically Improved Farmed Tilapia)'
    ];

    // Size ranges and rates for each species
    const SIZE_RATES = [
        'Post Larvae - Silver Carp' => [
            'Per Liter' => 22000
        ],
        'Post Larvae - Grass Carp' => [
            'Per Liter' => 25000
        ],
        'Post Larvae - Rohu' => [
            'Per Liter' => 20000
        ],
        'Post Larvae - Mori' => [
            'Per Liter' => 20000
        ],
        'Post Larvae - Theila' => [
            'Per Liter' => 26000
        ],
        'Post Larvae - Big Head' => [
            'Per Liter' => 26000
        ],
        'Post Larvae - Clarias' => [
            'Per Liter' => 40000
        ],
        'Post Larvae - Mullee' => [
            'Per Liter' => 40000
        ],
        'Major/Chinese Carp' => [
            'Upto 2.5 cm (1 inch)' => 1000,
            'Above 2.5 cm (1 inch) upto 5 cm (2 inch)' => 1600,
            'Above 5 cm (2 inch) upto 7.5 cm (3 inch)' => 3000,
            'Above 7.5 cm (3 inch) upto 10 cm (4 inch)' => 6000,
            'Above 10 cm (4 inch) upto 12.5 cm (5 inch)' => 12000,
            'Above 12.5 cm (5 inch) upto 15 cm (6 inch)' => 20000,
            'Above 15 cm (6 inch)' => 250
        ],
        'Masheer' => [
            'Upto 2.5 cm (1 inch)' => 10,
            'Above 2.5 cm (1 inch) upto 5 cm (2 inch)' => 15,
            'Above 5 cm (2 inch) upto 7.5 cm (3 inch)' => 20,
            'Above 7.5 cm (3 inch) upto 10 cm (4 inch)' => 25,
            'Above 10 cm (4 inch) upto 12.5 cm (5 inch)' => 30,
            'Above 12.5 cm (5 inch) upto 15 cm (6 inch)' => 40,
            'Above 15 cm (6 inch)' => 600
        ],
        'Trout' => [
            'Upto 2.5 cm (1 inch)' => 15,
            'Upto 2.5 cm (1 inch) to 5 cm (2 inch)' => 25,
            'Above 5 cm (2 inch)' => 40
        ],
        'Saul' => [
            'Upto 2.5 cm (1 Inch)' => 8,
            'Above 2.5 cm (1 inch) upto 5 cm (2 inch)' => 15,
            'Above 5 cm (2 inch) upto 7.5 cm (3 inch)' => 20,
            'Above 7.5 cm (3 inch) upto 10 cm (4 inch)' => 25,
            'Above 10 cm (4 inch) upto 12.5 cm (5 inch)' => 35,
            'Above 12.5 cm (5 inch) upto 15 cm (6 inch)' => 50,
            'Above 15 cm (6 inch)' => 70
        ],
        'Singharee' => [
            'Upto 2.5 cm (1 Inch)' => 8,
            'Above 2.5 cm (1 inch) upto 5 cm (2 inch)' => 15,
            'Above 5 cm (2 inch) upto 7.5 cm (3 inch)' => 20,
            'Above 7.5 cm (3 inch) upto 10 cm (4 inch)' => 25,
            'Above 10 cm (4 inch) upto 12.5 cm (5 inch)' => 35,
            'Above 12.5 cm (5 inch) upto 15 cm (6 inch)' => 50,
            'Above 15 cm (6 inch)' => 70
        ],
        'Mullee' => [
            'Per Liter (Post Larvae)' => 40000,
            'Upto 2.5 cm (1 Inch)' => 8,
            'Above 2.5 cm (1 inch) upto 5 cm (2 inch)' => 15,
            'Above 5 cm (2 inch) upto 7.5 cm (3 inch)' => 20,
            'Above 7.5 cm (3 inch) upto 10 cm (4 inch)' => 25,
            'Above 10 cm (4 inch) upto 12.5 cm (5 inch)' => 35,
            'Above 12.5 cm (5 inch) upto 15 cm (6 inch)' => 50,
            'Above 15 cm (6 inch)' => 70
        ],
        'Clarias' => [
            'Per Liter (Post Larvae)' => 40000,
            'Upto 2.5 cm (1 Inch)' => 5,
            'Above 2.5 cm (1 inch) upto 5 cm (2 inch)' => 12,
            'Above 5 cm (2 inch) upto 7.5 cm (3 inch)' => 18,
            'Above 7.5 cm (3 inch) upto 10 cm (4 inch)' => 25,
            'Above 10 cm (4 inch) upto 12.5 cm (5 inch)' => 30,
            'Above 12.5 cm (5 inch) upto 15 cm (6 inch)' => 50,
            'Above 15 cm (6 inch)' => 60
        ],
        'Pangasius' => [
            'Upto 2.5 cm (1 Inch)' => 5,
            'Above 2.5 cm (1 inch) upto 5 cm (2 inch)' => 12,
            'Above 5 cm (2 inch) upto 7.5 cm (3 inch)' => 18,
            'Above 7.5 cm (3 inch) upto 10 cm (4 inch)' => 25,
            'Above 10 cm (4 inch) upto 12.5 cm (5 inch)' => 30,
            'Above 12.5 cm (5 inch) upto 15 cm (6 inch)' => 50,
            'Above 15 cm (6 inch)' => 60
        ],
        'GIFT (Genetically Improved Farmed Tilapia)' => [
            'Upto 2.5 cm (1 inch)' => 2500,
            'Above 2.5 cm (1 inch) upto 5 cm (2 inch)' => 5000,
            'Above 5 cm (2 inch) upto 7.5 cm (3 inch)' => 7500,
            'Above 7.5 cm (3 inch) upto 10 cm (4 inch)' => 10000,
            'Above 10 cm (4 inch) upto 12.5 cm (5 inch)' => 20000,
            'Above 12.5 cm (5 inch) upto 15 cm (6 inch)' => 25000,
            'Above 15 cm (6 inch)' => 35000
        ]
    ];

    // Scopes for filtering
    public function scopeBySpecies($query, $species)
    {
        return $query->where('species', $species);
    }

    public function scopeByProductionRange($query, $minKg, $maxKg)
    {
        return $query->whereBetween('production_kg', [$minKg, $maxKg]);
    }
}
