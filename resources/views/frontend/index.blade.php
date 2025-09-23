<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline' https://fonts.googleapis.com https://fonts.gstatic.com https://cdn.plyr.io; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.plyr.io; font-src 'self' https://fonts.gstatic.com; img-src 'self' data: https:; connect-src 'self'; media-src 'self' https:; object-src 'none'; base-uri 'self'; form-action 'self';" />

  
  <title>Department of Fisheries - Punjab</title>
    
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
    <li><a href="{{ route('frontend.jobs') }}" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">Careers</a></li>
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
      <li>
        <a class="menu-link" href="{{ route('frontend.jobs') }}">Careers</a>
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

    <!-- banner section start -->
    <x-slider :sliders="$sliders" />
    <!-- banner section end -->

    <!-- about section start -->
    <section class="py-120 bg-neutral-0 relative overflow-x-hidden">
      <img src="{{ asset('assets/images/home-1/about-fish-1.png') }}" class="max-xxl:hidden absolute fish fish-left top-5 left-8" alt="" />
      <img src="{{ asset('assets/images/home-1/about-fish-2.png') }}" class="max-xxl:hidden absolute fish fish-top top-[-200px] right-4" alt="" />
      <div class="cont grid grid-cols-12 gap-6 items-center">
        <div class="col-span-12 lg:col-span-6">
          <div class="relative xl:-translate-x-8 xxl:-translate-x-14 3xl:-translate-x-28 reveal_anim">
            <div class="relative f-center">
              <img src="{{ asset('assets/images/home-1/about-1.png') }}" width="670" height="670" alt="" />
              <div class="absolute z-[1]">
                <a href="https://www.youtube.com/embed/J6acmXS6bP4?vq=hd1080&rel=0" target="_blank" aria-label="Watch video" class="topbar-btn -translate-x-4 4xl:-translate-x-8 pulse-effect relative z-[3] bg-neutral-0 text-neutral-900 hero-video">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" viewBox="0 0 256 256">
                    <rect width="256" height="256" fill="none" />
                    <path fill="currentColor" d="M240,128a15.74,15.74,0,0,1-7.6,13.51L88.32,229.65a16,16,0,0,1-16.2.3A15.86,15.86,0,0,1,64,216.13V39.87a15.86,15.86,0,0,1,8.12-13.82,16,16,0,0,1,16.2.3L232.4,114.49A15.74,15.74,0,0,1,240,128Z" />
                  </svg>
                </a>
              </div>
            </div>
            <img src="{{ asset('assets/images/home-1/about-2.png') }}" width="240" height="240" class="absolute max-sm:hidden border-8 border-neutral-0 rounded-full right-0 top-1/2 -translate-y-1/2" alt="" />
          </div>
        </div>
        <div class="col-span-12 lg:col-span-6">
          <p class="sub-heading split_anim">About us</p>
          <h2 class="mb-4 xl:mb-6 blur_anim" data-fade-from="right">About Punjab Fisheries Department</h2>
          <p class="reveal_anim text-neutral-600 mb-6 xl:mb-10 border-b border-neutral-40 pb-6 xl:pb-10" data-fade-from="right" data-delay=".4">The Punjab Fisheries Department was founded in 1912 to manage, conserve, and develop the inland fisheries resources of Punjab. We provide fish seed through hatcheries, offer soil & water testing, disease diagnosis, and hands-on training to fish farmers. Our mission is to strengthen the aquaculture sector through science-based solutions and public-private partnership, ensuring quality fish supply and improved nutrition for all.</p>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 xl:gap-6 mb-6 xl:mb-10 border-b border-neutral-40 pb-6 xl:pb-10">
            <div class="fade_anim flex items-center gap-4">
              <img src="{{ asset('assets/images/home-1/shrimp.png') }}" alt="" />
              <div>
                <h5 class="mb-3">Shrimp Feeds</h5>
                <p>Premium nutrition for shrimps.</p>
              </div>
            </div>
            <div data-delay=".2" class="fade_anim flex items-center gap-4">
              <img src="{{ asset('assets/images/home-1/spear.png') }}" alt="" />
              <div>
                <h5 class="mb-3">Spear Fishing</h5>
                <p>Precision hunting for seafood.</p>
              </div>
            </div>
            <div data-delay=".4" class="fade_anim flex items-center gap-4">
              <img src="{{ asset('assets/images/home-1/hook.png') }}" alt="" />
              <div>
                <h5 class="mb-3">Hand Fishing</h5>
                <p>Traditional fishing, pure catch.</p>
              </div>
            </div>
            <div data-delay=".6" class="fade_anim flex items-center gap-4">
              <img src="{{ asset('assets/images/home-1/boat.png') }}" alt="" />
              <div>
                <h5 class="mb-3">Boat Fishing</h5>
                <p>Deepwater fishing, fresh supply.</p>
              </div>
            </div>
          </div>
          <div class="flex gap-4 items-center flex-wrap fade_anim mb-7 xl:mb-10">
            <a href="#" class="btn-primary"
              >About Company <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg
            ></a>
            <a href="#" class="flex items-center gap-2">
              <div class="size-14 rounded-full border border-neutral-40 text-primary-300 f-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-7" fill="currentColor" viewBox="0 0 256 256">
                  <path
                    d="M144.27,45.93a8,8,0,0,1,9.8-5.66,86.22,86.22,0,0,1,61.66,61.66,8,8,0,0,1-5.66,9.8A8.23,8.23,0,0,1,208,112a8,8,0,0,1-7.73-5.94,70.35,70.35,0,0,0-50.33-50.33A8,8,0,0,1,144.27,45.93Zm-2.33,41.8c13.79,3.68,22.65,12.54,26.33,26.33A8,8,0,0,0,176,120a8.23,8.23,0,0,0,2.07-.27,8,8,0,0,0,5.66-9.8c-5.12-19.16-18.5-32.54-37.66-37.66a8,8,0,1,0-4.13,15.46Zm81.94,95.35A56.26,56.26,0,0,1,168,232C88.6,232,24,167.4,24,88A56.26,56.26,0,0,1,72.92,32.12a16,16,0,0,1,16.62,9.52l21.12,47.15,0,.12A16,16,0,0,1,109.39,104c-.18.27-.37.52-.57.77L88,129.45c7.49,15.22,23.41,31,38.83,38.51l24.34-20.71a8.12,8.12,0,0,1,.75-.56,16,16,0,0,1,15.17-1.4l.13.06,47.11,21.11A16,16,0,0,1,223.88,183.08Zm-15.88-2s-.07,0-.11,0h0l-47-21.05-24.35,20.71a8.44,8.44,0,0,1-.74.56,16,16,0,0,1-15.75,1.14c-18.73-9.05-37.4-27.58-46.46-46.11a16,16,0,0,1,1-15.7,6.13,6.13,0,0,1,.57-.77L96,95.15l-21-47a.61.61,0,0,1,0-.12A40.2,40.2,0,0,0,40,88,128.14,128.14,0,0,0,168,216,40.21,40.21,0,0,0,208,181.07Z"
                  ></path>
                </svg>
              </div>
              <div>
                <p class="text-neutral-100 mb-1 text-sm">Call Us Now</p>
                <p class="text-sm text-neutral-900">04299211584</p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- service section start -->
    <section class="bg-neutral-0 pb-120">
      <div class="max-w-[1700px] mx-auto px-3 reveal_anim" id="cards">
        <div class="cont flex justify-between items-center mb-10 xl:mb-14">
          <div>
            <p class="sub-heading">Our Services</p>
            <h2 class="mb-6 split_anim">Services We Provide</h2>
          </div>
          <a href="#" class="btn-secondary">
            View All
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg>
          </a>
        </div>
        <div class="card rounded-[32px] relative min-h-[300px] after:size-full after:absolute after:inset-0 after:rounded-[32px] after:bg-gradient-to-t after:from-black/80 after:to-transparent">
          <img src="{{ asset('assets/images/home-1/service-1.webp') }}" class="min-h-[300px] object-cover object-center" alt="" />
          <div class="absolute z-[1] px-4 md:px-8 xl:px-14 pb-6 md:pb-8 xl:pb-14 flex justify-between items-center flex-wrap gap-3 w-full bottom-0 left-0 right-0">
            <a href="#" class="text-secondary font-medium">See Details</a>
            <h2 class="text-4xl lg:text-5xl xl:text-[56px] text-neutral-0">PREMIUM HARVESTING</h2>
            <span class="text-secondary font-medium">2025</span>
          </div>
        </div>
        <div class="card rounded-[32px] relative min-h-[300px] after:size-full after:absolute after:inset-0 after:rounded-[32px] after:bg-gradient-to-t after:from-black/80 after:to-transparent">
          <img src="{{ asset('assets/images/home-1/service-2.webp') }}" class="min-h-[300px] object-cover object-center" alt="" />
          <div class="absolute z-[1] px-4 md:px-8 xl:px-14 pb-6 md:pb-8 xl:pb-14 flex justify-between items-center flex-wrap gap-3 w-full bottom-0 left-0 right-0">
            <a href="#" class="text-secondary font-medium">See Details</a>
            <h2 class="text-4xl lg:text-5xl xl:text-[56px] text-neutral-0">FISH HEALTH</h2>
            <span class="text-secondary font-medium">2025</span>
          </div>
        </div>
        <div class="card rounded-[32px] relative min-h-[300px] after:size-full after:absolute after:inset-0 after:rounded-[32px] after:bg-gradient-to-t after:from-black/80 after:to-transparent">
          <img src="{{ asset('assets/images/home-1/service-3.webp') }}" class="min-h-[300px] object-cover object-center" alt="" />
          <div class="absolute z-[1] px-4 md:px-8 xl:px-14 pb-6 md:pb-8 xl:pb-14 flex justify-between items-center flex-wrap gap-3 w-full bottom-0 left-0 right-0">
            <a href="#" class="text-secondary font-medium">See Details</a>
            <h2 class="text-4xl lg:text-5xl xl:text-[56px] text-neutral-0">WATER MANAGEMENT</h2>
            <span class="text-secondary font-medium">2025</span>
          </div>
        </div>
        <div class="card rounded-[32px] relative min-h-[300px] after:size-full after:absolute after:inset-0 after:rounded-[32px] after:bg-gradient-to-t after:from-black/80 after:to-transparent">
          <img src="{{ asset('assets/images/home-1/service-4.webp') }}" class="min-h-[300px] object-cover object-center" alt="" />
          <div class="absolute z-[1] px-4 md:px-8 xl:px-14 pb-6 md:pb-8 xl:pb-14 flex justify-between items-center flex-wrap gap-3 w-full bottom-0 left-0 right-0">
            <a href="#" class="text-secondary font-medium">See Details</a>
            <h2 class="text-4xl lg:text-5xl xl:text-[56px] text-neutral-0">FISH BREEDING</h2>
            <span class="text-secondary font-medium">2025</span>
          </div>
        </div>
      </div>
    </section>
    <!-- service section end -->

    <!-- skills section start -->
    <section class="bg-primary-50 py-120">
      <div class="cont grid grid-cols-12 gap-6 items-center">
        <div class="col-span-12 lg:col-span-5">
          <p class="sub-heading">Our Skills</p>
          <h2 class="mb-6 split_anim">Aquaculture Solutions</h2>
          <p class="reveal_anim mb-5 xl:mb-8">Decades of expertise and advanced tech for thriving aquatic ecosystems.</p>
          <a href="#" class="btn-secondary"
            >Let's Work <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg
          ></a>
        </div>
        <div class="col-span-12 lg:col-span-7 xxl:col-span-6 xxl:col-start-7 flex flex-wrap justify-center items-center gap-6">
          <div class="size-[250px] xl:size-[306px] rounded-full f-center circular-progress" data-percentage="95" data-bg-color="#f5f5f5">
            <div class="absolute size-[235px] xl:size-[285px] rounded-full bg-neutral-0 inner-circle"></div>
            <div class="text-center z-[2]">
              <p class="relative mb-1 text-5xl xl:text-[64px] font-bold text-primary-500 percentage">0%</p>
              <span class="text-neutral-400">Water Quality</span>
            </div>
          </div>
          <div class="size-[250px] xl:size-[306px] rounded-full f-center circular-progress" data-percentage="90" data-bg-color="#f5f5f5">
            <div class="absolute size-[235px] xl:size-[285px] rounded-full bg-neutral-0 inner-circle"></div>
            <div class="text-center z-[2]">
              <p class="relative mb-1 text-5xl xl:text-[64px] font-bold text-primary-500 percentage">0%</p>
              <span class="text-neutral-400">Fish Health</span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- skills section end -->

    <!-- projects section start -->
    <section class="bg-neutral-0 relative py-120">
      <div class="mx-auto text-center mb-10 xl:mb-14">
        <p class="sub-heading blur_anim mx-auto">Recent Works Gallery</p>
        <h2 class="split_anim">Our Completed Projects</h2>
      </div>
      <div class="swiper projectSlider">
        <div class="swiper-wrapper">
          <div class="swiper-slide w-[280px] sm:w-[416px]">
            <div class="rounded-2xl">
              <img src="{{ asset('assets/images/home-1/project1.jpg') }}" class="object-cover object-center rounded-2xl" alt="" />
              <div class="project-inner">
                <div class="size-[60px] bg-secondary rounded-full f-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M168,76a12,12,0,1,1-12-12A12,12,0,0,1,168,76Zm42,79.08c-15.08,20.84-37.53,34.88-66.7,41.74-20.08,4.72-43.54,6-70.12,3.93q2.4,17.82,6.72,37.54a8,8,0,0,1-6.1,9.52,7.81,7.81,0,0,1-1.72.19,8,8,0,0,1-7.81-6.29q-4.89-22.36-7.41-42.62-20.22-2.51-42.58-7.41a8,8,0,0,1,3.43-15.63q19.7,4.32,37.5,6.73c-2.09-26.56-.78-50,3.93-70.06C66,83.55,80.05,61.1,100.88,46,115,35.76,140.15,23.64,179.27,24c21.19.21,40.83,4.33,43.81,6.08a8,8,0,0,1,2.83,2.83c1.75,3,5.87,22.59,6.08,43.78C232.21,98.31,228.57,129.44,210,155.08Zm-23.76,2.8A112.07,112.07,0,0,1,98.12,69.74C75.64,94,66.7,132.47,71.36,184.6,123.51,189.28,162,180.35,186.25,157.88ZM212.44,43.56a175.75,175.75,0,0,0-39.22-3.51c-24.34.64-44.71,6.49-60.76,17.39a96,96,0,0,0,86.09,86.1c10.91-16,16.76-36.42,17.4-60.76A175.82,175.82,0,0,0,212.44,43.56Z"
                    ></path>
                  </svg>
                </div>
                <a href="#" class="text-center">
                  <h6 class="text-secondary font-semibold mb-2">Aquaculture Development</h6>
                  <h4 class="text-neutral-0 mb-2">Shrimp Farming in Punjab (2024-28)</h4>
                  <p class="text-neutral-200 text-sm">Cost: Rs. 1,800 Million</p>
                </a>
              </div>
            </div>
          </div>
          <div class="swiper-slide w-[280px] sm:w-[416px]">
            <div class="rounded-2xl">
              <img src="{{ asset('assets/images/home-1/project-2.webp') }}" class="object-cover object-center rounded-2xl" alt="" />
              <div class="project-inner">
                <div class="size-[60px] bg-secondary rounded-full f-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M168,76a12,12,0,1,1-12-12A12,12,0,0,1,168,76Zm42,79.08c-15.08,20.84-37.53,34.88-66.7,41.74-20.08,4.72-43.54,6-70.12,3.93q2.4,17.82,6.72,37.54a8,8,0,0,1-6.1,9.52,7.81,7.81,0,0,1-1.72.19,8,8,0,0,1-7.81-6.29q-4.89-22.36-7.41-42.62-20.22-2.51-42.58-7.41a8,8,0,0,1,3.43-15.63q19.7,4.32,37.5,6.73c-2.09-26.56-.78-50,3.93-70.06C66,83.55,80.05,61.1,100.88,46,115,35.76,140.15,23.64,179.27,24c21.19.21,40.83,4.33,43.81,6.08a8,8,0,0,1,2.83,2.83c1.75,3,5.87,22.59,6.08,43.78C232.21,98.31,228.57,129.44,210,155.08Zm-23.76,2.8A112.07,112.07,0,0,1,98.12,69.74C75.64,94,66.7,132.47,71.36,184.6,123.51,189.28,162,180.35,186.25,157.88ZM212.44,43.56a175.75,175.75,0,0,0-39.22-3.51c-24.34.64-44.71,6.49-60.76,17.39a96,96,0,0,0,86.09,86.1c10.91-16,16.76-36.42,17.4-60.76A175.82,175.82,0,0,0,212.44,43.56Z"
                    ></path>
                  </svg>
                </div>
                <a href="#" class="text-center">
                  <h6 class="text-secondary font-semibold mb-2">Hatchery Development</h6>
                  <h4 class="text-neutral-0 mb-2">Pangasius Hatchery Project (2024–27)</h4>
                  <p class="text-neutral-200 text-sm">Cost: Rs. 193.564 Million</p>
                </a>
              </div>
            </div>
          </div>
          <div class="swiper-slide w-[280px] sm:w-[416px]">
            <div class="rounded-2xl">
              <img src="{{ asset('assets/images/home-1/project-3.webp') }}" class="object-cover object-center rounded-2xl" alt="" />
              <div class="project-inner">
                <div class="size-[60px] bg-secondary rounded-full f-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M168,76a12,12,0,1,1-12-12A12,12,0,0,1,168,76Zm42,79.08c-15.08,20.84-37.53,34.88-66.7,41.74-20.08,4.72-43.54,6-70.12,3.93q2.4,17.82,6.72,37.54a8,8,0,0,1-6.1,9.52,7.81,7.81,0,0,1-1.72.19,8,8,0,0,1-7.81-6.29q-4.89-22.36-7.41-42.62-20.22-2.51-42.58-7.41a8,8,0,0,1,3.43-15.63q19.7,4.32,37.5,6.73c-2.09-26.56-.78-50,3.93-70.06C66,83.55,80.05,61.1,100.88,46,115,35.76,140.15,23.64,179.27,24c21.19.21,40.83,4.33,43.81,6.08a8,8,0,0,1,2.83,2.83c1.75,3,5.87,22.59,6.08,43.78C232.21,98.31,228.57,129.44,210,155.08Zm-23.76,2.8A112.07,112.07,0,0,1,98.12,69.74C75.64,94,66.7,132.47,71.36,184.6,123.51,189.28,162,180.35,186.25,157.88ZM212.44,43.56a175.75,175.75,0,0,0-39.22-3.51c-24.34.64-44.71,6.49-60.76,17.39a96,96,0,0,0,86.09,86.1c10.91-16,16.76-36.42,17.4-60.76A175.82,175.82,0,0,0,212.44,43.56Z"
                    ></path>
                  </svg>
                </div>
                <a href="#" class="text-center">
                  <h6 class="text-secondary font-semibold mb-2">Fisheries Information System</h6>
                  <h4 class="text-neutral-0 mb-2">Fisheries IMS Project (2021–24)</h4>
                  <p class="text-neutral-200 text-sm">Cost: Rs. 99.600 Million</p>
                </a>
              </div>
            </div>
          </div>
          <div class="swiper-slide w-[280px] sm:w-[416px]">
            <div class="rounded-2xl">
              <img src="{{ asset('assets/images/home-1/project-4.jpg') }}" class="object-cover object-center rounded-2xl" alt="" />
              <div class="project-inner">
                <div class="size-[60px] bg-secondary rounded-full f-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M168,76a12,12,0,1,1-12-12A12,12,0,0,1,168,76Zm42,79.08c-15.08,20.84-37.53,34.88-66.7,41.74-20.08,4.72-43.54,6-70.12,3.93q2.4,17.82,6.72,37.54a8,8,0,0,1-6.1,9.52,7.81,7.81,0,0,1-1.72.19,8,8,0,0,1-7.81-6.29q-4.89-22.36-7.41-42.62-20.22-2.51-42.58-7.41a8,8,0,0,1,3.43-15.63q19.7,4.32,37.5,6.73c-2.09-26.56-.78-50,3.93-70.06C66,83.55,80.05,61.1,100.88,46,115,35.76,140.15,23.64,179.27,24c21.19.21,40.83,4.33,43.81,6.08a8,8,0,0,1,2.83,2.83c1.75,3,5.87,22.59,6.08,43.78C232.21,98.31,228.57,129.44,210,155.08Zm-23.76,2.8A112.07,112.07,0,0,1,98.12,69.74C75.64,94,66.7,132.47,71.36,184.6,123.51,189.28,162,180.35,186.25,157.88ZM212.44,43.56a175.75,175.75,0,0,0-39.22-3.51c-24.34.64-44.71,6.49-60.76,17.39a96,96,0,0,0,86.09,86.1c10.91-16,16.76-36.42,17.4-60.76A175.82,175.82,0,0,0,212.44,43.56Z"
                    ></path>
                  </svg>
                </div>
                <a href="#" class="text-center">
                  <h6 class="text-secondary font-semibold mb-2">Market Infrastructure</h6>
                  <h4 class="text-neutral-0 mb-2">Lahore Fish Market Feasibility (2024)</h4>
                  <p class="text-neutral-200 text-sm">Cost: Rs. 34.000 Million</p>
                </a>
              </div>
            </div>
          </div>
          <div class="swiper-slide w-[280px] sm:w-[416px]">
            <div class="rounded-2xl">
              <img src="{{ asset('assets/images/home-1/project-5.webp') }}" class="object-cover object-center rounded-2xl" alt="" />
              <div class="project-inner">
                <div class="size-[60px] bg-secondary rounded-full f-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M168,76a12,12,0,1,1-12-12A12,12,0,0,1,168,76Zm42,79.08c-15.08,20.84-37.53,34.88-66.7,41.74-20.08,4.72-43.54,6-70.12,3.93q2.4,17.82,6.72,37.54a8,8,0,0,1-6.1,9.52,7.81,7.81,0,0,1-1.72.19,8,8,0,0,1-7.81-6.29q-4.89-22.36-7.41-42.62-20.22-2.51-42.58-7.41a8,8,0,0,1,3.43-15.63q19.7,4.32,37.5,6.73c-2.09-26.56-.78-50,3.93-70.06C66,83.55,80.05,61.1,100.88,46,115,35.76,140.15,23.64,179.27,24c21.19.21,40.83,4.33,43.81,6.08a8,8,0,0,1,2.83,2.83c1.75,3,5.87,22.59,6.08,43.78C232.21,98.31,228.57,129.44,210,155.08Zm-23.76,2.8A112.07,112.07,0,0,1,98.12,69.74C75.64,94,66.7,132.47,71.36,184.6,123.51,189.28,162,180.35,186.25,157.88ZM212.44,43.56a175.75,175.75,0,0,0-39.22-3.51c-24.34.64-44.71,6.49-60.76,17.39a96,96,0,0,0,86.09,86.1c10.91-16,16.76-36.42,17.4-60.76A175.82,175.82,0,0,0,212.44,43.56Z"
                    ></path>
                  </svg>
                </div>
                <a href="#" class="text-center">
                  <h6 class="text-secondary font-semibold mb-2">Genetics Improvement</h6>
                  <h4 class="text-neutral-0 mb-2">Fish Genetics Project   Punjab (2019–24)</h4>
                  <p class="text-neutral-200 text-sm">Cost: Rs. 109.989 Million</p>
                </a>
              </div>
            </div>
          </div>
          <div class="swiper-slide w-[280px] sm:w-[416px]">
            <div class="rounded-2xl">
              <img src="{{ asset('assets/images/home-1/project-1.jpg') }}" class="object-cover object-center rounded-2xl" alt="" />
              <div class="project-inner">
                <div class="size-[60px] bg-secondary rounded-full f-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M168,76a12,12,0,1,1-12-12A12,12,0,0,1,168,76Zm42,79.08c-15.08,20.84-37.53,34.88-66.7,41.74-20.08,4.72-43.54,6-70.12,3.93q2.4,17.82,6.72,37.54a8,8,0,0,1-6.1,9.52,7.81,7.81,0,0,1-1.72.19,8,8,0,0,1-7.81-6.29q-4.89-22.36-7.41-42.62-20.22-2.51-42.58-7.41a8,8,0,0,1,3.43-15.63q19.7,4.32,37.5,6.73c-2.09-26.56-.78-50,3.93-70.06C66,83.55,80.05,61.1,100.88,46,115,35.76,140.15,23.64,179.27,24c21.19.21,40.83,4.33,43.81,6.08a8,8,0,0,1,2.83,2.83c1.75,3,5.87,22.59,6.08,43.78C232.21,98.31,228.57,129.44,210,155.08Zm-23.76,2.8A112.07,112.07,0,0,1,98.12,69.74C75.64,94,66.7,132.47,71.36,184.6,123.51,189.28,162,180.35,186.25,157.88ZM212.44,43.56a175.75,175.75,0,0,0-39.22-3.51c-24.34.64-44.71,6.49-60.76,17.39a96,96,0,0,0,86.09,86.1c10.91-16,16.76-36.42,17.4-60.76A175.82,175.82,0,0,0,212.44,43.56Z"
                    ></path>
                  </svg>
                </div>
                <a href="#" class="text-center">
                  <h6 class="text-secondary font-semibold mb-2">Shrimp Aquaculture Development</h6>
                  <h4 class="text-neutral-0 mb-2">Pilot Shrimp Farming Cluster Development Project (2019–24)</h4>
                  <p class="text-neutral-200 text-sm">Cost: Rs. 2662.721 Million</p>
                </a>
              </div>
            </div>
          </div>
          <div class="swiper-slide w-[280px] sm:w-[416px]">
            <div class="rounded-2xl">
              <img src="{{ asset('assets/images/home-1/project-8.jpg') }}" class="object-cover object-center rounded-2xl" alt="" />
              <div class="project-inner">
                <div class="size-[60px] bg-secondary rounded-full f-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M168,76a12,12,0,1,1-12-12A12,12,0,0,1,168,76Zm42,79.08c-15.08,20.84-37.53,34.88-66.7,41.74-20.08,4.72-43.54,6-70.12,3.93q2.4,17.82,6.72,37.54a8,8,0,0,1-6.1,9.52,7.81,7.81,0,0,1-1.72.19,8,8,0,0,1-7.81-6.29q-4.89-22.36-7.41-42.62-20.22-2.51-42.58-7.41a8,8,0,0,1,3.43-15.63q19.7,4.32,37.5,6.73c-2.09-26.56-.78-50,3.93-70.06C66,83.55,80.05,61.1,100.88,46,115,35.76,140.15,23.64,179.27,24c21.19.21,40.83,4.33,43.81,6.08a8,8,0,0,1,2.83,2.83c1.75,3,5.87,22.59,6.08,43.78C232.21,98.31,228.57,129.44,210,155.08Zm-23.76,2.8A112.07,112.07,0,0,1,98.12,69.74C75.64,94,66.7,132.47,71.36,184.6,123.51,189.28,162,180.35,186.25,157.88ZM212.44,43.56a175.75,175.75,0,0,0-39.22-3.51c-24.34.64-44.71,6.49-60.76,17.39a96,96,0,0,0,86.09,86.1c10.91-16,16.76-36.42,17.4-60.76A175.82,175.82,0,0,0,212.44,43.56Z"
                    ></path>
                  </svg>
                </div>
                <a href="#" class="text-center">
                  <h6 class="text-secondary font-semibold mb-2">Cage Aquaculture Development</h6>
                  <h4 class="text-neutral-0 mb-2">Cage Culture Cluster Project (2019–24)</h4>
                  <p class="text-neutral-200 text-sm">Cost: Rs. 1474.867 Million</p>
                </a>
              </div>
            </div>
          </div>
          <div class="swiper-slide w-[280px] sm:w-[416px]">
            <div class="rounded-2xl">
              <img src="{{ asset('assets/images/home-1/project-4.webp') }}" class="object-cover object-center rounded-2xl" alt="" />
              <div class="project-inner">
                <div class="size-[60px] bg-secondary rounded-full f-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M168,76a12,12,0,1,1-12-12A12,12,0,0,1,168,76Zm42,79.08c-15.08,20.84-37.53,34.88-66.7,41.74-20.08,4.72-43.54,6-70.12,3.93q2.4,17.82,6.72,37.54a8,8,0,0,1-6.1,9.52,7.81,7.81,0,0,1-1.72.19,8,8,0,0,1-7.81-6.29q-4.89-22.36-7.41-42.62-20.22-2.51-42.58-7.41a8,8,0,0,1,3.43-15.63q19.7,4.32,37.5,6.73c-2.09-26.56-.78-50,3.93-70.06C66,83.55,80.05,61.1,100.88,46,115,35.76,140.15,23.64,179.27,24c21.19.21,40.83,4.33,43.81,6.08a8,8,0,0,1,2.83,2.83c1.75,3,5.87,22.59,6.08,43.78C232.21,98.31,228.57,129.44,210,155.08Zm-23.76,2.8A112.07,112.07,0,0,1,98.12,69.74C75.64,94,66.7,132.47,71.36,184.6,123.51,189.28,162,180.35,186.25,157.88ZM212.44,43.56a175.75,175.75,0,0,0-39.22-3.51c-24.34.64-44.71,6.49-60.76,17.39a96,96,0,0,0,86.09,86.1c10.91-16,16.76-36.42,17.4-60.76A175.82,175.82,0,0,0,212.44,43.56Z"
                    ></path>
                  </svg>
                </div>
                <a href="#" class="text-center">
                  <h6 class="text-secondary font-semibold mb-2">Fisheries Infrastructure Upgradation</h6>
                  <h4 class="text-neutral-0 mb-2">Chashma Fisheries Rehab – Site B (2021–24)</h4>
                  <p class="text-neutral-200 text-sm">Cost: Rs. 117.483 Million</p>
                </a>
              </div>
            </div>
          </div>
          <div class="swiper-slide w-[280px] sm:w-[416px]">
            <div class="rounded-2xl">
              <img src="{{ asset('assets/images/home-1/pro.jpg') }}" class="object-cover object-center rounded-2xl" alt="" />
              <div class="project-inner">
                <div class="size-[60px] bg-secondary rounded-full f-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M168,76a12,12,0,1,1-12-12A12,12,0,0,1,168,76Zm42,79.08c-15.08,20.84-37.53,34.88-66.7,41.74-20.08,4.72-43.54,6-70.12,3.93q2.4,17.82,6.72,37.54a8,8,0,0,1-6.1,9.52,7.81,7.81,0,0,1-1.72.19,8,8,0,0,1-7.81-6.29q-4.89-22.36-7.41-42.62-20.22-2.51-42.58-7.41a8,8,0,0,1,3.43-15.63q19.7,4.32,37.5,6.73c-2.09-26.56-.78-50,3.93-70.06C66,83.55,80.05,61.1,100.88,46,115,35.76,140.15,23.64,179.27,24c21.19.21,40.83,4.33,43.81,6.08a8,8,0,0,1,2.83,2.83c1.75,3,5.87,22.59,6.08,43.78C232.21,98.31,228.57,129.44,210,155.08Zm-23.76,2.8A112.07,112.07,0,0,1,98.12,69.74C75.64,94,66.7,132.47,71.36,184.6,123.51,189.28,162,180.35,186.25,157.88ZM212.44,43.56a175.75,175.75,0,0,0-39.22-3.51c-24.34.64-44.71,6.49-60.76,17.39a96,96,0,0,0,86.09,86.1c10.91-16,16.76-36.42,17.4-60.76A175.82,175.82,0,0,0,212.44,43.56Z"
                    ></path>
                  </svg>
                </div>
                <a href="#" class="text-center">
                  <h6 class="text-secondary font-semibold mb-2">Fisheries Promotion & Nutrition Awareness</h6>
                  <h4 class="text-neutral-0 mb-2">Fish Consumption Awareness Campaign (2021–24)</h4>
                  <p class="text-neutral-200 text-sm">Cost: Rs.70.163 Million</p>
                </a>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <div class="flex justify-center mt-10 xl:mt-14">
        <a href="#" class="btn-secondary">
          View All
          <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg>
        </a>
      </div>
    </section>
    <!-- projects section end -->

    <!-- process section start -->
    <section class="bg-primary-50 relative pt-120">
      <div class="cont">
        <div class="grid grid-cols-12 gap-4 mb-10 xl:mb-14">
          <div class="col-span-12 md:col-span-6 lg:col-span-5">
            <p class="sub-heading blur_anim">Our Process</p>
            <h2 class="scale_anim">Our Process for Quality Seafood</h2>
          </div>
          <div class="col-span-12 md:col-span-6 lg:col-span-5 lg:col-start-8 flex items-end">
            <p class="reveal_anim">Step-by-step process ensuring fresh, sustainable seafood from farm to table efficiently.</p>
          </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 xl:gap-6 text-center">
          <div class="fade_anim bg-neutral-0 rounded-3xl shadow-[0px_6px_12px_-2px_rgba(88,82,129,0.08)] p-4 md:p-6 xl:py-8 xl:px-7 flex flex-col items-center">
            <div class="size-[200px] rounded-full bg-neutral-0 border border-neutral-30 f-center relative mb-5 xl:mb-8">
              <div class="w-10 h-14 z-[1] rounded-b-full bg-gradient-to-t from-primary-300 to-transparent absolute top-0 left-1/2 -translate-x-1/2"></div>
              <div class="size-[160px] rounded-full bg-primary-50 f-center relative">
                <span class="absolute top-0 left-1/2 z-[2] -translate-x-1/2 size-8 f-center rounded-full bg-secondary text-neutral-900 text-sm">01</span>
                <img src="{{ asset('assets/images/home-1/process-1.png') }}" alt="" />
              </div>
            </div>
            <h4 class="mb-4">Fresh Farming</h4>
            <p>Experience the purity of nature with sustainable</p>
          </div>
          <div data-delay=".2" class="fade_anim bg-neutral-0 rounded-3xl shadow-[0px_6px_12px_-2px_rgba(88,82,129,0.08)] p-4 md:p-6 xl:py-8 xl:px-7 flex flex-col items-center">
            <div class="size-[200px] rounded-full bg-neutral-0 border border-neutral-30 f-center relative mb-5 xl:mb-8">
              <div class="w-10 h-14 z-[1] rounded-b-full bg-gradient-to-t from-primary-300 to-transparent absolute top-0 left-1/2 -translate-x-1/2"></div>
              <div class="size-[160px] rounded-full bg-primary-50 f-center relative">
                <span class="absolute top-0 left-1/2 z-[2] -translate-x-1/2 size-8 f-center rounded-full bg-secondary text-neutral-900 text-sm">02</span>
                <img src="{{ asset('assets/images/home-1/process-2.png') }}" alt="" />
              </div>
            </div>

            <h4 class="mb-4">Quality Monitoring</h4>
            <p>Experience the purity of nature with sustainable</p>
          </div>
          <div data-delay=".4" class="fade_anim bg-neutral-0 rounded-3xl shadow-[0px_6px_12px_-2px_rgba(88,82,129,0.08)] p-4 md:p-6 xl:py-8 xl:px-7 flex flex-col items-center">
            <div class="size-[200px] rounded-full bg-neutral-0 border border-neutral-30 f-center relative mb-5 xl:mb-8">
              <div class="w-10 h-14 z-[1] rounded-b-full bg-gradient-to-t from-primary-300 to-transparent absolute top-0 left-1/2 -translate-x-1/2"></div>
              <div class="size-[160px] rounded-full bg-primary-50 f-center relative">
                <span class="absolute top-0 left-1/2 z-[2] -translate-x-1/2 size-8 f-center rounded-full bg-secondary text-neutral-900 text-sm">03</span>
                <img src="{{ asset('assets/images/home-1/process-3.png') }}" alt="" />
              </div>
            </div>
            <h4 class="mb-4">Efficient Harvesting</h4>
            <p>Experience the purity of nature with sustainable</p>
          </div>
          <div data-delay=".6" class="fade_anim bg-neutral-0 rounded-3xl shadow-[0px_6px_12px_-2px_rgba(88,82,129,0.08)] p-4 md:p-6 xl:py-8 xl:px-7 flex flex-col items-center">
            <div class="size-[200px] rounded-full bg-neutral-0 border border-neutral-30 f-center relative mb-5 xl:mb-8">
              <div class="w-10 h-14 z-[1] rounded-b-full bg-gradient-to-t from-primary-300 to-transparent absolute top-0 left-1/2 -translate-x-1/2"></div>
              <div class="size-[160px] rounded-full bg-primary-50 f-center relative">
                <span class="absolute top-0 left-1/2 z-[2] -translate-x-1/2 size-8 f-center rounded-full bg-secondary text-neutral-900 text-sm">04</span>
                <img src="{{ asset('assets/images/home-1/process-4.png') }}" alt="" />
              </div>
            </div>
            <h4 class="mb-4">Timely Delivery</h4>
            <p>Experience the purity of nature with sustainable</p>
          </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 xl:translate-y-1/2 relative z-[1] max-xl:py-14">
          <div class="reveal_anim p-3 xl:p-4 rounded-3xl bg-neutral-0 flex flex-col sm:flex-row items-center gap-4 shadow-[0px_4px_24px_0px_rgba(0,0,0,0.06)]">
            <img src="{{ asset('assets/images/home-1/process-card-1.webp') }}" class="rounded-xl max-sm:w-full" alt="" />
            <div class="flex flex-col justify-between h-full">
              <div>
                <h4 class="mb-4">Global Trade Opportunities</h4>
                <p>Expanding markets, premium seafood, and sustainable practices driving global export growth.</p>
              </div>
              <a href="#" class="text-primary-500 uppercase underline">View More</a>
            </div>
          </div>
          <div data-reveal-from="right" class="reveal_anim p-3 xl:p-4 rounded-3xl bg-neutral-0 flex flex-col sm:flex-row items-center gap-4 shadow-[0px_4px_24px_0px_rgba(0,0,0,0.06)]">
            <img src="{{ asset('assets/images/home-1/process-card-2.webp') }}" class="rounded-xl max-sm:w-full" alt="" />
            <div class="flex flex-col justify-between h-full">
              <div>
                <h4 class="mb-4">What's Coming Up Next?</h4>
                <p>Stay tuned for groundbreaking innovations and exciting updates in sustainable aquaculture!</p>
              </div>
              <a href="#" class="text-primary-500 uppercase underline">View More</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- process section end -->

    <!-- team section start -->
    <section class="bg-neutral-0 pb-120 pt-14 xl:pt-56">
      <div class="cont grid grid-cols-12 gap-6 items-center">
        <div class="col-span-12 md:col-span-6 lg:col-span-5">
          <p class="sub-heading split_anim">Our Team</p>
          <h2 class="mb-6 blur_anim">Meet Our Expert Team</h2>
          <p class="reveal_anim mb-5 xl:mb-8">Providing sustainable fish farming solutions with expert care for quality seafood supply.</p>
          <a href="#" class="btn-secondary"
            >View All <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg
          ></a>
        </div>
        <div class="col-span-12 md:col-span-6 lg:col-start-7 relative">
          <div class="swiper team1Slider">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <a href="#" class="text-center">
                  <img src="{{ asset('assets/images/home-1/muddassir-riaz-malik.jpeg') }}" class="rounded-xl w-full mb-6" alt="" />
                  <p class="text-xl font-semibold text-neutral-900 mb-2">
                    Mr. Muddassir Riaz Malik</p>
                  <p>assumed the charge of Secretary Forest, Wildlife & Fisheries Department on 05th May 2025.</p>
                </a>
              </div>
              <div class="swiper-slide">
                <a href="#" class="text-center">
                  <img src="{{ asset('assets/images/home-1/dg-fisher-muhammad-saleem-afzal.jpg') }}" class="rounded-xl w-full mb-6" alt="" />
                  <p class="text-xl font-semibold text-neutral-900 mb-2">Mr. Muhammad Saleem Afzal</p>
                  <p>assumed the charge of Director General Fisheries, Punjab, Lahore, on 05th  May 2025</p>
                </a>
              </div>
          
           
            </div>
          </div>
          <button aria-label="show prev slide" class="prev-team bg-neutral-0 border-neutral-0 hover:border-primary-300 navigation-btn absolute top-[40%] z-[1] -translate-y-1/2 left-0 lg:-translate-x-1/2">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256"><path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z"></path></svg>
          </button>
          <button aria-label="show next slide" class="next-team bg-neutral-0 border-neutral-0 hover:border-primary-300 navigation-btn absolute top-[40%] z-[1] -translate-y-1/2 right-0 lg:translate-x-1/2">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256"><path d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"></path></svg>
          </button>
        </div>
      </div>
    </section>
    <!-- team section end -->

    <!-- Counter section start -->
    <section class="py-120 bg-neutral-900 relative overflow-x-hidden">
      <img src="{{ asset('assets/images/home-1/counter-fish.png') }}" class="max-xl:hidden fish fish-right absolute right-3 bottom-6" alt="" />
      <div class="cont grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
        <div class="max-w-[250px]">
          <div class="relative">
            <span class="odometer-text"><span data-end-value="60" class="counter">60</span>+</span>
            <p class="font-medium text-base py-1 px-4 absolute text-neutral-0 right-5 top-1/2 -translate-y-1/2 bg-neutral-900 rounded-lg">+ Acres Cultivated</p>
          </div>
          <p class="text-neutral-0">At Pure Agriculture &amp; Organic Farm, we blend tradition</p>
        </div>
        <div class="max-w-[250px]" data-delay=".2">
          <div class="relative">
            <span class="odometer-text"><span data-end-value="50" class="counter">50</span>+</span>
            <p class="font-medium text-base py-1 px-4 absolute text-neutral-0 right-5 top-1/2 -translate-y-1/2 bg-neutral-900 rounded-lg">+ Products</p>
          </div>
          <p class="text-neutral-0">At Pure Agriculture &amp; Organic Farm, we blend tradition</p>
        </div>
        <div class="max-w-[250px]" data-delay=".4">
          <div class="relative">
            <span class="odometer-text"><span data-end-value="27" class="counter">27</span>+</span>
            <p class="font-medium text-base py-1 px-4 absolute text-neutral-0 right-5 top-1/2 -translate-y-1/2 bg-neutral-900 rounded-lg">+ Years</p>
          </div>
          <p class="text-neutral-0">At Pure Agriculture &amp; Organic Farm, we blend tradition</p>
        </div>
        <div class="max-w-[280px]" data-delay=".6">
          <div class="relative">
            <span class="odometer-text"><span data-end-value="300" class="counter">300</span>+</span>
            <p class="font-medium text-base py-1 px-4 absolute text-neutral-0 right-5 top-1/2 -translate-y-1/2 bg-neutral-900 rounded-lg">+ Happy Customers</p>
          </div>
          <p class="text-neutral-0">Satisfied customers enjoying fresh, organic produce every day!</p>
        </div>
      </div>
    </section>
    <!-- Counter section end -->

    <!-- news section start -->
    <section class="bg-neutral-0 py-120 relative overflow-hidden">
      <img src="{{ asset('assets/images/home-1/blog-el-1.png') }}" class="max-xxl:hidden absolute fish fish-top top-[-200px] left-0" alt="" />
      <img src="{{ asset('assets/images/home-1/blog-el-2.png') }}" class="max-xxl:hidden absolute top-1/2 -translate-y-1/2 right-0" alt="" />
      <div class="cont relative z-[2]">
        <div class="flex justify-between items-center flex-wrap gap-4 mb-10 xl:mb-14">
          <div>
            <p class="sub-heading blur_anim">Blogs & News</p>
            <h2 class="split_anim">News & Article</h2>
          </div>
          <a href="#" class="btn-secondary"
            >View All <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg
          ></a>
        </div>
        <div class="grid grid-cols-12 gap-4 xl:gap-6">
          <div class="col-span-12 md:col-span-5 xxl:col-span-6 p-4 lg:p-5 xl:p-6 rounded-xl bg-neutral-0 border border-neutral-40">
            <a href="#" aria-label="Read News">
              <img src="{{ asset('assets/images/home-1/shrimp-1.jpg') }}" class="rounded-xl w-full mb-5" alt="" />
            </a>
            <div class="mb-5 flex justify-between items-center">
              <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary-300" fill="currentColor" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
                <span>Admin</span>
              </div>
              <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary-300" fill="currentColor" viewBox="0 0 256 256"><path d="M168,112a8,8,0,0,1-8,8H96a8,8,0,0,1,0-16h64A8,8,0,0,1,168,112Zm-8,24H96a8,8,0,0,0,0,16h64a8,8,0,0,0,0-16Zm72-8A104,104,0,0,1,79.12,219.82L45.07,231.17a16,16,0,0,1-20.24-20.24l11.35-34.05A104,104,0,1,1,232,128Zm-16,0A88,88,0,1,0,51.81,172.06a8,8,0,0,1,.66,6.54L40,216,77.4,203.53a7.85,7.85,0,0,1,2.53-.42,8,8,0,0,1,4,1.08A88,88,0,0,0,216,128Z"></path></svg>
                <span>02 Comments</span>
              </div>
            </div>
            <h3 class="mb-4">Innovations in Sustainable Aquaculture Practices</h3>
            <p class="mb-5 xl:mb-8 lg:text-lg">Shrimps are small, aquatic crustaceans found in both freshwater and marine environments. Rich in protein and low in fat, they are a popular seafood choice worldwide.</p>
            <a href="#" class="text-primary-300 text-lg font-medium underline">View Details</a>
          </div>
          <div class="col-span-12 md:col-span-7 xxl:col-span-6 space-y-4 xl:space-y-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center p-3 lg:p-4 rounded-xl bg-neutral-0 border border-neutral-40">
              <a href="#" aria-label="Read News">
                <img src="{{ asset('assets/images/home-1/shrimp-2.jpg') }}" class="rounded-xl xl:min-w-[264px] max-sm:w-full shrink-0" alt="" />
                <div>
                  <div class="mb-5 flex justify-between items-center">
                    <div class="flex items-center gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary-300" fill="currentColor" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
                      <span>Admin</span>
                    </div>
                    <div class="flex items-center gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary-300" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M168,112a8,8,0,0,1-8,8H96a8,8,0,0,1,0-16h64A8,8,0,0,1,168,112Zm-8,24H96a8,8,0,0,0,0,16h64a8,8,0,0,0,0-16Zm72-8A104,104,0,0,1,79.12,219.82L45.07,231.17a16,16,0,0,1-20.24-20.24l11.35-34.05A104,104,0,1,1,232,128Zm-16,0A88,88,0,1,0,51.81,172.06a8,8,0,0,1,.66,6.54L40,216,77.4,203.53a7.85,7.85,0,0,1,2.53-.42,8,8,0,0,1,4,1.08A88,88,0,0,0,216,128Z"></path>
                      </svg>
                      <span>02 Comments</span>
                    </div>
                  </div>
                  <h4 class="mb-4">The Future of Shrimp Farming</h4>
                  <p class="mb-5 xl:mb-8 lg:text-lg">The future of shrimp farming is promising, driven by rising global demand, technological advancements, and sustainable practices.</p>
                  <a href="#" class="text-primary-300 text-lg font-medium underline">View Details</a>
                </div>
              </a>
            </div>
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center p-3 lg:p-4 rounded-xl bg-neutral-0 border border-neutral-40">
              <a href="#" aria-label="Read News">
                <img src="{{ asset('assets/images/home-1/shrimp-3.jpg') }}" class="rounded-xl xl:min-w-[264px] max-sm:w-full shrink-0" alt="" />
                <div>
                  <div class="mb-5 flex justify-between items-center">
                    <div class="flex items-center gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary-300" fill="currentColor" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
                      <span>Admin</span>
                    </div>
                    <div class="flex items-center gap-2">
                      <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary-300" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M168,112a8,8,0,0,1-8,8H96a8,8,0,0,1,0-16h64A8,8,0,0,1,168,112Zm-8,24H96a8,8,0,0,0,0,16h64a8,8,0,0,0,0-16Zm72-8A104,104,0,0,1,79.12,219.82L45.07,231.17a16,16,0,0,1-20.24-20.24l11.35-34.05A104,104,0,1,1,232,128Zm-16,0A88,88,0,1,0,51.81,172.06a8,8,0,0,1,.66,6.54L40,216,77.4,203.53a7.85,7.85,0,0,1,2.53-.42,8,8,0,0,1,4,1.08A88,88,0,0,0,216,128Z"></path>
                      </svg>
                      <span>02 Comments</span>
                    </div>
                  </div>
                  <h4 class="mb-4">Enhancing Shrimp health using technology.</h4>
                  <p class="mb-5 xl:mb-8 lg:text-lg">AI-driven disease prediction, and biosecure farming systems to reduce stress, prevent outbreaks, and improve overall shrimp survival rates.</p>
                  <a href="#" class="text-primary-300 text-lg font-medium underline">View Details</a>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- news section end -->

    <!-- Tenders section start -->
    <section class="bg-primary-50 relative py-120 overflow-x-hidden">
      <img src="{{ asset('assets/images/home-1/testimonial-el.png') }}" class="absolute max-xxl:hidden left-0 top-0" alt="" />
      <img src="{{ asset('assets/images/home-1/testimonial-fish.png') }}" class="absolute fish fish-right max-xl:hidden right-5 bottom-5" alt="" />
      <div class="mx-auto text-center mb-10 xl:mb-14">
        <p class="sub-heading blur_anim mx-auto">Tenders</p>
        <h2 class="split_anim">Latest Tender Notices</h2>
      </div>
      <div class="cont">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 xl:gap-8">
          <!-- Tender 1 -->
          <div class="bg-neutral-0 rounded-2xl p-6 xl:p-8 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="flex items-center gap-3 mb-4">
              <div class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
              <span class="text-sm font-semibold text-red-600">New</span>
            </div>
            <h3 class="text-lg xl:text-xl font-bold mb-3 text-neutral-900">Shrimp Seed PL-10 Procurement</h3>
            <p class="text-neutral-600 mb-4">Procurement of Shrimp Seed PL-10 Panaeus monodon (Tiger Prawn) for aquaculture development project.</p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-neutral-500">Deadline: 15 Jan 2025</span>
              <a href="http://punjabfisheries.gov.pk/tenders/tender%5Fnotice%5F2025005151224.pdf" target="_blank" class="btn-primary text-sm px-4 py-2">View Details</a>
            </div>
          </div>

          <!-- Tender 2 -->
          <div class="bg-neutral-0 rounded-2xl p-6 xl:p-8 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="flex items-center gap-3 mb-4">
              <div class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
              <span class="text-sm font-semibold text-red-600">New</span>
            </div>
            <h3 class="text-lg xl:text-xl font-bold mb-3 text-neutral-900">Pre-Qualification for Shrimp Seed Supply</h3>
            <p class="text-neutral-600 mb-4">Pre-Qualification of suppliers/firms for supply of shrimp seed (PL-10) Litopenaenus Vannamei to shrimp farmers.</p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-neutral-500">Deadline: 18 Apr 2025</span>
              <a href="http://punjabfisheries.gov.pk/tenders/tender%5Fnotice%5F20250418.pdf" target="_blank" class="btn-primary text-sm px-4 py-2">View Details</a>
            </div>
          </div>

          <!-- Tender 3 -->
          <div class="bg-neutral-0 rounded-2xl p-6 xl:p-8 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="flex items-center gap-3 mb-4">
              <div class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
              <span class="text-sm font-semibold text-red-600">New</span>
            </div>
            <h3 class="text-lg xl:text-xl font-bold mb-3 text-neutral-900">Aquaculture Development Project</h3>
            <p class="text-neutral-600 mb-4">Tender Notice for the Procurement of Various Items under development project "Aquaculture: Shrimp Farming in Punjab".</p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-neutral-500">Deadline: 11 Mar 2025</span>
              <a href="http://punjabfisheries.gov.pk/tenders/tender%5Fnotice%5F20250311.pdf" target="_blank" class="btn-primary text-sm px-4 py-2">View Details</a>
            </div>
          </div>

          <!-- Tender 4 -->
          <div class="bg-neutral-0 rounded-2xl p-6 xl:p-8 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="flex items-center gap-3 mb-4">
              <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
              <span class="text-sm font-semibold text-orange-600">Active</span>
            </div>
            <h3 class="text-lg xl:text-xl font-bold mb-3 text-neutral-900">Various Items Procurement</h3>
            <p class="text-neutral-600 mb-4">Tender Notice for the Procurement of Various Items for fisheries development and aquaculture projects.</p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-neutral-500">Deadline: 18 Jan 2025</span>
              <a href="http://punjabfisheries.gov.pk/tenders/tender-notice-20250118-WA0092.pdf" target="_blank" class="btn-primary text-sm px-4 py-2">View Details</a>
            </div>
          </div>

          <!-- Tender 5 -->
          <div class="bg-neutral-0 rounded-2xl p-6 xl:p-8 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="flex items-center gap-3 mb-4">
              <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
              <span class="text-sm font-semibold text-orange-600">Active</span>
            </div>
            <h3 class="text-lg xl:text-xl font-bold mb-3 text-neutral-900">Pangasius Project Items</h3>
            <p class="text-neutral-600 mb-4">Tender Notice for the Procurement of Various Items for Pangasius farming and development projects.</p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-neutral-500">Deadline: 12 Dec 2024</span>
              <a href="http://punjabfisheries.gov.pk/tenders/Tender-Notice-for-Various-Items-Pangasius121220241055.pdf" target="_blank" class="btn-primary text-sm px-4 py-2">View Details</a>
            </div>
          </div>

          <!-- Tender 6 -->
          <div class="bg-neutral-0 rounded-2xl p-6 xl:p-8 shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="flex items-center gap-3 mb-4">
              <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
              <span class="text-sm font-semibold text-orange-600">Active</span>
            </div>
            <h3 class="text-lg xl:text-xl font-bold mb-3 text-neutral-900">Shrimp Farming Equipment</h3>
            <p class="text-neutral-600 mb-4">Tender Notice for the Procurement of Various Items for shrimp farming operations and equipment.</p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-neutral-500">Deadline: 18 Oct 2024</span>
              <a href="http://punjabfisheries.gov.pk/tenders/Tender%5FNotice%5F18-10-2024-shrimp.pdf" target="_blank" class="btn-primary text-sm px-4 py-2">View Details</a>
            </div>
          </div>

          
        
        <div class="text-center mt-10 xl:mt-14">
          <a href="http://punjabfisheries.gov.pk/tenders/tender-notice.html" target="_blank" class="btn-secondary">
            View All Tenders <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg>
          </a>
        </div>
      </div>
    </section>
    <!-- Tenders section end -->

    <!-- Announcements section start -->
    <section class="bg-neutral-0 py-120 relative overflow-hidden">
      <div class="cont relative z-[2]">
        <div class="flex justify-between items-center flex-wrap gap-4 mb-10 xl:mb-14">
          <div>
            <p class="sub-heading blur_anim">Announcements</p>
            <h2 class="split_anim">Latest Announcements</h2>
          </div>
          <a href="{{ route('frontend.announcements') }}" class="btn-secondary"
            >View All <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg
          ></a>
        </div>
        
        @if($featuredAnnouncements->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 xl:gap-8 mb-10">
          @foreach($featuredAnnouncements->take(3) as $announcement)
          <div class="bg-neutral-0 rounded-2xl p-6 xl:p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-neutral-40">
            <div class="flex items-center gap-3 mb-4">
              <div class="w-3 h-3 bg-primary-500 rounded-full"></div>
              <span class="text-sm font-semibold text-primary-600 uppercase">{{ ucfirst($announcement->type) }}</span>
              @if($announcement->priority === 'high')
              <span class="text-xs bg-red-100 text-red-600 px-2 py-1 rounded-full">High Priority</span>
              @endif
            </div>
            <h3 class="text-lg xl:text-xl font-bold mb-3 text-neutral-900 line-clamp-2">{{ $announcement->title }}</h3>
            <p class="text-neutral-600 mb-4 line-clamp-3">{{ Str::limit($announcement->description, 120) }}</p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-neutral-500">{{ $announcement->published_date->format('M d, Y') }}</span>
              <a href="{{ route('frontend.announcements.show', $announcement) }}" class="btn-primary text-sm px-4 py-2">Read More</a>
            </div>
          </div>
          @endforeach
        </div>
        @endif

        @if($latestAnnouncements->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 xl:gap-8">
          @foreach($latestAnnouncements->take(6) as $announcement)
          <div class="bg-neutral-0 rounded-2xl p-6 xl:p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-neutral-40">
            <div class="flex items-center gap-3 mb-4">
              <div class="w-3 h-3 bg-{{ $announcement->priority === 'high' ? 'red' : ($announcement->priority === 'normal' ? 'primary' : 'blue') }}-500 rounded-full"></div>
              <span class="text-sm font-semibold text-{{ $announcement->priority === 'high' ? 'red' : ($announcement->priority === 'normal' ? 'primary' : 'blue') }}-600 uppercase">{{ ucfirst($announcement->type) }}</span>
            </div>
            <h3 class="text-lg xl:text-xl font-bold mb-3 text-neutral-900 line-clamp-2">{{ $announcement->title }}</h3>
            <p class="text-neutral-600 mb-4 line-clamp-3">{{ Str::limit($announcement->description, 100) }}</p>
            <div class="flex items-center justify-between">
              <span class="text-sm text-neutral-500">{{ $announcement->published_date->format('M d, Y') }}</span>
              <a href="{{ route('frontend.announcements.show', $announcement) }}" class="text-primary-500 text-sm font-medium hover:text-primary-600">Read More →</a>
            </div>
          </div>
          @endforeach
        </div>
        @endif

        @if($featuredAnnouncements->count() === 0 && $latestAnnouncements->count() === 0)
        <div class="text-center py-12">
          <div class="w-16 h-16 bg-neutral-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-neutral-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
          </div>
          <h3 class="text-lg font-semibold text-neutral-900 mb-2">No Announcements Available</h3>
          <p class="text-neutral-600">Check back later for the latest announcements and updates.</p>
        </div>
        @endif
      </div>
    </section>
    <!-- Announcements section end -->

    <!-- Book Appointment section start -->
    <section class="py-120 bg-cover bg-no-repeat bg-neutral-900 relative after:inset-0 after:absolute after:size-full after:bg-neutral-900/60" data-bg="{{ asset('assets/images/home-1/booking-bg.webp') }}">
      <div class="cont grid grid-cols-12 gap-6 xl:gap-8 items-center relative z-[1]">
        <div class="col-span-12 lg:col-span-6 xl:col-span-5">
          <form class="reveal_anim p-4 md:p-6 xl:p-8 bg-neutral-0 rounded-2xl">
            <h2 class="mb-6 xl:mb-8 split_anim" data-delay=".5">Book An Appointment</h2>
            <div class="grid grid-cols-2 gap-4 xl:gap-6 mb-6 xl:mb-10">
              <input type="text" class="col-span-2 md:col-span-1 py-3 px-4 rounded-lg w-full border bg-neutral-10 border-neutral-40 focus:border-primary-300" placeholder="Full Name" />
              <input type="number" class="col-span-2 md:col-span-1 py-3 px-4 rounded-lg w-full border bg-neutral-10 border-neutral-40 focus:border-primary-300" placeholder="Phone Number" />
              <input type="email" class="col-span-2 py-3 px-4 rounded-lg w-full border bg-neutral-10 border-neutral-40 focus:border-primary-300" placeholder="Email" />
              <textarea class="col-span-2 py-3 px-4 rounded-lg w-full border bg-neutral-10 border-neutral-40 focus:border-primary-300" placeholder="Message..." rows="5"></textarea>
            </div>
            <button type="submit" class="btn-secondary">
              Submit <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg>
            </button>
          </form>
        </div>
        <div class="col-span-12 lg:col-span-6 xl:col-start-7">
          <p class="sub-heading split_anim">Fisheries Benefits</p>
          <h2 class="scale_anim text-neutral-0 mb-9 xl:mb-12">Why choose Department of Fisheries - Punjab?</h2>
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:gap-6">
            <div class="rounded-3xl bg-neutral-0 p-4 md:p-6 relative after:w-full after:h-[200px] after:absolute after:left-0 after:-top-[65%] after:bg-primary-300 after:rounded-b-[45%] overflow-hidden">
              <img src="{{ asset('assets/images/home-1/benefit-el-1.png') }}" class="absolute left-5 top-20" alt="" />
              <img src="{{ asset('assets/images/home-1/benefit-el-2.png') }}" class="absolute right-10 top-12" alt="" />
              <div class="flex flex-col items-center relative z-[1] text-center">
                <div class="size-[72px] f-center bg-neutral-0 rounded-full shadow-lg mb-4 xl:mb-6">
                  <img src="{{ asset('assets/images/home-1/benefit-icon-1.png') }}" alt="" />
                </div>
                <h5 class="mb-2">Quality organic Shrimp</h5>
                <p class="text-[13px]">Premium organic fish for exceptional quality.</p>
              </div>
            </div>
            <div class="rounded-3xl bg-neutral-0 p-4 md:p-6 relative after:w-full after:h-[200px] after:absolute after:left-0 after:-top-[65%] after:bg-primary-300 after:rounded-b-[45%] overflow-hidden">
              <img src="{{ asset('assets/images/home-1/benefit-el-1.png') }}" class="absolute left-5 top-20" alt="" />
              <img src="{{ asset('assets/images/home-1/benefit-el-2.png') }}" class="absolute right-10 top-12" alt="" />
              <div class="flex flex-col items-center relative z-[1] text-center">
                <div class="size-[72px] f-center bg-neutral-0 rounded-full shadow-lg mb-4 xl:mb-6">
                  <img src="{{ asset('assets/images/home-1/benefit-icon-2.png') }}" alt="" />
                </div>
                <h5 class="mb-2">100% satisfaction</h5>
                <p class="text-[13px]">Premium organic fish for exceptional quality.</p>
              </div>
            </div>
            <div class="rounded-3xl bg-neutral-0 p-4 md:p-6 relative after:w-full after:h-[200px] after:absolute after:left-0 after:-top-[65%] after:bg-primary-300 after:rounded-b-[45%] overflow-hidden">
              <img src="{{ asset('assets/images/home-1/benefit-el-1.png') }}" class="absolute left-5 top-20" alt="" />
              <img src="{{ asset('assets/images/home-1/benefit-el-2.png') }}" class="absolute right-10 top-12" alt="" />
              <div class="flex flex-col items-center relative z-[1] text-center">
                <div class="size-[72px] f-center bg-neutral-0 rounded-full shadow-lg mb-4 xl:mb-6">
                  <img src="{{ asset('assets/images/home-1/benefit-icon-3.png') }}" alt="" />
                </div>
                <h5 class="mb-2">Professional staff</h5>
                <p class="text-[13px]">Premium organic fish for exceptional quality.</p>
              </div>
            </div>
            <div class="rounded-3xl bg-neutral-0 p-4 md:p-6 relative after:w-full after:h-[200px] after:absolute after:left-0 after:-top-[65%] after:bg-primary-300 after:rounded-b-[45%] overflow-hidden">
              <img src="{{ asset('assets/images/home-1/benefit-el-1.png') }}" class="absolute left-5 top-20" alt="" />
              <img src="{{ asset('assets/images/home-1/benefit-el-2.png') }}" class="absolute right-10 top-12" alt="" />
              <div class="flex flex-col items-center relative z-[1] text-center">
                <div class="size-[72px] f-center bg-neutral-0 rounded-full shadow-lg mb-4 xl:mb-6">
                  <img src="{{ asset('assets/images/home-1/benefit-icon-1.png') }}" alt="" />
                </div>
                <h5 class="mb-2">Quality organic fish</h5>
                <p class="text-[13px]">Premium organic fish for exceptional quality.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Book Appointment section end -->

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
              <li><a href="3" class="link">About Us</a></li>
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
                    <path
                      d="M144.27,45.93a8,8,0,0,1,9.8-5.66,86.22,86.22,0,0,1,61.66,61.66,8,8,0,0,1-5.66,9.8A8.23,8.23,0,0,1,208,112a8,8,0,0,1-7.73-5.94,70.35,70.35,0,0,0-50.33-50.33A8,8,0,0,1,144.27,45.93Zm-2.33,41.8c13.79,3.68,22.65,12.54,26.33,26.33A8,8,0,0,0,176,120a8.23,8.23,0,0,0,2.07-.27,8,8,0,0,0,5.66-9.8c-5.12-19.16-18.5-32.54-37.66-37.66a8,8,0,1,0-4.13,15.46Zm81.94,95.35A56.26,56.26,0,0,1,168,232C88.6,232,24,167.4,24,88A56.26,56.26,0,0,1,72.92,32.12a16,16,0,0,1,16.62,9.52l21.12,47.15,0,.12A16,16,0,0,1,109.39,104c-.18.27-.37.52-.57.77L88,129.45c7.49,15.22,23.41,31,38.83,38.51l24.34-20.71a8.12,8.12,0,0,1,.75-.56,16,16,0,0,1,15.17-1.4l.13.06,47.11,21.11A16,16,0,0,1,223.88,183.08Zm-15.88-2s-.07,0-.11,0h0l-47-21.05-24.35,20.71a8.44,8.44,0,0,1-.74.56,16,16,0,0,1-15.75,1.14c-18.73-9.05-37.4-27.58-46.46-46.11a16,16,0,0,1,1-15.7,6.13,6.13,0,0,1,.57-.77L96,95.15l-21-47a.61.61,0,0,1,0-.12A40.2,40.2,0,0,0,40,88,128.14,128.14,0,0,0,168,216,40.21,40.21,0,0,0,208,181.07Z"
                    ></path>
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
    <!-- Cloudflare email decode script removed for local development --></body>

</html>
