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
use Modules\Akad\Http\Controllers\CetakAkadController;
use Modules\Akad\Http\Controllers\ProposalAkadController;
use Modules\Akad\Http\Controllers\SelesaiAkadController;


Route::prefix('staff')->middleware(['auth:sanctum', 'verified', 'role:1', 'divisi:5', 'jabatan:1'])->group(function () {
    Route::get('/', 'AkadController@index');
    Route::resource('/proposal', ProposalAkadController::class);
    Route::get('/proposal/pasar/{id}', [ProposalAkadController::class, 'showPasar']);
    Route::get('/proposal/umkm/{id}', [ProposalAkadController::class, 'showUmkm']);
    Route::get('/proposal/ppr/{id}', [ProposalAkadController::class, 'showPpr']);
    Route::get('/proposal/skpd/{id}', [ProposalAkadController::class, 'showSkpd']);
    Route::get('/cetak/pasar/{id}', [CetakAkadController::class, 'showPasar']);
    Route::get('/cetak/umkm/{id}', [CetakAkadController::class, 'showUmkm']);
    Route::get('/cetak/skpd/{id}', [CetakAkadController::class, 'showSkpd']);
    Route::resource('/selesai', SelesaiAkadController::class);
});
