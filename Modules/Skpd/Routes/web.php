<?php

use Modules\Skpd\Http\Controllers\SkpdController;
use Modules\Skpd\Http\Controllers\SkpdKomiteController;
use Modules\Skpd\Http\Controllers\SkpdNasabahController;
use Modules\Skpd\Http\Controllers\SkpdRevisiController;

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

Route::prefix('skpd')->group(function() {
    Route::resource('/pembiayaan', SkpdController::class);
});
Route::prefix('skpd')->middleware(['auth:sanctum', 'verified', 'role:2', 'divisi:1', 'jabatan:1'])->group(function() {
    Route::get('/', 'SkpdController@index');
    Route::resource('/nasabah', SkpdNasabahController::class);
    Route::resource('/komite', SkpdKomiteController::class);
    Route::resource('/proposal', SkpdProposalController::class);
    Route::resource('/revisi', SkpdRevisiController::class);
});
