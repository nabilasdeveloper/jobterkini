<?php

namespace App\Http\Controllers\Perusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pelamar;
use Illuminate\Support\Facades\Auth;

class PerusahaanDashboardController extends Controller
{
    public function index()
    {
        $perusahaan = Auth::guard('perusahaan')->user(); // Ambil data perusahaan yang sedang login

        // Ambil total pelamar
        $totalPelamar = Pelamar::whereHas('lowongan', function ($query) use ($perusahaan) {
            $query->where('perusahaan_id', $perusahaan->id);
        })->count();

        // Ambil jumlah lamaran masuk per bulan dalam 6 bulan terakhir
        $statusLamaran = Pelamar::join('lowongan', 'pelamar.lowongan_id', '=', 'lowongan.id')
            ->where('lowongan.perusahaan_id', $perusahaan->id)
            ->selectRaw('lowongan.nama_lowongan as kategori, COUNT(*) as jumlah')
            ->groupBy('lowongan.nama_lowongan')
            ->pluck('jumlah', 'kategori')
            ->toArray();


        return view('perusahaan.perusahaan-dashboard', compact([
            'perusahaan',
            'totalPelamar',
            'statusLamaran'
        ]));
    }
}
