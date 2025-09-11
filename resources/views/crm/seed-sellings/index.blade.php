<x-app-layout title="Seed Sellings" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="col-span-12 flex justify-center">
                <div class="card w-full max-w-7xl">
                    <div class="p-6">
                        <!-- Header -->
                        <div class="mb-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h1 class="text-2xl font-semibold text-slate-800 dark:text-navy-50">Seed Sellings</h1>
                                    <p class="text-slate-500 dark:text-navy-200 text-sm mt-1">Manage fish seed selling records</p>
                                </div>
                                <a href="{{ route('crm.seed-sellings.create') }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                                    <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Add New Records
                                </a>
                            </div>
                        </div>

                @if(session('success'))
                    <div class="alert alert-success mb-6">
                        <div class="flex items-center space-x-2">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-error mb-6">
                        <div class="flex items-center space-x-2">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-medium">{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                        <!-- Data Table -->
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-slate-50 dark:bg-navy-700 border-b border-slate-200 dark:border-navy-600">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-200 uppercase tracking-wider">Species</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-200 uppercase tracking-wider">Size Range</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-200 uppercase tracking-wider">Rate (PKR)</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-200 uppercase tracking-wider">Quantity</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-200 uppercase tracking-wider">Total Amount (PKR)</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-200 uppercase tracking-wider">Created</th>
                                        <th class="px-6 py-3 text-center text-xs font-medium text-slate-500 dark:text-navy-200 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-navy-800 divide-y divide-slate-200 dark:divide-navy-600">
                                    @forelse($seedSellings as $seedSelling)
                                        <tr class="hover:bg-slate-50 dark:hover:bg-navy-700 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="size-8 rounded-full bg-blue-100 dark:bg-blue-900/20 flex items-center justify-center mr-3">
                                                        <svg class="size-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-medium text-slate-900 dark:text-navy-50">{{ $seedSelling->species }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-semibold text-slate-900 dark:text-navy-50">
                                                    {{ $seedSelling->size_range ?? '-' }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-semibold text-slate-900 dark:text-navy-50">
                                                    @if($seedSelling->rate)
                                                        PKR {{ number_format($seedSelling->rate, 2) }}
                                                    @else
                                                        <span class="text-slate-400 dark:text-navy-400">-</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-semibold text-slate-900 dark:text-navy-50">
                                                    @if($seedSelling->quantity)
                                                        {{ number_format($seedSelling->quantity, 2) }}
                                                    @else
                                                        <span class="text-slate-400 dark:text-navy-400">-</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-semibold text-slate-900 dark:text-navy-50">
                                                    @if($seedSelling->total_amount)
                                                        PKR {{ number_format($seedSelling->total_amount, 2) }}
                                                    @else
                                                        <span class="text-slate-400 dark:text-navy-400">-</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-slate-900 dark:text-navy-50">{{ $seedSelling->created_at->format('M d, Y') }}</div>
                                                <div class="text-xs text-slate-500 dark:text-navy-300">{{ $seedSelling->created_at->format('g:i A') }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <div class="flex items-center justify-center space-x-2">
                                                    <a href="{{ route('crm.seed-sellings.show', $seedSelling->id) }}" 
                                                       class="btn size-8 rounded-full p-0 bg-blue-500/10 text-blue-600 hover:bg-blue-500/20 focus:bg-blue-500/20 active:bg-blue-500/30 dark:bg-blue-500/20 dark:text-blue-400 dark:hover:bg-blue-500/30"
                                                       title="View Details">
                                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                        </svg>
                                                    </a>
                                                    <a href="{{ route('crm.seed-sellings.edit', $seedSelling->id) }}" 
                                                       class="btn size-8 rounded-full p-0 bg-amber-500/10 text-amber-600 hover:bg-amber-500/20 focus:bg-amber-500/20 active:bg-amber-500/30 dark:bg-amber-500/20 dark:text-amber-400 dark:hover:bg-amber-500/30"
                                                       title="Edit Record">
                                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('crm.seed-sellings.destroy', $seedSelling->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this record?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn size-8 rounded-full p-0 bg-red-500/10 text-red-600 hover:bg-red-500/20 focus:bg-red-500/20 active:bg-red-500/30 dark:bg-red-500/20 dark:text-red-400 dark:hover:bg-red-500/30"
                                                                title="Delete Record">
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
                                            <td colspan="7" class="px-6 py-12 text-center">
                                                <div class="flex flex-col items-center">
                                                    <div class="size-16 rounded-full bg-slate-100 dark:bg-navy-600 flex items-center justify-center mb-4">
                                                        <svg class="size-8 text-slate-400 dark:text-navy-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1.994 1.994 0 006.586 13H4"></path>
                                                        </svg>
                                                    </div>
                                                    <h3 class="text-lg font-medium text-slate-900 dark:text-navy-50 mb-2">No seed selling records found</h3>
                                                    <p class="text-slate-500 dark:text-navy-300 mb-4">Get started by creating your first seed selling record.</p>
                                                    <a href="{{ route('crm.seed-sellings.create') }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                                                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                        </svg>
                                                        Create First Record
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if($seedSellings->hasPages())
                            <div class="mt-6">
                                {{ $seedSellings->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>