@extends('umkm::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <style>
        /* Validate style for Select2 class */
        .was-validated select.select2:invalid+.select2 .select2-selection {
            border-color: #dc3545 !important;
        }

        .was-validated select.select2:valid+.select2 .select2-selection {
            border-color: #28a745 !important;
        }
    </style>
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
                                    <li class="breadcrumb-item"><a href="/">Umkm</a>
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
                            <div class="step" data-target="#form1" role="tab" id="personal-info-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="file-text" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Pembiayaan</span>
                                        <span class="bs-stepper-subtitle">Informasi Pembiayaan</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#form2" role="tab" id="account-details-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="user" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Data Diri</span>
                                        <span class="bs-stepper-subtitle">Isi Data Diri Dan Data Usaha</span>;
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#form3" role="tab" id="personal-info-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="users" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Orang Terdekat</span>
                                        <span class="bs-stepper-subtitle"> Data Orang Terdekat</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#form4" role="tab" id="personal-info-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="briefcase" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Usaha</span>
                                        <span class="bs-stepper-subtitle"> Data Pekerjaan</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#form5" role="tab" id="personal-info-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="clipboard" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Jaminan</span>
                                        <span class="bs-stepper-subtitle"> Data Jaminan</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#form6" role="tab" id="personal-info-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="bar-chart-2" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Pendapatan Keuangan</span>
                                        <span class="bs-stepper-subtitle"> Data Pendapatan</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#form7" role="tab" id="personal-info-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="bar-chart" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Pengeluaran Keuangan</span>
                                        <span class="bs-stepper-subtitle"> Data Pengeluaran</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form method='POST' action="/umkm/proposal/{{ $pembiayaan->id }}" class="needs-validation"
                                enctype="multipart/form-data" novalidate>
                                @method('PUT')
                                @csrf
                                <div id="form1" class="content" role="tabpanel"
                                    aria-labelledby="account-details-trigger">
                                    <div class="content-header">
                                        {{-- <h5 class="mb-0">Account Details</h5> --}}
                                        <small class="text-danger">* Wajib Diisi</small>
                                    </div>
                                    <div class="mb-1 col-md-12">
                                        <label class="form-label" for="ao"><small class="text-danger">*
                                            </small>Nama AO</label>
                                        <select class="select2 w-100" name="AO_id" id="ao"disabled>
                                            <option value="{{ $pembiayaan->user->id }}">{{ $pembiayaan->user->name }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tanggal"><small class="text-danger">*
                                                </small>Tanggal Pengajuan</label>
                                            <input type="text" name="tgl_pembiayaan" id="tgl_pembiayaan"
                                                class="form-control flatpickr-basic" name="tanggal"
                                                placeholder="DD-MM-YYYY"
                                                value="{{ date('d-m-Y', strtotime($pembiayaan->tgl_pembiayaan)) }}"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jenispenggunaan"><small class="text-danger">*
                                                </small>Jenis Penggunaan</label>
                                            <select class="select2 w-100" name="penggunaan_id" id="jenispenggunaan"
                                                disabled>
                                                <option>{{ $pembiayaan->penggunaan_id }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="sektor"><small class="text-danger">*
                                                </small>Sektor</label>
                                            <select class="select2 w-100" name="sektor_id" id="sektor_id"
                                                data-placeholder="Pilih Sektor" required>
                                                <option value=""></option>
                                                @foreach ($sektors as $sektor)
                                                    <option value="{{ $sektor->kode_sektor_ekonomi }}">
                                                        {{ $sektor->nama_sektor_ekonomi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="akad"><small class="text-danger">*
                                                </small>Akad</label>
                                            <select class="select2 w-100" name="akad_id" id="akad"
                                                data-placeholder="Pilih Jenis Akad" required>
                                                <option value=""></option>
                                                @foreach ($akads as $akad)
                                                    <option value="{{ $akad->kode_akad }}">{{ $akad->nama_akad }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nominal_pembiayaan"><small
                                                    class="text-danger">*
                                                </small>Nominal Pembiayaan</label>
                                            <input type="text" name="nominal_pembiayaan"
                                                class="form-control numeral-mask" placeholder="Nominal Pembiayaan"
                                                id="nominal_pembiayaan"
                                                value="{{ number_format((float)($pembiayaan->nominal_pembiayaan ?? 0)) }}" required>
                                        </div>
                                        <div class="mb-1 col-md-4">
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
                                                <option value="12">12 Bulan</option>
                                                <option value="18">18 Bulan</option>
                                                <option value="24">24 Bulan</option>
                                                <option value="48">36 Bulan</option>
                                                <option value="48">48 Bulan</option>
                                                <option value="60">60 Bulan</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-2">
                                            <label class="form-label" for="harga"><small class="text-danger">*
                                                </small>Equivalen Rate</label>
                                            <input type="text" name="rate" class="form-control numeral-mask"
                                                placeholder="%" id="rate" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="akad"><small class="text-danger">*
                                                </small>Cash Pick Up</label>
                                            <select class="select2 w-100" name="cashpickup" id="cashpickup"
                                                data-placeholder="Pilih Jenis Cash Pick Up" required>
                                                <option value=""></option>
                                                @foreach ($cashs as $cash)
                                                    <option value="{{ $cash->kode_jeniscash }}">
                                                        {{ $cash->nama_jeniscash }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nasabah"><small class="text-danger">*
                                                </small>Nasabah</label>
                                            <select class="select2 w-100" name="nasabah" id="nasabah"
                                                data-placeholder="Pilih Jenis Nasabah" required>
                                                <option value=""></option>
                                                @foreach ($nasabahs as $nasabah)
                                                    <option value="{{ $nasabah->kode_jenisnasabah }}">
                                                        {{ $nasabah->nama_jenisnasabah }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <a class="btn btn-outline-secondary btn-prev" disabled>
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </a>
                                        <a class="btn btn-primary btn-next" type="button">
                                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                        </a>
                                    </div>
                                </div>
                                <div id="form2" class="content" role="tabpanel"
                                    aria-labelledby="account-details-trigger">
                                    <div class="content-header">
                                        <h5 class="mb-0 mt-2">Data Diri</h5>
                                        <small class="text-muted">Lengkapi Data Diri Sesuai Dengan KTP.</small>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nama"><small class="text-danger">*
                                                </small>Nama Lengkap Nasabah</label>
                                            <input type="text" name="nama_nasabah" id="nama_nasabah"
                                                class="form-control" placeholder="Nama Lengkap"
                                                value="{{ $pembiayaan->nasabahh->nama_nasabah }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="noktp"><small class="text-danger">*
                                                </small>No KTP</label>
                                            <input type="number" name="no_ktp" id="no_ktp" class="form-control"
                                                placeholder="Masukkan Nomor KTP Anda"
                                                value="{{ $pembiayaan->nasabahh->no_ktp }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tempatlahir"><small class="text-danger">*
                                                </small>Tempat Lahir</label>
                                            <input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control"
                                                placeholder="Maukan Tempat Lahir Anda"
                                                value="{{ $pembiayaan->nasabahh->tmp_lahir }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tgl_lahir"><small class="text-danger">*
                                                </small>Tanggal Lahir</label>
                                            <input type="text" id="tgl_lahir" class="form-control flatpickr-basic"
                                                name="tgl_lahir" placeholder="DD-MM-YYYY"
                                                value="{{ date('d-m-Y', strtotime($pembiayaan->nasabahh->tgl_lahir)) }}"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="gender"><small class="text-danger">*
                                                </small>Jenis Kelamin</label>
                                            <select class="select2 w-100" name="jk_id" id="gender" disabled>
                                                <option value=""></option>
                                                <option
                                                    {{ $pembiayaan->nasabahh->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}
                                                    value="Laki-Laki">Laki-Laki</option>
                                                <option
                                                    {{ $pembiayaan->nasabahh->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}
                                                    value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="ibu"><small class="text-danger">*
                                                </small>Nama Ibu Kandung</label>
                                            <input class="form-control" name="nama_ibu" id="ibu" rows="3"
                                                placeholder="Masukkan Nama Ibu Kandung"
                                                value="{{ $pembiayaan->nasabahh->nama_ibu }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="exampleFormControlTextarea1"><small
                                                    class="text-danger">* </small>Alamat Sesuai KTP</label>
                                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>{{ $pembiayaan->nasabahh->alamat }}</textarea>
                                        </div>
                                        <div class="mb-1 col-md-1">
                                            <label class="form-label" for="rt"><small class="text-danger">*
                                                </small>RT</label>
                                            <input type="number" name="rt" id="rt" class="form-control"
                                                placeholder="RT" value="{{ $pembiayaan->nasabahh->rt }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-1">
                                            <label class="form-label" for="rw"><small class="text-danger">*
                                                </small>RW</label>
                                            <input type="number" name="rw" id="rw" class="form-control"
                                                placeholder="RW" value="{{ $pembiayaan->nasabahh->rw }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="desa_kelurahan"><small class="text-danger">*
                                                </small>Desa / Kelurahan</label>
                                            <input type="text" name="desa_kelurahan" id="desa_kelurahan"
                                                class="form-control" placeholder="Desa / Kelurahan"
                                                value="{{ $pembiayaan->nasabahh->desa_kelurahan }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="kecamatan"><small class="text-danger">*
                                                </small>Kecamatan</label>
                                            <input type="text" name="kecamatan" id="kecamatan" class="form-control"
                                                placeholder="Kecamatan" value="{{ $pembiayaan->nasabahh->kecamatan }}"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="kabkota"><small class="text-danger">*
                                                </small>Kabupaten / Kota</label>
                                            <input type="text" name="kabkota" id="kabkota" class="form-control"
                                                placeholder="Kabupaten / Kota"
                                                value="{{ $pembiayaan->nasabahh->kabkota }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="provinsi"><small class="text-danger">*
                                                </small>Provinsi</label>
                                            <input type="text" name="provinsi" id="provinsi" class="form-control"
                                                placeholder="Provinsi" value="{{ $pembiayaan->nasabahh->provinsi }}"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="exampleFormControlTextarea1">Alamat
                                                Domisili</label>
                                            <textarea name="alamat_domisili" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                placeholder="Alamat" disabled>{{ $pembiayaan->nasabahh->alamat_domisili }}</textarea>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="lamatinggal"><small class="text-danger">*
                                                </small>Lama Tinggal Di Alamat Rumah</label>
                                            <select class="select2 w-100" name="lama_tinggal" id="lama_tinggal" disabled>
                                                <option value="{{ $pembiayaan->nasabahh->id }}">
                                                    {{ $pembiayaan->nasabahh->lama_tinggal }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="kep_rumah"><small class="text-danger">*
                                                </small>Kepemilikan Rumah</label>
                                            <select class="select2 w-100" name="kepemilikan_rumah" id="kep_rumah"
                                                disabled>
                                                <option>
                                                    {{ $rumah->kepemilikan_rumah }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="leg_rumah"><small class="text-danger">*
                                                </small>Legalitas Kepemilikan Rumah</label>
                                            <select class="select2 w-100" name="legalitas_kepemilikan_rumah"
                                                id="leg_rumah" disabled>
                                                <option>
                                                    {{ $rumah->legalitasrumah->nama_jaminan }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="Pendidikan_id"><small class="text-danger">*
                                                </small>Pendidikan Terakhir</label>
                                            <select class="select2 w-100" name="pendidikan" id="pendidikan_id" disabled>
                                                <option value="{{ $pembiayaan->nasabahh->id }}">
                                                    {{ $pembiayaan->nasabahh->pendidikan }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="agama"><small class="text-danger">*
                                                </small>Agama</label>
                                            <select class="select2 w-100" name="agama_id" id="agama_id" disabled>
                                                <option value="{{ $pembiayaan->nasabahh->id }}">
                                                    {{ $pembiayaan->nasabahh->agama_id }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="status"><small class="text-danger">*
                                                </small>Status</label>
                                            <select class="select2 w-100" name="status_id" id="status_id" disabled>
                                                <option value="{{ $pembiayaan->nasabahh->status->id }}">
                                                    {{ $pembiayaan->nasabahh->status->nama_status_perkawinan }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nama_pasangan"></small>Nama Suami Istri</label>
                                            <input class="form-control" name="nama_pasangan" id="nama_pasangan"
                                                rows="3" placeholder="Masukkan Nama Suami Istri"
                                                value="{{ $pembiayaan->nasabahh->nama_pasangan }}"disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jumlahanak"> </small>Jumlah
                                                Anak/Tanggungan</label>
                                            <select class="select2 w-100" name="jumlah_anak" id="jumlah_anak" disabled>
                                                <option value="{{ $pembiayaan->nasabahh->tanggungan->id }}">
                                                    {{ $pembiayaan->nasabahh->tanggungan->bannyak_tanggungan }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nonpwp">No NPWP</label>
                                            <input type="number" name="npwp" id="npwp" class="form-control"
                                                placeholder="Masukkan Nomor NPWP Anda" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="notelp"><small class="text-danger">*
                                                </small>No Telepon</label>
                                            <input type="text" name="no_tlp" id="no_tlp"
                                                class="form-control prefix-mask"
                                                value="{{ $pembiayaan->nasabahh->no_tlp }}" disabled />
                                        </div>

                                        <div class="mb-0 mt-1 col-md-2">
                                            <button type="butt  on" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#fotodiri">
                                                Foto Diri
                                            </button>
                                        </div>
                                        <div class="mb-0 mt-1 col-md-2">
                                            <button type="butt  on" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#fotoktp">
                                                Foto KTP
                                            </button>
                                        </div>
                                        <div class="mb-0 mt-2 col-md-2">
                                            <button type="butt  on" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#fotodiribersamaktp">
                                                Foto Diri Bersama KTP
                                            </button>
                                        </div>
                                        <div class="mb-0 mt-2 col-md-2">
                                            <button type="butt  on" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#fotokk">
                                                Foto Kartu Keluarga
                                            </button>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <a class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </a>
                                        <a class="btn btn-primary btn-next" type="button">
                                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                        </a>
                                    </div>
                                </div>
                                <div id="form3" class="content" role="tabpanel"
                                    aria-labelledby="account-details-trigger">
                                    <div class="content-header">
                                        <h5 class="mb-0 mt-2">Data Orang Terdekat</h5>
                                        <small class="text-muted">Lengkapi Data Orang Terdekat Tidak Serumah.</small>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="namaot"><small class="text-danger">*
                                                </small>Nama</label>
                                            <input type="text" name="namaot" id="namaot" class="form-control"
                                                placeholder="Masukkan Nama Orang Terdekat"
                                                value="{{ $pembiayaan->nasabahh->namaot }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="telpot"><small class="text-danger">*
                                                </small>No Telepon</label>
                                            <input type="number" name="telp_ot" id="telp_ot" class="form-control"
                                                placeholder="Masukkan Nomor Telepon Orang Terdekat"
                                                value="{{ $pembiayaan->nasabahh->telp_ot }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="exampleFormControlTextarea1"><small
                                                    class="text-danger">* </small>Alamat</label>
                                            <textarea class="form-control" name="alamat_ot" id="exampleFormControlTextarea1" rows="3"
                                                placeholder="Alamat Orang Terdekat" disabled>{{ $pembiayaan->nasabahh->alamat_ot }}</textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <a class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </a>
                                        <a class="btn btn-primary btn-next" type="button">
                                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                        </a>
                                    </div>
                                </div>
                                <div id="form4" class="content" role="tabpanel"
                                    aria-labelledby="account-details-trigger">
                                    <div class="content-header">
                                        <h5 class="mb-0 mt-2">Data Usaha</h5>
                                        <small class="text-muted">Lengkapi Data Usaha Anda.</small>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nama_usaha"><small class="text-danger">*
                                                </small>Nama Usaha</label>
                                            <input type="text" name="nama_usaha" id="nama_usaha" class="form-control"
                                                placeholder="Masukkan Nama Toko Atau Usaha"
                                                value="{{ $pembiayaan->keteranganusaha->nama_usaha }}" required>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jenisdagang_id"><small class="text-danger">*
                                                </small>Jenis Dagang</label>
                                            <select class="select2 w-100" name="jenisdagang_id" id="jenisdagang_id"
                                                disabled>
                                                <option value="{{ $pembiayaan->keteranganusaha->dagang->id }}">
                                                    {{ $pembiayaan->keteranganusaha->dagang->nama_jenisdagang }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="keptoko"><small class="text-danger">*
                                                </small>Kepemilikan Usaha</label>
                                            <select class="select2 w-100" name="kep_toko_id" id="keptoko" disabled>
                                                <option value="{{ $pembiayaan->keteranganusaha->id }}">
                                                    {{ $pembiayaan->keteranganusaha->kep_toko_id }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="lamausaha"><small class="text-danger">*
                                                </small>Lama Usaha</label>
                                            <select class="select2 w-100" name="lama_usaha" id="lama_usaha" disabled>
                                                <option value="{{ $pembiayaan->keteranganusaha->lamadagang->id }}">
                                                    {{ $pembiayaan->keteranganusaha->lamadagang->nama_lamaberdagang }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="alamatusaha"><small class="text-danger">*
                                                </small>Alamat Usaha</label>
                                            <input type="text" name="alamatusaha" id="alamatusaha"
                                                class="form-control" placeholder="Masukkan Alamat Usaha"
                                                value="{{ $pembiayaan->keteranganusaha->alamatusaha }}" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="legalitastoko"><small class="text-danger">*
                                                </small>Legalitas Kepemilikan Kios / Los</label>
                                            <select class="select2 w-100" name="leg_toko_id" id="legalitastoko" disabled>
                                                <option value="{{ $pembiayaan->keteranganusaha->id }}">
                                                    {{ $pembiayaan->keteranganusaha->leg_toko_id }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="suku"><small class="text-danger">*
                                                </small>Suku Bangsa</label>
                                            <select class="select2 w-100" name="suku_bangsa_id" id="suku_bangsa_id"
                                                data-placeholder="Pilih Suku Bangsa Nasabah" required>
                                                <option value=""></option>
                                                @foreach ($sukus as $suku)
                                                    <option value="{{ $suku->kode_suku }}">{{ $suku->nama_suku }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <a class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </a>
                                        <a class="btn btn-primary btn-next" type="button">
                                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                        </a>
                                    </div>
                                </div>
                                <div id="form5" class="content" role="tabpanel"
                                    aria-labelledby="account-details-trigger">
                                    <div class="content-header">
                                        <h5 class="mb-0 mt-2">Data Jaminan</h5>
                                        <small class="text-muted">Silahkan Upload Data Jaminan Anda</small>
                                    </div>
                                    <div class="row">
                                        <small>Jaminan Utama</small>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jaminanlain"><small class="text-danger">*
                                                </small>Jaminan</label>
                                            <select class="select2 w-100" name="jaminanlain" id="jaminanlain" disabled>
                                                <option value="{{ $jaminanutama->id }}">
                                                    {{ $jaminanutama->nama_jaminan }}</option>
                                                <option label="jaminanlain">Pilih Jaminan Utama</option>
                                                @foreach ($jaminans as $jaminan)
                                                    <option value="{{ $jaminan->id }}">{{ $jaminan->nama_jaminan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="lamausaha"><small class="text-danger">*
                                                </small>No KTB</label>
                                            <input type="text" name="no_ktb" id="lamausaha" class="form-control"
                                                placeholder="Masukkan No KTB"
                                                value="{{ $pembiayaan->jaminanpasar->no_ktb }}" disabled>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jaminan"></small>Jaminan Lainnya</label>
                                            <select class="select2 w-100" name="jaminanlain_id" id="jaminan" disabled>
                                                {{-- <option value="{{ $pembiayaan->jaminanpasarlain->jaminanlain->id }}">
                                                {{ $pembiayaan->jaminanpasarlain->jaminanlain->nama_jaminan }}</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <a class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </a>
                                        <a class="btn btn-primary btn-next" type="button">
                                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                        </a>
                                    </div>
                                </div>
                                <div id="form6" class="content" role="tabpanel"
                                    aria-labelledby="personal-info-modern-trigger">
                                    <div class="content-header">
                                        <h5 class="mb-0">Data Pendapatan</h5>
                                        <small>Isikan Data Pendapatan Anda</small>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"><small
                                                    class="text-danger">*
                                                </small>Omset Per Bulan</label>
                                            <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                                name="omset" id="omset"
                                                value="{{ number_format((float)($pembiayaan->omset ?? 0)) }}" required>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"></small>HPP</label>
                                            <input type="text" class="form-control numeral-mask"
                                                placeholder="Isikan 0 jika tidak ada" name="hpp" id="hpp"
                                                value="{{ number_format((float)($pembiayaan->hpp ?? 0)) }}" required>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"></small>Biaya
                                                Listrik</label>
                                            <input type="text" class="form-control numeral-mask"
                                                placeholder="Isikan 0 jika tidak ada" name="listrik" id="listrik"
                                                value="{{ number_format((float)($pembiayaan->listrik ?? 0)) }}" required>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"></small>Biaya
                                                Transport</label>
                                            <input type="text" class="form-control numeral-mask"
                                                placeholder="Isikan 0 jika tidak ada" name="trasport" id="transport"
                                                value="{{ number_format((float)($pembiayaan->trasport ?? 0)) }}" required>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"></small>Biaya
                                                Karyawan</label>
                                            <input type="text" class="form-control numeral-mask"
                                                placeholder="Isikan 0 jika tidak ada" name="karyawan" id="karyawan"
                                                value="{{ number_format((float)($pembiayaan->karyawan ?? 0)) }}" required>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"></small>Biaya
                                                Telpon</label>
                                            <input type="text" class="form-control numeral-mask"
                                                placeholder="Isikan 0 jika tidak ada" name="telpon" id="telpon"
                                                value="{{ number_format((float)($pembiayaan->telpon ?? 0)) }}" required>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"> </small>Biaya Sewa
                                                Kios</label>
                                            <input type="text" class="form-control numeral-mask"
                                                placeholder="Isikan 0 jika tidak ada" name="sewa" id="sewa"
                                                value="{{ number_format((float)($pembiayaan->sewa ?? 0)) }}" required>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="pendapatanLain"> </small>Pendapatan
                                                Lain</label>
                                            <input type="text" class="form-control numeral-mask"
                                                placeholder="Isikan 0 jika tidak ada" name="pendapatan_lain"
                                                id="pendapatanLain"
                                                value="{{ number_format((float)($pembiayaan->pendapatan_lain ?? 0)) }}" required>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="ketPendapatanLain"> </small>Keterangan
                                                Pendapatan Lain</label>
                                            <input type="text" class="form-control numeral-mask"
                                                placeholder="Isikan - jika tidak ada" name="ket_pendapatan_lain"
                                                id="ketPendapatanLain" value="{{ $pembiayaan->ket_pendapatan_lain }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <a class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </a>
                                        <a class="btn btn-primary btn-next" type="button">
                                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                        </a>
                                    </div>
                                </div>
                                <div id="form7" class="content" role="tabpanel"
                                    aria-labelledby="account-details-trigger">
                                    <div class="content-header">
                                        <h5 class="mb-0">Data Pengeluaran Anda</h5>
                                        <small>Data Pengeluaran Nasabah Anda</small>
                                    </div>
                                    <small>Cicilan Bank</small>
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

                                                                <div class="col-md-1 col-8">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="tenor">Tenor</label>
                                                                        <input type="number" class="form-control"
                                                                            name="tenor" id="tenor"
                                                                            aria-describedby="tenor"
                                                                            placeholder="tenor" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-1 col-8">
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

                                                                <div class="col-md-1 col-8">
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

                                                                <div class="col-md-1 col-2">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="angsuran">Kol</label>
                                                                        <input type="number" class="form-control"
                                                                            name="kol" id="kol"
                                                                            aria-describedby="angsuran"
                                                                            placeholder="Rp." />
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
                                    <small><br> Informasi Debitur Pasangan</small>
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

                                                                <div class="col-md-1 col-8">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="tenor">Tenor</label>
                                                                        <input type="number" class="form-control"
                                                                            name="tenor" id="tenor"
                                                                            aria-describedby="tenor"
                                                                            placeholder="tenor" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-1 col-8">
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

                                                                <div class="col-md-1 col-8">
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

                                                                <div class="col-md-1 col-2">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="angsuran">Kol</label>
                                                                        <input type="number" class="form-control"
                                                                            name="kol" id="kol"
                                                                            aria-describedby="angsuran" />
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
                                            <label class="form-label" for="numeral-formatting"><small
                                                    class="text-danger">* </small>Pengeluaran Lainnya</label>
                                            <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                                name="keb_keluarga" id="kebkeluarga"
                                                value="{{ $pembiayaan->keb_keluarga }}" disabled>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"><small
                                                    class="text-danger">* </small>Keterangan Pengeluaran Lainnya</label>
                                            <input type="text" class="form-control"
                                                placeholder="Keterangan Pengeluaran" name="keterangan_keb_keluarga"
                                                id="kebkeluarga" value="{{ $pembiayaan->keterangan_keb_keluarga }}"
                                                disabled>
                                        </div>
                                        {{-- <div class="mb-1 col-md-6">
                                            <label class="form-label" for="aset">Aset / Harta Benda</label>
                                            <input type="text" name="aset" id="aset" class="form-control"
                                                placeholder="Masukkan Kepemilikkan Aset" value="{{ $pembiayaan->aset }}"
                                                disabled>
                                        </div> --}}
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"><small
                                                    class="text-danger">* </small>Kesanggupan Angsuran</label>
                                            <input type="text" class="form-control numeral-mask"
                                                name="kesanggupan_angsuran" placeholder="Rp." id="kesanggupan_angsuran"
                                                value="{{ $pembiayaan->kesanggupan_angsuran }}" disabled>
                                        </div><br>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="dokumen_keuangan"><small
                                                    class="text-danger">*
                                                </small>Upload IDEB</label>
                                            <input type="file" name="dokumen_keuangan" id="dokumen_keuangan"
                                                rows="3"class="form-control" required />
                                        </div>
                                    </div>
                                    <br />
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- /Modern Horizontal Wizard -->
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script>
                // Initialize jquery.repeater for SLIK / IDEP sections
                $(function () {
                    $('.repeater-default').repeater({
                        show: function () {
                            $(this).slideDown();
                            if (window.feather) {
                                feather.replace({ width: 14, height: 14 });
                            }
                        },
                        hide: function (deleteElement) {
                            if (confirm('Hapus baris ini?')) {
                                $(this).slideUp(deleteElement);
                            }
                        }
                    });
                });

                //Form Validation (Bootstrap)
                var bootstrapForm = $('.needs-validation');

                Array.prototype.filter.call(bootstrapForm, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            form.classList.add('invalid');
                            // form.bootstrapValidator('defaultSubmit');

                        } else {
                            form.classList.add('was-validated');
                            form.bootstrapValidator('defaultSubmit');

                        }
                        form.classList.add('was-validated');
                        event.preventDefault();
                    });
                });
            </script>
        </div>
        <!-- END: Content-->
    @endsection
