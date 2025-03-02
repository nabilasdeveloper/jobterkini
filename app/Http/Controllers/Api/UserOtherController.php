<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserOtherController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->query('q');
        $userId = Auth::id();

        if (!$query) {
            return response()->json(['message' => 'Query pencarian kosong'], 400);
        }

        $users = User::where('nama', 'like', "%$query%")
            ->where('id', '!=', $userId)
            ->select('id', 'nama', 'foto')
            ->paginate(10);

        return response()->json([
            'status' => 'success',
            'data' => $users->items(),
        ]);
    }


    public function show($id)
    {
        $user = User::select('id', 'nama', 'deskripsi', 'alamat', 'foto')
            ->where('id', $id)
            ->with(['pendidikan', 'pengalaman'])
            ->first();

        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        return response()->json($user);
    }
}
