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
use Modules\P3k\Http\Controllers\P3kCetakProposalController;
use Modules\P3k\Http\Controllers\P3kController;
use Modules\P3k\Http\Controllers\P3kNasabahController;
use Modules\P3k\Http\Controllers\P3kProposalController;
use Modules\P3k\Http\Controllers\P3kKomiteController;
use Modules\P3k\Http\Controllers\P3kPipelineController;
use Modules\P3k\Http\Controllers\P3kRevisiController;

Route::prefix('p3k')->group(function () {
    Route::resource('/pembiayaan', P3kController::class)->names('p3k.pembiayaan');
});

Route::prefix('p3k')->middleware(['auth:sanctum', 'verified', 'role:2', 'divisi:6', 'jabatan:1'])->group(function () {
    Route::get('/', 'P3kController@index');
    // Route::get('/update-data', 'P3kPipelineController@index');
    Route::get('/filter-by-month', 'P3kPipelineController@filterByMonth')->name('p3k.filterByMonth');
    Route::resource('/pipeline', P3kPipelineController::class)->names('p3k.pipeline');
    Route::resource('/nasabah', P3kNasabahController::class)->names('p3k.nasabah');
    Route::resource('/proposal', P3kProposalController::class)->names('p3k.proposal');
    Route::resource('/komite', P3kKomiteController::class)->names('p3k.komite');
    Route::resource('/revisi', P3kRevisiController::class)->names('p3k.revisi');
    Route::resource('/cetak', P3kCetakProposalController::class)->names('p3k.cetak');
    Route::post('/bonMurabahah', 'P3kKomiteController@uploadBonMurabahah')->name('p3k.bonMurabahah');
});
