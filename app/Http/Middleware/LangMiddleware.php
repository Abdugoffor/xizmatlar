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
    public function handle(Request $request, Closure $next): Response
    {
        // DIQQAT: Siz pluck('name') ishlatyapsiz - demak name = 'uz', 'ru'
        $langs = getLanguage()->pluck('name')->toArray(); // ['uz','ru','en']

        if (empty($langs)) {
            $langs = [config('app.locale')];
        }

        // 1) URLdagi lang (/{lang}/...)
        $routeLang = $request->route('lang');

        // 2) Sessiondagi lang
        $sessionLang = Session::get('lang');

        // 3) Default (app.php / .env)
        $defaultLang = config('app.locale');

        // 4) Qaysi tilni tanlaymiz?
        // URL to'g'ri bo'lsa - URL ustun
        if ($routeLang && in_array($routeLang, $langs, true)) {
            $lang = $routeLang;
        } else {
            // URL yo'q yoki noto'g'ri bo'lsa session -> default -> DB first
            $lang = ($sessionLang && in_array($sessionLang, $langs, true))
                ? $sessionLang
                : (in_array($defaultLang, $langs, true) ? $defaultLang : ($langs[0] ?? $defaultLang));

            // Agar route'da lang bor-u noto'g'ri bo'lsa yoki umuman bo'lmasa -> to'g'ri URLga redirect
            // (Misol: /en/languages lekin en aktiv emas)
            if ($request->route() && $request->route()->getName()) {
                $params = $request->route()->parameters();
                $params['lang'] = $lang;

                return redirect()->route($request->route()->getName(), $params);
            }

            // Agar route nomi yo'q bo'lsa fallback
            return redirect()->to("/{$lang}");
        }

        // 5) Set
        Session::put('lang', $lang);
        App::setLocale($lang);

        // 6) ENG MUHIM: route() langni avtomatik qo'shadi
        URL::defaults(['lang' => $lang]);

        return $next($request);
    }
}