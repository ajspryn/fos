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

        #ifIdebPasangan {
            height: 40px;
            transition: all 0.5s;
        }

        #ifIdebPasangan.hide {
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
                                    <li class="breadcrumb-item active">Lengkapi Proposal
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
                            <div class="step" data-target="#form1" role="tab" id="account-details-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="user" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Data Diri</span>
                                        <span class="bs-stepper-subtitle">Isi Data Diri dan Pekerjaan</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#form2" role="tab" id="personal-info-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="dollar-sign" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Keuangan</span>
                                        <span class="bs-stepper-subtitle">Isi Data Keuangan</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form method='POST' action="/skpd/proposal/{{ $pembiayaan->id }}" class="needs-validation"
                                enctype="multipart/form-data" novalidate>
                                @method('PUT')
                                @csrf
                                <div id="form1" class="content" role="tabpanel"
                                    aria-labelledby="account-details-trigger">
                                    <div class="content-header">
                                        {{-- <h5 class="mb-0">Account Details</h5> --}}
                                        <small class="text-danger">* Wajib Diisi</small>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-12">
                                            <label class="form-label" for="ao"><small class="text-danger">*
                                                </small>Nama AO</label>
                                            <select class="select2 w-100" name="user_id" id="ao" disabled>
                                                <option value="{{ $pembiayaan->user->id }}">{{ $pembiayaan->user->name }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tanggal"><small class="text-danger">*
                                                </small>Tanggal Pengajuan</label>
                                            <input type="text" id="tanggal" class="form-control flatpickr-basic"
                                                name="tanggal_pengajuan"
                                                value="{{ date('d-m-Y', strtotime($pembiayaan->tanggal_pengajuan)) }}"
                                                placeholder="DD-MM-YYYY" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jenispenggunaan"><small class="text-danger">*
                                                </small>Jenis Penggunaan</label>
                                            <select class="select2 w-100" name="skpd_jenis_penggunaan_id"
                                                id="jenispenggunaan" disabled>
                                                <option value="{{ $pembiayaan->jenis_penggunaan->id }}">
                                                    {{ $pembiayaan->jenis_penggunaan->jenis_penggunaan }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="sektor"><small class="text-danger">*
                                                </small>Sektor Ekonomi</label>
                                            <select class="select2 w-100" name="skpd_sektor_ekonomi_id" id="sektor"
                                                data-placeholder="Pilih Sektor Ekonomi" required>
                                                <option value=""></option>
                                                @foreach ($sektors as $sektor)
                                                    <option value="{{ $sektor->id }}">{{ $sektor->nama_sektor_ekonomi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="akad"><small class="text-danger">*
                                                </small>Akad</label>
                                            <select class="select2 w-100" name="skpd_akad_id" id="akad"
                                                data-placeholder="Pilih Akad" required>
                                                <option value=""></option>
                                                @foreach ($akads as $akad)
                                                    <option value="{{ $akad->id }}">{{ $akad->nama_akad }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nominal_pembiayaan"><small
                                                    class="text-danger">* </small>Nominal Pembiayaan</label>
                                            <input type="text" name="nominal_pembiayaan"
                                                class="form-control numeral-mask" placeholder="Rp."
                                                id="nominal_pembiayaan" value="Rp.{{ $pembiayaan->nominal_pembiayaan }}"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="tenorr"><small class="text-danger">*
                                                </small>Tenor</label>
                                            <select class="select2 w-100" name="tenor" id="tenorr" disabled>
                                                <option value="{{ $pembiayaan->tenor }}">{{ $pembiayaan->tenor }} Bulan
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-2">
                                            <label class="form-label" for="rate"><small class="text-danger">*
                                                </small>Rate</label>
                                            <input type="text" name="rate" class="form-control numeral-mask"
                                                placeholder="%" id="rate" required />
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
                                                value="{{ $pembiayaan->nasabah->nama_nasabah }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="noktp"><small class="text-danger">*
                                                </small>No KTP</label>
                                            <input type="number" name="no_ktp" id="noktp" class="form-control"
                                                placeholder="Masukan Nomor KTP"
                                                value="{{ $pembiayaan->nasabah->no_ktp }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tempatlahir"><small class="text-danger">*
                                                </small>Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                                class="form-control" placeholder="Maukan Tempat Lahir"
                                                value="{{ $pembiayaan->nasabah->tempat_lahir }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tgllahir"><small class="text-danger">*
                                                </small>Tanggal Lahir</label>
                                            <input type="text" id="tgl_lahir" class="form-control flatpickr-basic"
                                                name="tgl_lahir" placeholder="DD-MM-YYYY"
                                                value="{{ date('d-m-Y', strtotime($pembiayaan->nasabah->tgl_lahir)) }}"
                                                disabled />
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
                                                                        disabled />
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
                                                                        value="{{ $pembiayaan->nasabah->rt }}" disabled />
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
                                                                        value="{{ $pembiayaan->nasabah->rw }}" disabled />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="kelurahanKtp"><small
                                                                            class="text-danger">*
                                                                        </small>Kelurahan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="kelurahan" id="kelurahanKtp"
                                                                        aria-describedby="kelurahanKtp"
                                                                        placeholder="Kelurahan"
                                                                        value="{{ $pembiayaan->nasabah->desa_kelurahan }}"
                                                                        disabled />
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
                                                                        disabled />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="kabKotaKtp"><small
                                                                            class="text-danger">*
                                                                        </small>Kabupaten/Kota</label>
                                                                    <input type="text" class="form-control"
                                                                        name="kab_kota" id="kabKotaKtp"
                                                                        aria-describedby="kabKotaKtp"
                                                                        placeholder="Kabupaten/Kota"
                                                                        value="{{ $pembiayaan->nasabah->kabkota }}"
                                                                        disabled />
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
                                                                        disabled />
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
                                                                        disabled />
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
                                                                            </small>Alamat Tempat Tinggal
                                                                            (Domisili)</label>
                                                                        <input type="text" class="form-control"
                                                                            id="alamatDomisili" name="alamat_domisili"
                                                                            aria-describedby="alamatDomisili"
                                                                            placeholder="Alamat Tempat Tinggal (Domisili)"
                                                                            value="{{ $pembiayaan->nasabah->alamat_domisili }}"
                                                                            disabled />
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
                                                                            disabled />
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
                                                                            disabled />
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
                                                                            disabled />
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
                                                                            disabled />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="kabKotaDomisili"><small
                                                                                class="text-danger">*
                                                                            </small>Kabupaten/Kota</label>
                                                                        <input type="text" class="form-control"
                                                                            name="kab_kota_domisili" id="kabKotaDomisili"
                                                                            aria-describedby="kabKotaDomisili"
                                                                            placeholder="Kabupaten/Kota"
                                                                            value="{{ $pembiayaan->nasabah->kabkota_domisili }}"
                                                                            disabled />
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
                                                                            disabled />
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
                                                                            disabled />
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
                                                disabled>
                                                <option value="{{ $pembiayaan->nasabah->status_perkawinan->id }}">
                                                    {{ $pembiayaan->nasabah->status_perkawinan->nama_status_perkawinan }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jumlahanak"><small class="text-danger">*
                                                </small>Jumlah Anak/Tanggungan</label>
                                            <select class="select2 w-100" name="skpd_tanggungan_id" id="jumlahanak"
                                                disabled>
                                                <option value="{{ $pembiayaan->nasabah->tanggungan->id }}">
                                                    {{ $pembiayaan->nasabah->tanggungan->banyak_tanggungan }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nonpwp">No NPWP</label>
                                            <input type="number" name="no_npwp" id="nonpwp" class="form-control"
                                                placeholder="Masukan Nomor NPWP"
                                                value="{{ $pembiayaan->nasabah->no_npwp }}" />
                                        </div>

                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="notelp"><small class="text-danger">*
                                                </small>No Telepon</label>
                                            <input type="text" name="no_telp" id="notelp"
                                                class="form-control prefix-mask" placeholder="Masukan Nomor telepon"
                                                value="{{ $pembiayaan->nasabah->no_telp }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jenisNasabah"><small class="text-danger">*
                                                </small>Jenis Nasabah</label>
                                            <select class="select2 w-100" name="skpd_jenis_nasabah_id" id="jenisNasabah"
                                                data-placeholder="Pilih Jenis Nasabah" required>
                                                <option value=""></option>
                                                @foreach ($jenisNasabahs as $jenisNasabah)
                                                    <option value="{{ $jenisNasabah->id }}">
                                                        {{ $jenisNasabah->keterangan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row" style="margin-top:20px;">
                                            <div class="mb-1 col-md-2" style="margin-left:100px;">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#fotodiri">
                                                    Foto Diri
                                                </button>
                                            </div>
                                            <div class="mb-1 col-md-2" style="margin-left:-50px;">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#fotoktp">
                                                    Foto KTP
                                                </button>
                                            </div>
                                            <div class="mb-1 col-md-3" style="margin-left:-50px;">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#fotodiribersamaktp">
                                                    Foto Diri Bersama KTP
                                                </button>
                                            </div>
                                            <div class="mb-1 col-md-3" style="margin-left:-50px;">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#fotokk">
                                                    Foto Kartu Keluarga
                                                </button>
                                            </div>
                                            <div class="mb-1 col-md-3" style="margin-left:-60px;">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#fotostatus">
                                                    Foto Status Perkawinan
                                                </button>
                                            </div>
                                        </div>
                                        {{-- <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotodiri"><small class="text-danger">* </small>Upload Foto Diri</label>
                                        <input type="file" name="foto[1][foto]" id="fotodiri" rows="3" class="form-control" required/>
                                        <input type="hidden" name="foto[1][kategori]" value="Foto Diri" rows="3" class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotoktp"><small class="text-danger">* </small>Upload Foto KTP</label>
                                        <input type="file" name="foto[2][foto]" id="fotoktp" rows="3" class="form-control"  required/>
                                        <input type="hidden" name="foto[2][kategori]" value="Foto KTP" rows="3" class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotodiriktp"><small class="text-danger">* </small>Upload Foto Diri Bersama KTP</label>
                                        <input type="file" name="foto[3][foto]" id="fotodiriktp" rows="3" class="form-control" required/>
                                        <input type="hidden" name="foto[3][kategori]" value="Foto Diri Bersama KTP" rows="3" class="form-control" />
                                    </div> --}}
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
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="notelpot"><small class="text-danger">*
                                                </small>No Telepon</label>
                                            <input type="text" name="no_telp_orang_terdekat" id="notelpot"
                                                class="form-control prefix-mask1"
                                                placeholder="Masukan Nomor Telepon Orang Terdekat"
                                                value="{{ $pembiayaan->nasabah->orang_terdekat->no_telp_orang_terdekat }}"
                                                disabled />
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
                                                                    disabled />
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
                                                                    disabled />
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
                                                                    disabled />
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
                                                                    disabled />
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
                                                                    disabled />
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
                                                                    disabled />
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
                                                                    disabled />
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
                                                                    disabled />
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
                                                disabled>
                                                <option value="{{ $pembiayaan->instansi->id }}">
                                                    {{ $pembiayaan->instansi->nama_instansi }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="golongan"><small class="text-danger">*
                                                </small>Golongan</label>
                                            <select class="select2 w-100" name="skpd_golongan_id" id="golongan"
                                                disabled>
                                                <option value="{{ $pembiayaan->golongan->id }}">
                                                    {{ $pembiayaan->golongan->nama_golongan }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="jabatan"><small class="text-danger">*
                                                </small>Jabatan</label>
                                            <input type="text" name="jabatan" id="jabatan" class="form-control"
                                                placeholder="Masukkan Jabatan" value="{{ $pembiayaan->jabatan }}"
                                                disabled />
                                        </div>
                                        {{-- <div class="mb-1 col-md-6">
                                        <label class="form-label" for="skpengangkatan"><small class="text-danger">* </small>Upload Softcopy SK Pengangkatan / SK Terakhir</label>
                                        <input type="file" name="sk_pengangkatan" id="skpengangkatan" rows="3" class="form-control" />
                                    </div> --}}
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
                                                disabled>
                                                <option value="{{ $pembiayaan->jaminan->jenis_jaminan->id }}">
                                                    {{ $pembiayaan->jaminan->jenis_jaminan->nama_jaminan }}</option>
                                            </select>
                                        </div>
                                        {{-- <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jaminan_dokumen"><small class="text-danger">* </small>Upload Jaminan</label>
                                        <input type="file" name="dokumen_jaminan" id="jaminan_dokumen" class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="notelpot">Jaminan Lainya</label>
                                        <input type="text" name="nama_jaminan_lainnya" id="notelpot" class="form-control" placeholder="Masukan Jaminan Lainnya" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jaminan_lainnya">Upload Jaminan Lainnya</label>
                                        <input type="file" name="dokumen_jaminan_lainnya" id="jaminan_lainnya" rows="3" class="form-control" />
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
                                <div id="form2" class="content" role="tabpanel"
                                    aria-labelledby="personal-info-modern-trigger">
                                    <div class="content-header">
                                        <h5 class="mb-0">Data Pendapatan</h5>
                                        <small>Isikan Data Pendapatan</small>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="gaji_pokok"><small class="text-danger">*
                                                </small>Gaji Pokok (Per Bulan)</label>
                                            <input type="text" name="gaji_pokok" class="form-control numeral-mask"
                                                placeholder="Rp." id="gaji_pokok" value="{{ $pembiayaan->gaji_pokok }}"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="pendapatan_lainnya"><small
                                                    class="text-danger">* </small>Gaji / Pendapatan Lainnya (Per
                                                Bulan)</label>
                                            <input type="text" name="pendapatan_lainnya"
                                                class="form-control numeral-mask" placeholder="Rp."
                                                value="{{ $pembiayaan->pendapatan_lainnya }}" id="pendapatan_lainnya"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="pendapatan_tpp"><small class="text-danger">*
                                                </small>Pendapatan TPP (Per Bulan)</label>
                                            <input type="text" name="gaji_tpp" class="form-control numeral-mask"
                                                placeholder="Rp." id="pendapatan_tpp"
                                                value="{{ $pembiayaan->gaji_tpp }}" disabled />
                                        </div>
                                    </div>
                                    <div class="content-header">
                                        <h5 class="mb-0">Data Pengeluaran</h5>
                                        <small>IDEB Nasabah</small>
                                    </div>
                                    <section id="form-repeater">
                                        <div class="row">
                                            <div class="mb-1 col-md-12">
                                                <div class="repeater-default">
                                                    <div data-repeater-list="slik">
                                                        <div data-repeater-item>
                                                            <div class="row d-flex align-items-end">
                                                                <div class="col-md-2 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="nama_bank">Nama
                                                                            Bank</label>
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
                                                                        <input type="number" class="form-control persen"
                                                                            name="margin" id="margin"
                                                                            aria-describedby="margin" placeholder="%" />
                                                                    </div>
                                                                </div>

                                                                {{-- <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity">Angsuran</label>
                                                                    <input type="number" class="form-control" name="angsuran" id="angsuran" aria-describedby="itemquantity" placeholder="1"/>
                                                                </div>
                                                            </div> --}}

                                                                <div class="col-md-1 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="itemquantity">Agunan</label>
                                                                        <input type="text" class="form-control"
                                                                            name="agunan" id="agunan"
                                                                            aria-describedby="itemquantity" />
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
                                                                        <label class="form-label" for="itemquantity">Kol
                                                                            Tertinggi </label>
                                                                        <select class="form-control" name="kol_tertinggi"
                                                                            aria-label="kolTertinggiSlik"
                                                                            id="kolTertinggiSlik">
                                                                            <option value="" disabled>Pilih
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
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <a data-repeater-create class="btn btn-icon btn-primary"
                                                            type="button">
                                                            <i data-feather="plus" class="me-25"></i>
                                                            <span>Tambah</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                    </section>
                                    <div class="content-header">
                                        <small>IDEB Pasangan Nasabah</small>
                                    </div>
                                    <section id="form-repeater">
                                        <div class="row">
                                            <div class="mb-1 col-md-12">
                                                <div class="repeater-default">
                                                    <div data-repeater-list="slikpasangan">
                                                        <div data-repeater-item>
                                                            <div class="row d-flex align-items-end">
                                                                <div class="col-md-2 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label" for="nama_bank">Nama
                                                                            Bank</label>
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
                                                                        <input type="number" class="form-control persen"
                                                                            name="margin" id="margin"
                                                                            aria-describedby="margin" placeholder="%" />
                                                                    </div>
                                                                </div>

                                                                {{-- <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity">Angsuran</label>
                                                                    <input type="number" class="form-control" name="angsuran" id="angsuran" aria-describedby="itemquantity" placeholder="1"/>
                                                                </div>
                                                            </div> --}}

                                                                <div class="col-md-1 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="itemquantity">Agunan</label>
                                                                        <input type="text" class="form-control"
                                                                            name="agunan" id="agunan"
                                                                            aria-describedby="itemquantity" />
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
                                                                        <label class="form-label" for="itemquantity">Kol
                                                                            Tertinggi </label>
                                                                        <select class="form-control" name="kol_tertinggi"
                                                                            aria-label="kolTertinggiSlikPasangan"
                                                                            id="kolTertinggiSlikPasangan">
                                                                            <option value="" disabled>Pilih
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
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <a data-repeater-create class="btn btn-icon btn-primary"
                                                            type="button">
                                                            <i data-feather="plus" class="me-25"></i>
                                                            <span>Tambah</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                    </section>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="ideb"><small class="text-danger">*
                                                </small>Upload IDEB Pemohon</label>
                                            <input type="file" name="foto[1][foto]" id="ideb"
                                                class="form-control" required>
                                            <input type="hidden" name="foto[1][kategori]" value="IDEB" />
                                        </div>
                                        @if ($pembiayaan->nasabah->skpd_status_perkawinan_id == 2)
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="ifIdebPasangan"><small
                                                        class="text-danger">*
                                                    </small>Upload IDEB Pasangan</label>
                                                <input type="file" name="foto[2][foto]" id="ifIdebPasangan"
                                                    class="form-control" required>
                                                <input type="hidden" name="foto[2][kategori]" value="IDEB Pasangan" />
                                            </div>
                                        @endif
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="pengeluaranLainnya">Pengeluaran Lainnya (Per
                                                Bulan)</label>
                                            <input type="text" name="pengeluaran_lainnya"
                                                class="form-control numeral-mask" placeholder="Rp."
                                                id="pengeluaranLainnya" value="{{ $pembiayaan->pengeluaran_lainnya }}"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="keteranganPengeluaranLainnya">Keterangan
                                                Pengeluaran
                                                Lainnya
                                                (Per Bulan)</label>
                                            <input type="text" name="keterangan_pengeluaran_lainnya"
                                                class="form-control" id="keteranganPengeluaranLainnya"
                                                value="{{ $pembiayaan->keterangan_pengeluaran_lainnya }}" disabled />
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- /Modern Horizontal Wizard -->

                <!-- foto diri  -->
                <div class="modal fade" id="fotodiri" tabindex="-1" aria-labelledby="addNewCardTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                <h1 class="text-center mb-1" id="addNewCardTitle">{{ $fotodiri->kategori }}</h1>
                                <p class="text-center">Lampiran Foto Nasabah</p>
                                <div class="card-body">
                                    <img src="{{ asset('storage/' . $fotodiri->foto) }}" class="d-block w-100" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ foto diri  -->
                <!-- foto ktp  -->
                <div class="modal fade" id="fotoktp" tabindex="-1" aria-labelledby="addNewCardTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                <h1 class="text-center mb-1" id="addNewCardTitle">{{ $fotoktp->kategori }}</h1>
                                <p class="text-center">Lampiran Foto Nasabah</p>
                                <div class="card-body">
                                    <img src="{{ asset('storage/' . $fotoktp->foto) }}" class="d-block w-100" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ foto ktp  -->
                <!-- foto diri bersama ktp  -->
                <div class="modal fade" id="fotodiribersamaktp" tabindex="-1" aria-labelledby="addNewCardTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                <h1 class="text-center mb-1" id="addNewCardTitle">{{ $fotodiribersamaktp->kategori }}
                                </h1>
                                <p class="text-center">Lampiran Foto Nasabah</p>
                                <div class="card-body">
                                    <img src="{{ asset('storage/' . $fotodiribersamaktp->foto) }}"
                                        class="d-block w-100" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ foto diri bersama ktp -->
                @if ($fotokk)
                    <!-- foto kk  -->
                    <div class="modal fade" id="fotokk" tabindex="-1" aria-labelledby="addNewCardTitle"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                    <h1 class="text-center mb-1" id="addNewCardTitle">{{ $fotokk->kategori }}
                                    </h1>
                                    <p class="text-center">Lampiran Foto Nasabah</p>
                                    <div class="card-body">
                                        <img src="{{ asset('storage/' . $fotokk->foto) }}" class="d-block w-100" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ foto kk  -->
                @endif
                @if ($fotostatus)
                    <!-- foto status  -->
                    <div class="modal fade" id="fotostatus" tabindex="-1" aria-labelledby="addNewCardTitle"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                    <h1 class="text-center mb-1" id="addNewCardTitle">{{ $fotostatus->kategori }}
                                    </h1>
                                    <p class="text-center">Lampiran Foto Nasabah</p>
                                    <div class="card-body">
                                        <img src="{{ asset('storage/' . $fotostatus->foto) }}" class="d-block w-100" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ foto status  -->
                @endif

            </div>
        </div>
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



        // function changeStatusPernikahan() {
        //     var status = document.getElementById("statusPernikahan");
        //     if (status.value == 1) { //Belum Menikah
        //         document.getElementById("fotoPasanganPemohon").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoPasanganPemohon").removeAttribute("required"),
        //             document.getElementById("kategoriPasanganPemohon").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoAktaNikahCerai").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoAktaNikahCerai").removeAttribute("required"),
        //             document.getElementById("kategoriAktaNikahCerai").setAttribute("disabled", "disabled");
        //     } else if (status.value == 2) { //Sudah Menikah
        //         document.getElementById("fotoPasanganPemohon").setAttribute("required", "required"),
        //             document.getElementById("fotoPasanganPemohon").removeAttribute("disabled"),
        //             document.getElementById("kategoriPasanganPemohon").removeAttribute("disabled"),
        //             document.getElementById("fotoAktaNikahCerai").setAttribute("required", "required"),
        //             document.getElementById("fotoAktaNikahCerai").removeAttribute("disabled"),
        //             document.getElementById("kategoriAktaNikahCerai").removeAttribute("disabled");
        //     } else { //Cerai
        //         document.getElementById("fotoPasanganPemohon").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoPasanganPemohon").removeAttribute("required"),
        //             document.getElementById("kategoriPasanganPemohon").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoAktaNikahCerai").setAttribute("required", "required"),
        //             document.getElementById("fotoAktaNikahCerai").removeAttribute("disabled"),
        //             document.getElementById("kategoriAktaNikahCerai").removeAttribute("disabled");
        //     }
        // }
    </script>
@endsection
