<x-app-layout title="Edit Tender" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center justify-between space-x-2 py-5">
            <h3 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Edit Tender: {{ $tender->tender_number }}
            </h3>
            <a href="{{ route('cms.tenders.index') }}"
                class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:hover:bg-navy-400 dark:focus:bg-navy-400 dark:active:bg-navy-400/90">
                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Back to Tenders</span>
            </a>
        </div>

        <div class="card">
            <div class="p-4 sm:p-5">
                <form action="{{ route('cms.tenders.update', $tender->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Title <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="title" value="{{ old('title', $tender->title) }}" required
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('title') border-red-500 @enderror">
                            @error('title')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tender Number -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Tender Number <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="tender_number" value="{{ old('tender_number', $tender->tender_number) }}" required
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('tender_number') border-red-500 @enderror">
                            @error('tender_number')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deadline -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Deadline <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="deadline" value="{{ old('deadline', $tender->deadline->format('Y-m-d')) }}" required
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('deadline') border-red-500 @enderror">
                            @error('deadline')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Status <span class="text-red-500">*</span>
                            </label>
                            <select name="status" required
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('status') border-red-500 @enderror">
                                <option value="">Select Status</option>
                                <option value="active" {{ old('status', $tender->status) === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="closed" {{ old('status', $tender->status) === 'closed' ? 'selected' : '' }}>Closed</option>
                                <option value="cancelled" {{ old('status', $tender->status) === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Description <span class="text-red-500">*</span>
                            </label>
                            <textarea name="description" rows="4" required
                                class="form-textarea mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('description') border-red-500 @enderror"
                                placeholder="Enter tender description...">{{ old('description', $tender->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- PDF Upload -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Tender Notice (PDF)
                            </label>
                            @if($tender->pdf_path)
                                <div class="mb-2">
                                    <p class="text-sm text-slate-600 dark:text-navy-300">Current file: 
                                        <a href="{{ $tender->getPdfUrl() }}" target="_blank" class="text-primary hover:underline">
                                            {{ basename($tender->pdf_path) }}
                                        </a>
                                    </p>
                                </div>
                            @endif
                            <input type="file" name="pdf_file" accept=".pdf"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('pdf_file') border-red-500 @enderror">
                            <p class="mt-1 text-sm text-slate-500">Maximum file size: 10MB. Leave empty to keep current file.</p>
                            @error('pdf_file')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Second PDF Upload -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Bidding Document (PDF)
                            </label>
                            @if($tender->pdf_path_2)
                                <div class="mb-2">
                                    <p class="text-sm text-slate-600 dark:text-navy-300">Current file: 
                                        <a href="{{ $tender->getPdf2Url() }}" target="_blank" class="text-primary hover:underline">
                                            {{ basename($tender->pdf_path_2) }}
                                        </a>
                                    </p>
                                </div>
                            @endif
                            <input type="file" name="pdf_file_2" accept=".pdf"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('pdf_file_2') border-red-500 @enderror">
                            <p class="mt-1 text-sm text-slate-500">Maximum file size: 10MB. Leave empty to keep current file.</p>
                            @error('pdf_file_2')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <a href="{{ route('cms.tenders.index') }}"
                            class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:hover:bg-navy-400 dark:focus:bg-navy-400 dark:active:bg-navy-400/90">
                            Cancel
                        </a>
                        <button type="submit"
                            class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                            Update Tender
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-app-layout>
