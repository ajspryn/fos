<?php
use Illuminate\Support\Facades\Route;
use Modules\Analis\Http\Controllers\PasarNasabahController;
use Modules\Analis\Http\Controllers\PasarProposalController;
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
    Route::resource('/pasar/proposal', PasarProposalController::class);
    Route::resource('/pasar/komite', PasarKomiteController::class);
    Route::resource('/pasar/nasabah', PasarNasabahController::class);

});
