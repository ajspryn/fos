<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppr_ability_to_repay_non_fixed_incomes', function (Blueprint $table) {
            $table->id();

            $table->integer('ppr_cl_dokumen_id');

            //Usaha 1
            $table->string('usaha1_penjualan', 25)->nullable();
            $table->string('usaha1_diskon', 25)->nullable();
            $table->string('usaha1_retur', 25)->nullable();
            $table->string('usaha1_penjualan_bersih', 25)->nullable();

            $table->string('usaha1_persediaan_barang_langsung', 25)->nullable();
            $table->string('usaha1_pembelian_bahan_langsung', 25)->nullable();
            $table->string('usaha1_upah_langsung', 25)->nullable();

            $table->string('usaha1_upah_tidak_langsung', 25)->nullable();
            $table->string('usaha1_biaya_penyusutan', 25)->nullable();
            $table->string('usaha1_boh_lain', 25)->nullable();
            $table->string('usaha1_total_boh', 25)->nullable();

            $table->string('usaha1_jumlah_harga_pokok_penjualan', 25)->nullable();
            $table->string('usaha1_laba_kotor', 25)->nullable();

            $table->string('usaha1_biaya_penjualan', 25)->nullable();
            $table->string('usaha1_biaya_gaji_kds', 25)->nullable();
            $table->string('usaha1_biaya_lisrik_telp_air', 25)->nullable();
            $table->string('usaha1_biaya_perawatan_gedung', 25)->nullable();
            $table->string('usaha1_biaya_bagi_hasil_sewa_margin', 25)->nullable();
            $table->string('usaha1_biaya_adm_lain', 25)->nullable();
            $table->string('usaha1_jml_biaya_adm', 25)->nullable();
            $table->string('usaha1_laba_sebelum_pajak', 25)->nullable();
            $table->string('usaha1_pajak_zakat', 25)->nullable();
            $table->string('usaha1_laba_setelah_pajak', 25)->nullable();

            //Usaha 2
            $table->string('usaha2_penjualan', 25)->nullable();
            $table->string('usaha2_diskon', 25)->nullable();
            $table->string('usaha2_retur', 25)->nullable();
            $table->string('usaha2_penjualan_bersih', 25)->nullable();

            $table->string('usaha2_persediaan_barang_langsung', 25)->nullable();
            $table->string('usaha2_pembelian_bahan_langsung', 25)->nullable();
            $table->string('usaha2_upah_langsung', 25)->nullable();

            $table->string('usaha2_upah_tidak_langsung', 25)->nullable();
            $table->string('usaha2_biaya_penyusutan', 25)->nullable();
            $table->string('usaha2_boh_lain', 25)->nullable();
            $table->string('usaha2_total_boh', 25)->nullable();

            $table->string('usaha2_jumlah_harga_pokok_penjualan', 25)->nullable();
            $table->string('usaha2_laba_kotor', 25)->nullable();

            $table->string('usaha2_biaya_penjualan', 25)->nullable();
            $table->string('usaha2_biaya_gaji_kds', 25)->nullable();
            $table->string('usaha2_biaya_lisrik_telp_air', 25)->nullable();
            $table->string('usaha2_biaya_perawatan_gedung', 25)->nullable();
            $table->string('usaha2_biaya_bagi_hasil_sewa_margin', 25)->nullable();
            $table->string('usaha2_biaya_adm_lain', 25)->nullable();
            $table->string('usaha2_jml_biaya_adm', 25)->nullable();
            $table->string('usaha2_laba_sebelum_pajak', 25)->nullable();
            $table->string('usaha2_pajak_zakat', 25)->nullable();
            $table->string('usaha2_laba_setelah_pajak', 25)->nullable();

            //Usaha Pasangan
            $table->string('usaha_pasangan_penjualan', 25)->nullable();
            $table->string('usaha_pasangan_diskon', 25)->nullable();
            $table->string('usaha_pasangan_retur', 25)->nullable();
            $table->string('usaha_pasangan_penjualan_bersih', 25)->nullable();

            $table->string('usaha_pasangan_persediaan_barang_langsung', 25)->nullable();
            $table->string('usaha_pasangan_pembelian_bahan_langsung', 25)->nullable();
            $table->string('usaha_pasangan_upah_langsung', 25)->nullable();

            $table->string('usaha_pasangan_upah_tidak_langsung', 25)->nullable();
            $table->string('usaha_pasangan_biaya_penyusutan', 25)->nullable();
            $table->string('usaha_pasangan_boh_lain', 25)->nullable();
            $table->string('usaha_pasangan_total_boh', 25)->nullable();

            $table->string('usaha_pasangan_jumlah_harga_pokok_penjualan', 25)->nullable();
            $table->string('usaha_pasangan_laba_kotor', 25)->nullable();

            $table->string('usaha_pasangan_biaya_penjualan', 25)->nullable();
            $table->string('usaha_pasangan_biaya_gaji_kds', 25)->nullable();
            $table->string('usaha_pasangan_biaya_lisrik_telp_air', 25)->nullable();
            $table->string('usaha_pasangan_biaya_perawatan_gedung', 25)->nullable();
            $table->string('usaha_pasangan_biaya_bagi_hasil_sewa_margin', 25)->nullable();
            $table->string('usaha_pasangan_biaya_adm_lain', 25)->nullable();
            $table->string('usaha_pasangan_jml_biaya_adm', 25)->nullable();
            $table->string('usaha_pasangan_laba_sebelum_pajak', 25)->nullable();
            $table->string('usaha_pasangan_pajak_zakat', 25)->nullable();
            $table->string('usaha_pasangan_laba_setelah_pajak', 25)->nullable();

            //Total
            $table->string('total_penghasilan_bersih', 25)->nullable();
            $table->string('total_angsuran', 25)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ppr_ability_to_repay_non_fixed_incomes');
    }
};
