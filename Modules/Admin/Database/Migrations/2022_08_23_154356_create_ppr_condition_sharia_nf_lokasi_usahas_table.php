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
        Schema::create('ppr_condition_sharia_nf_lokasi_usahas', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('keterangan');
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
        Schema::dropIfExists('ppr_condition_sharia_nf_lokasi_usahas');
    }
};
