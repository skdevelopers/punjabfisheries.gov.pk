<x-app-layout title="Create Seed Production" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="col-span-12 flex justify-center">
                <div class="card w-full max-w-5xl" x-data="seedProductionForm()">
                    <div class="p-6">
                        <!-- Header -->
                        <div class="mb-6">
                            <div class="flex items-center mb-3">
                                <a href="{{ route('cms.seed-productions.index') }}" class="text-slate-500 dark:text-navy-200 mr-3 flex items-center hover:text-slate-700 dark:hover:text-navy-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </a>
                                <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Create Seed Production</h1>
                            </div>
                            <p class="text-slate-500 dark:text-navy-200 text-sm">Add new seed production records</p>
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

                        <form action="{{ route('cms.seed-productions.store') }}" method="POST" @submit="validateForm" class="space-y-6">
                            @csrf
                            
                            <!-- Multiple Entries Container -->
                            <div class="space-y-4">
                                <template x-for="(entry, index) in entries" :key="index">
                                    <div class="entry-row bg-slate-50 dark:bg-navy-800 p-6 rounded-lg border border-slate-200 dark:border-navy-600">
                                        <div class="flex items-center justify-end mb-4">
                                            <button type="button" 
                                                    @click="removeEntry(index)"
                                                    x-show="entries.length > 1"
                                                    class="btn size-8 rounded-full p-0 bg-red-500/10 text-red-500 hover:bg-red-500/20">
                                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                            <!-- Species Selection -->
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                                    Species <span class="text-red-500">*</span>
                                                </label>
                                                <select :name="`entries[${index}][species]`" 
                                                        x-model="entry.species"
                                                        @change="updateSizeOptions(index)"
                                                        class="form-select w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                                        required>
                                                    <option value="">Select Species</option>
                                                    @foreach($species as $key => $value)
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Size Range -->
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                                    Size Range <span class="text-red-500">*</span>
                                                </label>
                                                <select :name="`entries[${index}][size_range]`" 
                                                        x-model="entry.size_range"
                                                        @change="updateRate(index)"
                                                        class="form-select w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                                        required>
                                                    <option value="">Select Size Range</option>
                                                    <template x-for="(rate, sizeRange) in getSizeOptions(entry.species)" :key="sizeRange">
                                                        <option :value="sizeRange" x-text="sizeRange"></option>
                                                    </template>
                                                </select>
                                            </div>

                                            <!-- Rate -->
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                                    Rate (PKR)
                                                </label>
                                                <div class="relative">
                                                    <input type="number" 
                                                           :name="`entries[${index}][rate]`" 
                                                           x-model="entry.rate"
                                                           readonly
                                                           class="form-input w-full rounded-lg border-2 border-slate-300 bg-gray-100 px-3 py-2 pr-10 dark:border-navy-450 dark:bg-navy-600" 
                                                           step="0.01" 
                                                           min="0" 
                                                           placeholder="Auto-filled">
                                                    <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-500 text-xs">PKR</span>
                                                </div>
                                            </div>

                                            <!-- Quantity -->
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                                    Quantity <span class="text-red-500">*</span>
                                                </label>
                                                <div class="relative">
                                                    <input type="number" 
                                                           :name="`entries[${index}][quantity]`" 
                                                           x-model="entry.quantity"
                                                           @input="calculateTotal(index)"
                                                           class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 pr-10 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                                           step="0.01" 
                                                           min="0" 
                                                           placeholder="0.00"
                                                           required>
                                                    <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-500 text-xs" x-text="getQuantityUnit(entry.species)"></span>
                                                </div>
                                            </div>

                                            <!-- Total Amount -->
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                                    Total Amount (PKR)
                                                </label>
                                                <div class="relative">
                                                    <input type="number" 
                                                           :name="`entries[${index}][total_amount]`" 
                                                           x-model="entry.total_amount"
                                                           readonly
                                                           class="form-input w-full rounded-lg border-2 border-slate-300 bg-gray-100 px-3 py-2 pr-10 dark:border-navy-450 dark:bg-navy-600" 
                                                           step="0.01" 
                                                           min="0" 
                                                           placeholder="Auto-calculated">
                                                    <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-500 text-xs">PKR</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <!-- Add More Entries Button -->
                            <div class="flex items-center justify-center">
                                <button type="button" @click="addEntry" class="btn bg-emerald-500 font-medium text-white hover:bg-emerald-600 focus:bg-emerald-600 active:bg-emerald-700">
                                    <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Add Another Entry
                                </button>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-slate-200 dark:border-navy-600">
                                <a href="{{ route('cms.seed-productions.index') }}" 
                                   class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                    Cancel
                                </a>
                                <button type="submit" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                                    <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Create Records
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Pass data from PHP to JavaScript
        window.seedProductionData = {!! json_encode($sizeRates) !!};
        
        function seedProductionForm() {
            return {
                entries: [{
                    species: '',
                    size_range: '',
                    rate: '',
                    quantity: '',
                    total_amount: ''
                }],

                sizeRates: window.seedProductionData,

                addEntry() {
                    this.entries.push({
                        species: '',
                        size_range: '',
                        rate: '',
                        quantity: '',
                        total_amount: ''
                    });
                },

                removeEntry(index) {
                    if (this.entries.length > 1) {
                        this.entries.splice(index, 1);
                    }
                },

                getSizeOptions(species) {
                    if (!species || !this.sizeRates[species]) {
                        return {};
                    }
                    return this.sizeRates[species];
                },

                getQuantityUnit(species) {
                    if (species && species.includes('Post Larvae')) {
                        return 'L';
                    } else if (species && (species.includes('Major/Chinese Carp') || species.includes('GIFT'))) {
                        return '1000';
                    } else {
                        return 'Pcs';
                    }
                },

                updateSizeOptions(index) {
                    this.entries[index].size_range = '';
                    this.entries[index].rate = '';
                    this.entries[index].total_amount = '';
                },

                updateRate(index) {
                    const entry = this.entries[index];
                    if (entry.species && entry.size_range && this.sizeRates[entry.species]) {
                        entry.rate = this.sizeRates[entry.species][entry.size_range] || '';
                        this.calculateTotal(index);
                    }
                },

                calculateTotal(index) {
                    const entry = this.entries[index];
                    if (entry.rate && entry.quantity) {
                        entry.total_amount = (parseFloat(entry.rate) * parseFloat(entry.quantity)).toFixed(2);
                    } else {
                        entry.total_amount = '';
                    }
                },

                validateForm(event) {
                    let isValid = true;
                    let missingFields = [];
                    
                    this.entries.forEach((entry, index) => {
                        if (!entry.species) {
                            missingFields.push(`Entry ${index + 1}: Species`);
                            isValid = false;
                        }
                        if (!entry.size_range) {
                            missingFields.push(`Entry ${index + 1}: Size Range`);
                            isValid = false;
                        }
                        if (!entry.quantity) {
                            missingFields.push(`Entry ${index + 1}: Quantity`);
                            isValid = false;
                        }
                    });

                    if (!isValid) {
                        event.preventDefault();
                        alert('Please fill in all required fields:\n' + missingFields.join('\n'));
                        return false;
                    }
                    
                    console.log('Form validation passed, submitting...');
                    return true;
                }
            }
        }
    </script>
</x-app-layout>