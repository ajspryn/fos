@extends('form::layouts.main')

@section('content')
    <!-- BEGIN: Content-->

    <style>
        /* Custom and additional styles for PPR */
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

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="content-body">
            <!-- Modern Horizontal Wizard -->
            <section class="modern-horizontal-wizard">
                <div class="bs-stepper wizard-modern modern-wizard-example">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#formPermohonan" role="tab" id="permohonan-modern-trigger">
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
                        <div class="step" data-target="#formDataPribadi" role="tab" id="pribadi-modern-trigger">
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
                        <div class="step" data-target="#formDataPekerjaan" role="tab" id="pekerjaan-modern-trigger">
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
                        <div class="step" data-target="#formDataAgunan" role="tab" id="agunan-modern-trigger">
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
                        <div class="step" data-target="#formInfo" role="tab" id="info-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="info" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Persyaratan Kelengkapan</span>
                                    <span class="bs-stepper-subtitle">Informasi Persyaratan Kelengkapan Dokumen</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <form id="formPpr" class="needs-validation" action="/form/ppr" method="POST"
                            enctype="multipart/form-data" novalidate>
                            @csrf
                            <!-- Form Permohonan -->
                            @include('form::ppr.1-permohonan')

                            <!-- Form Data Pribadi -->
                            @include('form::ppr.2-data-pribadi')

                            <!-- Form Data Pekerjaan -->
                            @include('form::ppr.3-pekerjaan')

                            <!-- Form Data Penghasilan dan Pengeluaran-->
                            @include('form::ppr.4-penghasilan-pengeluaran')

                            <!-- Form Data Agunan -->
                            @include('form::ppr.5-agunan')

                            <!-- Form Data Kekayaan dan Pinjaman -->
                            @include('form::ppr.6-kekayaan')

                            <!-- Form Persyaratan Kelengkapan -->
                            <div id="formInfo" class="content" role="tabpanel" aria-labelledby="info-trigger">
                                <div>
                                    <h4>Persyaratan Kelengkapan</h4>
                                    <hr />
                                    <h5>Kelengkapan hardcopy dokumen yang harus dilampirkan untuk mempercepat
                                        proses PPR
                                        Syariah:
                                    </h5>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center"></th>
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
                                            <th style="text-align: center">Action</th>
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
                                <td style="text-align: center">
                                    <a href="/form/ppr/{ $proposal->id }" class="btn btn-outline-info round">Detail</a>
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
                                <td style="text-align: center">
                                    <a href="/form/ppr/{ $proposal->id }" class="btn btn-outline-info round">Detail</a>
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
                                <td style="text-align: center">
                                    <a href="/form/ppr/{ $proposal->id }" class="btn btn-outline-info round">Detail</a>
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
                                <td style="text-align: center">
                                    <a href="/form/ppr/{ $proposal->id }" class="btn btn-outline-info round">Detail</a>
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
                                <td style="text-align: center">
                                    <a href="/form/ppr/{ $proposal->id }" class="btn btn-outline-info round">Detail</a>
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
                                <td style="text-align: center">
                                    <a href="/form/ppr/{ $proposal->id }" class="btn btn-outline-info round">Detail</a>
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
                                <td style="text-align: center">
                                    <a href="/form/ppr/{ $proposal->id }" class="btn btn-outline-info round">Detail</a>
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
                                <td style="text-align: center">
                                    <a href="/form/ppr/{ $proposal->id }" class="btn btn-outline-info round">Detail</a>
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
                                <td style="text-align: center">
                                    <a href="/form/ppr/{ $proposal->id }" class="btn btn-outline-info round">Detail</a>
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
                                <td style="text-align: center">
                                    <a href="/form/ppr/{ $proposal->id }" class="btn btn-outline-info round">Detail</a>
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
                                <td style="text-align: center">
                                    <a href="/form/ppr/{ $proposal->id }" class="btn btn-outline-info round">Detail</a>
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
                                <td style="text-align: center">
                                    <a href="/form/ppr/{ $proposal->id }" class="btn btn-outline-info round">Detail</a>
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
                                <td style="text-align: center">
                                    <a href="/form/ppr/{ $proposal->id }" class="btn btn-outline-info round">Detail</a>
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
                                <td style="text-align: center">
                                    <a href="/form/ppr/{ $proposal->id }" class="btn btn-outline-info round">Detail</a>
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
                                <td style="text-align: center">
                                    <a href="/form/ppr/{ $proposal->id }" class="btn btn-outline-info round">Detail</a>
                                </td>
                                </tr>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <center>16</center>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    Dokumen Kepemilikan Agunan (Foto Copy Sertifikat Tanah dan
                                                    IMB/PBG)
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
                                <td style="text-align: center">
                                    <a href="/form/ppr/{ $proposal->id }" class="btn btn-outline-info round">Detail</a>
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
                                <td style="text-align: center">
                                    <a href="/form/ppr/{ $proposal->id }" class="btn btn-outline-info round">Detail</a>
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
                                    <button type="submit" id="btnSubmitForm" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                            <br>
                            <hr>
                            <!-- Tabel -->
                        </form>
                    </div>
                </div>
            </section>
            <!-- /Modern Horizontal Wizard -->
        </div>
    </div>

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

        function changeJenisAkad() {
            var jenisAkadPembayaran = document.getElementById("formPermohonanJenisAkadPembayaran").value;
            if (jenisAkadPembayaran == "Akad Lainnya") {
                document.getElementById("ifJenisAkadLain").classList.toggle("hide"),
                    formPermohonanJmlMarginAkadLain.classList.add("form-control"),
                    document.getElementById("ifAkadLain").classList.toggle("hide"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").classList.toggle("hide"),
                    document.getElementById("formPermohonanJmlMargin").classList = "hide",
                    document.getElementById("formPermohonanJmlMarginDummy").classList = "hide",
                    document.getElementById("formPermohonanJmlSewa").classList = "hide",
                    document.getElementById("formPermohonanJmlBagiHasil").classList = "hide",
                    document.getElementById("ifMurabahah").classList = "hide",
                    document.getElementById("ifImbt").classList = "hide",
                    document.getElementById("ifMmq").classList = "hide",
                    document.getElementById("formPermohonanJmlMarginAkadLain").setAttribute("required", "required"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").removeAttribute("disabled"),
                    document.getElementById("formPermohonanJmlMargin").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlMargin").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlMarginDummy").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlMarginDummy").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlSewa").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlBagiHasil").removeAttribute("required");
            } else if (jenisAkadPembayaran == "Murabahah") {
                document.getElementById("ifMurabahah").classList.toggle("hide"),
                    formPermohonanJmlMargin.classList.add("form-control"),
                    formPermohonanJmlMarginDummy.classList.add("form-control"),
                    document.getElementById("formPermohonanJmlMargin").classList.toggle("hide"),
                    document.getElementById("formPermohonanJmlMarginDummy").classList.toggle("hide"),
                    document.getElementById("formPermohonanJmlSewa").classList = "hide",
                    document.getElementById("formPermohonanJmlBagiHasil").classList = "hide",
                    document.getElementById("formPermohonanJmlMarginAkadLain").classList = "hide",
                    document.getElementById("ifImbt").classList = "hide",
                    document.getElementById("ifMmq").classList = "hide",
                    document.getElementById("ifAkadLain").classList = "hide",
                    document.getElementById("ifJenisAkadLain").classList = "hide",
                    document.getElementById("formPermohonanJmlMargin").removeAttribute("disabled"),
                    document.getElementById("formPermohonanJmlMargin").setAttribute("required", "required"),
                    document.getElementById("formPermohonanJmlMarginDummy").removeAttribute("disabled"),
                    document.getElementById("formPermohonanJmlMarginDummy").setAttribute("required", "required"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlSewa").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlBagiHasil").removeAttribute("required");
            } else if (jenisAkadPembayaran == "IMBT") {
                formPermohonanJmlSewa.classList.add("form-control"),
                    document.getElementById("ifImbt").classList.toggle("hide"),
                    document.getElementById("formPermohonanJmlSewa").classList.toggle("hide"),
                    document.getElementById("formPermohonanJmlMargin").classList = "hide",
                    document.getElementById("formPermohonanJmlMarginDummy").classList = "hide",
                    document.getElementById("formPermohonanJmlMarginAkadLain").classList = "hide",
                    document.getElementById("formPermohonanJmlBagiHasil").classList = "hide",
                    document.getElementById("ifMurabahah").classList = "hide",
                    document.getElementById("ifMmq").classList = "hide",
                    document.getElementById("ifAkadLain").classList = "hide",
                    document.getElementById("ifJenisAkadLain").classList = "hide",
                    document.getElementById("formPermohonanJmlSewa").setAttribute("required", "required"),
                    document.getElementById("formPermohonanJmlMargin").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlMarginDummy").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlMargin").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlMarginDummy").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlBagiHasil").removeAttribute("required");
            } else if (jenisAkadPembayaran == "MMQ") {
                formPermohonanJmlBagiHasil.classList.add("form-control"),
                    document.getElementById("ifMmq").classList.toggle("hide"),
                    document.getElementById("formPermohonanJmlBagiHasil").classList.toggle("hide"),
                    document.getElementById("formPermohonanJmlMargin").classList = "hide",
                    document.getElementById("formPermohonanJmlMarginDummy").classList = "hide",
                    document.getElementById("formPermohonanJmlMarginAkadLain").classList = "hide",
                    document.getElementById("formPermohonanJmlSewa").classList = "hide",
                    document.getElementById("ifImbt").classList = "hide",
                    document.getElementById("ifMurabahah").classList = "hide",
                    document.getElementById("ifAkadLain").classList = "hide",
                    document.getElementById("ifJenisAkadLain").classList = "hide",
                    document.getElementById("formPermohonanJmlBagiHasil").setAttribute("required", "required"),
                    document.getElementById("formPermohonanJmlMargin").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlMarginDummy").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlMargin").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlMarginDummy").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlSewa").removeAttribute("required");
            } else {
                document.getElementById("ifAkadLain").classList = "hide",
                    document.getElementById("ifJenisAkadLain").classList = "hide",
                    document.getElementById("formPermohonanJmlMargin").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlMarginDummy").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").setAttribute("disabled", "disabled"),
                    document.getElementById("formPermohonanJmlMargin").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlMarginDummy").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlMarginAkadLain").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlSewa").removeAttribute("required"),
                    document.getElementById("formPermohonanJmlBagiHasil").removeAttribute("required");
            }
        }

        function changeJangkaWaktu() {
            var jangkaWaktuTahun = document.getElementById("formPermohonanJangkaWaktuTahun");

            if (jangkaWaktuTahun.value == "1 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 12;
            } else if (jangkaWaktuTahun.value == "2 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 24;
            } else if (jangkaWaktuTahun.value == "3 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 36;
            } else if (jangkaWaktuTahun.value == "4 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 48;
            } else if (jangkaWaktuTahun.value == "5 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 60;
            } else if (jangkaWaktuTahun.value == "6 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 72;
            } else if (jangkaWaktuTahun.value == "7 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 84;
            } else if (jangkaWaktuTahun.value == "8 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 96;
            } else if (jangkaWaktuTahun.value == "9 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 108;
            } else if (jangkaWaktuTahun.value == "10 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 120;
            } else if (jangkaWaktuTahun.value == "11 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 132;
            } else if (jangkaWaktuTahun.value == "12 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 144;
            } else if (jangkaWaktuTahun.value == "13 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 156;
            } else if (jangkaWaktuTahun.value == "14 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 168;
            } else if (jangkaWaktuTahun.value == "15 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 180;
            } else if (jangkaWaktuTahun.value == "16 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 192;
            } else if (jangkaWaktuTahun.value == "17 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 204;
            } else if (jangkaWaktuTahun.value == "18 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 216;
            } else if (jangkaWaktuTahun.value == "19 Tahun") {
                document.getElementById("formPermohonanJumlahBulan").value = 228;
            } else if (jangkaWaktuTahun.value == "20 Tahun") {
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
                    document.getElementById("fotoPasanganPemohon").removeAttribute("disabled"),
                    document.getElementById("kategoriPasanganPemohon").removeAttribute("disabled"),

                    document.getElementById("ifISMHeader").classList.toggle("hide"),
                    ifISMHeader.classList.add("content-header"),

                    document.getElementById("ifISM").classList.toggle("hide"),
                    ifISM.classList.add("row");
            } else {
                document.getElementById("ifMenikahHeader").classList = "hide",
                    document.getElementById("ifMenikah").classList = "hide",
                    document.getElementById("fotoPasanganPemohon").setAttribute("disabled", "disabled"),
                    document.getElementById("fotoPasanganPemohon").removeAttribute("required"),
                    document.getElementById("kategoriPasanganPemohon").setAttribute("disabled", "disabled"),
                    document.getElementById("ifISMHeader").classList = "hide",
                    document.getElementById("ifISM").classList = "hide";
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



        //Autofill Domisili
        $(document).ready(function() {
            $("#cbAutoFillDomisili").change(function() {
                var alamatKtp = $("#form_pribadi_pemohon_alamat_ktp").val();
                var alamatDomisili = $("#form_pribadi_pemohon_alamat_domisili").val();
                var rtKtp = $("#form_pribadi_pemohon_alamat_ktp_rt").val();
                var rwKtp = $("#form_pribadi_pemohon_alamat_ktp_rw").val();
                var kelurahanKtp = $("#form_pribadi_pemohon_alamat_ktp_kelurahan").val();
                var kecamatanKtp = $("#form_pribadi_pemohon_alamat_ktp_kecamatan").val();
                var kabKotaKtp = $("#form_pribadi_pemohon_alamat_ktp_dati2").val();
                var provinsiKtp = $("#form_pribadi_pemohon_alamat_ktp_provinsi").val();
                var kdPosKtp = $("#form_pribadi_pemohon_alamat_ktp_kode_pos").val();

                if ($(this).is(":checked")) {
                    $("#form_pribadi_pemohon_alamat_domisili").val(alamatKtp);
                    $("#form_pribadi_pemohon_alamat_domisili_rt").val(rtKtp);
                    $("#form_pribadi_pemohon_alamat_domisili_rw").val(rwKtp);
                    $("#form_pribadi_pemohon_alamat_domisili_kelurahan").val(kelurahanKtp);
                    $("#form_pribadi_pemohon_alamat_domisili_kecamatan").val(kecamatanKtp);
                    $("#form_pribadi_pemohon_alamat_domisili_dati2").val(kabKotaKtp);
                    $("#form_pribadi_pemohon_alamat_domisili_provinsi").val(provinsiKtp);
                    $("#form_pribadi_pemohon_alamat_domisili_kode_pos").val(kdPosKtp);
                    $("#form_pribadi_pemohon_alamat_domisili").attr("readonly", true);
                    $("#form_pribadi_pemohon_alamat_domisili_rt").attr("readonly", true);
                    $("#form_pribadi_pemohon_alamat_domisili_rw").attr("readonly", true);
                    $("#form_pribadi_pemohon_alamat_domisili_kelurahan").attr("readonly", true);
                    $("#form_pribadi_pemohon_alamat_domisili_kecamatan").attr("readonly", true);
                    $("#form_pribadi_pemohon_alamat_domisili_dati2").attr("readonly", true);
                    $("#form_pribadi_pemohon_alamat_domisili_provinsi").attr("readonly", true);
                    $("#form_pribadi_pemohon_alamat_domisili_kode_pos").attr("readonly", true);
                } else {
                    $("#form_pribadi_pemohon_alamat_domisili").val("");
                    $("#form_pribadi_pemohon_alamat_domisili_rt").val("");
                    $("#form_pribadi_pemohon_alamat_domisili_rw").val("");
                    $("#form_pribadi_pemohon_alamat_domisili_kelurahan").val("");
                    $("#form_pribadi_pemohon_alamat_domisili_kecamatan").val("");
                    $("#form_pribadi_pemohon_alamat_domisili_dati2").val("");
                    $("#form_pribadi_pemohon_alamat_domisili_provinsi").val("");
                    $("#form_pribadi_pemohon_alamat_domisili_kode_pos").val("");

                    $("#form_pribadi_pemohon_alamat_domisili").attr("readonly", false);
                    $("#form_pribadi_pemohon_alamat_domisili_rt").attr("readonly", false);
                    $("#form_pribadi_pemohon_alamat_domisili_rw").attr("readonly", false);
                    $("#form_pribadi_pemohon_alamat_domisili_kelurahan").attr("readonly", false);
                    $("#form_pribadi_pemohon_alamat_domisili_kecamatan").attr("readonly", false);
                    $("#form_pribadi_pemohon_alamat_domisili_dati2").attr("readonly", false);
                    $("#form_pribadi_pemohon_alamat_domisili_provinsi").attr("readonly", false);
                    $("#form_pribadi_pemohon_alamat_domisili_kode_pos").attr("readonly", false);
                }
            });
        });

        //Validasi RT KTP
        var rtKtp = document.getElementById("form_pribadi_pemohon_alamat_ktp_rt");
        var falseRtKtp = document.getElementById("falseRtKtp");

        rtKtp.addEventListener("input", function() {
            if (rtKtp.validity.patternMismatch) {
                falseRtKtp.style.display = "inline";
            } else {
                falseRtKtp.style.display = "none";
            }
        });

        //Validasi RW KTP
        var rwKtp = document.getElementById("form_pribadi_pemohon_alamat_ktp_rw");
        var falseRwKtp = document.getElementById("falseRwKtp");

        rwKtp.addEventListener("input", function() {
            if (rwKtp.validity.patternMismatch) {
                falseRwKtp.style.display = "inline";
            } else {
                falseRwKtp.style.display = "none";
            }
        });

        //Validasi RT Domisili
        var rtDomisili = document.getElementById("form_pribadi_pemohon_alamat_domisili_rt");
        var falseRtDomisili = document.getElementById("falseRtDomisili");

        rtDomisili.addEventListener("input", function() {
            if (rtDomisili.validity.patternMismatch) {
                falseRtDomisili.style.display = "inline";
            } else {
                falseRtDomisili.style.display = "none";
            }
        });

        //Validasi RW Domisili
        var rwDomisili = document.getElementById("form_pribadi_pemohon_alamat_domisili_rw");
        var falseRwDomisili = document.getElementById("falseRwDomisili");

        rwDomisili.addEventListener("input", function() {
            if (rwDomisili.validity.patternMismatch) {
                falseRwDomisili.style.display = "inline";
            } else {
                falseRwDomisili.style.display = "none";
            }
        });

        //Validasi RT OT
        var rtOt = document.getElementById("form_pribadi_keluarga_terdekat_alamat_rt");
        var falseRtOt = document.getElementById("falseRtOt");

        rtOt.addEventListener("input", function() {
            if (rtOt.validity.patternMismatch) {
                falseRtOt.style.display = "inline";
            } else {
                falseRtOt.style.display = "none";
            }
        });

        //Validasi RW OT
        var rwOt = document.getElementById("form_pribadi_keluarga_terdekat_alamat_rw");
        var falseRwOt = document.getElementById("falseRwOt");

        rwOt.addEventListener("input", function() {
            if (rwOt.validity.patternMismatch) {
                falseRwOt.style.display = "inline";
            } else {
                falseRwOt.style.display = "none";
            }
        });

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

        function calHargaJual(value) {
            var plafond, tenorBulan, hargaJual, jmlMargin, hargaJualDummy, jmlMarginDummy;

            plafond = parseFloat(document.getElementById("form_permohonan_nilai_ppr_dimohon")
                .value.replace(/\./g, "").replace(/,/g, '.')) || 0;
            tenorBulan = document.getElementById("formPermohonanJumlahBulan")
                .value;
            // jmlMargin = parseFloat(document.getElementById("formPermohonanJmlMargin")
            //     .value.replace(/\./g, "").replace(/,/g, '.')) || 0;
            // hargaJual = parseFloat(document.getElementById("form_permohonan_harga_jual")
            //     .value.replace(/\./g, "").replace(/,/g, '.')) || 0;

            jmlMargin = +plafond * tenorBulan * ((11.5 / 12) / 100); //rate margin 0.9583333/bulan
            hargaJual = +plafond + +jmlMargin;

            document.getElementById("formPermohonanJmlMargin").value = jmlMargin;

            jmlMarginDummy = jmlMargin;
            document.getElementById("formPermohonanJmlMarginDummy").value =
                jmlMarginDummy;
            jmlMarginDummy = parseInt(
                    document.getElementById("formPermohonanJmlMarginDummy").value
                )
                .toString()
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            document.getElementById("formPermohonanJmlMarginDummy").value =
                jmlMarginDummy;


            document.getElementById("form_permohonan_harga_jual").value = hargaJual;

            hargaJualDummy = hargaJual;
            document.getElementById("form_permohonan_harga_jual").value =
                hargaJualDummy;
            hargaJualDummy = parseInt(
                    document.getElementById("form_permohonan_harga_jual").value
                )
                .toString()
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            document.getElementById("form_permohonan_harga_jual").value =
                hargaJualDummy;
        }

        function sumPP(value) {
            var penghasilanUtama, penghasilanLain, penghasilanUtamaP, penghasilanLainP, totalPenghasilan,
                biayaKeluarga,
                kewajibanAngsuran, totalPengeluaran, sisaPenghasilan, kemampuanMengangsur, totalPenghasilanDummy,
                totalPengeluaranDummy, sisaPenghasilanDummy;

            penghasilanUtama = parseFloat(document.getElementById("form_penghasilan_pengeluaran_penghasilan_utama_pemohon")
                .value.replace(/\./g, "").replace(/,/g, '.')) || 0;
            penghasilanLain = parseFloat(document.getElementById("form_penghasilan_pengeluaran_penghasilan_lain_pemohon")
                .value.replace(/\./g, "").replace(/,/g, '.')) || 0;

            penghasilanUtamaP = parseFloat(document.getElementById(
                    "form_penghasilan_pengeluaran_penghasilan_utama_istri_suami")
                .value.replace(/\./g, "").replace(/,/g, '.')) || 0;

            penghasilanLainP = parseFloat(document.getElementById(
                    "form_penghasilan_pengeluaran_penghasilan_lain_istri_suami")
                .value.replace(/\./g, "").replace(/,/g, '.')) || 0;

            biayaKeluarga = parseFloat(document.getElementById("form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga")
                .value.replace(/\./g, "").replace(/,/g, '.')) || 0;

            kewajibanAngsuran = parseFloat(document.getElementById("form_penghasilan_pengeluaran_kewajiban_angsuran")
                .value.replace(/\./g, "").replace(/,/g, '.')) || 0;

            kemampuanMengangsur = parseFloat(document.getElementById("form_penghasilan_pengeluaran_kemampuan_mengangsur")
                .value.replace(/\./g, "").replace(/,/g, '.')) || 0;

            //Total Penghasilan
            totalPenghasilan = +penghasilanUtama + +penghasilanLain + +penghasilanUtamaP +
                +penghasilanLainP;
            document.getElementById("form_penghasilan_pengeluaran_total_penghasilan").value = totalPenghasilan;

            totalPenghasilanDummy = totalPenghasilan;
            document.getElementById("form_penghasilan_pengeluaran_total_penghasilan_dummy").value =
                totalPenghasilanDummy;
            totalPenghasilanDummy = document.getElementById("form_penghasilan_pengeluaran_total_penghasilan_dummy")
                .value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            document.getElementById("form_penghasilan_pengeluaran_total_penghasilan_dummy").value =
                totalPenghasilanDummy;

            //Total Pengeluaran
            totalPengeluaran = +biayaKeluarga + +kewajibanAngsuran;
            document.getElementById("form_penghasilan_pengeluaran_total_pengeluaran").value = totalPengeluaran;

            totalPengeluaranDummy = totalPengeluaran;
            document.getElementById("form_penghasilan_pengeluaran_total_pengeluaran_dummy").value =
                totalPengeluaranDummy;
            totalPengeluaranDummy = document.getElementById("form_penghasilan_pengeluaran_total_pengeluaran_dummy")
                .value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            document.getElementById("form_penghasilan_pengeluaran_total_pengeluaran_dummy").value =
                totalPengeluaranDummy;

            //Sisa Penghasilan
            sisaPenghasilan = totalPenghasilan - totalPengeluaran;
            document.getElementById("form_penghasilan_pengeluaran_sisa_penghasilan").value = sisaPenghasilan;

            sisaPenghasilanDummy = sisaPenghasilan;
            document.getElementById("form_penghasilan_pengeluaran_sisa_penghasilan_dummy").value =
                sisaPenghasilanDummy;
            sisaPenghasilanDummy = document.getElementById("form_penghasilan_pengeluaran_sisa_penghasilan_dummy")
                .value
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            document.getElementById("form_penghasilan_pengeluaran_sisa_penghasilan_dummy").value =
                sisaPenghasilanDummy;
        }

        // $(document).ready(function() {
        //     $('#status').on('change', function() {
        //         $("#" + $(this).val()).fadeIn(700);
        //     }).change();
        // });
    </script>
    <!-- END: Content-->
@endsection
