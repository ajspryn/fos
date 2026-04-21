@extends('form::layouts.main')

@section('content')
    <style>
        /* Validate style for Select2 class */
        .was-validated select.select2:invalid+.select2 .select2-selection {
            border-color: #dc3545 !important;
        }

        .was-validated select.select2:valid+.select2 .select2-selection {
            border-color: #28a745 !important;
        }

        /* Style Modal Loading */
        .modal-loading {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-loading-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 10px;
            border: 1px solid #888;
            width: 15%;
            position: relative;
        }

        /* Spinner Loading */
        .spinner-loading {
            border: 0.3rem solid #f3f3f3;
            border-top: 0.3rem solid #bd120d;
            border-radius: 50%;
            width: 1.5rem;
            height: 1.5rem;
            animation: spin 1s linear infinite;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Show and hide fields style */
        #ifTotalAngsuranBtbFasAktif {
            width: 100%;
            height: 63px;
            margin-bottom: 10px;
            transition: all 0.5s;
        }

        #ifTotalAngsuranBtbFasAktif.hide {
            margin-top: -15px;
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifMenikahNamaPasangan {
            width: 50%;
            height: 63px;
            margin-bottom: 10px;
            transition: all 0.5s;
        }

        #ifMenikahNamaPasangan.hide {
            margin-top: -15px;
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifMenikahKtpPasangan {
            width: 50%;
            height: 63px;
            margin-bottom: 10px;
            transition: all 0.5s;
        }

        #ifMenikahKtpPasangan.hide {
            margin-top: -15px;
            height: 0;
            opacity: 0;
            overflow: hidden;
        }
    </style>
    <!-- BEGIN: Content-->
    <div id="modalLoading" class="modal-loading">
        <div class="modal-loading-content">
            <div class="spinner-loading" style="margin-left:-12px;"></div>
            <center>
                <p>Sedang diproses, harap tunggu...</p>
                <br />
                <br />
            </center>
        </div>
    </div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="content-body">
            <!-- Form Pengajuan -->
            <section class="modern-horizontal-wizard">
                <div class="bs-stepper wizard-modern modern-wizard-example">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#form" role="tab" id="p3k-step-1">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="file-text" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Form P3K</span>
                                    <span class="bs-stepper-subtitle">Isi Data Pembiayaan</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <form method="POST" action="/form/p3k" id="formP3k" class="needs-validation"
                            enctype="multipart/form-data" novalidate>
                            @csrf
                            <div id="form" class="content" role="tabpanel" aria-labelledby="p3k-step-1">
                                <div class="content-header">
                                    <small class="text-danger">* Wajib Diisi</small>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Pengajuan Pembiayaan P3K</h5>
                                    <small>Isikan Pengajuan Pembiayaan.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="ao"><small class="text-danger">*
                                            </small>Nama
                                            AO</label>
                                        <select class="select2 w-100" name="user_id" id="ao"
                                            data-placeholder="Pilih AO" required>
                                            <option value=""></option>
                                            @foreach ($aos as $ao)
                                                <option value="{{ $ao->user->id }}">{{ $ao->user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="pengajuanFasAktifKe"><small class="text-danger">*
                                            </small>Pengajuan Fasilitas Aktif Ke-</label>
                                        <input type="number" name="pengajuan_fas_aktif_ke" class="form-control"
                                            placeholder="Masukkan Fasilitas Aktif Ke-" id="pengajuanFasAktifKe" required />
                                    </div>
                                    <div class="row hide" id="ifTotalAngsuranBtbFasAktif">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="totalAngsuranBtbFasAktif"><small
                                                    class="text-danger">*
                                                </small>Total Angsuran BTB Yang Aktif</label>
                                            <input type="text" name="total_angsuran_btb_fas_aktif"
                                                class="form-control numeral-mask"
                                                placeholder="Masukkan Total Angsuran BTB Yang Masih Aktif" value="0"
                                                id="totalAngsuranBtbFasAktif" />
                                        </div>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tanggal"><small class="text-danger">*
                                            </small>Tanggal Pengajuan</label>
                                        <input type="text" id="tanggal" class="form-control flatpickr-basic"
                                            name="tanggal_pengajuan" placeholder="DD-MM-YYYY" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jenispenggunaan"><small class="text-danger">*
                                            </small>Jenis Penggunaan</label>
                                        <select class="select2 w-100" name="jenis_penggunaan" id="jenispenggunaan"
                                            data-placeholder="Pilih Jenis Penggunaan" required>
                                            <option value=""></option>
                                            <option value="Modal Kerja">Modal Kerja</option>
                                            <option value="Renovasi Rumah">Renovasi Rumah</option>
                                            <option value="Pendidikan">Pendidikan</option>
                                            <option value="Kesehatan">Kesehatan</option>
                                            <option value="Pernikahan">Pernikahan</option>
                                            <option value="Pembelian Kendaraan Bermotor">Pembelian Kendaraan Bermotor
                                            </option>
                                            <option value="Ibadah Umroh">Ibadah Umroh</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nominalPembiayaan"><small class="text-danger">*
                                            </small>Nominal Pembiayaan</label>
                                        <input type="text" name="nominal_pembiayaan" class="form-control numeral-mask"
                                            placeholder="Rp." id="nominalPembiayaan" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tenor"><small class="text-danger">*
                                            </small>Tenor (Bulan)</label>
                                        <input type="number" name="tenor" class="form-control"
                                            placeholder="Masukkan Tenor (Bulan)" id="tenor" required />
                                        {{-- <select class="select2 w-100" name="tenor" id="tenor"
                                            data-placeholder="Pilih Tenor" required>
                                            <option value=""></option>
                                            <option value="12">12 Bulan</option>
                                            <option value="24">24 Bulan</option>
                                            <option value="36">36 Bulan</option>
                                            <option value="48">48 Bulan</option>
                                            <option value="60">60 Bulan</option>
                                            <option value="72">72 Bulan</option>
                                            <option value="84">84 Bulan</option>
                                            <option value="96">96 Bulan</option>
                                            <option value="108">108 Bulan</option>
                                            <option value="120">120 Bulan</option>
                                        </select> --}}
                                    </div>
                                </div>
                                <hr />
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Diri</h5>
                                    <small class="text-muted">Lengkapi Data Diri Sesuai Dengan KTP.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nama"><small class="text-danger">*
                                            </small>Nama Lengkap Nasabah</label>
                                        <input type="text" name="nama_nasabah" id="nama" class="form-control"
                                            oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                            placeholder="Nama Lengkap" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="noKtp"><small class="text-danger">* </small>No.
                                            KTP</label>
                                        <span id="falseNoKtp" class="text-danger"
                                            style="display: none; font-size:9px;">Isikan
                                            16
                                            digit!
                                        </span></label>
                                        <input type="text" class="form-control" pattern="^\d{16}$"
                                            oninput="this.value=this.value.replace(/[^0-9,]/g,'');" name="no_ktp"
                                            id="noKtp" aria-describedby="noKtp" placeholder="Masukkan Nomor KTP"
                                            required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tempatlahir"><small class="text-danger">*
                                            </small>Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                            placeholder="Masukkan Tempat Lahir"
                                            oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                            required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tgllahir"><small class="text-danger">*
                                            </small>Tanggal Lahir</label>
                                        <input type="date" id="tgl_lahir" class="form-control flatpickr-basic"
                                            name="tgl_lahir" placeholder="DD-MM-YYYY" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jenis_kelamin"><small class="text-danger">*
                                            </small>Jenis Kelamin</label>
                                        <div>
                                            &ensp;
                                            <input type="radio" name="jenis_kelamin" class="form-check-input"
                                                id="pria" value="Pria" required />
                                            <label class="form-label" for="pria">&nbsp;Pria</label>
                                            <br>
                                            &ensp;
                                            <input type="radio" name="jenis_kelamin" class="form-check-input"
                                                id="wanita" value="Wanita" required />
                                            <label class="form-label" for="wanita">&nbsp;Wanita</label>
                                        </div>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="agama"><small class="text-danger">*
                                            </small>Agama</label>
                                        <select class="select2 w-100" name="agama" id="agama"
                                            data-placeholder="Pilih Agama" required>
                                            <option value="">
                                            </option>
                                            <option value="Islam">Islam</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Katholik">Katholik</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Kong Hu Chu">Kong Hu Chu</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tinggiBadan"><small class="text-danger">*
                                            </small>Tinggi Badan (cm)</label>
                                        <input type="number" name="tinggi_badan" id="tinggiBadan" class="form-control"
                                            placeholder="Masukkan Tinggi Badan (cm)" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="beratBadan"><small class="text-danger">*
                                            </small>Berat Badan (kg)</label>
                                        <input type="number" name="berat_badan" id="beratBadan" class="form-control"
                                            placeholder="Masukkan Berat Badan (kg)" required />
                                    </div>
                                    <div>
                                        <div class="mb-1 col-md-12">
                                            <div data-repeater-list="formAlamatKtp">
                                                <div data-repeater-item>
                                                    <div class="row d-flex align-items-end">
                                                        <div class="col-md-4 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="alamatKtp"><small
                                                                        class="text-danger">*
                                                                    </small>Alamat Sesuai KTP</label>
                                                                <input type="text" class="form-control" name="alamat"
                                                                    id="alamatKtp" aria-describedby="alamatKtp"
                                                                    oninput="this.value=this.value.toUpperCase().replace(/[^A-Z0-9, ]/g,'');"
                                                                    placeholder="Alamat Sesuai KTP" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-1 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="rtKtp"><small
                                                                        class="text-danger">*
                                                                    </small>RT
                                                                    <span id="falseRtKtp" class="text-danger"
                                                                        style="display: none; font-size:9px;">Isikan 3
                                                                        digit!
                                                                    </span></label>
                                                                <input type="text" class="form-control"
                                                                    pattern="^\d{3}$"
                                                                    oninput="this.value=this.value.replace(/[^0-9,]/g,'');"
                                                                    name="rt" id="rtKtp"
                                                                    aria-describedby="rtKtp" placeholder="000" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-1 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="rwKtp"><small
                                                                        class="text-danger">*
                                                                    </small>RW
                                                                    <span id="falseRwKtp" class="text-danger"
                                                                        style="display: none; font-size:8px;">Isikan 3
                                                                        digit!
                                                                    </span></label>
                                                                <input type="text" class="form-control"
                                                                    pattern="^\d{3}$"
                                                                    oninput="this.value=this.value.replace(/[^0-9,]/g,'');"
                                                                    name="rw" id="rwKtp"
                                                                    aria-describedby="rwKtp" placeholder="000" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="kelurahanKtp"><small
                                                                        class="text-danger">*
                                                                    </small>Kelurahan</label>
                                                                <input type="text" class="form-control"
                                                                    name="desa_kelurahan" id="kelurahanKtp"
                                                                    aria-describedby="kelurahanKtp"
                                                                    oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                                                    placeholder="Kelurahan" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="kecamatanKtp"><small
                                                                        class="text-danger">*
                                                                    </small>Kecamatan</label>
                                                                <input type="text" class="form-control"
                                                                    name="kecamatan" id="kecamatanKtp"
                                                                    aria-describedby="kecamatanKtp"
                                                                    oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                                                    placeholder="Kecamatan" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="kabKotaKtp"><small
                                                                        class="text-danger">*
                                                                    </small>Kabupaten/Kota</label>
                                                                <input type="text" class="form-control" name="kabkota"
                                                                    id="kabKotaKtp" aria-describedby="kabKotaKtp"
                                                                    oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                                                    placeholder="Kabupaten/Kota" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="provinsiKtp"><small
                                                                        class="text-danger">*
                                                                    </small>Provinsi</label>
                                                                <input type="text" class="form-control"
                                                                    name="provinsi" id="provinsiKtp"
                                                                    aria-describedby="provinsiKtp"
                                                                    oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                                                    placeholder="Provinsi" required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-1 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="kdPosKtp"><small
                                                                        class="text-danger">*
                                                                    </small>Kode
                                                                    Pos</label>
                                                                <input type="number" class="form-control" name="kd_pos"
                                                                    id="kdPosKtp" aria-describedby="kdPosKtp"
                                                                    placeholder="16XXX" required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="mb-1 col-md-12">
                                                <div data-repeater-list="formAlamatDomisili">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-4 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="alamatDomisili"><small
                                                                            class="text-danger">*
                                                                        </small>Alamat Tempat Tinggal (Domisili)&emsp;<input
                                                                            type="checkbox" id="cbAutoFillDomisili"
                                                                            class="form-check-input"
                                                                            style="width:15px; height:15px;">&nbsp;
                                                                        Sama
                                                                        Dengan Alamat KTP</label>
                                                                    <input type="text" class="form-control"
                                                                        id="alamatDomisili" name="alamat_domisili"
                                                                        aria-describedby="alamatDomisili"
                                                                        placeholder="Alamat Tempat Tinggal (Domisili)"
                                                                        oninput="this.value=this.value.toUpperCase().replace(/[^A-Z0-9, ]/g,'');"
                                                                        required />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="rtDomisili"><small
                                                                            class="text-danger">*
                                                                        </small>RT
                                                                        <span id="falseRtDomisili" class="text-danger"
                                                                            style="display: none; font-size:9px;">Isikan
                                                                            3
                                                                            digit!
                                                                        </span></label>
                                                                    <input type="text" class="form-control"
                                                                        pattern="^\d{3}$"
                                                                        oninput="this.value=this.value.replace(/[^0-9,]/g,'');"
                                                                        name="rt_domisili" id="rtDomisili"
                                                                        aria-describedby="rtDomisili" placeholder="000"
                                                                        required />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="rwDomisili"><small
                                                                            class="text-danger">*
                                                                        </small>RW
                                                                        <span id="falseRwDomisili" class="text-danger"
                                                                            style="display: none; font-size:8px;">Isikan
                                                                            3
                                                                            digit!
                                                                        </span></label>
                                                                    <input type="text" class="form-control"
                                                                        pattern="^\d{3}$"
                                                                        oninput="this.value=this.value.replace(/[^0-9,]/g,'');"
                                                                        name="rw_domisili" id="rwDomisili"
                                                                        aria-describedby="rwDomisili" placeholder="000"
                                                                        required />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="kelurahanDomisili"><small
                                                                            class="text-danger">*
                                                                        </small>Kelurahan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="desa_kelurahan_domisili"
                                                                        id="kelurahanDomisili"
                                                                        aria-describedby="kelurahanDomisili"
                                                                        oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                                                        placeholder="Kelurahan" required />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="kecamatanDomisili"><small
                                                                            class="text-danger">*
                                                                        </small>Kecamatan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="kecamatan_domisili" id="kecamatanDomisili"
                                                                        aria-describedby="kecamatanDomisili"
                                                                        oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                                                        placeholder="Kecamatan" required />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="kabKotaDomisili"><small
                                                                            class="text-danger">*
                                                                        </small>Kabupaten/Kota</label>
                                                                    <input type="text" class="form-control"
                                                                        name="kabkota_domisili" id="kabKotaDomisili"
                                                                        aria-describedby="kabKotaDomisili"
                                                                        oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                                                        placeholder="Kabupaten/Kota" required />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="provinsiDomisili"><small
                                                                            class="text-danger">*
                                                                        </small>Provinsi</label>
                                                                    <input type="text" class="form-control"
                                                                        name="provinsi_domisili" id="provinsiDomisili"
                                                                        aria-describedby="provinsiDomisili"
                                                                        oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                                                        placeholder="Provinsi" required />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="kdPosDomisili"><small
                                                                            class="text-danger">*
                                                                        </small>Kode
                                                                        Pos</label>
                                                                    <input type="number" class="form-control"
                                                                        name="kd_pos_domisili" id="kdPosDomisili"
                                                                        aria-describedby="kdPosDomisili"
                                                                        placeholder="16XXX" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="status"><small class="text-danger">*
                                            </small>Status</label>
                                        <select class="select2 w-100" name="status_pernikahan" id="statusPernikahan"
                                            onChange="changeStatusPernikahan()" data-placeholder="Pilih Status Pernikahan"
                                            required>
                                            <option value=""></option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Janda/Duda - Meninggal">Janda/Duda - Meninggal</option>
                                            <option value="Janda/Duda - Cerai">Janda/Duda - Cerai</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jmlTanggungan"><small class="text-danger">*
                                            </small>Jumlah Anak/Tanggungan</label>
                                        <input type="number" name="jml_tanggungan" id="jmlTanggungan"
                                            class="form-control" placeholder="Jumlah Anak/Tanggungan" required />
                                    </div>
                                    <div class="mb-1 col-md-6 hide" id="ifMenikahNamaPasangan">
                                        <label class="form-label" for="namaPasangan">Nama Lengkap Pasangan</label>
                                        <input type="text" name="nama_pasangan_nasabah" id="namaPasangan"
                                            class="form-control" placeholder="Nama Lengkap Pasangan"
                                            oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');" />
                                    </div>
                                    <div class="mb-1 col-md-6 hide" id="ifMenikahKtpPasangan">
                                        <label class="form-label" for="noKtpPasangan">No
                                            KTP Pasangan</label>
                                        <input type="number" name="no_ktp_pasangan" id="noKtpPasangan"
                                            class="form-control" placeholder="Masukkan Nomor KTP pasangan" />
                                    </div>
                                    {{-- <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nonpwp"><small class="text-danger">*
                                            </small>No. NPWP</label>
                                        <input type="number" name="no_npwp" id="nonpwp" class="form-control"
                                            placeholder="Masukkan Nomor NPWP Anda" required />
                                    </div> --}}
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="noTelp">No.
                                            Telepon</label>
                                        <input type="text" name="no_telp" id="noTelp"
                                            class="form-control prefix-mask" placeholder="Masukkan Nomor Telepon" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="noHp"><small class="text-danger">*
                                            </small>No. Handphone</label>
                                        <input type="text" name="no_hp" id="noHp"
                                            class="form-control prefix-mask1" placeholder="Masukkan Nomor Handphone"
                                            required />
                                    </div>
                                </div>

                                <hr />
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Lampiran</h5>
                                    <small class="text-muted">Upload Lampiran Yang Sesuai.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotoPemohonTerbaru"><small class="text-danger">*
                                            </small>Upload Foto Pemohon Terbaru</label>
                                        <input type="file" name="foto[1][foto]" id="fotoPemohonTerbaru"
                                            class="form-control file-input" required />
                                        <span id="fileSizeWarning" class="text-danger" style="display:none";>File
                                            melebihi 2MB!</span>
                                        <input type="hidden" name="foto[1][kategori]" value="Foto Pemohon Terbaru"
                                            class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotoktp"><small class="text-danger">*
                                            </small>Upload Foto KTP</label>
                                        <input type="file" name="foto[2][foto]" id="fotoktp" class="form-control"
                                            required />
                                        <input type="hidden" name="foto[2][kategori]" value="Foto KTP"
                                            class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotoKtpPasanganPemohon"><small
                                                class="text-danger">
                                            </small>Upload Foto KTP Pasangan</label>
                                        <input type="file" name="foto[6][foto]" id="fotoKtpPasanganPemohon"
                                            class="form-control" />
                                        <input type="hidden" name="foto[6][kategori]" id="kategoriKtpPasanganPemohon"
                                            value="Foto KTP Pasangan" class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotokk"><small class="text-danger">*
                                            </small>Upload Foto Kartu Keluarga</label>
                                        <input type="file" name="foto[3][foto]" id="fotokk" class="form-control"
                                            required />
                                        <input type="hidden" name="foto[3][kategori]" value="Foto Kartu Keluarga"
                                            class="form-control" />
                                    </div>

                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotoAktaNikahCerai"><small class="text-danger">
                                            </small>Upload Akta Nikah/Cerai</label>
                                        <input type="file" name="foto[5][foto]" id="fotoAktaNikahCerai"
                                            class="form-control" />
                                        <input type="hidden" name="foto[5][kategori]" id="kategoriAktaNikahCerai"
                                            value="Akta Status Pernikahan/Perceraian" class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotoNpwp"><small class="text-danger">*
                                            </small>Upload Foto NPWP</label>
                                        <input type="file" name="foto[4][foto]" id="fotoNpwp" class="form-control"
                                            required />
                                        <input type="hidden" name="foto[4][kategori]" value="Foto NPWP"
                                            class="form-control" />
                                    </div>
                                </div>

                                <hr />
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Orang Terdekat</h5>
                                    <small class="text-muted">Lengkapi Data Orang Terdekat Tidak Serumah.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="namaOt"><small class="text-danger">*
                                            </small>Nama</label>
                                        <input type="text" name="nama_orang_terdekat" id="namaOt"
                                            oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                            class="form-control" placeholder="Masukkan Nama Orang Terdekat" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="notelpot"><small class="text-danger">* </small>No.
                                            Telepon</label>
                                        <input type="text" name="no_telp_orang_terdekat" id="notelpot"
                                            class="form-control prefix-mask2"
                                            placeholder="Masukkan Nomor Telepon Orang Terdekat" required />
                                    </div>
                                    <div class="mb-1 col-md-12">
                                        <div data-repeater-list="form_pribadi_keluarga_terdekat">
                                            <div data-repeater-item>
                                                <div class="row d-flex align-items-end">
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="alamatOt"><small
                                                                    class="text-danger">*
                                                                </small>Alamat Tempat Tinggal</label>
                                                            <input type="text" class="form-control"
                                                                name="alamat_orang_terdekat" id="alamatOt"
                                                                aria-describedby="alamatOt"
                                                                oninput="this.value=this.value.toUpperCase().replace(/[^A-Z0-9, ]/g,'');"
                                                                placeholder="Alamat" required />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-1 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="rtOt"><small
                                                                    class="text-danger">*
                                                                </small>RT
                                                                <span id="falseRtOt" class="text-danger"
                                                                    style="display: none; font-size:9px;">Isikan 3
                                                                    digit!
                                                                </span></label>
                                                            <input type="text" class="form-control" pattern="^\d{3}$"
                                                                oninput="this.value=this.value.replace(/[^0-9,]/g,'');"
                                                                name="rt_orang_terdekat" id="rtOt"
                                                                aria-describedby="rtOt" placeholder="000" required />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-1 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="rwOt"><small
                                                                    class="text-danger">*
                                                                </small>RW
                                                                <span id="falseRwOt" class="text-danger"
                                                                    style="display: none; font-size:8px;">Isikan 3
                                                                    digit!
                                                                </span></label>
                                                            <input type="text" class="form-control" pattern="^\d{3}$"
                                                                oninput="this.value=this.value.replace(/[^0-9,]/g,'');"
                                                                name="rw_orang_terdekat" id="rwOt"
                                                                aria-describedby="rwOt" placeholder="000" required />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="alamatOtKelurahan"><small
                                                                    class="text-danger">*
                                                                </small>Kelurahan</label>
                                                            <input type="text" class="form-control"
                                                                name="desa_kelurahan_orang_terdekat"
                                                                id="alamatOtKelurahan"
                                                                aria-describedby="alamatOtKelurahan"
                                                                oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                                                placeholder="Kelurahan" required />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="alamatOtKecamatan"><small
                                                                    class="text-danger">*
                                                                </small>Kecamatan</label>
                                                            <input type="text" class="form-control"
                                                                name="kecamatan_orang_terdekat" id="alamatOtKecamatan"
                                                                aria-describedby="alamatOtKecamatan"
                                                                oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                                                placeholder="Kecamatan" required />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="alamatOtKabKota"><small
                                                                    class="text-danger">*
                                                                </small>Kabupaten/Kota</label>
                                                            <input type="text" class="form-control"
                                                                name="kabkota_orang_terdekat" id="alamatOtKabKota"
                                                                aria-describedby="alamatOtKabKota"
                                                                oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                                                placeholder="Kabupaten/Kota" required />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="alamatOtProvinsi"><small
                                                                    class="text-danger">*
                                                                </small>Provinsi</label>
                                                            <input type="text" class="form-control"
                                                                name="provinsi_orang_terdekat" id="alamatOtProvinsi"
                                                                aria-describedby="alamatOtProvinsi"
                                                                oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                                                placeholder="Provinsi" required />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-1 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="alamatOtKdPos"><small
                                                                    class="text-danger">*
                                                                </small>Kode
                                                                Pos</label>
                                                            <input type="number" class="form-control"
                                                                name="kd_pos_orang_terdekat" id="alamatOtKdPos"
                                                                aria-describedby="alamatOtKdPos" placeholder="16XXX"
                                                                required />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr />
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Pekerjaan</h5>
                                    <small class="text-muted">Lengkapi Data Pekerjaan.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="dinas"><small class="text-danger">*
                                            </small>Dinas</label>
                                        <input type="text" name="dinas" id="dinas" class="form-control"
                                            placeholder="Masukkan Nama Dinas (PPPK DINKES/DISDIK/Teknis)" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="namaUnitKerja"><small class="text-danger">*
                                            </small>Nama Unit Kerja</label>
                                        <input type="text" name="nama_unit_kerja" id="namaUnitKerja"
                                            class="form-control" placeholder="Masukkan Nama Unit Kerja"
                                            oninput="this.value=this.value.toUpperCase().replace(/[^A-Z0-9, ]/g,'');"
                                            required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jabatan"><small class="text-danger">*
                                            </small>Jabatan</label>
                                        <input type="text" name="jabatan" id="jabatan" class="form-control"
                                            placeholder="Masukkan Jabatan"
                                            oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                            required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="dokumenSk"><small class="text-danger">*
                                            </small>Upload Softcopy SK Pengangkatan / SK Terakhir</label>
                                        <input type="file" name="dokumen_sk" id="dokumenSk" class="form-control"
                                            required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="noSk"><small class="text-danger">*
                                            </small>No. SK</label>
                                        <input type="text" name="no_sk" id="noSk" class="form-control"
                                            placeholder="Masukkan Nomor SK" required />
                                    </div>
                                </div>

                                <hr />
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Pendapatan</h5>
                                    <small>Isikan Data Pendapatan</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="gajiPokok"><small class="text-danger">*
                                            </small>Gaji Pokok (Per Bulan)</label>
                                        <input type="text" name="gaji_pokok" class="form-control numeral-mask"
                                            placeholder="Rp." id="gajiPokok" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="gajiTpp"><small class="text-danger">*
                                            </small>Pendapatan TPP (Per Bulan)</label>
                                        <input type="text" name="gaji_tpp" class="form-control numeral-mask"
                                            placeholder="Rp." id="gajiTpp" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="gajiPasangan"><small class="text-danger">*
                                            </small>Pendapatan Pasangan (Per Bulan)</label>
                                        <input type="text" name="gaji_pasangan" class="form-control numeral-mask"
                                            placeholder="Rp." id="gajiPasangan" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="dokumenKeuangan"><small class="text-danger">*
                                            </small>Upload Lampiran Keuangan Terbaru</label>
                                        <input type="file" name="dokumen_keuangan" id="dokumenKeuangan"
                                            class="form-control" required />
                                    </div>
                                </div>

                                <hr />
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Pengeluaran</h5>
                                    <small>Isikan Data Pengeluaran</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="pengeluaranLainnya">Pengeluaran Lainnya (Per
                                            Bulan)</label>
                                        <input type="text" name="pengeluaran_lainnya"
                                            class="form-control numeral-mask" placeholder="Masukkan Pengeluaran Lainnya"
                                            id="pengeluaranLainnya" value="0" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="keteranganPengeluaranLainnya">Keterangan
                                            Pengeluaran Lainnya
                                            (Per
                                            Bulan)</label>
                                        <input type="text" name="keterangan_pengeluaran_lainnya" class="form-control"
                                            id="keteranganPengeluaranLainnya"
                                            oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                            placeholder="Isikan Keterangan Pengeluaran Lainnya" />
                                    </div>
                                </div>
                                <br />
                                <br />
                                <div class="d-flex justify-content-center">
                                    <button type="submit" id="btnSubmitForm" class="btn btn-success">Submit</button>
                                </div>
                                <br />
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!-- /Form Pengajuan -->
        </div>
        <!-- END: Content-->
    </div>
    <!-- END: Content-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        //Form Validation (Bootstrap)
        var bootstrapForm = $('.needs-validation');

        const modalLoading = document.getElementById('modalLoading'); //Modal Loading
        Array.prototype.filter.call(bootstrapForm, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    form.classList.add('invalid');
                    // form.bootstrapValidator('defaultSubmit');

                } else {
                    form.classList.add('was-validated');
                    modalLoading.style.display = 'block'; //Show modal ketika proses submit
                    form.bootstrapValidator('defaultSubmit');

                }
                form.classList.add('was-validated');
                event.preventDefault();
            });
        });

        //Hide modal setelah loading selesai
        window.addEventListener('load', () => {
            modalLoading.style.display = 'none';
        })

        const fileInputs = document.querySelectorAll('.file-input');

        fileInputs.forEach(input => {
            input.addEventListener('change', function() {
                const warningMessage = this.nextElementSibling;
                const file = this.files[0];

                if (file && file.size > 2 * 1024 * 1024) {
                    warningMessage.style.display = 'block';
                } else {
                    warningMessage.style.display = 'none';
                }
            });
        });

        function changeStatusPernikahan() {
            var status = document.getElementById("statusPernikahan");
            if (status.value == "Belum Menikah") { //Belum Menikah
                document.getElementById("ifMenikahNamaPasangan").classList = "hide",
                    document.getElementById("ifMenikahKtpPasangan").classList = "hide",
                    document.getElementById("namaPasangan").setAttribute("disabled", "disabled"),
                    document.getElementById("namaPasangan").removeAttribute("required"),
                    document.getElementById("noKtpPasangan").setAttribute("disabled", "disabled"),
                    document.getElementById("noKtpPasangan").removeAttribute("required"),
                    document.getElementById("fotoKtpPasanganPemohon").setAttribute("disabled", "disabled"),
                    document.getElementById("fotoKtpPasanganPemohon").removeAttribute("required"),
                    document.getElementById("kategoriKtpPasanganPemohon").setAttribute("disabled", "disabled"),
                    document.getElementById("fotoAktaNikahCerai").setAttribute("disabled", "disabled"),
                    document.getElementById("fotoAktaNikahCerai").removeAttribute("required"),
                    document.getElementById("kategoriAktaNikahCerai").setAttribute("disabled", "disabled"),
                    document.getElementById("gajiPasangan").setAttribute("disabled", "disabled"),
                    document.getElementById("gajiPasangan").removeAttribute("required");
            } else if (status.value == "Menikah") { //Sudah Menikah
                document.getElementById("ifMenikahNamaPasangan").classList.toggle("hide"),
                    document.getElementById("ifMenikahKtpPasangan").classList.toggle("hide"),
                    document.getElementById("namaPasangan").setAttribute("required", "required"),
                    document.getElementById("namaPasangan").removeAttribute("disabled"),
                    document.getElementById("noKtpPasangan").setAttribute("required", "required"),
                    document.getElementById("noKtpPasangan").removeAttribute("disabled"),
                    document.getElementById("fotoKtpPasanganPemohon").setAttribute("required", "required"),
                    document.getElementById("fotoKtpPasanganPemohon").removeAttribute("disabled"),
                    document.getElementById("kategoriKtpPasanganPemohon").removeAttribute("disabled"),
                    document.getElementById("fotoAktaNikahCerai").setAttribute("required", "required"),
                    document.getElementById("fotoAktaNikahCerai").removeAttribute("disabled"),
                    document.getElementById("kategoriAktaNikahCerai").removeAttribute("disabled"),
                    document.getElementById("gajiPasangan").setAttribute("required", "required"),
                    document.getElementById("gajiPasangan").removeAttribute("disabled");
            } else { //Cerai
                document.getElementById("ifMenikahNamaPasangan").classList = "hide",
                    document.getElementById("ifMenikahKtpPasangan").classList = "hide",
                    document.getElementById("namaPasangan").setAttribute("disabled", "disabled"),
                    document.getElementById("namaPasangan").removeAttribute("required"),
                    document.getElementById("noKtpPasangan").setAttribute("disabled", "disabled"),
                    document.getElementById("noKtpPasangan").removeAttribute("required"),
                    document.getElementById("fotoKtpPasanganPemohon").setAttribute("disabled", "disabled"),
                    document.getElementById("fotoKtpPasanganPemohon").removeAttribute("required"),
                    document.getElementById("kategoriKtpPasanganPemohon").setAttribute("disabled", "disabled"),
                    document.getElementById("fotoAktaNikahCerai").setAttribute("required", "required"),
                    document.getElementById("fotoAktaNikahCerai").removeAttribute("disabled"),
                    document.getElementById("kategoriAktaNikahCerai").removeAttribute("disabled"),
                    document.getElementById("gajiPasangan").setAttribute("disabled", "disabled"),
                    document.getElementById("gajiPasangan").removeAttribute("required");
            }
        }

        //Validasi No KTP
        var noKtp = document.getElementById("noKtp");
        var falseNoKtp = document.getElementById("falseNoKtp");

        noKtp.addEventListener("input", function() {
            if (noKtp.validity.patternMismatch) {
                falseNoKtp.style.display = "inline";
            } else {
                falseNoKtp.style.display = "none";
            }
        });

        //Validasi RT KTP
        var rtKtp = document.getElementById("rtKtp");
        var falseRtKtp = document.getElementById("falseRtKtp");

        rtKtp.addEventListener("input", function() {
            if (rtKtp.validity.patternMismatch) {
                falseRtKtp.style.display = "inline";
            } else {
                falseRtKtp.style.display = "none";
            }
        });

        //Validasi RW KTP
        var rwKtp = document.getElementById("rwKtp");
        var falseRwKtp = document.getElementById("falseRwKtp");

        rwKtp.addEventListener("input", function() {
            if (rwKtp.validity.patternMismatch) {
                falseRwKtp.style.display = "inline";
            } else {
                falseRwKtp.style.display = "none";
            }
        });

        //Validasi RT Domisili
        var rtDomisili = document.getElementById("rtDomisili");
        var falseRtDomisili = document.getElementById("falseRtDomisili");

        rtDomisili.addEventListener("input", function() {
            if (rtDomisili.validity.patternMismatch) {
                falseRtDomisili.style.display = "inline";
            } else {
                falseRtDomisili.style.display = "none";
            }
        });

        //Validasi RW Domisili
        var rwDomisili = document.getElementById("rwDomisili");
        var falseRwDomisili = document.getElementById("falseRwDomisili");

        rwDomisili.addEventListener("input", function() {
            if (rwDomisili.validity.patternMismatch) {
                falseRwDomisili.style.display = "inline";
            } else {
                falseRwDomisili.style.display = "none";
            }
        });

        //Validasi RT OT
        var rtOt = document.getElementById("rtOt");
        var falseRtOt = document.getElementById("falseRtOt");

        rtOt.addEventListener("input", function() {
            if (rtOt.validity.patternMismatch) {
                falseRtOt.style.display = "inline";
            } else {
                falseRtOt.style.display = "none";
            }
        });

        //Validasi RW OT
        var rwOt = document.getElementById("rwOt");
        var falseRwOt = document.getElementById("falseRwOt");

        rwOt.addEventListener("input", function() {
            if (rwOt.validity.patternMismatch) {
                falseRwOt.style.display = "inline";
            } else {
                falseRwOt.style.display = "none";
            }
        });


        //Pengajuan Fasilits Aktif > 1
        var fasAktifKe = document.getElementById("pengajuanFasAktifKe");
        var totalAngsuranBtbFasAktif = document.getElementById("totalAngsuranBtbFasAktif");
        var ifTotalAngsuranBtbFasAktif = document.getElementById("ifTotalAngsuranBtbFasAktif");

        fasAktifKe.addEventListener("input", function() {
            if (fasAktifKe.value >= 2) {
                ifTotalAngsuranBtbFasAktif.classList.toggle("hide"),
                    totalAngsuranBtbFasAktif.setAttribute("required", "required");
            } else {
                ifTotalAngsuranBtbFasAktif.classList = "hide",
                    totalAngsuranBtbFasAktif.removeAttribute("required");
            }
        });

        //Autofill Domisili
        $(document).ready(function() {
            $("#cbAutoFillDomisili").change(function() {
                var alamatKtp = $("#alamatKtp").val();
                var alamatDomisili = $("#alamatDomisili").val();
                var rtKtp = $("#rtKtp").val();
                var rwKtp = $("#rwKtp").val();
                var kelurahanKtp = $("#kelurahanKtp").val();
                var kecamatanKtp = $("#kecamatanKtp").val();
                var kabKotaKtp = $("#kabKotaKtp").val();
                var provinsiKtp = $("#provinsiKtp").val();
                var kdPosKtp = $("#kdPosKtp").val();

                if ($(this).is(":checked")) {
                    $("#alamatDomisili").val(alamatKtp);
                    $("#rtDomisili").val(rtKtp);
                    $("#rwDomisili").val(rwKtp);
                    $("#kelurahanDomisili").val(kelurahanKtp);
                    $("#kecamatanDomisili").val(kecamatanKtp);
                    $("#kabKotaDomisili").val(kabKotaKtp);
                    $("#provinsiDomisili").val(provinsiKtp);
                    $("#kdPosDomisili").val(kdPosKtp);
                    $("#alamatDomisili").attr("readonly", true);
                    $("#rtDomisili").attr("readonly", true);
                    $("#rwDomisili").attr("readonly", true);
                    $("#kelurahanDomisili").attr("readonly", true);
                    $("#kecamatanDomisili").attr("readonly", true);
                    $("#kabKotaDomisili").attr("readonly", true);
                    $("#provinsiDomisili").attr("readonly", true);
                    $("#kdPosDomisili").attr("readonly", true);
                } else {
                    $("#alamatDomisili").val("");
                    $("#rtDomisili").val("");
                    $("#rwDomisili").val("");
                    $("#kelurahanDomisili").val("");
                    $("#kecamatanDomisili").val("");
                    $("#kabKotaDomisili").val("");
                    $("#provinsiDomisili").val("");
                    $("#kdPosDomisili").val("");

                    $("#alamatDomisili").attr("readonly", false);
                    $("#rtDomisili").attr("readonly", false);
                    $("#rwDomisili").attr("readonly", false);
                    $("#kelurahanDomisili").attr("readonly", false);
                    $("#kecamatanDomisili").attr("readonly", false);
                    $("#kabKotaDomisili").attr("readonly", false);
                    $("#provinsiDomisili").attr("readonly", false);
                    $("#kdPosDomisili").attr("readonly", false);
                }
            });
        });

        // const fileInputs = document.querySelectorAll('.file-input');

        // fileInputs.forEach(input => {
        //     input.addEventListener('change', function() {
        //         const warningMessage = this.nextElementSibling;
        //         const file = this.files[0];

        //         if (file && file.size > 2 * 1024 * 1024) {
        //             warningMessage.style.display = 'block';
        //         } else {
        //             warningMessage.style.display = 'none';
        //         }
        //     });
        // });
    </script>
@endsection
