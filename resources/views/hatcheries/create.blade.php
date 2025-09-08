<x-app-layout title="Create Office" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="card col-span-12">
                <div class="p-8">
                    <div class="mb-8">
                        <div class="flex items-center mb-4">
                            <a href="{{ route('cms.hatcheries.index') }}" class="text-slate-500 dark:text-navy-200 mr-4 flex items-center hover:text-slate-700 dark:hover:text-navy-100">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </a>
                            <h1 class="text-3xl font-semibold text-slate-800 dark:text-navy-50 m-0">Create New Office</h1>
                        </div>
                        <p class="text-slate-500 dark:text-navy-200 text-base">Add a new office to your system</p>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-error mb-6">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('cms.hatcheries.store') }}" method="POST" class="max-w-7xl">
                        @csrf
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Main Content -->
                            <div class="lg:col-span-2">
                                <div class="card p-6 mb-6">
                                    <h2 class="text-xl font-semibold text-slate-800 dark:text-navy-100 mb-6">Office Information</h2>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Office Name -->
                                        <div>
                                            <label for="hatchery_name" class="block font-medium text-slate-700 dark:text-navy-200 mb-2">
                                                Office Name <span class="text-error">*</span>
                                            </label>
                                            <input type="text" 
                                                   id="hatchery_name" 
                                                   name="hatchery_name" 
                                                   value="{{ old('hatchery_name') }}"
                                                   class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20"
                                                   required>
                                        </div>

                                        <!-- Contact Person -->
                                        <div>
                                            <label for="contact_person" class="block font-medium text-slate-700 dark:text-navy-200 mb-2">
                                                Contact Person <span class="text-error">*</span>
                                            </label>
                                            <input type="text" 
                                                   id="contact_person" 
                                                   name="contact_person" 
                                                   value="{{ old('contact_person') }}"
                                                   class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20"
                                                   required>
                                        </div>

                                        <!-- Mobile Number -->
                                        <div>
                                            <label for="mobile_number" class="block font-medium text-slate-700 dark:text-navy-200 mb-2">
                                                Mobile Number <span class="text-error">*</span>
                                            </label>
                                            <input type="text" 
                                                   id="mobile_number" 
                                                   name="mobile_number" 
                                                   value="{{ old('mobile_number') }}"
                                                   class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20"
                                                   required>
                                        </div>

                                        <!-- Office Number -->
                                        <div>
                                            <label for="office_number" class="block font-medium text-slate-700 dark:text-navy-200 mb-2">
                                                Office Number
                                            </label>
                                            <input type="text" 
                                                   id="office_number" 
                                                   name="office_number" 
                                                   value="{{ old('office_number') }}"
                                                   class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20">
                                        </div>

                                        <!-- Division -->
                                        <div>
                                            <label for="division" class="block font-medium text-slate-700 dark:text-navy-200 mb-2">
                                                Division <span class="text-error">*</span>
                                            </label>
                                            <input type="text" 
                                                   id="division" 
                                                   name="division" 
                                                   value="{{ old('division') }}"
                                                   class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20"
                                                   required>
                                        </div>

                                        <!-- District -->
                                        <div>
                                            <label for="district" class="block font-medium text-slate-700 dark:text-navy-200 mb-2">
                                                District <span class="text-error">*</span>
                                            </label>
                                            <input type="text" 
                                                   id="district" 
                                                   name="district" 
                                                   value="{{ old('district') }}"
                                                   class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20"
                                                   required>
                                        </div>

                                        <!-- Office Address -->
                                        <div class="md:col-span-2">
                                            <label for="office_address" class="block font-medium text-slate-700 dark:text-navy-200 mb-2">
                                                Office Address
                                            </label>
                                            <textarea id="office_address" 
                                                      name="office_address" 
                                                      rows="3"
                                                      class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20"
                                                      placeholder="Enter office address">{{ old('office_address') }}</textarea>
                                        </div>

                                        <!-- Longitude -->
                                        <div>
                                            <label for="longitude" class="block font-medium text-slate-700 dark:text-navy-200 mb-2">
                                                Longitude
                                            </label>
                                            <input type="number" 
                                                   id="longitude" 
                                                   name="longitude" 
                                                   value="{{ old('longitude') }}"
                                                   step="0.00000001"
                                                   min="-180" 
                                                   max="180"
                                                   class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20"
                                                   placeholder="-180.00000000">
                                        </div>

                                        <!-- Latitude -->
                                        <div>
                                            <label for="latitude" class="block font-medium text-slate-700 dark:text-navy-200 mb-2">
                                                Latitude
                                            </label>
                                            <input type="number" 
                                                   id="latitude" 
                                                   name="latitude" 
                                                   value="{{ old('latitude') }}"
                                                   step="0.00000001"
                                                   min="-90" 
                                                   max="90"
                                                   class="form-input w-full rounded-lg border-2 border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary focus:ring-primary/20 dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent dark:focus:ring-accent/20"
                                                   placeholder="-90.00000000">
                                        </div>

                                        <!-- Office Type -->
                                        <div class="md:col-span-2">
                                            <label class="block font-medium text-slate-700 dark:text-navy-200 mb-2">
                                                Office Type <span class="text-error">*</span>
                                            </label>
                                            <div class="space-y-3 p-4 border border-slate-200 dark:border-navy-600 rounded-lg bg-slate-50 dark:bg-navy-800">
                                                <label class="inline-flex items-center space-x-3 cursor-pointer">
                                                    <input type="radio" 
                                                           name="office_type" 
                                                           value="HM" 
                                                           {{ old('office_type') === 'HM' ? 'checked' : '' }}
                                                           class="form-radio is-basic size-5 rounded-full border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                                                           required>
                                                    <span class="text-slate-700 dark:text-navy-200 font-medium">H.M</span>
                                                </label>
                                                <label class="inline-flex items-center space-x-3 cursor-pointer">
                                                    <input type="radio" 
                                                           name="office_type" 
                                                           value="AQUA" 
                                                           {{ old('office_type') === 'AQUA' ? 'checked' : '' }}
                                                           class="form-radio is-basic size-5 rounded-full border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent"
                                                           required>
                                                    <span class="text-slate-700 dark:text-navy-200 font-medium">Aqua</span>
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('cms.hatcheries.index') }}" 
                               class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                                Create Office
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</x-app-layout>
