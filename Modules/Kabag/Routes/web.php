<?php

use Illuminate\Support\Facades\Route;
use Modules\Kabag\Http\Controllers\PasarKomiteController;
use Modules\Kabag\Http\Controllers\PasarNasabahController;
use Modules\Kabag\Http\Controllers\PasarProposalController;
use Modules\Kabag\Http\Controllers\SkpdNasabahController;
use Modules\Kabag\Http\Controllers\SkpdProposalController;
use Modules\Kabag\Http\Controllers\SkpdKomiteController;
use Modules\Kabag\Http\Controllers\UmkmKomiteController;
use Modules\Kabag\Http\Controllers\UmkmNasabahController;
use Modules\Kabag\Http\Controllers\UmkmProposalController;
use Modules\Kabag\Http\Controllers\PprProposalController;
use Modules\Kabag\Http\Controllers\PprKomiteController;
use Modules\Kabag\Http\Controllers\PprNasabahController;
use Modules\Kabag\Http\Controllers\P3kProposalController;
use Modules\Kabag\Http\Controllers\P3kKomiteController;
use Modules\Kabag\Http\Controllers\P3kNasabahController;
use Modules\Kabag\Http\Controllers\UltraMikroProposalController;
use Modules\Kabag\Http\Controllers\UltraMikroKomiteController;
use Modules\Kabag\Http\Controllers\UltraMikroNasabahController;

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

Route::prefix('kabag')->middleware(['auth:sanctum', 'verified', 'role:2', 'divisi:0', 'jabatan:2'])->group(function () {
    Route::get('/', 'KabagController@index')->name('kabag.index');

    Route::prefix('skpd')->group(function () {
        Route::resource('/komite', SkpdKomiteController::class)->only(['index', 'show', 'store'])->names('kabag.skpd.komite');
        Route::resource('/proposal', SkpdProposalController::class)->only(['index', 'show'])->names('kabag.skpd.proposal');
        Route::resource('/', SkpdProposalController::class)->only(['index'])->names('kabag.skpd.index');
        Route::resource('/nasabah', SkpdNasabahController::class)->only(['index', 'show'])->names('kabag.skpd.nasabah');
    });

    Route::prefix('umkm')->group(function () {
        Route::resource('/komite', UmkmKomiteController::class)->only(['index', 'show', 'store'])->names('kabag.umkm.komite');
        Route::resource('/proposal', UmkmProposalController::class)->only(['index', 'show'])->names('kabag.umkm.proposal');
        Route::resource('/', UmkmProposalController::class)->only(['index'])->names('kabag.umkm.index');
        Route::resource('/nasabah', UmkmNasabahController::class)->only(['index', 'show'])->names('kabag.umkm.nasabah');
    });

    Route::prefix('pasar')->group(function () {
        Route::resource('/komite', PasarKomiteController::class)->only(['index', 'show', 'store'])->names('kabag.pasar.komite');
        Route::resource('/proposal', PasarProposalController::class)->only(['index', 'show'])->names('kabag.pasar.proposal');
        Route::resource('/', PasarProposalController::class)->only(['index'])->names('kabag.pasar.index');
        Route::resource('/nasabah', PasarNasabahController::class)->only(['index', 'show'])->names('kabag.pasar.nasabah');
    });

    Route::prefix('ppr')->group(function () {
        Route::resource('/komite', PprKomiteController::class)->only(['index', 'show', 'store'])->names('kabag.ppr.komite');
        Route::resource('/proposal', PprProposalController::class)->only(['index', 'show'])->names('kabag.ppr.proposal');
        Route::resource('/', PprProposalController::class)->only(['index'])->names('kabag.ppr.index');
        Route::resource('/nasabah', PprNasabahController::class)->only(['index', 'show'])->names('kabag.ppr.nasabah');
    });

    Route::prefix('p3k')->group(function () {
        Route::resource('/komite', P3kKomiteController::class)->only(['index', 'show', 'store'])->names('kabag.p3k.komite');
        Route::resource('/proposal', P3kProposalController::class)->only(['index', 'show'])->names('kabag.p3k.proposal');
        Route::resource('/', P3kProposalController::class)->only(['index'])->names('kabag.p3k.index');
        Route::resource('/nasabah', P3kNasabahController::class)->only(['index', 'show'])->names('kabag.p3k.nasabah');
    });

    Route::prefix('ultra_mikro')->group(function () {
        Route::resource('/komite', UltraMikroKomiteController::class)->only(['index', 'show', 'store'])->names('kabag.ultra_mikro.komite');
        Route::resource('/proposal', UltraMikroProposalController::class)->only(['index', 'show'])->names('kabag.ultra_mikro.proposal');
        Route::resource('/', UltraMikroProposalController::class)->only(['index'])->names('kabag.ultra_mikro.index');
        Route::resource('/nasabah', UltraMikroNasabahController::class)->only(['index', 'show'])->names('kabag.ultra_mikro.nasabah');
    });
});
