<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user(); // Ambil data admin yang sedang login
        return view('admin.admin-dashboard', compact('admin'));
    }
}
