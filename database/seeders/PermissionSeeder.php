<?php
declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

/**
 * Seed GIS roles & permissions.
 *
 * Roles:
 *  - GIS Admin: full access (view/create/edit/delete/publish/import/export)
 *  - GIS Editor: view/create/edit/publish/import/export (no delete)
 *  - Viewer : view only
 *
 * Run:
 *  php artisan db:seed --class=PermissionSeeder
 *  php artisan cache:forget spatie.permission.cache
 */
class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Always clear cached perms to avoid stale mappings
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        // Define all permissions we use across UI/API
        $all = [
            'gis.view',
            'gis.create',
            'gis.edit',
            'gis.delete',
            'gis.publish',
            'gis.import',
            'gis.export',
        ];

        foreach ($all as $name) {
            Permission::firstOrCreate(['name' => $name]);
        }

        // Roles
        $admin  = Role::firstOrCreate(['name' => 'GIS Admin']);
        $editor = Role::firstOrCreate(['name' => 'GIS Editor']);
        $viewer = Role::firstOrCreate(['name' => 'Viewer']);

        // Map permissions to roles
        $admin->syncPermissions($all);

        $editor->syncPermissions([
            'gis.view',
            'gis.create',
            'gis.edit',
            'gis.publish',
            'gis.import',
            'gis.export',
        ]);

        $viewer->syncPermissions(['gis.view']);

        // Clear again after changes
        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
