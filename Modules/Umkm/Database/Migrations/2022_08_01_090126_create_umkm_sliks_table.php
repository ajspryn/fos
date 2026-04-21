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
        Schema::create('umkm_sliks', function (Blueprint $table) {
            $table->id();
            $table->string('umkm_pembiayaan_id') ->nullable();
            $table->string('nama_bank') ->nullable();
            $table->string('plafond')->nullable();;
            $table->string('outstanding')->nullable();;
            $table->string('tenor')->nullable();;
            $table->string('margin')->nullable();;
            $table->string('angsuran')->nullable();;
            $table->string('agunan')->nullable();;
            $table->string('kol')->nullable();
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
        Schema::dropIfExists('umkm_sliks');
    }
};
