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
        Schema::create('ppr_cl_dokumen_non_fixed_incomes', function (Blueprint $table) {
            $table->id();

            $table->integer('ppr_cl_dokumen_id');
            $table->string('aplikasi_permohonan')->nullable();
            $table->string('copy_ktp')->nullable();
            $table->string('copy_kk')->nullable();
            $table->string('copy_sn_sc')->nullable();
            $table->string('foto_pemohon_pasangan')->nullable();
            $table->string('sk_penghasilan')->nullable();
            $table->string('copy_tabungan_menyimpan')->nullable();
            $table->string('copy_akta_izin_usaha')->nullable();
            $table->string('copy_tabungan_mengambil')->nullable();
            $table->string('npwp_bukti_pp')->nullable();
            $table->string('laporan_keuangan_perusahaan')->nullable();

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
        Schema::dropIfExists('ppr_cl_dokumen_non_fixed_incomes');
    }
};
