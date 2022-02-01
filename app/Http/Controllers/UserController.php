<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Document;
use App\Models\Link;
use App\Models\Menu;
use App\Models\Offer;
use App\Models\Setting;
use App\Models\SocialSetting;
use App\Models\TemporaryFile;
use App\Models\User;
use App\Rules\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $temps = TemporaryFile::where('status', 0)->get();
        if (count($temps) > 0) {
            foreach ($temps as $temp) {
                if (file_exists($temp->path)) {
                    unlink($temp->path);
                }
                $temp->delete();
            }
        }
        $user = User::with('offer')->where('role', 'user2')->findOrFail(Auth::user()->id);
        $documents = Document::where('user_id', Auth::user()->id)->orderByDesc('updated_at')->get();
        $news = Document::where('user_id', Auth::user()->id)->where('status', 'yangi')->get();
        $progress = Document::where('user_id', Auth::user()->id)->where('status', 'tasdiqlangan')->get();
        $shartnoma = Offer::where('user_id', Auth::user()->id)->where('status', 'shartnoma')->count();
        $ecokorik = Offer::where('user_id', Auth::user()->id)->where('status', 'ecokorik')->count();
        $auksion = Offer::where('user_id', Auth::user()->id)->where('status', 'auksion')->count();
        $reject = Document::where('user_id', Auth::user()->id)->where('status', 'rad etilgan')->get();
        $done = Offer::where('user_id', Auth::user()->id)->where('status', 'real')->get();
        return view('admin.user.index', compact('user', 'documents', 'news', 'reject', 'done', 'shartnoma', 'ecokorik', 'auksion'));
    }

    public function table()
    {
        $temps = TemporaryFile::where('status', 0)->get();
        if (count($temps) > 0) {
            foreach ($temps as $temp) {
                if (file_exists($temp->path)) {
                    unlink($temp->path);
                }
                $temp->delete();
            }
        }
        $user = User::with('offer')->where('role', 'user2')->findOrFail(Auth::user()->id);
        $documents = Document::where('user_id', Auth::user()->id)->orderByDesc('updated_at')->get();
        return view('admin.user.documents', compact('user', 'documents'));
    }

    public function send()
    {
        $user = User::with('offer')->where('role', 'user2')->findOrFail(Auth::user()->id);
        $documents = Document::where('user_id', Auth::user()->id)->orderByDesc('updated_at')->get();
        return view('admin.user.send', compact('user', 'documents'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'offer_id' => 'required',
            'file' => ['required', new File],
        ]);
        TemporaryFile::where('path', $request->file)->update([
            'status' => 1,
        ]);
        $data['file'] = $request->file;
        $data['user_id'] = auth()->user()->id;
        Document::create($data);
        return redirect()->route('admin.user.table')->with('message', 'Muvafaqqiyatli yuborildi!');
    }

    public function show($id)
    {
        $user = User::where('role', 'user2')->findOrFail(Auth::user()->id);
        $doc = Document::where('user_id', Auth::user()->id)->orderByDesc('created_at')->findOrFail($id);
        $comments = Comment::where('doc_id', $doc->id)->get();
        return view('admin.user.show', compact('user', 'doc', 'comments'));
    }

    public function edit($id)
    {
        $user = User::where('role', 'user2')->findOrFail(Auth::user()->id);
        $doc = Document::where('user_id', Auth::user()->id)->orderByDesc('created_at')->findOrFail($id);
        if ($doc->status == 'rad etilgan') {
            return view('admin.user.edit', compact('user', 'doc'));
        } else {
            return abort(404);
        }
    }

    //make update function
    public function update(Request $request, $id)
    {
        $document = Document::findOrFail($id);
        if (file_exists($document->file)) {
            unlink($document->file);
        }
        $data = $request->validate([
            'name' => 'required|max:255',
            'file' => ['required', new File],
        ]);
        TemporaryFile::where('path', $request->file)->update([
            'status' => 1,
        ]);
        $data['file'] = $request->file;
        $data['status'] = 'yangi';
        $data['user_id'] = Auth::user()->id;
        $document->update($data);
        return redirect()->route('admin.user.table')->with('message', 'Tahrirlandi!');
    }

    public function uploadFile(Request $request)
    {
        //check request file
        if (request()->hasFile('file')) {
            $validator = Validator::make($request->all(), [
                'file' => 'required|max:512000|mimes:pdf,zip',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->all()]);
            } else {
                if (!file_exists('documents')) {
                    mkdir('documents', 0777, true);
                }
                $file = $request->file('file');
                $fileName = uniqid() . microtime() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('documents/'), $fileName);
                $path = 'documents/' . $fileName;
                TemporaryFile::create([
                    'path' => $path,
                ]);
                return $path;
            }
        } else {
            return response()->json([
                'status' => 500,
            ]);
        }
    }

    public function uploadFileUpdate(Request $request)
    {
        //check request file
        if (request()->hasFile('file')) {
            $validator = Validator::make($request->all(), [
                'file' => 'required|max:512000|mimes:pdf,zip',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->all()]);
            } else {
                if (!file_exists('documents')) {
                    mkdir('documents', 0777, true);
                }
                $file = $request->file('file');
                $fileName = uniqid() . microtime() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('documents/'), $fileName);
                $path = 'documents/' . $fileName;
                TemporaryFile::create([
                    'path' => $path,
                ]);
                return $path;
            }
        } else {
            return response()->json([
                'status' => 500,
            ]);
        }
    }
}
