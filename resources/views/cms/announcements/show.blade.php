<x-app-layout title="View Announcement" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="card col-span-12">
                <div class="flex items-center justify-between p-4 sm:p-5">
                    <div>
                        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">View Announcement</h2>
                        <p class="text-slate-500 dark:text-navy-200">Announcement details and information</p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('cms.announcements.edit', $announcement) }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                            <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </a>
                        <a href="{{ route('cms.announcements.index') }}" class="btn bg-secondary font-medium text-white hover:bg-secondary-focus focus:bg-secondary-focus active:bg-secondary-focus/90">
                            <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to List
                        </a>
                    </div>
                </div>

                <div class="p-4 sm:p-5">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2 space-y-6">
                            <div>
                                <h2 class="text-2xl font-bold text-slate-800 dark:text-navy-50 mb-4">{{ $announcement->title }}</h2>
                                
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $announcement->type === 'tender' ? 'bg-yellow-100 text-yellow-800' : ($announcement->type === 'notice' ? 'bg-blue-100 text-blue-800' : ($announcement->type === 'corrigendum' ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800')) }}">
                                        {{ ucfirst($announcement->type) }}
                                    </span>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $announcement->priority === 'high' ? 'bg-red-100 text-red-800' : ($announcement->priority === 'normal' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800') }}">
                                        {{ ucfirst($announcement->priority) }} Priority
                                    </span>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $announcement->status === 'active' ? 'bg-green-100 text-green-800' : ($announcement->status === 'inactive' ? 'bg-gray-100 text-gray-800' : 'bg-yellow-100 text-yellow-800') }}">
                                        {{ ucfirst($announcement->status) }}
                                    </span>
                                    @if($announcement->is_featured)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Featured</span>
                                    @endif
                                </div>

                                <div class="text-slate-600 dark:text-navy-200 mb-6">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <strong class="text-slate-700 dark:text-navy-100">Published:</strong> {{ $announcement->published_date->format('M d, Y') }}
                                        </div>
                                        @if($announcement->expiry_date)
                                        <div>
                                            <strong class="text-slate-700 dark:text-navy-100">Expires:</strong> {{ $announcement->expiry_date->format('M d, Y') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                                        <div>
                                            <strong class="text-slate-700 dark:text-navy-100">Created:</strong> {{ $announcement->created_at->format('M d, Y H:i') }}
                                        </div>
                                        <div>
                                            <strong class="text-slate-700 dark:text-navy-100">Updated:</strong> {{ $announcement->updated_at->format('M d, Y H:i') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-6">
                                <h5 class="text-lg font-semibold text-slate-800 dark:text-navy-50 mb-3">Description</h5>
                                <p class="text-slate-600 dark:text-navy-200">{{ $announcement->description }}</p>
                            </div>

                            @if($announcement->content)
                            <div class="mb-6">
                                <h5 class="text-lg font-semibold text-slate-800 dark:text-navy-50 mb-3">Content</h5>
                                <div class="border border-slate-200 dark:border-navy-500 rounded-lg p-4 bg-slate-50 dark:bg-navy-600">
                                    {!! $announcement->content !!}
                                </div>
                            </div>
                            @endif

                            @if($announcement->external_url)
                            <div class="mb-6">
                                <h5 class="text-lg font-semibold text-slate-800 dark:text-navy-50 mb-3">External Link</h5>
                                <a href="{{ $announcement->external_url }}" target="_blank" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                                    <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                    Visit External Link
                                </a>
                            </div>
                            @endif

                            @if($announcement->file_path)
                            <div class="mb-6">
                                <h5 class="text-lg font-semibold text-slate-800 dark:text-navy-50 mb-3">Attachment</h5>
                                <div class="flex items-center gap-4 p-4 border border-slate-200 dark:border-navy-500 rounded-lg bg-slate-50 dark:bg-navy-600">
                                    <div class="w-12 h-12 bg-slate-200 dark:bg-navy-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-slate-500 dark:text-navy-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-slate-800 dark:text-navy-50">{{ $announcement->file_name }}</div>
                                        <small class="text-slate-500 dark:text-navy-300">
                                            @php
                                                $fileExists = Storage::disk('public')->exists($announcement->file_path);
                                                $fileSize = $fileExists ? Storage::disk('public')->size($announcement->file_path) : 0;
                                            @endphp
                                            @if($fileExists)
                                                {{ number_format($fileSize) }} bytes
                                            @else
                                                File not found
                                            @endif
                                        </small>
                                    </div>
                                    @if($fileExists)
                                    <a href="{{ Storage::disk('public')->url($announcement->file_path) }}" target="_blank" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        Download
                                    </a>
                                    @else
                                    <span class="btn bg-gray-400 font-medium text-white cursor-not-allowed">
                                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        File Not Found
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="space-y-6">
                            <div class="card">
                                <div class="p-4 border-b border-slate-200 dark:border-navy-500">
                                    <h6 class="text-sm font-semibold text-slate-800 dark:text-navy-50">Announcement Details</h6>
                                </div>
                                <div class="p-4">
                                    <div class="space-y-3">
                                        <div class="flex justify-between">
                                            <span class="text-sm text-slate-600 dark:text-navy-200">Type:</span>
                                            <span class="text-sm font-medium text-slate-800 dark:text-navy-50">{{ ucfirst($announcement->type) }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-slate-600 dark:text-navy-200">Status:</span>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $announcement->status === 'active' ? 'bg-green-100 text-green-800' : ($announcement->status === 'inactive' ? 'bg-gray-100 text-gray-800' : 'bg-yellow-100 text-yellow-800') }}">
                                                {{ ucfirst($announcement->status) }}
                                            </span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-slate-600 dark:text-navy-200">Priority:</span>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $announcement->priority === 'high' ? 'bg-red-100 text-red-800' : ($announcement->priority === 'normal' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800') }}">
                                                {{ ucfirst($announcement->priority) }}
                                            </span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-slate-600 dark:text-navy-200">Featured:</span>
                                            @if($announcement->is_featured)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Yes</span>
                                            @else
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">No</span>
                                            @endif
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-slate-600 dark:text-navy-200">Sort Order:</span>
                                            <span class="text-sm font-medium text-slate-800 dark:text-navy-50">{{ $announcement->sort_order }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-slate-600 dark:text-navy-200">Published:</span>
                                            <span class="text-sm font-medium text-slate-800 dark:text-navy-50">{{ $announcement->published_date->format('M d, Y') }}</span>
                                        </div>
                                        @if($announcement->expiry_date)
                                        <div class="flex justify-between">
                                            <span class="text-sm text-slate-600 dark:text-navy-200">Expires:</span>
                                            <span class="text-sm font-medium text-slate-800 dark:text-navy-50">{{ $announcement->expiry_date->format('M d, Y') }}</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="p-4 border-b border-slate-200 dark:border-navy-500">
                                    <h6 class="text-sm font-semibold text-slate-800 dark:text-navy-50">Quick Actions</h6>
                                </div>
                                <div class="p-4">
                                    <div class="space-y-3">
                                        <a href="{{ route('frontend.announcements.show', $announcement) }}" 
                                           target="_blank" class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90 w-full">
                                            <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            View on Frontend
                                        </a>
                                        <a href="{{ route('cms.announcements.edit', $announcement) }}" 
                                           class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 w-full">
                                            <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            Edit Announcement
                                        </a>
                                        <form action="{{ route('cms.announcements.destroy', $announcement) }}" 
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this announcement?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn bg-error font-medium text-white hover:bg-error-focus focus:bg-error-focus active:bg-error-focus/90 w-full">
                                                <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
