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

use Modules\Akad\Http\Controllers\ProposalAkadController;
use Modules\Akad\Http\Controllers\SelesaiAkadController;

Route::prefix('akad')->middleware(['auth:sanctum', 'verified', 'role:2', 'divisi:0', 'jabatan:2'])->group(function () {
    Route::get('/', 'AkadController@index');
    Route::resource('/proposal', ProposalAkadController::class);
    Route::resource('/selesai', SelesaiAkadController::class);
});
