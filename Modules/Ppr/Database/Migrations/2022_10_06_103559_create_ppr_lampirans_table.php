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
        Schema::create('ppr_lampirans', function (Blueprint $table) {
            $table->id();

            $table->integer('form_ppr_pembiayaan_id');
            $table->string('dokumen_pemohon')->nullable();
            $table->string('dokumen_agunan')->nullable();
            $table->string('ots_agunan')->nullable();
            $table->string('ots_tempat_usaha')->nullable();
            $table->string('hasil_wawancara')->nullable();
            $table->string('appraisal_kjpp')->nullable();

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
        Schema::dropIfExists('ppr_lampirans');
    }
};
