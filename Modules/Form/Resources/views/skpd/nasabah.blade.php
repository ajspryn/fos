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
            <!-- Modern Horizontal Wizard -->
            <section class="modern-horizontal-wizard">
                <div class="bs-stepper wizard-modern modern-wizard-example">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#form" role="tab" id="account-details-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="file-text" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Form Pembiayaan</span>
                                    <span class="bs-stepper-subtitle">Isi Data Pembiayaan</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#form1" role="tab" id="account-details-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="user" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Form Data Diri</span>
                                    <span class="bs-stepper-subtitle">Isi Data Diri Dan Pekerjaan</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#formupload" role="tab" id="account-details-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="image" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Lampiran Data Diri</span>
                                    <span class="bs-stepper-subtitle">Upload Lampiran data Diri</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#formorangterdekat" role="tab"
                            id="account-details-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="users" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Data Orang Terdekat</span>
                                    <span class="bs-stepper-subtitle">Masukan data Orang terdekat tidak serumah</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#formpekerjaan" role="tab" id="account-details-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="briefcase" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Data Pekerjaan</span>
                                    <span class="bs-stepper-subtitle">Masukan data pekerjaan</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#formjaminan" role="tab" id="account-details-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="clipboard" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Data Jaminan</span>
                                    <span class="bs-stepper-subtitle">Masukan data Jaminan</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#form2" role="tab" id="personal-info-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="bar-chart" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Data Pemasukan</span>
                                    <span class="bs-stepper-subtitle">Isi Data Pemasukan</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#formpengeluaran" role="tab"
                            id="personal-info-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="bar-chart-2" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Data Pengeluaran</span>
                                    <span class="bs-stepper-subtitle">Isi Data pengeluaran</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <form method="POST" action="/form/skpd/{{ $pembiayaan->id }}" id="formSkpd"
                            class="needs-validation" enctype="multipart/form-data" novalidate>
                            @method('PUT')
                            @csrf
                            <div id="form" class="content" role="tabpanel"
                                aria-labelledby="account-details-trigger">
                                <div class="content-header">
                                    {{-- <h5 class="mb-0">Account Details</h5> --}}
                                    <small class="text-danger">* Wajib Diisi</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-12">
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
                                        <label class="form-label" for="tanggal"><small class="text-danger">*
                                            </small>Tanggal Pengajuan</label>
                                        <input type="text" id="tanggal" class="form-control flatpickr-basic"
                                            name="tanggal_pengajuan" placeholder="DD-MM-YYYY" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jenispenggunaan"><small class="text-danger">*
                                            </small>Jenis Penggunaan</label>
                                        <select class="select2 w-100" name="skpd_jenis_penggunaan_id"
                                            id="jenispenggunaan" data-placeholder="Pilih Jenis Penggunaan" required>
                                            <option value=""></option>
                                            @foreach ($penggunaans as $penggunaan)
                                                <option value="{{ $penggunaan->id }}">{{ $penggunaan->jenis_penggunaan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="mb-1 col-md-6">
                                        <label class="form-label" for="sektor"><small class="text-danger">*
                                            </small>Sektor
                                            Ekonomi</label>
                                        <select class="select2 w-100" name="skpd_sektor_ekonomi_id" id="sektor"
                                            disabled>
                                            <option label="sektor"></option>
                                            @foreach ($sektors as $sektor)
                                                <option value="{{ $sektor->id }}">{{ $sektor->nama_sektor_ekonomi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="akad"><small class="text-danger">*
                                            </small>Akad</label>
                                        <select class="select2 w-100" name="skpd_akad_id" id="akad" disabled>
                                            <option label="akad"></option>
                                            @foreach ($akads as $akad)
                                                <option value="{{ $akad->id }}">{{ $akad->nama_akad }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nominal_pembiayaan"><small class="text-danger">*
                                            </small>Nominal Pembiayaan</label>
                                        <input type="text" name="nominal_pembiayaan" class="form-control numeral-mask"
                                            placeholder="Rp." id="nominal_pembiayaan" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tenor"><small class="text-danger">*
                                            </small>Tenor</label>
                                        <select class="select2 w-100" name="tenor" id="tenor"
                                            data-placeholder="Pilih Tenor" required>
                                            <option value=""></option>
                                            <option value="3">3 Bulan</option>
                                            <option value="4">4 Bulan</option>
                                            <option value="5">5 Bulan</option>
                                            <option value="6">6 Bulan</option>
                                            <option value="7">7 Bulan</option>
                                            <option value="8">8 Bulan</option>
                                            <option value="9">9 Bulan</option>
                                            <option value="10">10 Bulan</option>
                                            <option value="11">11 Bulan</option>
                                            <option value="12">12 Bulan</option>
                                            <option value="18">18 Bulan</option>
                                            <option value="24">24 Bulan</option>
                                            <option value="36">36 Bulan</option>
                                            <option value="48">48 Bulan</option>
                                            <option value="60">60 Bulan</option>
                                        </select>
                                    </div>
                                    {{-- <div class="mb-1 col-md-2">
                                        <label class="form-label" for="rate"><small class="text-danger">*
                                            </small>Rate</label>
                                        <input type="text" name="rate" class="form-control numeral-mask"
                                            placeholder="%" id="rate" disabled />
                                    </div> --}}
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button type="button" class="btn btn-outline-secondary btn-prev" disabled>
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="form1" class="content" role="tabpanel"
                                aria-labelledby="account-details-trigger">
                                <div class="content-header">
                                    {{-- <h5 class="mb-0">Account Details</h5> --}}
                                    <small class="text-danger">* Wajib Diisi</small>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Diri</h5>
                                    <small class="text-muted">Lengkapi Data Diri Sesuai Dengan KTP.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nama"><small class="text-danger">*
                                            </small>Nama Lengkap Nasabah</label>
                                        <input type="text" name="nama_nasabah" id="nama" class="form-control"
                                            placeholder="Nama Lengkap" value="{{ $pembiayaan->nasabah->nama_nasabah }}"
                                            required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="noktp"><small class="text-danger">* </small>No
                                            KTP</label>
                                        <input type="number" name="no_ktp" id="noktp" class="form-control"
                                            placeholder="Masukan Nomor KTP Anda"
                                            value="{{ $pembiayaan->nasabah->no_ktp }}" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nama_pasangan_nasabah">Nama Lengkap Pasangan
                                            Nasabah</label>
                                        <input type="text" name="nama_pasangan_nasabah" id="nama_pasangan_nasabah"
                                            class="form-control" placeholder="Nama Lengkap Pasangan Anda"
                                            value="{{ $pembiayaan->nasabah->nama_pasangan_nasabah ?? '' }}" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="no_ktp_pasangan">No
                                            KTP Pasangan</label>
                                        <input type="number" name="no_ktp_pasangan" id="no_ktp_pasangan"
                                            class="form-control" placeholder="Masukan Nomor KTP pasangan Anda"
                                            value="{{ $pembiayaan->nasabah->no_ktp_pasangan ?? '' }}" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tempatlahir"><small class="text-danger">*
                                            </small>Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                            placeholder="Maukan Tempat Lahir Anda"
                                            value="{{ $pembiayaan->nasabah->tempat_lahir }}" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tgllahir"><small class="text-danger">*
                                            </small>Tanggal Lahir</label>
                                        <input type="date" id="tgl_lahir" class="form-control flatpickr-basic"
                                            name="tgl_lahir" placeholder="DD-MM-YYYY"
                                            value="{{ $pembiayaan->nasabah->tgl_lahir }}" required />
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
                                                                    placeholder="Alamat Sesuai KTP"
                                                                    value="{{ $pembiayaan->nasabah->alamat }}" required />
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
                                                                    aria-describedby="rtKtp" placeholder="000"
                                                                    value="{{ $pembiayaan->nasabah->rt }}" required />
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
                                                                    aria-describedby="rwKtp" placeholder="000"
                                                                    value="{{ $pembiayaan->nasabah->rw }}" required />
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
                                                                    placeholder="Kelurahan"
                                                                    value="{{ $pembiayaan->nasabah->desa_kelurahan }}"
                                                                    required />
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
                                                                    placeholder="Kecamatan"
                                                                    value="{{ $pembiayaan->nasabah->kecamatan }}"
                                                                    required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="kabKotaKtp"><small
                                                                        class="text-danger">*
                                                                    </small>Kabupaten/Kota</label>
                                                                <input type="text" class="form-control" name="kabkota"
                                                                    id="kabKotaKtp" aria-describedby="kabKotaKtp"
                                                                    placeholder="Kabupaten/Kota"
                                                                    value="{{ $pembiayaan->nasabah->kabkota }}"
                                                                    required />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="provinsiKtp"><small
                                                                        class="text-danger">*
                                                                    </small>Provinsi</label>
                                                                <input type="text" class="form-control"
                                                                    name="provinsi" id="provinsiKtp"
                                                                    aria-describedby="provinsiKtp" placeholder="Provinsi"
                                                                    value="{{ $pembiayaan->nasabah->provinsi }}"
                                                                    required />
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
                                                                    placeholder="16XXX"
                                                                    value="{{ $pembiayaan->nasabah->kd_pos }}" required />
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
                                        <select class="select2 w-100" name="skpd_status_perkawinan_id"
                                            id="statusPernikahan" onChange="changeStatusPernikahan()"
                                            data-placeholder="Pilih Status Pernikahan" required>
                                            <option value=""></option>
                                            @foreach ($statusperkawinans as $statusperkawinan)
                                                <option value="{{ $statusperkawinan->id }}"
                                                    {{ $pembiayaan->nasabah->status_perkawinan->id == $statusperkawinan->id ? 'selected' : '' }}>
                                                    {{ $statusperkawinan->nama_status_perkawinan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jumlahanak"><small class="text-danger">*
                                            </small>Jumlah Anak/Tanggungan</label>
                                        <select class="select2 w-100" name="skpd_tanggungan_id" id="jumlahanak" required>
                                            <option label="jumlahanak"></option>
                                            @foreach ($tanggungans as $tanggungan)
                                                <option value="{{ $tanggungan->id }}"
                                                    {{ $pembiayaan->nasabah->tanggungan->id == $tanggungan->id ? 'selected' : '' }}>
                                                    {{ $tanggungan->banyak_tanggungan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nonpwp">No NPWP</label>
                                        <input type="number" name="no_npwp" id="nonpwp" class="form-control"
                                            placeholder="Masukan Nomor NPWP"
                                            value="{{ $pembiayaan->nasabah->no_npwp ?? '' }}" />
                                    </div>
                                    <div class="mb-1
                                            col-md-6">
                                        <label class="form-label" for="notelp"><small class="text-danger">* </small>No
                                            Telepon</label>
                                        <input type="text" name="no_telp" id="notelp"
                                            class="form-control prefix-mask" placeholder="Masukan Nomor telepon"
                                            value="{{ $pembiayaan->nasabah->no_telp }}" required />
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="formupload" class="content" role="tabpanel"
                                aria-labelledby="account-details-trigger">
                                <div class="content-header">
                                    {{-- <h5 class="mb-0">Account Details</h5> --}}
                                    <small class="text-danger">* Wajib Diisi</small>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Diri</h5>
                                    <small class="text-muted">Lengkapi Data Diri Sesuai Dengan KTP.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotodiri"><small class="text-danger">*
                                            </small>Upload Foto Diri</label>
                                        <input type="file" name="foto[1][foto]" id="fotodiri" class="form-control"
                                            required />
                                        <input type="hidden" name="foto[1][kategori]" value="Foto Diri"
                                            class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotoPasanganPemohon"><small class="text-danger">
                                            </small>Upload Foto Pasangan</label>
                                        <input type="file" name="foto[6][foto]" id="fotoPasanganPemohon"
                                            class="form-control" />
                                        <input type="hidden" name="foto[6][kategori]" id="kategoriPasanganPemohon"
                                            value="Foto Pasangan" class="form-control" />
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
                                        <label class="form-label" for="fotodiriktp"><small class="text-danger">*
                                            </small>Upload Foto Diri Bersama KTP</label>
                                        <input type="file" name="foto[3][foto]" id="fotodiriktp" class="form-control"
                                            required />
                                        <input type="hidden" name="foto[3][kategori]" value="Foto Diri Bersama KTP"
                                            class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotokk"><small class="text-danger">*
                                            </small>Upload Foto Kartu Keluarga</label>
                                        <input type="file" name="foto[4][foto]" id="fotokk" class="form-control"
                                            required />
                                        <input type="hidden" name="foto[4][kategori]" value="Foto Kartu Keluarga"
                                            class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotoAktaNikahCerai"><small class="text-danger">
                                            </small>Upload Akta Nikah/Cerai</label>
                                        <input type="file" name="foto[5][foto]" id="fotoAktaNikahCerai"
                                            class="form-control" />
                                        <input type="hidden" name="foto[5][kategori]" id="kategoriAktaNikahCerai"
                                            value="Akta Status Perkawinan" class="form-control" />
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="formorangterdekat" class="content" role="tabpanel"
                                aria-labelledby="account-details-trigger">
                                <div class="content-header">
                                    {{-- <h5 class="mb-0">Account Details</h5> --}}
                                    <small class="text-danger">* Wajib Diisi</small>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Orang Terdekat</h5>
                                    <small class="text-muted">Lengkapi Data Orang Terdekat Tidak Serumah.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="namaot"><small class="text-danger">*
                                            </small>Nama</label>
                                        <input type="text" name="nama_orang_terdekat" id="namaot"
                                            class="form-control" placeholder="Masukan Nama Orang Terdekat"
                                            value="{{ $pembiayaan->nasabah->orang_terdekat->nama_orang_terdekat }}"
                                            required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="notelpot"><small class="text-danger">* </small>No
                                            Telepon</label>
                                        <input type="text" name="no_telp_orang_terdekat" id="notelpot"
                                            class="form-control prefix-mask1"
                                            placeholder="Masukan Nomor Telepon Orang Terdekat"
                                            value="{{ $pembiayaan->nasabah->orang_terdekat->no_telp_orang_terdekat }}"
                                            required />
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
                                                                aria-describedby="alamatOt" placeholder="Alamat"
                                                                value="{{ $pembiayaan->nasabah->orang_terdekat->alamat_orang_terdekat }}"
                                                                required />
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
                                                                aria-describedby="rtOt" placeholder="000"
                                                                value="{{ $pembiayaan->nasabah->orang_terdekat->rt_orang_terdekat }}"
                                                                required />
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
                                                                aria-describedby="rwOt" placeholder="000"
                                                                value="{{ $pembiayaan->nasabah->orang_terdekat->rw_orang_terdekat }}"
                                                                required />
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
                                                                placeholder="Kelurahan"
                                                                value="{{ $pembiayaan->nasabah->orang_terdekat->desa_kelurahan_orang_terdekat }}"
                                                                required />
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
                                                                placeholder="Kecamatan"
                                                                value="{{ $pembiayaan->nasabah->orang_terdekat->kecamatan_orang_terdekat }}"
                                                                required />
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
                                                                placeholder="Kabupaten/Kota"
                                                                value="{{ $pembiayaan->nasabah->orang_terdekat->kabkota_orang_terdekat }}"
                                                                required />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="alamatOtProvinsi"><small
                                                                    class="text-danger">*
                                                                </small>Provinsi</label>
                                                            <input type="text" class="form-control"
                                                                name="provinsi_orang_terdekat" id="alamatOtProvinsi"
                                                                aria-describedby="alamatOtProvinsi" placeholder="Provinsi"
                                                                value="{{ $pembiayaan->nasabah->orang_terdekat->provinsi_orang_terdekat }}"
                                                                required />
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
                                                                value="{{ $pembiayaan->nasabah->orang_terdekat->kd_pos_orang_terdekat }}"
                                                                required />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="formpekerjaan" class="content" role="tabpanel"
                                aria-labelledby="account-details-trigger">
                                <div class="content-header">
                                    {{-- <h5 class="mb-0">Account Details</h5> --}}
                                    <small class="text-danger">* Wajib Diisi</small>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Pekerjaan</h5>
                                    <small class="text-muted">Lengkapi Data Pekerjaan Anda.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="namainstansi"><small class="text-danger">*
                                            </small>Nama Instansi</label>
                                        <select class="select2 w-100" name="skpd_instansi_id" id="namainstansi"
                                            data-placeholder="Pilih Instansi" required>
                                            <option value=""></option>
                                            <@foreach ($instansis as $instansi)
                                                <option value="{{ $instansi->id }}">{{ $instansi->nama_instansi }}
                                                </option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="golongan"><small class="text-danger">*
                                            </small>Golongan</label>
                                        <select class="select2 w-100" name="skpd_golongan_id" id="golongan"
                                            data-placeholder="Pilih Golongan" required>
                                            <option value=""></option>
                                            @foreach ($golongans as $golongan)
                                                <option value="{{ $golongan->id }}">{{ $golongan->nama_golongan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jabatan"><small class="text-danger">*
                                            </small>Jabatan</label>
                                        <input type="text" name="jabatan" id="jabatan" class="form-control"
                                            placeholder="Masukkan Jabatan" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="skpengangkatan"><small class="text-danger">*
                                            </small>Upload Softcopy SK Pengangkatan / SK Terakhir</label>
                                        <input type="file" name="sk_pengangkatan" id="skpengangkatan"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="formjaminan" class="content" role="tabpanel"
                                aria-labelledby="account-details-trigger">
                                <div class="content-header">
                                    {{-- <h5 class="mb-0">Account Details</h5> --}}
                                    <small class="text-danger">* Wajib Diisi</small>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Jaminan</h5>
                                    <small class="text-muted">Silahkan Upload Data Jaminan Anda</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jaminan"><small class="text-danger">*
                                            </small>Jenis Jaminan</label>
                                        <select class="select2 w-100" name="skpd_jenis_jaminan_id" id="jaminan"
                                            data-placeholder="Pilih Jenis Jaminan" required>
                                            <option value=""></option>
                                            @foreach ($jaminans as $jaminan)
                                                <option value="{{ $jaminan->id }}">{{ $jaminan->nama_jaminan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jaminan_dokumen"><small class="text-danger">*
                                            </small>Upload Jaminan</label>
                                        <input type="file" name="dokumen_jaminan" id="jaminan_dokumen"
                                            class="form-control" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="notelpot">Jaminan Lainya</label>
                                        <input type="text" name="nama_jaminan_lainnya" id="notelpot"
                                            class="form-control" placeholder="Masukan Jaminan Lainnya" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jaminan_lainnya">Upload Jaminan Lainnya</label>
                                        <input type="file" name="dokumen_jaminan_lainnya" id="jaminan_lainnya"
                                            rows="3" class="form-control" />
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="form2" class="content" role="tabpanel"
                                aria-labelledby="personal-info-modern-trigger">
                                <div class="content-header">
                                    {{-- <h5 class="mb-0">Account Details</h5> --}}
                                    <small class="text-danger">* Wajib Diisi</small>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0">Data Pendapatan</h5>
                                    <small>Isikan Data Pendapatan Anda</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="gaji_pokok"><small class="text-danger">*
                                            </small>Gaji Pokok (Per Bulan)</label>
                                        <input type="text" name="gaji_pokok" class="form-control numeral-mask"
                                            placeholder="Rp." id="gaji_pokok" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="pendapatan_lainnya"><small class="text-danger">*
                                            </small>Gaji / Pendapatan Lainnya (Per Bulan)</label>
                                        <input type="text" name="pendapatan_lainnya" class="form-control numeral-mask"
                                            placeholder="0 Jika Tidak ada" id="pendapatan_lainnya" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="pendapatan_tpp"><small class="text-danger">*
                                            </small>Pendapatan TPP (Per Bulan)</label>
                                        <input type="text" name="gaji_tpp" class="form-control numeral-mask"
                                            placeholder="Rp." id="pendapatan_tpp" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="lampiran_keuangan"><small class="text-danger">*
                                            </small>Upload Lampiran Keuangan</label>
                                        <input type="file" name="dokumen_keuangan" id="lampiran_keuangan"
                                            rows="3" class="form-control" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="slip_gaji"><small class="text-danger">*
                                            </small>Upload Slip Gaji</label>
                                        <input type="file" name="dokumen_slip_gaji" id="slip_gaji" rows="3"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <br />
                                <br />
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="formpengeluaran" class="content" role="tabpanel"
                                aria-labelledby="personal-info-modern-trigger">
                                <div class="content-header">
                                    {{-- <h5 class="mb-0">Account Details</h5> --}}
                                    <small class="text-danger">* Wajib Diisi</small>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0">Data Pengeluaran Anda</h5>
                                    <small>Data Pengeluaran Nasabah Anda</small>
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="numeral-formatting"><small class="text-danger">*
                                        </small>Pengeluaran Lainnya (Per
                                        Bulan)</label>
                                    <input type="text" name="pengeluaran_lainnya" class="form-control numeral-mask"
                                        placeholder="Jika tidak ada isikan 0" id="Pendapatan TPP" required />
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="numeral-formatting">Keterangan Pengeluaran Lainnya
                                        (Per
                                        Bulan)</label>
                                    <input type="text" name="keterangan_pengeluaran_lainnya" class="form-control"
                                        id="Pendapatan TPP" placeholder="Isikan Keterangan Pengeluaran Lainnya" />
                                </div>
                                <br />
                                <br />
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button type="submit" id="btnSubmitForm" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!-- /Modern Horizontal Wizard -->
        </div>
        <!-- END: Content-->
    </div>
    <!-- END: Content-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        //Form Validation (Bootstrap)
        const modalLoading = document.getElementById('modalLoading');
        const bootstrapForms = document.querySelectorAll('.needs-validation');

        Array.prototype.forEach.call(bootstrapForms, function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                    form.classList.add('invalid');
                } else {
                    form.classList.add('was-validated');
                    if (modalLoading) {
                        modalLoading.style.display = 'block';
                    }
                }
                form.classList.add('was-validated');
            });
        });

        //Hide modal setelah loading selesai
        window.addEventListener('load', () => {
            if (modalLoading) {
                modalLoading.style.display = 'none';
            }
        })

        function changeStatusPernikahan() {
            var status = document.getElementById("statusPernikahan");
            if (status.value == 1) { //Belum Menikah
                document.getElementById("fotoPasanganPemohon").setAttribute("disabled", "disabled"),
                    document.getElementById("fotoPasanganPemohon").removeAttribute("required"),
                    document.getElementById("kategoriPasanganPemohon").setAttribute("disabled", "disabled"),
                    document.getElementById("fotoAktaNikahCerai").setAttribute("disabled", "disabled"),
                    document.getElementById("fotoAktaNikahCerai").removeAttribute("required"),
                    document.getElementById("kategoriAktaNikahCerai").setAttribute("disabled", "disabled");
            } else if (status.value == 2) { //Sudah Menikah
                document.getElementById("fotoPasanganPemohon").setAttribute("required", "required"),
                    document.getElementById("fotoPasanganPemohon").removeAttribute("disabled"),
                    document.getElementById("kategoriPasanganPemohon").removeAttribute("disabled"),
                    document.getElementById("fotoAktaNikahCerai").setAttribute("required", "required"),
                    document.getElementById("fotoAktaNikahCerai").removeAttribute("disabled"),
                    document.getElementById("kategoriAktaNikahCerai").removeAttribute("disabled");
            } else { //Cerai
                document.getElementById("fotoPasanganPemohon").setAttribute("disabled", "disabled"),
                    document.getElementById("fotoPasanganPemohon").removeAttribute("required"),
                    document.getElementById("kategoriPasanganPemohon").setAttribute("disabled", "disabled"),
                    document.getElementById("fotoAktaNikahCerai").setAttribute("required", "required"),
                    document.getElementById("fotoAktaNikahCerai").removeAttribute("disabled"),
                    document.getElementById("kategoriAktaNikahCerai").removeAttribute("disabled");
            }
        }

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
    </script>
@endsection
