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

        #ifPerbaruiLampiran {
            width: 100%;
            height: 100%;
            transition: all 0.5s;
        }

        #ifPerbaruiLampiran.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
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
                                    <li class="breadcrumb-item"><a href="/">UMKM</a>
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
                            <div class="step" data-target="#form2" role="tab" id="personal-info-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="user" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Data Diri</span>
                                        <span class="bs-stepper-subtitle">Isi Data Diri </span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#form3" role="tab" id="personal-info-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="image" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Lampiran</span>
                                        <span class="bs-stepper-subtitle">Isi Data Lampiran</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#form4" role="tab" id="personal-info-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="users" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Orang Terdekat</span>
                                        <span class="bs-stepper-subtitle">Isi Data Orang Terdekat</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#form5" role="tab" id="personal-info-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="briefcase" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Usaha</span>
                                        <span class="bs-stepper-subtitle">Isi Data Pekerjaan</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#form6" role="tab" id="personal-info-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="clipboard" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Jaminan</span>
                                        <span class="bs-stepper-subtitle">Isi Data Jaminan</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#form7" role="tab" id="personal-info-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="bar-chart-2" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Pendapatan Keuangan</span>
                                        <span class="bs-stepper-subtitle">Data Pendapatan</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#form8" role="tab" id="personal-info-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="bar-chart" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Pengeluaran Keuangan</span>
                                        <span class="bs-stepper-subtitle">Data Pengeluaran</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form class="needs-validation" method="POST" action="/umkm/revisi/{{ $pembiayaan->id }}"
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
                                        <select class="select2 w-100" name="AO_id" id="ao" disabled>
                                            <option value="{{ $pembiayaan->user->id }}">{{ $pembiayaan->user->name }}
                                                @foreach ($aos as $ao)
                                            <option value="{{ $ao->user->id }}">{{ $ao->user->name }}</option>
                                            @endforeach
                                            </option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tgl_pembiayaan"><small class="text-danger">*
                                                </small>Tanggal Pengajuan</label>
                                            <input type="text" name="tgl_pembiayaan" id="tgl_pembiayaan"
                                                class="form-control flatpickr-basic" placeholder="DD-MM-YYYY"
                                                value="{{ date('d-m-Y', strtotime($pembiayaan->tgl_pembiayaan)) }}"
                                                required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jenispenggunaan"><small class="text-danger">*
                                                </small>Jenis Penggunaan</label>
                                            <select class="select2 w-100" name="penggunaan_id" id="jenispenggunaan">
                                                <option>{{ $pembiayaan->penggunaan_id }}</option>
                                                <option label="jenispenggunaan">Pilih Jenis Penggunaan</option>
                                                <option>Kesehatan</option>
                                                <option>Kepemilikan Kendaraan Bermotor</option>
                                                <option>Perbaikan Rumah</option>
                                                <option>Pendidikan</option>
                                                <option>Modal Usaha/Pekerjaan</option>
                                                <option>Ibadah</option>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="sektor"><small class="text-danger">*
                                                </small>Sektor</label>
                                            <select class="select2 w-100" name="sektor_id" id="sektor_id"
                                                data-placeholder="Pilih Sektor" required>
                                                <option value=""></option>
                                                @foreach ($sektors as $sektor)
                                                    <option value="{{ $sektor->kode_sektor_ekonomi }}"
                                                        {{ $pembiayaan->sektor_id == $sektor->kode_sektor_ekonomi ? 'selected' : '' }}>
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
                                                    <option value="{{ $akad->kode_akad }}"
                                                        {{ $pembiayaan->akad_id == $akad->kode_akad ? 'selected' : '' }}>
                                                        {{ $akad->nama_akad }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"><small
                                                    class="text-danger">*
                                                </small>Nominal Pembiayaan</label>
                                            <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                                name="nominal_pembiayaan" id="omset"
                                                value="{{ number_format((float)($pembiayaan->nominal_pembiayaan ?? 0)) }}" required>
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="tenor"><small class="text-danger">*
                                                </small>Tenor</label>
                                            <select class="select2 w-100" name="tenor" id="tenor"
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
                                                <option value="12" {{ $pembiayaan->tenor == 12 ? 'selected' : '' }}>12
                                                    Bulan</option>
                                                <option value="18" {{ $pembiayaan->tenor == 18 ? 'selected' : '' }}>18
                                                    Bulan</option>
                                                <option value="24" {{ $pembiayaan->tenor == 24 ? 'selected' : '' }}>24
                                                    Bulan</option>
                                                <option value="48" {{ $pembiayaan->tenor == 36 ? 'selected' : '' }}>36
                                                    Bulan</option>
                                                <option value="48" {{ $pembiayaan->tenor == 48 ? 'selected' : '' }}>48
                                                    Bulan</option>
                                                <option value="60" {{ $pembiayaan->tenor == 60 ? 'selected' : '' }}>60
                                                    Bulan</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-2">
                                            <label class="form-label" for="harga"><small class="text-danger">*
                                                </small>Equivalen Rate</label>
                                            <input type="text" name="rate" class="form-control numeral-mask"
                                                placeholder="%" id="rate" value="{{ $pembiayaan->rate }}"
                                                required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="akad"><small class="text-danger">*
                                                </small>Cash Pick Up</label>
                                            <select class="select2 w-100" name="cashpickup" id="cashpickup"
                                                data-placeholder="Pilih Jenis Cash Pick Up" required>
                                                <option value=""></option>
                                                @foreach ($cashs as $cash)
                                                    <option value="{{ $cash->kode_jeniscash }}"
                                                        {{ $pembiayaan->cashpickup == $cash->kode_jeniscash ? 'selected' : '' }}>
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
                                                    <option value="{{ $nasabah->kode_jenisnasabah }}"
                                                        {{ $pembiayaan->nasabah == $nasabah->kode_jenisnasabah ? 'selected' : '' }}>
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
                                                    value="{{ $pembiayaan->nasabahh->nama_nasabah }}" required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="noktp"><small class="text-danger">*
                                                    </small>No KTP</label>
                                                <input type="number" name="no_ktp" id="no_ktp" class="form-control"
                                                    placeholder="Masukan Nomor KTP Anda"
                                                    value="{{ $pembiayaan->nasabahh->no_ktp }}" required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="tempatlahir"><small class="text-danger">*
                                                    </small>Tempat Lahir</label>
                                                <input type="text" name="tmp_lahir" id="tmp_lahir"
                                                    class="form-control" placeholder="Maukan Tempat Lahir Anda"
                                                    value="{{ $pembiayaan->nasabahh->tmp_lahir }}" required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="tgl_lahir"><small class="text-danger">*
                                                    </small>Tanggal Lahir</label>
                                                <input type="text" id="tgl_lahir" class="form-control flatpickr-basic"
                                                    name="tgl_lahir" placeholder="DD-MM-YYYY"
                                                    value="{{ date('d-m-Y', strtotime($pembiayaan->nasabahh->tgl_lahir)) }}"
                                                    required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="jenis_kelamin"><small
                                                        class="text-danger">*
                                                    </small>Jenis Kelamin</label>
                                                <select class="select2 w-100" name="jenis_kelamin" id="jenis_kelamin"
                                                    required>
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
                                                <input class="form-control" name="nama_ibu" id="ibu"
                                                    rows="3" placeholder="Masukkan Nama Ibu Kandung"
                                                    value="{{ $pembiayaan->nasabahh->nama_ibu }}" required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="exampleFormControlTextarea1"><small
                                                        class="text-danger">* </small>Alamat Sesuai KTP</label>
                                                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" required>{{ $pembiayaan->nasabahh->alamat }}</textarea>
                                            </div>
                                            <div class="mb-1 col-md-1">
                                                <label class="form-label" for="rt"><small class="text-danger">*
                                                    </small>RT</label>
                                                <input type="number" name="rt" id="rt" class="form-control"
                                                    placeholder="RT" value="{{ $pembiayaan->nasabahh->rt }}" required />
                                            </div>
                                            <div class="mb-1 col-md-1">
                                                <label class="form-label" for="rw"><small class="text-danger">*
                                                    </small>RW</label>
                                                <input type="number" name="rw" id="rw" class="form-control"
                                                    placeholder="RW" value="{{ $pembiayaan->nasabahh->rw }}" required />
                                            </div>
                                            <div class="mb-1 col-md-4">
                                                <label class="form-label" for="desa_kelurahan"><small
                                                        class="text-danger">*
                                                    </small>Desa / Kelurahan</label>
                                                <input type="text" name="desa_kelurahan" id="desa_kelurahan"
                                                    class="form-control" placeholder="Desa / Kelurahan"
                                                    value="{{ $pembiayaan->nasabahh->desa_kelurahan }}" required />
                                            </div>
                                            <div class="mb-1 col-md-4">
                                                <label class="form-label" for="kecamatan"><small class="text-danger">*
                                                    </small>Kecamatan</label>
                                                <input type="text" name="kecamatan" id="kecamatan"
                                                    class="form-control" placeholder="Kecamatan"
                                                    value="{{ $pembiayaan->nasabahh->kecamatan }}" required />
                                            </div>
                                            <div class="mb-1 col-md-4">
                                                <label class="form-label" for="kabkota"><small class="text-danger">*
                                                    </small>Kabupaten / Kota</label>
                                                <input type="text" name="kabkota" id="kabkota" class="form-control"
                                                    placeholder="Kabupaten / Kota"
                                                    value="{{ $pembiayaan->nasabahh->kabkota }}" required />
                                            </div>
                                            <div class="mb-1 col-md-4">
                                                <label class="form-label" for="provinsi"><small class="text-danger">*
                                                    </small>Provinsi</label>
                                                <input type="text" name="provinsi" id="provinsi"
                                                    class="form-control" placeholder="Provinsi"
                                                    value="{{ $pembiayaan->nasabahh->provinsi }}" required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="exampleFormControlTextarea1">Alamat
                                                    Domisili</label>
                                                <textarea name="alamat_domisili" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                    placeholder="Alamat">{{ $pembiayaan->nasabahh->alamat_domisili }}</textarea>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="lamatinggal"><small class="text-danger">*
                                                    </small>Lama Tinggal Di Alamat Rumah</label>
                                                <select class="select2 w-100" name="lama_tinggal" id="lama_tinggal"
                                                    data-placeholder="Pilih Lama Tinggal" required>
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->nasabahh->lama_tinggal == '< 1 Tahun' ? 'selected' : '' }}>
                                                        < 1 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->nasabahh->lama_tinggal == '1 - 3 Tahun' ? 'selected' : '' }}>
                                                        1 - 3 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->nasabahh->lama_tinggal == '3 - 4 Tahun' ? 'selected' : '' }}>
                                                        3 - 4 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->nasabahh->lama_tinggal == '> 4 Tahun' ? 'selected' : '' }}>
                                                        > 4 Tahun</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="kep_rumah"><small class="text-danger">*
                                                    </small>Kepemilikan Rumah</label>
                                                <select class="select2 w-100" name="kepemilikan_rumah" id="kep_rumah"
                                                    name="kep_toko_id" data-placeholder="Pilih Kepemilikan Rumah"
                                                    required>
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->rumah->kepemilikan_rumah == 'Milik Sendiri' ? 'selected' : '' }}>
                                                        Milik Sendiri</option>
                                                    <option
                                                        {{ $pembiayaan->rumah->kepemilikan_rumah == 'Milik Keluarga' ? 'selected' : '' }}>
                                                        Milik Keluarga</option>
                                                    <option
                                                        {{ $pembiayaan->rumah->kepemilikan_rumah == 'Sewa Atau Kontrak' ? 'selected' : '' }}>
                                                        Sewa Atau Kontrak</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="leg_rumah"><small class="text-danger">*
                                                    </small>Legalitas Kepemilikan Rumah</label>
                                                <select class="select2 w-100" name="legalitas_kepemilikan_rumah"
                                                    id="legalitas_kepemilikan_rumah"
                                                    data-placeholder="Pilih Legalitas Kepemilikan
                                                    Rumah"
                                                    required>
                                                    <option value="">
                                                    </option>
                                                    @foreach ($rumahs as $rumah)
                                                        <option value="{{ $rumah->id }}"
                                                            {{ $pembiayaan->rumah->legalitasrumah->id == $rumah->id ? 'selected' : '' }}>
                                                            {{ $rumah->nama_jaminan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="Pendidikan_id"><small
                                                        class="text-danger">*
                                                    </small>Pendidikan Terakhir</label>
                                                <select class="select2 w-100" name="pendidikan" id="pendidikan_id"
                                                    data-placeholder="Pilih Pendidikan Terakhir" required>
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->nasabahh->pendidikan == 'Tidak Sekolah' ? 'selected' : '' }}>
                                                        Tidak Sekolah</option>
                                                    <option
                                                        {{ $pembiayaan->nasabahh->pendidikan == 'SD' ? 'selected' : '' }}>
                                                        SD</option>
                                                    <option
                                                        {{ $pembiayaan->nasabahh->pendidikan == 'SMP' ? 'selected' : '' }}>
                                                        SMP</option>
                                                    <option
                                                        {{ $pembiayaan->nasabahh->pendidikan == 'SMA' ? 'selected' : '' }}>
                                                        SMA</option>
                                                    <option
                                                        {{ $pembiayaan->nasabahh->pendidikan == 'Diploma' ? 'selected' : '' }}>
                                                        Diploma</option>
                                                    <option
                                                        {{ $pembiayaan->nasabahh->pendidikan == 'S1' ? 'selected' : '' }}>
                                                        S1</option>
                                                    <option
                                                        {{ $pembiayaan->nasabahh->pendidikan == 'S2' ? 'selected' : '' }}>
                                                        S2</option>
                                                    <option
                                                        {{ $pembiayaan->nasabahh->pendidikan == 'S3' ? 'selected' : '' }}>
                                                        S3</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="agama"><small class="text-danger">*
                                                    </small>Agama</label>
                                                <select class="select2 w-100" name="agama_id" id="agama_id"
                                                    data-placeholder="Pilih Agama" required>
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->nasabahh->agama_id == 'Islam' ? 'selected' : '' }}>
                                                        Islam</option>
                                                    <option
                                                        {{ $pembiayaan->nasabahh->agama_id == 'Kristen' ? 'selected' : '' }}>
                                                        Kristen</option>
                                                    <option
                                                        {{ $pembiayaan->nasabahh->agama_id == 'Katholik' ? 'selected' : '' }}>
                                                        Katholik</option>
                                                    <option
                                                        {{ $pembiayaan->nasabahh->agama_id == 'Hindu' ? 'selected' : '' }}>
                                                        Hindu</option>
                                                    <option
                                                        {{ $pembiayaan->nasabahh->agama_id == 'Buddha' ? 'selected' : '' }}>
                                                        Buddha</option>
                                                    <option
                                                        {{ $pembiayaan->nasabahh->agama_id == 'Konghucu' ? 'selected' : '' }}>
                                                        Konghucu</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="status"><small class="text-danger">*
                                                    </small>Status</label>
                                                <select class="select2 w-100" name="status_id" id="status_id" required>
                                                    <option value="">
                                                    </option>
                                                    @foreach ($statuss as $status)
                                                        <option value="{{ $status->id }}"
                                                            {{ $pembiayaan->nasabahh->status->id == $status->id ? 'selected' : '' }}>
                                                            {{ $status->nama_status_perkawinan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="nama_pasangan">Nama
                                                    Suami/Istri</label>
                                                <input class="form-control" name="nama_pasangan" id="nama_pasangan"
                                                    rows="3" placeholder="Masukkan Nama Suami Istri"
                                                    value="{{ $pembiayaan->nasabahh->nama_pasangan }}">
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="jumlahanak"><small class="text-danger">*
                                                    </small>Jumlah
                                                    Anak/Tanggungan</label>
                                                <select class="select2 w-100" name="jumlah_anak" id="jumlah_anak"
                                                    data-placeholder="Pilih Jumlah Anak/Tanggungan" required>
                                                    <option value="">
                                                    </option>
                                                    @foreach ($tanggungans as $tanggungan)
                                                        <option value="{{ $tanggungan->id }}"
                                                            {{ $pembiayaan->nasabahh->tanggungan->id == $tanggungan->id ? 'selected' : '' }}>
                                                            {{ $tanggungan->bannyak_tanggungan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="nonpwp">No NPWP</label>
                                                <input type="number" name="npwp" id="npwp" class="form-control"
                                                    placeholder="Masukan Nomor NPWP Anda" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="notelp"><small class="text-danger">*
                                                    </small>No Telepon</label>
                                                <input type="text" name="no_tlp" id="no_tlp" class="form-control"
                                                    placeholder="Masukkan Nomor Telepon"
                                                    value="{{ $pembiayaan->nasabahh->no_tlp }}" required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="suku"><small class="text-danger">*
                                                    </small>Suku Bangsa</label>
                                                <select class="select2 w-100" name="suku_bangsa_id" id="suku_bangsa_id"
                                                    data-placeholder="Pilih Suku Bangsa Nasabah" required>
                                                    <option value=""></option>
                                                    @foreach ($sukus as $suku)
                                                        <option value="{{ $suku->kode_suku }}"
                                                            {{ optional($pembiayaan->keteranganusaha?->suku)->kode_suku == $suku->kode_suku ? 'selected' : '' }}>
                                                            {{ $suku->nama_suku }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
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
                                        <h5 class="mb-0 mt-2">Data Lampiran</h5>
                                    </div>
                                    <div class="row">
                                        @php
                                            $fotodiri = Modules\Umkm\Entities\UmkmFoto::Select()
                                                ->where('umkm_pembiayaan_id', $pembiayaan->id)
                                                ->where('kategori', 'Foto Diri')
                                                ->first();
                                            $fotodiriktp = Modules\Umkm\Entities\UmkmFoto::Select()
                                                ->where('umkm_pembiayaan_id', $pembiayaan->id)
                                                ->where('kategori', 'Foto Diri Bersama KTP')
                                                ->first();
                                            $fotoktp = Modules\Umkm\Entities\UmkmFoto::Select()
                                                ->where('umkm_pembiayaan_id', $pembiayaan->id)
                                                ->where('kategori', 'Foto KTP')
                                                ->first();
                                            $fotokk = Modules\Umkm\Entities\UmkmFoto::Select()
                                                ->where('umkm_pembiayaan_id', $pembiayaan->id)
                                                ->where('kategori', 'Foto Kartu Keluarga')
                                                ->first();
                                            $fototoko = Modules\Umkm\Entities\UmkmFoto::Select()
                                                ->where('umkm_pembiayaan_id', $pembiayaan->id)
                                                ->where('kategori', 'Foto toko')
                                                ->first();
                                            $fotonota = Modules\Umkm\Entities\UmkmFoto::Select()
                                                ->where('umkm_pembiayaan_id', $pembiayaan->id)
                                                ->where('kategori', 'Foto Nota Pembelanjaan')
                                                ->first();
                                        @endphp
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="perbaruiFotoPemohon">Perbarui Lampiran
                                                Nasabah
                                            </label>
                                            <select class="select2 w-100" name="perbarui_lampiran_pemohon"
                                                id="perbaruiLampiran" onChange="changePerbaruiLampiran()">
                                                <option value="Ya">Ya</option>
                                                <option value="Tidak" selected>Tidak
                                                </option>
                                            </select>
                                        </div>
                                        <div class="row hide" id="ifPerbaruiLampiran">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="fotoDiri"><small class="text-danger">*
                                                    </small>Upload Foto Diri</label>
                                                <input type="hidden" name="foto[1][foto_lama]"
                                                    value="{{ old('foto', $fotodiri->foto) }}">
                                                <input type="hidden" name="foto[1][id]" rows="3"
                                                    class="form-control" value="{{ $fotodiri->id }}">
                                                <input type="file" name="foto[1][foto]" id="fotoDiri" rows="3"
                                                    class="form-control">
                                                <input type="hidden" name="foto[1][kategori]" value="Foto Diri"
                                                    rows="3" class="form-control" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="fotoKtp"><small class="text-danger">*
                                                    </small>Upload Foto KTP</label>
                                                <input type="hidden" name="foto[2][foto_lama]"
                                                    value="{{ old('foto', $fotoktp->foto) }}">
                                                <input type="hidden" name="foto[2][id]" rows="3"
                                                    class="form-control" value="{{ $fotoktp->id }}">
                                                <input type="file" name="foto[2][foto]" id="fotoKtp" rows="3"
                                                    class="form-control">
                                                <input type="hidden" name="foto[2][kategori]" value="Foto KTP"
                                                    rows="3" class="form-control" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="fotoDiriKtp"><small class="text-danger">*
                                                    </small>Upload Foto Diri Bersama KTP</label>
                                                <input type="hidden" name="foto[3][foto_lama]"
                                                    value="{{ old('foto', $fotodiriktp->foto) }}">
                                                <input type="hidden" name="foto[3][id]" rows="3"
                                                    class="form-control" value="{{ $fotodiriktp->id }}">
                                                <input type="file" name="foto[3][foto]" id="fotoDiriKtp"
                                                    rows="3" class="form-control">
                                                <input type="hidden" name="foto[3][kategori]"
                                                    value="Foto Diri Bersama KTP" rows="3" class="form-control" />

                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="fotoKk"><small class="text-danger">*
                                                    </small>Upload Foto Kartu Keluarga</label>
                                                <input type="hidden" name="foto[4][foto_lama]"
                                                    value="{{ old('foto', $fotokk->foto) }}">
                                                <input type="hidden" name="foto[4][id]" rows="3"
                                                    class="form-control" value="{{ $fotokk->id }}">
                                                <input type="file" name="foto[4][foto]" id="fotoKk" rows="3"
                                                    class="form-control">
                                                <input type="hidden" name="foto[4][kategori]"
                                                    value="Foto Kartu Keluarga" rows="3" class="form-control" />
                                            </div>
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
                                        <h5 class="mb-0 mt-2">Data Orang Terdekat</h5>
                                        <small class="text-muted">Lengkapi Data Orang Terdekat Tidak Serumah.</small>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="namaot"><small class="text-danger">*
                                                </small>Nama</label>
                                            <input type="text" name="namaot" id="namaot" class="form-control"
                                                placeholder="Masukan Nama Orang Terdekat"
                                                value="{{ $pembiayaan->nasabahh->namaot }}" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="telpot"><small class="text-danger">*
                                                </small>No Telepon</label>
                                            <input type="number" name="telp_ot" id="telp_ot" class="form-control"
                                                placeholder="Masukan Nomor Telepon Orang Terdekat"
                                                value="{{ $pembiayaan->nasabahh->telp_ot }}" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="exampleFormControlTextarea1"><small
                                                    class="text-danger">* </small>Alamat</label>
                                            <textarea class="form-control" name="alamat_ot" id="exampleFormControlTextarea1" rows="3"
                                                placeholder="Alamat Orang Terdekat" required>{{ $pembiayaan->nasabahh->alamat_ot }}</textarea>
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
                                        <h5 class="mb-0 mt-2">Data Usaha</h5>
                                        <small class="text-muted">Lengkapi Data Usaha Anda.</small>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nama_usaha"><small class="text-danger">*
                                                </small>Nama Usaha</label>
                                            <input type="text" name="nama_usaha" id="nama_usaha" class="form-control"
                                                placeholder="Masukan Nama Toko Atau Usaha"value="{{ $pembiayaan->keteranganusaha->nama_usaha }}"
                                                required>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jenisdagang_id"><small class="text-danger">*
                                                </small>Jenis Dagang</label>
                                            <select class="select2 w-100" name="jenisdagang_id" id="jenisdagang_id"
                                                data-placeholder="Pilih Jenis Dagang" required>
                                                <option value="">
                                                </option>
                                                @foreach ($dagangs as $dagang)
                                                    <option value="{{ $dagang->id }}"
                                                        {{ $pembiayaan->keteranganusaha->dagang->id == $dagang->id ? 'selected' : '' }}>
                                                        {{ $dagang->nama_jenisdagang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="keptoko"><small class="text-danger">*
                                                </small>Kepemilikan Usaha</label>
                                            <select class="select2 w-100" name="kep_toko_id" id="keptoko"
                                                data-placeholder="Pilih Kepemilikan Usaha" required>
                                                <option value=""></option>
                                                <option
                                                    {{ $pembiayaan->keteranganusaha->kep_toko_id == 'Milik Sendiri' ? 'selected' : '' }}>
                                                    Milik Sendiri</option>
                                                <option
                                                    {{ $pembiayaan->keteranganusaha->kep_toko_id == 'Milik Keluarga' ? 'selected' : '' }}>
                                                    Milik Keluarga</option>
                                                <option
                                                    {{ $pembiayaan->keteranganusaha->kep_toko_id == 'Sewa Atau Kontrak' ? 'selected' : '' }}>
                                                    Sewa Atau Kontrak</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="lamausaha"><small class="text-danger">*
                                                </small>Lama Usaha</label>
                                            <select class="select2 w-100" name="lama_usaha" id="lama_usaha"
                                                data-placeholder="Pilih Lama Usaha" required>
                                                <option value="">
                                                </option>
                                                @foreach ($lamas as $lama)
                                                    <option value="{{ $lama->id }}"
                                                        {{ $pembiayaan->keteranganusaha->lamadagang->id == $lama->id ? 'selected' : '' }}>
                                                        {{ $lama->nama_lamaberdagang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="lamausaha"><small class="text-danger">*
                                                </small>Alamat Usaha</label>
                                            <input type="text" name="alamatusaha" id="alamat" class="form-control"
                                                placeholder="Alamat Usaha"
                                                value="{{ $pembiayaan->keteranganusaha->alamatusaha }}" required>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="legalitastoko"><small class="text-danger">*
                                                </small>Legalitas Kepemilikan Usaha</label>
                                            <select class="select2 w-100" name="leg_toko_id" id="legalitastoko"
                                                data-placeholder="Pilih Legalitas Kepemilikan Toko" required>
                                                <option value=""></option>
                                                <option
                                                    {{ $pembiayaan->keteranganusaha->leg_toko_id == 'Surat Keterangan Usaha ( SKU )' ? 'selected' : '' }}>
                                                    Surat Keterangan Usaha ( SKU )</option>
                                                <option
                                                    {{ $pembiayaan->keteranganusaha->leg_toko_id == 'Surat Keterangan Domisili Usaha ( SKDU )' ? 'selected' : '' }}>
                                                    Surat Keterangan Domisili Usaha ( SKDU )</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="fotoktp"><small class="text-danger">*
                                                </small>Upload Foto Usaha</label>
                                            <input type="hidden" name="foto[5][foto_lama]"
                                                value="{{ old('foto', $fototoko->foto) }}">
                                            <input type="hidden" name="foto[5][id]" rows="3" class="form-control"
                                                value="{{ $fototoko->id }}">
                                            <input type="file" name="foto[5][foto]" id="fototoko" rows="3"
                                                class="form-control" required>
                                            <input type="hidden" name="foto[5][kategori]" value="Foto toko"
                                                rows="3" class="form-control" />
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
                                    aria-labelledby="account-details-trigger">
                                    <div class="content-header">
                                        <h5 class="mb-0 mt-2">Data Jaminan</h5>
                                        <small class="text-muted">Silahkan Upload Data Jaminan Anda</small>
                                    </div>
                                    <div class="row">
                                        <small>Jaminan Utama</small>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jaminanlain"><small class="text-danger">*
                                                </small>Pilih Jaminan</label>
                                            <select class="select2 w-100" name="jaminanlain" id="jaminanlain" required>
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
                                                placeholder="Masukan No KTB"
                                                value="{{ $pembiayaan->jaminanpasar->no_ktb }}" required>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="SHPB"> <small class="text-danger">*
                                                </small>Upload Jaminan Utama</label>
                                            <input type="file" name="dokumenktb" id="dokumenktb" rows="3"
                                                class="form-control" />
                                            <input type="hidden" id="EditUserFirstName" name="dokumenlama"
                                                value="{{ $jaminanutama->dokumenktb }}" class="form-control" required />
                                        </div>

                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="dokumen_jaminan">Upload Jaminan
                                                Lainnya</label>
                                            <input type="file" name="dokumen_jaminan" id="dokumen_jaminan"
                                                rows="3" class="form-control">
                                            @if ($jaminanlain)
                                                <input type="hidden" id="EditUserFirstName" name="dokumenjaminanlama"
                                                    value="{{ $jaminanlain->dokumen_jaminan }}" class="form-control" />
                                            @endif
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
                                    aria-labelledby="personal-info-modern-trigger">
                                    <div class="content-header">
                                        <h5 class="mb-0">Data Pendapatan</h5>
                                        <small>Isikan Data Pendapatan Nasabah</small>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="numeral-formatting"><small class="text-danger">*
                                            </small>Omset Per Bulan</label>
                                        <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                            name="omset" id="omset" value="{{ $pembiayaan->omset }}" required>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"></small>HPP</label>
                                            <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                                name="hpp" id="hpp" value="{{ $pembiayaan->hpp }}">
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"></small>Biaya
                                                Listrik</label>
                                            <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                                name="listrik" id="listrik" value="{{ $pembiayaan->listrik }}">
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"></small>Biaya
                                                Transport</label>
                                            <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                                name="trasport" id="transport" value="{{ $pembiayaan->trasport }}">
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"></small>Biaya
                                                Karyawan</label>
                                            <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                                name="karyawan" id="karyawan" value="{{ $pembiayaan->karyawan }}">
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"></small>Biaya
                                                Telpon</label>
                                            <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                                name="telpon" id="telpon" value="{{ $pembiayaan->telpon }}">
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"> </small>Biaya Sewa
                                                Kios</label>
                                            <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                                name="sewa" id="sewa" value="{{ $pembiayaan->sewa }}">
                                        </div>
                                        @if ($fotonota)
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="fotoktp"><small class="text-danger">*
                                                    </small>Upload Nota Pembelanjaan</label>
                                                <input type="hidden" name="foto[6][foto_lama]"
                                                    value="{{ old('foto', $fotonota->foto) }}">
                                                <input type="hidden" name="foto[6][id]" rows="3"
                                                    class="form-control" value="{{ $fotonota->id }}">
                                                <input type="file" name="foto[6][foto]" id="fotonota" rows="3"
                                                    class="form-control" required>
                                                <input type="hidden" name="foto[6][kategori]"
                                                    value="Foto Nota Pembelanjaan" rows="3" class="form-control" />
                                            </div>
                                        @endif
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
                                <div id="form8" class="content" role="tabpanel"
                                    aria-labelledby="account-details-trigger">
                                    <div class="content-header">
                                        <h5 class="mb-0">Data Pengeluaran</h5>
                                        <small>Data Pengeluaran Nasabah</small>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center; width: 5%;" class="py-1">No</th>
                                                    <th style="text-align: center" class="py-1">Nama
                                                        Bank</th>
                                                    <th style="text-align: center" class="py-1">
                                                        Plafond
                                                    </th>
                                                    <th style="text-align: center" class="py-1">
                                                        Outstanding</th>
                                                    <th style="text-align: center" class="py-1">
                                                        Tenor
                                                    </th>
                                                    <th style="text-align: center" class="py-1">
                                                        Margin
                                                    </th>
                                                    <th style="text-align: center" class="py-1">
                                                        Angsuran
                                                    </th>
                                                    <th style="text-align: center" class="py-1">
                                                        Agunan
                                                    </th>
                                                    <th style="text-align: center" class="py-1">Kol
                                                        Tertinggi</th>
                                                <th style="text-align: center">Action</th>
                                    </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($idebs as $ideb)
                                                    <tr>
                                                        <td style="text-align: center">
                                                            {{ $loop->iteration }}</td>
                                                        <td>{{ $ideb->nama_bank }}</td>
                                                        <td>Rp. {{ number_format((float)($ideb->plafond ?? 0)) }}
                                                        </td>
                                                        <td>Rp. {{ number_format((float)($ideb->outstanding ?? 0)) }}
                                                        </td>
                                                        <td style="text-align: center">
                                                            {{ $ideb->tenor }}
                                                        </td>
                                                        <td style="text-align: center">
                                                            {{ number_format((float)($ideb->margin ?? 0)) }}%
                                                        </td>
                                                        <td>Rp. {{ number_format((float)($ideb->angsuran ?? 0)) }}
                                                        </td>
                                                        <td style="text-align: center">
                                                            {{ $ideb->agunan }}
                                                        </td>
                                                        <td style="text-align: center">
                                                            {{ $ideb->kol }}</td>
                                <td style="text-align: center">
                                    <a href="/umkm/revisi/{ $proposal->id }" class="btn btn-outline-info round">Detail</a>
                                </td>
                                </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                    <hr class="invoice-spacing" />
                                    <small>Jika ada perubahan pada Slik, silahkan inputkan dari awal</small>
                                    <hr class="invoice-spacing" />
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
                                                                        <input type="number"
                                                                            class="form-control persen" name="margin"
                                                                            id="margin" aria-describedby="margin"
                                                                            placeholder="%" />
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
                                    <br />
                                    <div class="table-responsive">
                                        <small>Informasi Debitur Pasangan</small>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center; width: 5%;" class="py-1">No</th>
                                                    <th style="text-align: center" class="py-1">Nama
                                                        Bank</th>
                                                    <th style="text-align: center" class="py-1">
                                                        Plafond
                                                    </th>
                                                    <th style="text-align: center" class="py-1">
                                                        Outstanding</th>
                                                    <th style="text-align: center" class="py-1">
                                                        Tenor
                                                    </th>
                                                    <th style="text-align: center" class="py-1">
                                                        Margin
                                                    </th>
                                                    <th style="text-align: center" class="py-1">
                                                        Angsuran
                                                    </th>
                                                    <th style="text-align: center" class="py-1">
                                                        Agunan
                                                    </th>
                                                    <th style="text-align: center" class="py-1">Kol
                                                        Tertinggi</th>
                                                <th style="text-align: center">Action</th>
                                    </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($idebpasangans as $idebpasangan)
                                                    <tr>
                                                        <td style="text-align: center">
                                                            {{ $loop->iteration }}</td>
                                                        <td>{{ $idebpasangan->nama_bank }}</td>
                                                        <td>Rp. {{ number_format((float)($idebpasangan->plafond ?? 0)) }}
                                                        </td>
                                                        <td>Rp. {{ number_format((float)($idebpasangan->outstanding ?? 0)) }}
                                                        </td>
                                                        <td style="text-align: center">
                                                            {{ $idebpasangan->tenor }}
                                                        </td>
                                                        <td style="text-align: center">
                                                            {{ number_format((float)($idebpasangan->margin ?? 0)) }}%
                                                        </td>
                                                        <td>Rp. {{ number_format((float)($idebpasangan->angsuran ?? 0)) }}
                                                        </td>
                                                        <td style="text-align: center">
                                                            {{ $idebpasangan->agunan }}
                                                        </td>
                                                        <td style="text-align: center">
                                                            {{ $idebpasangan->kol }}</td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                    <br />
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
                                                                        <input type="number"
                                                                            class="form-control persen" name="margin"
                                                                            id="margin" aria-describedby="margin"
                                                                            placeholder="%" />
                                                                    </div>
                                                                </div>

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
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"><small
                                                    class="text-danger">* </small>Pengeluaran Lainnya</label>
                                            <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                                name="keb_keluarga" id="kebkeluarga"
                                                value="{{ $pembiayaan->keb_keluarga }}" required>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"><small
                                                    class="text-danger">* </small>Keterangan Pengeluaran
                                                Lainnya</label>
                                            <input type="text" class="form-control"
                                                placeholder="Keterangan Pengeluaran" name="keterangan_keb_keluarga"
                                                id="kebkeluarga" value="{{ $pembiayaan->keterangan_keb_keluarga }}"
                                                required>
                                        </div>

                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"><small
                                                    class="text-danger">* </small>Kesanggupan Angsuran</label>
                                            <input type="text" class="form-control numeral-mask"
                                                name="kesanggupan_angsuran" placeholder="Rp."
                                                id="kesanggupan_angsuran"
                                                value="{{ $pembiayaan->kesanggupan_angsuran }}" required>
                                        </div><br>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="dokumen_keuangan"><small
                                                    class="text-danger">* </small>Upload IDEB</label>
                                            <input type="file" name="dokumen_keuangan" id="dokumen_keuangan"
                                                rows="3"class="form-control" required>
                                            <input type="hidden" id="EditUserFirstName" name="dokumen_keuangan_lama"
                                                value="{{ $pembiayaan->dokumen_keuangan }}" class="form-control" />
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

            </div>
        </div>
    </div>

    </div>
    <!-- END: Content-->
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


        function changePerbaruiFotoPemohon() {
            var perbaruiFotoPemohon = document.getElementById("perbaruiFotoPemohon");
            if (perbaruiFotoPemohon.value == "Ya") {
                document.getElementById("fotodiri").classList.toggle("hide"),
                    document.getElementById("fotoktp").classList.toggle("hide");
                document.getElementById("fotokk").classList.toggle("hide"),
                    document.getElementById("fotodiriktp").classList.toggle("hide");
                document.getElementById("fototoko").classList.toggle("hide");
                document.getElementById("fotonota").classList.toggle("hide");
            } else {
                document.getElementById("fotodiri").classList.toggle("hide"),
                    document.getElementById("fotoktp").classList.toggle("hide");
                document.getElementById("fotokk").classList.toggle("hide"),
                    document.getElementById("fotodiriktp").classList.toggle("hide");
                document.getElementById("fototoko").classList.toggle("hide");
                document.getElementById("fotonota").classList.toggle("hide");
            }
        }

        function changePerbaruiLampiran() {
            var perbaruiLampiran = document.getElementById("perbaruiLampiran");
            if (perbaruiLampiran.value == "Ya") {
                document.getElementById("ifPerbaruiLampiran").classList.add("row"),
                    document.getElementById("ifPerbaruiLampiran").classList.toggle("hide"),
                    document.getElementById("fotoDiri").setAttribute("required", "required"),
                    document.getElementById("fotoKtp").setAttribute("required", "required"),
                    document.getElementById("fotoDiriKtp").setAttribute("required", "required"),
                    document.getElementById("fotoKk").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiLampiran").classList = "hide",
                    document.getElementById("fotoDiri").removeAttribute("required"),
                    document.getElementById("fotoKtp").removeAttribute("required"),
                    document.getElementById("fotoDiriKtp").removeAttribute("required"),
                    document.getElementById("fotoKk").removeAttribute("required");
            }
        }
    </script>
@endsection
