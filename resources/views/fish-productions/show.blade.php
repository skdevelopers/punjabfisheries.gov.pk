<x-app-layout title="Fish Production Details" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="col-span-12 flex justify-center">
                <div class="card w-full max-w-4xl">
                    <div class="p-6">
                        <!-- Header -->
                        <div class="mb-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Fish Production Details</h1>
                                    <p class="text-slate-500 dark:text-navy-200 text-sm mt-1">View fish production information</p>
                                </div>
                                <a href="{{ route('cms.fish-productions.index') }}" class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                    <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                    </svg>
                                    Back to List
                                </a>
                            </div>
                        </div>

                        <!-- Details Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Species -->
                            <div class="bg-slate-50 dark:bg-navy-800 p-4 rounded-lg border border-slate-200 dark:border-navy-600">
                                <label class="block text-sm font-medium text-slate-600 dark:text-navy-200 mb-2">Species</label>
                                <div class="text-lg font-semibold text-slate-900 dark:text-navy-50">
                                    {{ $fishProduction->species }}
                                </div>
                            </div>

                            <!-- Weight Range -->
                            <div class="bg-slate-50 dark:bg-navy-800 p-4 rounded-lg border border-slate-200 dark:border-navy-600">
                                <label class="block text-sm font-medium text-slate-600 dark:text-navy-200 mb-2">Weight Range</label>
                                <div class="text-lg font-semibold text-slate-900 dark:text-navy-50">
                                    {{ $fishProduction->weight_range ?: '-' }}
                                </div>
                            </div>

                            <!-- Rate -->
                            <div class="bg-slate-50 dark:bg-navy-800 p-4 rounded-lg border border-slate-200 dark:border-navy-600">
                                <label class="block text-sm font-medium text-slate-600 dark:text-navy-200 mb-2">Rate</label>
                                <div class="text-lg font-semibold text-slate-900 dark:text-navy-50">
                                    {{ $fishProduction->rate ? number_format($fishProduction->rate, 2) . ' PKR' : '-' }}
                                </div>
                            </div>

                            <!-- Fish Quantity -->
                            <div class="bg-slate-50 dark:bg-navy-800 p-4 rounded-lg border border-slate-200 dark:border-navy-600">
                                <label class="block text-sm font-medium text-slate-600 dark:text-navy-200 mb-2">Fish Quantity</label>
                                <div class="text-lg font-semibold text-slate-900 dark:text-navy-50">
                                    {{ $fishProduction->fish_qty ? number_format($fishProduction->fish_qty) : '-' }}
                                </div>
                            </div>

                            <!-- Total Weight -->
                            <div class="bg-slate-50 dark:bg-navy-800 p-4 rounded-lg border border-slate-200 dark:border-navy-600">
                                <label class="block text-sm font-medium text-slate-600 dark:text-navy-200 mb-2">Total Weight</label>
                                <div class="text-lg font-semibold text-slate-900 dark:text-navy-50">
                                    {{ $fishProduction->total_weight ? number_format($fishProduction->total_weight, 2) . ' kg' : '-' }}
                                </div>
                            </div>

                            <!-- Average Weight -->
                            <div class="bg-slate-50 dark:bg-navy-800 p-4 rounded-lg border border-slate-200 dark:border-navy-600">
                                <label class="block text-sm font-medium text-slate-600 dark:text-navy-200 mb-2">Avg Weight</label>
                                <div class="text-lg font-semibold text-slate-900 dark:text-navy-50">
                                    {{ $fishProduction->avg_weight ? number_format($fishProduction->avg_weight, 2) . ' g' : '-' }}
                                </div>
                            </div>
                        </div>

                        <!-- Additional Info -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6 pt-6 border-t border-slate-200 dark:border-navy-600">
                            <div class="bg-slate-50 dark:bg-navy-800 p-4 rounded-lg border border-slate-200 dark:border-navy-600">
                                <label class="block text-sm font-medium text-slate-600 dark:text-navy-200 mb-2">Created At</label>
                                <div class="text-sm text-slate-900 dark:text-navy-50">
                                    {{ $fishProduction->created_at->format('F d, Y \a\t g:i A') }}
                                </div>
                            </div>

                            <div class="bg-slate-50 dark:bg-navy-800 p-4 rounded-lg border border-slate-200 dark:border-navy-600">
                                <label class="block text-sm font-medium text-slate-600 dark:text-navy-200 mb-2">Last Updated</label>
                                <div class="text-sm text-slate-900 dark:text-navy-50">
                                    {{ $fishProduction->updated_at->format('F d, Y \a\t g:i A') }}
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end space-x-3 pt-6 border-t border-slate-200 dark:border-navy-600">
                            <a href="{{ route('cms.fish-productions.edit', $fishProduction->id) }}" 
                               class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                                <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit Record
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
