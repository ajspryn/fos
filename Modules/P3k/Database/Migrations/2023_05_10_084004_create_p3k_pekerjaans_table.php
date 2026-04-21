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
        Schema::create('p3k_pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->integer("p3k_nasabah_id");
            $table->string("dinas");
            $table->string("nama_unit_kerja");
            $table->string("jabatan");
            $table->string("dokumen_sk");
            $table->string("no_sk");
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
        Schema::dropIfExists('p3k_pekerjaans');
    }
};
