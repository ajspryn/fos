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
        Schema::create('pasar_legalitas_rumahs', function (Blueprint $table) {
            $table->id();
            $table->string('pasar_pembiayaan_id');
            $table->string('kepemilikan_rumah');
            $table->string('legalitas_kepemilikan_rumah');
            $table->string('dokumen_legalitas_kepemilikan_rumah')->nullable();
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
        Schema::dropIfExists('pasar_legalitas_rumahs');
    }
};
