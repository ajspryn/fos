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
use Modules\Dirbis\Http\Controllers\PasarProposalController;
use Modules\Dirbis\Http\Controllers\SkpdKomiteController;
use Modules\Dirbis\Http\Controllers\SkpdProposalController;

Route::prefix('dirbis')->middleware(['auth:sanctum', 'role:2', 'divisi:0', 'jabatan:4'])->group(function() {
    Route::get('/', 'DirbisController@index');
    Route::resource('/pasar/proposal', PasarProposalController::class);
    Route::resource('/pasar/komite', PasarKomiteController::class);
    Route::resource('/pasar/nasabah', PasarNasabahController::class);
    Route::resource('/skpd/proposal', SkpdProposalController::class);
    Route::resource('/skpd/komite', SkpdKomiteController::class);
    Route::resource('/skpd/nasabah', SkpdNasabahController::class);

});

