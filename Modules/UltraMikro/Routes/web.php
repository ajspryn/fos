<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Modules\UltraMikro\Http\Controllers\UltraMikroCetakProposalController;
use Modules\UltraMikro\Http\Controllers\UltraMikroController;
use Modules\UltraMikro\Http\Controllers\UltraMikroKomiteController;
use Modules\UltraMikro\Http\Controllers\UltraMikroRevisiController;

Route::prefix('ultra_mikro')->group(function () {
    Route::resource('/pembiayaan', UltraMikroController::class)->names('ultra_mikro.pembiayaan');
});
Route::prefix('ultra_mikro')->middleware(['auth:sanctum', 'verified', 'role:2', 'divisi:7', 'jabatan:1'])->group(function () {
    Route::get('/', 'UltraMikroController@index');
    // Route::resource('/nasabah', P3kNasabahController::class);
    Route::resource('/proposal', UltraMikroCetakProposalController::class)->names('ultra_mikro.proposal');
    Route::resource('/komite', UltraMikroKomiteController::class)->names('ultra_mikro.komite');
    Route::resource('/revisi', UltraMikroRevisiController::class)->names('ultra_mikro.revisi');
    Route::resource('/cetak', UltraMikroCetakProposalController::class)->names('ultra_mikro.cetak');
});
