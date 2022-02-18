<?php

namespace App\Http\Controllers;

use App\Models\SocialSetting;
use Illuminate\Http\Request;

class SocialSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = SocialSetting::paginate(20);
        return view('admin.social.index',compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'icon' => 'required|max:255',
            'link' => 'required|max:255',
        ]);
        SocialSetting::create($data);
        session()->flash('message', 'Muvaffaqiyatli yaratildi!');
        return redirect()->route('admin.social.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialSetting  $socialSetting
     * @return \Illuminate\Http\Response
     */
    public function show(SocialSetting $socialSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialSetting  $socialSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialSetting $social)
    {
        return view('admin.social.edit',compact('social'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialSetting  $socialSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialSetting $social)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'icon' => 'required|max:255',
            'link' => 'required|max:255',
        ]);
        $social->update($data);
        session()->flash('message', 'Muvaffaqiyatli tahrirlandi!');
        return redirect()->route('admin.social.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialSetting  $socialSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialSetting $social)
    {
        $social->delete();
        session()->flash('message', 'Muvaffaqiyatli o\'chirildi!');
        return redirect()->route('admin.social.index');
    }
}
