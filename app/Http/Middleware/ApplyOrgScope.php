<?php

namespace App\Http\Middleware;

use App\Support\OrgScope;
use Closure;
use Illuminate\Http\Request;

/**
 * Attach allowed org_unit_ids for the authenticated user into a static holder.
 * Models using the HasOrgUnitScope trait will apply it automatically.
 */
class ApplyOrgScope
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()) {
            OrgScope::bootstrapForUser($request->user());
        }
        return $next($request);
    }
}
