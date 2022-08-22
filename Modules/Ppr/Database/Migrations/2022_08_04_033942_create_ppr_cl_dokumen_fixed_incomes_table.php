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
        Schema::create('ppr_cl_dokumen_fixed_incomes', function (Blueprint $table) {
            $table->id();

            $table->integer('ppr_cl_dokumen_id');
            $table->string('aplikasi_permohonan')->nullable();
            $table->string('copy_ktp')->nullable();
            $table->string('copy_kk')->nullable();
            $table->string('copy_sn_sc')->nullable();
            $table->string('pasphoto_ktp_sn')->nullable();
            $table->string('copy_slip_gaji')->nullable();
            $table->string('copy_tabungan')->nullable();
            $table->string('copy_sk')->nullable();
            $table->string('sk_pemotongan_gaji')->nullable();
            $table->string('npwp')->nullable();

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
        Schema::dropIfExists('ppr_cl_dokumen_fixed_incomes');
    }
};
