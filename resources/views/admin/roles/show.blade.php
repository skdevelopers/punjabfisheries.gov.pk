<x-app-layout title="Role Details" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="card col-span-12">
                <div class="flex items-center justify-between p-4 sm:p-5">
                    <div>
                        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">Role Details</h2>
                        <p class="text-slate-500 dark:text-navy-200">View role information and permissions</p>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.roles.index') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to Roles
                        </a>
                        <a href="{{ route('admin.roles.edit', $role) }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                            <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit Role
                        </a>
                    </div>
                </div>
                <div class="p-4 sm:p-5">
                    @if(session('success'))
                        <div class="mx-4 sm:mx-5 mb-4 rounded-lg bg-success/10 px-4 py-3 text-success dark:bg-success/15 dark:text-success-light">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Role Information -->
                    <div class="mb-8">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="avatar h-16 w-16">
                                <div class="is-initial rounded-full bg-info text-lg text-white">
                                    {{ substr($role->name, 0, 2) }}
                                </div>
                            </div>
                            <div>
                                <h3 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">{{ $role->name }}</h3>
                                <p class="text-slate-600 dark:text-navy-200">{{ $role->permissions->count() }} permissions assigned</p>
                                <p class="text-sm text-slate-500 dark:text-navy-300">Created: {{ $role->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>

                        <!-- Users with this Role -->
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-slate-800 dark:text-navy-50 mb-3">Users with this Role</h4>
                            @if($role->users->count() > 0)
                                <div class="flex flex-wrap gap-2 max-w-full overflow-hidden">
                                    @foreach($role->users as $user)
                                        <a href="{{ route('admin.users.show', $user) }}" class="badge bg-info/10 text-info dark:bg-info/15 dark:text-info-light hover:bg-info/20 whitespace-nowrap">
                                            {{ $user->name }}
                                        </a>
                                    @endforeach
                                </div>
                            @else
                                <span class="text-slate-500 dark:text-navy-300">No users assigned to this role</span>
                            @endif
                        </div>
                    </div>

                    <!-- Permissions by Module -->
                    <div class="space-y-6">
                        <h4 class="text-lg font-medium text-slate-800 dark:text-navy-50">Assigned Permissions</h4>
                        
                        @if($role->permissions->count() > 0)
                            @foreach($role->permissions->groupBy(function($permission) { return explode('.', $permission->name)[0]; }) as $module => $permissions)
                                <div class="bg-slate-50 dark:bg-navy-600 rounded-lg p-4">
                                    <h5 class="font-medium text-slate-800 dark:text-navy-50 mb-3">
                                        {{ ucfirst(str_replace('.', ' ', $module)) }}
                                    </h5>
                                    <div class="flex flex-wrap gap-2 max-w-full overflow-hidden">
                                        @foreach($permissions as $permission)
                                            <span class="inline-block text-xs bg-success/10 text-success dark:bg-success/15 dark:text-success-light px-2 py-1 rounded whitespace-nowrap">
                                                {{ ucfirst(str_replace('.', ' ', explode('.', $permission->name)[1])) }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-8 text-slate-500 dark:text-navy-300">
                                <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <p class="mt-2">No permissions assigned to this role</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
