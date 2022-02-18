<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title_uz' => 'required|max:255',
            'title_en' => 'required|max:255',
            'title_ru' => 'required|max:255',
            'body_uz' => 'required',
            'body_en' => 'required',
            'body_ru' => 'required',
            'link' => 'required|max:255',
        ]);

        if (!file_exists('uploads/sliders')) {
            mkdir('uploads/sliders', 0777, true);
        }
        $imageName = md5(rand(1000, 9999) . microtime()) . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('/uploads/sliders/'), $imageName);
        $data['image'] = 'uploads/sliders/' . $imageName;

        Slider::create($data);
        session()->flash('message', 'Muvaffaqiyatli yaratildi!');
        return redirect()->route('admin.sliders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('admin.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $data = $request->validate([
            'title_uz' => 'required|max:255',
            'title_en' => 'required|max:255',
            'title_ru' => 'required|max:255',
            'body_uz' => 'required',
            'body_en' => 'required',
            'body_ru' => 'required',
            'link' => 'required|max:255',
        ]);

        if ($request->hasFile('image')) {
            unlink($slider->image);
            $imageName = md5(rand(1000, 9999) . microtime()) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('/uploads/sliders/'), $imageName);
            $data['image'] = 'uploads/sliders/' . $imageName;
        }
        $slider->update($data);
        session()->flash('message', 'Muvaffaqiyatli tahrirlandi!');
        return redirect()->route('admin.sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Slider $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        unlink($slider->image);
        $slider->delete();
        session()->flash('message', 'Muvaffaqiyatli o\'chirildi!');
        return redirect()->route('admin.sliders.index');
    }
}
