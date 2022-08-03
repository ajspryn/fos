<?php

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\SkpdAkadController;
use Modules\Admin\Http\Controllers\PasarAkadController;
use Modules\Admin\Http\Controllers\PasarCashController;
use Modules\Admin\Http\Controllers\PasarSukuController;
use Modules\Admin\Http\Controllers\SkpdGolonganController;
use Modules\Admin\Http\Controllers\SkpdInstansiController;
use Modules\Admin\Http\Controllers\SkpdTanggunganController;
use Modules\Admin\Http\Controllers\PasarJenisPasarController;
use Modules\Admin\Http\Controllers\PasarPenggunaanController;
use Modules\Admin\Http\Controllers\PasarTanggunganController;
use Modules\Admin\Http\Controllers\PasarJenisDagangController;
use Modules\Admin\Http\Controllers\SkpdJenisJaminanController;
use Modules\Admin\Http\Controllers\PasarJaminanRumahController;
use Modules\Admin\Http\Controllers\PasarJaminanUsahaController;
use Modules\Admin\Http\Controllers\PasarJenisNasabahController;
use Modules\Admin\Http\Controllers\SkpdSektorEkonomiController;
use Modules\Admin\Http\Controllers\PasarLamaBerdagangController;
use Modules\Admin\Http\Controllers\PasarSektorEkonomiController;
use Modules\Admin\Http\Controllers\SkpdJenisPenggunaanController;
use Modules\Admin\Http\Controllers\SkpdStatusPerkawinanController;
use Modules\Admin\Http\Controllers\PasarAtatusPerkawinanController;

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

Route::prefix('admin')->middleware(['auth:sanctum', 'verified', 'role:1'])->group(function() {
    Route::get('/', 'AdminController@index');
    Route::resource('/skpd/akad', SkpdAkadController::class);
    Route::resource('/skpd/penggunaan', SkpdJenisPenggunaanController::class);
    Route::resource('/skpd/jaminan', SkpdJenisJaminanController::class);
    Route::resource('/skpd/instansi', SkpdInstansiController::class);
    Route::resource('/skpd/golongan', SkpdGolonganController::class);
    Route::resource('/skpd/sektorekonomi', SkpdSektorEkonomiController::class);
    Route::resource('/skpd/statusperkawinan', SkpdStatusPerkawinanController::class);
    Route::resource('/skpd/tanggungan', SkpdTanggunganController::class);
    Route::resource('/pasar/akad', PasarAkadController::class);
    Route::resource('/pasar/penggunaan', PasarPenggunaanController::class);
    Route::resource('/pasar/jaminanrumah', PasarJaminanRumahController::class);
    Route::resource('/pasar/jenispasar', PasarJenisPasarController::class);
    Route::resource('/pasar/jenisdagang', PasarJenisDagangController::class);
    Route::resource('/pasar/sektorekonomi', PasarSektorEkonomiController::class);
    Route::resource('/pasar/statusperkawinan', SkpdStatusPerkawinanController::class);
    Route::resource('/pasar/lamadagang', PasarLamaBerdagangController::class);
    Route::resource('/pasar/sukubangsa', PasarSukuController::class);
    Route::resource('/pasar/statusperkawinan', PasarAtatusPerkawinanController::class);
    Route::resource('/pasar/tanggungan', PasarTanggunganController::class);
    Route::resource('/pasar/cashpickup', PasarCashController::class);
    Route::resource('/pasar/jaminanusaha', PasarJaminanUsahaController::class);
    Route::resource('/pasar/nasabah', PasarJenisNasabahController::class);
});
