<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::where('is_active', 1)->get();
        return view('admin.pages.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $page = Page::count();
        $data = $request->validate([
            'name_uz' => 'required|max:255|unique:pages',
            'name_ru' => 'required|max:255',
            'name_en' => 'required|max:255',
            'content_uz' => 'required',
            'content_ru' => 'required',
            'content_en' => 'required',
            'menu_id' => 'required',
        ]);
        $data['slug'] = Str::slug($request->name_uz);
        $data['order'] = $page + 1;
        Page::create($data);
        return redirect()->route('admin.pages.index')->with('message', 'Yaratildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Page $page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        $page = Page::with('menu')->findOrFail($page->id);
//        dd($page);
        return view('admin.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Page $page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $page = Page::findOrFail($page->id);
        $menus = Menu::where('is_active', 1)->get();
//        $subMenus = SubMenu::where('is_active', 1)->get();
        return view('admin.pages.edit', compact('page', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'name_uz' => 'required|max:255',
            'name_ru' => 'required|max:255',
            'name_en' => 'required|max:255',
            'content_uz' => 'required',
            'content_ru' => 'required',
            'content_en' => 'required',
            'menu_id' => 'required',
        ]);
        $data['slug'] = Str::slug($request->name_uz);
        $page->update($data);
        return redirect()->route('admin.pages.index')->with('message', 'Tahrirlandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('message', 'O\'chirildi!');
    }

    public function getMenu($id)
    {
        $subMenus = SubMenu::where('menu_id', $id)->get();
        return response()->json([
            'status' => 'success',
            'data' => $subMenus
        ]);
    }
}
