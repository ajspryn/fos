<?php

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
use Modules\Admin\Http\Controllers\PprCharacterTempatBekerjaController;
use Modules\Admin\Http\Controllers\PprCharacterKonsistensiController;
use Modules\Admin\Http\Controllers\PprCharacterKelengkapanValiditasController;
use Modules\Admin\Http\Controllers\PprCharacterAngsuranKolektifController;
use Modules\Admin\Http\Controllers\PprCharacterPengalamanPembiayaanController;
use Modules\Admin\Http\Controllers\PprCharacterMotivasiController;
use Modules\Admin\Http\Controllers\PprCharacterReferensiController;

use Modules\Admin\Http\Controllers\PprCapitalPekerjaanController;
use Modules\Admin\Http\Controllers\PprCapitalPengalamanPembiayaanController;
use Modules\Admin\Http\Controllers\PprCapitalKeamananBisnisPekerjaanController;
use Modules\Admin\Http\Controllers\PprCapitalPotensiPertumbuhanHasilController;
use Modules\Admin\Http\Controllers\PprCapitalSumberPendapatanController;
use Modules\Admin\Http\Controllers\PprCapitalGajiBersihController;
use Modules\Admin\Http\Controllers\PprCapitalJmlTanggunganKeluargaController;

use Modules\Admin\Http\Controllers\PprCapacityPekerjaanController;
use Modules\Admin\Http\Controllers\PprCapacityPengalamanPembiayaanController;
use Modules\Admin\Http\Controllers\PprCapacityKeamananBisnisPekerjaanController;
use Modules\Admin\Http\Controllers\PprCapacityPotensiPertumbuhanHasilController;
use Modules\Admin\Http\Controllers\PprCapacityPengalamanKerjaController;
use Modules\Admin\Http\Controllers\PprCapacityPendidikanController;
use Modules\Admin\Http\Controllers\PprCapacityUsiaController;
use Modules\Admin\Http\Controllers\PprCapacitySumberPendapatanController;
use Modules\Admin\Http\Controllers\PprCapacityGajiBersihController;
use Modules\Admin\Http\Controllers\PprCapacityJmlTanggunganKeluargaController;

use Modules\Admin\Http\Controllers\PprConditionShariaPekerjaanController;
use Modules\Admin\Http\Controllers\PprConditionShariaPengalamanPembiayaanController;
use Modules\Admin\Http\Controllers\PprConditionShariaKeamananBisnisPekerjaanController;
use Modules\Admin\Http\Controllers\PprConditionShariaPotensiPertumbuhanHasilController;
use Modules\Admin\Http\Controllers\PprConditionShariaPengalamanKerjaController;
use Modules\Admin\Http\Controllers\PprConditionShariaPendidikanController;
use Modules\Admin\Http\Controllers\PprConditionShariaUsiaController;
use Modules\Admin\Http\Controllers\PprConditionShariaSumberPendapatanController;
use Modules\Admin\Http\Controllers\PprConditionShariaGajiBersihController;
use Modules\Admin\Http\Controllers\PprConditionShariaJmlTanggunganKeluargaController;

use Modules\Admin\Http\Controllers\PprCollateralMarketabilitasController;
use Modules\Admin\Http\Controllers\PprCollateralKontribusiPemohonController;
use Modules\Admin\Http\Controllers\PprCollateralPertumbuhanAgunanController;
use Modules\Admin\Http\Controllers\PprCollateralDayaTarikAgunanController;
use Modules\Admin\Http\Controllers\PprCollateralJangkaWaktuLikuiditasController;

use Modules\Admin\Http\Controllers\PprCharacterNfPengelolaanRekeningController;
use Modules\Admin\Http\Controllers\PprCharacterNfPerilakuPribadiController;
use Modules\Admin\Http\Controllers\PprCharacterNfReputasiBisnisController;
use Modules\Admin\Http\Controllers\PprCharacterNfTingkatKepercayaanController;

use Modules\Admin\Http\Controllers\PprCapacityNfKaderisasiController;
use Modules\Admin\Http\Controllers\PprCapacityNfKualifikasiKomersialController;
use Modules\Admin\Http\Controllers\PprCapacityNfKualifikasiTeknisController;
use Modules\Admin\Http\Controllers\PprCapacityNfSituasiPersainganController;

use Modules\Admin\Http\Controllers\PprConditionShariaNfKualitasProdukJasaController;
use Modules\Admin\Http\Controllers\PprConditionShariaNfLokasiUsahaController;
use Modules\Admin\Http\Controllers\PprConditionShariaNfSistemPembayaranController;

use Modules\Admin\Http\Controllers\PprCollateralNfDayaTarikAgunanController;
use Modules\Admin\Http\Controllers\PprCollateralNfJangkaWaktuLikuidasiController;
use Modules\Admin\Http\Controllers\PprCollateralNfKontribusiPemohonController;
use Modules\Admin\Http\Controllers\PprCollateralNfMarketabilitasController;
use Modules\Admin\Http\Controllers\PprCollateralNfPertumbuhanAgunanController;


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

Route::prefix('admin')->middleware(['auth:sanctum', 'verified', 'role:1' , 'divisi:0' , 'jabatan:0'])->group(function() {
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

    Route::resource('/ppr/fixed_income/character/tempat_bekerja', PprCharacterTempatBekerjaController::class);
    Route::resource('/ppr/fixed_income/character/konsistensi', PprCharacterKonsistensiController::class);
    Route::resource('/ppr/fixed_income/character/kelengkapan_validitas', PprCharacterKelengkapanValiditasController::class);
    Route::resource('/ppr/fixed_income/character/angsuran_kolektif', PprCharacterAngsuranKolektifController::class);
    Route::resource('/ppr/fixed_income/character/pengalaman_pembiayaan', PprCharacterPengalamanPembiayaanController::class);
    Route::resource('/ppr/fixed_income/character/motivasi', PprCharacterMotivasiController::class);
    Route::resource('/ppr/fixed_income/character/referensi', PprCharacterReferensiController::class);

    Route::resource('/ppr/fixed_income/capital/pekerjaan', PprCapitalPekerjaanController::class);
    Route::resource('/ppr/fixed_income/capital/pengalaman_pembiayaan', PprCapitalPengalamanPembiayaanController::class);
    Route::resource('/ppr/fixed_income/capital/keamanan_bisnis_pekerjaan', PprCapitalKeamananBisnisPekerjaanController::class);
    Route::resource('/ppr/fixed_income/capital/potensi_pertumbuhan_hasil', PprCapitalPotensiPertumbuhanHasilController::class);
    Route::resource('/ppr/fixed_income/capital/sumber_pendapatan', PprCapitalSumberPendapatanController::class);
    Route::resource('/ppr/fixed_income/capital/gaji_bersih', PprCapitalGajiBersihController::class);
    Route::resource('/ppr/fixed_income/capital/jml_tanggungan_keluarga', PprCapitalJmlTanggunganKeluargaController::class);

    Route::resource('/ppr/fixed_income/capacity/pekerjaan', PprCapacityPekerjaanController::class);
    Route::resource('/ppr/fixed_income/capacity/pengalaman_pembiayaan', PprCapacityPengalamanPembiayaanController::class);
    Route::resource('/ppr/fixed_income/capacity/keamanan_bisnis_pekerjaan', PprCapacityKeamananBisnisPekerjaanController::class);
    Route::resource('/ppr/fixed_income/capacity/potensi_pertumbuhan_hasil', PprCapacityPotensiPertumbuhanHasilController::class);
    Route::resource('/ppr/fixed_income/capacity/pengalaman_kerja', PprCapacityPengalamanKerjaController::class);
    Route::resource('/ppr/fixed_income/capacity/pendidikan', PprCapacityPendidikanController::class);
    Route::resource('/ppr/fixed_income/capacity/usia', PprCapacityUsiaController::class);
    Route::resource('/ppr/fixed_income/capacity/sumber_pendapatan', PprCapacitySumberPendapatanController::class);
    Route::resource('/ppr/fixed_income/capacity/gaji_bersih', PprCapacityGajiBersihController::class);
    Route::resource('/ppr/fixed_income/capacity/jml_tanggungan_keluarga', PprCapacityJmlTanggunganKeluargaController::class);

    Route::resource('/ppr/fixed_income/condition_sharia/pekerjaan', PprConditionShariaPekerjaanController::class);
    Route::resource('/ppr/fixed_income/condition_sharia/pengalaman_pembiayaan', PprConditionShariaPengalamanPembiayaanController::class);
    Route::resource('/ppr/fixed_income/condition_sharia/keamanan_bisnis_pekerjaan', PprConditionShariaKeamananBisnisPekerjaanController::class);
    Route::resource('/ppr/fixed_income/condition_sharia/potensi_pertumbuhan_hasil', PprConditionShariaPotensiPertumbuhanHasilController::class);
    Route::resource('/ppr/fixed_income/condition_sharia/pengalaman_kerja', PprConditionShariaPengalamanKerjaController::class);
    Route::resource('/ppr/fixed_income/condition_sharia/pendidikan', PprConditionShariaPendidikanController::class);
    Route::resource('/ppr/fixed_income/condition_sharia/usia', PprConditionShariaUsiaController::class);
    Route::resource('/ppr/fixed_income/condition_sharia/sumber_pendapatan', PprConditionShariaSumberPendapatanController::class);
    Route::resource('/ppr/fixed_income/condition_sharia/gaji_bersih', PprConditionShariaGajiBersihController::class);
    Route::resource('/ppr/fixed_income/condition_sharia/jml_tanggungan_keluarga', PprConditionShariaJmlTanggunganKeluargaController::class);

    Route::resource('/ppr/fixed_income/collateral/marketabilitas', PprCollateralMarketabilitasController::class);
    Route::resource('/ppr/fixed_income/collateral/kontribusi_pemohon', PprCollateralKontribusiPemohonController::class);
    Route::resource('/ppr/fixed_income/collateral/pertumbuhan_agunan', PprCollateralPertumbuhanAgunanController::class);
    Route::resource('/ppr/fixed_income/collateral/daya_tarik_agunan', PprCollateralDayaTarikAgunanController::class);
    Route::resource('/ppr/fixed_income/collateral/jangka_waktu_likuiditas', PprCollateralJangkaWaktuLikuiditasController::class);

    Route::resource('ppr/non_fixed_income/character/tingkat_kepercayaan', PprCharacterNfTingkatKepercayaanController::class);
    Route::resource('ppr/non_fixed_income/character/pengelolaan_rekening', PprCharacterNfPengelolaanRekeningController::class);
    Route::resource('ppr/non_fixed_income/character/reputasi_bisnis', PprCharacterNfReputasiBisnisController::class);
    Route::resource('ppr/non_fixed_income/character/perilaku_pribadi', PprCharacterNfPerilakuPribadiController::class);

    Route::resource('ppr/non_fixed_income/capacity/situasi_persaingan', PprCapacityNfSituasiPersainganController::class);
    Route::resource('ppr/non_fixed_income/capacity/kaderisasi', PprCapacityNfKaderisasiController::class);
    Route::resource('ppr/non_fixed_income/capacity/kualifikasi_komersial', PprCapacityNfKualifikasiKomersialController::class);
    Route::resource('ppr/non_fixed_income/capacity/kualifikasi_teknis', PprCapacityNfKualifikasiTeknisController::class);

    Route::resource('ppr/non_fixed_income/condition_sharia/kualitas_produk_jasa', PprConditionShariaNfKualitasProdukJasaController::class);
    Route::resource('ppr/non_fixed_income/condition_sharia/sistem_pembayaran', PprConditionShariaNfSistemPembayaranController::class);
    Route::resource('ppr/non_fixed_income/condition_sharia/lokasi_usaha', PprConditionShariaNfLokasiUsahaController::class);

    Route::resource('ppr/non_fixed_income/collateral/marketabilitas', PprCollateralNfMarketabilitasController::class);
    Route::resource('ppr/non_fixed_income/collateral/kontribusi_pemohon', PprCollateralNfKontribusiPemohonController::class);
    Route::resource('ppr/non_fixed_income/collateral/pertumbuhan_agunan', PprCollateralNfPertumbuhanAgunanController::class);
    Route::resource('ppr/non_fixed_income/collateral/daya_tarik_agunan', PprCollateralNfDayaTarikAgunanController::class);
    Route::resource('ppr/non_fixed_income/collateral/jangka_waktu_likuidasi', PprCollateralNfJangkaWaktuLikuidasiController::class);
});
