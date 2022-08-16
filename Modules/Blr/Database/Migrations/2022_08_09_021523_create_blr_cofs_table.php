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
        Schema::create('blr_cofs', function (Blueprint $table) {
            $table->id();
            $table->integer('blr_id');
            $table->integer('aktiva_produktif_id');
            $table->integer('beban_bagi_hasil_id');

            $table->float('rasio_cof');
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
        Schema::dropIfExists('blr_cofs');
    }
};
