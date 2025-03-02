<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Users\UserPelamarController;
use App\Http\Controllers\Users\UserProfileController;
use App\Http\Controllers\Users\UserBookmarkController;
use App\Http\Controllers\Users\UserLowonganController;
use App\Http\Controllers\Users\Auth\UserAuthController;
use App\Http\Controllers\Users\UserDashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Users\UserPerusahaanController;
use App\Http\Controllers\Admin\AdminPerusahaanController;
use App\Http\Controllers\Admin\AdminKelolaJurusanController;
use App\Http\Controllers\Perusahaan\PerusahaanAuthController;
use App\Http\Controllers\Admin\AdminKelolaPerusahaanController;
use App\Http\Controllers\Perusahaan\PerusahaanPelamarController;
use App\Http\Controllers\Perusahaan\PerusahaanProfileController;
use App\Http\Controllers\Perusahaan\PerusahaanDashboardController;
use App\Http\Controllers\Perusahaan\PerusahaanKelolaLowonganController;

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

    Route::get('/verifikasi-perusahaan', [AdminPerusahaanController::class, 'index'])->name('admin.verifikasi');
    Route::post('/verifikasi-perusahaan/{id}/verified', [AdminPerusahaanController::class, 'approve'])->name('admin.verifikasi.approve');
    Route::post('/verifikasi-perusahaan/{id}/reject', [AdminPerusahaanController::class, 'reject'])->name('admin.verifikasi.reject');
});

Route::prefix('perusahaan')->group(function () {
    Route::get('/register', [PerusahaanAuthController::class, 'showRegisterForm'])->name('perusahaan.register.form');
    Route::post('/register', [PerusahaanAuthController::class, 'register'])->name('perusahaan.register');

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
});

Route::prefix('perusahaan')->middleware(['perusahaan', 'perusahaan.verified'])->group(function () {
    // Kelola Lowongan
    Route::get('/kelola-lowongan', [PerusahaanKelolaLowonganController::class, 'index'])->name('perusahaan.kelolalowongan');
    Route::get('/kelola-lowongan/add', [PerusahaanKelolaLowonganController::class, 'add'])->name('perusahaan.kelolalowongan.add');
    Route::post('/kelola-lowongan/adds', [PerusahaanKelolaLowonganController::class, 'adds'])->name('perusahaan.kelolalowongan.adds');
    Route::get('/kelola-lowongan/edit/{id}', [PerusahaanKelolaLowonganController::class, 'edit'])->name('perusahaan.kelolalowongan.edit');
    Route::post('/kelola-lowongan/update', [PerusahaanKelolaLowonganController::class, 'update'])->name('perusahaan.kelolalowongan.update');
    Route::delete('/kelola-lowongan/{id}', [PerusahaanKelolaLowonganController::class, 'destroy'])->name('perusahaan.kelolalowongan.destroy');
    Route::get('/kelola-lowongan/detail/{id}', [PerusahaanKelolaLowonganController::class, 'show'])->name('perusahaan.kelolalowongan.detail');
    Route::get('/kelola-lowongan/ubahstatus/{id}', [PerusahaanKelolaLowonganController::class, 'ubahStatus'])->name('perusahaan.kelolalowongan.ubahstatus');


    // Kelola Pendaftar
    Route::get('/kelola-pelamar', [PerusahaanPelamarController::class, 'index'])->name('perusahaan.kelolapelamar');
    Route::get('/pelamar/{lowongan_id}', [PerusahaanPelamarController::class, 'detail'])->name('perusahaan.kelolapelamar.detail');
    Route::put('/pelamar/update/{id}', [PerusahaanPelamarController::class, 'updateStatus'])->name('perusahaan.kelolapelamar.update');
    Route::get('/pelamar/user/{id}', [PerusahaanPelamarController::class, 'show'])->name('perusahaan.kelolapelamar.user.detail');

});

Route::prefix('job-terkini')->group(function () {
    Route::get('/register', [UserAuthController::class, 'formRegister'])->name('user-register');
    Route::post('/register', [UserAuthController::class, 'register'])->name('user-registerin');

    Route::get('/login', [UserAuthController::class, 'formLogin'])->name('user-login');
    Route::post('/login', [UserAuthController::class, 'login'])->name('user-loginin');
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('user-logout');
});

Route::prefix('job-terkini')->middleware(['userMiddleware'])->group(function () {
    Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('user-profile');
    Route::post('/profile/update', [UserProfileController::class, 'update'])->name('user-update');

    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user-dashboard');

    Route::get('/list-perusahaan/{id}', [UserPerusahaanController::class, 'show'])->name('user-perusahaan-detail');

    Route::get('/cari-lowongan', [UserLowonganController::class, 'cari'])->name('user-lowongan-search');
    Route::get('/cari-lowongans', [UserLowonganController::class, 'search'])->name('user-lowongan-searchs');

    Route::get('/cari-perusahaan', [UserPerusahaanController::class, 'cari'])->name('user-perusahaan-search');
    Route::get('/cari-perusahaans', [UserPerusahaanController::class, 'search'])->name('user-perusahaan-searchs');
});

Route::prefix('job-terkini')->middleware(['userMiddleware', 'profile-complete'])->group(function () {
    Route::get('/bookmarks', [UserBookmarkController::class, 'index'])->name('bookmarks-index');
    Route::post('/bookmarks', [UserBookmarkController::class, 'store'])->name('bookmarks-store');
    Route::delete('/bookmarks/{id}', [UserBookmarkController::class, 'destroy'])->name('bookmarks-destroy');

    Route::get('/lamaran/create/{id}', [UserPelamarController::class, 'create'])->name('user-lamaran-create');
    Route::post('/lamaran/{id}', [UserPelamarController::class, 'store'])->name('user-lamaran-store');
    Route::get('/lamaran/history', [UserPelamarController::class, 'history'])->name('user-lamaran-history');

    Route::get('/lowongan/{id}', [UserDashboardController::class, 'showLowongan'])->name('lowongan-detail');
});
