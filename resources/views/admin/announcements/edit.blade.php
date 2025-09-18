<x-app-layout title="Edit Announcement" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="card col-span-12">
                <div class="flex items-center justify-between p-4 sm:p-5">
                    <div>
                        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">Edit Announcement</h2>
                        <p class="text-slate-500 dark:text-navy-200">Update announcement information</p>
                    </div>
                    <a href="{{ route('cms.announcements.index') }}" class="btn bg-secondary font-medium text-white hover:bg-secondary-focus focus:bg-secondary-focus active:bg-secondary-focus/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Announcements
                    </a>
                </div>

                <div class="p-4 sm:p-5">
                    <form action="{{ route('cms.announcements.update', $announcement) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <div class="lg:col-span-2 space-y-4">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                        Title <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-input w-full @error('title') border-red-500 @enderror" 
                                           id="title" name="title" value="{{ old('title', $announcement->title) }}" required>
                                    @error('title')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="description" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                        Description <span class="text-red-500">*</span>
                                    </label>
                                    <textarea class="form-textarea w-full @error('description') border-red-500 @enderror" 
                                              id="description" name="description" rows="4" required>{{ old('description', $announcement->description) }}</textarea>
                                    @error('description')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="content" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                        Content
                                    </label>
                                    <textarea class="form-textarea w-full @error('content') border-red-500 @enderror" 
                                              id="content" name="content" rows="10">{{ old('content', $announcement->content) }}</textarea>
                                    @error('content')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <p class="text-slate-500 text-sm mt-1">You can use HTML tags for formatting.</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label for="type" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                        Type <span class="text-red-500">*</span>
                                    </label>
                                    <select class="form-select w-full @error('type') border-red-500 @enderror" 
                                            id="type" name="type" required>
                                        <option value="">Select Type</option>
                                        <option value="general" {{ old('type', $announcement->type) == 'general' ? 'selected' : '' }}>General</option>
                                        <option value="tender" {{ old('type', $announcement->type) == 'tender' ? 'selected' : '' }}>Tender</option>
                                        <option value="notice" {{ old('type', $announcement->type) == 'notice' ? 'selected' : '' }}>Notice</option>
                                        <option value="corrigendum" {{ old('type', $announcement->type) == 'corrigendum' ? 'selected' : '' }}>Corrigendum</option>
                                    </select>
                                    @error('type')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="status" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                        Status <span class="text-red-500">*</span>
                                    </label>
                                    <select class="form-select w-full @error('status') border-red-500 @enderror" 
                                            id="status" name="status" required>
                                        <option value="draft" {{ old('status', $announcement->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="active" {{ old('status', $announcement->status) == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status', $announcement->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="priority" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                        Priority <span class="text-red-500">*</span>
                                    </label>
                                    <select class="form-select w-full @error('priority') border-red-500 @enderror" 
                                            id="priority" name="priority" required>
                                        <option value="low" {{ old('priority', $announcement->priority) == 'low' ? 'selected' : '' }}>Low</option>
                                        <option value="normal" {{ old('priority', $announcement->priority) == 'normal' ? 'selected' : '' }}>Normal</option>
                                        <option value="high" {{ old('priority', $announcement->priority) == 'high' ? 'selected' : '' }}>High</option>
                                    </select>
                                    @error('priority')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="published_date" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                        Published Date <span class="text-red-500">*</span>
                                    </label>
                                    <input type="date" class="form-input w-full @error('published_date') border-red-500 @enderror" 
                                           id="published_date" name="published_date" 
                                           value="{{ old('published_date', $announcement->published_date->format('Y-m-d')) }}" required>
                                    @error('published_date')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="expiry_date" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                        Expiry Date
                                    </label>
                                    <input type="date" class="form-input w-full @error('expiry_date') border-red-500 @enderror" 
                                           id="expiry_date" name="expiry_date" value="{{ old('expiry_date', $announcement->expiry_date ? $announcement->expiry_date->format('Y-m-d') : '') }}">
                                    @error('expiry_date')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="external_url" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                        External URL
                                    </label>
                                    <input type="url" class="form-input w-full @error('external_url') border-red-500 @enderror" 
                                           id="external_url" name="external_url" value="{{ old('external_url', $announcement->external_url) }}">
                                    @error('external_url')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="file" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                        Attachment
                                    </label>
                                    <input type="file" class="form-input w-full @error('file') border-red-500 @enderror" 
                                           id="file" name="file" accept=".pdf,.doc,.docx">
                                    @error('file')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    <p class="text-slate-500 text-sm mt-1">Accepted formats: PDF, DOC, DOCX (Max: 10MB)</p>
                                    @if($announcement->file_path)
                                    <div class="mt-2 p-2 bg-slate-100 dark:bg-navy-600 rounded text-sm">
                                        <strong>Current file:</strong> {{ $announcement->file_name }}
                                        <a href="{{ Storage::url($announcement->file_path) }}" target="_blank" class="text-primary hover:text-primary-focus ml-2">View</a>
                                    </div>
                                    @endif
                                </div>

                                <div>
                                    <label for="sort_order" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">
                                        Sort Order
                                    </label>
                                    <input type="number" class="form-input w-full @error('sort_order') border-red-500 @enderror" 
                                           id="sort_order" name="sort_order" value="{{ old('sort_order', $announcement->sort_order) }}" min="0">
                                    @error('sort_order')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="flex items-center">
                                        <input type="checkbox" id="is_featured" name="is_featured" 
                                               value="1" {{ old('is_featured', $announcement->is_featured) ? 'checked' : '' }}
                                               class="form-checkbox text-primary">
                                        <span class="ml-2 text-sm text-slate-700 dark:text-navy-100">
                                            Featured Announcement
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end gap-3 mt-6">
                            <a href="{{ route('cms.announcements.index') }}" 
                               class="btn bg-secondary font-medium text-white hover:bg-secondary-focus focus:bg-secondary-focus active:bg-secondary-focus/90">
                                Cancel
                            </a>
                            <button type="submit" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                                <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Announcement
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set default published date to today if not set
        const publishedDateInput = document.getElementById('published_date');
        if (!publishedDateInput.value) {
            publishedDateInput.value = new Date().toISOString().split('T')[0];
        }
    });
    </script>
</x-app-layout>