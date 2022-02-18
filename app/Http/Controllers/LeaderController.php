<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaders = Leader::orderByDesc('created_at')->get();
        return view('admin.leaders.index', compact('leaders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.leaders.create');
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
            'name_uz' => 'required|max:255',
            'name_en' => 'max:255',
            'name_ru' => 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'bio_uz' => 'required',
            'bio_en' => '',
            'bio_ru' => '',
            'time_uz' => 'required|max:255',
            'time_en' => 'max:255',
            'time_ru' => 'max:255',
            'position_uz' => 'required|max:255',
            'position_en' => 'max:255',
            'position_ru' => 'max:255',
            'number' => ['required','max:255', new PhoneNumber],
            'email' => 'required|max:255|email',
        ]);

        if (!file_exists('uploads/leaders')) {
            mkdir('uploads/leaders', 0777, true);
        }
        $imageName = md5(rand(1000, 9999) . microtime()) . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('/uploads/leaders/'), $imageName);
        $data['image'] = 'uploads/leaders/' . $imageName;

        Leader::create($data);
        session()->flash('message', 'Muvaffaqiyatli yaratildi!');
        return redirect()->route('admin.leaders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Leader $leader
     * @return \Illuminate\Http\Response
     */
    public function show(Leader $leader)
    {
        return view('admin.leaders.show', compact('leader'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Leader $leader
     * @return \Illuminate\Http\Response
     */
    public function edit(Leader $leader)
    {
        return view('admin.leaders.edit', compact('leader'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Leader $leader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leader $leader)
    {
        $data = $request->validate([
            'name_uz' => 'required|max:255',
            'name_en' => 'max:255',
            'name_ru' => 'max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'bio_uz' => 'required',
            'bio_en' => '',
            'bio_ru' => '',
            'time_uz' => 'required|max:255',
            'time_en' => 'max:255',
            'time_ru' => 'max:255',
            'position_uz' => 'required|max:255',
            'position_en' => 'max:255',
            'position_ru' => 'max:255',
            'number' => ['required','max:255', new PhoneNumber],
            'email' => 'required|max:255|email',
        ]);

        if ($request->hasFile('image')) {
            if (file_exists($leader->image)) {
                unlink($leader->image);
            }
            $imageName = md5(rand(1000, 9999) . microtime()) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('/uploads/leaders/'), $imageName);
            $data['image'] = 'uploads/leaders/' . $imageName;
        }

        $leader->update($data);
        session()->flash('message', 'Muvaffaqiyatli yangilandi!');
        return redirect()->route('admin.leaders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Leader $leader
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leader $leader)
    {
        if (file_exists($leader->image)) {
            unlink($leader->image);
        }
        $leader->delete();
        session()->flash('message', 'Muvaffaqiyatli o\'chirildi!');
        return redirect()->route('admin.leaders.index');
    }
}
