<x-app-layout title="Edit Role" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="card col-span-12">
                <div class="flex items-center justify-between p-4 sm:p-5">
                    <div>
                        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">Edit Role</h2>
                        <p class="text-slate-500 dark:text-navy-200">Update role information and permissions</p>
                    </div>
                    <a href="{{ route('admin.roles.index') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Roles
                    </a>
                </div>
                <div class="p-4 sm:p-5">
                    <form method="POST" action="{{ route('admin.roles.update', $role) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="space-y-6">
                            <!-- Role Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                    Role Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name', $role->name) }}" 
                                       class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-navy-600 dark:border-navy-400 dark:text-navy-100 @error('name') border-red-500 @enderror" 
                                       id="name" placeholder="Enter role name" required>
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Permissions Assignment -->
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                    Assign Permissions
                                </label>
                                <p class="text-sm text-slate-500 dark:text-navy-300 mb-4">
                                    Select the permissions that this role should have. Permissions are organized by modules.
                                </p>
                            
                                @foreach($permissions as $module => $modulePermissions)
                                    <div class="bg-slate-50 dark:bg-navy-600 rounded-lg p-4 mb-4">
                                        <div class="flex items-center justify-between mb-4">
                                            <h5 class="font-medium text-slate-800 dark:text-navy-50">
                                                {{ ucfirst(str_replace('.', ' ', $module)) }}
                                            </h5>
                                            <label class="flex items-center space-x-2 cursor-pointer">
                                                <input type="checkbox" class="h-4 w-4 text-primary bg-white border-slate-300 rounded focus:ring-primary focus:ring-2 dark:bg-navy-600 dark:border-navy-400 dark:checked:bg-primary dark:checked:border-primary module-checkbox" data-module="{{ $module }}">
                                                <span class="text-sm text-slate-600 dark:text-navy-200">Select All</span>
                                            </label>
                                        </div>
                                        
                                        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4">
                                            @foreach($modulePermissions as $permission)
                                                <label class="flex items-center space-x-2 cursor-pointer">
                                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" 
                                                           {{ in_array($permission->name, old('permissions', $rolePermissions)) ? 'checked' : '' }}
                                                           class="h-4 w-4 text-primary bg-white border-slate-300 rounded focus:ring-primary focus:ring-2 dark:bg-navy-600 dark:border-navy-400 dark:checked:bg-primary dark:checked:border-primary permission-checkbox" data-module="{{ $module }}">
                                                    <span class="text-sm text-slate-700 dark:text-navy-100">
                                                        {{ ucfirst(str_replace('.', ' ', $permission->name)) }}
                                                    </span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            
                            @error('permissions')
                                <p class="text-xs text-error">{{ $message }}</p>
                            @enderror
                        </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end space-x-3">
                                <a href="{{ route('admin.roles.index') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                    Cancel
                                </a>
                                <button type="submit" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                                    Update Role
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Module checkbox functionality
        document.addEventListener('DOMContentLoaded', function() {
            const moduleCheckboxes = document.querySelectorAll('.module-checkbox');
            const permissionCheckboxes = document.querySelectorAll('.permission-checkbox');

            moduleCheckboxes.forEach(moduleCheckbox => {
                const module = moduleCheckbox.dataset.module;
                const modulePermissions = document.querySelectorAll(`.permission-checkbox[data-module="${module}"]`);

                moduleCheckbox.addEventListener('change', function() {
                    modulePermissions.forEach(permission => {
                        permission.checked = this.checked;
                    });
                });

                // Update module checkbox based on individual permissions
                const updateModuleCheckbox = () => {
                    const checkedPermissions = document.querySelectorAll(`.permission-checkbox[data-module="${module}"]:checked`);
                    moduleCheckbox.checked = checkedPermissions.length === modulePermissions.length;
                    moduleCheckbox.indeterminate = checkedPermissions.length > 0 && checkedPermissions.length < modulePermissions.length;
                };

                modulePermissions.forEach(permission => {
                    permission.addEventListener('change', updateModuleCheckbox);
                });

                // Initial state
                updateModuleCheckbox();
            });
        });
    </script>
</x-app-layout>
