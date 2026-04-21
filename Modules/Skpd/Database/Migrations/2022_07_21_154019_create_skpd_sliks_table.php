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
        Schema::create('skpd_sliks', function (Blueprint $table) {
            $table->id();
            $table->integer('skpd_pembiayaan_id');
            $table->string('nama_bank');
            $table->string('plafond');
            $table->string('outstanding');
            $table->string('tenor');
            $table->string('margin');
            $table->string('angsuran');
            $table->string('agunan');
            $table->string('kol_tertinggi');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skpd_sliks');
    }
};
