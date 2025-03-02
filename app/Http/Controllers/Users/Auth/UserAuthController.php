<?php

namespace App\Http\Controllers\Users\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function formRegister()
    {
        return view('Users.Auth.user-register');
    }

    public function formLogin()
    {
        return view('Users.Auth.user-login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:225',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'nama.required' => 'Kolom Nama dibutuhkan!',
            'email.required' => 'Kolom Email dibutuhkan!',
            'email.email' => 'Masukkan Email yang valid!',
            'email.unique' => 'Email sudah terdaftar!',

            'password.required' => 'Kolom Password dibutuhkan!',
            'password.min' => 'Kolom Password minimal 8 huruf!',
            'password.confirmed' => 'Harap masukkan password yang sama',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('user')->login($user);

        return redirect()->route('user-dashboard')->with('success', 'Akun anda berhasil di daftarkan!');
    }

    public function login(Request $request)
    {
        $data = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8',
            ],
            [
                'email.required' => 'Kolom Email dibutuhkan!',
                'email.email' => 'Tolong masukkan email yang valid!',

                'password.required' => 'Kolom Password dibutuhkan!',
                'password.min' => 'Kolom Password minimal 8 huruf!',
            ]
        );

        if (Auth::guard('user')->attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('user-dashboard')->with('success', 'Anda berhasil login!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ]);
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('user-login');
    }
}
