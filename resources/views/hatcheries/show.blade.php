<x-app-layout title="Office Details" is-header-blur="true">
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
                            <h1 class="text-3xl font-semibold text-slate-800 dark:text-navy-50 m-0">Office Details</h1>
                        </div>
                        <p class="text-slate-500 dark:text-navy-200 text-base">View office information</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Basic Information -->
                        <div class="card p-6 border border-slate-200 dark:border-navy-600">
                            <h2 class="text-xl font-semibold text-slate-800 dark:text-navy-100 mb-6 pb-3 border-b border-slate-200 dark:border-navy-600">Basic Information</h2>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center py-3 border-b border-slate-100 dark:border-navy-700">
                                    <span class="font-medium text-slate-600 dark:text-navy-300">Office Name:</span>
                                    <span class="text-slate-800 dark:text-navy-100 font-semibold">{{ $hatchery->hatchery_name }}</span>
                                </div>
                                <div class="flex justify-between items-center py-3 border-b border-slate-100 dark:border-navy-700">
                                    <span class="font-medium text-slate-600 dark:text-navy-300">Contact Person:</span>
                                    <span class="text-slate-800 dark:text-navy-100">{{ $hatchery->contact_person }}</span>
                                </div>
                                <div class="flex justify-between items-center py-3 border-b border-slate-100 dark:border-navy-700">
                                    <span class="font-medium text-slate-600 dark:text-navy-300">Mobile Number:</span>
                                    <span class="text-slate-800 dark:text-navy-100">{{ $hatchery->mobile_number }}</span>
                                </div>
                                @if($hatchery->office_number)
                                <div class="flex justify-between items-center py-3 border-b border-slate-100 dark:border-navy-700">
                                    <span class="font-medium text-slate-600 dark:text-navy-300">Office Number:</span>
                                    <span class="text-slate-800 dark:text-navy-100">{{ $hatchery->office_number }}</span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Location Information -->
                        <div class="card p-6 border border-slate-200 dark:border-navy-600">
                            <h2 class="text-xl font-semibold text-slate-800 dark:text-navy-100 mb-6 pb-3 border-b border-slate-200 dark:border-navy-600">Location Information</h2>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center py-3 border-b border-slate-100 dark:border-navy-700">
                                    <span class="font-medium text-slate-600 dark:text-navy-300">Division:</span>
                                    <span class="text-slate-800 dark:text-navy-100">{{ $hatchery->division }}</span>
                                </div>
                                <div class="flex justify-between items-center py-3 border-b border-slate-100 dark:border-navy-700">
                                    <span class="font-medium text-slate-600 dark:text-navy-300">District:</span>
                                    <span class="text-slate-800 dark:text-navy-100">{{ $hatchery->district }}</span>
                                </div>
                                @if($hatchery->office_address)
                                <div class="flex justify-between items-start py-3 border-b border-slate-100 dark:border-navy-700">
                                    <span class="font-medium text-slate-600 dark:text-navy-300">Office Address:</span>
                                    <span class="text-slate-800 dark:text-navy-100 text-right max-w-xs">{{ $hatchery->office_address }}</span>
                                </div>
                                @endif
                                @if($hatchery->longitude)
                                <div class="flex justify-between items-center py-3 border-b border-slate-100 dark:border-navy-700">
                                    <span class="font-medium text-slate-600 dark:text-navy-300">Longitude:</span>
                                    <span class="text-slate-800 dark:text-navy-100">{{ $hatchery->longitude }}</span>
                                </div>
                                @endif
                                @if($hatchery->latitude)
                                <div class="flex justify-between items-center py-3 border-b border-slate-100 dark:border-navy-700">
                                    <span class="font-medium text-slate-600 dark:text-navy-300">Latitude:</span>
                                    <span class="text-slate-800 dark:text-navy-100">{{ $hatchery->latitude }}</span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Office Type -->
                        <div class="card p-6 border border-slate-200 dark:border-navy-600">
                            <h2 class="text-xl font-semibold text-slate-800 dark:text-navy-100 mb-6 pb-3 border-b border-slate-200 dark:border-navy-600">Office Type</h2>
                            <div class="flex items-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium border
                                    @if($hatchery->office_type === 'HM') bg-blue-50 text-blue-700 border-blue-200 dark:bg-blue-900/20 dark:text-blue-300 dark:border-blue-700
                                    @elseif($hatchery->office_type === 'AQUA') bg-green-50 text-green-700 border-green-200 dark:bg-green-900/20 dark:text-green-300 dark:border-green-700
                                    @else bg-purple-50 text-purple-700 border-purple-200 dark:bg-purple-900/20 dark:text-purple-300 dark:border-purple-700
                                    @endif">
                                    {{ $hatchery->office_type }}
                                </span>
                            </div>
                        </div>

                    </div>

                    <div class="flex justify-end space-x-4 pt-8 border-t border-slate-200 dark:border-navy-600">
                        <a href="{{ route('cms.hatcheries.index') }}" 
                           class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            Back to List
                        </a>
                        <a href="{{ route('cms.hatcheries.edit', $hatchery->id) }}" 
                           class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                            Edit Office
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
