<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [\App\Services\Login::class, 'index']);

Route::middleware('auth:api')->group(function () {
    Route::get('/stok', [\App\Services\GetStokKendaraan::class, 'index']);
    Route::get('/penjualan', [\App\Services\GetPenjualanKendaraan::class, 'index']);
    Route::get('/laporan', [\App\Services\GetLaporanPenjualanKendaraan::class, 'index']);
});
