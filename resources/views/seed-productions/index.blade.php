<x-app-layout>
    <div class="main-content">
        <div class="card col-span-12">
            <div class="card-header">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="card-title">Seed Productions</h4>
                        <p class="text-sm text-slate-500 mt-1">Manage fish seed production records</p>
                    </div>
                    <a href="{{ route('cms.seed-productions.create') }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                        <svg class="size-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add New Records
                    </a>
                </div>
            </div>
            <div class="card-body">

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
                <div class="flex justify-center">
                    <div class="bg-white rounded-lg border border-slate-200 overflow-hidden w-full max-w-7xl">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-slate-50 border-b border-slate-200">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Species</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Size Range</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Rate (PKR)</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Quantity</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Total Amount (PKR)</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Created</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-200">
                                @forelse($seedProductions as $seedProduction)
                                    <tr class="hover:bg-slate-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="size-8 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                                    <svg class="size-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-slate-900">{{ $seedProduction->species }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-semibold text-slate-900">
                                                {{ $seedProduction->size_range ?? '-' }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-semibold text-slate-900">
                                                @if($seedProduction->rate)
                                                    PKR {{ number_format($seedProduction->rate, 2) }}
                                                @else
                                                    <span class="text-slate-400">-</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-semibold text-slate-900">
                                                @if($seedProduction->quantity)
                                                    {{ number_format($seedProduction->quantity, 2) }}
                                                @else
                                                    <span class="text-slate-400">-</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-semibold text-slate-900">
                                                @if($seedProduction->total_amount)
                                                    PKR {{ number_format($seedProduction->total_amount, 2) }}
                                                @else
                                                    <span class="text-slate-400">-</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-slate-900">{{ $seedProduction->created_at->format('M d, Y') }}</div>
                                            <div class="text-xs text-slate-500">{{ $seedProduction->created_at->format('g:i A') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <div class="flex items-center justify-center space-x-2">
                                                <a href="{{ route('cms.seed-productions.show', $seedProduction->id) }}" 
                                                   class="btn size-8 rounded-full p-0 bg-blue-500/10 text-blue-600 hover:bg-blue-500/20 focus:bg-blue-500/20 active:bg-blue-500/30"
                                                   title="View Details">
                                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('cms.seed-productions.edit', $seedProduction->id) }}" 
                                                   class="btn size-8 rounded-full p-0 bg-amber-500/10 text-amber-600 hover:bg-amber-500/20 focus:bg-amber-500/20 active:bg-amber-500/30"
                                                   title="Edit Record">
                                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form action="{{ route('cms.seed-productions.destroy', $seedProduction->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this record?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn size-8 rounded-full p-0 bg-red-500/10 text-red-600 hover:bg-red-500/20 focus:bg-red-500/20 active:bg-red-500/30"
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
                                                <div class="size-16 rounded-full bg-slate-100 flex items-center justify-center mb-4">
                                                    <svg class="size-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                                    </svg>
                                                </div>
                                                <h3 class="text-lg font-medium text-slate-900 mb-2">No seed production records found</h3>
                                                <p class="text-slate-500 mb-4">Get started by creating your first seed production record.</p>
                                                <a href="{{ route('cms.seed-productions.create') }}" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
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
                    </div>
                </div>

                @if($seedProductions->hasPages())
                    <div class="mt-6">
                        {{ $seedProductions->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
