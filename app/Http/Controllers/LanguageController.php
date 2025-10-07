<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    /**
     * Switch application language
     *
     * @param string $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switch($locale)
    {
        // Get available locales from config
        $availableLocales = config('app.available_locales', ['en']);
        
        // Validate locale
        if (in_array($locale, $availableLocales)) {
            // Store locale in session
            Session::put('locale', $locale);
        }
        
        // Redirect back to the previous page
        return Redirect::back();
    }
}
