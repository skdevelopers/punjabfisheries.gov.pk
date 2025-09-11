<x-app-layout title="Edit Fish Selling" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="col-span-12 flex justify-center">
                <div class="card w-full max-w-4xl" x-data="fishSellingEditForm()">
                    <div class="p-6">
                        <!-- Header -->
                        <div class="mb-6">
                            <div class="flex items-center mb-3">
                                <a href="{{ route('crm.fish-sellings.index') }}" class="text-slate-500 dark:text-navy-200 mr-3 flex items-center hover:text-slate-700 dark:hover:text-navy-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </a>
                                <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Edit Fish Selling</h1>
                            </div>
                            <p class="text-slate-500 dark:text-navy-200 text-sm">Update fish selling information</p>
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

                        <form action="{{ route('crm.fish-sellings.update', $fishProduction->id) }}" method="POST" @submit="validateForm" class="space-y-6">
                            @csrf
                            @method('PUT')
                            
                            <div class="bg-slate-50 dark:bg-navy-800 p-6 rounded-lg border border-slate-200 dark:border-navy-600">
                                <h2 class="text-lg font-medium text-slate-800 dark:text-navy-100 mb-4">Production Information</h2>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    <!-- 1. Species Selection -->
                                    <div>
                                        <label for="species" class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                            Species <span class="text-red-500">*</span>
                                        </label>
                                        <select name="species" id="species" 
                                                x-model="formData.species"
                                                @change="updateWeightOptions()"
                                                class="form-select w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                                required>
                                            <option value="">Select Species</option>
                                            @foreach($species as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- 2. Weight Range Selection -->
                                    <div>
                                        <label for="weight_range" class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                            Weight Range <span class="text-red-500">*</span>
                                        </label>
                                        <select name="weight_range" id="weight_range" 
                                                x-model="formData.weight_range"
                                                @change="updateRate()"
                                                class="form-select w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                                required>
                                            <option value="">Select Weight Range</option>
                                            <template x-for="(rate, weightRange) in getWeightOptions(formData.species)" :key="weightRange">
                                                <option :value="weightRange" x-text="weightRange"></option>
                                            </template>
                                        </select>
                                    </div>

                                    <!-- 3. Rate -->
                                    <div>
                                        <label for="rate" class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                            Rate
                                        </label>
                                        <div class="relative">
                                            <input type="number" 
                                                   name="rate" 
                                                   id="rate" 
                                                   x-model="formData.rate"
                                                   class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 pr-10 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                                   step="0.01" 
                                                   min="0" 
                                                   placeholder="0.00"
                                                   readonly>
                                            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-500 text-xs">PKR</span>
                                        </div>
                                    </div>

                                    <!-- 4. Fish Quantity -->
                                    <div>
                                        <label for="fish_qty" class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                            Fish Quantity <span class="text-red-500">*</span>
                                        </label>
                                        <input type="number" 
                                               name="fish_qty" 
                                               id="fish_qty" 
                                               x-model="formData.fish_qty"
                                               @input="calculateAvgWeight()"
                                               class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                               min="0" 
                                               placeholder="Enter quantity"
                                               required>
                                    </div>

                                    <!-- 5. Total Weight -->
                                    <div>
                                        <label for="total_weight" class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                            Total Weight (kg) <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <input type="number" 
                                                   name="total_weight" 
                                                   id="total_weight" 
                                                   x-model="formData.total_weight"
                                                   @input="calculateAvgWeight()"
                                                   class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 pr-10 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                                   step="0.01" 
                                                   min="0" 
                                                   placeholder="0.00"
                                                   required>
                                            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-500 text-xs">kg</span>
                                        </div>
                                    </div>

                                    <!-- 6. Average Weight (Auto-calculated) -->
                                    <div>
                                        <label for="avg_weight" class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                            Avg Weight (g)
                                        </label>
                                        <div class="relative">
                                            <input type="number" 
                                                   name="avg_weight" 
                                                   id="avg_weight" 
                                                   x-model="formData.avg_weight"
                                                   class="form-input w-full rounded-lg border-2 border-slate-300 bg-gray-100 px-3 py-2 pr-10 dark:bg-navy-600" 
                                                   step="0.01" 
                                                   min="0" 
                                                   placeholder="Auto-calculated"
                                                   readonly>
                                            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-500 text-xs">g</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-slate-200 dark:border-navy-600">
                                <a href="{{ route('crm.fish-sellings.index') }}" 
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
        window.fishSellingEditData = {
            formData: {
                species: <?php echo json_encode(old('species', $fishProduction->species)); ?>,
                weight_range: <?php echo json_encode(old('weight_range', $fishProduction->weight_range)); ?>,
                rate: <?php echo json_encode(old('rate', $fishProduction->rate)); ?>,
                fish_qty: <?php echo json_encode(old('fish_qty', $fishProduction->fish_qty)); ?>,
                total_weight: <?php echo json_encode(old('total_weight', $fishProduction->total_weight)); ?>,
                avg_weight: <?php echo json_encode(old('avg_weight', $fishProduction->avg_weight)); ?>
            },
            weightRates: <?php echo json_encode($weightRates); ?>
        };
        
        function fishSellingEditForm() {
            return {
                formData: window.fishSellingEditData.formData,

                // Weight rates data from PHP
                weightRates: window.fishSellingEditData.weightRates,

                // Get weight options for selected species
                getWeightOptions(species) {
                    if (!species || !this.weightRates[species]) {
                        return {};
                    }
                    return this.weightRates[species];
                },

                // Update weight options when species changes
                updateWeightOptions() {
                    this.formData.weight_range = '';
                    this.formData.rate = '';
                },

                // Update rate when weight range is selected
                updateRate() {
                    if (this.formData.species && this.formData.weight_range && this.weightRates[this.formData.species]) {
                        this.formData.rate = this.weightRates[this.formData.species][this.formData.weight_range] || '';
                    }
                },

                // Calculate average weight automatically
                calculateAvgWeight() {
                    if (this.formData.fish_qty && this.formData.total_weight && this.formData.fish_qty > 0) {
                        // Convert total weight from kg to grams and divide by fish quantity
                        const avgWeightInGrams = (this.formData.total_weight * 1000) / this.formData.fish_qty;
                        this.formData.avg_weight = avgWeightInGrams.toFixed(2);
                    } else {
                        this.formData.avg_weight = '';
                    }
                },

                validateForm(event) {
                    if (!this.formData.species || !this.formData.weight_range || !this.formData.fish_qty || !this.formData.total_weight) {
                        event.preventDefault();
                        alert('Please fill in all required fields.');
                    }
                }
            }
        }
    </script>
</x-app-layout>