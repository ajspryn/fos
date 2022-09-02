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
        Schema::create('form_ppr_data_pribadis', function (Blueprint $table) {
            $table->id();

            //Pemohon PPR Syariah
            $table->string('form_pribadi_pemohon_nama_lengkap');
            $table->string('form_pribadi_pemohon_nama_ktp');
            $table->string('form_pribadi_pemohon_gelar')->nullable();
            $table->string('form_pribadi_pemohon_nama_alias')->nullable();
            $table->string('form_pribadi_pemohon_no_ktp');
            $table->string('form_pribadi_pemohon_jenis_kelamin');
            $table->string('form_pribadi_pemohon_tempat_lahir');
            $table->date('form_pribadi_pemohon_tanggal_lahir');
            $table->string('form_pribadi_pemohon_npwp');
            $table->string('form_pribadi_pemohon_pendidikan');
            $table->string('form_pribadi_pemohon_agama')->nullable();
            $table->string('form_pribadi_pemohon_agama_lain')->nullable();
            $table->string('form_pribadi_pemohon_status_pernikahan');
            $table->integer('form_pribadi_pemohon_jml_anak');
            $table->integer('form_pribadi_pemohon_jml_tanggungan');
            $table->string('form_pribadi_pemohon_nama_gadis_ibu_kandung')->nullable();
            $table->string('form_pribadi_pemohon_alamat_ktp');
            $table->string('form_pribadi_pemohon_alamat_ktp_rt');
            $table->string('form_pribadi_pemohon_alamat_ktp_rw');
            $table->string('form_pribadi_pemohon_alamat_ktp_kelurahan');
            $table->string('form_pribadi_pemohon_alamat_ktp_kecamatan');
            $table->string('form_pribadi_pemohon_alamat_ktp_dati2');
            $table->string('form_pribadi_pemohon_alamat_ktp_provinsi');
            $table->integer('form_pribadi_pemohon_alamat_ktp_kode_pos');
            $table->string('form_pribadi_pemohon_alamat_domisili')->nullable();
            $table->string('form_pribadi_pemohon_alamat_domisili_rt')->nullable();
            $table->string('form_pribadi_pemohon_alamat_domisili_rw')->nullable();
            $table->string('form_pribadi_pemohon_alamat_domisili_kelurahan')->nullable();
            $table->string('form_pribadi_pemohon_alamat_domisili_kecamatan')->nullable();
            $table->string('form_pribadi_pemohon_alamat_domisili_dati2')->nullable();
            $table->string('form_pribadi_pemohon_alamat_domisili_provinsi')->nullable();
            $table->integer('form_pribadi_pemohon_alamat_domisili_kode_pos')->nullable();
            $table->string('form_pribadi_pemohon_no_telp')->nullable();
            $table->string('form_pribadi_pemohon_no_handphone');
            $table->string('form_pribadi_pemohon_status_tempat_tinggal')->nullable();
            $table->string('form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_tahun')->nullable();
            $table->string('form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_bulan')->nullable();
            $table->string('form_pribadi_pemohon_status_tempat_tinggal_dijaminkan')->nullable();
            $table->string('form_pribadi_pemohon_status_tempat_tinggal_dijaminkan_ya_kepada')->nullable();
            $table->string('form_pribadi_pemohon_alamat_korespondensi')->nullable();
            $table->string('foto_id')->nullable();

            //Istri/suami pemohon
            $table->string('form_pribadi_istri_suami_nama_lengkap')->nullable();
            $table->string('form_pribadi_istri_suami_gelar')->nullable();
            $table->string('form_pribadi_istri_suami_no_ktp')->nullable();
            $table->string('form_pribadi_istri_suami_tempat_lahir')->nullable();
            $table->date('form_pribadi_istri_suami_tanggal_lahir')->nullable();
            $table->string('form_pribadi_istri_suami_npwp')->nullable();
            $table->string('form_pribadi_istri_suami_pendidikan')->nullable();

            //Keluarga terdekat pemohon
            $table->string('form_pribadi_keluarga_terdekat_nama_lengkap');
            $table->string('form_pribadi_keluarga_terdekat_hubungan');
            $table->string('form_pribadi_keluarga_terdekat_hubungan_lain')->nullable();
            $table->string('form_pribadi_keluarga_terdekat_alamat');
            $table->string('form_pribadi_keluarga_terdekat_alamat_rt');
            $table->string('form_pribadi_keluarga_terdekat_alamat_rw');
            $table->string('form_pribadi_keluarga_terdekat_alamat_kelurahan');
            $table->string('form_pribadi_keluarga_terdekat_alamat_kecamatan');
            $table->string('form_pribadi_keluarga_terdekat_alamat_dati2');
            $table->string('form_pribadi_keluarga_terdekat_alamat_provinsi');
            $table->integer('form_pribadi_keluarga_terdekat_alamat_kode_pos');
            $table->string('form_pribadi_keluarga_terdekat_no_telp');

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
        Schema::dropIfExists('form_ppr_data_pribadis');
    }
};
