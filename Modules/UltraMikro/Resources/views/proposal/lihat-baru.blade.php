<form method="POST" action="/ultra_mikro/proposal/{{ $pembiayaan->id }}" id="proposalUltraMikro" class="needs-validation"
    enctype="multipart/form-data" novalidate>
    @method('PUT')
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
            <div class="mb-1 col-md-6">
                <label class="form-label" for="nomorAplikasi"><small class="text-danger">*
                    </small>Nomor Aplikasi</label>
                <input type="text" name="nomor_aplikasi" class="form-control" placeholder="Nomor Aplikasi"
                    id="nomorAplikasi" value="{{ $pembiayaan->nomor_aplikasi }}" disabled />
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="jenisPby"><small class="text-danger">*
                    </small>Jenis Pembiayaan</label>
                <input type="text" name="jenis_pby_ultra_mikro" class="form-control" placeholder="Jenis Pembiayaan"
                    id="jenisPby" value="{{ $pembiayaan->jenis_pby_ultra_mikro }}" disabled />
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="tanggalKunjungan"><small class="text-danger">*
                    </small>Tanggal Kunjungan</label>
                <input type="text" id="tanggalKunjungan" class="form-control flatpickr-basic"
                    name="tanggal_kunjungan" placeholder="DD-MM-YYYY" value="{{ $pembiayaan->tanggal_kunjungan }}"
                    disabled />
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="ao"><small class="text-danger">*
                    </small>Nama
                    AO</label>
                <select class="select2 w-100" name="user_id" id="ao" data-placeholder="Pilih AO" disabled>
                    <option value=""></option>
                    @foreach ($aos as $ao)
                        <option value="{{ $ao->user->id }}"
                            {{ $pembiayaan->user_id == $ao->user->id ? 'selected' : '' }}>
                            {{ $ao->user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="petugasLapangan"><small class="text-danger">*
                    </small>Petugas Lapangan</label>
                <select class="select2 w-100" name="petugas_lapangan_id" id="petugasLapangan"
                    data-placeholder="Pilih Petugas Lapangan" disabled>
                    <option value=""></option>
                    @foreach ($petugasLapangans as $petugasLapangan)
                        <option value="{{ $petugasLapangan->id }}"
                            {{ $pembiayaan->petugas_lapangan_id == $petugasLapangan->id ? 'selected' : '' }}>
                            {{ $petugasLapangan->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-1 col-md-6">
                <label class="form-label" for="tujuanPembiayaan"><small class="text-danger">*
                    </small>Tujuan Pembiayaan</label>
                <select class="select2 w-100" name="tujuan_pembiayaan" id="tujuanPembiayaan"
                    data-placeholder="Pilih Tujuan Pembiayaan" disabled>
                    <option value=""></option>
                    <option value="Produktif (Modal Kerja)"
                        {{ $pembiayaan->tujuan_pembiayaan == 'Produktif (Modal Kerja)' ? 'selected' : '' }}>
                        Produktif (Modal Kerja)</option>
                    <option value="Konsumtif" {{ $pembiayaan->tujuan_pembiayaan == 'Konsumtif' ? 'selected' : '' }}>
                        Konsumtif</option>
                </select>
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="akad"><small class="text-danger">*
                    </small>Akad</label>
                <select class="select2 w-100" name="akad" id="akad" data-placeholder="Pilih Akad" disabled>
                    <option value=""></option>
                    <option value="Murabahah" {{ $pembiayaan->akad == 'Murabahah' ? 'selected' : '' }}>Murabahah
                    </option>
                    <option value="Musyarakah" {{ $pembiayaan->akad == 'Musyarakah' ? 'selected' : '' }}>Musyarakah
                    </option>
                </select>
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="nominalPembiayaan"><small class="text-danger">*
                    </small>Nominal Pembiayaan</label>
                <input type="text" name="nominal_pembiayaan" class="form-control numeral-mask"
                    placeholder="Masukkan Nominal Pembiayaan" id="nominalPembiayaan"
                    value="{{ $pembiayaan->nominal_pembiayaan }}" disabled />
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="tenor"><small class="text-danger">*
                    </small>Tenor (Bulan)</label>
                {{-- <input type="number" name="tenor" class="form-control"
                    placeholder="Masukkan Tenor (Bulan)" id="tenor" disabled /> --}}
                <select class="select2 w-100" name="tenor" id="tenor" data-placeholder="Pilih Tenor" disabled>
                    <option value=""></option>
                    <option value="36" {{ $pembiayaan->tenor == '36' ? 'selected' : '' }}>
                        36 Bulan</option>
                    <option value="48" {{ $pembiayaan->tenor == '48' ? 'selected' : '' }}>
                        48 Bulan</option>
                    <option value="60" {{ $pembiayaan->tenor == '60' ? 'selected' : '' }}>
                        60 Bulan</option>
                </select>
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="statusKelompok"><small class="text-danger">*
                    </small>Status Kelompok</label>
                <select class="select2 w-100" name="status_kelompok" id="statusKelompok"
                    data-placeholder="Pilih Status Kelompok" disabled>
                    <option value=""></option>
                    @foreach ($statusKelompoks as $statusKelompok)
                        <option value="{{ $statusKelompok->id }}"
                            {{ $pembiayaan->status_kelompok_id == $statusKelompok->id ? 'selected' : '' }}>
                            {{ $statusKelompok->status_kelompok }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="repayment"><small class="text-danger">*
                    </small>Repayment Per Kunjungan</label>
                <select class="select2 w-100" name="repayment" id="repayment"
                    data-placeholder="Pilih Repayment Per Kunjungan" disabled>
                    <option value=""></option>
                    @foreach ($repayments as $repayment)
                        <option value="{{ $repayment->id }}"
                            {{ $pembiayaan->repayment_id == $repayment->id ? 'selected' : '' }}>
                            {{ $repayment->kategori_repayment }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="frekuensiPembayaran"><small class="text-danger">*
                    </small>Frekuensi Pembayaran</label>
                <select class="select2 w-100" name="frekuensi_pembayaran" id="frekuensiPembayaran"
                    data-placeholder="Pilih Frekuensi Pembayaran" disabled>
                    <option value=""></option>
                    <option value="Setiap 1 Minggu"
                        {{ $pembiayaan->frekuensi_pembayaran == 'Setiap 1 Minggu' ? 'selected' : '' }}>
                        Setiap 1 Minggu</option>
                    <option value="Setiap 2 Minggu"
                        {{ $pembiayaan->frekuensi_pembayaran == 'Setiap 2 Minggu' ? 'selected' : '' }}>
                        Setiap 2 Minggu</option>
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
                    oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');" placeholder="Nama Lengkap"
                    value="{{ $pembiayaan->nasabah->nama_nasabah }}" disabled />
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="noKtp"><small class="text-danger">*
                    </small>No.
                    KTP</label>
                <span id="falseNoKtp" class="text-danger" style="display: none; font-size:9px;">Isikan
                    16
                    digit!
                </span></label>
                <input type="text" class="form-control" pattern="^\d{16}$"
                    oninput="this.value=this.value.replace(/[^0-9,]/g,'');" name="no_ktp" id="noKtp"
                    aria-describedby="noKtp" placeholder="Masukkan Nomor KTP"
                    value="{{ $pembiayaan->nasabah->no_ktp }}" disabled />
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="tempatlahir"><small class="text-danger">*
                    </small>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                    placeholder="Masukkan Tempat Lahir"
                    oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                    value="{{ $pembiayaan->nasabah->tempat_lahir }}" disabled />
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="tgllahir"><small class="text-danger">*
                    </small>Tanggal Lahir</label>
                <input type="date" id="tgl_lahir" class="form-control flatpickr-basic" name="tgl_lahir"
                    placeholder="DD-MM-YYYY" value="{{ $pembiayaan->nasabah->tgl_lahir }}" disabled />
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="jenis_kelamin"><small class="text-danger">*
                    </small>Jenis Kelamin</label>
                <div>
                    &ensp;
                    <input type="radio" name="jenis_kelamin" class="form-check-input" id="pria"
                        value="Pria" {{ $pembiayaan->nasabah->jenis_kelamin == 'Pria' ? 'checked' : '' }}
                        disabled />
                    <label class="form-label" for="pria">&nbsp;Pria</label>
                    <br>
                    &ensp;
                    <input type="radio" name="jenis_kelamin" class="form-check-input" id="wanita"
                        value="Wanita" {{ $pembiayaan->nasabah->jenis_kelamin == 'Wanita' ? 'checked' : '' }}
                        disabled />
                    <label class="form-label" for="wanita">&nbsp;Wanita</label>
                </div>
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="agama"><small class="text-danger">*
                    </small>Agama</label>
                <select class="select2 w-100" name="agama" id="agama" data-placeholder="Pilih Agama" disabled>
                    <option value="">
                    </option>
                    <option value="Islam" {{ $pembiayaan->nasabah->agama == 'Islam' ? 'selected' : '' }}>Islam
                    </option>
                    <option value="Protestan" {{ $pembiayaan->nasabah->agama == 'Protestan' ? 'selected' : '' }}>
                        Protestan</option>
                    <option value="Katholik" {{ $pembiayaan->nasabah->agama == 'Katholik' ? 'selected' : '' }}>
                        Katholik</option>
                    <option value="Budha" {{ $pembiayaan->nasabah->agama == 'Budha' ? 'selected' : '' }}>Budha
                    </option>
                    <option value="Hindu" {{ $pembiayaan->nasabah->agama == 'Hindu' ? 'selected' : '' }}>Hindu
                    </option>
                    <option value="Kong Hu Chu" {{ $pembiayaan->nasabah->agama == 'Kong Hu Chu' ? 'selected' : '' }}>
                        Kong Hu Chu</option>
                </select>
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="status"><small class="text-danger">*
                    </small>Status</label>
                <select class="select2 w-100" name="status_pernikahan" id="statusPernikahan"
                    onChange="changeStatusPernikahan()" data-placeholder="Pilih Status Pernikahan" disabled>
                    <option value=""></option>
                    <option value="Belum Menikah"
                        {{ $pembiayaan->nasabah->status_pernikahan == 'Belum Menikah' ? 'selected' : '' }}>
                        Belum Menikah</option>
                    <option value="Menikah"
                        {{ $pembiayaan->nasabah->status_pernikahan == 'Menikah' ? 'selected' : '' }}>
                        Menikah</option>
                    <option value="Janda/Duda - Meninggal"
                        {{ $pembiayaan->nasabah->status_pernikahan == 'Janda/Duda - Meninggal' ? 'selected' : '' }}>
                        Janda/Duda - Meninggal</option>
                    <option value="Janda/Duda - Cerai"
                        {{ $pembiayaan->nasabah->status_pernikahan == 'Janda/Duda - Cerai' ? 'selected' : '' }}>
                        Janda/Duda - Cerai</option>
                </select>
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="jmlTanggungan"><small class="text-danger">*
                    </small>Jumlah Anak/Tanggungan</label>
                <input type="number" name="jml_tanggungan" id="jmlTanggungan" class="form-control"
                    placeholder="Jumlah Anak/Tanggungan" value="{{ $pembiayaan->nasabah->jml_tanggungan }}"
                    disabled />
            </div>
            <div class="mb-1 col-md-6 hide" id="ifMenikahNamaPasangan">
                <label class="form-label" for="namaPasangan">Nama Lengkap Pasangan</label>
                <input type="text" name="nama_pasangan_nasabah" id="namaPasangan" class="form-control"
                    placeholder="Nama Lengkap Pasangan"
                    oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                    value="{{ $pembiayaan->nasabah->nama_pasangan_nasabah }}" disabled />
            </div>
            <div class="mb-1 col-md-6 hide" id="ifMenikahKtpPasangan">
                <label class="form-label" for="noKtpPasangan">No
                    KTP Pasangan</label>
                <input type="number" name="no_ktp_pasangan" id="noKtpPasangan" class="form-control"
                    placeholder="Masukkan Nomor KTP pasangan" value="{{ $pembiayaan->nasabah->no_ktp_pasangan }}"
                    disabled />
            </div>

            <div class="mb-1 col-md-6">
                <label class="form-label" for="alamatKtp"><small class="text-danger">*
                    </small>Alamat KTP</label>
                <textarea name="alamat_ktp" id="alamatKtp" class="form-control" oninput="this.value=this.value.toUpperCase();"
                    disabled>{{ $pembiayaan->nasabah->alamat_ktp }}</textarea>
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="alamatDomisili"><small class="text-danger">*
                    </small>Alamat Domisili</label>
                <textarea name="alamat_domisili" id="alamatDomisili" class="form-control"
                    oninput="this.value=this.value.toUpperCase();" disabled>{{ $pembiayaan->nasabah->alamat_domisili }}</textarea>
            </div>
            <div class="mb-1 col-md-6">
                <label class="form-label" for="statusTempatTinggal"><small class="text-danger">*
                    </small>Status Tempat Tinggal</label>
                <select class="select2 w-100" name="status_tempat_tinggal" id="statusTempatTinggal"
                    data-placeholder="Pilih Status Tempat Tinggal" disabled>
                    <option value="">
                    </option>
                    @foreach ($statusTempatTinggals as $statusTempatTinggal)
                        <option value="{{ $statusTempatTinggal->id }}"
                            {{ $pembiayaan->status_tempat_tinggal_id == $statusTempatTinggal->id ? 'selected' : '' }}>
                            {{ $statusTempatTinggal->status_tempat_tinggal }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-1 col-md-6">
                <label class="form-label" for="namaPekerjaan"><small class="text-danger">*
                    </small>Nama Pekerjaan/Usaha</label>
                <input type="text" name="nama_pekerjaan" id="namaPekerjaan" class="form-control"
                    placeholder="Masukkan Pekerjaan/Usaha"
                    oninput="this.value=this.value.toUpperCase().replace(/[^A-Z, ]/g,'');"
                    value="{{ $pembiayaan->nasabah->nama_pekerjaan }}" disabled />
            </div>

            <div class="mb-1 col-md-6">
                <label class="form-label" for="penghasilanPerBulan"><small class="text-danger">*
                    </small>Penghasilan Per Bulan</label>
                <input type="text" name="penghasilan" class="form-control numeral-mask"
                    placeholder="Masukkan Penghasilan Per Bulan" id="penghasilanPerBulan"
                    value="{{ $pembiayaan->penghasilan }}" disabled />
            </div>

            <div class="mb-1 col-md-6">
                <label class="form-label" for="pengeluaranPerBulan"><small class="text-danger">*
                    </small>Pengeluaran Per
                    Bulan</label>
                <input type="text" name="pengeluaran" class="form-control numeral-mask"
                    placeholder="Masukkan Pengeluaran Per Bulan" id="pengeluaranPerBulan"
                    value="{{ $pembiayaan->pengeluaran }}" disabled />
            </div>

            <div class="mb-1 col-md-6">
                <label class="form-label" for="noHp"><small class="text-danger">*
                    </small>No. Handphone</label>
                <input type="text" name="no_hp" id="noHp" class="form-control "
                    placeholder="Masukkan Nomor Handphone" value="{{ $pembiayaan->nasabah->no_hp }}" disabled />
            </div>

            <div class="mb-1 col-md-6">
            </div>
            <hr />
            <div class="content-header">
                <h5 class="mb-0 mt-2">Lampiran</h5>
                <small class="text-muted">Upload Lampiran Yang Sesuai.</small>
            </div>
            <div class="row">
                <div class="mb-1 col-md-4">
                    <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                        data-bs-target="#modalFotoKtp">
                        Foto KTP
                    </button>
                </div>
                <div class="mb-1 col-md-4">
                    <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                        data-bs-target="#modalFotoKartuKeluarga">
                        Foto Kartu Keluarga
                    </button>
                </div>
                @if ($pembiayaan->nasabah->status_pernikahan != 'Belum Menikah')
                    @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                        <div class="mb-1 col-md-4">
                            <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                                data-bs-target="#modalFotoKtpPasangan">
                                Foto KTP Pasangan
                            </button>
                        </div>
                    @endif
                    <div class="mb-1 col-md-4">
                        <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                            data-bs-target="#fotoAktaStatusPernikahan">
                            Foto Akta Status Pernikahan/Perceraian
                        </button>
                    </div>
                @endif
                <div class="mb-1 col-md-4">
                    <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                        data-bs-target="#modalFotoRumah">
                        Foto Rumah/Tempat Tinggal
                    </button>
                </div>
                <div class="mb-1 col-md-4">
                    <button type="button" class="btn btn-md btn-primary w-100" data-bs-toggle="modal"
                        data-bs-target="#modalFotoPekerjaan">
                        Foto Pekerjaan/Usaha
                    </button>
                </div>
            </div>
            <br />
            <div class="mb-1 col-md-6">
                <label class="form-label" for="dokumenIdeb"><small class="text-danger">*
                    </small>Upload IDEB</label>
                <input type="file" name="dokumen_ideb" id="dokumenIdeb" class="form-control" required
                    accept="application/pdf" />
            </div>

            @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                <div class="mb-1 col-md-6">
                    <label class="form-label" for="ifIdebPasangan"><small class="text-danger">*
                        </small>Upload IDEB Pasangan</label>
                    <input type="file" name="foto[1][foto]" id="ifIdebPasangan" class="form-control" required
                        accept="application/pdf">
                    <input type="hidden" name="foto[1][kategori]" value="IDEB Pasangan" />
                </div>
            @endif

            {{-- <div class="content-header">
                <h6>IDEB Nasabah</h6>
            </div> --}}
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
                                                <input type="text" class="form-control" name="nama_bank"
                                                    id="nama_bank" aria-describedby="nama_bank"
                                                    placeholder="Nama Bank" />
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="plafond">Plafond</label>
                                                <input type="number" class="form-control" name="plafond"
                                                    id="plafond" aria-describedby="itemcost" placeholder="Rp." />
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="outstanding">Outstanding</label>
                                                <input type="number" class="form-control" name="outstanding"
                                                    id="outstanding" aria-describedby="outstanding"
                                                    placeholder="Rp." />
                                            </div>
                                        </div>

                                        <div class="col-md-1 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="tenor">Tenor</label>
                                                <input type="number" class="form-control" name="tenor"
                                                    id="tenor" aria-describedby="tenor" placeholder="tenor" />
                                            </div>
                                        </div>

                                        <div class="col-md-1 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="margin">Margin</label>
                                                <input type="number" class="form-control persen" name="margin"
                                                    id="margin" aria-describedby="margin" placeholder="%" />
                                            </div>
                                        </div>

                                        <div class="col-md-1 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="itemquantity">Agunan</label>
                                                <input type="text" class="form-control" name="agunan"
                                                    id="agunan" aria-describedby="itemquantity" />
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="angsuran">Angsuran</label>
                                                <input type="number" class="form-control" name="angsuran"
                                                    id="angsuran" aria-describedby="angsuran" placeholder="Rp." />
                                            </div>
                                        </div>

                                        <div class="col-md-2 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="itemquantity">Kol
                                                    Tertinggi </label>
                                                <select class="form-control" name="kol_tertinggi"
                                                    aria-label="kolTertinggiSlik" id="kolTertinggiSlik">
                                                    <option value="" disabled>Pilih
                                                        Kol
                                                        Tertinggi</option>
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
                                                    {{-- <span>Delete</span> --}}
                                                </button>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <a data-repeater-create class="btn btn-icon btn-primary" type="button">
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Tambah</span>
                                </a>
                            </div>
                        </div>
                    </div>
            </section>




        </div>

        <br />
        <br />
        <div class="d-flex justify-content-center">
            <button type="submit" id="btnSubmitForm" class="btn btn-success">Submit</button>
        </div>
        <br />
    </div>
</form>
