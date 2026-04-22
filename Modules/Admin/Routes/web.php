<?php

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Modules\Admin\Http\Controllers\UserController;
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
use Modules\Admin\Http\Controllers\PprCapacityUsiaController;
use Modules\Admin\Http\Controllers\PasarJenisDagangController;
use Modules\Admin\Http\Controllers\SkpdJenisJaminanController;
use Modules\Admin\Http\Controllers\PasarJaminanRumahController;
use Modules\Admin\Http\Controllers\PasarJaminanUsahaController;
use Modules\Admin\Http\Controllers\PasarJenisNasabahController;
use Modules\Admin\Http\Controllers\SkpdSektorEkonomiController;
use Modules\Admin\Http\Controllers\PasarLamaBerdagangController;
use Modules\Admin\Http\Controllers\PasarSektorEkonomiController;
use Modules\Admin\Http\Controllers\PprCapitalPekerjaanController;
use Modules\Admin\Http\Controllers\SkpdJenisPenggunaanController;
use Modules\Admin\Http\Controllers\PprCapacityPekerjaanController;
use Modules\Admin\Http\Controllers\PprCapitalGajiBersihController;
use Modules\Admin\Http\Controllers\PprCharacterMotivasiController;
use Modules\Admin\Http\Controllers\SkpdStatusPerkawinanController;
use Modules\Admin\Http\Controllers\PasarAtatusPerkawinanController;
use Modules\Admin\Http\Controllers\PprCapacityGajiBersihController;

use Modules\Admin\Http\Controllers\PprCapacityPendidikanController;
use Modules\Admin\Http\Controllers\PprCharacterReferensiController;
use Modules\Admin\Http\Controllers\PprConditionShariaUsiaController;
use Modules\Admin\Http\Controllers\PprCapacityNfKaderisasiController;
use Modules\Admin\Http\Controllers\PprCharacterKonsistensiController;
use Modules\Admin\Http\Controllers\PprCharacterTempatBekerjaController;
use Modules\Admin\Http\Controllers\PprCapacityPengalamanKerjaController;

use Modules\Admin\Http\Controllers\PprCapitalSumberPendapatanController;
use Modules\Admin\Http\Controllers\PprCapacitySumberPendapatanController;
use Modules\Admin\Http\Controllers\PprCollateralMarketabilitasController;
use Modules\Admin\Http\Controllers\PprConditionShariaPekerjaanController;
use Modules\Admin\Http\Controllers\PprCharacterAngsuranKolektifController;
use Modules\Admin\Http\Controllers\PprCharacterNfReputasiBisnisController;
use Modules\Admin\Http\Controllers\PprCollateralDayaTarikAgunanController;
use Modules\Admin\Http\Controllers\PprConditionShariaGajiBersihController;
use Modules\Admin\Http\Controllers\PprConditionShariaPendidikanController;
use Modules\Admin\Http\Controllers\PprCharacterNfPerilakuPribadiController;

use Modules\Admin\Http\Controllers\PprCollateralNfMarketabilitasController;
use Modules\Admin\Http\Controllers\PprCapacityNfKualifikasiTeknisController;
use Modules\Admin\Http\Controllers\PprCapacityNfSituasiPersainganController;
use Modules\Admin\Http\Controllers\PprCapitalPengalamanPembiayaanController;
use Modules\Admin\Http\Controllers\PprCollateralKontribusiPemohonController;
use Modules\Admin\Http\Controllers\PprCollateralNfDayaTarikAgunanController;
use Modules\Admin\Http\Controllers\PprCollateralPertumbuhanAgunanController;
use Modules\Admin\Http\Controllers\PprCapacityPengalamanPembiayaanController;
use Modules\Admin\Http\Controllers\PprCapitalJmlTanggunganKeluargaController;
use Modules\Admin\Http\Controllers\PprConditionShariaNfLokasiUsahaController;

use Modules\Admin\Http\Controllers\PprCapacityJmlTanggunganKeluargaController;
use Modules\Admin\Http\Controllers\PprCharacterKelengkapanValiditasController;
use Modules\Admin\Http\Controllers\PprCharacterNfTingkatKepercayaanController;
use Modules\Admin\Http\Controllers\PprCharacterPengalamanPembiayaanController;
use Modules\Admin\Http\Controllers\PprCollateralNfKontribusiPemohonController;

use Modules\Admin\Http\Controllers\PprCollateralNfPertumbuhanAgunanController;
use Modules\Admin\Http\Controllers\PprCapacityNfKualifikasiKomersialController;
use Modules\Admin\Http\Controllers\PprCapitalKeamananBisnisPekerjaanController;
use Modules\Admin\Http\Controllers\PprCapitalPotensiPertumbuhanHasilController;

use Modules\Admin\Http\Controllers\PprCharacterNfPengelolaanRekeningController;
use Modules\Admin\Http\Controllers\PprConditionShariaPengalamanKerjaController;
use Modules\Admin\Http\Controllers\PprCapacityKeamananBisnisPekerjaanController;
use Modules\Admin\Http\Controllers\PprCapacityPotensiPertumbuhanHasilController;
use Modules\Admin\Http\Controllers\PprCollateralJangkaWaktuLikuidasiController;
use Modules\Admin\Http\Controllers\PprCollateralJangkaWaktuLikuiditasController;
use Modules\Admin\Http\Controllers\PprConditionShariaSumberPendapatanController;
use Modules\Admin\Http\Controllers\PprCollateralNfJangkaWaktuLikuidasiController;

use Modules\Admin\Http\Controllers\PprConditionShariaNfSistemPembayaranController;
use Modules\Admin\Http\Controllers\PprConditionShariaNfKualitasProdukJasaController;
use Modules\Admin\Http\Controllers\PprConditionShariaPengalamanPembiayaanController;
use Modules\Admin\Http\Controllers\PprConditionShariaJmlTanggunganKeluargaController;
use Modules\Admin\Http\Controllers\PprConditionShariaKeamananBisnisPekerjaanController;
use Modules\Admin\Http\Controllers\PprConditionShariaPotensiPertumbuhanHasilController;
use Modules\Admin\Http\Controllers\StatusController;
use Modules\Admin\Http\Controllers\ParameterBobotController;

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

Route::prefix('admin')->middleware(['auth:sanctum', 'verified', 'role:1', 'divisi:0', 'jabatan:0'])->group(function () {
    Route::get('/', 'AdminController@index');
    Route::put('/user/{id}/profile', [UserController::class, 'updateProfile'])->name('admin.user.updateProfile');
    Route::resource('/user', UserController::class);
    Route::get('/parameterbobot', [ParameterBobotController::class, 'index'])->name('admin.parameterbobot.index');
    Route::resource('/skpd/akad', SkpdAkadController::class)->names('admin.skpd.akad');
    Route::resource('/skpd/penggunaan', SkpdJenisPenggunaanController::class)->names('admin.skpd.penggunaan');
    Route::resource('/skpd/jaminan', SkpdJenisJaminanController::class)->names('admin.skpd.jaminan');
    Route::resource('/skpd/instansi', SkpdInstansiController::class)->names('admin.skpd.instansi');
    Route::resource('/skpd/golongan', SkpdGolonganController::class)->names('admin.skpd.golongan');
    Route::resource('/skpd/sektorekonomi', SkpdSektorEkonomiController::class)->names('admin.skpd.sektorekonomi');
    Route::resource('/skpd/statusperkawinan', SkpdStatusPerkawinanController::class)->names('admin.skpd.statusperkawinan');
    Route::resource('/skpd/tanggungan', SkpdTanggunganController::class)->names('admin.skpd.tanggungan');


    Route::resource('/pasar/akad', PasarAkadController::class)->names('admin.pasar.akad');
    Route::resource('/pasar/penggunaan', PasarPenggunaanController::class)->names('admin.pasar.penggunaan');
    Route::resource('/pasar/jaminanrumah', PasarJaminanRumahController::class)->names('admin.pasar.jaminanrumah');
    Route::resource('/pasar/jenispasar', PasarJenisPasarController::class)->names('admin.pasar.jenispasar');
    Route::resource('/pasar/jenisdagang', PasarJenisDagangController::class)->names('admin.pasar.jenisdagang');
    Route::resource('/pasar/sektorekonomi', PasarSektorEkonomiController::class)->names('admin.pasar.sektorekonomi');
    Route::resource('/pasar/statusperkawinan', PasarAtatusPerkawinanController::class)->names('admin.pasar.statusperkawinan');
    Route::resource('/pasar/lamadagang', PasarLamaBerdagangController::class)->names('admin.pasar.lamadagang');
    Route::resource('/pasar/sukubangsa', PasarSukuController::class)->names('admin.pasar.sukubangsa');
    Route::resource('/pasar/tanggungan', PasarTanggunganController::class)->names('admin.pasar.tanggungan');
    Route::resource('/pasar/cashpickup', PasarCashController::class)->names('admin.pasar.cashpickup');
    Route::resource('/pasar/jaminanusaha', PasarJaminanUsahaController::class)->names('admin.pasar.jaminanusaha');
    Route::resource('/pasar/nasabah', PasarJenisNasabahController::class)->names('admin.pasar.nasabah');

    Route::resource('/ppr/fixed_income/character/tempat_bekerja', PprCharacterTempatBekerjaController::class)->names('admin.ppr.fixed_income.character.tempat_bekerja');
    Route::resource('/ppr/fixed_income/character/konsistensi', PprCharacterKonsistensiController::class)->names('admin.ppr.fixed_income.character.konsistensi');
    Route::resource('/ppr/fixed_income/character/kelengkapan_validitas', PprCharacterKelengkapanValiditasController::class)->names('admin.ppr.fixed_income.character.kelengkapan_validitas');
    Route::resource('/ppr/fixed_income/character/angsuran_kolektif', PprCharacterAngsuranKolektifController::class)->names('admin.ppr.fixed_income.character.angsuran_kolektif');
    Route::resource('/ppr/fixed_income/character/pengalaman_pembiayaan', PprCharacterPengalamanPembiayaanController::class)->names('admin.ppr.fixed_income.character.pengalaman_pembiayaan');
    Route::resource('/ppr/fixed_income/character/motivasi', PprCharacterMotivasiController::class)->names('admin.ppr.fixed_income.character.motivasi');
    Route::resource('/ppr/fixed_income/character/referensi', PprCharacterReferensiController::class)->names('admin.ppr.fixed_income.character.referensi');

    Route::resource('/ppr/fixed_income/capital/pekerjaan', PprCapitalPekerjaanController::class)->names('admin.ppr.fixed_income.capital.pekerjaan');
    Route::resource('/ppr/fixed_income/capital/pengalaman_pembiayaan', PprCapitalPengalamanPembiayaanController::class)->names('admin.ppr.fixed_income.capital.pengalaman_pembiayaan');
    Route::resource('/ppr/fixed_income/capital/keamanan_bisnis_pekerjaan', PprCapitalKeamananBisnisPekerjaanController::class)->names('admin.ppr.fixed_income.capital.keamanan_bisnis_pekerjaan');
    Route::resource('/ppr/fixed_income/capital/potensi_pertumbuhan_hasil', PprCapitalPotensiPertumbuhanHasilController::class)->names('admin.ppr.fixed_income.capital.potensi_pertumbuhan_hasil');
    Route::resource('/ppr/fixed_income/capital/sumber_pendapatan', PprCapitalSumberPendapatanController::class)->names('admin.ppr.fixed_income.capital.sumber_pendapatan');
    Route::resource('/ppr/fixed_income/capital/gaji_bersih', PprCapitalGajiBersihController::class)->names('admin.ppr.fixed_income.capital.gaji_bersih');
    Route::resource('/ppr/fixed_income/capital/jml_tanggungan_keluarga', PprCapitalJmlTanggunganKeluargaController::class)->names('admin.ppr.fixed_income.capital.jml_tanggungan_keluarga');

    Route::resource('/ppr/fixed_income/capacity/pekerjaan', PprCapacityPekerjaanController::class)->names('admin.ppr.fixed_income.capacity.pekerjaan');
    Route::resource('/ppr/fixed_income/capacity/pengalaman_pembiayaan', PprCapacityPengalamanPembiayaanController::class)->names('admin.ppr.fixed_income.capacity.pengalaman_pembiayaan');
    Route::resource('/ppr/fixed_income/capacity/keamanan_bisnis_pekerjaan', PprCapacityKeamananBisnisPekerjaanController::class)->names('admin.ppr.fixed_income.capacity.keamanan_bisnis_pekerjaan');
    Route::resource('/ppr/fixed_income/capacity/potensi_pertumbuhan_hasil', PprCapacityPotensiPertumbuhanHasilController::class)->names('admin.ppr.fixed_income.capacity.potensi_pertumbuhan_hasil');
    Route::resource('/ppr/fixed_income/capacity/pengalaman_kerja', PprCapacityPengalamanKerjaController::class)->names('admin.ppr.fixed_income.capacity.pengalaman_kerja');
    Route::resource('/ppr/fixed_income/capacity/pendidikan', PprCapacityPendidikanController::class)->names('admin.ppr.fixed_income.capacity.pendidikan');
    Route::resource('/ppr/fixed_income/capacity/usia', PprCapacityUsiaController::class)->names('admin.ppr.fixed_income.capacity.usia');
    Route::resource('/ppr/fixed_income/capacity/sumber_pendapatan', PprCapacitySumberPendapatanController::class)->names('admin.ppr.fixed_income.capacity.sumber_pendapatan');
    Route::resource('/ppr/fixed_income/capacity/gaji_bersih', PprCapacityGajiBersihController::class)->names('admin.ppr.fixed_income.capacity.gaji_bersih');
    Route::resource('/ppr/fixed_income/capacity/jml_tanggungan_keluarga', PprCapacityJmlTanggunganKeluargaController::class)->names('admin.ppr.fixed_income.capacity.jml_tanggungan_keluarga');

    Route::resource('/ppr/fixed_income/condition_sharia/pekerjaan', PprConditionShariaPekerjaanController::class)->names('admin.ppr.fixed_income.condition_sharia.pekerjaan');
    Route::resource('/ppr/fixed_income/condition_sharia/pengalaman_pembiayaan', PprConditionShariaPengalamanPembiayaanController::class)->names('admin.ppr.fixed_income.condition_sharia.pengalaman_pembiayaan');
    Route::resource('/ppr/fixed_income/condition_sharia/keamanan_bisnis_pekerjaan', PprConditionShariaKeamananBisnisPekerjaanController::class)->names('admin.ppr.fixed_income.condition_sharia.keamanan_bisnis_pekerjaan');
    Route::resource('/ppr/fixed_income/condition_sharia/potensi_pertumbuhan_hasil', PprConditionShariaPotensiPertumbuhanHasilController::class)->names('admin.ppr.fixed_income.condition_sharia.potensi_pertumbuhan_hasil');
    Route::resource('/ppr/fixed_income/condition_sharia/pengalaman_kerja', PprConditionShariaPengalamanKerjaController::class)->names('admin.ppr.fixed_income.condition_sharia.pengalaman_kerja');
    Route::resource('/ppr/fixed_income/condition_sharia/pendidikan', PprConditionShariaPendidikanController::class)->names('admin.ppr.fixed_income.condition_sharia.pendidikan');
    Route::resource('/ppr/fixed_income/condition_sharia/usia', PprConditionShariaUsiaController::class)->names('admin.ppr.fixed_income.condition_sharia.usia');
    Route::resource('/ppr/fixed_income/condition_sharia/sumber_pendapatan', PprConditionShariaSumberPendapatanController::class)->names('admin.ppr.fixed_income.condition_sharia.sumber_pendapatan');
    Route::resource('/ppr/fixed_income/condition_sharia/gaji_bersih', PprConditionShariaGajiBersihController::class)->names('admin.ppr.fixed_income.condition_sharia.gaji_bersih');
    Route::resource('/ppr/fixed_income/condition_sharia/jml_tanggungan_keluarga', PprConditionShariaJmlTanggunganKeluargaController::class)->names('admin.ppr.fixed_income.condition_sharia.jml_tanggungan_keluarga');

    Route::resource('/ppr/fixed_income/collateral/marketabilitas', PprCollateralMarketabilitasController::class)->names('admin.ppr.fixed_income.collateral.marketabilitas');
    Route::resource('/ppr/fixed_income/collateral/kontribusi_pemohon', PprCollateralKontribusiPemohonController::class)->names('admin.ppr.fixed_income.collateral.kontribusi_pemohon');
    Route::resource('/ppr/fixed_income/collateral/pertumbuhan_agunan', PprCollateralPertumbuhanAgunanController::class)->names('admin.ppr.fixed_income.collateral.pertumbuhan_agunan');
    Route::resource('/ppr/fixed_income/collateral/daya_tarik_agunan', PprCollateralDayaTarikAgunanController::class)->names('admin.ppr.fixed_income.collateral.daya_tarik_agunan');
    Route::resource('/ppr/fixed_income/collateral/jangka_waktu_likuidasi', PprCollateralJangkaWaktuLikuidasiController::class)->names('admin.ppr.fixed_income.collateral.jangka_waktu_likuidasi');

    Route::resource('ppr/non_fixed_income/character/tingkat_kepercayaan', PprCharacterNfTingkatKepercayaanController::class)->names('admin.ppr.non_fixed_income.character.tingkat_kepercayaan');
    Route::resource('ppr/non_fixed_income/character/pengelolaan_rekening', PprCharacterNfPengelolaanRekeningController::class)->names('admin.ppr.non_fixed_income.character.pengelolaan_rekening');
    Route::resource('ppr/non_fixed_income/character/reputasi_bisnis', PprCharacterNfReputasiBisnisController::class)->names('admin.ppr.non_fixed_income.character.reputasi_bisnis');
    Route::resource('ppr/non_fixed_income/character/perilaku_pribadi', PprCharacterNfPerilakuPribadiController::class)->names('admin.ppr.non_fixed_income.character.perilaku_pribadi');

    Route::resource('ppr/non_fixed_income/capacity/situasi_persaingan', PprCapacityNfSituasiPersainganController::class)->names('admin.ppr.non_fixed_income.capacity.situasi_persaingan');
    Route::resource('ppr/non_fixed_income/capacity/kaderisasi', PprCapacityNfKaderisasiController::class)->names('admin.ppr.non_fixed_income.capacity.kaderisasi');
    Route::resource('ppr/non_fixed_income/capacity/kualifikasi_komersial', PprCapacityNfKualifikasiKomersialController::class)->names('admin.ppr.non_fixed_income.capacity.kualifikasi_komersial');
    Route::resource('ppr/non_fixed_income/capacity/kualifikasi_teknis', PprCapacityNfKualifikasiTeknisController::class)->names('admin.ppr.non_fixed_income.capacity.kualifikasi_teknis');

    Route::resource('ppr/non_fixed_income/condition_sharia/kualitas_produk_jasa', PprConditionShariaNfKualitasProdukJasaController::class)->names('admin.ppr.non_fixed_income.condition_sharia.kualitas_produk_jasa');
    Route::resource('ppr/non_fixed_income/condition_sharia/sistem_pembayaran', PprConditionShariaNfSistemPembayaranController::class)->names('admin.ppr.non_fixed_income.condition_sharia.sistem_pembayaran');
    Route::resource('ppr/non_fixed_income/condition_sharia/lokasi_usaha', PprConditionShariaNfLokasiUsahaController::class)->names('admin.ppr.non_fixed_income.condition_sharia.lokasi_usaha');

    Route::resource('ppr/non_fixed_income/collateral/marketabilitas', PprCollateralNfMarketabilitasController::class)->names('admin.ppr.non_fixed_income.collateral.marketabilitas');
    Route::resource('ppr/non_fixed_income/collateral/kontribusi_pemohon', PprCollateralNfKontribusiPemohonController::class)->names('admin.ppr.non_fixed_income.collateral.kontribusi_pemohon');
    Route::resource('ppr/non_fixed_income/collateral/pertumbuhan_agunan', PprCollateralNfPertumbuhanAgunanController::class)->names('admin.ppr.non_fixed_income.collateral.pertumbuhan_agunan');
    Route::resource('ppr/non_fixed_income/collateral/daya_tarik_agunan', PprCollateralNfDayaTarikAgunanController::class)->names('admin.ppr.non_fixed_income.collateral.daya_tarik_agunan');
    Route::resource('ppr/non_fixed_income/collateral/jangka_waktu_likuidasi', PprCollateralNfJangkaWaktuLikuidasiController::class)->names('admin.ppr.non_fixed_income.collateral.jangka_waktu_likuidasi');

    Route::resource('status', StatusController::class);
});
