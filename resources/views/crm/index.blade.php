<x-app-layout title="CRM Dashboard" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <!-- Quick Stats -->
            <div class="col-span-12 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-6">
                <!-- Hatcheries -->
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs+ text-slate-500 dark:text-navy-200">Hatcheries</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ $totalHatcheries }}</p>
                        </div>
                        <div class="size-12 rounded-full bg-secondary/10 flex items-center justify-center">
                            <svg class="size-6 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Fish Sellings -->
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs+ text-slate-500 dark:text-navy-200">Fish Sellings</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ $totalFishSellings }}</p>
                        </div>
                        <div class="size-12 rounded-full bg-primary/10 flex items-center justify-center">
                            <svg class="size-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Seed Sellings -->
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs+ text-slate-500 dark:text-navy-200">Seed Sellings</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ $totalSeedSellings }}</p>
                        </div>
                        <div class="size-12 rounded-full bg-success/10 flex items-center justify-center">
                            <svg class="size-6 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Brood Productions -->
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs+ text-slate-500 dark:text-navy-200">Brood Productions</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ $totalBroodProductions }}</p>
                        </div>
                        <div class="size-12 rounded-full bg-accent/10 flex items-center justify-center">
                            <svg class="size-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Public Stockings -->
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs+ text-slate-500 dark:text-navy-200">Public Stockings</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ $totalPublicStockings }}</p>
                        </div>
                        <div class="size-12 rounded-full bg-info/10 flex items-center justify-center">
                            <svg class="size-6 text-info" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Private Stockings -->
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs+ text-slate-500 dark:text-navy-200">Private Stockings</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ $totalPrivateStockings }}</p>
                        </div>
                        <div class="size-12 rounded-full bg-warning/10 flex items-center justify-center">
                            <svg class="size-6 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Targets -->
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs+ text-slate-500 dark:text-navy-200">Targets</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ $totalTargets }}</p>
                            <div class="flex space-x-2 mt-1">
                                <span class="text-xs text-success">{{ $activeTargets }} Active</span>
                                <span class="text-xs text-info">{{ $completedTargets }} Done</span>
                            </div>
                        </div>
                        <div class="size-12 rounded-full bg-accent/10 flex items-center justify-center">
                            <svg class="size-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="col-span-12 lg:col-span-8">
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium text-slate-700 dark:text-navy-100">Recent Activities</h3>
                        <a href="{{ route('crm.fish-sellings.index') }}" class="text-xs+ text-primary hover:text-primary-focus">View All</a>
                    </div>
                    
                    <div class="space-y-4">
                        <!-- Recent Hatcheries -->
                        @if($recentHatcheries->count() > 0)
                        <div class="border-b border-slate-200 dark:border-navy-500 pb-4">
                            <h4 class="text-sm font-medium text-slate-600 dark:text-navy-200 mb-2">Recent Hatcheries</h4>
                            <div class="space-y-2">
                                @foreach($recentHatcheries as $hatchery)
                                <div class="flex items-center justify-between p-2 bg-slate-50 dark:bg-navy-600 rounded">
                                    <div>
                                        <p class="text-sm font-medium text-slate-700 dark:text-navy-100">{{ $hatchery->hatchery_name }}</p>
                                        <p class="text-xs text-slate-500 dark:text-navy-300">{{ $hatchery->contact_person }} | {{ $hatchery->district }}</p>
                                    </div>
                                    <span class="text-xs text-slate-500 dark:text-navy-300">{{ $hatchery->created_at->diffForHumans() }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Recent Fish Sellings -->
                        @if($recentFishSellings->count() > 0)
                        <div class="border-b border-slate-200 dark:border-navy-500 pb-4">
                            <h4 class="text-sm font-medium text-slate-600 dark:text-navy-200 mb-2">Recent Fish Sellings</h4>
                            <div class="space-y-2">
                                @foreach($recentFishSellings as $fishSelling)
                                <div class="flex items-center justify-between p-2 bg-slate-50 dark:bg-navy-600 rounded">
                                    <div>
                                        <p class="text-sm font-medium text-slate-700 dark:text-navy-100">{{ $fishSelling->species }}</p>
                                        <p class="text-xs text-slate-500 dark:text-navy-300">Qty: {{ $fishSelling->fish_qty }} | Weight: {{ $fishSelling->total_weight }}kg</p>
                                    </div>
                                    <span class="text-xs text-slate-500 dark:text-navy-300">{{ $fishSelling->created_at->diffForHumans() }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Recent Seed Sellings -->
                        @if($recentSeedSellings->count() > 0)
                        <div class="border-b border-slate-200 dark:border-navy-500 pb-4">
                            <h4 class="text-sm font-medium text-slate-600 dark:text-navy-200 mb-2">Recent Seed Sellings</h4>
                            <div class="space-y-2">
                                @foreach($recentSeedSellings as $seedSelling)
                                <div class="flex items-center justify-between p-2 bg-slate-50 dark:bg-navy-600 rounded">
                                    <div>
                                        <p class="text-sm font-medium text-slate-700 dark:text-navy-100">{{ $seedSelling->species }}</p>
                                        <p class="text-xs text-slate-500 dark:text-navy-300">Qty: {{ $seedSelling->seed_qty }} | Weight: {{ $seedSelling->total_weight }}kg</p>
                                    </div>
                                    <span class="text-xs text-slate-500 dark:text-navy-300">{{ $seedSelling->created_at->diffForHumans() }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Recent Brood Productions -->
                        @if($recentBroodProductions->count() > 0)
                        <div class="border-b border-slate-200 dark:border-navy-500 pb-4">
                            <h4 class="text-sm font-medium text-slate-600 dark:text-navy-200 mb-2">Recent Brood Productions</h4>
                            <div class="space-y-2">
                                @foreach($recentBroodProductions as $broodProduction)
                                <div class="flex items-center justify-between p-2 bg-slate-50 dark:bg-navy-600 rounded">
                                    <div>
                                        <p class="text-sm font-medium text-slate-700 dark:text-navy-100">{{ $broodProduction->species_label }}</p>
                                        <p class="text-xs text-slate-500 dark:text-navy-300">{{ $broodProduction->hatchery_name }} | {{ $broodProduction->brood_count }} brood</p>
                                    </div>
                                    <span class="text-xs text-slate-500 dark:text-navy-300">{{ $broodProduction->created_at->diffForHumans() }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Recent Targets -->
                        @if($recentTargets->count() > 0)
                        <div>
                            <h4 class="text-sm font-medium text-slate-600 dark:text-navy-200 mb-2">Recent Targets</h4>
                            <div class="space-y-2">
                                @foreach($recentTargets as $target)
                                <div class="flex items-center justify-between p-2 bg-slate-50 dark:bg-navy-600 rounded">
                                    <div>
                                        <p class="text-sm font-medium text-slate-700 dark:text-navy-100">{{ $target->title }}</p>
                                        <p class="text-xs text-slate-500 dark:text-navy-300">{{ $target->type_label }} | {{ $target->progress_percentage }}% Complete</p>
                                    </div>
                                    <span class="text-xs text-slate-500 dark:text-navy-300">{{ $target->created_at->diffForHumans() }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="col-span-12 lg:col-span-4">
                <div class="card p-4 sm:p-5">
                    <h3 class="text-lg font-medium text-slate-700 dark:text-navy-100 mb-4">Quick Actions</h3>
                    
                    <div class="space-y-3">
                        <a href="{{ route('crm.hatcheries.create') }}" class="flex items-center p-3 bg-secondary/10 hover:bg-secondary/20 rounded-lg transition-colors">
                            <div class="size-8 rounded-full bg-secondary/20 flex items-center justify-center mr-3">
                                <svg class="size-4 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-700 dark:text-navy-100">Add Hatchery</p>
                                <p class="text-xs text-slate-500 dark:text-navy-300">Register new hatchery</p>
                            </div>
                        </a>

                        <a href="{{ route('crm.fish-sellings.create') }}" class="flex items-center p-3 bg-primary/10 hover:bg-primary/20 rounded-lg transition-colors">
                            <div class="size-8 rounded-full bg-primary/20 flex items-center justify-center mr-3">
                                <svg class="size-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-700 dark:text-navy-100">Add Fish Selling</p>
                                <p class="text-xs text-slate-500 dark:text-navy-300">Record new fish sales</p>
                            </div>
                        </a>

                        <a href="{{ route('crm.seed-sellings.create') }}" class="flex items-center p-3 bg-success/10 hover:bg-success/20 rounded-lg transition-colors">
                            <div class="size-8 rounded-full bg-success/20 flex items-center justify-center mr-3">
                                <svg class="size-4 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-700 dark:text-navy-100">Add Seed Selling</p>
                                <p class="text-xs text-slate-500 dark:text-navy-300">Record new seed sales</p>
                            </div>
                        </a>

                        <a href="{{ route('crm.brood-productions.create') }}" class="flex items-center p-3 bg-accent/10 hover:bg-accent/20 rounded-lg transition-colors">
                            <div class="size-8 rounded-full bg-accent/20 flex items-center justify-center mr-3">
                                <svg class="size-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-700 dark:text-navy-100">Add Brood Production</p>
                                <p class="text-xs text-slate-500 dark:text-navy-300">Record breeding activities</p>
                            </div>
                        </a>

                        <a href="{{ route('crm.public-stockings.create') }}" class="flex items-center p-3 bg-info/10 hover:bg-info/20 rounded-lg transition-colors">
                            <div class="size-8 rounded-full bg-info/20 flex items-center justify-center mr-3">
                                <svg class="size-4 text-info" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-700 dark:text-navy-100">Add Public Stocking</p>
                                <p class="text-xs text-slate-500 dark:text-navy-300">Record public stocking</p>
                            </div>
                        </a>

                        <a href="{{ route('crm.private-stockings.create') }}" class="flex items-center p-3 bg-warning/10 hover:bg-warning/20 rounded-lg transition-colors">
                            <div class="size-8 rounded-full bg-warning/20 flex items-center justify-center mr-3">
                                <svg class="size-4 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-700 dark:text-navy-100">Add Private Stocking</p>
                                <p class="text-xs text-slate-500 dark:text-navy-300">Record private stocking</p>
                            </div>
                        </a>

                        <a href="{{ route('crm.targets.index') }}" class="flex items-center p-3 bg-accent/10 hover:bg-accent/20 rounded-lg transition-colors">
                            <div class="size-8 rounded-full bg-accent/20 flex items-center justify-center mr-3">
                                <svg class="size-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-700 dark:text-navy-100">Target Management</p>
                                <p class="text-xs text-slate-500 dark:text-navy-300">Set and track goals</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
