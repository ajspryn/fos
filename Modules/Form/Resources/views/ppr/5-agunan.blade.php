<div id="formDataAgunan" class="content" role="tabpanel" aria-labelledby="agunan-trigger">
    <div class="content-header">
        <h4 class="mb-0 mt-2">Data Agunan</h4>
        <hr>
    </div>

    <!-- Agunan I-->
    <div class="content-header">
        <h5 class="mb-0 mt-2">Agunan I</h5>
        <small class="text-muted">Lengkapi Data Agunan I.</small>
    </div>
    <div class="row">
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_1_jenis"><small class="text-danger">*
                </small>Jenis Agunan</label>
            <select class="select2 w-100" name="form_agunan_1_jenis" id="formAgunan1Jenis"
                onChange="changeJenisAgunan1()" data-placeholder="Pilih Jenis Agunan" required>
                <option value=""></option>
                <option value="Tanah">Tanah</option>
                <option value="Rumah Tinggal">Rumah Tinggal</option>
                <option value="Apartemen">Apartemen</option>
                <option value="Rusun">Rusun</option>
                <option value="Ruko">Ruko</option>
                <option value="Rukan">Rukan</option>
                <option value="Lain-lain">Lain-lain</option>
            </select>
        </div>
        <div class="mb-1 col-md-6 hide" id="ifJenisAgunan1Lain">
            <label class="form-label" for="jenisAgunan1Lain"><small class="text-danger">*
                </small>Jenis Agunan Lainnya</label>
            <input type="text" name="form_agunan_1_jenis_lain" id="jenisAgunan1Lain" class="form-control"
                placeholder="Jenis Agunan Lainnya" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_1_nilai_harga_jual"><small class="text-danger">*
                </small>Nilai/Harga Jual (Harga Jual merupakan Harga Transaksi/Harga
                Jual
                Setelah Discount)</label>
            <input type="text" name="form_agunan_1_nilai_harga_jual" id="form_agunan_1_nilai_harga_jual"
                class="form-control numeral-mask" placeholder="Masukkan Nilai/Harga Jual" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_1_nilai_harga_taksasi_kjpp"><small class="text-danger">*
                </small><b>Nilai/Harga Taksasi KJPP</b></label>
            <input type="text" name="form_agunan_1_nilai_harga_taksasi_kjpp"
                id="form_agunan_1_nilai_harga_taksasi_kjpp" class="form-control numeral-mask"
                placeholder="Masukkan Nilai/Harga Taksasi KJPP" required />
        </div>

        <div class="mb-1 col-md-12">
            <div data-repeater-list="form_agunan_1_alamat">
                <div data-repeater-item>
                    <div class="row d-flex align-items-end">
                        <div class="col-md-4 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_agunan_1_alamat"><small class="text-danger">*
                                    </small>Alamat/Lokasi Agunan</label>
                                <input type="text" class="form-control" name="form_agunan_1_alamat"
                                    id="form_agunan_1_alamat" aria-describedby="form_agunan_1_alamat"
                                    placeholder="Alamat/Lokasi Agunan" required />
                            </div>
                        </div>

                        <div class="col-md-1 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_agunan_1_alamat_rt"><small class="text-danger">*
                                    </small>RT</label>
                                <input type="number" class="form-control" name="form_agunan_1_alamat_rt"
                                    id="form_agunan_1_alamat_rt" aria-describedby="form_agunan_1_alamat_rt"
                                    placeholder="RT" required />
                            </div>
                        </div>

                        <div class="col-md-1 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_agunan_1_alamat_rw"><small class="text-danger">*
                                    </small>RW</label>
                                <input type="number" class="form-control" name="form_agunan_1_alamat_rw"
                                    id="form_agunan_1_alamat_rw" aria-describedby="form_agunan_1_alamat_rw"
                                    placeholder="RW" required />
                            </div>
                        </div>

                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_agunan_1_alamat_kelurahan"><small
                                        class="text-danger">*
                                    </small>Kelurahan</label>
                                <input type="text" class="form-control" name="form_agunan_1_alamat_kelurahan"
                                    id="form_agunan_1_alamat_kelurahan"
                                    aria-describedby="form_agunan_1_alamat_kelurahan" placeholder="Kelurahan"
                                    required />
                            </div>
                        </div>

                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_agunan_1_alamat_kecamatan"><small
                                        class="text-danger">*
                                    </small>Kecamatan</label>
                                <input type="text" class="form-control" name="form_agunan_1_alamat_kecamatan"
                                    id="form_agunan_1_alamat_kecamatan"
                                    aria-describedby="form_agunan_1_alamat_kecamatan" placeholder="Kecamatan"
                                    required />
                            </div>
                        </div>

                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_agunan_1_alamat_dati2"><small
                                        class="text-danger">*
                                    </small>Kabupaten/Kota</label>
                                <input type="text" class="form-control" name="form_agunan_1_alamat_dati2"
                                    id="form_agunan_1_alamat_dati2" aria-describedby="form_agunan_1_alamat_dati2"
                                    placeholder="Kabupaten/Kota" required />
                            </div>
                        </div>

                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_agunan_1_alamat_provinsi"><small
                                        class="text-danger">*
                                    </small>Provinsi</label>
                                <input type="text" class="form-control" name="form_agunan_1_alamat_provinsi"
                                    id="form_agunan_1_alamat_provinsi"
                                    aria-describedby="form_agunan_1_alamat_provinsi" placeholder="Provinsi"
                                    required />
                            </div>
                        </div>

                        <div class="col-md-1 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_agunan_1_alamat_kode_pos"><small
                                        class="text-danger">*
                                    </small>Kode
                                    Pos</label>
                                <input type="number" class="form-control" name="form_agunan_1_alamat_kode_pos"
                                    id="form_agunan_1_alamat_kode_pos"
                                    aria-describedby="form_agunan_1_alamat_kode_pos" placeholder="16XXX" required />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-1 col-md-12">
            <div data-repeater-list="form_agunan_1_status_bukti_kepemilikan">
                <div data-repeater-item>
                    <div class="row d-flex align-items-end">
                        <div class="mb-1 col-md-3">
                            <label class="form-label" for="form_agunan_1_status_bukti_kepemilikan"><small
                                    class="text-danger">*
                                </small>Status/Bukti Kepemilikan</label>
                            <select class="select2 w-100" name="form_agunan_1_status_bukti_kepemilikan"
                                id="formAgunan1StatusBuktiKepemilikan" onChange="changeShgbAgunan1()"
                                data-placeholder="Pilih
                                                            Bukti Kepemilikan"
                                required>
                                <option value="">
                                </option>
                                <option value="SHM">SHM</option>
                                <option value="SHGB">SHGB</option>
                                <option value="PPJB">PPJB</option>
                            </select>
                        </div>

                        <div class="mb-1 col-md-3 hide" id="ifShgbAgunan1Expired">
                            <label class="form-label" for="form_agunan_1_status_bukti_kepemilikan_tgl_berakhir"><small
                                    class="text-danger">*
                                </small>Tanggal Berakhir</label>
                            <input type="date" id="tglBerakhirShgbAgunan1" class="form-control flatpickr-basic"
                                name="form_agunan_1_status_bukti_kepemilikan_tgl_berakhir" placeholder="DD-MM-YYYY"
                                required />
                        </div>

                        <div class="mb-1 col-md-3 hide" id="ifShgbAgunan1Hak">
                            <label class="form-label" for="form_agunan_1_status_bukti_kepemilikan_hak"><small
                                    class="text-danger">*
                                </small>Hak</label>
                            <select class="select2 w-100" name="form_agunan_1_status_bukti_kepemilikan_hak"
                                id="statusBuktiHakAgunan1" data-placeholder="Pilih Hak Kepemilikan" required>
                                <option value=""></option>
                                <option value="Hak Pakai">Hak Pakai</option>
                                <option value="Hak Pengelolaan">Hak Pengelolaan</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_1_no_sertifikat"><small class="text-danger">*
                </small>Nomor Sertifikat</label>
            <input type="text" name="form_agunan_1_no_sertifikat" id="form_agunan_1_no_sertifikat"
                class="form-control" placeholder="Masukkan Nomor Sertifikat" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_1_no_sertifikat_tgl_penerbitan"><small class="text-danger">*
                </small>Tanggal Penerbitan</label>
            <input type="date" id="form_agunan_1_no_sertifikat_tgl_penerbitan"
                class="form-control flatpickr-basic" name="form_agunan_1_no_sertifikat_tgl_penerbitan"
                placeholder="DD-MM-YYYY" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_1_no_imb"><small class="text-danger">*
                </small>Nomor IMB/PBG</label>
            <input type="text" name="form_agunan_1_no_imb" id="form_agunan_1_no_imb" class="form-control"
                placeholder="Masukkan Nomor IMB/PBG" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_1_peruntukan_bangunan"><small class="text-danger">*
                </small>Peruntukan Bangunan</label>
            <input type="text" name="form_agunan_1_peruntukan_bangunan" id="form_agunan_1_peruntukan_bangunan"
                class="form-control" placeholder="Masukkan Peruntukan Bangunan" required />
        </div>
        <div class="mb-1 col-md-12">
            <div data-repeater-list="form_agunan_1_status_bukti_kepemilikan">
                <div data-repeater-item>
                    <div class="row d-flex align-items-end">
                        <div class="mb-1 col-md-6">
                            <label class="form-label" for="form_agunan_1_luas_tanah"><small class="text-danger">*
                                </small>Luas Tanah</label>
                            <input type="number" name="form_agunan_1_luas_tanah" id="form_agunan_1_luas_tanah"
                                class="form-control" placeholder="Masukkan Luas Tanah" required />
                        </div>
                        <div class="mb-1 col-md-6">
                            <label class="form-label" for="form_agunan_1_luas_bangunan"><small class="text-danger">*
                                </small>Luas Bangunan</label>
                            <input type="number" name="form_agunan_1_luas_bangunan" id="form_agunan_1_luas_bangunan"
                                class="form-control" placeholder="Masukkan Luas Bangunan" required />
                        </div>
                        <div class="mb-1 col-md-6">
                            <label class="form-label" for="form_agunan_1_atas_nama"><small class="text-danger">*
                                </small>Atas Nama</label>
                            <input type="text" name="form_agunan_1_atas_nama" id="form_agunan_1_atas_nama"
                                class="form-control" placeholder="Atas Nama" required />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_1_nama_pengembang">Nama
                Pengembang</label>
            <input type="text" name="form_agunan_1_nama_pengembang" id="form_agunan_1_nama_pengembang"
                class="form-control" placeholder="Masukkan Nama Pengembang" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_1_nama_proyek_perumahan"><small class="text-danger">*
                </small>Nama Proyek
                Perumahan</label>
            <input type="text" name="form_agunan_1_nama_proyek_perumahan" id="form_agunan_1_nama_proyek_perumahan"
                class="form-control" placeholder="Masukkan Nama Proyek Perumahan" required />
        </div>
    </div>

    <!-- Agunan II-->
    <div class="content-header">
        <h5 class="mb-0 mt-2">Agunan II</h5>
        <small class="text-muted">Lengkapi Data Agunan II.</small>
    </div>
    <div class="row">
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_2_jenis">Jenis Agunan</label>
            <select class="select2 w-100" name="form_agunan_2_jenis" id="formAgunan2Jenis"
                onChange="changeJenisAgunan2()" data-placeholder="Pilih Jenis Agunan">
                <option value=""></option>
                <option value="Tanah">Tanah</option>
                <option value="Rumah Tinggal">Rumah Tinggal</option>
                <option value="Apartemen">Apartemen</option>
                <option value="Rusun">Rusun</option>
                <option value="Ruko">Ruko</option>
                <option value="Rukan">Rukan</option>
                <option value="Lain-lain">Lain-lain</option>
            </select>
        </div>
        <div class="mb-1 col-md-6 hide" id="ifJenisAgunan2Lain">
            <label class="form-label" for="jenisAgunan2Lain"><small class="text-danger">*
                </small>Jenis Agunan Lainnya</label>
            <input type="text" name="form_agunan_2_jenis_lain" id="jenisAgunan2Lain" class="form-control"
                placeholder="Jenis Agunan Lainnya" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_2_nilai_harga_jual">Nilai/Harga Jual
                (Harga Jual
                merupakan Harga Transaksi/Harga
                Jual
                Setelah Discount)</label>
            <input type="text" name="form_agunan_2_nilai_harga_jual" id="form_agunan_2_nilai_harga_jual"
                class="form-control numeral-mask" placeholder="Masukkan Nilai/Harga Jual" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_2_nilai_harga_taksasi_kjpp">Nilai/Harga
                Taksasi KJPP</label>
            <input type="text" name="form_agunan_2_nilai_harga_taksasi_kjpp"
                id="form_agunan_2_nilai_harga_taksasi_kjpp" class="form-control numeral-mask"
                placeholder="Masukkan Nilai/Harga Taksasi KJPP" />
        </div>
        <div class="mb-1 col-md-12">
            <div data-repeater-list="form_agunan_2_alamat">
                <div data-repeater-item>
                    <div class="row d-flex align-items-end">
                        <div class="col-md-4 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_agunan_2_alamat">Alamat/Lokasi
                                    Agunan</label>
                                <input type="text" class="form-control" name="form_agunan_2_alamat"
                                    id="form_agunan_2_alamat" aria-describedby="form_agunan_2_alamat"
                                    placeholder="Alamat/Lokasi Agunan" />
                            </div>
                        </div>

                        <div class="col-md-1 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_agunan_2_alamat_rt">RT</label>
                                <input type="number" class="form-control" name="form_agunan_2_alamat_rt"
                                    id="form_agunan_2_alamat_rt" aria-describedby="form_agunan_2_alamat_rt"
                                    placeholder="RT" />
                            </div>
                        </div>

                        <div class="col-md-1 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_agunan_2_alamat_rw">RW</label>
                                <input type="number" class="form-control" name="form_agunan_2_alamat_rw"
                                    id="form_agunan_2_alamat_rw" aria-describedby="form_agunan_2_alamat_rw"
                                    placeholder="RW" />
                            </div>
                        </div>

                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_agunan_2_alamat_kelurahan">Kelurahan</label>
                                <input type="text" class="form-control" name="form_agunan_2_alamat_kelurahan"
                                    id="form_agunan_2_alamat_kelurahan"
                                    aria-describedby="form_agunan_2_alamat_kelurahan" placeholder="Kelurahan" />
                            </div>
                        </div>

                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_agunan_2_alamat_kecamatan">Kecamatan</label>
                                <input type="text" class="form-control" name="form_agunan_2_alamat_kecamatan"
                                    id="form_agunan_2_alamat_kecamatan"
                                    aria-describedby="form_agunan_2_alamat_kecamatan" placeholder="Kecamatan" />
                            </div>
                        </div>

                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_agunan_2_alamat_dati2">Kabupaten/Kota</label>
                                <input type="text" class="form-control" name="form_agunan_2_alamat_dati2"
                                    id="form_agunan_2_alamat_dati2" aria-describedby="form_agunan_2_alamat_dati2"
                                    placeholder="Kabupaten/Kota" />
                            </div>
                        </div>

                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_agunan_2_alamat_provinsi">Provinsi</label>
                                <input type="text" class="form-control" name="form_agunan_2_alamat_provinsi"
                                    id="form_agunan_2_alamat_provinsi"
                                    aria-describedby="form_agunan_2_alamat_provinsi" placeholder="Provinsi" />
                            </div>
                        </div>

                        <div class="col-md-1 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_agunan_2_alamat_kode_pos">Kode
                                    Pos</label>
                                <input type="number" class="form-control" name="form_agunan_2_alamat_kode_pos"
                                    id="form_agunan_2_alamat_kode_pos"
                                    aria-describedby="form_agunan_2_alamat_kode_pos" placeholder="16XXX" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-1 col-md-12">
            <div data-repeater-list="form_agunan_2_status_bukti_kepemilikan">
                <div data-repeater-item>
                    <div class="row d-flex align-items-end">
                        <div class="mb-1 col-md-3">
                            <label class="form-label" for="form_agunan_2_status_bukti_kepemilikan">Status/Bukti
                                Kepemilikan</label>
                            <select class="select2 w-100" name="form_agunan_2_status_bukti_kepemilikan"
                                id="formAgunan2StatusBuktiKepemilikan" onChange="changeShgbAgunan2()"
                                data-placeholder="Pilih
                                                            Bukti Kepemilikan">
                                <option value=""></option>
                                <option value="SHM">SHM</option>
                                <option value="SHGB">SHGB</option>
                                <option value="PPJB">PPJB</option>
                            </select>
                        </div>

                        <div class="mb-1 col-md-3 hide" id="ifShgbAgunan2Expired">
                            <label class="form-label"
                                for="form_agunan_2_status_bukti_kepemilikan_tgl_berakhir">Tanggal
                                Berakhir</label>
                            <input type="date" id="form_agunan_2_status_bukti_kepemilikan_tgl_berakhir"
                                class="form-control flatpickr-basic"
                                name="form_agunan_2_status_bukti_kepemilikan_tgl_berakhir" placeholder="DD-MM-YYYY" />
                        </div>

                        <div class="mb-1 col-md-3 hide" id="ifShgbAgunan2Hak">
                            <label class="form-label" for="form_agunan_2_status_bukti_kepemilikan_hak">Hak</label>
                            <select class="select2 w-100" name="form_agunan_2_status_bukti_kepemilikan_hak"
                                id="form_agunan_2_status_bukti_kepemilikan_hak"
                                data-placeholder="Pilih Bukti Kepemilikan">
                                <option value=""></option>
                                <option value="Hak Pakai">Hak Pakai</option>
                                <option value="Hak Pengelolaan">Hak Pengelolaan</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_2_no_sertifikat">Nomor
                Sertifikat</label>
            <input type="text" name="form_agunan_2_no_sertifikat" id="form_agunan_2_no_sertifikat"
                class="form-control" placeholder="Masukkan Nomor Sertifikat" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_2_no_sertifikat_tgl_penerbitan">Tanggal
                Penerbitan</label>
            <input type="date" id="form_agunan_2_no_sertifikat_tgl_penerbitan"
                class="form-control flatpickr-basic" name="form_agunan_2_no_sertifikat_tgl_penerbitan"
                placeholder="DD-MM-YYYY" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_2_no_imb">Nomor IMB/PBG</label>
            <input type="text" name="form_agunan_2_no_imb" id="form_agunan_2_no_imb" class="form-control"
                placeholder="Masukkan Nomor IMB/PBG" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_2_peruntukan_bangunan">Peruntukan
                Bangunan</label>
            <input type="text" name="form_agunan_2_peruntukan_bangunan" id="form_agunan_2_peruntukan_bangunan"
                class="form-control" placeholder="Masukkan Peruntukan Bangunan" />
        </div>
        <div class="mb-1 col-md-12">
            <div data-repeater-list="form_agunan_2_status_bukti_kepemilikan">
                <div data-repeater-item>
                    <div class="row d-flex align-items-end">
                        <div class="mb-1 col-md-6">
                            <label class="form-label" for="form_agunan_2_luas_tanah">Luas
                                Tanah</label>
                            <input type="number" name="form_agunan_2_luas_tanah" id="form_agunan_2_luas_tanah"
                                class="form-control" placeholder="Masukkan Luas Tanah" />

                        </div>
                        <div class="mb-1 col-md-6">
                            <label class="form-label" for="form_agunan_2_luas_bangunan">Luas
                                Bangunan</label>
                            <input type="number" name="form_agunan_2_luas_bangunan" id="form_agunan_2_luas_bangunan"
                                class="form-control" placeholder="Masukkan Luas Bangunan" />
                        </div>

                        <div class="mb-1 col-md-6">
                            <label class="form-label" for="form_agunan_2_atas_nama">Atas
                                Nama</label>
                            <input type="text" name="form_agunan_2_atas_nama" id="form_agunan_2_atas_nama"
                                class="form-control" placeholder="Atas Nama" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Agunan III-->
    <div class="content-header">
        <h5 class="mb-0 mt-2">Agunan III</h5>
        <small class="text-muted">Lengkapi Data Agunan III.</small>
    </div>
    <div class="row">
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_3_jenis">Jenis Agunan</label>
            <select class="select2 w-100" name="form_agunan_3_jenis" id="form_agunan_3_jenis"
                data-placeholder="Pilih
                                            Jenis Agunan">
                <option value=""></option>
                <option value="Deposito">Deposito</option>
                <option value="Tabungan">Tabungan</option>
                <option value="SK Pegawai">SK Pegawai</option>
            </select>
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_3_nilai">Nilai Agunan</label>
            <input type="text" name="form_agunan_3_nilai" id="form_agunan_3_nilai"
                class="form-control numeral-mask" placeholder="Masukkan Nilai Agunan" />
        </div>

        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_3_no_rekening">Nomor Rekening</label>
            <input type="number" name="form_agunan_3_no_rekening" id="form_agunan_3_no_rekening"
                class="form-control" placeholder="Masukkan Nomor Rekening" />
        </div>

        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_agunan_3_atas_nama">Atas Nama</label>
            <input type="text" name="form_agunan_3_atas_nama" id="form_agunan_3_atas_nama" class="form-control"
                placeholder="Atas Nama" />
        </div>

    </div>
    <div class="d-flex justify-content-between mt-3">
        <button class="btn btn-primary btn-prev" type="button">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
        </button>
        <button class="btn btn-primary btn-next" type="button">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
        </button>
    </div>
</div>
