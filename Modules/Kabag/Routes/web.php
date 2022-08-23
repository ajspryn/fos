<?php

use Illuminate\Support\Facades\Route;
use Modules\Kabag\Http\Controllers\KabagKomiteController;
use Modules\Kabag\Http\Controllers\KabagProposalController;
use Modules\Kabag\Http\Controllers\PasarKomiteController;
use Modules\Kabag\Http\Controllers\PasarProposalController;
use Modules\Kabag\Http\Controllers\PprKomiteController;
use Modules\Kabag\Http\Controllers\PprProposalController;
use Modules\Kabag\Http\Controllers\UmkmKomiteController;
use Modules\Kabag\Http\Controllers\UmkmProposalController;

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

Route::prefix('kabag')->middleware(['auth:sanctum', 'verified', 'role:2', 'divisi:0', 'jabatan:2'])->group(function() {
    Route::get('/', 'KabagController@index');

    Route::prefix('skpd')->group(function() {
        Route::resource('/komite', SkpdKomiteController::class);
        Route::resource('/proposal', SkpdProposalController::class);
        Route::resource('/', SkpdProposalController::class);
    });

    Route::prefix('umkm')->group(function() {
        Route::resource('/komite', UmkmKomiteController::class);
        Route::resource('/proposal', UmkmProposalController::class);
        Route::resource('/', UmkmProposalController::class);
    });

    Route::prefix('pasar')->group(function() {
        Route::resource('/komite', PasarKomiteController::class);
        Route::resource('/proposal', PasarProposalController::class);
        Route::resource('/', PasarProposalController::class);

    });

    Route::prefix('ppr')->group(function() {
        Route::resource('/komite', PprKomiteController::class);
        Route::resource('/proposal', PprProposalController::class);
        Route::resource('/', PprProposalController::class);

    });

});
