<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline' https://fonts.googleapis.com https://fonts.gstatic.com https://cdn.plyr.io; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.plyr.io; font-src 'self' https://fonts.gstatic.com; img-src 'self' data: https:; connect-src 'self'; media-src 'self' https:; object-src 'none'; base-uri 'self'; form-action 'self';" />
  <title>@yield('title', 'Department of Fisheries - Punjab')</title>
  <link rel="shortcut icon" href="{{ asset('assets/images/fav.png') }}" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/glightbox.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
  @stack('styles')
  <script defer src="{{ asset('assets/js/app.min.js') }}"></script>
  @stack('head')
</head>
<body>
  {{-- Loader --}}
  <div class="screen_loader fixed inset-0 z-[101] grid place-content-center bg-neutral-0">
    <div class="w-10 h-10 border-4 border-t-primary-400 border-neutral-40 rounded-full animate-spin"></div>
  </div>

  @include('frontend.layouts.header')

  @yield('content')

  @include('frontend.layouts.footer')

  @stack('scripts')
</body>
</html>

