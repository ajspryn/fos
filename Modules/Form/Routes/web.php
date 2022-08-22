<?php

// use Modules\Form\Http\Controllers\UmkmController;

use Modules\Form\Http\Controllers\FormulirPasarController;
use Modules\Form\Http\Controllers\FormulirUmkmController;
use Modules\Form\Http\Controllers\KprController;
use Modules\Skpd\Http\Controllers\SkpdController;


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

Route::prefix('form')->group(function () {
    // Route::get('/', 'FormController@index');
    Route::resource('/skpd', FormSkpdController::class);
    Route::resource('/umkm', FormulirUmkmController::class);
    Route::resource('/ppr', FormPprController::class);
    Route::resource('/pasar', FormulirPasarController::class);
    Route::resource('/pembiayaanskpd', SkpdController::class);
});
