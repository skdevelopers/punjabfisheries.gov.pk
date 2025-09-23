<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline' https://fonts.googleapis.com https://fonts.gstatic.com https://cdn.plyr.io; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.plyr.io; font-src 'self' https://fonts.gstatic.com; img-src 'self' data: https:; connect-src 'self'; media-src 'self' https:; object-src 'none'; base-uri 'self'; form-action 'self';" />

  <title>{{ $tender->title }} - Department of Fisheries - Punjab</title>

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

  @include('frontend.layouts.header')

  <!-- Page Header -->
  <section class="pt-32 pb-20 bg-primary-50">
    <div class="cont">
      <div class="text-center">
        <h1 class="text-4xl xl:text-5xl font-bold text-neutral-900 mb-4">{{ $tender->title }}</h1>
        <p class="text-lg text-neutral-600 max-w-2xl mx-auto">Tender Details from Department of Fisheries - Punjab</p>
      </div>
    </div>
  </section>

  <!-- Tender Details Section -->
  <section class="py-16 xl:py-20">
    <div class="cont">
      <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
          <!-- Tender Header -->
          <div class="bg-gradient-to-r from-primary-500 to-primary-600 p-8 text-white">
            <div class="flex items-start justify-between">
              <div class="flex-1">
                <h2 class="text-3xl font-bold mb-4">{{ $tender->title }}</h2>
                <div class="flex flex-wrap gap-4 text-sm">
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 256 256">
                      <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                    </svg>
                    <span>Tender No: {{ $tender->tender_number }}</span>
                  </div>
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 256 256">
                      <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                    </svg>
                    <span>Published: {{ $tender->published_at->format('M d, Y') }}</span>
                  </div>
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 256 256">
                      <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Z"></path>
                    </svg>
                    <span>Deadline: {{ $tender->deadline->format('M d, Y') }}</span>
                  </div>
                  @if($tender->estimated_value)
                    <div class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Z"></path>
                      </svg>
                      <span>Value: {{ $tender->estimated_value }}</span>
                    </div>
                  @endif
                </div>
              </div>
              <div class="ml-6">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                  @if($tender->status === 'active') bg-green-100 text-green-800
                  @elseif($tender->status === 'closed') bg-red-100 text-red-800
                  @elseif($tender->status === 'awarded') bg-blue-100 text-blue-800
                  @else bg-gray-100 text-gray-800
                  @endif">
                  {{ ucfirst($tender->status) }}
                </span>
                @if($tender->is_urgent)
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 mt-2">
                    URGENT
                  </span>
                @endif
              </div>
            </div>
          </div>

          <!-- Tender Content -->
          <div class="p-8">
            <div class="prose max-w-none">
              <h3 class="text-2xl font-semibold text-gray-900 mb-4">Tender Description</h3>
              <div class="text-gray-700 leading-relaxed mb-6">
                {!! nl2br(e($tender->description)) !!}
              </div>

              @if($tender->requirements)
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Requirements</h3>
                <div class="text-gray-700 leading-relaxed mb-6">
                  {!! nl2br(e($tender->requirements)) !!}
                </div>
              @endif

              @if($tender->terms_conditions)
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Terms & Conditions</h3>
                <div class="text-gray-700 leading-relaxed mb-6">
                  {!! nl2br(e($tender->terms_conditions)) !!}
                </div>
              @endif

              @if($tender->submission_guidelines)
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Submission Guidelines</h3>
                <div class="text-gray-700 leading-relaxed mb-6">
                  {!! nl2br(e($tender->submission_guidelines)) !!}
                </div>
              @endif
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 pt-8 border-t border-gray-200">
              <div class="flex flex-col sm:flex-row gap-4">
                @if($tender->pdf_path)
                  <a href="{{ Storage::url($tender->pdf_path) }}" 
                     target="_blank" 
                     class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 256 256">
                      <path d="M208,88H40a8,8,0,0,0,0,16H208a8,8,0,0,0,0-16Zm0,32H40a8,8,0,0,0,0,16H208a8,8,0,0,0,0-16Zm0,32H40a8,8,0,0,0,0,16H208a8,8,0,0,0,0-16Z"></path>
                    </svg>
                    Download Tender Document (PDF)
                  </a>
                @endif
                
                <a href="{{ route('frontend.tenders') }}" 
                   class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Z"></path>
                  </svg>
                  Back to All Tenders
                </a>
                
                <button onclick="window.print()" 
                        class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M200,64V40a16,16,0,0,0-16-16H72A16,16,0,0,0,56,40V64H40A16,16,0,0,0,24,80V200a16,16,0,0,0,16,16H56v16a16,16,0,0,0,16,16H184a16,16,0,0,0,16-16V216h16a16,16,0,0,0,16-16V80A16,16,0,0,0,200,64ZM72,40H184V64H72ZM184,216H72V160H184Zm32-32H200V80H216Z"></path>
                  </svg>
                  Print Tender
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
