<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Creates permissions for ACTUAL modules that exist in the system.
 * 
 * Based on actual routes and controllers:
 * - CMS Modules: Pages, Sliders, Blogs, Blog Categories, Blog Tags, Blog Comments, Gallery, Tenders, Announcements, Jobs, Media
 * - CRM Modules: Dashboard, Hatcheries, Fish Selling, Seed Selling, Public Stocking, Private Stocking, Targets
 */
class ActualModulesPermissionsSeeder extends Seeder
{
    /**
     * ACTUAL CMS Modules that exist in the system
     */
    private array $cmsModules = [
        'cms.pages' => ['read', 'create', 'update', 'delete'],
        'cms.sliders' => ['read', 'create', 'update', 'delete', 'toggle_status', 'reorder'],
        'cms.blogs' => ['read', 'create', 'update', 'delete', 'toggle_featured', 'toggle_publish', 'preview'],
        'cms.blog_categories' => ['read', 'create', 'update', 'delete', 'toggle_status', 'reorder'],
        'cms.blog_tags' => ['read', 'create', 'update', 'delete', 'toggle_status'],
        'cms.blog_comments' => ['read', 'create', 'update', 'delete', 'approve', 'spam', 'bulk_action'],
        'cms.gallery' => ['read', 'create', 'update', 'delete', 'upload', 'remove_image', 'toggle_public'],
        'cms.tenders' => ['read', 'create', 'update', 'delete', 'toggle_status', 'download_pdf'],
        'cms.announcements' => ['read', 'create', 'update', 'delete', 'toggle_featured', 'toggle_status', 'reorder'],
        'cms.jobs' => ['read', 'create', 'update', 'delete', 'toggle_active', 'toggle_status'],
        'cms.media' => ['read', 'upload', 'delete', 'manage', 'bulk_delete'],
    ];

    /**
     * ACTUAL CRM Modules that exist in the system
     */
    private array $crmModules = [
        'crm.dashboard' => ['read', 'view_stats'],
        'crm.hatcheries' => ['read', 'create', 'update', 'delete'],
        'crm.fish_selling' => ['read', 'create', 'update', 'delete'],
        'crm.seed_selling' => ['read', 'create', 'update', 'delete'],
        'crm.public_stocking' => ['read', 'create', 'update', 'delete'],
        'crm.private_stocking' => ['read', 'create', 'update', 'delete'],
        'crm.targets' => ['read', 'create', 'update', 'delete', 'update_progress', 'complete', 'pause', 'resume', 'cancel'],
    ];

    /**
     * Role permissions mapping for ACTUAL modules only
     */
    private array $rolePermissions = [
        'SuperAdmin' => ['*'], // All permissions

        'DirectorGeneral' => [
            // CMS Permissions - Read and approve
            'cms.*.read', 'cms.*.approve', 'cms.*.toggle_status', 'cms.*.toggle_featured',
            'cms.*.toggle_publish', 'cms.*.download_pdf',
            
            // CRM Permissions - Read and view stats
            'crm.*.read', 'crm.*.view_stats',
        ],

        'Director' => [
            // CMS Permissions - Full access except delete
            'cms.*.read', 'cms.*.create', 'cms.*.update', 'cms.*.toggle_status',
            'cms.*.toggle_featured', 'cms.*.toggle_publish', 'cms.*.preview',
            'cms.*.approve', 'cms.*.reorder', 'cms.*.download_pdf',
            
            // CRM Permissions - Full access
            'crm.*.read', 'crm.*.create', 'crm.*.update', 'crm.*.view_stats',
        ],

        'DeputyDirector' => [
            // CMS Permissions - Pages, blogs, gallery, tenders
            'cms.pages.*', 'cms.blogs.*', 'cms.gallery.*', 'cms.tenders.*',
            'cms.sliders.read', 'cms.blog_categories.read', 'cms.blog_tags.read',
            'cms.blog_comments.read', 'cms.announcements.read', 'cms.jobs.read', 'cms.media.read',
            
            // CRM Permissions - Hatcheries and targets
            'crm.dashboard.*', 'crm.hatcheries.*', 'crm.targets.*',
            'crm.fish_selling.read', 'crm.seed_selling.read',
            'crm.public_stocking.read', 'crm.private_stocking.read',
        ],

        'AssistantDirector' => [
            // CMS Permissions - Read, create, update
            'cms.*.read', 'cms.*.create', 'cms.*.update', 'cms.*.upload',
            'cms.blogs.toggle_featured', 'cms.blogs.toggle_publish', 'cms.blogs.preview',
            'cms.sliders.toggle_status', 'cms.gallery.toggle_public',
            'cms.announcements.toggle_featured', 'cms.jobs.toggle_active',
            
            // CRM Permissions - Read, create, update
            'crm.*.read', 'crm.*.create', 'crm.*.update',
        ],

        'DepartmentAdmin' => [
            // CMS Permissions - Full access
            'cms.*.read', 'cms.*.create', 'cms.*.update', 'cms.*.delete',
            'cms.*.toggle_status', 'cms.*.toggle_featured', 'cms.*.toggle_publish',
            'cms.*.approve', 'cms.*.reorder', 'cms.*.upload', 'cms.*.manage',
            'cms.*.bulk_delete', 'cms.*.download_pdf',
            
            // CRM Permissions - Full access
            'crm.*.read', 'crm.*.create', 'crm.*.update', 'crm.*.delete',
            'crm.*.view_stats', 'crm.*.update_progress', 'crm.*.complete',
            'crm.*.pause', 'crm.*.resume', 'crm.*.cancel',
        ],

        'DivisionalAdmin' => [
            // CMS Permissions - Pages, blogs, gallery, tenders
            'cms.pages.*', 'cms.blogs.*', 'cms.gallery.*', 'cms.tenders.*',
            'cms.sliders.read', 'cms.blog_categories.read', 'cms.blog_tags.read',
            'cms.blog_comments.read', 'cms.announcements.read', 'cms.jobs.read', 'cms.media.read',
            
            // CRM Permissions - Hatcheries and targets
            'crm.dashboard.*', 'crm.hatcheries.*', 'crm.targets.*',
            'crm.fish_selling.read', 'crm.seed_selling.read',
            'crm.public_stocking.read', 'crm.private_stocking.read',
        ],

        'SectionLead' => [
            // CMS Permissions - Read, create, update
            'cms.*.read', 'cms.*.create', 'cms.*.update', 'cms.*.upload',
            'cms.blogs.toggle_featured', 'cms.blogs.toggle_publish', 'cms.blogs.preview',
            'cms.sliders.toggle_status', 'cms.gallery.toggle_public',
            'cms.blog_comments.approve', 'cms.announcements.toggle_featured',
            'cms.jobs.toggle_active',
            
            // CRM Permissions - Read, create, update
            'crm.*.read', 'crm.*.create', 'crm.*.update',
        ],

        'Officer' => [
            // CMS Permissions - Read, create, update
            'cms.*.read', 'cms.*.create', 'cms.*.update', 'cms.*.upload',
            
            // CRM Permissions - Read, create, update
            'crm.*.read', 'crm.*.create', 'crm.*.update',
        ],

        'DataEntry' => [
            // CMS Permissions - Read, create, update
            'cms.*.read', 'cms.*.create', 'cms.*.update', 'cms.*.upload',
            
            // CRM Permissions - Read, create, update
            'crm.*.read', 'crm.*.create', 'crm.*.update',
        ],

        'ReadOnly' => [
            // CMS Permissions - Read only
            'cms.*.read',
            
            // CRM Permissions - Read only
            'crm.*.read', 'crm.*.view_stats',
        ],

        'Auditor' => [
            // CMS Permissions - Read only
            'cms.*.read',
            
            // CRM Permissions - Read only
            'crm.*.read', 'crm.*.view_stats',
        ],

        'StoreKeeper' => [
            // CMS Permissions - Gallery and media
            'cms.gallery.read', 'cms.media.read', 'cms.media.upload',
            
            // CRM Permissions - Fish/seed selling and stocking
            'crm.fish_selling.*', 'crm.seed_selling.*', 'crm.public_stocking.*',
            'crm.private_stocking.*', 'crm.dashboard.read',
        ],

        'LabTechnician' => [
            // CMS Permissions - Gallery and media
            'cms.gallery.read', 'cms.media.read',
            
            // CRM Permissions - Hatcheries and targets
            'crm.hatcheries.*', 'crm.dashboard.read', 'crm.targets.read',
        ],
    ];

    public function run(): void
    {
        $this->command->info('Creating permissions for ACTUAL modules only...');

        // Delete old permissions that don't exist in actual system
        $this->deleteNonExistentPermissions();

        // Create CMS permissions
        $this->createModulePermissions($this->cmsModules, 'CMS');
        
        // Create CRM permissions
        $this->createModulePermissions($this->crmModules, 'CRM');

        // Assign permissions to roles
        $this->assignPermissionsToRoles();

        $this->command->info('ACTUAL modules permissions created successfully!');
    }

    /**
     * Delete permissions that don't exist in actual system
     */
    private function deleteNonExistentPermissions(): void
    {
        $actualModules = array_merge(array_keys($this->cmsModules), array_keys($this->crmModules));
        
        // Delete permissions that don't start with actual module names
        $deletedCount = Permission::whereNotIn('name', function($query) use ($actualModules) {
            $query->select('name')
                  ->from('permissions')
                  ->where(function($q) use ($actualModules) {
                      foreach ($actualModules as $module) {
                          $q->orWhere('name', 'like', "{$module}.%");
                      }
                  });
        })->delete();

        $this->command->info("Deleted {$deletedCount} non-existent permissions");
    }

    /**
     * Create permissions for modules
     */
    private function createModulePermissions(array $modules, string $type): void
    {
        foreach ($modules as $module => $actions) {
            foreach ($actions as $action) {
                $permissionName = "{$module}.{$action}";
                
                Permission::firstOrCreate([
                    'name' => $permissionName,
                    'guard_name' => 'web',
                ]);
            }
        }

        $this->command->info("Created {$type} permissions for " . count($modules) . " modules");
    }

    /**
     * Assign permissions to roles
     */
    private function assignPermissionsToRoles(): void
    {
        foreach ($this->rolePermissions as $roleName => $permissionSpecs) {
            $role = Role::where('name', $roleName)->first();
            
            if (!$role) {
                $this->command->warn("Role {$roleName} not found - skipping permission assignment");
                continue;
            }

            $permissions = $this->expandPermissionSpecs($permissionSpecs);
            $role->syncPermissions($permissions);

            $this->command->info("Assigned " . $permissions->count() . " permissions to {$roleName}");
        }
    }

    /**
     * Expand permission specs to actual permission models
     */
    private function expandPermissionSpecs(array $specs)
    {
        // '*' means all permissions
        if (in_array('*', $specs, true)) {
            return Permission::all();
        }

        $permissionNames = [];
        
        foreach ($specs as $spec) {
            // Handle wildcard patterns
            if (str_contains($spec, '.*')) {
                $module = rtrim($spec, '.*');
                $permissions = Permission::where('name', 'like', "{$module}.%")->get();
                foreach ($permissions as $permission) {
                    $permissionNames[] = $permission->name;
                }
                continue;
            }

            // Handle specific permission
            $permissionNames[] = $spec;
        }

        $permissionNames = array_unique($permissionNames);
        return Permission::whereIn('name', $permissionNames)->get();
    }
}
