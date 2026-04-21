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
        Schema::create('ppr_pembiayaan_histories', function (Blueprint $table) {
            $table->id();

            $table->integer('form_ppr_pembiayaan_id');
            $table->string('status_id');
            $table->string('jabatan_id');
            $table->string('divisi_id')->nullable();
            $table->string('catatan')->nullable();
            $table->string('user_id')->nullable();
            $table->string('cek_staff_akad')->nullable()->default('Belum');

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
        Schema::dropIfExists('ppr_pembiayaan_histories');
    }
};
