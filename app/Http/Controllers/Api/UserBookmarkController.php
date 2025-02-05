<?php

namespace App\Http\Controllers\Api;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserBookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Bookmark::where('users_id', Auth::guard('sanctum')->id())
            ->with('lowongan')
            ->get();

        return response()->json(['status' => 'success', 'data' => $bookmarks], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'lowongan_id' => 'required|exists:lowongan,id',
        ]);

        $users = Auth::guard('sanctum')->user();

        if (!$users) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 401);
        }

        $cekBookmark = Bookmark::where('users_id', $users->id)
            ->where('lowongan_id', $request->lowongan_id)
            ->exists();

        if ($cekBookmark) {
            return response()->json(['status' => 'error', 'message' => 'Lowongan sudah di-bookmark'], 409);
        }

        $bookmark = Bookmark::create([
            'users_id' => $users->id,
            'lowongan_id' => $request->lowongan_id,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Bookmark berhasil ditambahkan', 'data' => $bookmark], 201);
    }

    public function destroy($id)
    {
        $users = Auth::guard('sanctum')->user();
        $bookmark = Bookmark::where('users_id', $users->id)->where('lowongan_id', $id)->first();

        if (!$bookmark) {
            return response()->json(['status' => 'error', 'message' => 'Bookmark tidak ditemukan'], 404);
        }

        $bookmark->delete();

        return response()->json(['status' => 'success', 'message' => 'Bookmark dihapus'], 200);
    }
}
