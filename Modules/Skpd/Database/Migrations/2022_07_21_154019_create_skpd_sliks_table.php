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
            $table->integer('bank_id');
            $table->String('plafond');
            $table->String('outstanding');
            $table->String('tenor');
            $table->String('bunga_mingguan');
            $table->String('angsuran');
            $table->String('kol_tertinggi');
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
        Schema::dropIfExists('skpd_sliks');
    }
};
