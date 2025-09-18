<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class Tender extends Model
{
    protected $fillable = [
        'title',
        'description',
        'tender_number',
        'deadline',
        'status',
        'pdf_path',
        'pdf_path_2',
        'is_published',
        'published_at',
        'view_count'
    ];

    protected $casts = [
        'deadline' => 'date',
        'published_at' => 'datetime',
        'is_published' => 'boolean'
    ];

    // Scopes
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    public function scopeExpired(Builder $query): Builder
    {
        return $query->where('deadline', '<', now());
    }

    public function scopeNotExpired(Builder $query): Builder
    {
        return $query->where('deadline', '>=', now());
    }


    // Accessors
    public function getIsExpiredAttribute(): bool
    {
        return $this->deadline < now();
    }

    public function getDaysUntilDeadlineAttribute(): int
    {
        return max(0, now()->diffInDays($this->deadline, false));
    }

    public function getFormattedDeadlineAttribute(): string
    {
        return $this->deadline->format('d M Y');
    }


    // Methods
    public function incrementViewCount(): void
    {
        $this->increment('view_count');
    }

    public function publish(): void
    {
        $this->update([
            'is_published' => true,
            'published_at' => now()
        ]);
    }

    public function unpublish(): void
    {
        $this->update([
            'is_published' => false,
            'published_at' => null
        ]);
    }

    public function getPdfUrl(): ?string
    {
        if (!$this->pdf_path) {
            return null;
        }
        
        return asset('storage/' . $this->pdf_path);
    }

    public function getPdf2Url(): ?string
    {
        if (!$this->pdf_path_2) {
            return null;
        }
        
        return asset('storage/' . $this->pdf_path_2);
    }
}
