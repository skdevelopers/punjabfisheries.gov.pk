<?php

namespace App\Traits;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

/**
 * Trait HasOrgScope
 *
 * Adds a global query scope that restricts rows by the authenticated user's
 * assigned organization scopes (and their descendants). Bypassed for users
 * with roles defined in config('rbac.bypass_roles').
 *
 * To use:
 *   - Add an integer column (default: org_unit_id) on the model's table.
 *   - In the model: `use \App\Traits\HasOrgScope;`
 *   - Optional: define `protected string $orgUnitColumn = 'custom_column';`
 */
trait HasOrgScope
{
    /**
     * Boot the global org scope.
     */
    protected static function bootHasOrgScope(): void
    {
        static::addGlobalScope('org_scope', function (Builder $builder): void {
            // Optionally skip in console (seeding/migrations), controlled by config.
            $applyInConsole = (bool) config('rbac.apply_scope_in_console', false);
            if (App::runningInConsole() && !$applyInConsole) {
                return;
            }

            $user = Auth::user();

            if (!$user || (method_exists($user, 'bypassesOrgScope') && $user->bypassesOrgScope())) {
                return; // no user or bypass roles → no filtering
            }

            $model = $builder->getModel();

            /** @var string $column */
            $column = property_exists($model, 'orgUnitColumn')
                ? $model->orgUnitColumn
                : (string) config('rbac.default_org_unit_column', 'org_unit_id');

            // If the table doesn't have the column, silently skip (model isn't org-scoped)
            if (!Schema::hasColumn($model->getTable(), $column)) {
                return;
            }

            // Compute user's visible org units
            $ids = method_exists($user, 'scopedOrgUnitIds') ? $user->scopedOrgUnitIds() : [];

            // Secure default: if no scopes, show nothing
            if (empty($ids)) {
                $builder->whereRaw('1 = 0');
                return;
            }

            $builder->whereIn($builder->qualifyColumn($column), $ids);
        });
    }
}
