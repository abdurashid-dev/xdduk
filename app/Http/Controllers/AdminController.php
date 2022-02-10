<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Link;
use App\Models\Slider;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::where('is_read', 0)->orderByDesc('created_at')->get();
        $users = User::where('role', '!=', 'user1')->get();
        $news = Blog::count();
        $videos = Video::count();
        $sliders = Slider::count();
        $sliderss = Slider::limit(3)->get();
        $links = Link::count();
        return view('admin.index', compact('users', 'news', 'videos', 'sliders', 'links', 'contacts', 'sliderss'));
    }

    public function optimize()
    {
        Artisan::call('optimize');
        return back()->with('optimize', 'Optimized');
    }

    public function status(Request $request, $id)
    {
        $model = '\\App\\Models\\' . $request->type;

        if ($request->type) {
            $status = $model::findOrFail($id);
            if ($status->is_active == 1) {
                $status->update(['is_active' => 0]);
                session()->flash('inactive', 'Inactive !');
                return back();
            } else {
                $status->update(['is_active' => 1]);
                session()->flash('message', 'Active !');
                return back();
            }
        }
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin.profile', compact('user'));
    }

    public function data(Request $request)
    {
        $user = auth()->user();
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);
        $user->update($data);
        return back()->with('message', 'Profile Updated !');
    }

    public function password()
    {
        $user = auth()->user();
        return view('admin.password', compact('user'));
    }

    public function passwordChange(Request $request)
    {
        $request->validate([
            'password_old' => 'required',
            'password' => ['required', 'min:8', 'confirmed'],
        ]);
        $user = User::findOrFail(Auth::user()->id);
        if (Hash::check($request['password_old'], $user->password)) {
            $password = Hash::make($request['password']);
            User::findOrFail(Auth::user()->id)->update(['password' => $password]);
            return back()->with('message', 'Parol o`zgardi !');
        } else {
            return back()->with('inactive', 'Eski parol noto`g`ri !');
        }
    }

    public function contact()
    {
        $contacts = Contact::orderBy('is_read')->get();
        return view('admin.contact.index', compact('contacts'));
    }

    public function contactShow($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['is_read' => 1]);
        return view('admin.contact.show', compact('contact'));
    }

    public function contactDelete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('admin.contact')->with('message', 'Xabar o`chirildi !');
    }
}
