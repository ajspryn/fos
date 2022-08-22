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
        Schema::create('ppr_cl_dokumen_agunans', function (Blueprint $table) {
            $table->id();

            $table->integer('ppr_cl_dokumen_id');
            $table->string('copy_shgb_shm')->nullable();
            $table->string('copy_shgb_proses')->nullable();
            $table->string('copy_imb')->nullable();
            $table->string('copy_imb_proses')->nullable();

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
        Schema::dropIfExists('ppr_cl_dokumen_agunans');
    }
};
