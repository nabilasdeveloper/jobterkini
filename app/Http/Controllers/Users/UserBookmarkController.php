<?php

namespace App\Http\Controllers\Users;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserBookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Bookmark::where('users_id', Auth::guard('user')->id())->with('lowongan')->get();
        return view('Users.Bookmark.user-bookmark', compact('bookmarks'));
    }

    public function store(Request $request)
    {
        $user = Auth::guard('user')->user();

        if (!$user) {
            return redirect()->route('user-login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $cekBookmark = Bookmark::where('users_id', $user->id)
            ->where('lowongan_id', $request->lowongan_id)
            ->exists();

        if ($cekBookmark) {
            return redirect()->back()->with('warning', 'Lowongan ini sudah ada di bookmark Anda.');
        }

        // Simpan ke database
        Bookmark::create([
            'users_id' => $user->id,
            'lowongan_id' => $request->lowongan_id,
        ]);

        return redirect()->back()->with('success', 'Lowongan berhasil ditambahkan ke bookmark!');
    }


    public function destroy($id)
    {
        $bookmark = Bookmark::where('users_id', Auth::id())->where('lowongan_id', $id)->first();
        if ($bookmark) {
            $bookmark->delete();
            return response()->json(['status' => 'success', 'message' => 'Bookmark dihapus']);
        }
        return response()->json(['status' => 'error', 'message' => 'Bookmark tidak ditemukan']);
    }
}
