<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminKelolaJurusanController;
use App\Http\Controllers\Perusahaan\PerusahaanAuthController;
use App\Http\Controllers\Admin\AdminKelolaPerusahaanController;
use App\Http\Controllers\Perusahaan\PerusahaanProfileController;
use App\Http\Controllers\Perusahaan\PerusahaanDashboardController;
use App\Http\Controllers\Perusahaan\PerusahaanKelolaLowonganController;
use App\Http\Controllers\Perusahaan\PerusahaanPelamarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'index'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/kelola-perusahaan', [AdminKelolaPerusahaanController::class, 'index'])->name('admin.kelolaperusahaan');
    Route::get('/kelola-perusahaan/add', [AdminKelolaPerusahaanController::class, 'add'])->name('admin.kelolaperusahaan.add');
    Route::post('/kelola-perusahaan/adds', [AdminKelolaPerusahaanController::class, 'adds'])->name('admin.kelolaperusahaan.adds');
    Route::get('/kelola-perusahaan/detail-perusahaan/{id}', [AdminKelolaPerusahaanController::class, 'show'])->name('admin.kelolaperusahaan.detail');
    Route::delete('/kelola-perusahaan/{id}', [AdminKelolaPerusahaanController::class, 'destroy'])->name('admin.perusahaan.destroy');

    Route::get('/kelola-jurusan', [AdminKelolaJurusanController::class, 'index'])->name('admin.kelolajurusan');
    Route::get('/kelola-jurusan/add', [AdminKelolaJurusanController::class, 'add'])->name('admin.kelolajurusan.add');
    Route::post('/kelola-jurusan/adds', [AdminKelolaJurusanController::class, 'adds'])->name('admin.kelolajurusan.adds');
    Route::delete('/kelola-jurusan/{id}', [AdminKelolaJurusanController::class, 'destroy'])->name('admin.kelolajurusan.destroy');
});

Route::prefix('perusahaan')->group(function () {
    Route::get('/login', [PerusahaanAuthController::class, 'index'])->name('perusahaan.login');
    Route::post('/login', [PerusahaanAuthController::class, 'login']);
    Route::post('/logout', [PerusahaanAuthController::class, 'logout'])->name('perusahaan.logout');
});

Route::prefix('perusahaan')->middleware(['perusahaan'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [PerusahaanDashboardController::class, 'index'])->name('perusahaan.dashboard');

    // Profil & Edit
    Route::get('/profile', [PerusahaanProfileController::class, 'index'])->name('perusahaan.profile');
    Route::post('/profile/update-profile', [PerusahaanProfileController::class, 'updateProfile'])->name('perusahaan.updateProfile');

    // Kelola Lowongan
    Route::get('/kelola-lowongan', [PerusahaanKelolaLowonganController::class, 'index'])->name('perusahaan.kelolalowongan');
    Route::get('/kelola-lowongan/detail-lowongan/{id}', [PerusahaanKelolaLowonganController::class, 'show'])->name('perusahaan.kelolalowongan.detail');
    Route::post('/kelola-lowongan/detail-lowongan/{id}/update-status', [PerusahaanKelolaLowonganController::class, 'ubahstatus'])->name('perusahaan.kelolalowongan.ubahstatus');
    Route::get('/kelola-lowongan/add', [PerusahaanKelolaLowonganController::class, 'add'])->name('perusahaan.kelolalowongan.add');
    Route::post('/kelola-lowongan/adds', [PerusahaanKelolaLowonganController::class, 'adds'])->name('perusahaan.kelolalowongan.adds');

    Route::get('/kelola-lowongan/edit/{id}', [PerusahaanKelolaLowonganController::class, 'edit'])->name('perusahaan.kelolalowongan.edit.form');
    Route::post('/kelola-lowongan/edit', [PerusahaanKelolaLowonganController::class, 'update'])->name('perusahaan.kelolalowongan.edit');

    Route::delete('/kelola-lowongan/{id}', [PerusahaanKelolaLowonganController::class, 'destroy'])->name('perusahaan.kelolalowongan.destroy');

    // Kelola Pendaftar
    Route::get('/kelola-pelamar', [PerusahaanPelamarController::class, 'index'])->name('perusahaan.kelolapelamar');
    Route::get('/pelamar/{lowongan_id}', [PerusahaanPelamarController::class, 'detail'])->name('perusahaan.kelolapelamar.detail');
    Route::put('/pelamar/update/{id}', [PerusahaanPelamarController::class, 'updateStatus'])->name('perusahaan.kelolapelamar.update');
});
