<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/user', [AuthController::class, 'getUser']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard-count', [AuthController::class, 'countData']);
    Route::put('/profile', [AuthController::class, 'updateProfile']);
    Route::apiResource('produk', ProdukController::class);
    Route::apiResource('mitra', MitraController::class);
    Route::apiResource('transaksi', TransaksiController::class);
    Route::post('/logout', [AuthController::class, 'logout']);

});
