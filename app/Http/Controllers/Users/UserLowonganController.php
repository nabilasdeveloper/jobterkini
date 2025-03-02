<?php

namespace App\Http\Controllers\Users;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserLowonganController extends Controller
{
    public function cari()
    {
        return view('Users.Lowongan.user-cari-lowongan');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $lowongan = Lowongan::with('perusahaan')
            ->where('nama_lowongan', 'LIKE', "%{$query}%")
            ->orWhereHas('perusahaan', function ($q) use ($query) {
                $q->where('nama_perusahaan', 'LIKE', "%{$query}%");
            })->get();
        return response()->json($lowongan);
    }
}
