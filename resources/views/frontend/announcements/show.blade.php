@php
use Illuminate\Support\Facades\Storage;
@endphp

<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline' https://fonts.googleapis.com https://fonts.gstatic.com https://cdn.plyr.io; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.plyr.io; font-src 'self' https://fonts.gstatic.com; img-src 'self' data: https:; connect-src 'self'; media-src 'self' https:; object-src 'none'; base-uri 'self'; form-action 'self';" />

  
  <title>{{ $announcement->title }} - Department of Fisheries - Punjab</title>
  <meta name="description" content="{{ Str::limit($announcement->description, 160) }}">
    
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

    @include('frontend.layouts.header')

    <!-- Banner section start -->
    <section class="px-3">
      <div class="max-w-[1800px] mx-auto bg-primary-50 rounded-xl xl:rounded-2xl py-14 xl:py-28 flex justify-center text-center">
        <div class="relative z-[1]">
          <h1 class="text-4xl xl:text-5xl font-bold text-neutral-900 mb-6">{{ $announcement->title }}</h1>
          <p class="text-lg text-neutral-600 max-w-2xl mx-auto">Announcement from Department of Fisheries - Punjab</p>
        </div>
      </div>
    </section>
    <!-- Banner section end -->

    <!-- Announcement Details Section -->
    <section class="py-16 xl:py-20">
      <div class="cont">
        <div class="max-w-4xl mx-auto">
          <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Announcement Header -->
            <div class="bg-gradient-to-r from-primary-500 to-primary-600 p-8 text-white">
              <div class="flex items-start justify-between">
                <div class="flex-1">
                  <h2 class="text-3xl font-bold mb-4">{{ $announcement->title }}</h2>
                  <div class="flex flex-wrap gap-4 text-sm">
                    <div class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                      </svg>
                      <span>Published: {{ optional($announcement->published_date)->format('M d, Y') ?? $announcement->created_at->format('M d, Y') }}</span>
                    </div>
                    @if($announcement->updated_at != $announcement->created_at)
                      <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 256 256">
                          <path d="M205.66,61.66a8,8,0,0,1,0,11.32L139.31,139.31a8,8,0,0,1-11.32,0L50.34,61.66a8,8,0,0,1,11.32-11.32L128,120l66.34-69.66A8,8,0,0,1,205.66,61.66Z"></path>
                        </svg>
                        <span>Updated: {{ $announcement->updated_at->format('M d, Y') }}</span>
                      </div>
                    @endif
                  </div>
                </div>
                <div class="ml-6">
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                    @if($announcement->priority === 'high') bg-red-100 text-red-800
                    @elseif($announcement->priority === 'medium') bg-yellow-100 text-yellow-800
                    @else bg-green-100 text-green-800
                    @endif">
                    {{ ucfirst($announcement->priority) }} Priority
                  </span>
                  @if($announcement->is_pinned)
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 mt-2">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M235.33,139.31l-52-20a8,8,0,0,0-7.28.89L168,130.5V40a16,16,0,0,0-16-16H104A16,16,0,0,0,88,40v90.5L80,120.2a8,8,0,0,0-7.28-.89l-52,20A8,8,0,0,0,24,136v40a16,16,0,0,0,16,16H96a8,8,0,0,0,8-8V88h48v80a8,8,0,0,0,8,8h56a16,16,0,0,0,16-16V136A8,8,0,0,0,235.33,139.31Z"></path>
                      </svg>
                      Pinned
                    </span>
                  @endif
                </div>
              </div>
            </div>

            <!-- Featured Image -->
            @if($announcement->featured_image)
              <div class="aspect-w-16 aspect-h-9">
                <img src="{{ Storage::url($announcement->featured_image) }}" 
                     alt="{{ $announcement->title }}" 
                     class="w-full h-64 object-cover">
              </div>
            @endif

            <!-- Announcement Content -->
            <div class="p-8">
              <div class="prose max-w-none">
                @if($announcement->description)
                  <div class="text-lg text-gray-700 leading-relaxed mb-6">
                    {{ $announcement->description }}
                  </div>
                @endif

                <div class="text-gray-700 leading-relaxed">
                  {!! $announcement->content !!}
                </div>
              </div>

              <!-- Action Buttons -->
              <div class="mt-8 pt-8 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row gap-4">
                  <a href="{{ route('frontend.announcements') }}" 
                     class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 256 256">
                      <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Z"></path>
                    </svg>
                    Back to All Announcements
                  </a>
                  
                  <button onclick="window.print()" 
                          class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 256 256">
                      <path d="M200,64V40a16,16,0,0,0-16-16H72A16,16,0,0,0,56,40V64H40A16,16,0,0,0,24,80V200a16,16,0,0,0,16,16H56v16a16,16,0,0,0,16,16H184a16,16,0,0,0,16-16V216h16a16,16,0,0,0,16-16V80A16,16,0,0,0,200,64ZM72,40H184V64H72ZM184,216H72V160H184Zm32-32H200V80H216Z"></path>
                    </svg>
                    Print Announcement
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @include('frontend.layouts.footer')
</body>

</html>