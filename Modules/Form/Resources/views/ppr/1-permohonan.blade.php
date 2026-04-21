<div id="formPermohonan" class="content" role="tabpanel" aria-labelledby="permohonan-trigger">
    <div class="content-header">
        <small class="text-danger">* Wajib Diisi</small>
    </div>
    <div class="row">
        <input type="hidden" name="jenis_nasabah" value="{{ request('jenis_nasabah') }}" />
        <div class="mb-1 col-md-6">
            <label class="form-label" for="ao"><small class="text-danger">*
                </small>Nama Account Officer (AO)</label>
            <select class="select2 w-100 " name="user_id" id="ao"
                data-placeholder="Pilih
                                        AO" required>
                <option value="">
                </option>
                @foreach ($aos as $ao)
                    <option value="{{ $ao->user->id }}">{{ $ao->user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-1 col-md-6">
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_permohonan_jenis_akad_pembayaran"><small class="text-danger">*
                </small>Jenis Akad Pembayaran</label>
            <select class="select2 w-100" name="form_permohonan_jenis_akad_pembayaran"
                id="formPermohonanJenisAkadPembayaran" onChange="changeJenisAkad()"
                data-placeholder="Pilih Akad Pembayaran" required>
                <option value=""></option>
                <option value="Murabahah">Murabahah</option>
                <option value="IMBT">IMBT</option>
                <option value="MMQ">MMQ</option>
                <option value="Akad Lainnya">Lainnya</option>
            </select>
        </div>
        <div class="mb-1 col-md-6 hide" id="ifJenisAkadLain">
            <label class="form-label" for="akadLainnya"><small class="text-danger">*
                </small>Jenis Akad Lainnya</label>
            <input type="text" name="form_permohonan_jenis_akad_pembayaran_lain" id="akadLainnya"
                class="form-control" placeholder="Masukkan Jenis Akad Pembayaran" />
        </div>
        <hr style="margin-top: 7px;" />
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_permohonan_nilai_hpp"><small class="text-danger">*
                </small>Nilai HPP</label>
            <input type="text" name="form_permohonan_nilai_hpp" id="form_permohonan_nilai_hpp"
                class="form-control  numeral-mask" placeholder="Nilai HPP" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_permohonan_uang_muka_dana_sendiri"><small class="text-danger">*
                </small>Uang Muka/Dana
                Sendiri</label>
            <input type="text" name="form_permohonan_uang_muka_dana_sendiri"
                id="form_permohonan_uang_muka_dana_sendiri" class="form-control numeral-mask"
                placeholder="Uang Muka/Dana Sendiri" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_permohonan_nilai_ppr_dimohon"><small class="text-danger">*
                </small>Nilai PPR Syariah
                Dimohon</label>
            <input type="text" name="form_permohonan_nilai_ppr_dimohon" id="form_permohonan_nilai_ppr_dimohon"
                class="form-control numeral-mask" placeholder="Nilai PPR Syariah Dimohon"
                onkeyup="calHargaJual(this.value);" required />
        </div>

        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_permohonan_harga_jual"><small class="text-danger">*
                </small>Harga Jual</label>
            <input type="text" name="form_permohonan_harga_jual" id="form_permohonan_harga_jual"
                class="form-control numeral-mask" placeholder="Harga Jual" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="formPermohonanJangkaWaktuTahun"><small class="text-danger">*
                </small>Jangka Waktu PPR Syariah (Tahun)</label>
            <select class="select2 w-100" name="form_permohonan_jangka_waktu_ppr" id="formPermohonanJangkaWaktuTahun"
                onChange="changeJangkaWaktu(); calHargaJual(this.value);" data-placeholder="Pilih Jangka Waktu"
                required>
                <option value=""></option>
                <option value="1 Tahun">1 Tahun</option>
                <option value="2 Tahun">2 Tahun</option>
                <option value="3 Tahun">3 Tahun</option>
                <option value="4 Tahun">4 Tahun</option>
                <option value="5 Tahun">5 Tahun</option>
                <option value="6 Tahun">6 Tahun</option>
                <option value="7 Tahun">7 Tahun</option>
                <option value="8 Tahun">8 Tahun</option>
                <option value="9 Tahun">9 Tahun</option>
                <option value="10 Tahun">10 Tahun</option>
                <option value="11 Tahun">11 Tahun</option>
                <option value="12 Tahun">12 Tahun</option>
                <option value="13 Tahun">13 Tahun</option>
                <option value="14 Tahun">14 Tahun</option>
                <option value="15 Tahun">15 Tahun</option>
                <option value="16 Tahun">16 Tahun</option>
                <option value="17 Tahun">17 Tahun</option>
                <option value="18 Tahun">18 Tahun</option>
                <option value="19 Tahun">19 Tahun</option>
                <option value="20 Tahun">20 Tahun</option>
            </select>
        </div>

        <div class="mb-1 col-md-6 row">
            <div class="col-md-10">
                <label class="form-label" for="formPermohonanJumlahBulan"><small class="text-danger">*
                    </small>Jumlah Bulan</label>
                <input type="number" name="form_permohonan_jml_bulan" id="formPermohonanJumlahBulan"
                    class="form-control" placeholder="Jumlah Bulan" onkeyup="calHargaJual(this.value);" required />
            </div>
            <div class="col-auto" style="margin-top: 32px;">
                <span class="form-text-beside">Bulan</span>
            </div>
        </div>

        <div class="mb-1 col-md-6 hide" id="ifMurabahah">
            <label class="form-label" for="form_permohonan_jml_margin"><small class="text-danger">*
                </small>Jumlah Margin</label>
            <input type="text" id="formPermohonanJmlMarginDummy" class="form-control numeral-mask hide"
                required />
            <input type="hidden" name="form_permohonan_jml_margin" id="formPermohonanJmlMargin"
                class="form-control numeral-mask hide" placeholder="Masukkan Jumlah Margin" required disabled />
        </div>
        <div class="mb-1 col-md-6 hide" id="ifImbt">
            <label class="form-label" for="form_permohonan_jml_sewa"><small class="text-danger">*
                </small>Jumlah Sewa</label>
            <input type="text" name="form_permohonan_jml_sewa" id="formPermohonanJmlSewa"
                class="form-control numeral-mask hide" placeholder="Masukkan Jumlah Sewa" required />
        </div>
        <div class="mb-1 col-md-6 hide" id="ifMmq">
            <label class="form-label" for="form_permohonan_jml_bagi_hasil"><small class="text-danger">*
                </small>Jumlah Bagi
                Hasil</label>
            <input type="text" name="form_permohonan_jml_bagi_hasil" id="formPermohonanJmlBagiHasil"
                class="form-control numeral-mask hide" placeholder="Masukkan Jumlah Bagi" required />
        </div>
        <div class="mb-1 col-md-6 hide" id="ifAkadLain">
            <label class="form-label" for="form_permohonan_jml_margin_akad_lain"><small class="text-danger">*
                </small>Jumlah Margin (Akad Lain)</label>
            <input type="text" name="form_permohonan_jml_margin" id="formPermohonanJmlMarginAkadLain"
                class="form-control numeral-mask hide" placeholder="Masukkan Jumlah Margin (Akad Lain)" required
                disabled />
        </div>

        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_permohonan_peruntukan_ppr"><small class="text-danger">*
                </small>Peruntukan PPR Syariah</label>
            <select class="select2 w-100" name="form_permohonan_peruntukan_ppr" id="form_permohonan_peruntukan_ppr"
                data-placeholder="Pilih Peruntukan" required>
                <option value=""></option>
                <option value="Rumah Tinggal">Rumah Tinggal</option>
                <option value="Apartemen">Apartemen</option>
                <option value="Rusun">Rusun</option>
                <option value="Ruko">Ruko</option>
                <option value="Rukan">Rukan</option>
            </select>
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_permohonan_sistem_pembayaran_angsuran"><small class="text-danger">*
                </small>Sistem Pembayaran Angsuran</label>
            <select class="select2 w-100" name="form_permohonan_sistem_pembayaran_angsuran"
                id="form_permohonan_sistem_pembayaran_angsuran" data-placeholder="Pilih Sistem Pembayaran Angsuran"
                required>
                <option value=""></option>
                <option value="Kolektif/Potong Gaji">Kolektif/Potong Gaji</option>
                <option value="Pemindahbukuan/Transfer">Pemindahbukuan/Transfer</option>
                <option value="Tunai - ATM">Tunai - ATM</option>
                <option value="Tunai - Loket">Tunai - Loket</option>
                <option value="Kantor Pos">Kantor Pos</option>
            </select>
        </div>


    </div>

    <div class="d-flex justify-content-between mt-3">
        <button class="btn btn-outline-secondary btn-prev" disabled>
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
        </button>
        <button class="btn btn-primary btn-next" type="button">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
        </button>
    </div>
</div>
