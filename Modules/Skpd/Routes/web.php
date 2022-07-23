<?php

use Modules\Skpd\Http\Controllers\SkpdController;
use Modules\Skpd\Http\Controllers\JaminanController;

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
Route::prefix('skpd')->middleware(['auth:sanctum', 'verified', 'role:2', 'divisi:1'])->group(function() {
    Route::get('/', 'SkpdController@index');
    Route::resource('/jaminan', JaminanController::class);
});
