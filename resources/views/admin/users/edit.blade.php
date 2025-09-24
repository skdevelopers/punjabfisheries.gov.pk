<x-app-layout title="Edit User" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="card col-span-12">
                <div class="flex items-center justify-between p-4 sm:p-5">
                    <div>
                        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">Edit User</h2>
                        <p class="text-slate-500 dark:text-navy-200">Update user information and roles</p>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Users
                    </a>
                </div>
                <div class="p-4 sm:p-5">
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="space-y-6">
                            <!-- Basic Information -->
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                    Full Name <span class="text-error">*</span>
                                </label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                                       class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-navy-600 dark:border-navy-400 dark:text-navy-100 @error('name') border-red-500 @enderror" 
                                       placeholder="Enter full name" required>
                                @error('name')
                                    <p class="text-xs text-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                    Email Address <span class="text-error">*</span>
                                </label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                                       class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-navy-600 dark:border-navy-400 dark:text-navy-100 @error('email') border-red-500 @enderror" 
                                       placeholder="Enter email address" required>
                                @error('email')
                                    <p class="text-xs text-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                    Staff ID <span class="text-error">*</span>
                                </label>
                                <input type="text" name="staff_id" value="{{ old('staff_id', $user->staff_id) }}" 
                                       class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-navy-600 dark:border-navy-400 dark:text-navy-100 @error('staff_id') border-red-500 @enderror" 
                                       placeholder="Enter staff ID" required>
                                @error('staff_id')
                                    <p class="text-xs text-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                    New Password (Leave blank to keep current)
                                </label>
                                <input type="password" name="password" 
                                       class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-navy-600 dark:border-navy-400 dark:text-navy-100 @error('password') border-red-500 @enderror" 
                                       placeholder="Enter new password">
                                @error('password')
                                    <p class="text-xs text-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                    Confirm New Password
                                </label>
                                <input type="password" name="password_confirmation" 
                                       class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-navy-600 dark:border-navy-400 dark:text-navy-100" 
                                       placeholder="Confirm new password">
                            </div>
                        </div>

                        <!-- Professional Information -->
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                    Designation <span class="text-error">*</span>
                                </label>
                                <input type="text" name="designation" value="{{ old('designation', $user->designation) }}" 
                                       class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-navy-600 dark:border-navy-400 dark:text-navy-100 @error('designation') border-red-500 @enderror" 
                                       placeholder="Enter designation" required>
                                @error('designation')
                                    <p class="text-xs text-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                    Phone Number
                                </label>
                                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" 
                                       class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-navy-600 dark:border-navy-400 dark:text-navy-100 @error('phone') border-red-500 @enderror" 
                                       placeholder="Enter phone number">
                                @error('phone')
                                    <p class="text-xs text-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                    Joining Date
                                </label>
                                <input type="date" name="joining_date" value="{{ old('joining_date', $user->joining_date) }}" 
                                       class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-navy-600 dark:border-navy-400 dark:text-navy-100 @error('joining_date') border-red-500 @enderror">
                                @error('joining_date')
                                    <p class="text-xs text-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Office Information -->
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                    Directorate Name
                                </label>
                                <input type="text" name="directorate_name" value="{{ old('directorate_name', $user->directorate_name) }}" 
                                       class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-navy-600 dark:border-navy-400 dark:text-navy-100 @error('directorate_name') border-red-500 @enderror" 
                                       placeholder="Enter directorate name">
                                @error('directorate_name')
                                    <p class="text-xs text-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                    Office Name
                                </label>
                                <input type="text" name="office_name" value="{{ old('office_name', $user->office_name) }}" 
                                       class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-navy-600 dark:border-navy-400 dark:text-navy-100 @error('office_name') border-red-500 @enderror" 
                                       placeholder="Enter office name">
                                @error('office_name')
                                    <p class="text-xs text-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                    Division Name
                                </label>
                                <input type="text" name="division_name" value="{{ old('division_name', $user->division_name) }}" 
                                       class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-navy-600 dark:border-navy-400 dark:text-navy-100 @error('division_name') border-red-500 @enderror" 
                                       placeholder="Enter division name">
                                @error('division_name')
                                    <p class="text-xs text-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                    District Name
                                </label>
                                <input type="text" name="district_name" value="{{ old('district_name', $user->district_name) }}" 
                                       class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-navy-600 dark:border-navy-400 dark:text-navy-100 @error('district_name') border-red-500 @enderror" 
                                       placeholder="Enter district name">
                                @error('district_name')
                                    <p class="text-xs text-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                    Office Location
                                </label>
                                <input type="text" name="office_location" value="{{ old('office_location', $user->office_location) }}" 
                                       class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-navy-600 dark:border-navy-400 dark:text-navy-100 @error('office_location') border-red-500 @enderror" 
                                       placeholder="Enter office location">
                                @error('office_location')
                                    <p class="text-xs text-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                    Section
                                </label>
                                <input type="text" name="section" value="{{ old('section', $user->section) }}" 
                                       class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent dark:bg-navy-600 dark:border-navy-400 dark:text-navy-100 @error('section') border-red-500 @enderror" 
                                       placeholder="Enter section">
                                @error('section')
                                    <p class="text-xs text-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Roles Assignment -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Assign Roles
                            </label>
                            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">
                                @foreach($roles as $role)
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="checkbox" name="roles[]" value="{{ $role->name }}" 
                                               {{ in_array($role->name, old('roles', $userRoles)) ? 'checked' : '' }}
                                               class="h-4 w-4 text-primary bg-white border-slate-300 rounded focus:ring-primary focus:ring-2 dark:bg-navy-600 dark:border-navy-400 dark:checked:bg-primary dark:checked:border-primary">
                                        <span class="text-sm text-slate-700 dark:text-navy-100">{{ $role->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('roles')
                                <p class="text-xs text-error">{{ $message }}</p>
                            @enderror
                        </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end space-x-3">
                                <a href="{{ route('admin.users.index') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                    Cancel
                                </a>
                                <button type="submit" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                                    Update User
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
