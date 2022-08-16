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
        Schema::create('umkm_jaminan_lains', function (Blueprint $table) {
            $table->id();
            $table->string('umkm_pembiayaan_id')->nullable();
            $table->string('jaminanlain')->nullable();
            $table->string('dokumen_jaminan')->nullable();
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
        Schema::dropIfExists('umkm_jaminan_lains');
    }
};
