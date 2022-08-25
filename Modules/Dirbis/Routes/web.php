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
<<<<<<< Updated upstream
use Modules\Dirbis\Http\Controllers\UmkmKomiteController;
use Modules\Dirbis\Http\Controllers\UmkmProposalController;

Route::prefix('dirbis')->middleware(['auth:sanctum', 'role:2', 'divisi:0', 'jabatan:4'])->group(function() {
    Route::get('/', 'DirbisController@index');
=======
<<<<<<< Updated upstream

Route::prefix('dirbis')->middleware(['auth:sanctum', 'role:2', 'divisi:0', 'jabatan:4'])->group(function() {
    Route::get('/', 'DirbisController@index');
    Route::resource('/pasar/proposal', PasarProposalController::class);
    Route::resource('/pasar/komite', PasarKomiteController::class);
    Route::resource('/pasar/nasabah', PasarNasabahController::class);
    Route::resource('/skpd/proposal', SkpdProposalController::class);
    Route::resource('/skpd/komite', SkpdKomiteController::class);
    Route::resource('/skpd/nasabah', SkpdNasabahController::class);
=======
use Modules\Dirbis\Http\Controllers\UmkmKomiteController;
use Modules\Dirbis\Http\Controllers\UmkmNasabahController;
use Modules\Dirbis\Http\Controllers\UmkmProposalController;

Route::prefix('dirbis')->middleware(['auth:sanctum', 'role:2', 'divisi:0', 'jabatan:4'])->group(function() {
    Route::get('/', 'DirbisController@index');
>>>>>>> Stashed changes

    Route::prefix('skpd')->group(function() {
        Route::resource('/komite', SkpdKomiteController::class);
        Route::resource('/proposal', SkpdProposalController::class);
        Route::resource('/', SkpdProposalController::class);
<<<<<<< Updated upstream
=======
        Route::resource('/nasabah', SkpdNasabahController::class);
>>>>>>> Stashed changes
    });

    Route::prefix('umkm')->group(function() {
        Route::resource('/komite', UmkmKomiteController::class);
        Route::resource('/proposal', UmkmProposalController::class);
        Route::resource('/', UmkmProposalController::class);
<<<<<<< Updated upstream
=======
        Route::resource('/nasabah', UmkmNasabahController::class);
>>>>>>> Stashed changes
    });

    Route::prefix('pasar')->group(function() {
        Route::resource('/komite', PasarKomiteController::class);
        Route::resource('/proposal', PasarProposalController::class);
        Route::resource('/', PasarProposalController::class);
<<<<<<< Updated upstream

    });
=======
        Route::resource('/nasabah', PasarNasabahController::class);

    });
>>>>>>> Stashed changes
>>>>>>> Stashed changes

});

