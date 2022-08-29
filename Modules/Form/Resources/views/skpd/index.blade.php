@extends('form::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="content-wrapper container-xxl">
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
                        <form method='post' action="/skpd/pembiayaan" enctype="multipart/form-data">
                            @csrf
                            <div id="form1" class="content" role="tabpanel" aria-labelledby="account-details-trigger">
                                <div class="content-header">
                                    {{-- <h5 class="mb-0">Account Details</h5> --}}
                                    <small class="text-danger">* Wajib Diisi</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-12">
                                        <label class="form-label" for="ao"><small class="text-danger">* </small>Nama
                                            AO</label>
                                        <select class="select2 w-100" name="user_id" id="ao" required>
                                            <option label="ao"></option>
                                            @foreach ($aos as $ao)
                                                <option value="{{ $ao->user->id }}">{{ $ao->user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tanggal"><small class="text-danger">*
                                            </small>Tanggal Pengajuan</label>
                                        <input type="text" id="tanggal" class="form-control flatpickr-basic"
                                            name="tanggal_pengajuan" placeholder="YYYY-MM-DD" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jenispenggunaan"><small class="text-danger">*
                                            </small>Jenis Penggunaan</label>
                                        <select class="select2 w-100" name="skpd_jenis_penggunaan_id" id="jenispenggunaan"
                                            required>
                                            <option label="jenispenggunaan"></option>
                                            @foreach ($penggunaans as $penggunaan)
                                                <option value="{{ $penggunaan->id }}">{{ $penggunaan->jenis_penggunaan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="sektor"><small class="text-danger">* </small>Sektor
                                            Ekonomi</label>
                                        <select class="select2 w-100" name="skpd_sektor_ekonomi_id" id="sektor" disabled>
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
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nominal_pembiayaan"><small class="text-danger">*
                                            </small>Nominal Pembiayaan</label>
                                        <input type="text" name="nominal_pembiayaan" class="form-control numeral-mask4"
                                            placeholder="Rp." id="nominal_pembiayaan" required />
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
                                        <label class="form-label" for="rate"><small class="text-danger">*
                                            </small>Rate</label>
                                        <input type="text" name="rate" class="form-control numeral-mask4"
                                            placeholder="%" id="rate" disabled />
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
                                        <input type="text" name="nama_nasabah" id="nama" class="form-control"
                                            placeholder="Nama Lengkap" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="noktp"><small class="text-danger">* </small>No
                                            KTP</label>
                                        <input type="number" name="no_ktp" id="noktp" class="form-control"
                                            placeholder="Masukan Nomor KTP Anda" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tempatlahir"><small class="text-danger">*
                                            </small>Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                            placeholder="Maukan Tempat Lahir Anda" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tgllahir"><small class="text-danger">*
                                            </small>Tanggal Lahir</label>
                                        <input type="date" id="tgl_lahir" class="form-control flatpickr-basic"
                                            name="tgl_lahir" placeholder="YYYY-MM-DD" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="exampleFormControlTextarea1"><small
                                                class="text-danger">* </small>Alamat Sesuai KTP</label>
                                        <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat"
                                            required></textarea>
                                    </div>
                                    <div class="mb-1 col-md-1">
                                        <label class="form-label" for="rt"><small class="text-danger">*
                                            </small>RT</label>
                                        <input type="number" name="rt" id="rt" class="form-control"
                                            placeholder="RT" required />
                                    </div>
                                    <div class="mb-1 col-md-1">
                                        <label class="form-label" for="rw"><small class="text-danger">*
                                            </small>RW</label>
                                        <input type="number" name="rw" id="rw" class="form-control"
                                            placeholder="RW" required />
                                    </div>
                                    <div class="mb-1 col-md-4">
                                        <label class="form-label" for="desa_kelurahan"><small class="text-danger">*
                                            </small>Desa / Kelurahan</label>
                                        <input type="text" name="desa_kelurahan" id="desa_kelurahan"
                                            class="form-control" placeholder="Desa / Kelurahan" required />
                                    </div>
                                    <div class="mb-1 col-md-4">
                                        <label class="form-label" for="kecamatan"><small class="text-danger">*
                                            </small>Kecamatan</label>
                                        <input type="text" name="kecamatan" id="kecamatan" class="form-control"
                                            placeholder="Kecamatan" required />
                                    </div>
                                    <div class="mb-1 col-md-4">
                                        <label class="form-label" for="kabkota"><small class="text-danger">*
                                            </small>Kabupaten / Kota</label>
                                        <input type="text" name="kabkota" id="kabkota" class="form-control"
                                            placeholder="Kabupaten / Kota" required />
                                    </div>
                                    <div class="mb-1 col-md-4">
                                        <label class="form-label" for="provinsi"><small class="text-danger">*
                                            </small>Provinsi</label>
                                        <input type="text" name="provinsi" id="provinsi" class="form-control"
                                            placeholder="Provinsi" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="exampleFormControlTextarea1">Alamat
                                            Domisili</label>
                                        <textarea name="alamat_domisili" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                            placeholder="Alamat"></textarea>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="status"><small class="text-danger">*
                                            </small>Status</label>
                                        <select class="select2 w-100" name="skpd_status_perkawinan_id" id="status"
                                            required>
                                            <option label="status"></option>
                                            @foreach ($statusperkawinans as $statusperkawinan)
                                                <option value="{{ $statusperkawinan->id }}">
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
                                                <option value="{{ $tanggungan->id }}">
                                                    {{ $tanggungan->banyak_tanggungan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nonpwp">No NPWP</label>
                                        <input type="number" name="no_npwp" id="nonpwp" class="form-control"
                                            placeholder="Masukan Nomor NPWP Anda" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="notelp"><small class="text-danger">* </small>No
                                            Telepon</label>
                                        <input type="text" name="no_telp" id="notelp"
                                            class="form-control prefix-mask" placeholder="Masukan Nomor telepon Anda"
                                            required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotodiri"><small class="text-danger">*
                                            </small>Upload Foto Diri</label>
                                        <input type="file" name="foto[1][foto]" id="fotodiri" rows="3"
                                            class="form-control" required />
                                        <input type="hidden" name="foto[1][kategori]" value="Foto Diri" rows="3"
                                            class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotoktp"><small class="text-danger">*
                                            </small>Upload Foto KTP</label>
                                        <input type="file" name="foto[2][foto]" id="fotoktp" rows="3"
                                            class="form-control" required />
                                        <input type="hidden" name="foto[2][kategori]" value="Foto KTP" rows="3"
                                            class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotodiriktp"><small class="text-danger">*
                                            </small>Upload Foto Diri Bersama KTP</label>
                                        <input type="file" name="foto[3][foto]" id="fotodiriktp" rows="3"
                                            class="form-control" required />
                                        <input type="hidden" name="foto[3][kategori]" value="Foto Diri Bersama KTP"
                                            rows="3" class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotokk"><small class="text-danger">*
                                            </small>Upload Foto Kartu Keluarga</label>
                                        <input type="file" name="foto[4][foto]" id="fotokk" rows="3"
                                            class="form-control" required />
                                        <input type="hidden" name="foto[4][kategori]" value="Foto Kartu Keluarga"
                                            rows="3" class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotokk"><small class="text-danger">*
                                            </small>Upload Akta Nikah/Cerai</label>
                                        <input type="file" name="foto[5][foto]" id="fotokk" rows="3"
                                            class="form-control" required />
                                        <input type="hidden" name="foto[5][kategori]" value="Akta Status Pekawinan"
                                            rows="3" class="form-control" />
                                    </div>
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
                                            class="form-control" placeholder="Masukan Nama Orang Terdekat" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="notelpot"><small class="text-danger">* </small>No
                                            Telepon</label>
                                        <input type="text" name="no_telp_orang_terdekat" id="notelpot"
                                            class="form-control prefix-mask1"
                                            placeholder="Masukan Nomor Telepon Orang Terdekat" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="exampleFormControlTextarea1"><small
                                                class="text-danger">* </small>Alamat</label>
                                        <textarea class="form-control" name="alamat_orang_terdekat" id="exampleFormControlTextarea1" rows="3"
                                            placeholder="Alamat Orang Terdekat"></textarea>
                                    </div>
                                    <div class="mb-1 col-md-1">
                                        <label class="form-label" for="rt"><small class="text-danger">*
                                            </small>RT</label>
                                        <input type="number" name="rt_orang_terdekat" id="rt"
                                            class="form-control" placeholder="RT" required />
                                    </div>
                                    <div class="mb-1 col-md-1">
                                        <label class="form-label" for="rw"><small class="text-danger">*
                                            </small>RW</label>
                                        <input type="number" name="rw_orang_terdekat" id="rw"
                                            class="form-control" placeholder="RW" required />
                                    </div>
                                    <div class="mb-1 col-md-4">
                                        <label class="form-label" for="desa_kelurahan"><small class="text-danger">*
                                            </small>Desa / Kelurahan</label>
                                        <input type="text" name="desa_kelurahan_orang_terdekat" id="desa_kelurahan"
                                            class="form-control" placeholder="Desa / Kelurahan" required />
                                    </div>
                                    <div class="mb-1 col-md-4">
                                        <label class="form-label" for="kecamatan"><small class="text-danger">*
                                            </small>Kecamatan</label>
                                        <input type="text" name="kecamatan_orang_terdekat" id="kecamatan"
                                            class="form-control" placeholder="Kecamatan" required />
                                    </div>
                                    <div class="mb-1 col-md-4">
                                        <label class="form-label" for="kabkota"><small class="text-danger">*
                                            </small>Kabupaten / Kota</label>
                                        <input type="text" name="kabkota_orang_terdekat" id="kabkota"
                                            class="form-control" placeholder="Kabupaten / Kota" required />
                                    </div>
                                    <div class="mb-1 col-md-4">
                                        <label class="form-label" for="provinsi"><small class="text-danger">*
                                            </small>Provinsi</label>
                                        <input type="text" name="provinsi_orang_terdekat" id="provinsi"
                                            class="form-control" placeholder="Provinsi" required />
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
                                        <select class="select2 w-100" name="skpd_instansi_id" id="namainstansi">
                                            <option label="namainstansi"></option>
                                            <@foreach ($instansis as $instansi)
                                                <option value="{{ $instansi->id }}">{{ $instansi->nama_instansi }}
                                                </option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="golongan"><small class="text-danger">*
                                            </small>Golongan</label>
                                        <select class="select2 w-100" name="skpd_golongan_id" id="golongan">
                                            <option label="golongan"></option>
                                            @foreach ($golongans as $golongan)
                                                <option value="{{ $golongan->id }}">{{ $golongan->nama_golongan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="skpengangkatan"><small class="text-danger">*
                                            </small>Upload Softcopy SK Pengangkatan / SK Terakhir</label>
                                        <input type="file" name="sk_pengangkatan" id="skpengangkatan" rows="3"
                                            class="form-control" />
                                    </div>
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
                                            <option label="jaminan"></option>
                                            @foreach ($jaminans as $jaminan)
                                                <option value="{{ $jaminan->id }}">{{ $jaminan->nama_jaminan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jaminan_dokumen"><small class="text-danger">*
                                            </small>Upload Jaminan</label>
                                        <input type="file" name="dokumen_jaminan" id="jaminan_dokumen"
                                            class="form-control" />
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
                                            placeholder="Rp." id="gaji_pokok" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="pendapatan_lainnya"><small class="text-danger">*
                                            </small>Gaji / Pendapatan Lainnya (Per Bulan)</label>
                                        <input type="text" name="pendapatan_lainnya"
                                            class="form-control numeral-mask2" placeholder="Rp."
                                            id="pendapatan_lainnya" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="pendapatan_tpp"><small class="text-danger">*
                                            </small>Pendapatan TPP (Per Bulan)</label>
                                        <input type="text" name="gaji_tpp" class="form-control numeral-mask3"
                                            placeholder="Rp." id="pendapatan_tpp" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="lampiran_keuangan">Upload Lampiran Keuangan</label>
                                        <input type="file" name="dokumen_keuangan" id="lampiran_keuangan"
                                            rows="3" class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="slip_gaji">Upload Slip Gaji</label>
                                        <input type="file" name="dokumen_slip_gaji" id="slip_gaji" rows="3"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0">Data Pengeluaran Anda</h5>
                                    <small>Data Pengeluaran Nasabah Anda</small>
                                </div>
                                {{-- <section id="form-repeater">
                                    <div class="row">
                                        <div class="mb-1 col-md-12">
                                            <div class="repeater-default">
                                                <div data-repeater-list="slik">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="multiSelectSizing">Nama
                                                                        Bank</label>
                                                                    <select class="form-select" size="3"
                                                                        name="nama_bank" aria-label="size 3 select"
                                                                        id="multiSelectSizing">
                                                                        <option value="BRI">BRI</option>
                                                                        <option value="BNI">BNI</option>
                                                                        <option value="BCA">BCA</option>
                                                                        <option value="BSI">BSI</option>
                                                                        <option value="Permata">Permata</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="itemcost">Plafond</label>
                                                                    <input type="number" class="form-control"
                                                                        name="plafond" id="plafond"
                                                                        aria-describedby="itemcost" placeholder="Rp." />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="itemquantity">Outstanding</label>
                                                                    <input type="number" class="form-control"
                                                                        name="outstanding" id="outstanding"
                                                                        aria-describedby="itemquantity"
                                                                        placeholder="Rp." />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="itemquantity">Tenor</label>
                                                                    <input type="number" class="form-control"
                                                                        name="tenor" id="tenor"
                                                                        aria-describedby="itemquantity" placeholder="1" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="bng/mgn">Margin</label>
                                                                    <input type="text" class="form-control persen"
                                                                        name="margin" id="bng/mgn"
                                                                        aria-describedby="itemquantity" placeholder="%" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="itemquantity">Angsuran</label>
                                                                    <input type="number" class="form-control" name="angsuran" id="angsuran" aria-describedby="itemquantity" placeholder="1"/>
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
                                                                    <label class="form-label" for="itemquantity">Kol
                                                                        Tertinggi </label>
                                                                    <select class="form-select" size="3"
                                                                        name="kol_tertinggi" aria-label="size 3 select"
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
                                                                    <button class="btn btn-outline-danger text-nowrap px-1"
                                                                        data-repeater-delete type="button">
                                                                        <i data-feather="x" class="me-25"></i>
                                                                        <span>Delete</span>
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
                                </section> --}}

                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="numeral-formatting">Pengeluaran Lainnya (Per
                                        Bulan)</label>
                                    <input type="text" name="pengeluaran_lainnya" class="form-control numeral-mask"
                                        placeholder="Rp." id="Pendapatan TPP" required/>
                                </div>
                                <div class="mb-1 col-md-6">
                                    <label class="form-label" for="numeral-formatting">Keterangan Pengeluaran Lainnya (Per
                                        Bulan)</label>
                                    <input type="text" name="keterangan_pengeluaran_lainnya" class="form-control"
                                        id="Pendapatan TPP" placeholder="Isikan Keterangan Pengeluaran Lainnya" />
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
            <!-- /Modern Horizontal Wizard -->
        </div>
        <!-- END: Content-->
    </div>
    <!-- END: Content-->
@endsection
