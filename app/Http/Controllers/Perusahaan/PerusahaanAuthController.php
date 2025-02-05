<?php

namespace App\Http\Controllers\Perusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PerusahaanAuthController extends Controller
{
    public function index()
    {
        return view('auth.perusahaan-login');
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
