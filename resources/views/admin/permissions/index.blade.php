<x-app-layout title="Permission Management" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="card col-span-12">
                <div class="flex items-center justify-between p-4 sm:p-5">
                    <div>
                        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">Permission Management</h2>
                        <p class="text-slate-500 dark:text-navy-200">Manage system permissions and create new ones</p>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.roles.index') }}" class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90">
                            <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            Manage Roles
                        </a>
                        <button onclick="document.getElementById('create-permission-modal').classList.remove('hidden')" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                            <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Add New Permission
                        </button>
                    </div>
                </div>
                <div class="p-4 sm:p-5">
                    @if(session('success'))
                        <div class="mx-4 sm:mx-5 mb-4 rounded-lg bg-success/10 px-4 py-3 text-success dark:bg-success/15 dark:text-success-light">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mx-4 sm:mx-5 mb-4 rounded-lg bg-error/10 px-4 py-3 text-error dark:bg-error/15 dark:text-error-light">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Permissions by Module -->
                    <div class="space-y-6">
                        @foreach($permissions as $module => $modulePermissions)
                            <div class="bg-slate-50 dark:bg-navy-600 rounded-lg p-4">
                                <div class="flex">
                                    <!-- Module Name on Left -->
                                    <div class="w-32 flex-shrink-0 mr-6">
                                        <h5 class="font-semibold text-slate-800 dark:text-navy-50 text-lg">
                                            {{ ucfirst(str_replace('.', ' ', $module)) }}
                                        </h5>
                                        <span class="text-xs text-slate-500 dark:text-navy-300">
                                            {{ $modulePermissions->count() }} permissions
                                        </span>
                                    </div>
                                    
                                    <!-- Permissions on Right -->
                                    <div class="flex-1">
                                        <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                                            @foreach($modulePermissions as $permission)
                                                <div class="flex items-center justify-between bg-white dark:bg-navy-700 rounded-lg p-3">
                                                    <span class="text-sm text-slate-700 dark:text-navy-100">
                                                        {{ ucfirst(str_replace('.', ' ', $permission->name)) }}
                                                    </span>
                                                    <form method="POST" action="{{ route('admin.permissions.destroy', $permission) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this permission?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-error hover:text-error-focus">
                                                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Create Permission Modal -->
    <div id="create-permission-modal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex min-h-screen items-center justify-center p-4">
            <div class="fixed inset-0 bg-black/50" onclick="document.getElementById('create-permission-modal').classList.add('hidden')"></div>
            <div class="relative w-full max-w-md bg-white dark:bg-navy-700 rounded-lg shadow-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-slate-800 dark:text-navy-50">Create New Permission</h3>
                        <button onclick="document.getElementById('create-permission-modal').classList.add('hidden')" class="text-slate-400 hover:text-slate-600 dark:hover:text-navy-200">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <form method="POST" action="{{ route('admin.permissions.create') }}">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                    Permission Name <span class="text-error">*</span>
                                </label>
                                <input type="text" name="name" required 
                                       class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-navy-600 dark:border-navy-400 dark:text-navy-100" 
                                       placeholder="e.g., module.action">
                                <p class="text-xs text-slate-500 dark:text-navy-300 mt-1">
                                    Use dot notation: module.action (e.g., cms.gallery.create)
                                </p>
                            </div>
                            
                            <div class="flex justify-end space-x-3">
                                <button type="button" onclick="document.getElementById('create-permission-modal').classList.add('hidden')" 
                                        class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                    Cancel
                                </button>
                                <button type="submit" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                                    Create Permission
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
