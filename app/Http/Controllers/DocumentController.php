<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Document;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('user', 'offer')->orderByDesc('created_at')->get();
        return view('documents.index', compact('documents'));
    }

    public function show($id)
    {
        $document = Document::with('user', 'offer')->findOrFail($id);
        $user = User::with('offer')->where('id', $document->user_id)->first();
        $comments = Comment::where('doc_id', $document->id)->get();
        $document->checkStatus();
        return view('documents.show', compact('document', 'user', 'comments'));
    }

    public function update(Request $request, $id)
    {
        $offer = Offer::findOrFail($request->offer_id);
        $document = Document::findOrFail($id);
        $request->validate([
            'status' => 'required',
            'comment' => 'required',
        ]);
        $comment = new Comment();
        $comment->user_id = $document->user_id;
        $comment->doc_id = $document->id;
        $comment->comment = $request->comment;
        $comment->doc_status = $request->status;
        $comment->save();
        if ($request->status == 'rad etish') {
            $offer->update(['status' => 'shartnoma']);
            $document->update(['status' => 'rad etilgan']);
        } else {
            $offer->update(['status' => $request->status]);
            $document->update(['status' => 'tasdiqlangan']);
        }
        $document->update(['comment' => $request->comment]);
        return redirect()->route('admin.documents.index')->with('message', 'Status o`zgartirildi !');
    }

    public function reject()
    {
        $documents = Document::with('user', 'offer')->where('status', 'rad etilgan')->orderByDesc('created_at')->get();
        return view('documents.reject', compact('documents'));
    }
    public function page($status)
    {
        if ($status == 'yangi') {
            $documents = Document::with('user', 'offer')->where('status', $status)->orderByDesc('created_at')->get();
        } else {
            $doc = Document::with(
                array(
                    'user',
                    'offer' => function ($query) use ($status) {
                        $query->where('status', $status);
                    }
                ))->orderByDesc('created_at')->get();
            $documents = [];
            foreach ($doc as $d) {
                if (isset($d->offer)) {
                    $documents[] = $d;
                }
            }
        }
//        dd($documents);
        return view('documents.page', compact('documents'));
    }
}
