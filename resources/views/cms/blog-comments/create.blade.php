<x-app-layout title="Add New Comment" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 sm:mt-5 lg:mt-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                <div>
                    <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Add New Comment</h1>
                    <p class="text-slate-500 dark:text-navy-200">Create a new comment manually</p>
                </div>
                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('cms.blog-comments.index') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Comments
                    </a>
                </div>
            </div>

            <div class="card p-6">
            <form method="POST" action="{{ route('cms.blog-comments.store') }}">
                @csrf

                <div class="grid grid-cols-1 gap-6">
                    <!-- Post Selection -->
                    <div>
                        <label for="blog_post_id" class="block text-sm font-medium text-gray-700 mb-2">Post *</label>
                        <select name="blog_post_id" id="blog_post_id" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">Select a post</option>
                            @foreach(\App\Models\BlogPost::published()->get() as $post)
                                <option value="{{ $post->id }}" {{ old('blog_post_id') == $post->id ? 'selected' : '' }}>
                                    {{ $post->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('blog_post_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Parent Comment (for replies) -->
                    <div>
                        <label for="parent_id" class="block text-sm font-medium text-gray-700 mb-2">Reply to Comment (Optional)</label>
                        <select name="parent_id" id="parent_id" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">No reply (top-level comment)</option>
                            @foreach(\App\Models\BlogComment::approved()->get() as $comment)
                                <option value="{{ $comment->id }}" {{ old('parent_id') == $comment->id ? 'selected' : '' }}>
                                    {{ $comment->name }} - {{ Str::limit($comment->comment, 50) }}
                                </option>
                            @endforeach
                        </select>
                        @error('parent_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Author Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Author Name *</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" 
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" 
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Comment -->
                    <div>
                        <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">Comment *</label>
                        <textarea name="comment" id="comment" rows="6" 
                                  class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('comment') }}</textarea>
                        @error('comment')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                        <select name="status" id="status" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="spam" {{ old('status') == 'spam' ? 'selected' : '' }}>Spam</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('cms.blog-comments.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Cancel
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create Comment
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
        </main>
    </x-app-layout>
