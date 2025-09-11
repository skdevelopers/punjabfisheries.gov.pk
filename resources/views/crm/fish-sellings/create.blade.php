<x-app-layout title="Create Fish Selling" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="col-span-12 flex justify-center">
                <div class="card w-full max-w-5xl" x-data="fishSellingForm()">
                    <div class="p-6">
                        <!-- Header -->
                        <div class="mb-6">
                            <div class="flex items-center mb-3">
                                <a href="{{ route('crm.fish-sellings.index') }}" class="text-slate-500 dark:text-navy-200 mr-3 flex items-center hover:text-slate-700 dark:hover:text-navy-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                                <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Create Fish Selling</h1>
            </div>
                            <p class="text-slate-500 dark:text-navy-200 text-sm">Add new fish selling records</p>
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

                        <form action="{{ route('crm.fish-sellings.store') }}" method="POST" @submit="validateForm" class="space-y-6">
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
                                <!-- 1. Species Selection -->
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                                    Species <span class="text-red-500">*</span>
                                                </label>
                                                <select :name="`entries[${index}][species]`" 
                                                        x-model="entry.species"
                                                        @change="updateWeightOptions(index)"
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
                                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                                    Weight Range <span class="text-red-500">*</span>
                                                </label>
                                                <select :name="`entries[${index}][weight_range]`" 
                                                        x-model="entry.weight_range"
                                                        @change="updateRate(index)"
                                                        class="form-select w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                               required>
                                        <option value="">Select Weight Range</option>
                                        <template x-for="(rate, weightRange) in getWeightOptions(entry.species)" :key="weightRange">
                                            <option :value="weightRange" x-text="weightRange"></option>
                                        </template>
                                    </select>
                                            </div>

                                <!-- 3. Rate -->
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                                    Rate
                                                </label>
                                    <div class="relative">
                                        <input type="number" 
                                                           :name="`entries[${index}][rate]`" 
                                                           x-model="entry.rate"
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
                                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                                    Fish Quantity <span class="text-red-500">*</span>
                                                </label>
                                                <input type="number" 
                                                       :name="`entries[${index}][fish_qty]`" 
                                                       x-model="entry.fish_qty"
                                                       @input="calculateAvgWeight(index)"
                                                       class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                                       min="0" 
                                                       placeholder="Enter quantity"
                                                       required>
                                            </div>

                                <!-- 5. Total Weight -->
                                            <div>
                                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                                    Total Weight (kg) <span class="text-red-500">*</span>
                                                </label>
                                                <div class="relative">
                                                    <input type="number" 
                                                           :name="`entries[${index}][total_weight]`" 
                                                           x-model="entry.total_weight"
                                                           @input="calculateAvgWeight(index)"
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
                                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                                    Avg Weight (g)
                                                </label>
                                                <div class="relative">
                                                    <input type="number" 
                                                           :name="`entries[${index}][avg_weight]`" 
                                                           x-model="entry.avg_weight"
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
                        <a href="{{ route('crm.fish-sellings.index') }}" 
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

    <script type="text/javascript">
        // Pass data from PHP to JavaScript
        window.fishSellingData = <?php echo json_encode($weightRates); ?>;
        
        function fishSellingForm() {
            return {
                entries: [{
                    species: '',
                    weight_range: '',
                    rate: '',
                    fish_qty: '',
                    total_weight: '',
                    avg_weight: ''
                }],

                // Weight rates data from PHP
                weightRates: window.fishSellingData,

                addEntry() {
                    this.entries.push({
                        species: '',
                        weight_range: '',
                        rate: '',
                        fish_qty: '',
                        total_weight: '',
                        avg_weight: ''
                    });
                },

                removeEntry(index) {
                    if (this.entries.length > 1) {
                        this.entries.splice(index, 1);
                    }
                },

                // Get weight options for selected species
                getWeightOptions(species) {
                    if (!species || !this.weightRates[species]) {
                        return {};
                    }
                    return this.weightRates[species];
                },

                // Update weight options when species changes
                updateWeightOptions(index) {
                    this.entries[index].weight_range = '';
                    this.entries[index].rate = '';
                },

                // Update rate when weight range is selected
                updateRate(index) {
                    const entry = this.entries[index];
                    if (entry.species && entry.weight_range && this.weightRates[entry.species]) {
                        entry.rate = this.weightRates[entry.species][entry.weight_range] || '';
                    }
                },

                // Calculate average weight automatically
                calculateAvgWeight(index) {
                    const entry = this.entries[index];
                    if (entry.fish_qty && entry.total_weight && entry.fish_qty > 0) {
                        // Convert total weight from kg to grams and divide by fish quantity
                        const avgWeightInGrams = (entry.total_weight * 1000) / entry.fish_qty;
                        entry.avg_weight = avgWeightInGrams.toFixed(2);
                    } else {
                        entry.avg_weight = '';
                    }
                },

                validateForm(event) {
                let isValid = true;

                    this.entries.forEach((entry, index) => {
                        if (!entry.species || !entry.weight_range || !entry.fish_qty || !entry.total_weight) {
                        isValid = false;
                    }
                });

                if (!isValid) {
                        event.preventDefault();
                    alert('Please fill in all required fields for all entries.');
                    }
                }
            }
        }
    </script>
</x-app-layout>
