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

use Modules\Dirbis\Http\Controllers\PasarKomiteController;
use Modules\Dirbis\Http\Controllers\PasarNasabahController;
use Modules\Dirbis\Http\Controllers\PasarProposalController;
use Modules\Dirbis\Http\Controllers\SkpdKomiteController;
use Modules\Dirbis\Http\Controllers\SkpdNasabahController;
use Modules\Dirbis\Http\Controllers\SkpdProposalController;
use Modules\Dirbis\Http\Controllers\UmkmKomiteController;
use Modules\Dirbis\Http\Controllers\UmkmNasabahController;
use Modules\Dirbis\Http\Controllers\UmkmProposalController;
use Modules\Dirbis\Http\Controllers\PprProposalController;
use Modules\Dirbis\Http\Controllers\PprKomiteController;
use Modules\Dirbis\Http\Controllers\PprNasabahController;


Route::prefix('dirbis')->middleware(['auth:sanctum', 'role:2', 'divisi:0', 'jabatan:4'])->group(function () {
    Route::get('/', 'DirbisController@index');

    Route::prefix('skpd')->group(function () {
        Route::resource('/komite', SkpdKomiteController::class);
        Route::resource('/proposal', SkpdProposalController::class);
        Route::resource('/', SkpdProposalController::class);
        Route::resource('/nasabah', SkpdNasabahController::class);
    });

    Route::prefix('umkm')->group(function () {
        Route::resource('/komite', UmkmKomiteController::class);
        Route::resource('/proposal', UmkmProposalController::class);
        Route::resource('/', UmkmProposalController::class);
        Route::resource('/nasabah', UmkmNasabahController::class);
    });

    Route::prefix('pasar')->group(function () {
        Route::resource('/komite', PasarKomiteController::class);
        Route::resource('/proposal', PasarProposalController::class);
        Route::resource('/', PasarProposalController::class);
        Route::resource('/nasabah', PasarNasabahController::class);
    });

    Route::prefix('ppr')->group(function () {
        Route::resource('/komite', PprKomiteController::class);
        Route::resource('/proposal', PprProposalController::class);
        Route::resource('/', PprProposalController::class);
        Route::resource('/nasabah', PprNasabahController::class);
    });
});
