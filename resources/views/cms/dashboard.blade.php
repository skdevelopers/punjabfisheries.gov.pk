<x-app-layout title="CMS Analytics Dashboard" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <!-- Quick Stats Overview -->
        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Total Blog Posts -->
            <div class="card p-4 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs+ text-slate-500 dark:text-navy-200">Total Blog Posts</p>
                        <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ $blogPosts }}</p>
                        <p class="text-xs text-slate-400 dark:text-navy-300">{{ $publishedPosts }} published, {{ $draftPosts }} drafts</p>
                    </div>
                    <div class="size-12 rounded-full bg-purple-500/10 flex items-center justify-center">
                        <svg class="size-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Views -->
            <div class="card p-4 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs+ text-slate-500 dark:text-navy-200">Total Views</p>
                        <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ number_format($totalViews) }}</p>
                        <p class="text-xs text-slate-400 dark:text-navy-300">Avg: {{ number_format($avgViews) }} per post</p>
                    </div>
                    <div class="size-12 rounded-full bg-blue-500/10 flex items-center justify-center">
                        <svg class="size-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Comments -->
            <div class="card p-4 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs+ text-slate-500 dark:text-navy-200">Total Comments</p>
                        <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ $totalComments }}</p>
                        <p class="text-xs text-slate-400 dark:text-navy-300">{{ $pendingComments }} pending, {{ $approvedComments }} approved</p>
                    </div>
                    <div class="size-12 rounded-full bg-green-500/10 flex items-center justify-center">
                        <svg class="size-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Active Tenders -->
            <div class="card p-4 sm:p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs+ text-slate-500 dark:text-navy-200">Active Tenders</p>
                        <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ $activeTenders }}</p>
                        <p class="text-xs text-slate-400 dark:text-navy-300">{{ $totalTenders }} total, {{ $expiredTenders }} expired</p>
                    </div>
                    <div class="size-12 rounded-full bg-orange-500/10 flex items-center justify-center">
                        <svg class="size-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="card col-span-12 pb-4">
                <div class="mt-3 flex items-center justify-between px-4 sm:px-5">
                    <h2 class="text-sm-plus font-medium tracking-wide text-slate-700 dark:text-navy-100">
                        Page Views
                    </h2>

                    <div class="flex items-center space-x-4">
                        <div class="hidden cursor-pointer items-center space-x-2 sm:flex">
                            <div class="size-3 rounded-full bg-accent"></div>
                            <p>Current Period</p>
                        </div>
                        <div class="hidden cursor-pointer items-center space-x-2 sm:flex">
                            <div class="size-3 rounded-full bg-warning"></div>
                            <p>Previous Period</p>
                        </div>
                        <select
                            class="form-select h-8 rounded-full border border-slate-300 bg-white px-2.5 pr-9 text-xs-plus hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent">
                            <option>Last week</option>
                            <option>Last month</option>
                            <option>Last year</option>
                        </select>
                    </div>
                </div>
                <div class="mt-3 grid grid-cols-12">
                    <div class="col-span-12 px-4 sm:col-span-6 sm:px-5 lg:col-span-4">
                        <select class="mt-1.5 w-full" x-init="$el._x_tom = new Tom($el, { sortField: { field: 'text', direction: 'asc' } })">
                            <option>Travel Blog Page</option>
                            <option>Courses Page</option>
                            <option>Grammar Page</option>
                            <option>Sport Page</option>
                            <option>Jobs Page</option>
                            <option>Server Status Page</option>
                        </select>
                        <div class="mt-6 grid grid-cols-2 gap-x-4 gap-y-8">
                            <div>
                                <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                                    Total Views
                                </p>
                                <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ number_format($totalViews) }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                                    Monthly increase
                                </p>
                                <p class="mt-1">
                                    <span class="text-xl font-medium text-slate-700 dark:text-navy-100">
                                        {{ $monthlyIncrease > 0 ? '+' : '' }}{{ $monthlyIncrease }}%
                                    </span>
                                    <span class="text-xs {{ $monthlyIncrease >= 0 ? 'text-success' : 'text-error' }}">
                                        {{ $monthlyIncrease >= 0 ? '+' : '' }}{{ $monthlyIncrease }}%
                                    </span>
                                </p>
                            </div>
                            <div>
                                <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                                    Blog Posts
                                </p>
                                <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ $blogPosts }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                                    Avg post view
                                </p>
                                <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ number_format($avgViews) }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                                    Total comments
                                </p>
                                <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ $totalComments }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                                    Published Posts
                                </p>
                                <p class="mt-1 text-xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ $publishedPosts }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="ax-transparent-gridline col-span-12 px-2 sm:col-span-6 lg:col-span-8">
                        <div x-init="$nextTick(() => {
                            $el._x_chart = new ApexCharts($el, pages.charts.analyticsPagesViews);
                            $el._x_chart.render()
                        });"></div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 xl:col-span-7">
                <div class="card">
                    <div
                        class="grid grid-cols-1 divide-y divide-slate-150 dark:divide-navy-500 sm:grid-cols-3 sm:divide-x sm:divide-y-0">
                        <div class="p-4 sm:p-5">
                            <h3 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                Draft Posts
                            </h3>
                            <p class="mt-1 text-xs-plus text-slate-400 dark:text-navy-300">
                                {{ now()->format('M d, Y') }}
                            </p>
                            <p class="mt-4">
                                <span class="text-3xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ $draftPosts }}
                                </span>
                                <span class="text-xs text-warning">Draft</span>
                            </p>
                            <div class="mt-4 flex justify-between">
                                <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                                    Recent Drafts
                                </p>
                                <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                                    Status
                                </p>
                            </div>
                            <div class="mt-2 space-y-2.5">
                                @forelse(\App\Models\BlogPost::where('status', 'draft')->latest()->limit(3)->get() as $draft)
                                <div class="flex justify-between space-x-2">
                                    <p class="line-clamp-1">{{ Str::limit($draft->title, 30) }}</p>
                                    <p class="font-medium text-slate-700 dark:text-navy-100">
                                        Draft
                                    </p>
                                </div>
                                @empty
                                <div class="flex justify-between space-x-2">
                                    <p class="line-clamp-1 text-slate-400">No draft posts</p>
                                    <p class="font-medium text-slate-400">-</p>
                                </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="p-4 sm:p-5">
                            <h3 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                Pending Comments
                            </h3>
                            <p class="mt-1 text-xs-plus text-slate-400 dark:text-navy-300">
                                {{ now()->format('M d, Y') }}
                            </p>
                            <p class="mt-4">
                                <span class="text-3xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ $pendingComments }}
                                </span>
                                <span class="text-xs text-warning">Pending</span>
                            </p>
                            <div class="mt-4 flex justify-between">
                                <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                                    Recent Comments
                                </p>
                                <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                                    Status
                                </p>
                            </div>
                            <div class="mt-2 space-y-2.5">
                                @forelse(\App\Models\BlogComment::where('status', 'pending')->latest()->limit(3)->get() as $comment)
                                <div class="flex justify-between space-x-2">
                                    <p class="line-clamp-1">{{ Str::limit($comment->name ?? 'Anonymous', 20) }}</p>
                                    <p class="font-medium text-slate-700 dark:text-navy-100">
                                        Pending
                                    </p>
                                </div>
                                @empty
                                <div class="flex justify-between space-x-2">
                                    <p class="line-clamp-1 text-slate-400">No pending comments</p>
                                    <p class="font-medium text-slate-400">-</p>
                                </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="p-4 sm:p-5">
                            <h3 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                Active Tenders
                            </h3>
                            <p class="mt-1 text-xs-plus text-slate-400 dark:text-navy-300">
                                {{ now()->format('M d, Y') }}
                            </p>
                            <p class="mt-4">
                                <span class="text-3xl font-medium text-slate-700 dark:text-navy-100">
                                    {{ $activeTenders }}
                                </span>
                                <span class="text-xs text-success">Active</span>
                            </p>
                            <div class="mt-4 flex justify-between">
                                <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                                    Recent Tenders
                                </p>
                                <p class="text-xs uppercase text-slate-400 dark:text-navy-300">
                                    Status
                                </p>
                            </div>
                            <div class="mt-2 space-y-2.5">
                                @forelse(\App\Models\Tender::where('status', 'active')->where('is_published', true)->latest()->limit(3)->get() as $tender)
                                <div class="flex justify-between space-x-2">
                                    <p class="line-clamp-1">{{ Str::limit($tender->title, 30) }}</p>
                                    <p class="font-medium text-slate-700 dark:text-navy-100">
                                        Active
                                    </p>
                                </div>
                                @empty
                                <div class="flex justify-between space-x-2">
                                    <p class="line-clamp-1 text-slate-400">No active tenders</p>
                                    <p class="font-medium text-slate-400">-</p>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
                    <div class="col-span-12 -mt-1 sm:col-span-5 lg:col-span-4 xl:col-span-5">
                        <div class="flex items-center justify-between">
                            <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                Top Authors
                            </h2>
                            <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })" @click.outside="if(isShowPopper) isShowPopper = false"
                                class="inline-flex">
                                <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                                    class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                </button>

                                <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                    <div
                                        class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                        <ul>
                                            <li>
                                                <a href="#"
                                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another
                                                    Action</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something
                                                    else</a>
                                            </li>
                                        </ul>
                                        <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                                        <ul>
                                            <li>
                                                <a href="#"
                                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated
                                                    Link</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="p-4">
                                @php
                                    $topAuthors = \App\Models\BlogPost::with('author')
                                        ->selectRaw('author_id, COUNT(*) as post_count, SUM(view_count) as total_views')
                                        ->groupBy('author_id')
                                        ->orderBy('post_count', 'desc')
                                        ->limit(3)
                                        ->get();
                                @endphp
                                
                                @forelse($topAuthors as $authorData)
                                <div class="mb-4 p-3 rounded-lg bg-slate-50 dark:bg-navy-600">
                                    <div class="flex items-center space-x-3">
                                        <div class="avatar size-12">
                                            @if($authorData->author && method_exists($authorData->author, 'getFirstMediaUrl') && $authorData->author->getFirstMediaUrl('avatar'))
                                                <img class="rounded-full" src="{{ $authorData->author->getFirstMediaUrl('avatar') }}" alt="{{ $authorData->author->name }}" />
                                            @else
                                                <div class="rounded-full bg-primary/10 flex items-center justify-center w-full h-full">
                                                    <span class="text-primary font-semibold text-sm">
                                                        {{ $authorData->author ? substr($authorData->author->name, 0, 2) : 'A' }}
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-medium text-slate-700 dark:text-navy-100">
                                                {{ $authorData->author->name ?? 'Unknown Author' }}
                                            </h4>
                                            <p class="text-xs text-slate-500 dark:text-navy-300">
                                                {{ $authorData->post_count }} posts • {{ number_format($authorData->total_views) }} views
                                            </p>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-lg font-semibold text-slate-700 dark:text-navy-100">
                                                {{ $authorData->post_count }}
                                            </div>
                                            <div class="text-xs text-slate-500 dark:text-navy-300">Posts</div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="text-center py-8 text-slate-500 dark:text-navy-300">
                                    <svg class="w-12 h-12 mx-auto mb-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <p>No authors found</p>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="card col-span-12 sm:col-span-7 lg:col-span-8 xl:col-span-7">
                        <div class="my-3 flex items-center justify-between px-4">
                            <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                Site Overview
                            </h2>
                            <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })" @click.outside="if(isShowPopper) isShowPopper = false"
                                class="inline-flex">
                                <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                                    class="btn -mr-1.5 size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                </button>

                                <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                    <div
                                        class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                        <ul>
                                            <li>
                                                <a href="#"
                                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another
                                                    Action</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something
                                                    else</a>
                                            </li>
                                        </ul>
                                        <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                                        <ul>
                                            <li>
                                                <a href="#"
                                                    class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated
                                                    Link</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3 px-4">
                            <div class="rounded-lg bg-slate-100 p-3 dark:bg-navy-600">
                                <div class="flex justify-between space-x-1">
                                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                        {{ number_format($totalViews) }}
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5"
                                        class="size-5 text-primary dark:text-accent" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>
                                <p class="mt-1 text-xs-plus">Total Views</p>
                            </div>
                            <div class="rounded-lg bg-slate-100 p-3 dark:bg-navy-600">
                                <div class="flex justify-between">
                                    <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                        {{ number_format($avgViews) }}
                                    </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-success"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                    </svg>
                                </div>
                                <p class="mt-1 text-xs-plus">Avg Post View</p>
                            </div>
                        </div>
                        <div class="mt-3 px-3">
                            <div x-init="$nextTick(() => {
                                $el._x_chart = new ApexCharts($el, pages.charts.analyticsSiteOverview);
                                $el._x_chart.render()
                            });"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 xl:col-span-5">
                <div class="-mt-1 flex items-center justify-between">
                    <h2 class="text-sm-plus font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                        Post Rankings
                    </h2>
                    <div class="flex">
                        <div class="flex items-center" x-data="{ isInputActive: false }">
                            <label class="block">
                                <input x-effect="isInputActive === true && $nextTick(() => { $el.focus()});"
                                    :class="isInputActive ? 'w-32 lg:w-48' : 'w-0'"
                                    class="form-input bg-transparent px-1 text-right transition-all duration-100 placeholder:text-slate-500 dark:placeholder:text-navy-200"
                                    placeholder="Search here..." type="text" />
                            </label>
                            <button @click="isInputActive = !isInputActive"
                                class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                        <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })" @click.outside="if(isShowPopper) isShowPopper = false"
                            class="inline-flex">
                            <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                                class="btn size-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>
                            </button>
                            <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                <div
                                    class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                    <ul>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another
                                                Action</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something
                                                else</a>
                                        </li>
                                    </ul>
                                    <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                                    <ul>
                                        <li>
                                            <a href="#"
                                                class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-hidden transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated
                                                Link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                        <table class="is-hoverable w-full text-left">
                            <thead>
                                <tr>
                                    <th
                                        class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100">
                                        Rank
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Post Title
                                    </th>
                                    <th
                                        class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        View
                                    </th>

                                    <th
                                        class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                        Position
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($topPosts as $index => $post)
                                <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                    <td class="whitespace-nowrap px-4 py-3">
                                        <p class="text-center text-base font-medium text-slate-700 dark:text-navy-100">
                                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}.
                                        </p>
                                    </td>
                                    <td class="min-w-[20rem] px-4 py-3 sm:px-5">
                                        <div class="flex items-center space-x-4">
                                            <div class="avatar size-12">
                                                @if($post->getFirstMediaUrl('featured_image'))
                                                    <img class="rounded-lg object-cover object-center"
                                                        src="{{ $post->getFirstMediaUrl('featured_image') }}" alt="{{ $post->title }}" />
                                                @else
                                                    <div class="rounded-lg bg-slate-200 dark:bg-navy-600 flex items-center justify-center w-full h-full">
                                                        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>

                                            <span class="font-medium text-slate-700 line-clamp-2 dark:text-navy-100">
                                                {{ Str::limit($post->title, 50) }}
                                            </span>
                                        </div>
                                    </td>
                                    <td
                                        class="whitespace-nowrap px-4 py-3 font-medium text-slate-600 dark:text-navy-100 sm:px-5">
                                        {{ number_format($post->view_count) }}
                                    </td>
                                    <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                        <div class="flex items-center justify-end space-x-1">
                                            <p class="text-sm-plus text-slate-800 dark:text-navy-100">
                                                {{ $post->status == 'published' ? 'Live' : 'Draft' }}
                                            </p>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4 {{ $post->status == 'published' ? 'text-success' : 'text-warning' }}"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                @if($post->status == 'published')
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                                @else
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                                @endif
                                            </svg>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                    <td colspan="4" class="px-4 py-8 text-center text-slate-500 dark:text-navy-300">
                                        No blog posts found
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
