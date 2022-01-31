<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $all = Document::count();
        $offers = Offer::orderByDesc('created_at')->get();
//        $users = User::where('role', 'user2')->where('is_active',1)->get();
        return view('offers.index', compact('offers', 'all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role', 'user2')->where('is_active', 1)->get();
        return view('offers.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_uz' => 'required|max:255',
            'name_ru' => 'max:255',
            'name_en' => 'max:255',
            'summa' => 'required|max:255',
            'address' => 'required|max:255',
            'link' => 'max:255',
        ]);
        if ($request->user_id) {
            $data['status'] = 'shartnoma';
            $data['user_id'] = $request->user_id;
        }
        Offer::create($data);
        return redirect()->route('admin.offers.index')->with('message', 'Yaratildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Offer $offer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        return view('offers.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Offer $offer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Offer $offer)
    {
        $users = User::where('role', 'user2')->where('is_active', 1)->get();
        if ($offer->status == 'tender' || $offer->status == 'shartnoma') {
            return view('offers.edit', compact('offer', 'users'));
        } else {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Offer $offer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Offer $offer)
    {
//        dd($request->all());
        $data = $request->validate([
            'name_uz' => 'required|max:255',
            'name_ru' => 'max:255',
            'name_en' => 'max:255',
            'summa' => 'required|max:255',
            'address' => 'required|max:255',
            'link' => 'max:255',
        ]);
        if ($request->user_id == 'MCHJni tanlang') {
            $data['status'] = 'tender';
            $data['user_id'] = null;
        } else {
            $offer->update([
                    'status' => 'shartnoma',
                    'user_id' => $request->user_id,
                ]
            );
        }
        $offer->update($data);
        return redirect()->route('admin.offers.index')->with('message', 'Tahrirlandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Offer $offer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->route('admin.offers.index')->with('message', 'O`chirildi');
    }
}
