<?php

namespace App\Http\Controllers\Perusahaan;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pelamar;
use Illuminate\Support\Facades\Auth;

class PerusahaanPelamarController extends Controller
{
    public function index()
    {
        $perusahaan = Auth::guard('perusahaan')->user();

        // Ambil semua lowongan milik perusahaan beserta jumlah pelamar
        $lowonganList = Lowongan::where('perusahaan_id', $perusahaan->id)
            ->withCount('pelamar') // Hitung jumlah pelamar
            ->get();

        return view('perusahaan.kelolapelamar.perusahaan-kelolapelamar', compact([
            'perusahaan',
            'lowonganList'
        ]));
    }

    public function detail($lowongan_id)
    {
        $perusahaan = Auth::guard('perusahaan')->user();
        $lowongan = Lowongan::where('id', $lowongan_id)
            ->where('perusahaan_id', $perusahaan->id)
            ->firstOrFail();

        // Ambil daftar pelamar untuk lowongan ini
        $pelamarList = Pelamar::where('lowongan_id', $lowongan_id)
            ->with('users') // Ambil data pengguna yang melamar
            ->get();

        return view('perusahaan.kelolapelamar.perusahaan-kelolapelamar-detail', compact('lowongan', 'pelamarList', 'perusahaan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Diproses,Diterima,Ditolak',
        ]);

        $pelamar = Pelamar::findOrFail($id);
        $pelamar->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status lamaran berhasil diperbarui.');
    }
}
