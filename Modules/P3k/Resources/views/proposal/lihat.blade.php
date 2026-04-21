@extends('p3k::layouts.main')

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
                            <h2 class="content-header-title mb-0">Form Proposal</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/p3k">P3K</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/p3k/proposal">Proposal</a>
                                    </li>
                                    <li class="breadcrumb-item active">Lengkapi Proposal
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body" style="margin-top:-75px;">
                <!-- Form Pengajuan -->
                <section class="modern-horizontal-wizard">
                    <div class="bs-stepper wizard-modern modern-wizard-example">
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#form" role="tab" id="account-details-modern-trigger">
                                <button type="button" class="step-trigger">

                                </button>
                            </div>

                        </div>
                        <div class="bs-stepper-content">
                            <form method="POST" action="/p3k/proposal/{{ $pembiayaan->id }}" id="proposalP3k"
                                class="needs-validation" enctype="multipart/form-data" novalidate>
                                @method('PUT')
                                @csrf
                                <div id="form" class="content" role="tabpanel"
                                    aria-labelledby="account-details-trigger">
                                    <div class="content-header">
                                        <small class="text-danger">* Wajib Diisi</small>
                                    </div>
                                    <div class="content-header">
                                        <h5 class="mb-0 mt-2">Pengajuan Pembiayaan P3K</h5>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="ao"><small class="text-danger">*
                                                </small>Nama
                                                AO</label>
                                            <select class="select2 w-100" name="user_id" id="ao"
                                                data-placeholder="Pilih AO" disabled>
                                                <option value=""></option>
                                                @foreach ($aos as $ao)
                                                    <option value="{{ $ao->user->id }}"
                                                        {{ $pembiayaan->user_id == $ao->user->id ? 'selected' : '' }}>
                                                        {{ $ao->user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="pengajuanFasAktifKe"><small class="text-danger">*
                                                </small>Pengajuan Fasilitas Aktif Ke-</label>
                                            <input type="number" name="pengajuan_fas_aktif_ke" class="form-control"
                                                placeholder="Masukkan Fasilitas Aktif Ke-" id="pengajuanFasAktifKe"
                                                value="{{ $pembiayaan->pengajuan_fas_aktif_ke }}" disabled />
                                        </div>
                                        @if ($pembiayaan->pengajuan_fas_aktif_ke >= 2)
                                            <div class="row">
                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="totalAngsuranBtbFasAktif"><small
                                                            class="text-danger">*
                                                        </small>Total Angsuran BTB
                                                        Yang Aktif</label>
                                                    <input type="text" name="total_angsuran_btb_fas_aktif"
                                                        class="form-control numeral-mask"
                                                        placeholder="Masukkan Total Angsuran BTB Yang Masih Aktif"
                                                        id="totalAngsuranBtbFasAktif"
                                                        value="{{ $pembiayaan->total_angsuran_btb_fas_aktif }} "disabled />
                                                </div>
                                            </div>
                                        @endif
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tanggal"><small class="text-danger">*
                                                </small>Tanggal Pengajuan</label>
                                            <input type="text" id="tanggal" class="form-control flatpickr-basic"
                                                name="tanggal_pengajuan" placeholder="DD-MM-YYYY"
                                                value="{{ date('d-m-Y', strtotime($pembiayaan->tanggal_pengajuan)) }}"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jenispenggunaan"><small class="text-danger">*
                                                </small>Jenis Penggunaan</label>
                                            <select class="select2 w-100" name="jenis_penggunaan" id="jenispenggunaan"
                                                data-placeholder="Pilih Jenis Penggunaan" disabled>
                                                <option value=""></option>
                                                <option value="Modal Kerja"
                                                    {{ $pembiayaan->jenis_penggunaan == 'Modal Kerja' ? 'selected' : '' }}>
                                                    Modal Kerja</option>
                                                <option value="Renovasi Rumah"
                                                    {{ $pembiayaan->jenis_penggunaan == 'Renovasi Rumah' ? 'selected' : '' }}>
                                                    Renovasi Rumah</option>
                                                <option value="Pendidikan"
                                                    {{ $pembiayaan->jenis_penggunaan == 'Pendidikan' ? 'selected' : '' }}>
                                                    Pendidikan</option>
                                                <option value="Kesehatan"
                                                    {{ $pembiayaan->jenis_penggunaan == 'Kesehatan' ? 'selected' : '' }}>
                                                    Kesehatan</option>
                                                <option value="Pernikahan"
                                                    {{ $pembiayaan->jenis_penggunaan == 'Pernikahan' ? 'selected' : '' }}>
                                                    Pernikahan</option>
                                                <option value="Pembelian Kendaraan Bermotor"
                                                    {{ $pembiayaan->jenis_penggunaan == 'Pembelian Kendaraan Bermotor' ? 'selected' : '' }}>
                                                    Pembelian Kendaraan Bermotor</option>
                                                <option value="Ibadah Umroh"
                                                    {{ $pembiayaan->jenis_penggunaan == 'Ibadah Umroh' ? 'selected' : '' }}>
                                                    Ibadah Umroh</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nominalPembiayaan"><small
                                                    class="text-danger">*
                                                </small>Nominal Pembiayaan</label>
                                            <input type="text" name="nominal_pembiayaan"
                                                class="form-control numeral-mask" placeholder="Rp."
                                                id="nominalPembiayaan" value="{{ $pembiayaan->nominal_pembiayaan }}"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tenor"><small class="text-danger">*
                                                </small>Tenor (Bulan)</label>
                                            <input type="number" name="tenor" class="form-control"
                                                placeholder="Masukkan Tenor (Bulan)" id="tenor"
                                                value="{{ $pembiayaan->tenor }}" disabled />
                                            {{-- <select class="select2 w-100" name="tenor" id="tenor"
                                                data-placeholder="Pilih Tenor" disabled>
                                                <option value=""></option>
                                                <option value="12" {{ $pembiayaan->tenor == '12' ? 'selected' : '' }}>
                                                    12
                                                    Bulan</option>
                                                <option value="24" {{ $pembiayaan->tenor == '24' ? 'selected' : '' }}>
                                                    24
                                                    Bulan</option>
                                                <option value="36" {{ $pembiayaan->tenor == '36' ? 'selected' : '' }}>
                                                    36 Bulan</option>
                                                <option value="48" {{ $pembiayaan->tenor == '48' ? 'selected' : '' }}>
                                                    48 Bulan</option>
                                                <option value="60" {{ $pembiayaan->tenor == '60' ? 'selected' : '' }}>
                                                    60 Bulan</option>
                                                <option value="72" {{ $pembiayaan->tenor == '72' ? 'selected' : '' }}>
                                                    72 Bulan</option>
                                                <option value="84" {{ $pembiayaan->tenor == '84' ? 'selected' : '' }}>
                                                    84 Bulan</option>
                                                <option value="96" {{ $pembiayaan->tenor == '96' ? 'selected' : '' }}>
                                                    96 Bulan</option>
                                                <option value="108"
                                                    {{ $pembiayaan->tenor == '108' ? 'selected' : '' }}>108 Bulan</option>
                                                <option value="120"
                                                    {{ $pembiayaan->tenor == '120' ? 'selected' : '' }}>120 Bulan</option>
                                            </select> --}}
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="content-header">
                                        <h5 class="mb-0 mt-2">Data Diri</h5>
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
                                                </small>No.
                                                KTP</label>
                                            <input type="number" name="no_ktp" id="noktp" class="form-control"
                                                placeholder="Masukkan Nomor KTP"
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
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jenis_kelamin"><small class="text-danger">*
                                                </small>Jenis Kelamin</label>
                                            <div>
                                                &ensp;
                                                <input type="radio" name="jenis_kelamin" class="form-check-input"
                                                    id="pria" value="Pria"
                                                    {{ $pembiayaan->nasabah->jenis_kelamin == 'Pria' ? 'checked' : '' }}
                                                    disabled />
                                                <label class="form-label" for="pria">&nbsp;Pria</label>
                                                <br>
                                                &ensp;
                                                <input type="radio" name="jenis_kelamin" class="form-check-input"
                                                    id="wanita" value="Wanita"
                                                    {{ $pembiayaan->nasabah->jenis_kelamin == 'Wanita' ? 'checked' : '' }}
                                                    disabled />
                                                <label class="form-label" for="wanita">&nbsp;Wanita</label>
                                            </div>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="agama"><small class="text-danger">*
                                                </small>Agama</label>
                                            <select class="select2 w-100" name="agama" id="agama"
                                                data-placeholder="Pilih Agama" disabled>
                                                <option value="">
                                                </option>
                                                <option value="Islam"
                                                    {{ $pembiayaan->nasabah->agama == 'Islam' ? 'selected' : '' }}>Islam
                                                </option>
                                                <option value="Protestan"
                                                    {{ $pembiayaan->nasabah->agama == 'Protestan' ? 'selected' : '' }}>
                                                    Protestan</option>
                                                <option value="Katholik"
                                                    {{ $pembiayaan->nasabah->agama == 'Katholik' ? 'selected' : '' }}>
                                                    Katholik</option>
                                                <option value="Budha"
                                                    {{ $pembiayaan->nasabah->agama == 'Budha' ? 'selected' : '' }}>Budha
                                                </option>
                                                <option value="Hindu"
                                                    {{ $pembiayaan->nasabah->agama == 'Hindu' ? 'selected' : '' }}>Hindu
                                                </option>
                                                <option value="Kong Hu Chu"
                                                    {{ $pembiayaan->nasabah->agama == 'Kong Hu Chu' ? 'selected' : '' }}>
                                                    Kong Hu Chu</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tinggiBadan"><small class="text-danger">*
                                                </small>Tinggi Badan (cm)</label>
                                            <input type="number" name="tinggi_badan" id="tinggiBadan"
                                                class="form-control" placeholder="Masukkan Tinggi Badan (cm)"
                                                value="{{ $pembiayaan->nasabah->tinggi_badan }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="beratBadan"><small class="text-danger">*
                                                </small>Berat Badan (kg)</label>
                                            <input type="number" name="berat_badan" id="beratBadan"
                                                class="form-control" placeholder="Masukkan Berat Badan (kg)"
                                                value="{{ $pembiayaan->nasabah->berat_badan }}" disabled />
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
                                                                        name="desa_kelurahan" id="kelurahanKtp"
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
                                                                        name="kabkota" id="kabKotaKtp"
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
                                                                            name="kabkota_domisili" id="kabKotaDomisili"
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
                                            <select class="select2 w-100" name="status_pernikahan" id="statusPernikahan"
                                                onChange="changeStatusPernikahan()"
                                                data-placeholder="Pilih Status Pernikahan" disabled>
                                                <option value=""></option>
                                                <option value="Belum Menikah"
                                                    {{ $pembiayaan->nasabah->status_pernikahan == 'Belum Menikah' ? 'selected' : '' }}>
                                                    Belum Menikah</option>
                                                <option value="Menikah"
                                                    {{ $pembiayaan->nasabah->status_pernikahan == 'Menikah' ? 'selected' : '' }}>
                                                    Menikah</option>
                                                <option value="Janda/Duda - Meninggal"
                                                    {{ $pembiayaan->nasabah->status_pernikahan == 'Janda/Duda - Meninggal' ? 'selected' : '' }}>
                                                    Janda/Duda - Meninggal</option>
                                                <option value="Janda/Duda - Cerai"
                                                    {{ $pembiayaan->nasabah->status_pernikahan == 'Janda/Duda - Cerai' ? 'selected' : '' }}>
                                                    Janda/Duda - Cerai</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jmlTanggungan"><small class="text-danger">*
                                                </small>Jumlah Anak/Tanggungan</label>
                                            <input type="number" name="jml_tanggungan" id="jmlTanggungan"
                                                class="form-control" placeholder="Jumlah Anak/Tanggungan"
                                                value="{{ $pembiayaan->nasabah->jml_tanggungan }}" disabled />
                                        </div>
                                        @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                                            <div class="mb-1 col-md-6 hide" id="ifMenikahNamaPasangan">
                                                <label class="form-label" for="namaPasangan">Nama Lengkap Pasangan</label>
                                                <input type="text" name="nama_pasangan_nasabah" id="namaPasangan"
                                                    class="form-control" placeholder="Nama Lengkap Pasangan"
                                                    value="{{ $pembiayaan->nasabah->nama_pasangan_nasabah }}" disabled />
                                            </div>
                                            <div class="mb-1 col-md-6 hide" id="ifMenikahKtpPasangan">
                                                <label class="form-label" for="noKtpPasangan">No
                                                    KTP Pasangan</label>
                                                <input type="number" name="no_ktp_pasangan" id="noKtpPasangan"
                                                    class="form-control" placeholder="Masukkan Nomor KTP pasangan"
                                                    value="{{ $pembiayaan->nasabah->no_ktp_pasangan }}" disabled />
                                            </div>
                                        @endif
                                        {{-- <div class="mb-1 col-md-6">
                                                <label class="form-label" for="nonpwp"><small class="text-danger">*
                                                    </small>No. NPWP</label>
                                                <input type="number" name="no_npwp" id="nonpwp" class="form-control"
                                                    placeholder="Masukkan Nomor NPWP Anda" disabled />
                                            </div> --}}
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="noTelp">No.
                                                Telepon</label>
                                            <input type="text" name="no_telp" id="noTelp" class="form-control"
                                                placeholder="Masukkan Nomor Telepon"
                                                value="{{ $pembiayaan->nasabah->no_telp }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="noHp"><small class="text-danger">*
                                                </small>No. Handphone</label>
                                            <input type="text" name="no_hp" id="noHp" class="form-control"
                                                placeholder="Masukkan Nomor Handphone"
                                                value="{{ $pembiayaan->nasabah->no_hp }}" disabled />
                                        </div>
                                    </div>

                                    <hr />
                                    <div class="content-header">
                                        <h5 class="mb-0 mt-2">Lampiran</h5>
                                        <small class="text-muted">Upload Lampiran Yang Sesuai.</small>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-4">
                                            <button type="button" class="btn btn-md btn-primary w-100"
                                                data-bs-toggle="modal" data-bs-target="#modalFotoKtp">
                                                Foto KTP
                                            </button>
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <button type="button" class="btn btn-md btn-primary w-100"
                                                data-bs-toggle="modal" data-bs-target="#modalFotoKartuKeluarga">
                                                Foto Kartu Keluarga
                                            </button>
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <button type="button" class="btn btn-md btn-primary w-100"
                                                data-bs-toggle="modal" data-bs-target="#modalFotoNpwp">
                                                Foto NPWP
                                            </button>
                                        </div>
                                        @if ($pembiayaan->nasabah->status_pernikahan != 'Belum Menikah')
                                            @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                                                <div class="mb-1 col-md-4">
                                                    <button type="button" class="btn btn-md btn-primary w-100"
                                                        data-bs-toggle="modal" data-bs-target="#modalFotoKtpPasangan">
                                                        Foto KTP Pasangan
                                                    </button>
                                                </div>
                                            @endif
                                            <div class="mb-1 col-md-4">
                                                <button type="button" class="btn btn-md btn-primary w-100"
                                                    data-bs-toggle="modal" data-bs-target="#fotoAktaStatusPernikahan">
                                                    Foto Akta Status Pernikahan/Perceraian
                                                </button>
                                            </div>
                                        @endif
                                        <div class="mb-1 col-md-4">
                                            <button type="button" class="btn btn-md btn-primary w-100"
                                                data-bs-toggle="modal" data-bs-target="#modalFotoSk">
                                                Foto SK
                                            </button>
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <button type="button" class="btn btn-md btn-primary w-100"
                                                data-bs-toggle="modal" data-bs-target="#modalFotoLampiranKeuangan">
                                                Foto Lampiran Keuangan
                                            </button>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="dokumenIdeb"><small class="text-danger">*
                                                </small>Upload IDEB</label>
                                            <input type="file" name="dokumen_ideb" id="dokumenIdeb"
                                                class="form-control" required accept="application/pdf" />
                                        </div>
                                        @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="ifIdebPasangan"><small
                                                        class="text-danger">*
                                                    </small>Upload IDEB Pasangan</label>
                                                <input type="file" name="foto[1][foto]" id="ifIdebPasangan"
                                                    class="form-control" required accept="application/pdf">
                                                <input type="hidden" name="foto[1][kategori]" value="IDEB Pasangan" />
                                            </div>
                                        @endif
                                    </div>
                                    <hr />

                                    {{-- <div class="content-header">
                                        <small>IDEB Nasabah</small>
                                    </div>
                                    <section id="form-repeater">
                                        <div class="row">
                                            <div class="mb-1 col-md-12">
                                                <div class="repeater-default">
                                                    <div data-repeater-list="ideb">
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
                                    @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                                        <div class="content-header">
                                            <small>IDEB Pasangan Nasabah</small>
                                        </div>
                                        <section id="form-repeater">
                                            <div class="row">
                                                <div class="mb-1 col-md-12">
                                                    <div class="repeater-default">
                                                        <div data-repeater-list="ideb_pasangan">
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
                                                                            <input type="number"
                                                                                class="form-control persen" name="margin"
                                                                                id="margin" aria-describedby="margin"
                                                                                placeholder="%" />
                                                                        </div>
                                                                    </div>

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
                                                                            <label class="form-label"
                                                                                for="itemquantity">Kol
                                                                                Tertinggi </label>
                                                                            <select class="form-control"
                                                                                name="kol_tertinggi"
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
                                    @endif
                                    <hr /> --}}

                                    <div class="content-header">
                                        <h5 class="mb-0 mt-2">Data Orang Terdekat</h5>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="namaOt"><small class="text-danger">*
                                                </small>Nama</label>
                                            <input type="text" name="nama_orang_terdekat" id="namaOt"
                                                class="form-control" placeholder="Masukkan Nama Orang Terdekat"
                                                value="{{ $pembiayaan->nasabah->orangTerdekat->nama_orang_terdekat }}"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="noTelpOt"><small class="text-danger">*
                                                </small>No.
                                                Telepon</label>
                                            <input type="text" name="no_telp_orang_terdekat" id="noTelpOt"
                                                class="form-control" placeholder="Masukkan Nomor Telepon Orang Terdekat"
                                                value="{{ $pembiayaan->nasabah->orangTerdekat->no_telp_orang_terdekat }}"
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
                                                                    value="{{ $pembiayaan->nasabah->orangTerdekat->alamat_orang_terdekat }}"
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
                                                                    value="{{ $pembiayaan->nasabah->orangTerdekat->rt_orang_terdekat }}"
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
                                                                    value="{{ $pembiayaan->nasabah->orangTerdekat->rw_orang_terdekat }}"
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
                                                                    value="{{ $pembiayaan->nasabah->orangTerdekat->desa_kelurahan_orang_terdekat }}"
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
                                                                    value="{{ $pembiayaan->nasabah->orangTerdekat->kecamatan_orang_terdekat }}"
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
                                                                    value="{{ $pembiayaan->nasabah->orangTerdekat->kabkota_orang_terdekat }}"
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
                                                                    value="{{ $pembiayaan->nasabah->orangTerdekat->provinsi_orang_terdekat }}"
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
                                                                    value="{{ $pembiayaan->nasabah->orangTerdekat->kd_pos_orang_terdekat }}"
                                                                    disabled />
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
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="dinas"><small class="text-danger">*
                                                </small>Dinas</label>
                                            <input type="text" name="dinas" id="dinas" class="form-control"
                                                placeholder="Masukkan Nama Dinas (PPPK DINKES/DISDIK/Teknis)"
                                                value="{{ $pembiayaan->nasabah->pekerjaan->dinas }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="namaUnitKerja"><small class="text-danger">*
                                                </small>Nama Unit Kerja</label>
                                            <input type="text" name="nama_unit_kerja" id="namaUnitKerja"
                                                class="form-control" placeholder="Masukkan Nama Unit Kerja"
                                                value="{{ $pembiayaan->nasabah->pekerjaan->nama_unit_kerja }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jabatan"><small class="text-danger">*
                                                </small>Jabatan</label>
                                            <input type="text" name="jabatan" id="jabatan" class="form-control"
                                                placeholder="Masukkan Jabatan"
                                                value="{{ $pembiayaan->nasabah->pekerjaan->jabatan }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="noSk"><small class="text-danger">*
                                                </small>No. SK</label>
                                            <input type="text" name="no_sk" id="noSk" class="form-control"
                                                placeholder="Masukkan Nomor SK"
                                                value="{{ $pembiayaan->nasabah->pekerjaan->no_sk }}" disabled />
                                        </div>
                                    </div>

                                    <hr />
                                    <div class="content-header">
                                        <h5 class="mb-0 mt-2">Data Pendapatan</h5>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="gajiPokok"><small class="text-danger">*
                                                </small>Gaji Pokok (Per Bulan)</label>
                                            <input type="text" name="gaji_pokok" class="form-control numeral-mask"
                                                placeholder="Rp." id="gajiPokok" value="{{ $pembiayaan->gaji_pokok }}"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="gajiTpp"><small class="text-danger">*
                                                </small>Pendapatan TPP (Per Bulan)</label>
                                            <input type="text" name="gaji_tpp" class="form-control numeral-mask"
                                                placeholder="Rp." id="gajiTpp" value="{{ $pembiayaan->gaji_tpp }}"
                                                disabled />
                                        </div>
                                        @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="gajiPasangan"><small class="text-danger">*
                                                    </small>Pendapatan Pasangan (Per Bulan)</label>
                                                <input type="text" name="gaji_pasangan"
                                                    class="form-control numeral-mask" placeholder="Rp." id="gajiPasangan"
                                                    value="0" value="{{ $pembiayaan->gaji_pasangan }}" disabled />
                                            </div>
                                        @endif
                                    </div>

                                    <hr />
                                    <div class="content-header">
                                        <h5 class="mb-0 mt-2">Data Pengeluaran</h5>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="pengeluaranLainnya">Pengeluaran Lainnya
                                                (Per
                                                Bulan)</label>
                                            <input type="text" name="pengeluaran_lainnya"
                                                class="form-control numeral-mask" placeholder="-" id="pengeluaranLainnya"
                                                value="{{ $pembiayaan->pengeluaran_lainnya }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="keteranganPengeluaranLainnya">Keterangan
                                                Pengeluaran Lainnya
                                                (Per
                                                Bulan)</label>
                                            <input type="text" name="keterangan_pengeluaran_lainnya"
                                                class="form-control" id="keteranganPengeluaranLainnya" placeholder="-"
                                                value="{{ $pembiayaan->keterangan_pengeluaran_lainnya }}" disabled />
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


                            <!-- Modal Lampiran -->

                            <!-- Foto KTP -->
                            <div class="modal fade" id="modalFotoKtp" tabindex="-1" aria-labelledby="addNewCardTitle"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header bg-transparent">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-sm-5 mx-50 pb-5">
                                            <h4 class="text-center mb-1" style="margin-top:-40px;">
                                                <strong>Foto KTP</strong>
                                            </h4>
                                            <iframe src="{{ asset('storage/' . $fotoKtp->foto) }}" class="d-block w-100"
                                                height="600"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Foto KTP  -->

                            <!-- Foto Kartu Keluarga -->
                            <div class="modal fade" id="modalFotoKartuKeluarga" tabindex="-1"
                                aria-labelledby="addNewCardTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header bg-transparent">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-sm-5 mx-50 pb-5">
                                            <h4 class="text-center mb-1" style="margin-top:-40px;">
                                                <strong>Foto Kartu Keluarga</strong>
                                            </h4>
                                            <iframe src="{{ asset('storage/' . $fotoKartuKeluarga->foto) }}"
                                                class="d-block w-100" height="600"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Foto Kartu Keluarga  -->

                            <!-- Foto NPWP -->
                            <div class="modal fade" id="modalFotoNpwp" tabindex="-1" aria-labelledby="addNewCardTitle"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header bg-transparent">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-sm-5 mx-50 pb-5">
                                            <h4 class="text-center mb-1" style="margin-top:-40px;">
                                                <strong>Foto NPWP</strong>
                                            </h4>
                                            <iframe src="{{ asset('storage/' . $fotoNpwp->foto) }}" class="d-block w-100"
                                                height="600"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Foto NPWP  -->

                            @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                                <!-- Foto KTP Pasangan -->
                                <div class="modal fade" id="modalFotoKtpPasangan" tabindex="-1"
                                    aria-labelledby="addNewCardTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header bg-transparent">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                                <h4 class="text-center mb-1" style="margin-top:-40px;">
                                                    <strong>Foto KTP Pasangan</strong>
                                                </h4>
                                                <iframe src="{{ asset('storage/' . $fotoKtpPasangan->foto) }}"
                                                    class="d-block w-100" height="600"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Foto KTP Pasangan  -->
                            @endif

                            @if ($pembiayaan->nasabah->status_pernikahan != 'Belum Menikah')
                                <!-- Foto Akta Status Pernikahan/Perceraian -->
                                <div class="modal fade" id="fotoAktaStatusPernikahan" tabindex="-1"
                                    aria-labelledby="addNewCardTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header bg-transparent">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                                <h4 class="text-center mb-1" style="margin-top:-40px;">
                                                    <strong>Foto Akta Status Pernikahan/Perceraian</strong>
                                                </h4>
                                                <iframe src="{{ asset('storage/' . $fotoStatusPernikahan->foto) }}"
                                                    class="d-block w-100" height="600"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Foto Akta Status Pernikahan/Perceraian  -->
                            @endif

                            <!-- Foto SK -->
                            <div class="modal fade" id="modalFotoSk" tabindex="-1" aria-labelledby="addNewCardTitle"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header bg-transparent">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-sm-5 mx-50 pb-5">
                                            <h4 class="text-center mb-1" style="margin-top:-40px;">
                                                <strong>Foto SK</strong>
                                            </h4>
                                            <iframe
                                                src="{{ asset('storage/' . $pembiayaan->nasabah->pekerjaan->dokumen_sk) }}"
                                                class="d-block w-100" height="600"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Foto SK  -->

                            <!-- Foto Lampiran Keuangan -->
                            <div class="modal fade" id="modalFotoLampiranKeuangan" tabindex="-1"
                                aria-labelledby="addNewCardTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header bg-transparent">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-sm-5 mx-50 pb-5">
                                            <h4 class="text-center mb-1" style="margin-top:-40px;">
                                                <strong>Foto Lampiran Keuangan</strong>
                                            </h4>
                                            <iframe src="{{ asset('storage/' . $pembiayaan->dokumen_keuangan) }}"
                                                class="d-block w-100" height="600"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Foto Lampiran Keuangan  -->

                            <!-- /Modal Lampiran -->
                        </div>
                    </div>
                </section>
                <!-- /Form Pengajuan -->
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

        // Numeral mask - format dengan titik (format Indonesia)
        document.querySelectorAll('.numeral-mask').forEach(function(el) {
            el.addEventListener('input', function() {
                el.value = formatNumeral(el.value, {
                    numeralThousandsGroupStyle: 'thousand',
                    delimiter: '.',
                    numeralDecimalMark: ',',
                    numeralDecimalScale: 0
                });
            });
        });

        // function changeStatusPernikahan() {
        //     var status = document.getElementById("statusPernikahan");
        //     if (status.value == 1) { //Belum Menikah
        //         document.getElementById("fotoPasanganPemohon").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoPasanganPemohon").removeAttribute("disabled"),
        //             document.getElementById("kategoriPasanganPemohon").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoAktaNikahCerai").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoAktaNikahCerai").removeAttribute("disabled"),
        //             document.getElementById("kategoriAktaNikahCerai").setAttribute("disabled", "disabled");
        //     } else if (status.value == 2) { //Sudah Menikah
        //         document.getElementById("fotoPasanganPemohon").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoPasanganPemohon").removeAttribute("disabled"),
        //             document.getElementById("kategoriPasanganPemohon").removeAttribute("disabled"),
        //             document.getElementById("fotoAktaNikahCerai").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoAktaNikahCerai").removeAttribute("disabled"),
        //             document.getElementById("kategoriAktaNikahCerai").removeAttribute("disabled");
        //     } else { //Cerai
        //         document.getElementById("fotoPasanganPemohon").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoPasanganPemohon").removeAttribute("disabled"),
        //             document.getElementById("kategoriPasanganPemohon").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoAktaNikahCerai").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoAktaNikahCerai").removeAttribute("disabled"),
        //             document.getElementById("kategoriAktaNikahCerai").removeAttribute("disabled");
        //     }
        // }
    </script>
@endsection
