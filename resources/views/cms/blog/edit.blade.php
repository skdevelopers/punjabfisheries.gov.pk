<x-app-layout title="Edit Blog Post" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 sm:mt-5 lg:mt-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                <div>
                    <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Edit Blog Post</h1>
                    <p class="text-slate-500 dark:text-navy-200">Update your blog post content</p>
                </div>
                <div class="mt-4 sm:mt-0 flex space-x-2">
                    <a href="{{ route('cms.blog.show', $post) }}" class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        View Post
                    </a>
                    <a href="{{ route('cms.blog.index') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Posts
                    </a>
                </div>
            </div>

            <!-- Edit Form -->
            <div class="card p-4 sm:p-5">
                <form method="POST" action="{{ route('cms.blog.update', $post) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Main Content -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Title *</label>
                                <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required 
                                       class="form-input w-full @error('title') border-error @enderror" 
                                       placeholder="Enter post title">
                                @error('title')
                                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Excerpt -->
                            <div>
                                <label for="excerpt" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Excerpt</label>
                                <textarea id="excerpt" name="excerpt" rows="3" 
                                          class="form-textarea w-full @error('excerpt') border-error @enderror" 
                                          placeholder="Brief description of the post">{{ old('excerpt', $post->excerpt) }}</textarea>
                                @error('excerpt')
                                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Content -->
                            <div>
                                <label for="content" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Content *</label>
                                <textarea id="content" name="content" rows="15" required 
                                          class="form-textarea w-full @error('content') border-error @enderror" 
                                          placeholder="Write your blog post content here...">{{ old('content', $post->content) }}</textarea>
                                @error('content')
                                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div class="space-y-6">
                            <!-- Publish Settings -->
                            <div class="card p-4">
                                <h3 class="text-lg font-medium text-slate-800 dark:text-navy-50 mb-4">Publish Settings</h3>
                                
                                <!-- Status -->
                                <div class="mb-4">
                                    <label for="status" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Status</label>
                                    <select id="status" name="status" class="form-select w-full @error('status') border-error @enderror">
                                        <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published</option>
                                        <option value="archived" {{ old('status', $post->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                                    </select>
                                    @error('status')
                                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Published Date -->
                                <div class="mb-4">
                                    <label for="published_at" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Publish Date</label>
                                    <input type="datetime-local" id="published_at" name="published_at" 
                                           value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}" 
                                           class="form-input w-full @error('published_at') border-error @enderror">
                                    @error('published_at')
                                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Featured -->
                                <div class="mb-4">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="is_featured" value="1" 
                                               {{ old('is_featured', $post->is_featured) ? 'checked' : '' }} 
                                               class="form-checkbox">
                                        <span class="ml-2 text-sm text-slate-700 dark:text-navy-100">Featured Post</span>
                                    </label>
                                </div>

                                <!-- Allow Comments -->
                                <div class="mb-4">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="allow_comments" value="1" 
                                               {{ old('allow_comments', $post->allow_comments) ? 'checked' : '' }} 
                                               class="form-checkbox">
                                        <span class="ml-2 text-sm text-slate-700 dark:text-navy-100">Allow Comments</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Category & Tags -->
                            <div class="card p-4">
                                <h3 class="text-lg font-medium text-slate-800 dark:text-navy-50 mb-4">Organization</h3>
                                
                                <!-- Category -->
                                <div class="mb-4">
                                    <label for="category_id" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Category *</label>
                                    <select id="category_id" name="category_id" required class="form-select w-full @error('category_id') border-error @enderror">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" 
                                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Tags -->
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Tags</label>
                                    <div class="space-y-2 max-h-32 overflow-y-auto">
                                        @foreach($tags as $tag)
                                            <label class="flex items-center">
                                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                                       {{ in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray())) ? 'checked' : '' }} 
                                                       class="form-checkbox">
                                                <span class="ml-2 text-sm text-slate-700 dark:text-navy-100">{{ $tag->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    @error('tags')
                                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Images -->
                            <div class="card p-4">
                                <h3 class="text-lg font-medium text-slate-800 dark:text-navy-50 mb-4">Images</h3>
                                
                                <!-- Featured Image -->
                                <div class="mb-4">
                                    <label for="featured_image" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Featured Image</label>
                                    @if($post->featured_image)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Current featured image" class="w-20 h-20 rounded object-cover">
                                            <p class="text-xs text-slate-500 dark:text-navy-200 mt-1">Current image</p>
                                        </div>
                                    @endif
                                    <input type="file" id="featured_image" name="featured_image" accept="image/*" 
                                           class="form-input w-full @error('featured_image') border-error @enderror">
                                    <p class="text-xs text-slate-500 dark:text-navy-200 mt-1">Leave empty to keep current image</p>
                                    @error('featured_image')
                                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Banner Image -->
                                <div class="mb-4">
                                    <label for="banner_image" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Banner Image</label>
                                    @if($post->banner_image)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $post->banner_image) }}" alt="Current banner image" class="w-20 h-20 rounded object-cover">
                                            <p class="text-xs text-slate-500 dark:text-navy-200 mt-1">Current image</p>
                                        </div>
                                    @endif
                                    <input type="file" id="banner_image" name="banner_image" accept="image/*" 
                                           class="form-input w-full @error('banner_image') border-error @enderror">
                                    <p class="text-xs text-slate-500 dark:text-navy-200 mt-1">Leave empty to keep current image</p>
                                    @error('banner_image')
                                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- SEO Settings -->
                            <div class="card p-4">
                                <h3 class="text-lg font-medium text-slate-800 dark:text-navy-50 mb-4">SEO Settings</h3>
                                
                                <!-- Meta Title -->
                                <div class="mb-4">
                                    <label for="meta_title" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Meta Title</label>
                                    <input type="text" id="meta_title" name="meta_title" 
                                           value="{{ old('meta_title', $post->meta_title) }}" 
                                           class="form-input w-full @error('meta_title') border-error @enderror" 
                                           placeholder="SEO title for search engines">
                                    @error('meta_title')
                                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Meta Description -->
                                <div class="mb-4">
                                    <label for="meta_description" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Meta Description</label>
                                    <textarea id="meta_description" name="meta_description" rows="3" 
                                              class="form-textarea w-full @error('meta_description') border-error @enderror" 
                                              placeholder="Brief description for search engines">{{ old('meta_description', $post->meta_description) }}</textarea>
                                    @error('meta_description')
                                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Meta Keywords -->
                                <div class="mb-4">
                                    <label for="meta_keywords" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Meta Keywords</label>
                                    <input type="text" id="meta_keywords" name="meta_keywords" 
                                           value="{{ old('meta_keywords', $post->meta_keywords) }}" 
                                           class="form-input w-full @error('meta_keywords') border-error @enderror" 
                                           placeholder="Keywords separated by commas">
                                    @error('meta_keywords')
                                        <p class="text-error text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end space-x-3 mt-6 pt-6 border-t border-slate-200 dark:border-navy-500">
                        <a href="{{ route('cms.blog.index') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            Cancel
                        </a>
                        <button type="submit" name="action" value="draft" class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">
                            Save as Draft
                        </button>
                        <button type="submit" name="action" value="publish" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            Update Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    @push('scripts')
    <script>
        // Auto-generate meta title from post title
        document.getElementById('title').addEventListener('input', function() {
            const title = this.value;
            const metaTitle = document.getElementById('meta_title');
            if (!metaTitle.value) {
                metaTitle.value = title;
            }
        });

        // Auto-generate excerpt from content
        document.getElementById('content').addEventListener('input', function() {
            const content = this.value;
            const excerpt = document.getElementById('excerpt');
            if (!excerpt.value && content.length > 0) {
                const plainText = content.replace(/<[^>]*>/g, '');
                excerpt.value = plainText.substring(0, 160) + (plainText.length > 160 ? '...' : '');
            }
        });
    </script>
    @endpush
</x-app-layout>
