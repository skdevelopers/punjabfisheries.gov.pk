<x-app-layout title="Create Slider" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center justify-between space-x-2 py-5">
            <h3 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Create New Slider
            </h3>
            <a href="{{ route('cms.sliders.index') }}"
                class="btn border border-slate-300 font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Back to Sliders</span>
            </a>
        </div>

        <div class="card">
            <div class="p-4 sm:p-5">
                <form action="{{ route('cms.sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <!-- Title -->
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-navy-100">Title</span>
                            <input type="text" name="title" value="{{ old('title') }}"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Enter slider title">
                            @error('title')
                                <span class="text-tiny-plus text-error">{{ $message }}</span>
                            @enderror
                        </label>

                        <!-- Subtitle -->
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-navy-100">Subtitle</span>
                            <input type="text" name="subtitle" value="{{ old('subtitle') }}"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Enter slider subtitle">
                            @error('subtitle')
                                <span class="text-tiny-plus text-error">{{ $message }}</span>
                            @enderror
                        </label>

                        <!-- Description -->
                        <label class="block sm:col-span-2">
                            <span class="text-sm font-medium text-slate-700 dark:text-navy-100">Description</span>
                            <textarea name="description" rows="3"
                                class="form-textarea mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="Enter slider description">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-tiny-plus text-error">{{ $message }}</span>
                            @enderror
                        </label>

                        <!-- Button Text -->
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-navy-100">Button Text</span>
                            <input type="text" name="button_text" value="{{ old('button_text') }}"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="e.g., Get Started">
                            @error('button_text')
                                <span class="text-tiny-plus text-error">{{ $message }}</span>
                            @enderror
                        </label>

                        <!-- Button URL -->
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-navy-100">Button URL</span>
                            <input type="url" name="button_url" value="{{ old('button_url') }}"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="https://example.com">
                            @error('button_url')
                                <span class="text-tiny-plus text-error">{{ $message }}</span>
                            @enderror
                        </label>

                        <!-- Order -->
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-navy-100">Order</span>
                            <input type="number" name="order" value="{{ old('order', 0) }}" min="0"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                placeholder="0">
                            @error('order')
                                <span class="text-tiny-plus text-error">{{ $message }}</span>
                            @enderror
                        </label>

                        <!-- Status -->
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-navy-100">Status</span>
                            <div class="mt-1.5">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}
                                        class="form-checkbox is-basic size-5 rounded border-slate-400/70 bg-white hover:border-primary focus:border-primary dark:border-navy-400 dark:bg-navy-700 dark:hover:border-accent dark:focus:border-accent">
                                    <span class="ml-2 text-sm text-slate-600 dark:text-navy-200">Active</span>
                                </label>
                            </div>
                        </label>

                        <!-- Background Color -->
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-navy-100">Background Color</span>
                            <input type="color" name="background_color" value="{{ old('background_color', '#000000') }}"
                                class="form-input mt-1.5 h-12 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                            @error('background_color')
                                <span class="text-tiny-plus text-error">{{ $message }}</span>
                            @enderror
                        </label>

                        <!-- Text Color -->
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-navy-100">Text Color</span>
                            <input type="color" name="text_color" value="{{ old('text_color', '#ffffff') }}"
                                class="form-input mt-1.5 h-12 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                            @error('text_color')
                                <span class="text-tiny-plus text-error">{{ $message }}</span>
                            @enderror
                        </label>

                        <!-- Overlay Opacity -->
                        <label class="block sm:col-span-2">
                            <span class="text-sm font-medium text-slate-700 dark:text-navy-100">Overlay Opacity</span>
                            <input type="range" name="overlay_opacity" value="{{ old('overlay_opacity', 0.5) }}" min="0" max="1" step="0.1"
                                class="form-range mt-1.5 w-full">
                            <div class="mt-1 text-xs text-slate-500 dark:text-navy-300">
                                <span id="opacity-value">{{ old('overlay_opacity', 0.5) }}</span>
                            </div>
                            @error('overlay_opacity')
                                <span class="text-tiny-plus text-error">{{ $message }}</span>
                            @enderror
                        </label>

                        <!-- Image Upload -->
                        <label class="block sm:col-span-2">
                            <span class="text-sm font-medium text-slate-700 dark:text-navy-100">Slider Image</span>
                            <div class="mt-1.5">
                                <input type="file" name="image" accept="image/*"
                                    class="form-input w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                                <p class="mt-1 text-xs text-slate-500 dark:text-navy-300">
                                    Recommended size: 1920x1080px. Max file size: 5MB.
                                </p>
                            </div>
                            @error('image')
                                <span class="text-tiny-plus text-error">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <a href="{{ route('cms.sliders.index') }}"
                            class="btn border border-slate-300 font-medium text-slate-700 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-100 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                            Cancel
                        </a>
                        <button type="submit"
                            class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                            Create Slider
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        // Update opacity value display
        document.querySelector('input[name="overlay_opacity"]').addEventListener('input', function() {
            document.getElementById('opacity-value').textContent = this.value;
        });
    </script>
</x-app-layout>
