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

Route::prefix('staff')->middleware(['auth:sanctum', 'verified', 'role:1', 'divisi:5', 'jabatan:1'])->group(function () {
    Route::get('/', 'AkadController@index');
    Route::resource('/proposal', ProposalAkadController::class);
    Route::resource('/selesai', SelesaiAkadController::class);
});