<?php

use Illuminate\Support\Facades\Route;
use Modules\Ppr\Http\Controllers\PprEditProposalController;
use Modules\Ppr\Http\Controllers\PprNasabahController;
use Modules\Ppr\Http\Controllers\PprProposalController;

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

// Route::prefix('ppr')->group(function () {
// Route::get('/', 'PprController@index');
// Route::get('/form_pengecekan', [PprController::class, 'form_pengecekan']);
// Route::post('/ppr/scoring/create', [FormPprScoring5CController::class, 'store']);

// Route::resource('/cc', PprCController::class);
// Route::resource('/pengecekan', PprProposalController::class);

// Route::resource('/5c/create', CController::class);
// Route::post('/ccs', [PprCController::class, 'store']);
// });

Route::prefix('ppr')->middleware(['auth:sanctum', 'verified', 'role:2', 'divisi:4', 'jabatan:1'])->group(function () {
    Route::get('/', 'PprController@index');
    // Route::prefix('/proposal')->group(function () {
    //     Route::get('/{id}', 'PprProposalController@show');
    //     Route::post('/post/{id}', [PprProposalController::class, 'store']);
    //     Route::delete('/delete/{id}', 'PprProposalController@destroy')->name('proposal.deleting');
    //     Route::resource('/', 'PprProposalController');
    // });
    // Route::prefix('/ppr')->group(function () {
    //     Route::resource('/scoring', FormPprScoring5CController::class);
    // });
    Route::resource('/proposal', PprProposalController::class);

    Route::resource('/komite', PprKomiteController::class);
    Route::resource('/nasabah', PprNasabahController::class);
    Route::resource('/revisi', PprEditProposalController::class);
    // Route::delete('/proposal/delete/{id}', [PprProposalController::class, 'destroy']);
});
