<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'user2' && Auth::user()->is_active == 1) {
                return $next($request);
            } elseif (Auth::user()->role == 'user1' || Auth::user()->role == 'user3') {
                return back()->with('inactive', 'Access denied!');
            } elseif (Auth::user()->role == 'off') {
                return back();
            } else {
                return redirect('/');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
