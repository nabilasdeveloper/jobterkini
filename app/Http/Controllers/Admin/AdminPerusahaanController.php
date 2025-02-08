<?php

namespace App\Http\Controllers\Admin;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminPerusahaanController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $perusahaan = Perusahaan::where('status_verifikasi', 'Pending')->get();
        return view('admin.verifikasi-perusahaan', compact('perusahaan', 'admin'));
    }

    public function approve($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->update(['status_verifikasi' => 'Verified']);

        return redirect()->back()->with('success', 'Perusahaan berhasil diverifikasi.');
    }

    public function reject($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        Storage::delete('public/' . $perusahaan->file_verifikasi);
        $perusahaan->delete();

        return redirect()->back()->with('error', 'Perusahaan ditolak.');
    }
}
