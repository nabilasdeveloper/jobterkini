<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserAuthController;
use App\Http\Controllers\Api\UserOtherController;
use App\Http\Controllers\Api\UserLamaranController;
use App\Http\Controllers\Api\UserProfileController;
use App\Http\Controllers\Api\UserBookmarkController;
use App\Http\Controllers\Api\UserLowonganController;
use App\Http\Controllers\Api\UserPendidikanController;
use App\Http\Controllers\Api\UserPengalamanController;
use App\Http\Controllers\Api\UserPerusahaanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login', [UserAuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserAuthController::class, 'user']);
    Route::post('/profile', [UserProfileController::class, 'profile']);

    Route::get('/pendidikan', [UserPendidikanController::class, 'index']);
    Route::post('/pendidikan', [UserPendidikanController::class, 'store']);
    Route::put('/pendidikan/{id}', [UserPendidikanController::class, 'update']);
    Route::delete('/pendidikan/{id}', [UserPendidikanController::class, 'destroy']);

    Route::get('/pengalaman', [UserPengalamanController::class, 'index']);
    Route::post('/pengalamans', [UserPengalamanController::class, 'store']);
    Route::put('/pengalaman/{id}', [UserPengalamanController::class, 'update']);
    Route::delete('/pengalaman/{id}', [UserPengalamanController::class, 'destroy']);

    Route::get('/lowongan', [UserLowonganController::class, 'lowongan']);
    Route::get('/lowongan/{id}', [UserLowonganController::class, 'showLowongan']);
    Route::get('/cari-lowongan', [UserLowonganController::class, 'search']);

    Route::get('/bookmarks', [UserBookmarkController::class, 'index']);
    Route::get('/bookmarks/check/{id}', [UserBookmarkController::class, 'checkBookmark']);
    Route::post('/bookmarksadd', [UserBookmarkController::class, 'store']);
    Route::delete('/bookmarks/{id}', [UserBookmarkController::class, 'destroy']);

    Route::post('/lamaran/{id}', [UserLamaranController::class, 'store']);
    Route::get('/lamaran/check/{id}', [UserLamaranController::class, 'checkLamaran']);
    Route::get('/lamaran/history', [UserLamaranController::class, 'history']);

    Route::get('/list-perusahaan/{id}', [UserPerusahaanController::class, 'show']);
    Route::get('/cari-perusahaan', [UserPerusahaanController::class, 'search']);

    Route::get('/users/search', [UserOtherController::class, 'search']);
    Route::get('/users/{id}', [UserOtherController::class, 'show']);

    Route::post('/logout', [UserAuthController::class, 'logout']);
});
