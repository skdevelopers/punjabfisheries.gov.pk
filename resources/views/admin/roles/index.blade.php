<x-app-layout title="Role Management" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="card col-span-12">
                <div class="flex items-center justify-between p-4 sm:p-5">
                    <div>
                        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">Role Management</h2>
                        <p class="text-slate-500 dark:text-navy-200">Manage system roles and their permissions</p>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.permissions.index') }}" class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90">
                            <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            Manage Permissions
                        </a>
                        <a href="{{ route('admin.roles.create') }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                            <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Add New Role
                        </a>
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

                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="border-b border-slate-200 dark:border-navy-500">
                                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Role</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Permissions</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Users</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Created</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-navy-800 divide-y divide-slate-200 dark:divide-navy-500">
                                @forelse($roles as $role)
                                    <tr class="hover:bg-slate-50 dark:hover:bg-navy-700 transition-colors">
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <div class="flex items-center space-x-3">
                                                <div class="avatar h-10 w-10">
                                                    <div class="is-initial rounded-full bg-primary text-sm font-medium text-white">
                                                        {{ substr($role->name, 0, 2) }}
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="font-medium text-slate-900 dark:text-navy-100">{{ $role->name }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4">
                                            <div class="flex flex-wrap gap-1 max-w-xs">
                                                @forelse($role->permissions->take(3) as $permission)
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-success/10 text-success dark:bg-success/15 dark:text-success-light">
                                                        {{ ucfirst(str_replace('.', ' ', explode('.', $permission->name)[1])) }}
                                                    </span>
                                                @empty
                                                    <span class="text-xs text-slate-500 dark:text-navy-300">No permissions</span>
                                                @endforelse
                                                @if($role->permissions->count() > 3)
                                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600 dark:bg-navy-600 dark:text-navy-200">
                                                        +{{ $role->permissions->count() - 3 }} more
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <div class="text-sm text-slate-600 dark:text-navy-200">{{ $role->users->count() }} users</div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <div class="text-sm text-slate-600 dark:text-navy-200">{{ $role->created_at->format('M d, Y') }}</div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex items-center justify-end space-x-2">
                                                <a href="{{ route('admin.roles.show', $role) }}" class="text-info hover:text-info-focus transition-colors" title="View">
                                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('admin.roles.edit', $role) }}" class="text-warning hover:text-warning-focus transition-colors" title="Edit">
                                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form method="POST" action="{{ route('admin.roles.destroy', $role) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this role?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-error hover:text-error-focus transition-colors" title="Delete">
                                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-8 text-center text-slate-500 dark:text-navy-300">
                                            <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                            </svg>
                                            <p class="mt-2">No roles found</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($roles->hasPages())
                        <div class="mt-6">
                            {{ $roles->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
</x-app-layout>