@extends('skpd::layouts.main')

@section('content')
    <style>
        /* Validate style for Select2 class */
        .was-validated select.select2:invalid+.select2 .select2-selection {
            border-color: #dc3545 !important;
        }

        .was-validated select.select2:valid+.select2 .select2-selection {
            border-color: #28a745 !important;
        }


        #ifPerbaruiFotoPemohon {
            width: 100%;
            height: 60px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifPerbaruiFotoPemohon.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPerbaruiFotoPasangan {
            width: 100%;
            height: 60px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifPerbaruiFotoPasangan.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPerbaruiFotoKtp {
            width: 100%;
            height: 60px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifPerbaruiFotoKtp.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPerbaruiFotoDiriKtp {
            width: 100%;
            height: 60px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifPerbaruiFotoDiriKtp.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPerbaruiFotoKk {
            width: 100%;
            height: 60px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifPerbaruiFotoKk.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPerbaruiFotoAktaNikahCerai {
            width: 100%;
            height: 60px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifPerbaruiFotoAktaNikahCerai.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPerbaruiFotoSk {
            width: 100%;
            height: 60px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifPerbaruiFotoSk.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPerbaruiFotoJaminan {
            width: 100%;
            height: 60px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifPerbaruiFotoJaminan.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPerbaruiFotoJaminanLainnya {
            width: 100%;
            height: 60px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifPerbaruiFotoJaminanLainnya.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPerbaruiFotoKeuangan {
            width: 100%;
            height: 60px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifPerbaruiFotoKeuangan.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPerbaruiFotoSlipGaji {
            width: 100%;
            height: 60px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifPerbaruiFotoSlipGaji.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPerbaruiIdeb {
            width: 100%;
            height: 60px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifPerbaruiIdeb.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPerbaruiIdebPasangan {
            width: 100%;
            height: 60px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifPerbaruiIdebPasangan.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
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

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Form Proposal</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">SKPD</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Proposal</a>
                                    </li>
                                    <li class="breadcrumb-item active">Revisi Proposal
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Modern Horizontal Wizard -->
                <section class="modern-horizontal-wizard">
                    <div class="bs-stepper wizard-modern modern-wizard-example">
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#formDataDiri" role="tab" id="form-data-diri-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="user" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Data Diri</span>
                                        <span class="bs-stepper-subtitle">Data Diri dan Pekerjaan</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#formKeuangan" role="tab" id="form-keuangan-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="dollar-sign" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Keuangan</span>
                                        <span class="bs-stepper-subtitle">Data Keuangan</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#formLampiran" role="tab" id="form-lampiran-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="file" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Lampiran</span>
                                        <span class="bs-stepper-subtitle">Lampiran Proposal</span>
                                    </span>
                                </button>
                            </div>
                        </div>

                        <div class="bs-stepper-content">
                            <form method='POST' action="/skpd/revisi/{{ $pembiayaan->id }}" id="formRevisi"
                                class="needs-validation" enctype="multipart/form-data" novalidate>
                                @method('PUT')
                                @csrf
                                <div id="formDataDiri" class="content" role="tabpanel"
                                    aria-labelledby="form-data-diri-trigger">
                                    <div class="content-header">
                                        {{-- <h5 class="mb-0">Account Details</h5> --}}
                                        <small class="text-danger">* Wajib Diisi</small>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-12">
                                            <label class="form-label" for="ao"><small class="text-danger">*
                                                </small>Nama AO</label>
                                            <select class="select2 w-100" name="user_id" id="ao"
                                                data-placeholder="Pilih AO" required>
                                                <option value=""></option>
                                                @foreach ($aos as $ao)
                                                    <option value="{{ $ao->user->id }}"
                                                        {{ $pembiayaan->user->id == $ao->user->id ? 'selected' : '' }}>
                                                        {{ $ao->user->name }}</option>
                                                @endforeach
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tanggal"><small class="text-danger">*
                                                </small>Tanggal Pengajuan</label>
                                            <input type="text" id="tanggal" class="form-control flatpickr-basic"
                                                name="tanggal_pengajuan"
                                                value="{{ date('d-m-Y', strtotime($pembiayaan->tanggal_pengajuan)) }}"
                                                placeholder="DD-MM-YYYY" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jenispenggunaan"><small class="text-danger">*
                                                </small>Jenis Penggunaan</label>
                                            <select class="select2 w-100" name="skpd_jenis_penggunaan_id"
                                                id="jenispenggunaan" data-placeholder="Pilih Jenis Penggunaan" required>
                                                <option value=""></option>
                                                @foreach ($penggunaans as $penggunaan)
                                                    <option value="{{ $penggunaan->id }}"
                                                        {{ $pembiayaan->jenis_penggunaan->id == $penggunaan->id ? 'selected' : '' }}>
                                                        {{ $penggunaan->jenis_penggunaan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="sektor"><small class="text-danger">*
                                                </small>Sektor Ekonomi</label>
                                            <select class="select2 w-100" name="skpd_sektor_ekonomi_id" id="sektor"
                                                data-placeholder="Pilih Sektor Ekonomi" required>
                                                <option value=""></option>
                                                @foreach ($sektors as $sektor)
                                                    <option value="{{ $sektor->id }}"
                                                        {{ $pembiayaan->skpd_sektor_ekonomi_id == $sektor->id ? 'selected' : '' }}>
                                                        {{ $sektor->nama_sektor_ekonomi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="akad"><small class="text-danger">*
                                                </small>Akad</label>
                                            <select class="select2 w-100" name="skpd_akad_id" id="akad" required>
                                                <option label="akad"></option>
                                                @foreach ($akads as $akad)
                                                    <option value="{{ $akad->id }}"
                                                        {{ $pembiayaan->skpd_akad_id == $akad->id ? 'selected' : '' }}>
                                                        {{ $akad->nama_akad }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nominal_pembiayaan"><small
                                                    class="text-danger">* </small>Nominal Pembiayaan</label>
                                            <input type="text" name="nominal_pembiayaan"
                                                class="form-control numeral-mask"
                                                value="{{ old('nominal_pembiayaan', $pembiayaan->nominal_pembiayaan) }}" id="nominal_pembiayaan"
                                                required />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="tenorr"><small class="text-danger">*
                                                </small>Tenor</label>
                                            <select class="select2 w-100" name="tenor" id="tenorr"
                                                data-placeholder="Pilih Tenor" required>
                                                <option value=""></option>
                                                <option value="3" {{ $pembiayaan->tenor == 3 ? 'selected' : '' }}>3
                                                    Bulan</option>
                                                <option value="4" {{ $pembiayaan->tenor == 4 ? 'selected' : '' }}>4
                                                    Bulan
                                                </option>
                                                <option value="5" {{ $pembiayaan->tenor == 5 ? 'selected' : '' }}>5
                                                    Bulan
                                                </option>
                                                <option value="6" {{ $pembiayaan->tenor == 6 ? 'selected' : '' }}>6
                                                    Bulan
                                                </option>
                                                <option value="7" {{ $pembiayaan->tenor == 7 ? 'selected' : '' }}>7
                                                    Bulan
                                                </option>
                                                <option value="8" {{ $pembiayaan->tenor == 8 ? 'selected' : '' }}>8
                                                    Bulan
                                                </option>
                                                <option value="9" {{ $pembiayaan->tenor == 9 ? 'selected' : '' }}>9
                                                    Bulan
                                                </option>
                                                <option value="10" {{ $pembiayaan->tenor == 10 ? 'selected' : '' }}>10
                                                    Bulan</option>
                                                <option value="11" {{ $pembiayaan->tenor == 11 ? 'selected' : '' }}>11
                                                    Bulan</option>
                                                <option value="12" {{ $pembiayaan->tenor == 12 ? 'selected' : '' }}>12
                                                    Bulan</option>
                                                <option value="18" {{ $pembiayaan->tenor == 18 ? 'selected' : '' }}>18
                                                    Bulan</option>
                                                <option value="24" {{ $pembiayaan->tenor == 24 ? 'selected' : '' }}>24
                                                    Bulan</option>
                                                <option value="36" {{ $pembiayaan->tenor == 36 ? 'selected' : '' }}>36
                                                    Bulan</option>
                                                <option value="48" {{ $pembiayaan->tenor == 48 ? 'selected' : '' }}>48
                                                    Bulan</option>
                                                <option value="60" {{ $pembiayaan->tenor == 60 ? 'selected' : '' }}>60
                                                    Bulan</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-2">
                                            <label class="form-label" for="rate"><small class="text-danger">*
                                                </small>Rate</label>
                                            <input type="text" name="rate" class="form-control numeral-mask"
                                                placeholder="%" id="rate"
                                                value="{{ number_format($pembiayaan->rate, 2, ',', '.') }}" required />
                                        </div>
                                    </div>
                                    <div class="content-header">
                                        <h5 class="mb-0 mt-2">Data Diri</h5>
                                        <small class="text-muted">Lengkapi Data Diri Sesuai Dengan KTP.</small>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nama"><small class="text-danger">*
                                                </small>Nama Lengkap Nasabah</label>
                                            <input type="text" name="nama_nasabah" id="nama"
                                                class="form-control" placeholder="Nama Lengkap"
                                                value="{{ $pembiayaan->nasabah->nama_nasabah }}" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="noktp"><small class="text-danger">*
                                                </small>No KTP</label>
                                            <input type="number" name="no_ktp" id="noktp" class="form-control"
                                                placeholder="Masukan Nomor KTP"
                                                value="{{ $pembiayaan->nasabah->no_ktp }}" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tempatlahir"><small class="text-danger">*
                                                </small>Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                                class="form-control" placeholder="Maukan Tempat Lahir"
                                                value="{{ $pembiayaan->nasabah->tempat_lahir }}" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tgllahir"><small class="text-danger">*
                                                </small>Tanggal Lahir</label>
                                            <input type="text" id="tgl_lahir" class="form-control flatpickr-basic"
                                                name="tgl_lahir" placeholder="DD-MM-YYYY"
                                                value="{{ date('d-m-Y', strtotime($pembiayaan->nasabah->tgl_lahir)) }}"
                                                required />
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
                                                                    <input type="text" class="form-control"
                                                                        name="alamat" id="alamatKtp"
                                                                        aria-describedby="alamatKtp"
                                                                        placeholder="Alamat Sesuai KTP"
                                                                        value="{{ $pembiayaan->nasabah->alamat }}"
                                                                        required />
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
                                                                    <input type="text" class="form-control"
                                                                        name="kabkota" id="kabKotaKtp"
                                                                        aria-describedby="kabKotaKtp"
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
                                                                        aria-describedby="provinsiKtp"
                                                                        placeholder="Provinsi"
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
                                                                    <input type="number" class="form-control"
                                                                        name="kd_pos" id="kdPosKtp"
                                                                        aria-describedby="kdPosKtp" placeholder="16XXX"
                                                                        value="{{ $pembiayaan->nasabah->kd_pos }}"
                                                                        required />
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
                                                                        <label class="form-label"
                                                                            for="alamatDomisili"><small
                                                                                class="text-danger">*
                                                                            </small>Alamat Domisili&emsp;<input
                                                                                type="checkbox" id="cbAutoFillDomisili"
                                                                                class="form-check-input"
                                                                                style="width:15px; height:15px;">&nbsp;
                                                                            Sama Dengan Alamat KTP</label>
                                                                        <input type="text" class="form-control"
                                                                            id="alamatDomisili" name="alamat_domisili"
                                                                            aria-describedby="alamatDomisili"
                                                                            placeholder="Alamat Tempat Tinggal (Domisili)"
                                                                            value="{{ $pembiayaan->nasabah->alamat_domisili }}"
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
                                                                            aria-describedby="rtDomisili"
                                                                            placeholder="000"
                                                                            value="{{ $pembiayaan->nasabah->rt_domisili }}"
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
                                                                            aria-describedby="rwDomisili"
                                                                            placeholder="000"
                                                                            value="{{ $pembiayaan->nasabah->rw_domisili }}"
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
                                                                            placeholder="Kelurahan"
                                                                            value="{{ $pembiayaan->nasabah->desa_kelurahan_domisili }}"
                                                                            required />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="kecamatanDomisili"><small
                                                                                class="text-danger">*
                                                                            </small>Kecamatan</label>
                                                                        <input type="text" class="form-control"
                                                                            name="kecamatan_domisili"
                                                                            id="kecamatanDomisili"
                                                                            aria-describedby="kecamatanDomisili"
                                                                            placeholder="Kecamatan"
                                                                            value="{{ $pembiayaan->nasabah->kecamatan_domisili }}"
                                                                            required />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="kabKotaDomisili"><small
                                                                                class="text-danger">*
                                                                            </small>Kabupaten/Kota</label>
                                                                        <input type="text" class="form-control"
                                                                            name="kabkota_domisili" id="kabKotaDomisili"
                                                                            aria-describedby="kabKotaDomisili"
                                                                            placeholder="Kabupaten/Kota"
                                                                            value="{{ $pembiayaan->nasabah->kabkota_domisili }}"
                                                                            required />
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
                                                                            placeholder="Provinsi"
                                                                            value="{{ $pembiayaan->nasabah->provinsi_domisili }}"
                                                                            required />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-1 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="kdPosDomisili"><small
                                                                                class="text-danger">*
                                                                            </small>Kode
                                                                            Pos</label>
                                                                        <input type="number" class="form-control"
                                                                            name="kd_pos_domisili" id="kdPosDomisili"
                                                                            aria-describedby="kdPosDomisili"
                                                                            placeholder="16XXX"
                                                                            value="{{ $pembiayaan->nasabah->kd_pos_domisili }}"
                                                                            required />
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
                                            <select class="select2 w-100" name="skpd_status_perkawinan_id" id="status"
                                                required>
                                                @foreach ($statusperkawinans as $statusperkawinan)
                                                    <option value="{{ $statusperkawinan->id }}"
                                                        {{ $pembiayaan->nasabah->status_perkawinan->id == $statusperkawinan->id ? 'selected' : '' }}>
                                                        {{ $statusperkawinan->nama_status_perkawinan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jmlTanggungan"><small class="text-danger">*
                                                </small>Jumlah Anak/Tanggungan</label>
                                            <select class="select2 w-100" name="skpd_tanggungan_id" id="jmlTanggungan"
                                                required>
                                                @foreach ($tanggungans as $tanggungan)
                                                    <option value="{{ $tanggungan->id }}"
                                                        {{ $pembiayaan->nasabah->tanggungan->id == $tanggungan->id ? 'selected' : '' }}>
                                                        {{ $tanggungan->banyak_tanggungan }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nonpwp">No. NPWP</label>
                                            <input type="number" name="no_npwp" id="nonpwp" class="form-control"
                                                placeholder="Masukkan Nomor NPWP"
                                                value="{{ $pembiayaan->nasabah->no_npwp }}" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="notelp"><small class="text-danger">*
                                                </small>No. Telepon</label>
                                            <input type="text" name="no_telp" id="notelp" class="form-control"
                                                placeholder="Masukan Nomor telepon"
                                                value="{{ $pembiayaan->nasabah->no_telp }}" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jenisNasabah"><small class="text-danger">*
                                                </small>Jenis Nasabah</label>
                                            <select class="select2 w-100" name="skpd_jenis_nasabah_id" id="jenisNasabah"
                                                data-placeholder="Pilih Jenis Nasabah" required>
                                                <option value=""></option>
                                                @foreach ($jenisNasabahs as $jenisNasabah)
                                                    <option value="{{ $jenisNasabah->id }}"
                                                        {{ $pembiayaan->jenis_nasabah->id == $jenisNasabah->id ? 'selected' : '' }}>
                                                        {{ $jenisNasabah->keterangan }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @php
                                            // $fotodiri = Modules\Skpd\Entities\SkpdFoto::Select()
                                            //     ->where('skpd_pembiayaan_id', $pembiayaan->id)
                                            //     ->where('kategori', 'Foto Diri')
                                            //     ->get()
                                            //     ->first();
                                            // $fotodiriktp = Modules\Skpd\Entities\SkpdFoto::Select()
                                            //     ->where('skpd_pembiayaan_id', $pembiayaan->id)
                                            //     ->where('kategori', 'Foto Diri Bersama KTP')
                                            //     ->get()
                                            //     ->first();
                                            // $fotoktp = Modules\Skpd\Entities\SkpdFoto::Select()
                                            //     ->where('skpd_pembiayaan_id', $pembiayaan->id)
                                            //     ->where('kategori', 'Foto KTP')
                                            //     ->get()
                                            //     ->first();
                                            // $fotokk = Modules\Skpd\Entities\SkpdFoto::Select()
                                            //     ->where('skpd_pembiayaan_id', $pembiayaan->id)
                                            //     ->where('kategori', 'Foto Kartu Keluarga')
                                            //     ->get()
                                            //     ->first();
                                            // $fotostatus = Modules\Skpd\Entities\SkpdFoto::Select()
                                            //     ->where('skpd_pembiayaan_id', $pembiayaan->id)
                                            //     ->where('kategori', 'Akta Status Pekawinan')
                                            //     ->get()
                                            //     ->first();
                                            // $ideb = Modules\Skpd\Entities\SkpdFoto::Select()
                                            //     ->where('skpd_pembiayaan_id', $pembiayaan->id)
                                            //     ->where('kategori', 'IDEB')
                                            //     ->get()
                                            //     ->first();
                                        @endphp

                                    </div>
                                    <br />
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
                                            <label class="form-label" for="notelpot"><small class="text-danger">*
                                                </small>No. Telepon</label>
                                            <input type="text" name="no_telp_orang_terdekat" id="notelpot"
                                                class="form-control" placeholder="Masukan Nomor Telepon Orang Terdekat"
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
                                                                <input type="text" class="form-control"
                                                                    pattern="^\d{3}$"
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
                                                                <input type="text" class="form-control"
                                                                    pattern="^\d{3}$"
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
                                                                    aria-describedby="alamatOtProvinsi"
                                                                    placeholder="Provinsi"
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
                                    <div class="content-header">
                                        <h5 class="mb-0 mt-2">Data Pekerjaan</h5>
                                        <small class="text-muted">Lengkapi Data Pekerjaan.</small>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="namainstansi"><small class="text-danger">*
                                                </small>Nama Instansi</label>
                                            <select class="select2 w-100" name="skpd_instansi_id" id="namainstansi"
                                                data-placeholder="Pilih Instansi" required>
                                                <option value=""></option>
                                                @foreach ($instansis as $instansi)
                                                    <option value="{{ $instansi->id }}"
                                                        {{ $pembiayaan->instansi->id == $instansi->id ? 'selected' : '' }}>
                                                        {{ $instansi->nama_instansi }}
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
                                                    <option value="{{ $golongan->id }}"
                                                        {{ $pembiayaan->golongan->id == $golongan->id ? 'selected' : '' }}>
                                                        {{ $golongan->nama_golongan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="jabatan"><small class="text-danger">*
                                                </small>Jabatan</label>
                                            <input type="text" name="jabatan" id="jabatan" class="form-control"
                                                placeholder="Masukkan Jabatan" value="{{ $pembiayaan->jabatan }}"
                                                required />
                                        </div>
                                    </div>
                                    <div class="content-header">
                                        <h5 class="mb-0 mt-2">Data Jaminan</h5>
                                        <small class="text-muted">Silahkan Upload Data Jaminan</small>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jaminan"><small class="text-danger">*
                                                </small>Jenis Jaminan</label>
                                            <select class="select2 w-100" name="skpd_jenis_jaminan_id" id="jaminan"
                                                data-placeholder="Pilih Jenis Jaminan" required>
                                                <option value="">
                                                </option>
                                                @foreach ($jaminans as $jaminan)
                                                    <option value="{{ $jaminan->id }}"
                                                        {{ $pembiayaan->jaminan->jenis_jaminan->id == $jaminan->id ? 'selected' : '' }}>
                                                        {{ $jaminan->nama_jaminan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jaminanLainnya">Jaminan Lainnya</label>
                                            <input type="text" name="nama_jaminan_lainnya" id="jaminanLainnya"
                                                class="form-control" placeholder="Masukan Jaminan Lainnya" />
                                        </div>

                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <button type="button" class="btn btn-outline-secondary btn-prev" required>
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-next">
                                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                        </button>
                                    </div>
                                </div>
                                <div id="formKeuangan" class="content" role="tabpanel"
                                    aria-labelledby="form-keuangan-trigger">
                                    <div class="content-header">
                                        <h5 class="mb-0">Data Pendapatan</h5>
                                        <small>Isikan Data Pendapatan</small>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="gaji_pokok"><small class="text-danger">*
                                                </small>Gaji Pokok (Per Bulan)</label>
                                            <input type="text" name="gaji_pokok" class="form-control numeral-mask"
                                                value="{{ old('gaji_pokok', $pembiayaan->gaji_pokok) }}" id="gaji_pokok" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="pendapatan_lainnya"><small
                                                    class="text-danger">* </small>Gaji / Pendapatan Lainnya (Per
                                                Bulan)</label>
                                            <input type="text" name="pendapatan_lainnya"
                                                class="form-control numeral-mask"
                                                value="{{ old('pendapatan_lainnya', $pembiayaan->pendapatan_lainnya) }}" id="pendapatan_lainnya"
                                                required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="pendapatan_tpp"><small class="text-danger">*
                                                </small>Pendapatan TPP (Per Bulan)</label>
                                            <input type="text" name="gaji_tpp" class="form-control numeral-mask"
                                                value="{{ old('gaji_tpp', $pembiayaan->gaji_tpp) }}" id="pendapatan_tpp" required />
                                        </div>

                                    </div>


                                    <br />

                                    <div class="content-header">
                                        <h5 class="mb-0">Data Pengeluaran</h5>
                                        <small>Data Pengeluaran Nasabah</small>
                                    </div>
                                    <section id="form-repeater-slik">
                                        <div class="row">
                                            <div class="mb-1 col-md-12">
                                                <div class="repeater-default">
                                                    <div data-repeater-list="repeater_slik">
                                                        <h6>Slik Nasabah</h6>
                                                        @if ($if_slik != null)
                                                            @foreach ($sliks as $slik)
                                                                <div data-repeater-item>
                                                                    <div class="row d-flex align-items-end">
                                                                        <div class="col-md-2 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="nama_bank">Nama
                                                                                    Bank</label>
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $slik->id }}" />
                                                                                <input type="text" class="form-control"
                                                                                    name="nama_bank" id="nama_bank"
                                                                                    aria-describedby="nama_bank"
                                                                                    placeholder="Nama Bank"
                                                                                    value="{{ $slik->nama_bank }}" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="plafond">Plafond</label>
                                                                                <input type="number" class="form-control"
                                                                                    name="plafond" id="plafond"
                                                                                    aria-describedby="itemcost"
                                                                                    placeholder="Rp."
                                                                                    value="{{ $slik->plafond }}" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="outstanding">Outstanding</label>
                                                                                <input type="number" class="form-control"
                                                                                    name="outstanding" id="outstanding"
                                                                                    aria-describedby="outstanding"
                                                                                    placeholder="Rp."
                                                                                    value="{{ $slik->outstanding }}" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-1 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="tenor">Tenor</label>
                                                                                <input type="number" class="form-control"
                                                                                    name="tenor" id="tenor"
                                                                                    aria-describedby="tenor"
                                                                                    placeholder="tenor"
                                                                                    value="{{ $slik->tenor }}" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-1 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="margin">Margin</label>
                                                                                <input type="number"
                                                                                    class="form-control persen"
                                                                                    name="margin" id="margin"
                                                                                    aria-describedby="margin"
                                                                                    placeholder="%"
                                                                                    value="{{ $slik->margin }}" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-1 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="agunan">Agunan</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="agunan" id="agunan"
                                                                                    aria-describedby="agunan"
                                                                                    value="{{ $slik->agunan }}" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="angsuran">Angsuran</label>
                                                                                <input type="number" class="form-control"
                                                                                    name="angsuran" id="angsuran"
                                                                                    aria-describedby="angsuran"
                                                                                    placeholder="Rp."
                                                                                    value="{{ $slik->angsuran }}" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="kolTertinggi">Kol
                                                                                    Tertinggi </label>
                                                                                <select class="form-control"
                                                                                    name="kol_tertinggi"
                                                                                    aria-label="kolTertinggi"
                                                                                    id="kolTertinggi">
                                                                                    <option value="" disabled>Pilih
                                                                                        Kol
                                                                                        Tertinggi</option>
                                                                                    <option
                                                                                        {{ $slik->kol_tertinggi == 1 ? 'selected' : '' }}
                                                                                        value="1">1</option>
                                                                                    <option
                                                                                        {{ $slik->kol_tertinggi == 2 ? 'selected' : '' }}
                                                                                        value="2">2</option>
                                                                                    <option
                                                                                        {{ $slik->kol_tertinggi == 3 ? 'selected' : '' }}
                                                                                        value="3">3</option>
                                                                                    <option
                                                                                        {{ $slik->kol_tertinggi == 4 ? 'selected' : '' }}
                                                                                        value="4">4</option>
                                                                                    <option
                                                                                        {{ $slik->kol_tertinggi == 5 ? 'selected' : '' }}
                                                                                        value="5">5</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-1 col-12 mb-25">
                                                                            <div class="mb-1">
                                                                                <button
                                                                                    class="btn btn-outline-danger text-nowrap px-1"
                                                                                    data-repeater-delete type="button">
                                                                                    <i data-feather="x"
                                                                                        class="me-25"></i>
                                                                                    {{-- <span>Delete</span> --}}
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button class="btn btn-icon btn-primary" type="button"
                                                                data-repeater-create>
                                                                <i data-feather="plus" class="me-25"></i>
                                                                <span>Tambah</span>
                                                            </button> &ensp;
                                                            <button class="btn btn-icon btn-danger" type="button"
                                                                data-bs-toggle="modal" data-bs-target="#modalHapusSlik">
                                                                <i data-feather="x" class="me-25"></i>
                                                                <span>Hapus Semua</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="nama_bank">Nama
                                                                        Bank</label>
                                                                    <input type="hidden" name="id" />
                                                                    <input type="text" class="form-control"
                                                                        name="nama_bank" id="nama_bank"
                                                                        aria-describedby="nama_bank"
                                                                        placeholder="Nama Bank" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="plafond">Plafond</label>
                                                                    <input type="number" class="form-control"
                                                                        name="plafond" id="plafond"
                                                                        aria-describedby="itemcost" placeholder="Rp." />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="outstanding">Outstanding</label>
                                                                    <input type="number" class="form-control"
                                                                        name="outstanding" id="outstanding"
                                                                        aria-describedby="outstanding"
                                                                        placeholder="Rp." />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="tenor">Tenor</label>
                                                                    <input type="number" class="form-control"
                                                                        name="tenor" id="tenor"
                                                                        aria-describedby="tenor" placeholder="tenor" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="margin">Margin</label>
                                                                    <input type="number" class="form-control persen"
                                                                        name="margin" id="margin"
                                                                        aria-describedby="margin" placeholder="%" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="agunan">Agunan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="agunan" id="agunan"
                                                                        aria-describedby="agunan" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="angsuran">Angsuran</label>
                                                                    <input type="number" class="form-control"
                                                                        name="angsuran" id="angsuran"
                                                                        aria-describedby="angsuran" placeholder="Rp." />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-class" for="kolTertinggi">Kol
                                                                        Tertinggi</label>
                                                                    <select class="form-select" name="kol_tertinggi"
                                                                        aria-label="kolTertinggi" id="kolTertinggi">
                                                                        <option value="" selected disabled>Pilih
                                                                            Kol
                                                                            Tertinggi</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12 mb-25">
                                                                <div class="mb-1">
                                                                    <button class="btn btn-outline-danger text-nowrap px-1"
                                                                        data-repeater-delete type="button">
                                                                        <i data-feather="x" class="me-25"></i>
                                                                        {{-- <span>Delete</span> --}}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button class="btn btn-icon btn-primary" type="button"
                                                            data-repeater-create>
                                                            <i data-feather="plus" class="me-25"></i>
                                                            <span>Tambah</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                    </section>

                                    @if ($pembiayaan->nasabah->skpd_status_perkawinan_id == 2)
                                        @if ($idebPasangan)
                                            <br />
                                            <section id="form-repeater-slik-pasangan">
                                                <div class="row">
                                                    <div class="mb-1 col-md-12">
                                                        <div class="repeater-default">
                                                            <div data-repeater-list="repeater_slik_pasangan">
                                                                <h6>Slik Pasangan Nasabah</h6>
                                                                @if ($if_slik_pasangan != null)
                                                                    @foreach ($sliks_pasangan as $slik_pasangan)
                                                                        <div data-repeater-item>
                                                                            <div class="row d-flex align-items-end">
                                                                                <div class="col-md-2 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="nama_bank">Nama
                                                                                            Bank</label>
                                                                                        <input type="hidden"
                                                                                            name="id"
                                                                                            value="{{ $slik_pasangan->id }}" />
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="nama_bank"
                                                                                            id="nama_bank"
                                                                                            aria-describedby="nama_bank"
                                                                                            placeholder="Nama Bank"
                                                                                            value="{{ $slik_pasangan->nama_bank }}" />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-2 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="plafond">Plafond</label>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            name="plafond" id="plafond"
                                                                                            aria-describedby="itemcost"
                                                                                            placeholder="Rp."
                                                                                            value="{{ $slik_pasangan->plafond }}" />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-2 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="outstanding">Outstanding</label>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            name="outstanding"
                                                                                            id="outstanding"
                                                                                            aria-describedby="outstanding"
                                                                                            placeholder="Rp."
                                                                                            value="{{ $slik_pasangan->outstanding }}" />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-1 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="tenor">Tenor</label>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            name="tenor" id="tenor"
                                                                                            aria-describedby="tenor"
                                                                                            placeholder="tenor"
                                                                                            value="{{ $slik_pasangan->tenor }}" />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-1 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="margin">Margin</label>
                                                                                        <input type="number"
                                                                                            class="form-control persen"
                                                                                            name="margin" id="margin"
                                                                                            aria-describedby="margin"
                                                                                            placeholder="%"
                                                                                            value="{{ $slik_pasangan->margin }}" />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-1 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="agunan">Agunan</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="agunan"
                                                                                            id="agunan"
                                                                                            aria-describedby="agunan"
                                                                                            value="{{ $slik_pasangan->agunan }}" />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-2 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="angsuran">Angsuran</label>
                                                                                        <input type="number"
                                                                                            class="form-control"
                                                                                            name="angsuran"
                                                                                            id="angsuran"
                                                                                            aria-describedby="angsuran"
                                                                                            placeholder="Rp."
                                                                                            value="{{ $slik_pasangan->angsuran }}" />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-2 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="kolTertinggi">Kol
                                                                                            Tertinggi </label>
                                                                                        <select class="form-control"
                                                                                            name="kol_tertinggi"
                                                                                            aria-label="kolTertinggi"
                                                                                            id="kolTertinggi">
                                                                                            <option value=""
                                                                                                disabled>Pilih
                                                                                                Kol
                                                                                                Tertinggi</option>
                                                                                            <option
                                                                                                {{ $slik_pasangan->kol_tertinggi == 1 ? 'selected' : '' }}
                                                                                                value="1">1</option>
                                                                                            <option
                                                                                                {{ $slik_pasangan->kol_tertinggi == 2 ? 'selected' : '' }}
                                                                                                value="2">2</option>
                                                                                            <option
                                                                                                {{ $slik_pasangan->kol_tertinggi == 3 ? 'selected' : '' }}
                                                                                                value="3">3</option>
                                                                                            <option
                                                                                                {{ $slik_pasangan->kol_tertinggi == 4 ? 'selected' : '' }}
                                                                                                value="4">4</option>
                                                                                            <option
                                                                                                {{ $slik_pasangan->kol_tertinggi == 5 ? 'selected' : '' }}
                                                                                                value="5">5</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-1 col-12 mb-25">
                                                                                    <div class="mb-1">
                                                                                        <button
                                                                                            class="btn btn-outline-danger text-nowrap px-1"
                                                                                            data-repeater-delete
                                                                                            type="button">
                                                                                            <i data-feather="x"
                                                                                                class="me-25"></i>
                                                                                            {{-- <span>Delete</span> --}}
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <button class="btn btn-icon btn-primary"
                                                                        type="button" data-repeater-create>
                                                                        <i data-feather="plus" class="me-25"></i>
                                                                        <span>Tambah</span>
                                                                    </button> &ensp;
                                                                    <button class="btn btn-icon btn-danger"
                                                                        type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#modalHapusSlikPasangan">
                                                                        <i data-feather="x" class="me-25"></i>
                                                                        <span>Hapus Semua</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div data-repeater-item>
                                                                <div class="row d-flex align-items-end">
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="nama_bank">Nama
                                                                                Bank</label>
                                                                            <input type="hidden" name="id" />
                                                                            <input type="text" class="form-control"
                                                                                name="nama_bank" id="nama_bank"
                                                                                aria-describedby="nama_bank"
                                                                                placeholder="Nama Bank" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="plafond">Plafond</label>
                                                                            <input type="number" class="form-control"
                                                                                name="plafond" id="plafond"
                                                                                aria-describedby="itemcost"
                                                                                placeholder="Rp." />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="outstanding">Outstanding</label>
                                                                            <input type="number" class="form-control"
                                                                                name="outstanding" id="outstanding"
                                                                                aria-describedby="outstanding"
                                                                                placeholder="Rp." />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="tenor">Tenor</label>
                                                                            <input type="number" class="form-control"
                                                                                name="tenor" id="tenor"
                                                                                aria-describedby="tenor"
                                                                                placeholder="tenor" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="margin">Margin</label>
                                                                            <input type="number"
                                                                                class="form-control persen"
                                                                                name="margin" id="margin"
                                                                                aria-describedby="margin"
                                                                                placeholder="%" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="agunan">Agunan</label>
                                                                            <input type="text" class="form-control"
                                                                                name="agunan" id="agunan"
                                                                                aria-describedby="agunan" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="angsuran">Angsuran</label>
                                                                            <input type="number" class="form-control"
                                                                                name="angsuran" id="angsuran"
                                                                                aria-describedby="angsuran"
                                                                                placeholder="Rp." />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-class"
                                                                                for="kolTertinggi">Kol
                                                                                Tertinggi</label>
                                                                            <select class="form-select"
                                                                                name="kol_tertinggi"
                                                                                aria-label="kolTertinggi"
                                                                                id="kolTertinggi">
                                                                                <option value="" selected disabled>
                                                                                    Pilih
                                                                                    Kol
                                                                                    Tertinggi</option>
                                                                                <option value="1">1</option>
                                                                                <option value="2">2</option>
                                                                                <option value="3">3</option>
                                                                                <option value="4">4</option>
                                                                                <option value="5">5</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-1 col-12 mb-25">
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
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <button class="btn btn-icon btn-primary" type="button"
                                                                    data-repeater-create>
                                                                    <i data-feather="plus" class="me-25"></i>
                                                                    <span>Tambah</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                        @endif
                </section>
                @endif
                @endif
                <br />
                <div class="row">
                    {{-- @if ($pembiayaan->nasabah->skpd_status_perkawinan_id == 2)
                        @if ($idebPasangan)
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="ifIdebPasangan"><small class="text-danger">*
                                    </small>Upload IDEB Pasangan</label>
                                <input type="hidden" name="foto[7][foto_lama]"
                                    value="{{ old('foto', $idebPasangan->foto) }}">
                                <input type="hidden" name="foto[7][id]" value="{{ $idebPasangan->id }}">
                                <input type="file" name="foto[7][foto]" id="ifIdebPasangan" class="form-control"
                                    required>
                                <input type="hidden" name="foto[7][kategori]" value="IDEB Pasangan" />
                            </div>
                        @else
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="ifIdebPasangan"><small class="text-danger">*
                                    </small>Upload IDEB Pasangan</label>
                                <input type="file" name="foto[7][foto]" id="ifIdebPasangan" class="form-control"
                                    required>
                                <input type="hidden" name="foto[7][kategori]" value="IDEB Pasangan" />
                            </div>
                        @endif
                    @endif --}}

                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="pengeluaranLainnya">Pengeluaran Lainnya (Per
                            Bulan)</label>
                        <input type="text" name="pengeluaran_lainnya" class="form-control numeral-mask"
                            placeholder="Rp." value="{{ old('pengeluaran_lainnya', $pembiayaan->pengeluaran_lainnya ?? 0) }}" id="pengeluaranLainnya" />
                    </div>
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="keteranganPengeluaranLainnya">Keterangan Pengeluaran
                            Lainnya
                            (Per Bulan)</label>
                        <input type="text" name="keterangan_pengeluaran_lainnya" class="form-control"
                            id="keteranganPengeluaranLainnya" placeholder="Isikan Keterangan Pengeluaran Lainnya"
                            value="{{ old('keterangan_pengeluaran_lainnya', $pembiayaan->keterangan_pengeluaran_lainnya) }}" />
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
            <div id="formLampiran" class="content" role="tabpanel" aria-labelledby="form-lampiran-trigger">
                <div class="content-header">
                    <h5 class="mb-0">Data Lampiran</h5>
                    <small>Lampiran Proposal</small>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="modalFotoPemohon">
                                    Foto Pemohon
                                </label>
                                <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalFotoPemohon">
                                    Lihat
                                </button>
                            </div>
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="perbaruiFotoPemohon">
                                    Perbarui Lampiran
                                </label>
                                <select class="select2 w-100" name="perbarui_foto_pemohon" id="perbaruiFotoPemohon"
                                    onChange="changePerbaruiFotoPemohon()">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak" selected>Tidak
                                    </option>
                                </select>
                            </div>
                            <div class="row hide" id="ifPerbaruiFotoPemohon" style="margin-left:0.5px;">
                                <div class="mb-1 col-md-8">
                                    <label class="form-label" for="fotoPemohon"><small class="text-danger">*
                                        </small>Upload Lampiran
                                    </label>
                                    <input type="file" name="foto_pemohon" id="fotoPemohon"
                                        class="form-control" />
                                    @if ($fotoPemohon?->foto)
                                        <input type="hidden" name="foto_pemohon_lama"
                                            value="{{ $fotoPemohon->foto }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($pembiayaan->nasabah->skpd_status_perkawinan_id == 2)
                        <div class="col-md-6">
                            <div class="row">
                                <div class="mb-1 col-md-4">
                                    <label class="form-label" for="modalFotoPasangan">
                                        Foto Pasangan
                                    </label>
                                    <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                                        data-bs-target="#modalFotoPasangan">
                                        Lihat
                                    </button>
                                </div>
                                <div class="mb-1 col-md-4">
                                    <label class="form-label" for="perbaruiFotoPasangan">
                                        Perbarui Lampiran
                                    </label>
                                    <select class="select2 w-100" name="perbarui_foto_pasangan"
                                        id="perbaruiFotoPasangan" onChange="changePerbaruiFotoPasangan()">
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak" selected>Tidak
                                        </option>
                                    </select>
                                </div>
                                <div class="row hide" id="ifPerbaruiFotoPasangan" style="margin-left:0.5px;">
                                    <div class="mb-1 col-md-8">
                                        <label class="form-label" for="fotoPasangan"><small class="text-danger">*
                                            </small>Upload Lampiran
                                        </label>
                                        <input type="file" name="foto_pasangan" id="fotoPasangan"
                                            class="form-control" />
                                        @if ($fotoPasangan?->foto)
                                            <input type="hidden" name="foto_pasangan_lama"
                                                value="{{ $fotoPasangan->foto }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="col-md-6">
                        <div class="row">
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="modalFotoKtp">
                                    Foto KTP
                                </label>
                                <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalFotoKtp">
                                    Lihat
                                </button>
                            </div>
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="perbaruiFotoKtp">
                                    Perbarui Lampiran
                                </label>
                                <select class="select2 w-100" name="perbarui_foto_ktp" id="perbaruiFotoKtp"
                                    onChange="changePerbaruiFotoKtp()">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak" selected>Tidak
                                    </option>
                                </select>
                            </div>
                            <div class="row hide" id="ifPerbaruiFotoKtp" style="margin-left:0.5px;">
                                <div class="mb-1 col-md-8">
                                    <label class="form-label" for="fotoKtp"><small class="text-danger">*
                                        </small>Upload Lampiran
                                    </label>
                                    <input type="file" name="foto_ktp" id="fotoKtp" class="form-control" />
                                    @if ($fotoKtp?->foto)
                                        <input type="hidden" name="foto_ktp_lama" value="{{ $fotoKtp->foto }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="modalFotoDiriKtp">
                                    Foto Diri bersama KTP
                                </label>
                                <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalFotoDiriKtp">
                                    Lihat
                                </button>
                            </div>
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="perbaruiFotoDiriKtp">
                                    Perbarui Lampiran
                                </label>
                                <select class="select2 w-100" name="perbarui_foto_diri_ktp" id="perbaruiFotoDiriKtp"
                                    onChange="changePerbaruiFotoDiriKtp()">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak" selected>Tidak
                                    </option>
                                </select>
                            </div>
                            <div class="row hide" id="ifPerbaruiFotoDiriKtp" style="margin-left:0.5px;">
                                <div class="mb-1 col-md-8">
                                    <label class="form-label" for="fotoDiriKtp"><small class="text-danger">*
                                        </small>Upload Lampiran
                                    </label>
                                    <input type="file" name="foto_diri_ktp" id="fotoDiriKtp"
                                        class="form-control" />
                                    @if ($fotoDiriBersamaKtp?->foto)
                                        <input type="hidden" name="foto_diri_ktp_lama"
                                            value="{{ $fotoDiriBersamaKtp->foto }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="modalFotoKk">
                                    Foto KK
                                </label>
                                <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalFotoKk">
                                    Lihat
                                </button>
                            </div>
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="perbaruiFotoKk">
                                    Perbarui Lampiran
                                </label>
                                <select class="select2 w-100" name="perbarui_foto_kk" id="perbaruiFotoKk"
                                    onChange="changePerbaruiFotoKk()">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak" selected>Tidak
                                    </option>
                                </select>
                            </div>
                            <div class="row hide" id="ifPerbaruiFotoKk" style="margin-left:0.5px;">
                                <div class="mb-1 col-md-8">
                                    <label class="form-label" for="fotoKk"><small class="text-danger">*
                                        </small>Upload Lampiran
                                    </label>
                                    <input type="file" name="foto_kk" id="fotoKk" class="form-control" />
                                    @if ($fotoKk?->foto)
                                        <input type="hidden" name="foto_kk_lama" value="{{ $fotoKk->foto }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($pembiayaan->nasabah->skpd_status_perkawinan_id > 1)
                        <div class="col-md-6">
                            <div class="row">
                                <div class="mb-1 col-md-4">
                                    <label class="form-label" for="modalFotoAktaNikahCerai">
                                        Foto Akta Nikah/Cerai
                                    </label>
                                    <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                                        data-bs-target="#modalFotoAktaNikahCerai">
                                        Lihat
                                    </button>
                                </div>
                                <div class="mb-1 col-md-4">
                                    <label class="form-label" for="perbaruiFotoAktaNikahCerai">
                                        Perbarui Lampiran
                                    </label>
                                    <select class="select2 w-100" name="perbarui_foto_akta_nikah_cerai"
                                        id="perbaruiFotoAktaNikahCerai" onChange="changePerbaruiFotoAktaNikahCerai()">
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak" selected>Tidak
                                        </option>
                                    </select>
                                </div>
                                <div class="row hide" id="ifPerbaruiFotoAktaNikahCerai" style="margin-left:0.5px;">
                                    <div class="mb-1 col-md-8">
                                        <label class="form-label" for="fotoAktaNikahCerai"><small
                                                class="text-danger">*
                                            </small>Upload Lampiran
                                        </label>
                                        <input type="file" name="foto_akta_nikah_cerai" id="fotoAktaNikahCerai"
                                            class="form-control" />
                                        @if ($fotoStatus?->foto)
                                            <input type="hidden" name="foto_akta_nikah_cerai_lama"
                                                value="{{ $fotoStatus->foto }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="col-md-6">
                        <div class="row">
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="modalFotoSk">
                                    Foto SK
                                </label>
                                <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalFotoSk">
                                    Lihat
                                </button>
                            </div>
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="perbaruiFotoSk">
                                    Perbarui Lampiran
                                </label>
                                <select class="select2 w-100" name="perbarui_foto_sk" id="perbaruiFotoSk"
                                    onChange="changePerbaruiFotoSk()">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak" selected>Tidak
                                    </option>
                                </select>
                            </div>
                            <div class="row hide" id="ifPerbaruiFotoSk" style="margin-left:0.5px;">
                                <div class="mb-1 col-md-8">
                                    <label class="form-label" for="fotoSk"><small class="text-danger">*
                                        </small>Upload Lampiran
                                    </label>
                                    <input type="file" name="foto_sk" id="fotoSk" class="form-control" />
                                    @if ($pembiayaan->sk_pengangkatan)
                                        <input type="hidden" name="foto_sk_lama"
                                            value="{{ $pembiayaan->sk_pengangkatan }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="modalFotoJaminan">
                                    Foto Jaminan
                                </label>
                                <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalFotoJaminan">
                                    Lihat
                                </button>
                            </div>
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="perbaruiFotoJaminan">
                                    Perbarui Lampiran
                                </label>
                                <select class="select2 w-100" name="perbarui_foto_jaminan" id="perbaruiFotoJaminan"
                                    onChange="changePerbaruiFotoJaminan()">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak" selected>Tidak
                                    </option>
                                </select>
                            </div>
                            <div class="row hide" id="ifPerbaruiFotoJaminan" style="margin-left:0.5px;">
                                <div class="mb-1 col-md-8">
                                    <label class="form-label" for="fotoJaminan"><small class="text-danger">*
                                        </small>Upload Lampiran
                                    </label>
                                    <input type="file" name="foto_jaminan" id="fotoJaminan"
                                        class="form-control" />
                                    @if ($fotoJaminan?->dokumen_jaminan)
                                        <input type="hidden" name="foto_jaminan_lama"
                                            value="{{ $fotoJaminan->dokumen_jaminan }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="modalFotoJaminanLainnya">
                                    Foto Jaminan Lainnya
                                </label>
                                <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalFotoJaminanLainnya">
                                    Lihat
                                </button>
                            </div>
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="perbaruiFotoJaminanLainnya">
                                    Perbarui Lampiran
                                </label>
                                <select class="select2 w-100" name="perbarui_foto_jaminan_lainnya"
                                    id="perbaruiFotoJaminanLainnya" onChange="changePerbaruiFotoJaminanLainnya()">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak" selected>Tidak
                                    </option>
                                </select>
                            </div>
                            <div class="row hide" id="ifPerbaruiFotoJaminanLainnya" style="margin-left:0.5px;">
                                <div class="mb-1 col-md-8">
                                    <label class="form-label" for="fotoJaminanLainnya"><small class="text-danger">*
                                        </small>Upload Lampiran
                                    </label>
                                    <input type="hidden" name="id_jaminan_lainnya"
                                        value="{{ $lastIdJaminanLainnya + 1 }}">
                                    <input type="file" name="foto_jaminan_lainnya" id="fotoJaminanLainnya"
                                        class="form-control" />
                                    @if ($fotoJaminanLainnya)
                                        <input type="hidden" name="id_jaminan_lainnya"
                                            value="{{ $fotoJaminanLainnya->id }}">
                                        <input type="hidden" name="foto_jaminan_lainnya_lama"
                                            value="{{ $fotoJaminanLainnya->dokumen_jaminan_lainnya }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="modalFotoKeuangan">
                                    Foto Keuangan
                                </label>
                                <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalFotoKeuangan">
                                    Lihat
                                </button>
                            </div>
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="perbaruiFotoKeuangan">
                                    Perbarui Lampiran
                                </label>
                                <select class="select2 w-100" name="perbarui_foto_keuangan" id="perbaruiFotoKeuangan"
                                    onChange="changePerbaruiFotoKeuangan()">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak" selected>Tidak
                                    </option>
                                </select>
                            </div>
                            <div class="row hide" id="ifPerbaruiFotoKeuangan" style="margin-left:0.5px;">
                                <div class="mb-1 col-md-8">
                                    <label class="form-label" for="fotoKeuangan"><small class="text-danger">*
                                        </small>Upload Lampiran
                                    </label>
                                    <input type="file" name="foto_keuangan" id="fotoKeuangan"
                                        class="form-control" />
                                    @if ($pembiayaan->dokumen_keuangan)
                                        <input type="hidden" name="foto_keuangan_lama"
                                            value="{{ $pembiayaan->dokumen_keuangan }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="modalFotoSlipGaji">
                                    Foto Slip Gaji
                                </label>
                                <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalFotoSlipGaji">
                                    Lihat
                                </button>
                            </div>
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="perbaruiFotoSlipGaji">
                                    Perbarui Lampiran
                                </label>
                                <select class="select2 w-100" name="perbarui_foto_slip_gaji" id="perbaruiFotoSlipGaji"
                                    onChange="changePerbaruiFotoSlipGaji()">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak" selected>Tidak
                                    </option>
                                </select>
                            </div>
                            <div class="row hide" id="ifPerbaruiFotoSlipGaji" style="margin-left:0.5px;">
                                <div class="mb-1 col-md-8">
                                    <label class="form-label" for="fotoSlipGaji"><small class="text-danger">*
                                        </small>Upload Lampiran
                                    </label>
                                    <input type="file" name="foto_slip_gaji" id="fotoSlipGaji"
                                        class="form-control" />
                                    @if ($pembiayaan->dokumen_slip_gaji)
                                        <input type="hidden" name="foto_slip_gaji_lama"
                                            value="{{ $pembiayaan->dokumen_slip_gaji }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="modalIdeb">
                                    IDEB
                                </label>
                                <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#modalIdeb">
                                    Lihat
                                </button>
                            </div>
                            <div class="mb-1 col-md-4">
                                <label class="form-label" for="perbaruiIdeb">
                                    Perbarui Lampiran
                                </label>
                                <select class="select2 w-100" name="perbarui_ideb" id="perbaruiIdeb"
                                    onChange="changePerbaruiIdeb()">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak" selected>Tidak
                                    </option>
                                </select>
                            </div>
                            <div class="row hide" id="ifPerbaruiIdeb" style="margin-left:0.5px;">
                                <div class="mb-1 col-md-8">
                                    <label class="form-label" for="ideb"><small class="text-danger">*
                                        </small>Upload Lampiran
                                    </label>
                                    <input type="file" name="ideb" id="ideb" class="form-control" />
                                    @if ($ideb?->foto)
                                        <input type="hidden" name="ideb_lama" value="{{ $ideb->foto }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($pembiayaan->nasabah->skpd_status_perkawinan_id == 2)
                        <div class="col-md-6">
                            <div class="row">
                                <div class="mb-1 col-md-4">
                                    <label class="form-label" for="modalIdebPasangan">
                                        IDEB Pasangan
                                    </label>
                                    <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                                        data-bs-target="#modalIdebPasangan">
                                        Lihat
                                    </button>
                                </div>
                                <div class="mb-1 col-md-4">
                                    <label class="form-label" for="perbaruiIdebPasangan">
                                        Perbarui Lampiran
                                    </label>
                                    <select class="select2 w-100" name="perbarui_ideb_pasangan" id="perbaruiIdebPasangan"
                                        onChange="changePerbaruiIdebPasangan()">
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak" selected>Tidak
                                        </option>
                                    </select>
                                </div>
                                <div class="row hide" id="ifPerbaruiIdebPasangan" style="margin-left:0.5px;">
                                    <div class="mb-1 col-md-8">
                                        <label class="form-label" for="idebPasangan"><small class="text-danger">*
                                            </small>Upload Lampiran
                                        </label>
                                        <input type="file" name="ideb_pasangan" id="idebPasangan"
                                            class="form-control" />
                                        @if ($idebPasangan)
                                            <input type="hidden" name="ideb_pasangan_lama"
                                                value="{{ $idebPasangan->foto }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />

                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-prev">
                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button type="submit" id="btnSubmitForm" class="btn btn-success">Simpan Revisi dan Buka Komite</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </form>
    </div>
    </div>
    </div>
    </section>
    </div>

    <!-- Modals -->
    <!-- Modal Hapus Slik -->
    <div class="modal fade" id="modalHapusSlik" tabindex="-1" aria-labelledby="modalHapusSlik"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/skpd/revisi/{{ $pembiayaan->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body px-sm-5 mx-50 pb-5">
                        <h5 class="text-center">Apakah Anda yakin ingin menghapus semua
                            data Slik?</h5>
                        <br />
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary form-control" type="submit">Ya
                                    <input type="hidden" name="delete_repeater" value="Hapus Slik">
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-danger form-control"
                                    data-bs-dismiss="modal">Tidak</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Hapus Slik -->

    <!-- Modal Hapus Slik Pasangan -->
    <div class="modal fade" id="modalHapusSlikPasangan" tabindex="-1" aria-labelledby="modalHapusSlikPasangan"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/skpd/revisi/{{ $pembiayaan->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body px-sm-5 mx-50 pb-5">
                        <h5 class="text-center">Apakah Anda yakin ingin menghapus semua
                            data Slik Pasangan?</h5>
                        <br />
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary form-control" type="submit">Ya
                                    <input type="hidden" name="delete_repeater" value="Hapus Slik Pasangan">
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-danger form-control"
                                    data-bs-dismiss="modal">Tidak</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Hapus Slik Pasangan -->

    <!-- Foto Pemohon -->
    <div class="modal fade" id="modalFotoPemohon" tabindex="-1" aria-labelledby="modalFotoPemohon"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-sm-5 mx-50 pb-5">
                    <h4 class="text-center mb-1" style="margin-top:-40px;">
                        <strong>Foto Pemohon</strong>
                    </h4>
                    <iframe src="{{ asset('storage/' . ($fotoPemohon?->foto ?? '')) }}" class="d-block w-100"
                        height="600"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!--/ Foto Pemohon  -->

    @if ($pembiayaan->nasabah->skpd_status_perkawinan_id == 2)
        <!-- Foto Pasangan -->
        <div class="modal fade" id="modalFotoPasangan" tabindex="-1" aria-labelledby="modalFotoPasangan"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-sm-5 mx-50 pb-5">
                        <h4 class="text-center mb-1" style="margin-top:-40px;">
                            <strong>Foto Pasangan</strong>
                        </h4>
                        <iframe src="{{ asset('storage/' . ($fotoPasangan?->foto ?? '')) }}" class="d-block w-100"
                            height="600"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Foto Pasangan  -->
    @endif

    <!-- Foto KTP -->
    <div class="modal fade" id="modalFotoKtp" tabindex="-1" aria-labelledby="modalFotoKtp" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-sm-5 mx-50 pb-5">
                    <h4 class="text-center mb-1" style="margin-top:-40px;">
                        <strong>Foto KTP</strong>
                    </h4>
                    <iframe src="{{ asset('storage/' . ($fotoKtp?->foto ?? '')) }}" class="d-block w-100"
                        height="600"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!--/ Foto KTP  -->

    <!-- Foto Diri bersama KTP -->
    <div class="modal fade" id="modalFotoDiriKtp" tabindex="-1" aria-labelledby="modalFotoDiriKtp"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-sm-5 mx-50 pb-5">
                    <h4 class="text-center mb-1" style="margin-top:-40px;">
                        <strong>Foto Diri bersama KTP</strong>
                    </h4>
                    <iframe src="{{ asset('storage/' . ($fotoDiriBersamaKtp?->foto ?? '')) }}" class="d-block w-100"
                        height="600"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!--/ Foto Diri bersama KTP  -->

    <!-- Foto KK -->
    <div class="modal fade" id="modalFotoKk" tabindex="-1" aria-labelledby="modalFotoKk" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-sm-5 mx-50 pb-5">
                    <h4 class="text-center mb-1" style="margin-top:-40px;">
                        <strong>Foto KK</strong>
                    </h4>
                    <iframe src="{{ asset('storage/' . ($fotoKk?->foto ?? '')) }}" class="d-block w-100"
                        height="600"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!--/ Foto KK  -->

    @if ($pembiayaan->nasabah->skpd_status_perkawinan_id > 1)
        <!-- Foto Akta Nikah/Cerai -->
        <div class="modal fade" id="modalFotoAktaNikahCerai" tabindex="-1"
            aria-labelledby="modalFotoAktaNikahCerai" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-sm-5 mx-50 pb-5">
                        <h4 class="text-center mb-1" style="margin-top:-40px;">
                            <strong>Foto Akta Nikah/Cerai</strong>
                        </h4>
                        <iframe src="{{ asset('storage/' . ($fotoStatus?->foto ?? '')) }}" class="d-block w-100"
                            height="600"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Foto Akta Nikah/Cerai  -->
    @endif

    <!-- Foto SK -->
    <div class="modal fade" id="modalFotoSk" tabindex="-1" aria-labelledby="modalFotoSk" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-sm-5 mx-50 pb-5">
                    <h4 class="text-center mb-1" style="margin-top:-40px;">
                        <strong>Foto SK</strong>
                    </h4>
                    <iframe src="{{ asset('storage/' . $pembiayaan->sk_pengangkatan) }}" class="d-block w-100"
                        height="600"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!--/ Foto SK  -->

    <!-- Foto Jaminan -->
    <div class="modal fade" id="modalFotoJaminan" tabindex="-1" aria-labelledby="modalFotoJaminan"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-sm-5 mx-50 pb-5">
                    <h4 class="text-center mb-1" style="margin-top:-40px;">
                        <strong>Foto Jaminan</strong>
                    </h4>
                    <iframe src="{{ asset('storage/' . ($fotoJaminan?->dokumen_jaminan ?? '')) }}" class="d-block w-100"
                        height="600"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!--/ Foto Jaminan  -->

    <!-- Foto Jaminan Lainnya -->
    <div class="modal fade" id="modalFotoJaminanLainnya" tabindex="-1" aria-labelledby="modalFotoJaminanLainnya"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-sm-5 mx-50 pb-5">
                    <h4 class="text-center mb-1" style="margin-top:-40px;">
                        <strong>Foto Jaminan Lainnya</strong>
                    </h4>
                    @if ($fotoJaminanLainnya?->dokumen_jaminan_lainnya)
                        <iframe src="{{ asset('storage/' . $fotoJaminanLainnya->dokumen_jaminan_lainnya) }}"
                            class="d-block w-100" height="600"></iframe>
                    @else
                        <br />
                        <br />
                        <center>
                            <h3>Tidak ada Foto Jaminan Lainnya</h3>
                        </center>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--/ Foto Jaminan Lainnya  -->

    <!-- Foto Keuangan -->
    <div class="modal fade" id="modalFotoKeuangan" tabindex="-1" aria-labelledby="modalFotoKeuangan"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-sm-5 mx-50 pb-5">
                    <h4 class="text-center mb-1" style="margin-top:-40px;">
                        <strong>Foto Keuangan</strong>
                    </h4>
                    <iframe src="{{ asset('storage/' . $pembiayaan->dokumen_keuangan) }}" class="d-block w-100"
                        height="600"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!--/ Foto Keuangan  -->

    <!-- Foto Slip Gaji -->
    <div class="modal fade" id="modalFotoSlipGaji" tabindex="-1" aria-labelledby="modalFotoSlipGaji"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-sm-5 mx-50 pb-5">
                    <h4 class="text-center mb-1" style="margin-top:-40px;">
                        <strong>Foto Slip Gaji</strong>
                    </h4>
                    <iframe src="{{ asset('storage/' . $pembiayaan->dokumen_slip_gaji) }}" class="d-block w-100"
                        height="600"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!--/ Foto Slip Gaji  -->

    <!-- IDEB -->
    <div class="modal fade" id="modalIdeb" tabindex="-1" aria-labelledby="modalIdeb" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-sm-5 mx-50 pb-5">
                    <h4 class="text-center mb-1" style="margin-top:-40px;">
                        <strong>IDEB</strong>
                    </h4>
                    <iframe src="{{ asset('storage/' . ($ideb?->foto ?? '')) }}" class="d-block w-100"
                        height="600"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!--/ IDEB  -->

    @if ($pembiayaan->nasabah->skpd_status_perkawinan_id == 2)
        <!-- IDEB Pasangan -->
        <div class="modal fade" id="modalIdebPasangan" tabindex="-1" aria-labelledby="modalIdebPasangan"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-sm-5 mx-50 pb-5">
                        <h4 class="text-center mb-1" style="margin-top:-40px;">
                            <strong>IDEB Pasangan</strong>
                        </h4>
                        @if ($idebPasangan)
                            <iframe src="{{ asset('storage/' . $idebPasangan->foto) }}" class="d-block w-100"
                                height="600"></iframe>
                        @else
                            <br />
                            <br />
                            <center>
                                <h3>Tidak ada IDEB Pasangan</h3>
                            </center>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--/ IDEB Pasangan  -->
    @endif

    <!-- End Modals -->

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

        //Fungsi show hide lampiran
        function changePerbaruiFotoPemohon() {
            var perbaruiFotoPemohon = document.getElementById("perbaruiFotoPemohon");
            if (perbaruiFotoPemohon.value == "Ya") {
                document.getElementById("ifPerbaruiFotoPemohon").classList.toggle("hide"),
                    document.getElementById("fotoPemohon").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiFotoPemohon").classList = "hide",
                    document.getElementById("fotoPemohon").removeAttribute("required");
            }
        }

        function changePerbaruiFotoPasangan() {
            var perbaruiFotoPasangan = document.getElementById("perbaruiFotoPasangan");
            if (perbaruiFotoPasangan.value == "Ya") {
                document.getElementById("ifPerbaruiFotoPasangan").classList.toggle("hide"),
                    document.getElementById("fotoPasangan").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiFotoPasangan").classList = "hide",
                    document.getElementById("fotoPasangan").removeAttribute("required");
            }
        }

        function changePerbaruiFotoKtp() {
            var perbaruiFotoKtp = document.getElementById("perbaruiFotoKtp");
            if (perbaruiFotoKtp.value == "Ya") {
                document.getElementById("ifPerbaruiFotoKtp").classList.toggle("hide"),
                    document.getElementById("fotoKtp").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiFotoKtp").classList = "hide",
                    document.getElementById("fotoKtp").removeAttribute("required");
            }
        }

        function changePerbaruiFotoDiriKtp() {
            var perbaruiFotoDiriKtp = document.getElementById("perbaruiFotoDiriKtp");
            if (perbaruiFotoDiriKtp.value == "Ya") {
                document.getElementById("ifPerbaruiFotoDiriKtp").classList.toggle("hide"),
                    document.getElementById("fotoDiriKtp").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiFotoDiriKtp").classList = "hide",
                    document.getElementById("fotoDiriKtp").removeAttribute("required");
            }
        }

        function changePerbaruiFotoKk() {
            var perbaruiFotoKk = document.getElementById("perbaruiFotoKk");
            if (perbaruiFotoKk.value == "Ya") {
                document.getElementById("ifPerbaruiFotoKk").classList.toggle("hide"),
                    document.getElementById("fotoKk").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiFotoKk").classList = "hide",
                    document.getElementById("fotoKk").removeAttribute("required");
            }
        }

        function changePerbaruiFotoAktaNikahCerai() {
            var perbaruiFotoAktaNikahCerai = document.getElementById("perbaruiFotoAktaNikahCerai");
            if (perbaruiFotoAktaNikahCerai.value == "Ya") {
                document.getElementById("ifPerbaruiFotoAktaNikahCerai").classList.toggle("hide"),
                    document.getElementById("fotoAktaNikahCerai").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiFotoAktaNikahCerai").classList = "hide",
                    document.getElementById("fotoAktaNikahCerai").removeAttribute("required");
            }
        }

        function changePerbaruiFotoSk() {
            var perbaruiFotoSk = document.getElementById("perbaruiFotoSk");
            if (perbaruiFotoSk.value == "Ya") {
                document.getElementById("ifPerbaruiFotoSk").classList.toggle("hide"),
                    document.getElementById("fotoSk").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiFotoSk").classList = "hide",
                    document.getElementById("fotoSk").removeAttribute("required");
            }
        }

        function changePerbaruiFotoJaminan() {
            var perbaruiFotoJaminan = document.getElementById("perbaruiFotoJaminan");
            if (perbaruiFotoJaminan.value == "Ya") {
                document.getElementById("ifPerbaruiFotoJaminan").classList.toggle("hide"),
                    document.getElementById("fotoJaminan").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiFotoJaminan").classList = "hide",
                    document.getElementById("fotoJaminan").removeAttribute("required");
            }
        }

        function changePerbaruiFotoJaminanLainnya() {
            var perbaruiFotoJaminanLainnya = document.getElementById("perbaruiFotoJaminanLainnya");
            if (perbaruiFotoJaminanLainnya.value == "Ya") {
                document.getElementById("ifPerbaruiFotoJaminanLainnya").classList.toggle("hide"),
                    document.getElementById("fotoJaminanLainnya").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiFotoJaminanLainnya").classList = "hide",
                    document.getElementById("fotoJaminanLainnya").removeAttribute("required");
            }
        }

        function changePerbaruiFotoKeuangan() {
            var perbaruiFotoKeuangan = document.getElementById("perbaruiFotoKeuangan");
            if (perbaruiFotoKeuangan.value == "Ya") {
                document.getElementById("ifPerbaruiFotoKeuangan").classList.toggle("hide"),
                    document.getElementById("fotoKeuangan").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiFotoKeuangan").classList = "hide",
                    document.getElementById("fotoKeuangan").removeAttribute("required");
            }
        }

        function changePerbaruiFotoSlipGaji() {
            var perbaruiFotoSlipGaji = document.getElementById("perbaruiFotoSlipGaji");
            if (perbaruiFotoSlipGaji.value == "Ya") {
                document.getElementById("ifPerbaruiFotoSlipGaji").classList.toggle("hide"),
                    document.getElementById("fotoSlipGaji").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiFotoSlipGaji").classList = "hide",
                    document.getElementById("fotoSlipGaji").removeAttribute("required");
            }
        }

        function changePerbaruiIdeb() {
            var perbaruiIdeb = document.getElementById("perbaruiIdeb");
            if (perbaruiIdeb.value == "Ya") {
                document.getElementById("ifPerbaruiIdeb").classList.toggle("hide"),
                    document.getElementById("ideb").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiIdeb").classList = "hide",
                    document.getElementById("ideb").removeAttribute("required");
            }
        }

        function changePerbaruiIdebPasangan() {
            var perbaruiIdebPasangan = document.getElementById("perbaruiIdebPasangan");
            if (perbaruiIdebPasangan.value == "Ya") {
                document.getElementById("ifPerbaruiIdebPasangan").classList.toggle("hide"),
                    document.getElementById("idebPasangan").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiIdebPasangan").classList = "hide",
                    document.getElementById("idebPasangan").removeAttribute("required");
            }
        }
    </script>
    <!-- END: Content-->


@endsection
