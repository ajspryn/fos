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
        Schema::create('skpd_jaminans', function (Blueprint $table) {
            $table->id();
            $table->integer('skpd_pembiayaan_id');
            $table->integer('skpd_jenis_jaminan_id');
            $table->string('dokumen_jaminan');
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
        Schema::dropIfExists('skpd_jaminans');
    }
};
