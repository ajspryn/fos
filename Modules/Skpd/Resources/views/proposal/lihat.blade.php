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
    </style>
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
                            <div class="step" data-target="#form2" role="tab" id="personal-info-modern-trigger">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="user" class="font-medium-3"></i>
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
                                                name="tanggal_pengajuan" value="{{ $pembiayaan->tanggal_pengajuan }}"
                                                placeholder="YYYY-MM-DD" disabled />
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
                                            <select class="select2 w-100" name="skpd_akad_id" id="akad" required>
                                                <option label="akad"></option>
                                                @foreach ($akads as $akad)
                                                    <option value="{{ $akad->id }}">{{ $akad->nama_akad }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nominal_pembiayaan"><small
                                                    class="text-danger">* </small>Nominal Pembiayaan</label>
                                            <input type="text" name="nominal_pembiayaan"
                                                class="form-control numeral-mask4" placeholder="Rp."
                                                id="nominal_pembiayaan"
                                                value="Rp.{{ number_format($pembiayaan->nominal_pembiayaan) }}"
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
                                            <input type="text" name="rate" class="form-control numeral-mask4"
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
                                                placeholder="Masukan Nomor KTP Anda"
                                                value="{{ $pembiayaan->nasabah->no_ktp }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tempatlahir"><small class="text-danger">*
                                                </small>Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                                class="form-control" placeholder="Maukan Tempat Lahir Anda"
                                                value="{{ $pembiayaan->nasabah->tempat_lahir }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="tgllahir"><small class="text-danger">*
                                                </small>Tanggal Lahir</label>
                                            <input type="date" id="tgl_lahir" class="form-control flatpickr-basic"
                                                name="tgl_lahir" placeholder="YYYY-MM-DD"
                                                value="{{ $pembiayaan->nasabah->tgl_lahir }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="exampleFormControlTextarea1"><small
                                                    class="text-danger">* </small>Alamat Sesuai KTP</label>
                                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat"
                                                value="{{ $pembiayaan->nasabah->alamat }}" disabled></textarea>
                                        </div>
                                        <div class="mb-1 col-md-1">
                                            <label class="form-label" for="rt"><small class="text-danger">*
                                                </small>RT</label>
                                            <input type="number" name="rt" id="rt" class="form-control"
                                                placeholder="RT" value="{{ $pembiayaan->nasabah->rt }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-1">
                                            <label class="form-label" for="rw"><small class="text-danger">*
                                                </small>RW</label>
                                            <input type="number" name="rw" id="rw" class="form-control"
                                                placeholder="RW" value="{{ $pembiayaan->nasabah->rw }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="desa_kelurahan"><small class="text-danger">*
                                                </small>Desa / Kelurahan</label>
                                            <input type="text" name="desa_kelurahan" id="desa_kelurahan"
                                                class="form-control" placeholder="Desa / Kelurahan"
                                                value="{{ $pembiayaan->nasabah->desa_kelurahan }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="kecamatan"><small class="text-danger">*
                                                </small>Kecamatan</label>
                                            <input type="text" name="kecamatan" id="kecamatan" class="form-control"
                                                placeholder="Kecamatan" value="{{ $pembiayaan->nasabah->kecamatan }}"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="kabkota"><small class="text-danger">*
                                                </small>Kabupaten / Kota</label>
                                            <input type="text" name="kabkota" id="kabkota" class="form-control"
                                                placeholder="Kabupaten / Kota"
                                                value="{{ $pembiayaan->nasabah->kabkota }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="provinsi"><small class="text-danger">*
                                                </small>Provinsi</label>
                                            <input type="text" name="provinsi" id="provinsi" class="form-control"
                                                placeholder="Provinsi" value="{{ $pembiayaan->nasabah->provinsi }}"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="exampleFormControlTextarea1">Alamat
                                                Domisili</label>
                                            <textarea name="alamat_domisili" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                placeholder="Alamat" value="{{ $pembiayaan->nasabah->alamat_domisili }}"></textarea>
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
                                                placeholder="Masukan Nomor NPWP Anda"
                                                value="{{ $pembiayaan->nasabah->no_npwp }}" />
                                        </div>

                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="notelp"><small class="text-danger">*
                                                </small>No Telepon</label>
                                            <input type="text" name="no_telp" id="notelp"
                                                class="form-control prefix-mask" placeholder="Masukan Nomor telepon Anda"
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
                                        <div class="mb-0 mt-2 col-md-2">
                                            <button type="butt  on" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#fotodiri">
                                                Foto Diri
                                            </button>
                                        </div>
                                        <div class="mb-0 mt-2 col-md-2">
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
                                        <div class="mb-0 mt-2 col-md-2">
                                            <button type="butt  on" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#fotostatus">
                                                foto Status Perkawinan
                                            </button>
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
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="exampleFormControlTextarea1"><small
                                                    class="text-danger">* </small>Alamat</label>
                                            <textarea class="form-control" name="alamat_orang_terdekat" id="exampleFormControlTextarea1" rows="3"
                                                placeholder="Alamat Orang Terdekat" value="{{ $pembiayaan->nasabah->orang_terdekat->alamat_orang_terdekat }}"
                                                disabled></textarea>
                                        </div>
                                        <div class="mb-1 col-md-1">
                                            <label class="form-label" for="rt"><small class="text-danger">*
                                                </small>RT</label>
                                            <input type="number" name="rt_orang_terdekat" id="rt"
                                                class="form-control" placeholder="RT"
                                                value="{{ $pembiayaan->nasabah->orang_terdekat->rt_orang_terdekat }}"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-1">
                                            <label class="form-label" for="rw"><small class="text-danger">*
                                                </small>RW</label>
                                            <input type="number" name="rw_orang_terdekat" id="rw"
                                                class="form-control" placeholder="RW"
                                                value="{{ $pembiayaan->nasabah->orang_terdekat->rw_orang_terdekat }}"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="desa_kelurahan"><small class="text-danger">*
                                                </small>Desa / Kelurahan</label>
                                            <input type="text" name="desa_kelurahan_orang_terdekat"
                                                id="desa_kelurahan" class="form-control" placeholder="Desa / Kelurahan"
                                                value="{{ $pembiayaan->nasabah->orang_terdekat->desa_kelurahan_orang_terdekat }}"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="kecamatan"><small class="text-danger">*
                                                </small>Kecamatan</label>
                                            <input type="text" name="kecamatan_orang_terdekat" id="kecamatan"
                                                class="form-control" placeholder="Kecamatan"
                                                value="{{ $pembiayaan->nasabah->orang_terdekat->kecamatan_orang_terdekat }}"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="kabkota"><small class="text-danger">*
                                                </small>Kabupaten / Kota</label>
                                            <input type="text" name="kabkota_orang_terdekat" id="kabkota"
                                                class="form-control" placeholder="Kabupaten / Kota"
                                                value="{{ $pembiayaan->nasabah->orang_terdekat->kabkota_orang_terdekat }}"
                                                disabled />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="provinsi"><small class="text-danger">*
                                                </small>Provinsi</label>
                                            <input type="text" name="provinsi_orang_terdekat" id="provinsi"
                                                class="form-control" placeholder="Provinsi"
                                                value="{{ $pembiayaan->nasabah->orang_terdekat->provinsi_orang_terdekat }}"
                                                disabled />
                                        </div>
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
                                        {{-- <div class="mb-1 col-md-6">
                                        <label class="form-label" for="skpengangkatan"><small class="text-danger">* </small>Upload Softcopy SK Pengangkatan / SK Terakhir</label>
                                        <input type="file" name="sk_pengangkatan" id="skpengangkatan" rows="3" class="form-control" />
                                    </div> --}}
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
                                        <small>Isikan Data Pendapatan Anda</small>
                                    </div>
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="gaji_pokok"><small class="text-danger">*
                                                </small>Gaji Pokok (Per Bulan)</label>
                                            <input type="text" name="gaji_pokok" class="form-control numeral-mask1"
                                                placeholder="Rp." id="gaji_pokok"
                                                value="Rp.{{ number_format($pembiayaan->gaji_pokok) }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="pendapatan_lainnya"><small
                                                    class="text-danger">* </small>Gaji / Pendapatan Lainnya (Per
                                                Bulan)</label>
                                            <input type="text" name="pendapatan_lainnya"
                                                class="form-control numeral-mask2" placeholder="Rp."
                                                id="pendapatan_lainnya" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="pendapatan_tpp"><small class="text-danger">*
                                                </small>Pendapatan TPP (Per Bulan)</label>
                                            <input type="text" name="gaji_tpp" class="form-control numeral-mask3"
                                                placeholder="Rp." id="pendapatan_tpp"
                                                value="Rp.{{ number_format($pembiayaan->gaji_tpp) }}" disabled />
                                        </div>
                                    </div>
                                    <div class="content-header">
                                        <h5 class="mb-0">Data Pengeluaran Anda</h5>
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
                                                                            {{-- <span>Delete</span> --}}
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                        </div>
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
                                                                            {{-- <span>Delete</span> --}}
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </div>
                                                        </div>
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
                                        <label class="form-label" for="ideb"><small class="text-danger">*
                                            </small>Upload IDEB Pemohon</label>
                                        <input type="file" name="foto[1][foto]" id="ideb" class="form-control"
                                            required>
                                        <input type="hidden" name="foto[1][kategori]" value="IDEB" />
                                    </div>
                                    @if ($pembiayaan->nasabah->skpd_status_perkawinan_id == 2)
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="ifIdebPasangan"><small class="text-danger">*
                                                </small>Upload IDEB Pasangan</label>
                                            <input type="file" name="foto[2][foto]" id="ifIdebPasangan"
                                                class="form-control" required>
                                            <input type="hidden" name="foto[2][kategori]" value="IDEB Pasangan" />
                                        </div>
                                    @endif
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="numeral-formatting">Pengeluaran Lainnya (Per
                                            Bulan)</label>
                                        <input type="text" name="pengeluaran_lainnya"
                                            class="form-control numeral-mask" placeholder="Rp." id="Pendapatan TPP"
                                            value="Rp." disabled />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="numeral-formatting">Keterangan Pengeluaran Lainnya
                                            (Per Bulan)</label>
                                        <input type="text" name="keterangan_pengeluaran_lainnya" class="form-control"
                                            id="Pendapatan TPP" placeholder="Isikan Keterangan Pengeluaran Lainnya"
                                            value="Rp.@if ($pembiayaan->keterangan_pengeluaran_lainnya) {{ $pembiayaan->keterangan_pengeluaran_lainnya }} @endif"
                                            disabled />
                                    </div>
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
                <!--/ foto diribersama  -->
                @if ($fotokk)
                    <!-- foto diri bersama ktp  -->
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
                    <!--/ foto diribersama  -->
                @endif
                @if ($fotostatus)
                    <!-- foto diri bersama ktp  -->
                    <div class="modal fade" id="fotokk" tabindex="-1" aria-labelledby="addNewCardTitle"
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
                    <!--/ foto diribersama  -->
                @endif

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
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
@endsection
