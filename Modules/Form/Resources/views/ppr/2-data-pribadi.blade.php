<div id="formDataPribadi" class="content" role="tabpanel" aria-labelledby="pribadi-trigger">
    <div class="content-header">
        <h4 class="mb-0 mt-2">Data Pribadi</h4>
        <hr>
    </div>

    <!-- Data Pemohon start -->
    <div class="content-header">
        <h5 class="mb-0 mt-2">Pemohon PPR Syariah</h5>
        <small class="text-muted">Lengkapi Data Diri.</small>
    </div>
    <div class="row">
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pribadi_pemohon_nama_lengkap"><small class="text-danger">*
                </small>Nama Lengkap</label>
            <input type="text" name="form_pribadi_pemohon_nama_lengkap" id="form_pribadi_pemohon_nama_lengkap"
                class="form-control" oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                placeholder="Nama Lengkap" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pribadi_pemohon_nama_ktp"><small class="text-danger">*
                </small>Nama Sesuai KTP</label>
            <input type="text" name="form_pribadi_pemohon_nama_ktp" id="form_pribadi_pemohon_nama_ktp"
                class="form-control" oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                placeholder="Nama Sesuai KTP" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pribadi_pemohon_gelar">Gelar</label>
            <input type="text" name="form_pribadi_pemohon_gelar" id="form_pribadi_pemohon_gelar" class="form-control"
                placeholder="Gelar" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pribadi_pemohon_nama_alias">Nama Alias</label>
            <input type="text" name="form_pribadi_pemohon_nama_alias" id="form_pribadi_pemohon_nama_alias"
                class="form-control" oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                placeholder="Nama Alias" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pribadi_pemohon_no_ktp"><small class="text-danger">*
                </small>No. KTP</label>
            <input type="number" name="form_pribadi_pemohon_no_ktp" id="form_pribadi_pemohon_no_ktp"
                class="form-control" placeholder="Masukkan Nomor KTP Anda" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pribadi_pemohon_jenis_kelamin"><small class="text-danger">*
                </small>Jenis Kelamin</label>
            <div>
                &ensp;
                <input type="radio" name="form_pribadi_pemohon_jenis_kelamin" class="form-check-input" id="pria"
                    value="Pria" required />
                <label class="form-label" for="pria">&nbsp;Pria</label>
                <br>
                &ensp;
                <input type="radio" name="form_pribadi_pemohon_jenis_kelamin" class="form-check-input" id="wanita"
                    value="Wanita" required />
                <label class="form-label" for="wanita">&nbsp;Wanita</label>
            </div>
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pribadi_pemohon_tempat_lahir"><small class="text-danger">*
                </small>Tempat Lahir</label>
            <input type="text" name="form_pribadi_pemohon_tempat_lahir" id="form_pribadi_pemohon_tempat_lahir"
                class="form-control" placeholder="Masukkan Tempat Lahir Anda" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pribadi_pemohon_tanggal_lahir"><small class="text-danger">*
                </small>Tanggal Lahir</label>
            <input type="date" id="form_pribadi_pemohon_tanggal_lahir" class="form-control flatpickr-basic"
                name="form_pribadi_pemohon_tanggal_lahir" placeholder="DD-MM-YYYY" required />
        </div>
        <div class="mb-1 col-md-6">
            <small class="text-danger">*
            </small> <label class="form-label" for="form_pribadi_pemohon_npwp">No.
                NPWP</label>
            <input type="text" name="form_pribadi_pemohon_npwp" id="form_pribadi_pemohon_npwp" class="form-control"
                placeholder="Masukkan Nomor NPWP Anda" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pribadi_pemohon_pendidikan"><small class="text-danger">*
                </small>Pendidikan</label>
            <select class="select2 w-100" name="form_pribadi_pemohon_pendidikan" id="form_pribadi_pemohon_pendidikan"
                data-placeholder="Pilih
                Pendidikan" required>
                <option value=""></option>
                <option value="SD">SD</option>
                <option value="SLTP">SLTP</option>
                <option value="SLTA">SLTA</option>
                <option value="D1">D1</option>
                <option value="D2">D2</option>
                <option value="D3">D3</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
            </select>
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pribadi_pemohon_agama"><small class="text-danger">*
                </small>Agama</label>
            <select class="select2 w-100" name="form_pribadi_pemohon_agama" id="formPribadiAgamaLain"
                onChange="changeAgama()" data-placeholder="Pilih Agama" required>
                <option value="">
                </option>
                <option value="Islam">Islam</option>
                <option value="Protestan">Protestan</option>
                <option value="Katholik">Katholik</option>
                <option value="Budha">Budha</option>
                <option value="Hindu">Hindu</option>
                <option value="Kong Hu Chu">Kong Hu Chu</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <div class="mb-1 col-md-6 hide" id="ifAgamaLain">
            <label class="form-label" for="agamaLain"><small class="text-danger">*
                </small>Agama Lainnya</label>
            <input type="text" name="form_pribadi_pemohon_agama_lain" id="agamaLain" class="form-control"
                placeholder="Agama Lainnya" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pribadi_pemohon_status_pernikahan"><small class="text-danger">*
                </small>Status Pernikahan</label>
            <select class="select2 w-100" name="form_pribadi_pemohon_status_pernikahan"
                id="form_pribadi_pemohon_status_pernikahan" onChange="changeStatus()"
                data-placeholder="Pilih Status Pernikahan" required>
                <option value=""></option>
                <option value="Belum Menikah">Belum Menikah</option>
                <option value="Menikah">Menikah</option>
                <option value="Janda/Duda - Meninggal">Janda/Duda - Meninggal</option>
                <option value="Janda/Duda - Cerai">Janda/Duda - Cerai</option>
            </select>
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pribadi_pemohon_jml_anak"><small class="text-danger">*
                </small>Jumlah Anak</label>
            <input type="number" name="form_pribadi_pemohon_jml_anak" id="form_pribadi_pemohon_jml_anak"
                class="form-control" placeholder="Jumlah Anak" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pribadi_pemohon_jml_tanggungan"><small class="text-danger">*
                </small>Jumlah Tanggungan</label>
            <input type="number" name="form_pribadi_pemohon_jml_tanggungan" id="form_pribadi_pemohon_jml_tanggungan"
                class="form-control" placeholder="Jumlah Tanggungan" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pribadi_pemohon_nama_gadis_ibu_kandung">Nama
                Gadis Ibu Kandung</label>
            <input type="text" name="form_pribadi_pemohon_nama_gadis_ibu_kandung"
                id="form_pribadi_pemohon_nama_gadis_ibu_kandung" class="form-control"
                oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                placeholder="Nama Gadis Ibu Kandung" />
        </div>
        <div>
            <div class="mb-1 col-md-12">
                <div data-repeater-list="form_pribadi_pemohon_alamat_ktp">
                    <div data-repeater-item>
                        <div class="row d-flex align-items-end">
                            <div class="col-md-4 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="form_pribadi_pemohon_alamat_ktp"><small
                                            class="text-danger">*
                                        </small>Alamat Sesuai KTP</label>
                                    <input type="text" class="form-control" name="form_pribadi_pemohon_alamat_ktp"
                                        id="form_pribadi_pemohon_alamat_ktp"
                                        aria-describedby="form_pribadi_pemohon_alamat_ktp"
                                        placeholder="Alamat Sesuai KTP" required />
                                </div>
                            </div>

                            <div class="col-md-1 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="form_pribadi_pemohon_alamat_ktp_rt"><small
                                            class="text-danger">*
                                        </small>
                                        </small>RT<span id="falseRtKtp" class="text-danger"
                                            style="display: none; font-size:9px;">Isikan 3
                                            digit!
                                        </span></label>
                                    <input type="text" class="form-control" pattern="^\d{3}$"
                                        oninput="this.value=this.value.replace(/[^0-9,]/g,'');"
                                        name="form_pribadi_pemohon_alamat_ktp_rt"
                                        id="form_pribadi_pemohon_alamat_ktp_rt"
                                        aria-describedby="form_pribadi_pemohon_alamat_ktp_rt" placeholder="000"
                                        required />
                                </div>
                            </div>

                            <div class="col-md-1 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="form_pribadi_pemohon_alamat_ktp_rw"><small
                                            class="text-danger">*
                                        </small>RW<span id="falseRwKtp" class="text-danger"
                                            style="display: none; font-size:9px;">Isikan 3
                                            digit!
                                        </span></label>
                                    <input type="text" class="form-control" pattern="^\d{3}$"
                                        oninput="this.value=this.value.replace(/[^0-9,]/g,'');"
                                        name="form_pribadi_pemohon_alamat_ktp_rw"
                                        id="form_pribadi_pemohon_alamat_ktp_rw"
                                        aria-describedby="form_pribadi_pemohon_alamat_ktp_rw" placeholder="000"
                                        required />
                                </div>
                            </div>

                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="form_pribadi_pemohon_alamat_ktp_kelurahan"><small
                                            class="text-danger">*
                                        </small>Kelurahan</label>
                                    <input type="text" class="form-control"
                                        name="form_pribadi_pemohon_alamat_ktp_kelurahan"
                                        id="form_pribadi_pemohon_alamat_ktp_kelurahan"
                                        aria-describedby="form_pribadi_pemohon_alamat_ktp_kelurahan"
                                        placeholder="Kelurahan" required />
                                </div>
                            </div>

                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="form_pribadi_pemohon_alamat_ktp_kecamatan"><small
                                            class="text-danger">*
                                        </small>Kecamatan</label>
                                    <input type="text" class="form-control"
                                        name="form_pribadi_pemohon_alamat_ktp_kecamatan"
                                        id="form_pribadi_pemohon_alamat_ktp_kecamatan"
                                        aria-describedby="form_pribadi_pemohon_alamat_ktp_kecamatan"
                                        placeholder="Kecamatan" required />
                                </div>
                            </div>

                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="form_pribadi_pemohon_alamat_ktp_dati2"><small
                                            class="text-danger">*
                                        </small>Kabupaten/Kota</label>
                                    <input type="text" class="form-control"
                                        name="form_pribadi_pemohon_alamat_ktp_dati2"
                                        id="form_pribadi_pemohon_alamat_ktp_dati2"
                                        aria-describedby="form_pribadi_pemohon_alamat_ktp_dati2"
                                        placeholder="Kabupaten/Kota" required />
                                </div>
                            </div>

                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="form_pribadi_pemohon_alamat_ktp_provinsi"><small
                                            class="text-danger">*
                                        </small>Provinsi</label>
                                    <input type="text" class="form-control"
                                        name="form_pribadi_pemohon_alamat_ktp_provinsi"
                                        id="form_pribadi_pemohon_alamat_ktp_provinsi"
                                        aria-describedby="form_pribadi_pemohon_alamat_ktp_provinsi"
                                        placeholder="Provinsi" required />
                                </div>
                            </div>

                            <div class="col-md-1 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="form_pribadi_pemohon_alamat_ktp_kode_pos"><small
                                            class="text-danger">*
                                        </small>Kode
                                        Pos</label>
                                    <input type="number" class="form-control"
                                        name="form_pribadi_pemohon_alamat_ktp_kode_pos"
                                        id="form_pribadi_pemohon_alamat_ktp_kode_pos"
                                        aria-describedby="form_pribadi_pemohon_alamat_ktp_kode_pos"
                                        placeholder="16XXX" required />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="mb-1 col-md-12">
                    <div data-repeater-list="form_pribadi_pemohon_alamat_domisili">
                        <div data-repeater-item>
                            <div class="row d-flex align-items-end">
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pribadi_pemohon_alamat_domisili"><small
                                                class="text-danger">*
                                            </small>Alamat Tempat Tinggal (Domisili)&emsp;<input type="checkbox"
                                                id="cbAutoFillDomisili" class="form-check-input"
                                                style="width:15px; height:15px;">&nbsp;
                                            Sama
                                            Dengan Alamat KTP</label>
                                        <input type="text" class="form-control"
                                            id="form_pribadi_pemohon_alamat_domisili"
                                            name="form_pribadi_pemohon_alamat_domisili"
                                            aria-describedby="form_pribadi_pemohon_alamat_domisili"
                                            placeholder="Alamat Tempat Tinggal (Domisili)" required />
                                    </div>
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pribadi_pemohon_alamat_domisili_rt"><small
                                                class="text-danger">*
                                            </small>RT<span id="falseRtDomisili" class="text-danger"
                                                style="display: none; font-size:9px;">Isikan 3
                                                digit!
                                            </span></label>
                                        <input type="text" class="form-control" pattern="^\d{3}$"
                                            oninput="this.value=this.value.replace(/[^0-9,]/g,'');"
                                            name="form_pribadi_pemohon_alamat_domisili_rt"
                                            id="form_pribadi_pemohon_alamat_domisili_rt"
                                            aria-describedby="form_pribadi_pemohon_alamat_domisili_rt"
                                            placeholder="000" required />
                                    </div>
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pribadi_pemohon_alamat_domisili_rw"><small
                                                class="text-danger">*
                                            </small>RW <span id="falseRwDomisili" class="text-danger"
                                                style="display: none; font-size:8px;">Isikan 3
                                                digit!
                                            </span></label>
                                        <input type="text" class="form-control" pattern="^\d{3}$"
                                            oninput="this.value=this.value.replace(/[^0-9,]/g,'');"
                                            name="form_pribadi_pemohon_alamat_domisili_rw"
                                            id="form_pribadi_pemohon_alamat_domisili_rw"
                                            aria-describedby="form_pribadi_pemohon_alamat_domisili_rw"
                                            placeholder="000" required />

                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pribadi_pemohon_alamat_domisili_kelurahan"><small
                                                class="text-danger">*
                                            </small>Kelurahan</label>
                                        <input type="text" class="form-control"
                                            name="form_pribadi_pemohon_alamat_domisili_kelurahan"
                                            id="form_pribadi_pemohon_alamat_domisili_kelurahan"
                                            aria-describedby="form_pribadi_pemohon_alamat_domisili_kelurahan"
                                            placeholder="Kelurahan" required />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pribadi_pemohon_alamat_domisili_kecamatan"><small
                                                class="text-danger">*
                                            </small>Kecamatan</label>
                                        <input type="text" class="form-control"
                                            name="form_pribadi_pemohon_alamat_domisili_kecamatan"
                                            id="form_pribadi_pemohon_alamat_domisili_kecamatan"
                                            aria-describedby="form_pribadi_pemohon_alamat_domisili_kecamatan"
                                            placeholder="Kecamatan" required />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pribadi_pemohon_alamat_domisili_dati2"><small
                                                class="text-danger">*
                                            </small>Kabupaten/Kota</label>
                                        <input type="text" class="form-control"
                                            name="form_pribadi_pemohon_alamat_domisili_dati2"
                                            id="form_pribadi_pemohon_alamat_domisili_dati2"
                                            aria-describedby="form_pribadi_pemohon_alamat_domisili_dati2"
                                            placeholder="Kabupaten/Kota" required />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pribadi_pemohon_alamat_domisili_provinsi"><small
                                                class="text-danger">*
                                            </small>Provinsi</label>
                                        <input type="text" class="form-control"
                                            name="form_pribadi_pemohon_alamat_domisili_provinsi"
                                            id="form_pribadi_pemohon_alamat_domisili_provinsi"
                                            aria-describedby="form_pribadi_pemohon_alamat_domisili_provinsi"
                                            placeholder="Provinsi" required />
                                    </div>
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pribadi_pemohon_alamat_domisili_kode_pos"><small
                                                class="text-danger">*
                                            </small>Kode
                                            Pos</label>
                                        <input type="number" class="form-control"
                                            name="form_pribadi_pemohon_alamat_domisili_kode_pos"
                                            id="form_pribadi_pemohon_alamat_domisili_kode_pos"
                                            aria-describedby="form_pribadi_pemohon_alamat_domisili_kode_pos"
                                            placeholder="16XXX" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="form_pribadi_pemohon_no_telp">No.
                        Telepon</label>
                    <input type="text" name="form_pribadi_pemohon_no_telp" id="form_pribadi_pemohon_no_telp"
                        class="form-control prefix-mask" placeholder="Masukkan Nomor Telepon Anda" />
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="form_pribadi_pemohon_no_handphone"><small class="text-danger">*
                        </small>Handphone</label>
                    <input type="text" name="form_pribadi_pemohon_no_handphone"
                        id="form_pribadi_pemohon_no_handphone" class="form-control prefix-mask1"
                        placeholder="Masukkan Nomor Handphone Anda" required />
                </div>
                <div class="mb-1 col-md-12">
                    <div data-repeater-list="form_pribadi_pemohon_status_tempat_tinggal">
                        <div data-repeater-item>
                            <div class="row d-flex align-items-end">
                                <div class="mb-1 col-md-3">
                                    <label class="form-label" for="form_pribadi_pemohon_status_tempat_tinggal"><small
                                            class="text-danger">*
                                        </small>Status
                                        Tempat
                                        Tinggal</label>
                                    <select class="select2 w-200" name="form_pribadi_pemohon_status_tempat_tinggal"
                                        id="form_pribadi_pemohon_status_tempat_tinggal"
                                        data-placeholder="Pilih Status
                                        Tempat Tinggal"
                                        required>
                                        <option value="">
                                        </option>
                                        <option value="Milik Sendiri">Milik Sendiri</option>
                                        <option value="Sewa/Kontrak">Sewa/Kontrak</option>
                                        <option value="Kost">Kost</option>
                                        <option
                                            value="Milik
                                        Orangtua/Keluarga">
                                            Milik
                                            Orangtua/Keluarga</option>
                                        <option
                                            value="Milik
                                        Perusahaan/Instansi/Dinas">
                                            Milik
                                            Perusahaan/Instansi/Dinas</option>
                                    </select>
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_tahun">Tahun</label>
                                        <input type="number" class="form-control"
                                            name="form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_tahun"
                                            id="form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_tahun"
                                            aria-describedby="form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_tahun"
                                            placeholder="Tahun" />
                                    </div>
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_bulan">Bulan</label>
                                        <input type="number" class="form-control"
                                            name="form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_bulan"
                                            id="form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_bulan"
                                            aria-describedby="form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_bulan"
                                            placeholder="Bulan" />
                                    </div>
                                </div>

                                <div class="mb-1 col-md-2">
                                    <label class="form-label"
                                        for="form_pribadi_pemohon_status_tempat_tinggal_dijaminkan"><small
                                            class="text-danger">*
                                        </small>Sedang
                                        Dijaminkan</label>
                                    <select class="select2 w-100"
                                        name="form_pribadi_pemohon_status_tempat_tinggal_dijaminkan"
                                        id="formPribadiPemohonStatusTempatTinggalDijaminkan"
                                        onChange="changeDijaminkan()" data-placeholder="Pilih" required>
                                        <option value="">
                                            Pilih
                                        </option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>

                                <div class="col-md-5 col-12 hide" id="ifDijaminkan">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="formPribadiPemohonStatusTempatTinggalDijaminkanYa"><small
                                                class="text-danger">*
                                            </small>Dijaminkan
                                            Kepada</label>
                                        <input type="text" class="form-control"
                                            name="form_pribadi_pemohon_status_tempat_tinggal_dijaminkan_ya_kepada"
                                            id="formPribadiPemohonStatusTempatTinggalDijaminkanYa"
                                            aria-describedby="formPribadiPemohonStatusTempatTinggalDijaminkanYa"
                                            placeholder="Dijaminkan Kepada" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-1 col-md-6">
                    <label class="form-label" for="form_pribadi_pemohon_alamat_korespondensi"><small
                            class="text-danger">*
                        </small>Alamat
                        Korespondensi</label>
                    <select class="select2 w-100" name="form_pribadi_pemohon_alamat_korespondensi"
                        id="form_pribadi_pemohon_alamat_korespondensi" data-placeholder="Pilih Alamat Korespondensi"
                        required>
                        <option value=""></option>
                        <option value="Alamat Sesuai KTP">Alamat Sesuai KTP</option>
                        <option value="Alamat Tempat Tinggal">Alamat Tempat Tinggal</option>
                        <option value="Alamat Pekerjaan/Kantor">Alamat Pekerjaan/Kantor
                        </option>
                        <option value="Alamat Agunan">Alamat Agunan</option>
                    </select>
                </div>

                <div class="mb-1 col-md-6">
                    <label class="form-label" for="fotoPemohon"><small class="text-danger">*
                        </small>Foto Terbaru Pemohon</label>
                    <input type="file" class="form-control" name="foto[1][foto]" id="fotoPemohon"
                        aria-describedby="fotoPemohon" required />
                    <input type="hidden" name="foto[1][kategori]" value="Foto Pemohon" />
                </div>
            </div>
            <!-- Data Pemohon end -->

            <!-- Istri/Suami start -->
            <div class="content-header hide" id="ifMenikahHeader">
                <h5 class="mb-0 mt-2">Istri / Suami</h5>
                <small class="text-muted">Lengkapi Data Istri/Suami.</small>
            </div>
            <div class="row hide" id="ifMenikah">
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="form_pribadi_istri_suami_nama_lengkap">Nama
                        Lengkap</label>
                    <input type="text" name="form_pribadi_istri_suami_nama_lengkap"
                        id="form_pribadi_istri_suami_nama_lengkap" class="form-control"
                        oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                        placeholder="Nama Lengkap" />
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="form_pribadi_istri_suami_gelar">Gelar</label>
                    <input type="text" name="form_pribadi_istri_suami_gelar" id="form_pribadi_istri_suami_gelar"
                        class="form-control" oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                        placeholder="Gelar" />
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="form_pribadi_istri_suami_no_ktp">No.
                        KTP</label>
                    <input type="number" name="form_pribadi_istri_suami_no_ktp" id="form_pribadi_istri_suami_no_ktp"
                        class="form-control" placeholder="Masukkan Nomor KTP Istri/Suami Anda" />
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="form_pribadi_istri_suami_tempat_lahir">Tempat
                        Lahir</label>
                    <input type="text" name="form_pribadi_istri_suami_tempat_lahir"
                        id="form_pribadi_istri_suami_tempat_lahir" class="form-control"
                        placeholder="Masukkan Tempat Lahir Istri/Suami" />
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="form_pribadi_istri_suami_tanggal_lahir">Tanggal
                        Lahir</label>
                    <input type="date" id="form_pribadi_istri_suami_tanggal_lahir"
                        class="form-control flatpickr-basic" name="form_pribadi_istri_suami_tanggal_lahir"
                        placeholder="DD-MM-YYYY" />
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="form_pribadi_istri_suami_npwp">No.
                        NPWP</label>
                    <input type="text" name="form_pribadi_istri_suami_npwp" id="form_pribadi_istri_suami_npwp"
                        class="form-control" placeholder="Masukkan Nomor NPWP Anda" />
                </div>
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="form_pribadi_istri_suami_pendidikan">Pendidikan</label>
                    <select class="select2 w-100" name="form_pribadi_istri_suami_pendidikan"
                        id="form_pribadi_istri_suami_pendidikan"
                        data-placeholder="Pilih
                        Pendidikan">
                        <option value=""></option>
                        <option value="SD">SD</option>
                        <option value="SLTP">SLTP</option>
                        <option value="SLTA">SLTA</option>
                        <option value="D1">D1</option>
                        <option value="D2">D2</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>

                <div class="mb-1 col-md-6">
                    <label class="form-label" for="fotoPasanganPemohon"><small class="text-danger">*
                        </small>Foto Terbaru
                        Istri/Suami Pemohon</label>
                    <input type="file" class="form-control" name="foto[2][foto]" id="fotoPasanganPemohon"
                        aria-describedby="fotoPasanganPemohon" disabled required />
                    <input type="hidden" name="foto[2][kategori]" id="kategoriPasanganPemohon"
                        value="Foto Pasangan Pemohon" disabled>
                </div>
            </div>
            <!-- Istri/Suami end -->

            <!-- Keluarga Terdekat start -->
            <div class="content-header">
                <h5 class="mb-0 mt-2">Keluarga Terdekat</h5>
                <small class="text-muted">Untuk keperluan mendadak (keluarga dekat tidak
                    serumah).</small>
            </div>
            <div>
                <div class="row">
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="form_pribadi_keluarga_terdekat_nama_lengkap"><small
                                class="text-danger">*
                            </small>Nama Lengkap</label>
                        <input type="text" name="form_pribadi_keluarga_terdekat_nama_lengkap"
                            id="form_pribadi_keluarga_terdekat_nama_lengkap"
                            oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                            class="form-control" placeholder="Nama Lengkap" required />
                    </div>
                </div>
                <div class="row">
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="form_pribadi_keluarga_terdekat_hubungan"><small
                                class="text-danger">*
                            </small>Hubungan Dengan Pemohon</label>
                        <select class="select2 w-100" name="form_pribadi_keluarga_terdekat_hubungan"
                            id="hubunganKeluargaTerdekatLain" onChange="changeHubunganKeluargaTerdekat()"
                            data-placeholder="Pilih Hubungan Dengan Pemohon" required>
                            <option value=""></option>
                            <option value="Orangtua">Orangtua</option>
                            <option value="Mertua">Mertua</option>
                            <option value="Sdr. Kandung">Sdr. Kandung</option>
                            <option value="Anak">Anak</option>
                            <option value="Ipar">Ipar</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="mb-1 col-md-6 hide" id=ifHubunganLainnya>
                        <label class="form-label" for="hubunganLainnya"><small class="text-danger">*
                            </small>Hubungan Lainnya</label>
                        <input type="text" name="form_pribadi_keluarga_terdekat_hubungan_lain"
                            id="hubunganLainnya" class="form-control" placeholder="Hubungan Lainnya" required />
                    </div>
                </div>
                <div class="row">
                    <div class="mb-1 col-md-12">
                        <div data-repeater-list="form_pribadi_keluarga_terdekat">
                            <div data-repeater-item>
                                <div class="row d-flex align-items-end">
                                    <div class="col-md-4 col-12">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                for="form_pribadi_keluarga_terdekat_alamat"><small
                                                    class="text-danger">*
                                                </small>Alamat Tempat Tinggal</label>
                                            <input type="text" class="form-control"
                                                name="form_pribadi_keluarga_terdekat_alamat"
                                                id="form_pribadi_keluarga_terdekat_alamat"
                                                aria-describedby="form_pribadi_keluarga_terdekat_alamat"
                                                placeholder="Alamat" required />
                                        </div>
                                    </div>

                                    <div class="col-md-1 col-12">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                for="form_pribadi_keluarga_terdekat_alamat_rt"><small
                                                    class="text-danger">*
                                                </small>RT<span id="falseRtOt" class="text-danger"
                                                    style="display: none; font-size:9px;">Isikan 3
                                                    digit!
                                                </span></label>
                                            <input type="text" class="form-control" pattern="^\d{3}$"
                                                oninput="this.value=this.value.replace(/[^0-9,]/g,'');"
                                                name="form_pribadi_keluarga_terdekat_alamat_rt"
                                                id="form_pribadi_keluarga_terdekat_alamat_rt"
                                                aria-describedby="form_pribadi_keluarga_terdekat_alamat_rt"
                                                placeholder="000" required />

                                        </div>
                                    </div>

                                    <div class="col-md-1 col-12">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                for="form_pribadi_keluarga_terdekat_alamat_rw"><small
                                                    class="text-danger">*
                                                </small>RW
                                                <span id="falseRwOt" class="text-danger"
                                                    style="display: none; font-size:8px;">Isikan 3
                                                    digit!
                                                </span></label>
                                            <input type="text" class="form-control" pattern="^\d{3}$"
                                                oninput="this.value=this.value.replace(/[^0-9,]/g,'');"
                                                name="form_pribadi_keluarga_terdekat_alamat_rw"
                                                id="form_pribadi_keluarga_terdekat_alamat_rw"
                                                aria-describedby="form_pribadi_keluarga_terdekat_alamat_rw"
                                                placeholder="000" required />
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                for="form_pribadi_keluarga_terdekat_alamat_kelurahan"><small
                                                    class="text-danger">*
                                                </small>Kelurahan</label>
                                            <input type="text" class="form-control"
                                                name="form_pribadi_keluarga_terdekat_alamat_kelurahan"
                                                id="form_pribadi_keluarga_terdekat_alamat_kelurahan"
                                                aria-describedby="form_pribadi_keluarga_terdekat_alamat_kelurahan"
                                                placeholder="Kelurahan" required />
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                for="form_pribadi_keluarga_terdekat_alamat_kecamatan"><small
                                                    class="text-danger">*
                                                </small>Kecamatan</label>
                                            <input type="text" class="form-control"
                                                name="form_pribadi_keluarga_terdekat_alamat_kecamatan"
                                                id="form_pribadi_keluarga_terdekat_alamat_kecamatan"
                                                aria-describedby="form_pribadi_keluarga_terdekat_alamat_kecamatan"
                                                placeholder="Kecamatan" required />
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                for="form_pribadi_keluarga_terdekat_alamat_dati2"><small
                                                    class="text-danger">*
                                                </small>Kabupaten/Kota</label>
                                            <input type="text" class="form-control"
                                                name="form_pribadi_keluarga_terdekat_alamat_dati2"
                                                id="form_pribadi_keluarga_terdekat_alamat_dati2"
                                                aria-describedby="form_pribadi_keluarga_terdekat_alamat_dati2"
                                                placeholder="Kabupaten/Kota" required />
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                for="form_pribadi_keluarga_terdekat_alamat_provinsi"><small
                                                    class="text-danger">*
                                                </small>Provinsi</label>
                                            <input type="text" class="form-control"
                                                name="form_pribadi_keluarga_terdekat_alamat_provinsi"
                                                id="form_pribadi_keluarga_terdekat_alamat_provinsi"
                                                aria-describedby="form_pribadi_keluarga_terdekat_alamat_provinsi"
                                                placeholder="Provinsi" required />
                                        </div>
                                    </div>

                                    <div class="col-md-1 col-12">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                for="form_pribadi_keluarga_terdekat_alamat_kode_pos"><small
                                                    class="text-danger">*
                                                </small>Kode
                                                Pos</label>
                                            <input type="number" class="form-control"
                                                name="form_pribadi_keluarga_terdekat_alamat_kode_pos"
                                                id="form_pribadi_keluarga_terdekat_alamat_kode_pos"
                                                aria-describedby="form_pribadi_keluarga_terdekat_alamat_kode_pos"
                                                placeholder="16XXX" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="form_pribadi_keluarga_terdekat_no_telp"><small
                                class="text-danger">*
                            </small>No. Telepon Tempat Tinggal</label>
                        <input type="text" name="form_pribadi_keluarga_terdekat_no_telp"
                            id="form_pribadi_keluarga_terdekat_no_telp" class="form-control prefix-mask2"
                            placeholder="Masukkan Nomor Telepon Keluarga Terdekat" required />
                    </div>
                </div>
                <!-- Keluarga Terdekat end -->

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
        </div>
    </div>
</div>
