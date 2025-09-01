<x-app-layout title="View Category" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 sm:mt-5 lg:mt-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                <div>
                    <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">View Category</h1>
                    <p class="text-slate-500 dark:text-navy-200">Category details and posts</p>
                </div>
                <div class="mt-4 sm:mt-0 flex space-x-2">
                    <a href="{{ route('cms.blog-categories.edit', $category) }}" class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Category
                    </a>
                    <a href="{{ route('cms.blog-categories.index') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Categories
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Category Details -->
                    <div class="card p-4 sm:p-5">
                        <div class="flex items-center space-x-4 mb-6">
                            @if($category->icon)
                                <div class="size-16 rounded-full bg-{{ $category->color }}/10 flex items-center justify-center">
                                    <i class="{{ $category->icon }} text-2xl text-{{ $category->color }}"></i>
                                </div>
                            @else
                                <div class="size-16 rounded-full bg-{{ $category->color }}/10 flex items-center justify-center">
                                    <svg class="size-8 text-{{ $category->color }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div>
                                <h1 class="text-3xl font-bold text-slate-800 dark:text-navy-50">{{ $category->name }}</h1>
                                <p class="text-slate-500 dark:text-navy-200">{{ $category->slug }}</p>
                            </div>
                        </div>

                        @if($category->description)
                        <div class="mb-6 p-4 bg-slate-50 dark:bg-navy-600 rounded-lg">
                            <p class="text-slate-700 dark:text-navy-100">{{ $category->description }}</p>
                        </div>
                        @endif

                        <!-- Status Badges -->
                        <div class="flex flex-wrap gap-2 mb-6">
                            @if($category->is_active)
                                <span class="badge bg-success/10 text-success border-success/20">Active</span>
                            @else
                                <span class="badge bg-slate-500/10 text-slate-500 border-slate-500/20">Inactive</span>
                            @endif
                            <span class="badge bg-{{ $category->color }}/10 text-{{ $category->color }} border-{{ $category->color }}/20">
                                Order: {{ $category->order }}
                            </span>
                        </div>
                    </div>

                    <!-- Posts in this Category -->
                    <div class="card p-4 sm:p-5">
                        <h3 class="text-lg font-medium text-slate-800 dark:text-navy-50 mb-4">Posts in this Category ({{ $category->posts->count() }})</h3>
                        
                        @if($category->posts->count() > 0)
                            <div class="space-y-4">
                                @foreach($category->posts as $post)
                                <div class="p-4 border border-slate-200 dark:border-navy-500 rounded-lg">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <h4 class="font-medium text-slate-800 dark:text-navy-50 mb-1">
                                                <a href="{{ route('cms.blog.show', $post) }}" class="hover:text-primary">
                                                    {{ $post->title }}
                                                </a>
                                            </h4>
                                            <p class="text-sm text-slate-500 dark:text-navy-200 mb-2">{{ Str::limit($post->excerpt, 100) }}</p>
                                            <div class="flex items-center space-x-4 text-xs text-slate-500 dark:text-navy-200">
                                                <span>{{ $post->author->name }}</span>
                                                <span>{{ $post->created_at->format('M d, Y') }}</span>
                                                <span>{{ number_format($post->view_count) }} views</span>
                                                @if($post->status === 'published')
                                                    <span class="text-success">Published</span>
                                                @elseif($post->status === 'draft')
                                                    <span class="text-warning">Draft</span>
                                                @else
                                                    <span class="text-slate-500">Archived</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-2 ml-4">
                                            <a href="{{ route('cms.blog.show', $post) }}" class="btn size-8 p-0 text-slate-500 hover:text-slate-700 dark:text-navy-300 dark:hover:text-navy-100">
                                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </a>
                                            <a href="{{ route('cms.blog.edit', $post) }}" class="btn size-8 p-0 text-slate-500 hover:text-slate-700 dark:text-navy-300 dark:hover:text-navy-100">
                                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="size-12 mx-auto mb-4 text-slate-300 dark:text-navy-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                                <p class="text-slate-500 dark:text-navy-200">No posts in this category yet.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Category Information -->
                    <div class="card p-4">
                        <h3 class="text-lg font-medium text-slate-800 dark:text-navy-50 mb-4">Category Information</h3>
                        <div class="space-y-3">
                            <div>
                                <span class="text-sm font-medium text-slate-600 dark:text-navy-200">Status:</span>
                                <span class="ml-2 text-sm text-slate-800 dark:text-navy-50">
                                    @if($category->is_active)
                                        <span class="text-success">Active</span>
                                    @else
                                        <span class="text-slate-500">Inactive</span>
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-slate-600 dark:text-navy-200">Color:</span>
                                <div class="flex items-center space-x-2 mt-1">
                                    <div class="size-6 rounded-full" style="background-color: {{ $category->color }};"></div>
                                    <span class="text-sm text-slate-800 dark:text-navy-50">{{ $category->color }}</span>
                                </div>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-slate-600 dark:text-navy-200">Display Order:</span>
                                <span class="ml-2 text-sm text-slate-800 dark:text-navy-50">{{ $category->order }}</span>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-slate-600 dark:text-navy-200">Total Posts:</span>
                                <span class="ml-2 text-sm text-slate-800 dark:text-navy-50">{{ $category->posts->count() }}</span>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-slate-600 dark:text-navy-200">Created:</span>
                                <span class="ml-2 text-sm text-slate-800 dark:text-navy-50">{{ $category->created_at->format('M d, Y H:i') }}</span>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-slate-600 dark:text-navy-200">Updated:</span>
                                <span class="ml-2 text-sm text-slate-800 dark:text-navy-50">{{ $category->updated_at->format('M d, Y H:i') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="card p-4">
                        <h3 class="text-lg font-medium text-slate-800 dark:text-navy-50 mb-4">Quick Actions</h3>
                        <div class="space-y-3">
                            <form method="POST" action="{{ route('cms.blog-categories.toggle-status', $category) }}" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn {{ $category->is_active ? 'bg-warning text-white' : 'bg-success text-white' }} font-medium hover:bg-{{ $category->is_active ? 'warning-focus' : 'success-focus' }} focus:bg-{{ $category->is_active ? 'warning-focus' : 'success-focus' }} active:bg-{{ $category->is_active ? 'warning-focus' : 'success-focus' }}/90 w-full">
                                    <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        @if($category->is_active)
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728"></path>
                                        @else
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        @endif
                                    </svg>
                                    {{ $category->is_active ? 'Deactivate' : 'Activate' }} Category
                                </button>
                            </form>

                            <a href="{{ route('cms.blog.create', ['category_id' => $category->id]) }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90 w-full">
                                <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Create Post in this Category
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
