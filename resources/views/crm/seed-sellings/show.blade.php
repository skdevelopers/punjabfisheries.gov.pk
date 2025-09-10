<x-app-layout title="Seed Selling Details" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="col-span-12 flex justify-center">
                <div class="card w-full max-w-4xl">
                    <div class="p-6">
                        <!-- Header -->
                        <div class="mb-6">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center">
                                    <a href="{{ route('crm.seed-sellings.index') }}" class="text-slate-500 dark:text-navy-200 mr-3 flex items-center hover:text-slate-700 dark:hover:text-navy-100">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </a>
                                    <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Seed Selling Details</h1>
                                </div>
                                <a href="{{ route('crm.seed-sellings.edit', $seedSelling->id) }}" 
                                   class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                                    <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit Record
                                </a>
                            </div>
                        </div>

                        <!-- Details Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Species -->
                            <div class="bg-slate-50 dark:bg-navy-800 p-4 rounded-lg">
                                <label class="block text-sm font-medium text-slate-600 dark:text-navy-300 mb-2">Species</label>
                                <div class="text-lg font-semibold text-slate-800 dark:text-navy-100">
                                    {{ $seedSelling->species }}
                                </div>
                            </div>

                            <!-- Size Range -->
                            <div class="bg-slate-50 dark:bg-navy-800 p-4 rounded-lg">
                                <label class="block text-sm font-medium text-slate-600 dark:text-navy-300 mb-2">Size Range</label>
                                <div class="text-lg font-semibold text-slate-800 dark:text-navy-100">
                                    {{ $seedSelling->size_range ?? 'N/A' }}
                                </div>
                            </div>

                            <!-- Rate -->
                            <div class="bg-slate-50 dark:bg-navy-800 p-4 rounded-lg">
                                <label class="block text-sm font-medium text-slate-600 dark:text-navy-300 mb-2">Rate (PKR)</label>
                                <div class="text-lg font-semibold text-slate-800 dark:text-navy-100">
                                    {{ $seedSelling->rate ? 'PKR ' . number_format($seedSelling->rate, 2) : 'N/A' }}
                                </div>
                            </div>

                            <!-- Quantity -->
                            <div class="bg-slate-50 dark:bg-navy-800 p-4 rounded-lg">
                                <label class="block text-sm font-medium text-slate-600 dark:text-navy-300 mb-2">Quantity</label>
                                <div class="text-lg font-semibold text-slate-800 dark:text-navy-100">
                                    {{ $seedSelling->quantity ? number_format($seedSelling->quantity, 2) : 'N/A' }}
                                </div>
                            </div>

                            <!-- Total Amount -->
                            <div class="bg-slate-50 dark:bg-navy-800 p-4 rounded-lg">
                                <label class="block text-sm font-medium text-slate-600 dark:text-navy-300 mb-2">Total Amount (PKR)</label>
                                <div class="text-lg font-semibold text-slate-800 dark:text-navy-100">
                                    {{ $seedSelling->total_amount ? 'PKR ' . number_format($seedSelling->total_amount, 2) : 'N/A' }}
                                </div>
                            </div>
                        </div>

                        <!-- Additional Info -->
                        <div class="mt-8 pt-6 border-t border-slate-200 dark:border-navy-600">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-slate-50 dark:bg-navy-800 p-4 rounded-lg">
                                    <label class="block text-sm font-medium text-slate-600 dark:text-navy-300 mb-2">Created At</label>
                                    <div class="text-slate-800 dark:text-navy-100">
                                        {{ $seedSelling->created_at->format('F d, Y \a\t g:i A') }}
                                    </div>
                                </div>

                                <div class="bg-slate-50 dark:bg-navy-800 p-4 rounded-lg">
                                    <label class="block text-sm font-medium text-slate-600 dark:text-navy-300 mb-2">Last Updated</label>
                                    <div class="text-slate-800 dark:text-navy-100">
                                        {{ $seedSelling->updated_at->format('F d, Y \a\t g:i A') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
