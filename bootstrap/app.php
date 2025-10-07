<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Register Spatie aliases (Laravel 12 – no Kernel)
        $middleware->alias([
            'role'                => RoleMiddleware::class,
            'permission'          => PermissionMiddleware::class,
            'role_or_permission'  => RoleOrPermissionMiddleware::class,
        ]);

        // If you use Sanctum on API routes, web group is already wired by Laravel 12.
        // (Nothing else needed here for auth/web groups.)
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
