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

use Modules\Blr\Http\Controllers\AktivaProduktifController;

Route::prefix('blr')->group(function () {
    Route::get('/', 'BlrController@index');
    Route::resource('/aktiva_produktif', AktivaProduktifController::class);
});
