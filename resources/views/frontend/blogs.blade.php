{{-- resources/views/frontend/blogs.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Department of Fisheries, Government of the Punjab — latest news, updates and insights about fisheries development, aquaculture and marine conservation." />
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/glightbox.css') }}" />
  <title>Blogs — Department of Fisheries, Government of the Punjab</title>
  <script defer src="{{ asset('assets/js/app.min.js') }}"></script>
  <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
</head>

<body>
  {{-- Loader --}}
  <div class="screen_loader fixed inset-0 z-[101] grid place-content-center bg-neutral-0">
    <div class="w-10 h-10 border-4 border-t-primary-400 border-neutral-40 rounded-full animate-spin"></div>
  </div>

  {{-- Header --}}
  @include('frontend.layouts.header')


  {{-- Banner --}}
  <section class="px-3">
    <div class="max-w-[1800px] mx-auto bg-primary-50 rounded-xl xl:rounded-2xl py-14 xl:py-28 flex justify-center text-center">
      <div class="relative z-[1] reveal_anim">
        <h2 class="mb-5">Blogs</h2>
        <div class="flex justify-center items-center gap-2">
          <a href="{{ url('/') }}">Home</a> &gt;
          <span class="text-primary-300">Blogs</span>
        </div>
      </div>
    </div>
  </section>

  {{-- Blog section start --}}
  <section class="bg-neutral-0 py-120 relative">
    <div class="cont">
      
      {{-- Blog Posts Grid --}}
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($posts as $post)
          <div class="p-4 xl:p-5 rounded-xl border bg-neutral-0 border-neutral-40 hover:shadow-lg transition-shadow">
            <a href="{{ route('frontend.blog.details', $post->slug) }}" aria-label="Read {{ $post->title }}">
              @if($post->getFirstMedia('featured_image'))
                <img src="{{ $post->getFirstMedia('featured_image')->getUrl() }}" 
                     class="rounded-xl mb-5 w-full h-48 object-cover" 
                     alt="{{ $post->title }}" />
              @else
                <div class="rounded-xl mb-5 w-full h-48 bg-neutral-100 flex items-center justify-center">
                  <svg class="w-12 h-12 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                  </svg>
                </div>
              @endif
            </a>
            <div class="mb-5 flex justify-between items-center text-sm text-neutral-600">
              <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary-300" fill="currentColor" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
                <span>{{ $post->author->name ?? 'Admin' }}</span>
              </div>
              <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary-300" fill="currentColor" viewBox="0 0 256 256"><path d="M168,112a8,8,0,0,1-8,8H96a8,8,0,0,1,0-16h64A8,8,0,0,1,168,112Zm-8,24H96a8,8,0,0,0,0,16h64a8,8,0,0,0,0-16Zm72-8A104,104,0,0,1,79.12,219.82L45.07,231.17a16,16,0,0,1-20.24-20.24l11.35-34.05A104,104,0,1,1,232,128Zm-16,0A88,88,0,1,0,51.81,172.06a8,8,0,0,1,.66,6.54L40,216,77.4,203.53a7.85,7.85,0,0,1,2.53-.42,8,8,0,0,1,4,1.08A88,88,0,0,0,216,128Z"></path></svg>
                <span>{{ $post->comments_count ?? 0 }} Comments</span>
              </div>
            </div>
            @if($post->category)
              <div class="mb-3">
                <span class="inline-block px-3 py-1 text-xs font-medium text-primary-600 bg-primary-50 rounded-full">
                  {{ $post->category->name }}
                </span>
              </div>
            @endif
            <h4 class="mb-4 text-lg font-semibold text-neutral-800 line-clamp-2">{{ $post->title }}</h4>
            <p class="mb-5 xl:mb-8 text-neutral-600 line-clamp-3">{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 120) }}</p>
            <div class="flex justify-between items-center">
              <a href="{{ route('frontend.blog.details', $post->slug) }}" class="text-primary-300 text-lg font-medium hover:text-primary-400 transition-colors">
                View Details
              </a>
              <span class="text-sm text-neutral-500">{{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
            </div>
          </div>
        @empty
          <div class="col-span-full text-center py-12">
            <svg class="w-16 h-16 text-neutral-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <h3 class="text-xl font-semibold text-neutral-800 mb-2">No blog posts found</h3>
            <p class="text-neutral-600">Try adjusting your search criteria or check back later for new posts.</p>
          </div>
        @endforelse
      </div>

      {{-- Pagination --}}
      @if($posts->hasPages())
        <div class="mt-12 flex justify-center">
          {{ $posts->appends(request()->query())->links() }}
        </div>
      @endif
    </div>
  </section>
  {{-- Blog section end --}}

  {{-- Contact --}}
  <section id="contact" class="py-120 bg-neutral-0 relative">
    <div class="cont grid grid-cols-12 gap-6 items-center">
      <div class="col-span-12 md:col-span-5">
        <p class="sub-heading">Contact</p>
        <h2 class="mb-6 xl:mb-8">Department of Fisheries, Government of the Punjab</h2>

        <div class="space-y-4 xl:space-y-6 max-w-sm">
          <div class="flex items-start gap-3">
            <span class="f-center rounded-full shrink-0 bg-primary-50 size-10 xl:size-12 text-primary-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256"><path d="M128,64a40,40,0,1,0,40,40A40,40,0,0,0,128,64Z"/></svg>
            </span>
            <p class="font-medium">9-A Bahawalpur Road, Chauburji, Lahore, Pakistan</p>
          </div>

          <div class="flex items-start gap-3">
            <span class="f-center rounded-full shrink-0 bg-primary-50 size-10 xl:size-12 text-primary-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256"><path d="M144.27,45.93a8,8,0,0,1,9.8-5.66..."/></svg>
            </span>
            <p class="font-medium">(042) 99212374–75</p>
          </div>

          <div class="flex items-start gap-3">
            <span class="f-center rounded-full shrink-0 bg-primary-50 size-10 xl:size-12 text-primary-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216..."/></svg>
            </span>
            <p class="font-medium"><a href="mailto:fishdept@hotmail.com">fishdept@hotmail.com</a></p>
          </div>
        </div>
      </div>

      <div class="col-span-12 md:col-span-7 xxl:col-start-6 flex items-center">
        <iframe
          src="https://www.google.com/maps?q=9-A%20Bahawalpur%20Road%20Chauburji%20Lahore&output=embed"
          class="max-lg:hidden rounded-s-xl w-[220px] xl:w-[330px] h-[350px] xl:h-[450px]"
          style="border:0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>

        <form action="#" method="post" class="p-4 md:p-6 xl:py-10 xxl:py-[60px] bg-primary-50 rounded-xl">
          @csrf
          <h2 class="mb-5 xl:mb-7">Send Us a Message</h2>
          <div class="space-y-4 mb-6 xl:mb-10">
            <input type="text" name="name" class="py-3 px-4 rounded-xl w-full border bg-neutral-10 border-neutral-40 focus:border-primary-300" placeholder="Full Name" />
            <input type="email" name="email" class="py-3 px-4 rounded-xl w-full border bg-neutral-10 border-neutral-40 focus:border-primary-300" placeholder="Email" />
            <textarea name="message" class="py-3 px-4 rounded-xl w-full border bg-neutral-10 border-neutral-40 focus:border-primary-300" placeholder="Message..." rows="5"></textarea>
          </div>
          <button class="btn-primary" type="submit">Send Message</button>
        </form>
      </div>
    </div>
  </section>

  {{-- Footer --}}
  @include('frontend.layouts.footer')
</body>
</html>
