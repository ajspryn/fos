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
        Schema::create('form_ppr_pembiayaans', function (Blueprint $table) {
            $table->id();

            $table->string('jenis_nasabah');
            $table->integer('form_ppr_data_pribadi_id');
            $table->integer('form_ppr_data_pekerjaan_id');
            $table->integer('form_ppr_data_agunan_id');
            $table->integer('form_ppr_data_kekayaan_simpanan_id');
            $table->integer('form_ppr_data_kekayaan_tanah_bangunan_id');
            $table->integer('form_ppr_data_kekayaan_kendaraan_id');
            $table->integer('form_ppr_data_kekayaan_saham_id');
            $table->integer('form_ppr_data_kekayaan_lainnya_id');
            $table->integer('form_ppr_data_pinjaman_id');
            $table->integer('form_ppr_data_pinjaman_kartu_kredit_id');
            $table->integer('form_ppr_data_pinjaman_lainnya_id');
            $table->integer('user_id');

            //Check List
            // $table->integer('ppr_cl_persyaratan_id')->nullable();
            // $table->integer('ppr_cl_dokumen_fixed_income_id')->nullable();
            // $table->integer('ppr_cl_dokumen_non_fixed_income_id')->nullable();
            // $table->integer('ppr_cl_dokumen_agunan_id')->nullable();
            // $table->integer('ppr_ability_to_repay_fixed_income_id')->nullable();
            // $table->integer('ppr_ability_to_repay_non_fixed_income_id')->nullable();
            // $table->integer('ppr_pemberkasan_memo_id')->nullable();
            $table->integer('ppr_cl_dokumen_id')->nullable();
            $table->integer('ppr_scoring_id')->nullable();

            $table->string('form_cl')->nullable();
            $table->string('form_score')->nullable();
            //Scoring
            // $table->integer('ppr_character_id')->nullable();
            // $table->integer('ppr_capital_id')->nullable();
            // $table->integer('ppr_capacity_id')->nullable();
            // $table->integer('ppr_condition_id')->nullable();
            // $table->integer('ppr_collateral_id')->nullable();

            // $table->integer('ppr_scoring_atr_fixed_income')->nullable();
            // $table->integer('ppr_scoring_wtr_fixed_income')->nullable();
            // $table->integer('ppr_scoring_collateral_fixed_income')->nullable();
            // $table->integer('ppr_scoring_fixed_income_id')->nullable();
            // $table->integer('ppr_scoring_non_fixed_income_id')->nullable();

            $table->string('form_permohonan_jenis_akad_pembayaran')->nullable();
            $table->string('form_permohonan_jenis_akad_pembayaran_lain')->nullable();
            $table->integer('form_permohonan_nilai_ppr_dimohon');
            $table->integer('form_permohonan_uang_muka_dana_sendiri');
            $table->integer('form_permohonan_nilai_hpp')->nullable();
            $table->integer('form_permohonan_harga_jual')->nullable();
            $table->string('form_permohonan_jangka_waktu_ppr');
            $table->string('form_permohonan_peruntukan_ppr');
            $table->integer('form_permohonan_jml_margin')->nullable();
            $table->integer('form_permohonan_jml_sewa')->nullable();
            $table->integer('form_permohonan_jml_bagi_hasil')->nullable();
            $table->integer('form_permohonan_jml_bulan')->nullable();
            $table->string('form_permohonan_sistem_pembayaran_angsuran');

            $table->string('form_penghasilan_pengeluaran_penghasilan_utama_pemohon');
            $table->string('form_penghasilan_pengeluaran_penghasilan_lain_pemohon')->nullable();
            $table->string('form_penghasilan_pengeluaran_penghasilan_utama_istri_suami')->nullable();
            $table->string('form_penghasilan_pengeluaran_penghasilan_lain_istri_suami')->nullable();
            $table->string('form_penghasilan_pengeluaran_total_penghasilan');
            $table->string('form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga');
            $table->string('form_penghasilan_pengeluaran_kewajiban_angsuran')->nullable();
            $table->string('form_penghasilan_pengeluaran_total_pengeluaran');
            $table->string('form_penghasilan_pengeluaran_sisa_penghasilan');
            $table->string('form_penghasilan_pengeluaran_kemampuan_mengangsur');

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
        Schema::dropIfExists('form_ppr_pembiayaans');
    }
};
