<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pengalaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPengalamanController extends Controller
{
    public function index()
    {
        $pengalaman = Auth::user()->pengalaman;
        return response()->json($pengalaman);
    }

    public function store(Request $request)
    {
        $request->validate([
            'perusahaan' => 'required|string|max:255',
            'deskripsi_pekerjaan' => 'required|string',
            'bidang' => 'required|string|max:255',
            'tahun_mulai' => 'required|integer',
            'tahun_selesai' => 'nullable|integer',
        ]);

        $pengalaman = Pengalaman::create([
            'user_id' => Auth::id(),
            'perusahaan' => $request->perusahaan,
            'deskripsi_pekerjaan' => $request->deskripsi_pekerjaan,
            'bidang' => $request->bidang,
            'tahun_mulai' => $request->tahun_mulai,
            'tahun_selesai' => $request->tahun_selesai,
        ]);

        return response()->json($pengalaman, 201);
    }

    public function update(Request $request, $id){
        $pengalaman = Pengalaman::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'perusahaan' => 'required|string|max:255',
            'deskripsi_pekerjaan' => 'required|string',
            'bidang' => 'required|string|max:255',
            'tahun_mulai' => 'required|integer',
            'tahun_selesai' => 'nullable|integer',
        ]);

        $pengalaman->update([
            'perusahaan' => $request->perusahaan,
            'deskripsi_pekerjaan' => $request->deskripsi_pekerjaan,
            'bidag' => $request->bidag,
            'tahun_mulai' => $request->tahun_mulai,
            'tahun_selesai' => $request->tahun_selesai,
        ]);

        return response()->json($pengalaman);
    }

    public function destroy($id) {
        $pengalaman = Pengalaman::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $pengalaman->delete();

        return response()->json(['message' => 'Data pengalaman berhasil dihapus']);
    }
}
