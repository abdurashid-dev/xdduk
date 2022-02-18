<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    public function index()
    {
        $menus = Menu::orderBy('order')->paginate(20);
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $menu = Menu::count();
        $data = $request->validate([
            'name_uz' => 'required|max:255',
            'name_en' => 'required|max:255',
            'name_ru' => 'required|max:255',
        ]);
        $data['order'] = $menu + 1;
        Menu::create($data);
        return redirect()->route('admin.menus.index')->with('message', 'Yaratildi!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Menu $menu
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu): RedirectResponse
    {
        $data = $request->validate([
            'name_uz' => 'required|max:255',
            'name_en' => 'required|max:255',
            'name_ru' => 'required|max:255',
        ]);
        $menu->update($data);
        return redirect()->route('admin.menus.index')->with('message', 'Tahrirlandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu): RedirectResponse
    {
        $menu->delete();
        return redirect()->route('admin.menus.index')->with('message', 'O`chirildi!');
    }

    public function order()
    {
        $menus = Menu::orderBy('order')->get();
        return view('admin.menus.order', compact('menus'));
    }

    public function saveOrder(Request $request)
    {
        foreach ($request->orders as $order) {
            $id = $order[0];
            $order = $order[1];
            Menu::findOrFail($id)->update(['order' => $order]);
        }
        return response()->json([
            'status' => 200,
        ]);
    }
}
