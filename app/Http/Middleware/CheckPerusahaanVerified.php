<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPerusahaanVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->guard('perusahaan')->user()->status_verifikasi !== 'Verified') {
            return redirect()->route('perusahaan.dashboard')->with('error', 'Akun Anda belum diverifikasi oleh admin.');
        }

        // Simpan pesan ke session hanya jika baru saja diverifikasi
        if (!$request->session()->has('verified_message')) {
            session()->flash('success', 'Akun Anda telah diverifikasi.');
            session()->put('verified_message', true);
        }

        return $next($request);
    }
}
