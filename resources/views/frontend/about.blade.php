{{-- resources/views/about.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Department of Fisheries, Government of the Punjab — conservation, management and development of aquatic resources in Punjab." />
  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline' https://fonts.googleapis.com https://fonts.gstatic.com https://cdn.plyr.io; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.plyr.io; font-src 'self' https://fonts.gstatic.com; img-src 'self' data: https:; connect-src 'self'; media-src 'self' https:; object-src 'none'; base-uri 'self'; form-action 'self';" />
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/glightbox.css') }}" />
  <title>About — Department of Fisheries, Government of the Punjab</title>
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
        <li><a class="menu-link" href="{{ url('/about-us') }}">About</a></li>
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
        <li><a class="menu-link" href="{{ url('/contact-us') }}">Contact</a></li>
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
      <li><a href="{{ url('/about-us') }}" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">About</a></li>
      <li><a href="https://fisheries.punjab.gov.pk/soil_water_testing" target="_blank" rel="noopener" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">Soil & Water Testing</a></li>
      <li><a href="https://fisheries.punjab.gov.pk/angling_license" target="_blank" rel="noopener" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">Angling License</a></li>
      <li><a href="https://fisheries.punjab.gov.pk/projects" target="_blank" rel="noopener" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">Projects</a></li>
      <li><a href="https://fisheries.punjab.gov.pk/regional_offices" target="_blank" rel="noopener" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">Regional Offices</a></li>
      <li><a href="#contact" class="border border-neutral-40 flex rounded-md px-3 py-2.5 font-medium">Contact</a></li>
    </ul>
  </div>

  {{-- Banner --}}
  <section class="px-3">
    <div class="max-w-[1800px] mx-auto bg-primary-50 rounded-xl xl:rounded-2xl py-14 xl:py-28 flex justify-center text-center">
      <div class="relative z-[1]">
        <h2 class="mb-5">About the Department</h2>
        <div class="flex justify-center items-center gap-2">
          <a href="{{ url('/') }}">Home</a> &gt;
          <span class="text-primary-300">About</span>
        </div>
      </div>
    </div>
  </section>

  {{-- “Mission & Role” from official site --}}
  <section class="bg-neutral-0 relative py-120">
    <div class="cont grid grid-cols-12 gap-6">
      <div class="col-span-12 md:col-span-6">
        <p class="sub-heading">Mission</p>
        <h2>Conservation, Management & Development of Aquatic Resources</h2>
        <p class="mt-4 max-w-2xl">
          The Department of Fisheries, Government of the Punjab is responsible for conserving, managing and developing Punjab’s natural
          and farmed fisheries resources, ensuring quality protein for the public and sustainable growth of the sector.
        </p>
        <div class="mt-6 flex gap-3">
          <a href="https://www.punjabfisheries.gov.pk/" target="_blank" rel="noopener" class="btn-secondary">Directorate (punjabfisheries.gov.pk)</a>
          <a href="https://fisheries.punjab.gov.pk/overview" target="_blank" rel="noopener" class="btn-primary">Department Overview</a>
        </div>
      </div>

      {{-- Quick Links to public services --}}
      <div class="col-span-12 md:col-span-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <a class="border border-neutral-40 rounded-xl p-5 hover:shadow-md transition" href="https://fisheries.punjab.gov.pk/soil_water_testing" target="_blank" rel="noopener">
            <h4 class="mb-2">Soil & Water Testing</h4>
            <p>Physico-chemical analysis for new/existing ponds in Punjab.</p>
          </a>
          <a class="border border-neutral-40 rounded-xl p-5 hover:shadow-md transition" href="https://fisheries.punjab.gov.pk/angling_license" target="_blank" rel="noopener">
            <h4 class="mb-2">Angling / Fishing Licenses</h4>
            <p>License types and fees for anglers & fishermen.</p>
          </a>
          <a class="border border-neutral-40 rounded-xl p-5 hover:shadow-md transition" href="https://fisheries.punjab.gov.pk/management-of-fisheries-resources" target="_blank" rel="noopener">
            <h4 class="mb-2">Management of Resources</h4>
            <p>Leasing of fishing rights, stock replenishment & more.</p>
          </a>
          <a class="border border-neutral-40 rounded-xl p-5 hover:shadow-md transition" href="https://fisheries.punjab.gov.pk/regional_offices" target="_blank" rel="noopener">
            <h4 class="mb-2">Regional & District Offices</h4>
            <p>Find your nearest Fisheries office across Punjab.</p>
          </a>
        </div>
      </div>
    </div>
  </section>

  {{-- Projects slider - official initiatives --}}
  <section class="bg-primary-50 relative py-120">
    <div class="cont">
      <div class="grid grid-cols-12 gap-4 mb-10 xl:mb-14">
        <div class="col-span-12 md:col-span-6 lg:col-span-5">
          <p class="sub-heading">Projects & Initiatives</p>
          <h2>Strengthening Punjab’s Fisheries</h2>
        </div>
        <div class="col-span-12 md:col-span-6 lg:col-span-5 lg:col-start-8 flex items-end">
          <div>
            <p class="mb-5 xl:mb-7">Recent projects include genetic improvement, shrimp cluster development and cage culture pilots.</p>
            <a href="https://fisheries.punjab.gov.pk/projects" target="_blank" rel="noopener" class="btn-secondary">View All Projects</a>
          </div>
        </div>
      </div>
    </div>

    <div class="swiper portfolioSlider2 max-lg:px-3">
      <div class="swiper-wrapper">
        <div class="swiper-slide max-w-[856px] xl:max-w-[1086px] grid grid-cols-1 sm:grid-cols-2 items-center border border-neutral-40 p-4 xl:p-6 rounded-2xl gap-6 xl:gap-10">
          <div class="f-center shrink-0 relative">
            <img src="{{ asset('assets/images/projects/genetic-improvement.jpg') }}" class="rounded-xl w-full" alt="Genetic Improvement of Culturable Fish Species" />
          </div>
          <div>
            <h4 class="mb-3 lg:mb-4">Genetic Improvement of Culturable Fish Species</h4>
            <p>2019–24 initiative to improve growth and productivity of key species across Punjab.</p>
            <a href="https://fisheries.punjab.gov.pk/projects" class="link" target="_blank" rel="noopener">Learn more</a>
          </div>
        </div>

        <div class="swiper-slide max-w-[856px] xl:max-w-[1086px] grid grid-cols-1 sm:grid-cols-2 items-center border border-neutral-40 p-4 xl:p-6 rounded-2xl gap-6 xl:gap-10">
          <div class="f-center shrink-0 relative">
            <img src="{{ asset('assets/images/projects/shrimp-cluster.jpg') }}" class="rounded-xl w-full" alt="Pilot Shrimp Farming Cluster" />
          </div>
          <div>
            <h4 class="mb-3 lg:mb-4">Pilot Shrimp Farming Cluster</h4>
            <p>Cluster development to expand brackish/saline aquaculture and value chains.</p>
            <a href="https://fisheries.punjab.gov.pk/shrimp_culture" class="link" target="_blank" rel="noopener">Shrimp culture</a>
          </div>
        </div>

        <div class="swiper-slide max-w-[856px] xl:max-w-[1086px] grid grid-cols-1 sm:grid-cols-2 items-center border border-neutral-40 p-4 xl:p-6 rounded-2xl gap-6 xl:gap-10">
          <div class="f-center shrink-0 relative">
            <img src="{{ asset('assets/images/projects/cage-culture.jpg') }}" class="rounded-xl w-full" alt="Cage Culture & Reservoir Fisheries" />
          </div>
          <div>
            <h4 class="mb-3 lg:mb-4">Cage Culture & Reservoir Fisheries</h4>
            <p>Scaling sustainable fish production in public waters through cage systems.</p>
            <a href="https://fisheries.punjab.gov.pk/projects" class="link" target="_blank" rel="noopener">Learn more</a>
          </div>
        </div>
      </div>
      <div class="portfolio-pagination mt-6 flex justify-center"></div>
    </div>
  </section>

  {{-- Key Functions --}}
  <section class="bg-neutral-0 relative py-120">
    <div class="cont">
      <div class="grid grid-cols-12 gap-4 mb-10 xl:mb-14">
        <div class="col-span-12 md:col-span-6">
          <p class="sub-heading">Key Functions</p>
          <h2>How the Department Serves Punjab</h2>
        </div>
        <div class="col-span-12 md:col-span-6 lg:col-span-5 lg:col-start-8">
          <p>Public water fisheries management, licensing, and stock enhancement across the province.</p>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 xl:gap-6">
        <div class="flex items-center gap-4 xl:gap-6">
          <span class="stroke-text">01</span>
          <div>
            <h4 class="mb-2">Lease of Fishing Rights</h4>
            <p>Transparent leasing of public waters for sustainable capture fisheries.</p>
          </div>
        </div>
        <div class="flex items-center gap-4 xl:gap-6">
          <span class="stroke-text">02</span>
          <div>
            <h4 class="mb-2">Stock Replenishment</h4>
            <p>Restocking of public waters to conserve biodiversity and maintain yields.</p>
          </div>
        </div>
        <div class="flex items-center gap-4 xl:gap-6">
          <span class="stroke-text">03</span>
          <div>
            <h4 class="mb-2">Licensing & Angling</h4>
            <p>Issuance of licenses to fishermen and anglers per applicable rules.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Skills / Capability (repurposed to Institutes) --}}
  <section class="bg-primary-50 py-120">
    <div class="cont grid grid-cols-12 gap-6 items-center">
      <div class="col-span-12 lg:col-span-5">
        <p class="sub-heading">Institutes & Capability</p>
        <h2 class="mb-6">Fisheries Research & Training, Extension & Lab Services</h2>
        <p class="mb-5 xl:mb-8">The Directorate leads research, training and extension to support aquaculture and inland fisheries development across Punjab.</p>
        <div class="flex gap-3">
          <a href="https://www.punjabfisheries.gov.pk/" target="_blank" rel="noopener" class="btn-secondary">Directorate Portal</a>
          <a href="https://fisheries.punjab.gov.pk/" target="_blank" rel="noopener" class="btn-primary">Department Portal</a>
        </div>
      </div>
      <div class="col-span-12 lg:col-span-7 xxl:col-span-6 xxl:col-start-7 flex flex-wrap justify-center items-center gap-6">
        <div class="size-[250px] xl:size-[306px] rounded-full f-center circular-progress" data-percentage="95" data-bg-color="#f5f5f5">
          <div class="absolute size-[235px] xl:size-[285px] rounded-full bg-neutral-0 inner-circle"></div>
          <div class="text-center z-[2]">
            <p class="relative mb-1 text-5xl xl:text-[64px] font-bold text-primary-500 percentage">0%</p>
            <span class="text-neutral-400">Water/Soil Labs</span>
          </div>
        </div>
        <div class="size-[250px] xl:size-[306px] rounded-full f-center circular-progress" data-percentage="90" data-bg-color="#f5f5f5">
          <div class="absolute size-[235px] xl:size-[285px] rounded-full bg-neutral-0 inner-circle"></div>
          <div class="text-center z-[2]">
            <p class="relative mb-1 text-5xl xl:text-[64px] font-bold text-primary-500 percentage">0%</p>
            <span class="text-neutral-400">Training & Extension</span>
          </div>
        </div>
      </div>
    </div>
  </section>

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
