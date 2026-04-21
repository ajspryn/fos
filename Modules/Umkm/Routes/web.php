<?php

use Illuminate\Support\Facades\Route;
use Modules\Umkm\Http\Controllers\UmkmCetakController;
use Modules\Umkm\Http\Controllers\UmkmController;
use Modules\Umkm\Http\Controllers\UmkmKomiteController;
use Modules\Umkm\Http\Controllers\UmkmNasabahController;
use Modules\Umkm\Http\Controllers\UmkmProposalController;
use Modules\Umkm\Http\Controllers\UmkmRevisiController;

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

Route::prefix('umkm')->group(function () {
    Route::resource('/form', UmkmController::class);
});
Route::prefix('umkm')->middleware(['auth:sanctum', 'verified', 'role:2', 'divisi:3'])->group(function () {
    Route::get('/', 'UmkmController@index');
    Route::post('/bonmurabahah', 'UmkmKomiteController@upload')->name('umkm.bonmurabahah');
    Route::resource('/nasabah', UmkmNasabahController::class)->names('umkm.nasabah');
    Route::resource('/komite', UmkmKomiteController::class)->names('umkm.komite');
    Route::resource('/proposal', UmkmProposalController::class)->names('umkm.proposal');
    Route::resource('/revisi', UmkmRevisiController::class)->names('umkm.revisi');
    Route::resource('/cetak', UmkmCetakController::class)->names('umkm.cetak');
});
