<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function profile(Request $request)
    {
        $user = Auth::user(); // Menggunakan Sanctum Auth
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        ]);


        $user->nama = $request->nama;
        $user->deskripsi = $request->deskripsi;
        $user->alamat = $request->alamat;
        $user->contact = $request->contact;

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }

            $path = $request->file('foto')->store('users/profile', 'public');
            $user->foto = $path;
        }

        $user->save();

        return response()->json([
            'message' => 'Profile updated successfully',
            'data' => $user
        ], 200);
    }
}
