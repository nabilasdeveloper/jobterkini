<?php

namespace App\Http\Controllers\Perusahaan;

use App\Models\User;
use App\Models\Pelamar;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PerusahaanPelamarController extends Controller
{
    public function index()
    {
        $perusahaan = Auth::guard('perusahaan')->user();
        $lowonganList = Lowongan::where('perusahaan_id', $perusahaan->id)
            ->withCount('pelamar')
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

        $pelamarList = Pelamar::where('lowongan_id', $lowongan_id)
            ->with('users')
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

    public function show($id)
    {
        $user = User::with(['pendidikan', 'pengalaman'])->findOrFail($id);
        return view('Perusahaan.Kelolapelamar.perusahaan-user-detail', compact('user'));
    }
}
