<?php

namespace App\Http\Controllers\Api;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pelamar;

class UserLowonganController extends Controller
{
    public function lowongan()
    {
        $perusahaan = Perusahaan::withCount([
            'lowongan' => function ($query) {
                $query->where('status_lowongan', 'Aktif'); // Hanya hitung lowongan dengan status "Aktif"
            }
        ])->get();

        $lowongan = Lowongan::with('perusahaan')
            ->where('status_lowongan', 'Aktif') // Hanya ambil lowongan yang statusnya "Aktif"
            ->latest()
            ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Data lowongan berhasil diambil',
            'data' => [
                'perusahaan' => $perusahaan,
                'lowongan' => $lowongan
            ]
        ], 200);
    }

    public function showLowongan($id)
    {
        // Cari lowongan berdasarkan ID, jika tidak ditemukan, kembalikan response JSON dengan error
        $lowongan = Lowongan::with('perusahaan')->find($id);

        if (!$lowongan) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        // Ambil lowongan lain dari perusahaan yang sama, kecuali yang sedang dibuka, dan hanya yang "Aktif"
        $lowonganLain = Lowongan::where('perusahaan_id', $lowongan->perusahaan_id)
            ->where('id', '!=', $id)
            ->where('status_lowongan', 'Aktif')
            ->latest()
            ->get();

        $sudahMelamar = Pelamar::where('users_id', auth('sanctum')->id())
            ->where('lowongan_id', $id)
            ->exists();

        return response()->json([
            'message' => 'Data berhasil ditemukan!',
            'lowongan' => $lowongan,
            'lowongan_lain' => $lowonganLain,
            'sudah_melamar' => $sudahMelamar
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return response()->json([
                'status' => 'error',
                'message' => 'Parameter q diperlukan untuk pencarian.'
            ], 400);
        }

        $lowongan = Lowongan::with('perusahaan')
            ->where('nama_lowongan', 'LIKE', "%{$query}%")
            ->orWhereHas('perusahaan', function ($q) use ($query) {
                $q->where('nama_perusahaan', 'LIKE', "%{$query}%");
            })->get();

        if ($lowongan->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Lowongan tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $lowongan
        ]);
    }
}
