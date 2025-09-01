<x-app-layout title="Blog Posts" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 sm:mt-5 lg:mt-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                <div>
                    <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Blog Posts</h1>
                    <p class="text-slate-500 dark:text-navy-200">Manage your blog posts and content</p>
                </div>
                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('cms.blog.create') }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Create New Post
                    </a>
                </div>
            </div>

            <!-- Filters -->
            <div class="card p-4 sm:p-5 mb-4">
                <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Search</label>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search posts..." class="form-input w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Status</label>
                        <select name="status" class="form-select w-full">
                            <option value="">All Status</option>
                            <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Category</label>
                        <select name="category" class="form-select w-full">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            Filter
                        </button>
                        @if(request('search') || request('status') || request('category'))
                            <a href="{{ route('cms.blog.index') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90 ml-2">
                                Clear
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Posts List -->
            <div class="card p-0">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">Title</th>
                                <th class="whitespace-nowrap">Category</th>
                                <th class="whitespace-nowrap">Author</th>
                                <th class="whitespace-nowrap">Status</th>
                                <th class="whitespace-nowrap">Featured</th>
                                <th class="whitespace-nowrap">Views</th>
                                <th class="whitespace-nowrap">Created</th>
                                <th class="whitespace-nowrap">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        @if($post->featured_image)
                                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-12 h-12 rounded object-cover">
                                        @else
                                            <div class="w-12 h-12 rounded bg-slate-200 dark:bg-navy-600 flex items-center justify-center">
                                                <svg class="size-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                        <div>
                                            <h4 class="font-medium text-slate-800 dark:text-navy-50">{{ $post->title }}</h4>
                                            <p class="text-xs text-slate-500 dark:text-navy-200">{{ Str::limit($post->excerpt, 60) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $post->category->color }}/10 text-{{ $post->category->color }} border-{{ $post->category->color }}/20">
                                        {{ $post->category->name }}
                                    </span>
                                </td>
                                <td>
                                    <div class="flex items-center space-x-2">
                                        <div class="w-8 h-8 rounded-full bg-slate-200 dark:bg-navy-600 flex items-center justify-center">
                                            <span class="text-xs font-medium text-slate-600 dark:text-navy-200">
                                                {{ substr($post->author->name, 0, 1) }}
                                            </span>
                                        </div>
                                        <span class="text-sm text-slate-700 dark:text-navy-100">{{ $post->author->name }}</span>
                                    </div>
                                </td>
                                <td>
                                    @if($post->status === 'published')
                                        <span class="badge bg-success/10 text-success border-success/20">Published</span>
                                    @elseif($post->status === 'draft')
                                        <span class="badge bg-warning/10 text-warning border-warning/20">Draft</span>
                                    @else
                                        <span class="badge bg-slate-500/10 text-slate-500 border-slate-500/20">Archived</span>
                                    @endif
                                </td>
                                <td>
                                    @if($post->is_featured)
                                        <span class="badge bg-primary/10 text-primary border-primary/20">Featured</span>
                                    @else
                                        <span class="text-slate-400 dark:text-navy-300">-</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="text-sm text-slate-700 dark:text-navy-100">{{ number_format($post->view_count) }}</span>
                                </td>
                                <td>
                                    <span class="text-sm text-slate-500 dark:text-navy-200">{{ $post->created_at->format('M d, Y') }}</span>
                                </td>
                                <td>
                                    <div class="flex items-center space-x-2">
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
                                        <form method="POST" action="{{ route('cms.blog.destroy', $post) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn size-8 p-0 text-slate-500 hover:text-red-500 dark:text-navy-300 dark:hover:text-red-400">
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
                                    <div class="text-slate-500 dark:text-navy-200">
                                        <svg class="size-12 mx-auto mb-4 text-slate-300 dark:text-navy-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                        </svg>
                                        <p class="text-lg font-medium">No blog posts found</p>
                                        <p class="text-sm">Create your first blog post to get started</p>
                                        <a href="{{ route('cms.blog.create') }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90 mt-4">
                                            Create First Post
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($posts->hasPages())
                <div class="p-4 sm:p-5 border-t border-slate-200 dark:border-navy-500">
                    {{ $posts->links() }}
                </div>
                @endif
            </div>
        </div>
    </main>
</x-app-layout>
