<?php
use Illuminate\Support\Facades\Route;
use Modules\Pasar\Http\Controllers\EditProposalController;
use Modules\Pasar\Http\Controllers\PasarController;
use Modules\Pasar\Http\Controllers\PasarKomiteController;
use Modules\Pasar\Http\Controllers\PasarNasabahController;
use Modules\Pasar\Http\Controllers\PasarProposalController;

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

// Route::prefix('pasar')->middleware(['auth:sanctum', 'verified'])->group(function() {
//     Route::get('/', 'PasarController@index');
// });
Route::prefix('pasar')->middleware(['auth:sanctum', 'verified', 'role:2', 'divisi:2',])->group(function() {
    Route::get('/', 'PasarController@index');
    Route::resource('/nasabah', PasarNasabahController::class);
    Route::resource('/komite', PasarKomiteController::class);
    Route::resource('/proposal', PasarProposalController::class);
    Route::resource('/revisi', EditProposalController::class);

});


