<?php

namespace App\Http\Controllers\Api;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserPerusahaanController extends Controller
{
    public function show($id)
    {
        $perusahaan = Perusahaan::with('lowongan')->find($id);

        if (!$perusahaan) {
            return response()->json(['status' => 'error', 'message' => 'Perusahaan tidak ditemukan'], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $perusahaan
        ]);
    }

    // GET /cari-perusahaan (Pencarian perusahaan berdasarkan nama)
    public function search(Request $request)
    {
        $query = $request->input('q');

        $perusahaan = Perusahaan::withCount('lowongan')
            ->where('nama_perusahaan', 'LIKE', "%{$query}%")
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $perusahaan
        ]);
    }
}
