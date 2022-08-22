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
        Schema::create('form_ppr_data_pinjaman_lainnyas', function (Blueprint $table) {
            $table->id();
            $table->integer('form_ppr_pembiayaan_id');

            $table->string('form_pinjaman_lainnya')->nullable();
            $table->string('form_pinjaman_lainnya_rp')->nullable();

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
        Schema::dropIfExists('form_ppr_data_pinjaman_lainnyas');
    }
};
