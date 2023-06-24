<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         $locale = $request->input('lang', session('locale', App::getLocale()));

        if (!in_array($locale, ['en', 'ka'])) {
            $locale = 'en';
        }

        App::setLocale($locale);
        session(['locale' => $locale]);

        $query = $request->query();
        unset($query['lang']);

        $newUrl = $request->url() . (empty($query) ? '' : '?' . http_build_query($query));

        if ($request->fullUrl() !== $newUrl) {
            return redirect()->to($newUrl);
        }

        return $next($request);
    }
}
