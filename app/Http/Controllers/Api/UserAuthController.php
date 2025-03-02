<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('secret')->plainTextToken;

        return response()->json([
            'message' => 'Registrasi akun berhasil!',
            'data' => $user,
            'token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function login(Request $request)
    {

        $cek = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (!Auth::attempt($cek)) {
            return response([
                'message' => 'Email atau password salah!'
            ], 401);
        }

        $token = auth()->user()->createToken('secret')->plainTextToken;

        return response()->json([
            'user' => auth()->user(),
            'message' => 'Login success',
            'token' => $token,
            'token_type' => 'Bearer',
        ], 200);
    }

    public function user()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json([
            'message' => 'Data berhasil ditemukan',
            'id' => $user->id,
            'nama' => $user->nama,
            'deskripsi' => $user->deskripsi,
            'alamat' => $user->alamat,
            'contact' => $user->contact,
            'foto' => $user->foto ? asset('storage/' . $user->foto) : null,
        ]);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'message' => 'Logout berhasil!'
        ]);
    }
}
