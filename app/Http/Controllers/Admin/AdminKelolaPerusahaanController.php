<?php

namespace App\Http\Controllers\Admin;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminKelolaPerusahaanController extends Controller
{
    public function index()
    {
        $dataperusahaan = Perusahaan::all();
        $admin = Auth::guard('admin')->user(); // Ambil data admin yang sedang login
        return view('admin.KelolaPerusahaan.admin-kelolaperusahaan', compact([
            'admin',
            'dataperusahaan'
        ]));
    }

    public function add(){
        $admin = Auth::guard('admin')->user(); // Ambil data admin yang sedang login
        return view('Admin.KelolaPerusahaan.admin-kelolaperusahaan-add', compact('admin'));
    }

    public function adds(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'email_perusahaan' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);
        
        Perusahaan::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'email_perusahaan' => $request->email_perusahaan,
            'password' => Hash::make($request->password),
        ]);
        
        
        return redirect()->route('admin.kelolaperusahaan')->with('success', 'Data perusahaan berhasil ditambahkan.');
    }
    
    public function show($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        return view('admin.KelolaPerusahaan.admin-kelolaperusahaan-detail', compact('perusahaan'));
    }

    public function destroy($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();
    
        return redirect()->route('admin.kelolaperusahaan')->with('success', 'Data Perusahaan berhasil dihapus.');
    }
}
