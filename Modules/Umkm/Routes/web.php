<?php
use Illuminate\Support\Facades\Route;
use Modules\Umkm\Http\Controllers\UmkmController;
use Modules\Umkm\Http\Controllers\UmkmKomiteController;
use Modules\Umkm\Http\Controllers\UmkmProposalController;
use Modules\Umkm\Http\Controllers\UmkmRevisiController;

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

Route::prefix('umkm')->group(function() {
    Route::resource('/form', UmkmController::class);
});
Route::prefix('umkm')->middleware(['auth:sanctum', 'verified', 'role:2', 'divisi:3'])->group(function() {
    Route::get('/', 'umkmController@index');
    Route::resource('/nasabah', UmkmNasabahController::class);
    Route::resource('/komite', UmkmKomiteController::class);
    Route::resource('/proposal', UmkmProposalController::class);
    Route::resource('/revisi', UmkmRevisiController::class);
});
