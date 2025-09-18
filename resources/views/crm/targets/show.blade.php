<x-app-layout title="Target Details" is-header-blur="true">
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center justify-between space-x-2 py-5">
            <h3 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Target Details
            </h3>
            <div class="flex space-x-2">
                <a href="{{ route('crm.targets.edit', $target->id) }}"
                    class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:hover:bg-navy-400 dark:focus:bg-navy-400 dark:active:bg-navy-400/90">
                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <span>Edit</span>
                </a>
                <a href="{{ route('crm.targets.index') }}"
                    class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:hover:bg-navy-400 dark:focus:bg-navy-400 dark:active:bg-navy-400/90">
                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    <span>Back to Targets</span>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <div class="card">
                    <div class="p-4 sm:p-5">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-lg font-medium text-slate-700 dark:text-navy-100">{{ $target->title }}</h4>
                            <div class="flex space-x-2">
                                @php
                                    $statusColors = [
                                        'active' => 'bg-success/10 text-success',
                                        'completed' => 'bg-info/10 text-info',
                                        'cancelled' => 'bg-error/10 text-error',
                                        'paused' => 'bg-warning/10 text-warning'
                                    ];
                                @endphp
                                <span class="badge {{ $statusColors[$target->status] ?? 'bg-slate-100 text-slate-800' }}">
                                    {{ $target->status_label }}
                                </span>
                                @if($target->is_public)
                                    <span class="badge bg-primary/10 text-primary dark:bg-accent/10 dark:text-accent">
                                        Public
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if($target->description)
                            <div class="mb-6">
                                <h5 class="text-sm font-medium text-slate-700 dark:text-navy-100 mb-2">Description</h5>
                                <p class="text-slate-600 dark:text-navy-300">{{ $target->description }}</p>
                            </div>
                        @endif

                        <!-- Progress Section -->
                        <div class="mb-6">
                            <div class="flex items-center justify-between mb-2">
                                <h5 class="text-sm font-medium text-slate-700 dark:text-navy-100">Progress</h5>
                                <span class="text-sm text-slate-600 dark:text-navy-300">{{ $target->progress_percentage }}%</span>
                            </div>
                            <div class="w-full bg-slate-200 rounded-full h-3 dark:bg-slate-700">
                                <div class="bg-primary h-3 rounded-full dark:bg-accent transition-all duration-300" style="width: {{ $target->progress_percentage }}%"></div>
                            </div>
                            <div class="flex justify-between text-sm text-slate-600 dark:text-navy-300 mt-1">
                                <span>Achieved: {{ number_format($target->achieved_value, 0) }} {{ $target->unit }}</span>
                                <span>Target: {{ number_format($target->target_value, 0) }} {{ $target->unit }}</span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        @if($target->status === 'active')
                            <div class="flex space-x-2 mb-6">
                                <form action="{{ route('crm.targets.pause', $target->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="btn bg-warning font-medium text-white hover:bg-warning-focus focus:bg-warning-focus active:bg-warning-focus/90">
                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Pause</span>
                                    </button>
                                </form>
                                <form action="{{ route('crm.targets.complete', $target->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="btn bg-info font-medium text-white hover:bg-info-focus focus:bg-info-focus active:bg-info-focus/90">
                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span>Mark Complete</span>
                                    </button>
                                </form>
                            </div>
                        @elseif($target->status === 'paused')
                            <div class="flex space-x-2 mb-6">
                                <form action="{{ route('crm.targets.resume', $target->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="btn bg-success font-medium text-white hover:bg-success-focus focus:bg-success-focus active:bg-success-focus/90">
                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h1m4 0h1m-6-8h8a2 2 0 012 2v8a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2z"></path>
                                        </svg>
                                        <span>Resume</span>
                                    </button>
                                </form>
                            </div>
                        @endif

                        <!-- Update Progress Form -->
                        @if($target->status === 'active')
                            <div class="border-t border-slate-200 dark:border-navy-500 pt-6">
                                <h5 class="text-sm font-medium text-slate-700 dark:text-navy-100 mb-4">Update Progress</h5>
                                <form action="{{ route('crm.targets.update-progress', $target->id) }}" method="POST" class="flex space-x-2">
                                    @csrf
                                    <input type="number" name="achieved_value" value="{{ $target->achieved_value }}" step="0.01" min="0" max="{{ $target->target_value }}"
                                        class="form-input flex-1 rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                        placeholder="Enter achieved value">
                                    <button type="submit" class="btn bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent-focus/90">
                                        Update
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Target Info -->
                <div class="card mb-6">
                    <div class="p-4 sm:p-5">
                        <h5 class="text-sm font-medium text-slate-700 dark:text-navy-100 mb-4">Target Information</h5>
                        
                        <div class="space-y-3">
                            <div>
                                <span class="text-xs text-slate-500 dark:text-navy-300">Type</span>
                                <p class="text-sm font-medium text-slate-700 dark:text-navy-100">{{ $target->type_label }}</p>
                            </div>
                            
                            <div>
                                <span class="text-xs text-slate-500 dark:text-navy-300">Category</span>
                                <p class="text-sm font-medium text-slate-700 dark:text-navy-100">{{ $target->category_label }}</p>
                            </div>
                            
                            <div>
                                <span class="text-xs text-slate-500 dark:text-navy-300">Priority</span>
                                @php
                                    $priorityColors = [
                                        1 => 'bg-slate-100 text-slate-800',
                                        2 => 'bg-info/10 text-info',
                                        3 => 'bg-warning/10 text-warning',
                                        4 => 'bg-error/10 text-error',
                                        5 => 'bg-error text-white'
                                    ];
                                @endphp
                                <span class="badge {{ $priorityColors[$target->priority] ?? 'bg-slate-100 text-slate-800' }}">
                                    {{ $target->priority_label }}
                                </span>
                            </div>
                            
                            <div>
                                <span class="text-xs text-slate-500 dark:text-navy-300">Unit</span>
                                <p class="text-sm font-medium text-slate-700 dark:text-navy-100">{{ $target->unit }}</p>
                            </div>
                            
                            @if($target->assigned_to)
                                <div>
                                    <span class="text-xs text-slate-500 dark:text-navy-300">Assigned To</span>
                                    <p class="text-sm font-medium text-slate-700 dark:text-navy-100">{{ $target->assigned_to }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Timeline -->
                <div class="card">
                    <div class="p-4 sm:p-5">
                        <h5 class="text-sm font-medium text-slate-700 dark:text-navy-100 mb-4">Timeline</h5>
                        
                        <div class="space-y-3">
                            <div>
                                <span class="text-xs text-slate-500 dark:text-navy-300">Start Date</span>
                                <p class="text-sm font-medium text-slate-700 dark:text-navy-100">{{ $target->formatted_start_date }}</p>
                            </div>
                            
                            <div>
                                <span class="text-xs text-slate-500 dark:text-navy-300">End Date</span>
                                <p class="text-sm font-medium text-slate-700 dark:text-navy-100">{{ $target->formatted_end_date }}</p>
                            </div>
                            
                            <div>
                                <span class="text-xs text-slate-500 dark:text-navy-300">Days Remaining</span>
                                @if($target->is_overdue)
                                    <p class="text-sm font-medium text-error">Overdue</p>
                                @else
                                    <p class="text-sm font-medium text-slate-700 dark:text-navy-100">{{ $target->days_remaining }} days</p>
                                @endif
                            </div>
                            
                            <div>
                                <span class="text-xs text-slate-500 dark:text-navy-300">Created</span>
                                <p class="text-sm font-medium text-slate-700 dark:text-navy-100">{{ $target->created_at->format('d M Y') }}</p>
                            </div>
                            
                            <div>
                                <span class="text-xs text-slate-500 dark:text-navy-300">Last Updated</span>
                                <p class="text-sm font-medium text-slate-700 dark:text-navy-100">{{ $target->updated_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if($target->notes)
                    <div class="card mt-6">
                        <div class="p-4 sm:p-5">
                            <h5 class="text-sm font-medium text-slate-700 dark:text-navy-100 mb-4">Notes</h5>
                            <p class="text-sm text-slate-600 dark:text-navy-300">{{ $target->notes }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>
</x-app-layout>
