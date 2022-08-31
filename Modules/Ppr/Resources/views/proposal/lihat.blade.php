@extends('ppr::layouts.main')

@section('content')
    <style>
        .data {
            visibility: hidden;
        }

        input[type=radio] {
            border: 1px solid #d8d6de;
            padding: 0.5em;
            -webkit-appearance: none;
        }

        input[type=radio]:checked {
            background: url(data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP84uJ4AwAGAAJTvtT6MwAAAABJRU5ErkJggg==) no-repeat center center;
            /* background-color: #f44441; */
            background-size: 9.5px 9.5px;
        }

        input[type=radio]:focus {
            outline-color: transparent;
        }

        .pCenter {
            text-align: center;
        }

        .midJustify {
            vertical-align: middle;
            text-align: justify;
        }

        .midCenter {
            vertical-align: middle;
            text-align: center;
        }

        .tablemobile {
            overflow-x: auto;
            display: block;
        }

        .li-disabled {
            pointer-events: none;
            opacity: 0.6;
        }

        .form-text-beside {
            color: #5e5873;
            font-size: 12px;
            margin-left: -15px;
        }
    </style>
    <!-- BEGIN: Content-->
    <div class="app-content content ">

        <div class="content-body">
            <!-- Justified Tabs starts -->
            <div class="card container-xxl">
                <div class="card-header">
                    <h4 class="card-title">Proposal Pembiayaan PPR Syariah</h4>
                </div>
                <div>
                    <table>
                        <tbody>
                            <tr>
                                <td class="pe-1">&emsp;&nbsp;&nbsp;Nama Nasabah</td>
                                <td>:
                                    {{ $pembiayaan->pemohon->form_pribadi_pemohon_nama_lengkap }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-1">&emsp;&nbsp;&nbsp;Jenis Nasabah</td>
                                <td>:
                                    {{ $pembiayaan->jenis_nasabah }}
                                </td>
                            </tr>
                            <tr>
                                <td class="pe-1">&emsp;&nbsp;&nbsp;Tanggal Pengajuan</td>
                                <td>:
                                    {{ date_format($pembiayaan->created_at, 'd-m-Y') }}
                                </td>
                            </tr>
                    </table>
                </div>
                <div class="card-body container-xxl">
                    <ul class="nav nav-tabs nav-justified" id="tab-utama" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="form-pembiayaan-tab-justified" data-bs-toggle="tab"
                                href="#form-pembiayaan" role="tab" aria-controls="form-pembiayaan"
                                aria-selected="true">Form Pembiayaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="check-list-justified" data-bs-toggle="tab" href="#check-list"
                                role="tab" aria-controls="check-list" aria-selected="true">Check List</a>
                        </li>
                        @if ($pembiayaan->form_cl != 'Telah diisi')
                            <li class="nav-item li-disabled">
                                <a class="nav-link" id="scoring-justified" data-bs-toggle="tab" href="#scoring"
                                    role="tab" aria-controls="scoring" aria-selected="false">Scoring <br /><small
                                        class="text-danger">* Silakan isi Check List terlebih dahulu</small></a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" id="scoring-justified" data-bs-toggle="tab" href="#scoring"
                                    role="tab" aria-controls="scoring" aria-selected="false">Scoring</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- Tab panes -->
            <div class="tab-content pt-1 container-xxl">
                <div class="tab-pane active" id="form-pembiayaan" role="tabpanel"
                    aria-labelledby="form-pembiayaan-tab-justified">
                    <section id="section_pembiayaan" class="modern-horizontal-wizard">
                        <div class="bs-stepper wizard-modern modern-wizard-example">
                            <div class="bs-stepper-header">
                                <div class="step" data-target="#formPermohonan" role="tab"
                                    id="permohonan-modern-trigger">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-box">
                                            <i data-feather="file-text" class="font-medium-3"></i>
                                        </span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">Permohonan PPR Syariah</span>
                                            <span class="bs-stepper-subtitle">Isi Data </span>
                                        </span>
                                    </button>
                                </div>
                                <div class="line">
                                    <i data-feather="chevron-right" class="font-medium-2"></i>
                                </div>
                                <div class="step" data-target="#formDataPribadi" role="tab"
                                    id="pribadi-modern-trigger">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-box">
                                            <i data-feather="user" class="font-medium-3"></i>
                                        </span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">Data Pribadi</span>
                                            <span class="bs-stepper-subtitle">Isi Data Pribadi</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="line">
                                    <i data-feather="chevron-right" class="font-medium-2"></i>
                                </div>
                                <div class="step" data-target="#formDataPekerjaan" role="tab"
                                    id="pekerjaan-modern-trigger">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-box">
                                            <i data-feather="briefcase" class="font-medium-3"></i>
                                        </span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">Data Pekerjaan</span>
                                            <span class="bs-stepper-subtitle">Isi Data Pekerjaan</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="line">
                                    <i data-feather="chevron-right" class="font-medium-2"></i>
                                </div>
                                <div class="step" data-target="#formDataPenghasilanPengeluaran" role="tab"
                                    id="penghasilan-modern-trigger">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-box">
                                            <i data-feather="dollar-sign" class="font-medium-3"></i>
                                        </span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">Data Penghasilan dan
                                                Pengeluaran</span>
                                            <span class="bs-stepper-subtitle">Isi Data Penghasilan dan
                                                Pengeluaran</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="line">
                                    <i data-feather="chevron-right" class="font-medium-2"></i>
                                </div>
                                <div class="step" data-target="#formDataAgunan" role="tab"
                                    id="agunan-modern-trigger">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-box">
                                            <i data-feather="book" class="font-medium-3"></i>
                                        </span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">Data Agunan</span>
                                            <span class="bs-stepper-subtitle">Isi Data Agunan</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="line">
                                    <i data-feather="chevron-right" class="font-medium-2"></i>
                                </div>
                                <div class="step" data-target="#formKekayaan" role="tab" id="kekayaan-trigger">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-box">
                                            <i data-feather="credit-card" class="font-medium-3"></i>
                                        </span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">Data Kekayaan dan
                                                Pinjaman</span>
                                            <span class="bs-stepper-subtitle">Isi Data Kekayaan dan
                                                Pinjaman</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="line">
                                    <i data-feather="chevron-right" class="font-medium-2"></i>
                                </div>
                                <div class="step" data-target="#formInfo" role="tab" id="info-trigger">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-box">
                                            <i data-feather="info" class="font-medium-3"></i>
                                        </span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">Persyaratan
                                                Kelengkapan</span>
                                            <span class="bs-stepper-subtitle">Informasi Persyaratan
                                                Kelengkapan Dokumen</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content">
                                <form action="/ppr/proposal/{{ $pembiayaan->id }}" enctype="multipart/form-data"
                                    method="POST">
                                    @method('PUT')
                                    @csrf
                                    <!-- Form Permohonan -->
                                    <div id="formPermohonan" class="content" role="tabpanel"
                                        aria-labelledby="permohonan-trigger">
                                        <div class="content-header">
                                            {{-- <h5 class="mb-0">Account Details</h5> --}}
                                            <small class="text-danger">* Wajib Diisi</small>
                                        </div>
                                        <div class="row">
                                            <input type="hidden" name="jenis_nasabah"
                                                value="{{ request('jenis_nasabah') }}" />
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="ao"><small class="text-danger">*
                                                    </small>Nama Account Officer (AO)</label>
                                                <select class="select2 w-100" name="user_id" id="ao" disabled>
                                                    {{-- <option label="Pilih
                                                        AO" selected
                                                            disabled> Pilih
                                                            AO
                                                        </option> --}}
                                                    <option value="{{ $pembiayaan->user->id }}" selected>
                                                        {{ $pembiayaan->user->name }}</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_permohonan_jenis_akad_pembayaran"><small
                                                        class="text-danger">*
                                                    </small>Jenis Akad Pembayaran</label>
                                                <select class="select2 w-100" name="form_permohonan_jenis_akad_pembayaran"
                                                    id="form_permohonan_jenis_akad_pembayaran"
                                                    onChange="changeJenisAkad()">
                                                    <option label="form_permohonan_jenis_akad_pembayaran" selected
                                                        disabled>
                                                        Pilih
                                                        Akad
                                                        Pembayaran</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran == 'Murabahah' ? 'selected' : '' }}
                                                        value="Murabahah">Murabahah
                                                    </option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran == 'IMBT' ? 'selected' : '' }}
                                                        value="IMBT">IMBT
                                                    </option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran == 'MMQ' ? 'selected' : '' }}
                                                        value="MMQ">MMQ</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran == 'akad_lainnya' ? 'selected' : '' }}
                                                        value="akad_lainnya">Lainnya
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6 data" id="AkadLainnya"
                                                style="visibility: visible;">
                                                <label class="form-label"
                                                    for="form_permohonan_jenis_akad_pembayaran_lain"><small
                                                        class="text-danger">*
                                                    </small>Lainnya</label>
                                                <input type="text" name="form_permohonan_jenis_akad_pembayaran_lain"
                                                    id="form_permohonan_jenis_akad_pembayaran_lain" class="form-control"
                                                    value="{{ $pembiayaan->form_permohonan_jenis_akad_pembayaran_lain }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_permohonan_nilai_ppr_dimohon"><small
                                                        class="text-danger">*
                                                    </small>Nilai PPR Syariah
                                                    Dimohon</label>
                                                <input type="number" name="form_permohonan_nilai_ppr_dimohon"
                                                    id="form_permohonan_nilai_ppr_dimohon" class="form-control"
                                                    placeholder="Nilai PPR Syariah Dimohon"
                                                    value="{{ $pembiayaan->form_permohonan_nilai_ppr_dimohon }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_permohonan_uang_muka_dana_sendiri"><small
                                                        class="text-danger">*
                                                    </small>Uang Muka/Dana
                                                    Sendiri</label>
                                                <input type="number" name="form_permohonan_uang_muka_dana_sendiri"
                                                    id="form_permohonan_uang_muka_dana_sendiri" class="form-control"
                                                    placeholder="Uang Muka/Dana Sendiri"
                                                    value="{{ $pembiayaan->form_permohonan_uang_muka_dana_sendiri }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_permohonan_nilai_hpp"><small
                                                        class="text-danger">*
                                                    </small>Nilai HPP</label>
                                                <input type="number" name="form_permohonan_nilai_hpp"
                                                    id="form_permohonan_nilai_hpp" class="form-control"
                                                    placeholder="Nilai HPP/Harga Jual"
                                                    value="{{ $pembiayaan->form_permohonan_nilai_hpp }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_permohonan_harga_jual"><small
                                                        class="text-danger">*
                                                    </small>Harga Jual</label>
                                                <input type="number" name="form_permohonan_harga_jual"
                                                    id="form_permohonan_harga_jual" class="form-control"
                                                    placeholder="Nilai HPP/Harga Jual"
                                                    value="{{ $pembiayaan->form_permohonan_harga_jual }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_permohonan_jangka_waktu_ppr"><small
                                                        class="text-danger">*
                                                    </small>Jangka Waktu PPR Syariah</label>
                                                <input type="number" name="form_permohonan_jangka_waktu_ppr"
                                                    id="form_permohonan_jangka_waktu_ppr" class="form-control"
                                                    placeholder="Masukkan Jangka Waktu PPR Syariah"
                                                    value="{{ $pembiayaan->form_permohonan_jangka_waktu_ppr }}" />
                                            </div>

                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_permohonan_peruntukan_ppr"><small
                                                        class="text-danger">*
                                                    </small>Peruntukan PPR Syariah</label>
                                                <select class="select2 w-100" name="form_permohonan_peruntukan_ppr"
                                                    id="form_permohonan_peruntukan_ppr">
                                                    <option label="form_permohonan_peruntukan_ppr" selected disabled>
                                                        Pilih
                                                        Pembelian</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_peruntukan_ppr == 'rumah_tinggal' ? 'selected' : '' }}
                                                        value="rumah_tinggal">Rumah Tinggal
                                                    </option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_peruntukan_ppr == 'apartemen' ? 'selected' : '' }}
                                                        value="apartemen">Apartemen</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_peruntukan_ppr == 'rusun' ? 'selected' : '' }}
                                                        value="rusun">Rusun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_peruntukan_ppr == 'ruko' ? 'selected' : '' }}
                                                        value="ruko">Ruko</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_peruntukan_ppr == 'rukan' ? 'selected' : '' }}
                                                        value="rukan">Rukan</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_peruntukan_ppr == 'kios' ? 'selected' : '' }}
                                                        value="kios">Kios</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_permohonan_jml_margin"><small
                                                        class="text-danger">*
                                                    </small>Jumlah Margin</label>
                                                <input type="number" name="form_permohonan_jml_margin"
                                                    id="form_permohonan_jml_margin" class="form-control"
                                                    placeholder="Masukkan Jumlah Margin"
                                                    value="{{ $pembiayaan->form_permohonan_jml_margin }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_permohonan_jml_sewa"><small
                                                        class="text-danger">*
                                                    </small>Jumlah Sewa</label>
                                                <input type="number" name="form_permohonan_jml_sewa"
                                                    id="form_permohonan_jml_sewa" class="form-control"
                                                    placeholder="Masukkan Jumlah Sewa"
                                                    value="{{ $pembiayaan->form_permohonan_jml_sewa }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_permohonan_jml_bagi_hasil"><small
                                                        class="text-danger">*
                                                    </small>Jumlah Bagi</label>
                                                <input type="number" name="form_permohonan_jml_bagi_hasil"
                                                    id="form_permohonan_jml_bagi_hasil" class="form-control"
                                                    placeholder="Masukkan Jumlah Bagi"
                                                    value="{{ $pembiayaan->form_permohonan_jml_bagi_hasil }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_permohonan_jml_bulan"><small
                                                        class="text-danger">*
                                                    </small>Jumlah Bulan</label>
                                                <input type="number" name="form_permohonan_jml_bulan"
                                                    id="form_permohonan_jml_bulan" class="form-control"
                                                    placeholder="Masukkan Jumlah Bulan"
                                                    value="{{ $pembiayaan->form_permohonan_jml_bulan }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_permohonan_sistem_pembayaran_angsuran"><small
                                                        class="text-danger">*
                                                    </small>Sistem Pembayaran Angsuran</label>
                                                <select class="select2 w-100"
                                                    name="form_permohonan_sistem_pembayaran_angsuran"
                                                    id="form_permohonan_sistem_pembayaran_angsuran">
                                                    <option label="form_permohonan_sistem_pembayaran_angsuran" selected
                                                        disabled>
                                                        Pilih Sistem
                                                        Pembayaran Angsuran</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_sistem_pembayaran_angsuran == 'kolektif_potong_gaji' ? 'selected' : '' }}
                                                        value="kolektif_potong_gaji">
                                                        Kolektif/Potong
                                                        Gaji</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_sistem_pembayaran_angsuran == 'pemindahbukuan_transfer' ? 'selected' : '' }}
                                                        value="pemindahbukuan_transfer">
                                                        Pemindahbukuan/Transfer</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_sistem_pembayaran_angsuran == 'tunai_atm' ? 'selected' : '' }}
                                                        value="tunai_atm">Tunai - ATM</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_sistem_pembayaran_angsuran == 'tunai_loket' ? 'selected' : '' }}
                                                        value="tunai_loket">Tunai - Loket</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_sistem_pembayaran_angsuran == 'kantor_pos' ? 'selected' : '' }}
                                                        value="kantor_pos">Kantor Pos</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between mt-3">
                                            <button class="btn btn-outline-secondary btn-prev" disabled>
                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                            </button>
                                        </div>
                                    </div>


                                    <!-- Form Data Pribadi -->

                                    <div id="formDataPribadi" class="content" role="tabpanel"
                                        aria-labelledby="pribadi-trigger">
                                        <div class="content-header">
                                            <h4 class="mb-0 mt-2">Data Pribadi</h4>
                                            <hr>
                                        </div>
                                        <div class="content-header">
                                            <h5 class="mb-0 mt-2">Pemohon PPR Syariah</h5>
                                            <small class="text-muted">Lengkapi Data Diri.</small>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pribadi_pemohon_nama_lengkap"><small
                                                        class="text-danger">*
                                                    </small>Nama Lengkap</label>
                                                <input type="text" name="form_pribadi_pemohon_nama_lengkap"
                                                    id="form_pribadi_pemohon_nama_lengkap" class="form-control"
                                                    placeholder="Nama Lengkap"
                                                    value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_nama_lengkap }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pribadi_pemohon_nama_ktp"><small
                                                        class="text-danger">*
                                                    </small>Nama Sesuai KTP</label>
                                                <input type="text" name="form_pribadi_pemohon_nama_ktp"
                                                    id="form_pribadi_pemohon_nama_ktp" class="form-control"
                                                    placeholder="Nama Sesuai KTP"
                                                    value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_nama_ktp }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pribadi_pemohon_gelar">Gelar</label>
                                                <input type="text" name="form_pribadi_pemohon_gelar"
                                                    id="form_pribadi_pemohon_gelar" class="form-control"
                                                    placeholder="Gelar"
                                                    value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_gelar }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pribadi_pemohon_nama_alias">Nama
                                                    Alias</label>
                                                <input type="text" name="form_pribadi_pemohon_nama_alias"
                                                    id="form_pribadi_pemohon_nama_alias" class="form-control"
                                                    placeholder="Nama Alias"
                                                    value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_nama_alias }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pribadi_pemohon_no_ktp"><small
                                                        class="text-danger">*
                                                    </small>No. KTP</label>
                                                <input type="number" name="form_pribadi_pemohon_no_ktp"
                                                    id="form_pribadi_pemohon_no_ktp" class="form-control"
                                                    placeholder="Masukkan Nomor KTP Anda"
                                                    value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_no_ktp }}" />
                                            </div>
                                            {{-- <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pribadi_pemohon_no_ktp_berlaku_sd"><small
                                                        class="text-danger">*
                                                    </small>Berlaku s/d.</label>
                                                <input type="date" id="form_pribadi_pemohon_no_ktp_berlaku_sd"
                                                    class="form-control flatpickr-basic"
                                                    name="form_pribadi_pemohon_no_ktp_berlaku_sd" placeholder="DD-MM-YYYY"
                                                    value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_no_ktp_berlaku_sd }}" />
                                            </div> --}}
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pribadi_pemohon_jenis_kelamin"><small
                                                        class="text-danger">*
                                                    </small>Jenis Kelamin</label>
                                                <div>
                                                    {{-- &ensp;
                                                                    <input type="radio" name="jeniskelamin" id="pria" value="pria"
                                                                         /><label class="form-label"
                                                                        style="transform: translateY(-15%);">&nbsp;Pria</label>
                                                                    &emsp;
                                                                    <input type="radio" name="jeniskelamin" id="wanita" value="wanita"
                                                                         /><label class="form-label"
                                                                        style="transform: translateY(-15%);">&nbsp;Wanita</label> --}}
                                                    &ensp;
                                                    <input type="radio" name="form_pribadi_pemohon_jenis_kelamin"
                                                        class="form-check-input" id="pria" value="pria" />
                                                    <label class="form-label" for="pria">&nbsp;Pria</label>
                                                    <br>
                                                    &ensp;
                                                    <input type="radio" name="form_pribadi_pemohon_jenis_kelamin"
                                                        class="form-check-input" id="wanita" value="wanita" />
                                                    <label class="form-label" for="wanita">&nbsp;Wanita</label>
                                                </div>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pribadi_pemohon_tempat_lahir"><small
                                                        class="text-danger">*
                                                    </small>Tempat Lahir</label>
                                                <input type="text" name="form_pribadi_pemohon_tempat_lahir"
                                                    id="form_pribadi_pemohon_tempat_lahir" class="form-control"
                                                    placeholder="Masukkan Tempat Lahir Anda"
                                                    value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_tempat_lahir }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pribadi_pemohon_tanggal_lahir"><small
                                                        class="text-danger">*
                                                    </small>Tanggal Lahir</label>
                                                <input type="date" id="form_pribadi_pemohon_tanggal_lahir"
                                                    class="form-control flatpickr-basic"
                                                    name="form_pribadi_pemohon_tanggal_lahir" placeholder="DD-MM-YYYY"
                                                    value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_tanggal_lahir }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <small class="text-danger">*
                                                </small> <label class="form-label" for="form_pribadi_pemohon_npwp">No.
                                                    NPWP</label>
                                                <input type="number" name="form_pribadi_pemohon_npwp"
                                                    id="form_pribadi_pemohon_npwp" class="form-control"
                                                    placeholder="Masukkan Nomor NPWP Anda"
                                                    value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_npwp }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pribadi_pemohon_pendidikan"><small
                                                        class="text-danger">*
                                                    </small>Pendidikan</label>
                                                <select class="select2 w-100" name="form_pribadi_pemohon_pendidikan"
                                                    id="form_pribadi_pemohon_pendidikan">
                                                    <option label="form_pribadi_pemohon_pendidikan" selected disabled>
                                                        Pilih
                                                        Pendidikan</option>
                                                    <option value="sd">SD</option>
                                                    <option value="sltp">SLTP</option>
                                                    <option value="slta">SLTA</option>
                                                    <option value="d1">D1</option>
                                                    <option value="d2">D2</option>
                                                    <option value="d3">D3</option>
                                                    <option value="s1">S1</option>
                                                    <option value="s2">S2</option>
                                                    <option value="s3">S3</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pribadi_pemohon_agama">Agama</label>
                                                <select class="select2 w-100" name="form_pribadi_pemohon_agama"
                                                    id="form_pribadi_pemohon_agama">
                                                    <option label="form_pribadi_pemohon_agama" selected disabled>
                                                        Pilih Agama
                                                    </option>
                                                    <option value="islam">Islam</option>
                                                    <option value="protestan">Protestan</option>
                                                    <option value="katholik">Katholik</option>
                                                    <option value="budha">Budha</option>
                                                    <option value="hindu">Hindu</option>
                                                    <option value="kong_hu_chu">Kong Hu Chu</option>
                                                    <option value="lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pribadi_pemohon_status_pernikahan"><small
                                                        class="text-danger">*
                                                    </small>Status Pernikahan</label>
                                                <select class="select2 w-100"
                                                    name="form_pribadi_pemohon_status_pernikahan"
                                                    id="form_pribadi_pemohon_status_pernikahan" onChange="changeStatus()">
                                                    <option label="status" selected disabled>Pilih
                                                        Status
                                                        Pernikahan</option>
                                                    <option value="BM">Belum Menikah</option>
                                                    <option value="M">Menikah</option>
                                                    <option value="JDM">Janda/Duda - Meninggal
                                                    </option>
                                                    <option value="JDC">Janda/Duda - Cerai</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pribadi_pemohon_jml_anak"><small
                                                        class="text-danger">*
                                                    </small>Jumlah Anak</label>
                                                <input type="number" name="form_pribadi_pemohon_jml_anak"
                                                    id="form_pribadi_pemohon_jml_anak" class="form-control"
                                                    placeholder="Jumlah Anak"
                                                    value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_jml_anak }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pribadi_pemohon_jml_tanggungan"><small
                                                        class="text-danger">*
                                                    </small>Jumlah Tanggungan</label>
                                                <input type="number" name="form_pribadi_pemohon_jml_tanggungan"
                                                    id="form_pribadi_pemohon_jml_tanggungan" class="form-control"
                                                    placeholder="Jumlah Tanggungan"
                                                    value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_jml_tanggungan }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pribadi_pemohon_nama_gadis_ibu_kandung">Nama
                                                    Gadis Ibu Kandung</label>
                                                <input type="text" name="form_pribadi_pemohon_nama_gadis_ibu_kandung"
                                                    id="form_pribadi_pemohon_nama_gadis_ibu_kandung" class="form-control"
                                                    placeholder="Nama Gadis Ibu Kandung"
                                                    value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_nama_gadis_ibu_kandung }}" />
                                            </div>
                                            <div class="row">
                                                <div class="mb-1 col-md-12">
                                                    <div data-repeater-list="form_pribadi_pemohon_alamat_ktp">
                                                        <div data-repeater-item>
                                                            <div class="row d-flex align-items-end">
                                                                <div class="col-md-4 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="form_pribadi_pemohon_alamat_ktp"><small
                                                                                class="text-danger">*
                                                                            </small>Alamat Sesuai
                                                                            KTP</label>
                                                                        <input type="text" class="form-control"
                                                                            name="form_pribadi_pemohon_alamat_ktp"
                                                                            id="form_pribadi_pemohon_alamat_ktp"
                                                                            aria-describedby="form_pribadi_pemohon_alamat_ktp"
                                                                            placeholder="Alamat Sesuai KTP"
                                                                            value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_ktp }}" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-1 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="form_pribadi_pemohon_alamat_ktp_rt"><small
                                                                                class="text-danger">*
                                                                            </small>RT</label>
                                                                        <input type="number" class="form-control"
                                                                            name="form_pribadi_pemohon_alamat_ktp_rt"
                                                                            id="form_pribadi_pemohon_alamat_ktp_rt"
                                                                            aria-describedby="form_pribadi_pemohon_alamat_ktp_rt"
                                                                            placeholder="RT"
                                                                            value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_ktp_rt }}" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-1 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="form_pribadi_pemohon_alamat_ktp_rw"><small
                                                                                class="text-danger">*
                                                                            </small>RW</label>
                                                                        <input type="number" class="form-control"
                                                                            name="form_pribadi_pemohon_alamat_ktp_rw"
                                                                            id="form_pribadi_pemohon_alamat_ktp_rw"
                                                                            aria-describedby="form_pribadi_pemohon_alamat_ktp_rw"
                                                                            placeholder="RW"
                                                                            value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_ktp_rw }}" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="form_pribadi_pemohon_alamat_ktp_kelurahan"><small
                                                                                class="text-danger">*
                                                                            </small>Kelurahan</label>
                                                                        <input type="text" class="form-control"
                                                                            name="form_pribadi_pemohon_alamat_ktp_kelurahan"
                                                                            id="form_pribadi_pemohon_alamat_ktp_kelurahan"
                                                                            aria-describedby="form_pribadi_pemohon_alamat_ktp_kelurahan"
                                                                            placeholder="Kelurahan"
                                                                            value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_ktp_kelurahan }}" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="form_pribadi_pemohon_alamat_ktp_kecamatan"><small
                                                                                class="text-danger">*
                                                                            </small>Kecamatan</label>
                                                                        <input type="text" class="form-control"
                                                                            name="form_pribadi_pemohon_alamat_ktp_kecamatan"
                                                                            id="form_pribadi_pemohon_alamat_ktp_kecamatan"
                                                                            aria-describedby="form_pribadi_pemohon_alamat_ktp_kecamatan"
                                                                            placeholder="Kecamatan"
                                                                            value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_ktp_kecamatan }}" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="form_pribadi_pemohon_alamat_ktp_dati2"><small
                                                                                class="text-danger">*
                                                                            </small>Dati
                                                                            2</label>
                                                                        <input type="text" class="form-control"
                                                                            name="form_pribadi_pemohon_alamat_ktp_dati2"
                                                                            id="form_pribadi_pemohon_alamat_ktp_dati2"
                                                                            aria-describedby="form_pribadi_pemohon_alamat_ktp_dati2"
                                                                            placeholder="Dati 2"
                                                                            value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_ktp_dati2 }}" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="form_pribadi_pemohon_alamat_ktp_provinsi"><small
                                                                                class="text-danger">*
                                                                            </small>Provinsi</label>
                                                                        <input type="text" class="form-control"
                                                                            name="form_pribadi_pemohon_alamat_ktp_provinsi"
                                                                            id="form_pribadi_pemohon_alamat_ktp_provinsi"
                                                                            aria-describedby="form_pribadi_pemohon_alamat_ktp_provinsi"
                                                                            placeholder="Provinsi"
                                                                            value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_ktp_provinsi }}" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-1 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="form_pribadi_pemohon_alamat_ktp_kode_pos"><small
                                                                                class="text-danger">*
                                                                            </small>Kode
                                                                            Pos</label>
                                                                        <input type="number" class="form-control"
                                                                            name="form_pribadi_pemohon_alamat_ktp_kode_pos"
                                                                            id="form_pribadi_pemohon_alamat_ktp_kode_pos"
                                                                            aria-describedby="form_pribadi_pemohon_alamat_ktp_kode_pos"
                                                                            placeholder="16XXXX"
                                                                            value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_ktp_kode_pos }}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-1 col-md-6"></div>

                                                <div class="row">
                                                    <div class="mb-1 col-md-12">
                                                        <div data-repeater-list="form_pribadi_pemohon_alamat_domisili">
                                                            <div data-repeater-item>
                                                                <div class="row d-flex align-items-end">
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pribadi_pemohon_alamat_domisili"><small
                                                                                    class="text-danger">*
                                                                                </small>Alamat Tempat
                                                                                Tinggal
                                                                                (Domisili)</label>
                                                                            <input type="text" class="form-control"
                                                                                id="form_pribadi_pemohon_alamat_domisili"
                                                                                name="form_pribadi_pemohon_alamat_domisili"
                                                                                aria-describedby="form_pribadi_pemohon_alamat_domisili"
                                                                                placeholder="Alamat Tempat Tinggal (Domisili)"
                                                                                value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_domisili }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pribadi_pemohon_alamat_domisili_rt"><small
                                                                                    class="text-danger">*
                                                                                </small>RT</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_pribadi_pemohon_alamat_domisili_rt"
                                                                                id="form_pribadi_pemohon_alamat_domisili_rt"
                                                                                aria-describedby="form_pribadi_pemohon_alamat_domisili_rt"
                                                                                placeholder="RT"
                                                                                value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_domisili_rt }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pribadi_pemohon_alamat_domisili_rw"><small
                                                                                    class="text-danger">*
                                                                                </small>RW</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_pribadi_pemohon_alamat_domisili_rw"
                                                                                id="form_pribadi_pemohon_alamat_domisili_rw"
                                                                                aria-describedby="form_pribadi_pemohon_alamat_domisili_rw"
                                                                                placeholder="RW"
                                                                                value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_domisili_rw }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pribadi_pemohon_alamat_domisili_kelurahan"><small
                                                                                    class="text-danger">*
                                                                                </small>Kelurahan</label>
                                                                            <input type="text" class="form-control"
                                                                                name="form_pribadi_pemohon_alamat_domisili_kelurahan"
                                                                                id="form_pribadi_pemohon_alamat_domisili_kelurahan"
                                                                                aria-describedby="form_pribadi_pemohon_alamat_domisili_kelurahan"
                                                                                placeholder="Kelurahan"
                                                                                value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_domisili_kelurahan }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pribadi_pemohon_alamat_domisili_kecamatan"><small
                                                                                    class="text-danger">*
                                                                                </small>Kecamatan</label>
                                                                            <input type="text" class="form-control"
                                                                                name="form_pribadi_pemohon_alamat_domisili_kecamatan"
                                                                                id="form_pribadi_pemohon_alamat_domisili_kecamatan"
                                                                                aria-describedby="form_pribadi_pemohon_alamat_domisili_kecamatan"
                                                                                placeholder="Kecamatan"
                                                                                value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_domisili_kecamatan }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pribadi_pemohon_alamat_domisili_dati2"><small
                                                                                    class="text-danger">*
                                                                                </small>Dati
                                                                                2</label>
                                                                            <input type="text" class="form-control"
                                                                                name="form_pribadi_pemohon_alamat_domisili_dati2"
                                                                                id="form_pribadi_pemohon_alamat_domisili_dati2"
                                                                                aria-describedby="form_pribadi_pemohon_alamat_domisili_dati2"
                                                                                placeholder="Dati 2"
                                                                                value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_domisili_dati2 }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pribadi_pemohon_alamat_domisili_provinsi"><small
                                                                                    class="text-danger">*
                                                                                </small>Provinsi</label>
                                                                            <input type="text" class="form-control"
                                                                                name="form_pribadi_pemohon_alamat_domisili_provinsi"
                                                                                id="form_pribadi_pemohon_alamat_domisili_provinsi"
                                                                                aria-describedby="form_pribadi_pemohon_alamat_domisili_provinsi"
                                                                                placeholder="Provinsi"
                                                                                value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_domisili_provinsi }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pribadi_pemohon_alamat_domisili_kode_pos"><small
                                                                                    class="text-danger">*
                                                                                </small>Kode
                                                                                Pos</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_pribadi_pemohon_alamat_domisili_kode_pos"
                                                                                id="form_pribadi_pemohon_alamat_domisili_kode_pos"
                                                                                aria-describedby="form_pribadi_pemohon_alamat_domisili_kode_pos"
                                                                                placeholder="16XXXX"
                                                                                value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_domisili_kode_pos }}" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-1 col-md-6">
                                                        <label class="form-label"
                                                            for="form_pribadi_pemohon_no_telp"><small
                                                                class="text-danger">*
                                                            </small>No. Telepon</label>
                                                        <input type="number" name="form_pribadi_pemohon_no_telp"
                                                            id="form_pribadi_pemohon_no_telp" class="form-control"
                                                            placeholder="Masukkan Nomor Telepon Anda"
                                                            value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_no_telp }}" />
                                                    </div>
                                                    <div class="mb-1 col-md-6">
                                                        <label class="form-label"
                                                            for="form_pribadi_pemohon_no_handphone"><small
                                                                class="text-danger">*
                                                            </small>Handphone</label>
                                                        <input type="number" name="form_pribadi_pemohon_no_handphone"
                                                            id="form_pribadi_pemohon_no_handphone" class="form-control"
                                                            placeholder="Masukkan Nomor Handphone Anda"
                                                            value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_no_handphone }}" />
                                                    </div>
                                                    <div class="mb-1 col-md-12">
                                                        <div
                                                            data-repeater-list="form_pribadi_pemohon_status_tempat_tinggal">
                                                            <div data-repeater-item>
                                                                <div class="row d-flex align-items-end">
                                                                    <div class="mb-1 col-md-3">
                                                                        <label class="form-label"
                                                                            for="form_pribadi_pemohon_status_tempat_tinggal">Status
                                                                            Tempat
                                                                            Tinggal</label>
                                                                        <select class="select2 w-200"
                                                                            name="form_pribadi_pemohon_status_tempat_tinggal"
                                                                            id="form_pribadi_pemohon_status_tempat_tinggal">
                                                                            <option
                                                                                label="form_pribadi_pemohon_status_tempat_tinggal"
                                                                                selected disabled>
                                                                                Pilih Status
                                                                                Tempat Tinggal
                                                                            </option>
                                                                            <option value="milik_sendiri">
                                                                                Milik Sendiri</option>
                                                                            <option value="sewa_kontrak">
                                                                                Sewa/Kontrak</option>
                                                                            <option value="kost">Kost
                                                                            </option>
                                                                            <option value="milik_orangtua_keluarga">
                                                                                Milik
                                                                                Orangtua/Keluarga
                                                                            </option>
                                                                            <option value="milik_perusahan_instansi_dinas">
                                                                                Milik
                                                                                Perusahaan/Instansi/Dinas
                                                                            </option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_tahun">Tahun</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_tahun"
                                                                                id="form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_tahun"
                                                                                aria-describedby="form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_tahun"
                                                                                placeholder="Tahun"
                                                                                value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_tahun }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_bulan">Bulan</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_bulan"
                                                                                id="form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_bulan"
                                                                                aria-describedby="form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_bulan"
                                                                                placeholder="Bulan"
                                                                                value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_bulan }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-1 col-md-2">
                                                                        <label class="form-label"
                                                                            for="form_pribadi_pemohon_status_tempat_tinggal_dijaminkan">Sedang
                                                                            Dijaminkan</label>
                                                                        <select class="select2 w-100"
                                                                            name="form_pribadi_pemohon_status_tempat_tinggal_dijaminkan"
                                                                            id="form_pribadi_pemohon_status_tempat_tinggal_dijaminkan">
                                                                            <option
                                                                                label="form_pribadi_pemohon_status_tempat_tinggal_dijaminkan"
                                                                                selected disabled>
                                                                                Pilih
                                                                            </option>
                                                                            <option value="ya">Ya
                                                                            </option>
                                                                            <option value="tidak">
                                                                                Tidak
                                                                            </option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-5 col-12"
                                                                        id="form_pribadi_pemohon_status_tempat_tinggal_dijaminkan_ya_kepada">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pribadi_pemohon_status_tempat_tinggal_dijaminkan_ya_kepada">Dijaminkan
                                                                                Kepada</label>
                                                                            <input type="text" class="form-control"
                                                                                name="form_pribadi_pemohon_status_tempat_tinggal_dijaminkan_ya_kepada"
                                                                                id="form_pribadi_pemohon_status_tempat_tinggal_dijaminkan_ya_kepada"
                                                                                aria-describedby="form_pribadi_pemohon_status_tempat_tinggal_dijaminkan_ya_kepada"
                                                                                placeholder="Dijaminkan Kepada"
                                                                                value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_status_tempat_tinggal_dijaminkan_ya_kepada }}" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-1 col-md-6">
                                                        <label class="form-label"
                                                            for="form_pribadi_pemohon_alamat_korespondensi">Alamat
                                                            Korespondensi</label>
                                                        <select class="select2 w-100"
                                                            name="form_pribadi_pemohon_alamat_korespondensi"
                                                            id="form_pribadi_pemohon_alamat_korespondensi">
                                                            <option label="form_pribadi_pemohon_alamat_korespondensi"
                                                                selected disabled>Pilih Alamat
                                                                Korespondensi
                                                            </option>
                                                            <option value="alamat_sesuai_ktp">Alamat
                                                                Sesuai
                                                                KTP</option>
                                                            <option value="alamat_tempat_tinggal">
                                                                Alamat
                                                                Tempat Tinggal</option>
                                                            <option value="alamat_pekerjaan">Alamat
                                                                Pekerjaan/Kantor</option>
                                                            <option value="alamat_agunan">Alamat Agunan
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Keluarga Terdekat -->
                                                <div class="content-header">
                                                    <h5 class="mb-0 mt-2">Keluarga Terdekat</h5>
                                                    <small class="text-muted">Untuk keperluan mendadak
                                                        (keluarga dekat tidak
                                                        serumah).</small>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-1 col-md-6">
                                                        <label class="form-label"
                                                            for="form_pribadi_keluarga_terdekat_nama_lengkap"><small
                                                                class="text-danger">*
                                                            </small>Nama Lengkap</label>
                                                        <input type="text"
                                                            name="form_pribadi_keluarga_terdekat_nama_lengkap"
                                                            id="form_pribadi_keluarga_terdekat_nama_lengkap"
                                                            class="form-control" placeholder="Nama Lengkap"
                                                            value="{{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_nama_lengkap }}" />
                                                    </div>
                                                    <div class="mb-1 col-md-6">
                                                        <label class="form-label"
                                                            for="form_pribadi_keluarga_terdekat_hubungan"><small
                                                                class="text-danger">*
                                                            </small>Hubungan Dengan Pemohon</label>
                                                        <select class="select2 w-100"
                                                            name="form_pribadi_keluarga_terdekat_hubungan"
                                                            id="form_pribadi_keluarga_terdekat_hubungan">
                                                            <option label="form_pribadi_keluarga_terdekat_hubungan"
                                                                selected disabled>Pilih Hubungan Dengan
                                                                Pemohon</option>
                                                            <option value="orangtua">Orangtua</option>
                                                            <option value="mertua">Mertua</option>
                                                            <option value="sdr_kandung">Sdr. Kandung
                                                            </option>
                                                            <option value="anak">Anak</option>
                                                            <option value="ipar">Ipar</option>
                                                            <option value="sdr_kandung_dari_orangtua">
                                                                Sdr.
                                                                Kandung dari Orangtua
                                                            </option>
                                                            <option value="lainnya">Lainnya</option>

                                                            {{-- if Lainnya is selected, input text ... or create new option (new table) --}}

                                                        </select>
                                                    </div>
                                                    <div class="mb-1 col-md-6" id=hubunganLainnya>
                                                        <label class="form-label"
                                                            for="form_pribadi_keluarga_terdekat_hubungan"><small
                                                                class="text-danger">*
                                                            </small>Lainnya</label>
                                                        <input type="text"
                                                            name="form_pribadi_keluarga_terdekat_hubungan"
                                                            id="form_pribadi_keluarga_terdekat_hubungan"
                                                            class="form-control" placeholder="Lainnya"
                                                            value="{{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_hubungan }}" />
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-1 col-md-12">
                                                            <div data-repeater-list="form_pribadi_keluarga_terdekat">
                                                                <div data-repeater-item>
                                                                    <div class="row d-flex align-items-end">
                                                                        <div class="col-md-4 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="form_pribadi_keluarga_terdekat_alamat"><small
                                                                                        class="text-danger">*
                                                                                    </small>Alamat
                                                                                    Tempat
                                                                                    Tinggal</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="form_pribadi_keluarga_terdekat_alamat"
                                                                                    id="form_pribadi_keluarga_terdekat_alamat"
                                                                                    aria-describedby="form_pribadi_keluarga_terdekat_alamat"
                                                                                    placeholder="Alamat"
                                                                                    value="{{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_alamat }}"
                                                                                    required />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-1 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="form_pribadi_keluarga_terdekat_alamat_rt"><small
                                                                                        class="text-danger">*
                                                                                    </small>RT</label>
                                                                                <input type="number" class="form-control"
                                                                                    name="form_pribadi_keluarga_terdekat_alamat_rt"
                                                                                    id="form_pribadi_keluarga_terdekat_alamat_rt"
                                                                                    aria-describedby="form_pribadi_keluarga_terdekat_alamat_rt"
                                                                                    placeholder="RT"
                                                                                    value="{{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_alamat_rt }}"
                                                                                    required />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-1 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="form_pribadi_keluarga_terdekat_alamat_rw"><small
                                                                                        class="text-danger">*
                                                                                    </small>RW</label>
                                                                                <input type="number" class="form-control"
                                                                                    name="form_pribadi_keluarga_terdekat_alamat_rw"
                                                                                    id="form_pribadi_keluarga_terdekat_alamat_rw"
                                                                                    aria-describedby="form_pribadi_keluarga_terdekat_alamat_rw"
                                                                                    placeholder="RW"
                                                                                    value="{{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_alamat_rw }}"
                                                                                    required />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="form_pribadi_keluarga_terdekat_alamat_kelurahan"><small
                                                                                        class="text-danger">*
                                                                                    </small>Kelurahan</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="form_pribadi_keluarga_terdekat_alamat_kelurahan"
                                                                                    id="form_pribadi_keluarga_terdekat_alamat_kelurahan"
                                                                                    aria-describedby="form_pribadi_keluarga_terdekat_alamat_kelurahan"
                                                                                    placeholder="Kelurahan"
                                                                                    value="{{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_alamat_kelurahan }}"
                                                                                    required />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="form_pribadi_keluarga_terdekat_alamat_kecamatan"><small
                                                                                        class="text-danger">*
                                                                                    </small>Kecamatan</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="form_pribadi_keluarga_terdekat_alamat_kecamatan"
                                                                                    id="form_pribadi_keluarga_terdekat_alamat_kecamatan"
                                                                                    aria-describedby="form_pribadi_keluarga_terdekat_alamat_kecamatan"
                                                                                    placeholder="Kecamatan"
                                                                                    value="{{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_alamat_kecamatan }}"
                                                                                    required />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="form_pribadi_keluarga_terdekat_alamat_dati2"><small
                                                                                        class="text-danger">*
                                                                                    </small>Dati
                                                                                    2</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="form_pribadi_keluarga_terdekat_alamat_dati2"
                                                                                    id="form_pribadi_keluarga_terdekat_alamat_dati2"
                                                                                    aria-describedby="form_pribadi_keluarga_terdekat_alamat_dati2"
                                                                                    placeholder="Dati 2"
                                                                                    value="{{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_alamat_dati2 }}"
                                                                                    required />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="form_pribadi_keluarga_terdekat_alamat_provinsi"><small
                                                                                        class="text-danger">*
                                                                                    </small>Provinsi</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="form_pribadi_keluarga_terdekat_alamat_provinsi"
                                                                                    id="form_pribadi_keluarga_terdekat_alamat_provinsi"
                                                                                    aria-describedby="form_pribadi_keluarga_terdekat_alamat_provinsi"
                                                                                    placeholder="Provinsi"
                                                                                    value="{{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_alamat_provinsi }}"
                                                                                    required />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-1 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="form_pribadi_keluarga_terdekat_alamat_kode_pos"><small
                                                                                        class="text-danger">*
                                                                                    </small>Kode
                                                                                    Pos</label>
                                                                                <input type="number" class="form-control"
                                                                                    name="form_pribadi_keluarga_terdekat_alamat_kode_pos"
                                                                                    id="form_pribadi_keluarga_terdekat_alamat_kode_pos"
                                                                                    aria-describedby="form_pribadi_keluarga_terdekat_alamat_kode_pos"
                                                                                    placeholder="16XXXX"
                                                                                    value="{{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_alamat_kode_pos }}"
                                                                                    required />
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-1 col-md-6">
                                                            <label class="form-label"
                                                                for="form_pribadi_keluarga_terdekat_no_telp"><small
                                                                    class="text-danger">*
                                                                </small>No. Telepon Tempat
                                                                Tinggal</label>
                                                            <input type="number"
                                                                name="form_pribadi_keluarga_terdekat_no_telp"
                                                                id="form_pribadi_keluarga_terdekat_no_telp"
                                                                class="form-control"
                                                                placeholder="Masukkan Nomor Telepon Keluarga Terdekat"
                                                                value="{{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_no_telp }}"
                                                                required />
                                                        </div>
                                                    </div>

                                                    <!-- Istri/Suami -->
                                                    <div class="content-header data" id="ifMenikahHeader">
                                                        <h5 class="mb-0 mt-2">Istri / Suami</h5>
                                                        <small class="text-muted">Lengkapi Data
                                                            Istri/Suami.</small>
                                                    </div>
                                                    <div class="row data" id="ifMenikah">
                                                        <div class="mb-1 col-md-6">
                                                            <label class="form-label"
                                                                for="form_pribadi_istri_suami_nama_lengkap">Nama
                                                                Lengkap</label>
                                                            <input type="text"
                                                                name="form_pribadi_istri_suami_nama_lengkap"
                                                                id="form_pribadi_istri_suami_nama_lengkap"
                                                                class="form-control" placeholder="Nama Lengkap"
                                                                value="{{ $pembiayaan->pemohon->form_pribadi_istri_suami_nama_lengkap }}" />
                                                        </div>
                                                        <div class="mb-1 col-md-6">
                                                            <label class="form-label"
                                                                for="form_pribadi_istri_suami_gelar">Gelar</label>
                                                            <input type="text" name="form_pribadi_istri_suami_gelar"
                                                                id="form_pribadi_istri_suami_gelar" class="form-control"
                                                                placeholder="Gelar"
                                                                value="{{ $pembiayaan->pemohon->form_pribadi_istri_suami_gelar }}" />
                                                        </div>
                                                        <div class="mb-1 col-md-6">
                                                            <label class="form-label"
                                                                for="form_pribadi_istri_suami_no_ktp">No.
                                                                KTP</label>
                                                            <input type="number" name="form_pribadi_istri_suami_no_ktp"
                                                                id="form_pribadi_istri_suami_no_ktp" class="form-control"
                                                                placeholder="Masukkan Nomor KTP Istri/Suami Anda"
                                                                value="{{ $pembiayaan->pemohon->form_pribadi_istri_suami_no_ktp }}" />
                                                        </div>
                                                        {{-- <div class="mb-1 col-md-6">
                                                            <label class="form-label"
                                                                for="form_pribadi_istri_suami_no_ktp_berlaku_sd">Berlaku
                                                                s/d.</label>
                                                            <input type="date"
                                                                id="form_pribadi_istri_suami_no_ktp_berlaku_sd"
                                                                class="form-control flatpickr-basic"
                                                                name="form_pribadi_istri_suami_no_ktp_berlaku_sd"
                                                                placeholder="DD-MM-YYYY"
                                                                value="{{ $pembiayaan->pemohon->form_pribadi_istri_suami_no_ktp_berlaku_sd }}" />
                                                        </div> --}}
                                                        <div class="mb-1 col-md-6">
                                                            <label class="form-label"
                                                                for="form_pribadi_istri_suami_tempat_lahir">Tempat
                                                                Lahir</label>
                                                            <input type="text"
                                                                name="form_pribadi_istri_suami_tempat_lahir"
                                                                id="form_pribadi_istri_suami_tempat_lahir"
                                                                class="form-control"
                                                                placeholder="Masukkan Tempat Lahir Istri/Suami"
                                                                value="{{ $pembiayaan->pemohon->form_pribadi_istri_suami_tempat_lahir }}" />
                                                        </div>
                                                        <div class="mb-1 col-md-6">
                                                            <label class="form-label"
                                                                for="form_pribadi_istri_suami_tanggal_lahir">Tanggal
                                                                Lahir</label>
                                                            <input type="date"
                                                                id="form_pribadi_istri_suami_tanggal_lahir"
                                                                class="form-control flatpickr-basic"
                                                                name="form_pribadi_istri_suami_tanggal_lahir"
                                                                placeholder="DD-MM-YYYY"
                                                                value="{{ $pembiayaan->pemohon->form_pribadi_istri_suami_tanggal_lahir }}" />
                                                        </div>
                                                        <div class="mb-1 col-md-6">
                                                            <label class="form-label"
                                                                for="form_pribadi_istri_suami_npwp">No.
                                                                NPWP</label>
                                                            <input type="number" name="form_pribadi_istri_suami_npwp"
                                                                id="form_pribadi_istri_suami_npwp" class="form-control"
                                                                placeholder="Masukkan Nomor NPWP Pasangan Anda"
                                                                value="{{ $pembiayaan->pemohon->form_pribadi_istri_suami_npwp }}" />
                                                        </div>
                                                        <div class="mb-1 col-md-6">
                                                            <label class="form-label"
                                                                for="form_pribadi_istri_suami_pendidikan">Pendidikan</label>
                                                            <select class="select2 w-100"
                                                                name="form_pribadi_istri_suami_pendidikan"
                                                                id="form_pribadi_istri_suami_pendidikan">
                                                                <option label="pendidikanis" selected disabled>
                                                                    Pilih Pendidikan
                                                                </option>
                                                                <option value="sd">SD</option>
                                                                <option value="sltp">SLTP</option>
                                                                <option value="slta">SLTA</option>
                                                                <option value="d1">D1</option>
                                                                <option value="d2">D2</option>
                                                                <option value="d3">D3</option>
                                                                <option value="s1">S1</option>
                                                                <option value="s2">S2</option>
                                                                <option value="s3">S3</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex justify-content-between mt-3">
                                                        <button class="btn btn-primary btn-prev" type="button">
                                                            <i data-feather="arrow-left"
                                                                class="align-middle me-sm-25 me-0"></i>
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Previous</span>
                                                        </button>
                                                        <button class="btn btn-primary btn-next" type="button">
                                                            <span
                                                                class="align-middle d-sm-inline-block d-none">Next</span>
                                                            <i data-feather="arrow-right"
                                                                class="align-middle ms-sm-25 ms-0"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Form Data Pekerjaan -->

                                    <div id="formDataPekerjaan" class="content" role="tabpanel"
                                        aria-labelledby="pekerjaan-trigger">
                                        <div class="content-header">
                                            <h4 class="mb-0 mt-2">Data Pekerjaan</h4>
                                            <hr>
                                        </div>
                                        <div class="content-header">
                                            <h5 class="mb-0 mt-2">Pemohon PPR Syariah</h5>
                                            <small class="text-muted">Lengkapi Data Diri.</small>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pekerjaan_pemohon_nama"><small
                                                        class="text-danger">*
                                                    </small>Nama Perusahaan/Instansi</label>
                                                <input type="text" name="form_pekerjaan_pemohon_nama"
                                                    id="form_pekerjaan_pemohon_nama" class="form-control"
                                                    placeholder="Nama Perusahaan/Instansi"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_nama }}"
                                                    required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_pemohon_badan_hukum"><small
                                                        class="text-danger">*
                                                    </small>Badan Hukum Perusahaan</label>
                                                <select class="select2 w-100" name="form_pekerjaan_pemohon_badan_hukum"
                                                    id="form_pekerjaan_pemohon_badan_hukum" required>
                                                    <option label="form_pekerjaan_pemohon_badan_hukum" selected disabled>
                                                        Pilih
                                                        Badan Hukum Perusahaan
                                                    </option>
                                                    <option value="departemen">Departemen</option>
                                                    <option value="perusahaan_daerah">Perusahaan
                                                        Daerah
                                                    </option>
                                                    <option value="koperasi">Koperasi</option>
                                                    <option value="persero">Persero</option>
                                                    <option value="perusahaan_umum">Perusahaan Umum
                                                    </option>
                                                    <option value="perseroan_terbatas">Perseroan
                                                        Terbatas
                                                    </option>
                                                    <option value="commanditer_venotschap">Commanditer
                                                        Venotschap</option>
                                                    <option value="firma">FIRMA</option>
                                                    <option value="namloose_venotschap">Namloose
                                                        Venotschap</option>
                                                    <option value="usaha_dagang">Usaha Dagang</option>
                                                    <option value="yayasan">Yayasan</option>
                                                    <option value="lainnya_perorangan">Lainnya
                                                        Perorangan
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pekerjaan_pemohon_alamat"><small
                                                        class="text-danger">*
                                                    </small>Alamat Pekerjaan/Kantor</label>
                                                <textarea class="form-control" id="form_pekerjaan_pemohon_alamat" name="form_pekerjaan_pemohon_alamat"
                                                    rows="2" placeholder="Alamat Pekerjaan/Kantor"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_alamat }}" required></textarea>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_pemohon_alamat_kode_pos"><small
                                                        class="text-danger">*
                                                    </small>Kode Pos</label>
                                                <input type="number" name="form_pekerjaan_pemohon_alamat_kode_pos"
                                                    id="form_pekerjaan_pemohon_alamat_kode_pos" class="form-control"
                                                    placeholder="Kode Pos"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_alamat_kode_pos }}"
                                                    required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pekerjaan_pemohon_no_telp"><small
                                                        class="text-danger">*
                                                    </small>Nomor Telp. Kantor</label>
                                                <input type="number" name="form_pekerjaan_pemohon_no_telp"
                                                    id="form_pekerjaan_pemohon_no_telp" class="form-control"
                                                    placeholder="Masukkan Nomor Telepon Kantor"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_no_telp }}"
                                                    required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_pemohon_no_telp_extension">Pesawat/Extension</label>
                                                <input type="number" name="form_pekerjaan_pemohon_no_telp_extension"
                                                    id="form_pekerjaan_pemohon_no_telp_extension" class="form-control"
                                                    placeholder="Masukkan Nomor Pesawat/Extension"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_no_telp_extension }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pekerjaan_pemohon_facsimile">Nomor
                                                    Facsimile
                                                    Kantor</label>
                                                <input type="number" name="form_pekerjaan_pemohon_facsimile"
                                                    id="form_pekerjaan_pemohon_facsimile" class="form-control"
                                                    placeholder="Masukkan Nomor Nomor Facsimile Kantor"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_facsimile }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pekerjaan_pemohon_npwp">Nomor
                                                    NPWP
                                                    Perusahaan</label>
                                                <input type="number" name="form_pekerjaan_pemohon_npwp"
                                                    id="form_pekerjaan_pemohon_npwp" class="form-control"
                                                    placeholder="Nomor NPWP Perusahaan"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_npwp }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_pemohon_bidang_usaha"><small
                                                        class="text-danger">*
                                                    </small>Bidang Usaha Perusahaan</label>
                                                <select class="select2 w-100" name="form_pekerjaan_pemohon_bidang_usaha"
                                                    id="form_pekerjaan_pemohon_bidang_usaha" required>
                                                    <option label="form_pekerjaan_pemohon_bidang_usaha" selected disabled>
                                                        Pilih
                                                        Bidang Usaha Perusahaan</option>
                                                    <option value="1">Pertanian, Perburuan, dan
                                                        Sarana Pertanian</option>
                                                    <option value="2">Pertambangan</option>
                                                    <option value="3">Perindustrian</option>
                                                    <option value="4">Listrik, Gas, dan Air
                                                    </option>
                                                    <option value="5">Perdagangan, Restoran, dan
                                                        Hotel</option>
                                                    <option value="6">Pengangkutan, Pergudangan,
                                                        dan
                                                        Komunikasi</option>
                                                    <option value="7">Jasa-Jasa Dunia Usaha
                                                    </option>
                                                    <option value="8">Jasa-Jasa Sosial Masyarakat
                                                    </option>
                                                    <option value="9">Jasa-Jasa Keuangan dan
                                                        Perbankan</option>
                                                    <option value="lain_lain">Lain-Lain</option>

                                                    {{-- if Lain-Lain is selected then ... or add new option --}}

                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_pemohon_jenis_pekerjaan"><small
                                                        class="text-danger">*
                                                    </small>Jenis Pekerjaan</label>
                                                <select class="select2 w-100"
                                                    name="form_pekerjaan_pemohon_jenis_pekerjaan"
                                                    id="form_pekerjaan_pemohon_jenis_pekerjaan" required>
                                                    <option label="form_pekerjaan_pemohon_jenis_pekerjaan" selected
                                                        disabled>Pilih
                                                        Jenis Pekerjaan</option>
                                                    <option value="1">Akunting/Keuangan</option>
                                                    <option value="2">Customer Service</option>
                                                    <option value="3">Engineering</option>
                                                    <option value="4">Eksekutif</option>
                                                    <option value="5">Administrasi Umum</option>
                                                    <option value="6">Komputer</option>
                                                    <option value="7">Konsultan</option>
                                                    <option value="8">Marketing</option>
                                                    <option value="9">Pendidikan</option>
                                                    <option value="10">Pemerintahan</option>
                                                    <option value="11">Militer</option>
                                                    <option value="12">Pensiunan</option>
                                                    <option value="13">Pelajar/Mahasiswa</option>
                                                    <option value="14">Wiraswasta</option>
                                                    <option value="15">Profesional</option>
                                                    <option value="lain_lain">Lain-Lain</option>

                                                    {{-- if Lain-Lain is selected then ... or add new option --}}

                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_pemohon_jml_karyawan"><small
                                                        class="text-danger">*
                                                    </small>Jumlah Karyawan</label>
                                                <select class="select2 w-100" name="form_pekerjaan_pemohon_jml_karyawan"
                                                    id="form_pekerjaan_pemohon_jml_karyawan" required>
                                                    <option label="form_pekerjaan_pemohon_jml_karyawan" selected disabled>
                                                        Pilih
                                                        Jumlah Karyawan</option>
                                                    <option value="1">
                                                        <= 5 Karyawan</option>
                                                    <option value="2">6-30 Karyawan</option>
                                                    <option value="3">31-60 Karyawan</option>
                                                    <option value="4">61-100 Karyawan</option>
                                                    <option value="5">>100 Karyawan</option>
                                                </select>
                                            </div>

                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pekerjaan_pemohon_departemen"><small
                                                        class="text-danger">*
                                                    </small>Dept./Bagian/Divisi</label>
                                                <input type="text" name="form_pekerjaan_pemohon_departemen"
                                                    id="form_pekerjaan_pemohon_departemen" class="form-control"
                                                    placeholder="Dept./Bagian/Divisi"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_departemen }}"
                                                    required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_pemohon_pangkat_gol_jabatan"><small
                                                        class="text-danger">*
                                                    </small>Pangkat/Gol. Dan Jabatan</label>
                                                <input type="text" name="form_pekerjaan_pemohon_pangkat_gol_jabatan"
                                                    id="form_pekerjaan_pemohon_pangkat_gol_jabatan" class="form-control"
                                                    placeholder="Pangkat/Gol. Dan Jabatan"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_pangkat_gol_jabatan }}"
                                                    required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pekerjaan_pemohon_nip_nrp"><small
                                                        class="text-danger">*
                                                    </small>NIP/NRP</label>
                                                <input type="number" name="form_pekerjaan_pemohon_nip_nrp"
                                                    id="form_pekerjaan_pemohon_nip_nrp" class="form-control"
                                                    placeholder="NIP/NRP"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_nip_nrp }}"
                                                    required />
                                            </div>

                                            <div class="mb-1 col-md-12">
                                                <div data-repeater-list="form_pekerjaan_pemohon_mulai_bekerja">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-auto col-md-4">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_pekerjaan_pemohon_mulai_bekerja"><small
                                                                            class="text-danger">*
                                                                        </small>Mulai Bekerja</label>
                                                                    <input type="date"
                                                                        class="form-control flatpickr-basic"
                                                                        id="form_pekerjaan_pemohon_mulai_bekerja"
                                                                        name="form_pekerjaan_pemohon_mulai_bekerja"
                                                                        aria-describedby="form_pekerjaan_pemohon_mulai_bekerja"
                                                                        placeholder="DD-MM-YYYY"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_mulai_bekerja }}"
                                                                        required />
                                                                </div>
                                                            </div>

                                                            <div class="row col-auto" style="margin-bottom: 15px;">
                                                                <div class="col-auto">
                                                                    <label class="form-label"
                                                                        for="form_pekerjaan_pemohon_usia_pensiun"><small
                                                                            class="text-danger">*
                                                                        </small>Usia Pensiun</label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_pekerjaan_pemohon_usia_pensiun"
                                                                        id="form_pekerjaan_pemohon_usia_pensiun"
                                                                        aria-describedby="form_pekerjaan_pemohon_usia_pensiun"
                                                                        placeholder="Usia Pensiun"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_usia_pensiun }}"
                                                                        required />
                                                                </div>
                                                                <div class="col-auto" style="margin-top: 32px;">
                                                                    <span class="form-text-beside">Tahun</span>
                                                                </div>
                                                            </div>

                                                            <div class="row col-auto" style="margin-bottom: 15px;">
                                                                <div class="col-auto">
                                                                    <label class="form-label"
                                                                        for="form_pekerjaan_pemohon_masa_kerja"><small
                                                                            class="text-danger">*
                                                                        </small>Masa Kerja
                                                                        (termasuk sebelumnya)</label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_pekerjaan_pemohon_masa_kerja"
                                                                        id="form_pekerjaan_pemohon_masa_kerja"
                                                                        aria-describedby="form_pekerjaan_pemohon_masa_kerja"
                                                                        placeholder="Masa Kerja"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_masa_kerja }}"
                                                                        required />
                                                                </div>
                                                                <div class="col-auto" style="margin-top: 32px;">
                                                                    <span class="form-text-beside">Tahun</span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_pemohon_nama_atasan_langsung"><small
                                                        class="text-danger">*
                                                    </small>Nama Atasan Langsung</label>
                                                <input type="text" name="form_pekerjaan_pemohon_nama_atasan_langsung"
                                                    id="form_pekerjaan_pemohon_nama_atasan_langsung"
                                                    class="form-control" placeholder="Nama Atasan Langsung"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_nama_atasan_langsung }}"
                                                    required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_pemohon_no_telp_atasan_langsung"><small
                                                        class="text-danger">*
                                                    </small>Nomor Telp. Atasan Langsung</label>
                                                <input type="number"
                                                    name="form_pekerjaan_pemohon_no_telp_atasan_langsung"
                                                    id="form_pekerjaan_pemohon_no_telp_atasan_langsung"
                                                    class="form-control"
                                                    placeholder="Masukkan Nomor Telp. Atasan Langsung"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_no_telp_atasan_langsung }}"
                                                    required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_pemohon_no_telp_atasan_langsung_extension">Pesawat/Extension</label>
                                                <input type="number"
                                                    name="form_pekerjaan_pemohon_no_telp_atasan_langsung_extension"
                                                    id="form_pekerjaan_pemohon_no_telp_atasan_langsung_extension"
                                                    class="form-control" placeholder="Masukkan Nomor Pesawat/Extension"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_no_telp_atasan_langsung_extension }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_pemohon_grup_afiliasi">Group
                                                    Afiliasi Perusahaan</label>
                                                <input type="text" name="form_pekerjaan_pemohon_grup_afiliasi"
                                                    id="form_pekerjaan_pemohon_grup_afiliasi" class="form-control"
                                                    placeholder="Group Afiliasi Perusahaan"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_grup_afiliasi }}" />
                                            </div>

                                            <div class="mb-1 col-md-12">
                                                <div
                                                    data-repeater-list="form_pekerjaan_pemohon_pengalaman_kerja_terakhir">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <h6>Pengalaman
                                                                Kerja
                                                                Terakhir</h6>
                                                            <div class="col-md-4 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan">Perusahaan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan"
                                                                        id="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan"
                                                                        aria-describedby="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan"
                                                                        placeholder="Nama Perusahaan"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan">Jabatan</label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan"
                                                                        id="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan"
                                                                        aria-describedby="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan"
                                                                        placeholder="Jabatan"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun">Lama
                                                                        Kerja</label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun"
                                                                        id="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun"
                                                                        aria-describedby="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun"
                                                                        placeholder="Tahun"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <input type="number" class="form-control"
                                                                        name="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan"
                                                                        id="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan"
                                                                        aria-describedby="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan"
                                                                        placeholder="Bulan"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Istri/Suami pemohon --}}
                                        <div class="content-header" id="ifISMHeader">
                                            <h5 class="mb-0 mt-2">Istri/Suami Pemohon PPR Syariah</h5>
                                            <small class="text-muted">Lengkapi Data Diri.</small>
                                        </div>
                                        <div class="row" id="ifISM">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pekerjaan_istri_suami_nama"><small
                                                        class="text-danger">*
                                                    </small>Nama Perusahaan/Instansi</label>
                                                <input type="text" name="form_pekerjaan_istri_suami_nama"
                                                    id="form_pekerjaan_istri_suami_nama" class="form-control"
                                                    placeholder="Nama Perusahaan/Instansi"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_nama }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_badan_hukum"><small
                                                        class="text-danger">*
                                                    </small>Badan Hukum Perusahaan</label>
                                                <select class="select2 w-100"
                                                    name="form_pekerjaan_istri_suami_badan_hukum"
                                                    id="form_pekerjaan_istri_suami_badan_hukum">
                                                    <option label="form_pekerjaan_istri_suami_badan_hukum"
                                                        selected_disabled>Pilih
                                                        Badan Hukum
                                                        Perusahaan</option>
                                                    <option value="departemen">Departemen</option>
                                                    <option value="perusahaan_daerah">Perusahaan
                                                        Daerah
                                                    </option>
                                                    <option value="koperasi">Koperasi</option>
                                                    <option value="persero">Persero</option>
                                                    <option value="perusahaan_umum">Perusahaan Umum
                                                    </option>
                                                    <option value="perseroan_terbatas">Perseroan
                                                        Terbatas
                                                    </option>
                                                    <option value="commanditer_venotschap">Commanditer
                                                        Venotschap</option>
                                                    <option value="firma">FIRMA</option>
                                                    <option value="namloose_venotschap">Namloose
                                                        Venotschap</option>
                                                    <option value="usaha_dagang">Usaha Dagang</option>
                                                    <option value="yayasan">Yayasan</option>
                                                    <option value="lainnya_perorangan">Lainnya
                                                        Perorangan
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pekerjaan_istri_suami_alamat"><small
                                                        class="text-danger">*
                                                    </small>Alamat Pekerjaan/Kantor</label>
                                                <textarea class="form-control" name="form_pekerjaan_istri_suami_alamat" id="form_pekerjaan_istri_suami_alamat"
                                                    rows="2" placeholder="Alamat Pekerjaan/Kantor"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_alamat }}"></textarea>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_alamat_kode_pos"><small
                                                        class="text-danger">*
                                                    </small>Kode Pos</label>
                                                <input type="number" name="form_pekerjaan_istri_suami_alamat_kode_pos"
                                                    id="form_pekerjaan_istri_suami_alamat_kode_pos" class="form-control"
                                                    placeholder="Kode Pos"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_alamat_kode_pos }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_no_telp"><small
                                                        class="text-danger">*
                                                    </small>Nomor Telp. Kantor</label>
                                                <input type="number" name="form_pekerjaan_istri_suami_no_telp"
                                                    id="form_pekerjaan_istri_suami_no_telp" class="form-control"
                                                    placeholder="Masukkan Nomor Telepon Kantor"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_no_telp }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_no_telp_extension">Pesawat/Extension</label>
                                                <input type="number"
                                                    name="form_pekerjaan_istri_suami_no_telp_extension"
                                                    id="form_pekerjaan_istri_suami_no_telp_extension"
                                                    class="form-control" placeholder="Masukkan Nomor Pesawat/Extension"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_no_telp_extension }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_facsimile">Nomor
                                                    Facsimile Kantor</label>
                                                <input type="number" name="form_pekerjaan_istri_suami_facsimile"
                                                    id="form_pekerjaan_istri_suami_facsimile" class="form-control"
                                                    placeholder="Masukkan Nomor Nomor Facsimile Kantor"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_facsimile }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pekerjaan_istri_suami_npwp">Nomor
                                                    NPWP
                                                    Perusahaan</label>
                                                <input type="number" name="form_pekerjaan_istri_suami_npwp"
                                                    id="form_pekerjaan_istri_suami_npwp" class="form-control"
                                                    placeholder="Nomor NPWP Perusahaan"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_npwp }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_bidang_usaha"><small
                                                        class="text-danger">*
                                                    </small>Bidang Usaha Perusahaan</label>
                                                <select class="select2 w-100"
                                                    name="form_pekerjaan_istri_suami_bidang_usaha"
                                                    id="form_pekerjaan_istri_suami_bidang_usaha">
                                                    <option label="form_pekerjaan_istri_suami_bidang_usaha" selected
                                                        disabled>
                                                        Pilih Bidang Usaha
                                                        Perusahaan</option>
                                                    <option value="1">Pertanian, Perburuan, dan
                                                        Sarana Pertanian</option>
                                                    <option value="2">Pertambangan</option>
                                                    <option value="3">Perindustrian</option>
                                                    <option value="4">Listrik, Gas, dan Air
                                                    </option>
                                                    <option value="5">Perdagangan, Restoran, dan
                                                        Hotel</option>
                                                    <option value="6">Pengangkutan, Pergudangan,
                                                        dan
                                                        Komunikasi</option>
                                                    <option value="7">Jasa-Jasa Dunia Usaha
                                                    </option>
                                                    <option value="8">Jasa-Jasa Sosial Masyarakat
                                                    </option>
                                                    <option value="9">Jasa-Jasa Keuangan dan
                                                        Perbankan</option>
                                                    <option value="lain_lain">Lain-Lain</option>


                                                    {{-- if Lain-Lain is selected then ... or add new option --}}

                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_jenis_pekerjaan"><small
                                                        class="text-danger">*
                                                    </small>Jenis Pekerjaan</label>
                                                <select class="select2 w-100"
                                                    name="form_pekerjaan_istri_suami_jenis_pekerjaan"
                                                    id="form_pekerjaan_istri_suami_jenis_pekerjaan">
                                                    <option label="form_pekerjaan_istri_suami_jenis_pekerjaan" selected
                                                        disabled>
                                                        Pilih Jenis
                                                        Pekerjaan</option>
                                                    <option value="1">Akunting/Keuangan</option>
                                                    <option value="2">Customer Service</option>
                                                    <option value="3">Engineering</option>
                                                    <option value="4">Eksekutif</option>
                                                    <option value="5">Administrasi Umum</option>
                                                    <option value="6">Komputer</option>
                                                    <option value="7">Konsultan</option>
                                                    <option value="8">Marketing</option>
                                                    <option value="9">Pendidikan</option>
                                                    <option value="10">Pemerintahan</option>
                                                    <option value="11">Militer</option>
                                                    <option value="12">Pensiunan</option>
                                                    <option value="13">Pelajar/Mahasiswa</option>
                                                    <option value="14">Wiraswasta</option>
                                                    <option value="15">Profesional</option>
                                                    <option value="lain_lain">Lain-Lain</option>

                                                    {{-- if Lain-Lain is selected then ... or add new option --}}

                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_jml_karyawan"><small
                                                        class="text-danger">*
                                                    </small>Jumlah Karyawan</label>
                                                <select class="select2 w-100"
                                                    name="form_pekerjaan_istri_suami_jml_karyawan"
                                                    id="form_pekerjaan_istri_suami_jml_karyawan">
                                                    <option label="form_pekerjaan_istri_suami_jml_karyawan" selected
                                                        disabled>
                                                        Pilih Jumlah Karyawan
                                                    </option>
                                                    <option value="1">
                                                        <= 5 Karyawan</option>
                                                    <option value="2">6-30 Karyawan</option>
                                                    <option value="3">31-60 Karyawan</option>
                                                    <option value="4">61-100 Karyawan</option>
                                                    <option value="5">>100 Karyawan</option>
                                                </select>
                                            </div>

                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_departemen"><small
                                                        class="text-danger">*
                                                    </small>Dept./Bagian/Divisi</label>
                                                <input type="text" name="form_pekerjaan_istri_suami_departemen"
                                                    id="form_pekerjaan_istri_suami_departemen" class="form-control"
                                                    placeholder="Dept./Bagian/Divisi"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_departemen }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_pangkat_gol_jabatan"><small
                                                        class="text-danger">*
                                                    </small>Pangkat/Gol. Dan Jabatan</label>
                                                <input type="text"
                                                    name="form_pekerjaan_istri_suami_pangkat_gol_jabatan"
                                                    id="form_pekerjaan_istri_suami_pangkat_gol_jabatan"
                                                    class="form-control" placeholder="Pangkat/Gol. Dan Jabatan"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_pangkat_gol_jabatan }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_nip_nrp"><small
                                                        class="text-danger">*
                                                    </small>NIP/NRP</label>
                                                <input type="number" name="form_pekerjaan_istri_suami_nip_nrp"
                                                    id="form_pekerjaan_istri_suami_nip_nrp" class="form-control"
                                                    placeholder="NIP/NRP"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_nip_nrp }}" />
                                            </div>

                                            <div class="mb-1 col-md-12">
                                                <div data-repeater-list="form_pekerjaan_istri_suami_mulai_bekerja">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-4 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_pekerjaan_istri_suami_mulai_bekerja"><small
                                                                            class="text-danger">*
                                                                        </small>Mulai Bekerja</label>
                                                                    <input type="date"
                                                                        class="form-control flatpickr-basic"
                                                                        name="form_pekerjaan_istri_suami_mulai_bekerja"
                                                                        id="form_pekerjaan_istri_suami_mulai_bekerja"
                                                                        aria-describedby="form_pekerjaan_istri_suami_mulai_bekerja"
                                                                        placeholder="DD-MM-YYYY"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_mulai_bekerja }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_pekerjaan_istri_suami_usia_pensiun"><small
                                                                            class="text-danger">*
                                                                        </small>Usia
                                                                        Pensiun</label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_pekerjaan_istri_suami_usia_pensiun"
                                                                        id="form_pekerjaan_istri_suami_usia_pensiun"
                                                                        aria-describedby="form_pekerjaan_istri_suami_usia_pensiun"
                                                                        placeholder="Usia Pensiun"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_usia_pensiun }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_pekerjaan_istri_suami_masa_kerja"><small
                                                                            class="text-danger">*
                                                                        </small>Masa Kerja
                                                                        (termasuk sebelumnya)</label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_pekerjaan_istri_suami_masa_kerja"
                                                                        id="form_pekerjaan_istri_suami_masa_kerja"
                                                                        aria-describedby="form_pekerjaan_istri_suami_masa_kerja"
                                                                        placeholder="Masa Kerja"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_masa_kerja }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_nama_atasan_langsung"><small
                                                        class="text-danger">*
                                                    </small>Nama Atasan Langsung</label>
                                                <input type="text"
                                                    name="form_pekerjaan_istri_suami_nama_atasan_langsung"
                                                    id="form_pekerjaan_istri_suami_nama_atasan_langsung"
                                                    class="form-control" placeholder="Nama Atasan Langsung"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_nama_atasan_langsung }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_no_telp_atasan_langsung"><small
                                                        class="text-danger">*
                                                    </small>Nomor Telp. Atasan Langsung</label>
                                                <input type="number"
                                                    name="form_pekerjaan_istri_suami_no_telp_atasan_langsung"
                                                    id="form_pekerjaan_istri_suami_no_telp_atasan_langsung"
                                                    class="form-control"
                                                    placeholder="Masukkan Nomor Telp. Atasan Langsung"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_no_telp_atasan_langsung }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_no_telp_atasan_langsung_extension">Pesawat/Extension</label>
                                                <input type="number"
                                                    name="form_pekerjaan_istri_suami_no_telp_atasan_langsung_extension"
                                                    id="form_pekerjaan_istri_suami_no_telp_atasan_langsung_extension"
                                                    class="form-control" placeholder="Masukkan Nomor Pesawat/Extension"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_no_telp_atasan_langsung_extension }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_grup_afiliasi">Group
                                                    Afiliasi Perusahaan</label>
                                                <input type="text" name="form_pekerjaan_istri_suami_grup_afiliasi"
                                                    id="form_pekerjaan_istri_suami_grup_afiliasi" class="form-control"
                                                    placeholder="Group Afiliasi Perusahaan"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_grup_afiliasi }}" />
                                            </div>

                                            <div class="row d-flex align-items-end">
                                                <h6>Pengalaman
                                                    Kerja Terakhir</h6>
                                                <div class="col-md-4 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label"
                                                            for="form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_perusahaan">Perusahaan</label>
                                                        <input type="text" class="form-control"
                                                            name="form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_perusahaan"
                                                            id="form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_perusahaan"
                                                            aria-describedby="form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_perusahaan"
                                                            placeholder="Nama Perusahaan"
                                                            value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_perusahaan }}" />
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label"
                                                            for="form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_jabatan">Jabatan</label>
                                                        <input type="number" class="form-control"
                                                            name="form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_jabatan"
                                                            id="form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_jabatan"
                                                            aria-describedby="form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_jabatan"
                                                            placeholder="Jabatan"
                                                            value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_jabatan }}" />
                                                    </div>
                                                </div>

                                                <div class="col-md-1 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label"
                                                            for="form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_tahun">Lama
                                                            Kerja</label>
                                                        <input type="number" class="form-control"
                                                            name="form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_tahun"
                                                            id="form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_tahun"
                                                            aria-describedby="form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_tahun"
                                                            placeholder="Tahun"
                                                            value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_tahun }}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-1 col-12">
                                                    <div class="mb-1">
                                                        <input type="number" class="form-control"
                                                            name="form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_bulan"
                                                            id="form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_bulan"
                                                            aria-describedby="form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_bulan"
                                                            placeholder="Bulan"
                                                            value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_bulan }}" />
                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                        <div class="d-flex justify-content-between mt-3">
                                            <button class="btn btn-primary btn-prev" type="button">
                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next" type="button">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                            </button>
                                        </div>
                                    </div>


                                    <!-- Form Data Penghasilan dan Pengeluaran-->

                                    <div id="formDataPenghasilanPengeluaran" class="content" role="tabpanel"
                                        aria-labelledby="penghasilan-trigger">
                                        <div class="content-header">
                                            <h4 class="mb-0 mt-2">Data Penghasilan dan Pengeluaran per
                                                Bulan</h4>
                                            <hr>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_penghasilan_utama_pemohon"><small
                                                        class="text-danger">*
                                                    </small>1. Penghasilan Utama Pemohon</label>
                                                <input type="number"
                                                    name="form_penghasilan_pengeluaran_penghasilan_utama_pemohon"
                                                    id="form_penghasilan_pengeluaran_penghasilan_utama_pemohon"
                                                    class="form-control numeral-mask1"
                                                    placeholder="Masukkan Penghasilan Utama Pemohon"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_penghasilan_utama_pemohon }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga"><small
                                                        class="text-danger">*
                                                    </small>6. Biaya Hidup Rutin Keluarga</label>
                                                <input type="text"
                                                    name="form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga"
                                                    id="form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga"
                                                    class="form-control numeral-mask2"
                                                    placeholder="Masukkan Biaya Hidup Rutin Keluarga"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_penghasilan_lain_pemohon"><small
                                                        class="text-danger">*
                                                    </small>2. Penghasilan Lain-Lain Pemohon</label>
                                                <input type="number"
                                                    name="form_penghasilan_pengeluaran_penghasilan_lain_pemohon"
                                                    id="form_penghasilan_pengeluaran_penghasilan_lain_pemohon"
                                                    class="form-control"
                                                    placeholder="Masukkan Penghasilan Lain-Lain Pemohon"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_penghasilan_lain_pemohon }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_kewajiban_angsuran"><small
                                                        class="text-danger">*
                                                    </small>7. Kewajiban Angsuran <i>(Meliputi Total
                                                        Kewajiban
                                                        Angsuran/Bulan
                                                        atas
                                                        Pinjaman pada Bank atau
                                                        Pihak Lain)</i></label>
                                                <input type="number"
                                                    name="form_penghasilan_pengeluaran_kewajiban_angsuran"
                                                    id="form_penghasilan_pengeluaran_kewajiban_angsuran"
                                                    class="form-control" placeholder="Masukkan Kewajiban Angsuran"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_kewajiban_angsuran }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_penghasilan_utama_istri_suami"><small
                                                        class="text-danger">*
                                                    </small>3. Penghasilan Utama Istri/Suami</label>
                                                <input type="number"
                                                    name="form_penghasilan_pengeluaran_penghasilan_utama_istri_suami"
                                                    id="form_penghasilan_pengeluaran_penghasilan_utama_istri_suami"
                                                    class="form-control"
                                                    placeholder="Masukkan Penghasilan Utama Istri/Suami"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_penghasilan_utama_istri_suami }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_total_pengeluaran"><small
                                                        class="text-danger">*
                                                    </small>8. Total Pengeluaran (6+7)</label>
                                                <input type="number"
                                                    name="form_penghasilan_pengeluaran_total_pengeluaran"
                                                    id="form_penghasilan_pengeluaran_total_pengeluaran"
                                                    class="form-control" placeholder="Masukkan Total Pengeluaran"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_total_pengeluaran }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_penghasilan_lain_istri_suami"><small
                                                        class="text-danger">*
                                                    </small>4. Penghasilan Lain-Lain Istri/Suami</label>
                                                <input type="number"
                                                    name="form_penghasilan_pengeluaran_penghasilan_lain_istri_suami"
                                                    id="form_penghasilan_pengeluaran_penghasilan_lain_istri_suami"
                                                    class="form-control"
                                                    placeholder="Masukkan Penghasilan Lain-Lain Istri/Suami"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_penghasilan_lain_istri_suami }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_sisa_penghasilan"><small
                                                        class="text-danger">*
                                                    </small>9. Sisa Penghasilan (5-8)</label>
                                                <input type="number"
                                                    name="form_penghasilan_pengeluaran_sisa_penghasilan"
                                                    id="form_penghasilan_pengeluaran_sisa_penghasilan"
                                                    class="form-control" placeholder="Masukkan Sisa Penghasilan"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_sisa_penghasilan }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_total_penghasilan"><small
                                                        class="text-danger">*
                                                    </small>5. Total Penghasilan (1+2+3+4)</label>
                                                <input type="number"
                                                    name="form_penghasilan_pengeluaran_total_penghasilan"
                                                    id="form_penghasilan_pengeluaran_total_penghasilan"
                                                    class="form-control" placeholder="Masukkan Total Penghasilan"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_total_penghasilan }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_kemampuan_mengangsur"><small
                                                        class="text-danger">*
                                                    </small>10. Kemampuan Mengangsur</label>
                                                <input type="number"
                                                    name="form_penghasilan_pengeluaran_kemampuan_mengangsur"
                                                    id="form_penghasilan_pengeluaran_kemampuan_mengangsur"
                                                    class="form-control" placeholder="Masukkan Kemampuan Mengangsur"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_kemampuan_mengangsur }}" />
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between mt-3">
                                            <button class="btn btn-primary btn-prev">
                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Form Data Agunan -->

                                    <div id="formDataAgunan" class="content" role="tabpanel"
                                        aria-labelledby="agunan-trigger">
                                        <div class="content-header">
                                            <h4 class="mb-0 mt-2">Data Agunan</h4>
                                            <hr>
                                        </div>

                                        <!-- Agunan I-->
                                        <div class="content-header">
                                            <h5 class="mb-0 mt-2">Agunan I</h5>
                                            <small class="text-muted">Lengkapi Data Agunan I.</small>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_1_jenis"><small
                                                        class="text-danger">*
                                                    </small>Jenis Agunan</label>
                                                <select class="select2 w-100" name="form_agunan_1_jenis"
                                                    id="form_agunan_1_jenis">
                                                    <option label="form_agunan_1_jenis">Pilih Jenis
                                                        Agunan
                                                    </option>
                                                    <option value="1">Tanah</option>
                                                    <option value="2">Rumah Tinggal</option>
                                                    <option value="3">Apartemen</option>
                                                    <option value="4">Rusun</option>
                                                    <option value="5">Ruko</option>
                                                    <option value="6">Rukan</option>
                                                    <option value="7">Kios</option>
                                                    <option value="lain_lain">Lain-Lain</option>

                                                    {{-- if Lain-Lain is selected then create new option --}}

                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_1_nilai_harga_jual"><small
                                                        class="text-danger">*
                                                    </small>Nilai/Harga Jual (Harga Jual merupakan Harga
                                                    Transaksi/Harga
                                                    Jual
                                                    Setelah Discount)</label>
                                                <input type="number" name="form_agunan_1_nilai_harga_jual"
                                                    id="form_agunan_1_nilai_harga_jual" class="form-control"
                                                    placeholder="Masukkan Nilai/Harga Jual"
                                                    value="{{ $pembiayaan->agunan->form_agunan_1_nilai_harga_jual }}" />
                                            </div>

                                            <div class="mb-1 col-md-12">
                                                <div data-repeater-list="form_agunan_1_alamat">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-4 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_agunan_1_alamat"><small
                                                                            class="text-danger">*
                                                                        </small>Alamat/Lokasi
                                                                        Agunan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="form_agunan_1_alamat"
                                                                        id="form_agunan_1_alamat"
                                                                        aria-describedby="form_agunan_1_alamat"
                                                                        placeholder="Alamat/Lokasi Agunan"
                                                                        value="{{ $pembiayaan->agunan->form_agunan_1_alamat }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_agunan_1_alamat_rt"><small
                                                                            class="text-danger">*
                                                                        </small>RT</label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_agunan_1_alamat_rt"
                                                                        id="form_agunan_1_alamat_rt"
                                                                        aria-describedby="form_agunan_1_alamat_rt"
                                                                        placeholder="RT"
                                                                        value="{{ $pembiayaan->agunan->form_agunan_1_alamat_rt }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_agunan_1_alamat_rw"><small
                                                                            class="text-danger">*
                                                                        </small>RW</label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_agunan_1_alamat_rw"
                                                                        id="form_agunan_1_alamat_rw"
                                                                        aria-describedby="form_agunan_1_alamat_rw"
                                                                        placeholder="RW"
                                                                        value="{{ $pembiayaan->agunan->form_agunan_1_alamat_rw }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_agunan_1_alamat_kelurahan"><small
                                                                            class="text-danger">*
                                                                        </small>Kelurahan</label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_agunan_1_alamat_kelurahan"
                                                                        id="form_agunan_1_alamat_kelurahan"
                                                                        aria-describedby="form_agunan_1_alamat_kelurahan"
                                                                        placeholder="Kelurahan"
                                                                        value="{{ $pembiayaan->agunan->form_agunan_1_alamat_kelurahan }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_agunan_1_alamat_kecamatan"><small
                                                                            class="text-danger">*
                                                                        </small>Kecamatan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="form_agunan_1_alamat_kecamatan"
                                                                        id="form_agunan_1_alamat_kecamatan"
                                                                        aria-describedby="form_agunan_1_alamat_kecamatan"
                                                                        placeholder="Kecamatan"
                                                                        value="{{ $pembiayaan->agunan->form_agunan_1_alamat_kecamatan }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_agunan_1_alamat_dati2"><small
                                                                            class="text-danger">*
                                                                        </small>Dati
                                                                        2</label>
                                                                    <input type="text" class="form-control"
                                                                        name="form_agunan_1_alamat_dati2"
                                                                        id="form_agunan_1_alamat_dati2"
                                                                        aria-describedby="form_agunan_1_alamat_dati2"
                                                                        placeholder="Dati 2"
                                                                        value="{{ $pembiayaan->agunan->form_agunan_1_alamat_dati2 }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_agunan_1_alamat_provinsi"><small
                                                                            class="text-danger">*
                                                                        </small>Provinsi</label>
                                                                    <input type="text" class="form-control"
                                                                        name="form_agunan_1_alamat_provinsi"
                                                                        id="form_agunan_1_alamat_provinsi"
                                                                        aria-describedby="form_agunan_1_alamat_provinsi"
                                                                        placeholder="Provinsi"
                                                                        value="{{ $pembiayaan->agunan->form_agunan_1_alamat_provinsi }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_agunan_1_alamat_kode_pos"><small
                                                                            class="text-danger">*
                                                                        </small>Kode
                                                                        Pos</label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_agunan_1_alamat_kode_pos"
                                                                        id="form_agunan_1_alamat_kode_pos"
                                                                        aria-describedby="form_agunan_1_alamat_kode_pos"
                                                                        placeholder="16XXXX"
                                                                        value="{{ $pembiayaan->agunan->form_agunan_1_alamat_kode_pos }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-1 col-md-12">
                                                <div data-repeater-list="form_agunan_1_status_bukti_kepemilikan">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="mb-1 col-md-3">
                                                                <label class="form-label"
                                                                    for="form_agunan_1_status_bukti_kepemilikan"><small
                                                                        class="text-danger">*
                                                                    </small>Status/Bukti
                                                                    Kepemilikan</label>
                                                                <select class="select2 w-100"
                                                                    name="form_agunan_1_status_bukti_kepemilikan"
                                                                    id="form_agunan_1_status_bukti_kepemilikan">
                                                                    <option
                                                                        label="form_agunan_1_status_bukti_kepemilikan">
                                                                        Pilih
                                                                        Bukti Kepemilikan
                                                                    </option>
                                                                    <option value="shm">SHM
                                                                    </option>
                                                                    <option value="shgb">SHGB
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-1 col-md-3">
                                                                <label class="form-label"
                                                                    for="form_agunan_1_status_bukti_kepemilikan_tgl_berakhir"><small
                                                                        class="text-danger">*
                                                                    </small>Tanggal Berakhir</label>
                                                                <input type="date"
                                                                    id="form_agunan_1_status_bukti_kepemilikan_tgl_berakhir"
                                                                    class="form-control flatpickr-basic"
                                                                    name="form_agunan_1_status_bukti_kepemilikan_tgl_berakhir"
                                                                    placeholder="DD-MM-YYYY"
                                                                    value="{{ $pembiayaan->agunan->form_agunan_1_status_bukti_kepemilikan_tgl_berakhir }}" />
                                                            </div>

                                                            <div class="mb-1 col-md-3">
                                                                <label class="form-label"
                                                                    for="form_agunan_1_status_bukti_kepemilikan_hak"><small
                                                                        class="text-danger">*
                                                                    </small>Hak</label>
                                                                <select class="select2 w-100"
                                                                    name="form_agunan_1_status_bukti_kepemilikan_hak"
                                                                    id="form_agunan_1_status_bukti_kepemilikan_hak">
                                                                    <option
                                                                        label="form_agunan_1_status_bukti_kepemilikan_hak">
                                                                        Pilih Bukti Kepemilikan
                                                                    </option>
                                                                    <option value="hak_pakai">Hak
                                                                        Pakai
                                                                    </option>
                                                                    <option value="hpl">HPL
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_1_no_sertifikat"><small
                                                        class="text-danger">*
                                                    </small>Nomor Sertifikat</label>
                                                <input type="number" name="form_agunan_1_no_sertifikat"
                                                    id="form_agunan_1_no_sertifikat" class="form-control"
                                                    placeholder="Masukkan Nomor Sertifikat"
                                                    value="{{ $pembiayaan->agunan->form_agunan_1_no_sertifikat }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_agunan_1_no_sertifikat_tgl_penerbitan"><small
                                                        class="text-danger">*
                                                    </small>Tanggal Penerbitan</label>
                                                <input type="date" id="form_agunan_1_no_sertifikat_tgl_penerbitan"
                                                    class="form-control flatpickr-basic"
                                                    name="form_agunan_1_no_sertifikat_tgl_penerbitan"
                                                    placeholder="DD-MM-YYYY"
                                                    value="{{ $pembiayaan->agunan->form_agunan_1_no_sertifikat_tgl_penerbitan }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_1_no_imb"><small
                                                        class="text-danger">*
                                                    </small>Nomor IMB</label>
                                                <input type="number" name="form_agunan_1_no_imb"
                                                    id="form_agunan_1_no_imb" class="form-control"
                                                    placeholder="Masukkan Nomor IMB"
                                                    value="{{ $pembiayaan->agunan->form_agunan_1_no_imb }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_1_peruntukan_bangunan"><small
                                                        class="text-danger">*
                                                    </small>Peruntukan Bangunan</label>
                                                <input type="text" name="form_agunan_1_peruntukan_bangunan"
                                                    id="form_agunan_1_peruntukan_bangunan" class="form-control"
                                                    placeholder="Masukkan Peruntukan Bangunan"
                                                    value="{{ $pembiayaan->agunan->form_agunan_1_peruntukan_bangunan }}" />
                                            </div>
                                            <div class="mb-1 col-md-12">
                                                <div data-repeater-list="form_agunan_1_status_bukti_kepemilikan">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="mb-1 col-md-6">
                                                                <label class="form-label"
                                                                    for="form_agunan_1_luas_tanah"><small
                                                                        class="text-danger">*
                                                                    </small>Luas Tanah</label>
                                                                <input type="number" name="form_agunan_1_luas_tanah"
                                                                    id="form_agunan_1_luas_tanah" class="form-control"
                                                                    placeholder="Masukkan Luas Tanah"
                                                                    value="{{ $pembiayaan->agunan->form_agunan_1_status_bukti_kepemilikan }}" />

                                                            </div>
                                                            <div class="mb-1 col-md-6">
                                                                <label class="form-label"
                                                                    for="form_agunan_1_luas_bangunan"><small
                                                                        class="text-danger">*
                                                                    </small>Luas Bangunan</label>
                                                                <input type="number" name="form_agunan_1_luas_bangunan"
                                                                    id="form_agunan_1_luas_bangunan"
                                                                    class="form-control"
                                                                    placeholder="Masukkan Luas Bangunan"
                                                                    value="{{ $pembiayaan->agunan->form_agunan_1_luas_bangunan }}" />
                                                            </div>

                                                            <div class="mb-1 col-md-6">
                                                                <label class="form-label"
                                                                    for="form_agunan_1_atas_nama"><small
                                                                        class="text-danger">*
                                                                    </small>Atas Nama</label>
                                                                <input type="text" name="form_agunan_1_atas_nama"
                                                                    id="form_agunan_1_atas_nama" class="form-control"
                                                                    placeholder="Atas Nama"
                                                                    value="{{ $pembiayaan->agunan->form_agunan_1_atas_nama }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_1_nama_pengembang">Nama
                                                    Pengembang</label>
                                                <input type="text" name="form_agunan_1_nama_pengembang"
                                                    id="form_agunan_1_nama_pengembang" class="form-control"
                                                    placeholder="Masukkan Nama Pengembang"
                                                    value="{{ $pembiayaan->agunan->form_agunan_1_nama_pengembang }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_1_nama_proyek_perumahan">Nama
                                                    Proyek
                                                    Perumahan</label>
                                                <input type="text" name="form_agunan_1_nama_proyek_perumahan"
                                                    id="form_agunan_1_nama_proyek_perumahan" class="form-control"
                                                    placeholder="Masukkan Nama Proyek Perumahan"
                                                    value="{{ $pembiayaan->agunan->form_agunan_1_nama_proyek_perumahan }}" />
                                            </div>
                                        </div>

                                        <!-- Agunan II-->
                                        <div class="content-header">
                                            <h5 class="mb-0 mt-2">Agunan II</h5>
                                            <small class="text-muted">Lengkapi Data Agunan II.</small>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_2_jenis">Jenis
                                                    Agunan</label>
                                                <select class="select2 w-100" name="form_agunan_2_jenis"
                                                    id="form_agunan_2_jenis">
                                                    <option label="form_agunan_2_jenis">Pilih Jenis
                                                        Agunan
                                                    </option>
                                                    <option value="tanah">Tanah</option>
                                                    <option value="rumah_tinggal">Rumah Tinggal
                                                    </option>
                                                    <option value="apartemen">Apartemen</option>
                                                    <option value="rusun">Rusun</option>
                                                    <option value="ruko">Ruko</option>
                                                    <option value="rukan">Rukan</option>
                                                    <option value="kios">Kios</option>
                                                    <option value="lain_lain">Lain-Lain</option>

                                                    {{-- if Lain-Lain is selected then create new option --}}

                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_agunan_2_nilai_harga_jual">Nilai/Harga
                                                    Jual
                                                    (Harga Jual
                                                    merupakan Harga Transaksi/Harga
                                                    Jual
                                                    Setelah Discount)</label>
                                                <input type="number" name="form_agunan_2_nilai_harga_jual"
                                                    id="form_agunan_2_nilai_harga_jual" class="form-control"
                                                    placeholder="Masukkan Nilai/Harga Jual"
                                                    value="{{ $pembiayaan->agunan->form_agunan_2_nilai_harga_jual }}" />
                                            </div>
                                            <div class="mb-1 col-md-12">
                                                <div data-repeater-list="form_agunan_2_alamat">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-4 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_agunan_2_alamat"><small
                                                                            class="text-danger">*
                                                                        </small>Alamat/Lokasi
                                                                        Agunan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="form_agunan_2_alamat"
                                                                        id="form_agunan_2_alamat"
                                                                        aria-describedby="form_agunan_2_alamat"
                                                                        placeholder="Alamat/Lokasi Agunan"
                                                                        value="{{ $pembiayaan->agunan->form_agunan_2_alamat }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_agunan_2_alamat_rt"><small
                                                                            class="text-danger">*
                                                                        </small>RT</label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_agunan_2_alamat_rt"
                                                                        id="form_agunan_2_alamat_rt"
                                                                        aria-describedby="form_agunan_2_alamat_rt"
                                                                        placeholder="RT"
                                                                        value="{{ $pembiayaan->agunan->form_agunan_2_alamat_rt }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_agunan_2_alamat_rw"><small
                                                                            class="text-danger">*
                                                                        </small>RW</label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_agunan_2_alamat_rw"
                                                                        id="form_agunan_2_alamat_rw"
                                                                        aria-describedby="form_agunan_2_alamat_rw"
                                                                        placeholder="RW"
                                                                        value="{{ $pembiayaan->agunan->form_agunan_2_alamat_rw }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_agunan_2_alamat_kelurahan"><small
                                                                            class="text-danger">*
                                                                        </small>Kelurahan</label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_agunan_2_alamat_kelurahan"
                                                                        id="form_agunan_2_alamat_kelurahan"
                                                                        aria-describedby="form_agunan_2_alamat_kelurahan"
                                                                        placeholder="Kelurahan"
                                                                        value="{{ $pembiayaan->agunan->form_agunan_2_alamat_kelurahan }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_agunan_2_alamat_kecamatan"><small
                                                                            class="text-danger">*
                                                                        </small>Kecamatan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="form_agunan_2_alamat_kecamatan"
                                                                        id="form_agunan_2_alamat_kecamatan"
                                                                        aria-describedby="form_agunan_2_alamat_kecamatan"
                                                                        placeholder="Kecamatan"
                                                                        value="{{ $pembiayaan->agunan->form_agunan_2_alamat_kecamatan }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_agunan_2_alamat_dati2"><small
                                                                            class="text-danger">*
                                                                        </small>Dati
                                                                        2</label>
                                                                    <input type="text" class="form-control"
                                                                        name="form_agunan_2_alamat_dati2"
                                                                        id="form_agunan_2_alamat_dati2"
                                                                        aria-describedby="form_agunan_2_alamat_dati2"
                                                                        placeholder="Dati 2"
                                                                        value="{{ $pembiayaan->agunan->form_agunan_2_alamat_dati2 }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_agunan_2_alamat_provinsi"><small
                                                                            class="text-danger">*
                                                                        </small>Provinsi</label>
                                                                    <input type="text" class="form-control"
                                                                        name="form_agunan_2_alamat_provinsi"
                                                                        id="form_agunan_2_alamat_provinsi"
                                                                        aria-describedby="form_agunan_2_alamat_provinsi"
                                                                        placeholder="Provinsi"
                                                                        value="{{ $pembiayaan->agunan->form_agunan_2_alamat_provinsi }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_agunan_2_alamat_kode_pos"><small
                                                                            class="text-danger">*
                                                                        </small>Kode
                                                                        Pos</label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_agunan_2_alamat_kode_pos"
                                                                        id="form_agunan_2_alamat_kode_pos"
                                                                        aria-describedby="form_agunan_2_alamat_kode_pos"
                                                                        placeholder="16XXXX"
                                                                        value="{{ $pembiayaan->agunan->form_agunan_2_alamat_kode_pos }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-1 col-md-12">
                                                <div data-repeater-list="form_agunan_2_status_bukti_kepemilikan">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="mb-1 col-md-3">
                                                                <label class="form-label"
                                                                    for="form_agunan_2_status_bukti_kepemilikan"><small
                                                                        class="text-danger">*
                                                                    </small>Status/Bukti
                                                                    Kepemilikan</label>
                                                                <select class="select2 w-100"
                                                                    name="form_agunan_2_status_bukti_kepemilikan"
                                                                    id="form_agunan_2_status_bukti_kepemilikan">
                                                                    <option
                                                                        label="form_agunan_2_status_bukti_kepemilikan">
                                                                        Pilih
                                                                        Bukti Kepemilikan
                                                                    </option>
                                                                    <option value="shm">SHM
                                                                    </option>
                                                                    <option value="shgb">SHGB
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-1 col-md-3">
                                                                <label class="form-label"
                                                                    for="form_agunan_2_status_bukti_kepemilikan_tgl_berakhir"><small
                                                                        class="text-danger">*
                                                                    </small>Tanggal Berakhir</label>
                                                                <input type="date"
                                                                    id="form_agunan_2_status_bukti_kepemilikan_tgl_berakhir"
                                                                    class="form-control flatpickr-basic"
                                                                    name="form_agunan_2_status_bukti_kepemilikan_tgl_berakhir"
                                                                    placeholder="DD-MM-YYYY"
                                                                    value="{{ $pembiayaan->agunan->form_agunan_2_status_bukti_kepemilikan_tgl_berakhir }}" />
                                                            </div>

                                                            <div class="mb-1 col-md-3">
                                                                <label class="form-label"
                                                                    for="form_agunan_2_status_bukti_kepemilikan_hak"><small
                                                                        class="text-danger">*
                                                                    </small>Hak</label>
                                                                <select class="select2 w-100"
                                                                    name="form_agunan_2_status_bukti_kepemilikan_hak"
                                                                    id="form_agunan_2_status_bukti_kepemilikan_hak">
                                                                    <option
                                                                        label="form_agunan_2_status_bukti_kepemilikan_hak">
                                                                        Pilih Bukti Kepemilikan
                                                                    </option>
                                                                    <option value="hak_pakai">Hak
                                                                        Pakai
                                                                    </option>
                                                                    <option value="hpl">HPL
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_2_no_sertifikat"><small
                                                        class="text-danger">*
                                                    </small>Nomor Sertifikat</label>
                                                <input type="number" name="form_agunan_2_no_sertifikat"
                                                    id="form_agunan_2_no_sertifikat" class="form-control"
                                                    placeholder="Masukkan Nomor Sertifikat"
                                                    value="{{ $pembiayaan->agunan->form_agunan_2_no_sertifikat }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_agunan_2_no_sertifikat_tgl_penerbitan"><small
                                                        class="text-danger">*
                                                    </small>Tanggal Penerbitan</label>
                                                <input type="date" id="form_agunan_2_no_sertifikat_tgl_penerbitan"
                                                    class="form-control flatpickr-basic"
                                                    name="form_agunan_2_no_sertifikat_tgl_penerbitan"
                                                    placeholder="DD-MM-YYYY"
                                                    value="{{ $pembiayaan->agunan->form_agunan_2_no_sertifikat_tgl_penerbitan }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_2_no_imb"><small
                                                        class="text-danger">*
                                                    </small>Nomor IMB</label>
                                                <input type="number" name="form_agunan_2_no_imb"
                                                    id="form_agunan_2_no_imb" class="form-control"
                                                    placeholder="Masukkan Nomor IMB"
                                                    value="{{ $pembiayaan->agunan->form_agunan_2_no_imb }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_2_peruntukan_bangunan"><small
                                                        class="text-danger">*
                                                    </small>Peruntukan Bangunan</label>
                                                <input type="text" name="form_agunan_2_peruntukan_bangunan"
                                                    id="form_agunan_2_peruntukan_bangunan" class="form-control"
                                                    placeholder="Masukkan Peruntukan Bangunan"
                                                    value="{{ $pembiayaan->agunan->form_agunan_2_peruntukan_bangunan }}" />
                                            </div>
                                            <div class="mb-1 col-md-12">
                                                <div data-repeater-list="form_agunan_2_status_bukti_kepemilikan">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="mb-1 col-md-6">
                                                                <label class="form-label"
                                                                    for="form_agunan_2_luas_tanah"><small
                                                                        class="text-danger">*
                                                                    </small>Luas Tanah</label>
                                                                <input type="number" name="form_agunan_2_luas_tanah"
                                                                    id="form_agunan_2_luas_tanah" class="form-control"
                                                                    placeholder="Masukkan Luas Tanah"
                                                                    value="{{ $pembiayaan->agunan->form_agunan_2_luas_tanah }}" />

                                                            </div>
                                                            <div class="mb-1 col-md-6">
                                                                <label class="form-label"
                                                                    for="form_agunan_2_luas_bangunan"><small
                                                                        class="text-danger">*
                                                                    </small>Luas Bangunan</label>
                                                                <input type="number" name="form_agunan_2_luas_bangunan"
                                                                    id="form_agunan_2_luas_bangunan"
                                                                    class="form-control"
                                                                    placeholder="Masukkan Luas Bangunan"
                                                                    value="{{ $pembiayaan->agunan->form_agunan_2_luas_bangunan }}" />
                                                            </div>

                                                            <div class="mb-1 col-md-6">
                                                                <label class="form-label"
                                                                    for="form_agunan_2_atas_nama"><small
                                                                        class="text-danger">*
                                                                    </small>Atas Nama</label>
                                                                <input type="text" name="form_agunan_2_atas_nama"
                                                                    id="form_agunan_2_atas_nama" class="form-control"
                                                                    placeholder="Atas Nama"
                                                                    value="{{ $pembiayaan->agunan->form_agunan_2_atas_nama }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Agunan III-->
                                        <div class="content-header">
                                            <h5 class="mb-0 mt-2">Agunan III</h5>
                                            <small class="text-muted">Lengkapi Data Agunan
                                                III.</small>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_3_jenis">Jenis
                                                    Agunan</label>
                                                <select class="select2 w-100" name="form_agunan_3_jenis"
                                                    id="form_agunan_3_jenis">
                                                    <option label="form_agunan_3_jenis" selected disabled>
                                                        Pilih Jenis Agunan
                                                    </option>
                                                    <option value="deposito">Deposito</option>
                                                    <option value="tabungan">Tabungan</option>
                                                    <option value="sk_pegawai">SK Pegawai</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_3_nilai">Nilai
                                                    Agunan</label>
                                                <input type="number" name="form_agunan_3_nilai"
                                                    id="form_agunan_3_nilai" class="form-control"
                                                    placeholder="Masukkan Nilai Agunan"
                                                    value="{{ $pembiayaan->agunan->form_agunan_3_nilai }}" />
                                            </div>

                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_3_no_rekening">Nomor
                                                    Rekening</label>
                                                <input type="number" name="form_agunan_3_no_rekening"
                                                    id="form_agunan_3_no_rekening" class="form-control"
                                                    placeholder="Masukkan Nomor Rekening"
                                                    value="{{ $pembiayaan->agunan->form_agunan_3_no_rekening }}" />
                                            </div>

                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_3_atas_nama">Atas
                                                    Nama</label>
                                                <input type="text" name="form_agunan_3_atas_nama"
                                                    id="form_agunan_3_atas_nama" class="form-control"
                                                    placeholder="Masukkan Atas Nama"
                                                    value="{{ $pembiayaan->agunan->form_agunan_3_atas_nama }}" />
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-between mt-3">
                                            <button class="btn btn-primary btn-prev">
                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Form Data Kekayaan dan Pinjaman -->

                                    <div id="formKekayaan" class="content" role="tabpanel"
                                        aria-labelledby="kekayaan-trigger">
                                        <div class="content-header">
                                            <h4 class="mb-0 mt-2">Data Kekayaan dan Pinjaman</h4>
                                            <hr>
                                        </div>

                                        <!-- Kekayaan-->
                                        <div class="content-header">
                                            <h5 class="mb-0 mt-2">Kekayaan</h5>
                                            <small class="text-muted">Lengkapi Data Kekayaan</small>
                                        </div>
                                        <section id="form-repeater-simpanan">
                                            <div class="row">
                                                <div class="mb-1 col-md-12">
                                                    <div class="repeater-default">
                                                        <div data-repeater-list="kekayaan_simpanan">
                                                            <h6>Simpanan</h6>
                                                            <div data-repeater-item>
                                                                <div class="row d-flex align-items-end">
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_kekayaan_simpanan_nama_bank">Nama
                                                                                Bank</label>
                                                                            <input type="text" class="form-control"
                                                                                name="form_kekayaan_simpanan_nama_bank"
                                                                                id="form_kekayaan_simpanan_nama_bank"
                                                                                aria-describedby="itemquantity"
                                                                                placeholder="Nama Bank"
                                                                                value="{{ $pembiayaan->kekayaan_simpanan->form_kekayaan_simpanan_nama_bank }}" />
                                                                        </div>
                                                                    </div>

                                                                    {{-- <div class="col-md-2 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label" for="itemcost">
                                                                                            Simpanan</label>

                                                                                    </div>
                                                                                </div> --}}

                                                                    <div class="col-md-1 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_kekayaan_simpanan_jenis">Select</label>
                                                                            <select name="form_kekayaan_simpanan_jenis"
                                                                                id="form_kekayaan_simpanan_jenis"
                                                                                class="form-control">
                                                                                <option value="1">1
                                                                                </option>
                                                                                <option value="2">2
                                                                                </option>
                                                                                <option value="3">3
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_kekayaan_simpanan_sejak_tahun">Sejak
                                                                                Tahun</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_kekayaan_simpanan_sejak_tahun"
                                                                                id="form_kekayaan_simpanan_sejak_tahun"
                                                                                aria-describedby="form_kekayaan_simpanan_sejak_tahun"
                                                                                placeholder="Tahun"
                                                                                value="{{ $pembiayaan->kekayaan_simpanan->form_kekayaan_simpanan_sejak_tahun }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-1 col-md-2">
                                                                        <label class="form-label"
                                                                            for="form_kekayaan_simpanan_saldo_per_tanggal"><small
                                                                                class="text-danger">*
                                                                            </small>Saldo Per
                                                                            Tanggal</label>
                                                                        <input type="date"
                                                                            id="form_kekayaan_simpanan_saldo_per_tanggal"
                                                                            class="form-control flatpickr-basic"
                                                                            name="form_kekayaan_simpanan_saldo_per_tanggal"
                                                                            placeholder="DD-MM-YYYY"
                                                                            value="{{ $pembiayaan->kekayaan_simpanan->form_kekayaan_simpanan_saldo_per_tanggal }}" />
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <input type="number" class="form-control"
                                                                                name="form_kekayaan_simpanan_saldo"
                                                                                id="form_kekayaan_simpanan_saldo"
                                                                                aria-describedby="form_kekayaan_simpanan_saldo"
                                                                                placeholder="Saldo (Rp)"
                                                                                value="{{ $pembiayaan->kekayaan_simpanan->form_kekayaan_simpanan_saldo }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
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
                                                        <br />
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <section id="form-repeater-tanah-bangunan">
                                            <div class="row">
                                                <div class="mb-1 col-md-12">
                                                    <div class="repeater-default">
                                                        <div data-repeater-list="kekayaan_tanah_bangunan">
                                                            <h6>Tanah dan
                                                                Bangunan</h6>
                                                            <div data-repeater-item>
                                                                <div class="row d-flex align-items-end">
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_kekayaan_tanah_bangunan_luas_tanah">Luas
                                                                                Tanah</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_kekayaan_tanah_bangunan_luas_tanah"
                                                                                id="form_kekayaan_tanah_bangunan_luas_tanah"
                                                                                aria-describedby="form_kekayaan_tanah_bangunan_luas_tanah"
                                                                                placeholder="Luas Tanah"
                                                                                value="{{ $pembiayaan->kekayaan_tanah_bangunan->form_kekayaan_tanah_bangunan_luas_tanah }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_kekayaan_tanah_bangunan_luas_bangunan">Luas
                                                                                Bangunan</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_kekayaan_tanah_bangunan_luas_bangunan"
                                                                                id="form_kekayaan_tanah_bangunan_luas_bangunan"
                                                                                aria-describedby="form_kekayaan_tanah_bangunan_luas_bangunan"
                                                                                placeholder="Luas Bangunan"
                                                                                value="{{ $pembiayaan->kekayaan_tanah_bangunan->form_kekayaan_tanah_bangunan_luas_bangunan }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_kekayaan_tanah_bangunan_jenis">Jenis
                                                                                Tanah/Bangunan</label>
                                                                            <select class="form-control w-100"
                                                                                name="form_kekayaan_tanah_bangunan_jenis"
                                                                                id="form_kekayaan_tanah_bangunan_jenis">
                                                                                <option
                                                                                    label="Pilih
                                                                                                Tanah/Bangunan"
                                                                                    selected disabled>
                                                                                    Pilih
                                                                                    Tanah/Bangunan
                                                                                </option>
                                                                                <option value="tanah">
                                                                                    Tanah</option>
                                                                                <option value="rumah_tinggal">
                                                                                    Rumah Tinggal
                                                                                </option>
                                                                                <option value="apartemen">
                                                                                    Apartemen</option>
                                                                                <option value="rusun">
                                                                                    Rusun</option>
                                                                                <option value="ruko">
                                                                                    Ruko</option>
                                                                                <option value="rukan">
                                                                                    Rukan</option>
                                                                                <option value="kios">
                                                                                    Kios</option>
                                                                                <option value="lain_lain">
                                                                                    Lain-Lain</option>

                                                                                {{-- if Lainnya is selected then create new option --}}

                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_kekayaan_tanah_bangunan_atas_nama">Atas
                                                                                Nama</label>
                                                                            <input type="text" class="form-control"
                                                                                name="form_kekayaan_tanah_bangunan_atas_nama"
                                                                                id="form_kekayaan_tanah_bangunan_atas_nama"
                                                                                aria-describedby="itemquantity"
                                                                                placeholder="Atas Nama"
                                                                                value="{{ $pembiayaan->kekayaan_tanah_bangunan->form_kekayaan_tanah_bangunan_atas_nama }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_kekayaan_tanah_bangunan_taksasi_pasar_wajar">Taksasi
                                                                                Harga
                                                                                Pasar</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_kekayaan_tanah_bangunan_taksasi_pasar_wajar"
                                                                                id="form_kekayaan_tanah_bangunan_taksasi_pasar_wajar"
                                                                                aria-describedby="form_kekayaan_tanah_bangunan_taksasi_pasar_wajar"
                                                                                placeholder="Taksasi Harga Pasar (Rp)"
                                                                                value="{{ $pembiayaan->kekayaan_tanah_bangunan->form_kekayaan_tanah_bangunan_taksasi_pasar_wajar }}" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-1 col-12">
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
                                                        <br />
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <section id="form-repeater-kendaraan">
                                            <div class="row">
                                                <div class="mb-1 col-md-12">
                                                    <div class="repeater-default">
                                                        <div data-repeater-list="kekayaan_kendaraan">
                                                            <h6>Kendaraan</h6>
                                                            <div data-repeater-item>
                                                                <div class="row d-flex align-items-end">
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_kekayaan_kendaraan_jenis_merk">Jenis/Merk</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_kekayaan_kendaraan_jenis_merk"
                                                                                id="form_kekayaan_kendaraan_jenis_merk"
                                                                                aria-describedby="form_kekayaan_kendaraan_jenis_merk"
                                                                                placeholder="Jenis/Merk"
                                                                                value="{{ $pembiayaan->kekayaan_kendaraan->form_kekayaan_kendaraan_jenis_merk }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-1 col-md-2">
                                                                        <label class="form-label"
                                                                            for="form_kekayaan_kendaraan_tahun_dikeluarkan">Tahun
                                                                            Dikeluarkan</label>
                                                                        <input type="number" class="form-control"
                                                                            name="form_kekayaan_kendaraan_tahun_dikeluarkan"
                                                                            id="form_kekayaan_kendaraan_tahun_dikeluarkan"
                                                                            aria-describedby="form_kekayaan_kendaraan_tahun_dikeluarkan"
                                                                            placeholder="Tahun Dikeluarkan"
                                                                            value="{{ $pembiayaan->kekayaan_kendaraan->form_kekayaan_kendaraan_tahun_dikeluarkan }}" />
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_kekayaan_kendaraan_atas_nama">Atas
                                                                                Nama</label>
                                                                            <input type="text" class="form-control"
                                                                                name="form_kekayaan_kendaraan_atas_nama"
                                                                                id="form_kekayaan_kendaraan_atas_nama"
                                                                                aria-describedby="form_kekayaan_kendaraan_atas_nama"
                                                                                placeholder="Atas Nama"
                                                                                value="{{ $pembiayaan->kekayaan_kendaraan->form_kekayaan_kendaraan_atas_nama }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_kekayaan_kendaraan_taksasi_harga_jual">Taksasi
                                                                                Harga
                                                                                Jual</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_kekayaan_kendaraan_taksasi_harga_jual"
                                                                                id="form_kekayaan_kendaraan_taksasi_harga_jual"
                                                                                aria-describedby="form_kekayaan_kendaraan_taksasi_harga_jual"
                                                                                placeholder="Taksasi Harga Jual"
                                                                                value="{{ $pembiayaan->kekayaan_kendaraan->form_kekayaan_kendaraan_taksasi_harga_jual }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
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
                                                        <br />
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <section id="form-repeater-saham">
                                            <div class="row">
                                                <div class="mb-1 col-md-12">
                                                    <div class="repeater-default">
                                                        <div data-repeater-list="kekayaan_saham">
                                                            <h6>Saham</h6>
                                                            <div data-repeater-item>
                                                                <div class="row d-flex align-items-end">
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_kekayaan_saham_penerbit">Penerbit</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_kekayaan_saham_penerbit"
                                                                                id="form_kekayaan_saham_penerbit"
                                                                                aria-describedby="form_kekayaan_saham_penerbit"
                                                                                placeholder="Penerbit"
                                                                                value="{{ $pembiayaan->kekayaan_saham->form_kekayaan_saham_penerbit }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-1 col-md-6">
                                                                        <label class="form-label"
                                                                            for="form_kekayaan_saham_per_tanggal"><small
                                                                                class="text-danger">*
                                                                            </small>Rupiah Per
                                                                            Tanggal</label>
                                                                        <input type="date"
                                                                            id="form_kekayaan_saham_per_tanggal"
                                                                            class="form-control flatpickr-basic"
                                                                            name="form_kekayaan_saham_per_tanggal"
                                                                            placeholder="DD-MM-YYYY"
                                                                            value="{{ $pembiayaan->kekayaan_saham->form_kekayaan_saham_per_tanggal }}" />
                                                                    </div>

                                                                    <div class="mb-1 col-md-3">
                                                                        <input type="number" class="form-control"
                                                                            name="form_kekayaan_saham_rp"
                                                                            id="form_kekayaan_saham_rp"
                                                                            aria-describedby="form_kekayaan_saham_rp"
                                                                            placeholder="Rupiah Per Tanggal"
                                                                            value="{{ $pembiayaan->kekayaan_saham->form_kekayaan_saham_rp }}" />
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
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
                                                        <br />
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <section id="form-repeater-form_kekayaan_lainnya">
                                            <div class="row">
                                                <div class="mb-1 col-md-12">
                                                    <div class="repeater-default">
                                                        <div data-repeater-list="kekayaan_lainnya">
                                                            <div data-repeater-item>
                                                                <div class="row d-flex align-items-end">
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_kekayaan_lainnya">Lainnya</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_kekayaan_lainnya"
                                                                                id="form_kekayaan_lainnya"
                                                                                aria-describedby="form_kekayaan_lainnya"
                                                                                placeholder="Lainnya"
                                                                                value="{{ $pembiayaan->kekayaan_lainnya->form_kekayaan_lainnya }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-1 col-md-3">
                                                                        <label class="form-label"
                                                                            for="form_kekayaan_lainnya_rp">Rupiah</label>
                                                                        <input type="number" class="form-control"
                                                                            name="form_kekayaan_lainnya_rp"
                                                                            id="form_kekayaan_lainnya_rp"
                                                                            aria-describedby="form_kekayaan_lainnya_rp"
                                                                            placeholder="Rp"
                                                                            value="{{ $pembiayaan->kekayaan_lainnya->form_kekayaan_lainnya_rp }}" />
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
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
                                                        <br />
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <hr />

                                        <!-- Pinjaman-->
                                        <div class="content-header">
                                            <h5 class="mb-0 mt-2">Pinjaman</h5>
                                            <small class="text-muted">Lengkapi Data Pinjaman</small>
                                        </div>
                                        <section id="form-repeater-form_pinjaman_nama_bank">
                                            <div class="row">
                                                <div class="mb-1 col-md-12">
                                                    <div class="repeater-default">
                                                        <div data-repeater-list="pinjaman">
                                                            <h6>
                                                                Pinjaman
                                                            </h6>
                                                            <div data-repeater-item>
                                                                <div class="row d-flex align-items-end">
                                                                    <div class="col-md-2 col-12">

                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pinjaman_nama_bank">Nama
                                                                                Bank</label>
                                                                            <input type="text" class="form-control"
                                                                                name="form_pinjaman_nama_bank"
                                                                                id="form_pinjaman_nama_bank"
                                                                                aria-describedby="form_pinjaman_nama_bank"
                                                                                placeholder="Nama Bank"
                                                                                value="{{ $pembiayaan->pinjaman->form_pinjaman_nama_bank }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">

                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pinjaman_jenis">Jenis
                                                                                Pinjaman</label>
                                                                            <select class="select2 w-100"
                                                                                name="form_pinjaman_jenis"
                                                                                id="form_pinjaman_jenis">
                                                                                <option label="form_pinjaman_jenis"
                                                                                    selected disabled>
                                                                                    Pilih
                                                                                    Jenis
                                                                                    Pinjaman
                                                                                </option>
                                                                                <option value="modal_kerja">
                                                                                    Modal Kerja</option>
                                                                                <option value="investasi">
                                                                                    Investasi</option>
                                                                                <option value="konsumtif">
                                                                                    Konsumtif</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pinjaman_sejak_tahun">Sejak
                                                                                Tahun</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_pinjaman_sejak_tahun"
                                                                                id="form_pinjaman_sejak_tahun"
                                                                                aria-describedby="form_pinjaman_sejak_tahun"
                                                                                placeholder="Tahun"
                                                                                value="{{ $pembiayaan->pinjaman->form_pinjaman_sejak_tahun }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pinjaman_jangka_waktu_bulan">Jangka
                                                                                Waktu (Bulan)</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_pinjaman_jangka_waktu_bulan"
                                                                                id="form_pinjaman_jangka_waktu_bulan"
                                                                                aria-describedby="form_pinjaman_jangka_waktu_bulan"
                                                                                placeholder="Jangka Waktu (Bulan)"
                                                                                value="{{ $pembiayaan->pinjaman->form_pinjaman_jangka_waktu_bulan }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pinjaman_plafond">Plafond</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_pinjaman_plafond"
                                                                                id="form_pinjaman_plafond"
                                                                                aria-describedby="form_pinjaman_plafond"
                                                                                placeholder="Plafond (Rp)"
                                                                                value="{{ $pembiayaan->pinjaman->form_pinjaman_plafond }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pinjaman_angsuran_per_bulan">Angsuran/Bulan</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_pinjaman_angsuran_per_bulan"
                                                                                id="form_pinjaman_angsuran_per_bulan"
                                                                                aria-describedby="form_pinjaman_angsuran_per_bulan"
                                                                                placeholder="Angsuran/Bulan"
                                                                                value="{{ $pembiayaan->pinjaman->form_pinjaman_angsuran_per_bulan }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
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
                                                        <br />
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <!-- Kartu Kredit -->
                                        <section id="form-repeater-form_pinjaman_kartu_kredit">
                                            <div class="row">
                                                <div class="mb-1 col-md-12">
                                                    <div class="repeater-default">
                                                        <div data-repeater-list="pinjaman_kartu_kredit">
                                                            <h6>Kartu
                                                                Kredit</h6>
                                                            <div data-repeater-item>
                                                                <div class="row d-flex align-items-end">
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pinjaman_kartu_kredit_nama_bank">Nama
                                                                                Bank</label>
                                                                            <input type="text" class="form-control"
                                                                                name="form_pinjaman_kartu_kredit_nama_bank"
                                                                                id="form_pinjaman_kartu_kredit_nama_bank"
                                                                                aria-describedby="form_pinjaman_kartu_kredit_nama_bank"
                                                                                placeholder="Nama Bank"
                                                                                value="{{ $pembiayaan->pinjaman_kartu_kredit->form_pinjaman_kartu_kredit_nama_bank }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pinjaman_kartu_kredit_sejak_tahun">Sejak
                                                                                Tahun</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_pinjaman_kartu_kredit_sejak_tahun"
                                                                                id="form_pinjaman_kartu_kredit_sejak_tahun"
                                                                                aria-describedby="form_pinjaman_kartu_kredit_sejak_tahun"
                                                                                placeholder="Tahun"
                                                                                value="{{ $pembiayaan->pinjaman_kartu_kredit->form_pinjaman_kartu_kredit_sejak_tahun }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pinjaman_kartu_kredit_plafond">Plafond</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_pinjaman_kartu_kredit_plafond"
                                                                                id="form_pinjaman_kartu_kredit_plafond"
                                                                                aria-describedby="form_pinjaman_kartu_kredit_plafond"
                                                                                placeholder="Plafond (Rp)"
                                                                                value="{{ $pembiayaan->pinjaman_kartu_kredit->form_pinjaman_kartu_kredit_plafond }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
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
                                                        <br />
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <section id="form-repeater-form_pinjaman_lainnya">
                                            <div class="row">
                                                <div class="mb-1 col-md-12">
                                                    <div class="repeater-default">
                                                        <div data-repeater-list="pinjaman_lainnya">
                                                            <div data-repeater-item>
                                                                <div class="row d-flex align-items-end">
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_pinjaman_lainnya">Lainnya</label>
                                                                            <input type="number" class="form-control"
                                                                                name="form_pinjaman_lainnya"
                                                                                id="form_pinjaman_lainnya"
                                                                                aria-describedby="form_pinjaman_lainnya"
                                                                                placeholder="Lainnya"
                                                                                value="{{ $pembiayaan->pinjaman_lainnya->form_pinjaman_lainnya }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-1 col-md-3">
                                                                        <label class="form-label"
                                                                            for="form_pinjaman_lainnya_rp">Rupiah</label>
                                                                        <input type="number" class="form-control"
                                                                            name="form_pinjaman_lainnya_rp"
                                                                            id="form_pinjaman_lainnya_rp"
                                                                            aria-describedby="form_pinjaman_lainnya_rp"
                                                                            placeholder="Rupiah"
                                                                            value="{{ $pembiayaan->pinjaman_lainnya->form_pinjaman_lainnya_rp }}" />
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
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
                                                    </div>
                                                </div>
                                            </div>
                                        </section>



                                        <div class="d-flex justify-content-between mt-3">
                                            <button class="btn btn-primary btn-prev" type="button">
                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next" type="button">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Form Persyaratan Kelengkapan -->
                                    <div id="formInfo" class="content" role="tabpanel"
                                        aria-labelledby="info-trigger">
                                        <div>
                                            <h4>Persyaratan Kelengkapan</h4>
                                            <hr />
                                            <h5>Kelengkapan hardcopy dokumen yang harus dilampirkan
                                                untuk
                                                mempercepat
                                                proses PPR
                                                Syariah:
                                            </h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="vertical-align: middle;">No.</th>
                                                        <th style="vertical-align: middle;">
                                                            <center>Jenis Dokumen</center>
                                                        </th>
                                                        <th style="vertical-align: middle;">
                                                            <center>Pegawai</center>
                                                        </th>
                                                        <th style="vertical-align: middle;">
                                                            <center>Wiraswasta & Swasta Pemilik</center>
                                                        </th>
                                                        <th style="vertical-align: middle;">
                                                            <center>Profesi</center>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>1</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Foto Copy identitas (KTP) atas nama pemohon
                                                            dan
                                                            istri/suami
                                                            pemohon yang
                                                            masih berlaku
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>2</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Foto Copy Kartu Keluarga
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>3</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Foto Copy Surat Nikah (bagi pemohon yang
                                                            telah
                                                            menikah)
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>4</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Foto Copy Surat Cerai (bagi pemohon yang
                                                            telah
                                                            bercerai)
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>5</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Foto Copy SPT Tahunan
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>6</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Foto Copy NPWP a.n. Pemohon (bagi pemohon
                                                            dengan
                                                            nilai
                                                            permohonan Rp.
                                                            100
                                                            juta ke atas)
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>7</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Foto Copy SK Pegawai (pertama dan terakhir)
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center></center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center></center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>8</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Slip Gaji Terakhir
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center></center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center></center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>9</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Surat Rekomendasi dari Pimpinan
                                                            Instansi/Perusahaan
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center></center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center></center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>10</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Foto Copy Rekening Koran Tabungan dan/ Giro
                                                            a.n.
                                                            pemohon
                                                            minimal
                                                            selama
                                                            3
                                                            (tiga) bulan terakhir
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>11</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Foto Copy Akta Perusahaan (Pendirian berikut
                                                            perubahannya),
                                                            TDP,
                                                            SIUP,
                                                            SITU
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center></center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center></center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>12</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Foto Copy Laporan Keuangan (Neraca dan Laba
                                                            Rugi) tahun
                                                            terakhir
                                                            dan
                                                            tahun
                                                            berjalan berikut lampirannya
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center></center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center></center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>13</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Foto Copy Rekening Giro a.n. Perusahaan
                                                            minimal
                                                            selama 6
                                                            (enam)
                                                            bulan
                                                            terakhir
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center></center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center></center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>14</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Foto Copy NPWP a.n. Perusahaan
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center></center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center></center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>15</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Foto Copy Izin - Izin Praktik Profesi
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center></center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center></center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>16</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Dokumen Kepemilikan Agunan (Foto Copy
                                                            Sertifikat
                                                            Tanah dan
                                                            IMB)
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>17</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Hasil Penilaian Agunan oleh Appraisal
                                                            Independent (untuk
                                                            permohonan di
                                                            atas
                                                            Rp. 50 juta)
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center>✓</center>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-between mt-3">
                                            <button class="btn btn-primary btn-prev">
                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-success btn-submit">Submit</button>
                                        </div>
                                    </div>

                                    <br>
                                    <hr>
                                    <!-- Tabel -->


                                </form>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="tab-pane" id="check-list" role="tabpanel" aria-labelledby="check-list-justified">
                    <section id="section_checklist" class="modern-horizontal-wizard">
                        <div class="bs-stepper wizard-modern modern-wizard-example">
                            <div class="bs-stepper-header">
                                <div class="nav nav-tabs nav-justified" id="form-checklist" role="tablist">
                                    <div class="step active" href="#formCheckListPersyaratan" data-bs-toggle="tab"
                                        role="tab" id="formCheckListPersyaratan-tab-justified"
                                        aria-controls="formCheckListPersyaratan" aria-selected="true">
                                        <button type="button" class="step-trigger">
                                            <span class="bs-stepper-box">
                                                1
                                            </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">Persyaratan</span>
                                                <span class="bs-stepper-subtitle">Isi Check
                                                    List</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="line">
                                        <i data-feather="chevron-right" class="font-medium-2"></i>
                                    </div>

                                    @if ($pembiayaan->jenis_nasabah == 'Fixed Income')
                                        <div class="step" href="#formCheckListDokumenCalonNasabahFixedIncome"
                                            data-bs-toggle="tab" role="tab"
                                            id="formCheckListDokumenCalonNasabahFixedIncome-tab-justified"
                                            aria-controls="formCheckListDokumenCalonNasabahFixedIncome"
                                            aria-selected="true">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    2
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Dokumen Calon
                                                        Nasabah
                                                        Fixed
                                                        Income</span>
                                                    <span class="bs-stepper-subtitle">Isi Check
                                                        List</span>
                                                </span>
                                            </button>
                                        </div>
                                    @else
                                        <div class="step" href="#formCheckListDokumenCalonNasabahNonFixedIncome"
                                            data-bs-toggle="tab" role="tab"
                                            id="formCheckListDokumenCalonNasabahNonFixedIncome-tab-justified"
                                            aria-controls="formCheckListDokumenCalonNasabahNonFixedIncome"
                                            aria-selected="true">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    2
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Dokumen Calon
                                                        Nasabah Non
                                                        Fixed
                                                        Income</span>
                                                    <span class="bs-stepper-subtitle">Isi Check
                                                        List</span>
                                                </span>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="line">
                                        <i data-feather="chevron-right" class="font-medium-2"></i>
                                    </div>

                                    <div class="step" href="#formCheckListDokumenCalonNasabahAgunan"
                                        data-bs-toggle="tab" role="tab"
                                        id="formCheckListDokumenCalonNasabahAgunan-tab-justified"
                                        aria-controls="formCheckListDokumenCalonNasabahAgunan" aria-selected="true">
                                        <button type="button" class="step-trigger">
                                            <span class="bs-stepper-box">
                                                3
                                            </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">Dokumen Agunan
                                                    Calon
                                                    Nasabah</span>
                                                <span class="bs-stepper-subtitle">Isi Check
                                                    List</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="line">
                                        <i data-feather="chevron-right" class="font-medium-2"></i>
                                    </div>

                                    @if ($pembiayaan->jenis_nasabah == 'Fixed Income')
                                        <div class="step" href="#formAbilityToRepayFixedIncome" data-bs-toggle="tab"
                                            role="tab" id="formAbilityToRepayFixedIncome-tab-justified"
                                            aria-controls="formAbilityToRepayFixedIncome" aria-selected="true">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    4
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Ability To Repay Fixed
                                                        Income</span>
                                                    <span class="bs-stepper-subtitle">Isi Data</span>
                                                </span>
                                            </button>
                                        </div>
                                    @else
                                        <div class="step" href="#formAbilityToRepayNonFixedIncome"
                                            data-bs-toggle="tab" role="tab"
                                            id="formAbilityToRepayNonFixedIncome-tab-justified"
                                            aria-controls="formAbilityToRepayNonFixedIncome" aria-selected="true">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    4
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Ability To Repay Non Fixed
                                                        Income</span>
                                                    <span class="bs-stepper-subtitle">Isi Data</span>
                                                </span>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="line">
                                        <i data-feather="chevron-right" class="font-medium-2"></i>
                                    </div>

                                    <div class="step" href="#formPemberkasanMemo" data-bs-toggle="tab"
                                        role="tab" id="formPemberkasanMemo-tab-justified"
                                        aria-controls="formPemberkasanMemo" aria-selected="true">
                                        <button type="button" class="step-trigger">
                                            <span class="bs-stepper-box">
                                                5
                                            </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">Pemberkasan Memo</span>
                                                <span class="bs-stepper-subtitle">Isi Check </span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="bs-stepper-content">
                                <form action="/ppr/proposal/{{ $pembiayaan->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    @if ($pembiayaan->form_score == 'Telah dinilai')
                                        <input type="hidden" name="form_cl" value="Telah diisi" />
                                        <input type="hidden" name="form_score" value="Telah dinilai" />
                                    @else
                                        <input type="hidden" name="form_cl" value="Telah diisi" />
                                    @endif
                                    {{-- <input type="hidden" name="form_cl" value="{{ request('form_cl')}}" /> --}}
                                    <!-- Form Check List Persyaratan -->
                                    <div id="formCheckListPersyaratan" class="content active"
                                        id="formCheckListPersyaratan"
                                        aria-labelledby="formCheckListPersyaratan-tab-justified" role="tabpanel">
                                        <div>
                                            <h4>Form Checklist Persyaratan Calon Nasabah PPR Syariah
                                            </h4>
                                            <hr />
                                            <h5>Kelengkapan dokumen yang harus dilampirkan untuk
                                                mempercepat
                                                proses PPR
                                                Syariah:
                                            </h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="vertical-align: middle;">No.</th>
                                                        <th style="vertical-align: middle;">
                                                            <center>Check List Persyaratan Calon Nasabah
                                                                PPR
                                                                Syariah
                                                            </center>
                                                        </th>
                                                        <th style="vertical-align: middle;">
                                                            <center>Sumber Data Verifikasi</center>
                                                        </th>
                                                        <th style="vertical-align: middle;">
                                                            <center>Ada</center>
                                                        </th>
                                                        <th style="vertical-align: middle;">
                                                            <center>Tidak</center>
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>1</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Warga Negara Indonesia
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            KTP
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="wni"
                                                                    value="Ada"
                                                                    {{ $dokumen->clPersyaratan->wni == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="wni"
                                                                    value="Tidak"
                                                                    {{ $dokumen->clPersyaratan->wni == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>2</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Telah berusia 21 tahun atau telah menikah,
                                                            serta
                                                            berwenang
                                                            melakukan
                                                            tindakan hukum/tidak berada dalam
                                                            pengampuan/sehat
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            KTP, Kartu Nikah, KK, dan Wawancara
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="usia_cukup"
                                                                    value="Ada"
                                                                    {{ $dokumen->clPersyaratan->usia_cukup == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="usia_cukup"
                                                                    value="Tidak"
                                                                    {{ $dokumen->clPersyaratan->usia_cukup == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>3</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Pada saat PPR Syariah Lunas usia pemohon
                                                            tidak
                                                            melebihi 55 tahun
                                                            untuk
                                                            Fixed Income dan 65 tahun untuk Non Fixed
                                                            Income
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            KTP
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio"
                                                                    name="tidak_melebihi_batas_usia" value="Ada"
                                                                    {{ $dokumen->clPersyaratan->tidak_melebihi_batas_usia == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio"
                                                                    name="tidak_melebihi_batas_usia" value="Tidak"
                                                                    {{ $dokumen->clPersyaratan->tidak_melebihi_batas_usia == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>4</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Memiliki penghasilan yang menurut
                                                            perhitungan
                                                            Bank
                                                            dapat
                                                            menjamin
                                                            kelangsungan pembayaran kewajiban (angsuran
                                                            pokok
                                                            dan margin)
                                                            sampai
                                                            pembiayaan lunas. Penghasilan dimaksud baik
                                                            bersifat
                                                            tetap (gaji
                                                            bulanan) maupun tidak tetap (pendapatan dari
                                                            pekerjaan bebas)
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Copy Slip Gaji, Surat Keterangan
                                                            Penghasilan,
                                                            Copy
                                                            Buku
                                                            Tabungan/Giro,
                                                            SK, dan NPWP
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="penghasilan_menjamin"
                                                                    value="Ada"
                                                                    {{ $dokumen->clPersyaratan->penghasilan_menjamin == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="penghasilan_menjamin"
                                                                    value="Tidak"
                                                                    {{ $dokumen->clPersyaratan->penghasilan_menjamin == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>5</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Mempunyai pekerjaan tetap (sebagai karyawan
                                                            atau
                                                            pekerjaan
                                                            lainnya yang
                                                            memperoleh gaji tetap) atau menjalankan
                                                            usahanya
                                                            sendiri
                                                            (wiraswasta)
                                                            dengan masa kerja minimal 1 (satu) tahun
                                                            untuk
                                                            karyawan dan 2
                                                            (dua)
                                                            tahun untuk wiraswasta
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Copy Slip Gaji, Copy Buku Tabungan/Giro, SK,
                                                            NPWP,
                                                            dan
                                                            Catatan-catatan
                                                            lain
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="masa_kerja"
                                                                    value="Ada"
                                                                    {{ $dokumen->clPersyaratan->masa_kerja == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="masa_kerja"
                                                                    value="Tidak"
                                                                    {{ $dokumen->clPersyaratan->masa_kerja == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>6</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Tidak memiliki pembiayaan bermasalah baik di
                                                            Bank
                                                            maupun di Bank
                                                            Lain
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            BI Checking
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="kol_lancar"
                                                                    value="Ada"
                                                                    {{ $dokumen->clPersyaratan->kol_lancar == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="kol_lancar"
                                                                    value="Tidak"
                                                                    {{ $dokumen->clPersyaratan->kol_lancar == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>7</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Pemohon yang masih berstatus sebagai Nasabah
                                                            di
                                                            Bank
                                                            untuk jenis
                                                            pembiayaan apapun, disyaratkan sesuai
                                                            ketentuan
                                                            Bank
                                                            penghasilannya masih cukup untuk membayar
                                                            kewajiban
                                                            (angsuran
                                                            pokok dan
                                                            margin) atas seluruh pembiayaan (baik yang
                                                            telah
                                                            ada
                                                            maupun yang
                                                            akan
                                                            diminta)
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Copy Slip Gaji, Wawancara, dan Bukti
                                                            Rekening
                                                            Koran
                                                            Pembiayaan
                                                            di Bank
                                                            Lain
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="kol_kesanggupan"
                                                                    value="Ada"
                                                                    {{ $dokumen->clPersyaratan->kol_kesanggupan == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="kol_kesanggupan"
                                                                    value="Tidak"
                                                                    {{ $dokumen->clPersyaratan->kol_kesanggupan == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>8</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Menyampaikan NPWP
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Copy NPWP
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="menyampaikan_npwp"
                                                                    value="Ada"
                                                                    {{ $dokumen->clPersyaratan->menyampaikan_npwp == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="menyampaikan_npwp"
                                                                    value="Tidak"
                                                                    {{ $dokumen->clPersyaratan->menyampaikan_npwp == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="d-flex justify-content-between mt-3">
                                            <button class="btn btn-outline-secondary btn-prev" disabled>
                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next" type="button"
                                                href="#formCheckListDokumenCalonNasabahFixedIncome">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                            </button>
                                        </div>
                                    </div>

                                    @if ($pembiayaan->jenis_nasabah == 'Fixed Income')
                                        <!-- Form Check List Dokumen Calon Nasabah Fixed Income -->
                                        <div id="formCheckListDokumenCalonNasabahFixedIncome" class="content"
                                            role="tabpanel"
                                            aria-labelledby="formCheckListDokumenCalonNasabahFixedIncome-tab-justified">
                                            <div>
                                                <h4>Form Check List Dokumen Calon Nasabah Fixed Income</h4>
                                                <hr />
                                                <h5>Kelengkapan dokumen yang harus dilampirkan untuk
                                                    mempercepat
                                                    proses PPR
                                                    Syariah:
                                                </h5>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th style="vertical-align: middle;">No.</th>
                                                            <th style="vertical-align: middle;">
                                                                <center>Dokumen Calon Nasabah Fixed Income
                                                                </center>
                                                            </th>
                                                            <th style="vertical-align: middle;">
                                                                <center>Verifikasi</center>
                                                            </th>
                                                            <th style="vertical-align: middle;">
                                                                <center>Ada</center>
                                                            </th>
                                                            <th style="vertical-align: middle;">
                                                                <center>Tidak</center>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>1</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Aplikasi Permohonan PPR Syariah
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                KTP
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="aplikasi_permohonan"
                                                                        value="Ada"
                                                                        {{ $dokFixedIncome->aplikasi_permohonan == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="aplikasi_permohonan"
                                                                        value="Tidak"
                                                                        {{ $dokFixedIncome->aplikasi_permohonan == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>2</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Copy KTP yang masih berlaku (kecuali KTP
                                                                Elektronik
                                                                berlaku
                                                                seumur hidup
                                                                sesuai Surat Edaran Kementrian Dalam Negeri
                                                                No:
                                                                470/295/SJ,
                                                                Perihal: KTP
                                                                Elektronik (KTP-el) Berlaku Seumur Hidup,
                                                                Tanggal 29
                                                                Januari
                                                                2016 yang
                                                                menyatakan bahwa KTP Elektronik berlaku
                                                                seumur
                                                                hidup
                                                                (terlampir))
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                KTP Asli, Photo sama, Umur, dan Sesuai KK
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="copy_ktp"
                                                                        value="Ada"
                                                                        {{ $dokFixedIncome->copy_ktp == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="copy_ktp"
                                                                        value="Tidak"
                                                                        {{ $dokFixedIncome->copy_ktp == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>3</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Copy Kartu Keluarga
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                KK Asli, Sesuai dengan KTP, dan Jumlah
                                                                Tanggungan
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="copy_kk"
                                                                        value="Ada"
                                                                        {{ $dokFixedIncome->copy_kk == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="copy_kk"
                                                                        value="Tidak"
                                                                        {{ $dokFixedIncome->copy_kk == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>4</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Copy Surat Nikah/Cerai </td>
                                                            <td style="vertical-align: middle;">
                                                                SN Asli, Kesesuaian dengan KTP dan KK
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="copy_sn_sc"
                                                                        value="Ada"
                                                                        {{ $dokFixedIncome->copy_sn_sc == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="copy_sn_sc"
                                                                        value="Tidak"
                                                                        {{ $dokFixedIncome->copy_sn_sc == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>5</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Pasphoto Pemohon dan Pasangan (Suami/Istri)
                                                                berwarna
                                                                yang
                                                                terbaru
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Sesuai dengan KTP dan SN
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="pasphoto_ktp_sn"
                                                                        value="Ada"
                                                                        {{ $dokFixedIncome->pasphoto_ktp_sn == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="pasphoto_ktp_sn"
                                                                        value="Tidak"
                                                                        {{ $dokFixedIncome->pasphoto_ktp_sn == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>6</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Copy Slip Gaji atau Surat Keterangan
                                                                Penghasilan
                                                                yang telah
                                                                disahkan
                                                                dengan ditanda-tangani oleh Pejabat
                                                                Perusahaan
                                                                Bagian
                                                                Penggajian/Bendahara dan di-Stempel
                                                                Perusahaan
                                                                selama 3 bulan
                                                                terakhir
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Kebenaran, Kecukupan untuk Angsuran,
                                                                Kewajaran.
                                                                Kesesuaian
                                                                dengan Copy
                                                                Buku Tabungan/Giro
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="copy_slip_gaji"
                                                                        value="Ada"
                                                                        {{ $dokFixedIncome->copy_slip_gaji == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="copy_slip_gaji"
                                                                        value="Tidak"
                                                                        {{ $dokFixedIncome->copy_slip_gaji == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>7</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Copy Rekening Tabungan/Giro tempat
                                                                pembayaran/transfer Gaji
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Kesesuaian jumlah dengan copy Buku
                                                                Tabungan/Giro
                                                                dan
                                                                konsisten
                                                                selama 3
                                                                (tiga) tahun
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="copy_tabungan"
                                                                        value="Ada"
                                                                        {{ $dokFixedIncome->copy_tabungan == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="copy_tabungan"
                                                                        value="Tidak"
                                                                        {{ $dokFixedIncome->copy_tabungan == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>8</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Copy Surat Keterangan Kerja/Surat
                                                                Keputusan/Pengangkatan/Mutasi/Promosi
                                                                Terakhir Copy surat resmi
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Kesesuaian jumlah dengan copy Buku
                                                                Tabungan/Giro,
                                                                konsisten
                                                                selama 3
                                                                (tiga) tahun, dan kebenaran status FI
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="copy_sk"
                                                                        value="Ada"
                                                                        {{ $dokFixedIncome->copy_sk == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="copy_sk"
                                                                        value="Tidak"
                                                                        {{ $dokFixedIncome->copy_sk == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>9</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Surat Kuasa Pemotongan Gaji untuk pembayaran
                                                                angsuran kolektif
                                                                dari
                                                                Pejabat dan Bendahara Perusahaan yang
                                                                dibubuhi
                                                                stempel
                                                                Perusahaan
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Kesesuaian jumlah dengan copy Buku
                                                                Tabungan/Giro,
                                                                konsisten
                                                                selama 3
                                                                (tiga) tahun, dan kebenaran status FI
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="sk_pemotongan_gaji"
                                                                        value="Ada"
                                                                        {{ $dokFixedIncome->sk_pemotongan_gaji == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="sk_pemotongan_gaji"
                                                                        value="Tidak"
                                                                        {{ $dokFixedIncome->sk_pemotongan_gaji == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>10</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                NPWP
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Kebenaran Status FI dan Ketaatan terhadap
                                                                Pajak
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="npwp"
                                                                        value="Ada"
                                                                        {{ $dokFixedIncome->npwp == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="npwp"
                                                                        value="Tidak"
                                                                        {{ $dokFixedIncome->npwp == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="d-flex justify-content-between mt-3">
                                                <button class="btn btn-primary btn-prev" type="button">
                                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                </button>
                                                <button class="btn btn-primary btn-next" type="button">
                                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                    <i data-feather="arrow-right"
                                                        class="align-middle ms-sm-25 ms-0"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @else
                                        <!-- Form Check List Dokumen Calon Nasabah Non Fixed Income -->
                                        <div id="formCheckListDokumenCalonNasabahNonFixedIncome" class="content"
                                            role="tabpanel"
                                            aria-labelledby="check-list-dokumen-non-fixed-income-trigger">
                                            <div>
                                                <h4>Form Check List Dokumen Calon Nasabah Non Fixed Income</h4>
                                                <hr />
                                                <h5>Kelengkapan dokumen yang harus dilampirkan untuk mempercepat proses PPR
                                                    Syariah:
                                                </h5>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th style="vertical-align: middle;">No.</th>
                                                            <th style="vertical-align: middle;">
                                                                <center>Dokumen Calon Nasabah Non Fixed Income</center>
                                                            </th>
                                                            <th style="vertical-align: middle;">
                                                                <center>Verifikasi</center>
                                                            </th>
                                                            <th style="vertical-align: middle;">
                                                                <center>Ada</center>
                                                            </th>
                                                            <th style="vertical-align: middle;">
                                                                <center>Tidak</center>
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>1</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Aplikasi Permohonan PPR Syariah
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Benar, Lengkap, dan TTD
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="aplikasi_permohonan"
                                                                        value="Ada"
                                                                        {{ $dokNonFixedIncome->aplikasi_permohonan == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="aplikasi_permohonan"
                                                                        value="Tidak"
                                                                        {{ $dokNonFixedIncome->aplikasi_permohonan == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>2</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Copy KTP yang masih berlaku (kecuali KTP Elektronik berlaku
                                                                seumur hidup
                                                                sesuai Surat Kemendagri No: 470/295/SJ, 29 Jan 2016)
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                KTP Asli, Photo sama, Umur, dan Sesuai KK
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="copy_ktp"
                                                                        value="Ada"
                                                                        {{ $dokNonFixedIncome->copy_ktp == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="copy_ktp"
                                                                        value="Tidak"
                                                                        {{ $dokNonFixedIncome->copy_ktp == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>3</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Copy Kartu Keluarga
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                KK Asli, Sesuai dengan KTP, dan Jumlah Tanggungan
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="copy_kk"
                                                                        value="Ada"
                                                                        {{ $dokNonFixedIncome->copy_kk == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="copy_kk"
                                                                        value="Tidak"
                                                                        {{ $dokNonFixedIncome->copy_kk == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>4</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Copy Surat Nikah/Cerai </td>
                                                            <td style="vertical-align: middle;">
                                                                SN Asli, Kesesuaian dengan KTP dan KK
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="copy_sn_sc"
                                                                        value="Ada"
                                                                        {{ $dokNonFixedIncome->copy_sn_sc == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="copy_sn_sc"
                                                                        value="Tidak"
                                                                        {{ $dokNonFixedIncome->copy_sn_sc == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>5</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Pasphoto Pemohon dan Pasangan (Suami/Istri) berwarna yang
                                                                terbaru
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Sesuai dengan KTP dan Surat Nikah
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio"
                                                                        name="foto_pemohon_pasangan" value="Ada"
                                                                        {{ $dokNonFixedIncome->foto_pemohon_pasangan == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio"
                                                                        name="foto_pemohon_pasangan" value="Tidak"
                                                                        {{ $dokNonFixedIncome->foto_pemohon_pasangan == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>6</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Surat Keterangan Penghasilan, Buku-Buku Catatan Kas Masuk
                                                                dan
                                                                Kas Keluar
                                                                (Cash Flow), Bukti-Bukti Penjualan, Bukti-Bukti Rekapitulasi
                                                                Biaya-biaya, Bukti Diskon dan Pengembalian Penjualan
                                                                (Retur),
                                                                Bukti
                                                                Pajak Penghasilan, setiap bulan selama 3 (tiga) tahun
                                                                terakhir
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Kebenaran, Kecukupan untuk Angsuran, Kewajaran. Kesesuaian
                                                                dengan Copy
                                                                Buku Tabungan/Giro
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="sk_penghasilan"
                                                                        value="Ada"
                                                                        {{ $dokNonFixedIncome->sk_penghasilan == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="sk_penghasilan"
                                                                        value="Tidak"
                                                                        {{ $dokNonFixedIncome->sk_penghasilan == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>7</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Copy Rekening Tabungan/Giro tempat menyimpan asli
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Kesesuaian jumlah dengan copy Buku Tabungan/Giro dan
                                                                konsisten
                                                                selama 3
                                                                (tiga) tahun
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio"
                                                                        name="copy_tabungan_menyimpan" value="Ada"
                                                                        {{ $dokNonFixedIncome->copy_tabungan_menyimpan == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio"
                                                                        name="copy_tabungan_menyimpan" value="Tidak"
                                                                        {{ $dokNonFixedIncome->copy_tabungan_menyimpan == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>8</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Copy Akta Perusahaan, Izin Usaha/Praktik, SIUP/TDP
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Kesesuaian Legalitas dan tidak liar
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio"
                                                                        name="copy_akta_izin_usaha" value="Ada"
                                                                        {{ $dokNonFixedIncome->copy_akta_izin_usaha == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio"
                                                                        name="copy_akta_izin_usaha" value="Tidak"
                                                                        {{ $dokNonFixedIncome->copy_akta_izin_usaha == 'Tidak' ? 'checked' : '' }} />
                                                                </center>F
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>9</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Copy Rekening Tabungan/Giro di Bank (di Bank di mana Pemohon
                                                                mengambil
                                                                PPR Syariah)
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Sebagai persyaratan PPR Syariah
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio"
                                                                        name="copy_tabungan_mengambil" value="Ada"
                                                                        {{ $dokNonFixedIncome->copy_tabungan_mengambil == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio"
                                                                        name="copy_tabungan_mengambil" value="Tidak"
                                                                        {{ $dokNonFixedIncome->copy_tabungan_mengambil == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>10</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                NPWP dan Bukti Potongan Pajak Penghasilan
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Legalitas
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="npwp_bukti_pp"
                                                                        value="Ada"
                                                                        {{ $dokNonFixedIncome->npwp_bukti_pp == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio" name="npwp_bukti_pp"
                                                                        value="Tidak"
                                                                        {{ $dokNonFixedIncome->npwp_bukti_pp == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <center>11</center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Laporan Keuangan Perusahaan
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                Kewargaan Sesuai Rekening Tabungan/Giro dan Kecukupan
                                                                Angsuran
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio"
                                                                        name="laporan_keuangan_perusahaan"
                                                                        value="Ada"
                                                                        {{ $dokNonFixedIncome->laporan_keuangan_perusahaan == 'Ada' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <center><input type="radio"
                                                                        name="laporan_keuangan_perusahaan"
                                                                        value="Tidak"
                                                                        {{ $dokNonFixedIncome->laporan_keuangan_perusahaan == 'Tidak' ? 'checked' : '' }} />
                                                                </center>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="d-flex justify-content-between mt-3">
                                                <button class="btn btn-primary btn-prev" type="button">
                                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                </button>
                                                <button class="btn btn-primary btn-next" type="button">
                                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                    <i data-feather="arrow-right"
                                                        class="align-middle ms-sm-25 ms-0"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Form Check List Dokumen Agunan Calon Nasabah PPR Syariah -->
                                    <div id="formCheckListDokumenCalonNasabahAgunan" class="content" role="tabpanel"
                                        aria-labelledby="check-list-dokumen-agunan-calon-nasabah-trigger">
                                        <div>
                                            <h4>Form Check List Dokumen Agunan Calon Nasabah PPR Syariah
                                            </h4>
                                            <hr />
                                            <h5>Kelengkapan dokumen yang harus dilampirkan untuk
                                                mempercepat
                                                proses PPR
                                                Syariah:
                                            </h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="vertical-align: middle;">No.</th>
                                                        <th style="vertical-align: middle;">
                                                            <center>Dokumen Calon Nasabah PPR Syariah
                                                            </center>
                                                        </th>
                                                        <th style="vertical-align: middle;">
                                                            <center>Sumber Data Verifikasi</center>
                                                        </th>
                                                        <th style="vertical-align: middle;">
                                                            <center>Ada</center>
                                                        </th>
                                                        <th style="vertical-align: middle;">
                                                            <center>Tidak</center>
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>1</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Copy SHGB/SHM Rumah
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Clearance ke BPN
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="copy_shgb_shm"
                                                                    value="Ada"
                                                                    {{ $dokumen->dokAgunan->copy_shgb_shm == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="copy_shgb_shm"
                                                                    value="Tidak"
                                                                    {{ $dokumen->dokAgunan->copy_shgb_shm == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>2</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Copy SHGB Induk untuk Rumah yang masih
                                                            dibangun
                                                            oleh
                                                            Developer
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Minta ke Developer hasil Clearance ke BPN
                                                            dan
                                                            Kwitansi dalam
                                                            pengurusan
                                                            Splizing
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="copy_shgb_proses"
                                                                    value="Ada"
                                                                    {{ $dokumen->dokAgunan->copy_shgb_proses == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="copy_shgb_proses"
                                                                    value="Tidak"
                                                                    {{ $dokumen->dokAgunan->copy_shgb_proses == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>3</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Copy IMB Rumah
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Cek ke Tata Kota
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="copy_imb"
                                                                    value="Ada"
                                                                    {{ $dokumen->dokAgunan->copy_imb == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="copy_imb"
                                                                    value="Tidak"
                                                                    {{ $dokumen->dokAgunan->copy_imb == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>4</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Copy IMB Induk untuk Rumah yang masih
                                                            dibangun
                                                            oleh
                                                            Developer
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Cek ke Tata Kota dan Kwitansi dalam
                                                            pengurusan
                                                            pemecahan
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="copy_imb_proses"
                                                                    value="Ada"
                                                                    {{ $dokumen->dokAgunan->copy_imb_proses == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="copy_imb_proses"
                                                                    value="Tidak"
                                                                    {{ $dokumen->dokAgunan->copy_imb_proses == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>enter>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="d-flex justify-content-between mt-3">
                                            <button class="btn btn-primary btn-prev" type="button">
                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next" type="button">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                            </button>
                                        </div>
                                    </div>

                                    @if ($pembiayaan->jenis_nasabah == 'Fixed Income')
                                        <!-- Form Ability to Repay Fixed Income -->
                                        <div id="formAbilityToRepayFixedIncome" class="content" role="tabpanel"
                                            aria-labelledby="ability-repay-fixed-income-trigger">
                                            <div>
                                                <h4>Form Ability To Repay Fixed Income</h4>
                                                <hr />
                                                <h5>Isi data:
                                                </h5>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th style="vertical-align: middle;" rowspan="2">
                                                                <center>Komponen Pendapatan</center>
                                                            </th>
                                                            <th style="vertical-align: middle;" colspan="2">
                                                                <center>Penghasilan Pemohon</center>
                                                            </th>
                                                            <th style="vertical-align: middle;">
                                                                <center>Pasangan</center>
                                                            </th>

                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: middle;">
                                                                <center>Gaji 1</center>
                                                            </th>
                                                            <th style="vertical-align: middle;">
                                                                <center>Gaji 2</center>
                                                            </th>
                                                            <th style="vertical-align: middle;">
                                                                <center>Suami/Istri</center>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <b>Gaji Kotor Per Bulan (Sesuai Slip
                                                                    Gaji)</b>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="gajiKotor1"
                                                                    class="form-control numeral-mask29"
                                                                    name="gaji1_gaji_kotor"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Gaji 1" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="gajiKotor2"
                                                                    class="form-control numeral-mask30"
                                                                    name="gaji2_gaji_kotor"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Gaji 2" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="gajiKotorP"
                                                                    class="form-control numeral-mask31"
                                                                    name="gaji_pasangan_gaji_kotor"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Gaji Suami/Istri" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                1. Potongan THT
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="thtGaji1"
                                                                    class="form-control numeral-mask32"
                                                                    name="gaji1_potongan_tht"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Potongan THT" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="thtGaji2"
                                                                    class="form-control numeral-mask33"
                                                                    name="gaji2_potongan_tht"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Potongan THT" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="thtGajiP"
                                                                    class="form-control numeral-mask34"
                                                                    name="gaji_pasangan_potongan_tht"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Potongan THT" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                2. Potongan Jamsostek
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="jamsostekGaji1"
                                                                    class="form-control numeral-mask35"
                                                                    name="gaji1_potongan_jamsostek"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Potongan Jamsostek" />
                                                            </td>
                                                            <td
                                                                style="vertical-align:
                                                                    middle;">
                                                                <input type="text" id="jamsostekGaji2"
                                                                    class="form-control numeral-mask36"
                                                                    name="gaji2_potongan_jamsostek"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Potongan Jamsostek" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="jamsostekGajiP"
                                                                    class="form-control numeral-mask37"
                                                                    name="gaji_pasangan_potongan_jamsostek"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Potongan Jamsostek" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                3. Potongan Koperasi Perusahaan
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="koperasiGaji1"
                                                                    class="form-control numeral-mask38"
                                                                    name="gaji1_potongan_koperasi"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Potongan Koperasi" />
                                                            </td>
                                                            <td
                                                                style="vertical-align:
                                                                    middle;">
                                                                <input type="text" id="koperasiGaji2"
                                                                    class="form-control numeral-mask39"
                                                                    name="gaji2_potongan_koperasi"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Potongan Koperasi" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="koperasiGajiP"
                                                                    class="form-control numeral-mask40"
                                                                    name="gaji_pasangan_potongan_koperasi"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Potongan Koperasi" />
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                4. Potongan lain-lain
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="lainGaji1"
                                                                    class="form-control numeral-mask41"
                                                                    name="gaji1_potongan_lain"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Potongan lain-lain" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="lainGaji2"
                                                                    class="form-control numeral-mask42"
                                                                    name="gaji2_potongan_lain"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Potongan lain-lain" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="lainGajiP"
                                                                    class="form-control numeral-mask43"
                                                                    name="gaji_pasangan_potongan_lain"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Potongan lain-lain" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <b>Gaji Bersih Calon Nasabah</b>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="gajiBersih1Dummy"
                                                                    class="form-control" placeholder="Gaji Bersih 1"
                                                                    disabled />
                                                                <input type="hidden" id="gajiBersih1"
                                                                    name="gaji1_gaji_bersih" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="gajiBersih2Dummy"
                                                                    class="form-control" placeholder="Gaji Bersih 2"
                                                                    disabled />
                                                                <input type="hidden" id="gajiBersih2"
                                                                    name="gaji2_gaji_bersih" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="gajiBersihPDummy"
                                                                    class="form-control"
                                                                    placeholder="Gaji Bersih Suami/Istri" disabled />
                                                                <input type="hidden" id="gajiBersihP"
                                                                    name="gaji_pasangan_gaji_bersih" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <br />
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th style="vertical-align: middle;">
                                                                <center>Keterangan</center>
                                                            </th>
                                                            <th style="vertical-align: middle;">
                                                                <center>Sub Total</center>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <b>Pembayaran Kewajiban Rutin Per Bulan</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                1. Angsuran Pembiayaan Rumah
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="angsuranRumah"
                                                                    class="form-control numeral-mask44"
                                                                    name="angsuran_rumah"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Angsuran Pembiayaan Rumah" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                2. Angsuran Pembiayaan Mobil
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="angsuranMobil"
                                                                    class="form-control numeral-mask45"
                                                                    name="angsuran_mobil"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Angsuran Pembiayaan Mobil" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                3. Angsuran Pembiayaan Lainnya
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="angsuranLainnya"
                                                                    class="form-control numeral-mask46"
                                                                    name="angsuran_lain" onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Angsuran Pembiayaan Lainnya" />
                                                        </tr>

                                                        {{-- <section id="form-repeater-angsuran-lainnya">
                                                            <div class="row">
                                                                <div class="mb-1 col-md-12">
                                                                    <div class="repeater-default">
                                                                        <div data-repeater-list="angsuran-lainnya">
                                                                            <div data-repeater-item>
                                                                                <div class="row d-flex align-items-end">

                                                                                    <tr>
                                                                                        <td style="vertical-align: middle;">

                                                                                            <label class="form-label"
                                                                                                for="namabankp">3. Angsuran
                                                                                                Pembiayaan
                                                                                                Lainnya</label>
                                                                                            <input type="text" id="angsuranLainnya"
                                                                                                class="form-control" name=""
                                                                                                placeholder="Sub Total"
                                                                                                onkeyup="sum(this.value);"
                                                                                                oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />

                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="vertical-align: middle;">

                                                                                            <button class="btn btn-icon btn-primary"
                                                                                                type="button" data-repeater-create>
                                                                                                <i data-feather="plus"
                                                                                                    class="me-25"></i>

                                                                                            </button>

                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="vertical-align: middle;">

                                                                                            <button
                                                                                                class="btn btn-outline-danger text-nowrap px-1"
                                                                                                data-repeater-delete type="button">
                                                                                                <i data-feather="x"
                                                                                                    class="me-25"></i>

                                                                                            </button>

                                                                                        </td>
                                                                                    </tr>

                                                                                </div>
                                                                                <hr />
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section> --}}
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <b>Total Pembayaran Kewajiban Rutin Per
                                                                    Bulan</b>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="totalKewajibanRutinDummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="totalKewajibanRutin"
                                                                    name="total_angsuran" />
                                                            </td>
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <b>Biaya Hidup Per Bulan</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                1. Biaya Pangan
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaPangan"
                                                                    class="form-control numeral-mask47"
                                                                    name="biaya_pangan" onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Biaya Pangan" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                2. Biaya Sandang
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaSandang"
                                                                    class="form-control numeral-mask48"
                                                                    name="biaya_sandang" onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Biaya Sandang" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                3. Biaya Transportasi
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaTransportasi"
                                                                    class="form-control numeral-mask49"
                                                                    name="biaya_transportasi"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Biaya Transportasi" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                4. Biaya Listrik
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaListrik"
                                                                    class="form-control numeral-mask50"
                                                                    name="biaya_listrik" onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Biaya Listrik" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                5. Biaya Telepon
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaTelepon"
                                                                    class="form-control numeral-mask51"
                                                                    name="biaya_telepon" onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Biaya Telepon" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                6. Biaya Gas
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaGas"
                                                                    class="form-control numeral-mask52" name="biaya_gas"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Biaya Gas" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                7. Biaya Air
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaAir"
                                                                    class="form-control numeral-mask53" name="biaya_air"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Biaya Air" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                8. Biaya Pendidikan
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaPendidikan"
                                                                    class="form-control numeral-mask54"
                                                                    name="biaya_pendidikan"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Biaya Pendidikan" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                9. Biaya Kesehatan
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaKesehatan"
                                                                    class="form-control numeral-mask55"
                                                                    name="biaya_kesehatan"
                                                                    onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Biaya Kesehatan" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                10. Biaya Lain-lain
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaLain"
                                                                    class="form-control numeral-mask56"
                                                                    name="biaya_lain" onkeyup="sumFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                                    placeholder="Biaya Lain-lain" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <b>Total Biaya Hidup Per Bulan</b>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="totalBiayaHidupDummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="totalBiayaHidup"
                                                                    name="total_biaya_per_bulan" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <b>Total Penghasilan Bersih Calon Nasabah
                                                                    Per
                                                                    Bulan</b>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="totalPenghasilanBersihDummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="totalPenghasilanBersih"
                                                                    name="total_penghasilan_bersih_per_bulan" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="d-flex justify-content-between mt-3">
                                                <button class="btn btn-primary btn-prev" type="button">
                                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                </button>
                                                <button class="btn btn-primary btn-next" type="button">
                                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                    <i data-feather="arrow-right"
                                                        class="align-middle ms-sm-25 ms-0"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @else
                                        <!-- Form Ability to Repay Non Fixed Income -->
                                        <div id="formAbilityToRepayNonFixedIncome" class="content" role="tabpanel"
                                            aria-labelledby="ability-repay-non-fixed-income-trigger">
                                            <div>
                                                <h4>Form Ability To Repay Non Fixed Income</h4>
                                                <hr />
                                                <h5>Isi data:
                                                </h5>

                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th style="vertical-align: middle;" rowspan="2">
                                                                <center>Komponen Pendapatan & Biaya</center>
                                                            </th>
                                                            <th style="vertical-align: middle;" colspan="2">
                                                                <center>Penghasilan Pemohon</center>
                                                            </th>
                                                            <th style="vertical-align: middle;">
                                                                <center>Pasangan</center>
                                                            </th>

                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align: middle;">
                                                                <center>Usaha 1</center>
                                                            </th>
                                                            <th style="vertical-align: middle;">
                                                                <center>Usaha 2</center>
                                                            </th>
                                                            <th style="vertical-align: middle;">
                                                                <center>Suami/Istri</center>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="vertical-align: middle;" colspan="4">
                                                                <b>Penjualan</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                1. Penjualan
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="penjualanNF1"
                                                                    class="form-control numeral-mask57"
                                                                    name="usaha1_penjualan" placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="penjualanNF2"
                                                                    class="form-control numeral-mask58"
                                                                    name="usaha2_penjualan" placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="penjualanNFP"
                                                                    class="form-control numeral-mask59"
                                                                    name="usaha_pasangan_penjualan"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                2. Potongan Harga/Diskon
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="diskonNF1"
                                                                    class="form-control numeral-mask60"
                                                                    name="usaha1_diskon" placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="diskonNF2"
                                                                    class="form-control numeral-mask61"
                                                                    name="usaha2_diskon" placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="diskonNFP"
                                                                    class="form-control numeral-mask62"
                                                                    name="usaha_pasangan_diskon" placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                3. Retur Penjualan
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="returNF1"
                                                                    class="form-control numeral-mask63"
                                                                    name="usaha1_retur" placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="returNF2"
                                                                    class="form-control numeral-mask64"
                                                                    name="usaha2_retur" placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="returNFP"
                                                                    class="form-control numeral-mask65"
                                                                    name="usaha_pasangan_retur" placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <b>Penjualan Bersih</b>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="penjualanBersihNF1Dummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="penjualanBersihNF1"
                                                                    class="form-control"
                                                                    name="usaha1_penjualan_bersih" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="penjualanBersihNF2Dummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="penjualanBersihNF2"
                                                                    class="form-control"
                                                                    name="usaha2_penjualan_bersih" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="penjualanBersihNFPDummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="penjualanBersihNFP"
                                                                    class="form-control"
                                                                    name="usaha_pasangan_penjualan_bersih" />
                                                            </td>
                                                        </tr>
                                                        <tr style="height: 25px"></tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;" colspan="4">
                                                                <b>Harga Pokok Penjualan</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                1. Persediaan Barang Langsung
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="persediaanBarangNF1"
                                                                    class="form-control numeral-mask66"
                                                                    name="usaha1_persediaan_barang_langsung"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="persediaanBarangNF2"
                                                                    class="form-control numeral-mask67"
                                                                    name="usaha2_persediaan_barang_langsung"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="persediaanBarangNFP"
                                                                    class="form-control numeral-mask68"
                                                                    name="usaha_pasangan_persediaan_barang_langsung"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                2. Pembelian Bahan Langsung
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="pembelianBahanNF1"
                                                                    class="form-control numeral-mask69"
                                                                    name="usaha1_pembelian_bahan_langsung"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="pembelianBahanNF2"
                                                                    class="form-control numeral-mask70"
                                                                    name="usaha2_pembelian_bahan_langsung"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="pembelianBahanNFP"
                                                                    class="form-control numeral-mask71"
                                                                    name="usaha_pasangan_pembelian_bahan_langsung"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                3. Upah Langsung
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="upahLangsungNF1"
                                                                    class="form-control numeral-mask72"
                                                                    name="usaha1_upah_langsung" placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="upahLangsungNF2"
                                                                    class="form-control numeral-mask73"
                                                                    name="usaha2_upah_langsung" placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="upahLangsungNFP"
                                                                    class="form-control numeral-mask74"
                                                                    name="usaha_pasangan_upah_langsung"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                Biaya Over Head
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="totalBohNF1Dummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="totalBohNF1"
                                                                    class="form-control" name="usaha1_total_boh" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="totalBohNF2Dummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="totalBohNF2"
                                                                    class="form-control" name="usaha2_total_boh" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="totalBohNFPDummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="totalBohNFP"
                                                                    class="form-control"
                                                                    name="usaha_pasangan_total_boh" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                &ensp; a. Upah Tenaga Kerja Tidak Langsung
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="upahTidakLangsungNF1"
                                                                    class="form-control numeral-mask75"
                                                                    name="usaha1_upah_tidak_langsung"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="upahTidakLangsungNF2"
                                                                    class="form-control numeral-mask76"
                                                                    name="usaha2_upah_tidak_langsung"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="upahTidakLangsungNFP"
                                                                    class="form-control numeral-mask77"
                                                                    name="usaha_pasangan_upah_tidak_langsung"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                &ensp; b. Biaya Penyusutan
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="penyusutanNF1"
                                                                    class="form-control numeral-mask78"
                                                                    name="usaha1_biaya_penyusutan"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="penyusutanNF2"
                                                                    class="form-control numeral-mask79"
                                                                    name="usaha2_biaya_penyusutan"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="penyusutanNFP"
                                                                    class="form-control numeral-mask80"
                                                                    name="usaha_pasangan_biaya_penyusutan"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                &ensp; c. BOH lain-lain
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="bohLainNF1"
                                                                    class="form-control numeral-mask81"
                                                                    name="usaha1_boh_lain" placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="bohLainNF2"
                                                                    class="form-control numeral-mask82"
                                                                    name="usaha2_boh_lain" placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="bohLainNFP"
                                                                    class="form-control numeral-mask83"
                                                                    name="usaha_pasangan_boh_lain"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <b>Jumlah Harga Pokok Penjualan</b>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text"
                                                                    id="jmlHargaPokokPenjualanNF1Dummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="jmlHargaPokokPenjualanNF1"
                                                                    class="form-control"
                                                                    name="usaha1_jumlah_harga_pokok_penjualan" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text"
                                                                    id="jmlHargaPokokPenjualanNF2Dummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="jmlHargaPokokPenjualanNF2"
                                                                    class="form-control"
                                                                    name="usaha2_jumlah_harga_pokok_penjualan" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text"
                                                                    id="jmlHargaPokokPenjualanNFPDummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="jmlHargaPokokPenjualanNFP"
                                                                    class="form-control"
                                                                    name="usaha_pasangan_jumlah_harga_pokok_penjualan" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <b>Laba Kotor</b>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="labaKotorNF1Dummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="labaKotorNF1"
                                                                    class="form-control" name="usaha1_laba_kotor" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="labaKotorNF2Dummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="labaKotorNF2"
                                                                    class="form-control" name="usaha2_laba_kotor" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="labaKotorNFPDummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="labaKotorNFP"
                                                                    class="form-control"
                                                                    name="usaha_pasangan_laba_kotor" />
                                                            </td>
                                                        </tr>
                                                        <tr style="height: 25px"></tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;" colspan="4">
                                                                <b>Biaya Administrasi</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                1. Biaya Penjualan
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaPenjualanNF1"
                                                                    class="form-control numeral-mask84"
                                                                    name="usaha1_biaya_penjualan"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaPenjualanNF2"
                                                                    class="form-control numeral-mask85"
                                                                    name="usaha2_biaya_penjualan"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaPenjualanNFP"
                                                                    class="form-control numeral-mask86"
                                                                    name="usaha_pasangan_biaya_penjualan"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                2. Biaya Gaji Komisaris, Direksi & Staff
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text"
                                                                    id="biayaGajiKomisarisDireksiStaffNF1"
                                                                    class="form-control numeral-mask87"
                                                                    name="usaha1_biaya_gaji_kds" placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text"
                                                                    id="biayaGajiKomisarisDireksiStaffNF2"
                                                                    class="form-control numeral-mask88"
                                                                    name="usaha2_biaya_gaji_kds" placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text"
                                                                    id="biayaGajiKomisarisDireksiStaffNFP"
                                                                    class="form-control numeral-mask89"
                                                                    name="usaha_pasangan_biaya_gaji_kds"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                3. Biaya Listrik, Telepon, Air
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaListrikTeleponAirNF1"
                                                                    class="form-control numeral-mask90"
                                                                    name="usaha1_biaya_lisrik_telp_air"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaListrikTeleponAirNF2"
                                                                    class="form-control numeral-mask91"
                                                                    name="usaha2_biaya_lisrik_telp_air"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaListrikTeleponAirNFP"
                                                                    class="form-control numeral-mask92"
                                                                    name="usaha_pasangan_biaya_lisrik_telp_air"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                4. Biaya Perawatan Gedung
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaPerawatanGedungNF1"
                                                                    class="form-control numeral-mask93"
                                                                    name="usaha1_biaya_perawatan_gedung"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaPerawatanGedungNF2"
                                                                    class="form-control numeral-mask94"
                                                                    name="usaha2_biaya_perawatan_gedung"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaPerawatanGedungNFP"
                                                                    class="form-control numeral-mask95"
                                                                    name="usaha_pasangan_biaya_perawatan_gedung"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                5. Biaya Bagi Hasil, Sewa, Margin
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaBagiHasilSewaMarginNF1"
                                                                    class="form-control numeral-mask96"
                                                                    name="usaha1_biaya_bagi_hasil_sewa_margin"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaBagiHasilSewaMarginNF2"
                                                                    class="form-control numeral-mask97"
                                                                    name="usaha2_biaya_bagi_hasil_sewa_margin"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaBagiHasilSewaMarginNFP"
                                                                    class="form-control numeral-mask98"
                                                                    name="usaha_pasangan_biaya_bagi_hasil_sewa_margin"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                6. Biaya Administrasi lain-lain
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaAdmLainNF1"
                                                                    class="form-control numeral-mask99"
                                                                    name="usaha1_jml_biaya_adm" placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaAdmLainNF2"
                                                                    class="form-control numeral-mask100"
                                                                    name="usaha2_jml_biaya_adm" placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="biayaAdmLainNFP"
                                                                    class="form-control numeral-mask101"
                                                                    name="usaha_pasangan_biaya_adm_lain"
                                                                    placeholder="Sub Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <b>Jumlah Biaya Administrasi</b>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="jmlBiayaAdmNF1Dummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="jmlBiayaAdmNF1"
                                                                    class="form-control" name="usaha1_jml_biaya_adm" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="jmlBiayaAdmNF2Dummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="jmlBiayaAdmNF2"
                                                                    class="form-control" name="usaha2_jml_biaya_adm" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="jmlBiayaAdmNFPDummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="jmlBiayaAdmNFP"
                                                                    class="form-control"
                                                                    name="usaha_pasangan_jml_biaya_adm" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <b>Laba/Penghasilan Bersih Sebelum Pajak</b>
                                                            </td>

                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="labaSebelumPajakNF1Dummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="labaSebelumPajakNF1"
                                                                    class="form-control"
                                                                    name="usaha1_laba_sebelum_pajak" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="labaSebelumPajakNF2Dummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="labaSebelumPajakNF2"
                                                                    class="form-control"
                                                                    name="usaha2_laba_sebelum_pajak" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="labaSebelumPajakNFPDummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="labaSebelumPajakNFP"
                                                                    class="form-control"
                                                                    name="usaha_pasangan_laba_sebelum_pajak" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                Pajak/Zakat
                                                            </td>

                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="pajakZakatNF1"
                                                                    class="form-control numeral-mask101"
                                                                    name="usaha1_pajak_zakat" placeholder="Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="pajakZakatNF2"
                                                                    class="form-control numeral-mask102"
                                                                    name="usaha2_pajak_zakat" placeholder="Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="pajakZakatNFP"
                                                                    class="form-control numeral-mask103"
                                                                    name="usaha_pasangan_pajak_zakat"
                                                                    placeholder="Total"
                                                                    onkeyup="sumNonFixed(this.value);"
                                                                    oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <b>Laba/Penghasilan Bersih Setelah Pajak</b>
                                                            </td>

                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="labaSetelahPajakNF1Dummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="labaSetelahPajakNF1"
                                                                    class="form-control"
                                                                    name="usaha1_laba_setelah_pajak" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="labaSetelahPajakNF2Dummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="labaSetelahPajakNF2"
                                                                    class="form-control"
                                                                    name="usaha2_laba_setelah_pajak" />
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <input type="text" id="labaSetelahPajakNFPDummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden" id="labaSetelahPajakNFP"
                                                                    class="form-control"
                                                                    name="usaha_pasangan_laba_setelah_pajak" />
                                                            </td>
                                                        </tr>
                                                        <tr></tr>
                                                        <tr>
                                                            <td style="vertical-align: middle;">
                                                                <b>Total Penghasilan Bersih Calon Nasabah Per Bulan</b>
                                                            </td>
                                                            <td style="vertical-align: middle;" colspan="3">
                                                                <input type="text"
                                                                    id="totalPenghasilanBersihPerBulanDummy"
                                                                    class="form-control" placeholder="Total" disabled />
                                                                <input type="hidden"
                                                                    id="totalPenghasilanBersihPerBulan"
                                                                    class="form-control"
                                                                    name="total_penghasilan_bersih" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="d-flex justify-content-between mt-3">
                                                <button class="btn btn-primary btn-prev">
                                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                </button>
                                                <button class="btn btn-primary btn-next">
                                                    <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                    <i data-feather="arrow-right"
                                                        class="align-middle ms-sm-25 ms-0"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Form Pemberkasan Memo -->
                                    <div id="formPemberkasanMemo" class="content" role="tabpanel"
                                        aria-labelledby="pemberkasan-memo-trigger">
                                        <div>
                                            <h4>Form Pemberkasan Memo Pengajuan Pembiayaan PPR Syariah
                                            </h4>
                                            <hr />
                                            <h5>Pengecekan pemberkasan memo pengajuan pembiayaan PPR
                                                Syariah:
                                            </h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="vertical-align: middle;">
                                                            <center>No.</center>
                                                        </th>
                                                        <th style="vertical-align: middle;">
                                                            <center>Berkas</center>
                                                        </th>
                                                        <th style="vertical-align: middle;">
                                                            <center>Ada</center>
                                                        </th>
                                                        <th style="vertical-align: middle;">
                                                            <center>Tidak</center>
                                                        </th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>1</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Check List Persyaratan
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="cl_persyaratan"
                                                                    value="Ada"
                                                                    {{ $dokumen->pemberkasanMemo->cl_persyaratan == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="cl_persyaratan"
                                                                    value="Tidak"
                                                                    {{ $dokumen->pemberkasanMemo->cl_persyaratan == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>2</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Check List Dokumen
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="cl_dokumen"
                                                                    value="Ada"
                                                                    {{ $dokumen->pemberkasanMemo->cl_dokumen == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="cl_dokumen"
                                                                    value="Tidak"
                                                                    {{ $dokumen->pemberkasanMemo->cl_dokumen == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>3</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Berkas-berkas Copy Dokumen
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="berkas_copy"
                                                                    value="Ada"
                                                                    {{ $dokumen->pemberkasanMemo->berkas_copy == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="berkas_copy"
                                                                    value="Tidak"
                                                                    {{ $dokumen->pemberkasanMemo->berkas_copy == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>4</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Kertas Kerja Hasil Wawancara
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="paper_hasil_wawancara"
                                                                    value="Ada"
                                                                    {{ $dokumen->pemberkasanMemo->paper_hasil_wawancara == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="paper_hasil_wawancara"
                                                                    value="Tidak"
                                                                    {{ $dokumen->pemberkasanMemo->paper_hasil_wawancara == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>5</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Kertas Kerja Analisa 5C
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="paper_analisa_5c"
                                                                    value="Ada"
                                                                    {{ $dokumen->pemberkasanMemo->paper_analisa_5c == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="paper_analisa_5c"
                                                                    value="Tidak"
                                                                    {{ $dokumen->pemberkasanMemo->paper_analisa_5c == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>6</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Kertas Kerja Analisa Financing Scoring Model
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="paper_fsm"
                                                                    value="Ada"
                                                                    {{ $dokumen->pemberkasanMemo->paper_fsm == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="paper_fsm"
                                                                    value="Tidak"
                                                                    {{ $dokumen->pemberkasanMemo->paper_fsm == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>7</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Kertas Kerja Hasil OTS
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="paper_ots"
                                                                    value="Ada"
                                                                    {{ $dokumen->pemberkasanMemo->paper_ots == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="paper_ots"
                                                                    value="Tidak"
                                                                    {{ $dokumen->pemberkasanMemo->paper_ots == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>8</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Laporan Hasil Penilaian Agunan/Jaminan
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio"
                                                                    name="laporan_hasil_penilaian_agunan" value="Ada"
                                                                    {{ $dokumen->pemberkasanMemo->laporan_hasil_penilaian_agunan == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio"
                                                                    name="laporan_hasil_penilaian_agunan" value="Tidak"
                                                                    {{ $dokumen->pemberkasanMemo->laporan_hasil_penilaian_agunan == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>9</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Perhitungan Plafond PPR Syariah dan FTV
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="perhitungan_plafond_ftv"
                                                                    value="Ada"
                                                                    {{ $dokumen->pemberkasanMemo->perhitungan_plafond_ftv == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="perhitungan_plafond_ftv"
                                                                    value="Tidak"
                                                                    {{ $dokumen->pemberkasanMemo->perhitungan_plafond_ftv == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: middle;">
                                                            <center>10</center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            Daftar Calon Nasabah (DCD)
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="daftar_calon_nasabah"
                                                                    value="Ada"
                                                                    {{ $dokumen->pemberkasanMemo->daftar_calon_nasabah == 'Ada' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                        <td style="vertical-align: middle;">
                                                            <center><input type="radio" name="daftar_calon_nasabah"
                                                                    value="Tidak"
                                                                    {{ $dokumen->pemberkasanMemo->daftar_calon_nasabah == 'Tidak' ? 'checked' : '' }} />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="d-flex justify-content-between mt-3">
                                            <button class="btn btn-primary btn-prev">
                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-success btn-submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="tab-pane" id="scoring" role="tabpanel" aria-labelledby="scoring-justified">
                    <section id="section_scoring" class="modern-horizontal-wizard">
                        <div class="bs-stepper wizard-modern modern-wizard-example">
                            <div class="bs-stepper-header">
                                <div class="nav nav-tabs nav-justified" id="scoring-nav" role="tablist">
                                    <div class="step active" href="#formAnalisaCharacter" data-bs-toggle="tab"
                                        role="tab" id="formAnalisaCharacter-tab-justified"
                                        aria-controls="formAnalisaCharacter" aria-selected="true">
                                        <button type="button" class="step-trigger">
                                            <span class="bs-stepper-box">
                                                <i data-feather="user" class="font-medium-3"></i>
                                            </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">Character</span>
                                                <span class="bs-stepper-subtitle">Isi Data </span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="line">
                                        <i data-feather="chevron-right" class="font-medium-2"></i>
                                    </div>
                                    @if ($pembiayaan->jenis_nasabah == 'Fixed Income')
                                        <div class="step" href="#formAnalisaCapital" data-bs-toggle="tab"
                                            role="tab" id="formAnalisaCapital-tab-justified"
                                            aria-controls="formAnalisaCapital" aria-selected="true">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box">
                                                    <i data-feather="file-text" class="font-medium-3"></i>
                                                </span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Capital</span>
                                                    <span class="bs-stepper-subtitle">Isi Data </span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="line">
                                            <i data-feather="chevron-right" class="font-medium-2"></i>
                                        </div>
                                    @else
                                    @endif
                                    <div class="step" href="#formAnalisaCapacity" data-bs-toggle="tab"
                                        role="tab" id="formAnalisaCapacity-tab-justified"
                                        aria-controls="formAnalisaCapacity" aria-selected="true">
                                        <button type="button" class="step-trigger">
                                            <span class="bs-stepper-box">
                                                <i data-feather="dollar-sign" class="font-medium-3"></i>
                                            </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">Capacity</span>
                                                <span class="bs-stepper-subtitle">Isi Data </span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="line">
                                        <i data-feather="chevron-right" class="font-medium-2"></i>
                                    </div>
                                    <div class="step" href="#formAnalisaConditionSharia" data-bs-toggle="tab"
                                        role="tab" id="formAnalisaConditionSharia-tab-justified"
                                        aria-controls="formAnalisaConditionSharia" aria-selected="true">
                                        <button type="button" class="step-trigger">
                                            <span class="bs-stepper-box">
                                                <i data-feather="users" class="font-medium-3"></i>
                                            </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">Condition & Sharia</span>
                                                <span class="bs-stepper-subtitle">Isi Data</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="line">
                                        <i data-feather="chevron-right" class="font-medium-2"></i>
                                    </div>
                                    <div class="step" href="#formAnalisaCollateral" data-bs-toggle="tab"
                                        role="tab" id="formAnalisaCollateral-tab-justified"
                                        aria-controls="formAnalisaCollateral" aria-selected="true">
                                        <button type="button" class="step-trigger">
                                            <span class="bs-stepper-box">
                                                <i data-feather="book" class="font-medium-3"></i>
                                            </span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">Collateral</span>
                                                <span class="bs-stepper-subtitle">Isi Data </span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="bs-stepper-content">
                                <form action="/ppr/proposal/{{ $pembiayaan->id }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    @if ($pembiayaan->form_cl == 'Telah diisi')
                                        <input type="hidden" name="form_cl" value="Telah diisi" />
                                        <input type="hidden" name="form_score" value="Telah dinilai" />
                                    @else
                                        <input type="hidden" name="form_score" value="Telah dinilai" />
                                    @endif
                                    <!-- Form Analisa Character -->
                                    <div id="formAnalisaCharacter" class="content active" role="tabpanel"
                                        aria-labelledby="character-trigger">
                                        <div>
                                            <h4>Analisa Character</h4>
                                            <hr />
                                            <h5>Tujuan Analisa: Kemauan calon nasabah untuk membayar angsuran (Willingness
                                                to Repay)
                                            </h5><br />
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="midCenter" colspan="3">
                                                            Analisa Karakter
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="midCenter">
                                                            a.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Menggambarkan watak & kepribadian nasabah.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            b.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Bank syariah perlu melakukan analisis terhadap karakter calon
                                                            nasabah
                                                            dengan tujuan untuk mengetahui bahwa calon nasabah mempunyai
                                                            keinginan
                                                            untuk memenuhi kewajiban membayar kembali pembiayaan yang telah
                                                            diterima
                                                            hingga lunas.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            c.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Bank ingin meyakini willingness to repay dari calon nasabah,
                                                            yaitu
                                                            keyakinan bank terhadap kemauan calon nasabah mau memenuhi
                                                            kewajibannya
                                                            sesuai dengan jangka waktu yang telah diperjanjikan.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            d.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Bank ingin mengetahui bahwa calon nasabah mempunyai karakter
                                                            yang
                                                            baik, jujur dan mempunyai komitmen terhadap pembayaran kembali
                                                            pembiayaannya.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <thead>
                                                    <tr>
                                                        <th class="midCenter" colspan="3">
                                                            Sumber Data
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="midCenter">
                                                            a.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Check List Persyaratan dan Dokumen
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter" width="10%">
                                                            b.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Wawancara
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <thead>
                                                    <tr>
                                                        <th class="midCenter" colspan="2" width="50%">
                                                            Variabel Penilaian
                                                        </th>
                                                        <th class="midCenter" width="50%">
                                                            Score
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($pembiayaan->jenis_nasabah == 'Fixed Income')
                                                        <tr>
                                                            <td class="midCenter">
                                                                a.
                                                            </td>
                                                            <td class="midJustify">
                                                                Tempat Bekerja
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="character_tempat_bekerja"
                                                                    id="character_tempat_bekerja">
                                                                    <option label="character_tempat_bekerja" selected
                                                                        disabled>Pilih
                                                                    </option>
                                                                    @foreach ($character_tempat_bekerjas as $character_tempat_bekerja)
                                                                        <option
                                                                            value="{{ $character_tempat_bekerja->rating * $character_tempat_bekerja->bobot }}">
                                                                            {{ $character_tempat_bekerja->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                b.
                                                            </td>
                                                            <td class="midJustify">
                                                                Konsistensi
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="character_konsistensi"
                                                                    id="character_konsistensi">
                                                                    <option label="character_konsistensi" selected
                                                                        disabled>
                                                                        Pilih
                                                                    </option>
                                                                    @foreach ($character_konsistensis as $character_konsistensi)
                                                                        <option
                                                                            value="{{ $character_konsistensi->rating * $character_konsistensi->bobot }}">
                                                                            {{ $character_konsistensi->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                c.
                                                            </td>
                                                            <td class="midJustify">
                                                                Kelengkapan & Validitas Data
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="form-control w-100"
                                                                    name="character_kelengkapan_validitas_data"
                                                                    id="character_kelengkapan_validitas_data">
                                                                    <option label="Pilih" selected disabled>
                                                                    </option>
                                                                    @foreach ($character_kelengkapan_validitas_datas as $character_kelengkapan_validitas_data)
                                                                        <option
                                                                            value="{{ $character_kelengkapan_validitas_data->rating * $character_kelengkapan_validitas_data->bobot }}">
                                                                            {{ $character_kelengkapan_validitas_data->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                d.
                                                            </td>
                                                            <td class="midJustify">
                                                                Pembayaran Angsuran & Kolektif
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="character_pembayaran_angsuran_kolektif"
                                                                    id="character_pembayaran_angsuran_kolektif">
                                                                    <option label="character_pembayaran_angsuran_kolektif"
                                                                        selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($character_pembayaran_angsuran_kolektifs as $character_pembayaran_angsuran_kolektif)
                                                                        <option
                                                                            value="{{ $character_pembayaran_angsuran_kolektif->rating * $character_pembayaran_angsuran_kolektif->bobot }}">
                                                                            {{ $character_pembayaran_angsuran_kolektif->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                e.
                                                            </td>
                                                            <td class="midJustify">
                                                                Pengalaman Pembiayaan
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="character_pengalaman_pembiayaan"
                                                                    id="character_pengalaman_pembiayaan">
                                                                    <option label="character_pengalaman_pembiayaan"
                                                                        selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($character_pengalaman_pembiayaans as $character_pengalaman_pembiayaan)
                                                                        <option
                                                                            value="{{ $character_pengalaman_pembiayaan->rating * $character_pengalaman_pembiayaan->bobot }}">
                                                                            {{ $character_pengalaman_pembiayaan->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                f.
                                                            </td>
                                                            <td class="midJustify">
                                                                Motivasi
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100" name="character_motivasi"
                                                                    id="character_motivasi">
                                                                    <option label="character_motivasi" selected disabled>
                                                                        Pilih
                                                                    </option>
                                                                    @foreach ($character_motivasis as $character_motivasi)
                                                                        <option
                                                                            value="{{ $character_motivasi->rating * $character_motivasi->bobot }}">
                                                                            {{ $character_motivasi->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                g.
                                                            </td>
                                                            <td class="midJustify">
                                                                Referensi
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100" name="character_referensi"
                                                                    id="character_referensi">
                                                                    <option label="character_referensi" selected disabled>
                                                                        Pilih
                                                                    </option>
                                                                    @foreach ($character_referensis as $character_referensi)
                                                                        <option
                                                                            value="{{ $character_referensi->rating * $character_referensi->bobot }}">
                                                                            {{ $character_referensi->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    @elseif ($pembiayaan->jenis_nasabah == 'Non Fixed Income')
                                                        <tr>
                                                            <td class="midCenter">
                                                                a.
                                                            </td>
                                                            <td class="midJustify">
                                                                Tingkat Kepercayaan
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="character_nf_tingkat_kepercayaan"
                                                                    id="character_nf_tingkat_kepercayaan">
                                                                    <option label="Pilih" selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($character_nf_tingkat_kepercayaans as $character_nf_tingkat_kepercayaan)
                                                                        <option
                                                                            value="{{ $character_nf_tingkat_kepercayaan->rating * $character_nf_tingkat_kepercayaan->bobot }}">
                                                                            {{ $character_nf_tingkat_kepercayaan->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                b.
                                                            </td>
                                                            <td class="midJustify">
                                                                Pengelolaan Rekening Bank
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="character_nf_pengelolaan_rekening"
                                                                    id="character_nf_pengelolaan_rekening">
                                                                    <option label="Pilih" selected disabled>
                                                                        Pilih
                                                                    </option>
                                                                    @foreach ($character_nf_pengelolaan_rekenings as $character_nf_pengelolaan_rekening)
                                                                        <option
                                                                            value="{{ $character_nf_pengelolaan_rekening->rating * $character_nf_pengelolaan_rekening->bobot }}">
                                                                            {{ $character_nf_pengelolaan_rekening->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                c.
                                                            </td>
                                                            <td class="midJustify">
                                                                Reputasi Bisnis
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="form-control w-100"
                                                                    name="character_nf_reputasi_bisnis"
                                                                    id="character_nf_reputasi_bisnis">
                                                                    <option label="Pilih" selected disabled>
                                                                    </option>
                                                                    @foreach ($character_nf_reputasi_bisnises as $character_nf_reputasi_bisnis)
                                                                        <option
                                                                            value="{{ $character_nf_reputasi_bisnis->rating * $character_nf_reputasi_bisnis->bobot }}">
                                                                            {{ $character_nf_reputasi_bisnis->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                d.
                                                            </td>
                                                            <td class="midJustify">
                                                                Perilaku Pribadi Debitur
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="character_nf_perilaku_pribadi"
                                                                    id="character_nf_perilaku_pribadi">
                                                                    <option label="Pilih" selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($character_nf_perilaku_pribadis as $character_nf_perilaku_pribadi)
                                                                        <option
                                                                            value="{{ $character_nf_perilaku_pribadi->rating * $character_nf_perilaku_pribadi->bobot }}">
                                                                            {{ $character_nf_perilaku_pribadi->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    @else
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="d-flex justify-content-between mt-3">
                                            <button class="btn btn-outline-secondary btn-prev" disabled>
                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next" type="button">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Form Analisa Capital -->
                                    <div id="formAnalisaCapital" class="content" role="tabpanel"
                                        aria-labelledby="capital-trigger">
                                        <div>
                                            <h4>Analisa Capital</h4>
                                            <hr />
                                            <h5>Tujuan analisa: Kemampuan calon nasabah untuk membayar angsuran (Ability to
                                                Repay)
                                            </h5> <br />
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="midCenter" colspan="3">
                                                            Analisa Capital
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="midCenter">
                                                            a.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Capital atau modal yang perlu disertakan dalam objek pembiayaan
                                                            perlu
                                                            dilakukan analisis yang lebih mendalam. Modal merupakan jumlah
                                                            modal
                                                            yang dimiliki oleh calon nasabah atau jumlah dana yang akan
                                                            disertakan
                                                            dalam proyek yang dibiayai. Semakin besar modal yang dimiliki
                                                            dan
                                                            disertakan oleh calon nasabah dalam objek pembiayaan akan
                                                            semakin
                                                            meyakinkan bagi Bank dan keseriusan calon nasabah dalam
                                                            mengajukan dan
                                                            pembayaran kembali (Ability to Pay).
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            b.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Dalam hal calon nasabah adalah perusahaan, maka struktur modal
                                                            ini
                                                            penting untuk menilai tingkat debt to equity ratio. Perusahaan
                                                            dianggap
                                                            kuat dalam menghadapi berbagai macam risiko apabila jumlah modal
                                                            sendiri
                                                            yang dimiliki cukup besar. Analisis rasio keuangan dapat
                                                            dilakukan oleh
                                                            bank untuk dapat mengetahui modal perusahaan. Analisis rasio
                                                            keuangan
                                                            ini dilakukan apabila calon nasabah merupakan perusahaan.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            c.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Uang muka yang dibayarkan dalam memperoleh pembiayaan. Dalam hal
                                                            calon
                                                            nasabah adalah perorangan, dan tujuan penggunannya jela,
                                                            misalnya
                                                            pembiayaan untuk pembelian rumah, maka analisis capital dapat
                                                            diartikan
                                                            sebagai jumlah uang muka yang dibayarkan oleh calon nasabah
                                                            kepada
                                                            pengembang atau uang muka yang telah disiapkan. Semakin besar
                                                            uang muka
                                                            yang dibayarkan oleh calon nasabah untuk membeli rumah, semakin
                                                            meyakinkan bagi Bank bahwa pembiayaan yang akan disalurkan
                                                            kemungkinan
                                                            akan lancar.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <thead>
                                                    <tr>
                                                        <th class="midCenter" colspan="3">
                                                            Sumber Data
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="midCenter">
                                                            a.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Neraca
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            b.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Laporan Keuangan
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            c.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Analisa Laporan Keuangan
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            d.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Tabungan/Giro/Deposito
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            e.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Saham
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            f.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Kuitansi Asli Uang Muka
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <thead>
                                                    <tr>
                                                        <th class="midCenter" colspan="2">
                                                            Variabel Penilaian
                                                        </th>
                                                        <th class="midCenter" width="50%">
                                                            Score
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="midCenter">
                                                            a.
                                                        </td>
                                                        <td class="midJustify">
                                                            Pekerjaan
                                                        </td>
                                                        <td class="midCenter">
                                                            <select class="select2 w-100" name="capital_pekerjaan"
                                                                id="capital_pekerjaan">
                                                                <option label="capital_pekerjaan" selected disabled>Pilih
                                                                </option>
                                                                @foreach ($capital_pekerjaans as $capital_pekerjaan)
                                                                    <option
                                                                        value="{{ $capital_pekerjaan->rating * $capital_pekerjaan->bobot }}">
                                                                        {{ $capital_pekerjaan->keterangan }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            b.
                                                        </td>
                                                        <td class="midJustify">
                                                            Pengalaman Riwayat Pembiayaan
                                                        </td>
                                                        <td class="midCenter">
                                                            <select class="select2 w-100"
                                                                name="capital_pengalaman_riwayat_pembiayaan"
                                                                id="capital_pengalaman_riwayat_pembiayaan">
                                                                <option label="capital_pengalaman_riwayat_pembiayaan"
                                                                    selected disabled>Pilih
                                                                </option>
                                                                @foreach ($capital_pengalaman_riwayat_pembiayaans as $capital_pengalaman_riwayat_pembiayaan)
                                                                    <option
                                                                        value="{{ $capital_pengalaman_riwayat_pembiayaan->rating * $capital_pengalaman_riwayat_pembiayaan->bobot }}">
                                                                        {{ $capital_pengalaman_riwayat_pembiayaan->keterangan }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            c.
                                                        </td>
                                                        <td class="midJustify">
                                                            Keamanan Bisnis/Pekerjaan
                                                        </td>
                                                        <td class="midCenter">
                                                            <select class="select2 w-100"
                                                                name="capital_keamanan_bisnis_pekerjaan"
                                                                id="capital_keamanan_bisnis_pekerjaan">
                                                                <option label="capital_keamanan_bisnis_pekerjaan" selected
                                                                    disabled>Pilih
                                                                </option>
                                                                @foreach ($capital_keamanan_bisnis_pekerjaans as $capital_keamanan_bisnis_pekerjaan)
                                                                    <option
                                                                        value="{{ $capital_keamanan_bisnis_pekerjaan->rating * $capital_keamanan_bisnis_pekerjaan->bobot }}">
                                                                        {{ $capital_keamanan_bisnis_pekerjaan->keterangan }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            d.
                                                        </td>
                                                        <td class="midJustify">
                                                            Potensi Pertumbuhan Hasil
                                                        </td>
                                                        <td class="midCenter">
                                                            <select class="select2 w-100"
                                                                name="capital_potensi_pertumbuhan_hasil"
                                                                id="capital_potensi_pertumbuhan_hasil">
                                                                <option label="capital_potensi_pertumbuhan_hasil" selected
                                                                    disabled>Pilih
                                                                </option>
                                                                @foreach ($capital_potensi_pertumbuhan_hasils as $capital_potensi_pertumbuhan_hasil)
                                                                    <option
                                                                        value="{{ $capital_potensi_pertumbuhan_hasil->rating * $capital_potensi_pertumbuhan_hasil->bobot }}">
                                                                        {{ $capital_potensi_pertumbuhan_hasil->keterangan }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            e.
                                                        </td>
                                                        <td class="midJustify">
                                                            Sumber Pendapatan
                                                        </td>
                                                        <td class="midCenter">
                                                            <select class="select2 w-100"
                                                                name="capital_sumber_pendapatan"
                                                                id="capital_sumber_pendapatan">
                                                                <option label="capital_sumber_pendapatan" selected
                                                                    disabled>Pilih
                                                                </option>
                                                                @foreach ($capital_sumber_pendapatans as $capital_sumber_pendapatan)
                                                                    <option
                                                                        value="{{ $capital_sumber_pendapatan->rating * $capital_sumber_pendapatan->bobot }}">
                                                                        {{ $capital_sumber_pendapatan->keterangan }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            f.
                                                        </td>
                                                        <td class="midJustify">
                                                            Pendapatan/Gaji Bersih
                                                        </td>
                                                        <td class="midCenter">
                                                            <select class="select2 w-100"
                                                                name="capital_pendapatan_gaji_bersih"
                                                                id="capital_pendapatan_gaji_bersih">
                                                                <option label="capital_pendapatan_gaji_bersih" selected
                                                                    disabled>Pilih
                                                                </option>
                                                                @foreach ($capital_pendapatan_gaji_bersihs as $capital_pendapatan_gaji_bersih)
                                                                    <option
                                                                        value="{{ $capital_pendapatan_gaji_bersih->rating * $capital_pendapatan_gaji_bersih->bobot }}">
                                                                        {{ $capital_pendapatan_gaji_bersih->keterangan }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            g.
                                                        </td>
                                                        <td class="midJustify">
                                                            Jumlah Tanggungan Keluarga
                                                        </td>
                                                        <td class="midCenter">
                                                            <select class="select2 w-100"
                                                                name="capital_jml_tanggungan_keluarga"
                                                                id="capital_jml_tanggungan_keluarga">
                                                                <option label="capital_jml_tanggungan_keluarga" selected
                                                                    disabled>Pilih
                                                                </option>
                                                                @foreach ($capital_jml_tanggungan_keluargas as $capital_jml_tanggungan_keluarga)
                                                                    <option
                                                                        value="{{ $capital_jml_tanggungan_keluarga->rating * $capital_jml_tanggungan_keluarga->bobot }}">
                                                                        {{ $capital_jml_tanggungan_keluarga->keterangan }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="d-flex justify-content-between mt-3">
                                            <button class="btn btn-primary btn-prev">
                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Form Analisa Capacity -->
                                    <div id="formAnalisaCapacity" class="content" role="tabpanel"
                                        aria-labelledby="capacity-trigger">
                                        <div>
                                            <h4>Analisa Capacity</h4>
                                            <hr />
                                            <h5>Tujuan analisa: Kemampuan calon nasabah untuk membayar angsuran (Ability to
                                                Repay)
                                            </h5> <br />
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="midCenter" colspan="3">
                                                            Analisa Capacity/Kemampuan
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="midCenter">
                                                            a.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Analisis terhadap capacity ini ditujukan untuk mengetahui
                                                            kemampuan
                                                            keuangan calon nasabah dalam memenuhi kewajibannya sesuai jangka
                                                            waktu
                                                            pembiayaan (Ability to Pay).
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            b.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Bank perlu mengetahui dengan pasti kemampuan keuangan calon
                                                            nasabah
                                                            dalam memenuhi kewajibannya setelah bank memberikan pembiayaan.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            c.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Kemampuan keuangan calon nasabah sangat penting karena merupakan
                                                            sumber
                                                            utama pembiayaan.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            d.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Semakin baik kemampuan keuangan calon nasabah, maka akan semakin
                                                            baik
                                                            kemungkinan kualitas pembiayaan, artinya dapat dipastikan bahwa
                                                            pembiayaan yang diberikan bank dapat dibayar sesuai dengan
                                                            jangka waktu
                                                            yang diperjanjikan.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <thead>
                                                    <tr>
                                                        <th class="midCenter" colspan="3">
                                                            Sumber Data
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="midCenter">
                                                            a.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Slip Gaji
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            b.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Gaji Pasangan
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            c.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Jumlah Pengeluaran
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            d.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Daftar Penjualan
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            e.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Daftar Pembelian
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            f.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Daftar Hutang/Piutang
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            g.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Cash Flow
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            h.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Check List
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            i.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Wawancara
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <thead>
                                                    <tr>
                                                        <th class="midCenter" colspan="2">
                                                            Variabel Penilaian
                                                        </th>
                                                        <th class="midCenter" width="50%">
                                                            Score
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($pembiayaan->jenis_nasabah == 'Fixed Income')
                                                        <tr>
                                                            <td class="midCenter">
                                                                a.
                                                            </td>
                                                            <td class="midJustify">
                                                                Pekerjaan
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100" name="capacity_pekerjaan"
                                                                    id="capacity_pekerjaan">
                                                                    <option label="capacity_pekerjaan" selected disabled>
                                                                        Pilih
                                                                    </option>
                                                                    @foreach ($capacity_pekerjaans as $capacity_pekerjaan)
                                                                        <option
                                                                            value="{{ $capacity_pekerjaan->rating * $capacity_pekerjaan->bobot }}">
                                                                            {{ $capacity_pekerjaan->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                b.
                                                            </td>
                                                            <td class="midJustify">
                                                                Pengalaman Riwayat Pembiayaan
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="capacity_pengalaman_riwayat_pembiayaan"
                                                                    id="capacity_pengalaman_riwayat_pembiayaan">
                                                                    <option label="Pilih" selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($capacity_pengalaman_riwayat_pembiayaans as $capacity_pengalaman_riwayat_pembiayaan)
                                                                        <option
                                                                            value="{{ $capacity_pengalaman_riwayat_pembiayaan->rating * $capacity_pengalaman_riwayat_pembiayaan->bobot }}">
                                                                            {{ $capacity_pengalaman_riwayat_pembiayaan->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                c.
                                                            </td>
                                                            <td class="midJustify">
                                                                Keamanan Bisnis/Pekerjaan
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="capacity_keamanan_bisnis_pekerjaan"
                                                                    id="capacity_keamanan_bisnis_pekerjaan">
                                                                    <option label="capacity_keamanan_bisnis_pekerjaan"
                                                                        selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($capacity_keamanan_bisnis_pekerjaans as $capacity_keamanan_bisnis_pekerjaan)
                                                                        <option
                                                                            value="{{ $capacity_keamanan_bisnis_pekerjaan->rating * $capacity_keamanan_bisnis_pekerjaan->bobot }}">
                                                                            {{ $capacity_keamanan_bisnis_pekerjaan->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                d.
                                                            </td>
                                                            <td class="midJustify">
                                                                Potensi Pertumbuhan Hasil
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="capacity_potensi_pertumbuhan_hasil"
                                                                    id="capacity_potensi_pertumbuhan_hasil">
                                                                    <option label="capacity_potensi_pertumbuhan_hasil"
                                                                        selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($capacity_potensi_pertumbuhan_hasils as $capacity_potensi_pertumbuhan_hasil)
                                                                        <option
                                                                            value="{{ $capacity_potensi_pertumbuhan_hasil->rating * $capacity_potensi_pertumbuhan_hasil->bobot }}">
                                                                            {{ $capacity_potensi_pertumbuhan_hasil->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                e.
                                                            </td>
                                                            <td class="midJustify">
                                                                Pengalaman Kerja
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="capacity_pengalaman_kerja"
                                                                    id="capacity_pengalaman_kerja">
                                                                    <option label="capacity_pengalaman_kerja" selected
                                                                        disabled>Pilih
                                                                    </option>
                                                                    @foreach ($capacity_pengalaman_kerjas as $capacity_pengalaman_kerja)
                                                                        <option
                                                                            value="{{ $capacity_pengalaman_kerja->rating * $capacity_pengalaman_kerja->bobot }}">
                                                                            {{ $capacity_pengalaman_kerja->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                f.
                                                            </td>
                                                            <td class="midJustify">
                                                                Pendidikan
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100" name="capacity_pendidikan"
                                                                    id="capacity_pendidikan">
                                                                    <option label="capacity_pendidikan" selected disabled>
                                                                        Pilih
                                                                    </option>
                                                                    @foreach ($capacity_pendidikans as $capacity_pendidikan)
                                                                        <option
                                                                            value="{{ $capacity_pendidikan->rating * $capacity_pendidikan->bobot }}">
                                                                            {{ $capacity_pendidikan->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                g.
                                                            </td>
                                                            <td class="midJustify">
                                                                Usia
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100" name="capacity_usia"
                                                                    id="capacity_usia">
                                                                    <option label="capacity_usia" selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($capacity_usias as $capacity_usia)
                                                                        <option
                                                                            value="{{ $capacity_usia->rating * $capacity_usia->bobot }}">
                                                                            {{ $capacity_usia->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                h.
                                                            </td>
                                                            <td class="midJustify">
                                                                Sumber Pendapatan
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="capacity_sumber_pendapatan"
                                                                    id="capacity_sumber_pendapatan">
                                                                    <option label="capacity_sumber_pendapatan" selected
                                                                        disabled>Pilih
                                                                    </option>
                                                                    @foreach ($capacity_sumber_pendapatans as $capacity_sumber_pendapatan)
                                                                        <option
                                                                            value="{{ $capacity_sumber_pendapatan->rating * $capacity_sumber_pendapatan->bobot }}">
                                                                            {{ $capacity_sumber_pendapatan->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                i.
                                                            </td>
                                                            <td class="midJustify">
                                                                Pendapatan/Gaji Bersih
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="capacity_pendapatan_gaji_bersih"
                                                                    id="capacity_pendapatan_gaji_bersih">
                                                                    <option label="capacity_pendapatan_gaji_bersih"
                                                                        selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($capacity_pendapatan_gaji_bersihs as $capacity_pendapatan_gaji_bersih)
                                                                        <option
                                                                            value="{{ $capacity_pendapatan_gaji_bersih->rating * $capacity_pendapatan_gaji_bersih->bobot }}">
                                                                            {{ $capacity_pendapatan_gaji_bersih->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                j.
                                                            </td>
                                                            <td class="midJustify">
                                                                Jumlah Tanggungan Keluarga
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="capacity_jml_tanggungan_keluarga"
                                                                    id="capacity_jml_tanggungan_keluarga">
                                                                    <option label="capacity_jml_tanggungan_keluarga"
                                                                        selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($capacity_jml_tanggungan_keluargas as $capacity_jml_tanggungan_keluarga)
                                                                        <option
                                                                            value="{{ $capacity_jml_tanggungan_keluarga->rating * $capacity_jml_tanggungan_keluarga->bobot }}">
                                                                            {{ $capacity_jml_tanggungan_keluarga->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    @elseif ($pembiayaan->jenis_nasabah == 'Non Fixed Income')
                                                        <tr>
                                                            <td class="midCenter">
                                                                a.
                                                            </td>
                                                            <td class="midJustify">
                                                                Situasi Pasar dan Persaingan
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="capacity_nf_situasi_persaingan"
                                                                    id="capacity_nf_situasi_persaingan">
                                                                    <option label="Pilih" selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($capacity_nf_situasi_persaingans as $capacity_nf_situasi_persaingan)
                                                                        <option
                                                                            value="{{ $capacity_nf_situasi_persaingan->rating * $capacity_nf_situasi_persaingan->bobot }}">
                                                                            {{ $capacity_nf_situasi_persaingan->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                b.
                                                            </td>
                                                            <td class="midJustify">
                                                                Kaderisasi
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="capacity_nf_kaderisasi"
                                                                    id="capacity_nf_kaderisasi">
                                                                    <option label="Pilih" selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($capacity_nf_kaderisasis as $capacity_nf_kaderisasi)
                                                                        <option
                                                                            value="{{ $capacity_nf_kaderisasi->rating * $capacity_nf_kaderisasi->bobot }}">
                                                                            {{ $capacity_nf_kaderisasi->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                c.
                                                            </td>
                                                            <td class="midJustify">
                                                                Kualifikasi Komersial
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="capacity_nf_kualifikasi_komersial"
                                                                    id="capacity_nf_kualifikasi_komersial">
                                                                    <option label="Pilih" selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($capacity_nf_kualifikasi_komersials as $capacity_nf_kualifikasi_komersial)
                                                                        <option
                                                                            value="{{ $capacity_nf_kualifikasi_komersial->rating * $capacity_nf_kualifikasi_komersial->bobot }}">
                                                                            {{ $capacity_nf_kualifikasi_komersial->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                d.
                                                            </td>
                                                            <td class="midJustify">
                                                                Kualifikasi Teknis
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="capacity_nf_kualifikasi_teknis"
                                                                    id="capacity_nf_kualifikasi_teknis">
                                                                    <option label="Pilih" selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($capacity_nf_kualifikasi_teknises as $capacity_nf_kualifikasi_teknis)
                                                                        <option
                                                                            value="{{ $capacity_nf_kualifikasi_teknis->rating * $capacity_nf_kualifikasi_teknis->bobot }}">
                                                                            {{ $capacity_nf_kualifikasi_teknis->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    @else
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="d-flex justify-content-between mt-3">
                                            <button class="btn btn-primary btn-prev">
                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                            </button>
                                        </div>
                                    </div>


                                    <!-- Form Analisa Condition & Sharia -->
                                    <div id="formAnalisaConditionSharia" class="content" role="tabpanel"
                                        aria-labelledby="condition-sharia-trigger">
                                        <div>
                                            <h4>Analisa Condition & Sharia</h4>
                                            <hr />
                                            <h5>Tujuan analisa: Kemampuan calon nasabah untuk membayar angsuran (Ability to
                                                Repay)
                                            </h5> <br />
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="midCenter" colspan="3">
                                                            Analisa Condition & Syariah
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="midCenter">
                                                            a.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Analisis merupakan analisis terhadap kondisi keuangan. Bank
                                                            perlu
                                                            mempertimbangkan sektor usaha calon nasabah dikaitkan dengan
                                                            kondisi
                                                            ekonomi.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            b.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Bank perlu melakukan analisis dampak kondisi ekonomi terhadap
                                                            usaha
                                                            calon nasabah di masa yang akat datang, untuk mengetahui
                                                            pengaruh
                                                            kondisi ekonomi terhadap usaha calon nasabah (Ability to Pay)
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            c.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Bank Syariah juga perlu memperhatikan jenis usaha dari calon
                                                            nasabah
                                                            apakah sesuai dengan prinsip-prinsip syariah.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <thead>
                                                    <tr>
                                                        <th class="midCenter" colspan="3">
                                                            Sumber Data
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="midCenter">
                                                            a.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Kondisi Ekonomi
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            b.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Tingkat Inflasi
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            c.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Daya Beli
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            d.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Kompetitor Usaha
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            e.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Jenis Usaha Sesuai Syariah
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            f.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Lingkungan Sesuai Syariah
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            g.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Check List
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            h.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Wawancara
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <thead>
                                                    <tr>
                                                        <th class="midCenter" colspan="2">
                                                            Variabel Penilaian
                                                        </th>
                                                        <th class="midCenter" width="50%">
                                                            Score
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($pembiayaan->jenis_nasabah == 'Fixed Income')
                                                        <tr>
                                                            <td class="midCenter">
                                                                a.
                                                            </td>
                                                            <td class="midJustify">
                                                                Pekerjaan
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100" name="condition_pekerjaan"
                                                                    id="condition_pekerjaan">
                                                                    <option label="condition_pekerjaan" selected disabled>
                                                                        Pilih
                                                                    </option>
                                                                    @foreach ($condition_pekerjaans as $condition_pekerjaan)
                                                                        <option
                                                                            value="{{ $condition_pekerjaan->rating * $condition_pekerjaan->bobot }}">
                                                                            {{ $condition_pekerjaan->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                b.
                                                            </td>
                                                            <td class="midJustify">
                                                                Pengalaman Riwayat Pembiayaan
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="condition_pengalaman_riwayat_pembiayaan"
                                                                    id="condition_pengalaman_riwayat_pembiayaan">
                                                                    <option
                                                                        label="condition_pengalaman_riwayat_pembiayaan"
                                                                        selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($condition_pengalaman_riwayat_pembiayaans as $condition_pengalaman_riwayat_pembiayaan)
                                                                        <option
                                                                            value="{{ $condition_pengalaman_riwayat_pembiayaan->rating * $condition_pengalaman_riwayat_pembiayaan->bobot }}">
                                                                            {{ $condition_pengalaman_riwayat_pembiayaan->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                c.
                                                            </td>
                                                            <td class="midJustify">
                                                                Keamanan Bisnis/Pekerjaan
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="condition_keamanan_bisnis_pekerjaan"
                                                                    id="condition_keamanan_bisnis_pekerjaan">
                                                                    <option label="condition_keamanan_bisnis_pekerjaan"
                                                                        selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($condition_keamanan_bisnis_pekerjaans as $condition_keamanan_bisnis_pekerjaan)
                                                                        <option
                                                                            value="{{ $condition_keamanan_bisnis_pekerjaan->rating * $condition_keamanan_bisnis_pekerjaan->bobot }}">
                                                                            {{ $condition_keamanan_bisnis_pekerjaan->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                d.
                                                            </td>
                                                            <td class="midJustify">
                                                                Potensi Pertumbuhan Hasil
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="condition_potensi_pertumbuhan_hasil"
                                                                    id="condition_potensi_pertumbuhan_hasil">
                                                                    <option label="condition_potensi_pertumbuhan_hasil"
                                                                        selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($condition_potensi_pertumbuhan_hasils as $condition_potensi_pertumbuhan_hasil)
                                                                        <option
                                                                            value="{{ $condition_potensi_pertumbuhan_hasil->rating * $condition_potensi_pertumbuhan_hasil->bobot }}">
                                                                            {{ $condition_potensi_pertumbuhan_hasil->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                e.
                                                            </td>
                                                            <td class="midJustify">
                                                                Pengalaman Kerja
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="condition_pengalaman_kerja"
                                                                    id="condition_pengalaman_kerja">
                                                                    <option label="condition_pengalaman_kerja" selected
                                                                        disabled>Pilih
                                                                    </option>
                                                                    @foreach ($condition_pengalaman_kerjas as $condition_pengalaman_kerja)
                                                                        <option
                                                                            value="{{ $condition_pengalaman_kerja->rating * $condition_pengalaman_kerja->bobot }}">
                                                                            {{ $condition_pengalaman_kerja->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                f.
                                                            </td>
                                                            <td class="midJustify">
                                                                Pendidikan
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="condition_pendidikan"
                                                                    id="condition_pendidikan">
                                                                    <option label="condition_pendidikan" selected
                                                                        disabled>
                                                                        Pilih
                                                                    </option>
                                                                    @foreach ($condition_pendidikans as $condition_pendidikan)
                                                                        <option
                                                                            value="{{ $condition_pendidikan->rating * $condition_pendidikan->bobot }}">
                                                                            {{ $condition_pendidikan->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                g.
                                                            </td>
                                                            <td class="midJustify">
                                                                Usia
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100" name="condition_usia"
                                                                    id="condition_usia">
                                                                    <option label="condition_usia" selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($condition_usias as $condition_usia)
                                                                        <option
                                                                            value="{{ $condition_usia->rating * $condition_usia->bobot }}">
                                                                            {{ $condition_usia->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                h.
                                                            </td>
                                                            <td class="midJustify">
                                                                Sumber Pendapatan
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="condition_sumber_pendapatan"
                                                                    id="condition_sumber_pendapatan">
                                                                    <option label="condition_sumber_pendapatan" selected
                                                                        disabled>Pilih
                                                                    </option>
                                                                    @foreach ($condition_sumber_pendapatans as $condition_sumber_pendapatan)
                                                                        <option
                                                                            value="{{ $condition_sumber_pendapatan->rating * $condition_sumber_pendapatan->bobot }}">
                                                                            {{ $condition_sumber_pendapatan->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                i.
                                                            </td>
                                                            <td class="midJustify">
                                                                Pendapatan/Gaji Bersih
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="condition_pendapatan_gaji_bersih"
                                                                    id="condition_pendapatan_gaji_bersih">
                                                                    <option label="condition_pendapatan_gaji_bersih"
                                                                        selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($condition_pendapatan_gaji_bersihs as $condition_pendapatan_gaji_bersih)
                                                                        <option
                                                                            value="{{ $condition_pendapatan_gaji_bersih->rating * $condition_pendapatan_gaji_bersih->bobot }}">
                                                                            {{ $condition_pendapatan_gaji_bersih->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                j.
                                                            </td>
                                                            <td class="midJustify">
                                                                Jumlah Tanggungan Keluarga
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="condition_jml_tanggungan_keluarga"
                                                                    id="condition_jml_tanggungan_keluarga">
                                                                    <option label="condition_jml_tanggungan_keluarga"
                                                                        selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($condition_jml_tanggungan_keluargas as $condition_jml_tanggungan_keluarga)
                                                                        <option
                                                                            value="{{ $condition_jml_tanggungan_keluarga->rating * $condition_jml_tanggungan_keluarga->bobot }}">
                                                                            {{ $condition_jml_tanggungan_keluarga->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    @elseif($pembiayaan->jenis_nasabah == 'Non Fixed Income')
                                                        <tr>
                                                            <td class="midCenter">
                                                                a.
                                                            </td>
                                                            <td class="midJustify">
                                                                Kualitas Produk dan Jasa
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="condition_nf_kualitas_produk_jasa"
                                                                    id="condition_nf_kualitas_produk_jasa">
                                                                    <option label="Pilih" selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($condition_sharia_nf_kualitas_produk_jasas as $condition_sharia_nf_kualitas_produk_jasa)
                                                                        <option
                                                                            value="{{ $condition_sharia_nf_kualitas_produk_jasa->rating * $condition_sharia_nf_kualitas_produk_jasa->bobot }}">
                                                                            {{ $condition_sharia_nf_kualitas_produk_jasa->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                b.
                                                            </td>
                                                            <td class="midJustify">
                                                                Sistem Pembayaran
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="condition_nf_sistem_pembayaran"
                                                                    id="condition_nf_sistem_pembayaran">
                                                                    <option label="Pilih" selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($condition_sharia_nf_sistem_pembayarans as $condition_sharia_nf_sistem_pembayaran)
                                                                        <option
                                                                            value="{{ $condition_sharia_nf_sistem_pembayaran->rating * $condition_sharia_nf_sistem_pembayaran->bobot }}">
                                                                            {{ $condition_sharia_nf_sistem_pembayaran->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                c.
                                                            </td>
                                                            <td class="midJustify">
                                                                Lokasi Usaha
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="condition_nf_lokasi_usaha"
                                                                    id="condition_nf_lokasi_usaha">
                                                                    <option label="Pilih" selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($condition_sharia_nf_lokasi_usahas as $condition_sharia_nf_lokasi_usaha)
                                                                        <option
                                                                            value="{{ $condition_sharia_nf_lokasi_usaha->rating * $condition_sharia_nf_lokasi_usaha->bobot }}">
                                                                            {{ $condition_sharia_nf_lokasi_usaha->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    @else
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="d-flex justify-content-between mt-3">
                                            <button class="btn btn-primary btn-prev">
                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Form Analisa Collateral -->
                                    <div id="formAnalisaCollateral" class="content" role="tabpanel"
                                        aria-labelledby="collateral-trigger">
                                        <div>
                                            <h4>Analisa Collateral/Agunan</h4>
                                            <hr />
                                            <h5>Tujuan analisa: Collateral/Agunan/Jaminan
                                            </h5> <br />
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="midCenter" colspan="3">
                                                            Analisa Collateral/Agunan
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="midCenter">
                                                            a.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Merupakan agunan yang diberikan oleh calon nasabah atas
                                                            pembiayaan yang
                                                            diajukan. Agunan merupakan sumber pembayaran kedua.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            b.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Dalam hal nasabah tidak dapat membayar agunannya. Maka bank
                                                            dapat
                                                            melakukan penjualan terhadap agunan. Hasil penjulan agunan
                                                            digunakan
                                                            sebagai sumber pembayaran kedua untuk melunasi pembiayaan.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            c.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Bank tidak akan memberikan pembiayaan yang melebihi dari agunan,
                                                            kecuali
                                                            untuk pembiayaan tertentu yang dijamin pembayarannya oleh pihak
                                                            tertentu.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            d.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Dalam analisis agunan, faktor yang sangat penting dan harus
                                                            diperhatikan
                                                            adalah purnajual dari agunan yang diserahkan kepada bank.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            e.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Bank perlu mengetahui minat pasar terhadap agunan yang
                                                            diserahkan oleh
                                                            calon nasabah. Bila agunan merupakan barang yang diminati oleh
                                                            banyak
                                                            orang (marketable), maka bank yakin bahwa agunan yang diserahkan
                                                            calon
                                                            nasabah mudah diperjualbelikan. Pembiayaan yang ditutup oleh
                                                            agunan yang
                                                            purnajualnya bagus, risikonya rendah.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <thead>
                                                    <tr>
                                                        <th class="midCenter" colspan="3">
                                                            Sumber Data
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="midCenter">
                                                            a.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Hasil Appraisal
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            b.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            On The Spot
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            c.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Survey
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            d.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Clearance BPN
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            e.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            SHM/SHGB
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            f.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Cover Note
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            g.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Akta Waris
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            h.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Check List
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="midCenter">
                                                            i.
                                                        </td>
                                                        <td class="midJustify" colspan="2">
                                                            Wawancara
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <thead>
                                                    <tr>
                                                        <th class="midCenter" colspan="2">
                                                            Variabel Penilaian
                                                        </th>
                                                        <th class="midCenter" width="50%">
                                                            Score
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($pembiayaan->jenis_nasabah == 'Fixed Income')
                                                        <tr>
                                                            <td class="midCenter">
                                                                a.
                                                            </td>
                                                            <td class="midJustify">
                                                                Marketabilitas
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="collateral_marketabilitas"
                                                                    id="collateral_marketabilitas">
                                                                    <option label="collateral_marketabilitas" selected
                                                                        disabled>Pilih
                                                                    </option>
                                                                    @foreach ($collateral_marketabilitases as $collateral_marketabilitas)
                                                                        <option
                                                                            value="{{ $collateral_marketabilitas->rating * $collateral_marketabilitas->bobot }}">
                                                                            {{ $collateral_marketabilitas->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                b.
                                                            </td>
                                                            <td class="midJustify">
                                                                Kontribusi Pemohon = FTV
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="collateral_kontribusi_pemohon_ftv"
                                                                    id="collateral_kontribusi_pemohon_ftv">
                                                                    <option label="collateral_kontribusi_pemohon_ftv"
                                                                        selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($collateral_kontribusi_pemohon_ftvs as $collateral_kontribusi_pemohon_ftv)
                                                                        <option
                                                                            value="{{ $collateral_kontribusi_pemohon_ftv->rating * $collateral_kontribusi_pemohon_ftv->bobot }}">
                                                                            {{ $collateral_kontribusi_pemohon_ftv->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                c.
                                                            </td>
                                                            <td class="midJustify">
                                                                Pertumbuhan Agunan
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="collateral_pertumbuhan_agunan"
                                                                    id="collateral_pertumbuhan_agunan">
                                                                    <option label="collateral_pertumbuhan_agunan" selected
                                                                        disabled>Pilih
                                                                    </option>
                                                                    @foreach ($collateral_pertumbuhan_agunans as $collateral_pertumbuhan_agunan)
                                                                        <option
                                                                            value="{{ $collateral_pertumbuhan_agunan->rating * $collateral_pertumbuhan_agunan->bobot }}">
                                                                            {{ $collateral_pertumbuhan_agunan->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                d.
                                                            </td>
                                                            <td class="midJustify">
                                                                Daya Tarik Agunan
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="collateral_daya_tarik_agunan"
                                                                    id="collateral_daya_tarik_agunan">
                                                                    <option label="collateral_daya_tarik_agunan" selected
                                                                        disabled>Pilih
                                                                    </option>
                                                                    @foreach ($collateral_daya_tarik_agunans as $collateral_daya_tarik_agunan)
                                                                        <option
                                                                            value="{{ $collateral_daya_tarik_agunan->rating * $collateral_daya_tarik_agunan->bobot }}">
                                                                            {{ $collateral_daya_tarik_agunan->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                e.
                                                            </td>
                                                            <td class="midJustify">
                                                                Jangka Waktu Likuidasi
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="collateral_jangka_waktu_likuidasi"
                                                                    id="collateral_jangka_waktu_likuidasi">
                                                                    <option label="collateral_jangka_waktu_likuidasi"
                                                                        selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($collateral_jangka_waktu_likuidasis as $collateral_jangka_waktu_likuidasi)
                                                                        <option
                                                                            value="{{ $collateral_jangka_waktu_likuidasi->rating * $collateral_jangka_waktu_likuidasi->bobot }}">
                                                                            {{ $collateral_jangka_waktu_likuidasi->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    @elseif($pembiayaan->jenis_nasabah == 'Non Fixed Income')
                                                        <tr>
                                                            <td class="midCenter">
                                                                a.
                                                            </td>
                                                            <td class="midJustify">
                                                                Marketabilitas
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="collateral_nf_marketabilitas"
                                                                    id="collateral_nf_marketabilitas">
                                                                    <option label="Pilih" selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($collateral_nf_marketabilitases as $collateral_nf_marketabilitas)
                                                                        <option
                                                                            value="{{ $collateral_nf_marketabilitas->rating * $collateral_nf_marketabilitas->bobot }}">
                                                                            {{ $collateral_nf_marketabilitas->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                b.
                                                            </td>
                                                            <td class="midJustify">
                                                                Kontribusi Pemohon = FTV
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="collateral_nf_kontribusi_pemohon_ftv"
                                                                    id="collateral_nf_kontribusi_pemohon_ftv">
                                                                    <option label="Pilih" selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($collateral_nf_kontribusi_pemohons as $collateral_nf_kontribusi_pemohon)
                                                                        <option
                                                                            value="{{ $collateral_nf_kontribusi_pemohon->rating * $collateral_nf_kontribusi_pemohon->bobot }}">
                                                                            {{ $collateral_nf_kontribusi_pemohon->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                c.
                                                            </td>
                                                            <td class="midJustify">
                                                                Pertumbuhan Agunan
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="collateral_nf_pertumbuhan_agunan"
                                                                    id="collateral_nf_pertumbuhan_agunan">
                                                                    <option label="Pilih" selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($collateral_nf_pertumbuhan_agunans as $collateral_nf_pertumbuhan_agunan)
                                                                        <option
                                                                            value="{{ $collateral_nf_pertumbuhan_agunan->rating * $collateral_nf_pertumbuhan_agunan->bobot }}">
                                                                            {{ $collateral_nf_pertumbuhan_agunan->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                d.
                                                            </td>
                                                            <td class="midJustify">
                                                                Daya Tarik Agunan
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="collateral_nf_daya_tarik_agunan"
                                                                    id="collateral_nf_daya_tarik_agunan">
                                                                    <option label="Pilih" selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($collateral_nf_daya_tarik_agunans as $collateral_nf_daya_tarik_agunan)
                                                                        <option
                                                                            value="{{ $collateral_nf_daya_tarik_agunan->rating * $collateral_nf_daya_tarik_agunan->bobot }}">
                                                                            {{ $collateral_nf_daya_tarik_agunan->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="midCenter">
                                                                e.
                                                            </td>
                                                            <td class="midJustify">
                                                                Jangka Waktu Likuidasi
                                                            </td>
                                                            <td class="midCenter">
                                                                <select class="select2 w-100"
                                                                    name="collateral_nf_jangka_waktu_likuidasi"
                                                                    id="collateral_nf_jangka_waktu_likuidasi">
                                                                    <option label="Pilih" selected disabled>Pilih
                                                                    </option>
                                                                    @foreach ($collateral_nf_jangka_waktu_likuidasis as $collateral_nf_jangka_waktu_likuidasi)
                                                                        <option
                                                                            value="{{ $collateral_nf_jangka_waktu_likuidasi->rating * $collateral_nf_jangka_waktu_likuidasi->bobot }}">
                                                                            {{ $collateral_nf_jangka_waktu_likuidasi->keterangan }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    @else
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="d-flex justify-content-between mt-3">
                                            <button class="btn btn-primary btn-prev">
                                                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-success btn-submit">Submit</button>
                                        </div>
                                    </div>

                                    <br>
                                    <hr>
                                    <!-- Tabel -->


                                </form>
                            </div>
                        </div>
                    </section>
                </div>

            </div>

            <!-- Justified Tabs ends -->
        </div>

    </div>

    <!-- END: Content-->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function changeStatus() {
            var status = document.getElementById("status");
            if (status.value == "M") {
                document.getElementById("ifMenikahHeader").style.visibility = "visible",
                    document.getElementById("ifMenikah").style.visibility = "visible",
                    document.getElementById("ifISMHeader").style.visibility = "visible",
                    document.getElementById("ifISM").style.visibility = "visible";
            } else {
                document.getElementById("ifMenikahHeader").style.visibility = "collapse",
                    document.getElementById("ifMenikah").style.visibility = "collapse",
                    document.getElementById("ifISMHeader").style.visibility = "collapse",
                    document.getElementById("ifISM").style.visibility = "collapse";

            }
        }

        function changeJenisAkad() {
            var jenis_akad_pembayaran = document.getElementById("form_permohonan_jenis_akad_pembayaran");
            if (jenis_akad_pembayaran.value == 'akad_lainnya') {
                document.getElementById("AkadLainnya").style.visibility = "visible";

            } else {
                document.getElementById("AkadLainnya").style.visibility = "collapse";
            }
        }

        // function tampilAkadLain() {
        //     var jenis_akad_pembayaran = document.getElementById("jenis_akad_pembayaran");
        //     if (jenis_akad_pembayaran.value != "murabahah" || "imbt" || "mmq") {
        //         document.getElementById("AkadLainnya").style.visibility = "visible";

        //     } else {
        //         document.getElementById("AkadLainnya").style.visibility = "collapse";
        //     }
        // }

        function sumFixed(value) {
            var gajiKotor1, tht1, jamsostek1, koperasi1, potonganLain1, gajiBersih1, gajiBersih1Dummy,
                gajiKotor2, tht2, jamsostek2, koperasi2, potonganLain2, gajiBersih2, gajiBersih2Dummy,
                gajiKotorP, thtP, jamsostekP, koperasiP, potonganLainP, gajiBersihP, gajiBersihPDummy,
                rumah, mobil, lainnya, totalKewajibanRutin, totalKewajibanRutinDummy,
                pangan, sandang, transportasi, listrik, telepon, gas, air, pendidikan, kesehatan,
                lain, totalBiayaHidup, totalBiayaHidupDummy, totalPenghasilanBersih, totalPenghasilanBersihDummy;

            //Gaji 1
            gajiKotor1 = document.getElementById("gajiKotor1").value.replace(/,/g, "");
            tht1 = document.getElementById("thtGaji1").value.replace(/,/g, "");
            jamsostek1 = document.getElementById("jamsostekGaji1").value.replace(/,/g, "");
            koperasi1 = document.getElementById("koperasiGaji1").value.replace(/,/g, "");
            potonganLain1 = document.getElementById("lainGaji1").value.replace(/,/g, "");

            gajiBersih1 = gajiKotor1 - tht1 - jamsostek1 - koperasi1 - potonganLain1;
            document.getElementById("gajiBersih1").value = gajiBersih1;

            gajiBersih1Dummy = gajiBersih1;
            document.getElementById("gajiBersih1Dummy").value =
                gajiBersih1Dummy;
            gajiBersih1Dummy = document.getElementById("gajiBersih1Dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("gajiBersih1Dummy").value =
                gajiBersih1Dummy;

            //Gaji 2
            gajiKotor2 = document.getElementById("gajiKotor2").value.replace(/,/g, "");
            tht2 = document.getElementById("thtGaji2").value.replace(/,/g, "");
            jamsostek2 = document.getElementById("jamsostekGaji2").value.replace(/,/g, "");
            koperasi2 = document.getElementById("koperasiGaji2").value.replace(/,/g, "");
            potonganLain2 = document.getElementById("lainGaji2").value.replace(/,/g, "");

            gajiBersih2 = gajiKotor2 - tht2 - jamsostek2 - koperasi2 - potonganLain2;
            document.getElementById("gajiBersih2").value = gajiBersih2;

            gajiBersih2Dummy = gajiBersih2;
            document.getElementById("gajiBersih2Dummy").value =
                gajiBersih2Dummy;
            gajiBersih2Dummy = document.getElementById("gajiBersih2Dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("gajiBersih2Dummy").value =
                gajiBersih2Dummy;

            //Gaji Pasangan
            gajiKotorP = document.getElementById("gajiKotorP").value.replace(/,/g, "");
            thtP = document.getElementById("thtGajiP").value.replace(/,/g, "");
            jamsostekP = document.getElementById("jamsostekGajiP").value.replace(/,/g, "");
            koperasiP = document.getElementById("koperasiGajiP").value.replace(/,/g, "");
            potonganLainP = document.getElementById("lainGajiP").value.replace(/,/g, "");

            gajiBersihP = gajiKotorP - thtP - jamsostekP - koperasiP - potonganLainP;
            document.getElementById("gajiBersihP").value = gajiBersihP;

            gajiBersihPDummy = gajiBersihP;
            document.getElementById("gajiBersihPDummy").value =
                gajiBersihPDummy;
            gajiBersihPDummy = document.getElementById("gajiBersihPDummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("gajiBersihPDummy").value =
                gajiBersihPDummy;

            //Kewajiban dan Angsuran
            rumah = document.getElementById("angsuranRumah").value.replace(/,/g, "");
            mobil = document.getElementById("angsuranMobil").value.replace(/,/g, "");
            lainnya = document.getElementById("angsuranLainnya").value.replace(/,/g, "");

            totalKewajibanRutin = +rumah + +mobil + +lainnya;
            document.getElementById("totalKewajibanRutin").value = totalKewajibanRutin;

            totalKewajibanRutinDummy = totalKewajibanRutin;
            document.getElementById("totalKewajibanRutinDummy").value = totalKewajibanRutinDummy;
            totalKewajibanRutinDummy = document.getElementById("totalKewajibanRutinDummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("totalKewajibanRutinDummy").value =
                totalKewajibanRutinDummy;

            //Biaya Hidup
            pangan = document.getElementById("biayaPangan").value.replace(/,/g, "");
            sandang = document.getElementById("biayaSandang").value.replace(/,/g, "");
            transportasi = document.getElementById("biayaTransportasi").value.replace(/,/g, "");
            listrik = document.getElementById("biayaListrik").value.replace(/,/g, "");
            telepon = document.getElementById("biayaTelepon").value.replace(/,/g, "");
            gas = document.getElementById("biayaGas").value.replace(/,/g, "");
            air = document.getElementById("biayaAir").value.replace(/,/g, "");
            pendidikan = document.getElementById("biayaPendidikan").value.replace(/,/g, "");
            kesehatan = document.getElementById("biayaKesehatan").value.replace(/,/g, "");
            lain = document.getElementById("biayaLain").value.replace(/,/g, "");

            totalBiayaHidup = +pangan + +sandang + +transportasi + +listrik + +telepon + +gas + +air + +pendidikan +
                +kesehatan + +lain;
            document.getElementById("totalBiayaHidup").value = totalBiayaHidup;

            totalBiayaHidupDummy = totalBiayaHidup;
            document.getElementById("totalBiayaHidupDummy").value = totalBiayaHidupDummy;
            totalBiayaHidupDummy = document.getElementById("totalBiayaHidupDummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("totalBiayaHidupDummy").value =
                totalBiayaHidupDummy;

            //Total Penghasilan Bersih
            totalPenghasilanBersih = (+gajiBersih1 + +gajiBersih2 + +gajiBersihP) - (+totalKewajibanRutin + +
                totalBiayaHidup);
            document.getElementById("totalPenghasilanBersih").value = totalPenghasilanBersih;

            totalPenghasilanBersihDummy = totalPenghasilanBersih;
            document.getElementById("totalPenghasilanBersihDummy").value = totalPenghasilanBersihDummy;
            totalPenghasilanBersihDummy = document.getElementById("totalPenghasilanBersihDummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("totalPenghasilanBersihDummy").value =
                totalPenghasilanBersihDummy;
        }

        function sumNonFixed(value) {
            var penjualanNF1, diskonNF1, returNF1, penjualanBersihNF1, penjualanBersihNF1Dummy,
                penjualanNF2, diskonNF2, returNF2, penjualanBersihNF2, penjualanBersihNF2Dummy,
                penjualanNFP, diskonNFP, returNFP, penjualanBersihNFP, penjualanBersihNFPDummy,
                persediaanBarangNF1, pembelianBahanNF1, upahLangsungNF1, upahTidakLangsungNF1, penyusutanNF1, bohLainNF1,
                totalBohNF1, totalBohNF1Dummy, jmlHargaPokokPenjualanNF1, jmlHargaPokokPenjualanNF1Dummy, labaKotorNF1,
                labaKotorNF1Dummy,
                persediaanBarangNF2, pembelianBahanNF2, upahLangsungNF2, upahTidakLangsungNF2, penyusutanNF2, bohLainNF2,
                totalBohNF2, totalBohNF2Dummy, jmlHargaPokokPenjualanNF2, jmlHargaPokokPenjualanNF2Dummy, labaKotorNF2,
                labaKotorNF2Dummy,
                persediaanBarangNFP, pembelianBahanNFP, upahLangsungNFP, upahTidakLangsungNFP, penyusutanNFP, bohLainNFP,
                totalBohNFP, totalBohNFPDummy, jmlHargaPokokPenjualanNFP, jmlHargaPokokPenjualanNFPDummy, labaKotorNFP,
                labaKotorNFPDummy,
                biayaPenjualanNF1, biayaGajiKomisarisDireksiStaffNF1, biayaListrikTeleponAirNF1, biayaPerawatanGedungNF1,
                biayaBagiHasilSewaMarginNF1, biayaAdmLainNF1, jmlBiayaAdmNF1, jmlBiayaAdmNF1Dummy, labaSebelumPajakNF1,
                labaSebelumPajakNF1Dummy, pajakZakatNF1, labaSetelahPajakNF1, labaSetelahPajakNF1Dummy,
                biayaPenjualanNF2, biayaGajiKomisarisDireksiStaffNF2, biayaListrikTeleponAirNF2, biayaPerawatanGedungNF2,
                biayaBagiHasilSewaMarginNF2, biayaAdmLainNF2, jmlBiayaAdmNF2, jmlBiayaAdmNF2Dummy, labaSebelumPajakNF2,
                labaSebelumPajakNF2Dummy, pajakZakatNF2, labaSetelahPajakNF2, labaSetelahPajakNF2Dummy,
                biayaPenjualanNFP, biayaGajiKomisarisDireksiStaffNFP, biayaListrikTeleponAirNFP, biayaPerawatanGedungNFP,
                biayaBagiHasilSewaMarginNFP, biayaAdmLainNFP, jmlBiayaAdmNFP, jmlBiayaAdmNFPDummy, labaSebelumPajakNFP,
                labaSebelumPajakNFPDummy, pajakZakatNFP, labaSetelahPajakNFP, labaSetelahPajakNFPDummy,
                totalPenghasilanBersihPerBulan, totalPenghasilanBersihPerBulanDummy;


            //Penjualan
            //Sum Non Fixed Income Penjualan Usaha 1
            penjualanNF1 = document.getElementById("penjualanNF1").value.replace(/,/g, "");
            diskonNF1 = document.getElementById("diskonNF1").value.replace(/,/g, "");
            returNF1 = document.getElementById("returNF1").value.replace(/,/g, "");

            penjualanBersihNF1 = +penjualanNF1 - (+diskonNF1 + +returNF1);
            document.getElementById("penjualanBersihNF1").value = penjualanBersihNF1;

            penjualanBersihNF1Dummy = penjualanBersihNF1;
            document.getElementById("penjualanBersihNF1Dummy").value = penjualanBersihNF1Dummy;
            penjualanBersihNF1Dummy = document.getElementById("penjualanBersihNF1Dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("penjualanBersihNF1Dummy").value =
                penjualanBersihNF1Dummy;

            //Sum Non Fixed Income Penjualan Usaha 2
            penjualanNF2 = document.getElementById("penjualanNF2").value.replace(/,/g, "");
            diskonNF2 = document.getElementById("diskonNF2").value.replace(/,/g, "");
            returNF2 = document.getElementById("returNF2").value.replace(/,/g, "");

            penjualanBersihNF2 = +penjualanNF2 - (+diskonNF2 + +returNF2);
            document.getElementById("penjualanBersihNF2").value = penjualanBersihNF2;

            penjualanBersihNF2Dummy = penjualanBersihNF2;
            document.getElementById("penjualanBersihNF2Dummy").value = penjualanBersihNF2Dummy;
            penjualanBersihNF2Dummy = document.getElementById("penjualanBersihNF2Dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("penjualanBersihNF2Dummy").value =
                penjualanBersihNF2Dummy;

            //Sum Non Fixed Income Penjualan Usaha Pasangan
            penjualanNFP = document.getElementById("penjualanNFP").value.replace(/,/g, "");
            diskonNFP = document.getElementById("diskonNFP").value.replace(/,/g, "");
            returNFP = document.getElementById("returNFP").value.replace(/,/g, "");

            penjualanBersihNFP = +penjualanNFP - (+diskonNFP + +returNFP);
            document.getElementById("penjualanBersihNFP").value = penjualanBersihNFP;

            penjualanBersihNFPDummy = penjualanBersihNFP;
            document.getElementById("penjualanBersihNFPDummy").value = penjualanBersihNFPDummy;
            penjualanBersihNFPDummy = document.getElementById("penjualanBersihNFPDummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("penjualanBersihNFPDummy").value =
                penjualanBersihNFPDummy;

            //Harga Pokok Penjualan
            //Sum Non Fixed Income Harga Pokok Penjualan Usaha 1
            persediaanBarangNF1 = document.getElementById("persediaanBarangNF1").value.replace(/,/g, "");
            pembelianBahanNF1 = document.getElementById("pembelianBahanNF1").value.replace(/,/g, "");
            upahLangsungNF1 = document.getElementById("upahLangsungNF1").value.replace(/,/g, "");
            upahTidakLangsungNF1 = document.getElementById("upahTidakLangsungNF1").value.replace(/,/g, "");
            penyusutanNF1 = document.getElementById("penyusutanNF1").value.replace(/,/g, "");
            bohLainNF1 = document.getElementById("bohLainNF1").value.replace(/,/g, "");

            totalBohNF1 = +upahTidakLangsungNF1 + +penyusutanNF1 + +bohLainNF1;
            document.getElementById("totalBohNF1").value = totalBohNF1;

            totalBohNF1Dummy = totalBohNF1;
            document.getElementById("totalBohNF1Dummy").value = totalBohNF1Dummy;
            totalBohNF1Dummy = document.getElementById("totalBohNF1Dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("totalBohNF1Dummy").value =
                totalBohNF1Dummy;

            jmlHargaPokokPenjualanNF1 = +persediaanBarangNF1 + +pembelianBahanNF1 + +upahLangsungNF1 + +totalBohNF1;
            document.getElementById("jmlHargaPokokPenjualanNF1").value = jmlHargaPokokPenjualanNF1;

            jmlHargaPokokPenjualanNF1Dummy = jmlHargaPokokPenjualanNF1;
            document.getElementById("jmlHargaPokokPenjualanNF1Dummy").value = jmlHargaPokokPenjualanNF1Dummy;
            jmlHargaPokokPenjualanNF1Dummy = document.getElementById("jmlHargaPokokPenjualanNF1Dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("jmlHargaPokokPenjualanNF1Dummy").value =
                jmlHargaPokokPenjualanNF1Dummy;

            labaKotorNF1 = +penjualanBersihNF1 - +jmlHargaPokokPenjualanNF1;
            document.getElementById("labaKotorNF1").value = labaKotorNF1;

            labaKotorNF1Dummy = labaKotorNF1;
            document.getElementById("labaKotorNF1Dummy").value = labaKotorNF1Dummy;
            labaKotorNF1Dummy = document.getElementById("labaKotorNF1Dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("labaKotorNF1Dummy").value =
                labaKotorNF1Dummy;

            //Sum Non Fixed Income Harga Pokok Penjualan Usaha 2
            persediaanBarangNF2 = document.getElementById("persediaanBarangNF2").value.replace(/,/g, "");
            pembelianBahanNF2 = document.getElementById("pembelianBahanNF2").value.replace(/,/g, "");
            upahLangsungNF2 = document.getElementById("upahLangsungNF2").value.replace(/,/g, "");
            upahTidakLangsungNF2 = document.getElementById("upahTidakLangsungNF2").value.replace(/,/g, "");
            penyusutanNF2 = document.getElementById("penyusutanNF2").value.replace(/,/g, "");
            bohLainNF2 = document.getElementById("bohLainNF2").value.replace(/,/g, "");

            totalBohNF2 = +upahTidakLangsungNF2 + +penyusutanNF2 + +bohLainNF2;
            document.getElementById("totalBohNF2").value = totalBohNF2;

            totalBohNF2Dummy = totalBohNF2;
            document.getElementById("totalBohNF2Dummy").value = totalBohNF2Dummy;
            totalBohNF2Dummy = document.getElementById("totalBohNF2Dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("totalBohNF2Dummy").value =
                totalBohNF2Dummy;

            jmlHargaPokokPenjualanNF2 = +persediaanBarangNF2 + +pembelianBahanNF2 + +upahLangsungNF2 + +totalBohNF2;
            document.getElementById("jmlHargaPokokPenjualanNF2").value = jmlHargaPokokPenjualanNF2;

            jmlHargaPokokPenjualanNF2Dummy = jmlHargaPokokPenjualanNF2;
            document.getElementById("jmlHargaPokokPenjualanNF2Dummy").value = jmlHargaPokokPenjualanNF2Dummy;
            jmlHargaPokokPenjualanNF2Dummy = document.getElementById("jmlHargaPokokPenjualanNF2Dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("jmlHargaPokokPenjualanNF2Dummy").value =
                jmlHargaPokokPenjualanNF2Dummy;

            labaKotorNF2 = +penjualanBersihNF2 - +jmlHargaPokokPenjualanNF2;
            document.getElementById("labaKotorNF2").value = labaKotorNF2;

            labaKotorNF2Dummy = labaKotorNF2;
            document.getElementById("labaKotorNF2Dummy").value = labaKotorNF2Dummy;
            labaKotorNF2Dummy = document.getElementById("labaKotorNF2Dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("labaKotorNF2Dummy").value =
                labaKotorNF2Dummy;

            //Sum Non Fixed Income Harga Pokok Penjualan Usaha Pasangan
            persediaanBarangNFP = document.getElementById("persediaanBarangNFP").value.replace(/,/g, "");
            pembelianBahanNFP = document.getElementById("pembelianBahanNFP").value.replace(/,/g, "");
            upahLangsungNFP = document.getElementById("upahLangsungNFP").value.replace(/,/g, "");
            upahTidakLangsungNFP = document.getElementById("upahTidakLangsungNFP").value.replace(/,/g, "");
            penyusutanNFP = document.getElementById("penyusutanNFP").value.replace(/,/g, "");
            bohLainNFP = document.getElementById("bohLainNFP").value.replace(/,/g, "");

            totalBohNFP = +upahTidakLangsungNFP + +penyusutanNFP + +bohLainNFP;
            document.getElementById("totalBohNFP").value = totalBohNFP;

            totalBohNFPDummy = totalBohNFP;
            document.getElementById("totalBohNFPDummy").value = totalBohNFPDummy;
            totalBohNFPDummy = document.getElementById("totalBohNFPDummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("totalBohNFPDummy").value =
                totalBohNFPDummy;

            jmlHargaPokokPenjualanNFP = +persediaanBarangNFP + +pembelianBahanNFP + +upahLangsungNFP + +totalBohNFP;
            document.getElementById("jmlHargaPokokPenjualanNFP").value = jmlHargaPokokPenjualanNFP;

            jmlHargaPokokPenjualanNFPDummy = jmlHargaPokokPenjualanNFP;
            document.getElementById("jmlHargaPokokPenjualanNFPDummy").value = jmlHargaPokokPenjualanNFPDummy;
            jmlHargaPokokPenjualanNFPDummy = document.getElementById("jmlHargaPokokPenjualanNFPDummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("jmlHargaPokokPenjualanNFPDummy").value =
                jmlHargaPokokPenjualanNFPDummy;

            labaKotorNFP = +penjualanBersihNFP - +jmlHargaPokokPenjualanNFP;
            document.getElementById("labaKotorNFP").value = labaKotorNFP;

            labaKotorNFPDummy = labaKotorNFP;
            document.getElementById("labaKotorNFPDummy").value = labaKotorNFPDummy;
            labaKotorNFPDummy = document.getElementById("labaKotorNFPDummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("labaKotorNFPDummy").value =
                labaKotorNFPDummy;

            //Biaya Administrasi
            //Biaya Administrasi dan Laba Usaha 1
            biayaPenjualanNF1 = document.getElementById("biayaPenjualanNF1").value.replace(/,/g, "");
            biayaGajiKomisarisDireksiStaffNF1 = document.getElementById("biayaGajiKomisarisDireksiStaffNF1").value.replace(
                /,/g, "");
            biayaListrikTeleponAirNF1 = document.getElementById("biayaListrikTeleponAirNF1").value.replace(/,/g, "");
            biayaPerawatanGedungNF1 = document.getElementById("biayaPerawatanGedungNF1").value.replace(/,/g, "");
            biayaBagiHasilSewaMarginNF1 = document.getElementById("biayaBagiHasilSewaMarginNF1").value.replace(/,/g, "");
            biayaAdmLainNF1 = document.getElementById("biayaAdmLainNF1").value.replace(/,/g, "");

            jmlBiayaAdmNF1 = +biayaPenjualanNF1 + +biayaGajiKomisarisDireksiStaffNF1 + +biayaListrikTeleponAirNF1 +
                +biayaPerawatanGedungNF1 + +biayaBagiHasilSewaMarginNF1 + +biayaAdmLainNF1;
            document.getElementById("jmlBiayaAdmNF1").value = jmlBiayaAdmNF1;

            jmlBiayaAdmNF1Dummy = jmlBiayaAdmNF1;
            document.getElementById("jmlBiayaAdmNF1Dummy").value = jmlBiayaAdmNF1Dummy;
            jmlBiayaAdmNF1Dummy = document.getElementById("jmlBiayaAdmNF1Dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("jmlBiayaAdmNF1Dummy").value =
                jmlBiayaAdmNF1Dummy;

            labaSebelumPajakNF1 = +labaKotorNF1 - +jmlBiayaAdmNF1;
            document.getElementById("labaSebelumPajakNF1").value = labaSebelumPajakNF1;

            labaSebelumPajakNF1Dummy = labaSebelumPajakNF1;
            document.getElementById("labaSebelumPajakNF1Dummy").value = labaSebelumPajakNF1Dummy;
            labaSebelumPajakNF1Dummy = document.getElementById("labaSebelumPajakNF1Dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("labaSebelumPajakNF1Dummy").value =
                labaSebelumPajakNF1Dummy;

            pajakZakatNF1 = document.getElementById("pajakZakatNF1").value;

            labaSetelahPajakNF1 = +labaSebelumPajakNF1 - +pajakZakatNF1;
            document.getElementById("labaSetelahPajakNF1").value = labaSetelahPajakNF1;

            labaSetelahPajakNF1Dummy = labaSetelahPajakNF1;
            document.getElementById("labaSetelahPajakNF1Dummy").value = labaSetelahPajakNF1Dummy;
            labaSetelahPajakNF1Dummy = document.getElementById("labaSetelahPajakNF1Dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("labaSetelahPajakNF1Dummy").value =
                labaSetelahPajakNF1Dummy;

            //Biaya Administrasi dan Laba Usaha 2
            biayaPenjualanNF2 = document.getElementById("biayaPenjualanNF2").value.replace(/,/g, "");
            biayaGajiKomisarisDireksiStaffNF2 = document.getElementById("biayaGajiKomisarisDireksiStaffNF2").value.replace(
                /,/g, "");
            biayaListrikTeleponAirNF2 = document.getElementById("biayaListrikTeleponAirNF2").value.replace(/,/g, "");
            biayaPerawatanGedungNF2 = document.getElementById("biayaPerawatanGedungNF2").value.replace(/,/g, "");
            biayaBagiHasilSewaMarginNF2 = document.getElementById("biayaBagiHasilSewaMarginNF2").value.replace(/,/g, "");
            biayaAdmLainNF2 = document.getElementById("biayaAdmLainNF2").value.replace(/,/g, "");

            jmlBiayaAdmNF2 = +biayaPenjualanNF2 + +biayaGajiKomisarisDireksiStaffNF2 + +biayaListrikTeleponAirNF2 +
                +biayaPerawatanGedungNF2 + +biayaBagiHasilSewaMarginNF2 + +biayaAdmLainNF2;
            document.getElementById("jmlBiayaAdmNF2").value = jmlBiayaAdmNF2;

            jmlBiayaAdmNF2Dummy = jmlBiayaAdmNF2;
            document.getElementById("jmlBiayaAdmNF2Dummy").value = jmlBiayaAdmNF2Dummy;
            jmlBiayaAdmNF2Dummy = document.getElementById("jmlBiayaAdmNF2Dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("jmlBiayaAdmNF2Dummy").value =
                jmlBiayaAdmNF2Dummy;

            labaSebelumPajakNF2 = +labaKotorNF2 - +jmlBiayaAdmNF2;
            document.getElementById("labaSebelumPajakNF2").value = labaSebelumPajakNF2;

            labaSebelumPajakNF2Dummy = labaSebelumPajakNF2;
            document.getElementById("labaSebelumPajakNF2Dummy").value = labaSebelumPajakNF2Dummy;
            labaSebelumPajakNF2Dummy = document.getElementById("labaSebelumPajakNF2Dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("labaSebelumPajakNF2Dummy").value =
                labaSebelumPajakNF2Dummy;

            pajakZakatNF2 = document.getElementById("pajakZakatNF2").value;

            labaSetelahPajakNF2 = +labaSebelumPajakNF2 - +pajakZakatNF2;
            document.getElementById("labaSetelahPajakNF2").value = labaSetelahPajakNF2;

            labaSetelahPajakNF2Dummy = labaSetelahPajakNF2;
            document.getElementById("labaSetelahPajakNF2Dummy").value = labaSetelahPajakNF2Dummy;
            labaSetelahPajakNF2Dummy = document.getElementById("labaSetelahPajakNF2Dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("labaSetelahPajakNF2Dummy").value =
                labaSetelahPajakNF2Dummy;

            //Biaya Administrasi dan Laba Usaha Pasangan
            biayaPenjualanNFP = document.getElementById("biayaPenjualanNFP").value;
            biayaGajiKomisarisDireksiStaffNFP = document.getElementById("biayaGajiKomisarisDireksiStaffNFP").value.replace(
                /,/g, "");
            biayaListrikTeleponAirNFP = document.getElementById("biayaListrikTeleponAirNFP").value.replace(/,/g, "");
            biayaPerawatanGedungNFP = document.getElementById("biayaPerawatanGedungNFP").value.replace(/,/g, "");
            biayaBagiHasilSewaMarginNFP = document.getElementById("biayaBagiHasilSewaMarginNFP").value.replace(/,/g, "");
            biayaAdmLainNFP = document.getElementById("biayaAdmLainNFP").value.replace(/,/g, "");

            jmlBiayaAdmNFP = +biayaPenjualanNFP + +biayaGajiKomisarisDireksiStaffNFP + +biayaListrikTeleponAirNFP +
                +biayaPerawatanGedungNFP + +biayaBagiHasilSewaMarginNFP + +biayaAdmLainNFP;
            document.getElementById("jmlBiayaAdmNFP").value = jmlBiayaAdmNFP;

            jmlBiayaAdmNFPDummy = jmlBiayaAdmNFP;
            document.getElementById("jmlBiayaAdmNFPDummy").value = jmlBiayaAdmNFPDummy;
            jmlBiayaAdmNFPDummy = document.getElementById("jmlBiayaAdmNFPDummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("jmlBiayaAdmNFPDummy").value =
                jmlBiayaAdmNFPDummy;

            labaSebelumPajakNFP = +labaKotorNFP - +jmlBiayaAdmNFP;
            document.getElementById("labaSebelumPajakNFP").value = labaSebelumPajakNFP;

            labaSebelumPajakNFPDummy = labaSebelumPajakNFP;
            document.getElementById("labaSebelumPajakNFPDummy").value = labaSebelumPajakNFPDummy;
            labaSebelumPajakNFPDummy = document.getElementById("labaSebelumPajakNFPDummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("labaSebelumPajakNFPDummy").value =
                labaSebelumPajakNFPDummy;

            pajakZakatNFP = document.getElementById("pajakZakatNFP").value;

            labaSetelahPajakNFP = +labaSebelumPajakNFP - +pajakZakatNFP;
            document.getElementById("labaSetelahPajakNFP").value = labaSetelahPajakNFP;

            labaSetelahPajakNFPDummy = labaSetelahPajakNFP;
            document.getElementById("labaSetelahPajakNFPDummy").value = labaSetelahPajakNFPDummy;
            labaSetelahPajakNFPDummy = document.getElementById("labaSetelahPajakNFPDummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("labaSetelahPajakNFPDummy").value =
                labaSetelahPajakNFPDummy;

            totalPenghasilanBersihPerBulan = +labaSebelumPajakNF1 + +labaSebelumPajakNF2 + +labaSebelumPajakNFP;
            document.getElementById("totalPenghasilanBersihPerBulan").value = totalPenghasilanBersihPerBulan;

            totalPenghasilanBersihPerBulanDummy = totalPenghasilanBersihPerBulan;
            document.getElementById("totalPenghasilanBersihPerBulanDummy").value = totalPenghasilanBersihPerBulanDummy;
            totalPenghasilanBersihPerBulanDummy = document.getElementById("totalPenghasilanBersihPerBulanDummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("totalPenghasilanBersihPerBulanDummy").value =
                totalPenghasilanBersihPerBulanDummy;
        }

        function SumAngsuran(value) {
            var plafond, tenor, margin, angsuran, angsuran1, angsuran2, angsuran3;

            plafond = document.getElementById("plafond").value;
            tenor = document.getElementById("tenor").value;
            margin = document.getElementById("margin").value / 100;


            angsuran = plafond * margin * tenor + +plafond / tenor;


            document.getElementById("angsuran").value = Math.round(angsuran);

        }
    </script>
    <!-- END: Content-->
@endsection
