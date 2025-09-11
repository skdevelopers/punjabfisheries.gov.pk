<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FishSelling extends Model
{
    use HasFactory;

    protected $fillable = [
        'species',
        'weight_range',
        'rate',
        'fish_qty',
        'total_weight',
        'avg_weight',
    ];

    protected $casts = [
        'total_weight' => 'decimal:2',
        'avg_weight' => 'decimal:2',
        'rate' => 'decimal:2',
    ];

    // Species constants
    const SPECIES = [
        'Rohu' => 'Rohu',
        'Mori' => 'Mori',
        'Thalia' => 'Thalia',
        'Grass Carp' => 'Grass Carp',
        'Gulfam' => 'Gulfam',
        'Pangasius' => 'Pangasius',
        'Kalbans' => 'Kalbans',
        'Seabass' => 'Seabass',
        'Mahseer' => 'Mahseer',
        'Silver Carp' => 'Silver Carp',
        'Bighead' => 'Bighead',
        'Carp' => 'Carp',
        'Clarias' => 'Clarias',
        'Mullee' => 'Mullee',
        'Khagga' => 'Khagga',
        'Saul' => 'Saul',
        'Singharee' => 'Singharee',
        'Tilapia' => 'Tilapia',
        'Trash and Weed Fish' => 'Trash and Weed Fish',
        'Trout' => 'Trout',
        'Jhalli' => 'Jhalli',
        'Other' => 'Other'
    ];

    // Weight ranges and rates for each species
    const WEIGHT_RATES = [
        'Rohu' => [
            'Below 1 kg' => 400,
            '1.1-1.5 kg' => 420,
            '1.6-2.0 kg' => 450,
            '2.1-2.5 kg' => 500,
            'Above 2.5 kg' => 550
        ],
        'Mori' => [
            'Below 1 kg' => 250,
            '1.1-1.5 kg' => 350,
            '1.6-2.0 kg' => 400,
            '2.1-2.5 kg' => 450,
            'Above 2.5 kg' => 500
        ],
        'Thalia' => [
            'Below 1 kg' => 250,
            '1.1-1.5 kg' => 350,
            '1.6-2.0 kg' => 400,
            '2.1-2.5 kg' => 450,
            'Above 2.5 kg' => 500
        ],
        'Grass Carp' => [
            'Below 1 kg' => 250,
            '1.1-1.5 kg' => 350,
            '1.6-2.0 kg' => 400,
            '2.1-2.5 kg' => 450,
            'Above 2.5 kg' => 500
        ],
        'Gulfam' => [
            'Below 1 kg' => 250,
            '1.1-1.5 kg' => 350,
            '1.6-2.0 kg' => 400,
            '2.1-2.5 kg' => 450,
            'Above 2.5 kg' => 500
        ],
        'Pangasius' => [
            'Below 1 kg' => 250,
            '1.1-1.5 kg' => 350,
            '1.6-2.0 kg' => 400,
            '2.1-2.5 kg' => 450,
            'Above 2.5 kg' => 500
        ],
        'Kalbans' => [
            'Below 1 kg' => 250,
            '1.1-1.5 kg' => 350,
            '1.6-2.0 kg' => 400,
            '2.1-2.5 kg' => 450,
            'Above 2.5 kg' => 500
        ],
        'Seabass' => [
            'Below 1 kg' => 250,
            '1.1-1.5 kg' => 350,
            '1.6-2.0 kg' => 400,
            '2.1-2.5 kg' => 450,
            'Above 2.5 kg' => 500
        ],
        'Mahseer' => [
            'Below 1 kg' => 250,
            '1.1-1.5 kg' => 350,
            '1.6-2.0 kg' => 400,
            '2.1-2.5 kg' => 450,
            'Above 2.5 kg' => 500
        ],
        'Silver Carp' => [
            'Below 1 kg' => 200,
            '1.1-1.5 kg' => 250,
            '1.6-2.0 kg' => 300,
            '2.1-2.5 kg' => 350,
            'Above 2.5 kg' => 400
        ],
        'Bighead' => [
            'Below 1 kg' => 200,
            '1.1-1.5 kg' => 250,
            '1.6-2.0 kg' => 300,
            '2.1-2.5 kg' => 350,
            'Above 2.5 kg' => 400
        ],
        'Carp' => [
            'Below 1 kg' => 200,
            '1.1-1.5 kg' => 250,
            '1.6-2.0 kg' => 300,
            '2.1-2.5 kg' => 350,
            'Above 2.5 kg' => 400
        ],
        'Clarias' => [
            'Below 1 kg' => 200,
            '1.1-1.5 kg' => 250,
            '1.6-2.0 kg' => 300,
            '2.1-2.5 kg' => 350,
            'Above 2.5 kg' => 400
        ],
        'Mullee' => [
            'Below 1 kg' => 400,
            '1.1-2.0 kg' => 450,
            'Above 2 kg' => 500
        ],
        'Khagga' => [
            'Below 1 kg' => 400,
            '1.1-2.0 kg' => 450,
            'Above 2 kg' => 500
        ],
        'Saul' => [
            'Below 1 kg' => 700,
            '1.1-2.0 kg' => 850,
            'Above 2 kg' => 1100
        ],
        'Singharee' => [
            'Below 1 kg' => 700,
            '1.1-2.0 kg' => 850,
            'Above 2 kg' => 1100
        ],
        'Tilapia' => [
            'Upto 300 gm' => 250,
            '301-500 gm' => 400,
            'Above 500 gm' => 500
        ],
        'Trash and Weed Fish' => [
            'Regardless of Weight' => 300
        ],
        'Trout' => [
            'Upto 300 gm' => 1600,
            'Above 300 gm' => 2200
        ],
        'Jhalli' => [
            'Regardless of Weight' => 400
        ],
        'Other' => [
            'Below 1 kg' => 300,
            '1.1-1.5 kg' => 350,
            '1.6-2.0 kg' => 400,
            '2.1-2.5 kg' => 450,
            'Above 2.5 kg' => 500
        ]
    ];

    // Scopes for filtering
    public function scopeBySpecies($query, $species)
    {
        return $query->where('species', $species);
    }

    public function scopeBySellingRange($query, $minKg, $maxKg)
    {
        return $query->whereBetween('total_weight', [$minKg, $maxKg]);
    }
}
