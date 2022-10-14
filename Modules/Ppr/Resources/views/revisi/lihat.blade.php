@extends('ppr::layouts.main')

@section('content')
    <style>
        /* Custom and additional styles for PPR */
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

        .col-fixed-width {
            /* column-width: initial; */
            max-width: 200px;
            word-wrap: break-word;
        }

        .form-check-input[type="radio"] {
            border-radius: 10%;
        }

        .rounded-radio[type="radio"] {
            border-radius: 50%;
        }

        /* Text beside input field */
        .form-text-beside {
            color: #5e5873;
            font-size: 12px;
            margin-left: -15px;
        }

        /* Validate style for Select2 class */
        .was-validated select.select2:invalid+.select2 .select2-selection {
            border-color: #dc3545 !important;
        }

        .was-validated select.select2:valid+.select2 .select2-selection {
            border-color: #28a745 !important;
        }

        /* Murabahah use Margin */
        #ifMurabahah {
            width: 100%;
            height: 63px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifMurabahah.hide {
            margin-top: -15px;
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #formPermohonanJmlMargin {
            margin-bottom: 53px;
            width: 100%;
            height: 40px;
            transition: all 0.5s;
        }

        #formPermohonanJmlMargin.hide {
            margin-top: -15px;
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        /* IMBT use Ujrah(?) */
        #ifImbt {
            width: 100%;
            height: 63px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifImbt.hide {
            margin-top: -15px;
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #formPermohonanJmlSewa {
            margin-bottom: 13px;
            width: 100%;
            height: 40px;
            transition: all 0.5s;
        }

        #formPermohonanJmlSewa.hide {
            margin-top: -15px;
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        /* MMQ use Bagi Hasil */
        #ifMmq {
            width: 100%;
            height: 63px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifMmq.hide {
            margin-top: -15px;
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #formPermohonanJmlBagiHasil {
            margin-bottom: 13px;
            width: 100%;
            height: 40px;
            transition: all 0.5s;
        }

        #formPermohonanJmlBagiHasil.hide {
            margin-top: -15px;
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        /* Akad Lain use Margin */
        #ifAkadLain {
            width: 100%;
            height: 63px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifAkadLain.hide {
            margin-top: -15px;
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #formPermohonanJmlMarginAkadLain {
            margin-bottom: 13px;
            width: 100%;
            height: 40px;
            transition: all 0.5s;
        }

        #formPermohonanJmlMarginAkadLain.hide {
            margin-top: -15px;
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        /* Show and hide fields style */
        #ifJenisAkadLain {
            width: 50%;
            height: 40px;
            transition: all 0.5s;
        }

        #ifJenisAkadLain.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifAgamaLain {
            width: 50%;
            height: 40px;
            transition: all 0.5s;
        }

        #ifAgamaLain.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifMenikah {
            width: 100%;
            height: 300px;
            transition: all 0.5s;
        }

        #ifMenikah.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifMenikahHeader {
            width: 100%;
            height: 40px;
            transition: all 0.5s;
        }

        #ifMenikahHeader.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifISM {
            width: 100%;
            height: 1000px;
            transition: all 0.5s;
        }

        #ifISM.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifISMHeader {
            width: 100%;
            height: 40px;
            transition: all 0.5s;
        }

        #ifISMHeader.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifDijaminkan {
            width: 41.5%;
            height: 75px;
            transition: all 0.5s;
        }

        #ifDijaminkan.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPerbaruiFotoPemohon {
            width: 50%;
            height: 40px;
            transition: all 0.5s;
        }

        #ifPerbaruiFotoPemohon.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPerbaruiFotoPasanganPemohon {
            width: 50%;
            height: 63px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifPerbaruiFotoPasanganPemohon.hide {
            margin-top: -15px;
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPemohonBidangUsahaLain {
            width: 50%;
            height: 40px;
            transition: all 0.5s;
        }

        #ifPemohonBidangUsahaLain.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPemohonJenisPekerjaanLain {
            width: 50%;
            height: 40px;
            transition: all 0.5s;
        }

        #ifPemohonJenisPekerjaanLain.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPasanganBidangUsahaLain {
            width: 50%;
            height: 40px;
            transition: all 0.5s;
        }

        #ifPasanganBidangUsahaLain.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifPasanganJenisPekerjaanLain {
            width: 50%;
            height: 40px;
            transition: all 0.5s;
        }

        #ifPasanganJenisPekerjaanLain.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifJenisAgunan1Lain {
            width: 50%;
            height: 40px;
            transition: all 0.5s;
        }

        #ifJenisAgunan1Lain.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifShgbAgunan1Expired {
            width: 25%;
            height: 63px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifShgbAgunan1Expired.hide {
            margin-top: -15px;
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifShgbAgunan1Hak {
            width: 50%;
            height: 63px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifShgbAgunan1Hak.hide {
            margin-top: -15px;
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifJenisAgunan2Lain {
            width: 50%;
            height: 40px;
            transition: all 0.5s;
        }

        #ifJenisAgunan2Lain.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifShgbAgunan2Expired {
            width: 25%;
            height: 63px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifShgbAgunan2Expired.hide {
            margin-top: -15px;
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifShgbAgunan2Hak {
            width: 50%;
            height: 63px;
            margin-bottom: 13px;
            transition: all 0.5s;
        }

        #ifShgbAgunan2Hak.hide {
            margin-top: -15px;
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        #ifHubunganLainnya {
            width: 50%;
            height: 60px;
            transition: all 0.5s;
        }

        #ifHubunganLainnya.hide {
            margin-top: -15px;
            height: 0;
            opacity: 0;
            overflow: hidden;
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
                        @if ($pembiayaan->dilengkapi_ao != 'Telah dilengkapi')
                            <li class="nav-item li-disabled">
                                <a class="nav-link" id="check-list-justified" data-bs-toggle="tab" href="#check-list"
                                    role="tab" aria-controls="check-list" aria-selected="true">Check List <br /><small
                                        class="text-danger">* Silakan lengkapi Proposal terlebih dahulu</small></a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" id="check-list-justified" data-bs-toggle="tab" href="#check-list"
                                    role="tab" aria-controls="check-list" aria-selected="true">Check List</a>
                            </li>
                        @endif
                        @if ($pembiayaan->dilengkapi_ao != 'Telah dilengkapi' && $pembiayaan->form_cl != 'Telah diisi')
                            <li class="nav-item li-disabled">
                                <a class="nav-link" id="scoring-justified" data-bs-toggle="tab" href="#scoring"
                                    role="tab" aria-controls="scoring" aria-selected="false">Scoring <br /><small
                                        class="text-danger">* Silakan lengkapi Proposal dan isi Check List terlebih
                                        dahulu</small></a>
                            </li>
                        @elseif ($pembiayaan->dilengkapi_ao == 'Telah dilengkapi' && $pembiayaan->form_cl != 'Telah diisi')
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
                                            <span class="bs-stepper-subtitle">Isi Data Permohonan</span>
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
                                            <span class="bs-stepper-title">Data Penghasilan dan Pengeluaran</span>
                                            <span class="bs-stepper-subtitle">Isi Data Penghasilan dan Pengeluaran</span>
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
                                            <span class="bs-stepper-title">Data Kekayaan dan Pinjaman</span>
                                            <span class="bs-stepper-subtitle">Isi Data Kekayaan dan Pinjaman</span>
                                        </span>
                                    </button>
                                </div>
                                <div class="line">
                                    <i data-feather="chevron-right" class="font-medium-2"></i>
                                </div>
                                <div class="step" data-target="#formLampiran" role="tab" id="lampiran-trigger">
                                    <button type="button" class="step-trigger">
                                        <span class="bs-stepper-box">
                                            <i data-feather="file" class="font-medium-3"></i>
                                        </span>
                                        <span class="bs-stepper-label">
                                            <span class="bs-stepper-title">Lampiran</span>
                                            <span class="bs-stepper-subtitle">Upload Lampiran</span>
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
                                            <span class="bs-stepper-title">Persyaratan Kelengkapan</span>
                                            <span class="bs-stepper-subtitle">Informasi Persyaratan Kelengkapan
                                                Dokumen</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content">
                                <form action="/ppr/revisi/{{ $pembiayaan->id }}" class="needs-validation" method="POST"
                                    enctype="multipart/form-data" novalidate>
                                    @method('PUT')
                                    @csrf
                                    @if ($pembiayaan->form_cl == 'Telah diisi')
                                        <input type="hidden" name="dilengkapi_ao" value="Telah dilengkapi" />
                                        <input type="hidden" name="form_cl" value="Telah diisi" />
                                    @elseif ($pembiayaan->form_score == 'Telah dinilai')
                                        <input type="hidden" name="dilengkapi_ao" value="Telah dilengkapi" />
                                        <input type="hidden" name="form_score" value="Telah dinilai" />
                                    @else
                                        <input type="hidden" name="dilengkapi_ao" value="Telah dilengkapi" />
                                    @endif
                                    <!-- Form Permohonan -->
                                    <div id="formPermohonan" class="content" role="tabpanel"
                                        aria-labelledby="permohonan-trigger">
                                        <div class="content-header">
                                            {{-- <h5 class="mb-0">Account Details</h5> --}}
                                            <small class="text-danger">* Wajib Diisi</small>
                                        </div>
                                        <div class="row">
                                            {{-- <input type="hidden" name="jenis_nasabah"
                                                value="{{ request('jenis_nasabah') }}" /> --}}
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="ao"><small class="text-danger">*
                                                    </small>Nama Account Officer (AO)</label>
                                                <select class="select2 w-100" name="user_id" id="ao" disabled>
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
                                                    id="formPermohonanJenisAkadPembayaran" onChange="changeJenisAkad()"
                                                    data-placeholder="Pilih
                                                    Akad
                                                    Pembayaran">
                                                    <option value=""></option>
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
                                                        {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran == 'Akad Lainnya' ? 'selected' : '' }}
                                                        value="Akad Lainnya">Lainnya
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6 {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran == 'Akad Lainnya' ? 'show' : 'hide' }}"
                                                id="ifJenisAkadLain">
                                                <label class="form-label" for="akadLainnya"><small class="text-danger">*
                                                    </small>Jenis Akad Lainnya</label>
                                                <input type="text" name="form_permohonan_jenis_akad_pembayaran_lain"
                                                    id="akadLainnya" class="form-control"
                                                    placeholder="Masukkan Jenis Akad Pembayaran"
                                                    value="{{ $pembiayaan->form_permohonan_jenis_akad_pembayaran_lain }}" />
                                            </div>
                                            <hr style="margin-top: 7px;" />

                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_permohonan_nilai_ppr_dimohon"><small
                                                        class="text-danger">*
                                                    </small>Nilai PPR Syariah
                                                    Dimohon</label>
                                                <input type="text" name="form_permohonan_nilai_ppr_dimohon"
                                                    id="form_permohonan_nilai_ppr_dimohon"
                                                    class="form-control numeral-mask"
                                                    placeholder="Nilai PPR Syariah Dimohon"
                                                    value="{{ $pembiayaan->form_permohonan_nilai_ppr_dimohon }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_permohonan_uang_muka_dana_sendiri"><small
                                                        class="text-danger">*
                                                    </small>Uang Muka/Dana
                                                    Sendiri</label>
                                                <input type="text" name="form_permohonan_uang_muka_dana_sendiri"
                                                    id="form_permohonan_uang_muka_dana_sendiri"
                                                    class="form-control numeral-mask1"
                                                    placeholder="Uang Muka/Dana Sendiri"
                                                    value="{{ $pembiayaan->form_permohonan_uang_muka_dana_sendiri }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_permohonan_nilai_hpp"><small
                                                        class="text-danger">*
                                                    </small>Nilai
                                                    HPP</label>
                                                <input type="text" name="form_permohonan_nilai_hpp"
                                                    id="form_permohonan_nilai_hpp" class="form-control  numeral-mask2"
                                                    placeholder="Nilai HPP"
                                                    value="{{ $pembiayaan->form_permohonan_nilai_hpp }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_permohonan_harga_jual"><small
                                                        class="text-danger">*
                                                    </small>Harga
                                                    Jual</label>
                                                <input type="text" name="form_permohonan_harga_jual"
                                                    id="form_permohonan_harga_jual" class="form-control numeral-mask3"
                                                    placeholder="Harga Jual"
                                                    value="{{ $pembiayaan->form_permohonan_harga_jual }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="formPermohonanJangkaWaktuTahun"><small
                                                        class="text-danger">*
                                                    </small>Jangka Waktu PPR Syariah (Tahun)</label>
                                                <select class="select2 w-100" name="form_permohonan_jangka_waktu_ppr"
                                                    id="formPermohonanJangkaWaktuTahun" onChange="changeJangkaWaktu()"
                                                    data-placeholder="Pilih
                                                    Jangka Waktu"
                                                    required>
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '1' ? 'selected' : '' }}
                                                        value="1">1 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '2' ? 'selected' : '' }}
                                                        value="2">2 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '3' ? 'selected' : '' }}
                                                        value="3">3 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '4' ? 'selected' : '' }}
                                                        value="4">4 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '5' ? 'selected' : '' }}
                                                        value="5">5 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '6' ? 'selected' : '' }}
                                                        value="6">6 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '7' ? 'selected' : '' }}
                                                        value="7">7 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '8' ? 'selected' : '' }}
                                                        value="8">8 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '9' ? 'selected' : '' }}
                                                        value="9">9 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '10' ? 'selected' : '' }}
                                                        value="10">10 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '11' ? 'selected' : '' }}
                                                        value="11">11 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '12' ? 'selected' : '' }}
                                                        value="12">12 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '13' ? 'selected' : '' }}
                                                        value="13">13 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '14' ? 'selected' : '' }}
                                                        value="14">14 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '15' ? 'selected' : '' }}
                                                        value="15">15 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '16' ? 'selected' : '' }}
                                                        value="16">16 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '17' ? 'selected' : '' }}
                                                        value="17">17 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '18' ? 'selected' : '' }}
                                                        value="18">18 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '19' ? 'selected' : '' }}
                                                        value="19">19 Tahun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_jangka_waktu_ppr == '20' ? 'selected' : '' }}
                                                        value="20">20 Tahun</option>
                                                </select>
                                            </div>

                                            <div class="mb-1 col-md-6 row">
                                                <div class="col-md-10">
                                                    <label class="form-label" for="formPermohonanJumlahBulan"><small
                                                            class="text-danger">*
                                                        </small>Jumlah
                                                        Bulan</label>
                                                    <input type="number" name="form_permohonan_jml_bulan"
                                                        id="formPermohonanJumlahBulan" class="form-control"
                                                        placeholder="Jumlah Bulan"
                                                        value="{{ $pembiayaan->form_permohonan_jml_bulan }}" />
                                                </div>
                                                <div class="col-auto" style="margin-top: 32px;">
                                                    <span class="form-text-beside">Bulan</span>
                                                </div>
                                            </div>

                                            <div class="mb-1 col-md-6 {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran == 'Murabahah' ? 'show' : 'hide' }}"
                                                id="ifMurabahah">
                                                <label class="form-label" for="form_permohonan_jml_margin"><small
                                                        class="text-danger">*
                                                    </small>Jumlah Margin</label>
                                                <input type="text" name="form_permohonan_jml_margin"
                                                    id="formPermohonanJmlMargin"
                                                    class="form-control numeral-mask4 {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran == 'Murabahah' ? 'show' : 'hide' }}"
                                                    placeholder="Masukkan Jumlah Margin"
                                                    value="{{ $pembiayaan->form_permohonan_jml_margin }}" required />
                                            </div>
                                            <div class="mb-1 col-md-6 {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran == 'IMBT' ? 'show' : 'hide' }}"
                                                id="ifImbt">
                                                <label class="form-label" for="form_permohonan_jml_sewa"><small
                                                        class="text-danger">*
                                                    </small>Jumlah Sewa</label>
                                                <input type="text" name="form_permohonan_jml_sewa"
                                                    id="formPermohonanJmlSewa"
                                                    class="form-control numeral-mask5 {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran == 'IMBT' ? 'show' : 'hide' }}"
                                                    placeholder="Masukkan Jumlah Sewa"
                                                    value="{{ $pembiayaan->form_permohonan_jml_sewa }}" required />
                                            </div>
                                            <div class="mb-1 col-md-6 {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran == 'MMQ' ? 'show' : 'hide' }}"
                                                id="ifMmq">
                                                <label class="form-label" for="form_permohonan_jml_bagi_hasil"><small
                                                        class="text-danger">*
                                                    </small>Jumlah Bagi
                                                    Hasil</label>
                                                <input type="text" name="form_permohonan_jml_bagi_hasil"
                                                    id="formPermohonanJmlBagiHasil"
                                                    class="form-control numeral-mask6 {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran == 'MMQ' ? 'show' : 'hide' }}"
                                                    placeholder="Masukkan Jumlah Bagi"
                                                    value="{{ $pembiayaan->form_permohonan_jml_bagi_hasil }}" required />
                                            </div>
                                            <div class="mb-1 col-md-6 {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran == 'Akad Lainnya' ? 'show' : 'hide' }}"
                                                id="ifAkadLain">
                                                <label class="form-label"
                                                    for="form_permohonan_jml_margin_akad_lain"><small
                                                        class="text-danger">*
                                                    </small>Jumlah Margin (Akad Lain)</label>
                                                <input type="text" name="form_permohonan_jml_margin"
                                                    id="formPermohonanJmlMarginAkadLain"
                                                    class="form-control numeral-mask105 {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran == 'Akad Lainnya' ? 'show' : 'hide' }}"
                                                    placeholder="Masukkan Jumlah Margin (Akad Lain)"
                                                    value="{{ $pembiayaan->form_permohonan_jml_margin }}" required />
                                            </div>

                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_permohonan_peruntukan_ppr"><small
                                                        class="text-danger">*
                                                    </small>Peruntukan PPR Syariah</label>
                                                <select class="select2 w-100" name="form_permohonan_peruntukan_ppr"
                                                    id="form_permohonan_peruntukan_ppr"
                                                    data-placeholder="Pilih
                                                    Peruntukan">
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_peruntukan_ppr == 'Rumah Tinggal' ? 'selected' : '' }}
                                                        value="Rumah Tinggal">Rumah Tinggal
                                                    </option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_peruntukan_ppr == 'Apartemen' ? 'selected' : '' }}
                                                        value="Apartemen">Apartemen</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_peruntukan_ppr == 'Rusun' ? 'selected' : '' }}
                                                        value="Rusun">Rusun</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_peruntukan_ppr == 'Ruko' ? 'selected' : '' }}
                                                        value="Ruko">Ruko</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_peruntukan_ppr == 'Rukan' ? 'selected' : '' }}
                                                        value="Rukan">Rukan</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_peruntukan_ppr == 'Kios' ? 'selected' : '' }}
                                                        value="Kios">Kios</option>
                                                </select>
                                            </div>

                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_permohonan_sistem_pembayaran_angsuran"><small
                                                        class="text-danger">*
                                                    </small>Sistem Pembayaran Angsuran</label>
                                                <select class="select2 w-100"
                                                    name="form_permohonan_sistem_pembayaran_angsuran"
                                                    id="form_permohonan_sistem_pembayaran_angsuran"
                                                    data-placeholder="Pilih Sistem Pembayaran Angsuran" required>
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_sistem_pembayaran_angsuran == 'Kolektif/Potong Gaji' ? 'selected' : '' }}
                                                        value="Kolektif/Potong Gaji">
                                                        Kolektif/Potong
                                                        Gaji</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_sistem_pembayaran_angsuran == 'Pemindahbukuan/Transfer' ? 'selected' : '' }}
                                                        value="Pemindahbukuan/Transfer">
                                                        Pemindahbukuan/Transfer</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_sistem_pembayaran_angsuran == 'Tunai - ATM' ? 'selected' : '' }}
                                                        value="Tunai - ATM">Tunai - ATM</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_sistem_pembayaran_angsuran == 'Tunai - Loket' ? 'selected' : '' }}
                                                        value="Tunai - Loket">Tunai - Loket</option>
                                                    <option
                                                        {{ $pembiayaan->form_permohonan_sistem_pembayaran_angsuran == 'Kantor Pos' ? 'selected' : '' }}
                                                        value="Kantor Pos">Kantor Pos</option>
                                                </select>
                                            </div>
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


                                    <!-- Form Data Pribadi -->
                                    <div id="formDataPribadi" class="content" role="tabpanel"
                                        aria-labelledby="pribadi-trigger">
                                        <div class="content-header">
                                            <h4>Data Pribadi</h4>
                                            <hr>
                                        </div>

                                        <!-- Data Pemohon start -->
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
                                                <label class="form-label" for="form_pribadi_pemohon_no_ktp_berlaku_sd"><small
                                                        class="text-danger">*
                                                    </small>Berlaku s/d.</label>
                                                <input type="date" id="form_pribadi_pemohon_no_ktp_berlaku_sd"
                                                    class="form-control flatpickr-basic"
                                                    name="form_pribadi_pemohon_no_ktp_berlaku_sd" placeholder="YYYY-MM-DDYY" />
                                            </div> --}}
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pribadi_pemohon_jenis_kelamin"><small
                                                        class="text-danger">*
                                                    </small>Jenis Kelamin</label>
                                                <div>
                                                    &ensp;
                                                    <input type="radio" name="form_pribadi_pemohon_jenis_kelamin"
                                                        class="form-check-input rounded-radio" id="pria"
                                                        value="Pria"
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_jenis_kelamin == 'Pria' ? 'checked' : '' }}
                                                        required />
                                                    <label class="form-label" for="pria">&nbsp;Pria</label>
                                                    <br>
                                                    &ensp;
                                                    <input type="radio" name="form_pribadi_pemohon_jenis_kelamin"
                                                        class="form-check-input rounded-radio" id="wanita"
                                                        value="Wanita"
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_jenis_kelamin == 'Wanita' ? 'checked' : '' }}
                                                        required />
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
                                                    name="form_pribadi_pemohon_tanggal_lahir" placeholder="YYYY-MM-DDYY"
                                                    value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_tanggal_lahir }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <small class="text-danger">*
                                                </small> <label class="form-label" for="form_pribadi_pemohon_npwp">No.
                                                    NPWP</label>
                                                <input type="text" name="form_pribadi_pemohon_npwp"
                                                    id="form_pribadi_pemohon_npwp" class="form-control"
                                                    placeholder="Masukkan Nomor NPWP Anda"
                                                    value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_npwp }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pribadi_pemohon_pendidikan"><small
                                                        class="text-danger">*
                                                    </small>Pendidikan</label>
                                                <select class="select2 w-100" name="form_pribadi_pemohon_pendidikan"
                                                    id="form_pribadi_pemohon_pendidikan"
                                                    data-placeholder="Pilih
                                                    Pendidikan"
                                                    required>
                                                    <option value=""></option>
                                                    <option>
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_pendidikan == 'SD' ? 'selected' : '' }}
                                                        value="SD">SD</option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_pendidikan == 'SLTP' ? 'selected' : '' }}
                                                        value="SLTP">SLTP</option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_pendidikan == 'SLTA' ? 'selected' : '' }}
                                                        value="SLTA">SLTA</option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_pendidikan == 'D1' ? 'selected' : '' }}
                                                        value="D1">D1</option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_pendidikan == 'D2' ? 'selected' : '' }}
                                                        value="D2">D2</option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_pendidikan == 'D3' ? 'selected' : '' }}
                                                        value="D3">D3</option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_pendidikan == 'S1' ? 'selected' : '' }}
                                                        value="S1">S1</option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_pendidikan == 'S2' ? 'selected' : '' }}
                                                        value="S2">S2</option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_pendidikan == 'S3' ? 'selected' : '' }}
                                                        value="S3">S3</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pribadi_pemohon_agama"><small
                                                        class="text-danger">*
                                                    </small>Agama</label>
                                                <select class="select2 w-100" name="form_pribadi_pemohon_agama"
                                                    id="formPribadiAgamaLain"
                                                    onChange="changeAgama()"data-placeholder="Pilih
                                                    Agama">
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_agama == 'Islam' ? 'selected' : '' }}
                                                        value="Islam">Islam</option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_agama == 'Protestan' ? 'selected' : '' }}
                                                        value="Protestan">Protestan</option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_agama == 'Katholik' ? 'selected' : '' }}
                                                        value="Katholik">Katholik</option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_agama == 'Budha' ? 'selected' : '' }}
                                                        value="Budha">Budha</option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_agama == 'Hindu' ? 'selected' : '' }}
                                                        value="Hindu">Hindu</option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_agama == 'Kong' ? 'selected' : '' }}
                                                        value="Kong Hu Chu">Kong Hu Chu</option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_agama == 'Lainnya' ? 'selected' : '' }}
                                                        value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6 {{ $pembiayaan->pemohon->form_pribadi_pemohon_agama == 'Lainnya' ? 'show' : 'hide' }}"
                                                id="ifAgamaLain">
                                                <label class="form-label" for="agamaLain"><small class="text-danger">*
                                                    </small>Agama Lainnya</label>
                                                <input type="text" name="form_pribadi_pemohon_agama_lain"
                                                    id="agamaLain" class="form-control" placeholder="Agama Lainnya"
                                                    value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_agama_lain }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pribadi_pemohon_status_pernikahan"><small
                                                        class="text-danger">*
                                                    </small>Status Pernikahan</label>
                                                <select class="select2 w-100"
                                                    name="form_pribadi_pemohon_status_pernikahan"
                                                    id="form_pribadi_pemohon_status_pernikahan" onChange="changeStatus()"
                                                    data-placeholder="Pilih Status Pernikahan" required>
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_status_pernikahan == 'Belum Menikah' ? 'selected' : '' }}
                                                        value="Belum Menikah">Belum Menikah</option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_status_pernikahan == 'Menikah' ? 'selected' : '' }}
                                                        value="Menikah">Menikah</option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_status_pernikahan == 'Janda/Duda - Meninggal' ? 'selected' : '' }}
                                                        value="Janda/Duda - Meninggal">Janda/Duda - Meninggal</option>
                                                    <option
                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_status_pernikahan == 'Janda/Duda - Cerai' ? 'selected' : '' }}
                                                        value="Janda/Duda - Cerai">Janda/Duda - Cerai</option>
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
                                            <div>
                                                <div class="mb-1 col-md-12">
                                                    <div data-repeater-list="form_pribadi_pemohon_alamat_ktp">
                                                        <div data-repeater-item>
                                                            <div class="row d-flex align-items-end">
                                                                <div class="col-md-4 col-12">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="form_pribadi_pemohon_alamat_ktp"><small
                                                                                class="text-danger">*
                                                                            </small>Alamat Sesuai KTP</label>
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
                                                                            </small>Kabupaten/Kota</label>
                                                                        <input type="text" class="form-control"
                                                                            name="form_pribadi_pemohon_alamat_ktp_dati2"
                                                                            id="form_pribadi_pemohon_alamat_ktp_dati2"
                                                                            aria-describedby="form_pribadi_pemohon_alamat_ktp_dati2"
                                                                            placeholder="Kabupaten/Kota"
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
                                                                            value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_ktp_provinsi }} " />
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
                                                                                </small>Alamat Tempat Tinggal
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
                                                                                </small>Kabupaten/Kota</label>
                                                                            <input type="text" class="form-control"
                                                                                name="form_pribadi_pemohon_alamat_domisili_dati2"
                                                                                id="form_pribadi_pemohon_alamat_domisili_dati2"
                                                                                aria-describedby="form_pribadi_pemohon_alamat_domisili_dati2"
                                                                                placeholder="Kabupaten/Kota"
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
                                                        <label class="form-label" for="form_pribadi_pemohon_no_telp">No.
                                                            Telepon</label>
                                                        <input type="text" name="form_pribadi_pemohon_no_telp"
                                                            id="form_pribadi_pemohon_no_telp" class="form-control"
                                                            placeholder="Masukkan Nomor Telepon Pemohon"
                                                            value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_no_telp }}" />
                                                    </div>
                                                    <div class="mb-1 col-md-6">
                                                        <label class="form-label"
                                                            for="form_pribadi_pemohon_no_handphone"><small
                                                                class="text-danger">*
                                                            </small>Handphone</label>
                                                        <input type="text" name="form_pribadi_pemohon_no_handphone"
                                                            id="form_pribadi_pemohon_no_handphone" class="form-control"
                                                            placeholder="Masukkan Nomor Handphone Pemohon"
                                                            value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_no_handphone }}" />
                                                    </div>
                                                    <div class="mb-1 col-md-12">
                                                        <div
                                                            data-repeater-list="form_pribadi_pemohon_status_tempat_tinggal">
                                                            <div data-repeater-item>
                                                                <div class="row d-flex align-items-end">
                                                                    <div class="mb-1 col-md-3">
                                                                        <label class="form-label"
                                                                            for="form_pribadi_pemohon_status_tempat_tinggal"><small
                                                                                class="text-danger">*
                                                                            </small>Status
                                                                            Tempat
                                                                            Tinggal</label>
                                                                        <select class="select2 w-200"
                                                                            name="form_pribadi_pemohon_status_tempat_tinggal"
                                                                            id="form_pribadi_pemohon_status_tempat_tinggal"
                                                                            data-placeholder="Pilih Status
                                                                            Tempat Tinggal"
                                                                            required>
                                                                            <option value=""></option>
                                                                            <option
                                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_status_tempat_tinggal == 'Milik Sendiri' ? 'selected' : '' }}
                                                                                value="Milik Sendiri">Milik Sendiri
                                                                            </option>
                                                                            <option
                                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_status_tempat_tinggal == 'Sewa/Kontrak' ? 'selected' : '' }}
                                                                                value="Sewa/Kontrak">Sewa/Kontrak
                                                                            </option>
                                                                            <option
                                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_status_tempat_tinggal == 'Kost' ? 'selected' : '' }}
                                                                                value="Kost">Kost</option>
                                                                            <option
                                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_status_tempat_tinggal ==
                                                                                'Milik
                                                                                                                                                                                                                                                                                                                                                                                                            Orangtua/Keluarga'
                                                                                    ? 'selected'
                                                                                    : '' }}
                                                                                value="Milik
                                                                            Orangtua/Keluarga">
                                                                                Milik
                                                                                Orangtua/Keluarga</option>
                                                                            <option
                                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_status_tempat_tinggal ==
                                                                                'Milik
                                                                                                                                                                                                                                                                                                                                                                                                            Perusahaan/Instansi/Dinas'
                                                                                    ? 'selected'
                                                                                    : '' }}
                                                                                value="Milik
                                                                            Perusahaan/Instansi/Dinas">
                                                                                Milik
                                                                                Perusahaan/Instansi/Dinas</option>
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
                                                                            for="form_pribadi_pemohon_status_tempat_tinggal_dijaminkan"><small
                                                                                class="text-danger">*
                                                                            </small>Sedang
                                                                            Dijaminkan</label>
                                                                        <select class="select2 w-100"
                                                                            name="form_pribadi_pemohon_status_tempat_tinggal_dijaminkan"
                                                                            id="formPribadiPemohonStatusTempatTinggalDijaminkan"
                                                                            onChange="changeDijaminkan()"
                                                                            data-placeholder="Pilih" required>
                                                                            <option value=""></option>
                                                                            <option
                                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_status_tempat_tinggal_dijaminkan == 'Ya' ? 'selected' : '' }}
                                                                                value="Ya">Ya</option>
                                                                            <option
                                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_status_tempat_tinggal_dijaminkan == 'Tidak' ? 'selected' : '' }}
                                                                                value="Tidak">Tidak</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-5 col-12 {{ $pembiayaan->pemohon->form_pribadi_pemohon_status_tempat_tinggal_dijaminkan == 'Ya' ? 'show' : 'hide' }}"
                                                                        id="ifDijaminkan">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="formPribadiPemohonStatusTempatTinggalDijaminkanYa"><small
                                                                                    class="text-danger">*
                                                                                </small>Dijaminkan
                                                                                Kepada</label>
                                                                            <input type="text" class="form-control"
                                                                                name="form_pribadi_pemohon_status_tempat_tinggal_dijaminkan_ya_kepada"
                                                                                id="formPribadiPemohonStatusTempatTinggalDijaminkanYa"
                                                                                aria-describedby="formPribadiPemohonStatusTempatTinggalDijaminkanYa"
                                                                                placeholder="Dijaminkan Kepada"
                                                                                value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_status_tempat_tinggal_dijaminkan_ya_kepada }}"
                                                                                required />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-1 col-md-6">
                                                        <label class="form-label"
                                                            for="form_pribadi_pemohon_alamat_korespondensi"><small
                                                                class="text-danger">*
                                                            </small>Alamat
                                                            Korespondensi</label>
                                                        <select class="select2 w-100"
                                                            name="form_pribadi_pemohon_alamat_korespondensi"
                                                            id="form_pribadi_pemohon_alamat_korespondensi"
                                                            data-placeholder="Pilih Alamat Korespondensi">
                                                            <option value=""></option>
                                                            <option
                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_korespondensi == 'Alamat Sesuai KTP' ? 'selected' : '' }}
                                                                value="Alamat Sesuai KTP">Alamat Sesuai KTP</option>
                                                            <option
                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_korespondensi == 'Alamat Tempat Tinggal' ? 'selected' : '' }}
                                                                value="Alamat Tempat Tinggal">Alamat Tempat Tinggal
                                                            </option>
                                                            <option
                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_korespondensi == 'Alamat Pekerjaan/Kantor' ? 'selected' : '' }}
                                                                value="Alamat Pekerjaan/Kantor">Alamat Pekerjaan/Kantor
                                                            </option>
                                                            <option
                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_korespondensi == 'Alamat Agunan' ? 'selected' : '' }}
                                                                value="Alamat Agunan">Alamat Agunan</option>
                                                        </select>
                                                    </div>
                                                    @php
                                                        $fotoPemohon = Modules\Form\Entities\FormPprFoto::Select()
                                                            ->where('form_ppr_pembiayaan_id', $pembiayaan->id)
                                                            ->where('kategori', 'Foto Pemohon')
                                                            ->get()
                                                            ->first();
                                                        $fotoPasanganPemohon = Modules\Form\Entities\FormPprFoto::Select()
                                                            ->where('form_ppr_pembiayaan_id', $pembiayaan->id)
                                                            ->where('kategori', 'Foto Pasangan Pemohon')
                                                            ->get()
                                                            ->first();
                                                    @endphp
                                                    <div class="mb-1 col-md-6" style="margin-top:23px;">
                                                        <button type="button" class="btn btn-md btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#modalFotoPemohon">
                                                            Foto Pemohon
                                                        </button>
                                                        @if ($pembiayaan->pemohon->form_pribadi_pemohon_status_pernikahan == 'Menikah')
                                                            <button type="button" class="btn btn-md btn-primary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modalFotoPasanganPemohon">
                                                                Foto Pasangan Pemohon
                                                            </button>
                                                        @endif
                                                    </div>
                                                    @if ($pembiayaan->pemohon->form_pribadi_pemohon_status_pernikahan == 'Menikah')
                                                        <div class="mb-1 col-md-6">
                                                            <label class="form-label"
                                                                for="perbaruiFotoPemohonPasangan">Perbarui Foto
                                                                Pemohon dan Pasangan
                                                            </label>
                                                            <select class="select2 w-100" name="perbarui_foto_pemohon"
                                                                id="perbaruiFotoPemohonPasangan"
                                                                onChange="changePerbaruiFotoPemohonPasangan()">
                                                                <option value="Ya">Ya</option>
                                                                <option value="Tidak" selected>Tidak
                                                                </option>
                                                            </select>
                                                        </div>
                                                    @else
                                                        <div class="mb-1 col-md-6">
                                                            <label class="form-label" for="perbaruiFotoPemohon">Perbarui
                                                                Foto
                                                                Pemohon
                                                            </label>
                                                            <select class="select2 w-100" name="perbarui_foto_pemohon"
                                                                id="perbaruiFotoPemohon"
                                                                onChange="changePerbaruiFotoPemohon()">
                                                                <option value="Ya">Ya</option>
                                                                <option value="Tidak" selected>Tidak
                                                                </option>
                                                            </select>
                                                        </div>
                                                    @endif
                                                    <div class="mb-1 col-md-6 hide" id="ifPerbaruiFotoPemohon">
                                                        <label class="form-label" for="fotoPemohon">Foto Terbaru
                                                            Pemohon</label>
                                                        <input type="hidden" name="foto[1][foto_lama]"
                                                            value="{{ old('foto', $fotoPemohon->foto) }}">
                                                        <input type="hidden" name="foto[1][id]" class="form-control"
                                                            value="{{ $fotoPemohon->id }}">
                                                        <input type="file" class="form-control" name="foto[1][foto]"
                                                            id="fotoPemohon" aria-describedby="fotoPemohon" />
                                                        <input type="hidden" name="foto[1][kategori]"
                                                            value="Foto Pemohon">

                                                    </div>

                                                    <!-- Foto Pemohon -->
                                                    <div class="modal fade" id="modalFotoPemohon" tabindex="-1"
                                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-transparent">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                    <h1 class="text-center mb-1" id="addNewCardTitle">
                                                                        {{ $fotoPemohon->kategori }}</h1>
                                                                    <div class="card-body">
                                                                        <img src="{{ asset('storage/' . $fotoPemohon->foto) }}"
                                                                            class="d-block w-100" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--End Foto Pemohon -->

                                                </div>
                                                <!-- Data Pemohon end -->

                                                <!-- Istri/Suami start -->
                                                <div class="content-header {{ $pembiayaan->pemohon->form_pribadi_pemohon_status_pernikahan == 'Menikah' ? 'show' : 'hide' }}"
                                                    id="ifMenikahHeader">
                                                    <h5 class="mb-0 mt-2">Istri/Suami</h5>
                                                    <small class="text-muted">Lengkapi Data Istri/Suami.</small>
                                                </div>
                                                <div class="row {{ $pembiayaan->pemohon->form_pribadi_pemohon_status_pernikahan == 'Menikah' ? 'show' : 'hide' }}"
                                                    id="ifMenikah">
                                                    <div class="mb-1 col-md-6">
                                                        <label class="form-label"
                                                            for="form_pribadi_istri_suami_nama_lengkap">Nama
                                                            Lengkap</label>
                                                        <input type="text" name="form_pribadi_istri_suami_nama_lengkap"
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
                                                        <input type="date" id="form_pribadi_istri_suami_no_ktp_berlaku_sd"
                                                            class="form-control flatpickr-basic"
                                                            name="form_pribadi_istri_suami_no_ktp_berlaku_sd"
                                                            placeholder="YYYY-MM-DDYY" />
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
                                                            placeholder="YYYY-MM-DDYY"
                                                            value="{{ $pembiayaan->pemohon->form_pribadi_istri_suami_tanggal_lahir }}" />
                                                    </div>
                                                    <div class="mb-1 col-md-6">
                                                        <label class="form-label"
                                                            for="form_pribadi_istri_suami_npwp">No.
                                                            NPWP</label>
                                                        <input type="text" name="form_pribadi_istri_suami_npwp"
                                                            id="form_pribadi_istri_suami_npwp" class="form-control"
                                                            placeholder="Masukkan Nomor NPWP Anda"
                                                            value="{{ $pembiayaan->pemohon->form_pribadi_istri_suami_npwp }}" />
                                                    </div>
                                                    <div class="mb-1 col-md-6">
                                                        <label class="form-label"
                                                            for="form_pribadi_istri_suami_pendidikan">Pendidikan</label>
                                                        <select class="select2 w-100"
                                                            name="form_pribadi_istri_suami_pendidikan"
                                                            id="form_pribadi_istri_suami_pendidikan"
                                                            data-placeholder="Pilih
                                                            Pendidikan"
                                                            required>
                                                            <option value=""></option>
                                                            <option
                                                                {{ $pembiayaan->pemohon->form_pribadi_istri_suami_pendidikan == 'SD' ? 'selected' : '' }}
                                                                value="SD">SD</option>
                                                            <option
                                                                {{ $pembiayaan->pemohon->form_pribadi_istri_suami_pendidikan == 'SLTP' ? 'selected' : '' }}
                                                                value="SLTP">SLTP</option>
                                                            <option
                                                                {{ $pembiayaan->pemohon->form_pribadi_istri_suami_pendidikan == 'SLTA' ? 'selected' : '' }}
                                                                value="SLTA">SLTA</option>
                                                            <option
                                                                {{ $pembiayaan->pemohon->form_pribadi_istri_suami_pendidikan == 'D1' ? 'selected' : '' }}
                                                                value="D1">D1</option>
                                                            <option
                                                                {{ $pembiayaan->pemohon->form_pribadi_istri_suami_pendidikan == 'D2' ? 'selected' : '' }}
                                                                value="D2">D2</option>
                                                            <option
                                                                {{ $pembiayaan->pemohon->form_pribadi_istri_suami_pendidikan == 'D3' ? 'selected' : '' }}
                                                                value="D3">D3</option>
                                                            <option
                                                                {{ $pembiayaan->pemohon->form_pribadi_istri_suami_pendidikan == 'S1' ? 'selected' : '' }}
                                                                value="S1">S1</option>
                                                            <option
                                                                {{ $pembiayaan->pemohon->form_pribadi_istri_suami_pendidikan == 'S2' ? 'selected' : '' }}
                                                                value="S2">S2</option>
                                                            <option
                                                                {{ $pembiayaan->pemohon->form_pribadi_istri_suami_pendidikan == 'S3' ? 'selected' : '' }}
                                                                value="S3">S3</option>
                                                        </select>
                                                    </div>

                                                    @if ($pembiayaan->pemohon->form_pribadi_pemohon_status_pernikahan == 'Menikah')
                                                        <div class="mb-1 col-md-6 hide"
                                                            id="ifPerbaruiFotoPasanganPemohon">
                                                            <label class="form-label" for="fotoPasanganPemohon">Foto
                                                                Terbaru
                                                                Istri/Suami Pemohon</label>
                                                            <input type="hidden" name="foto[2][foto_lama]"
                                                                value="{{ old('foto', $fotoPasanganPemohon->foto) }}"
                                                                id="fotoOldPasanganPemohon">
                                                            <input type="hidden" name="foto[2][id]"
                                                                class="form-control"
                                                                value="{{ $fotoPasanganPemohon->id }}"
                                                                id="kategoriOldPasanganPemohon">
                                                            <input type="file" class="form-control"
                                                                name="foto[2][foto]" id="fotoPasanganPemohon"
                                                                aria-describedby="fotoPasanganPemohon" />
                                                            <input type="hidden" name="foto[2][kategori]"
                                                                id="kategoriPasanganPemohon"
                                                                value="Foto Pasangan Pemohon">
                                                        </div>

                                                        <!-- Foto Pasangan Pemohon -->
                                                        <div class="modal fade" id="modalFotoPasanganPemohon"
                                                            tabindex="-1" aria-labelledby="addNewCardTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-transparent">
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                        <h1 class="text-center mb-1"
                                                                            id="addNewCardTitle">
                                                                            {{ $fotoPasanganPemohon->kategori }}</h1>
                                                                        <div class="card-body">
                                                                            <img src="{{ asset('storage/' . $fotoPasanganPemohon->foto) }}"
                                                                                class="d-block w-100" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="mb-1 col-md-6 hide" id="ifFotoPasanganPemohon">
                                                            <label class="form-label" for="fotoPasanganPemohon">Foto
                                                                Terbaru
                                                                Istri/Suami Pemohon</label>
                                                            <input type="file" class="form-control"
                                                                name="foto[1][foto]" id="fotoPasanganPemohon"
                                                                aria-describedby="fotoPasanganPemohon" />
                                                            <input type="hidden" name="foto[1][kategori]"
                                                                id="kategoriPasanganPemohon"
                                                                value="Foto Pasangan Pemohon">
                                                        </div>
                                                    @endif

                                                </div>
                                                <!--End Foto Pasangan Pemohon -->
                                                <!-- Istri/Suami end -->


                                                <!-- Keluarga Terdekat start -->
                                                <div class="content-header">
                                                    <h5 class="mb-0 mt-2">Keluarga Terdekat</h5>
                                                    <small class="text-muted">Untuk keperluan mendadak (keluarga dekat
                                                        tidak
                                                        serumah).</small>
                                                </div>
                                                <div>
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
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-1 col-md-6">
                                                            <label class="form-label"
                                                                for="form_pribadi_keluarga_terdekat_hubungan"><small
                                                                    class="text-danger">*
                                                                </small>Hubungan Dengan Pemohon</label>
                                                            <select class="select2 w-100"
                                                                name="form_pribadi_keluarga_terdekat_hubungan"
                                                                id="hubunganKeluargaTerdekatLain"
                                                                onChange="changeHubunganKeluargaTerdekat()"
                                                                data-placeholder="Pilih Hubungan Dengan Pemohon" required>
                                                                <option value=""></option>
                                                                <option
                                                                    {{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_hubungan == 'Orangtua' ? 'selected' : '' }}
                                                                    value="Orangtua">Orangtua</option>
                                                                <option
                                                                    {{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_hubungan == 'Mertua' ? 'selected' : '' }}
                                                                    value="Mertua">Mertua</option>
                                                                <option
                                                                    {{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_hubungan == 'Sdr. Kandung' ? 'selected' : '' }}
                                                                    value="Sdr. Kandung">Sdr. Kandung</option>
                                                                <option
                                                                    {{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_hubungan == 'Anak' ? 'selected' : '' }}
                                                                    value="Anak">Anak</option>
                                                                <option
                                                                    {{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_hubungan == 'Ipar' ? 'selected' : '' }}
                                                                    value="Ipar">Ipar</option>
                                                                <option
                                                                    {{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_hubungan == 'Sdr. Kandung dari Orangtua' ? 'selected' : '' }}
                                                                    value="Sdr. Kandung dari Orangtua">Sdr. Kandung dari
                                                                    Orangtua
                                                                </option>
                                                                <option
                                                                    {{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_hubungan == 'Lainnya' ? 'selected' : '' }}
                                                                    value="Lainnya">Lainnya</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-1 col-md-6 {{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_hubungan == 'Lainnya' ? 'show' : 'hide' }}"
                                                            id=ifHubunganLainnya>
                                                            <label class="form-label" for="hubunganLainnya"><small
                                                                    class="text-danger">*
                                                                </small>Hubungan Lainnya</label>
                                                            <input type="text"
                                                                name="form_pribadi_keluarga_terdekat_hubungan_lain"
                                                                id="hubunganLainnya" class="form-control"
                                                                placeholder="Hubungan Lainnya"
                                                                value="{{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_hubungan_lain }}"
                                                                required />
                                                        </div>
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
                                                                                    </small>Alamat Tempat Tinggal</label>
                                                                                <input type="text"
                                                                                    class="form-control"
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
                                                                                <input type="number"
                                                                                    class="form-control"
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
                                                                                <input type="number"
                                                                                    class="form-control"
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
                                                                                <input type="text"
                                                                                    class="form-control"
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
                                                                                <input type="text"
                                                                                    class="form-control"
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
                                                                                    </small>Kabupaten/Kota</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    name="form_pribadi_keluarga_terdekat_alamat_dati2"
                                                                                    id="form_pribadi_keluarga_terdekat_alamat_dati2"
                                                                                    aria-describedby="form_pribadi_keluarga_terdekat_alamat_dati2"
                                                                                    placeholder="Kabupaten/Kota"
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
                                                                                <input type="text"
                                                                                    class="form-control"
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
                                                                                <input type="number"
                                                                                    class="form-control"
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
                                                                </small>No. Telepon Tempat Tinggal</label>
                                                            <input type="text"
                                                                name="form_pribadi_keluarga_terdekat_no_telp"
                                                                id="form_pribadi_keluarga_terdekat_no_telp"
                                                                class="form-control"
                                                                placeholder="Masukkan Nomor Telepon Keluarga Terdekat"
                                                                value="{{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_no_telp }}"
                                                                required />
                                                        </div>
                                                    </div>
                                                    <!-- Keluarga Terdekat end -->

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
                                            <h4>Data Pekerjaan</h4>
                                            <hr>
                                        </div>
                                        <div class="content-header">
                                            <h5 class="mb-0 mt-2">Pemohon PPR Syariah</h5>
                                            <small class="text-muted">Lengkapi Data Pekerjaan Pemohon.</small>
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
                                                    </small>Badan Hukum Perusahaan/Instansi</label>
                                                <select class="select2 w-100" name="form_pekerjaan_pemohon_badan_hukum"
                                                    id="form_pekerjaan_pemohon_badan_hukum"
                                                    data-placeholder="Pilih Badan Hukum Perusahaan/Instansi" required>
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_badan_hukum == 'Departemen' ? 'selected' : '' }}
                                                        value="Departemen">Departemen</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_badan_hukum == 'Pemerintahan' ? 'selected' : '' }}
                                                        value="Pemerintahan">Pemerintahan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_badan_hukum == 'Perusahaan Daerah' ? 'selected' : '' }}
                                                        value="Perusahaan Daerah">Perusahaan Daerah</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_badan_hukum == 'Koperasi' ? 'selected' : '' }}
                                                        value="Koperasi">Koperasi</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_badan_hukum == 'Persero' ? 'selected' : '' }}
                                                        value="Persero">Persero</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_badan_hukum == 'Perusahaan Umum' ? 'selected' : '' }}
                                                        value="Perusahaan Umum">Perusahaan Umum</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_badan_hukum == 'Perseroan Terbatas' ? 'selected' : '' }}
                                                        value="Perseroan Terbatas">Perseroan Terbatas</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_badan_hukum == 'Commanditer Venotschap' ? 'selected' : '' }}
                                                        value="Commanditer Venotschap">Commanditer Venotschap</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_badan_hukum == 'FIRMA' ? 'selected' : '' }}
                                                        value="FIRMA">FIRMA</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_badan_hukum == 'Namloose Venotschap' ? 'selected' : '' }}
                                                        value="Namloose Venotschap">Namloose Venotschap</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_badan_hukum == 'Usaha Dagang' ? 'selected' : '' }}
                                                        value="Usaha Dagang">Usaha Dagang</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_badan_hukum == 'Yayasan' ? 'selected' : '' }}
                                                        value="Yayasan">Yayasan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_badan_hukum == 'Lainnya Perorangan' ? 'selected' : '' }}
                                                        value="Lainnya Perorangan">Lainnya Perorangan</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pekerjaan_pemohon_alamat"><small
                                                        class="text-danger">*
                                                    </small>Alamat Pekerjaan/Kantor</label>
                                                <textarea class="form-control" id="form_pekerjaan_pemohon_alamat" name="form_pekerjaan_pemohon_alamat"
                                                    rows="2" placeholder="Alamat Pekerjaan/Kantor" required>{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_alamat }}</textarea>
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
                                                <input type="text" name="form_pekerjaan_pemohon_no_telp"
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
                                                <label class="form-label" for="form_pekerjaan_pemohon_npwp">Nomor NPWP
                                                    Perusahaan/Instansi</label>
                                                <input type="text" name="form_pekerjaan_pemohon_npwp"
                                                    id="form_pekerjaan_pemohon_npwp" class="form-control"
                                                    placeholder="Nomor NPWP Perusahaan/Instansi"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_npwp }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_pemohon_bidang_usaha"><small
                                                        class="text-danger">*
                                                    </small>Bidang Usaha Perusahaan/Instansi</label>
                                                <select class="select2 w-100" name="form_pekerjaan_pemohon_bidang_usaha"
                                                    id="formPekerjaanPemohonBidangUsaha"
                                                    onChange="changePemohonBidangUsaha()"
                                                    data-placeholder="Pilih
                                                    Bidang Usaha"
                                                    required>
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_bidang_usaha == 'Pemerintahan' ? 'selected' : '' }}
                                                        value="Pemerintahan">Pemerintahan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_bidang_usaha == 'Pertanian, Perburuan, dan Sarana Pertanian' ? 'selected' : '' }}
                                                        value="Pertanian, Perburuan, dan Sarana Pertanian">Pertanian,
                                                        Perburuan, dan Sarana Pertanian</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_bidang_usaha == 'Pertambangan' ? 'selected' : '' }}
                                                        value="Pertambangan">Pertambangan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_bidang_usaha == 'Perindustrian' ? 'selected' : '' }}
                                                        value="Perindustrian">Perindustrian</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_bidang_usaha == 'Listrik, Gas, dan Air' ? 'selected' : '' }}
                                                        value="Listrik, Gas, dan Air">Listrik, Gas, dan Air</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_bidang_usaha == 'Perdagangan, Restoran, dan Hotel' ? 'selected' : '' }}
                                                        value="Perdagangan, Restoran, dan Hotel">Perdagangan,
                                                        Restoran, dan
                                                        Hotel</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_bidang_usaha == 'Pengangkutan, Pergudangan, dan Komunikasi' ? 'selected' : '' }}
                                                        value="Pengangkutan, Pergudangan, dan Komunikasi">
                                                        Pengangkutan,
                                                        Pergudangan, dan Komunikasi</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_bidang_usaha == 'Jasa-Jasa Dunia Usaha' ? 'selected' : '' }}
                                                        value="Jasa-Jasa Dunia Usaha">Jasa-Jasa Dunia Usaha</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_bidang_usaha == 'Jasa-Jasa Sosial Masyarakat' ? 'selected' : '' }}
                                                        value="Jasa-Jasa Sosial Masyarakat">Jasa-Jasa Sosial
                                                        Masyarakat
                                                    </option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_bidang_usaha == 'Jasa-Jasa Keuangan dan Perbankan' ? 'selected' : '' }}
                                                        value="Jasa-Jasa Keuangan dan Perbankan">Jasa-Jasa Keuangan
                                                        dan
                                                        Perbankan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_bidang_usaha == 'Lain-lain' ? 'selected' : '' }}
                                                        value="Lain-lain">Lain-lain</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6 {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_bidang_usaha == 'Lain-lain' ? 'show' : 'hide' }}"
                                                id="ifPemohonBidangUsahaLain">
                                                <label class="form-label" for="pemohonBidangUsahaLain"><small
                                                        class="text-danger">*
                                                    </small>Bidang Usaha Lainnya</label>
                                                <input type="text" name="form_pekerjaan_pemohon_bidang_usaha_lain"
                                                    id="pemohonBidangUsahaLain" class="form-control"
                                                    placeholder="Bidang Usaha Lainnya"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_bidang_usaha_lain }}"
                                                    required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_pemohon_jenis_pekerjaan"><small
                                                        class="text-danger">*
                                                    </small>Jenis Pekerjaan</label>
                                                <select class="select2 w-100"
                                                    name="form_pekerjaan_pemohon_jenis_pekerjaan"
                                                    id="formPekerjaanPemohonJenisPekerjaan"
                                                    onChange="changePemohonJenisPekerjaan()"
                                                    data-placeholder="Pilih
                                                    Jenis Pekerjaan"
                                                    required>
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan == 'Akunting/Keuangan' ? 'selected' : '' }}
                                                        value="Akunting/Keuangan">Akunting/Keuangan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan == 'Customer Service' ? 'selected' : '' }}
                                                        value="Customer Service">Customer Service</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan == 'Engineering' ? 'selected' : '' }}
                                                        value="Engineering">Engineering</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan == 'Eksekutif' ? 'selected' : '' }}
                                                        value="Eksekutif">Eksekutif</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan == 'Administrasi Umum' ? 'selected' : '' }}
                                                        value="Administrasi Umum">Administrasi Umum</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan == 'Komputer' ? 'selected' : '' }}
                                                        value="Komputer">Komputer</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan == 'Konsultan' ? 'selected' : '' }}
                                                        value="Konsultan">Konsultan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan == 'Marketing' ? 'selected' : '' }}
                                                        value="Marketing">Marketing</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan == 'Pendidikan' ? 'selected' : '' }}
                                                        value="Pendidikan">Pendidikan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan == 'ASN' ? 'selected' : '' }}
                                                        value="ASN">ASN</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan == 'TNI' ? 'selected' : '' }}
                                                        value="TNI">TNI</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan == 'Polri' ? 'selected' : '' }}
                                                        value="Polri">Polri</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan == 'Pensiunan' ? 'selected' : '' }}
                                                        value="Pensiunan">Pensiunan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan == 'Pelajar/Mahasiswa' ? 'selected' : '' }}
                                                        value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan == 'Wiraswasta' ? 'selected' : '' }}
                                                        value="Wiraswasta">Wiraswasta</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan == 'Profesional' ? 'selected' : '' }}
                                                        value="Profesional">Profesional</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan == 'Lain-lain' ? 'selected' : '' }}
                                                        value="Lain-lain">Lain-lain</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6 {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan == 'Lain-lain' ? 'show' : 'hide' }}"
                                                id="ifPemohonJenisPekerjaanLain">
                                                <label class="form-label" for="pemohonJenisPekerjaanLain"><small
                                                        class="text-danger">*
                                                    </small>Jenis Pekerjaan Lainnya</label>
                                                <input type="text" name="form_pekerjaan_pemohon_jenis_pekerjaan_lain"
                                                    id="pemohonJenisPekerjaanLain" class="form-control"
                                                    placeholder="Jenis Pekerjaan Lainnya"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jenis_pekerjaan_lain }}"
                                                    required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_pemohon_jml_karyawan"><small
                                                        class="text-danger">*
                                                    </small>Jumlah Karyawan</label>
                                                <select class="select2 w-100" name="form_pekerjaan_pemohon_jml_karyawan"
                                                    id="form_pekerjaan_pemohon_jml_karyawan"
                                                    data-placeholder="Pilih
                                                    Jumlah Karyawan"
                                                    required>
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jml_karyawan == '<= 5 Karyawan' ? 'selected' : '' }}
                                                        value="<= 5 Karyawan">
                                                        <= 5 Karyawan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jml_karyawan == '6-30 Karyawan' ? 'selected' : '' }}
                                                        value="6-30 Karyawan">6-30 Karyawan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jml_karyawan == '31-60 Karyawan' ? 'selected' : '' }}
                                                        value="31-60 Karyawan">31-60 Karyawan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jml_karyawan == '61-100 Karyawan' ? 'selected' : '' }}
                                                        value="61-100 Karyawan">61-100 Karyawan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_jml_karyawan == '100 Karyawan' ? 'selected' : '' }}
                                                        value=">100 Karyawan">> 100 Karyawan</option>
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
                                                @if ($pembiayaan->jenis_nasabah == 'Fixed Income')
                                                    <label class="form-label"
                                                        for="form_pekerjaan_pemohon_nip_nrp"><small
                                                            class="text-danger">*
                                                        </small>NIP/NRP</label>
                                                    <input type="number" name="form_pekerjaan_pemohon_nip_nrp"
                                                        id="form_pekerjaan_pemohon_nip_nrp"
                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_nip_nrp }}"
                                                        class="form-control" placeholder="NIP/NRP" required />
                                                @else
                                                    <label class="form-label"
                                                        for="form_pekerjaan_pemohon_nip_nrp">NIP/NRP</label>
                                                    <input type="number" name="form_pekerjaan_pemohon_nip_nrp"
                                                        id="form_pekerjaan_pemohon_nip_nrp"
                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_nip_nrp }}"
                                                        class="form-control" placeholder="NIP/NRP" />
                                                @endif
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
                                                                        placeholder="YYYY-MM-DDYY"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_mulai_bekerja }}"
                                                                        required />
                                                                </div>
                                                            </div>

                                                            <div class="row col-auto col-md-3"
                                                                style="margin-bottom: 15px;">
                                                                <div class="col-auto col-md-6">
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

                                                            <div class="row col-auto"
                                                                style="margin-bottom: 15px; margin-left: -100px">
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
                                                <input type="text"
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
                                                            <div class="col-auto col-md-4">
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

                                                            <div class="col-auto col-md-2">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan">Jabatan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan"
                                                                        id="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan"
                                                                        aria-describedby="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan"
                                                                        placeholder="Jabatan"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan }}" />
                                                                </div>
                                                            </div>

                                                            <div class="row col-auto" style="margin-bottom: 15px;">
                                                                <div class="col-auto col-md-6">
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
                                                                <div class="col-auto" style="margin-top: 32px;">
                                                                    <span class="form-text-beside">Tahun</span>
                                                                </div>
                                                            </div>
                                                            <div class="row col-auto"
                                                                style="margin-bottom: 17px; margin-left:-100px;">
                                                                <div class="col-auto col-md-6">
                                                                    <label class="form-label"
                                                                        for="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan">
                                                                    </label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan"
                                                                        id="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan"
                                                                        aria-describedby="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan"
                                                                        placeholder="Bulan"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan }}" />
                                                                </div>
                                                                <div class="col-auto" style="margin-top: 29px;">
                                                                    <span class="form-text-beside">Bulan</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Istri/Suami pemohon --}}
                                        <div class="content-header hide" id="ifISMHeader">
                                            <h5 class="mb-0 mt-2">Istri/Suami Pemohon PPR Syariah</h5>
                                            <small class="text-muted">Lengkapi Data Pekerjaan pasangan, kosongkan bila
                                                tidak
                                                bekerja.</small>
                                        </div>
                                        <div class="row hide" id="ifISM">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pekerjaan_istri_suami_nama">Nama
                                                    Perusahaan/Instansi</label>
                                                <input type="text" name="form_pekerjaan_istri_suami_nama"
                                                    id="form_pekerjaan_istri_suami_nama" class="form-control"
                                                    placeholder="Nama Perusahaan/Instansi"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_nama }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_badan_hukum">Badan
                                                    Hukum Perusahaan</label>
                                                <select class="select2 w-100"
                                                    name="form_pekerjaan_istri_suami_badan_hukum"
                                                    id="form_pekerjaan_istri_suami_badan_hukum"
                                                    data-placeholder="Pilih Badan Hukum Perusahaan/Instansi">
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_badan_hukum == 'Departemen' ? 'selected' : '' }}
                                                        value="Departemen">Departemen</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_badan_hukum == 'Pemerintahan' ? 'selected' : '' }}
                                                        value="Pemerintahan">Pemerintahan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_badan_hukum == 'Perusahaan Daerah' ? 'selected' : '' }}
                                                        value="Perusahaan Daerah">Perusahaan Daerah</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_badan_hukum == 'Koperasi' ? 'selected' : '' }}
                                                        value="Koperasi">Koperasi</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_badan_hukum == 'Persero' ? 'selected' : '' }}
                                                        value="Persero">Persero</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_badan_hukum == 'Perusahaan Umum' ? 'selected' : '' }}
                                                        value="Perusahaan Umum">Perusahaan Umum</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_badan_hukum == 'Perseroan Terbatas' ? 'selected' : '' }}
                                                        value="Perseroan Terbatas">Perseroan Terbatas</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_badan_hukum == 'Commanditer Venotschap' ? 'selected' : '' }}
                                                        value="Commanditer Venotschap">Commanditer Venotschap</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_badan_hukum == 'FIRMA' ? 'selected' : '' }}
                                                        value="FIRMA">FIRMA</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_badan_hukum == 'Namloose Venotschap' ? 'selected' : '' }}
                                                        value="Namloose Venotschap">Namloose Venotschap</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_badan_hukum == 'Usaha Dagang' ? 'selected' : '' }}
                                                        value="Usaha Dagang">Usaha Dagang</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_badan_hukum == 'Yayasan' ? 'selected' : '' }}
                                                        value="Yayasan">Yayasan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_badan_hukum == 'Lainnya Perorangan' ? 'selected' : '' }}
                                                        value="Lainnya Perorangan">Lainnya Perorangan</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pekerjaan_istri_suami_alamat">Alamat
                                                    Pekerjaan/Kantor</label>
                                                <textarea class="form-control" name="form_pekerjaan_istri_suami_alamat" id="form_pekerjaan_istri_suami_alamat"
                                                    rows="2" placeholder="Alamat Pekerjaan/Kantor">{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_alamat }}</textarea>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_alamat_kode_pos">Kode
                                                    Pos</label>
                                                <input type="number" name="form_pekerjaan_istri_suami_alamat_kode_pos"
                                                    id="form_pekerjaan_istri_suami_alamat_kode_pos" class="form-control"
                                                    placeholder="Kode Pos"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_alamat_kode_pos }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_pekerjaan_istri_suami_no_telp">Nomor
                                                    Telp.
                                                    Kantor</label>
                                                <input type="text" name="form_pekerjaan_istri_suami_no_telp"
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
                                                    Perusahaan/Instansi</label>
                                                <input type="text" name="form_pekerjaan_istri_suami_npwp"
                                                    id="form_pekerjaan_istri_suami_npwp" class="form-control"
                                                    placeholder="Nomor NPWP Perusahaan"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_npwp }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_bidang_usaha">Bidang
                                                    Usaha Perusahaan</label>
                                                <select class="select2 w-100"
                                                    name="form_pekerjaan_istri_suami_bidang_usaha"
                                                    id="formPekerjaanPasanganBidangUsaha"
                                                    onChange="changePasanganBidangUsaha()"
                                                    data-placeholder="Pilih
                                                    Bidang Usaha">
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_bidang_usaha == 'Pemerintahan' ? 'selected' : '' }}
                                                        value="Pemerintahan">Pemerintahan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_bidang_usaha == 'Pertanian, Perburuan, dan Sarana Pertanian' ? 'selected' : '' }}
                                                        value="Pertanian, Perburuan, dan Sarana Pertanian">Pertanian,
                                                        Perburuan, dan Sarana Pertanian</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_bidang_usaha == 'Pertambangan' ? 'selected' : '' }}
                                                        value="Pertambangan">Pertambangan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_bidang_usaha == 'Perindustrian' ? 'selected' : '' }}
                                                        value="Perindustrian">Perindustrian</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_bidang_usaha == 'Listrik, Gas, dan Air' ? 'selected' : '' }}
                                                        value="Listrik, Gas, dan Air">Listrik, Gas, dan Air</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_bidang_usaha == 'Perdagangan, Restoran, dan Hotel' ? 'selected' : '' }}
                                                        value="Perdagangan, Restoran, dan Hotel">Perdagangan,
                                                        Restoran, dan
                                                        Hotel</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_bidang_usaha == 'Pengangkutan, Pergudangan, dan Komunikasi' ? 'selected' : '' }}
                                                        value="Pengangkutan, Pergudangan, dan Komunikasi">
                                                        Pengangkutan,
                                                        Pergudangan, dan Komunikasi</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_bidang_usaha == 'Jasa-Jasa Dunia Usaha' ? 'selected' : '' }}
                                                        value="Jasa-Jasa Dunia Usaha">Jasa-Jasa Dunia Usaha</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_bidang_usaha == 'Jasa-Jasa Sosial Masyarakat' ? 'selected' : '' }}
                                                        value="Jasa-Jasa Sosial Masyarakat">Jasa-Jasa Sosial
                                                        Masyarakat
                                                    </option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_bidang_usaha == 'Jasa-Jasa Keuangan dan Perbankan' ? 'selected' : '' }}
                                                        value="Jasa-Jasa Keuangan dan Perbankan">Jasa-Jasa Keuangan
                                                        dan
                                                        Perbankan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_bidang_usaha == 'Lain-lain' ? 'selected' : '' }}
                                                        value="Lain-lain">Lain-lain</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6 {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_bidang_usaha == 'Lain-lain' ? 'show' : 'hide' }}"
                                                id="ifPasanganBidangUsahaLain">
                                                <label class="form-label" for="pasanganBidangUsahaLain"><small
                                                        class="text-danger">*
                                                    </small>Bidang Usaha Lainnya</label>
                                                <input type="text"
                                                    name="form_pekerjaan_istri_suami_bidang_usaha_lain"
                                                    id="pasanganBidangUsahaLain" class="form-control"
                                                    placeholder="Bidang Usaha Lainnya"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_bidang_usaha_lain }}"
                                                    required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_jenis_pekerjaan">Jenis
                                                    Pekerjaan</label>
                                                <select class="select2 w-100"
                                                    name="form_pekerjaan_istri_suami_jenis_pekerjaan"
                                                    id="formPekerjaanPasanganJenisPekerjaan"
                                                    onChange="changePasanganJenisPekerjaan()"
                                                    data-placeholder="Pilih
                                                    Jenis Pekerjaan">
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan == 'Akunting/Keuangan' ? 'selected' : '' }}
                                                        value="Akunting/Keuangan">Akunting/Keuangan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan == 'Customer Service' ? 'selected' : '' }}
                                                        value="Customer Service">Customer Service</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan == 'Engineering' ? 'selected' : '' }}
                                                        value="Engineering">Engineering</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan == 'Eksekutif' ? 'selected' : '' }}
                                                        value="Eksekutif">Eksekutif</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan == 'Administrasi Umum' ? 'selected' : '' }}
                                                        value="Administrasi Umum">Administrasi Umum</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan == 'Komputer' ? 'selected' : '' }}
                                                        value="Komputer">Komputer</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan == 'Konsultan' ? 'selected' : '' }}
                                                        value="Konsultan">Konsultan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan == 'Marketing' ? 'selected' : '' }}
                                                        value="Marketing">Marketing</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan == 'Pendidikan' ? 'selected' : '' }}
                                                        value="Pendidikan">Pendidikan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan == 'ASN' ? 'selected' : '' }}
                                                        value="ASN">ASN</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan == 'TNI' ? 'selected' : '' }}
                                                        value="TNI">TNI</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan == 'Polri' ? 'selected' : '' }}
                                                        value="Polri">Polri</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan == 'Pensiunan' ? 'selected' : '' }}
                                                        value="Pensiunan">Pensiunan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan == 'Pelajar/Mahasiswa' ? 'selected' : '' }}
                                                        value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan == 'Wiraswasta' ? 'selected' : '' }}
                                                        value="Wiraswasta">Wiraswasta</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan == 'Profesional' ? 'selected' : '' }}
                                                        value="Profesional">Profesional</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan == 'Lain-lain' ? 'selected' : '' }}
                                                        value="Lain-lain">Lain-lain</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6 {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan == 'Lain-lain' ? 'show' : 'hide' }}"
                                                id="ifPasanganJenisPekerjaanLain">
                                                <label class="form-label" for="pasanganJenisPekerjaanLain"><small
                                                        class="text-danger">*
                                                    </small>Jenis Pekerjaan Lainnya</label>
                                                <input type="text"
                                                    name="form_pekerjaan_istri_suami_jenis_pekerjaan_lain"
                                                    id="pasanganJenisPekerjaanLain" class="form-control"
                                                    placeholder="Jenis Pekerjaan Lainnya"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jenis_pekerjaan }}"
                                                    required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_jml_karyawan">Jumlah
                                                    Karyawan</label>
                                                <select class="select2 w-100"
                                                    name="form_pekerjaan_istri_suami_jml_karyawan"
                                                    id="form_pekerjaan_istri_suami_jml_karyawan"
                                                    data-placeholder="Pilih
                                                    Jumlah Karyawan"
                                                    required>
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jml_karyawan == '<= 5 Karyawan' ? 'selected' : '' }}
                                                        value="<= 5 Karyawan">
                                                        <= 5 Karyawan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jml_karyawan == '6-30 Karyawan' ? 'selected' : '' }}
                                                        value="6-30 Karyawan">6-30 Karyawan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jml_karyawan == '31-60 Karyawan' ? 'selected' : '' }}
                                                        value="31-60 Karyawan">31-60 Karyawan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jml_karyawan == '61-100 Karyawan' ? 'selected' : '' }}
                                                        value="61-100 Karyawan">61-100 Karyawan</option>
                                                    <option
                                                        {{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_jml_karyawan == '100 Karyawan' ? 'selected' : '' }}
                                                        value=">100 Karyawan">> 100 Karyawan</option>
                                                </select>
                                            </div>

                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_departemen">Dept./Bagian/Divisi</label>
                                                <input type="text" name="form_pekerjaan_istri_suami_departemen"
                                                    id="form_pekerjaan_istri_suami_departemen" class="form-control"
                                                    placeholder="Dept./Bagian/Divisi"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_departemen }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_pangkat_gol_jabatan">Pangkat/Gol. Dan
                                                    Jabatan</label>
                                                <input type="text"
                                                    name="form_pekerjaan_istri_suami_pangkat_gol_jabatan"
                                                    id="form_pekerjaan_istri_suami_pangkat_gol_jabatan"
                                                    class="form-control" placeholder="Pangkat/Gol. Dan Jabatan"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_pangkat_gol_jabatan }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_nip_nrp">NIP/NRP</label>
                                                <input type="number" name="form_pekerjaan_istri_suami_nip_nrp"
                                                    id="form_pekerjaan_istri_suami_nip_nrp" class="form-control"
                                                    placeholder="NIP/NRP"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_nip_nrp }}" />
                                            </div>

                                            <div class="mb-1 col-md-12">
                                                <div data-repeater-list="form_pekerjaan_istri_suami_mulai_bekerja">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-auto col-md-4">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_pekerjaan_istri_suami_mulai_bekerja">Mulai
                                                                        Bekerja</label>
                                                                    <input type="date"
                                                                        class="form-control flatpickr-basic"
                                                                        name="form_pekerjaan_istri_suami_mulai_bekerja"
                                                                        id="form_pekerjaan_istri_suami_mulai_bekerja"
                                                                        aria-describedby="form_pekerjaan_istri_suami_mulai_bekerja"
                                                                        placeholder="YYYY-MM-DDYY"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_mulai_bekerja }}" />
                                                                </div>
                                                            </div>

                                                            <div class="row col-auto col-md-3"
                                                                style="margin-bottom: 15px;">
                                                                <div class="col-auto col-md-6">
                                                                    <label class="form-label"
                                                                        for="form_pekerjaan_istri_suami_usia_pensiun">Usia
                                                                        Pensiun</label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_pekerjaan_istri_suami_usia_pensiun"
                                                                        id="form_pekerjaan_istri_suami_usia_pensiun"
                                                                        aria-describedby="form_pekerjaan_istri_suami_usia_pensiun"
                                                                        placeholder="Usia Pensiun"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_usia_pensiun }}" />
                                                                </div>
                                                                <div class="col-auto" style="margin-top: 32px;">
                                                                    <span class="form-text-beside">Tahun</span>
                                                                </div>
                                                            </div>

                                                            <div class="row col-auto"
                                                                style="margin-bottom: 15px; margin-left: -100px">
                                                                <div class="col-auto">
                                                                    <label class="form-label"
                                                                        for="form_pekerjaan_istri_suami_masa_kerja">Masa
                                                                        Kerja
                                                                        (termasuk sebelumnya)</label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_pekerjaan_istri_suami_masa_kerja"
                                                                        id="form_pekerjaan_istri_suami_masa_kerja"
                                                                        aria-describedby="form_pekerjaan_istri_suami_masa_kerja"
                                                                        placeholder="Masa Kerja"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_masa_kerja }}" />
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
                                                    for="form_pekerjaan_istri_suami_nama_atasan_langsung">Nama Atasan
                                                    Langsung</label>
                                                <input type="text"
                                                    name="form_pekerjaan_istri_suami_nama_atasan_langsung"
                                                    id="form_pekerjaan_istri_suami_nama_atasan_langsung"
                                                    class="form-control" placeholder="Nama Atasan Langsung"
                                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_nama_atasan_langsung }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_pekerjaan_istri_suami_no_telp_atasan_langsung">Nomor Telp.
                                                    Atasan
                                                    Langsung</label>
                                                <input type="text"
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

                                            <div class="mb-1 col-md-12">
                                                <div
                                                    data-repeater-list="form_pekerjaan_pemohon_pengalaman_kerja_terakhir">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <h6>Pengalaman
                                                                Kerja
                                                                Terakhir</h6>
                                                            <div class="col-auto col-md-4">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan">Perusahaan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan"
                                                                        id="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan"
                                                                        aria-describedby="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan"
                                                                        placeholder="Nama Perusahaan"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_perusahaan }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-auto col-md-2">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan">Jabatan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan"
                                                                        id="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan"
                                                                        aria-describedby="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan"
                                                                        placeholder="Jabatan"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_jabatan }}" />
                                                                </div>
                                                            </div>

                                                            <div class="row col-auto" style="margin-bottom: 15px;">
                                                                <div class="col-auto col-md-6">
                                                                    <label class="form-label"
                                                                        for="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun">Lama
                                                                        Kerja</label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun"
                                                                        id="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun"
                                                                        aria-describedby="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun"
                                                                        placeholder="Tahun"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_tahun }}" />
                                                                </div>
                                                                <div class="col-auto" style="margin-top: 32px;">
                                                                    <span class="form-text-beside">Tahun</span>
                                                                </div>
                                                            </div>
                                                            <div class="row col-auto"
                                                                style="margin-bottom: 17px; margin-left:-100px;">
                                                                <div class="col-auto col-md-6">
                                                                    <label class="form-label"
                                                                        for="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan">
                                                                    </label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan"
                                                                        id="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan"
                                                                        aria-describedby="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan"
                                                                        placeholder="Bulan"
                                                                        value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_bulan }}" />
                                                                </div>
                                                                <div class="col-auto" style="margin-top: 29px;">
                                                                    <span class="form-text-beside">Bulan</span>
                                                                </div>
                                                            </div>

                                                        </div>
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
                                            <h4>Data Penghasilan dan Pengeluaran per Bulan</h4>
                                            <hr>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_penghasilan_utama_pemohon"><small
                                                        class="text-danger">*
                                                    </small>1. Penghasilan Utama Pemohon</label>
                                                <input type="text"
                                                    name="form_penghasilan_pengeluaran_penghasilan_utama_pemohon"
                                                    id="form_penghasilan_pengeluaran_penghasilan_utama_pemohon"
                                                    class="form-control numeral-mask7"
                                                    placeholder="Masukkan Penghasilan Utama Pemohon"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_penghasilan_utama_pemohon }}"
                                                    onkeyup="sumPP(this.value);" required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga"><small
                                                        class="text-danger">*
                                                    </small>6. Biaya Hidup Rutin Keluarga</label>
                                                <input type="text"
                                                    name="form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga"
                                                    id="form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga"
                                                    class="form-control numeral-mask8"
                                                    placeholder="Masukkan Biaya Hidup Rutin Keluarga"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga }}"
                                                    onkeyup="sumPP(this.value);" required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_penghasilan_lain_pemohon"><small
                                                        class="text-danger">*
                                                    </small>2. Penghasilan Lain-Lain Pemohon</label>
                                                <input type="text"
                                                    name="form_penghasilan_pengeluaran_penghasilan_lain_pemohon"
                                                    id="form_penghasilan_pengeluaran_penghasilan_lain_pemohon"
                                                    class="form-control numeral-mask9"
                                                    placeholder="Masukkan Penghasilan Lain-Lain Pemohon"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_penghasilan_lain_pemohon }}"
                                                    onkeyup="sumPP(this.value);" required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_kewajiban_angsuran"><small
                                                        class="text-danger">*
                                                    </small>7. Kewajiban Angsuran <i>(Meliputi Total Kewajiban
                                                        Angsuran/Bulan
                                                        atas
                                                        Pinjaman pada Bank atau
                                                        Pihak Lain)</i></label>
                                                <input type="text"
                                                    name="form_penghasilan_pengeluaran_kewajiban_angsuran"
                                                    id="form_penghasilan_pengeluaran_kewajiban_angsuran"
                                                    class="form-control numeral-mask10"
                                                    placeholder="Masukkan Kewajiban Angsuran"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_kewajiban_angsuran }}"
                                                    onkeyup="sumPP(this.value);" required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_penghasilan_utama_istri_suami"><small
                                                        class="text-danger">*
                                                    </small>3. Penghasilan Utama Istri/Suami</label>
                                                <input type="text"
                                                    name="form_penghasilan_pengeluaran_penghasilan_utama_istri_suami"
                                                    id="form_penghasilan_pengeluaran_penghasilan_utama_istri_suami"
                                                    class="form-control numeral-mask11"
                                                    placeholder="Masukkan Penghasilan Utama Istri/Suami"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_penghasilan_utama_istri_suami }}"
                                                    onkeyup="sumPP(this.value);" required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_total_pengeluaran"><small
                                                        class="text-danger">*
                                                    </small>8. Total Pengeluaran (6+7)</label>
                                                <input type="text"
                                                    id="form_penghasilan_pengeluaran_total_pengeluaran_dummy"
                                                    class="form-control numeral-mask12" placeholder="Total Pengeluaran"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_total_pengeluaran }}"
                                                    disabled />
                                                <input type="hidden"
                                                    name="form_penghasilan_pengeluaran_total_pengeluaran"
                                                    id="form_penghasilan_pengeluaran_total_pengeluaran"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_total_pengeluaran }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_penghasilan_lain_istri_suami"><small
                                                        class="text-danger">*
                                                    </small>4. Penghasilan Lain-Lain Istri/Suami</label>
                                                <input type="text"
                                                    name="form_penghasilan_pengeluaran_penghasilan_lain_istri_suami"
                                                    id="form_penghasilan_pengeluaran_penghasilan_lain_istri_suami"
                                                    class="form-control numeral-mask13"
                                                    placeholder="Masukkan Penghasilan Lain-Lain Istri/Suami"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_penghasilan_lain_istri_suami }}"
                                                    onkeyup="sumPP(this.value);" required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_sisa_penghasilan"><small
                                                        class="text-danger">*
                                                    </small>9. Sisa Penghasilan (5-8)</label>
                                                <input type="text"
                                                    id="form_penghasilan_pengeluaran_sisa_penghasilan_dummy"
                                                    class="form-control numeral-mask14" placeholder="Sisa Penghasilan"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_sisa_penghasilan }}"
                                                    disabled />
                                                <input type="hidden"
                                                    name="form_penghasilan_pengeluaran_sisa_penghasilan"
                                                    id="form_penghasilan_pengeluaran_sisa_penghasilan"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_sisa_penghasilan }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_total_penghasilan"><small
                                                        class="text-danger">*
                                                    </small>5. Total Penghasilan (1+2+3+4)</label>
                                                <input type="text"
                                                    id="form_penghasilan_pengeluaran_total_penghasilan_dummy"
                                                    class="form-control numeral-mask15" placeholder="Total Penghasilan"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_total_penghasilan }}"
                                                    disabled />
                                                <input type="hidden"
                                                    name="form_penghasilan_pengeluaran_total_penghasilan"
                                                    id="form_penghasilan_pengeluaran_total_penghasilan"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_total_penghasilan }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_penghasilan_pengeluaran_kemampuan_mengangsur"><small
                                                        class="text-danger">*
                                                    </small>10. Kemampuan Mengangsur</label>
                                                <input type="text"
                                                    name="form_penghasilan_pengeluaran_kemampuan_mengangsur"
                                                    id="form_penghasilan_pengeluaran_kemampuan_mengangsur"
                                                    class="form-control numeral-mask16"
                                                    placeholder="Masukkan Kemampuan Mengangsur"
                                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_kemampuan_mengangsur }}"
                                                    onkeyup="sumPP(this.value);" required />
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

                                    <!-- Form Data Agunan -->

                                    <div id="formDataAgunan" class="content" role="tabpanel"
                                        aria-labelledby="agunan-trigger">
                                        <div class="content-header">
                                            <h4>Data Agunan</h4>
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
                                                    id="formAgunan1Jenis" onChange="changeJenisAgunan1()"
                                                    data-placeholder="Pilih Jenis Agunan">
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_1_jenis == 'Tanah' ? 'selected' : '' }}
                                                        value="Tanah">Tanah</option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_1_jenis == 'Rumah Tinggal' ? 'selected' : '' }}
                                                        value="Rumah Tinggal">Rumah Tinggal</option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_1_jenis == 'Apartemen' ? 'selected' : '' }}
                                                        value="Apartemen">Apartemen</option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_1_jenis == 'Rusun' ? 'selected' : '' }}
                                                        value="Rusun">Rusun</option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_1_jenis == 'Ruko' ? 'selected' : '' }}
                                                        value="Ruko">Ruko</option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_1_jenis == 'Rukan' ? 'selected' : '' }}
                                                        value="Rukan">Rukan</option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_1_jenis == 'Kios' ? 'selected' : '' }}
                                                        value="Kios">Kios</option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_1_jenis == 'Lain-lain' ? 'selected' : '' }}
                                                        value="Lain-lain">Lain-lain</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6 {{ $pembiayaan->agunan->form_agunan_1_jenis == 'Lain-lain' ? 'show' : 'hide' }}"
                                                id="ifJenisAgunan1Lain">
                                                <label class="form-label" for="jenisAgunan1Lain"><small
                                                        class="text-danger">*
                                                    </small>Jenis Agunan Lainnya</label>
                                                <input type="text" name="form_agunan_1_jenis_lain"
                                                    id="jenisAgunan1Lain" class="form-control"
                                                    placeholder="Jenis Agunan Lainnya"
                                                    value="{{ $pembiayaan->agunan->form_agunan_1_jenis_lain }}"
                                                    required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_1_nilai_harga_jual"><small
                                                        class="text-danger">*
                                                    </small>Nilai/Harga Jual (Harga Jual merupakan Harga Transaksi/Harga
                                                    Jual
                                                    Setelah Discount)</label>
                                                <input type="text" name="form_agunan_1_nilai_harga_jual"
                                                    id="form_agunan_1_nilai_harga_jual"
                                                    class="form-control numeral-mask17"
                                                    placeholder="Masukkan Nilai/Harga Jual"
                                                    value="{{ $pembiayaan->agunan->form_agunan_1_nilai_harga_jual }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_agunan_1_nilai_harga_taksasi_kjpp"><small
                                                        class="text-danger">*
                                                    </small><b>Nilai/Harga Taksasi KJPP</b></label>
                                                <input type="text" name="form_agunan_1_nilai_harga_taksasi_kjpp"
                                                    id="form_agunan_1_nilai_harga_taksasi_kjpp"
                                                    class="form-control numeral-mask112"
                                                    placeholder="Masukkan Nilai/Harga Taksasi KJPP"
                                                    value="{{ $pembiayaan->agunan->form_agunan_1_nilai_harga_taksasi_kjpp }}"
                                                    required />
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
                                                                        </small>Alamat/Lokasi Agunan</label>
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
                                                                    <input type="text" class="form-control"
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
                                                                        </small>Kabupaten/Kota</label>
                                                                    <input type="text" class="form-control"
                                                                        name="form_agunan_1_alamat_dati2"
                                                                        id="form_agunan_1_alamat_dati2"
                                                                        aria-describedby="form_agunan_1_alamat_dati2"
                                                                        placeholder="Kabupaten/Kota"
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
                                                                    </small>Status/Bukti Kepemilikan</label>
                                                                <select class="select2 w-100"
                                                                    name="form_agunan_1_status_bukti_kepemilikan"
                                                                    id="formAgunan1StatusBuktiKepemilikan"
                                                                    onChange="changeShgbAgunan1()"
                                                                    data-placeholder="Pilih
                                                                    Bukti Kepemilikan"
                                                                    required>
                                                                    <option value=""></option>
                                                                    <option
                                                                        {{ $pembiayaan->agunan->form_agunan_1_status_bukti_kepemilikan == 'SHM' ? 'selected' : '' }}
                                                                        value="SHM">SHM</option>
                                                                    <option
                                                                        {{ $pembiayaan->agunan->form_agunan_1_status_bukti_kepemilikan == 'SHGB' ? 'selected' : '' }}
                                                                        value="SHGB">SHGB</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-1 col-md-3 {{ $pembiayaan->agunan->form_agunan_1_status_bukti_kepemilikan == 'SHGB' ? 'show' : 'hide' }}"
                                                                id="ifShgbAgunan1Expired">
                                                                <label class="form-label"
                                                                    for="form_agunan_1_status_bukti_kepemilikan_tgl_berakhir"><small
                                                                        class="text-danger">*
                                                                    </small>Tanggal Berakhir</label>
                                                                <input type="date" id="tglBerakhirShgbAgunan1"
                                                                    class="form-control flatpickr-basic"
                                                                    name="form_agunan_1_status_bukti_kepemilikan_tgl_berakhir"
                                                                    placeholder="YYYY-MM-DD"
                                                                    value="{{ $pembiayaan->agunan->form_agunan_1_status_bukti_kepemilikan_tgl_berakhir }}"
                                                                    required />
                                                            </div>

                                                            <div class="mb-1 col-md-3 {{ $pembiayaan->agunan->form_agunan_1_status_bukti_kepemilikan == 'SHGB' ? 'show' : 'hide' }}"
                                                                id="ifShgbAgunan1Hak">
                                                                <label class="form-label"
                                                                    for="form_agunan_1_status_bukti_kepemilikan_hak"><small
                                                                        class="text-danger">*
                                                                    </small>Hak</label>
                                                                <select class="select2 w-100"
                                                                    name="form_agunan_1_status_bukti_kepemilikan_hak"
                                                                    id="statusBuktiHakAgunan1"
                                                                    data-placholder="Pilih Hak Kepemilikan" required>
                                                                    <option value=""></option>
                                                                    <option
                                                                        {{ $pembiayaan->agunan->form_agunan_1_status_bukti_kepemilikan_hak == 'Hak Pakai' ? 'selected' : '' }}
                                                                        value="Hak Pakai">Hak Pakai</option>
                                                                    <option
                                                                        {{ $pembiayaan->agunan->form_agunan_1_status_bukti_kepemilikan_hak == 'Hak Pengelolaan' ? 'selected' : '' }}
                                                                        value="Hak Pengelolaan">Hak Pengelolaan
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
                                                <input type="text" name="form_agunan_1_no_sertifikat"
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
                                                    placeholder="YYYY-MM-DD"
                                                    value="{{ $pembiayaan->agunan->form_agunan_1_no_sertifikat_tgl_penerbitan }}"
                                                    required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_1_no_imb"><small
                                                        class="text-danger">*
                                                    </small>Nomor IMB</label>
                                                <input type="text" name="form_agunan_1_no_imb"
                                                    id="form_agunan_1_no_imb" class="form-control"
                                                    placeholder="Masukkan Nomor IMB"
                                                    value="{{ $pembiayaan->agunan->form_agunan_1_no_imb }}" required />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_1_peruntukan_bangunan"><small
                                                        class="text-danger">*
                                                    </small>Peruntukan Bangunan</label>
                                                <input type="text" name="form_agunan_1_peruntukan_bangunan"
                                                    id="form_agunan_1_peruntukan_bangunan" class="form-control"
                                                    placeholder="Masukkan Peruntukan Bangunan"
                                                    value="{{ $pembiayaan->agunan->form_agunan_1_peruntukan_bangunan }}"
                                                    required />
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
                                                                    value="{{ $pembiayaan->agunan->form_agunan_1_luas_tanah }}"
                                                                    required />
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
                                                                    value="{{ $pembiayaan->agunan->form_agunan_1_luas_bangunan }}"
                                                                    required />
                                                            </div>
                                                            <div class="mb-1 col-md-6">
                                                                <label class="form-label"
                                                                    for="form_agunan_1_atas_nama"><small
                                                                        class="text-danger">*
                                                                    </small>Atas Nama</label>
                                                                <input type="text" name="form_agunan_1_atas_nama"
                                                                    id="form_agunan_1_atas_nama" class="form-control"
                                                                    placeholder="Atas Nama"
                                                                    value="{{ $pembiayaan->agunan->form_agunan_1_atas_nama }}"
                                                                    required />
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
                                                <label class="form-label"
                                                    for="form_agunan_1_nama_proyek_perumahan"><small
                                                        class="text-danger">*
                                                    </small>Nama
                                                    Proyek
                                                    Perumahan</label>
                                                <input type="text" name="form_agunan_1_nama_proyek_perumahan"
                                                    id="form_agunan_1_nama_proyek_perumahan" class="form-control"
                                                    placeholder="Masukkan Nama Proyek Perumahan"
                                                    value="{{ $pembiayaan->agunan->form_agunan_1_nama_proyek_perumahan }}"
                                                    required />
                                            </div>
                                        </div>

                                        <!-- Agunan II-->
                                        <div class="content-header">
                                            <h5 class="mb-0 mt-2">Agunan II</h5>
                                            <small class="text-muted">Lengkapi Data Agunan II.</small>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_2_jenis">Jenis Agunan</label>
                                                <select class="select2 w-100" name="form_agunan_2_jenis"
                                                    id="formAgunan2Jenis" onChange="changeJenisAgunan2()"
                                                    data-placeholder="Pilih Jenis Agunan">
                                                    <option value=""></option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_2_jenis == 'Tanah' ? 'selected' : '' }}
                                                        value="Tanah">Tanah</option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_2_jenis == 'Rumah Tinggal' ? 'selected' : '' }}
                                                        value="Rumah Tinggal">Rumah Tinggal</option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_2_jenis == 'Apartemen' ? 'selected' : '' }}
                                                        value="Apartemen">Apartemen</option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_2_jenis == 'Rusun' ? 'selected' : '' }}
                                                        value="Rusun">Rusun</option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_2_jenis == 'Ruko' ? 'selected' : '' }}
                                                        value="Ruko">Ruko</option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_2_jenis == 'Rukan' ? 'selected' : '' }}
                                                        value="Rukan">Rukan</option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_2_jenis == 'Kios' ? 'selected' : '' }}
                                                        value="Kios">Kios</option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_2_jenis == 'Lain-lain' ? 'selected' : '' }}
                                                        value="Lain-lain">Lain-lain</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6 {{ $pembiayaan->agunan->form_agunan_2_jenis == 'Lain-lain' ? 'show' : 'hide' }}"
                                                id="ifJenisAgunan2Lain">
                                                <label class="form-label" for="jenisAgunan2Lain"><small
                                                        class="text-danger">*
                                                    </small>Jenis Agunan Lainnya</label>
                                                <input type="text" name="form_agunan_2_jenis_lain"
                                                    id="jenisAgunan2Lain" class="form-control"
                                                    placeholder="Jenis Agunan Lainnya"
                                                    value="{{ $pembiayaan->agunan->form_agunan_2_jenis_lain }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_agunan_2_nilai_harga_jual">Nilai/Harga Jual
                                                    (Harga Jual
                                                    merupakan Harga Transaksi/Harga
                                                    Jual
                                                    Setelah Discount)</label>
                                                <input type="text" name="form_agunan_2_nilai_harga_jual"
                                                    id="form_agunan_2_nilai_harga_jual"
                                                    class="form-control numeral-mask18"
                                                    placeholder="Masukkan Nilai/Harga Jual"
                                                    value="{{ $pembiayaan->agunan->form_agunan_2_nilai_harga_jual }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_agunan_2_nilai_harga_taksasi_kjpp"><b>Nilai/Harga Taksasi
                                                        KJPP</b></label>
                                                <input type="text" name="form_agunan_2_nilai_harga_taksasi_kjpp"
                                                    id="form_agunan_2_nilai_harga_taksasi_kjpp"
                                                    class="form-control numeral-mask112"
                                                    placeholder="Masukkan Nilai/Harga Taksasi KJPP"
                                                    value="{{ $pembiayaan->agunan->form_agunan_2_nilai_harga_taksasi_kjpp }}" />
                                            </div>

                                            <div class="mb-1 col-md-12">
                                                <div data-repeater-list="form_agunan_2_alamat">
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-4 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_agunan_2_alamat">Alamat/Lokasi
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
                                                                        for="form_agunan_2_alamat_rt">RT</label>
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
                                                                        for="form_agunan_2_alamat_rw">RW</label>
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
                                                                        for="form_agunan_2_alamat_kelurahan">Kelurahan</label>
                                                                    <input type="text" class="form-control"
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
                                                                        for="form_agunan_2_alamat_kecamatan">Kecamatan</label>
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
                                                                        for="form_agunan_2_alamat_dati2">Kabupaten/Kota</label>
                                                                    <input type="text" class="form-control"
                                                                        name="form_agunan_2_alamat_dati2"
                                                                        id="form_agunan_2_alamat_dati2"
                                                                        aria-describedby="form_agunan_2_alamat_dati2"
                                                                        placeholder="Kabupaten/Kota"
                                                                        value="{{ $pembiayaan->agunan->form_agunan_2_alamat_dati2 }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_agunan_2_alamat_provinsi">Provinsi</label>
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
                                                                        for="form_agunan_2_alamat_kode_pos">Kode
                                                                        Pos</label>
                                                                    <input type="number" class="form-control"
                                                                        name="form_agunan_2_alamat_kode_pos"
                                                                        id="form_agunan_2_alamat_kode_pos"
                                                                        aria-describedby="form_agunan_2_alamat_kode_pos"
                                                                        placeholder="16XXX"
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
                                                                    for="form_agunan_2_status_bukti_kepemilikan">Status/Bukti
                                                                    Kepemilikan</label>
                                                                <select class="select2 w-100"
                                                                    name="form_agunan_2_status_bukti_kepemilikan"
                                                                    id="formAgunan2StatusBuktiKepemilikan"
                                                                    onChange="changeShgbAgunan2()"
                                                                    data-placeholder="Pilih
                                                                    Bukti Kepemilikan">
                                                                    <option value=""></option>
                                                                    <option
                                                                        {{ $pembiayaan->agunan->form_agunan_2_status_bukti_kepemilikan == 'SHM' ? 'selected' : '' }}
                                                                        value="SHM">SHM</option>
                                                                    <option
                                                                        {{ $pembiayaan->agunan->form_agunan_2_status_bukti_kepemilikan == 'SHGB' ? 'selected' : '' }}
                                                                        value="SHGB">SHGB</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-1 col-md-3 {{ $pembiayaan->agunan->form_agunan_2_status_bukti_kepemilikan == 'SHGB' ? 'show' : 'hide' }}"
                                                                id="ifShgbAgunan2Expired">
                                                                <label class="form-label"
                                                                    for="form_agunan_2_status_bukti_kepemilikan_tgl_berakhir">Tanggal
                                                                    Berakhir</label>
                                                                <input type="date"
                                                                    id="form_agunan_2_status_bukti_kepemilikan_tgl_berakhir"
                                                                    class="form-control flatpickr-basic"
                                                                    name="form_agunan_2_status_bukti_kepemilikan_tgl_berakhir"
                                                                    placeholder="YYYY-MM-DD"
                                                                    value="{{ $pembiayaan->agunan->form_agunan_2_status_bukti_kepemilikan_tgl_berakhir }}" />
                                                            </div>

                                                            <div class="mb-1 col-md-3 {{ $pembiayaan->agunan->form_agunan_2_status_bukti_kepemilikan == 'SHGB' ? 'show' : 'hide' }}"
                                                                id="ifShgbAgunan2Hak">
                                                                <label class="form-label"
                                                                    for="form_agunan_2_status_bukti_kepemilikan_hak">Hak</label>
                                                                <select class="select2 w-100"
                                                                    name="form_agunan_2_status_bukti_kepemilikan_hak"
                                                                    id="form_agunan_2_status_bukti_kepemilikan_hak"
                                                                    data-placeholder="Pilih Bukti Kepemilikan">
                                                                    <option value=""></option>
                                                                    <option
                                                                        {{ $pembiayaan->agunan->form_agunan_2_status_bukti_kepemilikan_hak == 'Hak Pakai' ? 'selected' : '' }}
                                                                        value="Hak Pakai">Hak Pakai</option>
                                                                    <option
                                                                        {{ $pembiayaan->agunan->form_agunan_2_status_bukti_kepemilikan_hak == 'Hak Pengelolaan' ? 'selected' : '' }}
                                                                        value="Hak Pengelolaan">Hak Pengelolaan
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_2_no_sertifikat">Nomor
                                                    Sertifikat</label>
                                                <input type="text" name="form_agunan_2_no_sertifikat"
                                                    id="form_agunan_2_no_sertifikat" class="form-control"
                                                    placeholder="Masukkan Nomor Sertifikat"
                                                    value="{{ $pembiayaan->agunan->form_agunan_2_no_sertifikat }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_agunan_2_no_sertifikat_tgl_penerbitan">Tanggal
                                                    Penerbitan</label>
                                                <input type="date" id="form_agunan_2_no_sertifikat_tgl_penerbitan"
                                                    class="form-control flatpickr-basic"
                                                    name="form_agunan_2_no_sertifikat_tgl_penerbitan"
                                                    placeholder="YYYY-MM-DDYY"
                                                    value="{{ $pembiayaan->agunan->form_agunan_2_no_sertifikat_tgl_penerbitan }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_2_no_imb">Nomor IMB</label>
                                                <input type="text" name="form_agunan_2_no_imb"
                                                    id="form_agunan_2_no_imb" class="form-control"
                                                    placeholder="Masukkan Nomor IMB"
                                                    value="{{ $pembiayaan->agunan->form_agunan_2_no_imb }}" />
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label"
                                                    for="form_agunan_2_peruntukan_bangunan">Peruntukan
                                                    Bangunan</label>
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
                                                                    for="form_agunan_2_luas_tanah">Luas
                                                                    Tanah</label>
                                                                <input type="number" name="form_agunan_2_luas_tanah"
                                                                    id="form_agunan_2_luas_tanah" class="form-control"
                                                                    placeholder="Masukkan Luas Tanah"
                                                                    value="{{ $pembiayaan->agunan->form_agunan_2_luas_tanah }}" />

                                                            </div>
                                                            <div class="mb-1 col-md-6">
                                                                <label class="form-label"
                                                                    for="form_agunan_2_luas_bangunan">Luas
                                                                    Bangunan</label>
                                                                <input type="number" name="form_agunan_2_luas_bangunan"
                                                                    id="form_agunan_2_luas_bangunan"
                                                                    class="form-control"
                                                                    placeholder="Masukkan Luas Bangunan"
                                                                    value="{{ $pembiayaan->agunan->form_agunan_2_luas_bangunan }}" />
                                                            </div>

                                                            <div class="mb-1 col-md-6">
                                                                <label class="form-label"
                                                                    for="form_agunan_2_atas_nama">Atas
                                                                    Nama</label>
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
                                            <small class="text-muted">Lengkapi Data Agunan III.</small>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_3_jenis">Jenis Agunan</label>
                                                <select class="select2 w-100" name="form_agunan_3_jenis"
                                                    id="form_agunan_3_jenis">
                                                    <option label="form_agunan_3_jenis">Pilih
                                                        Jenis Agunan
                                                    </option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_3_jenis == 'Deposito' ? 'selected' : '' }}
                                                        value="Deposito">Deposito</option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_3_jenis == 'Tabungan' ? 'selected' : '' }}
                                                        value="Tabungan">Tabungan</option>
                                                    <option
                                                        {{ $pembiayaan->agunan->form_agunan_3_jenis == 'SK Pegawai' ? 'selected' : '' }}
                                                        value="SK Pegawai">SK Pegawai</option>
                                                </select>
                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_3_nilai">Nilai Agunan</label>
                                                <input type="text" name="form_agunan_3_nilai"
                                                    id="form_agunan_3_nilai" class="form-control numeral-mask19"
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

                                    <!-- Form Data Kekayaan dan Pinjaman -->

                                    <div id="formKekayaan" class="content" role="tabpanel"
                                        aria-labelledby="kekayaan-trigger">
                                        <div class="content-header">
                                            <h4>Data Kekayaan dan Pinjaman</h4>
                                            <hr>
                                        </div>

                                        <!-- Kekayaan-->
                                        <div class="content-header">
                                            <h5 class="mb-0 mt-2">Kekayaan</h5>
                                            <small class="text-muted">Lengkapi Data Kekayaan</small>
                                        </div>
                                        <div class="row">
                                            <div class="mb-1 col-md-12">
                                                <div class="repeater-default">
                                                    <div data-repeater-list="repeater_kekayaan_simpanan">
                                                        <h6>Simpanan</h6>
                                                        @if ($if_kekayaan_simpanan != null)
                                                            @foreach ($kekayaan_simpanans as $kekayaan_simpanan)
                                                                <div data-repeater-item>
                                                                    <div class="row d-flex align-items-end">
                                                                        <div class="col-md-2 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="form_kekayaan_simpanan_nama_bank">Nama
                                                                                    Bank</label>
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $kekayaan_simpanan->id }}" />
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    name="form_kekayaan_simpanan_nama_bank"
                                                                                    id="form_kekayaan_simpanan_nama_bank"
                                                                                    aria-describedby="itemquantity"
                                                                                    placeholder="Nama Bank"
                                                                                    value="{{ $kekayaan_simpanan->form_kekayaan_simpanan_nama_bank }}" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="form_kekayaan_simpanan_jenis">Jenis
                                                                                    Simpanan</label>
                                                                                <select
                                                                                    name="form_kekayaan_simpanan_jenis"
                                                                                    id="form_kekayaan_simpanan_jenis"
                                                                                    class="form-control">
                                                                                    <option label="Pilih Jenis Simpanan">
                                                                                    </option>
                                                                                    <option
                                                                                        {{ $kekayaan_simpanan->form_kekayaan_simpanan_jenis == 'Tabungan' ? 'selected' : '' }}
                                                                                        value="Tabungan">Tabungan
                                                                                    </option>
                                                                                    <option
                                                                                        {{ $kekayaan_simpanan->form_kekayaan_simpanan_jenis == 'Deposito' ? 'selected' : '' }}
                                                                                        value="Deposito">Deposito
                                                                                    </option>
                                                                                    <option
                                                                                        {{ $kekayaan_simpanan->form_kekayaan_simpanan_jenis == 'Giro' ? 'selected' : '' }}
                                                                                        value="Giro">Giro</option>
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-3 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="form_kekayaan_simpanan_sejak_tahun">Sejak
                                                                                    Tahun</label>
                                                                                <input type="number"
                                                                                    class="form-control"
                                                                                    name="form_kekayaan_simpanan_sejak_tahun"
                                                                                    id="form_kekayaan_simpanan_sejak_tahun"
                                                                                    aria-describedby="form_kekayaan_simpanan_sejak_tahun"
                                                                                    placeholder="Tahun"
                                                                                    value="{{ $kekayaan_simpanan->form_kekayaan_simpanan_sejak_tahun }}" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-1 col-md-2">
                                                                            <label class="form-label"
                                                                                for="form_kekayaan_simpanan_saldo_per_tanggal">Saldo
                                                                                Per Tanggal</label>
                                                                            <input type="date"
                                                                                id="form_kekayaan_simpanan_saldo_per_tanggal"
                                                                                class="form-control flatpickr-basic"
                                                                                name="form_kekayaan_simpanan_saldo_per_tanggal"
                                                                                placeholder="YYYY-MM-DDYY"
                                                                                value="{{ $kekayaan_simpanan->form_kekayaan_simpanan_saldo_per_tanggal }}" />
                                                                        </div>

                                                                        <div class="col-md-2 col-12">
                                                                            <div class="mb-1">
                                                                                <input type="text"
                                                                                    class="form-control numeral-mask20"
                                                                                    name="form_kekayaan_simpanan_saldo"
                                                                                    id="form_kekayaan_simpanan_saldo"
                                                                                    aria-describedby="form_kekayaan_simpanan_saldo"
                                                                                    placeholder="Saldo (Rp)"
                                                                                    value="{{ $kekayaan_simpanan->form_kekayaan_simpanan_saldo }}" />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-1 col-12">
                                                                            <div class="mb-1">
                                                                                <button
                                                                                    class="btn btn-outline-danger text-nowrap px-1"
                                                                                    data-repeater-delete type="button">
                                                                                    <i data-feather="x"
                                                                                        class="me-25"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button class="btn btn-icon btn-primary" type="button"
                                                                data-repeater-create>
                                                                <i data-feather="plus" class="me-25"></i>
                                                                <span>Tambah</span>
                                                            </button> &ensp;
                                                            <button class="btn btn-icon btn-danger" type="button"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modalHapusKekayaanSimpanan">
                                                                <i data-feather="x" class="me-25"></i>
                                                                <span>Hapus Semua</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @else
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
                                                                        placeholder="Nama Bank" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_kekayaan_simpanan_jenis">Jenis
                                                                        Simpanan</label>
                                                                    <select name="form_kekayaan_simpanan_jenis"
                                                                        id="form_kekayaan_simpanan_jenis"
                                                                        class="form-control">
                                                                        <option label="Pilih Jenis Simpanan"></option>
                                                                        <option value="Tabungan">Tabungan</option>
                                                                        <option value="Deposito">Deposito</option>
                                                                        <option value="Giro">Giro</option>
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
                                                                        placeholder="Tahun" />
                                                                </div>
                                                            </div>

                                                            <div class="mb-1 col-md-2">
                                                                <label class="form-label"
                                                                    for="form_kekayaan_simpanan_saldo_per_tanggal">Saldo
                                                                    Per Tanggal</label>
                                                                <input type="date"
                                                                    id="form_kekayaan_simpanan_saldo_per_tanggal"
                                                                    class="form-control flatpickr-basic"
                                                                    name="form_kekayaan_simpanan_saldo_per_tanggal"
                                                                    placeholder="YYYY-MM-DD" />
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <input type="text"
                                                                        class="form-control numeral-mask20"
                                                                        name="form_kekayaan_simpanan_saldo"
                                                                        id="form_kekayaan_simpanan_saldo"
                                                                        aria-describedby="form_kekayaan_simpanan_saldo"
                                                                        placeholder="Saldo (Rp)" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <button
                                                                        class="btn btn-outline-danger text-nowrap px-1"
                                                                        data-repeater-delete type="button">
                                                                        <i data-feather="x" class="me-25"></i>
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
                                                @endif
                                                <br />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-1 col-md-12">
                                            <div class="repeater-default">
                                                <div data-repeater-list="repeater_kekayaan_tanah_bangunan">
                                                    <h6>Tanah dan
                                                        Bangunan</h6>
                                                    @if ($if_kekayaan_tanah_bangunan != null)
                                                        @foreach ($kekayaan_tanah_bangunans as $kekayaan_tanah_bangunan)
                                                            <div data-repeater-item>
                                                                <div class="row d-flex align-items-end">
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_kekayaan_tanah_bangunan_luas_tanah">Luas
                                                                                Tanah</label>
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $kekayaan_tanah_bangunan->id }}" />
                                                                            <input type="number" class="form-control"
                                                                                name="form_kekayaan_tanah_bangunan_luas_tanah"
                                                                                id="form_kekayaan_tanah_bangunan_luas_tanah"
                                                                                aria-describedby="form_kekayaan_tanah_bangunan_luas_tanah"
                                                                                placeholder="Luas Tanah"
                                                                                value="{{ $kekayaan_tanah_bangunan->form_kekayaan_tanah_bangunan_luas_tanah }}" />
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
                                                                                value="{{ $kekayaan_tanah_bangunan->form_kekayaan_tanah_bangunan_luas_tanah }}" />
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
                                                                                Tanah/Bangunan">
                                                                                    Pilih
                                                                                    Tanah/Bangunan
                                                                                </option>
                                                                                <option
                                                                                    {{ $kekayaan_tanah_bangunan->form_kekayaan_tanah_bangunan_jenis == 'Tanah' ? 'selected' : '' }}
                                                                                    value="Tanah">Tanah</option>
                                                                                <option
                                                                                    {{ $kekayaan_tanah_bangunan->form_kekayaan_tanah_bangunan_jenis == 'Rumah Tinggal' ? 'selected' : '' }}
                                                                                    value="Rumah Tinggal">Rumah
                                                                                    Tinggal
                                                                                </option>
                                                                                <option
                                                                                    {{ $kekayaan_tanah_bangunan->form_kekayaan_tanah_bangunan_jenis == 'Apartemen' ? 'selected' : '' }}
                                                                                    value="Apartemen">Apartemen
                                                                                </option>
                                                                                <option
                                                                                    {{ $kekayaan_tanah_bangunan->form_kekayaan_tanah_bangunan_jenis == 'Rusun' ? 'selected' : '' }}
                                                                                    value="Rusun">Rusun</option>
                                                                                <option
                                                                                    {{ $kekayaan_tanah_bangunan->form_kekayaan_tanah_bangunan_jenis == 'Ruko' ? 'selected' : '' }}
                                                                                    value="Ruko">Ruko</option>
                                                                                <option
                                                                                    {{ $kekayaan_tanah_bangunan->form_kekayaan_tanah_bangunan_jenis == 'Rukan' ? 'selected' : '' }}
                                                                                    value="Rukan">Rukan</option>
                                                                                <option
                                                                                    {{ $kekayaan_tanah_bangunan->form_kekayaan_tanah_bangunan_jenis == 'Kios' ? 'selected' : '' }}
                                                                                    value="Kios">Kios</option>
                                                                                <option
                                                                                    {{ $kekayaan_tanah_bangunan->form_kekayaan_tanah_bangunan_jenis == 'Lain-lain' ? 'selected' : '' }}
                                                                                    value="Lain-lain">Lain-lain
                                                                                </option>
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
                                                                                value="{{ $kekayaan_tanah_bangunan->form_kekayaan_tanah_bangunan_atas_nama }}" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="form_kekayaan_tanah_bangunan_taksasi_pasar_wajar">Taksasi
                                                                                Harga
                                                                                Pasar</label>
                                                                            <input type="text"
                                                                                class="form-control numeral-mask21"
                                                                                name="form_kekayaan_tanah_bangunan_taksasi_pasar_wajar"
                                                                                id="form_kekayaan_tanah_bangunan_taksasi_pasar_wajar"
                                                                                aria-describedby="form_kekayaan_tanah_bangunan_taksasi_pasar_wajar"
                                                                                placeholder="Taksasi Harga Pasar (Rp)"
                                                                                value="{{ $kekayaan_tanah_bangunan->form_kekayaan_tanah_bangunan_taksasi_pasar_wajar }}" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-1 col-12">
                                                                        <div class="mb-1">
                                                                            <button
                                                                                class="btn btn-outline-danger text-nowrap px-1"
                                                                                data-repeater-delete type="button">
                                                                                <i data-feather="x" class="me-25"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button class="btn btn-icon btn-primary" type="button"
                                                            data-repeater-create>
                                                            <i data-feather="plus" class="me-25"></i>
                                                            <span>Tambah</span>
                                                        </button> &ensp;
                                                        <button class="btn btn-icon btn-danger" type="button"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalHapusKekayaanTanahBangunan">
                                                            <i data-feather="x" class="me-25"></i>
                                                            <span>Hapus Semua</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            @else
                                                <div data-repeater-item>
                                                    <div class="row d-flex align-items-end">
                                                        <div class="col-md-2 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label"
                                                                    for="form_kekayaan_tanah_bangunan_luas_tanah">Luas
                                                                    Tanah</label>
                                                                <input type="hidden" name="id" />
                                                                <input type="number" class="form-control"
                                                                    name="form_kekayaan_tanah_bangunan_luas_tanah"
                                                                    id="form_kekayaan_tanah_bangunan_luas_tanah"
                                                                    aria-describedby="form_kekayaan_tanah_bangunan_luas_tanah"
                                                                    placeholder="Luas Tanah" />
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
                                                                    placeholder="Luas Bangunan" />
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
                                                                        Tanah/Bangunan">
                                                                        Pilih
                                                                        Tanah/Bangunan
                                                                    </option>
                                                                    <option value="Tanah">Tanah</option>
                                                                    <option value="Rumah Tinggal">Rumah
                                                                        Tinggal
                                                                    </option>
                                                                    <option value="Apartemen">Apartemen
                                                                    </option>
                                                                    <option value="Rusun">Rusun</option>
                                                                    <option value="Ruko">Ruko</option>
                                                                    <option value="Rukan">Rukan</option>
                                                                    <option value="Kios">Kios</option>
                                                                    <option value="Lain-lain">Lain-lain
                                                                    </option>
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
                                                                    placeholder="Atas Nama" />
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label"
                                                                    for="form_kekayaan_tanah_bangunan_taksasi_pasar_wajar">Taksasi
                                                                    Harga
                                                                    Pasar</label>
                                                                <input type="text"
                                                                    class="form-control numeral-mask21"
                                                                    name="form_kekayaan_tanah_bangunan_taksasi_pasar_wajar"
                                                                    id="form_kekayaan_tanah_bangunan_taksasi_pasar_wajar"
                                                                    aria-describedby="form_kekayaan_tanah_bangunan_taksasi_pasar_wajar"
                                                                    placeholder="Taksasi Harga Pasar (Rp)" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 col-12">
                                                            <div class="mb-1">
                                                                <button class="btn btn-outline-danger text-nowrap px-1"
                                                                    data-repeater-delete type="button">
                                                                    <i data-feather="x" class="me-25"></i>
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
                                            @endif
                                            <br />
                                        </div>
                                    </div>
                            </div>

                            <div class="row">
                                <div class="mb-1 col-md-12">
                                    <div class="repeater-default">
                                        <div data-repeater-list="repeater_kekayaan_kendaraan">
                                            <h6>Kendaraan</h6>
                                            @if ($if_kekayaan_kendaraan != null)
                                                @foreach ($kekayaan_kendaraans as $kekayaan_kendaraan)
                                                    <div data-repeater-item>
                                                        <div class="row d-flex align-items-end">
                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_kekayaan_kendaraan_jenis_merk">Jenis/Merk</label>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $kekayaan_kendaraan->id }}" />
                                                                    <input type="text" class="form-control"
                                                                        name="form_kekayaan_kendaraan_jenis_merk"
                                                                        id="form_kekayaan_kendaraan_jenis_merk"
                                                                        aria-describedby="form_kekayaan_kendaraan_jenis_merk"
                                                                        placeholder="Jenis/Merk"
                                                                        value="{{ $kekayaan_kendaraan->form_kekayaan_kendaraan_jenis_merk }}" />
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
                                                                    value="{{ $kekayaan_kendaraan->form_kekayaan_kendaraan_tahun_dikeluarkan }}" />
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
                                                                        value="{{ $kekayaan_kendaraan->form_kekayaan_kendaraan_atas_nama }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="form_kekayaan_kendaraan_taksasi_harga_jual">Taksasi
                                                                        Harga
                                                                        Jual</label>
                                                                    <input type="text"
                                                                        class="form-control numeral-mask22"
                                                                        name="form_kekayaan_kendaraan_taksasi_harga_jual"
                                                                        id="form_kekayaan_kendaraan_taksasi_harga_jual"
                                                                        aria-describedby="form_kekayaan_kendaraan_taksasi_harga_jual"
                                                                        placeholder="Taksasi Harga Jual"
                                                                        value="{{ $kekayaan_kendaraan->form_kekayaan_kendaraan_taksasi_harga_jual }}" />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1 col-12">
                                                                <div class="mb-1">
                                                                    <button
                                                                        class="btn btn-outline-danger text-nowrap px-1"
                                                                        data-repeater-delete type="button">
                                                                        <i data-feather="x" class="me-25"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button class="btn btn-icon btn-primary" type="button"
                                                    data-repeater-create>
                                                    <i data-feather="plus" class="me-25"></i>
                                                    <span>Tambah</span>
                                                </button> &ensp;
                                                <button class="btn btn-icon btn-danger" type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalHapusKekayaanKendaraan">
                                                    <i data-feather="x" class="me-25"></i>
                                                    <span>Hapus Semua</span>
                                                </button>
                                            </div>
                                        </div>
                                    @else
                                        <div data-repeater-item>
                                            <div class="row d-flex align-items-end">
                                                <div class="col-md-2 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label"
                                                            for="form_kekayaan_kendaraan_jenis_merk">Jenis/Merk</label>
                                                        <input type="hidden" name="id" />
                                                        <input type="text" class="form-control"
                                                            name="form_kekayaan_kendaraan_jenis_merk"
                                                            id="form_kekayaan_kendaraan_jenis_merk"
                                                            aria-describedby="form_kekayaan_kendaraan_jenis_merk"
                                                            placeholder="Jenis/Merk" />
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
                                                        placeholder="Tahun Dikeluarkan" />
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
                                                            placeholder="Atas Nama" />
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label"
                                                            for="form_kekayaan_kendaraan_taksasi_harga_jual">Taksasi
                                                            Harga
                                                            Jual</label>
                                                        <input type="text" class="form-control numeral-mask22"
                                                            name="form_kekayaan_kendaraan_taksasi_harga_jual"
                                                            id="form_kekayaan_kendaraan_taksasi_harga_jual"
                                                            aria-describedby="form_kekayaan_kendaraan_taksasi_harga_jual"
                                                            placeholder="Taksasi Harga Jual" />
                                                    </div>
                                                </div>

                                                <div class="col-md-1 col-12">
                                                    <div class="mb-1">
                                                        <button class="btn btn-outline-danger text-nowrap px-1"
                                                            data-repeater-delete type="button">
                                                            <i data-feather="x" class="me-25"></i>
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
                                    @endif
                                    <br />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-1 col-md-12">
                                <div class="repeater-default">
                                    <div data-repeater-list="repeater_kekayaan_saham">
                                        <h6>Saham</h6>
                                        @if ($if_kekayaan_saham != null)
                                            @foreach ($kekayaan_sahams as $kekayaan_saham)
                                                <div data-repeater-item>
                                                    <div class="row d-flex align-items-end">
                                                        <div class="col-md-2 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label"
                                                                    for="form_kekayaan_saham_penerbit">Penerbit</label>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $kekayaan_saham->id }}" />
                                                                <input type="text" class="form-control"
                                                                    name="form_kekayaan_saham_penerbit"
                                                                    id="form_kekayaan_saham_penerbit"
                                                                    aria-describedby="form_kekayaan_saham_penerbit"
                                                                    placeholder="Penerbit"
                                                                    value="{{ $kekayaan_saham->form_kekayaan_saham_penerbit }}" />
                                                            </div>
                                                        </div>

                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label"
                                                                for="form_kekayaan_saham_per_tanggal">Rupiah
                                                                Per
                                                                Tanggal</label>
                                                            <input type="date" id="form_kekayaan_saham_per_tanggal"
                                                                class="form-control flatpickr-basic"
                                                                name="form_kekayaan_saham_per_tanggal"
                                                                placeholder="YYYY-MM-DDYY"
                                                                value="{{ $kekayaan_saham->form_kekayaan_saham_per_tanggal }}" />
                                                        </div>

                                                        <div class="mb-1 col-md-3">
                                                            <input type="text" class="form-control numeral-mask23"
                                                                name="form_kekayaan_saham_rp"
                                                                id="form_kekayaan_saham_rp"
                                                                aria-describedby="form_kekayaan_saham_rp"
                                                                placeholder="Rupiah Per Tanggal"
                                                                value="{{ $kekayaan_saham->form_kekayaan_saham_rp }}" />
                                                        </div>

                                                        <div class="col-md-1 col-12">
                                                            <div class="mb-1">
                                                                <button class="btn btn-outline-danger text-nowrap px-1"
                                                                    data-repeater-delete type="button">
                                                                    <i data-feather="x" class="me-25"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-icon btn-primary" type="button"
                                                data-repeater-create>
                                                <i data-feather="plus" class="me-25"></i>
                                                <span>Tambah</span>
                                            </button> &ensp;
                                            <button class="btn btn-icon btn-danger" type="button"
                                                data-bs-toggle="modal" data-bs-target="#modalHapusKekayaanSaham">
                                                <i data-feather="x" class="me-25"></i>
                                                <span>Hapus Semua</span>
                                            </button>
                                        </div>
                                    </div>
                                @else
                                    <div data-repeater-item>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-2 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label"
                                                        for="form_kekayaan_saham_penerbit">Penerbit</label>
                                                    <input type="hidden" name="id" />
                                                    <input type="text" class="form-control"
                                                        name="form_kekayaan_saham_penerbit"
                                                        id="form_kekayaan_saham_penerbit"
                                                        aria-describedby="form_kekayaan_saham_penerbit"
                                                        placeholder="Penerbit" />
                                                </div>
                                            </div>

                                            <div class="mb-1 col-md-2">
                                                <label class="form-label" for="form_kekayaan_saham_per_tanggal">Rupiah
                                                    Per
                                                    Tanggal</label>
                                                <input type="date" id="form_kekayaan_saham_per_tanggal"
                                                    class="form-control flatpickr-basic"
                                                    name="form_kekayaan_saham_per_tanggal" placeholder="YYYY-MM-DDYY" />
                                            </div>

                                            <div class="mb-1 col-md-3">
                                                <input type="text" class="form-control numeral-mask23"
                                                    name="form_kekayaan_saham_rp" id="form_kekayaan_saham_rp"
                                                    aria-describedby="form_kekayaan_saham_rp"
                                                    placeholder="Rupiah Per Tanggal" />
                                            </div>

                                            <div class="col-md-1 col-12">
                                                <div class="mb-1">
                                                    <button class="btn btn-outline-danger text-nowrap px-1"
                                                        data-repeater-delete type="button">
                                                        <i data-feather="x" class="me-25"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                            <i data-feather="plus" class="me-25"></i>
                                            <span>Tambah</span>
                                        </button>
                                    </div>
                                </div>
                                @endif
                                <br />
                            </div>
                        </div>
                </div>

                <div class="row">
                    <div class="mb-1 col-md-12">
                        <div class="repeater-default">
                            <div data-repeater-list="repeater_kekayaan_lainnya">
                                @if ($if_kekayaan_lainnya != null)
                                    @foreach ($kekayaan_lainnyas as $kekayaan_lainnya)
                                        <div data-repeater-item>
                                            <div class="row d-flex align-items-end">
                                                <div class="col-md-2 col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label"
                                                            for="form_kekayaan_lainnya">Lainnya</label>
                                                        <input type="hidden" name="id"
                                                            value="{{ $kekayaan_lainnya->id }}" />
                                                        <input type="text" class="form-control"
                                                            name="form_kekayaan_lainnya" id="form_kekayaan_lainnya"
                                                            aria-describedby="form_kekayaan_lainnya"
                                                            placeholder="Lainnya"
                                                            value="{{ $kekayaan_lainnya->form_kekayaan_lainnya }}" />
                                                    </div>
                                                </div>

                                                <div class="mb-1 col-md-3">
                                                    <label class="form-label"
                                                        for="form_kekayaan_lainnya_rp">Rupiah</label>
                                                    <input type="text" class="form-control numeral-mask24"
                                                        name="form_kekayaan_lainnya_rp" id="form_kekayaan_lainnya_rp"
                                                        aria-describedby="form_kekayaan_lainnya_rp" placeholder="Rp"
                                                        value="{{ $kekayaan_lainnya->form_kekayaan_lainnya_rp }}" />
                                                </div>

                                                <div class="col-md-1 col-12">
                                                    <div class="mb-1">
                                                        <button class="btn btn-outline-danger text-nowrap px-1"
                                                            data-repeater-delete type="button">
                                                            <i data-feather="x" class="me-25"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                        <i data-feather="plus" class="me-25"></i>
                                        <span>Tambah</span>
                                    </button> &ensp;
                                    <button class="btn btn-icon btn-danger" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalHapusKekayaanLainnya">
                                        <i data-feather="x" class="me-25"></i>
                                        <span>Hapus Semua</span>
                                    </button>
                                </div>
                            </div>
                        @else
                            <div data-repeater-item>
                                <div class="row d-flex align-items-end">
                                    <div class="col-md-2 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="form_kekayaan_lainnya">Lainnya</label>
                                            <input type="hidden" name="id" />
                                            <input type="text" class="form-control" name="form_kekayaan_lainnya"
                                                id="form_kekayaan_lainnya" aria-describedby="form_kekayaan_lainnya"
                                                placeholder="Lainnya" />
                                        </div>
                                    </div>

                                    <div class="mb-1 col-md-3">
                                        <label class="form-label" for="form_kekayaan_lainnya_rp">Rupiah</label>
                                        <input type="text" class="form-control numeral-mask24"
                                            name="form_kekayaan_lainnya_rp" id="form_kekayaan_lainnya_rp"
                                            aria-describedby="form_kekayaan_lainnya_rp" placeholder="Rp" />
                                    </div>

                                    <div class="col-md-1 col-12">
                                        <div class="mb-1">
                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                                type="button">
                                                <i data-feather="x" class="me-25"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Tambah</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        <br />
                    </div>
                </div>
            </div>

            <hr />

            <!-- Pinjaman-->
            <div class="content-header">
                <h5 class="mb-0 mt-2">Pinjaman</h5>
                <small class="text-muted">Lengkapi Data Pinjaman</small>
            </div>

            <div class="row">
                <div class="mb-1 col-md-12">
                    <div class="repeater-default">
                        <div data-repeater-list="repeater_pinjaman">
                            <h6>
                                Pinjaman
                            </h6>
                            @if ($if_pinjaman != null)
                                @foreach ($pinjamans as $pinjaman)
                                    <div data-repeater-item>
                                        <div class="row d-flex align-items-end">
                                            <div class="col-md-2 col-6">
                                                <div class="mb-1">
                                                    <label class="form-label" for="form_pinjaman_nama_bank">Nama
                                                        Bank</label>
                                                    <input type="hidden" name="id"
                                                        value="{{ $pinjaman->id }}" />
                                                    <input type="text" class="form-control"
                                                        name="form_pinjaman_nama_bank" id="form_pinjaman_nama_bank"
                                                        aria-describedby="form_pinjaman_nama_bank"
                                                        placeholder="Nama Bank"
                                                        value="{{ $pinjaman->form_pinjaman_nama_bank }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="form_pinjaman_jenis">Jenis
                                                        Pinjaman</label>
                                                    <select class="form-control w-100" name="form_pinjaman_jenis"
                                                        id="form_pinjaman_jenis">
                                                        <option label="Pilih Jenis Pinjaman">
                                                            Pilih
                                                            Jenis
                                                            Pinjaman
                                                        </option>
                                                        <option
                                                            {{ $pinjaman->form_kekayaan_tanah_bangunan_jenis == 'Modal Kerja' ? 'selected' : '' }}
                                                            value="Modal Kerja">Modal Kerja
                                                        </option>
                                                        <option
                                                            {{ $pinjaman->form_kekayaan_tanah_bangunan_jenis == 'Investasi' ? 'selected' : '' }}
                                                            value="Investasi">Investasi
                                                        </option>
                                                        <option
                                                            {{ $pinjaman->form_kekayaan_tanah_bangunan_jenis == 'Konsumtif' ? 'selected' : '' }}
                                                            value="Konsumtif">Konsumtif
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="form_pinjaman_sejak_tahun">Sejak
                                                        Tahun</label>
                                                    <input type="number" class="form-control"
                                                        name="form_pinjaman_sejak_tahun" id="form_pinjaman_sejak_tahun"
                                                        aria-describedby="form_pinjaman_sejak_tahun" placeholder="Tahun"
                                                        value="{{ $pinjaman->form_pinjaman_sejak_tahun }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label"
                                                        for="form_pinjaman_plafond">Plafond</label>
                                                    <input type="text" class="form-control numeral-mask25"
                                                        name="form_pinjaman_plafond" id="form_pinjaman_plafond"
                                                        aria-describedby="form_pinjaman_plafond"
                                                        placeholder="Plafond (Rp)"
                                                        value="{{ $pinjaman->form_pinjaman_plafond }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label"
                                                        for="form_pinjaman_outstanding">Outstanding</label>
                                                    <input type="text" class="form-control numeral-mask111"
                                                        name="form_pinjaman_outstanding" id="form_pinjaman_outstanding"
                                                        aria-describedby="form_pinjaman_outstanding"
                                                        placeholder="Outstanding (Rp)"
                                                        value="{{ $pinjaman->form_pinjaman_outstanding }}" />
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
                                                        value="{{ $pinjaman->form_pinjaman_jangka_waktu_bulan }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label"
                                                        for="form_pinjaman_bunga_margin">Bunga/Margin
                                                        (%)
                                                    </label>
                                                    <input type="text" class="form-control"
                                                        name="form_pinjaman_bunga_margin"
                                                        id="form_pinjaman_bunga_margin"
                                                        aria-describedby="form_pinjaman_bunga_margin"
                                                        placeholder="Bunga/Margin (%)"
                                                        value="{{ $pinjaman->form_pinjaman_bunga_margin }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-8">
                                                <div class="mb-1">
                                                    <label class="form-label"
                                                        for="form_pinjaman_angsuran_per_bulan">Angsuran/Bulan</label>
                                                    <input type="text" class="form-control numeral-mask26"
                                                        name="form_pinjaman_angsuran_per_bulan"
                                                        id="form_pinjaman_angsuran_per_bulan"
                                                        aria-describedby="form_pinjaman_angsuran_per_bulan"
                                                        placeholder="Angsuran/Bulan (Rp)"
                                                        value="{{ $pinjaman->form_pinjaman_angsuran_per_bulan }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="form_pinjaman_agunan">Agunan</label>
                                                    <input type="text" class="form-control"
                                                        name="form_pinjaman_agunan" id="form_pinjaman_agunan"
                                                        aria-describedby="form_pinjaman_agunan" placeholder="Agunan"
                                                        value="{{ $pinjaman->form_pinjaman_agunan }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label"
                                                        for="form_pinjaman_kolektibilitas">Kolektibilitas</label>
                                                    <input type="text" class="form-control"
                                                        name="form_pinjaman_kolektibilitas"
                                                        id="form_pinjaman_kolektibilitas"
                                                        aria-describedby="form_pinjaman_kolektibilitas"
                                                        placeholder="Kolektibilitas"
                                                        value="{{ $pinjaman->form_pinjaman_kolektibilitas }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-1 col-12">
                                                <div class="mb-1">
                                                    <button class="btn btn-outline-danger text-nowrap px-1"
                                                        data-repeater-delete type="button">
                                                        <i data-feather="x" class="me-25"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="margin-bottom:8px;"></div>
                                    </div>
                                @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Tambah</span>
                                </button> &ensp;
                                <button class="btn btn-icon btn-danger" type="button" data-bs-toggle="modal"
                                    data-bs-target="#modalHapusPinjaman">
                                    <i data-feather="x" class="me-25"></i>
                                    <span>Hapus Semua</span>
                                </button>
                            </div>
                        </div>
                    @else
                        <div data-repeater-item>
                            <div class="row d-flex align-items-end">
                                <div class="col-md-2 col-6">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_nama_bank">Nama
                                            Bank</label>
                                        <input type="hidden" name="id" />
                                        <input type="text" class="form-control" name="form_pinjaman_nama_bank"
                                            id="form_pinjaman_nama_bank" aria-describedby="form_pinjaman_nama_bank"
                                            placeholder="Nama Bank" />
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_jenis">Jenis
                                            Pinjaman</label>
                                        <select class="form-control w-100" name="form_pinjaman_jenis"
                                            id="form_pinjaman_jenis">
                                            <option label="Pilih Jenis Pinjaman">
                                                Pilih
                                                Jenis
                                                Pinjaman
                                            </option>
                                            <option value="Modal Kerja">Modal Kerja
                                            </option>
                                            <option value="Investasi">Investasi
                                            </option>
                                            <option value="Konsumtif">Konsumtif
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_sejak_tahun">Sejak
                                            Tahun</label>
                                        <input type="number" class="form-control" name="form_pinjaman_sejak_tahun"
                                            id="form_pinjaman_sejak_tahun" aria-describedby="form_pinjaman_sejak_tahun"
                                            placeholder="Tahun" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_plafond">Plafond</label>
                                        <input type="text" class="form-control numeral-mask25"
                                            name="form_pinjaman_plafond" id="form_pinjaman_plafond"
                                            aria-describedby="form_pinjaman_plafond" placeholder="Plafond (Rp)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_outstanding">Outstanding</label>
                                        <input type="text" class="form-control numeral-mask111"
                                            name="form_pinjaman_outstanding" id="form_pinjaman_outstanding"
                                            aria-describedby="form_pinjaman_outstanding"
                                            placeholder="Outstanding (Rp)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_jangka_waktu_bulan">Jangka
                                            Waktu (Bulan)</label>
                                        <input type="number" class="form-control"
                                            name="form_pinjaman_jangka_waktu_bulan"
                                            id="form_pinjaman_jangka_waktu_bulan"
                                            aria-describedby="form_pinjaman_jangka_waktu_bulan"
                                            placeholder="Jangka Waktu (Bulan)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_bunga_margin">Bunga/Margin
                                            (%)</label>
                                        <input type="text" class="form-control" name="form_pinjaman_bunga_margin"
                                            id="form_pinjaman_bunga_margin"
                                            aria-describedby="form_pinjaman_bunga_margin"
                                            placeholder="Bunga/Margin (%)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pinjaman_angsuran_per_bulan">Angsuran/Bulan</label>
                                        <input type="text" class="form-control numeral-mask26"
                                            name="form_pinjaman_angsuran_per_bulan"
                                            id="form_pinjaman_angsuran_per_bulan"
                                            aria-describedby="form_pinjaman_angsuran_per_bulan"
                                            placeholder="Angsuran/Bulan (Rp)" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="form_pinjaman_agunan">Agunan</label>
                                        <input type="text" class="form-control" name="form_pinjaman_agunan"
                                            id="form_pinjaman_agunan" aria-describedby="form_pinjaman_agunan"
                                            placeholder="Agunan" />
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="mb-1">
                                        <label class="form-label"
                                            for="form_pinjaman_kolektibilitas">Kolektibilitas</label>
                                        <input type="text" class="form-control" name="form_pinjaman_kolektibilitas"
                                            id="form_pinjaman_kolektibilitas"
                                            aria-describedby="form_pinjaman_kolektibilitas"
                                            placeholder="Kolektibilitas" />
                                    </div>
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="mb-1">
                                        <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                            type="button">
                                            <i data-feather="x" class="me-25"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-bottom:8px;"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                <i data-feather="plus" class="me-25"></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </div>
                    @endif
                    <br />
                </div>
            </div>
        </div>

        <!-- Kartu Kredit -->

        <div class="row">
            <div class="mb-1 col-md-12">
                <div class="repeater-default">
                    <div data-repeater-list="repeater_pinjaman_kartu_kredit">
                        <h6>Kartu
                            Kredit</h6>
                        @if ($if_pinjaman_kartu_kredit != null)
                            @foreach ($pinjaman_kartu_kredits as $pinjaman_kartu_kredit)
                                <div data-repeater-item>
                                    <div class="row d-flex align-items-end">
                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="form-label"
                                                    for="form_pinjaman_kartu_kredit_nama_bank">Nama
                                                    Bank</label>
                                                <input type="hidden" name="id"
                                                    value="{{ $pinjaman_kartu_kredit->id }}" />
                                                <input type="text" class="form-control"
                                                    name="form_pinjaman_kartu_kredit_nama_bank"
                                                    id="form_pinjaman_kartu_kredit_nama_bank"
                                                    aria-describedby="form_pinjaman_kartu_kredit_nama_bank"
                                                    placeholder="Nama Bank"
                                                    value="{{ $pinjaman_kartu_kredit->form_pinjaman_kartu_kredit_nama_bank }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="form-label"
                                                    for="form_pinjaman_kartu_kredit_sejak_tahun">Sejak
                                                    Tahun</label>
                                                <input type="number" class="form-control"
                                                    name="form_pinjaman_kartu_kredit_sejak_tahun"
                                                    id="form_pinjaman_kartu_kredit_sejak_tahun"
                                                    aria-describedby="form_pinjaman_kartu_kredit_sejak_tahun"
                                                    placeholder="Tahun"
                                                    value="{{ $pinjaman_kartu_kredit->form_pinjaman_kartu_kredit_sejak_tahun }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="form-label"
                                                    for="form_pinjaman_kartu_kredit_plafond">Plafond
                                                </label>
                                                <input type="text" class="form-control numeral-mask106"
                                                    name="form_pinjaman_kartu_kredit_plafond"
                                                    id="form_pinjaman_kartu_kredit_plafond"
                                                    aria-describedby="form_pinjaman_kartu_kredit_plafond"
                                                    placeholder="Plafond (Rp)"
                                                    value="{{ $pinjaman_kartu_kredit->form_pinjaman_kartu_kredit_plafond }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="form-label"
                                                    for="form_pinjaman_kartu_kredit_outstanding">Outstanding
                                                </label>
                                                <input type="text" class="form-control numeral-mask107"
                                                    name="form_pinjaman_kartu_kredit_outstanding"
                                                    id="form_pinjaman_kartu_kredit_outstanding"
                                                    aria-describedby="form_pinjaman_kartu_kredit_outstanding"
                                                    placeholder="Outstanding (Rp)"
                                                    value="{{ $pinjaman_kartu_kredit->form_pinjaman_kartu_kredit_outstanding }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="form-label"
                                                    for="form_pinjaman_kartu_kredit_jangka_waktu_bulan">Jangka
                                                    Waktu (Bulan)</label>
                                                <input type="number" class="form-control"
                                                    name="form_pinjaman_kartu_kredit_jangka_waktu_bulan"
                                                    id="form_pinjaman_kartu_kredit_jangka_waktu_bulan"
                                                    aria-describedby="form_pinjaman_kartu_kredit_jangka_waktu_bulan"
                                                    placeholder="Jangka Waktu (Bulan)"
                                                    value="{{ $pinjaman_kartu_kredit->form_pinjaman_kartu_kredit_jangka_waktu_bulan }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="form-label"
                                                    for="form_pinjaman_kartu_kredit_bunga_margin">Bunga/Margin
                                                    (%)
                                                </label>
                                                <input type="text" class="form-control"
                                                    name="form_pinjaman_kartu_kredit_bunga_margin"
                                                    id="form_pinjaman_kartu_kredit_bunga_margin"
                                                    aria-describedby="form_pinjaman_kartu_kredit_bunga_margin"
                                                    placeholder="Bunga/Margin (%)"
                                                    value="{{ $pinjaman_kartu_kredit->form_pinjaman_kartu_kredit_bunga_margin }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="form-label"
                                                    for="form_pinjaman_kartu_kredit_angsuran_per_bulan">Angsuran/Bulan</label>
                                                <input type="text" class="form-control numeral-mask108"
                                                    name="form_pinjaman_kartu_kredit_angsuran_per_bulan"
                                                    id="form_pinjaman_kartu_kredit_angsuran_per_bulan"
                                                    aria-describedby="form_pinjaman_kartu_kredit_angsuran_per_bulan"
                                                    placeholder="Angsuran/Bulan (Rp)"
                                                    value="{{ $pinjaman_kartu_kredit->form_pinjaman_kartu_kredit_angsuran_per_bulan }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="form-label"
                                                    for="form_pinjaman_kartu_kredit_nama_bank">Agunan</label>
                                                <input type="text" class="form-control"
                                                    name="form_pinjaman_kartu_kredit_agunan"
                                                    id="form_pinjaman_kartu_kredit_agunan"
                                                    aria-describedby="form_pinjaman_kartu_kredit_agunan"
                                                    placeholder="Agunan"
                                                    value="{{ $pinjaman_kartu_kredit->form_pinjaman_kartu_kredit_agunan }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="form-label"
                                                    for="form_pinjaman_kartu_kredit_kolektibilitas">Kolektibilitas</label>
                                                <input type="text" class="form-control"
                                                    name="form_pinjaman_kartu_kredit_kolektibilitas"
                                                    id="form_pinjaman_kartu_kredit_kolektibilitas"
                                                    aria-describedby="form_pinjaman_kartu_kredit_kolektibilitas"
                                                    placeholder="Kolektibilitas"
                                                    value="{{ $pinjaman_kartu_kredit->form_pinjaman_kartu_kredit_kolektibilitas }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-1 col-12">
                                            <div class="mb-1">
                                                <button class="btn btn-outline-danger text-nowrap px-1"
                                                    data-repeater-delete type="button">
                                                    <i data-feather="x" class="me-25"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-bottom:8px;"></div>
                                </div>
                            @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                <i data-feather="plus" class="me-25"></i>
                                <span>Tambah</span>
                            </button> &ensp;
                            <button class="btn btn-icon btn-danger" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalHapusPinjamanKartuKredit">
                                <i data-feather="x" class="me-25"></i>
                                <span>Hapus Semua</span>
                            </button>
                        </div>
                    </div>
                @else
                    <div data-repeater-item>
                        <div class="row d-flex align-items-end">
                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="form_pinjaman_kartu_kredit_nama_bank">Nama
                                        Bank</label>
                                    <input type="hidden" name="id" />
                                    <input type="text" class="form-control"
                                        name="form_pinjaman_kartu_kredit_nama_bank"
                                        id="form_pinjaman_kartu_kredit_nama_bank"
                                        aria-describedby="form_pinjaman_kartu_kredit_nama_bank"
                                        placeholder="Nama Bank" />
                                </div>
                            </div>

                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="form_pinjaman_kartu_kredit_sejak_tahun">Sejak
                                        Tahun</label>
                                    <input type="number" class="form-control"
                                        name="form_pinjaman_kartu_kredit_sejak_tahun"
                                        id="form_pinjaman_kartu_kredit_sejak_tahun"
                                        aria-describedby="form_pinjaman_kartu_kredit_sejak_tahun" placeholder="Tahun" />
                                </div>
                            </div>

                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="form_pinjaman_kartu_kredit_plafond">Plafond
                                    </label>
                                    <input type="text" class="form-control numeral-mask106"
                                        name="form_pinjaman_kartu_kredit_plafond"
                                        id="form_pinjaman_kartu_kredit_plafond"
                                        aria-describedby="form_pinjaman_kartu_kredit_plafond"
                                        placeholder="Plafond (Rp)" />
                                </div>
                            </div>

                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="form_pinjaman_kartu_kredit_outstanding">Outstanding
                                    </label>
                                    <input type="text" class="form-control numeral-mask107"
                                        name="form_pinjaman_kartu_kredit_outstanding"
                                        id="form_pinjaman_kartu_kredit_outstanding"
                                        aria-describedby="form_pinjaman_kartu_kredit_outstanding"
                                        placeholder="Outstanding (Rp)" />
                                </div>
                            </div>

                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="form_pinjaman_kartu_kredit_jangka_waktu_bulan">Jangka
                                        Waktu (Bulan)</label>
                                    <input type="number" class="form-control"
                                        name="form_pinjaman_kartu_kredit_jangka_waktu_bulan"
                                        id="form_pinjaman_kartu_kredit_jangka_waktu_bulan"
                                        aria-describedby="form_pinjaman_kartu_kredit_jangka_waktu_bulan"
                                        placeholder="Jangka Waktu (Bulan)" />
                                </div>
                            </div>

                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="form_pinjaman_kartu_kredit_bunga_margin">Bunga/Margin
                                        (%)</label>
                                    <input type="text" class="form-control"
                                        name="form_pinjaman_kartu_kredit_bunga_margin"
                                        id="form_pinjaman_kartu_kredit_bunga_margin"
                                        aria-describedby="form_pinjaman_kartu_kredit_bunga_margin"
                                        placeholder="Bunga/Margin (%)" />
                                </div>
                            </div>

                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label"
                                        for="form_pinjaman_kartu_kredit_angsuran_per_bulan">Angsuran/Bulan</label>
                                    <input type="text" class="form-control numeral-mask108"
                                        name="form_pinjaman_kartu_kredit_angsuran_per_bulan"
                                        id="form_pinjaman_kartu_kredit_angsuran_per_bulan"
                                        aria-describedby="form_pinjaman_kartu_kredit_angsuran_per_bulan"
                                        placeholder="Angsuran/Bulan (Rp)" />
                                </div>
                            </div>

                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="form_pinjaman_kartu_kredit_nama_bank">Agunan</label>
                                    <input type="text" class="form-control"
                                        name="form_pinjaman_kartu_kredit_agunan" id="form_pinjaman_kartu_kredit_agunan"
                                        aria-describedby="form_pinjaman_kartu_kredit_agunan" placeholder="Agunan" />
                                </div>
                            </div>

                            <div class="col-md-2 col-12">
                                <div class="mb-1">
                                    <label class="form-label"
                                        for="form_pinjaman_kartu_kredit_kolektibilitas">Kolektibilitas</label>
                                    <input type="text" class="form-control"
                                        name="form_pinjaman_kartu_kredit_kolektibilitas"
                                        id="form_pinjaman_kartu_kredit_kolektibilitas"
                                        aria-describedby="form_pinjaman_kartu_kredit_kolektibilitas"
                                        placeholder="Kolektibilitas" />
                                </div>
                            </div>

                            <div class="col-md-1 col-12">
                                <div class="mb-1">
                                    <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                        type="button">
                                        <i data-feather="x" class="me-25"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div style="margin-bottom:8px;"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                            <i data-feather="plus" class="me-25"></i>
                            <span>Tambah</span>
                        </button>
                    </div>
                </div>
                @endif
                <br />
            </div>
        </div>
    </div>


    <div class="row">
        <div class="mb-1 col-md-12">
            <div class="repeater-default">
                <div data-repeater-list="repeater_pinjaman_lainnya">
                    <h6>Lainnya</h6>
                    @if ($if_pinjaman_lainnya != null)
                        @foreach ($pinjaman_lainnyas as $pinjaman_lainnya)
                            <div data-repeater-item>
                                <div class="row d-flex align-items-end">
                                    <div class="col-md-2 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="form_pinjaman_lainnya_nama">Nama</label>
                                            <input type="hidden" name="id"
                                                value="{{ $pinjaman_lainnya->id }}" />
                                            <input type="text" class="form-control"
                                                name="form_pinjaman_lainnya_nama" id="form_pinjaman_lainnya_nama"
                                                aria-describedby="form_pinjaman_lainnya_nama" placeholder="Nama"
                                                value="{{ $pinjaman_lainnya->form_pinjaman_lainnya_nama }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-1 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="form_pinjaman_lainnya_sejak_tahun">Sejak
                                                Tahun</label>
                                            <input type="number" class="form-control"
                                                name="form_pinjaman_lainnya_sejak_tahun"
                                                id="form_pinjaman_lainnya_sejak_tahun"
                                                aria-describedby="form_pinjaman_lainnya_sejak_tahun" placeholder="Tahun"
                                                value="{{ $pinjaman_lainnya->form_pinjaman_lainnya_nama }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="form_pinjaman_lainnya_plafond">Plafond
                                            </label>
                                            <input type="text" class="form-control numeral-mask27"
                                                name="form_pinjaman_lainnya_plafond" id="form_pinjaman_lainnya_plafond"
                                                aria-describedby="form_pinjaman_lainnya_plafond"
                                                placeholder="Plafond (Rp)"
                                                value="{{ $pinjaman_lainnya->form_pinjaman_lainnya_plafond }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                for="form_pinjaman_lainnya_outstanding">Outstanding
                                            </label>
                                            <input type="text" class="form-control numeral-mask109"
                                                name="form_pinjaman_lainnya_outstanding"
                                                id="form_pinjaman_lainnya_outstanding"
                                                aria-describedby="form_pinjaman_lainnya_outstanding"
                                                placeholder="Outstanding (Rp)"
                                                value="{{ $pinjaman_lainnya->form_pinjaman_lainnya_outstanding }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                for="form_pinjaman_lainnya_jangka_waktu_bulan">Jangka
                                                Waktu (Bulan)</label>
                                            <input type="number" class="form-control"
                                                name="form_pinjaman_lainnya_jangka_waktu_bulan"
                                                id="form_pinjaman_lainnya_jangka_waktu_bulan"
                                                aria-describedby="form_pinjaman_lainnya_jangka_waktu_bulan"
                                                placeholder="Jangka Waktu (Bulan)"
                                                value="{{ $pinjaman_lainnya->form_pinjaman_lainnya_jangka_waktu_bulan }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                for="form_pinjaman_lainnya_bunga_margin">Bunga/Margin
                                                (%)
                                            </label>
                                            <input type="text" class="form-control"
                                                name="form_pinjaman_lainnya_bunga_margin"
                                                id="form_pinjaman_lainnya_bunga_margin"
                                                aria-describedby="form_pinjaman_lainnya_bunga_margin"
                                                placeholder="Bunga/Margin (%)"
                                                value="{{ $pinjaman_lainnya->form_pinjaman_lainnya_bunga_margin }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                for="form_pinjaman_lainnya_angsuran_per_bulan">Angsuran/Bulan</label>
                                            <input type="text" class="form-control numeral-mask110"
                                                name="form_pinjaman_lainnya_angsuran_per_bulan"
                                                id="form_pinjaman_lainnya_angsuran_per_bulan"
                                                aria-describedby="form_pinjaman_lainnya_angsuran_per_bulan"
                                                placeholder="Angsuran/Bulan (Rp)"
                                                value="{{ $pinjaman_lainnya->form_pinjaman_lainnya_angsuran_per_bulan }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="form_pinjaman_lainnya_agunan">Agunan</label>
                                            <input type="text" class="form-control"
                                                name="form_pinjaman_lainnya_agunan" id="form_pinjaman_lainnya_agunan"
                                                aria-describedby="form_pinjaman_lainnya_agunan" placeholder="Agunan"
                                                value="{{ $pinjaman_lainnya->form_pinjaman_lainnya_agunan }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-12">
                                        <div class="mb-1">
                                            <label class="form-label"
                                                for="form_pinjaman_lainnya_kolektibilitas">Kolektibilitas</label>
                                            <input type="text" class="form-control"
                                                name="form_pinjaman_lainnya_kolektibilitas"
                                                id="form_pinjaman_lainnya_kolektibilitas"
                                                aria-describedby="form_pinjaman_lainnya_kolektibilitas"
                                                placeholder="Kolektibilitas"
                                                value="{{ $pinjaman_lainnya->form_pinjaman_lainnya_kolektibilitas }}" />
                                        </div>
                                    </div>

                                    <div class="col-md-1 col-12">
                                        <div class="mb-1">
                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                                type="button">
                                                <i data-feather="x" class="me-25"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-bottom:8px;"></div>
                            </div>
                        @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                            <i data-feather="plus" class="me-25"></i>
                            <span>Tambah</span>
                        </button> &ensp;
                        <button class="btn btn-icon btn-danger" type="button" data-bs-toggle="modal"
                            data-bs-target="#modalHapusPinjamanLainnya">
                            <i data-feather="x" class="me-25"></i>
                            <span>Hapus Semua</span>
                        </button>
                    </div>
                </div>
            @else
                <div data-repeater-item>
                    <div class="row d-flex align-items-end">
                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_pinjaman_lainnya_nama">Nama</label>
                                <input type="hidden" name="id" />
                                <input type="text" class="form-control" name="form_pinjaman_lainnya_nama"
                                    id="form_pinjaman_lainnya_nama" aria-describedby="form_pinjaman_lainnya_nama"
                                    placeholder="Nama" />
                            </div>
                        </div>

                        <div class="col-md-1 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_pinjaman_lainnya_sejak_tahun">Sejak
                                    Tahun</label>
                                <input type="number" class="form-control" name="form_pinjaman_lainnya_sejak_tahun"
                                    id="form_pinjaman_lainnya_sejak_tahun"
                                    aria-describedby="form_pinjaman_lainnya_sejak_tahun" placeholder="Tahun" />
                            </div>
                        </div>

                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_pinjaman_lainnya_plafond">Plafond
                                </label>
                                <input type="text" class="form-control numeral-mask27"
                                    name="form_pinjaman_lainnya_plafond" id="form_pinjaman_lainnya_plafond"
                                    aria-describedby="form_pinjaman_lainnya_plafond" placeholder="Plafond (Rp)" />
                            </div>
                        </div>

                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_pinjaman_lainnya_outstanding">Outstanding
                                </label>
                                <input type="text" class="form-control numeral-mask109"
                                    name="form_pinjaman_lainnya_outstanding" id="form_pinjaman_lainnya_outstanding"
                                    aria-describedby="form_pinjaman_lainnya_outstanding"
                                    placeholder="Outstanding (Rp)" />
                            </div>
                        </div>

                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_pinjaman_lainnya_jangka_waktu_bulan">Jangka
                                    Waktu (Bulan)</label>
                                <input type="number" class="form-control"
                                    name="form_pinjaman_lainnya_jangka_waktu_bulan"
                                    id="form_pinjaman_lainnya_jangka_waktu_bulan"
                                    aria-describedby="form_pinjaman_lainnya_jangka_waktu_bulan"
                                    placeholder="Jangka Waktu (Bulan)" />
                            </div>
                        </div>

                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_pinjaman_lainnya_bunga_margin">Bunga/Margin
                                    (%)</label>
                                <input type="text" class="form-control" name="form_pinjaman_lainnya_bunga_margin"
                                    id="form_pinjaman_lainnya_bunga_margin"
                                    aria-describedby="form_pinjaman_lainnya_bunga_margin"
                                    placeholder="Bunga/Margin (%)" />
                            </div>
                        </div>

                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label"
                                    for="form_pinjaman_lainnya_angsuran_per_bulan">Angsuran/Bulan</label>
                                <input type="text" class="form-control numeral-mask110"
                                    name="form_pinjaman_lainnya_angsuran_per_bulan"
                                    id="form_pinjaman_lainnya_angsuran_per_bulan"
                                    aria-describedby="form_pinjaman_lainnya_angsuran_per_bulan"
                                    placeholder="Angsuran/Bulan (Rp)" />
                            </div>
                        </div>

                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label" for="form_pinjaman_lainnya_agunan">Agunan</label>
                                <input type="text" class="form-control" name="form_pinjaman_lainnya_agunan"
                                    id="form_pinjaman_lainnya_agunan" aria-describedby="form_pinjaman_lainnya_agunan"
                                    placeholder="Agunan" />
                            </div>
                        </div>

                        <div class="col-md-2 col-12">
                            <div class="mb-1">
                                <label class="form-label"
                                    for="form_pinjaman_lainnya_kolektibilitas">Kolektibilitas</label>
                                <input type="text" class="form-control" name="form_pinjaman_lainnya_kolektibilitas"
                                    id="form_pinjaman_lainnya_kolektibilitas"
                                    aria-describedby="form_pinjaman_lainnya_kolektibilitas"
                                    placeholder="Kolektibilitas" />
                            </div>
                        </div>

                        <div class="col-md-1 col-12">
                            <div class="mb-1">
                                <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete
                                    type="button">
                                    <i data-feather="x" class="me-25"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div style="margin-bottom:8px;"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                        <i data-feather="plus" class="me-25"></i>
                        <span>Tambah</span>
                    </button>
                </div>
            </div>
            @endif
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

    <!-- Form Lampiran -->
    <div id="formLampiran" class="content" role="tabpanel" aria-labelledby="lampiran-trigger">
        <div class="content-header">
            <h4>
                Lampiran
            </h4>
            <small>Upload lampiran dengan format PDF</small>
            <hr />
        </div>
        {{-- @if ($pembiayaan->dilengkapi_ao == 'Telah dilengkapi')
            <br />
            <br />
            <center>
                <h3 class="text-success">Lampiran telah diupload <i data-feather="check-circle"
                        class="font-medium-3"></i>
                </h3>
            </center> --}}
        {{-- @else --}}
        <div class="row mt-2">
            <div class="mb-1 col-md-4">
                <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                    data-bs-target="#dokumenPemohon">
                    Dokumen Pemohon
                </button>
            </div>
            <div class="mb-1 col-md-4">
                <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                    data-bs-target="#dokumenWawancara">
                    Dokumen Hasil Wawancara
                </button>
            </div>
            <div class="mb-1 col-md-4">
                <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                    data-bs-target="#dokumenAgunan">
                    Dokumen Agunan
                </button>
            </div>
            <div class="mb-1 col-md-4">
                <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                    data-bs-target="#dokumenOtsAgunan">
                    Dokumen OTS Agunan
                </button>
            </div>
            <div class="mb-1 col-md-4">
                <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                    data-bs-target="#dokumenOtsTempatUsaha">
                    Dokumen OTS Tempat Usaha
                </button>
            </div>
            <div class="mb-1 col-md-4">
                <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                    data-bs-target="#dokumenAppraisalKjpp">
                    Dokumen Appraisal Agunan KJPP
                </button>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="mb-1 col-md-2">
                <label class="form-label" for="perbaruiLampiran">
                    Perbarui Lampiran
                </label>
                <select class="select2 w-100" name="perbarui_lampiran" id="perbaruiLampiran"
                    onChange="changePerbaruiLampiran()">
                    <option value="Ya">Ya</option>
                    <option value="Tidak" selected>Tidak
                    </option>
                </select>
            </div>
        </div>
        <div class="row hide" id="ifPerbaruiLampiran">
            <div class="mb-1 col-md-6">
                <label class="form-label" for="dokumen_pemohon"><small class="text-danger">*
                    </small>Upload Dokumen Pemohon
                </label>
                <input type="file" name="dokumen_pemohon" id="dokumenPemohon" class="form-control" required />
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="dokumen_agunan"><small class="text-danger">*
                    </small>Upload Dokumen Agunan</label>
                <input type="file" name="dokumen_agunan" id="dokumenAgunan" class="form-control" required />
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="ots_agunan"><small class="text-danger">*
                    </small>Upload OTS Agunan
                </label>
                <input type="file" name="ots_agunan" id="otsAgunan" class="form-control" required />
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="ots_tempat_usaha"><small class="text-danger">*
                    </small>Upload OTS Tempat
                    Usaha </label>
                <input type="file" name="ots_tempat_usaha" id="otsTempatUsaha" class="form-control" required />
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="hasil_wawancara"><small class="text-danger">*
                    </small>Upload Hasil Wawancara
                </label>
                <input type="file" name="hasil_wawancara" id="hasilWawancara" class="form-control" required />
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="appraisal_kjpp"><small class="text-danger">*
                    </small>Upload Appraisal KJPP
                </label>
                <input type="file" name="appraisal_kjpp" id="appraisalKjpp" class="form-control" required />
            </div>
        </div>
        <div>

            <!-- Modal Lampiran -->

            <!-- Dokumen Pemohon -->
            <div class="modal fade" id="dokumenPemohon" tabindex="-1" aria-labelledby="addNewCardTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-sm-5 mx-50 pb-5">
                            <h4 class="text-center mb-1" style="margin-top:-40px;">
                                <strong>Dokumen Pemohon</strong>
                            </h4>
                            <iframe src="{{ asset('storage/' . $lampiran->dokumen_pemohon) }}" class="d-block w-100"
                                height="600"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Dokumen Pemohon  -->

            <!-- Dokumen Hasil Wawancara -->
            <div class="modal fade" id="dokumenWawancara" tabindex="-1" aria-labelledby="addNewCardTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-sm-5 mx-50 pb-5">
                            <h4 class="text-center mb-1" style="margin-top:-40px;">
                                <strong>Dokumen Hasil Wawancara</strong>
                            </h4>
                            <iframe src="{{ asset('storage/' . $lampiran->hasil_wawancara) }}" class="d-block w-100"
                                height="600"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Dokumen Hasil Wawancara  -->

            <!-- Dokumen Agunan -->
            <div class="modal fade" id="dokumenAgunan" tabindex="-1" aria-labelledby="addNewCardTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-sm-5 mx-50 pb-5">
                            <h4 class="text-center mb-1" style="margin-top:-40px;">
                                <strong>Dokumen Agunan</strong>
                            </h4>
                            <iframe src="{{ asset('storage/' . $lampiran->dokumen_agunan) }}" class="d-block w-100"
                                height="600"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Dokumen Agunan  -->

            <!-- Dokumen OTS Agunan -->
            <div class="modal fade" id="dokumenOtsAgunan" tabindex="-1" aria-labelledby="addNewCardTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-sm-5 mx-50 pb-5">
                            <h4 class="text-center mb-1" style="margin-top:-40px;">
                                <strong>Dokumen OTS Agunan</strong>
                            </h4>
                            <iframe src="{{ asset('storage/' . $lampiran->ots_agunan) }}" class="d-block w-100"
                                height="600"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Dokumen OTS Agunan  -->

            <!-- Dokumen OTS Tempat Usaha -->
            <div class="modal fade" id="dokumenOtsTempatUsaha" tabindex="-1" aria-labelledby="addNewCardTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-sm-5 mx-50 pb-5">
                            <h4 class="text-center mb-1" style="margin-top:-40px;">
                                <strong>Dokumen OTS Tempat Usaha</strong>
                            </h4>
                            <iframe src="{{ asset('storage/' . $lampiran->ots_tempat_usaha) }}" class="d-block w-100"
                                height="600"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Dokumen OTS Tempat Usaha  -->

            <!-- Dokumen Appraisal Agunan KJPP -->
            <div class="modal fade" id="dokumenAppraisalKjpp" tabindex="-1" aria-labelledby="addNewCardTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-sm-5 mx-50 pb-5">
                            <h4 class="text-center mb-1" style="margin-top:-40px;">
                                <strong>Dokumen Appraisal Agunan KJPP</strong>
                            </h4>
                            <iframe src="{{ asset('storage/' . $lampiran->appraisal_kjpp) }}" class="d-block w-100"
                                height="600"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Dokumen Appraisal Agunan KJPP  -->

            <!-- /Modal Lampiran -->

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
    <!-- Form Persyaratan Kelengkapan -->
    <div id="formInfo" class="content" role="tabpanel" aria-labelledby="info-trigger">
        <div class="content-header">
            <h4>Persyaratan Kelengkapan</h4>
            <hr />
            <h5>Kelengkapan hardcopy dokumen yang harus dilampirkan untuk mempercepat
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
                            Foto Copy identitas (KTP) atas nama pemohon dan istri/suami
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
                            Foto Copy Surat Nikah (bagi pemohon yang telah menikah)
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
                            Foto Copy Surat Cerai (bagi pemohon yang telah bercerai)
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
                            Foto Copy NPWP a.n. Pemohon (bagi pemohon dengan nilai
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
                            Surat Rekomendasi dari Pimpinan Instansi/Perusahaan
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
                            Foto Copy Rekening Koran Tabungan dan/ Giro a.n. pemohon
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
                            Foto Copy Akta Perusahaan (Pendirian berikut perubahannya),
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
                            Foto Copy Laporan Keuangan (Neraca dan Laba Rugi) tahun
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
                            Foto Copy Rekening Giro a.n. Perusahaan minimal selama 6
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
                            Dokumen Kepemilikan Agunan (Foto Copy Sertifikat Tanah dan
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
                            Hasil Penilaian Agunan oleh Appraisal Independent (untuk
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
            <button class="btn btn-primary btn-prev" type="button">
                <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                <span class="align-middle d-sm-inline-block d-none">Previous</span>
            </button>
            @if ($pembiayaan->dilengkapi_ao != 'Telah dilengkapi')
                <button class="btn btn-success">Submit</button>
            @endif
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
                <div class="bs-stepper-header" role="tablist">
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
                                aria-controls="formCheckListDokumenCalonNasabahFixedIncome" aria-selected="true">
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
                                aria-controls="formCheckListDokumenCalonNasabahNonFixedIncome" aria-selected="true">
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

                        <div class="step" href="#formCheckListDokumenCalonNasabahAgunan" data-bs-toggle="tab"
                            role="tab" id="formCheckListDokumenCalonNasabahAgunan-tab-justified"
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
                            <div class="step" href="#formAbilityToRepayNonFixedIncome" data-bs-toggle="tab"
                                role="tab" id="formAbilityToRepayNonFixedIncome-tab-justified"
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

                        <div class="step" href="#formPemberkasanMemo" data-bs-toggle="tab" role="tab"
                            id="formPemberkasanMemo-tab-justified" aria-controls="formPemberkasanMemo"
                            aria-selected="true">
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
                    <form action="/ppr/revisi/{{ $pembiayaan->id }}" class="needs-validation" method="POST"
                        enctype="multipart/form-data" novalidate>
                        @method('PUT')
                        @csrf
                        @if ($pembiayaan->dilengkapi_ao == 'Telah dilengkapi')
                            <input type="hidden" name="dilengkapi_ao" value="Telah dilengkapi" />
                            <input type="hidden" name="form_cl" value="Telah diisi" />
                        @elseif ($pembiayaan->form_score == 'Telah dinilai')
                            <input type="hidden" name="dilengkapi_ao" value="Telah dilengkapi" />
                            <input type="hidden" name="form_score" value="Telah dinilai" />
                        @else
                            <input type="hidden" name="dilengkapi_ao" value="Telah dilengkapi" />
                            <input type="hidden" name="form_cl" value="Telah diisi" />
                        @endif
                        {{-- <input type="hidden" name="form_cl" value="{{ request('form_cl')}}" /> --}}
                        <!-- Form Check List Persyaratan -->
                        <div id="formCheckListPersyaratan" class="content active" id="formCheckListPersyaratan"
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
                                                <center><input type="radio" name="wni" value="Ada"
                                                        class="form-check-input"
                                                        {{ $dokumen->clPersyaratan->wni == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="wni" value="Tidak"
                                                        class="form-check-input"
                                                        {{ $dokumen->clPersyaratan->wni == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                <center><input type="radio" name="usia_cukup" value="Ada"
                                                        class="form-check-input"
                                                        {{ $dokumen->clPersyaratan->usia_cukup == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="usia_cukup" value="Tidak"
                                                        class="form-check-input"
                                                        {{ $dokumen->clPersyaratan->usia_cukup == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                <center><input type="radio" name="tidak_melebihi_batas_usia"
                                                        value="Ada" class="form-check-input"
                                                        {{ $dokumen->clPersyaratan->tidak_melebihi_batas_usia == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="tidak_melebihi_batas_usia"
                                                        value="Tidak" class="form-check-input"
                                                        {{ $dokumen->clPersyaratan->tidak_melebihi_batas_usia == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                        value="Ada" class="form-check-input"
                                                        {{ $dokumen->clPersyaratan->penghasilan_menjamin == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="penghasilan_menjamin"
                                                        value="Tidak" class="form-check-input"
                                                        {{ $dokumen->clPersyaratan->penghasilan_menjamin == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                <center><input type="radio" name="masa_kerja" value="Ada"
                                                        class="form-check-input"
                                                        {{ $dokumen->clPersyaratan->masa_kerja == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="masa_kerja" value="Tidak"
                                                        class="form-check-input"
                                                        {{ $dokumen->clPersyaratan->masa_kerja == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                <center><input type="radio" name="kol_lancar" value="Ada"
                                                        class="form-check-input"
                                                        {{ $dokumen->clPersyaratan->kol_lancar == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="kol_lancar" value="Tidak"
                                                        class="form-check-input"
                                                        {{ $dokumen->clPersyaratan->kol_lancar == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                <center><input type="radio" name="kol_kesanggupan" value="Ada"
                                                        class="form-check-input"
                                                        {{ $dokumen->clPersyaratan->kol_kesanggupan == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="kol_kesanggupan" value="Tidak"
                                                        class="form-check-input"
                                                        {{ $dokumen->clPersyaratan->kol_kesanggupan == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                <center><input type="radio" name="menyampaikan_npwp" value="Ada"
                                                        class="form-check-input"
                                                        {{ $dokumen->clPersyaratan->menyampaikan_npwp == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="menyampaikan_npwp" value="Tidak"
                                                        class="form-check-input"
                                                        {{ $dokumen->clPersyaratan->menyampaikan_npwp == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                            <div id="formCheckListDokumenCalonNasabahFixedIncome" class="content" role="tabpanel"
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
                                                            value="Ada" class="form-check-input"
                                                            {{ $dokFixedIncome->aplikasi_permohonan == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="aplikasi_permohonan"
                                                            value="Tidak" class="form-check-input"
                                                            {{ $dokFixedIncome->aplikasi_permohonan == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                                    <center><input type="radio" name="copy_ktp" value="Ada"
                                                            class="form-check-input"
                                                            {{ $dokFixedIncome->copy_ktp == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="copy_ktp" value="Tidak"
                                                            class="form-check-input"
                                                            {{ $dokFixedIncome->copy_ktp == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                                    <center><input type="radio" name="copy_kk" value="Ada"
                                                            class="form-check-input"
                                                            {{ $dokFixedIncome->copy_kk == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="copy_kk" value="Tidak"
                                                            class="form-check-input"
                                                            {{ $dokFixedIncome->copy_kk == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                                    <center><input type="radio" name="copy_sn_sc" value="Ada"
                                                            class="form-check-input"
                                                            {{ $dokFixedIncome->copy_sn_sc == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="copy_sn_sc" value="Tidak"
                                                            class="form-check-input"
                                                            {{ $dokFixedIncome->copy_sn_sc == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                                            value="Ada" class="form-check-input"
                                                            {{ $dokFixedIncome->pasphoto_ktp_sn == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="pasphoto_ktp_sn"
                                                            value="Tidak" class="form-check-input"
                                                            {{ $dokFixedIncome->pasphoto_ktp_sn == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                                    <center><input type="radio" name="copy_slip_gaji" value="Ada"
                                                            class="form-check-input"
                                                            {{ $dokFixedIncome->copy_slip_gaji == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="copy_slip_gaji" value="Tidak"
                                                            class="form-check-input"
                                                            {{ $dokFixedIncome->copy_slip_gaji == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                                    <center><input type="radio" name="copy_tabungan" value="Ada"
                                                            class="form-check-input"
                                                            {{ $dokFixedIncome->copy_tabungan == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="copy_tabungan" value="Tidak"
                                                            class="form-check-input"
                                                            {{ $dokFixedIncome->copy_tabungan == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                                    <center><input type="radio" name="copy_sk" value="Ada"
                                                            class="form-check-input"
                                                            {{ $dokFixedIncome->copy_sk == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="copy_sk" value="Tidak"
                                                            class="form-check-input"
                                                            {{ $dokFixedIncome->copy_sk == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                                            value="Ada" class="form-check-input"
                                                            {{ $dokFixedIncome->sk_pemotongan_gaji == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="sk_pemotongan_gaji"
                                                            value="Tidak" class="form-check-input"
                                                            {{ $dokFixedIncome->sk_pemotongan_gaji == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                                    <center><input type="radio" name="npwp" value="Ada"
                                                            class="form-check-input"
                                                            {{ $dokFixedIncome->npwp == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="npwp" value="Tidak"
                                                            class="form-check-input"
                                                            {{ $dokFixedIncome->npwp == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>
                        @else
                            <!-- Form Check List Dokumen Calon Nasabah Non Fixed Income -->
                            <div id="formCheckListDokumenCalonNasabahNonFixedIncome" class="content" role="tabpanel"
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
                                                            value="Ada" class="form-check-input"
                                                            {{ $dokNonFixedIncome->aplikasi_permohonan == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="aplikasi_permohonan"
                                                            value="Tidak" class="form-check-input"
                                                            {{ $dokNonFixedIncome->aplikasi_permohonan == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                                    <center><input type="radio" name="copy_ktp" value="Ada"
                                                            class="form-check-input"
                                                            {{ $dokNonFixedIncome->copy_ktp == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="copy_ktp" value="Tidak"
                                                            class="form-check-input"
                                                            {{ $dokNonFixedIncome->copy_ktp == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                                    <center><input type="radio" name="copy_kk" value="Ada"
                                                            class="form-check-input"
                                                            {{ $dokNonFixedIncome->copy_kk == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="copy_kk" value="Tidak"
                                                            class="form-check-input"
                                                            {{ $dokNonFixedIncome->copy_kk == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                                    <center><input type="radio" name="copy_sn_sc" value="Ada"
                                                            class="form-check-input"
                                                            {{ $dokNonFixedIncome->copy_sn_sc == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="copy_sn_sc" value="Tidak"
                                                            class="form-check-input"
                                                            {{ $dokNonFixedIncome->copy_sn_sc == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                                    <center><input type="radio" name="foto_pemohon_pasangan"
                                                            value="Ada" class="form-check-input"
                                                            {{ $dokNonFixedIncome->foto_pemohon_pasangan == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="foto_pemohon_pasangan"
                                                            value="Tidak" class="form-check-input"
                                                            {{ $dokNonFixedIncome->foto_pemohon_pasangan == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                                    <center><input type="radio" name="sk_penghasilan" value="Ada"
                                                            class="form-check-input"
                                                            {{ $dokNonFixedIncome->sk_penghasilan == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="sk_penghasilan" value="Tidak"
                                                            class="form-check-input"
                                                            {{ $dokNonFixedIncome->sk_penghasilan == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                                    <center><input type="radio" name="copy_tabungan_menyimpan"
                                                            value="Ada" class="form-check-input"
                                                            {{ $dokNonFixedIncome->copy_tabungan_menyimpan == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="copy_tabungan_menyimpan"
                                                            value="Tidak" class="form-check-input"
                                                            {{ $dokNonFixedIncome->copy_tabungan_menyimpan == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                                    <center><input type="radio" name="copy_akta_izin_usaha"
                                                            value="Ada" class="form-check-input"
                                                            {{ $dokNonFixedIncome->copy_akta_izin_usaha == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="copy_akta_izin_usaha"
                                                            value="Tidak" class="form-check-input"
                                                            {{ $dokNonFixedIncome->copy_akta_izin_usaha == 'Tidak' ? 'checked' : '' }}
                                                            required />
                                                    </center>
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
                                                    <center><input type="radio" name="copy_tabungan_mengambil"
                                                            value="Ada" class="form-check-input"
                                                            {{ $dokNonFixedIncome->copy_tabungan_mengambil == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="copy_tabungan_mengambil"
                                                            value="Tidak" class="form-check-input"
                                                            {{ $dokNonFixedIncome->copy_tabungan_mengambil == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                                    <center><input type="radio" name="npwp_bukti_pp" value="Ada"
                                                            class="form-check-input"
                                                            {{ $dokNonFixedIncome->npwp_bukti_pp == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="npwp_bukti_pp" value="Tidak"
                                                            class="form-check-input"
                                                            {{ $dokNonFixedIncome->npwp_bukti_pp == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                                    <center><input type="radio" name="laporan_keuangan_perusahaan"
                                                            value="Ada" class="form-check-input"
                                                            {{ $dokNonFixedIncome->laporan_keuangan_perusahaan == 'Ada' ? 'checked' : '' }}
                                                            required />
                                                    </center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <center><input type="radio" name="laporan_keuangan_perusahaan"
                                                            value="Tidak" class="form-check-input"
                                                            {{ $dokNonFixedIncome->laporan_keuangan_perusahaan == 'Tidak' ? 'checked' : '' }}
                                                            required />
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
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
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
                                                <center><input type="radio" name="copy_shgb_shm" value="Ada"
                                                        class="form-check-input"
                                                        {{ $dokumen->dokAgunan->copy_shgb_shm == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="copy_shgb_shm" value="Tidak"
                                                        class="form-check-input"
                                                        {{ $dokumen->dokAgunan->copy_shgb_shm == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                <center><input type="radio" name="copy_shgb_proses" value="Ada"
                                                        class="form-check-input"
                                                        {{ $dokumen->dokAgunan->copy_shgb_proses == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="copy_shgb_proses" value="Tidak"
                                                        class="form-check-input"
                                                        {{ $dokumen->dokAgunan->copy_shgb_proses == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                <center><input type="radio" name="copy_imb" value="Ada"
                                                        class="form-check-input"
                                                        {{ $dokumen->dokAgunan->copy_imb == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="copy_imb" value="Tidak"
                                                        class="form-check-input"
                                                        {{ $dokumen->dokAgunan->copy_imb == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                <center><input type="radio" name="copy_imb_proses" value="Ada"
                                                        class="form-check-input"
                                                        {{ $dokumen->dokAgunan->copy_imb_proses == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="copy_imb_proses" value="Tidak"
                                                        class="form-check-input"
                                                        {{ $dokumen->dokAgunan->copy_imb_proses == 'Tidak' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
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
                                                        class="form-control numeral-mask29" name="gaji1_gaji_kotor"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Gaji 1"
                                                        value="{{ $dokumen->AtrFixedIncome->gaji1_gaji_kotor }}"
                                                        required />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="gajiKotor2"
                                                        class="form-control numeral-mask30" name="gaji2_gaji_kotor"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Gaji 2"
                                                        value="{{ $dokumen->AtrFixedIncome->gaji2_gaji_kotor }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="gajiKotorP"
                                                        class="form-control numeral-mask31"
                                                        name="gaji_pasangan_gaji_kotor" onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Gaji Suami/Istri"
                                                        value="{{ $dokumen->AtrFixedIncome->gaji_pasangan_gaji_kotor }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    1. Potongan THT
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="thtGaji1"
                                                        class="form-control numeral-mask32" name="gaji1_potongan_tht"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Potongan THT"
                                                        value="{{ $dokumen->AtrFixedIncome->gaji1_potongan_tht }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="thtGaji2"
                                                        class="form-control numeral-mask33" name="gaji2_potongan_tht"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Potongan THT"
                                                        value="{{ $dokumen->AtrFixedIncome->gaji2_potongan_tht }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="thtGajiP"
                                                        class="form-control numeral-mask34"
                                                        name="gaji_pasangan_potongan_tht"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Potongan THT"
                                                        value="{{ $dokumen->AtrFixedIncome->gaji_pasangan_potongan_tht }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    2. Potongan Jamsostek
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="jamsostekGaji1"
                                                        class="form-control numeral-mask35"
                                                        name="gaji1_potongan_jamsostek" onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Potongan Jamsostek"
                                                        value="{{ $dokumen->AtrFixedIncome->gaji1_potongan_jamsostek }}" />
                                                </td>
                                                <td
                                                    style="vertical-align:
                                                                    middle;">
                                                    <input type="text" id="jamsostekGaji2"
                                                        class="form-control numeral-mask36"
                                                        name="gaji2_potongan_jamsostek" onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Potongan Jamsostek"
                                                        value="{{ $dokumen->AtrFixedIncome->gaji2_potongan_jamsostek }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="jamsostekGajiP"
                                                        class="form-control numeral-mask37"
                                                        name="gaji_pasangan_potongan_jamsostek"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Potongan Jamsostek"
                                                        value="{{ $dokumen->AtrFixedIncome->gaji_pasangan_potongan_jamsostek }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    3. Potongan Koperasi Perusahaan
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="koperasiGaji1"
                                                        class="form-control numeral-mask38"
                                                        name="gaji1_potongan_koperasi" onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Potongan Koperasi"
                                                        value="{{ $dokumen->AtrFixedIncome->gaji1_potongan_koperasi }}" />
                                                </td>
                                                <td
                                                    style="vertical-align:
                                                                    middle;">
                                                    <input type="text" id="koperasiGaji2"
                                                        class="form-control numeral-mask39"
                                                        name="gaji2_potongan_koperasi" onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Potongan Koperasi"
                                                        value="{{ $dokumen->AtrFixedIncome->gaji2_potongan_koperasi }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="koperasiGajiP"
                                                        class="form-control numeral-mask40"
                                                        name="gaji_pasangan_potongan_koperasi"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Potongan Koperasi"
                                                        value="{{ $dokumen->AtrFixedIncome->gaji_pasangan_potongan_koperasi }}" />
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    4. Potongan lain-lain
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="lainGaji1"
                                                        class="form-control numeral-mask41" name="gaji1_potongan_lain"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Potongan lain-lain"
                                                        value="{{ $dokumen->AtrFixedIncome->gaji1_potongan_lain }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="lainGaji2"
                                                        class="form-control numeral-mask42" name="gaji2_potongan_lain"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Potongan lain-lain"
                                                        value="{{ $dokumen->AtrFixedIncome->gaji2_potongan_lain }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="lainGajiP"
                                                        class="form-control numeral-mask43"
                                                        name="gaji_pasangan_potongan_lain"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Potongan lain-lain"
                                                        value="{{ $dokumen->AtrFixedIncome->gaji_pasangan_potongan_lain }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <b>Gaji Bersih Calon Nasabah</b>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="gajiBersih1Dummy" class="form-control"
                                                        placeholder="Gaji Bersih 1" disabled
                                                        value="{{ $dokumen->AtrFixedIncome->gaji1_gaji_bersih }}" />
                                                    <input type="hidden" id="gajiBersih1" name="gaji1_gaji_bersih"
                                                        value="{{ $dokumen->AtrFixedIncome->gaji1_gaji_bersih }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="gajiBersih2Dummy" class="form-control"
                                                        placeholder="Gaji Bersih 2" disabled
                                                        value="{{ $dokumen->AtrFixedIncome->gaji2_gaji_bersih }}" />
                                                    <input type="hidden" id="gajiBersih2" name="gaji2_gaji_bersih"
                                                        value="{{ $dokumen->AtrFixedIncome->gaji2_gaji_bersih }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="gajiBersihPDummy" class="form-control"
                                                        placeholder="Gaji Bersih Suami/Istri" disabled
                                                        value="{{ $dokumen->AtrFixedIncome->gaji_pasangan_gaji_bersih }}" />
                                                    <input type="hidden" id="gajiBersihP"
                                                        name="gaji_pasangan_gaji_bersih"
                                                        value="{{ $dokumen->AtrFixedIncome->gaji_pasangan_gaji_bersih }}" />
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
                                                        class="form-control numeral-mask44" name="angsuran_rumah"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Angsuran Pembiayaan Rumah"
                                                        value="{{ $dokumen->AtrFixedIncome->angsuran_rumah }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    2. Angsuran Pembiayaan Mobil
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="angsuranMobil"
                                                        class="form-control numeral-mask45" name="angsuran_mobil"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Angsuran Pembiayaan Mobil"
                                                        value="{{ $dokumen->AtrFixedIncome->angsuran_mobil }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    3. Angsuran Pembiayaan Lainnya
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="angsuranLainnya"
                                                        class="form-control numeral-mask46" name="angsuran_lain"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Angsuran Pembiayaan Lainnya"
                                                        value="{{ $dokumen->AtrFixedIncome->angsuran_lain }}" />
                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <b>Total Pembayaran Kewajiban Rutin Per
                                                        Bulan</b>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="totalKewajibanRutinDummy"
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrFixedIncome->total_angsuran }}" />
                                                    <input type="hidden" id="totalKewajibanRutin"
                                                        name="total_angsuran"
                                                        value="{{ $dokumen->AtrFixedIncome->total_angsuran }}" />
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
                                                        class="form-control numeral-mask47" name="biaya_pangan"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Biaya Pangan"
                                                        value="{{ $dokumen->AtrFixedIncome->biaya_pangan }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    2. Biaya Sandang
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaSandang"
                                                        class="form-control numeral-mask48" name="biaya_sandang"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Biaya Sandang"
                                                        value="{{ $dokumen->AtrFixedIncome->biaya_sandang }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    3. Biaya Transportasi
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaTransportasi"
                                                        class="form-control numeral-mask49" name="biaya_transportasi"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Biaya Transportasi"
                                                        value="{{ $dokumen->AtrFixedIncome->biaya_transportasi }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    4. Biaya Listrik
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaListrik"
                                                        class="form-control numeral-mask50" name="biaya_listrik"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Biaya Listrik"
                                                        value="{{ $dokumen->AtrFixedIncome->biaya_listrik }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    5. Biaya Telepon
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaTelepon"
                                                        class="form-control numeral-mask51" name="biaya_telepon"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Biaya Telepon"
                                                        value="{{ $dokumen->AtrFixedIncome->biaya_telepon }}" />
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
                                                        placeholder="Biaya Gas"
                                                        value="{{ $dokumen->AtrFixedIncome->biaya_gas }}" />
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
                                                        placeholder="Biaya Air"
                                                        value="{{ $dokumen->AtrFixedIncome->biaya_air }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    8. Biaya Pendidikan
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaPendidikan"
                                                        class="form-control numeral-mask54" name="biaya_pendidikan"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Biaya Pendidikan"
                                                        value="{{ $dokumen->AtrFixedIncome->biaya_pendidikan }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    9. Biaya Kesehatan
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaKesehatan"
                                                        class="form-control numeral-mask55" name="biaya_kesehatan"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Biaya Kesehatan"
                                                        value="{{ $dokumen->AtrFixedIncome->biaya_kesehatan }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    10. Biaya Lain-lain
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaLain"
                                                        class="form-control numeral-mask56" name="biaya_lain"
                                                        onkeyup="sumFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        placeholder="Biaya Lain-lain"
                                                        value="{{ $dokumen->AtrFixedIncome->biaya_lain }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <b>Total Biaya Hidup Per Bulan</b>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="totalBiayaHidupDummy"
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrFixedIncome->total_biaya_per_bulan }}" />
                                                    <input type="hidden" id="totalBiayaHidup"
                                                        name="total_biaya_per_bulan"
                                                        value="{{ $dokumen->AtrFixedIncome->total_biaya_per_bulan }}" />
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
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrFixedIncome->total_penghasilan_bersih_per_bulan }}" />
                                                    <input type="hidden" id="totalPenghasilanBersih"
                                                        name="total_penghasilan_bersih_per_bulan"
                                                        value="{{ $dokumen->AtrFixedIncome->total_penghasilan_bersih_per_bulan }}" />
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
                                                        class="form-control numeral-mask57" name="usaha1_penjualan"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_penjualan }}"
                                                        required />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="penjualanNF2"
                                                        class="form-control numeral-mask58" name="usaha2_penjualan"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_penjualan }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="penjualanNFP"
                                                        class="form-control numeral-mask59"
                                                        name="usaha_pasangan_penjualan" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_penjualan }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    2. Potongan Harga/Diskon
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="diskonNF1"
                                                        class="form-control numeral-mask60" name="usaha1_diskon"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_diskon }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="diskonNF2"
                                                        class="form-control numeral-mask61" name="usaha2_diskon"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_diskon }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="diskonNFP"
                                                        class="form-control numeral-mask62" name="usaha_pasangan_diskon"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_diskon }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    3. Retur Penjualan
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="returNF1"
                                                        class="form-control numeral-mask63" name="usaha1_retur"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_retur }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="returNF2"
                                                        class="form-control numeral-mask64" name="usaha2_retur"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_retur }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="returNFP"
                                                        class="form-control numeral-mask65" name="usaha_pasangan_retur"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_retur }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <b>Penjualan Bersih</b>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="penjualanBersihNF1Dummy"
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_penjualan_bersih }}" />
                                                    <input type="hidden" id="penjualanBersihNF1" class="form-control"
                                                        name="usaha1_penjualan_bersih"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_penjualan_bersih }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="penjualanBersihNF2Dummy"
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_penjualan_bersih }}" />
                                                    <input type="hidden" id="penjualanBersihNF2" class="form-control"
                                                        name="usaha2_penjualan_bersih"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_penjualan_bersih }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="penjualanBersihNFPDummy"
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_penjualan_bersih }}" />
                                                    <input type="hidden" id="penjualanBersihNFP" class="form-control"
                                                        name="usaha_pasangan_penjualan_bersih"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_penjualan_bersih }}" />
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
                                                        name="usaha1_persediaan_barang_langsung" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_persediaan_barang_langsung }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="persediaanBarangNF2"
                                                        class="form-control numeral-mask67"
                                                        name="usaha2_persediaan_barang_langsung" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_persediaan_barang_langsung }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="persediaanBarangNFP"
                                                        class="form-control numeral-mask68"
                                                        name="usaha_pasangan_persediaan_barang_langsung"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_persediaan_barang_langsung }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    2. Pembelian Bahan Langsung
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="pembelianBahanNF1"
                                                        class="form-control numeral-mask69"
                                                        name="usaha1_pembelian_bahan_langsung" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_pembelian_bahan_langsung }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="pembelianBahanNF2"
                                                        class="form-control numeral-mask70"
                                                        name="usaha2_pembelian_bahan_langsung" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_pembelian_bahan_langsung }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="pembelianBahanNFP"
                                                        class="form-control numeral-mask71"
                                                        name="usaha_pasangan_pembelian_bahan_langsung"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_pembelian_bahan_langsung }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    3. Upah Langsung
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="upahLangsungNF1"
                                                        class="form-control numeral-mask72" name="usaha1_upah_langsung"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_upah_langsung }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="upahLangsungNF2"
                                                        class="form-control numeral-mask73" name="usaha2_upah_langsung"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_upah_langsung }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="upahLangsungNFP"
                                                        class="form-control numeral-mask74"
                                                        name="usaha_pasangan_upah_langsung" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_upah_langsung }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    Biaya Over Head
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="totalBohNF1Dummy" class="form-control"
                                                        placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_total_boh }}" />
                                                    <input type="hidden" id="totalBohNF1" class="form-control"
                                                        name="usaha1_total_boh"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_total_boh }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="totalBohNF2Dummy" class="form-control"
                                                        placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_total_boh }}" />
                                                    <input type="hidden" id="totalBohNF2" class="form-control"
                                                        name="usaha2_total_boh"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_total_boh }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="totalBohNFPDummy" class="form-control"
                                                        placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_total_boh }}" />
                                                    <input type="hidden" id="totalBohNFP" class="form-control"
                                                        name="usaha_pasangan_total_boh"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_total_boh }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    &ensp; a. Upah Tenaga Kerja Tidak Langsung
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="upahTidakLangsungNF1"
                                                        class="form-control numeral-mask75"
                                                        name="usaha1_upah_tidak_langsung" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_upah_tidak_langsung }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="upahTidakLangsungNF2"
                                                        class="form-control numeral-mask76"
                                                        name="usaha2_upah_tidak_langsung" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_upah_tidak_langsung }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="upahTidakLangsungNFP"
                                                        class="form-control numeral-mask77"
                                                        name="usaha_pasangan_upah_tidak_langsung"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_upah_tidak_langsung }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    &ensp; b. Biaya Penyusutan
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="penyusutanNF1"
                                                        class="form-control numeral-mask78"
                                                        name="usaha1_biaya_penyusutan" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_biaya_penyusutan }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="penyusutanNF2"
                                                        class="form-control numeral-mask79"
                                                        name="usaha2_biaya_penyusutan" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_biaya_penyusutan }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="penyusutanNFP"
                                                        class="form-control numeral-mask80"
                                                        name="usaha_pasangan_biaya_penyusutan" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_biaya_penyusutan }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    &ensp; c. BOH lain-lain
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="bohLainNF1"
                                                        class="form-control numeral-mask81" name="usaha1_boh_lain"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_boh_lain }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="bohLainNF2"
                                                        class="form-control numeral-mask82" name="usaha2_boh_lain"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_boh_lain }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="bohLainNFP"
                                                        class="form-control numeral-mask83"
                                                        name="usaha_pasangan_boh_lain" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_boh_lain }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <b>Jumlah Harga Pokok Penjualan</b>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="jmlHargaPokokPenjualanNF1Dummy"
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_jumlah_harga_pokok_penjualan }}" />
                                                    <input type="hidden" id="jmlHargaPokokPenjualanNF1"
                                                        class="form-control" name="usaha1_jumlah_harga_pokok_penjualan"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_jumlah_harga_pokok_penjualan }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="jmlHargaPokokPenjualanNF2Dummy"
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_jumlah_harga_pokok_penjualan }}" />
                                                    <input type="hidden" id="jmlHargaPokokPenjualanNF2"
                                                        class="form-control" name="usaha2_jumlah_harga_pokok_penjualan"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_jumlah_harga_pokok_penjualan }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="jmlHargaPokokPenjualanNFPDummy"
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_jumlah_harga_pokok_penjualan }}" />
                                                    <input type="hidden" id="jmlHargaPokokPenjualanNFP"
                                                        class="form-control"
                                                        name="usaha_pasangan_jumlah_harga_pokok_penjualan"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_jumlah_harga_pokok_penjualan }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <b>Laba Kotor</b>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="labaKotorNF1Dummy" class="form-control"
                                                        placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_laba_kotor }}" />
                                                    <input type="hidden" id="labaKotorNF1" class="form-control"
                                                        name="usaha1_laba_kotor"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_laba_kotor }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="labaKotorNF2Dummy" class="form-control"
                                                        placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_laba_kotor }}" />
                                                    <input type="hidden" id="labaKotorNF2" class="form-control"
                                                        name="usaha2_laba_kotor"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_laba_kotor }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="labaKotorNFPDummy" class="form-control"
                                                        placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_laba_kotor }}" />
                                                    <input type="hidden" id="labaKotorNFP" class="form-control"
                                                        name="usaha_pasangan_laba_kotor"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_laba_kotor }}" />
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
                                                        name="usaha1_biaya_penjualan" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_biaya_penjualan }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaPenjualanNF2"
                                                        class="form-control numeral-mask85"
                                                        name="usaha2_biaya_penjualan" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_biaya_penjualan }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaPenjualanNFP"
                                                        class="form-control numeral-mask86"
                                                        name="usaha_pasangan_biaya_penjualan" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_biaya_penjualan }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    2. Biaya Gaji Komisaris, Direksi & Staff
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaGajiKomisarisDireksiStaffNF1"
                                                        class="form-control numeral-mask87" name="usaha1_biaya_gaji_kds"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_biaya_gaji_kds }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaGajiKomisarisDireksiStaffNF2"
                                                        class="form-control numeral-mask88" name="usaha2_biaya_gaji_kds"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_biaya_gaji_kds }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaGajiKomisarisDireksiStaffNFP"
                                                        class="form-control numeral-mask89"
                                                        name="usaha_pasangan_biaya_gaji_kds" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_biaya_gaji_kds }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    3. Biaya Listrik, Telepon, Air
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaListrikTeleponAirNF1"
                                                        class="form-control numeral-mask90"
                                                        name="usaha1_biaya_lisrik_telp_air" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_biaya_lisrik_telp_air }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaListrikTeleponAirNF2"
                                                        class="form-control numeral-mask91"
                                                        name="usaha2_biaya_lisrik_telp_air" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_biaya_lisrik_telp_air }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaListrikTeleponAirNFP"
                                                        class="form-control numeral-mask92"
                                                        name="usaha_pasangan_biaya_lisrik_telp_air"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_biaya_lisrik_telp_air }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    4. Biaya Perawatan Gedung
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaPerawatanGedungNF1"
                                                        class="form-control numeral-mask93"
                                                        name="usaha1_biaya_perawatan_gedung" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_biaya_perawatan_gedung }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaPerawatanGedungNF2"
                                                        class="form-control numeral-mask94"
                                                        name="usaha2_biaya_perawatan_gedung" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_biaya_perawatan_gedung }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaPerawatanGedungNFP"
                                                        class="form-control numeral-mask95"
                                                        name="usaha_pasangan_biaya_perawatan_gedung"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_biaya_perawatan_gedung }}" />
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
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_biaya_bagi_hasil_sewa_margin }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaBagiHasilSewaMarginNF2"
                                                        class="form-control numeral-mask97"
                                                        name="usaha2_biaya_bagi_hasil_sewa_margin"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_biaya_bagi_hasil_sewa_margin }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaBagiHasilSewaMarginNFP"
                                                        class="form-control numeral-mask98"
                                                        name="usaha_pasangan_biaya_bagi_hasil_sewa_margin"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_biaya_bagi_hasil_sewa_margin }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    6. Biaya Administrasi lain-lain
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaAdmLainNF1"
                                                        class="form-control numeral-mask99" name="usaha1_jml_biaya_adm"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_jml_biaya_adm }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaAdmLainNF2"
                                                        class="form-control numeral-mask100" name="usaha2_jml_biaya_adm"
                                                        placeholder="Sub Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_jml_biaya_adm }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="biayaAdmLainNFP"
                                                        class="form-control numeral-mask101"
                                                        name="usaha_pasangan_biaya_adm_lain" placeholder="Sub Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_biaya_adm_lain }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <b>Jumlah Biaya Administrasi</b>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="jmlBiayaAdmNF1Dummy"
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_jml_biaya_adm }}" />
                                                    <input type="hidden" id="jmlBiayaAdmNF1" class="form-control"
                                                        name="usaha1_jml_biaya_adm"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_jml_biaya_adm }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="jmlBiayaAdmNF2Dummy"
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_jml_biaya_adm }}" />
                                                    <input type="hidden" id="jmlBiayaAdmNF2" class="form-control"
                                                        name="usaha2_jml_biaya_adm"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_jml_biaya_adm }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="jmlBiayaAdmNFPDummy"
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_jml_biaya_adm }}" />
                                                    <input type="hidden" id="jmlBiayaAdmNFP" class="form-control"
                                                        name="usaha_pasangan_jml_biaya_adm"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_jml_biaya_adm }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <b>Laba/Penghasilan Bersih Sebelum Pajak</b>
                                                </td>

                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="labaSebelumPajakNF1Dummy"
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_laba_sebelum_pajak }}" />
                                                    <input type="hidden" id="labaSebelumPajakNF1"
                                                        class="form-control" name="usaha1_laba_sebelum_pajak"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_laba_sebelum_pajak }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="labaSebelumPajakNF2Dummy"
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_laba_sebelum_pajak }}" />
                                                    <input type="hidden" id="labaSebelumPajakNF2"
                                                        class="form-control" name="usaha2_laba_sebelum_pajak"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_laba_sebelum_pajak }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="labaSebelumPajakNFPDummy"
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_laba_sebelum_pajak }}" />
                                                    <input type="hidden" id="labaSebelumPajakNFP"
                                                        class="form-control" name="usaha_pasangan_laba_sebelum_pajak"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_laba_sebelum_pajak }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    Pajak/Zakat
                                                </td>

                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="pajakZakatNF1"
                                                        class="form-control numeral-mask101" name="usaha1_pajak_zakat"
                                                        placeholder="Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_pajak_zakat }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="pajakZakatNF2"
                                                        class="form-control numeral-mask102" name="usaha2_pajak_zakat"
                                                        placeholder="Total" onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_pajak_zakat }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="pajakZakatNFP"
                                                        class="form-control numeral-mask103"
                                                        name="usaha_pasangan_pajak_zakat" placeholder="Total"
                                                        onkeyup="sumNonFixed(this.value);"
                                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_pajak_zakat }}" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <b>Laba/Penghasilan Bersih Setelah Pajak</b>
                                                </td>

                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="labaSetelahPajakNF1Dummy"
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_laba_setelah_pajak }}" />
                                                    <input type="hidden" id="labaSetelahPajakNF1"
                                                        class="form-control" name="usaha1_laba_setelah_pajak"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha1_laba_setelah_pajak }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="labaSetelahPajakNF2Dummy"
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_laba_setelah_pajak }}" />
                                                    <input type="hidden" id="labaSetelahPajakNF2"
                                                        class="form-control" name="usaha2_laba_setelah_pajak"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha2_laba_setelah_pajak }}" />
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <input type="text" id="labaSetelahPajakNFPDummy"
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_laba_setelah_pajak }}" />
                                                    <input type="hidden" id="labaSetelahPajakNFP"
                                                        class="form-control" name="usaha_pasangan_laba_setelah_pajak"
                                                        value="{{ $dokumen->AtrNonFixedIncome->usaha_pasangan_laba_setelah_pajak }}" />
                                                </td>
                                            </tr>
                                            <tr></tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <b>Total Penghasilan Bersih Calon Nasabah Per Bulan</b>
                                                </td>
                                                <td style="vertical-align: middle;" colspan="3">
                                                    <input type="text" id="totalPenghasilanBersihPerBulanDummy"
                                                        class="form-control" placeholder="Total" disabled
                                                        value="{{ $dokumen->AtrNonFixedIncome->total_penghasilan_bersih }}" />
                                                    <input type="hidden" id="totalPenghasilanBersihPerBulan"
                                                        class="form-control" name="total_penghasilan_bersih"
                                                        value="{{ $dokumen->AtrNonFixedIncome->total_penghasilan_bersih }}" />
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
                                                <center><input type="radio" name="cl_persyaratan" value="Ada"
                                                        class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->cl_persyaratan == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="cl_persyaratan" value="Tidak"
                                                        class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->cl_persyaratan == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                <center><input type="radio" name="cl_dokumen" value="Ada"
                                                        class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->cl_dokumen == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="cl_dokumen" value="Tidak"
                                                        class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->cl_dokumen == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                <center><input type="radio" name="berkas_copy" value="Ada"
                                                        class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->berkas_copy == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="berkas_copy" value="Tidak"
                                                        class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->berkas_copy == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                        value="Ada" class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->paper_hasil_wawancara == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="paper_hasil_wawancara"
                                                        value="Tidak" class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->paper_hasil_wawancara == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                <center><input type="radio" name="paper_analisa_5c" value="Ada"
                                                        class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->paper_analisa_5c == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="paper_analisa_5c" value="Tidak"
                                                        class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->paper_analisa_5c == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                <center><input type="radio" name="paper_fsm" value="Ada"
                                                        class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->paper_fsm == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="paper_fsm" value="Tidak"
                                                        class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->paper_fsm == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                <center><input type="radio" name="paper_ots" value="Ada"
                                                        class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->paper_ots == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="paper_ots" value="Tidak"
                                                        class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->paper_ots == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                <center><input type="radio" name="laporan_hasil_penilaian_agunan"
                                                        value="Ada" class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->laporan_hasil_penilaian_agunan == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="laporan_hasil_penilaian_agunan"
                                                        value="Tidak" class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->laporan_hasil_penilaian_agunan == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                        value="Ada" class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->perhitungan_plafond_ftv == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="perhitungan_plafond_ftv"
                                                        value="Tidak" class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->perhitungan_plafond_ftv == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                                        value="Ada" class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->daftar_calon_nasabah == 'Ada' ? 'checked' : '' }}
                                                        required />
                                                </center>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <center><input type="radio" name="daftar_calon_nasabah"
                                                        value="Tidak" class="form-check-input"
                                                        {{ $dokumen->pemberkasanMemo->daftar_calon_nasabah == 'Tidak' ? 'checked' : '' }}
                                                        required />
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
                                @if ($pembiayaan->form_cl != 'Telah diisi')
                                    <button class="btn btn-success">Submit</button>
                                @endif
                            </div>
                        </div>
                        <br>
                        <hr>
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
                        <div class="step active" href="#formAnalisaCharacter" data-bs-toggle="tab" role="tab"
                            id="formAnalisaCharacter-tab-justified" aria-controls="formAnalisaCharacter"
                            aria-selected="true">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="user" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Character</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        @if ($pembiayaan->jenis_nasabah == 'Fixed Income')
                            <div class="step" href="#formAnalisaCapital" data-bs-toggle="tab" role="tab"
                                id="formAnalisaCapital-tab-justified" aria-controls="formAnalisaCapital"
                                aria-selected="true">
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
                        <div class="step" href="#formAnalisaCapacity" data-bs-toggle="tab" role="tab"
                            id="formAnalisaCapacity-tab-justified" aria-controls="formAnalisaCapacity"
                            aria-selected="true">
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
                        <div class="step" href="#formAnalisaConditionSharia" data-bs-toggle="tab" role="tab"
                            id="formAnalisaConditionSharia-tab-justified" aria-controls="formAnalisaConditionSharia"
                            aria-selected="true">
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
                        <div class="step" href="#formAnalisaCollateral" data-bs-toggle="tab" role="tab"
                            id="formAnalisaCollateral-tab-justified" aria-controls="formAnalisaCollateral"
                            aria-selected="true">
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
                    <form action="/ppr/revisi/{{ $pembiayaan->id }}" class="needs-validation" method="POST"
                        novalidate>
                        @method('PUT')
                        @csrf
                        @if ($pembiayaan->dilengkapi_ao == 'Telah dilengkapi' && $pembiayaan->form_cl == 'Telah diisi')
                            <input type="hidden" name="dilengkapi_ao" value="Telah dilengkapi" />
                            <input type="hidden" name="form_cl" value="Telah diisi" />
                            <input type="hidden" name="form_score" value="Telah dinilai" />
                        @else
                            <input type="hidden" name="dilengkapi_ao" value="Telah dilengkapi" />
                            <input type="hidden" name="form_cl" value="Telah diisi" />
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="character_tempat_bekerja"
                                                        id="character_tempat_bekerja" data-placeholder="Pilih" required>
                                                        <option value="">
                                                        </option>
                                                        @foreach ($character_tempat_bekerjas as $character_tempat_bekerja)
                                                            <option
                                                                value="{{ $character_tempat_bekerja->rating * $character_tempat_bekerja->bobot }}"
                                                                {{ $character->character_tempat_bekerja / $character_tempat_bekerja->bobot == $character_tempat_bekerja->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="character_konsistensi"
                                                        id="character_konsistensi" data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($character_konsistensis as $character_konsistensi)
                                                            <option
                                                                value="{{ $character_konsistensi->rating * $character_konsistensi->bobot }}"
                                                                {{ $character->character_konsistensi / $character_konsistensi->bobot == $character_konsistensi->id ? 'selected' : '' }}>
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
                                                <td class="midJustify col-fixed-width">
                                                    Kelengkapan & Validitas Data
                                                </td>
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="character_kelengkapan_validitas_data"
                                                        id="character_kelengkapan_validitas_data"
                                                        data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($character_kelengkapan_validitas_datas as $character_kelengkapan_validitas_data)
                                                            <option
                                                                value="{{ $character_kelengkapan_validitas_data->rating * $character_kelengkapan_validitas_data->bobot }}"
                                                                {{ $character->character_kelengkapan_validitas_data / $character_kelengkapan_validitas_data->bobot == $character_kelengkapan_validitas_data->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="character_pembayaran_angsuran_kolektif"
                                                        id="character_pembayaran_angsuran_kolektif"
                                                        data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($character_pembayaran_angsuran_kolektifs as $character_pembayaran_angsuran_kolektif)
                                                            <option
                                                                value="{{ $character_pembayaran_angsuran_kolektif->rating * $character_pembayaran_angsuran_kolektif->bobot }}"
                                                                {{ $character->character_pembayaran_angsuran_kolektif / $character_pembayaran_angsuran_kolektif->bobot == $character_pembayaran_angsuran_kolektif->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="character_pengalaman_pembiayaan"
                                                        id="character_pengalaman_pembiayaan" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($character_pengalaman_pembiayaans as $character_pengalaman_pembiayaan)
                                                            <option
                                                                value="{{ $character_pengalaman_pembiayaan->rating * $character_pengalaman_pembiayaan->bobot }}"
                                                                {{ $character->character_pengalaman_pembiayaan / $character_pengalaman_pembiayaan->bobot == $character_pengalaman_pembiayaan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="character_motivasi"
                                                        id="character_motivasi" data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($character_motivasis as $character_motivasi)
                                                            <option
                                                                value="{{ $character_motivasi->rating * $character_motivasi->bobot }}"
                                                                {{ $character->character_motivasi / $character_motivasi->bobot == $character_motivasi->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="character_referensi"
                                                        id="character_referensi" data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($character_referensis as $character_referensi)
                                                            <option
                                                                value="{{ $character_referensi->rating * $character_referensi->bobot }}"
                                                                {{ $character->character_referensi / $character_referensi->bobot == $character_referensi->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="character_nf_tingkat_kepercayaan"
                                                        id="character_nf_tingkat_kepercayaan" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($character_nf_tingkat_kepercayaans as $character_nf_tingkat_kepercayaan)
                                                            <option
                                                                value="{{ $character_nf_tingkat_kepercayaan->rating * $character_nf_tingkat_kepercayaan->bobot }}"
                                                                {{ $characterNf->character_nf_tingkat_kepercayaan / $character_nf_tingkat_kepercayaan->bobot == $character_nf_tingkat_kepercayaan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="character_nf_pengelolaan_rekening"
                                                        id="character_nf_pengelolaan_rekening" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($character_nf_pengelolaan_rekenings as $character_nf_pengelolaan_rekening)
                                                            <option
                                                                value="{{ $character_nf_pengelolaan_rekening->rating * $character_nf_pengelolaan_rekening->bobot }}"
                                                                {{ $characterNf->character_nf_pengelolaan_rekening / $character_nf_pengelolaan_rekening->bobot == $character_nf_pengelolaan_rekening->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="character_nf_reputasi_bisnis"
                                                        id="character_nf_reputasi_bisnis" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($character_nf_reputasi_bisnises as $character_nf_reputasi_bisnis)
                                                            <option
                                                                value="{{ $character_nf_reputasi_bisnis->rating * $character_nf_reputasi_bisnis->bobot }}"
                                                                {{ $characterNf->character_nf_reputasi_bisnis / $character_nf_reputasi_bisnis->bobot == $character_nf_reputasi_bisnis->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="character_nf_perilaku_pribadi"
                                                        id="character_nf_perilaku_pribadi" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($character_nf_perilaku_pribadis as $character_nf_perilaku_pribadi)
                                                            <option
                                                                value="{{ $character_nf_perilaku_pribadi->rating * $character_nf_perilaku_pribadi->bobot }}"
                                                                {{ $characterNf->character_nf_perilaku_pribadi / $character_nf_perilaku_pribadi->bobot == $character_nf_perilaku_pribadi->id ? 'selected' : '' }}>
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
                                        @if ($pembiayaan->jenis_nasabah == 'Fixed Income')
                                            <tr>
                                                <td class="midCenter">
                                                    a.
                                                </td>
                                                <td class="midJustify">
                                                    Pekerjaan
                                                </td>
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="capital_pekerjaan"
                                                        id="capital_pekerjaan" data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($capital_pekerjaans as $capital_pekerjaan)
                                                            <option
                                                                value="{{ $capital_pekerjaan->rating * $capital_pekerjaan->bobot }}"
                                                                {{ $capital->capital_pekerjaan / $capital_pekerjaan->bobot == $capital_pekerjaan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="capital_pengalaman_riwayat_pembiayaan"
                                                        id="capital_pengalaman_riwayat_pembiayaan"
                                                        data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($capital_pengalaman_riwayat_pembiayaans as $capital_pengalaman_riwayat_pembiayaan)
                                                            <option
                                                                value="{{ $capital_pengalaman_riwayat_pembiayaan->rating * $capital_pengalaman_riwayat_pembiayaan->bobot }}"
                                                                {{ $capital->capital_pengalaman_riwayat_pembiayaan / $capital_pengalaman_riwayat_pembiayaan->bobot == $capital_pengalaman_riwayat_pembiayaan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="capital_keamanan_bisnis_pekerjaan"
                                                        id="capital_keamanan_bisnis_pekerjaan" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($capital_keamanan_bisnis_pekerjaans as $capital_keamanan_bisnis_pekerjaan)
                                                            <option
                                                                value="{{ $capital_keamanan_bisnis_pekerjaan->rating * $capital_keamanan_bisnis_pekerjaan->bobot }}"
                                                                {{ $capital->capital_keamanan_bisnis_pekerjaan / $capital_keamanan_bisnis_pekerjaan->bobot == $capital_keamanan_bisnis_pekerjaan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="capital_potensi_pertumbuhan_hasil"
                                                        id="capital_potensi_pertumbuhan_hasil" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($capital_potensi_pertumbuhan_hasils as $capital_potensi_pertumbuhan_hasil)
                                                            <option
                                                                value="{{ $capital_potensi_pertumbuhan_hasil->rating * $capital_potensi_pertumbuhan_hasil->bobot }}"
                                                                {{ $capital->capital_potensi_pertumbuhan_hasil / $capital_potensi_pertumbuhan_hasil->bobot == $capital_potensi_pertumbuhan_hasil->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="capital_sumber_pendapatan"
                                                        id="capital_sumber_pendapatan" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($capital_sumber_pendapatans as $capital_sumber_pendapatan)
                                                            <option
                                                                value="{{ $capital_sumber_pendapatan->rating * $capital_sumber_pendapatan->bobot }}"
                                                                {{ $capital->capital_sumber_pendapatan / $capital_sumber_pendapatan->bobot == $capital_sumber_pendapatan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="capital_pendapatan_gaji_bersih"
                                                        id="capital_pendapatan_gaji_bersih" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($capital_pendapatan_gaji_bersihs as $capital_pendapatan_gaji_bersih)
                                                            <option
                                                                value="{{ $capital_pendapatan_gaji_bersih->rating * $capital_pendapatan_gaji_bersih->bobot }}"
                                                                {{ $capital->capital_pendapatan_gaji_bersih / $capital_pendapatan_gaji_bersih->bobot == $capital_pendapatan_gaji_bersih->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="capital_jml_tanggungan_keluarga"
                                                        id="capital_jml_tanggungan_keluarga" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($capital_jml_tanggungan_keluargas as $capital_jml_tanggungan_keluarga)
                                                            <option
                                                                value="{{ $capital_jml_tanggungan_keluarga->rating * $capital_jml_tanggungan_keluarga->bobot }}"
                                                                {{ $capital->capital_jml_tanggungan_keluarga / $capital_jml_tanggungan_keluarga->bobot == $capital_jml_tanggungan_keluarga->id ? 'selected' : '' }}>
                                                                {{ $capital_jml_tanggungan_keluarga->keterangan }}
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="capacity_pekerjaan"
                                                        id="capacity_pekerjaan" data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($capacity_pekerjaans as $capacity_pekerjaan)
                                                            <option
                                                                value="{{ $capacity_pekerjaan->rating * $capacity_pekerjaan->bobot }}"
                                                                {{ $capacity->capacity_pekerjaan / $capacity_pekerjaan->bobot == $capacity_pekerjaan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="capacity_pengalaman_riwayat_pembiayaan"
                                                        id="capacity_pengalaman_riwayat_pembiayaan"
                                                        data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($capacity_pengalaman_riwayat_pembiayaans as $capacity_pengalaman_riwayat_pembiayaan)
                                                            <option
                                                                value="{{ $capacity_pengalaman_riwayat_pembiayaan->rating * $capacity_pengalaman_riwayat_pembiayaan->bobot }}"
                                                                {{ $capacity->capacity_pengalaman_riwayat_pembiayaan / $capacity_pengalaman_riwayat_pembiayaan->bobot == $capacity_pengalaman_riwayat_pembiayaan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="capacity_keamanan_bisnis_pekerjaan"
                                                        id="capacity_keamanan_bisnis_pekerjaan" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($capacity_keamanan_bisnis_pekerjaans as $capacity_keamanan_bisnis_pekerjaan)
                                                            <option
                                                                value="{{ $capacity_keamanan_bisnis_pekerjaan->rating * $capacity_keamanan_bisnis_pekerjaan->bobot }}"
                                                                {{ $capacity->capacity_keamanan_bisnis_pekerjaan / $capacity_keamanan_bisnis_pekerjaan->bobot == $capacity_keamanan_bisnis_pekerjaan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="capacity_potensi_pertumbuhan_hasil"
                                                        id="capacity_potensi_pertumbuhan_hasil" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($capacity_potensi_pertumbuhan_hasils as $capacity_potensi_pertumbuhan_hasil)
                                                            <option
                                                                value="{{ $capacity_potensi_pertumbuhan_hasil->rating * $capacity_potensi_pertumbuhan_hasil->bobot }}"
                                                                {{ $capacity->capacity_potensi_pertumbuhan_hasil / $capacity_potensi_pertumbuhan_hasil->bobot == $capacity_potensi_pertumbuhan_hasil->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="capacity_pengalaman_kerja"
                                                        id="capacity_pengalaman_kerja" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($capacity_pengalaman_kerjas as $capacity_pengalaman_kerja)
                                                            <option
                                                                value="{{ $capacity_pengalaman_kerja->rating * $capacity_pengalaman_kerja->bobot }}"
                                                                {{ $capacity->capacity_pengalaman_kerja / $capacity_pengalaman_kerja->bobot == $capacity_pengalaman_kerja->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="capacity_pendidikan"
                                                        id="capacity_pendidikan" data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($capacity_pendidikans as $capacity_pendidikan)
                                                            <option
                                                                value="{{ $capacity_pendidikan->rating * $capacity_pendidikan->bobot }}"
                                                                {{ $capacity->capacity_pendidikan / $capacity_pendidikan->bobot == $capacity_pendidikan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="capacity_usia"
                                                        id="capacity_usia" data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($capacity_usias as $capacity_usia)
                                                            <option
                                                                value="{{ $capacity_usia->rating * $capacity_usia->bobot }}"
                                                                {{ $capacity->capacity_usia / $capacity_usia->bobot == $capacity_usia->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="capacity_sumber_pendapatan"
                                                        id="capacity_sumber_pendapatan" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($capacity_sumber_pendapatans as $capacity_sumber_pendapatan)
                                                            <option
                                                                value="{{ $capacity_sumber_pendapatan->rating * $capacity_sumber_pendapatan->bobot }}"
                                                                {{ $capacity->capacity_sumber_pendapatan / $capacity_sumber_pendapatan->bobot == $capacity_sumber_pendapatan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="capacity_pendapatan_gaji_bersih"
                                                        id="capacity_pendapatan_gaji_bersih" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($capacity_pendapatan_gaji_bersihs as $capacity_pendapatan_gaji_bersih)
                                                            <option
                                                                value="{{ $capacity_pendapatan_gaji_bersih->rating * $capacity_pendapatan_gaji_bersih->bobot }}"
                                                                {{ $capacity->capacity_pendapatan_gaji_bersih / $capacity_pendapatan_gaji_bersih->bobot == $capacity_pendapatan_gaji_bersih->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="capacity_jml_tanggungan_keluarga"
                                                        id="capacity_jml_tanggungan_keluarga" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($capacity_jml_tanggungan_keluargas as $capacity_jml_tanggungan_keluarga)
                                                            <option
                                                                value="{{ $capacity_jml_tanggungan_keluarga->rating * $capacity_jml_tanggungan_keluarga->bobot }}"
                                                                {{ $capacity->capacity_jml_tanggungan_keluarga / $capacity_jml_tanggungan_keluarga->bobot == $capacity_jml_tanggungan_keluarga->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="capacity_nf_situasi_persaingan"
                                                        id="capacity_nf_situasi_persaingan" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($capacity_nf_situasi_persaingans as $capacity_nf_situasi_persaingan)
                                                            <option
                                                                value="{{ $capacity_nf_situasi_persaingan->rating * $capacity_nf_situasi_persaingan->bobot }}"
                                                                {{ $capacityNf->capacity_nf_situasi_persaingan / $capacity_nf_situasi_persaingan->bobot == $capacity_nf_situasi_persaingan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="capacity_nf_kaderisasi"
                                                        id="capacity_nf_kaderisasi" data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($capacity_nf_kaderisasis as $capacity_nf_kaderisasi)
                                                            <option
                                                                value="{{ $capacity_nf_kaderisasi->rating * $capacity_nf_kaderisasi->bobot }}"
                                                                {{ $capacityNf->capacity_nf_kaderisasi / $capacity_nf_kaderisasi->bobot == $capacity_nf_kaderisasi->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="capacity_nf_kualifikasi_komersial"
                                                        id="capacity_nf_kualifikasi_komersial" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($capacity_nf_kualifikasi_komersials as $capacity_nf_kualifikasi_komersial)
                                                            <option
                                                                value="{{ $capacity_nf_kualifikasi_komersial->rating * $capacity_nf_kualifikasi_komersial->bobot }}"
                                                                {{ $capacityNf->capacity_nf_kualifikasi_komersial / $capacity_nf_kualifikasi_komersial->bobot == $capacity_nf_kualifikasi_komersial->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="capacity_nf_kualifikasi_teknis"
                                                        id="capacity_nf_kualifikasi_teknis" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($capacity_nf_kualifikasi_teknises as $capacity_nf_kualifikasi_teknis)
                                                            <option
                                                                value="{{ $capacity_nf_kualifikasi_teknis->rating * $capacity_nf_kualifikasi_teknis->bobot }}"
                                                                {{ $capacityNf->capacity_nf_kualifikasi_teknis / $capacity_nf_kualifikasi_teknis->bobot == $capacity_nf_kualifikasi_teknis->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="condition_pekerjaan"
                                                        id="condition_pekerjaan" data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($condition_pekerjaans as $condition_pekerjaan)
                                                            <option
                                                                value="{{ $condition_pekerjaan->rating * $condition_pekerjaan->bobot }}"
                                                                {{ $condition->condition_pekerjaan / $condition_pekerjaan->bobot == $condition_pekerjaan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="condition_pengalaman_riwayat_pembiayaan"
                                                        id="condition_pengalaman_riwayat_pembiayaan"
                                                        data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($condition_pengalaman_riwayat_pembiayaans as $condition_pengalaman_riwayat_pembiayaan)
                                                            <option
                                                                value="{{ $condition_pengalaman_riwayat_pembiayaan->rating * $condition_pengalaman_riwayat_pembiayaan->bobot }}"
                                                                {{ $condition->condition_pengalaman_riwayat_pembiayaan / $condition_pengalaman_riwayat_pembiayaan->bobot == $condition_pengalaman_riwayat_pembiayaan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="condition_keamanan_bisnis_pekerjaan"
                                                        id="condition_keamanan_bisnis_pekerjaan"
                                                        data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($condition_keamanan_bisnis_pekerjaans as $condition_keamanan_bisnis_pekerjaan)
                                                            <option
                                                                value="{{ $condition_keamanan_bisnis_pekerjaan->rating * $condition_keamanan_bisnis_pekerjaan->bobot }}"
                                                                {{ $condition->condition_keamanan_bisnis_pekerjaan / $condition_keamanan_bisnis_pekerjaan->bobot == $condition_keamanan_bisnis_pekerjaan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="condition_potensi_pertumbuhan_hasil"
                                                        id="condition_potensi_pertumbuhan_hasil"
                                                        data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($condition_potensi_pertumbuhan_hasils as $condition_potensi_pertumbuhan_hasil)
                                                            <option
                                                                value="{{ $condition_potensi_pertumbuhan_hasil->rating * $condition_potensi_pertumbuhan_hasil->bobot }}"
                                                                {{ $condition->condition_potensi_pertumbuhan_hasil / $condition_potensi_pertumbuhan_hasil->bobot == $condition_potensi_pertumbuhan_hasil->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="condition_pengalaman_kerja"
                                                        id="condition_pengalaman_kerja" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($condition_pengalaman_kerjas as $condition_pengalaman_kerja)
                                                            <option
                                                                value="{{ $condition_pengalaman_kerja->rating * $condition_pengalaman_kerja->bobot }}"
                                                                {{ $condition->condition_pengalaman_kerja / $condition_pengalaman_kerja->bobot == $condition_pengalaman_kerja->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="condition_pendidikan"
                                                        id="condition_pendidikan" data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($condition_pendidikans as $condition_pendidikan)
                                                            <option
                                                                value="{{ $condition_pendidikan->rating * $condition_pendidikan->bobot }}"
                                                                {{ $condition->condition_pendidikan / $condition_pendidikan->bobot == $condition_pendidikan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="condition_usia"
                                                        id="condition_usia" data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($condition_usias as $condition_usia)
                                                            <option
                                                                value="{{ $condition_usia->rating * $condition_usia->bobot }}"
                                                                {{ $condition->condition_usia / $condition_usia->bobot == $condition_usia->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="condition_sumber_pendapatan"
                                                        id="condition_sumber_pendapatan" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($condition_sumber_pendapatans as $condition_sumber_pendapatan)
                                                            <option
                                                                value="{{ $condition_sumber_pendapatan->rating * $condition_sumber_pendapatan->bobot }}"
                                                                {{ $condition->condition_sumber_pendapatan / $condition_sumber_pendapatan->bobot == $condition_sumber_pendapatan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="condition_pendapatan_gaji_bersih"
                                                        id="condition_pendapatan_gaji_bersih" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($condition_pendapatan_gaji_bersihs as $condition_pendapatan_gaji_bersih)
                                                            <option
                                                                value="{{ $condition_pendapatan_gaji_bersih->rating * $condition_pendapatan_gaji_bersih->bobot }}"
                                                                {{ $condition->condition_pendapatan_gaji_bersih / $condition_pendapatan_gaji_bersih->bobot == $condition_pendapatan_gaji_bersih->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="condition_jml_tanggungan_keluarga"
                                                        id="condition_jml_tanggungan_keluarga" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($condition_jml_tanggungan_keluargas as $condition_jml_tanggungan_keluarga)
                                                            <option
                                                                value="{{ $condition_jml_tanggungan_keluarga->rating * $condition_jml_tanggungan_keluarga->bobot }}"
                                                                {{ $condition->condition_jml_tanggungan_keluarga / $condition_jml_tanggungan_keluarga->bobot == $condition_jml_tanggungan_keluarga->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="condition_nf_kualitas_produk_jasa"
                                                        id="condition_nf_kualitas_produk_jasa" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($condition_sharia_nf_kualitas_produk_jasas as $condition_sharia_nf_kualitas_produk_jasa)
                                                            <option
                                                                value="{{ $condition_sharia_nf_kualitas_produk_jasa->rating * $condition_sharia_nf_kualitas_produk_jasa->bobot }}"
                                                                {{ $conditionNf->condition_sharia_nf_kualitas_produk_jasa / $condition_sharia_nf_kualitas_produk_jasa->bobot == $condition_sharia_nf_kualitas_produk_jasa->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="condition_nf_sistem_pembayaran"
                                                        id="condition_nf_sistem_pembayaran" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($condition_sharia_nf_sistem_pembayarans as $condition_sharia_nf_sistem_pembayaran)
                                                            <option
                                                                value="{{ $condition_sharia_nf_sistem_pembayaran->rating * $condition_sharia_nf_sistem_pembayaran->bobot }}"
                                                                {{ $conditionNf->condition_sharia_nf_sistem_pembayaran / $condition_sharia_nf_sistem_pembayaran->bobot == $condition_sharia_nf_sistem_pembayaran->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="condition_nf_lokasi_usaha"
                                                        id="condition_nf_lokasi_usaha" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($condition_sharia_nf_lokasi_usahas as $condition_sharia_nf_lokasi_usaha)
                                                            <option
                                                                value="{{ $condition_sharia_nf_lokasi_usaha->rating * $condition_sharia_nf_lokasi_usaha->bobot }}"
                                                                {{ $conditionNf->condition_sharia_nf_lokasi_usaha / $condition_sharia_nf_lokasi_usaha->bobot == $condition_sharia_nf_lokasi_usaha->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="collateral_marketabilitas"
                                                        id="collateral_marketabilitas" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($collateral_marketabilitases as $collateral_marketabilitas)
                                                            <option
                                                                value="{{ $collateral_marketabilitas->rating * $collateral_marketabilitas->bobot }}"
                                                                {{ $collateral->collateral_marketabilitas / $collateral_marketabilitas->bobot == $collateral_marketabilitas->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="collateral_kontribusi_pemohon_ftv"
                                                        id="collateral_kontribusi_pemohon_ftv" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($collateral_kontribusi_pemohon_ftvs as $collateral_kontribusi_pemohon_ftv)
                                                            <option
                                                                value="{{ $collateral_kontribusi_pemohon_ftv->rating * $collateral_kontribusi_pemohon_ftv->bobot }}"
                                                                {{ $collateral->collateral_kontribusi_pemohon_ftv / $collateral_kontribusi_pemohon_ftv->bobot == $collateral_kontribusi_pemohon_ftv->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="collateral_pertumbuhan_agunan"
                                                        id="collateral_pertumbuhan_agunan" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($collateral_pertumbuhan_agunans as $collateral_pertumbuhan_agunan)
                                                            <option
                                                                value="{{ $collateral_pertumbuhan_agunan->rating * $collateral_pertumbuhan_agunan->bobot }}"
                                                                {{ $collateral->collateral_pertumbuhan_agunan / $collateral_pertumbuhan_agunan->bobot == $collateral_pertumbuhan_agunan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="collateral_daya_tarik_agunan"
                                                        id="collateral_daya_tarik_agunan" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($collateral_daya_tarik_agunans as $collateral_daya_tarik_agunan)
                                                            <option
                                                                value="{{ $collateral_daya_tarik_agunan->rating * $collateral_daya_tarik_agunan->bobot }}"
                                                                {{ $collateral->collateral_daya_tarik_agunan / $collateral_daya_tarik_agunan->bobot == $collateral_daya_tarik_agunan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="collateral_jangka_waktu_likuidasi"
                                                        id="collateral_jangka_waktu_likuidasi" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($collateral_jangka_waktu_likuidasis as $collateral_jangka_waktu_likuidasi)
                                                            <option
                                                                value="{{ $collateral_jangka_waktu_likuidasi->rating * $collateral_jangka_waktu_likuidasi->bobot }}"
                                                                {{ $collateral->collateral_jangka_waktu_likuidasi / $collateral_jangka_waktu_likuidasi->bobot == $collateral_jangka_waktu_likuidasi->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="collateral_nf_marketabilitas"
                                                        id="collateral_nf_marketabilitas" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($collateral_nf_marketabilitases as $collateral_nf_marketabilitas)
                                                            <option
                                                                value="{{ $collateral_nf_marketabilitas->rating * $collateral_nf_marketabilitas->bobot }}"
                                                                {{ $collateralNf->collateral_nf_marketabilitas / $collateral_nf_marketabilitas->bobot == $collateral_nf_marketabilitas->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="collateral_nf_kontribusi_pemohon_ftv"
                                                        id="collateral_nf_kontribusi_pemohon_ftv"
                                                        data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($collateral_nf_kontribusi_pemohons as $collateral_nf_kontribusi_pemohon)
                                                            <option
                                                                value="{{ $collateral_nf_kontribusi_pemohon->rating * $collateral_nf_kontribusi_pemohon->bobot }}"
                                                                {{ $collateralNf->collateral_nf_kontribusi_pemohon / $collateral_nf_kontribusi_pemohon->bobot == $collateral_nf_kontribusi_pemohon->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="collateral_nf_pertumbuhan_agunan"
                                                        id="collateral_nf_pertumbuhan_agunan" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($collateral_nf_pertumbuhan_agunans as $collateral_nf_pertumbuhan_agunan)
                                                            <option
                                                                value="{{ $collateral_nf_pertumbuhan_agunan->rating * $collateral_nf_pertumbuhan_agunan->bobot }}"
                                                                {{ $collateralNf->collateral_nf_pertumbuhan_agunan / $collateral_nf_pertumbuhan_agunan->bobot == $collateral_nf_pertumbuhan_agunan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100" name="collateral_nf_daya_tarik_agunan"
                                                        id="collateral_nf_daya_tarik_agunan" data-placeholder="Pilih"
                                                        required>
                                                        <option value=""></option>
                                                        @foreach ($collateral_nf_daya_tarik_agunans as $collateral_nf_daya_tarik_agunan)
                                                            <option
                                                                value="{{ $collateral_nf_daya_tarik_agunan->rating * $collateral_nf_daya_tarik_agunan->bobot }}"
                                                                {{ $collateralNf->collateral_nf_daya_tarik_agunan / $collateral_nf_daya_tarik_agunan->bobot == $collateral_nf_daya_tarik_agunan->id ? 'selected' : '' }}>
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
                                                <td class="midCenter col-fixed-width">
                                                    <select class="select2 w-100"
                                                        name="collateral_nf_jangka_waktu_likuidasi"
                                                        id="collateral_nf_jangka_waktu_likuidasi"
                                                        data-placeholder="Pilih" required>
                                                        <option value=""></option>
                                                        @foreach ($collateral_nf_jangka_waktu_likuidasis as $collateral_nf_jangka_waktu_likuidasi)
                                                            <option
                                                                value="{{ $collateral_nf_jangka_waktu_likuidasi->rating * $collateral_nf_jangka_waktu_likuidasi->bobot }}"
                                                                {{ $collateralNf->collateral_nf_jangka_waktu_likuidasi / $collateral_nf_jangka_waktu_likuidasi->bobot == $collateral_nf_jangka_waktu_likuidasi->id ? 'selected' : '' }}>
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
                                <button class="btn btn-primary btn-prev" type="button">
                                    <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                    <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                </button>
                                <button class="btn btn-success">Submit</button>
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

    <!-- Modals -->

    <!-- Modal Hapus Kekayaan Simpanan -->
    <div class="modal fade" id="modalHapusKekayaanSimpanan" tabindex="-1" aria-labelledby="addNewCardTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/ppr/revisi/{{ $pembiayaan->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body px-sm-5 mx-50 pb-5">
                        <h5 class="text-center">Apakah Anda yakin ingin menghapus semua data kekayaan simpanan?</h5>
                        <br />
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary form-control" type="submit">Ya
                                    <input type="hidden" name="delete_repeater" value="Hapus Kekayaan Simpanan">
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-danger form-control"
                                    data-bs-dismiss="modal">Tidak</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Hapus Kekayaan Simpanan -->

    <!-- Modal Hapus Kekayaan Tanah & Bangunan -->
    <div class="modal fade" id="modalHapusKekayaanTanahBangunan" tabindex="-1" aria-labelledby="addNewCardTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/ppr/revisi/{{ $pembiayaan->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body px-sm-5 mx-50 pb-5">
                        <h5 class="text-center">Apakah Anda yakin ingin menghapus semua data kekayaan tanah & bangunan?
                        </h5>
                        <br />
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary form-control" type="submit">Ya
                                    <input type="hidden" name="delete_repeater"
                                        value="Hapus Kekayaan Tanah & Bangunan">
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-danger form-control"
                                    data-bs-dismiss="modal">Tidak</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Hapus Kekayaan Tanah & Bangunan -->

    <!-- Modal Hapus Kekayaan Kendaraan -->
    <div class="modal fade" id="modalHapusKekayaanKendaraan" tabindex="-1" aria-labelledby="addNewCardTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/ppr/revisi/{{ $pembiayaan->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body px-sm-5 mx-50 pb-5">
                        <h5 class="text-center">Apakah Anda yakin ingin menghapus semua data kekayaan kendaraan?</h5>
                        <br />
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary form-control" type="submit">Ya
                                    <input type="hidden" name="delete_repeater" value="Hapus Kekayaan Kendaraan">
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-danger form-control"
                                    data-bs-dismiss="modal">Tidak</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Hapus Kekayaan Kendaraan -->

    <!-- Modal Hapus Kekayaan Saham -->
    <div class="modal fade" id="modalHapusKekayaanSaham" tabindex="-1" aria-labelledby="addNewCardTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/ppr/revisi/{{ $pembiayaan->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body px-sm-5 mx-50 pb-5">
                        <h5 class="text-center">Apakah Anda yakin ingin menghapus semua data kekayaan saham?</h5>
                        <br />
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary form-control" type="submit">Ya
                                    <input type="hidden" name="delete_repeater" value="Hapus Kekayaan Saham">
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-danger form-control"
                                    data-bs-dismiss="modal">Tidak</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Hapus Kekayaan Saham -->

    <!-- Modal Hapus Kekayaan Lainnya -->
    <div class="modal fade" id="modalHapusKekayaanLainnya" tabindex="-1" aria-labelledby="addNewCardTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/ppr/proposal/{{ $pembiayaan->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body px-sm-5 mx-50 pb-5">
                        <h5 class="text-center">Apakah Anda yakin ingin menghapus semua data kekayaan lainnya?</h5>
                        <br />
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary form-control" type="submit">Ya
                                    <input type="hidden" name="delete_repeater" value="Hapus Kekayaan Lainnya">
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-danger form-control"
                                    data-bs-dismiss="modal">Tidak</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Hapus Kekayaan Lainnya -->

    <!-- Modal Hapus Pinjaman -->
    <div class="modal fade" id="modalHapusPinjaman" tabindex="-1" aria-labelledby="addNewCardTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/ppr/proposal/{{ $pembiayaan->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body px-sm-5 mx-50 pb-5">
                        <h5 class="text-center">Apakah Anda yakin ingin menghapus semua data pinjaman?</h5>
                        <br />
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary form-control" type="submit">Ya
                                    <input type="hidden" name="delete_repeater" value="Hapus Pinjaman">
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-danger form-control"
                                    data-bs-dismiss="modal">Tidak</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Hapus Pinjaman -->

    <!-- Modal Hapus Pinjaman Kartu Kredit -->
    <div class="modal fade" id="modalHapusPinjamanKartuKredit" tabindex="-1" aria-labelledby="addNewCardTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/ppr/proposal/{{ $pembiayaan->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body px-sm-5 mx-50 pb-5">
                        <h5 class="text-center">Apakah Anda yakin ingin menghapus semua data pinjaman kartu kredit?</h5>
                        <br />
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary form-control" type="submit">Ya
                                    <input type="hidden" name="delete_repeater" value="Hapus Pinjaman Kartu Kredit">
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-danger form-control"
                                    data-bs-dismiss="modal">Tidak</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Hapus Pinjaman Kartu Kredit -->

    <!-- Modal Hapus Pinjaman Lainnya -->
    <div class="modal fade" id="modalHapusPinjamanLainnya" tabindex="-1" aria-labelledby="addNewCardTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/ppr/proposal/{{ $pembiayaan->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body px-sm-5 mx-50 pb-5">
                        <h5 class="text-center">Apakah Anda yakin ingin menghapus semua data pinjaman lainnya?</h5>
                        <br />
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary form-control" type="submit">Ya
                                    <input type="hidden" name="delete_repeater" value="Hapus Pinjaman Lainnya">
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-danger form-control"
                                    data-bs-dismiss="modal">Tidak</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Hapus Pinjaman Lainnya -->

    <!-- End Modals -->

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

        function changeJenisAkad() {
            var jenisAkadPembayaran = document.getElementById("formPermohonanJenisAkadPembayaran").value;
            if (jenisAkadPembayaran == "Akad Lainnya") {
                document.getElementById("ifJenisAkadLain").classList.toggle("hide"),
                    formPermohonanJmlMarginAkadLain.classList.add("form-control"),
                    document.getElementById("ifAkadLain").classList.toggle("hide"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").classList.toggle("hide"),
                    document.getElementById("formPermohonanJmlMargin").classList = "hide",
                    document.getElementById("formPermohonanJmlSewa").classList = "hide",
                    document.getElementById("formPermohonanJmlBagiHasil").classList = "hide",
                    document.getElementById("ifMurabahah").classList = "hide",
                    document.getElementById("ifImbt").classList = "hide",
                    document.getElementById("ifMmq").classList = "hide",
                    document.getElementById("formPermohonanJmlMarginAkadLain").setAttribute("required", "required"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").removeAttribute("disabled"),
                    document.getElementById("formPermohonanJmlMargin").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlMargin").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlSewa").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlBagiHasil").removeAttribute("required");
            } else if (jenisAkadPembayaran == "Murabahah") {
                document.getElementById("ifMurabahah").classList.toggle("hide"),
                    formPermohonanJmlMargin.classList.add("form-control"),
                    document.getElementById("formPermohonanJmlMargin").classList.toggle("hide"),
                    document.getElementById("formPermohonanJmlSewa").classList = "hide",
                    document.getElementById("formPermohonanJmlBagiHasil").classList = "hide",
                    document.getElementById("formPermohonanJmlMarginAkadLain").classList = "hide",
                    document.getElementById("ifImbt").classList = "hide",
                    document.getElementById("ifMmq").classList = "hide",
                    document.getElementById("ifAkadLain").classList = "hide",
                    document.getElementById("ifJenisAkadLain").classList = "hide",
                    document.getElementById("formPermohonanJmlMargin").removeAttribute("disabled"),
                    document.getElementById("formPermohonanJmlMargin").setAttribute("required", "required"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlSewa").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlBagiHasil").removeAttribute("required");
            } else if (jenisAkadPembayaran == "IMBT") {
                formPermohonanJmlSewa.classList.add("form-control"),
                    document.getElementById("ifImbt").classList.toggle("hide"),
                    document.getElementById("formPermohonanJmlSewa").classList.toggle("hide"),
                    document.getElementById("formPermohonanJmlMargin").classList = "hide",
                    document.getElementById("formPermohonanJmlMarginAkadLain").classList = "hide",
                    document.getElementById("formPermohonanJmlBagiHasil").classList = "hide",
                    document.getElementById("ifMurabahah").classList = "hide",
                    document.getElementById("ifMmq").classList = "hide",
                    document.getElementById("ifAkadLain").classList = "hide",
                    document.getElementById("ifJenisAkadLain").classList = "hide",
                    document.getElementById("formPermohonanJmlSewa").setAttribute("required", "required"),
                    document.getElementById("formPermohonanJmlMargin").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlMargin").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlBagiHasil").removeAttribute("required");
            } else if (jenisAkadPembayaran == "MMQ") {
                formPermohonanJmlBagiHasil.classList.add("form-control"),
                    document.getElementById("ifMmq").classList.toggle("hide"),
                    document.getElementById("formPermohonanJmlBagiHasil").classList.toggle("hide"),
                    document.getElementById("formPermohonanJmlMargin").classList = "hide",
                    document.getElementById("formPermohonanJmlMarginAkadLain").classList = "hide",
                    document.getElementById("formPermohonanJmlSewa").classList = "hide",
                    document.getElementById("ifImbt").classList = "hide",
                    document.getElementById("ifMurabahah").classList = "hide",
                    document.getElementById("ifAkadLain").classList = "hide",
                    document.getElementById("ifJenisAkadLain").classList = "hide",
                    document.getElementById("formPermohonanJmlBagiHasil").setAttribute("required", "required"),
                    document.getElementById("formPermohonanJmlMargin").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlMargin").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlSewa").removeAttribute("required");
            } else {
                document.getElementById("ifAkadLain").classList = "hide",
                    document.getElementById("ifJenisAkadLain").classList = "hide",
                    document.getElementById("formPermohonanJmlMargin").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlMargin").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlSewa").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlBagiHasil").removeAttribute("required");
            }
        }

        function changeJangkaWaktu() {
            var jangkaWaktuTahun = document.getElementById("formPermohonanJangkaWaktuTahun");

            if (jangkaWaktuTahun.value == 1) {
                document.getElementById("formPermohonanJumlahBulan").value = 12;
            } else if (jangkaWaktuTahun.value == 2) {
                document.getElementById("formPermohonanJumlahBulan").value = 24;
            } else if (jangkaWaktuTahun.value == 3) {
                document.getElementById("formPermohonanJumlahBulan").value = 36;
            } else if (jangkaWaktuTahun.value == 4) {
                document.getElementById("formPermohonanJumlahBulan").value = 48;
            } else if (jangkaWaktuTahun.value == 5) {
                document.getElementById("formPermohonanJumlahBulan").value = 60;
            } else if (jangkaWaktuTahun.value == 6) {
                document.getElementById("formPermohonanJumlahBulan").value = 72;
            } else if (jangkaWaktuTahun.value == 7) {
                document.getElementById("formPermohonanJumlahBulan").value = 84;
            } else if (jangkaWaktuTahun.value == 8) {
                document.getElementById("formPermohonanJumlahBulan").value = 96;
            } else if (jangkaWaktuTahun.value == 9) {
                document.getElementById("formPermohonanJumlahBulan").value = 108;
            } else if (jangkaWaktuTahun.value == 10) {
                document.getElementById("formPermohonanJumlahBulan").value = 120;
            } else if (jangkaWaktuTahun.value == 11) {
                document.getElementById("formPermohonanJumlahBulan").value = 132;
            } else if (jangkaWaktuTahun.value == 12) {
                document.getElementById("formPermohonanJumlahBulan").value = 144;
            } else if (jangkaWaktuTahun.value == 13) {
                document.getElementById("formPermohonanJumlahBulan").value = 156;
            } else if (jangkaWaktuTahun.value == 14) {
                document.getElementById("formPermohonanJumlahBulan").value = 168;
            } else if (jangkaWaktuTahun.value == 15) {
                document.getElementById("formPermohonanJumlahBulan").value = 180;
            } else if (jangkaWaktuTahun.value == 16) {
                document.getElementById("formPermohonanJumlahBulan").value = 192;
            } else if (jangkaWaktuTahun.value == 17) {
                document.getElementById("formPermohonanJumlahBulan").value = 204;
            } else if (jangkaWaktuTahun.value == 18) {
                document.getElementById("formPermohonanJumlahBulan").value = 216;
            } else if (jangkaWaktuTahun.value == 19) {
                document.getElementById("formPermohonanJumlahBulan").value = 228;
            } else if (jangkaWaktuTahun.value == 20) {
                document.getElementById("formPermohonanJumlahBulan").value = 240;
            } else {

            }
        }


        function changeAgama() {
            var agamaLain = document.getElementById("formPribadiAgamaLain");
            if (agamaLain.value == "Lainnya") {
                document.getElementById("ifAgamaLain").classList.toggle("hide"),
                    document.getElementById("agamaLain").setAttribute("required", "required");
            } else {
                document.getElementById("ifAgamaLain").classList = "hide",
                    document.getElementById("agamaLain").removeAttribute("required");
            }
        }


        function changeStatus() {
            var status = document.getElementById("form_pribadi_pemohon_status_pernikahan");
            if (status.value == "Menikah") {
                document.getElementById("ifMenikahHeader").classList.toggle("hide"),
                    ifMenikahHeader.classList.add("content-header"),

                    document.getElementById("ifMenikah").classList.toggle("hide"),
                    ifMenikah.classList.add("row"),
                    // document.getElementById("fotoPasanganPemohon").removeAttribute("disabled"),
                    // document.getElementById("kategoriPasanganPemohon").removeAttribute("disabled"),

                    document.getElementById("ifISMHeader").classList.toggle("hide"),
                    ifISMHeader.classList.add("content-header"),

                    document.getElementById("ifFotoPasanganPemohon").classList.toggle("hide"),

                    document.getElementById("ifISM").classList.toggle("hide"),
                    ifISM.classList.add("row");
            } else {
                document.getElementById("ifMenikahHeader").classList = "hide",
                    document.getElementById("ifMenikah").classList = "hide",
                    document.getElementById("ifFotoPasanganPemohon").classList = "hide",
                    // document.getElementById("fotoPasanganPemohon").setAttribute("disabled", "disabled"),
                    // document.getElementById("fotoOldPasanganPemohon").setAttribute("disabled", "disabled"),
                    // document.getElementById("kategoriPasanganPemohon").setAttribute("disabled", "disabled"),
                    // document.getElementById("kategoriOldPasanganPemohon").setAttribute("disabled", "disabled"),
                    document.getElementById("ifISMHeader").classList = "hide",
                    document.getElementById("ifISM").classList = "hide";
            }
        }

        function changePerbaruiFotoPemohonPasangan() {
            var perbaruiFotoPemohonPasangan = document.getElementById("perbaruiFotoPemohonPasangan");
            if (perbaruiFotoPemohonPasangan.value == "Ya") {
                document.getElementById("ifPerbaruiFotoPemohon").classList.toggle("hide"),
                    document.getElementById("ifPerbaruiFotoPasanganPemohon").classList.toggle("hide");
            } else {
                document.getElementById("ifPerbaruiFotoPemohon").classList = "hide",
                    document.getElementById("ifPerbaruiFotoPasanganPemohon").classList = "hide";
            }
        }

        function changePerbaruiFotoPemohon() {
            var perbaruiFotoPemohon = document.getElementById("perbaruiFotoPemohon");
            if (perbaruiFotoPemohon.value == "Ya") {
                document.getElementById("ifPerbaruiFotoPemohon").classList.toggle("hide");
            } else {
                document.getElementById("ifPerbaruiFotoPemohon").classList = "hide";
            }
        }

        function changePerbaruiLampiran() {
            var perbaruiLampiran = document.getElementById("perbaruiLampiran");
            if (perbaruiLampiran.value == "Ya") {
                document.getElementById("ifPerbaruiLampiran").classList.add("row"),
                    document.getElementById("ifPerbaruiLampiran").classList.toggle("hide"),
                    document.getElementById("dokumenPemohon").setAttribute("required", "required"),
                    document.getElementById("dokumenAgunan").setAttribute("required", "required"),
                    document.getElementById("otsAgunan").setAttribute("required", "required"),
                    document.getElementById("otsTempatUsaha").setAttribute("required", "required"),
                    document.getElementById("hasilWawancara").setAttribute("required", "required"),
                    document.getElementById("appraisalKjpp").setAttribute("required", "required");
            } else {
                document.getElementById("ifPerbaruiLampiran").classList = "hide",
                    document.getElementById("dokumenPemohon").removeAttribute("required"),
                    document.getElementById("dokumenAgunan").removeAttribute("required"),
                    document.getElementById("otsAgunan").removeAttribute("required"),
                    document.getElementById("otsTempatUsaha").removeAttribute("required"),
                    document.getElementById("hasilWawancara").removeAttribute("required"),
                    document.getElementById("appraisalKjpp").removeAttribute("required");
            }
        }

        function changeHubunganKeluargaTerdekat() {
            var hubunganLain = document.getElementById("hubunganKeluargaTerdekatLain");
            if (hubunganLain.value == "Lainnya") {
                document.getElementById("ifHubunganLainnya").classList.toggle("hide"),
                    document.getElementById("hubunganLainnya").setAttribute("required", "required");
            } else {
                document.getElementById("ifHubunganLainnya").classList = "hide",
                    document.getElementById("hubunganLainnya").removeAttribute("required");
            }
        }

        function changeDijaminkan() {
            var dijaminkan = document.getElementById("formPribadiPemohonStatusTempatTinggalDijaminkan");
            if (dijaminkan.value == "Ya") {
                document.getElementById("ifDijaminkan").classList.toggle("hide"),
                    document.getElementById("formPribadiPemohonStatusTempatTinggalDijaminkanYa").setAttribute("required",
                        "required");
            } else {
                document.getElementById("ifDijaminkan").classList = "hide",
                    document.getElementById("formPribadiPemohonStatusTempatTinggalDijaminkanYa").removeAttribute(
                        "required");
            }
        }

        function changePemohonBidangUsaha() {
            var pemohonBidangUsaha = document.getElementById("formPekerjaanPemohonBidangUsaha");
            if (pemohonBidangUsaha.value == "Lain-lain") {
                document.getElementById("ifPemohonBidangUsahaLain").classList.toggle("hide"),
                    document.getElementById("pemohonBidangUsahaLain").setAttribute("required",
                        "required");
            } else {
                document.getElementById("ifPemohonBidangUsahaLain").classList = "hide",
                    document.getElementById("pemohonBidangUsahaLain").removeAttribute(
                        "required");
            }
        }

        function changePemohonJenisPekerjaan() {
            var pemohonJenisPekerjaan = document.getElementById("formPekerjaanPemohonJenisPekerjaan");
            if (pemohonJenisPekerjaan.value == "Lain-lain") {
                document.getElementById("ifPemohonJenisPekerjaanLain").classList.toggle("hide"),
                    document.getElementById("pemohonJenisPekerjaanLain").setAttribute("required", "required");
            } else {
                document.getElementById("ifPemohonJenisPekerjaanLain").classList = "hide",
                    document.getElementById("pemohonJenisPekerjaanLain").removeAttribute("required");
            }
        }

        function changePasanganBidangUsaha() {
            var pasanganBidangUsaha = document.getElementById("formPekerjaanPasanganBidangUsaha");
            if (pasanganBidangUsaha.value == "Lain-lain") {
                document.getElementById("ifPasanganBidangUsahaLain").classList.toggle("hide"),
                    document.getElementById("pasanganBidangUsahaLain").setAttribute("required", "required");
            } else {
                document.getElementById("ifPasanganBidangUsahaLain").classList = "hide",
                    document.getElementById("pasanganBidangUsahaLain").removeAttribute("required");
            }
        }

        function changePasanganJenisPekerjaan() {
            var pasanganJenisPekerjaan = document.getElementById("formPekerjaanPasanganJenisPekerjaan");
            if (pasanganJenisPekerjaan.value == "Lain-lain") {
                document.getElementById("ifPasanganJenisPekerjaanLain").classList.toggle("hide"),
                    document.getElementById("pasanganJenisPekerjaanLain").setAttribute("required", "required");
            } else {
                document.getElementById("ifPasanganJenisPekerjaanLain").classList = "hide",
                    document.getElementById("pasanganJenisPekerjaanLain").removeAttribute("required");
            }
        }

        function changeJenisAgunan1() {
            var jenisAgunan1 = document.getElementById("formAgunan1Jenis");
            if (jenisAgunan1.value == "Lain-lain") {
                document.getElementById("ifJenisAgunan1Lain").classList.toggle("hide"),
                    document.getElementById("jenisAgunan1Lain").setAttribute("required", "required");
            } else {
                document.getElementById("ifJenisAgunan1Lain").classList = "hide",
                    document.getElementById("jenisAgunan1Lain").removeAttribute("required");
            }
        }

        function changeShgbAgunan1() {
            var shgbAgunan1 = document.getElementById("formAgunan1StatusBuktiKepemilikan");
            if (shgbAgunan1.value == "SHGB") {
                document.getElementById("ifShgbAgunan1Expired").classList.toggle("hide"),
                    document.getElementById("ifShgbAgunan1Hak").classList.toggle("hide"),
                    document.getElementById("tglBerakhirShgbAgunan1").setAttribute("required", "required"),
                    document.getElementById("statusBuktiHakAgunan1").setAttribute("required", "required");
            } else {
                document.getElementById("ifShgbAgunan1Expired").classList = "hide",
                    document.getElementById("ifShgbAgunan1Hak").classList = "hide",
                    document.getElementById("tglBerakhirShgbAgunan1").removeAttribute("required"),
                    document.getElementById("statusBuktiHakAgunan1").removeAttribute("required");
            }
        }

        function changeShgbAgunan2() {
            var shgbAgunan2 = document.getElementById("formAgunan2StatusBuktiKepemilikan");
            if (shgbAgunan2.value == "SHGB") {
                document.getElementById("ifShgbAgunan2Expired").classList.toggle("hide");
                document.getElementById("ifShgbAgunan2Hak").classList.toggle("hide");
            } else {
                document.getElementById("ifShgbAgunan2Expired").classList = "hide";
                document.getElementById("ifShgbAgunan2Hak").classList = "hide";
            }
        }

        function changeJenisAgunan2() {
            var jenisAgunan2 = document.getElementById("formAgunan2Jenis");
            if (jenisAgunan2.value == "Lain-lain") {
                document.getElementById("ifJenisAgunan2Lain").classList.toggle("hide");
            } else {
                document.getElementById("ifJenisAgunan2Lain").classList = "hide";
            }
        }

        function sumPP(value) {
            var penghasilanUtama, penghasilanLain, penghasilanUtamaP, penghasilanLainP, totalPenghasilan, biayaKeluarga,
                kewajibanAngsuran, totalPengeluaran, sisaPenghasilan, kemampuanMengangsur, totalPenghasilanDummy,
                totalPengeluaranDummy, sisaPenghasilanDummy;

            penghasilanUtama = document.getElementById("form_penghasilan_pengeluaran_penghasilan_utama_pemohon").value
                .replace(/,/g, "");
            penghasilanLain = document.getElementById("form_penghasilan_pengeluaran_penghasilan_lain_pemohon").value
                .replace(/,/g, "");
            penghasilanUtamaP = document.getElementById("form_penghasilan_pengeluaran_penghasilan_utama_istri_suami").value
                .replace(/,/g, "");
            penghasilanLainP = document.getElementById("form_penghasilan_pengeluaran_penghasilan_lain_istri_suami").value
                .replace(/,/g, "");
            biayaKeluarga = document.getElementById("form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga").value
                .replace(/,/g, "");
            kewajibanAngsuran = document.getElementById("form_penghasilan_pengeluaran_kewajiban_angsuran").value.replace(
                /,/g, "");
            kemampuanMengangsur = document.getElementById("form_penghasilan_pengeluaran_kemampuan_mengangsur").value
                .replace(/,/g, "");

            //Total Penghasilan
            totalPenghasilan = +penghasilanUtama + +penghasilanLain + +penghasilanUtamaP +
                +penghasilanLainP;
            document.getElementById("form_penghasilan_pengeluaran_total_penghasilan").value = totalPenghasilan;

            totalPenghasilanDummy = totalPenghasilan;
            document.getElementById("form_penghasilan_pengeluaran_total_penghasilan_dummy").value =
                totalPenghasilanDummy;
            totalPenghasilanDummy = document.getElementById("form_penghasilan_pengeluaran_total_penghasilan_dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("form_penghasilan_pengeluaran_total_penghasilan_dummy").value =
                totalPenghasilanDummy;

            //Total Pengeluaran
            totalPengeluaran = +biayaKeluarga + +kewajibanAngsuran;
            document.getElementById("form_penghasilan_pengeluaran_total_pengeluaran").value = totalPengeluaran;

            totalPengeluaranDummy = totalPengeluaran;
            document.getElementById("form_penghasilan_pengeluaran_total_pengeluaran_dummy").value = totalPengeluaranDummy;
            totalPengeluaranDummy = document.getElementById("form_penghasilan_pengeluaran_total_pengeluaran_dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("form_penghasilan_pengeluaran_total_pengeluaran_dummy").value =
                totalPengeluaranDummy;

            //Sisa Penghasilan
            sisaPenghasilan = totalPenghasilan - totalPengeluaran;
            document.getElementById("form_penghasilan_pengeluaran_sisa_penghasilan").value = sisaPenghasilan;

            sisaPenghasilanDummy = sisaPenghasilan;
            document.getElementById("form_penghasilan_pengeluaran_sisa_penghasilan_dummy").value = sisaPenghasilanDummy;
            sisaPenghasilanDummy = document.getElementById("form_penghasilan_pengeluaran_sisa_penghasilan_dummy").value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("form_penghasilan_pengeluaran_sisa_penghasilan_dummy").value =
                sisaPenghasilanDummy;
        }

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
    </script>

@endsection
