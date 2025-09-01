<?php

namespace App\Models;

use App\Models\OrgUnit;
use App\Models\UserScope;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract; // if you enable later
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, UserScope> $scopes
 */
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * User org-unit scopes for row-level access.
     *
     * @return HasMany<UserScope>
     */
    public function scopes(): HasMany
    {
        return $this->hasMany(UserScope::class);
    }

    /**
     * Whether this user bypasses org-scope filtering.
     * Uses config('rbac.bypass_roles', ...) so you can adjust without code changes.
     */
    public function bypassesOrgScope(): bool
    {
        $bypass = config('rbac.bypass_roles', ['SuperAdmin', 'DirectorGeneral']);
        return $this->hasAnyRole($bypass);
    }

    /**
     * Return org unit IDs this user is scoped to (including all descendants).
     *
     * @return array<int, int>
     */
    public function scopedOrgUnitIds(): array
    {
        $rootIds = $this->scopes()->pluck('org_unit_id')->all();
        if (!$rootIds) {
            return [];
        }

        /** @var array<int, Collection<int, OrgUnit>>|null $tree */
        static $tree = null;

        // Build the org tree once per request.
        if ($tree === null) {
            $tree = OrgUnit::query()
                ->get(['id', 'parent_id'])
                ->groupBy('parent_id');
        }

        $stack = $rootIds;
        $seen  = array_fill_keys($rootIds, true);

        while ($stack) {
            $current = array_pop($stack);
            foreach (($tree[$current] ?? []) as $child) {
                if (!isset($seen[$child->id])) {
                    $seen[$child->id] = true;
                    $stack[] = $child->id;
                }
            }
        }

        /** @var array<int, int> $ids */
        $ids = array_map('intval', array_keys($seen));
        return $ids;
    }
}
