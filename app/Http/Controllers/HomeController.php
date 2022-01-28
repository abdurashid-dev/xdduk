<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): RedirectResponse
    {
        if (Auth::user()->role === 'user3') {
            return redirect(route('admin.index'));
        } elseif (Auth::user()->role === 'user1') {
            return redirect(route('admin.dashboard'));
        } else if (Auth::user()->role === "user2") {
            return redirect(route('admin.user'));
        } elseif (Auth::user()->role === 'off') {
            return redirect()->route('waitList');
        } else {
            return redirect()->back();
        }
    }
}
