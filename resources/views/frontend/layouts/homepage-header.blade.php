{{-- Homepage Header --}}
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
    <a href="/" class="w-auto h-auto" aria-label="site logo">
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
      
      <!-- Mobile Menu Button -->
      <button aria-label="Menu Button" class="topbar-btn lg:!hidden menu-btn">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256"><path d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z"></path></svg>
      </button>
    </div>
  </div>
</header>
<!-- header section end -->
