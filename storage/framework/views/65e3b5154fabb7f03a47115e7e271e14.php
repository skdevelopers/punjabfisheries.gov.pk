<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="UTF-8">

    <link rel="icon" type="image/png" href="<?php echo e(asset('favicon.png')); ?>" />

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(config('app.name')); ?> <?php if(isset($title)): ?>
            - <?php echo e($title); ?>

        <?php endif; ?>
    </title>

    <!-- CSS & JS Assets -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <script>
        /**
         * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
         */
        localStorage.getItem("_x_darkMode_on") === "true" &&
            document.documentElement.classList.add("dark");
    </script>

    <?php if(isset($head)): ?>
        <?php echo e($head); ?>

    <?php endif; ?>

</head>

<body x-data x-bind="$store.global.documentBody"
    class="<?php if(isset($isSidebarOpen)): ?> <?php echo e($isSidebarOpen === 'true' ? 'is-sidebar-open' : ''); ?> <?php endif; ?> <?php if(isset($isHeaderBlur)): ?> <?php echo e($isHeaderBlur === 'true' ? 'is-header-blur' : ''); ?> <?php endif; ?> <?php if(isset($hasMinSidebar)): ?> <?php echo e($hasMinSidebar === 'true' ? 'has-min-sidebar' : ''); ?> <?php endif; ?>  <?php if(isset($headerSticky)): ?> <?php echo e($headerSticky === 'false' ? 'is-header-not-sticky' : ''); ?> <?php endif; ?>">

    <!-- App preloader-->
    <?php if (isset($component)) { $__componentOriginalcfeb5813eb5e125a185268bd877f5256 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcfeb5813eb5e125a185268bd877f5256 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app-preloader','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-preloader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcfeb5813eb5e125a185268bd877f5256)): ?>
<?php $attributes = $__attributesOriginalcfeb5813eb5e125a185268bd877f5256; ?>
<?php unset($__attributesOriginalcfeb5813eb5e125a185268bd877f5256); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcfeb5813eb5e125a185268bd877f5256)): ?>
<?php $component = $__componentOriginalcfeb5813eb5e125a185268bd877f5256; ?>
<?php unset($__componentOriginalcfeb5813eb5e125a185268bd877f5256); ?>
<?php endif; ?>

    <!-- Page Wrapper -->
    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>
        <!-- Sidebar -->
        <div class="sidebar print:hidden">
            <!-- Main Sidebar -->
            <?php if (isset($component)) { $__componentOriginal9a0ee24207c8f5d7fa1e63022f084bce = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9a0ee24207c8f5d7fa1e63022f084bce = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app-partials.main-sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-partials.main-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9a0ee24207c8f5d7fa1e63022f084bce)): ?>
<?php $attributes = $__attributesOriginal9a0ee24207c8f5d7fa1e63022f084bce; ?>
<?php unset($__attributesOriginal9a0ee24207c8f5d7fa1e63022f084bce); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a0ee24207c8f5d7fa1e63022f084bce)): ?>
<?php $component = $__componentOriginal9a0ee24207c8f5d7fa1e63022f084bce; ?>
<?php unset($__componentOriginal9a0ee24207c8f5d7fa1e63022f084bce); ?>
<?php endif; ?>

            <!-- Sidebar Panel -->
            <?php if (isset($component)) { $__componentOriginalf4cb6f27fe022c84a2121083263d9ef6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf4cb6f27fe022c84a2121083263d9ef6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app-partials.sidebar-panel','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-partials.sidebar-panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf4cb6f27fe022c84a2121083263d9ef6)): ?>
<?php $attributes = $__attributesOriginalf4cb6f27fe022c84a2121083263d9ef6; ?>
<?php unset($__attributesOriginalf4cb6f27fe022c84a2121083263d9ef6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf4cb6f27fe022c84a2121083263d9ef6)): ?>
<?php $component = $__componentOriginalf4cb6f27fe022c84a2121083263d9ef6; ?>
<?php unset($__componentOriginalf4cb6f27fe022c84a2121083263d9ef6); ?>
<?php endif; ?>
        </div>

        <!-- App Header -->
        <?php if (isset($component)) { $__componentOriginal298d1db4bb78c88ddfe2932420c8fc8d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal298d1db4bb78c88ddfe2932420c8fc8d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app-partials.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-partials.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal298d1db4bb78c88ddfe2932420c8fc8d)): ?>
<?php $attributes = $__attributesOriginal298d1db4bb78c88ddfe2932420c8fc8d; ?>
<?php unset($__attributesOriginal298d1db4bb78c88ddfe2932420c8fc8d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal298d1db4bb78c88ddfe2932420c8fc8d)): ?>
<?php $component = $__componentOriginal298d1db4bb78c88ddfe2932420c8fc8d; ?>
<?php unset($__componentOriginal298d1db4bb78c88ddfe2932420c8fc8d); ?>
<?php endif; ?>

        <!-- Mobile Searchbar -->
        <?php if (isset($component)) { $__componentOriginalb87da63e47016365b26c69e06f864543 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb87da63e47016365b26c69e06f864543 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app-partials.mobile-searchbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-partials.mobile-searchbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb87da63e47016365b26c69e06f864543)): ?>
<?php $attributes = $__attributesOriginalb87da63e47016365b26c69e06f864543; ?>
<?php unset($__attributesOriginalb87da63e47016365b26c69e06f864543); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb87da63e47016365b26c69e06f864543)): ?>
<?php $component = $__componentOriginalb87da63e47016365b26c69e06f864543; ?>
<?php unset($__componentOriginalb87da63e47016365b26c69e06f864543); ?>
<?php endif; ?>

        <!-- Right Sidebar -->
        <?php if (isset($component)) { $__componentOriginalf152d1c2e37f6ec6c9b3bbcff4f865ae = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf152d1c2e37f6ec6c9b3bbcff4f865ae = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.app-partials.right-sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-partials.right-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf152d1c2e37f6ec6c9b3bbcff4f865ae)): ?>
<?php $attributes = $__attributesOriginalf152d1c2e37f6ec6c9b3bbcff4f865ae; ?>
<?php unset($__attributesOriginalf152d1c2e37f6ec6c9b3bbcff4f865ae); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf152d1c2e37f6ec6c9b3bbcff4f865ae)): ?>
<?php $component = $__componentOriginalf152d1c2e37f6ec6c9b3bbcff4f865ae; ?>
<?php unset($__componentOriginalf152d1c2e37f6ec6c9b3bbcff4f865ae); ?>
<?php endif; ?>

        <?php echo e($slot); ?>


    </div>

    <!--
  This is a place for Alpine.js Teleport feature
  @see https://alpinejs.dev/directives/teleport
-->
    <div id="x-teleport-target"></div>

    <script>
        window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>

    <?php if(isset($script)): ?>
        <?php echo e($script); ?>

    <?php endif; ?>

</body>

</html>
<?php /**PATH D:\lineone\lineone-laravel\resources\views/components/app-layout.blade.php ENDPATH**/ ?>