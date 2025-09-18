<x-app-layout title="Edit Target" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center justify-between space-x-2 py-5">
            <h3 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Edit Target: {{ $target->title }}
            </h3>
            <a href="{{ route('crm.targets.index') }}"
                class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:hover:bg-navy-400 dark:focus:bg-navy-400 dark:active:bg-navy-400/90">
                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span>Back to Targets</span>
            </a>
        </div>

        <div class="card">
            <div class="p-4 sm:p-5">
                <form action="{{ route('crm.targets.update', $target->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <!-- Title -->
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Title <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="title" value="{{ old('title', $target->title) }}" required
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('title') border-red-500 @enderror"
                                placeholder="Enter target title">
                            @error('title')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Type -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Type <span class="text-red-500">*</span>
                            </label>
                            <select name="type" required
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('type') border-red-500 @enderror">
                                <option value="">Select Type</option>
                                @foreach($types as $key => $label)
                                    <option value="{{ $key }}" {{ old('type', $target->type) === $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Category <span class="text-red-500">*</span>
                            </label>
                            <select name="category" required
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('category') border-red-500 @enderror">
                                <option value="">Select Category</option>
                                @foreach($categories as $key => $label)
                                    <option value="{{ $key }}" {{ old('category', $target->category) === $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Target Value -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Target Value <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="target_value" value="{{ old('target_value', $target->target_value) }}" step="0.01" min="0" required
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('target_value') border-red-500 @enderror"
                                placeholder="0.00">
                            @error('target_value')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Achieved Value -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Achieved Value
                            </label>
                            <input type="number" name="achieved_value" value="{{ old('achieved_value', $target->achieved_value) }}" step="0.01" min="0"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('achieved_value') border-red-500 @enderror"
                                placeholder="0.00">
                            @error('achieved_value')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Unit -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Unit <span class="text-red-500">*</span>
                            </label>
                            <select name="unit" required
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('unit') border-red-500 @enderror">
                                <option value="">Select Unit</option>
                                @foreach($units as $key => $label)
                                    <option value="{{ $key }}" {{ old('unit', $target->unit) === $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('unit')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Start Date -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Start Date <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="start_date" value="{{ old('start_date', $target->start_date->format('Y-m-d')) }}" required
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('start_date') border-red-500 @enderror">
                            @error('start_date')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- End Date -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                End Date <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="end_date" value="{{ old('end_date', $target->end_date->format('Y-m-d')) }}" required
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('end_date') border-red-500 @enderror">
                            @error('end_date')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Priority -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Priority <span class="text-red-500">*</span>
                            </label>
                            <select name="priority" required
                                class="form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('priority') border-red-500 @enderror">
                                <option value="">Select Priority</option>
                                @foreach($priorities as $key => $label)
                                    <option value="{{ $key }}" {{ old('priority', $target->priority) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('priority')
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
                                @foreach($statuses as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $target->status) === $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Assigned To -->
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Assigned To
                            </label>
                            <input type="text" name="assigned_to" value="{{ old('assigned_to', $target->assigned_to) }}"
                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('assigned_to') border-red-500 @enderror"
                                placeholder="Department or person responsible">
                            @error('assigned_to')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Description
                            </label>
                            <textarea name="description" rows="3"
                                class="form-textarea mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('description') border-red-500 @enderror"
                                placeholder="Enter target description...">{{ old('description', $target->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Notes -->
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-slate-700 dark:text-navy-100">
                                Notes
                            </label>
                            <textarea name="notes" rows="2"
                                class="form-textarea mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent @error('notes') border-red-500 @enderror"
                                placeholder="Additional notes...">{{ old('notes', $target->notes) }}</textarea>
                            @error('notes')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Public Status -->
                        <div class="sm:col-span-2">
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="checkbox" name="is_public" value="1" {{ old('is_public', $target->is_public) ? 'checked' : '' }}
                                    class="h-5 w-5 rounded border-2 border-slate-300 bg-white text-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-0 hover:border-blue-400 transition-colors duration-200 dark:border-slate-600 dark:bg-slate-800 dark:text-blue-500 dark:focus:ring-blue-400">
                                <span class="text-sm font-medium text-slate-700 dark:text-navy-100 select-none">Make this target public</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <a href="{{ route('crm.targets.index') }}"
                            class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:hover:bg-navy-400 dark:focus:bg-navy-400 dark:active:bg-navy-400/90">
                            Cancel
                        </a>
                        <button type="submit"
                            class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                            Update Target
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-app-layout>
