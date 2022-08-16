@extends('form::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <style>
        .data {
            visibility: hidden;
        }
    </style>

    <div class="content-wrapper container-xxl">
        <div class="content-body">
            <!-- Modern Horizontal Wizard -->
            <section class="modern-horizontal-wizard">
                <div class="bs-stepper wizard-modern modern-wizard-example">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#formPermohonan" role="tab" id="permohonan-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="file-text" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Permohonan PPR Syariah</span>
                                    <span class="bs-stepper-subtitle">Isi Data </span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#formDataPribadi" role="tab" id="pribadi-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="user" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Data Pribadi</span>
                                    <span class="bs-stepper-subtitle">Isi Data Pribadi</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#formDataPekerjaan" role="tab" id="pekerjaan-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="briefcase" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Data Pekerjaan</span>
                                    <span class="bs-stepper-subtitle">Isi Data Pekerjaan</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#formDataPenghasilanPengeluaran" role="tab"
                            id="penghasilan-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="dollar-sign" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Data Penghasilan dan Pengeluaran</span>
                                    <span class="bs-stepper-subtitle">Isi Data Penghasilan dan Pengeluaran</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#formDataAgunan" role="tab" id="agunan-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="book" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Data Agunan</span>
                                    <span class="bs-stepper-subtitle">Isi Data Agunan</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#formKekayaan" role="tab" id="kekayaan-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="credit-card" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Data Kekayaan dan Pinjaman</span>
                                    <span class="bs-stepper-subtitle">Isi Data Kekayaan dan Pinjaman</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#formInfo" role="tab" id="info-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="info" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Persyaratan Kelengkapan</span>
                                    <span class="bs-stepper-subtitle">Informasi Persyaratan Kelengkapan Dokumen</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <form>
                            <!-- Form Permohonan -->
                            <div id="formPermohonan" class="content" role="tabpanel"
                                aria-labelledby="permohonan-trigger">
                                <div class="content-header">
                                    {{-- <h5 class="mb-0">Account Details</h5> --}}
                                    <small class="text-danger">* Wajib Diisi</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jenis_akad_pembayaran"><small
                                                class="text-danger">*
                                            </small>Jenis Akad Pembayaran</label>
                                        <select class="select2 w-100" name="jenis_akad_pembayaran"
                                            id="jenis_akad_pembayaran" onChange="changeJenisAkad()">
                                            <option label="jenis_akad_pembayaran" disabled selected hidden>Pilih Akad
                                                Pembayaran</option>
                                            <option value="murabahah">Murabahah</option>
                                            <option value="imbt">IMBT</option>
                                            <option value="mmq">MMQ</option>
                                            <option value="akad_lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6 data" id="AkadLainnya">
                                        <label class="form-label" for="jenis_akad_pembayaran"><small
                                                class="text-danger">*
                                            </small>Lainnya</label>
                                        <input type="number" name="nilai_kpr_dimohon" id="nilai_kpr_dimohon"
                                            class="form-control" placeholder="Masukkan Jenis Akad Pembayaran" />
                                    </div>
                                    <hr />

                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nilai_kpr_dimohon"><small class="text-danger">*
                                            </small>Nilai PPR Syariah
                                            Dimohon</label>
                                        <input type="number" name="nilai_kpr_dimohon" id="nilai_kpr_dimohon"
                                            class="form-control" placeholder="Nilai PPR Syariah Dimohon" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="uang_muka"><small class="text-danger">*
                                            </small>Uang Muka/Dana
                                            Sendiri</label>
                                        <input type="number" name="uang_muka" id="uang_muka" class="form-control"
                                            placeholder="Uang Muka/Dana Sendiri" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nilai_hpp"><small class="text-danger">*
                                            </small>Nilai HPP/Harga Jual</label>
                                        <input type="number" name="nilai_hpp" id="nilai_hpp" class="form-control"
                                            placeholder="Nilai HPP/Harga Jual" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jangka_waktu"><small class="text-danger">*
                                            </small>Jangka Waktu PPR Syariah</label>
                                        <input type="number" name="jangka_waktu" id="jangka_waktu" class="form-control"
                                            placeholder="Masukkan Jangka Waktu PPR Syariah" required />
                                    </div>

                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="peruntukan_kpr"><small class="text-danger">*
                                            </small>Peruntukan PPR Syariah</label>
                                        <select class="select2 w-100" name="peruntukan_kpr" id="peruntukan_kpr">
                                            <option label="peruntukan_kpr">Pilih Pembelian</option>
                                            <option>Rumah Tinggal</option>
                                            <option>Apartemen</option>
                                            <option>Rusun</option>
                                            <option>Ruko</option>
                                            <option>Rukan</option>
                                            <option>Kios</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jml_margin"><small class="text-danger">*
                                            </small>Jumlah Margin</label>
                                        <input type="number" name="jml_margin" id="jml_margin" class="form-control"
                                            placeholder="Masukkan Jumlah Margin" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jml_sewa"><small class="text-danger">*
                                            </small>Jumlah Sewa</label>
                                        <input type="number" name="jml_sewa" id="jml_sewa" class="form-control"
                                            placeholder="Masukkan Jumlah Sewa" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jml_bagi"><small class="text-danger">*
                                            </small>Jumlah Bagi</label>
                                        <input type="number" name="jml_bagi" id="jml_bagi" class="form-control"
                                            placeholder="Masukkan Jumlah Bagi" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jml_bulan"><small class="text-danger">*
                                            </small>Jumlah Bulan</label>
                                        <input type="number" name="jml_bulan" id="jml_bulan" class="form-control"
                                            placeholder="Masukkan Jumlah Bulan" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="pembayaran_angsuran"><small class="text-danger">*
                                            </small>Sistem Pembayaran Angsuran</label>
                                        <select class="select2 w-100" name="pembayaran_angsuran"
                                            id="pembayaran_angsuran">
                                            <option label="pembayaran_angsuran">Pilih Sistem Pembayaran Angsuran</option>
                                            <option>Kolektif/Potong Gaji</option>
                                            <option>Pemindahbukuan/Transfer</option>
                                            <option>Tunai - ATM</option>
                                            <option>Tunai - Loket</option>
                                            <option>Kantor Pos</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-outline-secondary btn-prev" disabled>
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>


                            <!-- Form Data Pribadi -->

                            <div id="formDataPribadi" class="content" role="tabpanel" aria-labelledby="pribadi-trigger">
                                <div class="content-header">
                                    <h4 class="mb-0 mt-2">Data Pribadi</h4>
                                    <hr>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Pemohon PPR Syariah</h5>
                                    <small class="text-muted">Lengkapi Data Diri.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nama"><small class="text-danger">*
                                            </small>Nama Lengkap</label>
                                        <input type="text" name="nama" id="nama" class="form-control"
                                            placeholder="Nama Lengkap" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="namaktp"><small class="text-danger">*
                                            </small>Nama Sesuai KTP</label>
                                        <input type="text" name="namaktp" id="namaktp" class="form-control"
                                            placeholder="Nama Sesuai KTP" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="gelar">Gelar</label>
                                        <input type="text" name="gelar" id="gelar" class="form-control"
                                            placeholder="Gelar" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="gelar">Nama Alias</label>
                                        <input type="text" name="namaalias" id="namaalias" class="form-control"
                                            placeholder="Nama Alias" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="noktp"><small class="text-danger">*
                                            </small>No. KTP</label>
                                        <input type="number" name="noktp" id="noktp" class="form-control"
                                            placeholder="Masukkan Nomor KTP Anda" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tgllahir"><small class="text-danger">*
                                            </small>Berlaku s/d.</label>
                                        <input type="date" id="tgllahir" class="form-control flatpickr-basic"
                                            name="tanggal" placeholder="DD-MM-YYYY" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jeniskelamin"><small class="text-danger">*
                                            </small>Jenis Kelamin</label>
                                        <div>
                                            {{-- &ensp;
                                            <input type="radio" name="jeniskelamin" id="pria" value="pria"
                                                required /><label class="form-label"
                                                style="transform: translateY(-15%);">&nbsp;Pria</label>
                                            &emsp;
                                            <input type="radio" name="jeniskelamin" id="wanita" value="wanita"
                                                required /><label class="form-label"
                                                style="transform: translateY(-15%);">&nbsp;Wanita</label> --}}
                                            &ensp;
                                            <input type="radio" name="jeniskelamin" id="pria" value="pria"
                                                required />
                                            <label class="form-label" for="pria">&nbsp;Pria</label>
                                            <br>
                                            &ensp;
                                            <input type="radio" name="jeniskelamin" id="wanita" value="wanita"
                                                required />
                                            <label class="form-label" for="wanita">&nbsp;Wanita</label>
                                        </div>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tempatlahir"><small class="text-danger">*
                                            </small>Tempat Lahir</label>
                                        <input type="text" name="tempatlahir" id="tempatlahir" class="form-control"
                                            placeholder="Masukkan Tempat Lahir Anda" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tgllahir"><small class="text-danger">*
                                            </small>Tanggal Lahir</label>
                                        <input type="date" id="tgllahir" class="form-control flatpickr-basic"
                                            name="tanggal" placeholder="DD-MM-YYYY" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <small class="text-danger">*
                                        </small> <label class="form-label" for="nonpwp">No. NPWP</label>
                                        <input type="number" name="nonpwp" id="nonpwp" class="form-control"
                                            placeholder="Masukkan Nomor NPWP Anda" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="ppendidikan"><small class="text-danger">*
                                            </small>Pendidikan</label>
                                        <select class="select2 w-100" name="ppendidikan" id="ppendidikan">
                                            <option label="ppendidikan">Pilih Pendidikan</option>
                                            <option>SD</option>
                                            <option>SLTP</option>
                                            <option>SLTA</option>
                                            <option>D1</option>
                                            <option>D2</option>
                                            <option>D3</option>
                                            <option>S1</option>
                                            <option>S2</option>
                                            <option>S3</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="agama">Agama</label>
                                        <select class="select2 w-100" name="agama" id="agama">
                                            <option label="agama">Pilih Agama</option>
                                            <option>Islam</option>
                                            <option>Protestan</option>
                                            <option>Katholik</option>
                                            <option>Budha</option>
                                            <option>Hindu</option>
                                            <option>Kong Hu Chu</option>
                                            <option>Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="status"><small class="text-danger">*
                                            </small>Status Pernikahan</label>
                                        <select class="select2 w-100" name="status" id="status"
                                            onChange="changeStatus()">
                                            <option label="status">Pilih Status Pernikahan</option>
                                            <option value="BM">Belum Menikah</option>
                                            <option value="M">Menikah</option>
                                            <option value="JDM">Janda/Duda - Meninggal</option>
                                            <option value="JDC">Janda/Duda - Cerai</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="gelar"><small class="text-danger">*
                                            </small>Jumlah Anak</label>
                                        <input type="number" name="jumlahanak" id="jumlahanak" class="form-control"
                                            placeholder="Jumlah Anak" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="gelar"><small class="text-danger">*
                                            </small>Jumlah Tanggungan</label>
                                        <input type="number" name="jumlahtanggungan" id="jumlahtanggungan"
                                            class="form-control" placeholder="Jumlah Tanggungan" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="namagadisibukandung">Nama Gadis Ibu Kandung</label>
                                        <input type="text" name="namagadisibukandung" id="namagadisibukandung"
                                            class="form-control" placeholder="Nama Gadis Ibu Kandung" required />
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-12">
                                            <div data-repeater-list="invoice">
                                                <div data-repeater-item>
                                                    <div class="row d-flex align-items-end">
                                                        <div class="col-md-4 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="alamatsesuaiktp"><small
                                                                        class="text-danger">*
                                                                    </small>Alamat Sesuai KTP</label>
                                                                <input type="text" class="form-control" id="itemcost"
                                                                    aria-describedby="itemcost" placeholder="Alamat" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-1 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemcost"><small
                                                                        class="text-danger">*
                                                                    </small>RT</label>
                                                                <input type="number" class="form-control" id="itemcost"
                                                                    aria-describedby="itemcost" placeholder="RT" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-1 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemquantity"><small
                                                                        class="text-danger">*
                                                                    </small>RW</label>
                                                                <input type="number" class="form-control"
                                                                    id="itemquantity" aria-describedby="itemquantity"
                                                                    placeholder="RW" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemquantity"><small
                                                                        class="text-danger">*
                                                                    </small>Kelurahan</label>
                                                                <input type="number" class="form-control"
                                                                    id="itemquantity" aria-describedby="itemquantity"
                                                                    placeholder="Kelurahan" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemquantity"><small
                                                                        class="text-danger">*
                                                                    </small>Kecamatan</label>
                                                                <input type="text" class="form-control"
                                                                    id="itemquantity" aria-describedby="itemquantity"
                                                                    placeholder="Kecamatan" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemquantity"><small
                                                                        class="text-danger">*
                                                                    </small>Dati
                                                                    2</label>
                                                                <input type="text" class="form-control"
                                                                    id="itemquantity" aria-describedby="itemquantity"
                                                                    placeholder="Dati 2" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemquantity"><small
                                                                        class="text-danger">*
                                                                    </small>Provinsi</label>
                                                                <input type="text" class="form-control"
                                                                    id="itemquantity" aria-describedby="itemquantity"
                                                                    placeholder="Provinsi" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-1 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemquantity"><small
                                                                        class="text-danger">*
                                                                    </small>Kode
                                                                    Pos</label>
                                                                <input type="number" class="form-control"
                                                                    id="itemquantity" aria-describedby="itemquantity"
                                                                    placeholder="16XXXX" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            {{-- <div class="row">
                                                <div class="col-12">
                                                    <button class="btn btn-icon btn-primary" type="button"
                                                        data-repeater-create>
                                                        <i data-feather="plus" class="me-25"></i>
                                                        <span>Add New</span>
                                                    </button>
                                                </div>
                                            </div> --}}
                                        </div>

                                        <div class="mb-1 col-md-6"></div>

                                        <div class="row">
                                            <div class="mb-1 col-md-12">
                                                <div data-repeater-list="invoice">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-4 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="alamatsesuaiktp"><small
                                                                            class="text-danger">*
                                                                        </small>Alamat Tempat Tinggal</label>
                                                                    <input type="text" class="form-control"
                                                                        id="itemcost" aria-describedby="itemcost"
                                                                        placeholder="Alamat" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemcost"><small
                                                                            class="text-danger">*
                                                                        </small>RT</label>
                                                                    <input type="number" class="form-control"
                                                                        id="itemcost" aria-describedby="itemcost"
                                                                        placeholder="RT" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity"><small
                                                                            class="text-danger">*
                                                                        </small>RW</label>
                                                                    <input type="number" class="form-control"
                                                                        id="itemquantity" aria-describedby="itemquantity"
                                                                        placeholder="RW" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity"><small
                                                                            class="text-danger">*
                                                                        </small>Kelurahan</label>
                                                                    <input type="number" class="form-control"
                                                                        id="itemquantity" aria-describedby="itemquantity"
                                                                        placeholder="Kelurahan" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity"><small
                                                                            class="text-danger">*
                                                                        </small>Kecamatan</label>
                                                                    <input type="text" class="form-control"
                                                                        id="itemquantity" aria-describedby="itemquantity"
                                                                        placeholder="Kecamatan" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity"><small
                                                                            class="text-danger">*
                                                                        </small>Dati
                                                                        2</label>
                                                                    <input type="text" class="form-control"
                                                                        id="itemquantity" aria-describedby="itemquantity"
                                                                        placeholder="Dati 2" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity"><small
                                                                            class="text-danger">*
                                                                        </small>Provinsi</label>
                                                                    <input type="text" class="form-control"
                                                                        id="itemquantity" aria-describedby="itemquantity"
                                                                        placeholder="Provinsi" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity"><small
                                                                            class="text-danger">*
                                                                        </small>Kode
                                                                        Pos</label>
                                                                    <input type="number" class="form-control"
                                                                        id="itemquantity" aria-describedby="itemquantity"
                                                                        placeholder="16XXXX" />
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                    <div class="col-12">
                                                        <button class="btn btn-icon btn-primary" type="button"
                                                            data-repeater-create>
                                                            <i data-feather="plus" class="me-25"></i>
                                                            <span>Add New</span>
                                                        </button>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="notelp"><small class="text-danger">*
                                                    </small>No. Telepon</label>
                                                <input type="number" name="notelp" id="notelp" class="form-control"
                                                    placeholder="Masukkan Nomor Telepon Anda" required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="handphone"><small class="text-danger">*
                                                    </small>Handphone</label>
                                                <input type="number" name="handphone" id="handphone"
                                                    class="form-control" placeholder="Masukkan Nomor Handphone Anda"
                                                    required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="statustempattinggal">Status Tempat
                                                    Tinggal</label>
                                                <select class="select2 w-100" name="statustempattinggal"
                                                    id="statustempattinggal">
                                                    <option label="statustempattinggal">Pilih Status Tempat Tinggal
                                                    </option>
                                                    <option>Milik Sendiri</option>
                                                    <option>Sewa/Kontrak</option>
                                                    <option>Kost</option>
                                                    <option>Milik Orangtua/Keluarga</option>
                                                    <option>Milik Perusahaan/Instansi/Dinas</option>
                                                </select>

                                                <!-- Rincian -->

                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="alamatkorespondensi">Alamat
                                                    Korespondensi</label>
                                                <select class="select2 w-100" name="alamatkorespondensi"
                                                    id="alamatkorespondensi">
                                                    <option label="alamatkorespondensi">Pilih Alamat Korespondensi</option>
                                                    <option>Alamat Sesuai KTP</option>
                                                    <option>Alamat Tempat Tinggal</option>
                                                    <option>Alamat Pekerjaan/Kantor</option>
                                                    <option>Milik Orangtua/Keluarga</option>
                                                    <option>Alamat Agunan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Keluarga Terdekat -->
                                        <div class="content-header">
                                            <h5 class="mb-0 mt-2">Keluarga Terdekat</h5>
                                            <small class="text-muted">Lengkapi Data Keluarga Terdekat.</small>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="namais"><small class="text-danger">*
                                                    </small>Nama Lengkap</label>
                                                <input type="text" name="namais" id="namais" class="form-control"
                                                    placeholder="Nama Lengkap" required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="hubdenganpemohon"><small
                                                        class="text-danger">*
                                                    </small>Hubungan Dengan Pemohon</label>
                                                <select class="select2 w-100" name="hubdenganpemohon"
                                                    id="hubdenganpemohon">
                                                    <option label="hubdenganpemohon">Hubungan Dengan Pemohon</option>
                                                    <option>Orangtua</option>
                                                    <option>Mertua</option>
                                                    <option>Sdr. Kandung</option>
                                                    <option>Anak</option>
                                                    <option>Ipar</option>
                                                    <option>Sdr. Kandung dari Orangtua</option>
                                                    <option>Lainnya</option>

                                                    {{-- if Lainnya is selected, input text ... or create new option (new table) --}}

                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="mb-1 col-md-12">
                                                    <div data-repeater-list="invoice">
                                                        <div data-repeater-item>
                                                            <div class="row d-flex align-items-end">
                                                                <div class="col-md-4 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="alamatsesuaiktp"><small
                                                                                class="text-danger">*
                                                                            </small>Alamat Tempat Tinggal</label>
                                                                        <input type="text" class="form-control"
                                                                            id="itemcost" aria-describedby="itemcost"
                                                                            placeholder="Alamat" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-1 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="itemcost"><small
                                                                                class="text-danger">*
                                                                            </small>RT</label>
                                                                        <input type="number" class="form-control"
                                                                            id="itemcost" aria-describedby="itemcost"
                                                                            placeholder="RT" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-1 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="itemquantity"><small
                                                                                class="text-danger">*
                                                                            </small>RW</label>
                                                                        <input type="number" class="form-control"
                                                                            id="itemquantity"
                                                                            aria-describedby="itemquantity"
                                                                            placeholder="RW" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="itemquantity"><small
                                                                                class="text-danger">*
                                                                            </small>Kelurahan</label>
                                                                        <input type="number" class="form-control"
                                                                            id="itemquantity"
                                                                            aria-describedby="itemquantity"
                                                                            placeholder="Kelurahan" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="itemquantity"><small
                                                                                class="text-danger">*
                                                                            </small>Kecamatan</label>
                                                                        <input type="text" class="form-control"
                                                                            id="itemquantity"
                                                                            aria-describedby="itemquantity"
                                                                            placeholder="Kecamatan" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="itemquantity"><small
                                                                                class="text-danger">*
                                                                            </small>Dati
                                                                            2</label>
                                                                        <input type="text" class="form-control"
                                                                            id="itemquantity"
                                                                            aria-describedby="itemquantity"
                                                                            placeholder="Dati 2" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="itemquantity"><small
                                                                                class="text-danger">*
                                                                            </small>Provinsi</label>
                                                                        <input type="text" class="form-control"
                                                                            id="itemquantity"
                                                                            aria-describedby="itemquantity"
                                                                            placeholder="Provinsi" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-1 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="itemquantity"><small
                                                                                class="text-danger">*
                                                                            </small>Kode
                                                                            Pos</label>
                                                                        <input type="number" class="form-control"
                                                                            id="itemquantity"
                                                                            aria-describedby="itemquantity"
                                                                            placeholder="16XXXX" />
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    {{-- <div class="row">
                                                    <div class="col-12">
                                                        <button class="btn btn-icon btn-primary" type="button"
                                                            data-repeater-create>
                                                            <i data-feather="plus" class="me-25"></i>
                                                            <span>Add New</span>
                                                        </button>
                                                    </div>
                                                </div> --}}
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="notelp"><small class="text-danger">*
                                                        </small>No. Telepon Tempat Tinggal</label>
                                                    <input type="number" name="notelp" id="notelp"
                                                        class="form-control"
                                                        placeholder="Masukkan Nomor Telepon Keluarga Terdekat" required />
                                                </div>
                                            </div>

                                            <!-- Istri/Suami -->
                                            <div class="content-header data" id="ifMenikahHeader">
                                                <h5 class="mb-0 mt-2">Istri / Suami</h5>
                                                <small class="text-muted">Lengkapi Data Istri/Suami.</small>
                                            </div>
                                            <div class="row data" id="ifMenikah">
                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="namais"><small class="text-danger">*
                                                        </small>Nama Lengkap</label>
                                                    <input type="text" name="namais" id="namais"
                                                        class="form-control" placeholder="Nama Lengkap" required />
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="gelaris"><small class="text-danger">*
                                                        </small>Gelar</label>
                                                    <input type="text" name="gelaris" id="gelaris"
                                                        class="form-control" placeholder="Gelar" required />
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="noktpis"><small class="text-danger">*
                                                        </small>No. KTP</label>
                                                    <input type="number" name="noktpis" id="noktpis"
                                                        class="form-control"
                                                        placeholder="Masukkan Nomor KTP Istri/Suami Anda" required />
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="tgllahir"><small class="text-danger">*
                                                        </small>Berlaku s/d.</label>
                                                    <input type="date" id="tgllahir"
                                                        class="form-control flatpickr-basic" name="tanggal"
                                                        placeholder="DD-MM-YYYY" required />
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="tempatlahiris"><small
                                                            class="text-danger">*
                                                        </small>Tempat Lahir</label>
                                                    <input type="text" name="tempatlahiris" id="tempatlahiris"
                                                        class="form-control"
                                                        placeholder="Masukkan Tempat Lahir Istri/Suami" required />
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="tgllahiris"><small
                                                            class="text-danger">*
                                                        </small>Tanggal Lahir</label>
                                                    <input type="date" id="tgllahiris"
                                                        class="form-control flatpickr-basic" name="tgllahiris"
                                                        placeholder="DD-MM-YYYY" required />
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="nonpwp">No. NPWP</label>
                                                    <input type="number" name="nonpwp" id="nonpwp"
                                                        class="form-control" placeholder="Masukkan Nomor NPWP Anda" />
                                                </div>
                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="pendidikanis"><small
                                                            class="text-danger">*
                                                        </small>Pendidikan</label>
                                                    <select class="select2 w-100" name="pendidikanis" id="pendidikanis">
                                                        <option label="pendidikanis">Pilih Pendidikan</option>
                                                        <option>SD</option>
                                                        <option>SLTP</option>
                                                        <option>SLTA</option>
                                                        <option>D1</option>
                                                        <option>D2</option>
                                                        <option>D3</option>
                                                        <option>S1</option>
                                                        <option>S2</option>
                                                        <option>S3</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between mt-3">
                                                <button class="btn btn-primary btn-prev">
                                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                </button>
                                                <button class="btn btn-primary btn-next">
                                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                    <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>





                            <!-- Form Data Pekerjaan -->

                            <div id="formDataPekerjaan" class="content" role="tabpanel"
                                aria-labelledby="pekerjaan-trigger">
                                <div class="content-header">
                                    <h4 class="mb-0 mt-2">Data Pekerjaan</h4>
                                    <hr>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Pemohon PPR Syariah</h5>
                                    <small class="text-muted">Lengkapi Data Diri.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="namapi"><small class="text-danger">*
                                            </small>Nama Perusahaan/Instansi</label>
                                        <input type="text" name="namapi" id="namapi" class="form-control"
                                            placeholder="Nama Perusahaan/Instansi" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="bhp"><small class="text-danger">*
                                            </small>Badan Hukum Perusahaan</label>
                                        <select class="select2 w-100" name="bhp" id="bhp">
                                            <option label="bhp">Pilih Badan Hukum Perusahaan</option>
                                            <option>Departemen</option>
                                            <option>Perusahaan Daerah</option>
                                            <option>Koperasi</option>
                                            <option>Persero</option>
                                            <option>Perusahaan Umum</option>
                                            <option>Perseroan Terbatas</option>
                                            <option>Commanditer Venotschap</option>
                                            <option>FIRMA</option>
                                            <option>Namloose Venotschap</option>
                                            <option>Usaha Dagang</option>
                                            <option>Yayasan</option>
                                            <option>Lainnya Perorangan</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="alamatpk"><small class="text-danger">*
                                            </small>Alamat Pekerjaan/Kantor</label>
                                        <textarea class="form-control" id="alamatpk" rows="3" placeholder="Alamat Pekerjaan/Kantor" required></textarea>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="notelpk"><small class="text-danger">*
                                            </small>Kode Pos</label>
                                        <input type="number" name="notelpk" id="notelpk" class="form-control"
                                            placeholder="Kode Pos" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="notelpk"><small class="text-danger">*
                                            </small>Nomor Telp. Kantor</label>
                                        <input type="number" name="notelpk" id="notelpk" class="form-control"
                                            placeholder="Masukkan Nomor Telepon Kantor" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="pesawatext">Pesawat/Extension</label>
                                        <input type="number" name="pesawatext" id="pesawatext" class="form-control"
                                            placeholder="Masukkan Nomor Pesawat/Extension" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="facsimile">Nomor Facsimile Kantor</label>
                                        <input type="number" name="facsimile" id="facsimile" class="form-control"
                                            placeholder="Masukkan Nomor Nomor Facsimile Kantor" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="npwpp">Nomor NPWP Perusahaan</label>
                                        <input type="number" name="npwpp" id="npwpp" class="form-control"
                                            placeholder="Nomor NPWP Perusahaan" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="bidangusaha"><small class="text-danger">*
                                            </small>Bidang Usaha Perusahaan</label>
                                        <select class="select2 w-100" name="bidangusaha" id="bidangusaha">
                                            <option label="bidangusaha">Pilih Bidang Usaha Perusahaan</option>
                                            <option>Pertanian, Perburuan, dan Sarana Pertanian</option>
                                            <option>Pertambangan</option>
                                            <option>Perindustrian</option>
                                            <option>Listrik, Gas, dan Air</option>
                                            <option>Perdagangan, Restoran, dan Hotel</option>
                                            <option>Pengangkutan, Pergudangan, dan Komunikasi</option>
                                            <option>Jasa-Jasa Dunia Usaha</option>
                                            <option>Jasa-Jasa Sosial Masyarakat</option>
                                            <option>Jasa-Jasa Keuangan dan Perbankan</option>
                                            <option>Lain-Lain</option>

                                            {{-- if Lain-Lain is selected then ... or add new option --}}

                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jenispekerjaan"><small class="text-danger">*
                                            </small>Jenis Pekerjaan</label>
                                        <select class="select2 w-100" name="jenispekerjaan" id="pendidikan">
                                            <option label="jenispekerjaan">Pilih Jenis Pekerjaan</option>
                                            <option>Akunting/Keuangan</option>
                                            <option>Customer Service</option>
                                            <option>Engineering</option>
                                            <option>Eksekutif</option>
                                            <option>Administrasi Umum</option>
                                            <option>Komputer</option>
                                            <option>Konsultan</option>
                                            <option>Marketing</option>
                                            <option>Pendidikan</option>
                                            <option>Pemerintahan</option>
                                            <option>Militer</option>
                                            <option>Pensiunan</option>
                                            <option>Pelajar/Mahasiswa</option>
                                            <option>Wiraswasta</option>
                                            <option>Profesional</option>
                                            <option>Lain-Lain</option>

                                            {{-- if Lain-Lain is selected then ... or add new option --}}

                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jmlkaryawan"><small class="text-danger">*
                                            </small>Jumlah Karyawan</label>
                                        <select class="select2 w-100" name="jmlkaryawan" id="jmlkaryawan">
                                            <option label="jmlkaryawan">Pilih Jumlah Karyawan</option>
                                            <option>
                                                <= 5 Karyawan</option>
                                            <option>6-30 Karyawan</option>
                                            <option>31-60 Karyawan</option>
                                            <option>61-100 Karyawan</option>
                                            <option>>100 Karyawan</option>
                                        </select>
                                    </div>

                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="dbd"><small class="text-danger">*
                                            </small>Dept./Bagian/Divisi</label>
                                        <input type="text" name="dbd" id="dbd" class="form-control"
                                            placeholder="Dept./Bagian/Divisi" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="pgj"><small class="text-danger">*
                                            </small>Pangkat/Gol. Dan Jabatan</label>
                                        <input type="text" name="pgj" id="pgj" class="form-control"
                                            placeholder="Pangkat/Gol. Dan Jabatan" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nirp"><small class="text-danger">*
                                            </small>NIP/NRP</label>
                                        <input type="number" name="nirp" id="nirp" class="form-control"
                                            placeholder="NIP/NRP" required />
                                    </div>


                                    <div class="mb-1 col-md-12">
                                        <div data-repeater-list="invoice">
                                            <div data-repeater-item>
                                                <div class="row d-flex align-items-end">
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="alamatsesuaiktp"><small
                                                                    class="text-danger">*
                                                                </small>Mulai Bekerja</label>
                                                            <input type="date" class="form-control flatpickr-basic"
                                                                id="itemcost" aria-describedby="itemcost"
                                                                placeholder="DD-MM-YYYY" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="itemcost"><small
                                                                    class="text-danger">*
                                                                </small>Usia Pensiun</label>
                                                            <input type="number" class="form-control" id="itemcost"
                                                                aria-describedby="itemcost" placeholder="Usia Pensiun" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="itemquantity"><small
                                                                    class="text-danger">*
                                                                </small>Masa Kerja
                                                                (termasuk sebelumnya)</label>
                                                            <input type="number" class="form-control" id="itemquantity"
                                                                aria-describedby="itemquantity"
                                                                placeholder="Masa Kerja" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="namaatasan"><small class="text-danger">*
                                            </small>Nama Atasan Langsung</label>
                                        <input type="text" name="namaatasan" id="namaatasan" class="form-control"
                                            placeholder="Nama Atasan Langsung" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="noteatla"><small class="text-danger">*
                                            </small>Nomor Telp. Atasan Langsung</label>
                                        <input type="number" name="noteatla" id="noteatla" class="form-control"
                                            placeholder="Masukkan Nomor Telp. Atasan Langsung" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="pesawatextatla"><small class="text-danger">*
                                            </small>Pesawat/Extension</label>
                                        <input type="number" name="pesawatextatla" id="pesawatextatla"
                                            class="form-control" placeholder="Masukkan Nomor Pesawat/Extension"
                                            required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="grupafiliasi">Group Afiliasi Perusahaan</label>
                                        <input type="text" name="grupafiliasi" id="grupafiliasi" class="form-control"
                                            placeholder="Group Afiliasi Perusahaan" required />
                                    </div>

                                    <div class="mb-1 col-md-12">
                                        <div data-repeater-list="invoice">
                                            <div data-repeater-item>
                                                <div class="row d-flex align-items-end">
                                                    <label class="form-label" for="pkt">Pengalaman Kerja
                                                        Terakhir</label>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label"
                                                                for="alamatsesuaiktp">Perusahaan</label>
                                                            <input type="text" class="form-control" id="itemcost"
                                                                aria-describedby="itemcost"
                                                                placeholder="Nama Perusahaan" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="itemcost">Jabatan</label>
                                                            <input type="number" class="form-control" id="itemcost"
                                                                aria-describedby="itemcost" placeholder="Jabatan" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-1 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="itemquantity">Lama
                                                                Kerja</label>
                                                            <input type="number" class="form-control"
                                                                id="itemquantity" aria-describedby="itemquantity"
                                                                placeholder="Tahun" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-12">
                                                        <div class="mb-1">

                                                            <input type="number" class="form-control"
                                                                id="itemquantity" aria-describedby="itemquantity"
                                                                placeholder="Bulan" />
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-header" id="ifISMHeader">
                                    <h5 class="mb-0 mt-2">Istri/Suami Pemohon PPR Syariah</h5>
                                    <small class="text-muted">Lengkapi Data Diri.</small>
                                </div>
                                <div class="row" id="ifISM">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="namapiis"><small class="text-danger">*
                                            </small>Nama Perusahaan/Instansi</label>
                                        <input type="text" name="namapiis" id="namapiis" class="form-control"
                                            placeholder="Nama Perusahaan/Instansi" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="bhpis"><small class="text-danger">*
                                            </small>Badan Hukum Perusahaan</label>
                                        <select class="select2 w-100" name="bhpis" id="bhpis">
                                            <option label="bhpis">Pilih Badan Hukum Perusahaan</option>
                                            <option>Departemen</option>
                                            <option>Perusahaan Daerah</option>
                                            <option>Koperasi</option>
                                            <option>Persero</option>
                                            <option>Perusahaan Umum</option>
                                            <option>Perseroan Terbatas</option>
                                            <option>Commanditer Venotschap</option>
                                            <option>FIRMA</option>
                                            <option>Namloose Venotschap</option>
                                            <option>Usaha Dagang</option>
                                            <option>Yayasan</option>
                                            <option>Lainnya Perorangan</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="alamatpk"><small class="text-danger">*
                                            </small>Alamat Pekerjaan/Kantor</label>
                                        <textarea class="form-control" id="alamatpk" rows="3" placeholder="Alamat Pekerjaan/Kantor" required></textarea>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="notelpk"><small class="text-danger">*
                                            </small>Kode Pos</label>
                                        <input type="number" name="notelpk" id="notelpk" class="form-control"
                                            placeholder="Kode Pos" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="notelpk"><small class="text-danger">*
                                            </small>Nomor Telp. Kantor</label>
                                        <input type="number" name="notelpk" id="notelpk" class="form-control"
                                            placeholder="Masukkan Nomor Telepon Kantor" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="pesawatext">Pesawat/Extension</label>
                                        <input type="number" name="pesawatext" id="pesawatext" class="form-control"
                                            placeholder="Masukkan Nomor Pesawat/Extension" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="facsimile">Nomor Facsimile Kantor</label>
                                        <input type="number" name="facsimile" id="facsimile" class="form-control"
                                            placeholder="Masukkan Nomor Nomor Facsimile Kantor" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="npwpp">Nomor NPWP Perusahaan</label>
                                        <input type="number" name="npwpp" id="npwpp" class="form-control"
                                            placeholder="Nomor NPWP Perusahaan" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="bidangusahais"><small class="text-danger">*
                                            </small>Bidang Usaha Perusahaan</label>
                                        <select class="select2 w-100" name="bidangusahais" id="bidangusahais">
                                            <option label="bidangusahais">Pilih Bidang Usaha Perusahaan</option>
                                            <option>Pertanian, Perburuan, dan Sarana Pertanian</option>
                                            <option>Pertambangan</option>
                                            <option>Perindustrian</option>
                                            <option>Listrik, Gas, dan Air</option>
                                            <option>Perdagangan, Restoran, dan Hotel</option>
                                            <option>Pengangkutan, Pergudangan, dan Komunikasi</option>
                                            <option>Jasa-Jasa Dunia Usaha</option>
                                            <option>Jasa-Jasa Sosial Masyarakat</option>
                                            <option>Jasa-Jasa Keuangan dan Perbankan</option>
                                            <option>Lain-Lain</option>

                                            {{-- if Lain-Lain is selected then ... or add new option --}}

                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jenispekerjaanis"><small class="text-danger">*
                                            </small>Jenis Pekerjaan</label>
                                        <select class="select2 w-100" name="jenispekerjaanis" id="jenispekerjaanis">
                                            <option label="jenispekerjaanis">Pilih Jenis Pekerjaan</option>
                                            <option>Akunting/Keuangan</option>
                                            <option>Customer Service</option>
                                            <option>Engineering</option>
                                            <option>Eksekutif</option>
                                            <option>Administrasi Umum</option>
                                            <option>Komputer</option>
                                            <option>Konsultan</option>
                                            <option>Marketing</option>
                                            <option>Pendidikan</option>
                                            <option>Pemerintahan</option>
                                            <option>Militer</option>
                                            <option>Pensiunan</option>
                                            <option>Pelajar/Mahasiswa</option>
                                            <option>Wiraswasta</option>
                                            <option>Profesional</option>
                                            <option>Lain-Lain</option>

                                            {{-- if Lain-Lain is selected then ... or add new option --}}

                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jmlkaryawanis"><small class="text-danger">*
                                            </small>Jumlah Karyawan</label>
                                        <select class="select2 w-100" name="jmlkaryawanis" id="jmlkaryawanis">
                                            <option label="jmlkaryawanis">Pilih Jumlah Karyawan</option>
                                            <option>
                                                <= 5 Karyawan</option>
                                            <option>6-30 Karyawan</option>
                                            <option>31-60 Karyawan</option>
                                            <option>61-100 Karyawan</option>
                                            <option>>100 Karyawan</option>
                                        </select>
                                    </div>

                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="dbd"><small class="text-danger">*
                                            </small>Dept./Bagian/Divisi</label>
                                        <input type="text" name="dbd" id="dbd" class="form-control"
                                            placeholder="Dept./Bagian/Divisi" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="pgj"><small class="text-danger">*
                                            </small>Pangkat/Gol. Dan Jabatan</label>
                                        <input type="text" name="pgj" id="pgj" class="form-control"
                                            placeholder="Pangkat/Gol. Dan Jabatan" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nirp"><small class="text-danger">*
                                            </small>NIP/NRP</label>
                                        <input type="number" name="nirp" id="nirp" class="form-control"
                                            placeholder="NIP/NRP" required />
                                    </div>


                                    <div class="mb-1 col-md-12">
                                        <div data-repeater-list="invoice">
                                            <div data-repeater-item>
                                                <div class="row d-flex align-items-end">
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="alamatsesuaiktp"><small
                                                                    class="text-danger">*
                                                                </small>Mulai Bekerja</label>
                                                            <input type="date" class="form-control flatpickr-basic"
                                                                id="itemcost" aria-describedby="itemcost"
                                                                placeholder="DD-MM-YYYY" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="itemcost"><small
                                                                    class="text-danger">*
                                                                </small>Usia
                                                                Pensiun</label>
                                                            <input type="number" class="form-control" id="itemcost"
                                                                aria-describedby="itemcost"
                                                                placeholder="Usia Pensiun" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="itemquantity"><small
                                                                    class="text-danger">*
                                                                </small>Masa Kerja
                                                                (termasuk sebelumnya)</label>
                                                            <input type="number" class="form-control"
                                                                id="itemquantity" aria-describedby="itemquantity"
                                                                placeholder="Masa Kerja" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="namaatasan"><small class="text-danger">*
                                            </small>Nama Atasan Langsung</label>
                                        <input type="text" name="namaatasan" id="namaatasan" class="form-control"
                                            placeholder="Nama Atasan Langsung" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="noteatla"><small class="text-danger">*
                                            </small>Nomor Telp. Atasan Langsung</label>
                                        <input type="number" name="noteatla" id="noteatla" class="form-control"
                                            placeholder="Masukkan Nomor Telp. Atasan Langsung" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="pesawatextatla">Pesawat/Extension</label>
                                        <input type="number" name="pesawatextatla" id="pesawatextatla"
                                            class="form-control" placeholder="Masukkan Nomor Pesawat/Extension"
                                            required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="grupafiliasi">Group Afiliasi Perusahaan</label>
                                        <input type="text" name="grupafiliasi" id="grupafiliasi"
                                            class="form-control" placeholder="Group Afiliasi Perusahaan" required />
                                    </div>

                                    <div class="row d-flex align-items-end">
                                        <label class="form-label" for="pkt">Pengalaman Kerja Terakhir</label>
                                        <div class="col-md-4 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="alamatsesuaiktp">Perusahaan</label>
                                                <input type="text" class="form-control" id="itemcost"
                                                    aria-describedby="itemcost" placeholder="Nama Perusahaan" />
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="itemcost">Jabatan</label>
                                                <input type="number" class="form-control" id="itemcost"
                                                    aria-describedby="itemcost" placeholder="Jabatan" />
                                            </div>
                                        </div>

                                        <div class="col-md-1 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="itemquantity">Lama
                                                    Kerja</label>
                                                <input type="number" class="form-control" id="itemquantity"
                                                    aria-describedby="itemquantity" placeholder="Tahun" />
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-12">
                                            <div class="mb-1">

                                                <input type="number" class="form-control" id="itemquantity"
                                                    aria-describedby="itemquantity" placeholder="Bulan" />
                                            </div>

                                        </div>
                                    </div>


                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>


                            <!-- Form Data Penghasilan dan Pengeluaran-->

                            <div id="formDataPenghasilanPengeluaran" class="content" role="tabpanel"
                                aria-labelledby="penghasilan-trigger">
                                <div class="content-header">
                                    <h4 class="mb-0 mt-2">Data Penghasilan dan Pengeluaran per Bulan</h4>
                                    <hr>
                                </div>
                                <div class="row">

                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="penghasilan_utama"><small class="text-danger">*
                                            </small>1. Penghasilan Utama Pemohon</label>
                                        <input type="number" name="penghasilan_utama" id="penghasilan_utama"
                                            class="form-control" placeholder="Masukkan Penghasilan Utama Pemohon"
                                            required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="biaya_hidup_rutin"><small class="text-danger">*
                                            </small>6. Biaya Hidup Rutin Keluarga</label>
                                        <input type="number" name="biaya_hidup_rutin" id="biaya_hidup_rutin"
                                            class="form-control" placeholder="Masukkan Biaya Hidup Rutin Keluarga"
                                            required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="penghasilan_lain"><small class="text-danger">*
                                            </small>2. Penghasilan Lain-Lain Pemohon</label>
                                        <input type="number" name="penghasilan_lain" id="penghasilan_lain"
                                            class="form-control" placeholder="Masukkan Penghasilan Lain-Lain Pemohon"
                                            required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="kewajiban_angsuran"><small
                                                class="text-danger">*
                                            </small>7. Kewajiban Angsuran <i>(Meliputi Total Kewajiban
                                                Angsuran/Bulan
                                                atas
                                                Pinjaman pada Bank atau
                                                Pihak Lain)</i></label>
                                        <input type="number" name="kewajiban_angsuran" id="kewajiban_angsuran"
                                            class="form-control" placeholder="Masukkan Kewajiban Angsuran" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="penghasilan_utama_is"><small
                                                class="text-danger">*
                                            </small>3. Penghasilan Utama Istri/Suami</label>
                                        <input type="number" name="penghasilan_utama_is" id="penghasilan_utama_is"
                                            class="form-control" placeholder="Masukkan Penghasilan Utama Istri/Suami"
                                            required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="total_pengeluaran"><small class="text-danger">*
                                            </small>8. Total Pengeluaran (6+7)</label>
                                        <input type="number" name="total_pengeluaran" id="total_pengeluaran"
                                            class="form-control" placeholder="Masukkan Total Pengeluaran" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="penghasilan_lain_is"><small
                                                class="text-danger">*
                                            </small>4. Penghasilan Lain-Lain Istri/Suami</label>
                                        <input type="number" name="penghasilan_lain_is" id="penghasilan_lain_is"
                                            class="form-control"
                                            placeholder="Masukkan Penghasilan Lain-Lain Istri/Suami" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="sisa_penghasilan"><small class="text-danger">*
                                            </small>9. Sisa Penghasilan (5-8)</label>
                                        <input type="number" name="sisa_penghasilan" id="sisa_penghasilan"
                                            class="form-control" placeholder="Masukkan Sisa Penghasilan" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="total_penghasilan"><small class="text-danger">*
                                            </small>5. Total Penghasilan (1+2+3+4)</label>
                                        <input type="number" name="total_penghasilan" id="total_penghasilan"
                                            class="form-control" placeholder="Masukkan Total Penghasilan" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="kemampuan_mengangsur"><small
                                                class="text-danger">*
                                            </small>10. Kemampuan Mengangsur</label>
                                        <input type="number" name="kemampuan_mengangsur" id="kemampuan_mengangsur"
                                            class="form-control" placeholder="Masukkan Kemampuan Mengangsur" required />
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Form Data Agunan -->

                            <div id="formDataAgunan" class="content" role="tabpanel"
                                aria-labelledby="agunan-trigger">
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
                                        <label class="form-label" for="jenis_agunan"><small class="text-danger">*
                                            </small>Jenis Agunan</label>
                                        <select class="select2 w-100" name="jenis_agunan" id="jenis_agunan">
                                            <option label="jenis_agunan">Pilih Jenis Agunan</option>
                                            <option>Tanah</option>
                                            <option>Rumah Tinggal</option>
                                            <option>Apartemen</option>
                                            <option>Rusun</option>
                                            <option>Ruko</option>
                                            <option>Rukan</option>
                                            <option>Kios</option>
                                            <option>Lain-Lain</option>

                                            {{-- if Lain-Lain is selected then create new option --}}

                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nilai_jual"><small class="text-danger">*
                                            </small>Nilai/Harga Jual (Harga Jual merupakan Harga Transaksi/Harga
                                            Jual
                                            Setelah Discount)</label>
                                        <input type="number" name="nilai_jual" id="nilai_jual" class="form-control"
                                            placeholder="Masukkan Nilai/Harga Jual" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="alamat_agunan"><small class="text-danger">*
                                            </small>Alamat/Lokasi Agunan</label>
                                        <textarea class="form-control" id="alamat_agunan" rows="3" placeholder="Alamat/Lokasi Agunan" required></textarea>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="bukti_kepemilikan"><small class="text-danger">*
                                            </small>Status/Bukti Kepemilikan</label>
                                        <select class="select2 w-100" name="bukti_kepemilikan" id="bukti_kepemilikan">
                                            <option label="bukti_kepemilikan">Pilih Jenis Agunan</option>
                                            <option>SHM</option>
                                            <option>SHGB</option>

                                            {{-- Rincian --}}

                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="no_sertifikat"><small class="text-danger">*
                                            </small>Nomor Sertifikat</label>
                                        <input type="number" name="no_sertifikat" id="no_sertifikat"
                                            class="form-control" placeholder="Masukkan Nomor Sertifikat" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tgl_terbit"><small class="text-danger">*
                                            </small>Tanggal Penerbitan</label>
                                        <input type="date" id="tgl_terbit" class="form-control flatpickr-basic"
                                            name="tgl_terbit" placeholder="DD-MM-YYYY" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="no_imb"><small class="text-danger">*
                                            </small>Nomor IMB</label>
                                        <input type="number" name="no_imb" id="no_imb" class="form-control"
                                            placeholder="Masukkan Nomor IMB" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="peruntukan"><small class="text-danger">*
                                            </small>Peruntukan Bangunan</label>
                                        <input type="text" name="peruntukan" id="no_imb" class="form-control"
                                            placeholder="Masukkan Peruntukan Bangunan" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="luas_tanah_bangunan"><small
                                                class="text-danger">*
                                            </small>Luas Tanah</label>
                                        <input type="number" name="luas_tanah" id="luas_tanah" class="form-control"
                                            placeholder="Masukkan Luas Tanah" required />

                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="luas_tanah_bangunan"><small
                                                class="text-danger">*
                                            </small>Luas Tanah</label>
                                        <input type="number" name="luas_bangunan" id="luas_bangunan"
                                            class="form-control" placeholder="Masukkan Luas Bangunan" required />

                                    </div>

                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nama_pengembang"><small class="text-danger">*
                                            </small>Nama Pengembang</label>
                                        <input type="text" name="nama_pengembang" id="nama_pengembang"
                                            class="form-control" placeholder="Masukkan Nama Pengembang" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nama_perumahan"><small class="text-danger">*
                                            </small>Nama Proyek Perumahan</label>
                                        <input type="text" name="nama_perumahan" id="nama_perumahan"
                                            class="form-control" placeholder="Masukkan Nama Proyek Perumahan"
                                            required />
                                    </div>
                                </div>

                                <!-- Agunan II-->
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Agunan II</h5>
                                    <small class="text-muted">Lengkapi Data Agunan II.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jenis_agunan_ii">Jenis Agunan</label>
                                        <select class="select2 w-100" name="jenis_agunan_ii" id="jenis_agunan_ii">
                                            <option label="jenis_agunan_ii">Pilih Jenis Agunan</option>
                                            <option>Tanah</option>
                                            <option>Rumah Tinggal</option>
                                            <option>Apartemen</option>
                                            <option>Rusun</option>
                                            <option>Ruko</option>
                                            <option>Rukan</option>
                                            <option>Kios</option>
                                            <option>Lain-Lain</option>

                                            {{-- if Lain-Lain is selected then create new option --}}

                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nilai_jual">Nilai/Harga Jual (Harga Jual
                                            merupakan Harga Transaksi/Harga
                                            Jual
                                            Setelah Discount)</label>
                                        <input type="number" name="nilai_jual" id="nilai_jual" class="form-control"
                                            placeholder="Masukkan Nilai/Harga Jual" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="alamat_agunan">Alamat/Lokasi Agunan</label>
                                        <textarea class="form-control" id="alamat_agunan" rows="3" placeholder="Alamat/Lokasi Agunan" required></textarea>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="bukti_kepemilikan_ii">Status/Bukti
                                            Kepemilikan</label>
                                        <select class="select2 w-100" name="bukti_kepemilikan_ii"
                                            id="bukti_kepemilikan_ii">
                                            <option label="bukti_kepemilikan_ii">Pilih Jenis Agunan</option>
                                            <option>SHM</option>
                                            <option>SHGB</option>

                                            {{-- Rincian --}}

                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="no_sertifikat">Nomor Sertifikat</label>
                                        <input type="number" name="no_sertifikat" id="no_sertifikat"
                                            class="form-control" placeholder="Masukkan Nomor Sertifikat" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="no_imb">Nomor IMB</label>
                                        <input type="number" name="no_imb" id="no_imb" class="form-control"
                                            placeholder="Masukkan Nomor IMB" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="luas_tanah_bangunan">Luas Tanah dan
                                            Bangunan</label>
                                        <input type="number" name="luas_tanah_bangunan" id="luas_tanah_bangunan"
                                            class="form-control" placeholder="Masukkan Nomor Pesawat/Extension"
                                            required />
                                        {{-- Rincian --}}
                                    </div>
                                </div>

                                <!-- Agunan III-->
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Agunan III</h5>
                                    <small class="text-muted">Lengkapi Data Agunan III.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jenis_agunan_iii">Jenis Agunan</label>
                                        <select class="select2 w-100" name="jenis_agunan_iii" id="jenis_agunan_iii">
                                            <option label="jenis_agunan_iii">Pilih Jenis Agunan</option>
                                            <option>Deposito</option>
                                            <option>Tabungan</option>
                                            <option>SK Pegawai</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nilai_jual">Nilai Agunan</label>
                                        <input type="number" name="nilai_jual" id="nilai_jual" class="form-control"
                                            placeholder="Masukkan Nilai Agunan" required />
                                    </div>

                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="no_sertifikat">Nomor Rekening</label>
                                        <input type="number" name="no_sertifikat" id="no_sertifikat"
                                            class="form-control" placeholder="Masukkan Nomor Rekening" required />
                                    </div>

                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="no_sertifikat">Atas Nama</label>
                                        <input type="text" name="no_sertifikat" id="no_sertifikat"
                                            class="form-control" placeholder="Masukkan Atas Nama" required />
                                    </div>

                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Form Data Kekayaan dan Pinjaman -->

                            <div id="formKekayaan" class="content" role="tabpanel"
                                aria-labelledby="kekayaan-trigger">
                                <div class="content-header">
                                    <h4 class="mb-0 mt-2">Data Kekayaan dan Pinjaman</h4>
                                    <hr>
                                </div>

                                <!-- Kekayaan-->
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Kekayaan</h5>
                                    <small class="text-muted">Lengkapi Data Kekayaan</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="simpanan">Simpanan</label>

                                    </div>
                                </div>
                                <section id="form-repeater-simpanan">
                                    <div class="row">
                                        <div class="mb-1 col-md-12">
                                            <div class="repeater-default">
                                                <div data-repeater-list="simpanan">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="namabank">Nama
                                                                        Bank</label>
                                                                    <input type="text" class="form-control"
                                                                        id="itemquantity"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Nama Bank" />
                                                                </div>
                                                            </div>

                                                            {{-- <div class="col-md-2 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="itemcost">
                                                                    Simpanan</label>

                                                            </div>
                                                        </div> --}}

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity">Sejak
                                                                        Tahun</label>
                                                                    <input type="number" class="form-control"
                                                                        id="itemquantity"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Tahun" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity">Saldo
                                                                        Per
                                                                        Tanggal</label>
                                                                    <input type="number" class="form-control"
                                                                        id="itemquantity"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Saldo" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <a data-repeater-create
                                                                        class="btn btn-icon btn-primary" type="button">
                                                                        <i data-feather="plus" class="me-30"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <button
                                                                        class="btn btn-outline-danger text-nowrap px-1"
                                                                        data-repeater-delete type="button">
                                                                        <i data-feather="x" class="me-25"></i>
                                                                        {{-- <span>Delete</span> --}}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr />
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="row">
                                            <div class="col-12">
                                                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                    <i data-feather="plus" class="me-25"></i>
                                                    <span>Add New</span>
                                                </button>
                                            </div>
                                        </div> --}}
                                        </div>
                                    </div>
                                </section>

                                <section id="form-repeater-tanah-bangunan">
                                    <div class="row">
                                        <div class="mb-1 col-md-12">
                                            <div class="repeater-default">
                                                <div data-repeater-list="invoice">
                                                    <div class="mb-2 col-md-6">
                                                        <label class="form-label" for="pinjaman">Tanah dan
                                                            Bangunan</label>
                                                    </div>
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="namabankp">Luas
                                                                        Tanah/Bangunan</label>
                                                                    <input type="number" class="form-control"
                                                                        id="itemquantity"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Luas Tanah/Bangunan" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemcost">Jenis
                                                                        Tanah/Bangunan</label>
                                                                    <select class="select2 w-100"
                                                                        name="jenis_tanah_bangunan"
                                                                        id="jenis_tanah_bangunan">
                                                                        <option label="jenis_tanah_bangunan">Pilih
                                                                            Tanah/Bangunan
                                                                        </option>
                                                                        <option>Tanah</option>
                                                                        <option>Rumah Tinggal</option>
                                                                        <option>Apartemen</option>
                                                                        <option>Rusun</option>
                                                                        <option>Ruko</option>
                                                                        <option>Rukan</option>
                                                                        <option>Kios</option>
                                                                        <option>Lainnya</option>

                                                                        {{-- if Lainnya is selected then create new option --}}

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity">Atas
                                                                        Nama</label>
                                                                    <input type="text" class="form-control"
                                                                        id="itemquantity"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Atas Nama" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity">Taksasi
                                                                        Harga
                                                                        Pasar</label>
                                                                    <input type="number" class="form-control"
                                                                        id="itemquantity"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Saldo" />
                                                                </div>
                                                            </div>


                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <button class="btn btn-icon btn-primary"
                                                                        type="button" data-repeater-create>
                                                                        <i data-feather="plus" class="me-25"></i>
                                                                        {{-- <span>Add New</span> --}}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <button
                                                                        class="btn btn-outline-danger text-nowrap px-1"
                                                                        data-repeater-delete type="button">
                                                                        <i data-feather="x" class="me-25"></i>
                                                                        {{-- <span>Delete</span> --}}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr />
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                <div class="col-12">
                                                    <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                        <i data-feather="plus" class="me-25"></i>
                                                        <span>Add New</span>
                                                    </button>
                                                </div>
                                            </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section id="form-repeater-kendaraan">
                                    <div class="row">
                                        <div class="mb-1 col-md-12">
                                            <div class="repeater-default">
                                                <div data-repeater-list="kendaraan">
                                                    <div class="mb-2 col-md-6">
                                                        <label class="form-label" for="pinjaman">Kendaraan</label>
                                                    </div>
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="namabankp">Jenis/Merk</label>
                                                                    <input type="number" class="form-control"
                                                                        id="itemquantity"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Jenis/Merk" />
                                                                </div>
                                                            </div>

                                                            <div class="mb-1 col-md-2">
                                                                <label class="form-label" for="tgllahir">Tahun
                                                                    Dikeluarkan</label>
                                                                <input type="number" class="form-control"
                                                                    id="itemquantity" aria-describedby="itemquantity"
                                                                    placeholder="Tahun Dikeluarkan" />
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity">Atas
                                                                        Nama</label>
                                                                    <input type="text" class="form-control"
                                                                        id="itemquantity"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Nama" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity">Taksasi
                                                                        Harga
                                                                        Jual</label>
                                                                    <input type="number" class="form-control"
                                                                        id="itemquantity"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Taksasi Harga Jual" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <button class="btn btn-icon btn-primary"
                                                                        type="button" data-repeater-create>
                                                                        <i data-feather="plus" class="me-25"></i>
                                                                        {{-- <span>Add New</span> --}}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <button
                                                                        class="btn btn-outline-danger text-nowrap px-1"
                                                                        data-repeater-delete type="button">
                                                                        <i data-feather="x" class="me-25"></i>
                                                                        {{-- <span>Delete</span> --}}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr />
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                <div class="col-12">
                                                    <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                        <i data-feather="plus" class="me-25"></i>
                                                        <span>Add New</span>
                                                    </button>
                                                </div>
                                            </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section id="form-repeater-saham">
                                    <div class="row">
                                        <div class="mb-1 col-md-12">
                                            <div class="repeater-default">
                                                <div data-repeater-list="saham">
                                                    <div class="mb-2 col-md-6">
                                                        <label class="form-label" for="pinjaman">Saham</label>
                                                    </div>
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="namabankp">Penerbit</label>
                                                                    <input type="number" class="form-control"
                                                                        id="itemquantity"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Penerbit" />
                                                                </div>
                                                            </div>

                                                            <div class="mb-1 col-md-3">
                                                                <label class="form-label" for="tgllahir">Rupiah per
                                                                    Tanggal</label>
                                                                <input type="number" class="form-control"
                                                                    id="itemquantity" aria-describedby="itemquantity"
                                                                    placeholder="Rupiah per Tanggal" />
                                                            </div>
                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <button class="btn btn-icon btn-primary"
                                                                        type="button" data-repeater-create>
                                                                        <i data-feather="plus" class="me-25"></i>
                                                                        {{-- <span>Add New</span> --}}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <button
                                                                        class="btn btn-outline-danger text-nowrap px-1"
                                                                        data-repeater-delete type="button">
                                                                        <i data-feather="x" class="me-25"></i>
                                                                        {{-- <span>Delete</span> --}}
                                                                    </button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <hr />
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                <div class="col-12">
                                                    <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                        <i data-feather="plus" class="me-25"></i>
                                                        <span>Add New</span>
                                                    </button>
                                                </div>
                                            </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section id="form-repeater-kekayaan-lainnya">
                                    <div class="row">
                                        <div class="mb-1 col-md-12">
                                            <div class="repeater-default">
                                                <div data-repeater-list="kekayaan-lainnya">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="namabankp">Lainnya</label>
                                                                    <input type="number" class="form-control"
                                                                        id="itemquantity"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Lainnya" />
                                                                </div>
                                                            </div>

                                                            <div class="mb-1 col-md-3">
                                                                <label class="form-label" for="tgllahir">Rupiah</label>
                                                                <input type="number" class="form-control"
                                                                    id="itemquantity" aria-describedby="itemquantity"
                                                                    placeholder="Rupiah" />
                                                            </div>
                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <button class="btn btn-icon btn-primary"
                                                                        type="button" data-repeater-create>
                                                                        <i data-feather="plus" class="me-25"></i>
                                                                        {{-- <span>Add New</span> --}}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <button
                                                                        class="btn btn-outline-danger text-nowrap px-1"
                                                                        data-repeater-delete type="button">
                                                                        <i data-feather="x" class="me-25"></i>
                                                                        {{-- <span>Delete</span> --}}
                                                                    </button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <hr />
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                <div class="col-12">
                                                    <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                        <i data-feather="plus" class="me-25"></i>
                                                        <span>Add New</span>
                                                    </button>
                                                </div>
                                            </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <!-- Pinjaman-->
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Pinjaman</h5>
                                    <small class="text-muted">Lengkapi Data Pinjaman</small>
                                </div>
                                <div class="row">
                                    <div class="mb-2 col-md-6">
                                        <label class="form-label" for="pinjaman">Pinjaman</label>
                                    </div>
                                </div>

                                <section id="form-repeater-pinjaman">
                                    <div class="row">
                                        <div class="mb-1 col-md-12">
                                            <div class="repeater-default">
                                                <div data-repeater-list="pinjaman">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-2 col-12">

                                                                <div class="mb-1">
                                                                    <label class="form-label" for="namabankp">Nama
                                                                        Bank</label>
                                                                    <input type="text" class="form-control"
                                                                        id="itemquantity"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Nama Bank" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">

                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemcost">Jenis
                                                                        Pinjaman</label>
                                                                    <select class="select2 w-100" name="jenis_pinjaman"
                                                                        id="jenis_pinjaman">
                                                                        <option label="jenis_pinjaman">Pilih Jenis
                                                                            Pinjaman
                                                                        </option>
                                                                        <option>Modal Kerja</option>
                                                                        <option>Investasi</option>
                                                                        <option>Konsumtif</option>

                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity">Sejak
                                                                        Tahun</label>
                                                                    <input type="number" class="form-control"
                                                                        id="itemquantity"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Tahun" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity">Saldo
                                                                        Per
                                                                        Tanggal</label>
                                                                    <input type="number" class="form-control"
                                                                        id="itemquantity"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Saldo" />
                                                                </div>
                                                            </div>


                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <button class="btn btn-icon btn-primary"
                                                                        type="button" data-repeater-create>
                                                                        <i data-feather="plus" class="me-25"></i>
                                                                        {{-- <span>Add New</span> --}}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <button
                                                                        class="btn btn-outline-danger text-nowrap px-1"
                                                                        data-repeater-delete type="button">
                                                                        <i data-feather="x" class="me-25"></i>
                                                                        {{-- <span>Delete</span> --}}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr />
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                <div class="col-12">
                                                    <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                        <i data-feather="plus" class="me-25"></i>
                                                        <span>Add New</span>
                                                    </button>
                                                </div>
                                            </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <!-- Kartu Kredit -->
                                <section id="form-repeater-kartu-kredit">
                                    <div class="row">
                                        <div class="mb-1 col-md-12">
                                            <div class="repeater-default">
                                                <div data-repeater-list="invoice">
                                                    <div class="mb-2 col-md-6">
                                                        <label class="form-label" for="pinjaman">Kartu Kredit</label>
                                                    </div>
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="namabankpk">Nama
                                                                        Bank</label>
                                                                    <input type="text" class="form-control"
                                                                        id="itemquantity"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Nama Bank" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity">Sejak
                                                                        Tahun</label>
                                                                    <input type="number" class="form-control"
                                                                        id="itemquantity"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Tahun" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity">Plafond
                                                                        (Rp.
                                                                        Juta)</label>
                                                                    <input type="number" class="form-control"
                                                                        id="itemquantity"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Plafond (Rp. Juta)" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <button class="btn btn-icon btn-primary"
                                                                        type="button" data-repeater-create>
                                                                        <i data-feather="plus" class="me-25"></i>
                                                                        {{-- <span>Add New</span> --}}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <button
                                                                        class="btn btn-outline-danger text-nowrap px-1"
                                                                        data-repeater-delete type="button">
                                                                        <i data-feather="x" class="me-25"></i>
                                                                        {{-- <span>Delete</span> --}}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr />
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                            <div class="col-12">
                                                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                    <i data-feather="plus" class="me-25"></i>
                                                    <span>Add New</span>
                                                </button>
                                            </div>
                                        </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section id="form-repeater-pinjaman-lainnya">
                                    <div class="row">
                                        <div class="mb-1 col-md-12">
                                            <div class="repeater-default">
                                                <div data-repeater-list="pinjaman-lainnya">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="namabankp">Lainnya</label>
                                                                    <input type="number" class="form-control"
                                                                        id="itemquantity"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Lainnya" />
                                                                </div>
                                                            </div>

                                                            <div class="mb-1 col-md-3">
                                                                <label class="form-label" for="tgllahir">Rupiah</label>
                                                                <input type="number" class="form-control"
                                                                    id="itemquantity" aria-describedby="itemquantity"
                                                                    placeholder="Rupiah" />
                                                            </div>
                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <button class="btn btn-icon btn-primary"
                                                                        type="button" data-repeater-create>
                                                                        <i data-feather="plus" class="me-25"></i>
                                                                        {{-- <span>Add New</span> --}}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <button
                                                                        class="btn btn-outline-danger text-nowrap px-1"
                                                                        data-repeater-delete type="button">
                                                                        <i data-feather="x" class="me-25"></i>
                                                                        {{-- <span>Delete</span> --}}
                                                                    </button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <hr />
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                <div class="col-12">
                                                    <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                        <i data-feather="plus" class="me-25"></i>
                                                        <span>Add New</span>
                                                    </button>
                                                </div>
                                            </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </section>



                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>

                            </div>

                            <!-- Form Persyaratan Kelengkapan -->
                            <div id="formInfo" class="content" role="tabpanel" aria-labelledby="info-trigger">
                                <div>
                                    <h4>Persyaratan Kelengkapan</h4>
                                    <hr />
                                    <h5>Kelengkapan hardcopy dokumen yang harus dilampirkan untuk mempercepat
                                        proses PPR
                                        Syariah:
                                    </h5>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="vertical-align: middle;">No.</th>
                                                <th style="vertical-align: middle;">
                                                    <center>Jenis Dokumen</center>
                                                </th>
                                                <th style="vertical-align: middle;">
                                                    <center>Pegawai</center>
                                                </th>
                                                <th style="vertical-align: middle;">
                                                    <center>Wiraswasta & Swasta Pemilik</center>
                                                </th>
                                                <th style="vertical-align: middle;">
                                                    <center>Profesi</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <center>1</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Foto Copy identitas (KTP) atas nama pemohon dan istri/suami
                                                    pemohon yang
                                                    masih berlaku
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <center>2</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Foto Copy Kartu Keluarga
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <center>3</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Foto Copy Surat Nikah (bagi pemohon yang telah menikah)
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <center>4</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Foto Copy Surat Cerai (bagi pemohon yang telah bercerai)
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <center>5</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Foto Copy SPT Tahunan
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <center>6</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Foto Copy NPWP a.n. Pemohon (bagi pemohon dengan nilai
                                                    permohonan Rp.
                                                    100
                                                    juta ke atas)
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <center>7</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Foto Copy SK Pegawai (pertama dan terakhir)
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center></center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <center>8</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Slip Gaji Terakhir
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center></center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <center>9</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Surat Rekomendasi dari Pimpinan Instansi/Perusahaan
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center></center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <center>10</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Foto Copy Rekening Koran Tabungan dan/ Giro a.n. pemohon
                                                    minimal
                                                    selama
                                                    3
                                                    (tiga) bulan terakhir
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <center>11</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Foto Copy Akta Perusahaan (Pendirian berikut perubahannya),
                                                    TDP,
                                                    SIUP,
                                                    SITU
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center></center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <center>12</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Foto Copy Laporan Keuangan (Neraca dan Laba Rugi) tahun
                                                    terakhir
                                                    dan
                                                    tahun
                                                    berjalan berikut lampirannya
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center></center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <center>13</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Foto Copy Rekening Giro a.n. Perusahaan minimal selama 6
                                                    (enam)
                                                    bulan
                                                    terakhir
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center></center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <center>14</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Foto Copy NPWP a.n. Perusahaan
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center></center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <center>15</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Foto Copy Izin - Izin Praktik Profesi
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center></center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center></center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <center>16</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Dokumen Kepemilikan Agunan (Foto Copy Sertifikat Tanah dan
                                                    IMB)
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <center>17</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Hasil Penilaian Agunan oleh Appraisal Independent (untuk
                                                    permohonan di
                                                    atas
                                                    Rp. 50 juta)
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center>✓</center>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-success btn-submit">Submit</button>
                                </div>
                            </div>

                            <br>
                            <hr>
                            <!-- Tabel -->


                        </form>
                    </div>
                </div>
            </section>
            <!-- /Modern Horizontal Wizard -->
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function changeStatus() {
            var status = document.getElementById("status");
            if (status.value == "M") {
                document.getElementById("ifMenikahHeader").style.visibility = "visible",
                    document.getElementById("ifMenikah").style.visibility = "visible",
                    document.getElementById("ifISMHeader").style.visibility = "visible",
                    document.getElementById("ifISM").style.visibility = "visible";
            } else {
                document.getElementById("ifMenikahHeader").style.visibility = "collapse",
                    document.getElementById("ifMenikah").style.visibility = "collapse",
                    document.getElementById("ifISMHeader").style.visibility = "collapse",
                    document.getElementById("ifISM").style.visibility = "collapse";

            }
        }

        function changeJenisAkad() {
            var jenis_akad_pembayaran = document.getElementById("jenis_akad_pembayaran");
            if (jenis_akad_pembayaran.value == "akad_lainnya") {
                document.getElementById("AkadLainnya").style.visibility = "visible";

            } else {
                document.getElementById("AkadLainnya").style.visibility = "collapse";


            }
        }

        // $(document).ready(function() {
        //     $('#status').on('change', function() {
        //         $("#" + $(this).val()).fadeIn(700);
        //     }).change();
        // });
    </script>
    <!-- END: Content-->
@endsection
