<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\P3kPembiayaanController;
use App\Http\Controllers\Api\NasabahP3kController;
use App\Http\Controllers\Api\NasabahSkpdController;
use App\Http\Controllers\Api\NasabahUmkmController;
use App\Http\Controllers\Api\NasabahPasarController;
use App\Http\Controllers\Api\NasabahUltraMikroController;
use App\Http\Controllers\Api\NasabahPprController;
use App\Models\User;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('pembiayaan', P3kPembiayaanController::class);
});

// API data nasabah — hanya yang sudah disetujui Kabag (status 5)
// Wajib autentikasi Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/nasabah/p3k/{nik}', [NasabahP3kController::class, 'show']);
    Route::get('/nasabah/skpd/{nik}', [NasabahSkpdController::class, 'show']);
    Route::get('/nasabah/umkm/{nik}', [NasabahUmkmController::class, 'show']);
    Route::get('/nasabah/pasar/{nik}', [NasabahPasarController::class, 'show']);
    Route::get('/nasabah/ultra-mikro/{nik}', [NasabahUltraMikroController::class, 'show']);
    Route::get('/nasabah/ppr/{nik}', [NasabahPprController::class, 'show']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
