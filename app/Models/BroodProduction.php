<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class BroodProduction extends Model
{
    protected $fillable = [
        'hatchery_name',
        'species',
        'brood_type',
        'brood_count',
        'avg_weight',
        'total_weight',
        'breeding_status',
        'spawning_date',
        'eggs_collected',
        'fry_produced',
        'survival_rate',
        'notes',
        'recorded_by'
    ];

    protected $casts = [
        'avg_weight' => 'decimal:2',
        'total_weight' => 'decimal:2',
        'survival_rate' => 'decimal:2',
        'spawning_date' => 'date',
        'eggs_collected' => 'integer',
        'fry_produced' => 'integer',
        'brood_count' => 'integer'
    ];

    // Brood types
    const BROOD_TYPES = [
        'male' => 'Male',
        'female' => 'Female',
        'mixed' => 'Mixed'
    ];

    // Breeding statuses
    const BREEDING_STATUSES = [
        'ready' => 'Ready for Breeding',
        'spawning' => 'Currently Spawning',
        'post_spawning' => 'Post Spawning',
        'resting' => 'Resting Period'
    ];

    // Species options (same as fish selling)
    const SPECIES = [
        'rohu' => 'Rohu',
        'mori' => 'Mori',
        'thalia' => 'Thalia',
        'grass_carp' => 'Grass Carp',
        'gulfam' => 'Gulfam',
        'pangasius' => 'Pangasius',
        'kalbans' => 'Kalbans',
        'seabass' => 'Seabass',
        'mahseer' => 'Mahseer',
        'silver_carp' => 'Silver Carp',
        'bighead' => 'Bighead',
        'carp' => 'Carp',
        'clarias' => 'Clarias',
        'mullee' => 'Mullee',
        'khagga' => 'Khagga',
        'saul' => 'Saul',
        'singharee' => 'Singharee',
        'tilapia' => 'Tilapia',
        'trout' => 'Trout',
        'jhalli' => 'Jhalli',
        'other' => 'Other'
    ];

    // Scopes
    public function scopeBySpecies(Builder $query, string $species): Builder
    {
        return $query->where('species', $species);
    }

    public function scopeByHatchery(Builder $query, string $hatchery): Builder
    {
        return $query->where('hatchery_name', $hatchery);
    }

    public function scopeByBreedingStatus(Builder $query, string $status): Builder
    {
        return $query->where('breeding_status', $status);
    }

    public function scopeByBroodType(Builder $query, string $type): Builder
    {
        return $query->where('brood_type', $type);
    }

    public function scopeRecent(Builder $query, int $days = 30): Builder
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    // Accessors
    public function getBroodTypeLabelAttribute(): string
    {
        return self::BROOD_TYPES[$this->brood_type] ?? 'Unknown';
    }

    public function getBreedingStatusLabelAttribute(): string
    {
        return self::BREEDING_STATUSES[$this->breeding_status] ?? 'Unknown';
    }

    public function getSpeciesLabelAttribute(): string
    {
        return self::SPECIES[$this->species] ?? 'Unknown';
    }

    public function getFormattedSpawningDateAttribute(): ?string
    {
        return $this->spawning_date ? $this->spawning_date->format('d M Y') : null;
    }

    public function getFormattedAvgWeightAttribute(): string
    {
        return number_format($this->avg_weight, 2) . ' g';
    }

    public function getFormattedTotalWeightAttribute(): string
    {
        return number_format($this->total_weight, 2) . ' kg';
    }

    public function getFormattedSurvivalRateAttribute(): ?string
    {
        return $this->survival_rate ? number_format($this->survival_rate, 2) . '%' : null;
    }

    // Methods
    public function calculateSurvivalRate(): ?float
    {
        if ($this->eggs_collected && $this->fry_produced && $this->eggs_collected > 0) {
            return round(($this->fry_produced / $this->eggs_collected) * 100, 2);
        }
        return null;
    }

    public function updateSurvivalRate(): void
    {
        $survivalRate = $this->calculateSurvivalRate();
        if ($survivalRate !== null) {
            $this->update(['survival_rate' => $survivalRate]);
        }
    }
}
