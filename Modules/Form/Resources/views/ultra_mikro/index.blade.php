@extends('form::layouts.main')

@section('content')
    <style>
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
            <!-- Form Pengajuan -->
            <section class="modern-horizontal-wizard">
                <div class="bs-stepper wizard-modern modern-wizard-example">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#form" role="tab" id="account-details-modern-trigger">
                            <button type="button" class="step-trigger">

                            </button>
                        </div>

                    </div>
                    <div class="bs-stepper-content">
                        <form method="POST" action="/form/ultra_mikro" id="formUltraMikro" class="needs-validation"
                            enctype="multipart/form-data" novalidate>
                            @csrf
                            <div id="form" class="content" role="tabpanel" aria-labelledby="account-details-trigger">
                                <div class="content-header">
                                    <small class="text-danger">* Wajib Diisi</small>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Pengajuan Pembiayaan Ultra Mikro</h5>
                                    <small>Isikan Pengajuan Pembiayaan.</small>
                                </div>
                                <div class="row">
                                    <input type="hidden" name="jenis_pby_ultra_mikro" id="jenisPbyUltraMikro"
                                        value="{{ request('jenis_pby_ultra_mikro') }}" required />

                                    {{-- <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nomorAplikasi"><small class="text-danger">*
                                            </small>Nomor Aplikasi</label>
                                        <input type="text" name="nomor_aplikasi" class="form-control"
                                            placeholder="Nomor Aplikasi" id="nomorAplikasi" required />
                                    </div> --}}
                                    <input type="hidden" name="nomor_aplikasi" id="nomorAplikasi" required />
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tanggalKunjungan"><small class="text-danger">*
                                            </small>Tanggal Kunjungan</label>
                                        <input type="text" id="tanggalKunjungan" class="form-control flatpickr-basic"
                                            name="tanggal_kunjungan" placeholder="DD-MM-YYYY" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="ao"><small class="text-danger">*
                                            </small>Nama
                                            AO</label>
                                        <select class="select2 w-100" name="user_id" id="ao"
                                            data-placeholder="Pilih AO" required>
                                            <option value=""></option>
                                            @foreach ($aos as $ao)
                                                <option value="{{ $ao->user->id }}">{{ $ao->user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="petugasLapangan"><small class="text-danger">*
                                            </small>Petugas Lapangan</label>
                                        <select class="select2 w-100" name="petugas_lapangan_id" id="petugasLapangan"
                                            data-placeholder="Pilih Petugas Lapangan" required>
                                            <option value=""></option>
                                            @foreach ($petugasLapangans as $petugasLapangan)
                                                <option value="{{ $petugasLapangan->id }}">{{ $petugasLapangan->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tujuanPembiayaan"><small class="text-danger">*
                                            </small>Tujuan Pembiayaan</label>
                                        <select class="select2 w-100" name="tujuan_pembiayaan" id="tujuanPembiayaan"
                                            data-placeholder="Pilih Tujuan Pembiayaan" required>
                                            <option value=""></option>
                                            <option value="Produktif (Modal Kerja)">Produktif (Modal Kerja)</option>
                                            <option value="Konsumtif">Konsumtif</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="akad"><small class="text-danger">*
                                            </small>Akad</label>
                                        <select class="select2 w-100" name="akad" id="akad"
                                            data-placeholder="Pilih Akad" required>
                                            <option value=""></option>
                                            <option value="Murabahah">Murabahah</option>
                                            <option value="Musyarakah">Musyarakah</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nominalPembiayaan"><small class="text-danger">*
                                            </small>Nominal Pembiayaan</label>
                                        <input type="text" name="nominal_pembiayaan" class="form-control numeral-mask"
                                            placeholder="Masukkan Nominal Pembiayaan" id="nominalPembiayaan" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tenor"><small class="text-danger">*
                                            </small>Tenor (Bulan)</label>
                                        {{-- <input type="number" name="tenor" class="form-control"
                                            placeholder="Masukkan Tenor (Bulan)" id="tenor" required /> --}}
                                        <select class="select2 w-100" name="tenor" id="tenor"
                                            data-placeholder="Pilih Tenor" required>
                                            <option value=""></option>
                                            <option value="36">36 Bulan</option>
                                            <option value="48">48 Bulan</option>
                                            <option value="60">60 Bulan</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="statusKelompok"><small class="text-danger">*
                                            </small>Status Kelompok</label>
                                        <select class="select2 w-100" name="status_kelompok_id" id="statusKelompok"
                                            data-placeholder="Pilih Status Kelompok" required>
                                            <option value=""></option>
                                            @foreach ($statusKelompoks as $statusKelompok)
                                                <option value="{{ $statusKelompok->id }}">
                                                    {{ $statusKelompok->status_kelompok }}
                                                </option>
                                            @endforeach
                                            {{-- <option value="Bubar">Bubar</option>
                                            <option value="Ada Sebagian Kecil (25%)">Ada Sebagian Kecil (25%)</option>
                                            <option value="Ada Setengahnya (50%)">Ada Setengahnya (50%)</option>
                                            <option value="Ada Sebagian Besar (75%)">Ada Sebagian Besar (75%)</option>
                                            <option value="Lengkap (100%)">Lengkap (100%)</option> --}}
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="repayment"><small class="text-danger">*
                                            </small>Repayment Per Kunjungan</label>
                                        <select class="select2 w-100" name="repayment_id" id="repayment"
                                            data-placeholder="Pilih Repayment Per Kunjungan" required>
                                            <option value=""></option>
                                            @foreach ($repayments as $repayment)
                                                <option value="{{ $repayment->id }}">
                                                    {{ $repayment->kategori_repayment }}
                                                </option>
                                            @endforeach
                                            {{-- <option value="Rp 50.000 - 100.000">Rp 50.000 - 100.000</option>
                                            <option value="Rp 101.000 - 150.000">Rp 101.000 - 150.000</option>
                                            <option value="Rp 151.000 - 200.000">Rp 151.000 - 200.000</option>
                                            <option value="Rp 201.000 - 250.000">Rp 201.000 - 250.000</option>
                                            <option value="≥ Rp 250.000">≥ Rp 250.000</option> --}}
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="frekuensiPembayaran"><small class="text-danger">*
                                            </small>Frekuensi Pembayaran</label>
                                        <select class="select2 w-100" name="frekuensi_pembayaran"
                                            id="frekuensiPembayaran" data-placeholder="Pilih Frekuensi Pembayaran"
                                            required>
                                            <option value=""></option>
                                            <option value="Setiap 1 Minggu">Setiap 1 Minggu</option>
                                            <option value="Setiap 2 Minggu">Setiap 2 Minggu</option>
                                        </select>
                                    </div>
                                </div>
                                <hr />
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Diri</h5>
                                    <small class="text-muted">Lengkapi Data Diri Sesuai Dengan KTP.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nama"><small class="text-danger">*
                                            </small>Nama Lengkap Nasabah</label>
                                        <input type="text" name="nama_nasabah" id="nama" class="form-control"
                                            oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                            placeholder="Nama Lengkap" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="noKtp"><small class="text-danger">* </small>No.
                                            KTP</label>
                                        <span id="falseNoKtp" class="text-danger"
                                            style="display: none; font-size:9px;">Isikan
                                            16
                                            digit!
                                        </span></label>
                                        <input type="text" class="form-control" pattern="^\d{16}$"
                                            oninput="this.value=this.value.replace(/[^0-9,]/g,'');" name="no_ktp"
                                            id="noKtp" aria-describedby="noKtp" placeholder="Masukkan Nomor KTP"
                                            required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tempatlahir"><small class="text-danger">*
                                            </small>Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                            placeholder="Masukkan Tempat Lahir"
                                            oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                            required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tgllahir"><small class="text-danger">*
                                            </small>Tanggal Lahir</label>
                                        <input type="date" id="tgl_lahir" class="form-control flatpickr-basic"
                                            name="tgl_lahir" placeholder="DD-MM-YYYY" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jenis_kelamin"><small class="text-danger">*
                                            </small>Jenis Kelamin</label>
                                        <div>
                                            &ensp;
                                            <input type="radio" name="jenis_kelamin" class="form-check-input"
                                                id="pria" value="Pria" required />
                                            <label class="form-label" for="pria">&nbsp;Pria</label>
                                            <br>
                                            &ensp;
                                            <input type="radio" name="jenis_kelamin" class="form-check-input"
                                                id="wanita" value="Wanita" required />
                                            <label class="form-label" for="wanita">&nbsp;Wanita</label>
                                        </div>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="agama"><small class="text-danger">*
                                            </small>Agama</label>
                                        <select class="select2 w-100" name="agama" id="agama"
                                            data-placeholder="Pilih Agama" required>
                                            <option value="">
                                            </option>
                                            <option value="Islam">Islam</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Katholik">Katholik</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Kong Hu Chu">Kong Hu Chu</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="statusPernikahan"><small class="text-danger">*
                                            </small>Status Pernikahan</label>
                                        <select class="select2 w-100" name="status_pernikahan" id="statusPernikahan"
                                            onChange="changeStatusPernikahan()" data-placeholder="Pilih Status Pernikahan"
                                            required>
                                            <option value=""></option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Janda/Duda - Meninggal">Janda/Duda - Meninggal</option>
                                            <option value="Janda/Duda - Cerai">Janda/Duda - Cerai</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jmlTanggungan"><small class="text-danger">*
                                            </small>Jumlah Anak/Tanggungan</label>
                                        <input type="number" name="jml_tanggungan" id="jmlTanggungan"
                                            class="form-control" placeholder="Jumlah Anak/Tanggungan" required />
                                    </div>
                                    <div class="mb-1 col-md-6 hide" id="ifMenikahNamaPasangan">
                                        <label class="form-label" for="namaPasangan">Nama Lengkap Pasangan</label>
                                        <input type="text" name="nama_pasangan_nasabah" id="namaPasangan"
                                            class="form-control" placeholder="Nama Lengkap Pasangan"
                                            oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');" />
                                    </div>
                                    <div class="mb-1 col-md-6 hide" id="ifMenikahKtpPasangan">
                                        <label class="form-label" for="noKtpPasangan">No
                                            KTP Pasangan</label>
                                        <input type="number" name="no_ktp_pasangan" id="noKtpPasangan"
                                            class="form-control" placeholder="Masukkan Nomor KTP pasangan" />
                                    </div>

                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="alamatKtp"><small class="text-danger">*
                                            </small>Alamat KTP</label>
                                        <textarea name="alamat_ktp" id="alamatKtp" class="form-control" oninput="this.value=this.value.toUpperCase();"
                                            required></textarea>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="alamatDomisili"><small class="text-danger">*
                                            </small>Alamat Domisili&emsp;<input type="checkbox" id="cbAutoFillDomisili"
                                                class="form-check-input" style="width:15px; height:15px;">&nbsp;
                                            <span style="font-size:10px;">Sama
                                                dengan Alamat KTP
                                            </span>
                                        </label>
                                        <textarea name="alamat_domisili" id="alamatDomisili" class="form-control"
                                            oninput="this.value=this.value.toUpperCase();" required></textarea>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="statusTempatTinggal"><small class="text-danger">*
                                            </small>Status Tempat Tinggal</label>
                                        <select class="select2 w-100" name="status_tempat_tinggal_id"
                                            id="statusTempatTinggal" data-placeholder="Pilih Status Tempat Tinggal"
                                            required>
                                            <option value="">
                                            </option>
                                            @foreach ($statusTempatTinggals as $statusTempatTinggal)
                                                <option value="{{ $statusTempatTinggal->id }}">
                                                    {{ $statusTempatTinggal->status_tempat_tinggal }}
                                                </option>
                                            @endforeach
                                            {{-- <option value="Rumah Kontrak & Alamat Pindah">Rumah Kontrak & Alamat Pindah
                                            </option>
                                            <option value="Rumah Kontrak & Alamat Tetap">Rumah Kontrak & Alamat Tetap
                                            </option>
                                            <option value="Rumah Keluarga & Alamat Beda">Rumah Keluarga & Alamat Beda
                                            </option>
                                            <option value="Rumah Keluarga & Alamat Tetap">Rumah Keluarga & Alamat Tetap
                                            </option>
                                            <option value="Rumah Sendiri & Alamat Tetap">Rumah Sendiri & Alamat Tetap
                                            </option> --}}
                                        </select>
                                    </div>

                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="namaPekerjaan"><small class="text-danger">*
                                            </small>Nama Pekerjaan/Usaha</label>
                                        <input type="text" name="nama_pekerjaan" id="namaPekerjaan"
                                            class="form-control" placeholder="Masukkan Pekerjaan/Usaha"
                                            oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                                            required />
                                    </div>

                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="penghasilanPerBulan"><small class="text-danger">*
                                            </small>Penghasilan Per Bulan</label>
                                        <input type="text" name="penghasilan" class="form-control numeral-mask"
                                            placeholder="Masukkan Penghasilan Per Bulan" id="penghasilanPerBulan"
                                            required />
                                    </div>

                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="pengeluaranPerBulan"><small class="text-danger">*
                                            </small>Pengeluaran Per
                                            Bulan</label>
                                        <input type="text" name="pengeluaran" class="form-control numeral-mask"
                                            placeholder="Masukkan Pengeluaran Per Bulan" id="pengeluaranPerBulan"
                                            required />
                                    </div>

                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="noHp"><small class="text-danger">*
                                            </small>No. Handphone</label>
                                        <input type="text" name="no_hp" id="noHp"
                                            class="form-control prefix-mask1" placeholder="Masukkan Nomor Handphone"
                                            required />
                                    </div>
                                </div>

                                <hr />
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Lampiran</h5>
                                    <small class="text-muted">Upload Lampiran Yang Sesuai.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotoPemohonTerbaru"><small class="text-danger">*
                                            </small>Upload Foto Pemohon Terbaru</label>
                                        <input type="file" name="foto[1][foto]" id="fotoPemohonTerbaru"
                                            class="form-control" required />
                                        <input type="hidden" name="foto[1][kategori]" value="Foto Pemohon Terbaru"
                                            class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotoktp"><small class="text-danger">*
                                            </small>Upload Foto KTP</label>
                                        <input type="file" name="foto[2][foto]" id="fotoktp" class="form-control"
                                            required />
                                        <input type="hidden" name="foto[2][kategori]" value="Foto KTP"
                                            class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotoKtpPasanganPemohon"><small
                                                class="text-danger">
                                            </small>Upload Foto KTP Pasangan</label>
                                        <input type="file" name="foto[5][foto]" id="fotoKtpPasanganPemohon"
                                            class="form-control" />
                                        <input type="hidden" name="foto[5][kategori]" id="kategoriKtpPasanganPemohon"
                                            value="Foto KTP Pasangan" class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotokk"><small class="text-danger">*
                                            </small>Upload Foto Kartu Keluarga</label>
                                        <input type="file" name="foto[3][foto]" id="fotokk" class="form-control"
                                            required />
                                        <input type="hidden" name="foto[3][kategori]" value="Foto Kartu Keluarga"
                                            class="form-control" />
                                    </div>

                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotoAktaNikahCerai">Upload Akta Nikah/Cerai</label>
                                        <input type="file" name="foto[4][foto]" id="fotoAktaNikahCerai"
                                            class="form-control" />
                                        <input type="hidden" name="foto[4][kategori]" id="kategoriAktaNikahCerai"
                                            value="Akta Status Pernikahan/Perceraian" class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotoRumah"><small class="text-danger">*
                                            </small>Upload Foto Rumah/Tempat Tinggal</label>
                                        <input type="file" name="foto[6][foto]" id="fotoRumah" class="form-control"
                                            required />
                                        <input type="hidden" name="foto[6][kategori]" value="Foto Rumah/Tempat Tinggal"
                                            class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotoPekerjaan">Upload Foto Pekerjaan/Usaha</label>
                                        <input type="file" name="foto[7][foto]" id="fotoPekerjaan"
                                            class="form-control" />
                                        <input type="hidden" name="foto[7][kategori]" value="Foto Pekerjaan/Usaha"
                                            class="form-control" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotoSuratPermohonanRestruct"><small
                                                class="text-danger">*
                                            </small>Surat Permohonan Restruct</label>
                                        <input type="file" name="foto[8][foto]" id="fotoSuratPermohonanRestruct"
                                            class="form-control" required />
                                        <input type="hidden" name="foto[8][kategori]" value="Surat Permohonan Restruct"
                                            class="form-control" />
                                    </div>
                                </div>

                                <hr />

                                <br />
                                <br />
                                <div class="d-flex justify-content-center">
                                    <button type="submit" id="btnSubmitForm" class="btn btn-success">Submit</button>
                                </div>
                                <br />
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!-- /Form Pengajuan -->
        </div>
        <!-- END: Content-->
    </div>
    <!-- END: Content-->

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

        function changeStatusPernikahan() {
            var status = document.getElementById("statusPernikahan");
            if (status.value == "Belum Menikah") { //Belum Menikah
                document.getElementById("ifMenikahNamaPasangan").classList = "hide",
                    document.getElementById("ifMenikahKtpPasangan").classList = "hide",
                    document.getElementById("namaPasangan").setAttribute("disabled", "disabled"),
                    document.getElementById("namaPasangan").removeAttribute("required"),
                    document.getElementById("noKtpPasangan").setAttribute("disabled", "disabled"),
                    document.getElementById("noKtpPasangan").removeAttribute("required"),
                    document.getElementById("fotoKtpPasanganPemohon").setAttribute("disabled", "disabled"),
                    document.getElementById("fotoKtpPasanganPemohon").removeAttribute("required"),
                    document.getElementById("kategoriKtpPasanganPemohon").setAttribute("disabled", "disabled"),
                    document.getElementById("fotoAktaNikahCerai").setAttribute("disabled", "disabled"),
                    document.getElementById("fotoAktaNikahCerai").removeAttribute("required"),
                    document.getElementById("kategoriAktaNikahCerai").setAttribute("disabled", "disabled");
            } else if (status.value == "Menikah") { //Sudah Menikah
                document.getElementById("ifMenikahNamaPasangan").classList.toggle("hide"),
                    document.getElementById("ifMenikahKtpPasangan").classList.toggle("hide"),
                    document.getElementById("namaPasangan").setAttribute("required", "required"),
                    document.getElementById("namaPasangan").removeAttribute("disabled"),
                    document.getElementById("noKtpPasangan").setAttribute("required", "required"),
                    document.getElementById("noKtpPasangan").removeAttribute("disabled"),
                    document.getElementById("fotoKtpPasanganPemohon").setAttribute("required", "required"),
                    document.getElementById("fotoKtpPasanganPemohon").removeAttribute("disabled"),
                    document.getElementById("kategoriKtpPasanganPemohon").removeAttribute("disabled"),
                    document.getElementById("fotoAktaNikahCerai").setAttribute("required", "required"),
                    document.getElementById("fotoAktaNikahCerai").removeAttribute("disabled"),
                    document.getElementById("kategoriAktaNikahCerai").removeAttribute("disabled");
            } else { //Cerai
                document.getElementById("ifMenikahNamaPasangan").classList = "hide",
                    document.getElementById("ifMenikahKtpPasangan").classList = "hide",
                    document.getElementById("namaPasangan").setAttribute("disabled", "disabled"),
                    document.getElementById("namaPasangan").removeAttribute("required"),
                    document.getElementById("noKtpPasangan").setAttribute("disabled", "disabled"),
                    document.getElementById("noKtpPasangan").removeAttribute("required"),
                    document.getElementById("fotoKtpPasanganPemohon").setAttribute("disabled", "disabled"),
                    document.getElementById("fotoKtpPasanganPemohon").removeAttribute("required"),
                    document.getElementById("kategoriKtpPasanganPemohon").setAttribute("disabled", "disabled"),
                    document.getElementById("fotoAktaNikahCerai").setAttribute("required", "required"),
                    document.getElementById("fotoAktaNikahCerai").removeAttribute("disabled"),
                    document.getElementById("kategoriAktaNikahCerai").removeAttribute("disabled");
            }
        }


        //Validasi No KTP
        var noKtp = document.getElementById("noKtp");
        var falseNoKtp = document.getElementById("falseNoKtp");

        noKtp.addEventListener("input", function() {
            if (noKtp.validity.patternMismatch) {
                falseNoKtp.style.display = "inline";
            } else {
                falseNoKtp.style.display = "none";
            }
        });



        //Autofill Domisili
        $(document).ready(function() {
            $("#cbAutoFillDomisili").change(function() {
                var alamatKtp = $("#alamatKtp").val();
                var alamatDomisili = $("#alamatDomisili").val();

                if ($(this).is(":checked")) {
                    $("#alamatDomisili").val(alamatKtp);
                    $("#alamatDomisili").attr("readonly", true);
                } else {
                    $("#alamatDomisili").val("");

                    $("#alamatDomisili").attr("readonly", false);
                }
            });
        });
    </script>
@endsection
