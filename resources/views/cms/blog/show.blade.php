<x-app-layout title="View Blog Post" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 sm:mt-5 lg:mt-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                <div>
                    <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">View Blog Post</h1>
                    <p class="text-slate-500 dark:text-navy-200">Preview and manage your blog post</p>
                </div>
                <div class="mt-4 sm:mt-0 flex space-x-2">
                    <a href="{{ route('cms.blog.edit', $post) }}" class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Post
                    </a>
                    <a href="{{ route('cms.blog.index') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Posts
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Post Content -->
                    <div class="card p-4 sm:p-5">
                        <!-- Banner Image -->
                        @if($post->banner_image)
                        <div class="mb-6">
                            <img src="{{ asset('storage/' . $post->banner_image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover rounded-lg">
                        </div>
                        @endif

                        <!-- Title -->
                        <h1 class="text-3xl font-bold text-slate-800 dark:text-navy-50 mb-4">{{ $post->title }}</h1>

                        <!-- Meta Information -->
                        <div class="flex flex-wrap items-center gap-4 mb-6 text-sm text-slate-500 dark:text-navy-200">
                            <div class="flex items-center">
                                <svg class="size-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                {{ $post->author->name }}
                            </div>
                            <div class="flex items-center">
                                <svg class="size-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ $post->created_at->format('M d, Y') }}
                            </div>
                            @if($post->published_at)
                            <div class="flex items-center">
                                <svg class="size-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Published: {{ $post->published_at->format('M d, Y H:i') }}
                            </div>
                            @endif
                            <div class="flex items-center">
                                <svg class="size-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                {{ number_format($post->view_count) }} views
                            </div>
                        </div>

                        <!-- Status Badges -->
                        <div class="flex flex-wrap gap-2 mb-6">
                            @if($post->status === 'published')
                                <span class="badge bg-success/10 text-success border-success/20">Published</span>
                            @elseif($post->status === 'draft')
                                <span class="badge bg-warning/10 text-warning border-warning/20">Draft</span>
                            @else
                                <span class="badge bg-slate-500/10 text-slate-500 border-slate-500/20">Archived</span>
                            @endif

                            @if($post->is_featured)
                                <span class="badge bg-primary/10 text-primary border-primary/20">Featured</span>
                            @endif

                            <span class="badge bg-{{ $post->category->color }}/10 text-{{ $post->category->color }} border-{{ $post->category->color }}/20">
                                {{ $post->category->name }}
                            </span>
                        </div>

                        <!-- Excerpt -->
                        @if($post->excerpt)
                        <div class="mb-6 p-4 bg-slate-50 dark:bg-navy-600 rounded-lg">
                            <p class="text-slate-700 dark:text-navy-100 italic">{{ $post->excerpt }}</p>
                        </div>
                        @endif

                        <!-- Content -->
                        <div class="prose prose-slate dark:prose-invert max-w-none">
                            {!! nl2br(e($post->content)) !!}
                        </div>

                        <!-- Tags -->
                        @if($post->tags->count() > 0)
                        <div class="mt-6 pt-6 border-t border-slate-200 dark:border-navy-500">
                            <h3 class="text-lg font-medium text-slate-800 dark:text-navy-50 mb-3">Tags</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($post->tags as $tag)
                                    <span class="badge bg-{{ $tag->color }}/10 text-{{ $tag->color }} border-{{ $tag->color }}/20">
                                        {{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Comments Section -->
                    @if($post->allow_comments)
                    <div class="card p-4 sm:p-5">
                        <h3 class="text-lg font-medium text-slate-800 dark:text-navy-50 mb-4">Comments ({{ $post->comments->count() }})</h3>
                        
                        @if($post->comments->count() > 0)
                            <div class="space-y-4">
                                @foreach($post->comments as $comment)
                                <div class="p-4 border border-slate-200 dark:border-navy-500 rounded-lg">
                                    <div class="flex items-start justify-between mb-2">
                                        <div>
                                            <h4 class="font-medium text-slate-800 dark:text-navy-50">{{ $comment->name }}</h4>
                                            <p class="text-xs text-slate-500 dark:text-navy-200">{{ $comment->email }}</p>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            @if($comment->status === 'approved')
                                                <span class="badge bg-success/10 text-success border-success/20">Approved</span>
                                            @elseif($comment->status === 'pending')
                                                <span class="badge bg-warning/10 text-warning border-warning/20">Pending</span>
                                            @else
                                                <span class="badge bg-error/10 text-error border-error/20">Spam</span>
                                            @endif
                                            <span class="text-xs text-slate-500 dark:text-navy-200">{{ $comment->created_at->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                    <p class="text-slate-700 dark:text-navy-100">{{ $comment->comment }}</p>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-slate-500 dark:text-navy-200">No comments yet.</p>
                        @endif
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Quick Actions -->
                    <div class="card p-4">
                        <h3 class="text-lg font-medium text-slate-800 dark:text-navy-50 mb-4">Quick Actions</h3>
                        <div class="space-y-3">
                            @if($post->status === 'draft')
                                <form method="POST" action="{{ route('cms.blog.toggle-publish', $post) }}" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90 w-full">
                                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Publish Post
                                    </button>
                                </form>
                            @elseif($post->status === 'published')
                                <form method="POST" action="{{ route('cms.blog.toggle-publish', $post) }}" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90 w-full">
                                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Unpublish Post
                                    </button>
                                </form>
                            @endif

                            <form method="POST" action="{{ route('cms.blog.toggle-featured', $post) }}" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn {{ $post->is_featured ? 'bg-slate-150 text-slate-800' : 'bg-primary text-white' }} font-medium hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90 w-full">
                                    <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>
                                    {{ $post->is_featured ? 'Remove Featured' : 'Mark as Featured' }}
                                </button>
                            </form>

                            <a href="{{ url('/blog/' . $post->slug) }}" target="_blank" class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90 w-full">
                                <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                View on Frontend
                            </a>
                        </div>
                    </div>

                    <!-- Post Information -->
                    <div class="card p-4">
                        <h3 class="text-lg font-medium text-slate-800 dark:text-navy-50 mb-4">Post Information</h3>
                        <div class="space-y-3">
                            <div>
                                <span class="text-sm font-medium text-slate-600 dark:text-navy-200">Status:</span>
                                <span class="ml-2 text-sm text-slate-800 dark:text-navy-50">
                                    @if($post->status === 'published')
                                        <span class="text-success">Published</span>
                                    @elseif($post->status === 'draft')
                                        <span class="text-warning">Draft</span>
                                    @else
                                        <span class="text-slate-500">Archived</span>
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-slate-600 dark:text-navy-200">Category:</span>
                                <span class="ml-2 text-sm text-slate-800 dark:text-navy-50">{{ $post->category->name }}</span>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-slate-600 dark:text-navy-200">Author:</span>
                                <span class="ml-2 text-sm text-slate-800 dark:text-navy-50">{{ $post->author->name }}</span>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-slate-600 dark:text-navy-200">Created:</span>
                                <span class="ml-2 text-sm text-slate-800 dark:text-navy-50">{{ $post->created_at->format('M d, Y H:i') }}</span>
                            </div>
                            @if($post->published_at)
                            <div>
                                <span class="text-sm font-medium text-slate-600 dark:text-navy-200">Published:</span>
                                <span class="ml-2 text-sm text-slate-800 dark:text-navy-50">{{ $post->published_at->format('M d, Y H:i') }}</span>
                            </div>
                            @endif
                            <div>
                                <span class="text-sm font-medium text-slate-600 dark:text-navy-200">Views:</span>
                                <span class="ml-2 text-sm text-slate-800 dark:text-navy-50">{{ number_format($post->view_count) }}</span>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-slate-600 dark:text-navy-200">Comments:</span>
                                <span class="ml-2 text-sm text-slate-800 dark:text-navy-50">{{ $post->comments->count() }}</span>
                            </div>
                            <div>
                                <span class="text-sm font-medium text-slate-600 dark:text-navy-200">Reading Time:</span>
                                <span class="ml-2 text-sm text-slate-800 dark:text-navy-50">{{ $post->reading_time }} min</span>
                            </div>
                        </div>
                    </div>

                    <!-- SEO Information -->
                    <div class="card p-4">
                        <h3 class="text-lg font-medium text-slate-800 dark:text-navy-50 mb-4">SEO Information</h3>
                        <div class="space-y-3">
                            @if($post->meta_title)
                            <div>
                                <span class="text-sm font-medium text-slate-600 dark:text-navy-200">Meta Title:</span>
                                <p class="text-sm text-slate-800 dark:text-navy-50 mt-1">{{ $post->meta_title }}</p>
                            </div>
                            @endif
                            @if($post->meta_description)
                            <div>
                                <span class="text-sm font-medium text-slate-600 dark:text-navy-200">Meta Description:</span>
                                <p class="text-sm text-slate-800 dark:text-navy-50 mt-1">{{ $post->meta_description }}</p>
                            </div>
                            @endif
                            @if($post->meta_keywords)
                            <div>
                                <span class="text-sm font-medium text-slate-600 dark:text-navy-200">Meta Keywords:</span>
                                <p class="text-sm text-slate-800 dark:text-navy-50 mt-1">{{ $post->meta_keywords }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
