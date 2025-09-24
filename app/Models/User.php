<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;

class User extends Authenticatable
{
    use Notifiable, HasFactory, HasRoles, HasPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'directorate_name',
        'office_name',
        'name',
        'email',
        'password',
        'staff_id',
        'designation',
        'phone',
        'joining_date',
        'division_name',
        'district_name',
        'office_location',
        'section',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    /**
     * Check if user bypasses organization scope
     */
    public function bypassesOrgScope(): bool
    {
        $bypassRoles = config('rbac.bypass_roles', []);
        return $this->hasAnyRole($bypassRoles);
    }

    /**
     * Get organization unit IDs that this user can access
     */
    public function scopedOrgUnitIds(): array
    {
        // This would typically query the user's assigned org units
        // For now, return empty array - implement based on your org structure
        return [];
    }

    /**
     * Get user's role hierarchy level
     */
    public function getRoleHierarchyLevel(): int
    {
        $hierarchy = [
            'SuperAdmin' => 1,
            'DirectorGeneral' => 2,
            'Director' => 3,
            'DeputyDirector' => 4,
            'AssistantDirector' => 5,
            'DepartmentAdmin' => 6,
            'DivisionalAdmin' => 7,
            'SectionLead' => 8,
            'Officer' => 9,
            'DataEntry' => 10,
            'ReadOnly' => 11,
            'Auditor' => 12,
            'StoreKeeper' => 13,
            'LabTechnician' => 14,
        ];

        $userRoles = $this->getRoleNames();
        $minLevel = 999;

        foreach ($userRoles as $role) {
            if (isset($hierarchy[$role])) {
                $minLevel = min($minLevel, $hierarchy[$role]);
            }
        }

        return $minLevel === 999 ? 15 : $minLevel;
    }
}
