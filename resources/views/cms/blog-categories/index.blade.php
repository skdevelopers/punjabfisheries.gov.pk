<x-app-layout title="Blog Categories" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 sm:mt-5 lg:mt-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                <div>
                    <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Blog Categories</h1>
                    <p class="text-slate-500 dark:text-navy-200">Manage blog post categories</p>
                </div>
                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('cms.blog-categories.create') }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Create Category
                    </a>
                </div>
            </div>

            <!-- Categories List -->
            <div class="card p-0">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">Name</th>
                                <th class="whitespace-nowrap">Slug</th>
                                <th class="whitespace-nowrap">Color</th>
                                <th class="whitespace-nowrap">Posts</th>
                                <th class="whitespace-nowrap">Status</th>
                                <th class="whitespace-nowrap">Order</th>
                                <th class="whitespace-nowrap">Created</th>
                                <th class="whitespace-nowrap">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        @if($category->icon)
                                            <div class="size-10 rounded-full bg-{{ $category->color }}/10 flex items-center justify-center">
                                                <i class="{{ $category->icon }} text-{{ $category->color }}"></i>
                                            </div>
                                        @else
                                            <div class="size-10 rounded-full bg-{{ $category->color }}/10 flex items-center justify-center">
                                                <svg class="size-5 text-{{ $category->color }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                        <div>
                                            <h4 class="font-medium text-slate-800 dark:text-navy-50">{{ $category->name }}</h4>
                                            @if($category->description)
                                                <p class="text-xs text-slate-500 dark:text-navy-200">{{ Str::limit($category->description, 50) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-sm text-slate-600 dark:text-navy-200">{{ $category->slug }}</span>
                                </td>
                                <td>
                                    <div class="flex items-center space-x-2">
                                        <div class="size-6 rounded-full" style="background-color: {{ $category->color }};"></div>
                                        <span class="text-sm text-slate-600 dark:text-navy-200">{{ $category->color }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-sm text-slate-700 dark:text-navy-100">{{ $category->posts_count }}</span>
                                </td>
                                <td>
                                    @if($category->is_active)
                                        <span class="badge bg-success/10 text-success border-success/20">Active</span>
                                    @else
                                        <span class="badge bg-slate-500/10 text-slate-500 border-slate-500/20">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="text-sm text-slate-600 dark:text-navy-200">{{ $category->order }}</span>
                                </td>
                                <td>
                                    <span class="text-sm text-slate-500 dark:text-navy-200">{{ $category->created_at->format('M d, Y') }}</span>
                                </td>
                                <td>
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('cms.blog-categories.show', $category) }}" class="btn size-8 p-0 text-slate-500 hover:text-slate-700 dark:text-navy-300 dark:hover:text-navy-100">
                                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('cms.blog-categories.edit', $category) }}" class="btn size-8 p-0 text-slate-500 hover:text-slate-700 dark:text-navy-300 dark:hover:text-navy-100">
                                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <form method="POST" action="{{ route('cms.blog-categories.toggle-status', $category) }}" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn size-8 p-0 text-slate-500 hover:text-warning dark:text-navy-300 dark:hover:text-warning">
                                                @if($category->is_active)
                                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728"></path>
                                                    </svg>
                                                @else
                                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                @endif
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('cms.blog-categories.destroy', $category) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this category? This will also affect all posts in this category.')">
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
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                        <p class="text-lg font-medium">No categories found</p>
                                        <p class="text-sm">Create your first category to get started</p>
                                        <a href="{{ route('cms.blog-categories.create') }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90 mt-4">
                                            Create First Category
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($categories->hasPages())
                <div class="p-4 sm:p-5 border-t border-slate-200 dark:border-navy-500">
                    {{ $categories->links() }}
                </div>
                @endif
            </div>
        </div>
    </main>
</x-app-layout>
