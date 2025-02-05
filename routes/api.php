<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserAuthController;
use App\Http\Controllers\Api\UserBookmarkController;
use App\Http\Controllers\Api\UserLamaranController;
use App\Http\Controllers\Api\UserLowonganController;
use App\Http\Controllers\Api\UserPerusahaanController;
use App\Http\Controllers\Api\UserProfileController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login', [UserAuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/profile', [UserProfileController::class, 'profile']);

    Route::get('/lowongan', [UserLowonganController::class, 'lowongan']);
    Route::get('/lowongan/{id}', [UserLowonganController::class, 'showLowongan']);
    Route::get('/cari-lowongan', [UserLowonganController::class, 'search']);

    Route::get('/bookmarks', [UserBookmarkController::class, 'index']);
    Route::post('/bookmarks', [UserBookmarkController::class, 'store']);
    Route::delete('/bookmarks/{id}', [UserBookmarkController::class, 'destroy']);

    Route::post('/lamaran/{id}', [UserLamaranController::class, 'store']);
    Route::get('/lamaran/history', [UserLamaranController::class, 'history']);

    Route::get('/list-perusahaan/{id}', [UserPerusahaanController::class, 'show']);
    Route::get('/cari-perusahaan', [UserPerusahaanController::class, 'search']);

    Route::post('/logout', [UserAuthController::class, 'logout']);
});
