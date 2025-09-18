<x-app-layout title="Target Management" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center justify-between space-x-2 py-5">
            <h3 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Target Management
            </h3>
            <a href="{{ route('crm.targets.create') }}"
                class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Create Target</span>
            </a>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 mb-6">
            <div class="card">
                <div class="p-4">
                    <div class="flex items-center">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent/10">
                            <svg class="size-6 text-primary dark:text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-600 dark:text-navy-100">Total Targets</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-50">{{ $stats['total'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="p-4">
                    <div class="flex items-center">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-success/10">
                            <svg class="size-6 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-600 dark:text-navy-100">Active</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-50">{{ $stats['active'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="p-4">
                    <div class="flex items-center">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-info/10">
                            <svg class="size-6 text-info" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-600 dark:text-navy-100">Completed</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-50">{{ $stats['completed'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="p-4">
                    <div class="flex items-center">
                        <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-error/10">
                            <svg class="size-6 text-error" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-slate-600 dark:text-navy-100">Overdue</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-50">{{ $stats['overdue'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Targets Table -->
        <div class="card">
            <div class="p-4 sm:p-5">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">All Targets</h4>
                    <div class="flex space-x-2">
                        <button class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:hover:bg-navy-400 dark:focus:bg-navy-400 dark:active:bg-navy-400/90">
                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"></path>
                            </svg>
                            <span>Filter</span>
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="border-b border-slate-200 dark:border-navy-500">
                            <tr>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Title</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Type</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Progress</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Status</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Priority</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Deadline</th>
                                <th class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-slate-500 dark:text-navy-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-navy-500">
                            @forelse($targets as $target)
                                <tr class="hover:bg-slate-50 dark:hover:bg-navy-600 transition-colors">
                                    <td class="px-4 py-4">
                                        <div>
                                            <p class="text-sm font-medium text-slate-900 dark:text-navy-50">{{ $target->title }}</p>
                                            @if($target->assigned_to)
                                                <p class="text-xs text-slate-500 dark:text-navy-300">Assigned to: {{ $target->assigned_to }}</p>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent">
                                            {{ $target->type_label }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-16 bg-slate-200 rounded-full h-2 dark:bg-slate-700">
                                                <div class="bg-primary h-2 rounded-full dark:bg-accent" style="width: {{ $target->progress_percentage }}%"></div>
                                            </div>
                                            <span class="text-sm text-slate-600 dark:text-navy-300">{{ $target->progress_percentage }}%</span>
                                        </div>
                                        <p class="text-xs text-slate-500 dark:text-navy-400 mt-1">
                                            {{ number_format($target->achieved_value, 0) }} / {{ number_format($target->target_value, 0) }} {{ $target->unit }}
                                        </p>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        @php
                                            $statusColors = [
                                                'active' => 'bg-green-100 text-green-800',
                                                'completed' => 'bg-blue-100 text-blue-800',
                                                'cancelled' => 'bg-red-100 text-red-800',
                                                'paused' => 'bg-yellow-100 text-yellow-800'
                                            ];
                                        @endphp
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$target->status] ?? 'bg-gray-100 text-gray-800' }}">
                                            {{ $target->status_label }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        @php
                                            $priorityColors = [
                                                1 => 'bg-gray-100 text-gray-800',
                                                2 => 'bg-blue-100 text-blue-800',
                                                3 => 'bg-yellow-100 text-yellow-800',
                                                4 => 'bg-red-100 text-red-800',
                                                5 => 'bg-red-600 text-white'
                                            ];
                                        @endphp
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $priorityColors[$target->priority] ?? 'bg-gray-100 text-gray-800' }}">
                                            {{ $target->priority_label }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap">
                                        <div class="text-sm">
                                            <p class="text-slate-700 dark:text-navy-100">{{ $target->formatted_end_date }}</p>
                                            @if($target->is_overdue)
                                                <p class="text-red-600 text-xs">Overdue</p>
                                            @elseif($target->days_remaining <= 7)
                                                <p class="text-yellow-600 text-xs">{{ $target->days_remaining }} days left</p>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('crm.targets.show', $target->id) }}" 
                                               class="text-info hover:text-info-focus" title="View">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </a>
                                            <a href="{{ route('crm.targets.edit', $target->id) }}" 
                                               class="text-primary hover:text-primary-focus" title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                            @if($target->status === 'active')
                                                <form action="{{ route('crm.targets.pause', $target->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="text-warning hover:text-warning-focus" title="Pause">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @elseif($target->status === 'paused')
                                                <form action="{{ route('crm.targets.resume', $target->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="text-success hover:text-success-focus" title="Resume">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h1m4 0h1m-6-8h8a2 2 0 012 2v8a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2z"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
                                            @if($target->status !== 'completed')
                                                <form action="{{ route('crm.targets.complete', $target->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="text-info hover:text-info-focus" title="Mark Complete">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-12 text-center">
                                        <div class="text-slate-500 dark:text-navy-300">
                                            <svg class="w-12 h-12 mx-auto mb-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                            </svg>
                                            <p class="text-lg font-medium">No targets found</p>
                                            <p class="text-sm">Get started by creating your first target.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($targets->hasPages())
                    <div class="mt-4">
                        {{ $targets->links() }}
                    </div>
                @endif
            </div>
        </div>
    </main>
</x-app-layout>
