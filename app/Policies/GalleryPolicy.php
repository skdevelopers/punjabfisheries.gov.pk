<?php

namespace App\Policies;

use App\Models\Gallery;
use App\Models\User;

/**
 * Policy for Gallery CRUD & workflow mapped to Spatie permissions.
 *
 * Module namespace used: "cms.gallery"
 * Verbs used: read, create, update, delete, submit, verify, approve, reject, archive, reopen, export
 *
 * Notes:
 * - Users with roles in config('rbac.bypass_roles') are auto-allowed via `before`.
 * - If your Gallery model uses org row-scope, queries are already filtered; policy only checks capability.
 */
class GalleryPolicy
{
    /**
     * Permission module (change here if you rename).
     * Example permissions: cms.gallery.read, cms.gallery.create, ...
     */
    private string $module = 'cms.gallery';

    /**
     * Bypass for SuperAdmin / DirectorGeneral (or whatever you set in config/rbac.php).
     * Return true → allow everything. Return null → proceed to specific checks.
     */
    public function before(User $user): ?bool
    {
        $bypassRoles = (array) config('rbac.bypass_roles', ['SuperAdmin', 'DirectorGeneral']);
        return $user->hasAnyRole($bypassRoles) ? true : null;
    }

    /** Can list galleries? */
    public function viewAny(User $user): bool
    {
        return $user->can($this->perm('read'));
    }

    /** Can view a specific gallery? */
    public function view(User $user, Gallery $gallery): bool
    {
        // If you want drafts restricted, keep it simple: require read.
        // Add extra logic here if drafts should require update/approve, e.g.:
        // return $user->can($this->perm('read')) || (!$gallery->is_published && $user->can($this->perm('update')));
        return $user->can($this->perm('read'));
    }

    /** Can create? */
    public function create(User $user): bool
    {
        return $user->can($this->perm('create'));
    }

    /** Can update? */
    public function update(User $user, Gallery $gallery): bool
    {
        return $user->can($this->perm('update'));
    }

    /** Can delete (soft delete)? */
    public function delete(User $user, Gallery $gallery): bool
    {
        return $user->can($this->perm('delete'));
    }

    /** Can restore a soft-deleted gallery? */
    public function restore(User $user, Gallery $gallery): bool
    {
        return $user->can($this->perm('reopen'));
    }

    /** Can permanently delete or archive? Map to "archive" by policy. */
    public function forceDelete(User $user, Gallery $gallery): bool
    {
        return $user->can($this->perm('archive')) || $user->can($this->perm('delete'));
    }

    /** Optional workflow helpers (use in controllers if you need) */
    public function submit(User $user, Gallery $gallery): bool
    {
        return $user->can($this->perm('submit'));
    }
    public function verify(User $user, Gallery $gallery): bool
    {
        return $user->can($this->perm('verify'));
    }
    public function approve(User $user, Gallery $gallery): bool
    {
        return $user->can($this->perm('approve'));
    }
    public function reject(User $user, Gallery $gallery): bool
    {
        return $user->can($this->perm('reject'));
    }
    public function export(User $user): bool
    {
        return $user->can($this->perm('export'));
    }

    /** Build full permission name like "cms.gallery.read". */
    private function perm(string $action): string
    {
        return "{$this->module}.{$action}";
    }
}
