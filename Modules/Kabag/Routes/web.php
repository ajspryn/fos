<?php

use Illuminate\Support\Facades\Route;
use Modules\Kabag\Http\Controllers\KabagKomiteController;
use Modules\Kabag\Http\Controllers\KabagProposalController;

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

Route::prefix('kabag')->middleware(['auth:sanctum', 'verified', 'role:2', 'divisi:0', 'jabatan:2'])->group(function() {
    Route::get('/', 'KabagController@index');

    Route::prefix('skpd')->group(function() {
        Route::resource('/komite', SkpdKomiteController::class);
        Route::resource('/proposal', SkpdProposalController::class);
    });

});
