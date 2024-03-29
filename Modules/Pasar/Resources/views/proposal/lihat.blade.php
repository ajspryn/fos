@extends('pasar::layouts.main')

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
                                    <li class="breadcrumb-item"><a href="/">Pasar</a>
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
                                        <span class="bs-stepper-title">Form Keuangan</span>
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
                                        <span class="bs-stepper-title">Form Keuangan</span>
                                        <span class="bs-stepper-subtitle"> Data Pengeluaran</span>
                                    </span>
                                </button>
                            </div> 
                        </div>
                        <div class="bs-stepper-content">
                            <form method='post'action="/pasar/proposal/{{ $pembiayaan->id }}"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div id="form1" class="content" role="tabpanel"
                                    aria-labelledby="account-details-trigger">
                                    <div class="content-header">
                                        {{-- <h5 class="mb-0">Account Details</h5> --}}
                                        <small class="text-danger">* Wajib Diisi</small>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="ao"><small class="text-danger">* </small>Kode
                                            Account Officer</label>
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
                                                class="form-control flatpickr-basic" name="tanggal" placeholder="YYYY-MM-DD"
                                                value="{{ $pembiayaan->tgl_pembiayaan }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jenispenggunaan"><small class="text-danger">*
                                                </small>Jenis Penggunaan</label>
                                            <select class="select2 w-100" name="penggunaan_id" id="jenispenggunaan">
                                                <option>{{ $pembiayaan->penggunaan_id }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="akad">Sektor Ekonomi</label>
                                            <select class="select2 w-100" name="sektor_id" id="sektor_id" required >
                                                <option label="akad">Pilih Sektor</option>
                                                @foreach ($sektors as $sektor)
                                                    <option value="{{ $sektor->kode_sektor_ekonomi }}">
                                                        {{ $sektor->nama_sektor_ekonomi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="akad">Akad</label>
                                            <select class="select2 w-100" name="akad_id" id="akad" required>
                                                <option label="akad">Pilih Jenis Akad</option>
                                                @foreach ($akads as $akad)
                                                    <option value="{{ $akad->kode_akad }}">{{ $akad->nama_akad }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nominal_pembiayaan">Kios / Los Yang Di Pesan</label>
                                            <input type="text" name="pesanan_blok" class="form-control "
                                                placeholder="Blok Pesanan" id="pesanan_blok"
                                                value="{{ $pembiayaan->pesanan_blok }}" >
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nominal_pembiayaan">Luas Kios / Los Yang Di Pesan</label>
                                            <input type="text" name="luas" class="form-control "
                                                placeholder="Luas Blok Pesanan" id="pesanan_blok"
                                                value="{{ $pembiayaan->luas }}" >
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="harga"><small class="text-danger">*
                                                </small>Harga Kios / Los (Nominal Pembiayaan)</label>
                                            <input type="text" name="harga" class="form-control numeral-mask4"
                                                placeholder="Rp." id="harga" value="{{ number_format($pembiayaan->harga) }}"
                                                required />
                                        </div>
                                        <div class="mb-1 col-md-4">
                                            <label class="form-label" for="tenor"><small class="text-danger">*
                                                </small>Tenor</label>
                                            <select class="select2 w-100" name="tenor" id="tenor" required>
                                                <option label="tenor"></option>
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
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-2">
                                            <label class="form-label" for="harga"><small class="text-danger">*
                                                </small>Equivalen Rate</label>
                                            <input type="text" name="rate" class="form-control numeral-mask4"
                                                placeholder="%" id="rate" required />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="akad">Cash Pick Up</label>
                                            <select class="select2 w-100" name="cashpickup" id="cashpickup" required>
                                                <option label="cashpickup">Pilih Jenis Cash Pick Up</option>
                                                @foreach ($cashs as $cash)
                                                    <option value="{{ $cash->kode_jeniscash }}">
                                                        {{ $cash->nama_jeniscash }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="nasabah"><small class="text-danger">*
                                                </small>Nasabah</label>
                                            <select class="select2 w-100" name="nasabah" id="nasabah" required>
                                                <option label="akad">Pilih Jenis Nasabah</option>
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
                                                placeholder="Masukan Nomor KTP Anda"
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
                                                </small>Tanggal Tanggal</label>
                                            <input type="date" id="tgl_lahir" class="form-control flatpickr-basic"
                                                name="tgl_lahir" placeholder="YYYY-MM-DD"
                                                value="{{ $pembiayaan->nasabahh->tgl_lahir }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="gender"><small class="text-danger">*
                                                </small>Jenis Kelamin</label>
                                            <select class="select2 w-100" name="jk_id" id="gender" disabled>
                                                <option>
                                                    {{ $pembiayaan->nasabahh->jk_id }}</option>
                                                <option label="jenis_kelamin">Pilih Jenis Kelamin</option>
                                                    <option >Laki-Laki</option>  
                                                    <option >Perempuan</option> 
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
                                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                value="{{ $pembiayaan->nasabahh->alamat }}" disabled></textarea>
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
                                                placeholder="Alamat" value="{{ $pembiayaan->nasabahh->alamat_domisili }}" disabled></textarea>
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
                                                    {{ $pembiayaan->rumah->kepemilikan_rumah }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="leg_rumah"><small class="text-danger">*
                                                </small>Legalitas Kepemilikan Rumah</label>
                                            <select class="select2 w-100" name="legalitas_kepemilikan_rumah"
                                                id="leg_rumah" disabled>
                                                <option value="{{ $pembiayaan->rumah->legalitas->id }}">
                                                    {{ $pembiayaan->rumah->legalitas->nama_jaminan }}</option>
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
                                                placeholder="Masukan Nomor NPWP Anda" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="notelp"><small class="text-danger">*
                                                </small>No Telepon</label>
                                            <input type="number" name="no_tlp" id="no_tlp" class="form-control"
                                                placeholder="Masukan Nomor telepon Anda"
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
                                        <a class="btn btn-outline-secondary btn-prev">
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
                                                placeholder="Masukan Nama Orang Terdekat"
                                                value="{{ $pembiayaan->nasabahh->namaot }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="telpot"><small class="text-danger">*
                                                </small>No Telepon</label>
                                            <input type="number" name="telp_ot" id="telp_ot" class="form-control"
                                                placeholder="Masukan Nomor Telepon Orang Terdekat"
                                                value="{{ $pembiayaan->nasabahh->telp_ot }}" disabled />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="exampleFormControlTextarea1"><small
                                                    class="text-danger">* </small>Alamat</label>
                                            <textarea class="form-control" name="alamat_ot" id="exampleFormControlTextarea1" rows="3"
                                                placeholder="Alamat Orang Terdekat" value="{{ $pembiayaan->nasabahh->alamat_ot }}" disabled></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <a class="btn btn-outline-secondary btn-prev" type="button">
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
                                                </small>Nama Kios / Los</label>
                                            <input type="text" name="nama_usaha" id="nama_usaha" class="form-control"
                                                placeholder="Masukan Nama Toko Atau Usaha"value="{{ $pembiayaan->keteranganusaha->nama_usaha }}"
                                                disabled>
                                        </div> 
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="jenisdagang_id"><small class="text-danger">*
                                                </small>Jenis Pasar</label>
                                            <select class="select2 w-100" name="jenispasar_id" id="jenispasar_id" disabled>
                                                <option value="{{ $pembiayaan->keteranganusaha->jenispasar->id }}">
                                                    {{ $pembiayaan->keteranganusaha->jenispasar->nama_pasar }}</option>
                                            </select>
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
                                                </small>Kepemilikan Kios / Los</label>
                                            <select class="select2 w-100" name="kep_toko_id" id="keptoko" disabled>
                                                <option>
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
                                            <label class="form-label" for="lamausaha"> </small>No / Blok Usaha</label>
                                            <input type="text" name="blok" id="blok" class="form-control"
                                                placeholder="Masukan No / Blok Lama"
                                                value="{{ $pembiayaan->keteranganusaha->no_blok }}" disabled>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="legalitastoko"><small class="text-danger">*
                                                </small>Legalitas Kepemilikan Kios / Los</label>
                                            <select class="select2 w-100" name="leg_toko_id" id="legalitastoko" disabled>
                                                <option >
                                                    {{ $pembiayaan->keteranganusaha->leg_toko_id }}</option>
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="suku"><small class="text-danger">*
                                                </small>Suku Bangsa</label>
                                            <select class="select2 w-100" name="suku_bangsa_id" id="suku_bangsa_id" required>
                                                <option label="suku_bangsa_id">Pilih Suku Bangsa Nasabah</option>
                                                @foreach ($sukus as $suku)
                                                    <option value="{{ $suku->kode_suku }}">{{ $suku->nama_suku }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-0 mt-2 col-md-2">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#fototoko">
                                                Foto Kios / Los
                                            </button>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <a class="btn btn-outline-secondary btn-prev" type="button">
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
                                                <option value="{{ $jaminanutama->jaminan->id }}">
                                                    {{ $jaminanutama->jaminan->nama_jaminan }}</option>
                                                <option label="jaminanlain">Pilih Jaminan Utama</option>
                                                @foreach ($jaminans as $jaminan)
                                                    <option value="{{ $jaminan->id }}">{{ $jaminan->nama_jaminan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="lamausaha"></small>No KTB</label>
                                            <input type="text" name="no_ktb" id="lamausaha" class="form-control"
                                                placeholder="Masukan No KTB"
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
                                        <a class="btn btn-outline-secondary btn-prev" type="button">
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
                                            <label class="form-label" for="numeral-formatting"></small>Omset</label>
                                            <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                                name="omset" id="omset" value="{{ number_format($pembiayaan->omset) }}" disabled>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"></small>HPP</label>
                                            <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                                name="hpp" id="hpp" value="{{ number_format($pembiayaan->hpp) }}" disabled>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"></small>Biaya
                                                Listrik</label>
                                            <input type="text" class="form-control numeral-mask2" placeholder="Rp."
                                                name="listrik" id="listrik" value="{{ number_format($pembiayaan->listrik) }}" disabled>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"></small>Biaya
                                                Transport</label>
                                            <input type="text" class="form-control numeral-mask6" placeholder="Rp."
                                                name="trasport" id="transport" value="{{ number_format($pembiayaan->trasport) }}" disabled>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"></small>Biaya
                                                Karyawan</label>
                                            <input type="text" class="form-control numeral-mask3" placeholder="Rp."
                                                name="karyawan" id="karyawan" value="{{ number_format($pembiayaan->karyawan) }}" disabled>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"></small>Biaya
                                                Telpon</label>
                                            <input type="text" class="form-control numeral-mask5" placeholder="Rp."
                                                name="telpon" id="telpon" value="{{ number_format($pembiayaan->telpon) }}" disabled>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"> </small>Biaya Sewa
                                                Kios</label>
                                            <input type="text" class="form-control numeral-mask4" placeholder="Rp."
                                                name="sewa" id="sewa" value="{{ number_format($pembiayaan->sewa) }}" disabled>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <a class="btn btn-outline-secondary btn-prev" type="button">
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
                                                                            aria-describedby="angsuran"
                                                                           >
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
                                    <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"><small
                                                    class="text-danger">*</small>Pengeluaran Lainnya</label>
                                            <input type="text" class="form-control numeral-mask7" placeholder="Rp."
                                                name="keb_keluarga" id="kebkeluarga"
                                                value="{{ $pembiayaan->keb_keluarga }}" dis>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"><small
                                                    class="text-danger">*</small>Keterangan Pengeluaran Lainnya</label>
                                            <input type="text" class="form-control"
                                                placeholder="Keterangan Pengeluaran" name="keterangan_keb_keluarga"
                                                id="kebkeluarga" value="{{ $pembiayaan->keterangan_keb_keluarga }}"
                                                disabled>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="aset">Aset / Harta Benda</label>
                                            <input type="text" name="aset" id="aset" class="form-control"
                                                placeholder="Masukan Kepemilikkan Aset" value="{{ $pembiayaan->aset }}"
                                                disabled>
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="numeral-formatting"><small
                                                    class="text-danger">*</small>Kesanggupan Angsuran</label>
                                            <input type="text" class="form-control numeral-mask8"
                                                name="kesanggupan_angsuran" placeholder="Rp." id="kesanggupan_angsuran"
                                                value="{{ number_format($pembiayaan->kesanggupan_angsuran) }}" disabled>
                                        </div><br>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="dokumen_keuangan"><small
                                                    class="text-danger">*</small>Upload IDEB</label>
                                            <input type="file" name="dokumen_keuangan" id="dokumen_keuangan"
                                                rows="3"class="form-control" required />

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-primary btn-prev">
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

                <!-- foto toko  -->
                <div class="modal fade" id="fototoko" tabindex="-1" aria-labelledby="addNewCardTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                <h1 class="text-center mb-1" id="addNewCardTitle">{{ $fototoko->kategori }}
                                </h1>
                                <p class="text-center">Lampiran Foto Nasabah</p>
                                <div class="card-body">
                                    <img src="{{ asset('storage/' . $fototoko->foto) }}" class="d-block w-100" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ foto toko  -->

                <!-- foto kk -->
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

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
