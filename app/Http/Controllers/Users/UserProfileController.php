<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::guard('user')->user();
        return view('Users.user-profile', compact('user'));
    }

    // Simpan data profil
    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        ]);

        $user = Auth::guard('user')->user();

        $user->nama = $request->nama;
        $user->deskripsi = $request->deskripsi;
        $user->alamat = $request->alamat;

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('user/profile', 'public');
            $user->foto = $path;
        }

        $user->save();

        return redirect()->route('user-profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
