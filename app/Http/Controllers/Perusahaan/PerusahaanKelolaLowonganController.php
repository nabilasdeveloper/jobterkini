<?php

namespace App\Http\Controllers\Perusahaan;

use App\Models\Jurusan;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PerusahaanKelolaLowonganController extends Controller
{
    public function index()
    {
        $perusahaan = Auth::guard('perusahaan')->user(); // Ambil data perusahaan yang sedang login
        $lowongan = Lowongan::where('perusahaan_id', $perusahaan->id)->get(); // Gunakan perusahaan->id
        return view('perusahaan.KelolaLowongan.perusahaan-kelolalowongan', compact([
            'perusahaan',
            'lowongan'
        ]));
    }

    public function show($id)
    {
        $perusahaan = Auth::guard('perusahaan')->user(); // Perusahaan yang sedang login
        $lowongan = Lowongan::with('perusahaan')
            ->where('id', $id)
            ->where('perusahaan_id', $perusahaan->id) // Pastikan lowongan milik perusahaan login
            ->first();

        if (!$lowongan) {
            return redirect()->route('perusahaan.kelolalowongan')
                ->with('error', 'Lowongan tidak ditemukan atau Anda tidak memiliki akses.');
        }

        return view('perusahaan.KelolaLowongan.perusahaan-kelolalowongan-detail', compact(
            'lowongan'
        ));
    }

    public function add()
    {
        $perusahaan = Auth::guard('perusahaan')->user();
        $jurusanList = Jurusan::all();
        return view('perusahaan.kelolalowongan.perusahaan-kelolalowongan-add', compact('perusahaan', 'jurusanList'));
    }


    public function adds(Request $request)
    {
        $validated = $request->validate([
            'nama_lowongan' => 'required|string|max:255',
            'jenjang_pendidikan_lowongan' => 'required',
            'jurusan_pendidikan_lowongan' => 'required|array', // Pastikan input sebagai array
            'persyaratan_lowongan' => 'required|string',
            'penutupan_lowongan' => 'required|date',
            'rincian_lowongan' => 'required|string',
            'kategori_lowongan' => 'required|string',
            'waktu_bekerja' => 'required|in:Full Time, Harian, Paruh Waktu',
            'gaji_perbulan' => 'required|string',
            'status_lowongan' => 'required|in:Aktif,Non-Aktif',
        ]);

        try {
            Lowongan::create([
                'perusahaan_id' => auth('perusahaan')->user()->id,
                'nama_lowongan' => $request->nama_lowongan,
                'jenjang_pendidikan_lowongan' => $request->jenjang_pendidikan_lowongan,
                'jurusan_pendidikan_lowongan' => implode(', ', $request->jurusan_pendidikan_lowongan), // Simpan sebagai string
                'persyaratan_lowongan' => $request->persyaratan_lowongan,
                'penutupan_lowongan' => $request->penutupan_lowongan,
                'rincian_lowongan' => $request->rincian_lowongan,
                'kategori_lowongan' => $request->kategori_lowongan,
                'waktu_bekerja' => $request->waktu_bekerja,
                'gaji_perbulan' => $request->gaji_perbulan,
                'status_lowongan' => $request->status_lowongan,
            ]);

            return redirect()->route('perusahaan.kelolalowongan')->with('success', 'Lowongan berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan, coba lagi.']);
        }
    }


    public function edit($id)
    {
        $perusahaan = Auth::guard('perusahaan')->user();
        // Ambil lowongan berdasarkan ID dan perusahaan yang sedang login
        $lowongan = Lowongan::where('id', $id)
            ->where('perusahaan_id', Auth::guard('perusahaan')->id())
            ->firstOrFail();

        return view('perusahaan.KelolaLowongan.perusahaan-kelolalowongan-edit', compact('lowongan', 'perusahaan'));
    }


    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'lowongan_id' => 'required|exists:lowongan,id',
            'nama_lowongan' => 'required|string|max:255',
            'jenjang_pendidikan_lowongan' => 'nullable|string',
            'jurusan_pendidikan_lowongan' => 'nullable|string',
            'persyaratan_lowongan' => 'nullable|string',
            'penutupan_lowongan' => 'required|date',
            'rincian_lowongan' => 'required|string',
            'kategori_lowongan' => 'required|string',
            'waktu_bekerja' => 'required|string',
            'gaji_perbulan' => 'nullable|string',
            'status_lowongan' => 'required|in:Aktif,Non-Aktif',
        ]);

        // Ambil lowongan berdasarkan ID
        $lowongan = Lowongan::where('id', $request->lowongan_id)
            ->where('perusahaan_id', Auth::guard('perusahaan')->id()) // Pastikan hanya perusahaan yang memiliki lowongan bisa edit
            ->firstOrFail();

        // Update data lowongan
        $lowongan->update([
            'nama_lowongan' => $request->nama_lowongan,
            'jenjang_pendidikan_lowongan' => $request->jenjang_pendidikan_lowongan,
            'jurusan_pendidikan_lowongan' => $request->jurusan_pendidikan_lowongan,
            'persyaratan_lowongan' => $request->persyaratan_lowongan,
            'penutupan_lowongan' => $request->penutupan_lowongan,
            'rincian_lowongan' => $request->rincian_lowongan,
            'kategori_lowongan' => $request->kategori_lowongan,
            'waktu_bekerja' => $request->waktu_bekerja,
            'gaji_perbulan' => $request->gaji_perbulan,
            'status_lowongan' => $request->status_lowongan,
        ]);

        return redirect()->back()->with('success', 'Lowongan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->delete();

        return redirect()->route('perusahaan.kelolalowongan')->with('success', 'Data Lowongan berhasil dihapus.');
    }


    public function ubahstatus(Request $request, $id)
    {
        $request->validate([
            'status_lowongan' => 'required|in:Aktif,Non-Aktif',
        ]);

        $lowongan = Lowongan::where('id', $id)
            ->where('perusahaan_id', Auth::guard('perusahaan')->id()) // Filter berdasarkan perusahaan yang login
            ->firstOrFail();

        $lowongan->status_lowongan = $request->status_lowongan;
        $lowongan->save();

        return redirect()->back()->with('success', 'Status lowongan berhasil diperbarui.');
    }
}
