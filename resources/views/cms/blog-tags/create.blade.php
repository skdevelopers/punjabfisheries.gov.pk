<x-app-layout title="Create Tag" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 sm:mt-5 lg:mt-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                <div>
                    <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Create New Tag</h1>
                    <p class="text-slate-500 dark:text-navy-200">Add a new blog tag</p>
                </div>
                <div class="mt-4 sm:mt-0">
                    <a href="{{ route('cms.blog-tags.index') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Tags
                    </a>
                </div>
            </div>

            <!-- Create Form -->
            <div class="card p-4 sm:p-5">
                <form method="POST" action="{{ route('cms.blog-tags.store') }}">
                    @csrf
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Basic Information -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-medium text-slate-800 dark:text-navy-50">Basic Information</h3>
                            
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Name *</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required 
                                       class="form-input w-full @error('name') border-error @enderror" 
                                       placeholder="Enter tag name">
                                @error('name')
                                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Description</label>
                                <textarea id="description" name="description" rows="4" 
                                          class="form-textarea w-full @error('description') border-error @enderror" 
                                          placeholder="Brief description of the tag">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Appearance & Settings -->
                        <div class="space-y-6">
                            <h3 class="text-lg font-medium text-slate-800 dark:text-navy-50">Appearance & Settings</h3>
                            
                            <!-- Color -->
                            <div>
                                <label for="color" class="block text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Color *</label>
                                <div class="grid grid-cols-6 gap-2 mb-2">
                                    <button type="button" class="color-option size-8 rounded-full bg-primary" data-color="#3B82F6"></button>
                                    <button type="button" class="color-option size-8 rounded-full bg-success" data-color="#10B981"></button>
                                    <button type="button" class="color-option size-8 rounded-full bg-warning" data-color="#F59E0B"></button>
                                    <button type="button" class="color-option size-8 rounded-full bg-error" data-color="#EF4444"></button>
                                    <button type="button" class="color-option size-8 rounded-full bg-info" data-color="#06B6D4"></button>
                                    <button type="button" class="color-option size-8 rounded-full bg-secondary" data-color="#8B5CF6"></button>
                                </div>
                                <input type="color" id="color" name="color" value="{{ old('color', '#6B7280') }}" required 
                                       class="form-input w-full h-12 @error('color') border-error @enderror">
                                @error('color')
                                    <p class="text-error text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="flex items-center">
                                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} 
                                           class="form-checkbox">
                                    <span class="ml-2 text-sm text-slate-700 dark:text-navy-100">Active Tag</span>
                                </label>
                                <p class="text-xs text-slate-500 dark:text-navy-200 mt-1">Inactive tags won't be shown on the frontend</p>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end space-x-3 mt-6 pt-6 border-t border-slate-200 dark:border-navy-500">
                        <a href="{{ route('cms.blog-tags.index') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            Cancel
                        </a>
                        <button type="submit" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            Create Tag
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    @push('scripts')
    <script>
        // Color picker functionality
        document.querySelectorAll('.color-option').forEach(button => {
            button.addEventListener('click', function() {
                const color = this.dataset.color;
                document.getElementById('color').value = color;
            });
        });

        // Auto-generate slug from name
        document.getElementById('name').addEventListener('input', function() {
            const name = this.value;
            // You can add slug generation logic here if needed
        });
    </script>
    @endpush
</x-app-layout>
