<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get available locales from config
        $availableLocales = config('app.available_locales', ['en']);
        
        // Get locale from session or use default
        $locale = Session::get('locale', config('app.locale'));
        
        // Validate locale
        if (!in_array($locale, $availableLocales)) {
            $locale = config('app.locale');
        }
        
        // Set application locale
        App::setLocale($locale);
        
        return $next($request);
    }
}
