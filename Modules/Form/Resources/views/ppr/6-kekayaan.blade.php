<div id="formKekayaan" class="content" role="tabpanel" aria-labelledby="kekayaan-trigger">
    <div class="content-header">
        <h4 class="mb-0 mt-2">Data Kekayaan dan Pinjaman</h4>
        <hr>
    </div>

    <!-- Kekayaan-->
    <div class="content-header">
        <h5 class="mb-0 mt-2">Kekayaan</h5>
        <small class="text-muted">Lengkapi Data Kekayaan</small>
    </div>
    <section id="form-repeater-simpanan">
        <div class="row">
            <div class="mb-1 col-md-12">
                <div class="repeater-default">
                    <div data-repeater-list="repeater_kekayaan_simpanan">
                        <h6>Simpanan</h6>
                        <div data-repeater-item>
                            <div class="row d-flex align-items-end">
                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_kekayaan_simpanan_nama_bank">Nama
                                            Bank</label>
                                        <input type="text" class="form-control"
                                            name="form_kekayaan_simpanan_nama_bank"
                                            id="form_kekayaan_simpanan_nama_bank" aria-describedby="itemquantity"
                                            placeholder="Nama Bank" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_kekayaan_simpanan_jenis">Jenis
                                            Simpanan</label>
                                        <select name="form_kekayaan_simpanan_jenis" id="form_kekayaan_simpanan_jenis"
                                            class="form-control">
                                            <option label="Pilih Jenis Simpanan"></option>
                                            <option value="Tabungan">Tabungan</option>
                                            <option value="Deposito">Deposito</option>
                                            <option value="Giro">Giro</option>
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_kekayaan_simpanan_sejak_tahun">Sejak
                                            Tahun</label>
                                        <input type="number" class="form-control"
                                            name="form_kekayaan_simpanan_sejak_tahun"
                                            id="form_kekayaan_simpanan_sejak_tahun"
                                            aria-describedby="form_kekayaan_simpanan_sejak_tahun" placeholder="Tahun" />
                                    </div>
                                </div>

                                <div class="mb-1 col-md-2">
                                    <label class="form-label" for="form_kekayaan_simpanan_saldo_per_tanggal">Saldo
                                        Per Tanggal</label>
                                    <input type="date" id="form_kekayaan_simpanan_saldo_per_tanggal"
                                        class="form-control flatpickr-basic"
                                        name="form_kekayaan_simpanan_saldo_per_tanggal" placeholder="DD-MM-YYYY" />
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <input type="text" class="form-control numeral-mask"
                                            name="form_kekayaan_simpanan_saldo" id="form_kekayaan_simpanan_saldo"
                                            aria-describedby="form_kekayaan_simpanan_saldo" placeholder="Saldo (Rp)" />
                                    </div>
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="mb-1">
                                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                            type="button">
                                            <i data-feather="x" class="me-25"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                <i data-feather="plus" class="me-25"></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </div>
                    <br />
                </div>
            </div>
        </div>
    </section>

    <section id="form-repeater-tanah-bangunan">
        <div class="row">
            <div class="mb-1 col-md-12">
                <div class="repeater-default">
                    <div data-repeater-list="repeater_kekayaan_tanah_bangunan">
                        <h6>Tanah dan
                            Bangunan</h6>
                        <div data-repeater-item>
                            <div class="row d-flex align-items-end">
                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_kekayaan_tanah_bangunan_luas_tanah">Luas
                                            Tanah</label>
                                        <input type="number" class="form-control"
                                            name="form_kekayaan_tanah_bangunan_luas_tanah"
                                            id="form_kekayaan_tanah_bangunan_luas_tanah"
                                            aria-describedby="form_kekayaan_tanah_bangunan_luas_tanah"
                                            placeholder="Luas Tanah" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_kekayaan_tanah_bangunan_luas_bangunan">Luas
                                            Bangunan</label>
                                        <input type="number" class="form-control"
                                            name="form_kekayaan_tanah_bangunan_luas_bangunan"
                                            id="form_kekayaan_tanah_bangunan_luas_bangunan"
                                            aria-describedby="form_kekayaan_tanah_bangunan_luas_bangunan"
                                            placeholder="Luas Bangunan" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_kekayaan_tanah_bangunan_jenis">Jenis
                                            Tanah/Bangunan</label>
                                        <select class="form-control w-100" name="form_kekayaan_tanah_bangunan_jenis"
                                            id="form_kekayaan_tanah_bangunan_jenis">
                                            <option
                                                label="Pilih
                                                                        Tanah/Bangunan">
                                            </option>
                                            <option value="Tanah">Tanah</option>
                                            <option value="Rumah Tinggal">Rumah Tinggal
                                            </option>
                                            <option value="Apartemen">Apartemen</option>
                                            <option value="Rusun">Rusun</option>
                                            <option value="Ruko">Ruko</option>
                                            <option value="Rukan">Rukan</option>
                                            <option value="Lain-lain">Lain-lain</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_kekayaan_tanah_bangunan_atas_nama">Atas
                                            Nama</label>
                                        <input type="text" class="form-control"
                                            name="form_kekayaan_tanah_bangunan_atas_nama"
                                            id="form_kekayaan_tanah_bangunan_atas_nama"
                                            aria-describedby="itemquantity" placeholder="Atas Nama" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_kekayaan_tanah_bangunan_taksasi_pasar_wajar">Taksasi
                                            Harga
                                            Pasar</label>
                                        <input type="text" class="form-control numeral-mask"
                                            name="form_kekayaan_tanah_bangunan_taksasi_pasar_wajar"
                                            id="form_kekayaan_tanah_bangunan_taksasi_pasar_wajar"
                                            aria-describedby="form_kekayaan_tanah_bangunan_taksasi_pasar_wajar"
                                            placeholder="Taksasi Harga Pasar (Rp)" />
                                    </div>
                                </div>
                                <div class="col-md-1 col-12">
                                    <div class="mb-1">
                                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                            type="button">
                                            <i data-feather="x" class="me-25"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                <i data-feather="plus" class="me-25"></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </div>
                    <br />
                </div>
            </div>
        </div>
    </section>

    <section id="form-repeater-kendaraan">
        <div class="row">
            <div class="mb-1 col-md-12">
                <div class="repeater-default">
                    <div data-repeater-list="repeater_kekayaan_kendaraan">
                        <h6>Kendaraan</h6>
                        <div data-repeater-item>
                            <div class="row d-flex align-items-end">
                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_kekayaan_kendaraan_jenis_merk">Jenis/Merk</label>
                                        <input type="text" class="form-control"
                                            name="form_kekayaan_kendaraan_jenis_merk"
                                            id="form_kekayaan_kendaraan_jenis_merk"
                                            aria-describedby="form_kekayaan_kendaraan_jenis_merk"
                                            placeholder="Jenis/Merk" />
                                    </div>
                                </div>

                                <div class="mb-1 col-md-2">
                                    <label class="form-label" for="form_kekayaan_kendaraan_tahun_dikeluarkan">Tahun
                                        Dikeluarkan</label>
                                    <input type="number" class="form-control"
                                        name="form_kekayaan_kendaraan_tahun_dikeluarkan"
                                        id="form_kekayaan_kendaraan_tahun_dikeluarkan"
                                        aria-describedby="form_kekayaan_kendaraan_tahun_dikeluarkan"
                                        placeholder="Tahun Dikeluarkan" />
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_kekayaan_kendaraan_atas_nama">Atas
                                            Nama</label>
                                        <input type="text" class="form-control"
                                            name="form_kekayaan_kendaraan_atas_nama"
                                            id="form_kekayaan_kendaraan_atas_nama"
                                            aria-describedby="form_kekayaan_kendaraan_atas_nama"
                                            placeholder="Atas Nama" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_kekayaan_kendaraan_taksasi_harga_jual">Taksasi
                                            Harga
                                            Jual</label>
                                        <input type="text" class="form-control numeral-mask"
                                            name="form_kekayaan_kendaraan_taksasi_harga_jual"
                                            id="form_kekayaan_kendaraan_taksasi_harga_jual"
                                            aria-describedby="form_kekayaan_kendaraan_taksasi_harga_jual"
                                            placeholder="Taksasi Harga Jual" />
                                    </div>
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="mb-1">
                                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                            type="button">
                                            <i data-feather="x" class="me-25"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                <i data-feather="plus" class="me-25"></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </div>
                    <br />
                </div>
            </div>
        </div>
    </section>

    <section id="form-repeater-saham">
        <div class="row">
            <div class="mb-1 col-md-12">
                <div class="repeater-default">
                    <div data-repeater-list="repeater_kekayaan_saham">
                        <h6>Saham</h6>
                        <div data-repeater-item>
                            <div class="row d-flex align-items-end">
                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_kekayaan_saham_penerbit">Penerbit</label>
                                        <input type="text" class="form-control"
                                            name="form_kekayaan_saham_penerbit" id="form_kekayaan_saham_penerbit"
                                            aria-describedby="form_kekayaan_saham_penerbit" placeholder="Penerbit" />
                                    </div>
                                </div>

                                <div class="mb-1 col-md-2">
                                    <label class="form-label" for="form_kekayaan_saham_per_tanggal">Rupiah Per
                                        Tanggal</label>
                                    <input type="date" id="form_kekayaan_saham_per_tanggal"
                                        class="form-control flatpickr-basic" name="form_kekayaan_saham_per_tanggal"
                                        placeholder="DD-MM-YYYY" />
                                </div>

                                <div class="mb-1 col-md-3">
                                    <input type="text" class="form-control numeral-mask"
                                        name="form_kekayaan_saham_rp" id="form_kekayaan_saham_rp"
                                        aria-describedby="form_kekayaan_saham_rp" placeholder="Rupiah Per Tanggal" />
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="mb-1">
                                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                            type="button">
                                            <i data-feather="x" class="me-25"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                <i data-feather="plus" class="me-25"></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </div>
                    <br />
                </div>
            </div>
        </div>
    </section>

    <section id="form-repeater-form_kekayaan_lainnya">
        <div class="row">
            <div class="mb-1 col-md-12">
                <div class="repeater-default">
                    <div data-repeater-list="repeater_kekayaan_lainnya">
                        <div data-repeater-item>
                            <div class="row d-flex align-items-end">
                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_kekayaan_lainnya">Lainnya</label>
                                        <input type="text" class="form-control" name="form_kekayaan_lainnya"
                                            id="form_kekayaan_lainnya" aria-describedby="form_kekayaan_lainnya"
                                            placeholder="Lainnya" />
                                    </div>
                                </div>

                                <div class="mb-1 col-md-3">
                                    <label class="form-label" for="form_kekayaan_lainnya_rp">Rupiah</label>
                                    <input type="text" class="form-control numeral-mask"
                                        name="form_kekayaan_lainnya_rp" id="form_kekayaan_lainnya_rp"
                                        aria-describedby="form_kekayaan_lainnya_rp" placeholder="Rp" />
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="mb-1">
                                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                            type="button">
                                            <i data-feather="x" class="me-25"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                <i data-feather="plus" class="me-25"></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </div>
                    <br />
                </div>
            </div>
        </div>
    </section>

    <hr />

    <!-- Pinjaman-->
    <div class="content-header">
        <h5 class="mb-0 mt-2">Pinjaman</h5>
        <small class="text-muted">Lengkapi Data Pinjaman</small>
    </div>
    <section id="form-repeater-form_pinjaman_nama_bank">
        <div class="row">
            <div class="mb-1 col-md-12">
                <div class="repeater-default">
                    <div data-repeater-list="repeater_pinjaman">
                        <h6>
                            Pinjaman
                        </h6>
                        <div data-repeater-item>
                            <div class="row d-flex align-items-end">
                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_nama_bank">Nama
                                            Bank</label>
                                        <input type="text" class="form-control" name="form_pinjaman_nama_bank"
                                            id="form_pinjaman_nama_bank" aria-describedby="form_pinjaman_nama_bank"
                                            placeholder="Nama Bank" />
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_jenis">Jenis
                                            Pinjaman</label>
                                        <select class="form-control w-100" name="form_pinjaman_jenis"
                                            id="form_pinjaman_jenis">
                                            <option
                                                label="Pilih
                                                                        Jenis
                                                                        Pinjaman">
                                            </option>
                                            <option value="Modal Kerja">Modal Kerja</option>
                                            <option value="Investasi">Investasi</option>
                                            <option value="Konsumtif">Konsumtif</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_sejak_tahun">Sejak
                                            Tahun</label>
                                        <input type="number" class="form-control" name="form_pinjaman_sejak_tahun"
                                            id="form_pinjaman_sejak_tahun"
                                            aria-describedby="form_pinjaman_sejak_tahun" placeholder="Tahun" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_plafond">Plafond</label>
                                        <input type="text" class="form-control numeral-mask"
                                            name="form_pinjaman_plafond" id="form_pinjaman_plafond"
                                            aria-describedby="form_pinjaman_plafond" placeholder="Plafond (Rp)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_outstanding">Outstanding</label>
                                        <input type="text" class="form-control numeral-mask"
                                            name="form_pinjaman_outstanding" id="form_pinjaman_outstanding"
                                            aria-describedby="form_pinjaman_outstanding"
                                            placeholder="Outstanding (Rp)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_jangka_waktu_bulan">Jangka
                                            Waktu (Bulan)</label>
                                        <input type="number" class="form-control"
                                            name="form_pinjaman_jangka_waktu_bulan"
                                            id="form_pinjaman_jangka_waktu_bulan"
                                            aria-describedby="form_pinjaman_jangka_waktu_bulan"
                                            placeholder="Jangka Waktu (Bulan)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_bunga_margin">Bunga/Margin
                                            (%)</label>
                                        <input type="text" class="form-control" name="form_pinjaman_bunga_margin"
                                            id="form_pinjaman_bunga_margin"
                                            aria-describedby="form_pinjaman_bunga_margin"
                                            placeholder="Bunga/Margin (%)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pinjaman_angsuran_per_bulan">Angsuran/Bulan</label>
                                        <input type="text" class="form-control numeral-mask"
                                            name="form_pinjaman_angsuran_per_bulan"
                                            id="form_pinjaman_angsuran_per_bulan"
                                            aria-describedby="form_pinjaman_angsuran_per_bulan"
                                            placeholder="Angsuran/Bulan (Rp)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_agunan">Agunan</label>
                                        <input type="text" class="form-control" name="form_pinjaman_agunan"
                                            id="form_pinjaman_agunan" aria-describedby="form_pinjaman_agunan"
                                            placeholder="Agunan" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pinjaman_kolektibilitas">Kolektibilitas</label>
                                        <input type="text" class="form-control"
                                            name="form_pinjaman_kolektibilitas" id="form_pinjaman_kolektibilitas"
                                            aria-describedby="form_pinjaman_kolektibilitas"
                                            placeholder="Kolektibilitas" />
                                    </div>
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="mb-1">
                                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                            type="button">
                                            <i data-feather="x" class="me-25"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-bottom:8px;"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                <i data-feather="plus" class="me-25"></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </div>
                    <br />
                </div>
            </div>
        </div>
    </section>
    <!-- /Pinjaman-->

    <!-- Kartu Kredit -->
    <section id="form-repeater-form_pinjaman_kartu_kredit">
        <div class="row">
            <div class="mb-1 col-md-12">
                <div class="repeater-default">
                    <div data-repeater-list="repeater_pinjaman_kartu_kredit">
                        <h6>Kartu
                            Kredit</h6>
                        <div data-repeater-item>
                            <div class="row d-flex align-items-end">
                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_kartu_kredit_nama_bank">Nama
                                            Bank</label>
                                        <input type="text" class="form-control"
                                            name="form_pinjaman_kartu_kredit_nama_bank"
                                            id="form_pinjaman_kartu_kredit_nama_bank"
                                            aria-describedby="form_pinjaman_kartu_kredit_nama_bank"
                                            placeholder="Nama Bank" />
                                    </div>
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_kartu_kredit_sejak_tahun">Sejak
                                            Tahun</label>
                                        <input type="number" class="form-control"
                                            name="form_pinjaman_kartu_kredit_sejak_tahun"
                                            id="form_pinjaman_kartu_kredit_sejak_tahun"
                                            aria-describedby="form_pinjaman_kartu_kredit_sejak_tahun"
                                            placeholder="Tahun" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_kartu_kredit_plafond">Plafond
                                        </label>
                                        <input type="text" class="form-control numeral-mask"
                                            name="form_pinjaman_kartu_kredit_plafond"
                                            id="form_pinjaman_kartu_kredit_plafond"
                                            aria-describedby="form_pinjaman_kartu_kredit_plafond"
                                            placeholder="Plafond (Rp)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pinjaman_kartu_kredit_outstanding">Outstanding
                                        </label>
                                        <input type="text" class="form-control numeral-mask"
                                            name="form_pinjaman_kartu_kredit_outstanding"
                                            id="form_pinjaman_kartu_kredit_outstanding"
                                            aria-describedby="form_pinjaman_kartu_kredit_outstanding"
                                            placeholder="Outstanding (Rp)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pinjaman_kartu_kredit_jangka_waktu_bulan">Jangka
                                            Waktu (Bulan)</label>
                                        <input type="number" class="form-control"
                                            name="form_pinjaman_kartu_kredit_jangka_waktu_bulan"
                                            id="form_pinjaman_kartu_kredit_jangka_waktu_bulan"
                                            aria-describedby="form_pinjaman_kartu_kredit_jangka_waktu_bulan"
                                            placeholder="Jangka Waktu (Bulan)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pinjaman_kartu_kredit_bunga_margin">Bunga/Margin
                                            (%)</label>
                                        <input type="text" class="form-control"
                                            name="form_pinjaman_kartu_kredit_bunga_margin"
                                            id="form_pinjaman_kartu_kredit_bunga_margin"
                                            aria-describedby="form_pinjaman_kartu_kredit_bunga_margin"
                                            placeholder="Bunga/Margin (%)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pinjaman_kartu_kredit_angsuran_per_bulan">Angsuran/Bulan</label>
                                        <input type="text" class="form-control numeral-mask"
                                            name="form_pinjaman_kartu_kredit_angsuran_per_bulan"
                                            id="form_pinjaman_kartu_kredit_angsuran_per_bulan"
                                            aria-describedby="form_pinjaman_kartu_kredit_angsuran_per_bulan"
                                            placeholder="Angsuran/Bulan (Rp)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pinjaman_kartu_kredit_nama_bank">Agunan</label>
                                        <input type="text" class="form-control"
                                            name="form_pinjaman_kartu_kredit_agunan"
                                            id="form_pinjaman_kartu_kredit_agunan"
                                            aria-describedby="form_pinjaman_kartu_kredit_agunan"
                                            placeholder="Agunan" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pinjaman_kartu_kredit_kolektibilitas">Kolektibilitas</label>
                                        <input type="text" class="form-control"
                                            name="form_pinjaman_kartu_kredit_kolektibilitas"
                                            id="form_pinjaman_kartu_kredit_kolektibilitas"
                                            aria-describedby="form_pinjaman_kartu_kredit_kolektibilitas"
                                            placeholder="Kolektibilitas" />
                                    </div>
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="mb-1">
                                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                            type="button">
                                            <i data-feather="x" class="me-25"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-bottom:8px;"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                <i data-feather="plus" class="me-25"></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </div>
                    <br />
                </div>
            </div>
        </div>
    </section>
    <!-- /Kartu Kredit -->

    <!-- Lainnya -->
    <section id="form-repeater-form_pinjaman_lainnya">
        <div class="row">
            <div class="mb-1 col-md-12">
                <div class="repeater-default">
                    <div data-repeater-list="repeater_pinjaman_lainnya">
                        <h6>Lainnya</h6>
                        <div data-repeater-item>
                            <div class="row d-flex align-items-end">
                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_lainnya_nama">Nama</label>
                                        <input type="text" class="form-control" name="form_pinjaman_lainnya_nama"
                                            id="form_pinjaman_lainnya_nama"
                                            aria-describedby="form_pinjaman_lainnya_nama" placeholder="Nama" />
                                    </div>
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_lainnya_sejak_tahun">Sejak
                                            Tahun</label>
                                        <input type="number" class="form-control"
                                            name="form_pinjaman_lainnya_sejak_tahun"
                                            id="form_pinjaman_lainnya_sejak_tahun"
                                            aria-describedby="form_pinjaman_lainnya_sejak_tahun"
                                            placeholder="Tahun" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_lainnya_plafond">Plafond
                                        </label>
                                        <input type="text" class="form-control numeral-mask"
                                            name="form_pinjaman_lainnya_plafond" id="form_pinjaman_lainnya_plafond"
                                            aria-describedby="form_pinjaman_lainnya_plafond"
                                            placeholder="Plafond (Rp)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_lainnya_outstanding">Outstanding
                                        </label>
                                        <input type="text" class="form-control numeral-mask"
                                            name="form_pinjaman_lainnya_outstanding"
                                            id="form_pinjaman_lainnya_outstanding"
                                            aria-describedby="form_pinjaman_lainnya_outstanding"
                                            placeholder="Outstanding (Rp)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pinjaman_lainnya_jangka_waktu_bulan">Jangka
                                            Waktu (Bulan)</label>
                                        <input type="number" class="form-control"
                                            name="form_pinjaman_lainnya_jangka_waktu_bulan"
                                            id="form_pinjaman_lainnya_jangka_waktu_bulan"
                                            aria-describedby="form_pinjaman_lainnya_jangka_waktu_bulan"
                                            placeholder="Jangka Waktu (Bulan)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pinjaman_lainnya_bunga_margin">Bunga/Margin
                                            (%)</label>
                                        <input type="text" class="form-control"
                                            name="form_pinjaman_lainnya_bunga_margin"
                                            id="form_pinjaman_lainnya_bunga_margin"
                                            aria-describedby="form_pinjaman_lainnya_bunga_margin"
                                            placeholder="Bunga/Margin (%)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pinjaman_lainnya_angsuran_per_bulan">Angsuran/Bulan</label>
                                        <input type="text" class="form-control numeral-mask"
                                            name="form_pinjaman_lainnya_angsuran_per_bulan"
                                            id="form_pinjaman_lainnya_angsuran_per_bulan"
                                            aria-describedby="form_pinjaman_lainnya_angsuran_per_bulan"
                                            placeholder="Angsuran/Bulan (Rp)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_lainnya_agunan">Agunan</label>
                                        <input type="text" class="form-control"
                                            name="form_pinjaman_lainnya_agunan" id="form_pinjaman_lainnya_agunan"
                                            aria-describedby="form_pinjaman_lainnya_agunan" placeholder="Agunan" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pinjaman_lainnya_kolektibilitas">Kolektibilitas</label>
                                        <input type="text" class="form-control"
                                            name="form_pinjaman_lainnya_kolektibilitas"
                                            id="form_pinjaman_lainnya_kolektibilitas"
                                            aria-describedby="form_pinjaman_lainnya_kolektibilitas"
                                            placeholder="Kolektibilitas" />
                                    </div>
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="mb-1">
                                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                            type="button">
                                            <i data-feather="x" class="me-25"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-bottom:8px;"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                <i data-feather="plus" class="me-25"></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Lainnya -->



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
