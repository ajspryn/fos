<?php

use Modules\Form\Http\Controllers\SkpdController;


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

Route::prefix('form')->group(function() {
    // Route::get('/', 'FormController@index');
    Route::resource('/skpd', SkpdController::class);
});
