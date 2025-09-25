<x-app-layout title="Brood Productions" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center justify-between space-x-2 py-5">
            <h3 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Brood Production Records
            </h3>
            <a href="{{ route('crm.brood-productions.create') }}"
                class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                <span>Add New Record</span>
            </a>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 mb-6">
            <div class="card p-4 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs+ text-slate-500 dark:text-navy-200">Total Records</p>
                        <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ $broodProductions->total() }}</p>
                    </div>
                    <div class="size-12 rounded-full bg-primary/10 flex items-center justify-center">
                        <svg class="size-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="card p-4 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs+ text-slate-500 dark:text-navy-200">Active Breeding</p>
                        <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ $broodProductions->where('breeding_status', 'spawning')->count() }}</p>
                    </div>
                    <div class="size-12 rounded-full bg-success/10 flex items-center justify-center">
                        <svg class="size-6 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="card p-4 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs+ text-slate-500 dark:text-navy-200">Total Brood</p>
                        <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ $broodProductions->sum('brood_count') }}</p>
                    </div>
                    <div class="size-12 rounded-full bg-info/10 flex items-center justify-center">
                        <svg class="size-6 text-info" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="card p-4 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs+ text-slate-500 dark:text-navy-200">Total Fry</p>
                        <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ $broodProductions->sum('fry_produced') }}</p>
                    </div>
                    <div class="size-12 rounded-full bg-warning/10 flex items-center justify-center">
                        <svg class="size-6 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Records Table -->
        <div class="card">
            <div class="p-4 sm:p-5">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">Brood Production Records</h4>
                    <div class="flex items-center space-x-2">
                        <div class="relative">
                            <input type="text" placeholder="Search records..." 
                                   class="form-input w-64 rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent">
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">Hatchery</th>
                                <th class="whitespace-nowrap">Species</th>
                                <th class="whitespace-nowrap">Brood Type</th>
                                <th class="whitespace-nowrap">Count</th>
                                <th class="whitespace-nowrap">Weight</th>
                                <th class="whitespace-nowrap">Status</th>
                                <th class="whitespace-nowrap">Fry Produced</th>
                                <th class="whitespace-nowrap">Survival Rate</th>
                                <th class="whitespace-nowrap">Date</th>
                                <th class="whitespace-nowrap">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($broodProductions as $record)
                            <tr>
                                <td class="whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="size-8 rounded-full bg-slate-100 dark:bg-navy-600 flex items-center justify-center">
                                            <svg class="size-4 text-slate-600 dark:text-navy-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-slate-700 dark:text-navy-100">{{ $record->hatchery_name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap">
                                    <span class="text-sm text-slate-700 dark:text-navy-100">{{ $record->species_label }}</span>
                                </td>
                                <td class="whitespace-nowrap">
                                    <span class="badge bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent">{{ $record->brood_type_label }}</span>
                                </td>
                                <td class="whitespace-nowrap">
                                    <span class="text-sm text-slate-700 dark:text-navy-100">{{ number_format($record->brood_count) }}</span>
                                </td>
                                <td class="whitespace-nowrap">
                                    <span class="text-sm text-slate-700 dark:text-navy-100">{{ $record->formatted_total_weight }}</span>
                                </td>
                                <td class="whitespace-nowrap">
                                    @php
                                        $statusColors = [
                                            'ready' => 'bg-success/10 text-success',
                                            'spawning' => 'bg-primary/10 text-primary',
                                            'post_spawning' => 'bg-warning/10 text-warning',
                                            'resting' => 'bg-slate-100 text-slate-600 dark:bg-navy-600 dark:text-navy-200'
                                        ];
                                    @endphp
                                    <span class="badge {{ $statusColors[$record->breeding_status] ?? 'bg-slate-100 text-slate-600 dark:bg-navy-600 dark:text-navy-200' }}">
                                        {{ $record->breeding_status_label }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap">
                                    <span class="text-sm text-slate-700 dark:text-navy-100">
                                        {{ $record->fry_produced ? number_format($record->fry_produced) : '-' }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap">
                                    <span class="text-sm text-slate-700 dark:text-navy-100">
                                        {{ $record->formatted_survival_rate ?? '-' }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap">
                                    <span class="text-sm text-slate-500 dark:text-navy-300">{{ $record->created_at->format('d M Y') }}</span>
                                </td>
                                <td class="whitespace-nowrap">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('crm.brood-productions.show', $record) }}" 
                                           class="btn size-8 rounded-full p-0 bg-slate-150 text-slate-600 hover:bg-slate-200 dark:bg-navy-500 dark:text-navy-100 dark:hover:bg-navy-450">
                                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('crm.brood-productions.edit', $record) }}" 
                                           class="btn size-8 rounded-full p-0 bg-primary/10 text-primary hover:bg-primary/20 dark:bg-accent/10 dark:text-accent dark:hover:bg-accent/20">
                                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('crm.brood-productions.destroy', $record) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this record?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn size-8 rounded-full p-0 bg-red-500/10 text-red-500 hover:bg-red-500/20">
                                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10" class="text-center py-8">
                                    <div class="flex flex-col items-center">
                                        <svg class="size-16 text-slate-400 dark:text-navy-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                        <h3 class="text-lg font-medium text-slate-700 dark:text-navy-100 mb-2">No Records Found</h3>
                                        <p class="text-slate-500 dark:text-navy-300 mb-4">Start by creating your first brood production record.</p>
                                        <a href="{{ route('crm.brood-productions.create') }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                                            <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            Add First Record
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($broodProductions->hasPages())
                <div class="mt-6">
                    {{ $broodProductions->links() }}
                </div>
                @endif
            </div>
        </div>
    </main>
</x-app-layout>
