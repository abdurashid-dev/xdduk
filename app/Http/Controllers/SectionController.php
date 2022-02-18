<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::orderByDesc('created_at')->get();
        return view('admin.section.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.section.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'bio_uz' => 'required',
            'bio_en' => '',
            'bio_ru' => '',
            'time_uz' => 'required|max:255',
            'time_en' => 'max:255',
            'time_ru' => 'max:255',
            'position' => 'required|max:255',
            'number' => ['required','max:255', new PhoneNumber],
            'email' => 'required|max:255|email',
        ]);

        if (!file_exists('uploads/sections')) {
            mkdir('uploads/sections', 0777, true);
        }
        $imageName = md5(rand(1000, 9999) . microtime()) . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('/uploads/sections/'), $imageName);
        $data['image'] = 'uploads/sections/' . $imageName;

        Section::create($data);
        session()->flash('message', 'Muvaffaqiyatli yaratildi!');
        return redirect()->route('admin.sections.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        return view('admin.section.show', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view('admin.section.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Section $section)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'bio_uz' => 'required',
            'bio_en' => '',
            'bio_ru' => '',
            'time_uz' => 'required|max:255',
            'time_en' => 'max:255',
            'time_ru' => 'max:255',
            'position' => 'required|max:255',
            'number' => ['required','max:255', new PhoneNumber],
            'email' => 'required|max:255|email',
        ]);

        if ($request->hasFile('image')) {
            if (file_exists($section->image)) {
                unlink($section->image);
            }
            $imageName = md5(rand(1000, 9999) . microtime()) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('/uploads/sections/'), $imageName);
            $data['image'] = 'uploads/sections/' . $imageName;
        }

        $section->update($data);
        session()->flash('message', 'Muvaffaqiyatli yangilandi!');
        return redirect()->route('admin.sections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Section $section)
    {
        if (file_exists($section->image)) {
            unlink($section->image);
        }
        $section->delete();
        session()->flash('message', 'Muvaffaqiyatli o\'chirildi!');
        return redirect()->route('admin.sections.index');
    }
}
