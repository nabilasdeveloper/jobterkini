<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pelamar;
use Illuminate\Support\Facades\Auth;

class UserLamaranController extends Controller
{
    public function store(Request $request, $id)
    {
        $users_id = Auth::guard('sanctum')->id();

        if (!$users_id) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 401);
        }

        // Cek apakah pengguna sudah melamar
        $sudahMelamar = Pelamar::where('users_id', $users_id)
            ->where('lowongan_id', $id)
            ->exists();

        if ($sudahMelamar) {
            return response()->json(['status' => 'error', 'message' => 'Anda sudah melamar di lowongan ini.'], 400);
        }

        // Validasi file yang diunggah
        $request->validate([
            'surat_lamaran'  => 'required|mimes:pdf,doc,docx|max:2048',
            'cv'             => 'required|mimes:pdf,doc,docx|max:2048',
            'dokumen_lainnya' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        // Simpan file ke storage
        $suratLamaran = $request->file('surat_lamaran')->store('lamaran/surat', 'public');
        $cv           = $request->file('cv')->store('lamaran/cv', 'public');
        $dokumenLain  = $request->file('dokumen_lainnya') ? $request->file('dokumen_lainnya')->store('lamaran/dokumen', 'public') : null;

        // Simpan ke database
        Pelamar::create([
            'users_id'        => $users_id,
            'lowongan_id'     => $id,
            'surat_lamaran'   => $suratLamaran,
            'cv'              => $cv,
            'dokumen_lainnya' => $dokumenLain,
            'status'          => 'Diproses',
        ]);

        return response()->json(['status' => 'success', 'message' => 'Lamaran berhasil dikirim.']);
    }

    public function checkLamaran($id)
    {
        // Mendapatkan ID pengguna yang sedang login
        $users_id = Auth::guard('sanctum')->id();

        if (!$users_id) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 401);
        }

        // Cek apakah pengguna sudah melamar di lowongan ini
        $pelamar = Pelamar::where('users_id', $users_id)
            ->where('lowongan_id', $id)
            ->first();

        if ($pelamar) {
            return response()->json([
                'message' => 'success',
                'sudah_melamar' => true,
                'status' => $pelamar->status, // Mengembalikan status lamaran
            ]);
        }

        return response()->json([
            'message' => 'success',
            'sudah_melamar' => false,
            'status' => null, // Jika belum melamar, status null
        ]);
    }



    public function history()
    {
        $users_id = Auth::guard('sanctum')->id();

        if (!$users_id) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 401);
        }

        $lamaran = Pelamar::where('users_id', $users_id)
            ->with('lowongan.perusahaan')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json(['status' => 'success', 'data' => $lamaran]);
    }
}
