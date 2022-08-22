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
        Schema::create('ppr_pemberkasan_memos', function (Blueprint $table) {
            $table->id();

            $table->integer('ppr_cl_dokumen_id');
            $table->string('cl_persyaratan')->nullable();
            $table->string('cl_dokumen')->nullable();
            $table->string('berkas_copy')->nullable();
            $table->string('paper_hasil_wawancara')->nullable();
            $table->string('paper_analisa_5c')->nullable();
            $table->string('paper_fsm')->nullable();
            $table->string('paper_ots')->nullable();
            $table->string('laporan_hasil_penilaian_agunan')->nullable();
            $table->string('perhitungan_plafond_ftv')->nullable();
            $table->string('daftar_calon_nasabah')->nullable();

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
        Schema::dropIfExists('ppr_pemberkasan_memos');
    }
};
