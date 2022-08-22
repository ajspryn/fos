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
            $table->integer('usaha1_penjualan')->nullable();
            $table->integer('usaha1_diskon')->nullable();
            $table->integer('usaha1_retur')->nullable();
            $table->integer('usaha1_penjualan_bersih')->nullable();

            $table->integer('usaha1_persediaan_barang_langsung')->nullable();
            $table->integer('usaha1_pembelian_bahan_langsung')->nullable();
            $table->integer('usaha1_upah_langsung')->nullable();

            $table->integer('usaha1_upah_tidak_langsung')->nullable();
            $table->integer('usaha1_biaya_penyusutan')->nullable();
            $table->integer('usaha1_boh_lain')->nullable();
            $table->integer('usaha1_total_boh')->nullable();

            $table->integer('usaha1_jumlah_harga_pokok_penjualan')->nullable();
            $table->integer('usaha1_laba_kotor')->nullable();

            $table->integer('usaha1_biaya_penjualan')->nullable();
            $table->integer('usaha1_biaya_gaji_kds')->nullable();
            $table->integer('usaha1_biaya_lisrik_telp_air')->nullable();
            $table->integer('usaha1_biaya_perawatan_gedung')->nullable();
            $table->integer('usaha1_biaya_bagi_hasil_sewa_margin')->nullable();
            $table->integer('usaha1_biaya_adm_lain')->nullable();
            $table->integer('usaha1_jml_biaya_adm')->nullable();
            $table->integer('usaha1_laba_sebelum_pajak')->nullable();
            $table->integer('usaha1_pajak_zakat')->nullable();
            $table->integer('usaha1_laba_setelah_pajak')->nullable();

            //Usaha 2
            $table->integer('usaha2_penjualan')->nullable();
            $table->integer('usaha2_diskon')->nullable();
            $table->integer('usaha2_retur')->nullable();
            $table->integer('usaha2_penjualan_bersih')->nullable();

            $table->integer('usaha2_persediaan_barang_langsung')->nullable();
            $table->integer('usaha2_pembelian_bahan_langsung')->nullable();
            $table->integer('usaha2_upah_langsung')->nullable();

            $table->integer('usaha2_upah_tidak_langsung')->nullable();
            $table->integer('usaha2_biaya_penyusutan')->nullable();
            $table->integer('usaha2_boh_lain')->nullable();
            $table->integer('usaha2_total_boh')->nullable();

            $table->integer('usaha2_jumlah_harga_pokok_penjualan')->nullable();
            $table->integer('usaha2_laba_kotor')->nullable();

            $table->integer('usaha2_biaya_penjualan')->nullable();
            $table->integer('usaha2_biaya_gaji_kds')->nullable();
            $table->integer('usaha2_biaya_lisrik_telp_air')->nullable();
            $table->integer('usaha2_biaya_perawatan_gedung')->nullable();
            $table->integer('usaha2_biaya_bagi_hasil_sewa_margin')->nullable();
            $table->integer('usaha2_biaya_adm_lain')->nullable();
            $table->integer('usaha2_jml_biaya_adm')->nullable();
            $table->integer('usaha2_laba_sebelum_pajak')->nullable();
            $table->integer('usaha2_pajak_zakat')->nullable();
            $table->integer('usaha2_laba_setelah_pajak')->nullable();

            //Usaha Pasangan
            $table->integer('usaha_pasangan_penjualan')->nullable();
            $table->integer('usaha_pasangan_diskon')->nullable();
            $table->integer('usaha_pasangan_retur')->nullable();
            $table->integer('usaha_pasangan_penjualan_bersih')->nullable();

            $table->integer('usaha_pasangan_persediaan_barang_langsung')->nullable();
            $table->integer('usaha_pasangan_pembelian_bahan_langsung')->nullable();
            $table->integer('usaha_pasangan_upah_langsung')->nullable();

            $table->integer('usaha_pasangan_upah_tidak_langsung')->nullable();
            $table->integer('usaha_pasangan_biaya_penyusutan')->nullable();
            $table->integer('usaha_pasangan_boh_lain')->nullable();
            $table->integer('usaha_pasangan_total_boh')->nullable();

            $table->integer('usaha_pasangan_jumlah_harga_pokok_penjualan')->nullable();
            $table->integer('usaha_pasangan_laba_kotor')->nullable();

            $table->integer('usaha_pasangan_biaya_penjualan')->nullable();
            $table->integer('usaha_pasangan_biaya_gaji_kds')->nullable();
            $table->integer('usaha_pasangan_biaya_lisrik_telp_air')->nullable();
            $table->integer('usaha_pasangan_biaya_perawatan_gedung')->nullable();
            $table->integer('usaha_pasangan_biaya_bagi_hasil_sewa_margin')->nullable();
            $table->integer('usaha_pasangan_biaya_adm_lain')->nullable();
            $table->integer('usaha_pasangan_jml_biaya_adm')->nullable();
            $table->integer('usaha_pasangan_laba_sebelum_pajak')->nullable();
            $table->integer('usaha_pasangan_pajak_zakat')->nullable();
            $table->integer('usaha_pasangan_laba_setelah_pajak')->nullable();

            //Total
            $table->integer('total_penghasilan_bersih')->nullable();
            $table->integer('total_angsuran')->nullable();
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
