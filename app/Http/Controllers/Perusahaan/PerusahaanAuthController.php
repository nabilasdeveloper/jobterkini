<?php

namespace App\Http\Controllers\Perusahaan;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerusahaanAuthController extends Controller
{
    public function index()
    {
        return view('auth.perusahaan-login');
    }

    public function showRegisterForm()
    {
        return view('auth.perusahaan-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'email_perusahaan' => 'required|email|unique:perusahaan,email_perusahaan',
            'password' => 'required|min:6',
            'file_verifikasi' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'nama_perusahaan.required' => 'Kolom nama perusahaan belum anda isi!',
            'email_perusahaan.required' => 'Kolom email perusahaan belum anda isi!',
            'email_perusahaan.unique' => 'Email sudah terdaftar, coba yang lain!',
            'password.required' => 'Kolom password belum anda isi!',
            'file_verifikasi.required' => 'Kolom file verifikasi belum anda isi!',
            'file_verifikasi.mimes' => 'file verifikasi hanya berupa. PDF, JPG, JPEG, PNG',
        ]);

        $filePath = $request->file('file_verifikasi')->store('verifikasi_perusahaan', 'public');

        $perusahaan = Perusahaan::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'email_perusahaan' => $request->email_perusahaan,
            'password' => Hash::make($request->password),
            'file_verifikasi' => $filePath,
            'status_verifikasi' => 'Pending',
        ]);

        auth()->guard('perusahaan')->login($perusahaan);

        return redirect()->route('perusahaan.dashboard')->with('status', 'Akun Anda sedang diverifikasi oleh admin.');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email_perusahaan' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email_perusahaan' => $request->email_perusahaan,
            'password' => $request->password,
        ];

        if (Auth::guard('perusahaan')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/perusahaan/dashboard');
        }

        return back()->withErrors(['email_perusahaan' => 'Email atau password salah.']);
    }


    public function logout(Request $request)
    {
        Auth::guard('perusahaan')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/perusahaan/login');
    }
}
