<x-app-layout title="Offices" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="card col-span-12">
                <div class="p-8">
                    <div class="mb-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-3xl font-semibold text-slate-800 dark:text-navy-50 m-0">Offices</h1>
                                <p class="text-slate-500 dark:text-navy-200 text-base mt-2">Manage office information and contacts</p>
                            </div>
                            <a href="{{ route('crm.hatcheries.create') }}" 
                               class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                                Add New Office
                            </a>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-error mb-6">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="card p-6 border border-slate-200 dark:border-navy-600">
                        <div class="overflow-x-auto">
                            <table class="table table-auto w-full border-collapse">
                                <thead>
                                    <tr class="border-b-2 border-slate-200 dark:border-navy-600">
                                        <th class="text-left text-xs font-medium text-slate-500 dark:text-navy-200 uppercase tracking-wider py-4 px-4 border-r border-slate-200 dark:border-navy-600">
                                            Office Name
                                        </th>
                                        <th class="text-left text-xs font-medium text-slate-500 dark:text-navy-200 uppercase tracking-wider py-4 px-4 border-r border-slate-200 dark:border-navy-600">
                                            Contact Person
                                        </th>
                                        <th class="text-left text-xs font-medium text-slate-500 dark:text-navy-200 uppercase tracking-wider py-4 px-4 border-r border-slate-200 dark:border-navy-600">
                                            Mobile
                                        </th>
                                        <th class="text-left text-xs font-medium text-slate-500 dark:text-navy-200 uppercase tracking-wider py-4 px-4 border-r border-slate-200 dark:border-navy-600">
                                            Division
                                        </th>
                                        <th class="text-left text-xs font-medium text-slate-500 dark:text-navy-200 uppercase tracking-wider py-4 px-4 border-r border-slate-200 dark:border-navy-600">
                                            District
                                        </th>
                                        <th class="text-left text-xs font-medium text-slate-500 dark:text-navy-200 uppercase tracking-wider py-4 px-4 border-r border-slate-200 dark:border-navy-600">
                                            Office Type
                                        </th>
                                        <th class="text-left text-xs font-medium text-slate-500 dark:text-navy-200 uppercase tracking-wider py-4 px-4">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($hatcheries as $hatchery)
                                        <tr class="hover:bg-slate-50 dark:hover:bg-navy-600 border-b border-slate-200 dark:border-navy-600">
                                            <td class="py-4 px-4 border-r border-slate-200 dark:border-navy-600">
                                                <div class="text-sm font-medium text-slate-800 dark:text-navy-100">
                                                    {{ $hatchery->hatchery_name }}
                                                </div>
                                            </td>
                                            <td class="py-4 px-4 border-r border-slate-200 dark:border-navy-600">
                                                <div class="text-sm text-slate-600 dark:text-navy-200">
                                                    {{ $hatchery->contact_person }}
                                                </div>
                                            </td>
                                            <td class="py-4 px-4 border-r border-slate-200 dark:border-navy-600">
                                                <div class="text-sm text-slate-600 dark:text-navy-200">
                                                    {{ $hatchery->mobile_number }}
                                                </div>
                                            </td>
                                            <td class="py-4 px-4 border-r border-slate-200 dark:border-navy-600">
                                                <div class="text-sm text-slate-600 dark:text-navy-200">
                                                    {{ $hatchery->division }}
                                                </div>
                                            </td>
                                            <td class="py-4 px-4 border-r border-slate-200 dark:border-navy-600">
                                                <div class="text-sm text-slate-600 dark:text-navy-200">
                                                    {{ $hatchery->district }}
                                                </div>
                                            </td>
                                            <td class="py-4 px-4 border-r border-slate-200 dark:border-navy-600">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium border
                                                    @if($hatchery->office_type === 'HM') bg-blue-50 text-blue-700 border-blue-200 dark:bg-blue-900/20 dark:text-blue-300 dark:border-blue-700
                                                    @elseif($hatchery->office_type === 'AQUA') bg-green-50 text-green-700 border-green-200 dark:bg-green-900/20 dark:text-green-300 dark:border-green-700
                                                    @else bg-purple-50 text-purple-700 border-purple-200 dark:bg-purple-900/20 dark:text-purple-300 dark:border-purple-700
                                                    @endif">
                                                    {{ $hatchery->office_type }}
                                                </span>
                                            </td>
                                            <td class="py-4 px-4">
                                                <div class="flex space-x-3">
                                                    <a href="{{ route('crm.hatcheries.show', $hatchery->id) }}" 
                                                       class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-primary hover:text-primary-focus dark:text-accent dark:hover:text-accent-focus border border-primary/20 hover:border-primary/40 rounded-md transition-colors">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                        </svg>
                                                        View
                                                    </a>
                                                    <a href="{{ route('crm.hatcheries.edit', $hatchery->id) }}" 
                                                       class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-info hover:text-info-focus border border-info/20 hover:border-info/40 rounded-md transition-colors">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('crm.hatcheries.destroy', $hatchery->id) }}" 
                                                          method="POST" class="inline" 
                                                          onsubmit="return confirm('Are you sure you want to delete this office?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-error hover:text-error-focus border border-error/20 hover:border-error/40 rounded-md transition-colors">
                                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="py-12 text-center">
                                                <div class="text-center">
                                                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-slate-100 dark:bg-navy-800 flex items-center justify-center">
                                                        <svg class="w-8 h-8 text-slate-400 dark:text-navy-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                                        </svg>
                                                    </div>
                                                    <p class="text-lg font-medium text-slate-600 dark:text-navy-200 mb-2">No offices found</p>
                                                    <p class="text-sm text-slate-500 dark:text-navy-300 mb-4">Get started by creating your first office</p>
                                                    <a href="{{ route('crm.hatcheries.create') }}" 
                                                       class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                                                        Create New Office
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        @if($hatcheries->hasPages())
                            <div class="px-6 py-4 border-t border-slate-200 dark:border-navy-600 bg-slate-50 dark:bg-navy-800">
                                {{ $hatcheries->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
