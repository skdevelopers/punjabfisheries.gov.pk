<x-app-layout title="Tender Details" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center justify-between space-x-2 py-5">
            <h3 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Tender Details: {{ $tender->tender_number }}
            </h3>
            <div class="flex space-x-2">
                <a href="{{ route('cms.tenders.edit', $tender->id) }}"
                    class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                    <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <span>Edit Tender</span>
                </a>
                <a href="{{ route('cms.tenders.index') }}"
                    class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:hover:bg-navy-400 dark:focus:bg-navy-400 dark:active:bg-navy-400/90">
                    <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Back to Tenders</span>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="card">
                    <div class="p-4 sm:p-5">
                        <div class="flex items-start justify-between">
                            <div>
                                <h2 class="text-2xl font-bold text-slate-800 dark:text-navy-50">{{ $tender->title }}</h2>
                                <p class="mt-1 text-slate-600 dark:text-navy-300">Tender #{{ $tender->tender_number }}</p>
                            </div>
                            <div class="flex space-x-2">
                                <span class="badge 
                                    @if($tender->status === 'active') bg-success/10 text-success
                                    @elseif($tender->status === 'closed') bg-warning/10 text-warning
                                    @else bg-error/10 text-error
                                    @endif">
                                    {{ ucfirst($tender->status) }}
                                </span>
                                <span class="badge {{ $tender->is_published ? 'bg-success/10 text-success' : 'bg-warning/10 text-warning' }}">
                                    {{ $tender->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <h3 class="text-lg font-semibold text-slate-800 dark:text-navy-50 mb-3">Description</h3>
                            <div class="prose max-w-none text-slate-600 dark:text-navy-300">
                                {!! nl2br(e($tender->description)) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Tender Information -->
                <div class="card">
                    <div class="p-4 sm:p-5">
                        <h3 class="text-lg font-semibold text-slate-800 dark:text-navy-50 mb-4">Tender Information</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-600 dark:text-navy-300">Deadline</label>
                                <p class="mt-1 text-slate-800 dark:text-navy-50 font-medium">{{ $tender->formatted_deadline }}</p>
                                @if($tender->is_expired)
                                    <span class="text-xs text-red-500">Expired</span>
                                @else
                                    <span class="text-xs text-green-500">{{ $tender->days_until_deadline }} days left</span>
                                @endif
                            </div>



                            <div>
                                <label class="block text-sm font-medium text-slate-600 dark:text-navy-300">Views</label>
                                <p class="mt-1 text-slate-800 dark:text-navy-50">{{ number_format($tender->view_count) }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-600 dark:text-navy-300">Created</label>
                                <p class="mt-1 text-slate-800 dark:text-navy-50">{{ $tender->created_at->format('d M Y, h:i A') }}</p>
                            </div>

                            @if($tender->published_at)
                            <div>
                                <label class="block text-sm font-medium text-slate-600 dark:text-navy-300">Published</label>
                                <p class="mt-1 text-slate-800 dark:text-navy-50">{{ $tender->published_at->format('d M Y, h:i A') }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>


                <!-- PDF Documents -->
                @if($tender->pdf_path || $tender->pdf_path_2)
                <div class="card">
                    <div class="p-4 sm:p-5">
                        <h3 class="text-lg font-semibold text-slate-800 dark:text-navy-50 mb-4">Tender Documents</h3>
                        
                        <div class="space-y-4">
                            @if($tender->pdf_path)
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <svg class="size-8 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-slate-800 dark:text-navy-50 truncate">
                                        {{ basename($tender->pdf_path) }}
                                    </p>
                                    <p class="text-sm text-slate-500 dark:text-navy-300">Tender Notice</p>
                                </div>
                                <div>
                                    <a href="{{ route('cms.tenders.download-pdf', $tender->id) }}"
                                        class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <span>Download</span>
                                    </a>
                                </div>
                            </div>
                            @endif

                            @if($tender->pdf_path_2)
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <svg class="size-8 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-slate-800 dark:text-navy-50 truncate">
                                        {{ basename($tender->pdf_path_2) }}
                                    </p>
                                    <p class="text-sm text-slate-500 dark:text-navy-300">Bidding Document</p>
                                </div>
                                <div>
                                    <a href="{{ route('cms.tenders.download-pdf2', $tender->id) }}"
                                        class="btn bg-blue-500 font-medium text-white hover:bg-blue-600 focus:bg-blue-600 active:bg-blue-600/90">
                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <span>Download</span>
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                <!-- Actions -->
                <div class="card">
                    <div class="p-4 sm:p-5">
                        <h3 class="text-lg font-semibold text-slate-800 dark:text-navy-50 mb-4">Actions</h3>
                        
                        <div class="space-y-3">
                            <form action="{{ route('cms.tenders.toggle-status', $tender->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="btn w-full {{ $tender->is_published ? 'bg-warning font-medium text-white hover:bg-warning-focus' : 'bg-success font-medium text-white hover:bg-success-focus' }}">
                                    @if($tender->is_published)
                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                                        </svg>
                                        <span>Unpublish</span>
                                    @else
                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        <span>Publish</span>
                                    @endif
                                </button>
                            </form>

                            <form action="{{ route('cms.tenders.destroy', $tender->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this tender?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90 w-full">
                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    <span>Delete Tender</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
