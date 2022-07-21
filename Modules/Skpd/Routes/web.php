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

Route::prefix('skpd')->middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/', 'SkpdController@index');
    Route::resource('/pembiayaan', SkpdController::class);
    Route::resource('/jaminan', JaminanController::class);
});
