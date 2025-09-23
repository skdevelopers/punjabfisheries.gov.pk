{{-- resources/views/blog-details.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ $post->meta_description ?? Str::limit(strip_tags($post->excerpt ?? $post->content ?? ''), 160) }}" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <title>{{ $post->title }} — Punjab Fisheries</title>
    <script defer src="{{ asset('assets/js/app.min.js') }}"></script>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
</head>

<body>
    <!-- loader -->
    <div class="screen_loader fixed inset-0 z-[101] grid place-content-center bg-neutral-0">
        <div class="w-10 h-10 border-4 border-t-primary-400 border-neutral-40 rounded-full animate-spin"></div>
    </div>

    {{-- Include Header Component --}}
    @include('frontend.layouts.header')

    <!-- Banner -->
    <section class="px-3">
        <div class="max-w-[1800px] mx-auto bg-primary-50 rounded-xl xl:rounded-2xl py-14 xl:py-28 flex justify-center text-center">
            <div class="relative z-[1]">
                <h2 class="mb-5">Blog Details</h2>
                <div class="flex justify-center items-center gap-2">
                    <a href="{{ url('/') }}">Home</a> &gt;
                    <a href="{{ url('/blog') }}">Blogs</a> &gt;
                    <span class="text-primary-300">{{ Str::limit($post->title, 40) }}</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Details -->
    <section class="bg-neutral-0 py-120">
        <div class="cont grid grid-cols-12 gap-6">
            <!-- Main -->
            <div class="col-span-12 md:col-span-7 xl:col-span-8">
                <div class="relative">
                    <div class="relative z-[1]">
                        @php
                            $hero = $post->getFirstMedia('banner_image') ? $post->getFirstMedia('banner_image')->getUrl() : ($post->getFirstMedia('featured_image') ? $post->getFirstMedia('featured_image')->getUrl() : null);
                        @endphp
                        @if($hero)
                            <img src="{{ $hero }}" class="reveal_anim rounded-xl w-full mb-10 xl:mb-10" alt="{{ $post->title }}" />
                        @endif

                        <p class="font-medium mb-4">
                            {{ $post->category->name ?? 'Updates' }}
                            — {{ optional($post->published_at)->format('F d, Y') ?? $post->created_at->format('F d, Y') }}
                        </p>

                        <h1 class="mb-4 xl:mb-6 reveal_anim">{{ $post->title }}</h1>

                        @if(!empty($post->excerpt))
                            <p class="m-text mb-6">{{ $post->excerpt }}</p>
                        @endif

                        <article class="prose max-w-none m-text">
                            {!! $post->content !!}
                        </article>

                        @if(!empty($post->pull_quote))
                            <div class="mb-6 overflow-hidden bg-primary-50 p-4 xl:p-10 border-l-4 border-primary-500 mt-8">
                                <div class="flex flex-col sm:flex-row gap-4 sm:items-center">
                                    <div class="size-12 shrink-0 f-center xl:size-[60px] bg-primary-300 rounded-full text-neutral-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256"><path d="M100,56H40A16,16,0,0,0,24,72v64a16,16,0,0,0,16,16h60v8a32,32,0,0,1-32,32,8,8,0,0,0,0,16,48.05,48.05,0,0,0,48-48V72A16,16,0,0,0,100,56Zm0,80H40V72h60ZM216,56H156a16,16,0,0,0-16,16v64a16,16,0,0,0,16,16h60v8a32,32,0,0,1-32,32,8,8,0,0,0,0,16,48.05,48.05,0,0,0,48-48V72A16,16,0,0,0,216,56Zm0,80H156V72h60Z"></path></svg>
                                    </div>
                                    <p class="lg:text-xl font-semibold text-neutral-900">
                                        {{ $post->pull_quote }}
                                    </p>
                                </div>
                            </div>
                        @endif

                        {{-- Optional gallery --}}
                        @if(!empty($post->gallery) && is_array($post->gallery))
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-10 xl:mb-14">
                                @foreach($post->gallery as $img)
                                    <img src="{{ asset($img) }}" class="reveal_anim rounded-xl" alt="" />
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Tags + Share -->
                <div class="flex justify-between items-end gap-4 flex-wrap mb-10 xl:mb-14">
                    <div>
                        <h4 class="mb-4 xl:mb-6">Related Tags</h4>
                        <div class="flex flex-wrap gap-3">
                            @if($post->tags && $post->tags->count() > 0)
                                @foreach($post->tags as $tag)
                                    <a href="{{ url('/blog?tag=' . $tag->slug) }}" class="px-4 py-2 border border-neutral-40 rounded-lg flex items-center hover:bg-primary-300 hover:text-white transition-colors">
                                        #{{ $tag->name }}
                                    </a>
                                @endforeach
                            @else
                                <span class="text-neutral-500">No tags</span>
                            @endif
                        </div>
                    </div>

                    @php
                        $shareUrl = urlencode(request()->fullUrl());
                        $shareText = urlencode($post->title);
                    @endphp
                    <div class="flex items-center gap-2 justify-center">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" rel="noopener" aria-label="Share on Facebook" class="social-icon text-primary-300 hover:bg-primary-300 hover:text-neutral-0 border-primary-300 border">f</a>
                        <a href="https://www.instagram.com/" target="_blank" rel="noopener" aria-label="Instagram" class="social-icon text-primary-300 hover:bg-primary-300 hover:text-neutral-0 border-primary-300 border">ig</a>
                        <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareText }}" target="_blank" rel="noopener" aria-label="Share on X" class="social-icon text-primary-300 hover:bg-primary-300 hover:text-neutral-0 border-primary-300 border">x</a>
                    </div>
                </div>

                <!-- Author box -->
                @if(!empty($post->author_name))
                <div class="p-4 lg:p-6 xl:p-8 bg-primary-50 rounded-xl flex max-sm:flex-wrap items-start gap-4 mb-10 xl:mb-14">
                    <img src="{{ asset($post->author_avatar ?? 'assets/images/client-1.png') }}" class="rounded-full" width="80" height="80" alt="{{ $post->author_name }}" />
                    <div>
                        <h5 class="mb-2">{{ $post->author_name }}</h5>
                        @if(!empty($post->author_bio))
                            <p class="font-medium mb-5">{{ $post->author_bio }}</p>
                        @endif
                        <div class="flex gap-2 text-primary-300">
                            <a href="{{ $post->author_fb ?? '#' }}" class="hover:text-secondary">Fb</a>
                            <a href="{{ $post->author_ig ?? '#' }}" class="hover:text-secondary">Ig</a>
                            <a href="{{ $post->author_x ?? '#' }}" class="hover:text-secondary">X</a>
                            <a href="{{ $post->author_web ?? '#' }}" class="hover:text-secondary">Web</a>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Comments Section -->
                @if($post->allow_comments)
                <div class="mb-10 xl:mb-14">
                    <h3 class="uppercase mb-5">Comments ({{ $post->approvedComments->count() }})</h3>
                    
                    @if($post->approvedComments->count() > 0)
                        <div class="space-y-6 mb-8">
                            @foreach($post->approvedComments->whereNull('parent_id') as $comment)
                                <div class="p-4 border border-neutral-200 rounded-lg">
                                    <div class="flex items-start justify-between mb-3">
                                        <div>
                                            <h4 class="font-medium text-neutral-800">{{ $comment->name }}</h4>
                                            <p class="text-sm text-neutral-500">{{ $comment->created_at->format('M d, Y') }}</p>
                                        </div>
                                    </div>
                                    <p class="text-neutral-700 mb-3">{{ $comment->comment }}</p>
                                    
                                    <!-- Reply button -->
                                    <button onclick="showReplyForm({{ $comment->id }})" class="text-primary-300 text-sm hover:text-primary-400">
                                        Reply
                                    </button>
                                    
                                    <!-- Reply form (hidden by default) -->
                                    <div id="reply-form-{{ $comment->id }}" class="hidden mt-4 pl-4 border-l-2 border-primary-100">
                                        <form method="POST" action="{{ route('frontend.blog.comment') }}" class="space-y-3">
                                            @csrf
                                            <input type="hidden" name="blog_post_id" value="{{ $post->id }}">
                                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                            <div class="grid grid-cols-2 gap-3">
                                                <input required name="name" type="text" placeholder="Your Name" class="py-2 px-3 border border-neutral-200 rounded focus:border-primary-300" />
                                                <input required name="email" type="email" placeholder="Your Email" class="py-2 px-3 border border-neutral-200 rounded focus:border-primary-300" />
                                            </div>
                                            <textarea required name="comment" rows="2" placeholder="Your Reply" class="w-full py-2 px-3 border border-neutral-200 rounded focus:border-primary-300"></textarea>
                                            <button type="submit" class="px-4 py-2 bg-primary-300 text-white rounded hover:bg-primary-400 text-sm">
                                                Submit Reply
                                            </button>
                                        </form>
                                    </div>
                                    
                                    <!-- Replies -->
                                    @if($comment->replies->where('status', 'approved')->count() > 0)
                                        <div class="mt-4 space-y-3">
                                            @foreach($comment->replies->where('status', 'approved') as $reply)
                                                <div class="pl-4 border-l-2 border-primary-100">
                                                    <div class="flex items-start justify-between mb-2">
                                                        <div>
                                                            <h5 class="font-medium text-neutral-800 text-sm">{{ $reply->name }}</h5>
                                                            <p class="text-xs text-neutral-500">{{ $reply->created_at->format('M d, Y') }}</p>
                                                        </div>
                                                    </div>
                                                    <p class="text-neutral-700 text-sm">{{ $reply->comment }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-neutral-500 mb-8">No comments yet. Be the first to comment!</p>
                @endif

                <!-- Comment form -->
                <h3 class="uppercase mb-5">Leave a Comment</h3>
                <p class="mb-7 xl:mb-10">Your email address will not be published. Required fields are marked *</p>

                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                            <p class="text-green-700">{{ session('success') }}</p>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                            <p class="text-red-700">{{ session('error') }}</p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('frontend.blog.comment') }}" class="col-span-12 md:col-span-6 grid grid-cols-2 gap-4 lg:gap-6 xxl:gap-y-8 mb-10 xl:mb-14">
                    @csrf
                        <input type="hidden" name="blog_post_id" value="{{ $post->id }}">
                    <div class="col-span-2 md:col-span-1">
                        <label for="name" class="s-text font-semibold mb-2 block">Name*</label>
                        <input required name="name" type="text" placeholder="Enter Name" class="py-2 focus:border-primary-300 bg-neutral-0 border-b border-neutral-40 w-full block" />
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <label for="email" class="s-text font-semibold mb-2 block">Email*</label>
                        <input required name="email" type="email" placeholder="Enter Email" class="py-2 focus:border-primary-300 bg-neutral-0 border-b border-neutral-40 w-full block" />
                    </div>
                    <div class="col-span-2">
                        <label for="comment" class="s-text font-semibold mb-2 block">Comment*</label>
                        <textarea required name="comment" rows="3" placeholder="Your Comment" class="py-2 focus:border-primary-300 bg-neutral-0 border-b border-neutral-40 w-full block"></textarea>
                    </div>
                    <div class="col-span-2 flex items-center gap-1">
                        <input type="checkbox" id="save" class="accent-primary-500" />
                        <label for="save">Save my details for next time.</label>
                    </div>
                    <div class="col-span-2">
                        <button class="btn-primary !text-neutral-0" type="submit">Submit Comment</button>
                    </div>
                </form>
                </div>
                @endif

                <!-- You may also like -->
                @if(!empty($relatedPosts) && count($relatedPosts))
                <h3 class="mb-10 xl:mb-14">You May Also Like</h3>
                <div class="cont grid grid-cols-1 lg:grid-cols-2 gap-6 p-0">
                    @foreach($relatedPosts as $rp)
                        <div class="p-4 xl:p-5 rounded-xl border bg-neutral-0 border-neutral-40">
                            <a href="{{ url('/blog/' . ($rp->slug ?? $rp->id)) }}" aria-label="Read News">
                                <img src="{{ $rp->getFirstMedia('featured_image') ? $rp->getFirstMedia('featured_image')->getUrl() : asset('assets/images/blog-placeholder.webp') }}" class="rounded-xl mb-5 w-full" alt="{{ $rp->title }}" />
                            </a>
                            <div class="mb-5 flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary-300" fill="currentColor" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
                                    <span>{{ $rp->author_name ?? 'Admin' }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary-300" fill="currentColor" viewBox="0 0 256 256"><path d="M168,112a8,8,0,0,1-8,8H96a8,8,0,0,1,0-16h64A8,8,0,0,1,168,112Zm-8,24H96a8,8,0,0,0,0,16h64a8,8,0,0,0,0-16Zm72-8A104,104,0,0,1,79.12,219.82L45.07,231.17a16,16,0,0,1-20.24-20.24l11.35-34.05A104,104,0,1,1,232,128Zm-16,0A88,88,0,1,0,51.81,172.06a8,8,0,0,1,.66,6.54L40,216,77.4,203.53a7.85,7.85,0,0,1,2.53-.42,8,8,0,0,1,4,1.08A88,88,0,0,0,216,128Z"></path></svg>
                                    <span>{{ $rp->comments_count ?? 0 }} Comments</span>
                                </div>
                            </div>
                            <h4 class="mb-4">{{ $rp->title }}</h4>
                            <p class="mb-5 xl:mb-8">{{ Str::limit(strip_tags($rp->excerpt ?? $rp->content ?? ''), 120) }}</p>
                            <a href="{{ url('/blog/' . ($rp->slug ?? $rp->id)) }}" class="text-primary-300 text-lg font-medium underline">View Details</a>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-span-12 md:col-span-5 xl:col-span-4 space-y-4 xl:space-y-6">
                <div class="box">
                    <h4 class="pb-4 xl:pb-6 text-2xl">Search</h4>
                    <form method="GET" action="{{ url('/blog') }}" class="px-4 py-2 w-full bg-neutral-0 border border-neutral-0 focus-within:border-primary-500 flex items-center gap-2">
                        <input type="text" name="q" value="{{ request('q') }}" placeholder="Search" id="search" class="bg-transparent w-full py-0.5" />
                        <button aria-label="Search">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256"><path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path></svg>
                        </button>
                    </form>
                </div>

                <div class="box">
                    <p class="font-semibold text-2xl mb-5">Categories</p>
                    <div class="divide-y divide-neutral-40">
                        @forelse($categories ?? [] as $cat)
                            <a href="{{ url('/blog?category=' . ($cat->slug ?? $cat->id)) }}" class="flex w-full justify-between rounded-lg group items-center duration-300 hover:bg-neutral-0 hover:px-4 py-3.5 gap-3">
                                <p class="m-text font-medium flex items-center gap-1">• {{ $cat->name }}</p>
                                <span class="size-10 rounded-sm f-center bg-primary-50 group-hover:text-primary-300">{{ $cat->posts_count ?? $cat->count ?? 0 }}</span>
                            </a>
                        @empty
                            <span class="block py-3 text-neutral-500">No categories</span>
                        @endforelse
                    </div>
                </div>

                <div class="box">
                    <p class="capitalize text-2xl font-semibold mb-5">Recent Posts</p>
                    <div class="space-y-4">
                        @forelse($recentPosts ?? [] as $rp)
                            <div class="flex items-center gap-3">
                                <div class="size-[114px] shrink-0">
                                    <img src="{{ $rp->getFirstMedia('featured_image') ? $rp->getFirstMedia('featured_image')->getUrl() : asset('assets/images/blog-placeholder.webp') }}" class="object-cover object-center h-full rounded-md" alt="{{ $rp->title }}" />
                                </div>
                                <div>
                                    <p class="text-sm mb-1">{{ optional($rp->published_at)->format('F d, Y') ?? $rp->created_at->format('F d, Y') }}</p>
                                    <p class="lg:text-lg font-medium mb-1">{{ Str::limit($rp->title, 60) }}</p>
                                    <a href="{{ url('/blog/' . ($rp->slug ?? $rp->id)) }}" class="flex items-center text-sm text-primary-500 gap-2 font-semibold">
                                        Read More
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <span class="block text-neutral-500">No recent posts</span>
                        @endforelse
                    </div>
                </div>

                <!-- CTA -->
                <div class="sticky top-28 text-center text-neutral-0 after:size-full after:bg-neutral-900/70 after:absolute after:inset-0 p-4 md:p-6 py-10 xl:px-14 xl:py-20 after:rounded-2xl rounded-2xl" data-bg="{{ asset('assets/images/cta-bg.webp') }}">
                    <div class="relative z-[2] text-center">
                        <div class="flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-12 text-neutral-0 mb-3" fill="currentColor" viewBox="0 0 256 256"><path d="M201.89,54.66A103.43,103.43,0,0,0,128.79,24H128A104,104,0,0,0,24,128v56a24,24,0,0,0,24,24H64a24,24,0,0,0,24-24V144a24,24,0,0,0-24-24H40.36A88.12,88.12,0,0,1,190.54,65.93,87.39,87.39,0,0,1,215.65,120H192a24,24,0,0,0-24,24v40a24,24,0,0,0,24,24h24a24,24,0,0,1-24,24H136a8,8,0,0,0,0,16h56a40,40,0,0,0,40-40V128A103.41,103.41,0,0,0,201.89,54.66ZM64,136a8,8,0,0,1,8,8v40a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V136Zm128,56a8,8,0,0,1-8-8V144a8,8,0,0,1,8-8h24v56Z"></path></svg>
                        </div>
                        <h4 class="mb-5 pb-5 xl:mb-8 xl:pb-8 border-b text-neutral-0 border-neutral-0">How can we help?</h4>
                        <div class="flex justify-center gap-1 mb-3">
                            <span class="text-neutral-0 font-medium">(042) 99212374–75</span>
                        </div>
                        <div class="flex justify-center gap-1">
                            <span class="text-neutral-0 font-medium">fishdept@hotmail.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Include Footer Component --}}
    @include('frontend.layouts.footer')

    <script data-cfasync="false" src="{{ asset('cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
    
    <script>
        function showReplyForm(commentId) {
            const replyForm = document.getElementById('reply-form-' + commentId);
            if (replyForm.classList.contains('hidden')) {
                replyForm.classList.remove('hidden');
            } else {
                replyForm.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
