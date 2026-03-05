<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class LangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // siz xohlagancha:
        $langs = getLanguage()->pluck('name')->toArray(); // masalan: ['uz','ru','en']

        // 1) avval session
        $lang = Session::get('lang');

        // 2) session bo'lmasa app.php dagi locale
        if (!$lang) {
            $lang = config('app.locale'); // .env APP_LOCALE
        }

        // 3) agar app locale DB dagi tillarda bo'lmasa, birinchi aktiv til
        if (!$lang || !in_array($lang, $langs, true)) {
            $lang = $langs[0] ?? 'en';
        }

        Session::put('lang', $lang);
        App::setLocale($lang);

        return $next($request);
    }
}
