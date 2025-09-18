<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class Target extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type',
        'category',
        'target_value',
        'achieved_value',
        'unit',
        'start_date',
        'end_date',
        'status',
        'assigned_to',
        'notes',
        'priority',
        'is_public'
    ];

    protected $casts = [
        'target_value' => 'decimal:2',
        'achieved_value' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_public' => 'boolean'
    ];

    // Target types
    const TYPES = [
        'fish_production' => 'Fish Production',
        'seed_production' => 'Seed Production',
        'stocking' => 'Stocking',
        'revenue' => 'Revenue',
        'hatchery_development' => 'Hatchery Development',
        'research' => 'Research',
        'training' => 'Training',
        'other' => 'Other'
    ];

    // Target categories
    const CATEGORIES = [
        'monthly' => 'Monthly',
        'quarterly' => 'Quarterly',
        'yearly' => 'Yearly',
        'custom' => 'Custom'
    ];

    // Status options
    const STATUSES = [
        'active' => 'Active',
        'completed' => 'Completed',
        'cancelled' => 'Cancelled',
        'paused' => 'Paused'
    ];

    // Priority levels
    const PRIORITIES = [
        1 => 'Low',
        2 => 'Medium',
        3 => 'High',
        4 => 'Very High',
        5 => 'Critical'
    ];

    // Units
    const UNITS = [
        'kg' => 'Kilograms',
        'pieces' => 'Pieces',
        'rupees' => 'Rupees',
        'liters' => 'Liters',
        'hectares' => 'Hectares',
        'percent' => 'Percentage'
    ];

    // Scopes
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    public function scopeCompleted(Builder $query): Builder
    {
        return $query->where('status', 'completed');
    }

    public function scopeByType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }

    public function scopeByCategory(Builder $query, string $category): Builder
    {
        return $query->where('category', $category);
    }

    public function scopePublic(Builder $query): Builder
    {
        return $query->where('is_public', true);
    }

    public function scopeByPriority(Builder $query, int $priority): Builder
    {
        return $query->where('priority', $priority);
    }

    public function scopeCurrent(Builder $query): Builder
    {
        return $query->where('start_date', '<=', now())
                    ->where('end_date', '>=', now());
    }

    public function scopeOverdue(Builder $query): Builder
    {
        return $query->where('end_date', '<', now())
                    ->where('status', '!=', 'completed');
    }

    // Accessors
    public function getProgressPercentageAttribute(): float
    {
        if ($this->target_value == 0) {
            return 0;
        }
        
        return round(($this->achieved_value / $this->target_value) * 100, 2);
    }

    public function getIsOverdueAttribute(): bool
    {
        return $this->end_date < now() && $this->status !== 'completed';
    }

    public function getIsCompletedAttribute(): bool
    {
        return $this->status === 'completed';
    }

    public function getIsActiveAttribute(): bool
    {
        return $this->status === 'active' && 
               $this->start_date <= now() && 
               $this->end_date >= now();
    }

    public function getDaysRemainingAttribute(): int
    {
        return max(0, now()->diffInDays($this->end_date, false));
    }

    public function getFormattedStartDateAttribute(): string
    {
        return $this->start_date->format('d M Y');
    }

    public function getFormattedEndDateAttribute(): string
    {
        return $this->end_date->format('d M Y');
    }

    public function getPriorityLabelAttribute(): string
    {
        return self::PRIORITIES[$this->priority] ?? 'Unknown';
    }

    public function getTypeLabelAttribute(): string
    {
        return self::TYPES[$this->type] ?? 'Unknown';
    }

    public function getCategoryLabelAttribute(): string
    {
        return self::CATEGORIES[$this->category] ?? 'Unknown';
    }

    public function getStatusLabelAttribute(): string
    {
        return self::STATUSES[$this->status] ?? 'Unknown';
    }

    // Methods
    public function updateProgress(float $achievedValue): void
    {
        $this->update(['achieved_value' => $achievedValue]);
        
        // Auto-complete if target is reached
        if ($achievedValue >= $this->target_value && $this->status === 'active') {
            $this->update(['status' => 'completed']);
        }
    }

    public function complete(): void
    {
        $this->update([
            'status' => 'completed',
            'achieved_value' => $this->target_value
        ]);
    }

    public function pause(): void
    {
        $this->update(['status' => 'paused']);
    }

    public function resume(): void
    {
        $this->update(['status' => 'active']);
    }

    public function cancel(): void
    {
        $this->update(['status' => 'cancelled']);
    }
}
