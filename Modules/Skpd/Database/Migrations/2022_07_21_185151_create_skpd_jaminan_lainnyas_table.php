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
        Schema::create('skpd_jaminan_lainnyas', function (Blueprint $table) {
            $table->id();
            $table->integer('skpd_pembiayaan_id');
            $table->integer('nama_jaminan_lainnya');
            $table->string('dokumen_jaminan_lainnya');
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
        Schema::dropIfExists('skpd_jaminan_lainnyas');
    }
};
