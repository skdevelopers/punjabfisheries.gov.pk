<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'type',
        'status',
        'priority',
        'published_date',
        'expiry_date',
        'external_url',
        'file_path',
        'file_name',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'published_date' => 'date',
        'expiry_date' => 'date',
        'is_featured' => 'boolean',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopePublished($query)
    {
        return $query->where('published_date', '<=', now());
    }

    public function scopeNotExpired($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('expiry_date')
              ->orWhere('expiry_date', '>=', now());
        });
    }

    // Accessors
    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'active' => 'success',
            'inactive' => 'secondary',
            'draft' => 'warning',
            default => 'secondary'
        };
    }

    public function getPriorityBadgeAttribute()
    {
        return match($this->priority) {
            'high' => 'danger',
            'normal' => 'primary',
            'low' => 'info',
            default => 'primary'
        };
    }

    // Helper methods
    public function isActive()
    {
        return $this->status === 'active';
    }

    public function isPublished()
    {
        return $this->published_date <= now();
    }

    public function isExpired()
    {
        return $this->expiry_date && $this->expiry_date < now();
    }
}
