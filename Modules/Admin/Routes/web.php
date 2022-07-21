<?php

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\SkpdAkadController;
use Modules\Admin\Http\Controllers\SkpdGolonganController;
use Modules\Admin\Http\Controllers\SkpdInstansiController;
use Modules\Admin\Http\Controllers\SkpdTanggunganController;
use Modules\Admin\Http\Controllers\SkpdJenisJaminanController;
use Modules\Admin\Http\Controllers\SkpdSektorEkonomiController;
use Modules\Admin\Http\Controllers\SkpdJenisPenggunaanController;
use Modules\Admin\Http\Controllers\SkpdStatusPerkawinanController;

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

Route::prefix('admin')->middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/', 'AdminController@index');
    Route::resource('/skpd/akad', SkpdAkadController::class);
    Route::resource('/skpd/penggunaan', SkpdJenisPenggunaanController::class);
    Route::resource('/skpd/jaminan', SkpdJenisJaminanController::class);
    Route::resource('/skpd/intansi', SkpdInstansiController::class);
    Route::resource('/skpd/golongan', SkpdGolonganController::class);
    Route::resource('/skpd/sektorekonomi', SkpdSektorEkonomiController::class);
    Route::resource('/skpd/statusperkawinan', SkpdStatusPerkawinanController::class);
    Route::resource('/skpd/tanggungan', SkpdTanggunganController::class);
});
