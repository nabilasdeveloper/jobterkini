<?php

namespace App\Http\Controllers\Users;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserPerusahaanController extends Controller
{
    public function cari()
    {
        return view('Users.Perusahaan.user-cari-perusahaan');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $perusahaan = Perusahaan::withCount('lowongan')
            ->where('nama_perusahaan', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($perusahaan);
    }

    public function show($id)
    {
        $perusahaan = Perusahaan::with('lowongan')->findOrFail($id);

        return view('Users.Perusahaan.user-perusahaan-detail', compact('perusahaan'));
    }
}
