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
        Schema::create('ppr_ability_to_repay_fixed_incomes', function (Blueprint $table) {
            $table->id();

            $table->integer('ppr_cl_dokumen_id');
            $table->string('gaji1_gaji_kotor')->nullable();
            $table->string('gaji1_potongan_tht')->nullable();
            $table->string('gaji1_potongan_jamsostek')->nullable();
            $table->string('gaji1_potongan_koperasi')->nullable();
            $table->string('gaji1_potongan_lain')->nullable();
            $table->string('gaji1_gaji_bersih')->nullable();
            $table->string('gaji2_gaji_kotor')->nullable();
            $table->string('gaji2_potongan_tht')->nullable();
            $table->string('gaji2_potongan_jamsostek')->nullable();
            $table->string('gaji2_potongan_koperasi')->nullable();
            $table->string('gaji2_potongan_lain')->nullable();
            $table->string('gaji2_gaji_bersih')->nullable();
            $table->string('gaji_pasangan_gaji_kotor')->nullable();
            $table->string('gaji_pasangan_potongan_tht')->nullable();
            $table->string('gaji_pasangan_potongan_jamsostek')->nullable();
            $table->string('gaji_pasangan_potongan_koperasi')->nullable();
            $table->string('gaji_pasangan_potongan_lain')->nullable();
            $table->string('gaji_pasangan_gaji_bersih')->nullable();
            $table->string('angsuran_rumah')->nullable();
            $table->string('angsuran_mobil')->nullable();
            $table->string('angsuran_lain')->nullable();
            $table->string('total_angsuran')->nullable();
            $table->string('biaya_pangan')->nullable();
            $table->string('biaya_sandang')->nullable();
            $table->string('biaya_transportasi')->nullable();
            $table->string('biaya_listrik')->nullable();
            $table->string('biaya_telepon')->nullable();
            $table->string('biaya_gas')->nullable();
            $table->string('biaya_air')->nullable();
            $table->string('biaya_pendidikan')->nullable();
            $table->string('biaya_kesehatan')->nullable();
            $table->string('biaya_lain')->nullable();
            $table->string('total_biaya_per_bulan')->nullable();
            $table->string('total_penghasilan_bersih_per_bulan')->nullable();

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
        Schema::dropIfExists('ppr_ability_to_repay_fixed_incomes');
    }
};
