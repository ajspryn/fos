<?php

use Illuminate\Support\Facades\Route;
use Modules\Analis\Http\Controllers\PasarKomiteController;
use Modules\Analis\Http\Controllers\PasarNasabahController;
use Modules\Analis\Http\Controllers\PasarProposalController;
use Modules\Analis\Http\Controllers\SkpdKomiteController;
use Modules\Analis\Http\Controllers\SkpdNasabahController;
use Modules\Analis\Http\Controllers\SkpdProposalController;
use Modules\Analis\Http\Controllers\UmkmNasabahController;
use Modules\Analis\Http\Controllers\PprProposalController;
use Modules\Analis\Http\Controllers\PprKomiteController;
use Modules\Analis\Http\Controllers\PprNasabahController;
use Modules\Analis\Http\Controllers\P3kProposalController;
use Modules\Analis\Http\Controllers\P3kKomiteController;
use Modules\Analis\Http\Controllers\P3kNasabahController;
use Modules\Analis\Http\Controllers\UltraMikroProposalController;
use Modules\Analis\Http\Controllers\UltraMikroKomiteController;
use Modules\Analis\Http\Controllers\UltraMikroNasabahController;
use Modules\Analis\Http\Controllers\UmkmKomiteController;
use Modules\Analis\Http\Controllers\UmkmProposalController;

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

Route::prefix('analis')->middleware(['auth:sanctum', 'role:2', 'divisi:0', 'jabatan:3'])->group(function () {
    Route::get('/', 'AnalisController@index')->name('analis.index');

    Route::prefix('skpd')->group(function () {
        Route::resource('/komite', SkpdKomiteController::class)->names('analis.skpd.komite');
        Route::resource('/proposal', SkpdProposalController::class)->names('analis.skpd.proposal');
        Route::resource('/', SkpdProposalController::class)->only(['index', 'create', 'store'])->names('analis.skpd.index');
        Route::resource('/nasabah', SkpdNasabahController::class)->names('analis.skpd.nasabah');
    });

    Route::prefix('umkm')->group(function () {
        Route::resource('/komite', UmkmKomiteController::class)->names('analis.umkm.komite');
        Route::resource('/proposal', UmkmProposalController::class)->names('analis.umkm.proposal');
        Route::resource('/', UmkmProposalController::class)->only(['index', 'create', 'store'])->names('analis.umkm.index');
        Route::resource('/nasabah', UmkmNasabahController::class)->names('analis.umkm.nasabah');
    });

    Route::prefix('pasar')->group(function () {
        Route::resource('/komite', PasarKomiteController::class)->names('analis.pasar.komite');
        Route::resource('/proposal', PasarProposalController::class)->names('analis.pasar.proposal');
        Route::resource('/', PasarProposalController::class)->only(['index', 'create', 'store'])->names('analis.pasar.index');
        Route::resource('/nasabah', PasarNasabahController::class)->names('analis.pasar.nasabah');
    });

    Route::prefix('ppr')->group(function () {
        Route::resource('/komite', PprKomiteController::class)->names('analis.ppr.komite');
        Route::resource('/proposal', PprProposalController::class)->names('analis.ppr.proposal');
        Route::resource('/', PprProposalController::class)->only(['index', 'create', 'store'])->names('analis.ppr.index');
        Route::resource('/nasabah', PprNasabahController::class)->names('analis.ppr.nasabah');
    });

    Route::prefix('p3k')->group(function () {
        Route::resource('/komite', P3kKomiteController::class)->names('analis.p3k.komite');
        Route::resource('/proposal', P3kProposalController::class)->names('analis.p3k.proposal');
        Route::resource('/', P3kProposalController::class)->only(['index', 'create', 'store'])->names('analis.p3k.index');
        Route::resource('/nasabah', P3kNasabahController::class)->names('analis.p3k.nasabah');
    });

    Route::prefix('ultra_mikro')->group(function () {
        Route::resource('/komite', UltraMikroKomiteController::class)->names('analis.ultra_mikro.komite');
        Route::resource('/proposal', UltraMikroProposalController::class)->names('analis.ultra_mikro.proposal');
        Route::resource('/', UltraMikroProposalController::class)->only(['index', 'create', 'store'])->names('analis.ultra_mikro.index');
        Route::resource('/nasabah', UltraMikroNasabahController::class)->names('analis.ultra_mikro.nasabah');
    });
});
