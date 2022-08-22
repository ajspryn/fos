@extends('ppr::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <style>
        .data {
            visibility: hidden;
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

        table {
            table-layout: fixed;
            width: 100%;
        }

        /* body {
                                                                                margin: 0;
                                                                                padding: 0;
                                                                            } */

        /* td {
                                                                                overflow: hidden;
                                                                                text-overflow: ellipsis;
                                                                                word-wrap: break-word;
                                                                            } */

        .tablemobile {
            overflow-x: auto;
            display: block;
        }
    </style>

    <div class="content-wrapper container-xxl">
        <div class="content-body">
            <!-- Modern Horizontal Wizard -->
            <section class="modern-horizontal-wizard">
                <div class="bs-stepper wizard-modern modern-wizard-example">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#formAnalisaCharacter" role="tab" id="character-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="user" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Analisa Character</span>
                                    <span class="bs-stepper-subtitle">Isi Data </span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#formAnalisaCapital" role="tab" id="capital-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="file-text" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Analisa Capital</span>
                                    <span class="bs-stepper-subtitle">Isi Data </span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#formAnalisaCapacity" role="tab" id="capacity-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="dollar-sign" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Analisa Capacity</span>
                                    <span class="bs-stepper-subtitle">Isi Data </span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#formAnalisaConditionSharia" role="tab"
                            id="condition-sharia-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="users" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Analisa Condition & Sharia</span>
                                    <span class="bs-stepper-subtitle">Isi Data</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#formAnalisaCollateral" role="tab"
                            id="collateral-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="book" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Analisa Collateral</span>
                                    <span class="bs-stepper-subtitle">Isi Data </span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <form action="/ppr/ccs" method="POST">
                            @csrf
                            <!-- Form Analisa Character -->
                            <div id="formAnalisaCharacter" class="content" role="tabpanel"
                                aria-labelledby="character-trigger">
                                <div>
                                    <h4>Analisa Character</h4>
                                    <hr />
                                    <h5>Tujuan Analisa: Kemauan calon nasabah untuk membayar angsuran (Willingness to Repay)
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
                                                    Bank syariah perlu melakukan analisis terhadap karakter calon nasabah
                                                    dengan tujuan untuk mengetahui bahwa calon nasabah mempunyai keinginan
                                                    untuk memenuhi kewajiban membayar kembali pembiayaan yang telah diterima
                                                    hingga lunas.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="midCenter">
                                                    c.
                                                </td>
                                                <td class="midJustify" colspan="2">
                                                    Bank ingin meyakini willingness to repay dari calon nasabah, yaitu
                                                    keyakinan bank terhadap kemauan calon nasabah mau memenuhi kewajibannya
                                                    sesuai dengan jangka waktu yang telah diperjanjikan.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="midCenter">
                                                    d.
                                                </td>
                                                <td class="midJustify" colspan="2">
                                                    Bank ingin mengetahui bahwa calon nasabah mempunyai karakter yang
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
                                                <th class="midCenter" colspan="2">
                                                    Variabel Penilaian
                                                </th>
                                                <th class="midCenter" width="15%">
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
                                                    Tempat Bekerja
                                                </td>
                                                <td class="midCenter">
                                                    {{-- <input type="number" name="character_tempat_bekerja" id=""
                                                        class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required /> --}}
                                                    <select class="select2 w-100" name="character_tempat_bekerja"
                                                        id="character_tempat_bekerja">
                                                        <option label="character_tempat_bekerja" selected disabled>Pilih
                                                        </option>
                                                        @foreach ($character_tempat_bekerjas as $character_tempat_bekerja)
                                                            <option value="{{ $character_tempat_bekerja->id }}">
                                                                {{ $character_tempat_bekerja->keterangan }}</option>
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
                                                    <input type="number" name="character_konsistensi" id=""
                                                        class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="character_kelengkapan_validitas_data"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="character_pembayaran_angsuran_kolektif"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="character_pengalaman_pembiayaan"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="character_motivasi" id=""
                                                        class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="character_referensi" id=""
                                                        class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                    <button class="btn btn-primary btn-next">
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
                                    <h5>Tujuan analisa: Kemampuan calon nasabah untuk membayar angsuran (Ability to Repay)
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
                                                    Capital atau modal yang perlu disertakan dalam objek pembiayaan perlu
                                                    dilakukan analisis yang lebih mendalam. Modal merupakan jumlah modal
                                                    yang dimiliki oleh calon nasabah atau jumlah dana yang akan disertakan
                                                    dalam proyek yang dibiayai. Semakin besar modal yang dimiliki dan
                                                    disertakan oleh calon nasabah dalam objek pembiayaan akan semakin
                                                    meyakinkan bagi Bank dan keseriusan calon nasabah dalam mengajukan dan
                                                    pembayaran kembali (Ability to Pay).
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="midCenter">
                                                    b.
                                                </td>
                                                <td class="midJustify" colspan="2">
                                                    Dalam hal calon nasabah adalah perusahaan, maka struktur modal ini
                                                    penting untuk menilai tingkat debt to equity ratio. Perusahaan dianggap
                                                    kuat dalam menghadapi berbagai macam risiko apabila jumlah modal sendiri
                                                    yang dimiliki cukup besar. Analisis rasio keuangan dapat dilakukan oleh
                                                    bank untuk dapat mengetahui modal perusahaan. Analisis rasio keuangan
                                                    ini dilakukan apabila calon nasabah merupakan perusahaan.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="midCenter">
                                                    c.
                                                </td>
                                                <td class="midJustify" colspan="2">
                                                    Uang muka yang dibayarkan dalam memperoleh pembiayaan. Dalam hal calon
                                                    nasabah adalah perorangan, dan tujuan penggunannya jela, misalnya
                                                    pembiayaan untuk pembelian rumah, maka analisis capital dapat diartikan
                                                    sebagai jumlah uang muka yang dibayarkan oleh calon nasabah kepada
                                                    pengembang atau uang muka yang telah disiapkan. Semakin besar uang muka
                                                    yang dibayarkan oleh calon nasabah untuk membeli rumah, semakin
                                                    meyakinkan bagi Bank bahwa pembiayaan yang akan disalurkan kemungkinan
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
                                                    Kuitasi Asli Uang Muka
                                                </td>
                                            </tr>
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th class="midCenter" colspan="2">
                                                    Variabel Penilaian
                                                </th>
                                                <th class="midCenter" width="15%">
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
                                                    <input type="number" name="capital_pekerjaan" id=""
                                                        class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="capital_pengalaman_riwayat_pembiayaan"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="capital_keamanan_bisnis_pekerjaan"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="capital_potensi_pertumbuhan_hasil"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="capital_sumber_pendapatan" id=""
                                                        class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="capital_pendapatan_gaji_bersih"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="capital_jml_tanggungan_keluarga"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                    <h5>Tujuan analisa: Kemampuan calon nasabah untuk membayar angsuran (Ability to Repay)
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
                                                    Analisis terhadap capacity ini ditujukan untuk mengetahui kemampuan
                                                    keuangan calon nasabah dalam memenuhi kewajibannya sesuai jangka waktu
                                                    pembiayaan (Ability to Pay).
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="midCenter">
                                                    b.
                                                </td>
                                                <td class="midJustify" colspan="2">
                                                    Bank perlu mengetahui dengan pasti kemampuan keuangan calon nasabah
                                                    dalam memenuhi kewajibannya setelah bank memberikan pembiayaan.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="midCenter">
                                                    c.
                                                </td>
                                                <td class="midJustify" colspan="2">
                                                    Kemampuan keuangan calon nasabah sangat penting karena merupakan sumber
                                                    utama pembiayaan.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="midCenter">
                                                    d.
                                                </td>
                                                <td class="midJustify" colspan="2">
                                                    Semakin baik kemampuan keuangan calon nasabah, maka akan semakin baik
                                                    kemungkinan kualitas pembiayaan, artinya dapat dipastikan bahwa
                                                    pembiayaan yang diberikan bank dapat dibayar sesuai dengan jangka waktu
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
                                                <th class="midCenter" width="15%">
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
                                                    <input type="number" name="capacity_pekerjaan" id=""
                                                        class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="capacity_pengalaman_riwayat_pembiayaan"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="capacity_keamanan_bisnis_pekerjaan"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="capacity_potensi_pertumbuhan_hasil"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="capacity_pengalaman_kerja" id=""
                                                        class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="capacity_pendidikan" id=""
                                                        class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="capacity_usia" id=""
                                                        class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="capacity_sumber_pendapatan"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="capacity_pendapatan_gaji_bersih"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="capacity_jml_tanggungan_keluarga"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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


                            <!-- Form Analisa Condition & Sharia -->
                            <div id="formAnalisaConditionSharia" class="content" role="tabpanel"
                                aria-labelledby="condition-sharia-trigger">
                                <div>
                                    <h4>Analisa Condition & Sharia</h4>
                                    <hr />
                                    <h5>Tujuan analisa: Kemampuan calon nasabah untuk membayar angsuran (Ability to Repay)
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
                                                    Analisis merupakan analisis terhadap kondisi keuangan. Bank perlu
                                                    mempertimbangkan sektor usaha calon nasabah dikaitkan dengan kondisi
                                                    ekonomi.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="midCenter">
                                                    b.
                                                </td>
                                                <td class="midJustify" colspan="2">
                                                    Bank perlu melakukan analisis dampak kondisi ekonomi terhadap usaha
                                                    calon nasabah di masa yang akat datang, untuk mengetahui pengaruh
                                                    kondisi ekonomi terhadap usaha calon nasabah (Ability to Pay)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="midCenter">
                                                    c.
                                                </td>
                                                <td class="midJustify" colspan="2">
                                                    Bank Syariah juga perlu memperhatikan jenis usaha dari calon nasabah
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
                                                <th class="midCenter" width="15%">
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
                                                    <input type="number" name="condition_pekerjaan" id=""
                                                        class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="condition_pengalaman_riwayat_pembiayaan"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="condition_keamanan_bisnis_pekerjaan"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="condition_potensi_pertumbuhan_hasil"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="condition_pengalaman_kerja"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="condition_pendidikan" id=""
                                                        class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="condition_usia" id=""
                                                        class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="condition_sumber_pendapatan"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="condition_pendapatan_gaji_bersih"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="condition_jml_tanggungan_keluarga"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    Merupakan agunan yang diberikan oleh calon nasabah atas pembiayaan yang
                                                    diajukan. Agunan merupakan sumber pembayaran kedua.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="midCenter">
                                                    b.
                                                </td>
                                                <td class="midJustify" colspan="2">
                                                    Dalam hal nasabah tidak dapat membayar agunannya. Maka bank dapat
                                                    melakukan penjualan terhadap agunan. Hasil penjulan agunan digunakan
                                                    sebagai sumber pembayaran kedua untuk melunasi pembiayaan.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="midCenter">
                                                    c.
                                                </td>
                                                <td class="midJustify" colspan="2">
                                                    Bank tidak akan memberikan pembiayaan yang melebihi dari agunan, kecuali
                                                    untuk pembiayaan tertentu yang dijamin pembayarannya oleh pihak
                                                    tertentu.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="midCenter">
                                                    d.
                                                </td>
                                                <td class="midJustify" colspan="2">
                                                    Dalam analisis agunan, faktor yang sangat penting dan harus diperhatikan
                                                    adalah purnajual dari agunan yang diserahkan kepada bank.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="midCenter">
                                                    e.
                                                </td>
                                                <td class="midJustify" colspan="2">
                                                    Bank perlu mengetahui minat pasar terhadap agunan yang diserahkan oleh
                                                    calon nasabah. Bila agunan merupakan barang yang diminati oleh banyak
                                                    orang (marketable), maka bank yakin bahwa agunan yang diserahkan calon
                                                    nasabah mudah diperjualbelikan. Pembiayaan yang ditutup oleh agunan yang
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
                                                <th class="midCenter" width="15%">
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
                                                    Marketabilitas
                                                </td>
                                                <td class="midCenter">
                                                    <input type="number" name="collateral_marketabilitas" id=""
                                                        class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="midCenter">
                                                    b.
                                                </td>
                                                <td class="midJustify">
                                                    Kontribusi Pemohon = LTV
                                                </td>
                                                <td class="midCenter">
                                                    <input type="number" name="collateral_kontribusi_pemohon_ltv"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="collateral_pertumbuhan_agunan"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
                                                    <input type="number" name="collateral_daya_tarik_agunan"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="midCenter">
                                                    e.
                                                </td>
                                                <td class="midJustify">
                                                    Jangka Waktu Likuiditas
                                                </td>
                                                <td class="midCenter">
                                                    <input type="number" name="collateral_jangka_waktu_likuiditas"
                                                        id="" class="form-control pCenter" placeholder="1-5"
                                                        oninput="this.value=this.value.replace(/[^1-5.]/g,'').replace(/(\..*)\./g, '$1');
                                                        javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        maxlength="1" required />
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
            <!-- /Modern Horizontal Wizard -->
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script></script>
    <!-- END: Content-->
@endsection
