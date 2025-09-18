<x-app-layout title="CMS Dashboard" is-header-blur="true">
    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <!-- Quick Stats -->
            <div class="col-span-12 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Total Pages -->
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs+ text-slate-500 dark:text-navy-200">Total Pages</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">24</p>
                        </div>
                        <div class="size-12 rounded-full bg-primary/10 flex items-center justify-center">
                            <svg class="size-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Blog Posts -->
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs+ text-slate-500 dark:text-navy-200">Blog Posts</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ \App\Models\BlogPost::count() }}</p>
                        </div>
                        <div class="size-12 rounded-full bg-purple-500/10 flex items-center justify-center">
                            <svg class="size-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Published Posts -->
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs+ text-slate-500 dark:text-navy-200">Published</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ \App\Models\BlogPost::where('status', 'published')->count() }}</p>
                        </div>
                        <div class="size-12 rounded-full bg-success/10 flex items-center justify-center">
                            <svg class="size-6 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Draft Posts -->
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs+ text-slate-500 dark:text-navy-200">Drafts</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ \App\Models\BlogPost::where('status', 'draft')->count() }}</p>
                        </div>
                        <div class="size-12 rounded-full bg-warning/10 flex items-center justify-center">
                            <svg class="size-6 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Pending Comments -->
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs+ text-slate-500 dark:text-navy-200">Pending Comments</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ \App\Models\BlogComment::where('status', 'pending')->count() }}</p>
                        </div>
                        <div class="size-12 rounded-full bg-pink-500/10 flex items-center justify-center">
                            <svg class="size-6 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Tenders -->
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs+ text-slate-500 dark:text-navy-200">Total Tenders</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ \App\Models\Tender::count() }}</p>
                        </div>
                        <div class="size-12 rounded-full bg-blue-500/10 flex items-center justify-center">
                            <svg class="size-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Active Tenders -->
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs+ text-slate-500 dark:text-navy-200">Active Tenders</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ \App\Models\Tender::where('status', 'active')->where('is_published', true)->count() }}</p>
                        </div>
                        <div class="size-12 rounded-full bg-success/10 flex items-center justify-center">
                            <svg class="size-6 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Expired Tenders -->
                <div class="card p-4 sm:p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs+ text-slate-500 dark:text-navy-200">Expired Tenders</p>
                            <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">{{ \App\Models\Tender::where('deadline', '<', now())->count() }}</p>
                        </div>
                        <div class="size-12 rounded-full bg-error/10 flex items-center justify-center">
                            <svg class="size-6 text-error" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="col-span-12 lg:col-span-8">
                <div class="card p-4 sm:p-5">
                    <h3 class="text-lg font-medium text-slate-800 dark:text-navy-50 mb-4">Quick Actions</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Create New Blog Post -->
                        <a href="{{ route('cms.blog.create') }}" class="flex items-center p-4 rounded-lg border border-slate-200 hover:bg-slate-50 dark:border-navy-500 dark:hover:bg-navy-600 transition-colors">
                            <div class="size-10 rounded-full bg-purple-500/10 flex items-center justify-center mr-3">
                                <svg class="size-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-slate-800 dark:text-navy-50">Create Blog Post</h4>
                                <p class="text-xs text-slate-500 dark:text-navy-200">Write and publish a new blog post</p>
                            </div>
                        </a>

                        <!-- Manage Blog Posts -->
                        <a href="{{ route('cms.blog.index') }}" class="flex items-center p-4 rounded-lg border border-slate-200 hover:bg-slate-50 dark:border-navy-500 dark:hover:bg-navy-600 transition-colors">
                            <div class="size-10 rounded-full bg-blue-500/10 flex items-center justify-center mr-3">
                                <svg class="size-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-slate-800 dark:text-navy-50">Manage Blog Posts</h4>
                                <p class="text-xs text-slate-500 dark:text-navy-200">Edit, publish, and organize blog posts</p>
                            </div>
                        </a>

                        <!-- Manage Categories -->
                        <a href="{{ route('cms.blog-categories.index') }}" class="flex items-center p-4 rounded-lg border border-slate-200 hover:bg-slate-50 dark:border-navy-500 dark:hover:bg-navy-600 transition-colors">
                            <div class="size-10 rounded-full bg-green-500/10 flex items-center justify-center mr-3">
                                <svg class="size-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-slate-800 dark:text-navy-50">Manage Categories</h4>
                                <p class="text-xs text-slate-500 dark:text-navy-200">Organize blog posts by categories</p>
                            </div>
                        </a>

                        <!-- Manage Tags -->
                        <a href="{{ route('cms.blog-tags.index') }}" class="flex items-center p-4 rounded-lg border border-slate-200 hover:bg-slate-50 dark:border-navy-500 dark:hover:bg-navy-600 transition-colors">
                            <div class="size-10 rounded-full bg-orange-500/10 flex items-center justify-center mr-3">
                                <svg class="size-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-slate-800 dark:text-navy-50">Manage Tags</h4>
                                <p class="text-xs text-slate-500 dark:text-navy-200">Create and manage blog tags</p>
                            </div>
                        </a>

                        <!-- Manage Comments -->
                        <a href="{{ route('cms.blog-comments.index') }}" class="flex items-center p-4 rounded-lg border border-slate-200 hover:bg-slate-50 dark:border-navy-500 dark:hover:bg-navy-600 transition-colors">
                            <div class="size-10 rounded-full bg-pink-500/10 flex items-center justify-center mr-3">
                                <svg class="size-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-slate-800 dark:text-navy-50">Manage Comments</h4>
                                <p class="text-xs text-slate-500 dark:text-navy-200">Moderate and manage blog comments</p>
                            </div>
                        </a>

                        <!-- Create New Page -->
                        <a href="{{ route('cms.pages.create') }}" class="flex items-center p-4 rounded-lg border border-slate-200 hover:bg-slate-50 dark:border-navy-500 dark:hover:bg-navy-600 transition-colors">
                            <div class="size-10 rounded-full bg-primary/10 flex items-center justify-center mr-3">
                                <svg class="size-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-slate-800 dark:text-navy-50">Create New Page</h4>
                                <p class="text-xs text-slate-500 dark:text-navy-200">Add a new page to your website</p>
                            </div>
                        </a>

                        <!-- Upload Media -->
                        <a href="{{ route('cms.media') }}" class="flex items-center p-4 rounded-lg border border-slate-200 hover:bg-slate-50 dark:border-navy-500 dark:hover:bg-navy-600 transition-colors">
                            <div class="size-10 rounded-full bg-info/10 flex items-center justify-center mr-3">
                                <svg class="size-5 text-info" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-slate-800 dark:text-navy-50">Upload Media</h4>
                                <p class="text-xs text-slate-500 dark:text-navy-200">Upload images and documents</p>
                            </div>
                        </a>

                        <!-- Manage Sliders -->
                        <a href="{{ route('cms.sliders.index') }}" class="flex items-center p-4 rounded-lg border border-slate-200 hover:bg-slate-50 dark:border-navy-500 dark:hover:bg-navy-600 transition-colors">
                            <div class="size-10 rounded-full bg-warning/10 flex items-center justify-center mr-3">
                                <svg class="size-5 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-slate-800 dark:text-navy-50">Manage Sliders</h4>
                                <p class="text-xs text-slate-500 dark:text-navy-200">Manage homepage slider content</p>
                            </div>
                        </a>


                        <!-- Manage Pages -->
                        <a href="{{ route('cms.pages') }}" class="flex items-center p-4 rounded-lg border border-slate-200 hover:bg-slate-50 dark:border-navy-500 dark:hover:bg-navy-600 transition-colors">
                            <div class="size-10 rounded-full bg-success/10 flex items-center justify-center mr-3">
                                <svg class="size-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-slate-800 dark:text-navy-50">Manage Pages</h4>
                                <p class="text-xs text-slate-500 dark:text-navy-200">Edit and organize your pages</p>
                            </div>
                        </a>

                        <!-- Create New Tender -->
                        <a href="{{ route('cms.tenders.create') }}" class="flex items-center p-4 rounded-lg border border-slate-200 hover:bg-slate-50 dark:border-navy-500 dark:hover:bg-navy-600 transition-colors">
                            <div class="size-10 rounded-full bg-blue-500/10 flex items-center justify-center mr-3">
                                <svg class="size-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-slate-800 dark:text-navy-50">Create New Tender</h4>
                                <p class="text-xs text-slate-500 dark:text-navy-200">Add a new tender notice</p>
                            </div>
                        </a>

                        <!-- Manage Tenders -->
                        <a href="{{ route('cms.tenders.index') }}" class="flex items-center p-4 rounded-lg border border-slate-200 hover:bg-slate-50 dark:border-navy-500 dark:hover:bg-navy-600 transition-colors">
                            <div class="size-10 rounded-full bg-indigo-500/10 flex items-center justify-center mr-3">
                                <svg class="size-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-slate-800 dark:text-navy-50">Manage Tenders</h4>
                                <p class="text-xs text-slate-500 dark:text-navy-200">Edit and manage tender notices</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="col-span-12 lg:col-span-4">
                <div class="card p-4 sm:p-5">
                    <h3 class="text-lg font-medium text-slate-800 dark:text-navy-50 mb-4">Recent Activity</h3>
                    <div class="space-y-4">
                        @php
                            $recentPosts = \App\Models\BlogPost::latest()->limit(2)->get();
                            $recentTenders = \App\Models\Tender::latest()->limit(2)->get();
                            $recentActivities = collect();
                            
                            // Add blog posts to activities
                            foreach($recentPosts as $post) {
                                $recentActivities->push([
                                    'type' => 'blog',
                                    'title' => $post->title,
                                    'action' => $post->status == 'published' ? 'Blog post published' : 'Blog post created',
                                    'time' => $post->created_at,
                                    'icon' => 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z',
                                    'color' => 'purple-500'
                                ]);
                            }
                            
                            // Add tenders to activities
                            foreach($recentTenders as $tender) {
                                $recentActivities->push([
                                    'type' => 'tender',
                                    'title' => $tender->title,
                                    'action' => $tender->is_published ? 'Tender published' : 'Tender created',
                                    'time' => $tender->created_at,
                                    'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                                    'color' => 'blue-500'
                                ]);
                            }
                            
                            // Sort by creation time and take latest 3
                            $recentActivities = $recentActivities->sortByDesc('time')->take(3);
                        @endphp
                        
                        @forelse($recentActivities as $activity)
                        <div class="flex items-start space-x-3">
                            <div class="size-8 rounded-full bg-{{ $activity['color'] }}/10 flex items-center justify-center flex-shrink-0">
                                <svg class="size-4 text-{{ $activity['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $activity['icon'] }}"></path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-slate-800 dark:text-navy-50">{{ $activity['action'] }}</p>
                                <p class="text-xs text-slate-500 dark:text-navy-200">"{{ Str::limit($activity['title'], 50) }}"</p>
                                <p class="text-xs text-slate-400 dark:text-navy-300">{{ $activity['time']->diffForHumans() }}</p>
                            </div>
                        </div>
                        @empty
                        <div class="flex items-start space-x-3">
                            <div class="size-8 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                                <svg class="size-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-slate-800 dark:text-navy-50">No recent activity</p>
                                <p class="text-xs text-slate-500 dark:text-navy-200">Create your first content to get started</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
