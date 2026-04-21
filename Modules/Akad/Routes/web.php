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
use Modules\Akad\Http\Controllers\RegisterAkadController;
use Modules\Akad\Http\Controllers\SelesaiAkadController;


Route::prefix('staff')->middleware(['auth:sanctum', 'verified', 'role:1', 'divisi:5', 'jabatan:1'])->group(function () {
    Route::get('/', 'AkadController@index');
    Route::resource('/proposal', ProposalAkadController::class);
    Route::resource('/register-akad', RegisterAkadController::class);
    Route::resource('/selesai', SelesaiAkadController::class);
    Route::get('/proposal/pasar/{id}', [ProposalAkadController::class, 'showPasar']);
    Route::get('/proposal/umkm/{id}', [ProposalAkadController::class, 'showUmkm']);
    Route::get('/proposal/ppr/{id}', [ProposalAkadController::class, 'showPpr']);
    Route::get('/proposal/skpd/{id}', [ProposalAkadController::class, 'showSkpd']);
    Route::get('/proposal/p3k/{id}', [ProposalAkadController::class, 'showP3k']);
    Route::get('/selesai/pasar/{id}', [SelesaiAkadController::class, 'showPasar']);
    Route::get('/selesai/umkm/{id}', [SelesaiAkadController::class, 'showUmkm']);
    Route::get('/selesai/ppr/{id}', [SelesaiAkadController::class, 'showPpr']);
    Route::get('/selesai/skpd/{id}', [SelesaiAkadController::class, 'showSkpd']);
    Route::get('/selesai/p3k/{id}', [SelesaiAkadController::class, 'showP3k']);
    Route::get('/cetak/pasar/{id}', [CetakAkadController::class, 'showPasar']);
    Route::get('/cetak/umkm/{id}', [CetakAkadController::class, 'showUmkm']);
    Route::get('/cetak/skpd/{id}', [CetakAkadController::class, 'showSkpd']);
    Route::get('/cetak/p3k/{id}', [CetakAkadController::class, 'showP3k']);

    //Register Akad
    Route::get('/register/{category}/{id}', [RegisterAkadController::class, 'show']);

    Route::resource('/selesai', SelesaiAkadController::class);
});
