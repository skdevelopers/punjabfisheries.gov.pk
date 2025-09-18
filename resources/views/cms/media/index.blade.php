<x-app-layout title="Media Library" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 sm:mt-5 lg:mt-6">
                    <!-- Header -->
            <div class="mb-4 flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
                    <h1 class="text-2xl font-semibold text-slate-800 dark:text-slate-100">Media Library</h1>
                    <p class="text-slate-500 dark:text-slate-300">Manage your media files like WordPress</p>
        </div>
                <div class="mt-3 flex gap-2 sm:mt-0">
                    <button type="button" 
                            class="inline-flex items-center rounded-md border border-transparent bg-primary px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-primary-focus focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2"
                            onclick="openUploadModal(); return false;">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        Add New
                    </button>
                    <button type="button" 
                            class="inline-flex items-center rounded-md border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100"
                            onclick="openCreateGalleryModal(); return false;">
                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        New Gallery
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="flex h-8 w-8 items-center justify-center rounded-md bg-primary text-white">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Media</p>
                            <p class="text-2xl font-semibold text-slate-900 dark:text-slate-100">{{ $stats['total_media'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="flex h-8 w-8 items-center justify-center rounded-md bg-emerald-500 text-white">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Images</p>
                            <p class="text-2xl font-semibold text-slate-900 dark:text-slate-100">{{ $stats['images'] }}</p>
                        </div>
                        </div>
                    </div>

                <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="flex h-8 w-8 items-center justify-center rounded-md bg-blue-500 text-white">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Documents</p>
                            <p class="text-2xl font-semibold text-slate-900 dark:text-slate-100">{{ $stats['documents'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="flex h-8 w-8 items-center justify-center rounded-md bg-amber-500 text-white">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Size</p>
                            <p class="text-2xl font-semibold text-slate-900 dark:text-slate-100">{{ number_format($stats['total_size'] / 1024 / 1024, 1) }} MB</p>
                        </div>
                    </div>
                        </div>
    </div>

            <!-- Search and Filter -->
            <div class="mb-6 rounded-lg border border-slate-200 bg-white p-4 dark:border-slate-700 dark:bg-slate-800">
                <form method="GET" class="space-y-4 sm:space-y-0 sm:flex sm:items-center sm:space-x-4">
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-200">Search</label>
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}" 
                               placeholder="Search media files..."
                               class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-slate-900 placeholder:text-slate-400 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-200">Type</label>
                        <select name="type" 
                                class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-slate-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                            <option value="">All Types</option>
                            <option value="images" {{ request('type') == 'images' ? 'selected' : '' }}>Images</option>
                            <option value="documents" {{ request('type') == 'documents' ? 'selected' : '' }}>Documents</option>
                            <option value="videos" {{ request('type') == 'videos' ? 'selected' : '' }}>Videos</option>
                            <option value="audio" {{ request('type') == 'audio' ? 'selected' : '' }}>Audio</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-200">From Date</label>
                        <input type="date" 
                               name="date_from" 
                               value="{{ request('date_from') }}"
                               class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-slate-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-200">To Date</label>
                        <input type="date" 
                               name="date_to" 
                               value="{{ request('date_to') }}"
                               class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-slate-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                    </div>
                    <div class="flex space-x-2">
                        <button type="submit" 
                                class="inline-flex items-center rounded-md border border-transparent bg-primary px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-primary-focus focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Filter
                        </button>
                        <a href="{{ route('cms.media') }}" 
                           class="inline-flex items-center rounded-md border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm hover:bg-slate-50 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
                            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Clear
                        </a>
                    </div>
                </form>
            </div>

            <!-- Media Files Section -->
            <div class="rounded-lg border border-slate-200 bg-white dark:border-slate-700 dark:bg-slate-800">
                <div class="border-b border-slate-200 px-4 py-3 dark:border-slate-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium text-slate-900 dark:text-slate-100">Media Files</h3>
                        <div class="flex items-center space-x-2">
                            <button type="button" 
                                    onclick="testModal()"
                                    class="inline-flex items-center rounded-md border border-transparent bg-blue-600 px-3 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Test Modal
                            </button>
                            <button type="button" 
                                    id="bulkDeleteBtn" 
                                    disabled
                                    class="inline-flex items-center rounded-md border border-transparent bg-red-600 px-3 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed">
                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete Selected
                            </button>
                            <div class="flex rounded-md shadow-sm" role="group">
                                <button type="button" 
                                        class="inline-flex items-center rounded-l-md border border-slate-300 bg-white px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 focus:z-10 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                    </svg>
                                </button>
                                <button type="button" 
                                        class="inline-flex items-center rounded-r-md border border-slate-300 bg-white px-3 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 focus:z-10 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
            
                <div class="p-4">
                    @if($galleries->count() > 0)
                        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6">
                            @foreach($galleries as $gallery)
                                @if($gallery->media->count() > 0)
                                @foreach($gallery->media as $media)
                                    <div class="group relative overflow-hidden rounded-lg border border-slate-200 bg-white shadow-sm hover:shadow-xl hover:border-primary/20 transition-all duration-300 transform hover:-translate-y-1 dark:border-slate-700 dark:bg-slate-800">
                                        <div class="relative">
                                            @if(str_starts_with($media->mime_type, 'image/'))
                                                <img src="{{ $media->getUrl('thumb') }}" 
                                                     class="h-32 w-full object-cover group-hover:scale-105 transition-transform duration-300 cursor-pointer" 
                                                     alt="{{ $media->name }}"
                                                     onclick="viewMedia({{ $media->id }})">
                                            @elseif(str_starts_with($media->mime_type, 'video/'))
                                                <div class="flex h-32 w-full items-center justify-center bg-slate-100 dark:bg-slate-700 cursor-pointer" onclick="viewMedia({{ $media->id }})">
                                                    <svg class="h-8 w-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                            @elseif(str_starts_with($media->mime_type, 'audio/'))
                                                <div class="flex h-32 w-full items-center justify-center bg-slate-100 dark:bg-slate-700 cursor-pointer" onclick="viewMedia({{ $media->id }})">
                                                    <svg class="h-8 w-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                    </svg>
                                                </div>
                                            @else
                                                <div class="flex h-32 w-full items-center justify-center bg-slate-100 dark:bg-slate-700 cursor-pointer" onclick="viewMedia({{ $media->id }})">
                                                    <svg class="h-8 w-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                                </div>
                                            @endif
                                            
                                            <!-- Checkbox -->
                                            <div class="absolute top-2 right-2">
                                                <input type="checkbox" 
                                                       class="h-4 w-4 rounded border-slate-300 text-primary focus:ring-primary media-checkbox" 
                                                       value="{{ $media->id }}">
                                </div>
                                
                                            <!-- Collection Badge -->
                                            <div class="absolute top-2 left-2">
                                                <span class="inline-flex items-center rounded-full px-2 py-1 text-xs font-medium 
                                                    @if($media->collection_name === 'images') bg-emerald-100 text-emerald-800
                                                    @elseif($media->collection_name === 'documents') bg-blue-100 text-blue-800
                                                    @elseif($media->collection_name === 'videos') bg-purple-100 text-purple-800
                                                    @elseif($media->collection_name === 'audio') bg-pink-100 text-pink-800
                                                    @else bg-gray-100 text-gray-800
                                                    @endif">
                                                    {{ ucfirst($media->collection_name) }}
                                                </span>
                                            </div>
                                            
                </div>
                
                                        <div class="p-3">
                                            <h4 class="truncate text-sm font-medium text-slate-900 dark:text-slate-100" title="{{ $media->name }}">
                                                {{ $media->name }}
                                            </h4>
                                            <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">
                                                {{ number_format($media->size / 1024, 1) }} KB • {{ $media->created_at->format('M d, Y') }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                                @endif
                            @endforeach
                                </div>
                                
                        <!-- Pagination -->
                        <div class="mt-6 flex justify-center">
                            {{ $galleries->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-slate-900 dark:text-slate-100">No media files found</h3>
                            <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Upload your first media file to get started.</p>
                            <div class="mt-6">
                                <button type="button" 
                                        onclick="openUploadModal(); return false;"
                                        class="inline-flex items-center rounded-md border border-transparent bg-primary px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-primary-focus focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                    Upload Media
                                    </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Upload Modal -->
        <div id="uploadModal" class="fixed inset-0 z-50 hidden bg-gray-500 bg-opacity-75" onclick="closeUploadModal()">
            <div class="flex min-h-screen items-center justify-center p-4" onclick="event.stopPropagation()">
                <div class="bg-white rounded-lg shadow-xl max-w-lg w-full dark:bg-slate-800">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-slate-700">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-slate-100">Upload Media Files</h3>
                    </div>
                    <form id="uploadForm" enctype="multipart/form-data" class="p-6 space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-slate-200">Select Gallery</label>
                            <select name="gallery_id" required class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-gray-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                                <option value="">Choose a gallery...</option>
                                @if(isset($allGalleries) && $allGalleries->count() > 0)
                                    @foreach($allGalleries as $gallery)
                                        <option value="{{ $gallery->id }}">{{ $gallery->title }}</option>
                                    @endforeach
                                @else
                                    <option value="" disabled>No galleries available</option>
                                @endif
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-slate-200">Collection Type</label>
                            <select name="collection_name" required class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-gray-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                                <option value="images">Images</option>
                                <option value="documents">Documents</option>
                                <option value="videos">Videos</option>
                                <option value="audio">Audio</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-slate-200">Choose Files</label>
                            <input type="file" name="files[]" multiple accept="image/*,video/*,audio/*,.pdf,.doc,.docx,.xls,.xlsx,.txt,.csv" required class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-focus">
                            <p class="mt-1 text-sm text-gray-500 dark:text-slate-400">Maximum file size: 10MB per file</p>
                        </div>
                        <div id="uploadProgress" class="hidden">
                            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                                <div class="bg-primary h-2.5 rounded-full transition-all duration-300" style="width: 0%"></div>
                            </div>
                </div>
            </form>
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 dark:bg-slate-700 dark:border-slate-600 flex justify-end space-x-3">
                        <button type="button" onclick="closeUploadModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary dark:bg-slate-800 dark:text-slate-100 dark:border-slate-600">Cancel</button>
                        <button type="submit" form="uploadForm" class="px-4 py-2 text-sm font-medium text-white bg-primary border border-transparent rounded-md hover:bg-primary-focus focus:outline-none focus:ring-2 focus:ring-primary">Upload Files</button>
        </div>
    </div>
            </div>
        </div>

        <!-- Create Gallery Modal -->
        <div id="createGalleryModal" class="fixed inset-0 z-50 hidden bg-gray-500 bg-opacity-75" onclick="closeCreateGalleryModal()">
            <div class="flex min-h-screen items-center justify-center p-4" onclick="event.stopPropagation()">
                <div class="bg-white rounded-lg shadow-xl max-w-lg w-full dark:bg-slate-800">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-slate-700">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-slate-100">Create New Gallery</h3>
                    </div>
                    <form id="createGalleryForm" class="p-6 space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-slate-200">Gallery Name</label>
                            <input type="text" name="title" required class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-gray-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-slate-200">Description</label>
                            <textarea name="description" rows="3" class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-gray-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100"></textarea>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" name="is_public" value="1" id="isPublic" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary">
                            <label for="isPublic" class="ml-2 block text-sm text-gray-700 dark:text-slate-200">Public Gallery</label>
    </div>
                    </form>
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 dark:bg-slate-700 dark:border-slate-600 flex justify-end space-x-3">
                        <button type="button" onclick="closeCreateGalleryModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary dark:bg-slate-800 dark:text-slate-100 dark:border-slate-600">Cancel</button>
                        <button type="submit" form="createGalleryForm" class="px-4 py-2 text-sm font-medium text-white bg-primary border border-transparent rounded-md hover:bg-primary-focus focus:outline-none focus:ring-2 focus:ring-primary">Create Gallery</button>
                    </div>
                </div>
            </div>
                </div>

        <!-- Media Details Modal -->
        <div id="mediaDetailsModal" onclick="closeMediaDetailsModal()" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); z-index: 9999;">
            <div onclick="event.stopPropagation()" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border-radius: 8px; max-width: 80%; max-height: 80%; overflow-y: auto; box-shadow: 0 4px 20px rgba(0,0,0,0.3);">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                    <h3 style="margin: 0; font-size: 24px; color: #333;">Media Details</h3>
                    <button onclick="closeMediaDetailsModal()" style="background: #dc3545; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer; font-size: 18px;">&times;</button>
                </div>
                <div id="mediaDetailsContent">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>

        <!-- Edit Media Modal -->
        <div id="editMediaModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex min-h-screen items-end justify-center px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="closeEditMediaModal()"></div>
                <span class="hidden sm:inline-block sm:h-screen sm:align-middle" aria-hidden="true">&#8203;</span>
                <div class="inline-block transform overflow-hidden rounded-lg bg-white text-left align-bottom shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:align-middle dark:bg-slate-800">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 dark:bg-slate-800">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-slate-100" id="modal-title">
                                    Edit Media
                                </h3>
                                <form id="editMediaForm" class="mt-4 space-y-4">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="media_id" id="editMediaId">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-slate-200">Name</label>
                                        <input type="text" name="name" id="editMediaName" required class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-gray-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-slate-200">Alt Text</label>
                                        <input type="text" name="alt_text" id="editMediaAltText" class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-gray-900 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary dark:border-slate-600 dark:bg-slate-900 dark:text-slate-100">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 dark:bg-slate-700">
                        <button type="button" onclick="closeEditMediaModal()" class="inline-flex w-full justify-center rounded-md border border-transparent bg-primary px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-primary-focus focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Update Media</button>
                        <button type="button" onclick="closeEditMediaModal()" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm dark:border-slate-600 dark:bg-slate-800 dark:text-slate-100">Cancel</button>
                    </div>
        </div>
    </div>
</div>

    </main>

<script>
    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Media Library JavaScript loaded');
    });

    // Modal functions
function openUploadModal() {
        console.log('Opening upload modal...');
        const modal = document.getElementById('uploadModal');
        if (modal) {
            modal.classList.remove('hidden');
            console.log('Modal opened successfully');
        } else {
            console.error('Upload modal not found!');
        }
}

function closeUploadModal() {
        document.getElementById('uploadModal').classList.add('hidden');
    }

    function openCreateGalleryModal() {
        document.getElementById('createGalleryModal').classList.remove('hidden');
    }

    function closeCreateGalleryModal() {
        document.getElementById('createGalleryModal').classList.add('hidden');
    }

    function closeMediaDetailsModal() {
        document.getElementById('mediaDetailsModal').style.display = 'none';
    }

    function closeEditMediaModal() {
        document.getElementById('editMediaModal').classList.add('hidden');
    }

    // Test modal function
    function testModal() {
        console.log('Testing modal...');
        document.getElementById('mediaDetailsContent').innerHTML = `
            <div style="text-align: center; padding: 20px;">
                <h3 style="color: #333; margin-bottom: 15px;">Test Modal</h3>
                <p style="color: #666; margin-bottom: 20px;">This is a test modal to check if modals work properly.</p>
                <button onclick="closeMediaDetailsModal()" style="padding: 10px 20px; background: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;">Close Test Modal</button>
            </div>
        `;
        document.getElementById('mediaDetailsModal').style.display = 'block';
    }

    // Media management functions
    function viewMedia(mediaId) {
        console.log('Fetching media details for ID:', mediaId);
        fetch(`/cms/media-library/${mediaId}`)
            .then(response => {
                console.log('Response status:', response.status);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Media data received:', data);
                if (data.success) {
                    showMediaDetails(data.media);
                } else {
                    console.error('API returned success: false', data);
                    alert('Error loading media details: ' + (data.message || 'Unknown error'));
                }
            })
            .catch(error => {
                console.error('Error fetching media details:', error);
                alert('Error loading media details: ' + error.message);
            });
    }

    function editMedia(mediaId) {
        fetch(`/cms/media-library/${mediaId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('editMediaId').value = data.media.id;
                    document.getElementById('editMediaName').value = data.media.name;
                    document.getElementById('editMediaAltText').value = data.media.alt_text || '';
                    document.getElementById('editMediaModal').classList.remove('hidden');
                }
            });
    }

    function deleteMedia(mediaId) {
        if (confirm('Are you sure you want to delete this media file?')) {
            fetch(`/cms/media-library/${mediaId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                } else {
                    alert('Error deleting media: ' + data.message);
                    }
                });
            }
        }

    // Copy to clipboard function
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            // Show a temporary success message
            const button = event.target;
            const originalText = button.textContent;
            button.textContent = 'Copied!';
            button.classList.add('bg-green-100', 'text-green-800');
            setTimeout(() => {
                button.textContent = originalText;
                button.classList.remove('bg-green-100', 'text-green-800');
            }, 2000);
        }).catch(function(err) {
            console.error('Could not copy text: ', err);
            alert('Failed to copy to clipboard');
        });
        }

    function showMediaDetails(media) {
        console.log('Showing media details for:', media);
        
        // Get media URLs
        const mediaUrl = media.url || media.thumb_url || '#';
        const thumbUrl = media.thumb_url || media.url || '#';
        
        // Create simple content
        const content = `
            <div style="text-align: center;">
                <img src="${thumbUrl}" style="max-width: 300px; max-height: 300px; border: 2px solid #ddd; border-radius: 8px; margin-bottom: 15px;" alt="${media.name}">
                <div style="text-align: left; background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 15px;">
                    <h4 style="margin: 0 0 10px 0; color: #333;">File Information</h4>
                    <p style="margin: 5px 0;"><strong>Name:</strong> ${media.name}</p>
                    <p style="margin: 5px 0;"><strong>Size:</strong> ${(media.size / 1024).toFixed(1)} KB</p>
                    <p style="margin: 5px 0;"><strong>Type:</strong> ${media.mime_type}</p>
                    <p style="margin: 5px 0;"><strong>Uploaded:</strong> ${new Date(media.created_at).toLocaleDateString()}</p>
                </div>
                <div style="display: flex; gap: 10px; justify-content: center;">
                    <a href="${mediaUrl}" target="_blank" style="padding: 8px 16px; background: #007bff; color: white; text-decoration: none; border-radius: 4px;">View Full Size</a>
                    <a href="${mediaUrl}" download style="padding: 8px 16px; background: #28a745; color: white; text-decoration: none; border-radius: 4px;">Download</a>
                </div>
            </div>
        `;
        
        // Set content and show modal
        document.getElementById('mediaDetailsContent').innerHTML = content;
        document.getElementById('mediaDetailsModal').style.display = 'block';
        
        console.log('Modal should be visible now');
    }

    // Form submissions
    document.getElementById('uploadForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const progressBar = document.getElementById('uploadProgress');
        const progressFill = progressBar.querySelector('.bg-primary');
        
        progressBar.classList.remove('hidden');
        
        fetch('/cms/media-library/upload', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            console.log('Response status:', response.status);
            console.log('Response headers:', response.headers);
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
            if (data.success) {
                console.log('Upload successful, reloading page...');
                setTimeout(() => {
                    location.reload();
                }, 100);
            } else {
                alert('Error uploading files: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error uploading files');
        })
        .finally(() => {
            progressBar.classList.add('hidden');
        });
    });

    document.getElementById('createGalleryForm').addEventListener('submit', function(e) {
            e.preventDefault();
        
        const formData = new FormData(this);
        
        fetch('/cms/media-library/gallery', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error creating gallery: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error creating gallery');
        });
    });

    document.getElementById('editMediaForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const mediaId = document.getElementById('editMediaId').value;
        
        fetch(`/cms/media-library/${mediaId}`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-HTTP-Method-Override': 'PUT'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error updating media: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error updating media');
        });
    });

    // Bulk delete functionality
    document.getElementById('bulkDeleteBtn').addEventListener('click', function() {
        const selectedCheckboxes = document.querySelectorAll('.media-checkbox:checked');
        if (selectedCheckboxes.length === 0) {
            alert('Please select media files to delete');
                return;
            }
    
        if (confirm(`Are you sure you want to delete ${selectedCheckboxes.length} media file(s)?`)) {
            const mediaIds = Array.from(selectedCheckboxes).map(cb => cb.value);
            
            fetch('/cms/media-library/bulk-delete', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ media_ids: mediaIds })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                        location.reload();
                } else {
                    alert('Error deleting media: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error deleting media');
            });
        }
    });

    // Checkbox change handler for bulk actions
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('media-checkbox')) {
            const selectedCheckboxes = document.querySelectorAll('.media-checkbox:checked');
            const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
            
            if (selectedCheckboxes.length > 0) {
                bulkDeleteBtn.disabled = false;
                bulkDeleteBtn.textContent = `Delete Selected (${selectedCheckboxes.length})`;
            } else {
                bulkDeleteBtn.disabled = true;
                bulkDeleteBtn.textContent = 'Delete Selected';
            }
        }
    });

    // Helper function for collection badge colors
    function getCollectionBadgeColor(collection) {
        const colors = {
            'images': 'bg-emerald-100 text-emerald-800',
            'documents': 'bg-blue-100 text-blue-800',
            'videos': 'bg-purple-100 text-purple-800',
            'audio': 'bg-pink-100 text-pink-800'
        };
        return colors[collection] || 'bg-gray-100 text-gray-800';
    }
    </script>

</x-app-layout>
