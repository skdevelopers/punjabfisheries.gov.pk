<x-app-layout title="Edit Seed Selling" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="col-span-12 flex justify-center">
                <div class="card w-full max-w-4xl" x-data="seedSellingEditForm()">
                    <div class="p-6">
                        <!-- Header -->
                        <div class="mb-6">
                            <div class="flex items-center mb-3">
                                <a href="{{ route('crm.seed-sellings.index') }}" class="text-slate-500 dark:text-navy-200 mr-3 flex items-center hover:text-slate-700 dark:hover:text-navy-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </a>
                                <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Edit Seed Selling</h1>
                            </div>
                            <p class="text-slate-500 dark:text-navy-200 text-sm">Update seed selling information</p>
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

                        <form action="{{ route('crm.seed-sellings.update', $seedProduction->id) }}" method="POST" @submit="validateForm" class="space-y-6">
                            @csrf
                            @method('PUT')
                            
                            <div class="bg-slate-50 dark:bg-navy-800 p-6 rounded-lg border border-slate-200 dark:border-navy-600">
                                <h2 class="text-lg font-medium text-slate-800 dark:text-navy-100 mb-4">Production Information</h2>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    <!-- Species Selection -->
                                    <div>
                                        <label for="species" class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                            Species <span class="text-red-500">*</span>
                                        </label>
                                        <select name="species" id="species" 
                                                x-model="formData.species"
                                                @change="updateSizeOptions()"
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
                                        <label for="main_size_option" class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                            Size Range <span class="text-red-500">*</span>
                                        </label>
                                        <select name="main_size_option" id="main_size_option" 
                                                x-model="formData.main_size_option"
                                                @change="updateMainSizeOption()"
                                                class="form-select w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                                required>
                                            <option value="">Select Option</option>
                                            <template x-for="(rate, sizeRange) in getSizeOptions(formData.species)" :key="sizeRange">
                                                <option :value="sizeRange" x-text="sizeRange"></option>
                                            </template>
                                        </select>
                                    </div>

                                    <!-- Nested Size Range (for Size Range option) -->
                                    <div x-show="formData.main_size_option === 'Size Range'">
                                        <label for="size_range" class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                            Select Size <span class="text-red-500">*</span>
                                        </label>
                                        <select name="size_range" id="size_range" 
                                                x-model="formData.size_range"
                                                @change="updateRate()"
                                                class="form-select w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                                required>
                                            <option value="">Select Size</option>
                                            <template x-for="(rate, sizeRange) in getNestedSizeOptions(formData.species, 'Size Range')" :key="sizeRange">
                                                <option :value="sizeRange" x-text="sizeRange"></option>
                                            </template>
                                        </select>
                                    </div>

                                    <!-- Rate -->
                                    <div>
                                        <label for="rate" class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                            Rate (PKR)
                                        </label>
                                        <div class="relative">
                                            <input type="number" 
                                                   name="rate" 
                                                   id="rate" 
                                                   x-model="formData.rate"
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
                                        <label for="quantity" class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                            Quantity <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <input type="number" 
                                                   name="quantity" 
                                                   id="quantity" 
                                                   x-model="formData.quantity"
                                                   @input="calculateTotal()"
                                                   class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 pr-10 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                                   step="0.01" 
                                                   min="0" 
                                                   placeholder="0.00"
                                                   required>
                                            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-500 text-xs" x-text="getQuantityUnit(formData.species, formData.main_size_option, formData.size_range)"></span>
                                        </div>
                                    </div>

                                    <!-- Total Amount -->
                                    <div>
                                        <label for="total_amount" class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                            Total Amount (PKR)
                                        </label>
                                        <div class="relative">
                                            <input type="number" 
                                                   name="total_amount" 
                                                   id="total_amount" 
                                                   x-model="formData.total_amount"
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

                            <!-- Form Actions -->
                            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-slate-200 dark:border-navy-600">
                                <a href="{{ route('crm.seed-sellings.index') }}" 
                                   class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                    Cancel
                                </a>
                                <button type="submit" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                                    <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Update Record
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script type="text/javascript">
        // Pass data from PHP to JavaScript
        window.seedSellingEditData = {
            formData: {
                species: <?php echo json_encode(old('species', $seedProduction->species)); ?>,
                main_size_option: <?php echo json_encode(old('main_size_option', $seedProduction->main_size_option)); ?>,
                size_range: <?php echo json_encode(old('size_range', $seedProduction->size_range)); ?>,
                rate: <?php echo json_encode(old('rate', $seedProduction->rate)); ?>,
                quantity: <?php echo json_encode(old('quantity', $seedProduction->quantity)); ?>,
                total_amount: <?php echo json_encode(old('total_amount', $seedProduction->total_amount)); ?>
            },
            sizeRates: <?php echo json_encode($sizeRates); ?>
        };
        
        function seedSellingEditForm() {
            return {
                formData: window.seedSellingEditData.formData,

                sizeRates: window.seedSellingEditData.sizeRates,

                getSizeOptions(species) {
                    if (!species || !this.sizeRates[species]) {
                        return {};
                    }
                    return this.sizeRates[species];
                },

                getNestedSizeOptions(species, mainOption) {
                    if (!species || !this.sizeRates[species] || !this.sizeRates[species][mainOption]) {
                        return {};
                    }
                    return this.sizeRates[species][mainOption];
                },

                getQuantityUnit(species, mainSizeOption, sizeRange) {
                    if (species && species.includes('Post Larvae')) {
                        if (mainSizeOption && mainSizeOption === 'Per Liter') {
                            return 'L';
                        } else if (mainSizeOption && mainSizeOption === 'Size Range') {
                            return '1000';
                        }
                    } else if (species && (species.includes('Major/Chinese Carp') || species.includes('GIFT'))) {
                        return '1000';
                    } else {
                        return 'Pcs';
                    }
                },

                updateSizeOptions() {
                    this.formData.main_size_option = '';
                    this.formData.size_range = '';
                    this.formData.rate = '';
                    this.formData.total_amount = '';
                },

                updateMainSizeOption() {
                    this.formData.size_range = '';
                    this.formData.rate = '';
                    this.formData.total_amount = '';
                    
                    // If "Per Liter" is selected, set the rate directly
                    if (this.formData.main_size_option === 'Per Liter') {
                        if (this.formData.species && this.sizeRates[this.formData.species] && this.sizeRates[this.formData.species]['Per Liter']) {
                            this.formData.rate = this.sizeRates[this.formData.species]['Per Liter'];
                        }
                    }
                    // For non-post larvae species, if a size range is selected directly
                    else if (!this.formData.species.includes('Post Larvae') && this.formData.main_size_option) {
                        if (this.formData.species && this.sizeRates[this.formData.species] && this.sizeRates[this.formData.species][this.formData.main_size_option]) {
                            this.formData.rate = this.sizeRates[this.formData.species][this.formData.main_size_option];
                            this.formData.size_range = this.formData.main_size_option; // Set size_range for consistency
                        }
                    }
                },

                updateRate() {
                    if (this.formData.species && this.formData.size_range && this.sizeRates[this.formData.species]) {
                        // For post larvae species with nested structure
                        if (this.formData.species.includes('Post Larvae') && this.sizeRates[this.formData.species]['Size Range']) {
                            this.formData.rate = this.sizeRates[this.formData.species]['Size Range'][this.formData.size_range] || '';
                        }
                        // For other species with direct structure
                        else if (!this.formData.species.includes('Post Larvae')) {
                            this.formData.rate = this.sizeRates[this.formData.species][this.formData.size_range] || '';
                        }
                        this.calculateTotal();
                    }
                },

                calculateTotal() {
                    if (this.formData.rate && this.formData.quantity) {
                        this.formData.total_amount = (parseFloat(this.formData.rate) * parseFloat(this.formData.quantity)).toFixed(2);
                    } else {
                        this.formData.total_amount = '';
                    }
                },

                validateForm(event) {
                    if (!this.formData.species || !this.formData.size_range || !this.formData.quantity) {
                        event.preventDefault();
                        alert('Please fill in all required fields.');
                    }
                }
            }
        }
    </script>
</x-app-layout>