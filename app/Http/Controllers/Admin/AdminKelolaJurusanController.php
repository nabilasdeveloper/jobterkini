<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminKelolaJurusanController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $jurusanlist = Jurusan::orderBy('nama_jurusan', 'asc')->get();
        return view('admin.KelolaJurusan.admin-kelolajurusan', compact('admin', 'jurusanlist'));
    }

    public function add()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.KelolaJurusan.admin-kelolajurusan-add', compact('admin'));
    }

    public function adds(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|string'
        ]);

        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan
        ]);

        return redirect()->route('admin.kelolajurusan')->with('success', 'Data Jurusan berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();

        return redirect()->route('admin.kelolajurusan')->with('success', 'Data Perusahaan berhasil dihapus.');
    }
}
