@extends('skpd::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
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
                            <div class="step" data-target="#form" role="tab" id="account-details-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="file-text" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Form Simulasi Pembiayaan</span>
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
                                        <i data-feather="file-text" class="font-medium-3"></i>
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
                            <div class="step" data-target="#formupload" role="tab"
                                id="account-details-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="file-text" class="font-medium-3"></i>
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
                                        <i data-feather="file-text" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Data Orang Terdekat</span>
                                        <span class="bs-stepper-subtitle">Masukan data Orang terdekat todak serumah</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#formpekerjaan" role="tab"
                                id="account-details-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="file-text" class="font-medium-3"></i>
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
                            <div class="step" data-target="#formjaminan" role="tab"
                                id="account-details-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="file-text" class="font-medium-3"></i>
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
                                        <i data-feather="user" class="font-medium-3"></i>
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
                                        <i data-feather="user" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Data Pengeluaran</span>
                                        <span class="bs-stepper-subtitle">Isi Data pengeluaran</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form method='post' action="/skpd/revisi/{{ $pembiayaan->id }}"
                                enctype="multipart/form-data">
                                @method('put')
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
                                            <select class="select2 w-100" name="user_id" id="ao" required>
                                                @foreach ($aos as $ao)
                                                    @if (old('user_id', $pembiayaan->user->id) == $pembiayaan->user->name)
                                                        <option value="{{ $pembiayaan->user->id }}" selected>
                                                            {{ $pembiayaan->user->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $pembiayaan->user->id }}">
                                                            {{ $pembiayaan->user->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tanggal"><small class="text-danger">*
                                                </small>Tanggal Pengajuan</label>
                                            <input type="text" id="tanggal" class="form-control flatpickr-basic"
                                                name="tanggal_pengajuan" placeholder="YYYY-MM-DD"
                                                value="{{ $pembiayaan->tanggal_pengajuan }}" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jenispenggunaan"><small class="text-danger">*
                                                </small>Jenis Penggunaan</label>
                                            <select class="select2 w-100" name="skpd_jenis_penggunaan_id"
                                                id="jenispenggunaan" required>
                                                @foreach ($penggunaans as $penggunaan)
                                                    @if (old('skpd_jenis_penggunaan_id', $penggunaan->id) == $penggunaan->jenis_penggunaan)
                                                        <option value="{{ $penggunaan->id }}" selected>
                                                            {{ $penggunaan->jenis_penggunaan }}</option>
                                                    @else
                                                        <option value="{{ $penggunaan->id }}">
                                                            {{ $penggunaan->jenis_penggunaan }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="sektor"><small class="text-danger">*
                                                </small>Sektor
                                                Ekonomi</label>
                                            <select class="select2 w-100" name="skpd_sektor_ekonomi_id" id="sektor"
                                                required>
                                                @foreach ($sektors as $sektor)
                                                    @if (old('skpd_sektor_ekonomi_id', $sektor->id) == $sektor->nama_sektor_ekonomi)
                                                        <option value="{{ $sektor->id }}" selected>
                                                            {{ $sektor->nama_sektor_ekonomi }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $sektor->id }}">
                                                            {{ $sektor->nama_sektor_ekonomi }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="akad"><small class="text-danger">*
                                                </small>Akad</label>
                                            <select class="select2 w-100" name="skpd_akad_id" id="akad" required>
                                                @foreach ($akads as $akad)
                                                    @if (old('skpd_akad_id', $akad->id) == $akad->nama_akad)
                                                        <option value="{{ $akad->id }}" selected>
                                                            {{ $akad->nama_akad }}</option>
                                                    @else
                                                        <option value="{{ $akad->id }}">{{ $akad->nama_akad }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nominal_pembiayaan"><small
                                                    class="text-danger">*
                                                </small>Nominal Pembiayaan</label>
                                            <input type="text" name="nominal_pembiayaan"
                                                class="form-control numeral-mask4" placeholder="Rp."
                                                id="nominal_pembiayaan" required
                                                value="{{ $pembiayaan->nominal_pembiayaan }}" />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="tenor"><small class="text-danger">*
                                                </small>Tenor</label>
                                            <select class="select2 w-100" name="tenor" id="tenor" required>
                                                @if (old('tenor', $pembiayaan->tenor) == $pembiayaan->tenor)
                                                    <option value={{ $pembiayaan->tenor }} selected>
                                                        {{ $pembiayaan->tenor }} Bulan</option>
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
                                                    <option value="12">18 Bulan</option>
                                                    <option value="24">24 Bulan</option>
                                                    <option value="36">36 Bulan</option>
                                                    <option value="48">48 Bulan</option>
                                                    <option value="60">60 Bulan</option>
                                                @else
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
                                                    <option value="12">18 Bulan</option>
                                                    <option value="24">24 Bulan</option>
                                                    <option value="36">36 Bulan</option>
                                                    <option value="48">48 Bulan</option>
                                                    <option value="60">60 Bulan</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-2">
                                            <label class="form-label" for="rate"><small class="text-danger">*
                                                </small>Rate</label>
                                            <input type="text" name="rate" class="form-control numeral-mask4"
                                                placeholder="%" id="rate" value="{{ $pembiayaan->rate }}" />
                                        </div>
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
                                            <input type="text" name="nama_nasabah" id="nama"
                                                class="form-control" placeholder="Nama Lengkap"
                                                value="{{ $nasabah->nama_nasabah }}" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="noktp"><small class="text-danger">*
                                                </small>No
                                                KTP</label>
                                            <input type="number" name="no_ktp" id="noktp" class="form-control"
                                                placeholder="Masukan Nomor KTP Anda" value="{{ $nasabah->no_ktp }}"
                                                required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nama">Nama Lengkap Pasangan Nasabah</label>
                                            <input type="text" name="nama_pasangan_nasabah" id="nama"
                                                class="form-control" value="{{ $nasabah->nama_pasangan_nasabah }}"
                                                placeholder="Nama Lengkap Pasangan Anda" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="noktp">No
                                                KTP Pasangan</label>
                                            <input type="number" name="no_ktp_pasangan" id="noktp"
                                                class="form-control" placeholder="Masukan Nomor KTP pasangan Anda"
                                                value="{{ $nasabah->no_ktp_pasangan }}" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tempatlahir"><small class="text-danger">*
                                                </small>Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                                class="form-control" placeholder="Maukan Tempat Lahir Anda"
                                                value="{{ $nasabah->tempat_lahir }}" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tgllahir"><small class="text-danger">*
                                                </small>Tanggal Lahir</label>
                                            <input type="date" id="tgl_lahir" class="form-control flatpickr-basic"
                                                name="tgl_lahir" placeholder="YYYY-MM-DD"
                                                value="{{ $nasabah->tgl_lahir }}" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="exampleFormControlTextarea1"><small
                                                    class="text-danger">* </small>Alamat Sesuai KTP</label>
                                            <input name="alamat" class="form-control" id="exampleFormControlTextarea1"
                                                rows="3" placeholder="{{ $nasabah->alamat }}"
                                                value="{{ $nasabah->alamat }}" required />
                                        </div>
                                        <div class="mb-1 col-md-1">
                                            <label class="form-label" for="rt"><small class="text-danger">*
                                                </small>RT</label>
                                            <input type="number" name="rt" id="rt" class="form-control"
                                                placeholder="RT" value="{{ $nasabah->rt }}" required />
                                        </div>
                                        <div class="mb-1 col-md-1">
                                            <label class="form-label" for="rw"><small class="text-danger">*
                                                </small>RW</label>
                                            <input type="number" name="rw" id="rw" class="form-control"
                                                placeholder="RW" value="{{ $nasabah->rt }}" required />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="desa_kelurahan"><small class="text-danger">*
                                                </small>Desa / Kelurahan</label>
                                            <input type="text" name="desa_kelurahan" id="desa_kelurahan"
                                                class="form-control" value="{{ $nasabah->desa_kelurahan }}"
                                                placeholder="Desa / Kelurahan" required />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="kecamatan"><small class="text-danger">*
                                                </small>Kecamatan</label>
                                            <input type="text" name="kecamatan" id="kecamatan" class="form-control"
                                                placeholder="Kecamatan" value="{{ $nasabah->kecamatan }}" required />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="kabkota"><small class="text-danger">*
                                                </small>Kabupaten / Kota</label>
                                            <input type="text" name="kabkota" id="kabkota" class="form-control"
                                                placeholder="Kabupaten / Kota" value="{{ $nasabah->kabkota }}"
                                                required />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="provinsi"><small class="text-danger">*
                                                </small>Provinsi</label>
                                            <input type="text" name="provinsi" id="provinsi" class="form-control"
                                                placeholder="Provinsi" value="{{ $nasabah->provinsi }}" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="exampleFormControlTextarea1">Alamat
                                                Domisili</label>
                                            <input name="alamat_domisili" class="form-control"
                                                id="exampleFormControlTextarea1" rows="3"
                                                placeholder="Masukan Alamat Domisili Nasabah"
                                                value="{{ $nasabah->alamat_domisili }}" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="status"><small class="text-danger">*
                                                </small>Status</label>
                                            <select class="select2 w-100" name="skpd_status_perkawinan_id" id="status"
                                                required>
                                                @foreach ($statusperkawinans as $statusperkawinan)
                                                    @if (old('skpd_status_perkawinan_id', $statusperkawinan->id) == $statusperkawinan->nama_status_perkawinan)
                                                        <option value="{{ $statusperkawinan->id }}" selected>
                                                            {{ $statusperkawinan->nama_status_perkawinan }}</option>
                                                    @else
                                                        <option value="{{ $statusperkawinan->id }}">
                                                            {{ $statusperkawinan->nama_status_perkawinan }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jumlahanak"><small class="text-danger">*
                                                </small>Jumlah Anak/Tanggungan</label>
                                            <select class="select2 w-100" name="skpd_tanggungan_id" id="jumlahanak"
                                                required>
                                                @foreach ($tanggungans as $tanggungan)
                                                    @if (old('skpd_tanggungan_id', $tanggungan->id) == $tanggungan->banyak_tanggungan)
                                                        <option value="{{ $tanggungan->id }}" selected>
                                                            {{ $tanggungan->banyak_tanggungan }}</option>
                                                    @else
                                                        <option value="{{ $tanggungan->id }}">
                                                            {{ $tanggungan->banyak_tanggungan }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nonpwp">No NPWP</label>
                                            <input type="number" name="no_npwp" id="nonpwp" class="form-control"
                                                placeholder="Masukan Nomor NPWP Anda" value="{{ $nasabah->no_npwp }}" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="notelp"><small class="text-danger">*
                                                </small>No
                                                Telepon</label>
                                            <input type="text" name="no_telp" id="notelp"
                                                class="form-control prefix-mask" placeholder="Masukan Nomor telepon Anda"
                                                value="{{ $nasabah->no_telp }}" required />
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <button type="button" class="btn btn-primary btn-prev">
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
                                            <input type="hidden" name="foto[1][id]" id="fotodiri" rows="3"
                                                class="form-control"
                                                @if ($fotodiri) value="{{ old('fotodiri', $fotodiri->id) }}" @endif />
                                            <input type="hidden" name="foto[1][foto_lama]" id="fotodiri"
                                                rows="3" class="form-control"
                                                @if ($fotodiri) value="{{ old('fotodiri', $fotodiri->foto) }}" @endif />
                                            <input type="file" name="foto[1][foto]" id="fotodiri" rows="3"
                                                class="form-control" />
                                            <input type="hidden" name="foto[1][kategori]" value="Foto Diri"
                                                rows="3" class="form-control" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="fotopasangan"><small class="text-danger">
                                                </small>Upload Foto Pasangan</label>
                                            <input type="hidden" name="foto[6][id]" id="fotopasangan" rows="3"
                                                class="form-control"
                                                @if ($fotopasangan) value="{{ old('fotopasangan', $fotopasangan->id) }}" @endif />
                                            <input type="hidden" name="foto[6][foto_lama]" id="fotopasangan"
                                                rows="3" class="form-control"
                                                @if ($fotopasangan) value="{{ old('fotopasangan', $fotopasangan->foto) }}" @endif />
                                            <input type="file" name="foto[6][foto]" id="fotopasangan" rows="3"
                                                class="form-control" />
                                            <input type="hidden" name="foto[6][kategori]" value="Foto Pasangan"
                                                rows="3" class="form-control" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="fotoktp"><small class="text-danger">*
                                                </small>Upload Foto KTP</label>
                                            <input type="hidden" name="foto[2][id]" id="fotoktp" rows="3"
                                                class="form-control"
                                                @if ($fotoktp) value="{{ old('fotoktp', $fotoktp->id) }}" @endif />
                                            <input type="hidden" name="foto[2][foto_lama]" id="fotoktp"
                                                rows="3" class="form-control"
                                                @if ($fotoktp) value="{{ old('fotoktp', $fotoktp->foto) }}" @endif />
                                            <input type="file" name="foto[2][foto]" id="fotoktp" rows="3"
                                                class="form-control" />
                                            <input type="hidden" name="foto[2][kategori]" value="Foto KTP"
                                                rows="3" class="form-control" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="fotodiriktp"><small class="text-danger">*
                                                </small>Upload Foto Diri Bersama KTP</label>
                                            <input type="Hidden" name="foto[3][id]" id="fotodiriktp" rows="3"
                                                class="form-control"
                                                @if ($fotodiriktp)
                                                value="{{ old('fotodiriktp', $fotodiriktp->id) }}"
                                                @endif
                                                />
                                            <input type="Hidden" name="foto[3][foto_lama]" id="fotodiriktp"
                                                rows="3" class="form-control"
                                                @if ($fotodiriktp)
                                                value="{{ old('fotodiriktp', $fotodiriktp->foto) }}"
                                                @endif
                                                />
                                            <input type="file" name="foto[3][foto]" id="fotodiriktp" rows="3"
                                                class="form-control" />
                                            <input type="hidden" name="foto[3][kategori]" value="Foto Diri Bersama KTP"
                                                rows="3" class="form-control" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="fotokk"><small class="text-danger">*
                                                </small>Upload Foto Kartu Keluarga</label>
                                            <input type="hidden" name="foto[4][id]" id="fotokk" rows="3"
                                                class="form-control"
                                                @if ($fotokk)
                                                value="{{ old('fotokk', $fotokk->id) }}"
                                                @endif
                                                />
                                            <input type="hidden" name="foto[4][foto_lama]" id="fotokk"
                                                rows="3" class="form-control"
                                                @if ($fotokk)
                                                value="{{ old('fotokk', $fotokk->foto) }}"
                                                @endif
                                                />
                                            <input type="file" name="foto[4][foto]" id="fotokk" rows="3"
                                                class="form-control" />
                                            <input type="hidden" name="foto[4][kategori]" value="Foto Kartu Keluarga"
                                                rows="3" class="form-control" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="fotoaktanikah"><small class="text-danger">
                                                </small>Upload Akta Nikah/Cerai</label>
                                            <input type="hidden" name="foto[5][id]" id="fotoaktanikah" rows="3"
                                                class="form-control"
                                                @if ($fotostatus)
                                                value="{{ old('fotokk', $fotostatus->id) }}"
                                                @endif
                                                />
                                            <input type="hidden" name="foto[5][foto_lama]" id="fotoaktanikah"
                                                rows="3" class="form-control"
                                                @if ($fotostatus)
                                                value="{{ old('fotokk', $fotostatus->foto) }}"
                                                @endif
                                                />
                                            <input type="file" name="foto[5][foto]" id="fotoaktanikah" rows="3"
                                                class="form-control" />
                                            <input type="hidden" name="foto[5][kategori]" value="Akta Status Pekawinan"
                                                rows="3" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <button type="button" class="btn btn-primary btn-prev">
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
                                                value="{{ $nasabah->orang_terdekat->nama_orang_terdekat }}" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="notelpot"><small class="text-danger">*
                                                </small>No
                                                Telepon</label>
                                            <input type="text" name="no_telp_orang_terdekat" id="notelpot"
                                                class="form-control prefix-mask1"
                                                placeholder="Masukan Nomor Telepon Orang Terdekat"
                                                value="{{ $nasabah->orang_terdekat->no_telp_orang_terdekat }}" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="exampleFormControlTextarea1"><small
                                                    class="text-danger">* </small>Alamat</label>
                                            <input class="form-control" name="alamat_orang_terdekat"
                                                id="exampleFormControlTextarea1" rows="3"
                                                placeholder="Alamat Orang Terdekat"
                                                value="{{ $nasabah->orang_terdekat->alamat_orang_terdekat }}" />
                                        </div>
                                        <div class="mb-1 col-md-1">
                                            <label class="form-label" for="rt"><small class="text-danger">*
                                                </small>RT</label>
                                            <input type="number" name="rt_orang_terdekat" id="rt"
                                                class="form-control" placeholder="RT"
                                                value="{{ $nasabah->orang_terdekat->rt_orang_terdekat }}" />
                                        </div>
                                        <div class="mb-1 col-md-1">
                                            <label class="form-label" for="rw"><small class="text-danger">*
                                                </small>RW</label>
                                            <input type="number" name="rw_orang_terdekat" id="rw"
                                                class="form-control" placeholder="RW"
                                                value="{{ $nasabah->orang_terdekat->rw_orang_terdekat }}" />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="desa_kelurahan"><small class="text-danger">*
                                                </small>Desa / Kelurahan</label>
                                            <input type="text" name="desa_kelurahan_orang_terdekat"
                                                id="desa_kelurahan" class="form-control" placeholder="Desa / Kelurahan"
                                                value="{{ $nasabah->orang_terdekat->desa_kelurahan_orang_terdekat }}" />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="kecamatan"><small class="text-danger">*
                                                </small>Kecamatan</label>
                                            <input type="text" name="kecamatan_orang_terdekat" id="kecamatan"
                                                class="form-control" placeholder="Kecamatan"
                                                value="{{ $nasabah->orang_terdekat->kecamatan_orang_terdekat }}" />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="kabkota"><small class="text-danger">*
                                                </small>Kabupaten / Kota</label>
                                            <input type="text" name="kabkota_orang_terdekat" id="kabkota"
                                                class="form-control" placeholder="Kabupaten / Kota"
                                                value="{{ $nasabah->orang_terdekat->kabkota_orang_terdekat }}" />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="provinsi"><small class="text-danger">*
                                                </small>Provinsi</label>
                                            <input type="text" name="provinsi_orang_terdekat" id="provinsi"
                                                class="form-control" placeholder="Provinsi"
                                                value="{{ $nasabah->orang_terdekat->provinsi_orang_terdekat }}" />
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <button type="button" class="btn btn-primary btn-prev">
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
                                            <select class="select2 w-100" name="skpd_instansi_id" id="namainstansi">
                                                @foreach ($instansis as $instansi)
                                                    @if (old('skpd_instansi_id', $instansi->id) == $instansi->nama_instansi)
                                                        <option value="{{ $instansi->id }}" selected>
                                                            {{ $instansi->nama_instansi }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $instansi->id }}">
                                                            {{ $instansi->nama_instansi }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="golongan"><small class="text-danger">*
                                                </small>Golongan</label>
                                            <select class="select2 w-100" name="skpd_golongan_id" id="golongan">
                                                @foreach ($golongans as $golongan)
                                                    @if (old('skpd_golongan_id', $golongan->golongan_id) == $golongan->nama_golongan)
                                                        <option value="{{ $golongan->id }}" selected>
                                                            {{ $golongan->nama_golongan }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $golongan->id }}">
                                                            {{ $golongan->nama_golongan }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="skpengangkatan"><small class="text-danger">*
                                                </small>Upload Softcopy SK Pengangkatan / SK Terakhir</label>
                                            <input type="hidden" name="sk_pengangkatan_lama" id="skpengangkatanlama"
                                                rows="3" class="form-control"
                                                value="{{ $pembiayaan->sk_pengankatan }}" />
                                            <input type="file" name="sk_pengangkatan" id="skpengangkatan"
                                                rows="3" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <button type="button" class="btn btn-primary btn-prev">
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
                                            <select class="select2 w-100" name="skpd_jenis_jaminan_id" id="jaminan">
                                                @foreach ($jaminans as $jaminan)
                                                    @if (old('skpd_jenis_jaminan_id', $jaminan->id) == $jaminan->nama_jaminan)
                                                        <option value="{{ $jaminan->id }}">{{ $jaminan->nama_jaminan }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $jaminan->id }}">{{ $jaminan->nama_jaminan }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jaminan_dokumen"><small class="text-danger">*
                                                </small>Upload Jaminan</label>
                                            <input type="hidden" name="dokumen_jaminan_lama" id="jaminan_dokumen_lama"
                                                class="form-control" value="{{ $skpd_jaminan->dokumen }}" />
                                            <input type="file" name="dokumen_jaminan" id="jaminan_dokumen"
                                                class="form-control" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="notelpot">Jaminan Lainya</label>
                                            <input type="text" name="nama_jaminan_lainnya" id="notelpot"
                                                class="form-control" placeholder="Masukan Jaminan Lainnya"
                                                value="{{ old('nama_jaminan_lainnya', $pembiayaan->jaminan_lainnya) }}" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jaminan_lainnya">Upload Jaminan Lainnya</label>
                                            <input type="hidden" name="dokumen_jaminan_lainnya_lama"
                                                id="jaminan_lainnya" rows="3" class="form-control"
                                                value="{{ old('dokumen_jaminan_lainnya_lama', $pembiayaan->dokumen_jaminan_lainnya) }}" />
                                            <input type="file" name="dokumen_jaminan_lainnya" id="jaminan_lainnya"
                                                rows="3" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <button type="button" class="btn btn-primary btn-prev">
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
                                            <input type="text" name="gaji_pokok" class="form-control numeral-mask1"
                                                placeholder="Rp." id="gaji_pokok"
                                                value="{{ $pembiayaan->gaji_pokok }}" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="pendapatan_lainnya"><small
                                                    class="text-danger">*
                                                </small>Gaji / Pendapatan Lainnya (Per Bulan)</label>
                                            <input type="text" name="pendapatan_lainnya"
                                                class="form-control numeral-mask2" placeholder="0 Jika Tidak ada"
                                                id="pendapatan_lainnya" value="{{ $pembiayaan->pendapatan_lainnya }}" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="pendapatan_tpp"><small class="text-danger">*
                                                </small>Pendapatan TPP (Per Bulan)</label>
                                            <input type="text" name="gaji_tpp" class="form-control numeral-mask3"
                                                placeholder="Rp." id="pendapatan_tpp"
                                                value="{{ $pembiayaan->gaji_tpp }}" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="lampiran_keuangan"><small
                                                    class="text-danger">*
                                                </small>Upload Lampiran Keuangan</label>
                                            <input type="hidden" name="dokumen_keuangan_lama" id="lampiran_keuangan"
                                                rows="3" class="form-control"
                                                value="{{ $pembiayaan->dokumen_keuangan }}" />
                                            <input type="file" name="dokumen_keuangan" id="lampiran_keuangan"
                                                rows="3" class="form-control" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="slip_gaji"><small class="text-danger">*
                                                </small>Upload Slip Gaji</label>
                                            <input type="hidden" name="dokumen_slip_gaji_lama" id="slip_gaji"
                                                rows="3" class="form-control"
                                                value="{{ $pembiayaan->dokumen_slip_gaji }}" />
                                            <input type="file" name="dokumen_slip_gaji" id="slip_gaji" rows="3"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-primary btn-prev">
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
                                    {{-- @foreach ($idebs as $ideb)
                                        <div class="row">
                                            <div class="mb-1 col-md-2">
                                                <label class="form-label" for="nama_bank">Nama
                                                    Bank</label>
                                                <input type="text" class="form-control" name="nama_bank"
                                                    id="nama_bank" aria-describedby="nama_bank" placeholder="Nama Bank"
                                                    value="{{ $ideb->nama_bank }}" />
                                            </div>

                                            <div class="mb-1 col-md-2">
                                                <label class="form-label" for="plafond">Plafond</label>
                                                <input type="number" class="form-control" name="plafond" id="plafond"
                                                    aria-describedby="itemcost" placeholder="Rp."
                                                    value="{{ $ideb->plafond }}" />
                                            </div>

                                            <div class="mb-1 col-md-2">
                                                <label class="form-label" for="outstanding">Outstanding</label>
                                                <input type="number" class="form-control" name="outstanding"
                                                    id="outstanding" aria-describedby="outstanding" placeholder="Rp."
                                                    value="{{ $ideb->outstanding }}" />
                                            </div>

                                            <div class="mb-1 col-md-1">
                                                <label class="form-label" for="tenor">Tenor</label>
                                                <input type="number" class="form-control" name="tenor" id="tenor"
                                                    aria-describedby="tenor" placeholder="tenor"
                                                    value="{{ $ideb->tenor }}" />
                                            </div>

                                            <div class="mb-1 col-md-1">
                                                <label class="form-label" for="margin">Margin</label>
                                                <input type="text" class="form-control persen" name="margin"
                                                    id="margin" aria-describedby="margin" placeholder="%"
                                                    value="{{ $ideb->margin }}" />
                                            </div>

                                            <div class="mb-1 col-md-2">
                                                <label class="form-label" for="itemquantity">Agunan</label>
                                                <input type="text" class="form-control" name="agunan" id="agunan"
                                                    aria-describedby="itemquantity" value="{{ $ideb->agunan }}" />
                                            </div>

                                            <div class="col-md-2 col-2">
                                                <label class="form-label" for="angsuran">Angsuran</label>
                                                <input type="number" class="form-control" name="angsuran"
                                                    id="angsuran" aria-describedby="angsuran" placeholder="Rp."
                                                    value="{{ $ideb->angsuran }}" />
                                            </div>

                                            <div class="mb-1 col-md-2">
                                                <label class="form-label" for="itemquantity">Kol
                                                    Tertinggi </label>
                                                <select class="form-select" size="3" name="kol_tertinggi"
                                                    aria-label="size 3 select" id="multiSelectSizing">
                                                     @if (old('kol_tertinggi', $ideb->kol_tertinggi) == $ideb->kol_tertinggi)
                                                        <option value="{{ $ideb->kol_tertinggi }}" selected>{{ $ideb->kol_tertinggi }}
                                                        </option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach --}}

                                    <section id="form-repeater">
                                        <div class="row">
                                            <div class="mb-1 col-md-12">
                                                <div class="repeater-default">
                                                    <div data-repeater-list="slik">
                                                        @if ($idebs->count() > 0)
                                                            @foreach ($idebs as $ideb)
                                                                <div data-repeater-item>
                                                                    <div class="row">
                                                                        <div class="mb-1 col-md-2">
                                                                            <label class="form-label" for="nama_bank">Nama
                                                                                Bank</label>
                                                                            <input type="text" class="form-control"
                                                                                name="nama_bank" id="nama_bank"
                                                                                aria-describedby="nama_bank"
                                                                                placeholder="Nama Bank"
                                                                                value="{{ $ideb->nama_bank }}" />
                                                                            <input type="hidden" class="form-control"
                                                                                name="slik_id"
                                                                                value="{{ $ideb->id }}" />
                                                                        </div>

                                                                        <div class="mb-1 col-md-2">
                                                                            <label class="form-label"
                                                                                for="plafond">Plafond</label>
                                                                            <input type="number" class="form-control"
                                                                                name="plafond" id="plafond"
                                                                                aria-describedby="itemcost"
                                                                                placeholder="Rp."
                                                                                value="{{ $ideb->plafond }}" />
                                                                        </div>

                                                                        <div class="mb-1 col-md-2">
                                                                            <label class="form-label"
                                                                                for="outstanding">Outstanding</label>
                                                                            <input type="number" class="form-control"
                                                                                name="outstanding" id="outstanding"
                                                                                aria-describedby="outstanding"
                                                                                placeholder="Rp."
                                                                                value="{{ $ideb->outstanding }}" />
                                                                        </div>

                                                                        <div class="mb-1 col-md-1">
                                                                            <label class="form-label"
                                                                                for="tenor">Tenor</label>
                                                                            <input type="number" class="form-control"
                                                                                name="tenor" id="tenor"
                                                                                aria-describedby="tenor"
                                                                                placeholder="tenor"
                                                                                value="{{ $ideb->tenor }}" />
                                                                        </div>

                                                                        <div class="mb-1 col-md-1">
                                                                            <label class="form-label"
                                                                                for="margin">Margin</label>
                                                                            <input type="text"
                                                                                class="form-control persen"
                                                                                name="margin" id="margin"
                                                                                aria-describedby="margin"
                                                                                placeholder="%"
                                                                                value="{{ $ideb->margin }}" />
                                                                        </div>

                                                                        <div class="mb-1 col-md-2">
                                                                            <label class="form-label"
                                                                                for="itemquantity">Agunan</label>
                                                                            <input type="text" class="form-control"
                                                                                name="agunan" id="agunan"
                                                                                aria-describedby="itemquantity"
                                                                                value="{{ $ideb->agunan }}" />
                                                                        </div>

                                                                        <div class="col-md-2 col-2">
                                                                            <label class="form-label"
                                                                                for="angsuran">Angsuran</label>
                                                                            <input type="number" class="form-control"
                                                                                name="angsuran" id="angsuran"
                                                                                aria-describedby="angsuran"
                                                                                placeholder="Rp."
                                                                                value="{{ $ideb->angsuran }}" />
                                                                        </div>

                                                                        <div class="mb-1 col-md-2">
                                                                            <label class="form-label"
                                                                                for="itemquantity">Kol
                                                                                Tertinggi </label>
                                                                            <select class="form-select" size="3"
                                                                                name="kol_tertinggi"
                                                                                aria-label="size 3 select"
                                                                                id="multiSelectSizing">
                                                                                @if (old('kol_tertinggi', $ideb->kol_tertinggi) == $ideb->kol_tertinggi)
                                                                                    <option
                                                                                        value="{{ $ideb->kol_tertinggi }}"
                                                                                        selected>{{ $ideb->kol_tertinggi }}
                                                                                    </option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-1 col-12 mb-25 mt-2">
                                                                            <button
                                                                                class="btn btn-outline-danger text-nowrap px-1"
                                                                                data-repeater-delete type="button">
                                                                                <i data-feather="x" class="me-25"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <hr>

                                                                    {{-- <div class="row d-flex align-items-end">
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
                                                                        <label class="form-label" for="itemquantity">Kol
                                                                            Tertinggi </label>
                                                                        <select class="form-select" size="3"
                                                                            name="kol_tertinggi"
                                                                            aria-label="size 3 select"
                                                                            id="multiSelectSizing">
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
                                                            </div> --}}
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div class="col-md-1 col-12">
                                                        <a data-repeater-create class="btn btn-icon btn-primary"
                                                            type="button">
                                                            <i data-feather="plus" class="me-30"></i>
                                                            <span>Tambah</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                    </section>

                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="numeral-formatting"><small
                                                class="text-danger">*
                                            </small>Pengeluaran Lainnya (Per
                                            Bulan)</label>
                                        <input type="text" name="pengeluaran_lainnya"
                                            class="form-control numeral-mask" placeholder="Jika tidak ada isikan 0"
                                            id="Pendapatan TPP" value="{{ $pembiayaan->pengeluaran_lainnya }}" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="numeral-formatting"><small
                                                class="text-danger">*
                                            </small>Keterangan Pengeluaran Lainnya
                                            (Per Bulan)</label>
                                        <input type="text" name="keterangan_pengeluaran_lainnya"
                                            class="form-control" id="Pendapatan TPP"
                                            placeholder="Isikan Keterangan Pengeluaran Lainnya"
                                            value="{{ $pembiayaan->keterangan_pengeluaran_lainnya }}" />
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-primary btn-prev">
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button type="submit" class="btn btn-success btn-submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- /Modern Horizontal Wizard -->

            </div>
            <!-- END: Content-->

            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function SumAngsuran(value) {
            var plafond, tenor, margin, angsuran, getmargin, getplafond;

            plafond = document.getElementById("plafond").value;
            tenor = document.getElementById("tenor").value;
            margin = document.getElementById("margin").value;

            getmargin = margin / 12 / 100;
            getplafond = plafond * getmargin * tenor + +plafond;
            angsuran = getplafond / tenor;

            // angsuran = plafond * margin * tenor + +plafond / tenor;
            // angsuran = angsuran4 / tenor;

            document.getElementById("angsuran").value = angsuran;

        }
    </script> --}}
        @endsection
