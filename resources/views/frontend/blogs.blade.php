{{-- resources/views/frontend/blogs.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Department of Fisheries, Government of the Punjab — latest news, updates and insights about fisheries development, aquaculture and marine conservation." />
  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline' https://fonts.googleapis.com https://fonts.gstatic.com https://cdn.plyr.io; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.plyr.io; font-src 'self' https://fonts.gstatic.com; img-src 'self' data: https:; connect-src 'self'; media-src 'self' https:; object-src 'none'; base-uri 'self'; form-action 'self';" />
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
  <header class="z-10 py-3 lg:py-4 xxl:py-6 w-full bg-neutral-0 px-3 sticky top-0">
    <div class="max-w-[1712px] mx-auto flex justify-between items-center">
      <a href="{{ url('/') }}" aria-label="site logo">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Punjab Fisheries" />
      </a>

      <ul class="menu">
        <a class="flex mb-4 lg:hidden" href="{{ url('/') }}">
          <img src="{{ asset('assets/images/logo.png') }}" alt="Punjab Fisheries" />
        </a>
        <li><a class="menu-link" href="{{ url('/') }}">Home</a></li>
        <li><a class="menu-link" href="{{ url('/about') }}">About</a></li>
        <li class="dropdown-item">
          <button class="dropdown-btn" aria-label="Dropdown button">
            Services
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256"><path d="M213.66,101.66l-80,80a8,8,0,0,1-11.32,0l-80-80A8,8,0,0,1,53.66,90.34L128,164.69l74.34-74.35a8,8,0,0,1,11.32,11.32Z"/></svg>
          </button>
          <ul class="dropdown-menu">
            <li><a class="menu-link" href="https://fisheries.punjab.gov.pk/soil_water_testing" target="_blank" rel="noopener">Soil & Water Testing</a></li>
            <li><a class="menu-link" href="https://fisheries.punjab.gov.pk/angling_license" target="_blank" rel="noopener">Angling & Fishing Licenses</a></li>
            <li><a class="menu-link" href="https://fisheries.punjab.gov.pk/management-of-fisheries-resources" target="_blank" rel="noopener">Management of Fisheries Resources</a></li>
          </ul>
        </li>
        <li><a class="menu-link" href="https://fisheries.punjab.gov.pk/projects" target="_blank" rel="noopener">Projects</a></li>
        <li><a class="menu-link" href="https://fisheries.punjab.gov.pk/regional_offices" target="_blank" rel="noopener">Regional Offices</a></li>
        <li><a class="menu-link" href="{{ route('frontend.blog') }}">Blog</a></li>
        <li><a class="menu-link" href="{{ url('/contact') }}">Contact</a></li>
      </ul>

      <div class="flex items-center gap-2 sm:gap-3 lg:gap-4">
        <a href="#contact" class="btn-primary max-xl:!hidden">Get In Touch</a>
        <button aria-label="Menu Button" class="topbar-btn text-neutral-700 lg:!hidden menu-btn">
          <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256"><path d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z"/></svg>
        </button>
      </div>
    </div>
  </header>

  {{-- Mobile Menu --}}
  <div class="mobile-menu">
    <div class="mb-6 flex items-center justify-between gap-3">
      <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="Punjab Fisheries" /></a>
      <button class="menu-close text-2xl" aria-label="menu close button">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"/></svg>
      </button>
    </div>
    <ul class="space-y-2 overflow-y-auto h-full pb-16">
      <li><a href="{{ url('/') }}" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">Home</a></li>
      <li><a href="{{ url('/about') }}" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">About</a></li>
      <li><a href="https://fisheries.punjab.gov.pk/soil_water_testing" target="_blank" rel="noopener" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">Soil & Water Testing</a></li>
      <li><a href="https://fisheries.punjab.gov.pk/angling_license" target="_blank" rel="noopener" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">Angling License</a></li>
      <li><a href="https://fisheries.punjab.gov.pk/projects" target="_blank" rel="noopener" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">Projects</a></li>
      <li><a href="https://fisheries.punjab.gov.pk/regional_offices" target="_blank" rel="noopener" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">Regional Offices</a></li>
      <li><a href="{{ route('frontend.blog') }}" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">Blog</a></li>
      <li><a href="#contact" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">Contact</a></li>
    </ul>
  </div>

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
      {{-- Search and Filter Section --}}
      <div class="mb-8">
        <form method="GET" action="{{ route('frontend.blog') }}" class="flex flex-col md:flex-row gap-4">
          <div class="flex-1">
            <input type="text" name="search" value="{{ request('search') }}" 
                   placeholder="Search blog posts..." 
                   class="w-full px-4 py-3 rounded-lg border border-neutral-200 focus:border-primary-300 focus:ring-2 focus:ring-primary-100">
          </div>
          <div class="md:w-48">
            <select name="category" class="w-full px-4 py-3 rounded-lg border border-neutral-200 focus:border-primary-300 focus:ring-2 focus:ring-primary-100">
              <option value="">All Categories</option>
              @foreach($categories as $category)
                <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                  {{ $category->name }} ({{ $category->published_posts_count }})
                </option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="px-6 py-3 bg-primary-300 text-white rounded-lg hover:bg-primary-400 transition-colors">
            Search
          </button>
        </form>
      </div>

      {{-- Blog Posts Grid --}}
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($posts as $post)
          <div class="p-4 xl:p-5 rounded-xl border bg-neutral-0 border-neutral-40 hover:shadow-lg transition-shadow">
            <a href="{{ route('frontend.blog.details', $post->slug) }}" aria-label="Read {{ $post->title }}">
              @if($post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}" 
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
  <footer class="relative">
    <div class="h-[120px] w-full absolute top-0 left-0 right-0 overflow-x-hidden">
      <div class="wave"></div><div class="wave"></div><div class="wave"></div>
    </div>

    <div class="bg-neutral-0 pt-[120px]">
      <div class="bg-primary-75">
        <div class="cont relative">
          <img src="{{ asset('assets/images/footer-fish.png') }}" class="absolute right-[98%] top-16" alt="" />

          <div class="bg-primary-500 relative z-[2] rounded-3xl p-4 md:p-6 xl:p-14 flex justify-between items-center gap-4 max-md:flex-wrap mb-10 xl:mb-20">
            <h2 class="text-neutral-0 max-w-lg">Subscribe for updates</h2>
            <form class="flex items-center rounded-full bg-neutral-0 p-1 md:p-2" action="#" method="post">
              @csrf
              <input type="email" placeholder="Enter your email..." class="bg-transparent px-3 w-full" name="newsletter_email" />
              <button class="btn-primary" type="submit">Subscribe</button>
            </form>
          </div>

          <div class="relative z-[2] grid grid-cols-12 xl:grid-cols-13 gap-4 xl:gap-6 pb-10 md:pb-14 xl:pb-20">
            <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-4">
              <img src="{{ asset('assets/images/logo.png') }}" class="mb-6" alt="Punjab Fisheries" />
              <p class="font-medium mb-6">
                Official information sourced from the Department of Fisheries portals of the Government of the Punjab.
              </p>
              <div class="flex items-center gap-2">
                <a href="https://fisheries.punjab.gov.pk/" target="_blank" rel="noopener" class="social-icon" aria-label="Department Portal">D</a>
                <a href="https://www.punjabfisheries.gov.pk/" target="_blank" rel="noopener" class="social-icon" aria-label="Directorate Portal">DG</a>
              </div>
            </div>

            <div class="col-span-12 md:col-span-6 lg:col-span-3">
              <p class="text-neutral-900 text-2xl font-semibold mb-4 xl:mb-6">Public Services</p>
              <ul class="space-y-4">
                <li><a href="https://fisheries.punjab.gov.pk/angling_license" target="_blank" rel="noopener" class="link">Angling Licenses</a></li>
                <li><a href="https://fisheries.punjab.gov.pk/soil_water_testing" target="_blank" rel="noopener" class="link">Soil & Water Testing</a></li>
                <li><a href="https://fisheries.punjab.gov.pk/management-of-fisheries-resources" target="_blank" rel="noopener" class="link">Resource Management</a></li>
              </ul>
            </div>

            <div class="col-span-12 md:col-span-6 lg:col-span-3">
              <p class="text-neutral-900 text-2xl font-semibold mb-4 xl:mb-6">Useful Links</p>
              <ul class="space-y-4">
                <li><a href="https://fisheries.punjab.gov.pk/projects" target="_blank" rel="noopener" class="link">Projects</a></li>
                <li><a href="https://fisheries.punjab.gov.pk/regional_offices" target="_blank" rel="noopener" class="link">Regional Offices</a></li>
                <li><a href="https://fisheries.punjab.gov.pk/contact-us" target="_blank" rel="noopener" class="link">Official Contact</a></li>
                <li><a href="https://www.punjabfisheries.gov.pk/" target="_blank" rel="noopener" class="link">Directorate Home</a></li>
              </ul>
            </div>

            <div class="col-span-12 md:col-span-6 lg:col-span-3">
              <p class="text-neutral-900 text-2xl font-semibold mb-4 xl:mb-6">Head Office</p>
              <ul class="space-y-4">
                <li class="flex items-start gap-3">
                  <span class="social-icon shrink-0 hover:bg-neutral-0 text-primary-300">P</span>
                  <div>
                    <p class="mb-2 font-semibold text-neutral-900">Address</p>
                    <span>9-A Bahawalpur Road, Chauburji, Lahore</span>
                  </div>
                </li>
                <li class="flex items-start gap-3">
                  <span class="social-icon shrink-0 hover:bg-neutral-0 text-primary-300">@</span>
                  <div>
                    <p class="mb-2 font-semibold text-neutral-900">Email</p>
                    <span><a href="mailto:fishdept@hotmail.com">fishdept@hotmail.com</a></span>
                  </div>
                </li>
                <li class="flex items-start gap-3">
                  <span class="social-icon shrink-0 hover:bg-neutral-0 text-primary-300">☎</span>
                  <div>
                    <p class="mb-2 font-semibold text-neutral-900">Phone</p>
                    <span>(042) 99212374–75</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="py-5 xl:py-7 text-center border-t border-primary-300">
          <p>Copyright <span class="text-primary-300">&copy;</span> {{ now()->year }} — Department of Fisheries, Government of the Punjab</p>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
