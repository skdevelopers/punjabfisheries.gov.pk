<x-app-layout title="Job Details" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 sm:mt-5 lg:mt-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                <div>
                    <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Job Details</h1>
                    <p class="text-slate-500 dark:text-navy-200">View and manage job posting details</p>
                </div>
                <div class="mt-4 sm:mt-0 flex space-x-2">
                    <a href="{{ route('cms.jobs.edit', $job) }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Job
                    </a>
                    <a href="{{ route('cms.jobs.index') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back to Jobs
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                <div class="lg:col-span-2">
                    <div class="card">
                        <div class="p-4 sm:p-5">
                            <div class="mb-6">
                                <h2 class="text-2xl font-bold text-slate-800 dark:text-navy-50 mb-4">{{ $job->title }}</h2>
                                
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mb-4">
                                    <div>
                                        <span class="text-sm font-medium text-slate-500 dark:text-navy-200">Department:</span>
                                        <p class="text-slate-700 dark:text-navy-100">{{ $job->department ?? 'N/A' }}</p>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium text-slate-500 dark:text-navy-200">Location:</span>
                                        <p class="text-slate-700 dark:text-navy-100">{{ $job->location ?? 'N/A' }}</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mb-4">
                                    <div>
                                        <span class="text-sm font-medium text-slate-500 dark:text-navy-200">Employment Type:</span>
                                        <p class="text-slate-700 dark:text-navy-100">
                                            @if($job->employment_type)
                                                <span class="badge bg-info/10 text-info">{{ $job->employment_type }}</span>
                                            @else
                                                N/A
                                            @endif
                                        </p>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium text-slate-500 dark:text-navy-200">Experience Level:</span>
                                        <p class="text-slate-700 dark:text-navy-100">
                                            @if($job->experience_level)
                                                <span class="badge bg-slate-100 text-slate-600">{{ $job->experience_level }} Level</span>
                                            @else
                                                N/A
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mb-4">
                                    <div>
                                        <span class="text-sm font-medium text-slate-500 dark:text-navy-200">Salary Range:</span>
                                        <p class="text-slate-700 dark:text-navy-100 font-semibold">{{ $job->salary_range }}</p>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium text-slate-500 dark:text-navy-200">Application Deadline:</span>
                                        <p class="text-slate-700 dark:text-navy-100">
                                            {{ $job->application_deadline ? $job->application_deadline->format('M d, Y') : 'No deadline set' }}
                                        </p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mb-6">
                                    <div>
                                        <span class="text-sm font-medium text-slate-500 dark:text-navy-200">Status:</span>
                                        <p class="text-slate-700 dark:text-navy-100">
                                            <span class="badge {{ $job->status === 'open' ? 'bg-success/10 text-success' : ($job->status === 'closed' ? 'bg-error/10 text-error' : 'bg-warning/10 text-warning') }}">
                                                {{ ucfirst($job->status) }}
                                            </span>
                                        </p>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium text-slate-500 dark:text-navy-200">Active:</span>
                                        <p class="text-slate-700 dark:text-navy-100">
                                            <span class="badge {{ $job->is_active ? 'bg-success/10 text-success' : 'bg-slate-100 text-slate-500' }}">
                                                {{ $job->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </p>
                                    </div>
                                </div>

                                <div class="mb-6">
                                    <h3 class="text-lg font-semibold text-slate-800 dark:text-navy-50 mb-3">Job Description</h3>
                                    <div class="prose prose-slate max-w-none dark:prose-invert">
                                        {!! nl2br(e($job->description)) !!}
                                    </div>
                                </div>

                                @if($job->requirements)
                                    <div class="mb-6">
                                        <h3 class="text-lg font-semibold text-slate-800 dark:text-navy-50 mb-3">Requirements</h3>
                                        <div class="prose prose-slate max-w-none dark:prose-invert">
                                            {!! nl2br(e($job->requirements)) !!}
                                        </div>
                                    </div>
                                @endif

                                @if($job->benefits)
                                    <div class="mb-6">
                                        <h3 class="text-lg font-semibold text-slate-800 dark:text-navy-50 mb-3">Benefits</h3>
                                        <div class="prose prose-slate max-w-none dark:prose-invert">
                                            {!! nl2br(e($job->benefits)) !!}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="card">
                        <div class="p-4 sm:p-5">
                            <h3 class="text-lg font-semibold text-slate-800 dark:text-navy-50 mb-4">Job Information</h3>
                            
                            <div class="space-y-4">
                                <div>
                                    <span class="text-sm font-medium text-slate-500 dark:text-navy-200">Job ID:</span>
                                    <p class="text-slate-700 dark:text-navy-100 font-mono">#{{ $job->id }}</p>
                                </div>
                                
                                <div>
                                    <span class="text-sm font-medium text-slate-500 dark:text-navy-200">Created:</span>
                                    <p class="text-slate-700 dark:text-navy-100">{{ $job->created_at->format('M d, Y \a\t g:i A') }}</p>
                                </div>
                                
                                <div>
                                    <span class="text-sm font-medium text-slate-500 dark:text-navy-200">Last Updated:</span>
                                    <p class="text-slate-700 dark:text-navy-100">{{ $job->updated_at->format('M d, Y \a\t g:i A') }}</p>
                                </div>
                            </div>

                            <div class="mt-6 space-y-3">
                                <form action="{{ route('cms.jobs.toggle-status', $job) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn w-full {{ $job->status === 'open' ? 'bg-warning font-medium text-white hover:bg-warning-focus' : 'bg-success font-medium text-white hover:bg-success-focus' }}">
                                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M{{ $job->status === 'open' ? '10 9v6m4-6v6' : '14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z' }}"></path>
                                        </svg>
                                        {{ $job->status === 'open' ? 'Close Job' : 'Open Job' }}
                                    </button>
                                </form>

                                <form action="{{ route('cms.jobs.toggle-active', $job) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn w-full {{ $job->is_active ? 'bg-slate-150 font-medium text-slate-800 hover:bg-slate-200' : 'bg-success font-medium text-white hover:bg-success-focus' }}">
                                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M{{ $job->is_active ? '13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21' : '15 12a3 3 0 11-6 0 3 3 0 016 0z' }}"></path>
                                        </svg>
                                        {{ $job->is_active ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>

                                <a href="{{ route('frontend.jobs.show', $job) }}" class="btn w-full bg-info font-medium text-white hover:bg-info-focus" target="_blank">
                                    <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                    View on Frontend
                                </a>
                            </div>

                            <div class="mt-6 pt-6 border-t border-slate-200 dark:border-navy-500">
                                <form action="{{ route('cms.jobs.destroy', $job) }}" method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this job? This action cannot be undone.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn w-full bg-error font-medium text-white hover:bg-error-focus">
                                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Delete Job
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>