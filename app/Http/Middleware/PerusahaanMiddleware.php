<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PerusahaanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next) : Response
    {
        if (!Auth::guard('perusahaan')->check()) {
            return redirect('/perusahaan/login')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }

}
