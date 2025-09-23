<x-app-layout title="Create New Job" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 sm:mt-5 lg:mt-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                <div>
                    <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Create New Job</h1>
                    <p class="text-slate-500 dark:text-navy-200">Add a new job posting to your website</p>
                </div>
                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('cms.jobs.index') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back to Jobs
                    </a>
                </div>
            </div>

            <!-- Form -->
            <div class="card">
                <div class="p-4 sm:p-5">
                    <form action="{{ route('cms.jobs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            <div class="lg:col-span-2">
                                <div class="space-y-4">
                                    <div>
                                        <label for="title" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                            Job Title <span class="text-error">*</span>
                                        </label>
                                        <input type="text" 
                                               class="form-input w-full @error('title') border-error @enderror" 
                                               id="title" name="title" value="{{ old('title') }}" required>
                                        @error('title')
                                            <p class="mt-1 text-sm text-error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="description" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                            Job Description <span class="text-error">*</span>
                                        </label>
                                        <textarea class="form-textarea w-full @error('description') border-error @enderror" 
                                                  id="description" name="description" rows="6" required>{{ old('description') }}</textarea>
                                        @error('description')
                                            <p class="mt-1 text-sm text-error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                        <div>
                                            <label for="department" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                                Department
                                            </label>
                                            <input type="text" 
                                                   class="form-input w-full @error('department') border-error @enderror" 
                                                   id="department" name="department" value="{{ old('department') }}">
                                            @error('department')
                                                <p class="mt-1 text-sm text-error">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="location" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                                Location
                                            </label>
                                            <input type="text" 
                                                   class="form-input w-full @error('location') border-error @enderror" 
                                                   id="location" name="location" value="{{ old('location') }}">
                                            @error('location')
                                                <p class="mt-1 text-sm text-error">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                        <div>
                                            <label for="employment_type" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                                Employment Type
                                            </label>
                                            <select class="form-select w-full @error('employment_type') border-error @enderror" 
                                                    id="employment_type" name="employment_type">
                                                <option value="">Select Type</option>
                                                <option value="Full-time" {{ old('employment_type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                                <option value="Part-time" {{ old('employment_type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                                <option value="Contract" {{ old('employment_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                                                <option value="Internship" {{ old('employment_type') == 'Internship' ? 'selected' : '' }}>Internship</option>
                                            </select>
                                            @error('employment_type')
                                                <p class="mt-1 text-sm text-error">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="experience_level" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                                Experience Level
                                            </label>
                                            <select class="form-select w-full @error('experience_level') border-error @enderror" 
                                                    id="experience_level" name="experience_level">
                                                <option value="">Select Level</option>
                                                <option value="Entry" {{ old('experience_level') == 'Entry' ? 'selected' : '' }}>Entry Level</option>
                                                <option value="Mid" {{ old('experience_level') == 'Mid' ? 'selected' : '' }}>Mid Level</option>
                                                <option value="Senior" {{ old('experience_level') == 'Senior' ? 'selected' : '' }}>Senior Level</option>
                                                <option value="Executive" {{ old('experience_level') == 'Executive' ? 'selected' : '' }}>Executive Level</option>
                                            </select>
                                            @error('experience_level')
                                                <p class="mt-1 text-sm text-error">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                        <div>
                                            <label for="salary_min" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                                Minimum Salary (PKR)
                                            </label>
                                            <input type="number" 
                                                   class="form-input w-full @error('salary_min') border-error @enderror" 
                                                   id="salary_min" name="salary_min" value="{{ old('salary_min') }}" min="0" step="0.01">
                                            @error('salary_min')
                                                <p class="mt-1 text-sm text-error">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="salary_max" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                                Maximum Salary (PKR)
                                            </label>
                                            <input type="number" 
                                                   class="form-input w-full @error('salary_max') border-error @enderror" 
                                                   id="salary_max" name="salary_max" value="{{ old('salary_max') }}" min="0" step="0.01">
                                            @error('salary_max')
                                                <p class="mt-1 text-sm text-error">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="requirements" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                            Requirements
                                        </label>
                                        <textarea class="form-textarea w-full @error('requirements') border-error @enderror" 
                                                  id="requirements" name="requirements" rows="4">{{ old('requirements') }}</textarea>
                                        @error('requirements')
                                            <p class="mt-1 text-sm text-error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="benefits" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                            Benefits
                                        </label>
                                        <textarea class="form-textarea w-full @error('benefits') border-error @enderror" 
                                                  id="benefits" name="benefits" rows="4">{{ old('benefits') }}</textarea>
                                        @error('benefits')
                                            <p class="mt-1 text-sm text-error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="attachment" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                            Job Advertisement File (PDF/JPG)
                                        </label>
                                        <input type="file" 
                                               class="form-input w-full @error('attachment') border-error @enderror" 
                                               id="attachment" name="attachment" 
                                               accept=".pdf,.jpg,.jpeg,.png">
                                        <p class="mt-1 text-sm text-slate-500">Upload PDF or JPG file for job advertisement details</p>
                                        @error('attachment')
                                            <p class="mt-1 text-sm text-error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="lg:col-span-1">
                                <div class="card bg-slate-50 dark:bg-navy-600">
                                    <div class="p-4">
                                        <h3 class="text-lg font-semibold text-slate-800 dark:text-navy-50 mb-4">Job Settings</h3>
                                        
                                        <div class="space-y-4">
                                            <div>
                                                <label for="status" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                                    Status <span class="text-error">*</span>
                                                </label>
                                                <select class="form-select w-full @error('status') border-error @enderror" 
                                                        id="status" name="status" required>
                                                    <option value="open" {{ old('status', 'open') == 'open' ? 'selected' : '' }}>Open</option>
                                                    <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                                                    <option value="filled" {{ old('status') == 'filled' ? 'selected' : '' }}>Filled</option>
                                                </select>
                                                @error('status')
                                                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div>
                                                <label for="application_deadline" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                                    Application Deadline
                                                </label>
                                                <input type="date" 
                                                       class="form-input w-full @error('application_deadline') border-error @enderror" 
                                                       id="application_deadline" name="application_deadline" value="{{ old('application_deadline') }}">
                                                @error('application_deadline')
                                                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="flex items-center">
                                                <input class="form-checkbox" type="checkbox" id="is_active" name="is_active" 
                                                       value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                                <label for="is_active" class="ml-2 text-sm text-slate-700 dark:text-navy-100">
                                                    Active Job
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 mt-6">
                            <a href="{{ route('cms.jobs.index') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                Cancel
                            </a>
                            <button type="submit" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Create Job
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>