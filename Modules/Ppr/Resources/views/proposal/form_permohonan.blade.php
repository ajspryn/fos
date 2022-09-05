<div class="tab-pane active" id="form-pembiayaan" role="tabpanel" aria-labelledby="form-pembiayaan-tab-justified">
    <section id="section_pembiayaan" class="modern-horizontal-wizard">
        <div class="bs-stepper wizard-modern modern-wizard-example">
            <div class="bs-stepper-header">
                <div class="step" data-target="#formPermohonan" role="tab" id="permohonan-modern-trigger">
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
                <form action="/ppr/proposal/{{ $pembiayaan->id }}" enctype="multipart/form-data" method="POST">
                    @method('PUT')
                    @csrf
                    <!-- Form Permohonan -->
                    <div id="formPermohonan" class="content" role="tabpanel" aria-labelledby="permohonan-trigger">
                        <div class="content-header">
                            {{-- <h5 class="mb-0">Account Details</h5> --}}
                            <small class="text-danger">* Wajib Diisi</small>
                        </div>
                        <div class="row">
                            <input type="hidden" name="jenis_nasabah" value="{{ request('jenis_nasabah') }}" />
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
                                <label class="form-label" for="form_permohonan_jenis_akad_pembayaran"><small
                                        class="text-danger">*
                                    </small>Jenis Akad Pembayaran</label>
                                <select class="select2 w-100" name="form_permohonan_jenis_akad_pembayaran"
                                    id="form_permohonan_jenis_akad_pembayaran" onChange="changeJenisAkad()">
                                    <option label="form_permohonan_jenis_akad_pembayaran" selected disabled>
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
                            <div class="mb-1 col-md-6 data" id="AkadLainnya" style="visibility: visible;">
                                <label class="form-label" for="form_permohonan_jenis_akad_pembayaran_lain"><small
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
                                <label class="form-label" for="form_permohonan_uang_muka_dana_sendiri"><small
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
                                <input type="number" name="form_permohonan_nilai_hpp" id="form_permohonan_nilai_hpp"
                                    class="form-control" placeholder="Nilai HPP/Harga Jual"
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
                                <label class="form-label" for="form_permohonan_jml_sewa"><small class="text-danger">*
                                    </small>Jumlah Sewa</label>
                                <input type="number" name="form_permohonan_jml_sewa" id="form_permohonan_jml_sewa"
                                    class="form-control" placeholder="Masukkan Jumlah Sewa"
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
                                <input type="number" name="form_permohonan_jml_bulan" id="form_permohonan_jml_bulan"
                                    class="form-control" placeholder="Masukkan Jumlah Bulan"
                                    value="{{ $pembiayaan->form_permohonan_jml_bulan }}" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="form_permohonan_sistem_pembayaran_angsuran"><small
                                        class="text-danger">*
                                    </small>Sistem Pembayaran Angsuran</label>
                                <select class="select2 w-100" name="form_permohonan_sistem_pembayaran_angsuran"
                                    id="form_permohonan_sistem_pembayaran_angsuran">
                                    <option label="form_permohonan_sistem_pembayaran_angsuran" selected disabled>
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

                    <div id="formDataPribadi" class="content" role="tabpanel" aria-labelledby="pribadi-trigger">
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
                                    id="form_pribadi_pemohon_gelar" class="form-control" placeholder="Gelar"
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
                                    class="form-control flatpickr-basic" name="form_pribadi_pemohon_tanggal_lahir"
                                    placeholder="DD-MM-YYYY"
                                    value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_tanggal_lahir }}" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <small class="text-danger">*
                                </small> <label class="form-label" for="form_pribadi_pemohon_npwp">No.
                                    NPWP</label>
                                <input type="number" name="form_pribadi_pemohon_npwp" id="form_pribadi_pemohon_npwp"
                                    class="form-control" placeholder="Masukkan Nomor NPWP Anda"
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
                                <label class="form-label" for="form_pribadi_pemohon_status_pernikahan"><small
                                        class="text-danger">*
                                    </small>Status Pernikahan</label>
                                <select class="select2 w-100" name="form_pribadi_pemohon_status_pernikahan"
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
                                    id="form_pribadi_pemohon_jml_anak" class="form-control" placeholder="Jumlah Anak"
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
                                <label class="form-label" for="form_pribadi_pemohon_nama_gadis_ibu_kandung">Nama
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
                                        <label class="form-label" for="form_pribadi_pemohon_no_telp"><small
                                                class="text-danger">*
                                            </small>No. Telepon</label>
                                        <input type="number" name="form_pribadi_pemohon_no_telp"
                                            id="form_pribadi_pemohon_no_telp" class="form-control"
                                            placeholder="Masukkan Nomor Telepon Anda"
                                            value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_no_telp }}" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="form_pribadi_pemohon_no_handphone"><small
                                                class="text-danger">*
                                            </small>Handphone</label>
                                        <input type="number" name="form_pribadi_pemohon_no_handphone"
                                            id="form_pribadi_pemohon_no_handphone" class="form-control"
                                            placeholder="Masukkan Nomor Handphone Anda"
                                            value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_no_handphone }}" />
                                    </div>
                                    <div class="mb-1 col-md-12">
                                        <div data-repeater-list="form_pribadi_pemohon_status_tempat_tinggal">
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
                                                            <option label="form_pribadi_pemohon_status_tempat_tinggal"
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
                                        <select class="select2 w-100" name="form_pribadi_pemohon_alamat_korespondensi"
                                            id="form_pribadi_pemohon_alamat_korespondensi">
                                            <option label="form_pribadi_pemohon_alamat_korespondensi" selected
                                                disabled>Pilih Alamat
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
                                        <input type="text" name="form_pribadi_keluarga_terdekat_nama_lengkap"
                                            id="form_pribadi_keluarga_terdekat_nama_lengkap" class="form-control"
                                            placeholder="Nama Lengkap"
                                            value="{{ $pembiayaan->pemohon->form_pribadi_keluarga_terdekat_nama_lengkap }}" />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="form_pribadi_keluarga_terdekat_hubungan"><small
                                                class="text-danger">*
                                            </small>Hubungan Dengan Pemohon</label>
                                        <select class="select2 w-100" name="form_pribadi_keluarga_terdekat_hubungan"
                                            id="form_pribadi_keluarga_terdekat_hubungan">
                                            <option label="form_pribadi_keluarga_terdekat_hubungan" selected disabled>
                                                Pilih Hubungan Dengan
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
                                        <label class="form-label" for="form_pribadi_keluarga_terdekat_hubungan"><small
                                                class="text-danger">*
                                            </small>Lainnya</label>
                                        <input type="text" name="form_pribadi_keluarga_terdekat_hubungan"
                                            id="form_pribadi_keluarga_terdekat_hubungan" class="form-control"
                                            placeholder="Lainnya"
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
                                            <input type="number" name="form_pribadi_keluarga_terdekat_no_telp"
                                                id="form_pribadi_keluarga_terdekat_no_telp" class="form-control"
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
                                            <label class="form-label" for="form_pribadi_istri_suami_nama_lengkap">Nama
                                                Lengkap</label>
                                            <input type="text" name="form_pribadi_istri_suami_nama_lengkap"
                                                id="form_pribadi_istri_suami_nama_lengkap" class="form-control"
                                                placeholder="Nama Lengkap"
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
                                            <label class="form-label" for="form_pribadi_istri_suami_no_ktp">No.
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
                                            <input type="text" name="form_pribadi_istri_suami_tempat_lahir"
                                                id="form_pribadi_istri_suami_tempat_lahir" class="form-control"
                                                placeholder="Masukkan Tempat Lahir Istri/Suami"
                                                value="{{ $pembiayaan->pemohon->form_pribadi_istri_suami_tempat_lahir }}" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label"
                                                for="form_pribadi_istri_suami_tanggal_lahir">Tanggal
                                                Lahir</label>
                                            <input type="date" id="form_pribadi_istri_suami_tanggal_lahir"
                                                class="form-control flatpickr-basic"
                                                name="form_pribadi_istri_suami_tanggal_lahir" placeholder="DD-MM-YYYY"
                                                value="{{ $pembiayaan->pemohon->form_pribadi_istri_suami_tanggal_lahir }}" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label" for="form_pribadi_istri_suami_npwp">No.
                                                NPWP</label>
                                            <input type="number" name="form_pribadi_istri_suami_npwp"
                                                id="form_pribadi_istri_suami_npwp" class="form-control"
                                                placeholder="Masukkan Nomor NPWP Pasangan Anda"
                                                value="{{ $pembiayaan->pemohon->form_pribadi_istri_suami_npwp }}" />
                                        </div>
                                        <div class="mb-1 col-md-6">
                                            <label class="form-label"
                                                for="form_pribadi_istri_suami_pendidikan">Pendidikan</label>
                                            <select class="select2 w-100" name="form_pribadi_istri_suami_pendidikan"
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
                                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button class="btn btn-primary btn-next" type="button">
                                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                                            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Form Data Pekerjaan -->

                    <div id="formDataPekerjaan" class="content" role="tabpanel" aria-labelledby="pekerjaan-trigger">
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
                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_nama }}" required />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="form_pekerjaan_pemohon_badan_hukum"><small
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
                                <label class="form-label" for="form_pekerjaan_pemohon_alamat_kode_pos"><small
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
                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_no_telp }}" required />
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
                                <label class="form-label" for="form_pekerjaan_pemohon_bidang_usaha"><small
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
                                <label class="form-label" for="form_pekerjaan_pemohon_jenis_pekerjaan"><small
                                        class="text-danger">*
                                    </small>Jenis Pekerjaan</label>
                                <select class="select2 w-100" name="form_pekerjaan_pemohon_jenis_pekerjaan"
                                    id="form_pekerjaan_pemohon_jenis_pekerjaan" required>
                                    <option label="form_pekerjaan_pemohon_jenis_pekerjaan" selected disabled>Pilih
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
                                <label class="form-label" for="form_pekerjaan_pemohon_jml_karyawan"><small
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
                                <label class="form-label" for="form_pekerjaan_pemohon_pangkat_gol_jabatan"><small
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
                                    id="form_pekerjaan_pemohon_nip_nrp" class="form-control" placeholder="NIP/NRP"
                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_nip_nrp }}" required />
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
                                                    <input type="date" class="form-control flatpickr-basic"
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
                                <label class="form-label" for="form_pekerjaan_pemohon_nama_atasan_langsung"><small
                                        class="text-danger">*
                                    </small>Nama Atasan Langsung</label>
                                <input type="text" name="form_pekerjaan_pemohon_nama_atasan_langsung"
                                    id="form_pekerjaan_pemohon_nama_atasan_langsung" class="form-control"
                                    placeholder="Nama Atasan Langsung"
                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_nama_atasan_langsung }}"
                                    required />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label"
                                    for="form_pekerjaan_pemohon_no_telp_atasan_langsung"><small
                                        class="text-danger">*
                                    </small>Nomor Telp. Atasan Langsung</label>
                                <input type="number" name="form_pekerjaan_pemohon_no_telp_atasan_langsung"
                                    id="form_pekerjaan_pemohon_no_telp_atasan_langsung" class="form-control"
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
                                <label class="form-label" for="form_pekerjaan_pemohon_grup_afiliasi">Group
                                    Afiliasi Perusahaan</label>
                                <input type="text" name="form_pekerjaan_pemohon_grup_afiliasi"
                                    id="form_pekerjaan_pemohon_grup_afiliasi" class="form-control"
                                    placeholder="Group Afiliasi Perusahaan"
                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_grup_afiliasi }}" />
                            </div>

                            <div class="mb-1 col-md-12">
                                <div data-repeater-list="form_pekerjaan_pemohon_pengalaman_kerja_terakhir">
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
                                <label class="form-label" for="form_pekerjaan_istri_suami_badan_hukum"><small
                                        class="text-danger">*
                                    </small>Badan Hukum Perusahaan</label>
                                <select class="select2 w-100" name="form_pekerjaan_istri_suami_badan_hukum"
                                    id="form_pekerjaan_istri_suami_badan_hukum">
                                    <option label="form_pekerjaan_istri_suami_badan_hukum" selected_disabled>Pilih
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
                                <label class="form-label" for="form_pekerjaan_istri_suami_alamat_kode_pos"><small
                                        class="text-danger">*
                                    </small>Kode Pos</label>
                                <input type="number" name="form_pekerjaan_istri_suami_alamat_kode_pos"
                                    id="form_pekerjaan_istri_suami_alamat_kode_pos" class="form-control"
                                    placeholder="Kode Pos"
                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_alamat_kode_pos }}" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="form_pekerjaan_istri_suami_no_telp"><small
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
                                <input type="number" name="form_pekerjaan_istri_suami_no_telp_extension"
                                    id="form_pekerjaan_istri_suami_no_telp_extension" class="form-control"
                                    placeholder="Masukkan Nomor Pesawat/Extension"
                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_no_telp_extension }}" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="form_pekerjaan_istri_suami_facsimile">Nomor
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
                                <label class="form-label" for="form_pekerjaan_istri_suami_bidang_usaha"><small
                                        class="text-danger">*
                                    </small>Bidang Usaha Perusahaan</label>
                                <select class="select2 w-100" name="form_pekerjaan_istri_suami_bidang_usaha"
                                    id="form_pekerjaan_istri_suami_bidang_usaha">
                                    <option label="form_pekerjaan_istri_suami_bidang_usaha" selected disabled>
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
                                <label class="form-label" for="form_pekerjaan_istri_suami_jenis_pekerjaan"><small
                                        class="text-danger">*
                                    </small>Jenis Pekerjaan</label>
                                <select class="select2 w-100" name="form_pekerjaan_istri_suami_jenis_pekerjaan"
                                    id="form_pekerjaan_istri_suami_jenis_pekerjaan">
                                    <option label="form_pekerjaan_istri_suami_jenis_pekerjaan" selected disabled>
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
                                <label class="form-label" for="form_pekerjaan_istri_suami_jml_karyawan"><small
                                        class="text-danger">*
                                    </small>Jumlah Karyawan</label>
                                <select class="select2 w-100" name="form_pekerjaan_istri_suami_jml_karyawan"
                                    id="form_pekerjaan_istri_suami_jml_karyawan">
                                    <option label="form_pekerjaan_istri_suami_jml_karyawan" selected disabled>
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
                                <label class="form-label" for="form_pekerjaan_istri_suami_departemen"><small
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
                                <input type="text" name="form_pekerjaan_istri_suami_pangkat_gol_jabatan"
                                    id="form_pekerjaan_istri_suami_pangkat_gol_jabatan" class="form-control"
                                    placeholder="Pangkat/Gol. Dan Jabatan"
                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_pangkat_gol_jabatan }}" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="form_pekerjaan_istri_suami_nip_nrp"><small
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
                                                    <input type="date" class="form-control flatpickr-basic"
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
                                <input type="text" name="form_pekerjaan_istri_suami_nama_atasan_langsung"
                                    id="form_pekerjaan_istri_suami_nama_atasan_langsung" class="form-control"
                                    placeholder="Nama Atasan Langsung"
                                    value="{{ $pembiayaan->pekerjaan->form_pekerjaan_istri_suami_nama_atasan_langsung }}" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label"
                                    for="form_pekerjaan_istri_suami_no_telp_atasan_langsung"><small
                                        class="text-danger">*
                                    </small>Nomor Telp. Atasan Langsung</label>
                                <input type="number" name="form_pekerjaan_istri_suami_no_telp_atasan_langsung"
                                    id="form_pekerjaan_istri_suami_no_telp_atasan_langsung" class="form-control"
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
                                <label class="form-label" for="form_pekerjaan_istri_suami_grup_afiliasi">Group
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
                                <input type="number" name="form_penghasilan_pengeluaran_penghasilan_utama_pemohon"
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
                                <input type="text" name="form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga"
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
                                <input type="number" name="form_penghasilan_pengeluaran_penghasilan_lain_pemohon"
                                    id="form_penghasilan_pengeluaran_penghasilan_lain_pemohon" class="form-control"
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
                                <input type="number" name="form_penghasilan_pengeluaran_kewajiban_angsuran"
                                    id="form_penghasilan_pengeluaran_kewajiban_angsuran" class="form-control"
                                    placeholder="Masukkan Kewajiban Angsuran"
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
                                    class="form-control" placeholder="Masukkan Penghasilan Utama Istri/Suami"
                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_penghasilan_utama_istri_suami }}" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label"
                                    for="form_penghasilan_pengeluaran_total_pengeluaran"><small
                                        class="text-danger">*
                                    </small>8. Total Pengeluaran (6+7)</label>
                                <input type="number" name="form_penghasilan_pengeluaran_total_pengeluaran"
                                    id="form_penghasilan_pengeluaran_total_pengeluaran" class="form-control"
                                    placeholder="Masukkan Total Pengeluaran"
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
                                    class="form-control" placeholder="Masukkan Penghasilan Lain-Lain Istri/Suami"
                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_penghasilan_lain_istri_suami }}" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="form_penghasilan_pengeluaran_sisa_penghasilan"><small
                                        class="text-danger">*
                                    </small>9. Sisa Penghasilan (5-8)</label>
                                <input type="number" name="form_penghasilan_pengeluaran_sisa_penghasilan"
                                    id="form_penghasilan_pengeluaran_sisa_penghasilan" class="form-control"
                                    placeholder="Masukkan Sisa Penghasilan"
                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_sisa_penghasilan }}" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label"
                                    for="form_penghasilan_pengeluaran_total_penghasilan"><small
                                        class="text-danger">*
                                    </small>5. Total Penghasilan (1+2+3+4)</label>
                                <input type="number" name="form_penghasilan_pengeluaran_total_penghasilan"
                                    id="form_penghasilan_pengeluaran_total_penghasilan" class="form-control"
                                    placeholder="Masukkan Total Penghasilan"
                                    value="{{ $pembiayaan->form_penghasilan_pengeluaran_total_penghasilan }}" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label"
                                    for="form_penghasilan_pengeluaran_kemampuan_mengangsur"><small
                                        class="text-danger">*
                                    </small>10. Kemampuan Mengangsur</label>
                                <input type="number" name="form_penghasilan_pengeluaran_kemampuan_mengangsur"
                                    id="form_penghasilan_pengeluaran_kemampuan_mengangsur" class="form-control"
                                    placeholder="Masukkan Kemampuan Mengangsur"
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

                    <div id="formDataAgunan" class="content" role="tabpanel" aria-labelledby="agunan-trigger">
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
                                <label class="form-label" for="form_agunan_1_jenis"><small class="text-danger">*
                                    </small>Jenis Agunan</label>
                                <select class="select2 w-100" name="form_agunan_1_jenis" id="form_agunan_1_jenis">
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
                                                    <label class="form-label" for="form_agunan_1_alamat"><small
                                                            class="text-danger">*
                                                        </small>Alamat/Lokasi
                                                        Agunan</label>
                                                    <input type="text" class="form-control"
                                                        name="form_agunan_1_alamat" id="form_agunan_1_alamat"
                                                        aria-describedby="form_agunan_1_alamat"
                                                        placeholder="Alamat/Lokasi Agunan"
                                                        value="{{ $pembiayaan->agunan->form_agunan_1_alamat }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-1 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="form_agunan_1_alamat_rt"><small
                                                            class="text-danger">*
                                                        </small>RT</label>
                                                    <input type="number" class="form-control"
                                                        name="form_agunan_1_alamat_rt" id="form_agunan_1_alamat_rt"
                                                        aria-describedby="form_agunan_1_alamat_rt" placeholder="RT"
                                                        value="{{ $pembiayaan->agunan->form_agunan_1_alamat_rt }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-1 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="form_agunan_1_alamat_rw"><small
                                                            class="text-danger">*
                                                        </small>RW</label>
                                                    <input type="number" class="form-control"
                                                        name="form_agunan_1_alamat_rw" id="form_agunan_1_alamat_rw"
                                                        aria-describedby="form_agunan_1_alamat_rw" placeholder="RW"
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
                                                    <option label="form_agunan_1_status_bukti_kepemilikan">
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
                                                    <option label="form_agunan_1_status_bukti_kepemilikan_hak">
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
                                <label class="form-label" for="form_agunan_1_no_sertifikat_tgl_penerbitan"><small
                                        class="text-danger">*
                                    </small>Tanggal Penerbitan</label>
                                <input type="date" id="form_agunan_1_no_sertifikat_tgl_penerbitan"
                                    class="form-control flatpickr-basic"
                                    name="form_agunan_1_no_sertifikat_tgl_penerbitan" placeholder="DD-MM-YYYY"
                                    value="{{ $pembiayaan->agunan->form_agunan_1_no_sertifikat_tgl_penerbitan }}" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="form_agunan_1_no_imb"><small class="text-danger">*
                                    </small>Nomor IMB</label>
                                <input type="number" name="form_agunan_1_no_imb" id="form_agunan_1_no_imb"
                                    class="form-control" placeholder="Masukkan Nomor IMB"
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
                                                <label class="form-label" for="form_agunan_1_luas_tanah"><small
                                                        class="text-danger">*
                                                    </small>Luas Tanah</label>
                                                <input type="number" name="form_agunan_1_luas_tanah"
                                                    id="form_agunan_1_luas_tanah" class="form-control"
                                                    placeholder="Masukkan Luas Tanah"
                                                    value="{{ $pembiayaan->agunan->form_agunan_1_status_bukti_kepemilikan }}" />

                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_1_luas_bangunan"><small
                                                        class="text-danger">*
                                                    </small>Luas Bangunan</label>
                                                <input type="number" name="form_agunan_1_luas_bangunan"
                                                    id="form_agunan_1_luas_bangunan" class="form-control"
                                                    placeholder="Masukkan Luas Bangunan"
                                                    value="{{ $pembiayaan->agunan->form_agunan_1_luas_bangunan }}" />
                                            </div>

                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_1_atas_nama"><small
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
                                <select class="select2 w-100" name="form_agunan_2_jenis" id="form_agunan_2_jenis">
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
                                <label class="form-label" for="form_agunan_2_nilai_harga_jual">Nilai/Harga
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
                                                    <label class="form-label" for="form_agunan_2_alamat"><small
                                                            class="text-danger">*
                                                        </small>Alamat/Lokasi
                                                        Agunan</label>
                                                    <input type="text" class="form-control"
                                                        name="form_agunan_2_alamat" id="form_agunan_2_alamat"
                                                        aria-describedby="form_agunan_2_alamat"
                                                        placeholder="Alamat/Lokasi Agunan"
                                                        value="{{ $pembiayaan->agunan->form_agunan_2_alamat }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-1 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="form_agunan_2_alamat_rt"><small
                                                            class="text-danger">*
                                                        </small>RT</label>
                                                    <input type="number" class="form-control"
                                                        name="form_agunan_2_alamat_rt" id="form_agunan_2_alamat_rt"
                                                        aria-describedby="form_agunan_2_alamat_rt" placeholder="RT"
                                                        value="{{ $pembiayaan->agunan->form_agunan_2_alamat_rt }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-1 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="form_agunan_2_alamat_rw"><small
                                                            class="text-danger">*
                                                        </small>RW</label>
                                                    <input type="number" class="form-control"
                                                        name="form_agunan_2_alamat_rw" id="form_agunan_2_alamat_rw"
                                                        aria-describedby="form_agunan_2_alamat_rw" placeholder="RW"
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
                                                    <option label="form_agunan_2_status_bukti_kepemilikan">
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
                                                    <option label="form_agunan_2_status_bukti_kepemilikan_hak">
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
                                <label class="form-label" for="form_agunan_2_no_sertifikat_tgl_penerbitan"><small
                                        class="text-danger">*
                                    </small>Tanggal Penerbitan</label>
                                <input type="date" id="form_agunan_2_no_sertifikat_tgl_penerbitan"
                                    class="form-control flatpickr-basic"
                                    name="form_agunan_2_no_sertifikat_tgl_penerbitan" placeholder="DD-MM-YYYY"
                                    value="{{ $pembiayaan->agunan->form_agunan_2_no_sertifikat_tgl_penerbitan }}" />
                            </div>
                            <div class="mb-1 col-md-6">
                                <label class="form-label" for="form_agunan_2_no_imb"><small class="text-danger">*
                                    </small>Nomor IMB</label>
                                <input type="number" name="form_agunan_2_no_imb" id="form_agunan_2_no_imb"
                                    class="form-control" placeholder="Masukkan Nomor IMB"
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
                                                <label class="form-label" for="form_agunan_2_luas_tanah"><small
                                                        class="text-danger">*
                                                    </small>Luas Tanah</label>
                                                <input type="number" name="form_agunan_2_luas_tanah"
                                                    id="form_agunan_2_luas_tanah" class="form-control"
                                                    placeholder="Masukkan Luas Tanah"
                                                    value="{{ $pembiayaan->agunan->form_agunan_2_luas_tanah }}" />

                                            </div>
                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_2_luas_bangunan"><small
                                                        class="text-danger">*
                                                    </small>Luas Bangunan</label>
                                                <input type="number" name="form_agunan_2_luas_bangunan"
                                                    id="form_agunan_2_luas_bangunan" class="form-control"
                                                    placeholder="Masukkan Luas Bangunan"
                                                    value="{{ $pembiayaan->agunan->form_agunan_2_luas_bangunan }}" />
                                            </div>

                                            <div class="mb-1 col-md-6">
                                                <label class="form-label" for="form_agunan_2_atas_nama"><small
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
                                <select class="select2 w-100" name="form_agunan_3_jenis" id="form_agunan_3_jenis">
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
                                <input type="number" name="form_agunan_3_nilai" id="form_agunan_3_nilai"
                                    class="form-control" placeholder="Masukkan Nilai Agunan"
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
                                <input type="text" name="form_agunan_3_atas_nama" id="form_agunan_3_atas_nama"
                                    class="form-control" placeholder="Masukkan Atas Nama"
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

                    <div id="formKekayaan" class="content" role="tabpanel" aria-labelledby="kekayaan-trigger">
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
                                                            <button class="btn btn-outline-danger text-nowrap px-1"
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
                                                            <button class="btn btn-outline-danger text-nowrap px-1"
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
                                                            <button class="btn btn-outline-danger text-nowrap px-1"
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
                                                        <input type="date" id="form_kekayaan_saham_per_tanggal"
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
                                                            <button class="btn btn-outline-danger text-nowrap px-1"
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
                                                            <button class="btn btn-outline-danger text-nowrap px-1"
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
                                                            <select class="select2 w-100" name="form_pinjaman_jenis"
                                                                id="form_pinjaman_jenis">
                                                                <option label="form_pinjaman_jenis" selected disabled>
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
                                                            <button class="btn btn-outline-danger text-nowrap px-1"
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
                                                            <button class="btn btn-outline-danger text-nowrap px-1"
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
                                                            <button class="btn btn-outline-danger text-nowrap px-1"
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
                    <div id="formInfo" class="content" role="tabpanel" aria-labelledby="info-trigger">
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
