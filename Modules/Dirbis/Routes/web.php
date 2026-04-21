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
use Modules\Dirbis\Http\Controllers\P3kProposalController;
use Modules\Dirbis\Http\Controllers\P3kKomiteController;
use Modules\Dirbis\Http\Controllers\P3kNasabahController;

Route::prefix('dirbis')->middleware(['auth:sanctum', 'role:2', 'divisi:0', 'jabatan:4'])->group(function () {
    Route::get('/', 'DirbisController@index')->name('dirbis.index');

    Route::prefix('skpd')->group(function () {
        Route::resource('/komite', SkpdKomiteController::class)->names('dirbis.skpd.komite');
        Route::resource('/proposal', SkpdProposalController::class)->names('dirbis.skpd.proposal');
        Route::resource('/', SkpdProposalController::class)->names('dirbis.skpd.index');
        Route::resource('/nasabah', SkpdNasabahController::class)->names('dirbis.skpd.nasabah');
    });

    Route::prefix('umkm')->group(function () {
        Route::resource('/komite', UmkmKomiteController::class)->names('dirbis.umkm.komite');
        Route::resource('/proposal', UmkmProposalController::class)->names('dirbis.umkm.proposal');
        Route::resource('/', UmkmProposalController::class)->names('dirbis.umkm.index');
        Route::resource('/nasabah', UmkmNasabahController::class)->names('dirbis.umkm.nasabah');
    });

    Route::prefix('pasar')->group(function () {
        Route::resource('/komite', PasarKomiteController::class)->names('dirbis.pasar.komite');
        Route::resource('/proposal', PasarProposalController::class)->names('dirbis.pasar.proposal');
        Route::resource('/', PasarProposalController::class)->names('dirbis.pasar.index');
        Route::resource('/nasabah', PasarNasabahController::class)->names('dirbis.pasar.nasabah');
    });

    Route::prefix('ppr')->group(function () {
        Route::resource('/komite', PprKomiteController::class)->names('dirbis.ppr.komite');
        Route::resource('/proposal', PprProposalController::class)->names('dirbis.ppr.proposal');
        Route::resource('/', PprProposalController::class)->names('dirbis.ppr.index');
        Route::resource('/nasabah', PprNasabahController::class)->names('dirbis.ppr.nasabah');
    });

    Route::prefix('p3k')->group(function () {
        Route::get('/filter-by-year', 'P3kProposalController@filterByYear')->name('dirbis.p3k.filterByYear');
        // Route::get('/get-data-for-dinas/{year}', 'P3kProposalController@getDataForDinas');
        // Route::get('/jabatan/data', 'P3kProposalController@getDataForJabatan');
        // Route::post('/create', 'P3kProposalController@create');
        Route::resource('/komite', P3kKomiteController::class)->names('dirbis.p3k.komite');
        Route::resource('/proposal', P3kProposalController::class)->names('dirbis.p3k.proposal');
        Route::resource('/', P3kProposalController::class)->names('dirbis.p3k.index');
        Route::resource('/nasabah', P3kNasabahController::class)->names('dirbis.p3k.nasabah');
    });
});
