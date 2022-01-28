<?php

namespace App\Http\Middleware;

use Session;
use App;
use Config;
use Closure;
use Illuminate\Http\Request;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session('locale')){
            $locale = session()->get('locale');
            App::setLocale($locale, Config::get('app.locale'));
        }
        else{
            $locale = session()->put('locale',Config::get('app.locale'));
            App::setLocale($locale, Config::get('app.locale'));
        }
        return $next($request);
    }
}
