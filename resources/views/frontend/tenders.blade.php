<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline' https://fonts.googleapis.com https://fonts.gstatic.com https://cdn.plyr.io; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.plyr.io; font-src 'self' https://fonts.gstatic.com; img-src 'self' data: https:; connect-src 'self'; media-src 'self' https:; object-src 'none'; base-uri 'self'; form-action 'self';" />

  <title>Tenders - Department of Fisheries - Punjab</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('assets/images/fav.png') }}" type="image/x-icon" />

  <!-- Preconnect for Performance -->
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />

  <!-- Theme styles (AquaFishe build) -->
  <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/glightbox.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
  

  <!-- Theme scripts -->
  <script defer src="{{ asset('assets/js/app.min.js') }}"></script>
</head>

<body class="bg-neutral-0">
  <!-- Loader -->
  <div class="screen_loader fixed inset-0 z-[101] grid place-content-center bg-neutral-0">
    <div class="w-10 h-10 border-4 border-t-primary-400 border-neutral-40 rounded-full animate-spin"></div>
  </div>

  <!-- Mobile Menu -->
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

  <!-- Header -->
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

  <!-- Banner -->
  <section class="px-3">
    <div class="max-w-[1800px] mx-auto bg-primary-50 rounded-xl xl:rounded-2xl py-14 xl:py-28 flex justify-center text-center">
      <div class="relative z-[1]">
        <h2 class="mb-5">Tender Notices</h2>
        <div class="flex justify-center items-center gap-2">
          <a href="{{ url('/') }}">Home</a> &gt;
          <span class="text-primary-300">Tenders</span>
        </div>
      </div>
    </div>
  </section>


  <!-- Tenders -->
  <section class="bg-neutral-0 py-120">
    <div class="cont">
      @if($tenders->count() > 0)
        <!-- Results Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-10 xl:mb-14">
          <div>
            <p class="sub-heading blur_anim">Available Tenders</p>
            <h2 class="split_anim">Browse Tender Opportunities</h2>
            <p class="reveal_anim text-neutral-600 mt-4">Browse through our current tender opportunities</p>
          </div>
          <div class="mt-4 sm:mt-0">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-primary-100 text-primary-800">
              {{ $tenders->total() }} {{ $tenders->total() === 1 ? 'Tender' : 'Tenders' }} Found
            </span>
          </div>
        </div>


        <!-- Tenders Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 xl:gap-8">
          @foreach($tenders as $tender)
            <article class="bg-neutral-0 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-neutral-40 hover:border-primary-300 group flex flex-col h-full">
              <div class="p-6 xl:p-8 flex flex-col flex-grow">
                <!-- Header -->
                <div class="flex items-start justify-between mb-4">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $tender->status === 'active' ? 'bg-green-100 text-green-800' : ($tender->status === 'closed' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                    {{ ucfirst($tender->status) }}
                  </span>
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $tender->is_published ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                    {{ $tender->is_published ? 'Published' : 'Draft' }}
                  </span>
                </div>

                <!-- Title -->
                <h3 class="text-lg xl:text-xl font-bold text-neutral-900 mb-3 line-clamp-2 group-hover:text-primary-300 transition-colors duration-200 min-h-[3.5rem]">
                  {{ $tender->title }}
                </h3>

                <!-- Description -->
                <p class="text-neutral-600 mb-6 line-clamp-3 min-h-[4.5rem]">
                  {{ $tender->description }}
                </p>

                <!-- Details -->
                <div class="space-y-3 mb-6 flex-grow">
                  <!-- Deadline -->
                  <div class="flex items-center text-sm text-neutral-600">
                    <div class="w-6 h-6 bg-primary-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                      <svg class="w-3 h-3 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                      <span class="font-medium text-neutral-900">Deadline:</span>
                      <span class="ml-1">{{ $tender->formatted_deadline }}</span>
                    </div>
                  </div>

                  <!-- Days Remaining -->
                  <div class="flex items-center text-sm text-neutral-600">
                    <div class="w-6 h-6 bg-orange-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                      <svg class="w-3 h-3 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                      <span class="font-medium text-neutral-900">Days Remaining:</span>
                      <span class="ml-1 {{ $tender->days_until_deadline <= 7 ? 'text-red-600 font-semibold' : 'text-neutral-600' }}">
                        {{ $tender->days_until_deadline }} {{ $tender->days_until_deadline === 1 ? 'day' : 'days' }}
                      </span>
                    </div>
                  </div>
                </div>

                <!-- Footer -->
                <div class="pt-4 border-t border-neutral-100 mt-auto">
                  <div class="flex items-center justify-between mb-3">
                    <div class="text-sm text-neutral-500 font-medium">#{{ $tender->tender_number }}</div>
                    @if($tender->pdf_path || $tender->pdf_path_2)
                      <span class="text-xs text-blue-600 font-medium">Documents Available</span>
                    @else
                      <span class="text-xs text-neutral-400 italic">No documents available</span>
                    @endif
                  </div>
                  
                  <!-- Document Links -->
                  @if($tender->pdf_path || $tender->pdf_path_2)
                    <div class="flex gap-1">
                      @if($tender->pdf_path)
                        <a href="{{ route('frontend.tender.download', $tender->id) }}" 
                           class="btn-primary text-xs px-2 py-1 flex-1 text-center">
                          Tender Notice
                        </a>
                      @endif
                      
                      @if($tender->pdf_path_2)
                        <a href="{{ route('frontend.tender.download2', $tender->id) }}" 
                           class="btn-primary text-xs px-2 py-1 flex-1 text-center">
                          Bidding Document
                        </a>
                      @endif
                    </div>
                  @endif
                </div>
              </div>
            </article>
          @endforeach
        </div>

        <!-- Pagination -->
        @if($tenders->hasPages())
          <div class="mt-16 flex justify-center">
            <div class="bg-neutral-0 rounded-xl shadow-sm border border-neutral-40 p-4">
              {{ $tenders->appends(request()->query())->links() }}
            </div>
          </div>
        @endif
      @else
        <!-- Empty State -->
        <div class="text-center py-20">
          <div class="w-24 h-24 bg-neutral-100 rounded-full flex items-center justify-center mx-auto mb-8">
            <svg class="w-12 h-12 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
          </div>
          <h3 class="text-2xl font-bold text-neutral-900 mb-4">No Tenders Found</h3>
          <p class="text-lg text-neutral-600 mb-8 max-w-md mx-auto">
            There are currently no active tenders available. Please check back later.
          </p>
        </div>
      @endif
    </div>
  </section>
  <!-- /Tenders -->

  <!-- Contact -->
  <section id="contact" class="py-120 bg-neutral-0 relative">
    <div class="cont grid grid-cols-12 gap-6 items-center">
      <div class="col-span-12 md:col-span-5">
        <p class="sub-heading">Contact</p>
        <h2 class="mb-6 xl:mb-8">Department of Fisheries, Government of the Punjab</h2>

        <div class="space-y-4 xl:space-y-6 max-w-sm">
          <div class="flex items-start gap-3">
            <span class="f-center rounded-full shrink-0 bg-primary-50 size-10 xl:size-12 text-primary-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256">
                <path d="M128,64a40,40,0,1,0,40,40A40,40,0,0,0,128,64Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,128Zm0-112a88.1,88.1,0,0,0-88,88c0,31.4,14.51,64.68,42,96.25a254.19,254.19,0,0,0,41.45,38.3,8,8,0,0,0,9.18,0A254.19,254.19,0,0,0,174,200.25c27.45-31.57,42-64.85,42-96.25A88.1,88.1,0,0,0,128,16Zm0,206c-16.53-13-72-60.75-72-118a72,72,0,0,1,144,0C200,161.23,144.53,209,128,222Z"></path>
              </svg>
            </span>
            <p class="font-medium">9-A Bahawalpur Road, Chauburji, Lahore, Pakistan</p>
          </div>

          <div class="flex items-start gap-3">
            <span class="f-center rounded-full shrink-0 bg-primary-50 size-10 xl:size-12 text-primary-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256">
                <path d="M144.27,45.93a8,8,0,0,1,9.8-5.66,86.22,86.22,0,0,1,61.66,61.66,8,8,0,0,1-5.66,9.8A8.23,8.23,0,0,1,208,112a8,8,0,0,1-7.73-5.94,70.35,70.35,0,0,0-50.33-50.33A8,8,0,0,1,144.27,45.93Zm-2.33,41.8c13.79,3.68,22.65,12.54,26.33,26.33A8,8,0,0,0,176,120a8.23,8.23,0,0,0,2.07-.27,8,8,0,0,0,5.66-9.8c-5.12-19.16-18.5-32.54-37.66-37.66a8,8,0,1,0-4.13,15.46Zm81.94,95.35A56.26,56.26,0,0,1,168,232C88.6,232,24,167.4,24,88A56.26,56.26,0,0,1,72.92,32.12a16,16,0,0,1,16.62,9.52l21.12,47.15,0,.12A16,16,0,0,1,109.39,104c-.18.27-.37.52-.57.77L88,129.45c7.49,15.22,23.41,31,38.83,38.51l24.34-20.71a8.12,8.12,0,0,1,.75-.56,16,16,0,0,1,15.17-1.4l.13.06,47.11,21.11A16,16,0,0,1,223.88,183.08Zm-15.88-2s-.07,0-.11,0h0l-47-21.05-24.35,20.71a8.44,8.44,0,0,1-.74.56,16,16,0,0,1-15.75,1.14c-18.73-9.05-37.4-27.58-46.46-46.11a16,16,0,0,1,1-15.7,6.13,6.13,0,0,1,.57-.77L96,95.15l-21-47a.61.61,0,0,1,0-.12A40.2,40.2,0,0,0,40,88,128.14,128.14,0,0,0,168,216,40.21,40.21,0,0,0,208,181.07Z"></path>
              </svg>
            </span>
            <p class="font-medium">(042) 99212374–75</p>
          </div>

          <div class="flex items-start gap-3">
            <span class="f-center rounded-full shrink-0 bg-primary-50 size-10 xl:size-12 text-primary-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-5 xl:size-6" fill="currentColor" viewBox="0 0 256 256">
                <path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48ZM203.43,64,128,133.15,52.57,64ZM216,192H40V74.19l82.59,75.71a8,8,0,0,0,10.82,0L216,74.19V192Z"></path>
              </svg>
            </span>
            <p class="font-medium"><a href="mailto:fishdept@hotmail.com">fishdept@hotmail.com</a></p>
          </div>
        </div>
          </div>

      <div class="col-span-12 md:col-span-7 xxl:col-start-6 flex items-center">
        <iframe
          src="https://maps.google.com/maps?q=9-A%20Bahawalpur%20Road%20Chauburji%20Lahore%20Punjab%20Pakistan&t=&z=13&ie=UTF8&iwloc=&output=embed"
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

  <!-- Footer -->
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
