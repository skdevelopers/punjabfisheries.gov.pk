<x-app-layout title="Edit Page" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="card col-span-12">
                <div class="p-8">
                    <div class="mb-8">
                        <div class="flex items-center mb-4">
                            <a href="{{ route('cms.pages') }}" class="text-slate-500 dark:text-navy-200 mr-4 flex items-center hover:text-slate-700 dark:hover:text-navy-100">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </a>
                            <h1 class="text-3xl font-semibold text-slate-800 dark:text-navy-50 m-0">Edit Page</h1>
                        </div>
                        <p class="text-slate-500 dark:text-navy-200 text-base">Update page content and settings</p>
                    </div>

                    <form action="{{ route('cms.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                            <!-- Main Content -->
                            <div class="lg:col-span-2">
                                <div class="card p-6 mb-6">
                                    <h2 class="text-xl font-semibold text-slate-800 dark:text-navy-100 mb-6">Page Content</h2>
                                    
                                    <div class="mb-6">
                                        <label class="block font-medium text-slate-700 dark:text-navy-200 mb-2">Page Title *</label>
                                        <input type="text" name="title" value="{{ old('title', $page->title) }}" required class="form-input w-full rounded-lg border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Enter page title">
                                        @error('title')
                                            <p class="text-error text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <label class="block font-medium text-slate-700 dark:text-navy-200 mb-2">URL Slug *</label>
                                        <input type="text" name="slug" value="{{ old('slug', $page->slug) }}" required class="form-input w-full rounded-lg border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent font-mono" placeholder="page-url-slug">
                                        @error('slug')
                                            <p class="text-error text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <label class="block font-medium text-slate-700 dark:text-navy-200 mb-2">Page Content *</label>
                                        <div class="border border-slate-300 dark:border-navy-450 rounded-lg overflow-hidden">
                                            <!-- Toolbar -->
                                            <div class="bg-slate-50 dark:bg-navy-800 p-3 border-b border-slate-200 dark:border-navy-600 flex gap-2 flex-wrap">
                                                <button type="button" onclick="formatText('bold')" class="px-2 py-1 border border-slate-300 dark:border-navy-450 bg-white dark:bg-navy-700 rounded cursor-pointer font-bold text-slate-700 dark:text-navy-200 hover:bg-slate-50 dark:hover:bg-navy-600">B</button>
                                                <button type="button" onclick="formatText('italic')" class="px-2 py-1 border border-slate-300 dark:border-navy-450 bg-white dark:bg-navy-700 rounded cursor-pointer italic text-slate-700 dark:text-navy-200 hover:bg-slate-50 dark:hover:bg-navy-600">I</button>
                                                <button type="button" onclick="formatText('underline')" class="px-2 py-1 border border-slate-300 dark:border-navy-450 bg-white dark:bg-navy-700 rounded cursor-pointer underline text-slate-700 dark:text-navy-200 hover:bg-slate-50 dark:hover:bg-navy-600">U</button>
                                                <div class="w-px bg-slate-300 dark:bg-navy-450 mx-2"></div>
                                                <button type="button" onclick="insertHeading('h1')" class="px-2 py-1 border border-slate-300 dark:border-navy-450 bg-white dark:bg-navy-700 rounded cursor-pointer text-slate-700 dark:text-navy-200 hover:bg-slate-50 dark:hover:bg-navy-600">H1</button>
                                                <button type="button" onclick="insertHeading('h2')" class="px-2 py-1 border border-slate-300 dark:border-navy-450 bg-white dark:bg-navy-700 rounded cursor-pointer text-slate-700 dark:text-navy-200 hover:bg-slate-50 dark:hover:bg-navy-600">H2</button>
                                                <button type="button" onclick="insertHeading('h3')" class="px-2 py-1 border border-slate-300 dark:border-navy-450 bg-white dark:bg-navy-700 rounded cursor-pointer text-slate-700 dark:text-navy-200 hover:bg-slate-50 dark:hover:bg-navy-600">H3</button>
                                                <div class="w-px bg-slate-300 dark:bg-navy-450 mx-2"></div>
                                                <button type="button" onclick="insertLink()" class="px-2 py-1 border border-slate-300 dark:border-navy-450 bg-white dark:bg-navy-700 rounded cursor-pointer text-slate-700 dark:text-navy-200 hover:bg-slate-50 dark:hover:bg-navy-600">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                                    </svg>
                                                </button>
                                                <button type="button" onclick="insertImage()" class="px-2 py-1 border border-slate-300 dark:border-navy-450 bg-white dark:bg-navy-700 rounded cursor-pointer text-slate-700 dark:text-navy-200 hover:bg-slate-50 dark:hover:bg-navy-600">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <!-- Editor -->
                                            <div id="editor" contenteditable="true" class="min-h-96 p-4 outline-none text-base leading-relaxed bg-white dark:bg-navy-700 text-slate-700 dark:text-navy-200">{!! old('content', $page->content) !!}</div>
                                        </div>
                                        <textarea name="content" id="content" class="hidden"></textarea>
                                        @error('content')
                                            <p class="text-error text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Sidebar -->
                            <div>
                                <div class="card p-6 mb-6">
                                    <h2 class="text-xl font-semibold text-slate-800 dark:text-navy-100 mb-6">Page Settings</h2>
                                    
                                    <div class="mb-6">
                                        <label class="block font-medium text-slate-700 dark:text-navy-200 mb-2">Status</label>
                                        <select name="status" class="form-select w-full rounded-lg border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                                            <option value="draft" {{ old('status', $page->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                            <option value="published" {{ old('status', $page->status) == 'published' ? 'selected' : '' }}>Published</option>
                                        </select>
                                        @error('status')
                                            <p class="text-error text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <label class="block font-medium text-slate-700 dark:text-navy-200 mb-2">Featured Image</label>
                                        @if($page->featured_image)
                                        <div class="mb-4">
                                            <img src="{{ Storage::url($page->featured_image) }}" alt="Current featured image" class="w-full h-36 object-cover rounded-lg border border-slate-200 dark:border-navy-600">
                                        </div>
                                        @endif
                                        <input type="file" name="featured_image" accept="image/*" class="form-input w-full rounded-lg border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent text-sm">
                                        @error('featured_image')
                                            <p class="text-error text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <label class="block font-medium text-slate-700 dark:text-navy-200 mb-2">Meta Description</label>
                                        <textarea name="meta_description" rows="3" class="form-textarea w-full rounded-lg border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Brief description for search engines">{{ old('meta_description', $page->meta_description) }}</textarea>
                                        @error('meta_description')
                                            <p class="text-error text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="card p-6">
                                    <div class="flex flex-col gap-3">
                                        <button type="submit" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            Update Page
                                        </button>
                                        <a href="{{ route('cms.pages') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                            Cancel
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Rich text editor functionality
        function formatText(command) {
            document.execCommand(command, false, null);
        }

        function insertHeading(level) {
            document.execCommand('formatBlock', false, level);
        }

        function insertLink() {
            const url = prompt('Enter URL:');
            if (url) {
                document.execCommand('createLink', false, url);
            }
        }

        function insertImage() {
            const url = prompt('Enter image URL:');
            if (url) {
                document.execCommand('insertImage', false, url);
            }
        }

        // Sync editor content with hidden textarea
        document.getElementById('editor').addEventListener('input', function() {
            document.getElementById('content').value = this.innerHTML;
        });

        // Set initial content
        document.getElementById('content').value = document.getElementById('editor').innerHTML;
    </script>
</x-app-layout>
