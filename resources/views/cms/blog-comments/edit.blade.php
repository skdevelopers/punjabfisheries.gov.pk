<x-app-layout title="Edit Comment" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 sm:mt-5 lg:mt-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                <div>
                    <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Edit Comment</h1>
                    <p class="text-slate-500 dark:text-navy-200">Modify comment details and status</p>
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
            <form method="POST" action="{{ route('cms.blog-comments.update', $blogComment) }}">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6">
                    <!-- Post Information -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Post</label>
                        <div class="p-3 bg-gray-50 rounded-md">
                            <strong>{{ $blogComment->post->title }}</strong>
                            <br>
                            <span class="text-sm text-gray-600">{{ route('frontend.blog.details', $blogComment->post->slug) }}</span>
                        </div>
                    </div>

                    <!-- Author Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Author Name *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $blogComment->name) }}" 
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $blogComment->email) }}" 
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Comment -->
                    <div>
                        <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">Comment *</label>
                        <textarea name="comment" id="comment" rows="6" 
                                  class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('comment', $blogComment->comment) }}</textarea>
                        @error('comment')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                        <select name="status" id="status" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="pending" {{ old('status', $blogComment->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ old('status', $blogComment->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="spam" {{ old('status', $blogComment->status) == 'spam' ? 'selected' : '' }}>Spam</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Additional Information -->
                    <div class="bg-gray-50 p-4 rounded-md">
                        <h3 class="text-lg font-medium text-gray-900 mb-3">Additional Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div>
                                <span class="font-medium text-gray-700">IP Address:</span>
                                <span class="text-gray-600">{{ $blogComment->ip_address ?? 'N/A' }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-gray-700">Created:</span>
                                <span class="text-gray-600">{{ $blogComment->created_at->format('M d, Y H:i') }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-gray-700">Last Updated:</span>
                                <span class="text-gray-600">{{ $blogComment->updated_at->format('M d, Y H:i') }}</span>
                            </div>
                            @if($blogComment->parent)
                            <div>
                                <span class="font-medium text-gray-700">Reply to:</span>
                                <span class="text-gray-600">{{ $blogComment->parent->name }}</span>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('cms.blog-comments.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Cancel
                        </a>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update Comment
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
        </main>
    </x-app-layout>
