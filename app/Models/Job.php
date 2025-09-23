<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'department',
        'location',
        'employment_type',
        'experience_level',
        'salary_min',
        'salary_max',
        'requirements',
        'benefits',
        'application_deadline',
        'is_active',
        'status',
        'attachment_path',
        'attachment_type',
        'attachment_name'
    ];

    protected $casts = [
        'application_deadline' => 'date',
        'is_active' => 'boolean',
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2',
    ];

    // Scope for active jobs
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for open jobs
    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }

    // Get formatted salary range
    public function getSalaryRangeAttribute()
    {
        if ($this->salary_min && $this->salary_max) {
            return 'PKR ' . number_format($this->salary_min) . ' - ' . number_format($this->salary_max);
        } elseif ($this->salary_min) {
            return 'PKR ' . number_format($this->salary_min) . '+';
        } elseif ($this->salary_max) {
            return 'Up to PKR ' . number_format($this->salary_max);
        }
        return 'Salary not specified';
    }

    // Get attachment URL
    public function getAttachmentUrlAttribute()
    {
        if ($this->attachment_path) {
            return asset('storage/' . $this->attachment_path);
        }
        return null;
    }

    // Check if job has attachment
    public function hasAttachment()
    {
        return !empty($this->attachment_path);
    }
}
