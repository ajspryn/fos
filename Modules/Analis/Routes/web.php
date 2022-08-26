<?php
use Illuminate\Support\Facades\Route;
use Modules\Analis\Http\Controllers\PasarKomiteController;
use Modules\Analis\Http\Controllers\PasarNasabahController;
use Modules\Analis\Http\Controllers\PasarProposalController;
use Modules\Analis\Http\Controllers\SkpdKomiteController;
use Modules\Analis\Http\Controllers\SkpdNasabahController;
use Modules\Analis\Http\Controllers\SkpdProposalController;
use Modules\Analis\Http\Controllers\UmkmNasabahController;

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

Route::prefix('analis')->middleware(['auth:sanctum', 'role:2', 'divisi:0', 'jabatan:3'])->group(function() {
Route::get('/', 'AnalisController@index');

    Route::prefix('skpd')->group(function() {
        Route::resource('/komite', SkpdKomiteController::class);
        Route::resource('/proposal', SkpdProposalController::class);
        Route::resource('/', SkpdProposalController::class);
        Route::resource('/nasabah', SkpdNasabahController::class);
    });

    Route::prefix('umkm')->group(function() {
        Route::resource('/komite', UmkmKomiteController::class);
        Route::resource('/proposal', UmkmProposalController::class);
        Route::resource('/', UmkmProposalController::class);
        Route::resource('/nasabah', UmkmNasabahController::class);
    });

    Route::prefix('pasar')->group(function() {
        Route::resource('/komite', PasarKomiteController::class);
        Route::resource('/proposal', PasarProposalController::class);
        Route::resource('/', PasarProposalController::class);
        Route::resource('/nasabah', PasarNasabahController::class);

    });

});
