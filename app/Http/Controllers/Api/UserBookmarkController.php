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
        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 401);
        }

        $bookmarks = Bookmark::where('users_id', Auth::guard('sanctum')->id())
            ->with(['lowongan.perusahaan'])
            ->get();

        return response()->json(['status' => 'success', 'data' => $bookmarks], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'lowongan_id' => 'required|exists:lowongan,id',
        ]);

        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 401);
        }

        $bookmark = Bookmark::where('users_id', $user->id)
            ->where('lowongan_id', $request->lowongan_id)
            ->first();

        if ($bookmark) {
            // Jika sudah ada, hapus bookmark
            $bookmark->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Bookmark dihapus',
                'bookmarked' => false
            ], 200);
        }

        // Jika belum ada, tambahkan bookmark
        $newBookmark = Bookmark::create([
            'users_id' => $user->id,
            'lowongan_id' => $request->lowongan_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Lowongan telah di-bookmark',
            'bookmarked' => true,
            'data' => $newBookmark
        ], 201);
    }


    public function checkBookmark($id)
    {
        $user = Auth::guard('sanctum')->user();

        $isBookmarked = Bookmark::where('users_id', $user->id)
            ->where('lowongan_id', $id)
            ->exists();

        return response()->json([
            'bookmarked' => $isBookmarked
        ], 200);
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
