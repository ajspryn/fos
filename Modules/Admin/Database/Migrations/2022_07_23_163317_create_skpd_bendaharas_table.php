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
        Schema::create('skpd_bendaharas', function (Blueprint $table) {
            $table->id();
            $table->string('skpd_instansi_id');
            $table->string('nama_bendahara')->nullable();
            $table->string('no_telp_bendahara')->nullable();
            $table->string('rating');
            $table->string('bobot');
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
        Schema::dropIfExists('skpd_bendaharas');
    }
};
