<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Example Page - Department of Fisheries Punjab</title>
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <script defer src="assets/js/app.min.js"></script>
    <link href="assets/css/styles.css" rel="stylesheet">
</head>

<body>
    <!-- Loader -->
    <div class="screen_loader fixed inset-0 z-[101] grid place-content-center bg-neutral-0">
        <div class="w-10 h-10 border-4 border-t-primary-400 border-neutral-40 rounded-full animate-spin"></div>
    </div>

    <!-- Include Shared Header -->
    @include('frontend.layouts.header')

    <!-- Page Content -->
    <section class="py-16 xl:py-20">
        <div class="cont">
            <h1 class="text-4xl font-bold text-center mb-8">Example Page</h1>
            <p class="text-center text-gray-600">This is an example page showing how to use shared header and footer.</p>
        </div>
    </section>

    <!-- Include Shared Footer -->
    @include('frontend.layouts.footer')
</body>
</html>
