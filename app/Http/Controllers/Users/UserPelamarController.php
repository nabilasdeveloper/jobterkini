<?php

namespace App\Http\Controllers\Users;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pelamar;

class UserPelamarController extends Controller
{
    public function create($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        return view('Users.Lamaran.user-create', compact('lowongan'));
    }

    public function store(Request $request, $id)
    {
        $users_id = auth('user')->id();

        $sudahMelamar = Pelamar::where('users_id', $users_id)
            ->where('lowongan_id', $id)
            ->exists();

        if ($sudahMelamar) {
            return redirect()->route('user-lamaran-history')->with('error', 'Anda sudah melamar di lowongan ini.');
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
            'users_id'     => $users_id,
            'lowongan_id'     => $id,
            'surat_lamaran'   => $suratLamaran,
            'cv'              => $cv,
            'dokumen_lainnya' => $dokumenLain,
            'status'          => 'Diproses',
        ]);

        return redirect()->route('lowongan-detail', $id)->with('success', 'Lamaran berhasil dikirim.');
    }

    public function history()
    {
        $users_id = auth('user')->id();

        $lamaran = Pelamar::where('users_id', $users_id)
            ->with('lowongan.perusahaan')
            ->latest()
            ->get();

        return view('Users.Lamaran.user-history', compact('lamaran'));
    }
}
