<x-app-layout title="User Details" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="card col-span-12">
                <div class="flex items-center justify-between p-4 sm:p-5">
                    <div>
                        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">User Details</h2>
                        <p class="text-slate-500 dark:text-navy-200">View user information and permissions</p>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.users.index') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to Users
                        </a>
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                            <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit User
                        </a>
                    </div>
                </div>
                <div class="p-4 sm:p-5">
                    @if(session('success'))
                        <div class="mx-4 sm:mx-5 mb-4 rounded-lg bg-success/10 px-4 py-3 text-success dark:bg-success/15 dark:text-success-light">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- User Profile Section -->
                    <div class="mb-8">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="avatar h-16 w-16">
                                <div class="is-initial rounded-full bg-primary text-lg text-white">
                                    {{ substr($user->name, 0, 2) }}
                                </div>
                            </div>
                            <div>
                                <h3 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">{{ $user->name }}</h3>
                                <p class="text-slate-600 dark:text-navy-200">{{ $user->designation }}</p>
                                <p class="text-sm text-slate-500 dark:text-navy-300">{{ $user->email }}</p>
                            </div>
                        </div>

                        <!-- User Roles -->
                        <div class="mb-6">
                            <h4 class="text-lg font-medium text-slate-800 dark:text-navy-50 mb-3">Assigned Roles</h4>
                            <div class="flex flex-wrap gap-2 max-w-full overflow-hidden">
                                @forelse($user->roles as $role)
                                    <span class="badge bg-info/10 text-info dark:bg-info/15 dark:text-info-light whitespace-nowrap">
                                        {{ $role->name }}
                                    </span>
                                @empty
                                    <span class="text-slate-500 dark:text-navy-300">No roles assigned</span>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- User Information Grid -->
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                        <!-- Basic Information -->
                        <div class="space-y-4">
                            <h4 class="text-lg font-medium text-slate-800 dark:text-navy-50">Basic Information</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-slate-600 dark:text-navy-200">Staff ID:</span>
                                    <span class="font-medium text-slate-800 dark:text-navy-50">{{ $user->staff_id }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-600 dark:text-navy-200">Phone:</span>
                                    <span class="font-medium text-slate-800 dark:text-navy-50">{{ $user->phone ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-600 dark:text-navy-200">Joining Date:</span>
                                    <span class="font-medium text-slate-800 dark:text-navy-50">{{ $user->joining_date ? \Carbon\Carbon::parse($user->joining_date)->format('M d, Y') : 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-600 dark:text-navy-200">Created:</span>
                                    <span class="font-medium text-slate-800 dark:text-navy-50">{{ $user->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Office Information -->
                        <div class="space-y-4">
                            <h4 class="text-lg font-medium text-slate-800 dark:text-navy-50">Office Information</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-slate-600 dark:text-navy-200">Directorate:</span>
                                    <span class="font-medium text-slate-800 dark:text-navy-50">{{ $user->directorate_name ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-600 dark:text-navy-200">Office:</span>
                                    <span class="font-medium text-slate-800 dark:text-navy-50">{{ $user->office_name ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-600 dark:text-navy-200">Division:</span>
                                    <span class="font-medium text-slate-800 dark:text-navy-50">{{ $user->division_name ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-600 dark:text-navy-200">District:</span>
                                    <span class="font-medium text-slate-800 dark:text-navy-50">{{ $user->district_name ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-600 dark:text-navy-200">Location:</span>
                                    <span class="font-medium text-slate-800 dark:text-navy-50">{{ $user->office_location ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-600 dark:text-navy-200">Section:</span>
                                    <span class="font-medium text-slate-800 dark:text-navy-50">{{ $user->section ?? 'N/A' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Permissions Section -->
                    <div class="mt-8">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-lg font-medium text-slate-800 dark:text-navy-50">User Permissions</h4>
                            <a href="{{ route('admin.users.permissions', $user) }}" class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90">
                                <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                Manage Permissions
                            </a>
                        </div>
                        
                        @if($user->permissions->count() > 0)
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                                @foreach($user->permissions->groupBy(function($permission) { return explode('.', $permission->name)[0]; }) as $module => $permissions)
                                    <div class="bg-slate-50 dark:bg-navy-600 rounded-lg p-4">
                                        <h5 class="font-medium text-slate-800 dark:text-navy-50 mb-2">{{ ucfirst(str_replace('.', ' ', $module)) }}</h5>
                                        <div class="space-y-1">
                                            @foreach($permissions as $permission)
                                                <span class="inline-block text-xs bg-success/10 text-success dark:bg-success/15 dark:text-success-light px-2 py-1 rounded">
                                                    {{ explode('.', $permission->name)[1] }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8 text-slate-500 dark:text-navy-300">
                                <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <p class="mt-2">No direct permissions assigned</p>
                                <p class="text-sm">Permissions are inherited from roles</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
