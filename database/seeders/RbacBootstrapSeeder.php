<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Seeds a complete RBAC baseline including cms.gallery.* permissions.
 *
 * - Creates roles (4-tier + operational packs).
 * - Creates permissions for every (module x action), including cms.gallery.
 * - Maps role -> permissions using wildcard-aware specs.
 *
 * Re-run safe: uses firstOrCreate/update patterns and Spatie syncPermissions().
 */
class RbacBootstrapSeeder extends Seeder
{
    /**
     * Canonical role names (use these everywhere).
     *
     * @var array<int, string>
     */
    private array $roles = [
        // 4-tier hierarchy
        'SuperAdmin',
        'DirectorGeneral',
        'Director',
        'DeputyDirector',
        'AssistantDirector',

        // Operational bundles you already use in app
        'DepartmentAdmin',
        'DivisionalAdmin',
        'SectionLead',
        'Officer',
        'DataEntry',
        'ReadOnly',
        'Auditor',
        'StoreKeeper',
        'LabTechnician',
    ];

    /**
     * Modules (namespaces). cms.gallery added here.
     *
     * @var array<int, string>
     */
    private array $modules = [
        'efoas',
        'pd',
        'admin.hr.gaz',
        'admin.hr.nongaz',
        'admin.store',
        'rt.qcl',
        'rt.trc',
        'hm.hatchery',
        'ext.division',
        'aqua',
        'chashma',
        'project.shrimp',
        'finance',
        'cms.gallery',       // <-- required by your GalleryPolicy
    ];

    /**
     * Actions (verbs) generated for every module.
     *
     * @var array<int, string>
     */
    private array $actions = [
        'read',
        'create',
        'update',
        'delete',
        'submit',
        'verify',
        'approve',
        'reject',
        'assign',
        'reassign',
        'archive',
        'reopen',
        'export',
        'audit.view',
        'audit.trail',
    ];

    /**
     * Role → permission specs.
     * Supports:
     *   - "*"                    (all perms)
     *   - "module.*"            (all actions for a module)
     *   - "*.action"            (an action across ALL modules)
     *   - "module.action"       (single permission)
     *
     * Notes:
     * - Director/DepartmentAdmin get full-cycle by wildcard across modules.
     * - Deputy/Divisional are intentionally narrower; we add cms.gallery.read explicitly.
     * - AssistantDirector can create/update/submit (add verify if you want).
     *
     * @var array<string, array<int, string>>
     */
    private array $specs = [
        'SuperAdmin' => ['*'],

        'DirectorGeneral' => [
            '*.read', '*.export', '*.audit.view', '*.audit.trail',
            '*.approve', '*.reject', '*.assign', '*.reassign',
        ],

        'Director' => [
            '*.read', '*.create', '*.update', '*.submit', '*.verify',
            '*.approve', '*.reject', '*.assign', '*.reassign',
            '*.archive', '*.export', '*.audit.view',
        ],

        'DeputyDirector' => [
            'efoas.*', 'ext.division.*', 'aqua.*', '*.export',
            'pd.read', 'hm.hatchery.read', 'rt.qcl.read', 'rt.trc.read',
            'cms.gallery.read', // ensure DD sees gallery
        ],

        'AssistantDirector' => [
            '*.read', '*.create', '*.update', '*.submit', '*.export',
            // Uncomment if ADs can verify galleries:
            // 'cms.gallery.verify',
        ],

        // Operational packs (kept for your existing controllers/policies)
        'DepartmentAdmin' => [
            '*.read', '*.create', '*.update', '*.submit', '*.verify',
            '*.approve', '*.reject', '*.assign', '*.reassign',
            '*.archive', '*.export', '*.audit.view',
        ],

        'DivisionalAdmin' => [
            'efoas.*', 'ext.division.*', 'aqua.*', '*.export',
            'pd.read', 'hm.hatchery.read', 'rt.qcl.read', 'rt.trc.read',
            'cms.gallery.read',
        ],

        'SectionLead' => [
            '*.read', '*.create', '*.update', '*.submit', '*.verify',
            '*.approve', '*.assign', '*.reassign', '*.export',
            'efoas.audit.view',
        ],

        'Officer' => [
            '*.read', '*.create', '*.update', '*.submit', '*.export',
        ],

        'DataEntry' => [
            '*.read', '*.create', '*.update', '*.submit',
        ],

        'ReadOnly' => [
            '*.read', '*.export',
        ],

        'Auditor' => [
            '*.read', '*.export', '*.audit.view', '*.audit.trail',
        ],

        'StoreKeeper' => [
            'admin.store.read', 'admin.store.create', 'admin.store.update',
            'admin.store.submit', 'admin.store.verify', 'admin.store.export',
            // allow Store Keeper to view galleries if desired:
            'cms.gallery.read',
        ],

        'LabTechnician' => [
            'rt.qcl.read', 'rt.qcl.create', 'rt.qcl.update',
            'rt.qcl.submit', 'rt.qcl.export',
            'cms.gallery.read',
        ],
    ];

    public function run(): void
    {
        // 1) Create all (module x action) permissions
        foreach ($this->modules as $module) {
            foreach ($this->actions as $action) {
                Permission::firstOrCreate([
                    'name'       => "{$module}.{$action}",
                    'guard_name' => 'web',
                ]);
            }
        }

        // 2) Create roles
        $roleModels = [];
        foreach ($this->roles as $roleName) {
            $roleModels[$roleName] = Role::firstOrCreate([
                'name'       => $roleName,
                'guard_name' => 'web',
            ]);
        }

        // 3) Map role → permissions using specs (wildcards supported)
        foreach ($this->specs as $roleName => $spec) {
            $role = $roleModels[$roleName] ?? null;
            if (!$role) {
                $this->command?->warn("Role {$roleName} not found—skipping mapping.");
                continue;
            }

            $permissions = $this->expandSpecsToPermissions($spec);
            $role->syncPermissions($permissions);
        }
    }

    /**
     * Expand wildcard specs into Permission models.
     *
     * @param  array<int, string>  $specs
     * @return \Illuminate\Support\Collection<int, \Spatie\Permission\Models\Permission>
     */
    private function expandSpecsToPermissions(array $specs)
    {
        // '*' means all
        if (in_array('*', $specs, true)) {
            return Permission::all();
        }

        $names = [];
        foreach ($specs as $s) {
            // "module.*"
            if (str_contains($s, '.*')) {
                $module = rtrim($s, '.*');
                foreach ($this->actions as $action) {
                    $names[] = "{$module}.{$action}";
                }
                continue;
            }

            // "*.action"
            if (str_starts_with($s, '*.' )) {
                $action = substr($s, 2);
                foreach ($this->modules as $module) {
                    $names[] = "{$module}.{$action}";
                }
                continue;
            }

            // "module.action"
            $names[] = $s;
        }

        $names = array_values(array_unique($names));
        return Permission::whereIn('name', $names)->get();
    }
}
