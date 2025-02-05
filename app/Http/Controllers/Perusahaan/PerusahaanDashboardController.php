<?php

namespace App\Http\Controllers\Perusahaan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PerusahaanDashboardController extends Controller
{
    public function index()
    {
        $perusahaan = Auth::guard('perusahaan')->user(); // Ambil data admin yang sedang login
        return view('perusahaan.perusahaan-dashboard', compact('perusahaan'));
    }
}
