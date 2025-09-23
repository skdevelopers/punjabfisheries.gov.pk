<x-app-layout title="Jobs Management" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 sm:mt-5 lg:mt-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                <div>
                    <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Jobs Management</h1>
                    <p class="text-slate-500 dark:text-navy-200">Manage job postings and career opportunities</p>
                </div>
                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('cms.jobs.create') }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add New Job
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert flex items-center rounded-lg border border-success/20 bg-success/10 px-4 py-4 text-success dark:border-success-dark/20 dark:bg-success-dark/10">
                    <svg class="size-4 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Jobs Table -->
            <div class="card">
                <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                    <table class="is-hoverable w-full text-left">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Title
                                </th>
                                <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Department
                                </th>
                                <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Location
                                </th>
                                <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Type
                                </th>
                                <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Status
                                </th>
                                <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Active
                                </th>
                                <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Created
                                </th>
                                <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jobs as $job)
                                <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div>
                                            <p class="font-medium text-slate-700 dark:text-navy-100">{{ $job->title }}</p>
                                            @if($job->experience_level)
                                                <p class="text-xs text-slate-500 dark:text-navy-300">{{ $job->experience_level }} Level</p>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <p class="text-slate-700 dark:text-navy-100">{{ $job->department ?? 'N/A' }}</p>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <p class="text-slate-700 dark:text-navy-100">{{ $job->location ?? 'N/A' }}</p>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        @if($job->employment_type)
                                            <span class="badge bg-info/10 text-info">{{ $job->employment_type }}</span>
                                        @else
                                            <span class="text-slate-500 dark:text-navy-300">N/A</span>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <span class="badge {{ $job->status === 'open' ? 'bg-success/10 text-success' : ($job->status === 'closed' ? 'bg-error/10 text-error' : 'bg-warning/10 text-warning') }}">
                                            {{ ucfirst($job->status) }}
                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <span class="badge {{ $job->is_active ? 'bg-success/10 text-success' : 'bg-slate-100 text-slate-500' }}">
                                            {{ $job->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <p class="text-slate-700 dark:text-navy-100">{{ $job->created_at->format('M d, Y') }}</p>
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('cms.jobs.show', $job) }}" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25" title="View">
                                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </a>
                                            <a href="{{ route('cms.jobs.edit', $job) }}" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25" title="Edit">
                                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            <form action="{{ route('cms.jobs.toggle-status', $job) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25" title="Toggle Status">
                                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M{{ $job->status === 'open' ? '10 9v6m4-6v6' : '14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z' }}"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                            <form action="{{ route('cms.jobs.toggle-active', $job) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25" title="Toggle Active">
                                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M{{ $job->is_active ? '13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21' : '15 12a3 3 0 11-6 0 3 3 0 016 0z' }}"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                            <form action="{{ route('cms.jobs.destroy', $job) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this job?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn h-8 w-8 rounded-full p-0 hover:bg-error/20 focus:bg-error/20 active:bg-error/25" title="Delete">
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
                                    <td colspan="8" class="text-center py-8">
                                        <div class="flex flex-col items-center">
                                            <svg class="size-16 text-slate-400 dark:text-navy-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                                            </svg>
                                            <p class="text-slate-500 dark:text-navy-300 mb-4">No jobs found</p>
                                            <a href="{{ route('cms.jobs.create') }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                                Create your first job
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($jobs->hasPages())
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div class="text-sm text-slate-500 dark:text-navy-300">
                            Showing {{ $jobs->firstItem() }} to {{ $jobs->lastItem() }} of {{ $jobs->total() }} results
                        </div>
                        <div class="mt-4 sm:mt-0">
                            {{ $jobs->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>
</x-app-layout>
