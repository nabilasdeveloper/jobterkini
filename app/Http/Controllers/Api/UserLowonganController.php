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
        try {
            $perusahaan = Perusahaan::withCount([
                'lowongan' => function ($query) {
                    $query->where('status_lowongan', 'Aktif');
                }
            ])->get();

            $lowongan = Lowongan::with('perusahaan')
                ->where('status_lowongan', 'Aktif')
                ->latest()
                ->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Data lowongan berhasil diambil',
                'data' => [
                    // 'perusahaan' => $perusahaan,
                    'lowongan' => $lowongan
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
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

        $lowongan = Lowongan::with(['perusahaan' => function ($query) {
            $query->select('id', 'nama_perusahaan', 'email_perusahaan', 'contact_perusahaan', 'deskripsi_perusahaan', 'alamat_perusahaan', 'jenis_industri_perusahaan', 'website_perusahaan', 'img_perusahaan');
        }])
            ->where('nama_lowongan', 'LIKE', "%{$query}%")
            ->orWhereHas('perusahaan', function ($q) use ($query) {
                $q->where('nama_perusahaan', 'LIKE', "%{$query}%");
            })
            ->orWhere('jurusan_pendidikan_lowongan', 'LIKE', "%{$query}%")
            ->orWhere('kategori_lowongan', 'LIKE', "%{$query}%")
            ->orWhere('waktu_bekerja', 'LIKE', "%{$query}%")
            ->get();


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
