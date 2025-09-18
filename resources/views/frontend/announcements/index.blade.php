<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline' https://fonts.googleapis.com https://fonts.gstatic.com https://cdn.plyr.io; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.plyr.io; font-src 'self' https://fonts.gstatic.com; img-src 'self' data: https:; connect-src 'self'; media-src 'self' https:; object-src 'none'; base-uri 'self'; form-action 'self';" />

  
  <title>Announcements - Department of Fisheries - Punjab</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/fav.png') }}" type="image/x-icon" />

    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/glightbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
    <script defer src="{{ asset('assets/js/app.min.js') }}"></script>
</head>

  <body>
    <!-- loader  -->
    <div class="screen_loader fixed inset-0 z-[101] grid place-content-center bg-neutral-0">
  <div class="w-10 h-10 border-4 border-t-primary-400 border-neutral-40 rounded-full animate-spin"></div>
</div>

    <!-- Mobile Menu -->
    <div class="mobile-menu">
  <div class="mb-6 flex items-center justify-between gap-3">
    <a href="/">
      <img src="{{ asset('assets/images/flogo.svg') }}" alt="" class="logo-size" />
    </a>
    <button class="menu-close text-2xl" aria-label="menu close button">
      <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
    </button>
  </div>
  <ul class="space-y-2 overflow-y-auto h-full pb-16">
    <li><a href="/" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">Home</a></li>
    <li><a href="#" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">About</a></li>
    <li><a href="#" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">Services</a></li>
    <li><a href="{{ route('frontend.announcements') }}" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">Announcements</a></li>
    <li><a href="#" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">Shop</a></li>
    <li class="submenu-item">
      <button aria-label="submenu button" class="submenu-btn border border-neutral-40 flex w-full items-center justify-between rounded-md px-3 py-2.5 font-medium">
        Pages <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256"><path d="M213.66,101.66l-80,80a8,8,0,0,1-11.32,0l-80-80A8,8,0,0,1,53.66,90.34L128,164.69l74.34-74.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
      </button>
      <div class="submenu-content">
        <ul class="space-y-2 py-2 pl-3">
          <li><a class="border border-neutral-40 flex rounded-md px-3 py-2" href="{{ route('frontend.blog') }}">Blogs</a></li>
          <li><a class="border border-neutral-40 flex rounded-md px-3 py-2" href="#">Blog Details</a></li>
          <li><a class="border border-neutral-40 flex rounded-md px-3 py-2" href="#">Service Details</a></li>
        </ul>
      </div>
    </li>
    <li><a href="#" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">Contact</a></li>
  </ul>
</div>

    <!-- header section start -->
    <header class="header-two z-10 py-3 lg:py-4 xxl:py-6 w-full bg-transparent px-3 fixed top-0">
  <div class="max-w-[1712px] mx-auto flex justify-between items-center">
    <a href="/" class="w-auto h-auto aria-label="site logo">
      <img src="{{ asset('assets/images/flogo.svg') }}" alt="" class="logo-size" />
    </a>  
    <ul class="menu two">
      <a class="flex mb-4 lg:hidden h-auto" href="/">
        <img src="{{ asset('assets/images/flogo.svg') }}" alt="" class="logo-size" />
      </a>
      <li>
        <a class="menu-link" href="/">Home</a>
      </li>
      
      <li>
        <a class="menu-link" href="#">About</a>
      </li>
      <li>
        <a class="menu-link" href="#">Services</a>
      </li>
      <li>
        <a class="menu-link" href="{{ route('frontend.announcements') }}">Announcements</a>
      </li>
     
      <li class="dropdown-item">
        <button class="dropdown-btn" aria-label="Dropdown button">
          Pages <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256"><path d="M213.66,101.66l-80,80a8,8,0,0,1-11.32,0l-80-80A8,8,0,0,1,53.66,90.34L128,164.69l74.34-74.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
        </button>
        <ul class="dropdown-menu">
          <li><a class="menu-link" href="{{ route('frontend.blog') }}">Blogs</a></li>
          <li><a class="menu-link" href="#">Blog Details</a></li>
          <li><a class="menu-link" href="#">Service Details</a></li>
        </ul>
      </li>
      <li>
        <a class="menu-link" href="#">Contact</a>
      </li>
    </ul>
    <div class="flex items-center gap-2 sm:gap-3 lg:gap-4">
      <div>
        <button aria-label="Search Button" class="topbar-btn search-btn text-neutral-0">
          <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256"><path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path></svg>
        </button>
        <div class="search-bar">
          <button aria-label="search bar close button" class="absolute top-4 right-4 search-bar-close">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
          </button>
          <div class="px-4 flex items-center justify-center cont w-full">
            <div class="flex items-center gap-4 w-full h-12">
              <input type="text" class="w-full h-full py-3.5 px-4 border rounded-lg border-neutral-40 focus:border-primary-300" placeholder="Search" />
              <button aria-label="Search button" class="bg-primary-300 rounded-lg py-3 px-6 text-neutral-0 xl:px-8">Search</button>
            </div>
          </div>
        </div>
      </div>

      <button aria-label="Menu Button" class="topbar-btn text-neutral-0 border-neutral-20 lg:!hidden menu-btn">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256"><path d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z"></path></svg>
      </button>
    </div>
  </div>
</header>

    <!-- header section end -->

    <!-- Page Header -->
    <section class="pt-32 pb-20 bg-primary-50">
      <div class="cont">
        <div class="text-center">
          <h1 class="text-4xl xl:text-5xl font-bold text-neutral-900 mb-4">Announcements</h1>
          <p class="text-lg text-neutral-600 max-w-2xl mx-auto">Stay updated with the latest news, notices, and important announcements from the Department of Fisheries - Punjab.</p>
        </div>
      </div>
    </section>

    <!-- Announcements Section -->
    <section class="py-120 bg-neutral-0">
      <div class="cont">
        <!-- Filter Section -->
        <div class="mb-10">
          <form method="GET" class="flex flex-wrap gap-4 items-center">
            <div class="flex-1 min-w-[200px]">
              <select name="type" class="w-full px-4 py-3 border border-neutral-40 rounded-lg focus:border-primary-300">
                <option value="">All Types</option>
                <option value="general" {{ request('type') == 'general' ? 'selected' : '' }}>General</option>
                <option value="tender" {{ request('type') == 'tender' ? 'selected' : '' }}>Tender</option>
                <option value="notice" {{ request('type') == 'notice' ? 'selected' : '' }}>Notice</option>
                <option value="corrigendum" {{ request('type') == 'corrigendum' ? 'selected' : '' }}>Corrigendum</option>
              </select>
            </div>
            <div class="flex-1 min-w-[200px]">
              <select name="priority" class="w-full px-4 py-3 border border-neutral-40 rounded-lg focus:border-primary-300">
                <option value="">All Priorities</option>
                <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High Priority</option>
                <option value="normal" {{ request('priority') == 'normal' ? 'selected' : '' }}>Normal Priority</option>
                <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low Priority</option>
              </select>
            </div>
            <button type="submit" class="btn-primary px-6 py-3">Filter</button>
            @if(request()->hasAny(['type', 'priority']))
            <a href="{{ route('frontend.announcements') }}" class="btn-secondary px-6 py-3">Clear Filters</a>
            @endif
          </form>
        </div>

        <!-- Announcements Grid -->
        @if($announcements->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 xl:gap-8">
          @foreach($announcements as $announcement)
          <div class="bg-neutral-0 rounded-2xl p-6 xl:p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-neutral-40 group">
            <div class="flex items-center gap-3 mb-4">
              <div class="w-3 h-3 bg-{{ $announcement->priority === 'high' ? 'red' : ($announcement->priority === 'normal' ? 'primary' : 'blue') }}-500 rounded-full"></div>
              <span class="text-sm font-semibold text-{{ $announcement->priority === 'high' ? 'red' : ($announcement->priority === 'normal' ? 'primary' : 'blue') }}-600 uppercase">{{ ucfirst($announcement->type) }}</span>
              @if($announcement->is_featured)
              <span class="text-xs bg-yellow-100 text-yellow-600 px-2 py-1 rounded-full">Featured</span>
              @endif
            </div>
            <h3 class="text-lg xl:text-xl font-bold mb-3 text-neutral-900 line-clamp-2 group-hover:text-primary-500 transition-colors">{{ $announcement->title }}</h3>
            <p class="text-neutral-600 mb-4 line-clamp-3">{{ Str::limit($announcement->description, 150) }}</p>
            <div class="flex items-center justify-between mb-4">
              <span class="text-sm text-neutral-500">{{ $announcement->published_date->format('M d, Y') }}</span>
              @if($announcement->expiry_date)
              <span class="text-xs text-neutral-400">Expires: {{ $announcement->expiry_date->format('M d, Y') }}</span>
              @endif
            </div>
            <div class="flex items-center gap-3">
              <a href="{{ route('frontend.announcements.show', $announcement) }}" class="btn-primary text-sm px-4 py-2 flex-1 text-center">Read More</a>
              @if($announcement->file_path)
              <a href="{{ Storage::url($announcement->file_path) }}" target="_blank" class="btn-secondary text-sm px-4 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
              </a>
              @endif
            </div>
          </div>
          @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
          {{ $announcements->links() }}
        </div>
        @else
        <div class="text-center py-12">
          <div class="w-16 h-16 bg-neutral-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
          </div>
          <h3 class="text-lg font-semibold text-neutral-900 mb-2">No Announcements Found</h3>
          <p class="text-neutral-600 mb-6">No announcements match your current filter criteria.</p>
          <a href="{{ route('frontend.announcements') }}" class="btn-primary">View All Announcements</a>
        </div>
        @endif
      </div>
    </section>

    <!-- Footer section start -->
    <footer class="relative">
  <div class="h-[120px] w-full absolute top-0 left-0 right-0 overflow-x-hidden">
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
  </div>
  <div class="bg-neutral-0 pt-[120px]">
    <div class="bg-primary-75">
      <div class="cont relative">
        <img src="{{ asset('assets/images/footer-fish.png') }}" class="absolute right-[98%] top-16" alt="" />
        <div class="bg-primary-500 relative z-[2] rounded-3xl p-4 md:p-6 xl:p-14 flex justify-between items-center gap-4 max-md:flex-wrap mb-10 xl:mb-20">
          <h2 class="text-neutral-0 max-w-lg">Subscribe To Our Newsletter</h2>
          <form class="flex items-center rounded-full bg-neutral-0 p-1 md:p-2">
            <input type="text" placeholder="Enter Your Email..." class="bg-transparent px-3 w-full" />
            <button class="btn-primary">
              Subscribe <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256"><path d="M227.32,28.68a16,16,0,0,0-15.66-4.08l-.15,0L19.57,82.84a16,16,0,0,0-2.49,29.8L102,154l41.3,84.87A15.86,15.86,0,0,0,157.74,248q.69,0,1.38-.06a15.88,15.88,0,0,0,14-11.51l58.2-191.94c0-.05,0-.1,0-.15A16,16,0,0,0,227.32,28.68ZM157.83,231.85l-.05.14,0-.07-40.06-82.3,48-48a8,8,0,0,0-11.31-11.31l-48,48L24.08,98.25l-.07,0,.14,0L216,40Z"></path></svg>
            </button>
          </form>
        </div>
        <div class="relative z-[2] grid grid-cols-12 xl:grid-cols-13 gap-4 xl:gap-6 pb-10 md:pb-14 xl:pb-20">
          <div class="col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-4">
            <img src="{{ asset('assets/images/blue.png') }}" class="mb-6" alt="" />
            <p class="font-medium mb-6">Aqua Farm & Fishery offers sustainable aquaculture solutions and expert consulting to improve fish farming and water quality.</p>
            <div class="flex items-center gap-2">
              <a href="#" aria-label="social site link" class="social-icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256">
                  <path d="M232,128a104.16,104.16,0,0,1-91.55,103.26,4,4,0,0,1-4.45-4V152h24a8,8,0,0,0,8-8.53,8.17,8.17,0,0,0-8.25-7.47H136V112a16,16,0,0,1,16-16h16a8,8,0,0,0,8-8.53A8.17,8.17,0,0,0,167.73,80H152a32,32,0,0,0-32,32v24H96a8,8,0,0,0-8,8.53A8.17,8.17,0,0,0,96.27,152H120v75.28a4,4,0,0,1-4.44,4A104.15,104.15,0,0,1,24.07,124.09c2-54,45.74-97.9,99.78-100A104.12,104.12,0,0,1,232,128Z"></path>
                </svg>
              </a>
              <a href="#" aria-label="social site link" class="social-icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256">
                  <path d="M176,24H80A56.06,56.06,0,0,0,24,80v96a56.06,56.06,0,0,0,56,56h96a56.06,56.06,0,0,0,56-56V80A56.06,56.06,0,0,0,176,24ZM128,176a48,48,0,1,1,48-48A48.05,48.05,0,0,1,128,176Zm60-96a12,12,0,1,1,12-12A12,12,0,0,1,188,80Zm-28,48a32,32,0,1,1-32-32A32,32,0,0,1,160,128Z"></path>
                </svg>
              </a>
              <a href="#" aria-label="social site link" class="social-icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256">
                  <path d="M245.66,77.66l-29.9,29.9C209.72,177.58,150.67,232,80,232c-14.52,0-26.49-2.3-35.58-6.84-7.33-3.67-10.33-7.6-11.08-8.72a8,8,0,0,1,3.85-11.93c.26-.1,24.24-9.31,39.47-26.84a110.93,110.93,0,0,1-21.88-24.2c-12.4-18.41-26.28-50.39-22-98.18a8,8,0,0,1,13.65-4.92c.35.35,33.28,33.1,73.54,43.72V88a47.87,47.87,0,0,1,14.36-34.3A46.87,46.87,0,0,1,168.1,40a48.66,48.66,0,0,1,41.47,24H240a8,8,0,0,1,5.66,13.66Z"></path>
                </svg>
              </a>
              <a href="#" aria-label="social site link" class="social-icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256">
                  <path d="M234.33,69.52a24,24,0,0,0-14.49-16.4C185.56,39.88,131,40,128,40s-57.56-.12-91.84,13.12a24,24,0,0,0-14.49,16.4C19.08,79.5,16,97.74,16,128s3.08,48.5,5.67,58.48a24,24,0,0,0,14.49,16.41C69,215.56,120.4,216,127.34,216h1.32c6.94,0,58.37-.44,91.18-13.11a24,24,0,0,0,14.49-16.41c2.59-10,5.67-28.22,5.67-58.48S236.92,79.5,234.33,69.52Zm-73.74,65-40,28A8,8,0,0,1,108,156V100a8,8,0,0,1,12.59-6.55l40,28a8,8,0,0,1,0,13.1Z"></path>
                </svg>
              </a>
            </div>
          </div>
          <div class="col-span-12 md:col-span-6 lg:col-span-3">
            <p class="text-neutral-900 text-2xl font-semibold mb-4 xl:mb-6">Our Projects</p>
            <ul class="space-y-4">
              <li><a href="#" class="link">Shrimp Farming</a></li>
              <li><a href="#" class="link">Fish Farming</a></li>
              <li><a href="#" class="link">Aquaculture</a></li>
              <li><a href="#" class="link">Market Feasibility - Lahore</a></li>
            </ul>
          </div>
          <div class="col-span-12 md:col-span-6 lg:col-span-3">
            <p class="text-neutral-900 text-2xl font-semibold mb-4 xl:mb-6">Useful Links</p>
            <ul class="space-y-4">
              <li><a href="#" class="link">About Us</a></li>
              <li><a href="#" class="link">Case Study</a></li>
              <li><a href="#" class="link">Contact Us</a></li>
              <li><a href="#" class="link">Privacy Policy</a></li>
              <li><a href="#" class="link">Terms & Conditions</a></li>
            </ul>
          </div>
          <div class="col-span-12 md:col-span-6 lg:col-span-3">
            <p class="text-neutral-900 text-2xl font-semibold mb-4 xl:mb-6">Contact Info</p>
            <ul class="space-y-4">
              <li class="flex items-start gap-3">
                <span class="social-icon shrink-0 hover:bg-neutral-0 text-primary-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M144.27,45.93a8,8,0,0,1,9.8-5.66,86.22,86.22,0,0,1,61.66,61.66,8,8,0,0,1-5.66,9.8A8.23,8.23,0,0,1,208,112a8,8,0,0,1-7.73-5.94,70.35,70.35,0,0,0-50.33-50.33A8,8,0,0,1,144.27,45.93Zm-2.33,41.8c13.79,3.68,22.65,12.54,26.33,26.33A8,8,0,0,0,176,120a8.23,8.23,0,0,0,2.07-.27,8,8,0,0,0,5.66-9.8c-5.12-19.16-18.5-32.54-37.66-37.66a8,8,0,1,0-4.13,15.46Zm81.94,95.35A56.26,56.26,0,0,1,168,232C88.6,232,24,167.4,24,88A56.26,56.26,0,0,1,72.92,32.12a16,16,0,0,1,16.62,9.52l21.12,47.15,0,.12A16,16,0,0,1,109.39,104c-.18.27-.37.52-.57.77L88,129.45c7.49,15.22,23.41,31,38.83,38.51l24.34-20.71a8.12,8.12,0,0,1,.75-.56,16,16,0,0,1,15.17-1.4l.13.06,47.11,21.11A16,16,0,0,1,223.88,183.08Zm-15.88-2s-.07,0-.11,0h0l-47-21.05-24.35,20.71a8.44,8.44,0,0,1-.74.56,16,16,0,0,1-15.75,1.14c-18.73-9.05-37.4-27.58-46.46-46.11a16,16,0,0,1,1-15.7,6.13,6.13,0,0,1,.57-.77L96,95.15l-21-47a.61.61,0,0,1,0-.12A40.2,40.2,0,0,0,40,88,128.14,128.14,0,0,0,168,216,40.21,40.21,0,0,0,208,181.07Z"></path>
                  </svg>
                </span>
                <div>
                  <p class="mb-2 font-semibold text-neutral-900">Phone</p>
                  <span>04299211584</span>
                </div>
              </li>
               <li class="flex items-start gap-3">
                <span class="social-icon shrink-0 hover:bg-neutral-0 text-primary-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256"><path d="M228.44,89.34l-96-64a8,8,0,0,0-8.88,0l-96,64A8,8,0,0,0,24,96V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V96A8,8,0,0,0,228.44,89.34ZM96.72,152,40,192V111.53Zm16.37,8h29.82l56.63,40H56.46Zm46.19-8L216,111.53V192ZM128,41.61l81.91,54.61-67,47.78H113.11l-67-47.78Z"></path></svg>
                </span>
                <div>
                  <p class="mb-2 font-semibold text-neutral-900">Email</p>
                  <span><a href="mailto:fishdept@hotmail.com" class="__cf_email__" data-cfemail="3d595850527d58455c504d5158135e5250">fishdept@hotmail.com</a></span>
                </div>
              </li>
              <li class="flex items-start gap-3">
                <span class="social-icon shrink-0 hover:bg-neutral-0 text-primary-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M128,64a40,40,0,1,0,40,40A40,40,0,0,0,128,64Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,128Zm0-112a88.1,88.1,0,0,0-88,88c0,31.4,14.51,64.68,42,96.25a254.19,254.19,0,0,0,41.45,38.3,8,8,0,0,0,9.18,0A254.19,254.19,0,0,0,174,200.25c27.45-31.57,42-64.85,42-96.25A88.1,88.1,0,0,0,128,16Zm0,206c-16.53-13-72-60.75-72-118a72,72,0,0,1,144,0C200,161.23,144.53,209,128,222Z"></path>
                  </svg>
                </span>
                <div>
                  <p class="mb-2 font-semibold text-neutral-900">Address</p>
                  <span>9-A Bahawalpur Road, Chauburji, Lahore</span>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="py-5 xl:py-7 text-center border-t border-primary-300">
        <p>Copyright <span class="text-primary-300">&copy;</span> <span id="year"></span> - All rights reserved by <a href="#" class="text-primary-300">Department of Fisheries - Punjab</a></p>
      </div>
    </div>
  </div>
</footer>

    <!-- Footer section end -->
</body>

</html>
