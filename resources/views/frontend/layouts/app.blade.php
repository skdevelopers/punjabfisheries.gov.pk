<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ur' ? 'rtl' : 'ltr' }}">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline' https://fonts.googleapis.com https://fonts.gstatic.com https://cdn.plyr.io; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.plyr.io; font-src 'self' https://fonts.gstatic.com data:; img-src 'self' data: https:; connect-src 'self'; media-src 'self' https:; object-src 'none'; base-uri 'self'; form-action 'self';" />
  <title>@yield('title', 'Department of Fisheries - Punjab')</title>
  <link rel="shortcut icon" href="{{ asset('assets/images/fav.png') }}" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/glightbox.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
  
  <style>
    /* Global RTL overrides for Urdu */
    html[dir="rtl"] .uppercase { text-transform: none !important; }
    /* Ensure proper Urdu shaping and spacing for headings */
    html[dir="rtl"] .font-playfair { 
      font-family: 'Noto Nastaliq Urdu', 'Noto Naskh Arabic', 'Jameel Noori Nastaleeq', 'Tahoma', 'Arial', sans-serif !important;
    }
    html[dir="rtl"] h1, html[dir="rtl"] h2, html[dir="rtl"] h3, html[dir="rtl"] h4, html[dir="rtl"] h5, html[dir="rtl"] h6 {
      letter-spacing: normal !important;
      word-spacing: normal !important;
    }
  </style>

  @stack('styles')

  <script>
    // Remove character-splitting animation on RTL (Urdu) to preserve letter joining
    (function () {
      try {
        var isRTL = document.documentElement.getAttribute('dir') === 'rtl';
        if (isRTL) {
          var nodes = document.querySelectorAll('.split_anim');
          for (var i = 0; i < nodes.length; i++) {
            nodes[i].classList.remove('split_anim');
          }
        }
      } catch (e) { /* no-op */ }
    })();
  </script>

  <script defer src="{{ asset('assets/js/app.min.js') }}"></script>
  @stack('head')
</head>
<body>
  {{-- Loader --}}
  <div class="screen_loader fixed inset-0 z-[101] grid place-content-center bg-neutral-0">
    <div class="w-10 h-10 border-4 border-t-primary-400 border-neutral-40 rounded-full animate-spin"></div>
  </div>

  {{-- Conditional Header - Different header for homepage vs other pages --}}
  @if(request()->is('/'))
    {{-- Homepage Header (from index.blade.php) --}}
    @include('frontend.layouts.homepage-header')
  @else
    {{-- Regular Header for other pages --}}
    @include('frontend.layouts.header')
  @endif

  {{-- Support both @extends and component approaches --}}
  @hasSection('content')
    @yield('content')
  @else
    {{ $slot }}
  @endif

  @include('frontend.layouts.footer')

  @stack('scripts')
</body>
</html>

