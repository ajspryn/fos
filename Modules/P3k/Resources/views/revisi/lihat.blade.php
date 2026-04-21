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

        #ifPerbaruiFotoKtpPasangan {
            width: 100%;
            height: 60px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifPerbaruiFotoKtpPasangan.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPerbaruiFotoNpwp {
            width: 100%;
            height: 60px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifPerbaruiFotoNpwp.hide {
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

        #ifPerbaruiFotoStatusPernikahan {
            width: 100%;
            height: 60px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifPerbaruiFotoStatusPernikahan.hide {
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

        #ifPerbaruiFotoLampiranKeuangan {
            width: 100%;
            height: 60px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifPerbaruiFotoLampiranKeuangan.hide {
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
                            <h2 class="content-header-title mb-0">Form Proposal</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/p3k">P3K</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/p3k/revisi">Revisi</a>
                                    </li>
                                    <li class="breadcrumb-item active">Revisi Proposal
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
                            <form method="POST" action="/p3k/revisi/{{ $pembiayaan->id }}" id="revisiProposalP3k"
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
                                                data-placeholder="Pilih AO" required>
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
                                                value="{{ $pembiayaan->pengajuan_fas_aktif_ke }}" required />
                                        </div>
                                        @if ($pembiayaan->pengajuan_fas_aktif_ke >= 2)
                                            <div class="row" id="ifTotalAngsuranBtbFasAktif">
                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="totalAngsuranBtbFasAktif"><small
                                                            class="text-danger">*
                                                        </small>Total Angsuran BTB Yang Aktif</label>
                                                    <input type="text" name="total_angsuran_btb_fas_aktif"
                                                        class="form-control numeral-mask"
                                                        placeholder="Masukkan Total Angsuran BTB Yang Masih Aktif"
                                                        id="totalAngsuranBtbFasAktif"
                                                        value="{{ $pembiayaan->total_angsuran_btb_fas_aktif }}" />
                                                </div>
                                            </div>
                                        @else
                                            <input type="hidden" name="total_angsuran_btb_fas_aktif"
                                                class="form-control numeral-mask" id="totalAngsuranBtbFasAktif"
                                                value="{{ $pembiayaan->total_angsuran_btb_fas_aktif }}" />
                                        @endif
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tanggal"><small class="text-danger">*
                                                </small>Tanggal Pengajuan</label>
                                            <input type="text" id="tanggal" class="form-control flatpickr-basic"
                                                name="tanggal_pengajuan" placeholder="DD-MM-YYYY"
                                                value="{{ date('d-m-Y', strtotime($pembiayaan->tanggal_pengajuan)) }}"
                                                required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jenispenggunaan"><small class="text-danger">*
                                                </small>Jenis Penggunaan</label>
                                            <select class="select2 w-100" name="jenis_penggunaan" id="jenispenggunaan"
                                                data-placeholder="Pilih Jenis Penggunaan" required>
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
                                                required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tenor"><small class="text-danger">*
                                                </small>Tenor (Bulan)</label>
                                            <input type="number" name="tenor" class="form-control"
                                                placeholder="Masukkan Tenor (Bulan)" id="tenor"
                                                value="{{ $pembiayaan->tenor }}" required />
                                            {{-- <select class="select2 w-100" name="tenor" id="tenor"
                                                data-placeholder="Pilih Tenor" required>
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
                                                value="{{ $pembiayaan->nasabah->nama_nasabah }}" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="noktp"><small class="text-danger">*
                                                </small>No.
                                                KTP</label>
                                            <input type="number" name="no_ktp" id="noktp" class="form-control"
                                                placeholder="Masukkan Nomor KTP"
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
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jenis_kelamin"><small class="text-danger">*
                                                </small>Jenis Kelamin</label>
                                            <div>
                                                &ensp;
                                                <input type="radio" name="jenis_kelamin" class="form-check-input"
                                                    id="pria" value="Pria"
                                                    {{ $pembiayaan->nasabah->jenis_kelamin == 'Pria' ? 'checked' : '' }}
                                                    required />
                                                <label class="form-label" for="pria">&nbsp;Pria</label>
                                                <br>
                                                &ensp;
                                                <input type="radio" name="jenis_kelamin" class="form-check-input"
                                                    id="wanita" value="Wanita"
                                                    {{ $pembiayaan->nasabah->jenis_kelamin == 'Wanita' ? 'checked' : '' }}
                                                    required />
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
                                                value="{{ $pembiayaan->nasabah->tinggi_badan }}" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="beratBadan"><small class="text-danger">*
                                                </small>Berat Badan (kg)</label>
                                            <input type="number" name="berat_badan" id="beratBadan"
                                                class="form-control" placeholder="Masukkan Berat Badan (kg)"
                                                value="{{ $pembiayaan->nasabah->berat_badan }}" required />
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
                                                                            </small>Alamat Tempat Tinggal
                                                                            (Domisili)&emsp;<input type="checkbox"
                                                                                id="cbAutoFillDomisili"
                                                                                class="form-check-input"
                                                                                style="width:15px; height:15px;">&nbsp;
                                                                            Sama
                                                                            Dengan Alamat KTP</label>
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
                                            <select class="select2 w-100" name="status_pernikahan" id="statusPernikahan"
                                                onChange="changeStatusPernikahan()"
                                                data-placeholder="Pilih Status Pernikahan" required>
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
                                                value="{{ $pembiayaan->nasabah->jml_tanggungan }}" required />
                                        </div>
                                        @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                                            <div class="mb-1 col-md-6 hide" id="ifMenikahNamaPasangan">
                                                <label class="form-label" for="namaPasangan">Nama Lengkap Pasangan</label>
                                                <input type="text" name="nama_pasangan_nasabah" id="namaPasangan"
                                                    class="form-control" placeholder="Nama Lengkap Pasangan"
                                                    value="{{ $pembiayaan->nasabah->nama_pasangan_nasabah }}" required />
                                            </div>
                                            <div class="mb-1 col-md-6 hide" id="ifMenikahKtpPasangan">
                                                <label class="form-label" for="noKtpPasangan">No
                                                    KTP Pasangan</label>
                                                <input type="number" name="no_ktp_pasangan" id="noKtpPasangan"
                                                    class="form-control" placeholder="Masukkan Nomor KTP pasangan"
                                                    value="{{ $pembiayaan->nasabah->no_ktp_pasangan }}" required />
                                            </div>
                                        @endif
                                        {{-- <div class="mb-1 col-md-6">
                                                <label class="form-label" for="nonpwp"><small class="text-danger">*
                                                    </small>No. NPWP</label>
                                                <input type="number" name="no_npwp" id="nonpwp" class="form-control"
                                                    placeholder="Masukkan Nomor NPWP Anda" required />
                                            </div> --}}
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="noTelp">No.
                                                Telepon</label>
                                            <input type="text" name="no_telp" id="noTelp" class="form-control"
                                                placeholder="Masukkan Nomor Telepon"
                                                value="{{ $pembiayaan->nasabah->no_telp }}" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="noHp"><small class="text-danger">*
                                                </small>No. Handphone</label>
                                            <input type="text" name="no_hp" id="noHp" class="form-control"
                                                placeholder="Masukkan Nomor Handphone"
                                                value="{{ $pembiayaan->nasabah->no_hp }}" required />
                                        </div>
                                    </div>

                                    <hr />
                                    <div class="content-header">
                                        <h5 class="mb-0 mt-2">Lampiran</h5>
                                        <small class="text-muted">Upload Lampiran Yang Sesuai.</small>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="mb-1 col-md-4">
                                                    <label class="form-label" for="modalFotoKtp">
                                                        Foto KTP
                                                    </label>
                                                    <button type="button" class="btn btn-md btn-primary w-100"
                                                        data-bs-toggle="modal" data-bs-target="#modalFotoKtp">
                                                        Lihat
                                                    </button>
                                                </div>
                                                <div class="mb-1 col-md-4">
                                                    <label class="form-label" for="perbaruiFotoKtp">
                                                        Perbarui Lampiran
                                                    </label>
                                                    <select class="select2 w-100" name="perbarui_foto_ktp"
                                                        id="perbaruiFotoKtp" onChange="changePerbaruiFotoKtp()">
                                                        <option value="Ya">Ya</option>
                                                        <option value="Tidak" selected>Tidak
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="row hide" id="ifPerbaruiFotoKtp" style="margin-left:0.5px;">
                                                    <div class="mb-1 col-md-8">
                                                        <label class="form-label" for="fotoKtp"><small
                                                                class="text-danger">*
                                                            </small>Upload Lampiran
                                                        </label>
                                                        <input type="file" name="foto_ktp" id="fotoKtp"
                                                            class="form-control" />
                                                        @if ($fotoKtp->foto)
                                                            <input type="hidden" name="foto_ktp_lama"
                                                                value="{{ $fotoKtp->foto }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="modalFotoKtpPasangan">
                                                            Foto KTP Pasangan
                                                        </label>
                                                        <button type="button" class="btn btn-md btn-primary w-100"
                                                            data-bs-toggle="modal" data-bs-target="#modalFotoKtpPasangan">
                                                            Lihat
                                                        </button>
                                                    </div>
                                                    <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="perbaruiFotoKtpPasangan">
                                                            Perbarui Lampiran
                                                        </label>
                                                        <select class="select2 w-100" name="perbarui_foto_ktp_pasangan"
                                                            id="perbaruiFotoKtpPasangan"
                                                            onChange="changePerbaruiFotoKtpPasangan()">
                                                            <option value="Ya">Ya</option>
                                                            <option value="Tidak" selected>Tidak
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="row hide" id="ifPerbaruiFotoKtpPasangan"
                                                        style="margin-left:0.5px;">
                                                        <div class="mb-1 col-md-8">
                                                            <label class="form-label" for="fotoKtpPasangan"><small
                                                                    class="text-danger">*
                                                                </small>Upload Lampiran
                                                            </label>
                                                            <input type="file" name="foto_ktp_pasangan"
                                                                id="fotoKtpPasangan" class="form-control" />
                                                            @if ($fotoKtpPasangan->foto)
                                                                <input type="hidden" name="foto_ktp_pasangan_lama"
                                                                    value="{{ $fotoKtpPasangan->foto }}">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="mb-1 col-md-4">
                                                    <label class="form-label" for="modalFotoKartuKeluarga">
                                                        Foto Kartu Keluarga
                                                    </label>
                                                    <button type="button" class="btn btn-md btn-primary w-100"
                                                        data-bs-toggle="modal" data-bs-target="#modalFotoKartuKeluarga">
                                                        Lihat
                                                    </button>
                                                </div>
                                                <div class="mb-1 col-md-4">
                                                    <label class="form-label" for="perbaruiFotoKk">
                                                        Perbarui Lampiran
                                                    </label>
                                                    <select class="select2 w-100" name="perbarui_foto_kk"
                                                        id="perbaruiFotoKk" onChange="changePerbaruiFotoKk()">
                                                        <option value="Ya">Ya</option>
                                                        <option value="Tidak" selected>Tidak
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="row hide" id="ifPerbaruiFotoKk" style="margin-left:0.5px;">
                                                    <div class="mb-1 col-md-8">
                                                        <label class="form-label" for="fotoKk"><small
                                                                class="text-danger">*
                                                            </small>Upload Lampiran
                                                        </label>
                                                        <input type="file" name="foto_kk" id="fotoKk"
                                                            class="form-control" />
                                                        @if ($fotoKartuKeluarga->foto)
                                                            <input type="hidden" name="foto_kk_lama"
                                                                value="{{ $fotoKartuKeluarga->foto }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="mb-1 col-md-4">
                                                    <label class="form-label" for="modalFotoNpwp">
                                                        Foto NPWP
                                                    </label>
                                                    <button type="button" class="btn btn-md btn-primary w-100"
                                                        data-bs-toggle="modal" data-bs-target="#modalFotoNpwp">
                                                        Lihat
                                                    </button>
                                                </div>
                                                <div class="mb-1 col-md-4">
                                                    <label class="form-label" for="perbaruiFotoNpwp">
                                                        Perbarui Lampiran
                                                    </label>
                                                    <select class="select2 w-100" name="perbarui_foto_npwp"
                                                        id="perbaruiFotoNpwp" onChange="changePerbaruiFotoNpwp()">
                                                        <option value="Ya">Ya</option>
                                                        <option value="Tidak" selected>Tidak
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="row hide" id="ifPerbaruiFotoNpwp" style="margin-left:0.5px;">
                                                    <div class="mb-1 col-md-8">
                                                        <label class="form-label" for="fotoNpwp"><small
                                                                class="text-danger">*
                                                            </small>Upload Lampiran
                                                        </label>
                                                        <input type="file" name="foto_npwp" id="fotoNpwp"
                                                            class="form-control" />
                                                        @if ($fotoNpwp->foto)
                                                            <input type="hidden" name="foto_npwp_lama"
                                                                value="{{ $fotoNpwp->foto }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($pembiayaan->nasabah->status_pernikahan != 'Belum Menikah')
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="modalFotoStatusPernikahan">
                                                            Foto Status Pernikahan
                                                        </label>
                                                        <button type="button" class="btn btn-md btn-primary w-100"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalFotoStatusPernikahan">
                                                            Lihat
                                                        </button>
                                                    </div>
                                                    <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="perbaruiFotoStatusPernikahan">
                                                            Perbarui Lampiran
                                                        </label>
                                                        <select class="select2 w-100"
                                                            name="perbarui_foto_status_pernikahan"
                                                            id="perbaruiFotoStatusPernikahan"
                                                            onChange="changePerbaruiFotoStatusPernikahan()">
                                                            <option value="Ya">Ya</option>
                                                            <option value="Tidak" selected>Tidak
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="row hide" id="ifPerbaruiFotoStatusPernikahan"
                                                        style="margin-left:0.5px;">
                                                        <div class="mb-1 col-md-8">
                                                            <label class="form-label" for="fotoStatusPernikahan"><small
                                                                    class="text-danger">*
                                                                </small>Upload Lampiran
                                                            </label>
                                                            <input type="file" name="foto_status_pernikahan"
                                                                id="fotoStatusPernikahan" class="form-control" />
                                                            @if ($fotoStatusPernikahan->foto)
                                                                <input type="hidden" name="foto_status_pernikahan_lama"
                                                                    value="{{ $fotoStatusPernikahan->foto }}">
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
                                                    <button type="button" class="btn btn-md btn-primary w-100"
                                                        data-bs-toggle="modal" data-bs-target="#modalFotoSk">
                                                        Lihat
                                                    </button>
                                                </div>
                                                <div class="mb-1 col-md-4">
                                                    <label class="form-label" for="perbaruiFotoSk">
                                                        Perbarui Lampiran
                                                    </label>
                                                    <select class="select2 w-100" name="perbarui_foto_sk"
                                                        id="perbaruiFotoSk" onChange="changePerbaruiFotoSk()">
                                                        <option value="Ya">Ya</option>
                                                        <option value="Tidak" selected>Tidak
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="row hide" id="ifPerbaruiFotoSk" style="margin-left:0.5px;">
                                                    <div class="mb-1 col-md-8">
                                                        <label class="form-label" for="fotoSk"><small
                                                                class="text-danger">*
                                                            </small>Upload Lampiran
                                                        </label>
                                                        <input type="file" name="foto_sk" id="fotoSk"
                                                            class="form-control" />
                                                        @if ($pembiayaan->nasabah->pekerjaan->dokumen_sk)
                                                            <input type="hidden" name="foto_sk_lama"
                                                                value="{{ $pembiayaan->nasabah->pekerjaan->dokumen_sk }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="mb-1 col-md-4">
                                                    <label class="form-label" for="modalFotoLampiranKeuangan">
                                                        Foto Keuangan
                                                    </label>
                                                    <button type="button" class="btn btn-md btn-primary w-100"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalFotoLampiranKeuangan">
                                                        Lihat
                                                    </button>
                                                </div>
                                                <div class="mb-1 col-md-4">
                                                    <label class="form-label" for="perbaruiFotoLampiranKeuangan">
                                                        Perbarui Lampiran
                                                    </label>
                                                    <select class="select2 w-100" name="perbarui_foto_lampiran_keuangan"
                                                        id="perbaruiFotoLampiranKeuangan"
                                                        onChange="changePerbaruiFotoLampiranKeuangan()">
                                                        <option value="Ya">Ya</option>
                                                        <option value="Tidak" selected>Tidak
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="row hide" id="ifPerbaruiFotoLampiranKeuangan"
                                                    style="margin-left:0.5px;">
                                                    <div class="mb-1 col-md-8">
                                                        <label class="form-label" for="fotoLampiranKeuangan"><small
                                                                class="text-danger">*
                                                            </small>Upload Lampiran
                                                        </label>
                                                        <input type="file" name="foto_lampiran_keuangan"
                                                            id="fotoLampiranKeuangan" class="form-control" />
                                                        @if ($pembiayaan->dokumen_keuangan)
                                                            <input type="hidden" name="foto_lampiran_keuangan_lama"
                                                                value="{{ $pembiayaan->dokumen_keuangan }}">
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
                                                    <button type="button" class="btn btn-md btn-primary w-100"
                                                        data-bs-toggle="modal" data-bs-target="#modalIdeb">
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
                                                        <label class="form-label" for="ideb"><small
                                                                class="text-danger">*
                                                            </small>Upload Lampiran
                                                        </label>
                                                        <input type="file" name="ideb" id="ideb"
                                                            class="form-control" />
                                                        @if ($pembiayaan->dokumen_ideb)
                                                            <input type="hidden" name="ideb_lama"
                                                                value="{{ $pembiayaan->dokumen_ideb }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="modalIdebPasangan">
                                                            IDEB Pasangan
                                                        </label>
                                                        <button type="button" class="btn btn-md btn-primary w-100"
                                                            data-bs-toggle="modal" data-bs-target="#modalIdebPasangan">
                                                            Lihat
                                                        </button>
                                                    </div>
                                                    <div class="mb-1 col-md-4">
                                                        <label class="form-label" for="perbaruiIdebPasangan">
                                                            Perbarui Lampiran
                                                        </label>
                                                        <select class="select2 w-100" name="perbarui_ideb_pasangan"
                                                            id="perbaruiIdebPasangan"
                                                            onChange="changePerbaruiIdebPasangan()">
                                                            <option value="Ya">Ya</option>
                                                            <option value="Tidak" selected>Tidak
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="row hide" id="ifPerbaruiIdebPasangan"
                                                        style="margin-left:0.5px;">
                                                        <div class="mb-1 col-md-8">
                                                            <label class="form-label" for="idebPasangan"><small
                                                                    class="text-danger">*
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
                                    </div>

                                    <hr />
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
                                                required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="noTelpOt"><small class="text-danger">*
                                                </small>No.
                                                Telepon</label>
                                            <input type="text" name="no_telp_orang_terdekat" id="noTelpOt"
                                                class="form-control" placeholder="Masukkan Nomor Telepon Orang Terdekat"
                                                value="{{ $pembiayaan->nasabah->orangTerdekat->no_telp_orang_terdekat }}"
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
                                                                    value="{{ $pembiayaan->nasabah->orangTerdekat->alamat_orang_terdekat }}"
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
                                                                    value="{{ $pembiayaan->nasabah->orangTerdekat->rt_orang_terdekat }}"
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
                                                                    value="{{ $pembiayaan->nasabah->orangTerdekat->rw_orang_terdekat }}"
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
                                                                    value="{{ $pembiayaan->nasabah->orangTerdekat->desa_kelurahan_orang_terdekat }}"
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
                                                                    value="{{ $pembiayaan->nasabah->orangTerdekat->kecamatan_orang_terdekat }}"
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
                                                                    value="{{ $pembiayaan->nasabah->orangTerdekat->kabkota_orang_terdekat }}"
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
                                                                    value="{{ $pembiayaan->nasabah->orangTerdekat->provinsi_orang_terdekat }}"
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
                                                                    value="{{ $pembiayaan->nasabah->orangTerdekat->kd_pos_orang_terdekat }}"
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
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="dinas"><small class="text-danger">*
                                                </small>Dinas</label>
                                            <input type="text" name="dinas" id="dinas" class="form-control"
                                                placeholder="Masukkan Nama Dinas (PPPK DINKES/DISDIK/Teknis)"
                                                value="{{ $pembiayaan->nasabah->pekerjaan->dinas }}" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="namaUnitKerja"><small class="text-danger">*
                                                </small>Nama Unit Kerja</label>
                                            <input type="text" name="nama_unit_kerja" id="namaUnitKerja"
                                                class="form-control" placeholder="Masukkan Nama Unit Kerja"
                                                value="{{ $pembiayaan->nasabah->pekerjaan->nama_unit_kerja }}" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jabatan"><small class="text-danger">*
                                                </small>Jabatan</label>
                                            <input type="text" name="jabatan" id="jabatan" class="form-control"
                                                placeholder="Masukkan Jabatan"
                                                value="{{ $pembiayaan->nasabah->pekerjaan->jabatan }}" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="noSk"><small class="text-danger">*
                                                </small>No. SK</label>
                                            <input type="text" name="no_sk" id="noSk" class="form-control"
                                                placeholder="Masukkan Nomor SK"
                                                value="{{ $pembiayaan->nasabah->pekerjaan->no_sk }}" required />
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
                                                required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="gajiTpp"><small class="text-danger">*
                                                </small>Pendapatan TPP (Per Bulan)</label>
                                            <input type="text" name="gaji_tpp" class="form-control numeral-mask"
                                                placeholder="Rp." id="gajiTpp" value="{{ $pembiayaan->gaji_tpp }}"
                                                required />
                                        </div>
                                        @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="gajiPasangan"><small
                                                        class="text-danger">*
                                                    </small>Pendapatan Pasangan (Per Bulan)</label>
                                                <input type="text" name="gaji_pasangan"
                                                    class="form-control numeral-mask" placeholder="Rp."
                                                    id="gajiPasangan" value="{{ $pembiayaan->gaji_pasangan }}"
                                                    required />
                                            </div>
                                        @endif
                                    </div>

                                    <hr />
                                    <div class="content-header">
                                        <h5 class="mb-0 mt-2">Data Pengeluaran</h5>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="pengeluaranLainnya">Pengeluaran Lainnya (Per
                                                Bulan)</label>
                                            <input type="text" name="pengeluaran_lainnya"
                                                class="form-control numeral-mask" placeholder="-"
                                                id="pengeluaranLainnya"
                                                value="{{ $pembiayaan->pengeluaran_lainnya }}" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="keteranganPengeluaranLainnya">Keterangan
                                                Pengeluaran Lainnya
                                                (Per
                                                Bulan)</label>
                                            <input type="text" name="keterangan_pengeluaran_lainnya"
                                                class="form-control" id="keteranganPengeluaranLainnya" placeholder="-"
                                                value="{{ $pembiayaan->keterangan_pengeluaran_lainnya }}" />
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" id="btnSubmitForm"
                                            class="btn btn-success">Submit</button>
                                    </div>
                                    <br />
                                </div>
                            </form>


                            <!-- Modal Lampiran -->

                            <!-- Foto KTP -->
                            <div class="modal fade" id="modalFotoKtp" tabindex="-1"
                                aria-labelledby="addNewCardTitle" aria-hidden="true">
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
                                            <iframe src="{{ asset('storage/' . $fotoKtp->foto) }}"
                                                class="d-block w-100" height="600"></iframe>
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
                            <div class="modal fade" id="modalFotoNpwp" tabindex="-1"
                                aria-labelledby="addNewCardTitle" aria-hidden="true">
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
                                            <iframe src="{{ asset('storage/' . $fotoNpwp->foto) }}"
                                                class="d-block w-100" height="600"></iframe>
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
                                <!-- Foto Status Pernikahan/Perceraian -->
                                <div class="modal fade" id="modalFotoStatusPernikahan" tabindex="-1"
                                    aria-labelledby="addNewCardTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header bg-transparent">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                                <h4 class="text-center mb-1" style="margin-top:-40px;">
                                                    <strong>Foto Status Pernikahan/Perceraian</strong>
                                                </h4>
                                                <iframe src="{{ asset('storage/' . $fotoStatusPernikahan->foto) }}"
                                                    class="d-block w-100" height="600"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Foto Status Pernikahan/Perceraian  -->
                            @endif

                            <!-- Foto SK -->
                            <div class="modal fade" id="modalFotoSk" tabindex="-1"
                                aria-labelledby="addNewCardTitle" aria-hidden="true">
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

                            <!-- IDEB -->
                            <div class="modal fade" id="modalIdeb" tabindex="-1" aria-labelledby="modalIdeb"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header bg-transparent">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-sm-5 mx-50 pb-5">
                                            <h4 class="text-center mb-1" style="margin-top:-40px;">
                                                <strong>IDEB</strong>
                                            </h4>
                                            <iframe src="{{ asset('storage/' . $pembiayaan->dokumen_ideb) }}"
                                                class="d-block w-100" height="600"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ IDEB  -->

                            @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                                <!-- IDEB Pasangan -->
                                <div class="modal fade" id="modalIdebPasangan" tabindex="-1"
                                    aria-labelledby="modalIdebPasangan" aria-hidden="true">
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
                                                    <iframe src="{{ asset('storage/' . $idebPasangan->foto) }}"
                                                        class="d-block w-100" height="600"></iframe>
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

        //Fungsi show hide lampiran
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

        function changePerbaruiFotoKtpPasangan() {
            var perbaruiFotoKtpPasangan = document.getElementById("perbaruiFotoKtpPasangan");
            if (perbaruiFotoKtpPasangan.value == "Ya") {
                document.getElementById("ifPerbaruiFotoKtpPasangan").classList.toggle("hide"),
                    document.getElementById("fotoKtpPasangan").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiFotoKtpPasangan").classList = "hide",
                    document.getElementById("fotoKtpPasangan").removeAttribute("required");
            }
        }

        function changePerbaruiFotoNpwp() {
            var perbaruiFotoNpwp = document.getElementById("perbaruiFotoNpwp");
            if (perbaruiFotoNpwp.value == "Ya") {
                document.getElementById("ifPerbaruiFotoNpwp").classList.toggle("hide"),
                    document.getElementById("fotoNpwp").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiFotoNpwp").classList = "hide",
                    document.getElementById("fotoNpwp").removeAttribute("required");
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

        function changePerbaruiFotoStatusPernikahan() {
            var perbaruiFotoStatusPernikahan = document.getElementById("perbaruiFotoStatusPernikahan");
            if (perbaruiFotoStatusPernikahan.value == "Ya") {
                document.getElementById("ifPerbaruiFotoStatusPernikahan").classList.toggle("hide"),
                    document.getElementById("fotoStatusPernikahan").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiFotoStatusPernikahan").classList = "hide",
                    document.getElementById("fotoStatusPernikahan").removeAttribute("required");
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

        function changePerbaruiFotoLampiranKeuangan() {
            var perbaruiFotoLampiranKeuangan = document.getElementById("perbaruiFotoLampiranKeuangan");
            if (perbaruiFotoLampiranKeuangan.value == "Ya") {
                document.getElementById("ifPerbaruiFotoLampiranKeuangan").classList.toggle("hide"),
                    document.getElementById("fotoLampiranKeuangan").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiFotoLampiranKeuangan").classList = "hide",
                    document.getElementById("fotoLampiranKeuangan").removeAttribute("required");
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
