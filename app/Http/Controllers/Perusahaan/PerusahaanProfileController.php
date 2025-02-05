<?php

namespace App\Http\Controllers\Perusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PerusahaanProfileController extends Controller
{
    public function index()
    {
        $perusahaan = Auth::guard('perusahaan')->user();
        return view('perusahaan.perusahaan-profil', compact('perusahaan'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'contact_perusahaan' => 'required|string|max:255',
            'alamat_perusahaan' => 'required|string',
            'deskripsi_perusahaan' => 'required|string',
            'jenis_industri_perusahaan' => 'required|array',
            'ukuran_perusahaan' => 'required|string',
            'website_perusahaan' => 'required|url',
            'img_perusahaan' => 'nullable|image|mimes:jpg,png,jpeg,webp|max:2048',
        ]);

        $perusahaan = Auth::guard('perusahaan')->user();

        // Mengupload gambar jika ada
        if ($request->hasFile('img_perusahaan')) {
            $imgPath = $request->file('img_perusahaan')->store('perusahaan/profile', 'public');
            $perusahaan->img_perusahaan = $imgPath;
        }

        // Update data perusahaan
        $perusahaan->update([
            'contact_perusahaan' => $request->contact_perusahaan,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'deskripsi_perusahaan' => $request->deskripsi_perusahaan,
            'jenis_industri_perusahaan' => implode(', ', $request->jenis_industri_perusahaan),
            'ukuran_perusahaan' => $request->ukuran_perusahaan,
            'website_perusahaan' => $request->website_perusahaan,
            'visi_perusahaan' => $request->visi_perusahaan,
            'misi_perusahaan' => $request->misi_perusahaan,
        ]);

        return redirect()->back()->with('success', 'Profil perusahaan berhasil diperbarui.');
    }
}
