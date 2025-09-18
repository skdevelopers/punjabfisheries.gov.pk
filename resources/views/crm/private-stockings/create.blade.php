<x-app-layout title="Create Private Stocking" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="col-span-12 flex justify-center">
                <div class="card w-full max-w-4xl" x-data="privateStockingForm()">
                    <div class="p-6">
                        <!-- Header -->
                        <div class="mb-6">
                            <div class="flex items-center mb-3">
                                <a href="{{ route('crm.private-stockings.index') }}" class="text-slate-500 dark:text-navy-200 mr-3 flex items-center hover:text-slate-700 dark:hover:text-navy-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </a>
                                <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Create Private Stocking</h1>
                            </div>
                            <p class="text-slate-500 dark:text-navy-200 text-sm">Add new private stocking records</p>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-error mb-4">
                                <ul class="list-disc list-inside text-sm">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form @submit.prevent="submitForm" class="space-y-6">
                            @csrf
                            
                            <!-- Multiple Entries Container -->
                            <div class="space-y-4">
                                <template x-for="(entry, index) in entries" :key="index">
                                    <div class="entry-row bg-slate-50 dark:bg-navy-800 p-6 rounded-lg border border-slate-200 dark:border-navy-600">
                                        <div class="flex items-center justify-end mb-4" x-show="entries.length > 1">
                                            <button type="button" 
                                                    @click="removeEntry(index)"
                                                    class="btn size-8 rounded-full p-0 bg-red-500/10 text-red-500 hover:bg-red-500/20">
                                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                            <!-- Species -->
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                                    Species <span class="text-red-500">*</span>
                                                </label>
                                                <select :name="`entries[${index}][species]`" 
                                                        x-model="entry.species"
                                                        class="form-select w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                                        required>
                                                    <option value="">Select Species</option>
                                                    @foreach($species as $key => $value)
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Weight (Kg) -->
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                                    Weight (Kg) <span class="text-red-500">*</span>
                                                </label>
                                                <div class="relative">
                                                    <input type="number" 
                                                           :name="`entries[${index}][weight]`" 
                                                           x-model="entry.weight"
                                                           class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 pr-10 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                                           step="0.01" 
                                                           min="0" 
                                                           placeholder="0.00"
                                                           required>
                                                    <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-500 text-xs">Kg</span>
                                                </div>
                                            </div>

                                            <!-- Water Body Name -->
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                                    Name of Water Body <span class="text-red-500">*</span>
                                                </label>
                                                <select :name="`entries[${index}][water_body_name]`" 
                                                        x-model="entry.water_body_name"
                                                        class="form-select w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                                        required>
                                                    <option value="">Select Water Body</option>
                                                    <option value="indus">Indus River</option>
                                                    <option value="jhelum">Jhelum River</option>
                                                    <option value="chenab">Chenab River</option>
                                                    <option value="ravi">Ravi River</option>
                                                    <option value="sutlej">Sutlej River</option>
                                                </select>
                                            </div>

                                            <!-- Income from Fish Seed -->
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                                    Income from Fish Seed <span class="text-red-500">*</span>
                                                </label>
                                                <div class="relative">
                                                    <input type="number" 
                                                           :name="`entries[${index}][income_from_fish_seed]`" 
                                                           x-model="entry.income_from_fish_seed"
                                                           class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 pr-10 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                                           step="0.01" 
                                                           min="0" 
                                                           placeholder="0.00"
                                                           required>
                                                    <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-500 text-xs">PKR</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <!-- Add Entry Button -->
                            <div class="flex justify-center">
                                <button type="button" 
                                        @click="addEntry"
                                        class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                                    <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Add Another Entry
                                </button>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-slate-200 dark:border-navy-600">
                                <a href="{{ route('crm.private-stockings.index') }}" 
                                   class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                    Cancel
                                </a>
                                <button type="submit" 
                                        :disabled="isSubmitting"
                                        class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90 disabled:opacity-50">
                                    <svg x-show="!isSubmitting" class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <svg x-show="isSubmitting" class="animate-spin size-4 mr-2" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span x-text="isSubmitting ? 'Creating...' : 'Create Records'"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script type="text/javascript">
        function privateStockingForm() {
            return {
                entries: [{
                    species: '',
                    weight: '',
                    water_body_name: '',
                    income_from_fish_seed: ''
                }],
                isSubmitting: false,

                addEntry() {
                    this.entries.push({
                        species: '',
                        weight: '',
                        water_body_name: '',
                        income_from_fish_seed: ''
                    });
                },

                removeEntry(index) {
                    if (this.entries.length > 1) {
                        this.entries.splice(index, 1);
                    }
                },

                async submitForm() {
                    this.isSubmitting = true;
                    
                    try {
                        const formData = new FormData();
                        formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                        
                        this.entries.forEach((entry, index) => {
                            formData.append(`entries[${index}][species]`, entry.species);
                            formData.append(`entries[${index}][weight]`, entry.weight);
                            formData.append(`entries[${index}][water_body_name]`, entry.water_body_name);
                            formData.append(`entries[${index}][income_from_fish_seed]`, entry.income_from_fish_seed);
                        });

                        const response = await axios.post('{{ route("crm.private-stockings.store") }}', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data',
                            }
                        });

                        if (response.data.success) {
                            window.location.href = '{{ route("crm.private-stockings.index") }}';
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        if (error.response && error.response.data.errors) {
                            // Handle validation errors
                            this.showValidationErrors(error.response.data.errors);
                        } else {
                            alert('An error occurred while creating the records. Please try again.');
                        }
                    } finally {
                        this.isSubmitting = false;
                    }
                },

                showValidationErrors(errors) {
                    // Simple error display - you can enhance this
                    let errorMessage = 'Please fix the following errors:\n';
                    Object.keys(errors).forEach(key => {
                        errorMessage += `\n${key}: ${errors[key].join(', ')}`;
                    });
                    alert(errorMessage);
                }
            }
        }
    </script>
</x-app-layout>
