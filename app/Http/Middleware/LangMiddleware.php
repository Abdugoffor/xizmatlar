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
        $lang = $request->segment(1);
        $langs = getLanguage()->pluck('name')->toArray();

        if (!$lang || !in_array($lang, $langs)) {

            $lang = Session::get('lang', $langs[0] ?? 'en');

            return redirect("/{$lang}" . $request->getPathInfo());
        }

        Session::put('lang', $lang);

        App::setLocale($lang);

        URL::defaults(['lang' => $lang]);

        $request->route()->forgetParameter('lang');

        return $next($request);
    }
}
