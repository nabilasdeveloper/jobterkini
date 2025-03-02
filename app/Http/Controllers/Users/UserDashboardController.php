<?php

namespace App\Http\Controllers\Users;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pelamar;

class UserDashboardController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::withCount([
            'lowongan' => function ($query) {
                $query->where('status_lowongan', 'Aktif');
            }
        ])->get();

        $lowongan = Lowongan::with('perusahaan')
            ->where('status_lowongan', 'Aktif')
            ->latest()
            ->get();

        return view('Users.user-index', compact([
            'perusahaan',
            'lowongan'
        ]));
    }

    public function showLowongan($id)
    {
        $lowongan = Lowongan::with('perusahaan')->findOrFail($id);

        $lowonganLain = Lowongan::where('perusahaan_id', $lowongan->perusahaan_id)
            ->where('id', '!=', $id)
            ->where('status_lowongan', 'Aktif')
            ->latest()
            ->get();
        $sudahMelamar = Pelamar::where('users_id', auth('user')->id())
            ->where('lowongan_id', $id)
            ->exists();

        return view('Users.Lowongan.user-lowongan-detail', compact([
            'lowongan',
            'lowonganLain',
            'sudahMelamar'
        ]));
    }
}
