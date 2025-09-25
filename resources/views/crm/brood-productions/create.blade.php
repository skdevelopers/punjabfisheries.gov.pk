<x-app-layout title="Create Brood Production" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="col-span-12 flex justify-center">
                <div class="card w-full max-w-4xl" x-data="broodProductionForm()">
                    <div class="p-6">
                        <!-- Header -->
                        <div class="mb-6">
                            <div class="flex items-center mb-3">
                                <a href="{{ route('crm.brood-productions.index') }}" class="text-slate-500 dark:text-navy-200 mr-3 flex items-center hover:text-slate-700 dark:hover:text-navy-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </a>
                                <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Create Brood Production Record</h1>
                            </div>
                            <p class="text-slate-500 dark:text-navy-200 text-sm">Add new brood production and breeding records</p>
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

                        <form action="{{ route('crm.brood-productions.store') }}" method="POST" @submit="validateForm" class="space-y-6">
                            @csrf
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Hatchery Name -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                        Hatchery Name <span class="text-red-500">*</span>
                                    </label>
                                    <select name="hatchery_name" 
                                            x-model="formData.hatchery_name"
                                            class="form-select w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                            required>
                                        <option value="">Select Hatchery</option>
                                        @foreach($hatcheries as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Species -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                        Species <span class="text-red-500">*</span>
                                    </label>
                                    <select name="species" 
                                            x-model="formData.species"
                                            class="form-select w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                            required>
                                        <option value="">Select Species</option>
                                        @foreach($species as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Brood Type -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                        Brood Type <span class="text-red-500">*</span>
                                    </label>
                                    <select name="brood_type" 
                                            x-model="formData.brood_type"
                                            class="form-select w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                            required>
                                        <option value="">Select Brood Type</option>
                                        @foreach($broodTypes as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Breeding Status -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                        Breeding Status <span class="text-red-500">*</span>
                                    </label>
                                    <select name="breeding_status" 
                                            x-model="formData.breeding_status"
                                            class="form-select w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                            required>
                                        <option value="">Select Status</option>
                                        @foreach($breedingStatuses as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Brood Count -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                        Brood Count <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" 
                                           name="brood_count" 
                                           x-model="formData.brood_count"
                                           @input="calculateTotalWeight"
                                           class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                           min="1" 
                                           placeholder="Enter count"
                                           required>
                                </div>

                                <!-- Average Weight -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                        Average Weight (g) <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <input type="number" 
                                               name="avg_weight" 
                                               x-model="formData.avg_weight"
                                               @input="calculateTotalWeight"
                                               class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 pr-10 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                               step="0.01" 
                                               min="0" 
                                               placeholder="0.00"
                                               required>
                                        <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-500 text-xs">g</span>
                                    </div>
                                </div>

                                <!-- Total Weight (Auto-calculated) -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                        Total Weight (kg)
                                    </label>
                                    <div class="relative">
                                        <input type="number" 
                                               name="total_weight" 
                                               x-model="formData.total_weight"
                                               class="form-input w-full rounded-lg border-2 border-slate-300 bg-gray-100 px-3 py-2 pr-10 dark:bg-navy-600" 
                                               step="0.01" 
                                               min="0" 
                                               placeholder="Auto-calculated"
                                               readonly>
                                        <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-500 text-xs">kg</span>
                                    </div>
                                </div>

                                <!-- Spawning Date -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                        Spawning Date
                                    </label>
                                    <input type="date" 
                                           name="spawning_date" 
                                           x-model="formData.spawning_date"
                                           class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20">
                                </div>

                                <!-- Eggs Collected -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                        Eggs Collected
                                    </label>
                                    <input type="number" 
                                           name="eggs_collected" 
                                           x-model="formData.eggs_collected"
                                           @input="calculateSurvivalRate"
                                           class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                           min="0" 
                                           placeholder="Enter count">
                                </div>

                                <!-- Fry Produced -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                        Fry Produced
                                    </label>
                                    <input type="number" 
                                           name="fry_produced" 
                                           x-model="formData.fry_produced"
                                           @input="calculateSurvivalRate"
                                           class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                           min="0" 
                                           placeholder="Enter count">
                                </div>

                                <!-- Survival Rate (Auto-calculated) -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                        Survival Rate (%)
                                    </label>
                                    <div class="relative">
                                        <input type="number" 
                                               name="survival_rate" 
                                               x-model="formData.survival_rate"
                                               class="form-input w-full rounded-lg border-2 border-slate-300 bg-gray-100 px-3 py-2 pr-10 dark:bg-navy-600" 
                                               step="0.01" 
                                               min="0" 
                                               max="100"
                                               placeholder="Auto-calculated"
                                               readonly>
                                        <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-slate-500 text-xs">%</span>
                                    </div>
                                </div>

                                <!-- Recorded By -->
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                        Recorded By <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           name="recorded_by" 
                                           x-model="formData.recorded_by"
                                           class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                           placeholder="Enter name"
                                           required>
                                </div>
                            </div>

                            <!-- Notes -->
                            <div>
                                <label class="block text-sm font-medium text-slate-700 dark:text-navy-200 mb-1">
                                    Notes
                                </label>
                                <textarea name="notes" 
                                          x-model="formData.notes"
                                          rows="3"
                                          class="form-textarea w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20" 
                                          placeholder="Additional notes..."></textarea>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-slate-200 dark:border-navy-600">
                                <a href="{{ route('crm.brood-productions.index') }}" 
                                   class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                    Cancel
                                </a>
                                <button type="submit" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                                    <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Create Record
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script type="text/javascript">
        function broodProductionForm() {
            return {
                formData: {
                    hatchery_name: '',
                    species: '',
                    brood_type: '',
                    breeding_status: '',
                    brood_count: '',
                    avg_weight: '',
                    total_weight: '',
                    spawning_date: '',
                    eggs_collected: '',
                    fry_produced: '',
                    survival_rate: '',
                    recorded_by: '',
                    notes: ''
                },

                calculateTotalWeight() {
                    if (this.formData.brood_count && this.formData.avg_weight) {
                        // Convert avg weight from grams to kg and multiply by count
                        const totalWeightInKg = (this.formData.brood_count * this.formData.avg_weight) / 1000;
                        this.formData.total_weight = totalWeightInKg.toFixed(2);
                    } else {
                        this.formData.total_weight = '';
                    }
                },

                calculateSurvivalRate() {
                    if (this.formData.eggs_collected && this.formData.fry_produced && this.formData.eggs_collected > 0) {
                        const survivalRate = (this.formData.fry_produced / this.formData.eggs_collected) * 100;
                        this.formData.survival_rate = survivalRate.toFixed(2);
                    } else {
                        this.formData.survival_rate = '';
                    }
                },

                validateForm(event) {
                    const requiredFields = [
                        'hatchery_name', 'species', 'brood_type', 'breeding_status', 
                        'brood_count', 'avg_weight', 'recorded_by'
                    ];

                    let isValid = true;
                    let missingFields = [];

                    requiredFields.forEach(field => {
                        if (!this.formData[field] || this.formData[field].toString().trim() === '') {
                            missingFields.push(field.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase()));
                            isValid = false;
                        }
                    });

                    if (!isValid) {
                        event.preventDefault();
                        alert('Please fill in all required fields:\n' + missingFields.join('\n'));
                        return false;
                    }

                    return true;
                }
            }
        }
    </script>
</x-app-layout>
