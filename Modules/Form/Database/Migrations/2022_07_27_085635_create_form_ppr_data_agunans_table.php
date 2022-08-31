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
        Schema::create('form_ppr_data_agunans', function (Blueprint $table) {
            $table->id();

            $table->integer('form_ppr_pembiayaan_id');

            //Agunan I
            $table->string('form_agunan_1_jenis');
            $table->string('form_agunan_1_jenis_lain')->nullable();
            $table->integer('form_agunan_1_nilai_harga_jual');
            $table->string('form_agunan_1_alamat');
            $table->string('form_agunan_1_alamat_rt');
            $table->string('form_agunan_1_alamat_rw');
            $table->string('form_agunan_1_alamat_kelurahan');
            $table->string('form_agunan_1_alamat_kecamatan');
            $table->string('form_agunan_1_alamat_dati2');
            $table->string('form_agunan_1_alamat_provinsi');
            $table->integer('form_agunan_1_alamat_kode_pos');
            $table->string('form_agunan_1_status_bukti_kepemilikan');
            $table->date('form_agunan_1_status_bukti_kepemilikan_tgl_berakhir');
            $table->string('form_agunan_1_status_bukti_kepemilikan_hak');
            $table->string('form_agunan_1_no_sertifikat');
            $table->date('form_agunan_1_no_sertifikat_tgl_penerbitan');
            $table->string('form_agunan_1_no_imb');
            $table->string('form_agunan_1_peruntukan_bangunan');
            $table->float('form_agunan_1_luas_tanah');
            $table->float('form_agunan_1_luas_bangunan');
            $table->string('form_agunan_1_atas_nama');
            $table->string('form_agunan_1_nama_pengembang')->nullable();
            $table->string('form_agunan_1_nama_proyek_perumahan')->nullable();


            //Agunan II
            $table->string('form_agunan_2_jenis')->nullable();
            $table->string('form_agunan_2_jenis_lain')->nullable();
            $table->string('form_agunan_2_nilai_harga_jual')->nullable();
            $table->string('form_agunan_2_alamat')->nullable();
            $table->string('form_agunan_2_alamat_rt')->nullable();
            $table->string('form_agunan_2_alamat_rw')->nullable();
            $table->string('form_agunan_2_alamat_kelurahan')->nullable();
            $table->string('form_agunan_2_alamat_kecamatan')->nullable();
            $table->string('form_agunan_2_alamat_dati2')->nullable();
            $table->string('form_agunan_2_alamat_provinsi')->nullable();
            $table->integer('form_agunan_2_alamat_kode_pos')->nullable();
            $table->string('form_agunan_2_status_bukti_kepemilikan')->nullable();
            $table->string('form_agunan_2_status_bukti_kepemilikan_tgl_berakhir')->nullable();
            $table->string('form_agunan_2_status_bukti_kepemilikan_hak')->nullable();
            $table->string('form_agunan_2_no_sertifikat')->nullable();
            $table->string('form_agunan_2_no_sertifikat_tgl_penerbitan')->nullable();
            $table->string('form_agunan_2_no_imb')->nullable();
            $table->string('form_agunan_2_peruntukan_bangunan')->nullable();
            $table->float('form_agunan_2_luas_tanah')->nullable();
            $table->float('form_agunan_2_luas_bangunan')->nullable();
            $table->string('form_agunan_2_atas_nama')->nullable();


            //Agunan III
            $table->string('form_agunan_3_jenis')->nullable();
            $table->string('form_agunan_3_nilai')->nullable();
            $table->string('form_agunan_3_no_rekening')->nullable();
            $table->string('form_agunan_3_atas_nama')->nullable();

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
        Schema::dropIfExists('form_ppr_data_agunans');
    }
};
