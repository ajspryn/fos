<?php

use Illuminate\Support\Facades\Route;
use Modules\Skpd\Http\Controllers\SkpdController;
use Modules\Skpd\Http\Controllers\SkpdKomiteController;
use Modules\Skpd\Http\Controllers\SkpdRevisiController;
use Modules\Skpd\Http\Controllers\SkpdNasabahController;
use Modules\Skpd\Http\Controllers\SkpdCetakProposalController;
use Modules\Skpd\Http\Controllers\SkpdProposalController;

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

Route::prefix('skpd')->group(function () {
    Route::resource('/pembiayaan', SkpdController::class)->names('skpd.pembiayaan');
});
Route::prefix('skpd')->middleware(['auth:sanctum', 'verified', 'role:2', 'divisi:1', 'jabatan:1'])->group(function () {
    Route::get('/', 'SkpdController@index');
    Route::resource('/nasabah', SkpdNasabahController::class)->names('skpd.nasabah');
    Route::resource('/komite', SkpdKomiteController::class)->names('skpd.komite');
    Route::resource('/proposal', SkpdProposalController::class)->names('skpd.proposal');
    Route::resource('/revisi', SkpdRevisiController::class)->names('skpd.revisi');
    Route::resource('/cetak', SkpdCetakProposalController::class)->names('skpd.cetak');
    Route::post('/bonMurabahah', 'SkpdKomiteController@uploadBonMurabahah')->name('skpd.bonMurabahah');
});
