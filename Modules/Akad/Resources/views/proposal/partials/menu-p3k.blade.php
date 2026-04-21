<div class="card">
    <div class="card-header">
        <h4 class="card-title">Proposal Pengajuan Pembiayaan</h4>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab-justified" data-bs-toggle="tab" href="#proposal" role="tab"
                    aria-controls="home-just" aria-selected="true">Proposal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-justified" data-bs-toggle="tab" href="#tab-lampiran-identitas"
                    role="tab" aria-controls="profile-just" aria-selected="true">Lampiran Pribadi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="messages-tab-justified" data-bs-toggle="tab" href="#legalitas-agunan"
                    role="tab" aria-controls="messages-just" aria-selected="false">Legalitas Agunan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="settings-tab-justified" data-bs-toggle="tab" href="#keuangan" role="tab"
                    aria-controls="settings-just" aria-selected="false">Keuangan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="settings-tab-justified" data-bs-toggle="tab" href="#ideb" role="tab"
                    aria-controls="settings-just" aria-selected="false">IDEB</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="settings-tab-justified" data-bs-toggle="tab" href="#timeline" role="tab"
                    aria-controls="settings-just" aria-selected="false">Timeline</a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content pt-1">
            <div class="tab-pane active show" id="proposal" role="tabpanel" aria-labelledby="home-tab-justified">
                <!-- proposal -->
                <div class="col-xl-12 col-md-8 col-12">
                    <div class="card invoice-preview-card">

                        @include('p3k::komite.summary-p3k')

                        <hr />
                        <div class="card-body invoice-padding pt-0">
                            <div class="row invoice-spacing">
                                <!-- Tombol Aksi -->
                                <div class="row">
                                    <div class="col-md-5">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" id="copyButton" onclick="copyText()"
                                            class="btn btn-outline-info w-100"><i data-feather="clipboard"></i>
                                            Copy Data
                                        </button>
                                        {{-- copy value --}}
                                        <input type="hidden" id="copyNama"
                                            value="{{ $pembiayaan->nasabah->nama_nasabah }}">
                                        <input type="hidden" id="copyNoKtp" value="{{ $pembiayaan->nasabah->no_ktp }}">
                                        <input type="hidden" id="copyAlamat"
                                            value="{{ $pembiayaan->nasabah->alamat }}">
                                        <input type="hidden" id="copyRt" value="{{ $pembiayaan->nasabah->rt }}">
                                        <input type="hidden" id="copyRw" value="{{ $pembiayaan->nasabah->rw }}">
                                        <input type="hidden" id="copyDesaKelurahan"
                                            value="{{ $pembiayaan->nasabah->desa_kelurahan }}">
                                        <input type="hidden" id="copyKecamatan"
                                            value="{{ $pembiayaan->nasabah->kecamatan }}">
                                        <input type="hidden" id="copyKabKota"
                                            value="{{ $pembiayaan->nasabah->kabkota }}">
                                        <input type="hidden" id="copyTempatLahir"
                                            value="{{ $pembiayaan->nasabah->tempat_lahir }}">
                                        @php
                                            // Assuming $pembiayaan->nasabah->tgl_lahir contains a date string like '20230115'
                                            $date = DateTime::createFromFormat(
                                                'Y-m-d',
                                                $pembiayaan->nasabah->tgl_lahir,
                                            );

                                            // Extracting day, month name, and year
                                            $day = $date->format('d'); // Day as '15'
                                            $monthName = $date->format('F'); // Month name as 'January'
                                            $year = $date->format('Y'); // Year as '2023'
                                        @endphp
                                        <input type="hidden" id="copyTglLahir" value="{{ $day }}">
                                        <input type="hidden" id="copyBlnLahir" value="{{ $monthName }}">
                                        <input type="hidden" id="copyThnLahir" value="{{ $year }}">
                                        <input type="hidden" id="copyStatusPernikahan"
                                            value="{{ $pembiayaan->nasabah->status_pernikahan }}">

                                        <input type="hidden" id="copyNamaPasanganNasabah"
                                            value="{{ $pembiayaan->nasabah->nama_pasangan_nasabah }}">
                                        <input type="hidden" id="copyNoKtpPasangan"
                                            value="{{ $pembiayaan->nasabah->no_ktp_pasangan }}">

                                        <input type="hidden" id="copyUserId" value="{{ $pembiayaan->user_id }}">
                                        <input type="hidden" id="copyTotalAngsuranBtbFasAktif"
                                            value="{{ $pembiayaan->total_angsuran_btb_fas_aktif }}">
                                        <input type="hidden" id="copyNominalPembiayaan"
                                            value="{{ $pembiayaan->nominal_pembiayaan }}">
                                        <input type="hidden" id="copyRate" value="{{ $pembiayaan->rate }}">
                                        <input type="hidden" id="copyTenor" value="{{ $pembiayaan->tenor }}">
                                        <input type="hidden" id="copyHargaJual"
                                            value="{{ $pembiayaan->harga_jual }}">
                                        <input type="hidden" id="copyJenisPenggunaan"
                                            value="{{ $pembiayaan->jenis_penggunaan }}">
                                        <input type="hidden" id="copyAkad" value="{{ $pembiayaan->akad }}">


                                        <input type="hidden" id="copyDinas"
                                            value="{{ $pembiayaan->nasabah->pekerjaan->dinas }}">
                                        <input type="hidden" id="copyNamaUnitKerja"
                                            value="{{ $pembiayaan->nasabah->pekerjaan->nama_unit_kerja }}">
                                        <input type="hidden" id="copyJabatan"
                                            value="{{ $pembiayaan->nasabah->pekerjaan->jabatan }}">
                                        <input type="hidden" id="copySk"
                                            value="{{ $pembiayaan->nasabah->pekerjaan->no_sk }}">

                                        <input type="hidden" id="copyHubPenjamin" value="(NASABAH SENDIRI)">


                                    </div>
                                </div>
                                <div class="row">
                                    @if ($history->reg_akad == 'Sudah')
                                        <div class="col-md-12">
                                            <form action="">
                                                <input type="hidden" name="" value="" />
                                                <input type="hidden" name="cek_staff_akad" value="Dicetak" />
                                                <a type="submit" class="btn w-100"
                                                    style="background-color:darkorange; color:white"
                                                    href="/staff/cetak/p3k/{{ $pembiayaan->id }}"><i
                                                        data-feather="printer"></i>
                                                    Cetak
                                                    Akad
                                                </a>
                                            </form>
                                        </div>
                                    @endif
                                    <br />
                                    <p></p>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                            data-bs-target="#modalAkadP3kBatal"><i data-feather="x"></i>
                                            Akad
                                            Batal
                                        </button>
                                    </div>


                                    {{-- @if ($history->reg_akad == 'Belum')
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-info w-100" data-bs-toggle="modal"
                                                data-bs-target="#modalRegisterAkadP3k"><i data-feather="file-text"></i>
                                                Register Akad
                                            </button>
                                        </div>
                                    @else --}}
                                    <div class="col-md-6">
                                        <form action="/staff/proposal" method="POST">
                                            @csrf
                                            <input type="hidden" name="akad" value="{{ $pembiayaan->akad }}" />
                                            <input type="hidden" name="segmen" value="P3K" />
                                            <input type="hidden" name="ao_id"
                                                value="{{ $pembiayaan->user_id }}" />
                                            <input type="hidden" name="cif"
                                                value="{{ $pembiayaan->nasabah->id }}" />
                                            <input type="hidden" name="nama_nasabah"
                                                value="{{ $pembiayaan->nasabah->nama_nasabah }}" />
                                            <input type="hidden" name="kode_tabungan"
                                                value="{{ $pembiayaan->id }}" />
                                            <input type="hidden" name="plafond"
                                                value="{{ $pembiayaan->nominal_pembiayaan }}" />
                                            <input type="hidden" name="harga_jual" value="{{ $hargaJual }}" />
                                            <input type="hidden" name="status" value="Selesai Akad" />
                                            <input type="hidden" name="p3k_pembiayaan_id"
                                                value="{{ $pembiayaan->id }}" />
                                            <input type="hidden" name="status_id" value="9" />
                                            <input type="hidden" name="cek_staff_akad" value="Sudah" />
                                            <button type="submit" class="btn btn-success w-100"><i
                                                    data-feather="check"></i>
                                                Selesai
                                                Akad
                                            </button>
                                        </form>
                                    </div>
                                    {{-- @endif --}}
                                </div>
                                <!-- /Tombol Aksi -->

                                <!-- Modal Batal-->
                                <div class="modal fade" id="modalAkadP3kBatal" tabindex="-1"
                                    aria-labelledby="addNewCardTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-transparent">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                                <form action="/staff/proposal" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="akad"
                                                        value="{{ $pembiayaan->akad }}" />
                                                    <input type="hidden" name="segmen" value="P3K" />
                                                    <input type="hidden" name="ao_id"
                                                        value="{{ $pembiayaan->user_id }}" />
                                                    <input type="hidden" name="cif"
                                                        value="{{ $pembiayaan->nasabah->id }}" />
                                                    <input type="hidden" name="nama_nasabah"
                                                        value="{{ $pembiayaan->nasabah->nama_nasabah }}" />
                                                    <input type="hidden" name="kode_tabungan"
                                                        value="{{ $pembiayaan->id }}" />
                                                    <input type="hidden" name="plafond"
                                                        value="{{ $pembiayaan->nominal_pembiayaan }}" />
                                                    <input type="hidden" name="harga_jual"
                                                        value="{{ $hargaJual }}" />
                                                    <input type="hidden" name="status" value="Akad Batal" />
                                                    <h5 class="text-center">
                                                        Tuliskan
                                                        catatan
                                                        mengapa akad
                                                        batal!</h5>
                                                    <br />
                                                    <textarea class="form-control" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                    <input type="hidden" name="p3k_pembiayaan_id"
                                                        value="{{ $pembiayaan->id }}" />
                                                    <input type="hidden" name="status_id" value="10" />
                                                    <input type="hidden" name="cek_staff_akad" value="Sudah" />
                                                    <br />
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button type="button"
                                                                class="btn btn-outline-danger w-100"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button type="submit" class="btn btn-primary w-100"><i
                                                                    data-feather="x"></i>
                                                                Akad
                                                                Batal
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Modal Batal-->

                                <!-- Modal Register Akad-->
                                <div class="modal fade" id="modalRegisterAkadP3k" tabindex="-1"
                                    aria-labelledby="addNewCardTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header bg-transparent">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                                <div class="content-header">
                                                    <h4 class="text-center mb-1" style="margin-top:-40px;">
                                                        <strong>Register Akad</strong>
                                                    </h4>
                                                </div>
                                                <form action="/staff/register-akad" method="POST"
                                                    class="needs-validation" enctype="multipart/form-data" novalidate>
                                                    <input type="hidden" name="segmen" value="P3K" required />
                                                    @csrf
                                                    <div class="mb-1 col-md-12">
                                                        <iframe src="{{ asset('storage/' . $fotoKtp->foto) }}"
                                                            class="d-block w-100" height="300"></iframe>
                                                    </div>
                                                    <div class="content-header">
                                                        <h5 class="mb-1">Data Nasabah</h5>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="namaNasabah"><small
                                                                    class="text-danger">*
                                                                </small>Nama Nasabah</label>
                                                            <input type="text" name="nama_nasabah"
                                                                class="form-control"
                                                                placeholder="Masukkan Nama Nasabah" id="namaNasabah"
                                                                value="{{ $pembiayaan->nasabah->nama_nasabah }}"
                                                                required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="noKtp"><small
                                                                    class="text-danger">*
                                                                </small>No. KTP</label>
                                                            <input type="text" name="no_ktp" class="form-control"
                                                                placeholder="Masukkan Nomor KTP Nasabah"
                                                                id="noKtp"
                                                                value="{{ $pembiayaan->nasabah->no_ktp }}" required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="tempatLahir"><small
                                                                    class="text-danger">*
                                                                </small>Tempat Lahir</label>
                                                            <input type="text" name="tempat_lahir"
                                                                id="tempatLahir" class="form-control"
                                                                placeholder="Masukkan Tempat Lahir"
                                                                value="{{ $pembiayaan->nasabah->tempat_lahir }}"
                                                                disabled />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="tglLahir"><small
                                                                    class="text-danger">*
                                                                </small>Tanggal Lahir</label>
                                                            <input type="text" id="tglLahir"
                                                                class="form-control flatpickr-basic" name="tgl_lahir"
                                                                placeholder="DD-MM-YYYY"
                                                                value="{{ $pembiayaan->nasabah->tgl_lahir }}"
                                                                disabled />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="jenisKelamin"><small
                                                                    class="text-danger">*
                                                                </small>Jenis Kelamin</label>
                                                            <input type="text" name="jenis_kelamin"
                                                                class="form-control" id="jenisKelamin"
                                                                value="{{ $pembiayaan->nasabah->jenis_kelamin }}"
                                                                disabled />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="tinggiBadan"><small
                                                                    class="text-danger">*
                                                                </small>Tinggi Badan (cm)</label>
                                                            <input type="number" name="tinggi_badan"
                                                                id="tinggiBadan" class="form-control"
                                                                placeholder="Masukkan Tinggi Badan (cm)"
                                                                value="{{ $pembiayaan->nasabah->tinggi_badan }}"
                                                                disabled />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="beratBadan"><small
                                                                    class="text-danger">*
                                                                </small>Berat Badan (kg)</label>
                                                            <input type="number" name="berat_badan" id="beratBadan"
                                                                class="form-control"
                                                                placeholder="Masukkan Berat Badan (kg)"
                                                                value="{{ $pembiayaan->nasabah->berat_badan }}"
                                                                disabled />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="statusPernikahan"><small
                                                                    class="text-danger">*
                                                                </small>Status Pernikahan</label>
                                                            <input type="text" name="status_pernikahan"
                                                                class="form-control"
                                                                placeholder="Masukkan Nomor KTP Nasabah"
                                                                id="statusPernikahan"
                                                                value="{{ $pembiayaan->nasabah->status_pernikahan }}"
                                                                required />
                                                        </div>
                                                        @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                                                            <div class="mb-1 col-md-2 hide"
                                                                id="ifMenikahNamaPasangan">
                                                                <label class="form-label" for="namaPasangan">Nama
                                                                    Lengkap
                                                                    Pasangan</label>
                                                                <input type="text" name="nama_pasangan_nasabah"
                                                                    id="namaPasangan" class="form-control"
                                                                    placeholder="Nama Lengkap Pasangan"
                                                                    value="{{ $pembiayaan->nasabah->nama_pasangan_nasabah }}"
                                                                    disabled />
                                                            </div>
                                                            <div class="mb-1 col-md-2 hide" id="ifMenikahKtpPasangan">
                                                                <label class="form-label" for="noKtpPasangan">No
                                                                    KTP Pasangan</label>
                                                                <input type="number" name="no_ktp_pasangan"
                                                                    id="noKtpPasangan" class="form-control"
                                                                    placeholder="Masukkan Nomor KTP pasangan"
                                                                    value="{{ $pembiayaan->nasabah->no_ktp_pasangan }}"
                                                                    disabled />
                                                            </div>
                                                        @endif

                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="dinas"><small
                                                                    class="text-danger">*
                                                                </small>Dinas</label>
                                                            <input type="text" name="dinas" class="form-control"
                                                                id="dinas"
                                                                value="{{ $pembiayaan->nasabah->pekerjaan->dinas }}"
                                                                disabled />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="namaUnitKerja"><small
                                                                    class="text-danger">*
                                                                </small>Nama Unit Kerja</label>
                                                            <input type="text" name="nama_unit_kerja"
                                                                class="form-control" id="namaUnitKerja"
                                                                value="{{ $pembiayaan->nasabah->pekerjaan->nama_unit_kerja }}"
                                                                disabled />
                                                        </div>

                                                    </div>
                                                    <div>
                                                        <div class="mb-1 col-md-12">
                                                            <div data-repeater-list="formAlamatKtp">
                                                                <div data-repeater-item>
                                                                    <div class="row d-flex align-items-end">
                                                                        <div class="col-md-4 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="alamatKtp"><small
                                                                                        class="text-danger">*
                                                                                    </small>Alamat Sesuai KTP</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    name="alamat" id="alamatKtp"
                                                                                    aria-describedby="alamatKtp"
                                                                                    placeholder="Alamat Sesuai KTP"
                                                                                    value="{{ $pembiayaan->nasabah->alamat }}"
                                                                                    disabled />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-1 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="rtKtp"><small
                                                                                        class="text-danger">*
                                                                                    </small>RT
                                                                                    <span id="falseRtKtp"
                                                                                        class="text-danger"
                                                                                        style="display: none; font-size:9px;">Isikan
                                                                                        3
                                                                                        digit!
                                                                                    </span></label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    pattern="^\d{3}$"
                                                                                    oninput="this.value=this.value.replace(/[^0-9,]/g,'');"
                                                                                    name="rt" id="rtKtp"
                                                                                    aria-describedby="rtKtp"
                                                                                    placeholder="000"
                                                                                    value="{{ $pembiayaan->nasabah->rt }}"
                                                                                    disabled />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-1 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="rwKtp"><small
                                                                                        class="text-danger">*
                                                                                    </small>RW
                                                                                    <span id="falseRwKtp"
                                                                                        class="text-danger"
                                                                                        style="display: none; font-size:8px;">Isikan
                                                                                        3
                                                                                        digit!
                                                                                    </span></label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    pattern="^\d{3}$"
                                                                                    oninput="this.value=this.value.replace(/[^0-9,]/g,'');"
                                                                                    name="rw" id="rwKtp"
                                                                                    aria-describedby="rwKtp"
                                                                                    placeholder="000"
                                                                                    value="{{ $pembiayaan->nasabah->rw }}"
                                                                                    disabled />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="kelurahanKtp"><small
                                                                                        class="text-danger">*
                                                                                    </small>Kelurahan</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    name="desa_kelurahan"
                                                                                    id="kelurahanKtp"
                                                                                    aria-describedby="kelurahanKtp"
                                                                                    placeholder="Kelurahan"
                                                                                    value="{{ $pembiayaan->nasabah->desa_kelurahan }}"
                                                                                    disabled />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="kecamatanKtp"><small
                                                                                        class="text-danger">*
                                                                                    </small>Kecamatan</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    name="kecamatan" id="kecamatanKtp"
                                                                                    aria-describedby="kecamatanKtp"
                                                                                    placeholder="Kecamatan"
                                                                                    value="{{ $pembiayaan->nasabah->kecamatan }}"
                                                                                    disabled />
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-2 col-12">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="kabKotaKtp"><small
                                                                                        class="text-danger">*
                                                                                    </small>Kabupaten/Kota</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    name="kabkota" id="kabKotaKtp"
                                                                                    aria-describedby="kabKotaKtp"
                                                                                    placeholder="Kabupaten/Kota"
                                                                                    value="{{ $pembiayaan->nasabah->kabkota }}"
                                                                                    disabled />
                                                                            </div>
                                                                        </div>

                                                                        {{-- <div class="col-md-2 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="provinsiKtp"><small
                                                                                    class="text-danger">*
                                                                                </small>Provinsi</label>
                                                                            <input type="text" class="form-control"
                                                                                name="provinsi" id="provinsiKtp"
                                                                                aria-describedby="provinsiKtp"
                                                                                placeholder="Provinsi"
                                                                                value="{{ $pembiayaan->nasabah->provinsi }}"
                                                                                disabled />
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-1 col-12">
                                                                        <div class="mb-1">
                                                                            <label class="form-label"
                                                                                for="kdPosKtp"><small
                                                                                    class="text-danger">*
                                                                                </small>Kode
                                                                                Pos</label>
                                                                            <input type="number" class="form-control"
                                                                                name="kd_pos" id="kdPosKtp"
                                                                                aria-describedby="kdPosKtp"
                                                                                placeholder="16XXX"
                                                                                value="{{ $pembiayaan->nasabah->kd_pos }}"
                                                                                disabled />
                                                                        </div>
                                                                    </div> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="content-header">
                                                        <h5 class="mb-1">Data Pembiayaan</h5>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="segmen"><small
                                                                    class="text-danger">*
                                                                </small>Segmen - ID Pembiayaan</label>
                                                            <input type="text" class="form-control" id="segmen-id"
                                                                value="{{ $segmen . ' - ' . $pembiayaan->id }}"
                                                                disabled />
                                                        </div>

                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="noAkad"><small
                                                                    class="text-danger">*
                                                                </small>No. Akad</label>
                                                            <input type="text" name="no_akad" class="form-control"
                                                                placeholder="No. Akad" id="noAkad" required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="noRekTabungan">No. Rekening
                                                                Tabungan</label>
                                                            <input type="text" name="no_rek_tabungan"
                                                                class="form-control"
                                                                placeholder="No. Rekening Tabungan"
                                                                id="noRekTabungan" />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="kdKontrak">No.
                                                                Kontrak</label>
                                                            <input type="text" name="kd_kontrak"
                                                                class="form-control" placeholder="No. Kontrak"
                                                                id="kdKontrak" />
                                                        </div>

                                                        <div class="mb-1 col-md-1">
                                                            <label class="form-label" for="inisialProduk"><small
                                                                    class="text-danger">*
                                                                </small>Ins. Produk</label>
                                                            <input type="text" name="inisial_produk"
                                                                class="form-control"
                                                                placeholder="Masukkan Inisial Produk"
                                                                id="inisialProduk"
                                                                value="{{ $pembiayaan->akad == 'Murabahah' ? 'MBA' : 'IJR' }}"
                                                                required />
                                                        </div>
                                                        <div class="mb-1 col-md-1">
                                                            <label class="form-label" for="kdProduk"><small
                                                                    class="text-danger">*
                                                                </small>Kd. Produk</label>
                                                            <input type="text" name="kd_produk"
                                                                class="form-control"
                                                                placeholder="Masukkan Kode Produk" id="kdProduk"
                                                                value="{{ $pembiayaan->akad == 'Murabahah' ? '32' : '34' }}"
                                                                required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="jenispenggunaan"><small
                                                                    class="text-danger">*
                                                                </small>Jenis Penggunaan</label>
                                                            <select class="select2 w-100" name="jenis_penggunaan"
                                                                id="jenispenggunaan"
                                                                data-placeholder="Pilih Jenis Penggunaan" required>
                                                                <option value=""></option>
                                                                <option value="Modal Kerja"
                                                                    {{ $pembiayaan->jenis_penggunaan == 'Modal Kerja' ? 'selected' : '' }}>
                                                                    Modal Kerja</option>
                                                                <option value="Renovasi Rumah"
                                                                    {{ $pembiayaan->jenis_penggunaan == 'Renovasi Rumah' ? 'selected' : '' }}>
                                                                    Renovasi Rumah</option>
                                                                <option value="Pendidikan"
                                                                    {{ $pembiayaan->jenis_penggunaan == 'Pendidikan' ? 'selected' : '' }}>
                                                                    Pendidikan</option>
                                                                <option value="Kesehatan"
                                                                    {{ $pembiayaan->jenis_penggunaan == 'Kesehatan' ? 'selected' : '' }}>
                                                                    Kesehatan</option>
                                                                <option value="Ibadah Umroh"
                                                                    {{ $pembiayaan->jenis_penggunaan == 'Ibadah Umroh' ? 'selected' : '' }}>
                                                                    Ibadah Umroh</option>
                                                                <option value="Ibadah Haji"
                                                                    {{ $pembiayaan->jenis_penggunaan == 'Ibadah Haji' ? 'selected' : '' }}>
                                                                    Ibadah Haji</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="akad"><small
                                                                    class="text-danger">*
                                                                </small>Akad</label>
                                                            <input type="text" name="akad" class="form-control"
                                                                placeholder="Jenis Akad" id="akad"
                                                                value="{{ $pembiayaan->akad }}" required />
                                                        </div>

                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="jenisProduk"><small
                                                                    class="text-danger">*
                                                                </small>Jenis Produk</label>
                                                            <input type="text" name="jenis_produk"
                                                                class="form-control"
                                                                placeholder="Masukkan Jenis Produk" id="jenisProduk"
                                                                required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="tglAkad"><small
                                                                    class="text-danger">*
                                                                </small>Tanggal Akad</label>
                                                            <input type="text" id="tglAkad"
                                                                class="form-control flatpickr-basic" name="tgl_akad"
                                                                placeholder="DD-MM-YYYY" required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="tglPencairan"><small
                                                                    class="text-danger">*
                                                                </small>Tanggal Pencairan</label>
                                                            <input type="text" id="tglPencairan"
                                                                class="form-control flatpickr-basic"
                                                                name="tgl_pencairan" placeholder="DD-MM-YYYY"
                                                                required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="tglAngsuranAwal"><small
                                                                    class="text-danger">*
                                                                </small>Tanggal Angsuran Awal</label>
                                                            <input type="text" id="tglAngsuranAwal"
                                                                class="form-control flatpickr-basic"
                                                                name="tgl_angsuran_awal" placeholder="DD-MM-YYYY"
                                                                required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="tglJatuhTempo"><small
                                                                    class="text-danger">*
                                                                </small>Tanggal Jatuh Tempo</label>
                                                            <input type="text" id="tglJatuhTempo"
                                                                class="form-control flatpickr-basic"
                                                                name="tgl_jatuh_tempo" placeholder="DD-MM-YYYY"
                                                                required />
                                                        </div>

                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="plafond"><small
                                                                    class="text-danger">*
                                                                </small>Plafond</label>
                                                            <input type="text" name="plafond"
                                                                class="form-control numeral-mask"
                                                                placeholder="Plafond" id="plafond"
                                                                value="{{ number_format($pembiayaan->nominal_pembiayaan, 0, ',', '.') }}"
                                                                required />
                                                        </div>
                                                        <div class="mb-1 col-md-1">
                                                            <label class="form-label" for="tenor"><small
                                                                    class="text-danger">*
                                                                </small>Tenor (bln)</label>
                                                            <input type="text" name="tenor" class="form-control"
                                                                placeholder="Tenor (bulan)" id="tenor"
                                                                value="{{ $pembiayaan->tenor }}" required />
                                                        </div>
                                                        <div class="mb-1 col-md-1">
                                                            <label class="form-label" for="persentaseMargin"><small
                                                                    class="text-danger">*
                                                                </small>Margin (%)</label>
                                                            <input type="text" name="persentase_margin"
                                                                class="form-control" placeholder="Persentase Margin"
                                                                id="persentaseMargin"
                                                                value="{{ number_format($pembiayaan->rate, 2, ',', '.') }}"
                                                                required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="margin"><small
                                                                    class="text-danger">*
                                                                </small>Nominal Margin</label>
                                                            <input type="text" name="margin"
                                                                class="form-control numeral-mask" placeholder="Margin"
                                                                id="margin"
                                                                value="{{ number_format($margin, 0, ',', '.') }}"
                                                                required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="hargaJual"><small
                                                                    class="text-danger">*
                                                                </small>Harga Jual</label>
                                                            <input type="text" name="harga_jual"
                                                                class="form-control numeral-mask"
                                                                placeholder="Harga Jual" id="hargaJual"
                                                                value="{{ number_format($hargaJual, 0, ',', '.') }}"
                                                                required />
                                                        </div>
                                                        <div class="mb-1 col-md-4">
                                                            <label class="form-label" for="hargaJualTerbilang"><small
                                                                    class="text-danger">*
                                                                </small>Harga Jual Terbilang</label>
                                                            <input type="text" name="harga_jual_terbilang"
                                                                class="form-control"
                                                                placeholder="Harga Jual Terbilang"
                                                                id="hargaJualTerbilang"
                                                                value="{{ $hargaJualTerbilang }}" required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="angsuran"><small
                                                                    class="text-danger">*
                                                                </small>Angsuran</label>
                                                            <input type="text" name="angsuran"
                                                                class="form-control numeral-mask"
                                                                placeholder="Angsuran" id="angsuran"
                                                                value="{{ number_format($angsuran, 0, ',', '.') }}"
                                                                required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="dendaPerHari"><small
                                                                    class="text-danger">*
                                                                </small>Denda Per Hari</label>
                                                            <input type="text" name="denda_per_hari"
                                                                class="form-control numeral-mask"
                                                                placeholder="Denda Per Hari" id="dendaPerHari"
                                                                value="{{ number_format($dendaPerHari, 0, ',', '.') }}"
                                                                required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="byAdm"><small
                                                                    class="text-danger">*
                                                                </small>Biaya Administrasi</label>
                                                            <input type="text" name="by_adm"
                                                                class="form-control numeral-mask"
                                                                placeholder="Biaya Administrasi"
                                                                value={{ number_format($byAdm, 0, ',', '.') }}
                                                                id="byAdm" onkeyup="sumBy(this.value);"
                                                                required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="byNotaris"><small
                                                                    class="text-danger">*
                                                                </small>Biaya Notaris</label>
                                                            <input type="text" name="by_notaris"
                                                                class="form-control numeral-mask"
                                                                placeholder="Biaya Notaris" id="byNotaris"
                                                                onkeyup="sumBy(this.value);" required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="byAsuransiJiwa"><small
                                                                    class="text-danger">*
                                                                </small>Biaya Asuransi Jiwa</label>
                                                            <input type="text" name="biaya_asuransi_jiwa"
                                                                class="form-control numeral-mask"
                                                                placeholder="Biaya Asuransi Jiwa" id="byAsuransiJiwa"
                                                                onkeyup="sumBy(this.value);" required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="byAdmTab"><small
                                                                    class="text-danger">*
                                                                </small>Biaya Administrasi Tabungan</label>
                                                            <input type="text" name="by_adm_tab"
                                                                class="form-control numeral-mask"
                                                                placeholder="Biaya Administrasi Tabungan"
                                                                id="byAdmTab"
                                                                value="{{ number_format($byAdmTab, 0, ',', '.') }}"
                                                                onkeyup="sumBy(this.value);" required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="byAsuransiKendaraan"><small
                                                                    class="text-danger">*
                                                                </small>Biaya Asuransi Kendaraan</label>
                                                            <input type="text" name="biaya_asuransi_kendaraan"
                                                                class="form-control numeral-mask"
                                                                placeholder="Biaya Asuransi Kendaraan"
                                                                id="byAsuransiKendaraan" onkeyup="sumBy(this.value);"
                                                                required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="byAsuransiKebakaran"><small
                                                                    class="text-danger">*
                                                                </small>Biaya Asuransi Kebakaran</label>
                                                            <input type="text" name="biaya_asuransi_kebakaran"
                                                                class="form-control numeral-mask"
                                                                placeholder="Biaya Asuransi Kebakaran"
                                                                id="byAsuransiKebakaran" onkeyup="sumBy(this.value);"
                                                                required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="byMaterai"><small
                                                                    class="text-danger">*
                                                                </small>Biaya Materai</label>
                                                            <input type="text" name="by_materai"
                                                                class="form-control numeral-mask"
                                                                placeholder="Biaya Materai" id="byMaterai"
                                                                onkeyup="sumBy(this.value);" required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="bySp3"><small
                                                                    class="text-danger">*
                                                                </small>Total Potongan/Biaya di SP3</label>
                                                            <input type="text" class="form-control numeral-mask"
                                                                value="{{ number_format($byAdm + $byAdmTab, 0, ',', '.') }}"
                                                                id="bySp3Dummy" disabled />
                                                            <input type="hidden" name="by_sp3"
                                                                class="form-control numeral-mask" id="bySp3"
                                                                required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="holdAngsuran"><small
                                                                    class="text-danger">*
                                                                </small>Hold Angsuran</label>
                                                            <input type="text" name="hold_angsuran"
                                                                class="form-control"
                                                                placeholder="Masukkan Hold Angsuran" id="holdAngsuran"
                                                                onkeyup="sumBy(this.value);" required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="angsuranNpp"><small
                                                                    class="text-danger">*
                                                                </small>Angsuran NPP</label>
                                                            <input type="text" class="form-control numeral-mask"
                                                                id="angsuranNppDummy" value="0" disabled />
                                                            <input type="hidden" name="angsuran_npp"
                                                                class="form-control numeral-mask"
                                                                placeholder="Masukkan Angsuran NPP" value="0"
                                                                id="angsuranNpp" required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="byNpp"><small
                                                                    class="text-danger">*
                                                                </small>Biaya NPP</label>
                                                            <input type="text" class="form-control numeral-mask"
                                                                id="byNppDummy" disabled />
                                                            <input type="hidden" name="by_npp"
                                                                class="form-control numeral-mask" id="byNpp"
                                                                required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="pencairanNasabahNpp"><small
                                                                    class="text-danger">*
                                                                </small>Pencairan Nasabah di NPP</label>
                                                            <input type="text" class="form-control numeral-mask"
                                                                id="pencairanNasabahNppDummy" disabled />
                                                            <input type="hidden" name="pencairan_nasabah_npp"
                                                                class="form-control numeral-mask"
                                                                id="pencairanNasabahNpp" required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="ao"><small
                                                                    class="text-danger">*
                                                                </small>Nama
                                                                AO</label>
                                                            <select class="select2 w-100" name="user_id"
                                                                id="ao" data-placeholder="Pilih AO" disabled>
                                                                <option value=""></option>
                                                                @foreach ($aos as $ao)
                                                                    <option value="{{ $ao->user->id }}"
                                                                        {{ $pembiayaan->user_id == $ao->user->id ? 'selected' : '' }}>
                                                                        {{ $ao->user->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-1 col-md-3">
                                                            <label class="form-label" for="saksiAo"><small
                                                                    class="text-danger">*
                                                                </small>Saksi AO</label>
                                                            <input type="text" name="saksi_ao"
                                                                class="form-control" placeholder="Masukkan Saksi AO"
                                                                id="saksiAo" required />
                                                        </div>
                                                        <div class="mb-1 col-md-3">
                                                            <label class="form-label" for="saksiLegal"><small
                                                                    class="text-danger">*
                                                                </small>Saksi Legal</label>
                                                            <input type="text" name="saksi_legal"
                                                                class="form-control"
                                                                placeholder="Masukkan Saksi Legal" id="saksiLegal"
                                                                required />
                                                        </div>
                                                        <div class="mb-1 col-md-4">
                                                            <label class="form-label" for="polaPembayaran"><small
                                                                    class="text-danger">*
                                                                </small>Pola Pembayaran</label>
                                                            <input type="text" name="pola_pembayaran"
                                                                class="form-control"
                                                                placeholder="Masukkan Pola Pembayaran"
                                                                id="polaPembayaran" required />
                                                        </div>
                                                        <div class="mb-1 col-md-2">
                                                            <label class="form-label" for="polaAngsuran"><small
                                                                    class="text-danger">*
                                                                </small>Pola Angsuran</label>
                                                            <input type="text" name="pola_angsuran"
                                                                class="form-control"
                                                                placeholder="Masukkan Pola Angsuran" id="polaAngsuran"
                                                                value="bulan" required />
                                                        </div>
                                                        <div class="mb-1 col-md-3">
                                                            <label class="form-label" for="namaAsuransiJiwa"><small
                                                                    class="text-danger">*
                                                                </small>Nama Asuransi Jiwa</label>
                                                            <input type="hidden" name="id_asuransi"
                                                                class="form-control" id="idAsuransi" required />
                                                            <select class="select2 w-100" name="nama_asuransi"
                                                                id="namaAsuransiJiwa"
                                                                data-placeholder="Pilih Nama Asuransi Jiwa" required>
                                                                <option value=""></option>
                                                                <option value="Asyki">
                                                                    Asyki</option>
                                                                <option value="Reliance">
                                                                    Reliance</option>
                                                                <option value="Jamkrida">
                                                                    Jamkrida</option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-1 col-md-3">
                                                            <label class="form-label" for="lembarJadang"><small
                                                                    class="text-danger">*
                                                                </small>Lembar Jadwal Angsuran</label>
                                                            <input type="file" name="lembar_jadang"
                                                                class="form-control"
                                                                placeholder="Upload Lembar Jadwal Angsuran"
                                                                id="lembarJadang" required />
                                                        </div>

                                                        {{-- Jaminan 1 --}}
                                                        <div class="content-header">
                                                            <h5 class="card-header" style="margin-left:-20px;">
                                                                <small class="text-danger">*
                                                                </small>&nbsp;Data Jaminan
                                                                <span class="separator"></span>
                                                                <span class="rotate"><i data-feather="chevron-down"
                                                                        class="font-large-1"
                                                                        onclick="toggleJaminan1()"></i></span>
                                                            </h5>
                                                        </div>
                                                        <div id="divJaminan1">
                                                            <div class="row">
                                                                <div class="mb-1 col-md-12">
                                                                    <iframe
                                                                        src="{{ asset('storage/' . $pembiayaan->nasabah->pekerjaan->dokumen_sk) }}"
                                                                        class="d-block w-100" height="300"></iframe>
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label"
                                                                        for="namaJaminan1"><small
                                                                            class="text-danger">*
                                                                        </small>Nama Jaminan</label>
                                                                    <input type="hidden" name="id_jaminan"
                                                                        class="form-control" id="idJaminan"
                                                                        required />
                                                                    <input type="text" name="nama_jaminan1"
                                                                        class="form-control"
                                                                        placeholder="Masukkan Nama Jaminan 1"
                                                                        id="namaJaminan1" required />
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label" for="noJaminan1"><small
                                                                            class="text-danger">*
                                                                        </small>No. Jaminan</label>
                                                                    <input type="text" name="no_jaminan1"
                                                                        class="form-control"
                                                                        placeholder="Masukkan No. Jaminan 1"
                                                                        id="noJaminan1" required />
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label"
                                                                        for="luasTanahJaminan1">Luas
                                                                        Tanah
                                                                        (m<sup>2</sup>)</label>
                                                                    <input type="text" name="luas_tanah_jaminan1"
                                                                        class="form-control"
                                                                        placeholder="Masukkan Luas Tanah Jaminan 1"
                                                                        id="luasTanahJaminan1" />
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label"
                                                                        for="tglTerbitJaminan1"><small
                                                                            class="text-danger">*
                                                                        </small>Tanggal Terbit Jaminan</label>
                                                                    <input type="text" id="tglTerbitJaminan1"
                                                                        class="form-control flatpickr-basic"
                                                                        name="tgl_terbit_jaminan1"
                                                                        placeholder="DD-MM-YYYY" required />
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label"
                                                                        for="penerbitJaminan1"><small
                                                                            class="text-danger">*
                                                                        </small>Penerbit</label>
                                                                    <input type="text" name="penerbit_jaminan1"
                                                                        class="form-control"
                                                                        placeholder="Masukkan Penerbit Jaminan 1"
                                                                        id="penerbitJaminan1" required />
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label"
                                                                        for="masaBerlakuJaminan1"><small
                                                                            class="text-danger">*
                                                                        </small>Masa Berlaku Jaminan</label>
                                                                    <input type="text" id="masaBerlakuJaminan1"
                                                                        class="form-control flatpickr-basic"
                                                                        name="masa_berlaku_jaminan1"
                                                                        placeholder="DD-MM-YYYY" required />
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label"
                                                                        for="atasNamaJaminan1"><small
                                                                            class="text-danger">*
                                                                        </small>Atas Nama</label>
                                                                    <input type="text" name="atas_nama_jaminan1"
                                                                        class="form-control"
                                                                        placeholder="Masukkan Atas Nama Jaminan 1"
                                                                        id="atasNamaJaminan1" required />
                                                                </div>
                                                                <div class="mb-1 col-md-4">
                                                                    <label class="form-label"
                                                                        for="hubNamaJaminan1"><small
                                                                            class="text-danger">*
                                                                        </small>Hubungan Nama Di Surat Jaminan Dengan
                                                                        Nasabah</label>
                                                                    <input type="text" name="hub_nama_jaminan1"
                                                                        class="form-control"
                                                                        placeholder="Masukkan Hubungan"
                                                                        id="hubNamaJaminan1" required />
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="mb-1 col-md-12">
                                                                    <div data-repeater-list="formAlamatJaminan1">
                                                                        <div data-repeater-item>
                                                                            <div class="row d-flex align-items-end">
                                                                                <div class="col-md-4 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="alamatJaminan1"><small
                                                                                                class="text-danger">*
                                                                                            </small>Alamat
                                                                                            Jaminan</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="alamat_jaminan1"
                                                                                            id="alamatJaminan1"
                                                                                            aria-describedby="alamatJaminan1"
                                                                                            placeholder="Alamat Jaminan 1"
                                                                                            required />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-1 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="rtJaminan1"><small
                                                                                                class="text-danger">*
                                                                                            </small>RT
                                                                                            <span id="falseRtJaminan1"
                                                                                                class="text-danger"
                                                                                                style="display: none; font-size:9px;">Isikan
                                                                                                3
                                                                                                digit!
                                                                                            </span></label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            pattern="^\d{3}$"
                                                                                            oninput="this.value=this.value.replace(/[^0-9,]/g,'');"
                                                                                            name="rt_jaminan1"
                                                                                            id="rtJaminan1"
                                                                                            aria-describedby="rtJaminan1"
                                                                                            placeholder="000"
                                                                                            required />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-1 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="rwJaminan1"><small
                                                                                                class="text-danger">*
                                                                                            </small>RW
                                                                                            <span id="falseRwJaminan1"
                                                                                                class="text-danger"
                                                                                                style="display: none; font-size:8px;">Isikan
                                                                                                3
                                                                                                digit!
                                                                                            </span></label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            pattern="^\d{3}$"
                                                                                            oninput="this.value=this.value.replace(/[^0-9,]/g,'');"
                                                                                            name="rw_jaminan1"
                                                                                            id="rwJaminan1"
                                                                                            aria-describedby="rwJaminan1"
                                                                                            placeholder="000"
                                                                                            required />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-2 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="kelurahanJaminan1"><small
                                                                                                class="text-danger">*
                                                                                            </small>Kelurahan</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="kel_jaminan1"
                                                                                            id="kelurahanJaminan1"
                                                                                            aria-describedby="kelurahanJaminan1"
                                                                                            placeholder="Kelurahan"
                                                                                            required />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-2 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="kecamatanJaminan1"><small
                                                                                                class="text-danger">*
                                                                                            </small>Kecamatan</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="kec_jaminan1"
                                                                                            id="kecamatanJaminan1"
                                                                                            aria-describedby="kecamatanJaminan1"
                                                                                            placeholder="Kecamatan"
                                                                                            required />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-2 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="kabKotaJaminan1"><small
                                                                                                class="text-danger">*
                                                                                            </small>Kabupaten/Kota</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="kabkota_jaminan1"
                                                                                            id="kabKotaJaminan1"
                                                                                            aria-describedby="kabKotaJaminan1"
                                                                                            placeholder="Kabupaten/Kota"
                                                                                            required />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Jaminan 2 --}}
                                                        <div class="content-header">
                                                            <h5 class="card-header" style="margin-left:-20px;">
                                                                Data Jaminan 2
                                                                <span class="separator"></span>
                                                                <span class="rotate"><i data-feather="chevron-up"
                                                                        class="font-large-1"
                                                                        onclick="toggleJaminan2()"></i></span>
                                                            </h5>
                                                        </div>
                                                        <div id="divJaminan2" style="display: none;">
                                                            <div class="row">
                                                                {{-- <div class="mb-1 col-md-12">
                                                                <iframe
                                                                    src="{{ asset('storage/' . $fotoKtp->foto) }}"
                                                                    class="d-block w-100" height="300"></iframe>
                                                            </div> --}}
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label"
                                                                        for="namaJaminan2">Nama Jaminan</label>
                                                                    <input type="text" name="nama_jaminan2"
                                                                        class="form-control"
                                                                        placeholder="Masukkan Nama Jaminan 2"
                                                                        id="namaJaminan2" />
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label" for="noJaminan2">No.
                                                                        Jaminan</label>
                                                                    <input type="text" name="no_jaminan2"
                                                                        class="form-control"
                                                                        placeholder="Masukkan No. Jaminan 2"
                                                                        id="noJaminan2" />
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label"
                                                                        for="luasTanahJaminan2">Luas
                                                                        Tanah
                                                                        (m<sup>2</sup>)</label>
                                                                    <input type="text" name="luas_tanah_jaminan2"
                                                                        class="form-control"
                                                                        placeholder="Masukkan Luas Tanah Jaminan 2"
                                                                        id="luasTanahJaminan2" />
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label"
                                                                        for="tglTerbitJaminan2">Tanggal Terbit
                                                                        Jaminan</label>
                                                                    <input type="text" id="tglTerbitJaminan2"
                                                                        class="form-control flatpickr-basic"
                                                                        name="tgl_terbit_jaminan2"
                                                                        placeholder="DD-MM-YYYY" />
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label"
                                                                        for="penerbitJaminan2">Penerbit</label>
                                                                    <input type="text" name="penerbit_jaminan2"
                                                                        class="form-control"
                                                                        placeholder="Masukkan Penerbit Jaminan 2"
                                                                        id="penerbitJaminan2" />
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label"
                                                                        for="masaBerlakuJaminan2">Masa Berlaku
                                                                        Jaminan</label>
                                                                    <input type="text" id="masaBerlakuJaminan2"
                                                                        class="form-control flatpickr-basic"
                                                                        name="masa_berlaku_jaminan2"
                                                                        placeholder="DD-MM-YYYY" />
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label"
                                                                        for="atasNamaJaminan2">Atas Nama</label>
                                                                    <input type="text" name="atas_nama_jaminan2"
                                                                        class="form-control"
                                                                        placeholder="Masukkan Atas Nama Jaminan 2"
                                                                        id="atasNamaJaminan2" />
                                                                </div>
                                                                <div class="mb-1 col-md-4">
                                                                    <label class="form-label"
                                                                        for="hubNamaJaminan2">Hubungan Nama Di Surat
                                                                        Jaminan Dengan
                                                                        Nasabah</label>
                                                                    <input type="text" name="hub_nama_jaminan2"
                                                                        class="form-control"
                                                                        placeholder="Masukkan Hubungan"
                                                                        id="hubNamaJaminan2" />
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="mb-1 col-md-12">
                                                                    <div data-repeater-list="formAlamatJaminan1">
                                                                        <div data-repeater-item>
                                                                            <div class="row d-flex align-items-end">
                                                                                <div class="col-md-4 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="alamatJaminan1">Alamat
                                                                                            Jaminan</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="alamat_jaminan2"
                                                                                            id="alamatJaminan2"
                                                                                            aria-describedby="alamatJaminan2"
                                                                                            placeholder="Alamat Jaminan 2" />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-1 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="rtJaminan2">RT
                                                                                            <span id="falseRtJaminan2"
                                                                                                class="text-danger"
                                                                                                style="display: none; font-size:9px;">Isikan
                                                                                                3
                                                                                                digit!
                                                                                            </span></label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            pattern="^\d{3}$"
                                                                                            oninput="this.value=this.value.replace(/[^0-9,]/g,'');"
                                                                                            name="rt_jaminan2"
                                                                                            id="rtJaminan2"
                                                                                            aria-describedby="rtJaminan2"
                                                                                            placeholder="000" />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-1 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="rwJaminan2">RW
                                                                                            <span id="falseRwJaminan2"
                                                                                                class="text-danger"
                                                                                                style="display: none; font-size:8px;">Isikan
                                                                                                3
                                                                                                digit!
                                                                                            </span></label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            pattern="^\d{3}$"
                                                                                            oninput="this.value=this.value.replace(/[^0-9,]/g,'');"
                                                                                            name="rw_jaminan2"
                                                                                            id="rwJaminan2"
                                                                                            aria-describedby="rwJaminan2"
                                                                                            placeholder="000" />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-2 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="kelurahanJaminan2">Kelurahan</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="kel_jaminan2"
                                                                                            id="kelurahanJaminan2"
                                                                                            aria-describedby="kelurahanJaminan2"
                                                                                            placeholder="Kelurahan" />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-2 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="kecamatanJaminan2">Kecamatan</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="kec_jaminan2"
                                                                                            id="kecamatanJaminan2"
                                                                                            aria-describedby="kecamatanJaminan2"
                                                                                            placeholder="Kecamatan" />
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-2 col-12">
                                                                                    <div class="mb-1">
                                                                                        <label class="form-label"
                                                                                            for="kabKotaJaminan2">Kabupaten/Kota</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            name="kabkota_jaminan2"
                                                                                            id="kabKotaJaminan2"
                                                                                            aria-describedby="kabKotaJaminan2"
                                                                                            placeholder="Kabupaten/Kota" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Jaminan Kendaraan --}}
                                                        <div class="content-header">
                                                            <h5 class="card-header" style="margin-left:-20px;">
                                                                Jaminan Kendaraan
                                                                <span class="separator"></span>
                                                                <span class="rotate"><i data-feather="chevron-up"
                                                                        class="font-large-1"
                                                                        onclick="toggleJaminanKendaraan()"></i></span>
                                                            </h5>
                                                        </div>
                                                        <div id="divJaminanKendaraan" style="display: none;">
                                                            <div class="row">
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label"
                                                                        for="merkKendaraan">Merk
                                                                        Kendaraan</label>
                                                                    <input type="text" name="merk_kendaraan"
                                                                        class="form-control"
                                                                        placeholder="Masukkan Merk Kendaraan"
                                                                        id="merkKendaraan" />
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label"
                                                                        for="tipeKendaraan">Tipe
                                                                        Kendaraan</label>
                                                                    <input type="text" name="tipe_kendaraan"
                                                                        class="form-control"
                                                                        placeholder="Masukkan Tipe Kendaraan"
                                                                        id="tipeKendaraan" />
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label"
                                                                        for="warna">Warna</label>
                                                                    <input type="text" name="warna"
                                                                        class="form-control"
                                                                        placeholder="Masukkan Warna"
                                                                        id="warna" />
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label"
                                                                        for="tahunDibuat">Tahun
                                                                        Dibuat</label>
                                                                    <input type="text" name="tahun_dibuat"
                                                                        class="form-control"
                                                                        placeholder="Masukkan Tahun Dibuat"
                                                                        id="tahunDibuat" />
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label" for="noMesin">No.
                                                                        Mesin</label>
                                                                    <input type="text" name="no_mesin"
                                                                        class="form-control"
                                                                        placeholder="Masukkan No. Mesin"
                                                                        id="noMesin" />
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label" for="noRangka">No.
                                                                        Rangka</label>
                                                                    <input type="text" name="no_rangka"
                                                                        class="form-control"
                                                                        placeholder="Masukkan No. Rangka"
                                                                        id="noRangka" />
                                                                </div>
                                                                <div class="mb-1 col-md-2">
                                                                    <label class="form-label" for="noPolisi">No.
                                                                        Polisi</label>
                                                                    <input type="text" name="no_polisi"
                                                                        class="form-control"
                                                                        placeholder="Masukkan No. Polisi"
                                                                        id="noPolisi" />
                                                                </div>
                                                            </div>

                                                        </div>


                                                        <textarea class="form-control mt-2 mb-3" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                        <input type="hidden" name="p3k_pembiayaan_id"
                                                            value="{{ $pembiayaan->id }}" />
                                                        <input type="hidden" name="status_id" value="11" />
                                                        <input type="hidden" name="cek_staff_akad"
                                                            value="Proses" />
                                                        <input type="hidden" name="reg_akad" value="Sudah" />
                                                        <div class="row">
                                                            <div class="col-md-6">

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <button type="button"
                                                                    class="btn btn-outline-danger w-100"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button type="submit"
                                                                    class="btn btn-success w-100">
                                                                    Submit
                                                                </button>
                                                            </div>
                                                        </div>

                                                </form>
                                            </div>




                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Modal Register Akad-->
                        </div>
                    </div>

                    <!-- Modal Dokumen Deviasi -->
                    @if ($deviasi)
                        <div class="modal fade" id="dokumenDeviasi" tabindex="-1"
                            aria-labelledby="addNewCardTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-transparent">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-sm-5 mx-50 pb-5">
                                        <h3 class="text-center">Lampiran Dokumen Deviasi
                                        </h3>
                                        <div class="card-body">
                                            <h4 class="text-center">Deviasi
                                                {{ $deviasi->kategori_deviasi }}
                                            </h4>
                                            <iframe src="{{ asset('storage/' . $deviasi->dokumen_deviasi) }}"
                                                class="d-block w-100" height="500"></iframe>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!--/ Modal Dokumen Deviasi -->
                </div>
            </div>
            <!-- /proposal -->
        </div>
        <div class="tab-pane" id="tab-lampiran-identitas" role="tabpanel"
            aria-labelledby="profile-tab-justified">
            @foreach ($fotos->where('kategori', '!=', 'IDEB')->where('kategori', '!=', 'IDEB Pasangan') as $foto)
                <!-- post 1 -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-start align-items-center mb-1">
                            <div>
                                <h6 class="mb-0">{{ $foto->kategori }}</h6>
                                <small class="text-muted">Diupload pada:
                                    {{ $foto->created_at->diffForhumans() }}</small>
                            </div>
                        </div>
                        <iframe src="{{ asset('storage/' . $foto->foto) }}" class="d-block w-100"
                            height="600"></iframe>
                    </div>
                </div>
                <!--/ post 1 -->
            @endforeach
        </div>
        <div class="tab-pane" id="legalitas-agunan" role="tabpanel" aria-labelledby="messages-tab-justified">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-start align-items-center mb-1">
                        <div>
                            <h6 class="mb-0">
                                SK Pengangkatan/Terakhir
                            </h6>
                            <small class="text-muted">Diupload pada:
                                {{ $pembiayaan->created_at->diffForhumans() }}</small>
                        </div>
                    </div>
                    <iframe src="{{ asset('storage/' . $pembiayaan->nasabah->pekerjaan->dokumen_sk) }}"
                        class="d-block w-100" height="600"></iframe>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="keuangan" role="tabpanel" aria-labelledby="settings-tab-justified">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-start align-items-center mb-1">
                        <div>
                            <h6 class="mb-0">
                                Dokumen Keuangan
                            </h6>
                            <small class="text-muted">Diupload pada:
                                {{ $pembiayaan->created_at->diffForhumans() }}</small>
                        </div>
                    </div>
                    <iframe src="{{ asset('storage/' . $pembiayaan->dokumen_keuangan) }}" class="d-block w-100"
                        height="600"></iframe>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="ideb" role="tabpanel" aria-labelledby="settings-tab-justified">
            <center>
                <h4>IDEB Pemohon</h4>
            </center>
            <iframe src="{{ asset('storage/' . $pembiayaan->dokumen_ideb) }}" class="d-block w-100"
                height="600"></iframe>
            @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                <br /> <br />
                <hr />
                <center>
                    <h4>IDEB Pasangan</h4>
                </center>
                @if ($dokumenIdebPasangan)
                    <iframe src="{{ asset('storage/' . $dokumenIdebPasangan->foto) }}" class="d-block w-100"
                        height="600"></iframe>
                @else
                    <center>
                        <br />
                        <p>IDEB Pasangan tidak ada/belum di-upload</p>
                    </center>
                @endif
            @endif
        </div>

        <div class="tab-pane" id="timeline" role="tabpanel" aria-labelledby="settings-tab-justified">
            <div class="col-xl-12 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                <div class="card">
                    <!-- Timeline Starts -->
                    <div class="card-body">
                        <ul class="timeline">
                            @foreach ($timelines as $timeline)
                                @php

                                    $arr = $loop->iteration;
                                    if ($arr == -2) {
                                        $waktu_mulai = Carbon\Carbon::parse($timelines[0]->created_at);
                                        $waktu_selesai = Carbon\Carbon::parse($timeline->created_at);
                                        $selisih = $waktu_selesai->diffAsCarbonInterval($waktu_mulai);
                                    } elseif ($arr == $banyakHistory) {
                                        $waktu_mulai = Carbon\Carbon::parse($timelines[0]->created_at);
                                        $waktu_selesai = Carbon\Carbon::parse($timeline->created_at);
                                        $selisih = $waktu_selesai->diffAsCarbonInterval($waktu_mulai);
                                    } elseif ($arr >= 0) {
                                        $waktu_mulai = Carbon\Carbon::parse($timelines[$arr]->created_at);
                                        $waktu_selesai = Carbon\Carbon::parse($timeline->created_at);
                                        $selisih = $waktu_selesai->diffAsCarbonInterval($waktu_mulai);
                                    }

                                @endphp
                                <li class="timeline-item">
                                    <span
                                        class="timeline-point timeline-point-success timeline-point-indicator"></span>
                                    <div class="timeline-event">
                                        <div
                                            class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-0">
                                            <h6
                                                value="{{ $timeline->statushistory?->id ?? '' }}, {{ $timeline->jabatan?->jabatan_id ?? '' }}">
                                                {{ $timeline->statushistory?->keterangan ?? '' }}
                                                {{ $timeline->jabatan?->keterangan ?? '' }}
                                            </h6>
                                            <span class="timeline-event-time"
                                                style="text-align: right">{{ $timeline->created_at->isoformat('dddd, D MMMM Y') }}
                                                <br>{{ $timeline->created_at->isoformat('HH:mm:ss') }}
                                            </span>
                                        </div>
                                        @if ($timeline->catatan)
                                            <p value="{{ $timeline->id }}">
                                                <i>* Catatan</i>:<br />
                                                {!! nl2br($timeline->catatan) !!}
                                            <p>
                                        @endif
                                        @if ($arr == -1)
                                        @else
                                            <span class="timeline-event-time">Waktu
                                                Diproses : {{ $selisih }}</span>
                                        @endif
                                        <div class="d-flex flex-row align-items-center">

                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            <p class="fw-bold"> Total SLA = {{ $totalWaktu }}</p>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Justified Tabs ends -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
{{-- <script>
    function copyText() {
        var value1 = document.getElementById("copyNama").value; // Get value for column 1
        var value2 = document.getElementById("copyNoKtp").value; // Get value for column 2
        var value3 = document.getElementById("copyAlamat").value; // Get value for column 3
        var value4 = "value4"; // Get value for column 4
        var value5 = "value5"; // Get value for column 5
        var value6 = "value6"; // Get value for column 6

        var copyText = value1 + "\t" + value2 + "\t" + value3 + "\t" + value4 + "\t" + "\t" + value5 + "\t" + value6;

        var inputElement = document.createElement('textarea');
        inputElement.value = copyText;
        document.body.appendChild(inputElement);
        inputElement.select();
        document.execCommand('copy');
        document.body.removeChild(inputElement);

        alert("Copied the values to clipboard.");
    }
</script> --}}
<script>
    function copyText() {
        var copyNama = document.getElementById("copyNama").value;
        var copyNoKtp = document.getElementById("copyNoKtp").value;
        var copyAlamat = document.getElementById("copyAlamat").value;
        var copyRt = document.getElementById("copyRt").value;
        var copyRw = document.getElementById("copyRw").value;
        var copyDesaKelurahan = document.getElementById("copyDesaKelurahan").value;
        var copyKecamatan = document.getElementById("copyKecamatan").value;
        var copyKabKota = document.getElementById("copyKabKota").value;
        var copyTempatLahir = document.getElementById("copyTempatLahir").value;
        var copyTglLahir = document.getElementById("copyTglLahir").value;
        var copyBlnLahir = document.getElementById("copyBlnLahir").value;
        var copyThnLahir = document.getElementById("copyThnLahir").value;
        var copyDinas = document.getElementById("copyDinas").value;
        var copyNamaUnitKerja = document.getElementById("copyNamaUnitKerja").value;

        var copyText = copyNama + "\t" + copyNoKtp + "\t" + copyAlamat + "\t" + copyRt + "\t" + copyRw + "\t" +
            copyDesaKelurahan + "\t" + copyKecamatan + "\t" + copyKabKota + "\t" + copyTempatLahir + "\t" +
            copyTglLahir + "\t" + copyBlnLahir + "\t" + copyThnLahir + "\t" + copyDinas + "\t" + copyNamaUnitKerja;

        var inputElement = document.createElement('textarea');
        inputElement.value = copyText;
        document.body.appendChild(inputElement);
        inputElement.select();
        document.execCommand('copy');
        document.body.removeChild(inputElement);

        alert("Data berhasil disalin ke clipboard.");
    }
</script>

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

    var plafond, byAdm, byNotaris, byAsuransiJiwa, byAdmTab, byAsuransiKendaraan, byAsuransiKebakaran,
        byMaterai, totalPotonganSp3, totalPotonganSp3Dummy, angsuran, holdAngsuran, angsuranNpp, angsuranNppDummy,
        totalPotonganNpp, totalPotonganNppDummy, totalPencairanNpp, totalPencairanNppDummy;

    function sumBy(value) {
        byAdm = document.getElementById("byAdm").value
            .replace(/\./g, "");
        byNotaris = document.getElementById("byNotaris").value
            .replace(/\./g, "");
        byAsuransiJiwa = document.getElementById("byAsuransiJiwa").value
            .replace(/\./g, "");
        byAdmTab = document.getElementById("byAdmTab").value
            .replace(/\./g, "");
        byAsuransiKendaraan = document.getElementById("byAsuransiKendaraan").value
            .replace(/\./g, "");
        byAsuransiKebakaran = document.getElementById("byAsuransiKebakaran").value.replace(
            /\./g, "");
        byMaterai = document.getElementById("byMaterai").value
            .replace(/\./g, "");

        //Total potongan di SP3
        totalPotonganSp3 = +byAdm + +byNotaris + +byAsuransiJiwa + +byAdmTab + +byAsuransiKendaraan +
            +byAsuransiKebakaran + +byMaterai;
        document.getElementById("bySp3").value = totalPotonganSp3;

        totalPotonganSp3Dummy = totalPotonganSp3;
        document.getElementById("bySp3Dummy").value =
            totalPotonganSp3Dummy;
        totalPotonganSp3Dummy = document.getElementById("bySp3Dummy").value
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        document.getElementById("bySp3Dummy").value =
            totalPotonganSp3Dummy;

        angsuran = document.getElementById("angsuran").value
            .replace(/\./g, "");
        holdAngsuran = document.getElementById("holdAngsuran").value;

        //Angsuran NPP (Nota Pencairan Pembiayaan)
        angsuranNpp = angsuran * holdAngsuran;
        document.getElementById("angsuranNpp").value = angsuranNpp;

        angsuranNppDummy = angsuranNpp;
        document.getElementById("angsuranNppDummy").value =
            angsuranNppDummy;
        angsuranNppDummy = document.getElementById("angsuranNppDummy").value
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        document.getElementById("angsuranNppDummy").value =
            angsuranNppDummy;

        //Total potongan di NPP
        totalPotonganNpp = +angsuranNpp + +totalPotonganSp3;
        document.getElementById("byNpp").value = totalPotonganNpp;

        totalPotonganNppDummy = totalPotonganNpp;
        document.getElementById("byNppDummy").value =
            totalPotonganNppDummy;
        totalPotonganNppDummy = document.getElementById("byNppDummy").value
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        document.getElementById("byNppDummy").value =
            totalPotonganNppDummy;

        plafond = document.getElementById("plafond").value
            .replace(/\./g, "");
        //Total pencairan di NPP
        totalPencairanNpp = +plafond - +totalPotonganNpp;
        document.getElementById("pencairanNasabahNpp").value = totalPencairanNpp;

        totalPencairanNppDummy = totalPencairanNpp;
        document.getElementById("pencairanNasabahNppDummy").value =
            totalPencairanNppDummy;
        totalPencairanNppDummy = document.getElementById("pencairanNasabahNppDummy").value
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        document.getElementById("pencairanNasabahNppDummy").value =
            totalPencairanNppDummy;
    }

    //Toggle
    function toggleJaminan1() {
        var areaJaminan1 = document.getElementById("divJaminan1");
        if (areaJaminan1.style.display === "none") {
            areaJaminan1.style.display = "block";
        } else {
            areaJaminan1.style.display = "none";
        }
    }

    function toggleJaminan2() {
        var areaJaminan2 = document.getElementById("divJaminan2");
        if (areaJaminan2.style.display === "none" || areaJaminan2.style.display == "") {
            areaJaminan2.style.display = "block";
        } else {
            areaJaminan2.style.display = "none";
        }
    }

    function toggleJaminanKendaraan() {
        var areaJaminanKendaraan = document.getElementById("divJaminanKendaraan");
        if (areaJaminanKendaraan.style.display === "none" || areaJaminanKendaraan.style.display == "") {
            areaJaminanKendaraan.style.display = "block";
        } else {
            areaJaminanKendaraan.style.display = "none";
        }
    }

    $(".rotate").click(function() {
        $(this).toggleClass("down");
    })

    //Auto fill tanggal akad, angsuran, dan jatuh tempo
    var tenor, tglAkad, tglPencairan, tglAngsuranAwal, tglJatuhTempo;

    tenor = parseInt(document.getElementById("tenor").value, 10); //convert ke integer
    tglAkad = document.getElementById("tglAkad");
    tglPencairan = document.getElementById("tglPencairan");
    tglAngsuranAwal = document.getElementById("tglAngsuranAwal");
    tglJatuhTempo = document.getElementById("tglJatuhTempo");

    //Menambahkan event listener onChange pada input tangal akad
    tglAkad.addEventListener('change', function() {
        updateDates();
    });

    //Menambahkan event listener onChange pada input tanggal pencairan
    tglPencairan.addEventListener('change', function() {
        updateAngsuranJatuhTempo();
    });

    function updateDates() {
        var tglAkadValue = tglAkad.value;

        //Cek format tanggal DD-MM-YYYY
        var dateRegex = /^(\d{2})-(\d{2})-(\d{4})$/;
        var match = tglAkadValue.match(dateRegex);

        if (!match) {
            alert("Format tanggal tidak sesuai, gunakan format DD-MM-YYYY");
            return;
        }

        //Konversi tanggal dari format DD-MM-YYYY ke YYYY-MM-DD
        var tglAkadDate = new Date(match[3], match[2] - 1, match[1]);

        //Menyamakan tglPencairan dengan tglAkad
        var tglPencairanDate = new Date(tglAkadDate);
        tglPencairanDate.setMonth(tglPencairanDate.getMonth());

        //Konversi tanggal akhir ke format DD-MM-YYYY
        var tahunPencairan = tglPencairanDate.getFullYear();
        var bulanPencairan = tglPencairanDate.getMonth() + 1;
        var tanggalPencairan = tglPencairanDate.getDate();

        //Tambahkan '0' di depan tanggal dan bulan jika kurang dari 10
        var formattedTanggalPencairan = (tanggalPencairan < 10 ? '0' : '') + tanggalPencairan;
        var formattedBulanPencairan = (bulanPencairan < 10 ? '0' : '') + bulanPencairan;

        //Mengisi nilai input tglPencairan
        tglPencairan.value = `${formattedTanggalPencairan}-${formattedBulanPencairan}-${tahunPencairan}`;

        //Memanggil fungsi untuk menghitung tglAngsuranAwal dan tglJatuhTempo
        updateAngsuranJatuhTempo();
    }

    function updateAngsuranJatuhTempo() {
        var tglPencairanValue = tglPencairan.value;

        //cek format tanggal DD-MM-YYYY
        var dateRegex = /^(\d{2})-(\d{2})-(\d{4})$/;
        var matchPencairan = tglPencairanValue.match(dateRegex);

        if (!matchPencairan) {
            alert("Format tanggal pencairan tidak sesuai, gunakan format DD-MM-YYYY");
            return;
        }

        //Konversi tanggal dari format DD-MM-YYYY ke YYYY-MM-DD
        var tglPencairanDate = new Date(matchPencairan[3], matchPencairan[2] - 1, matchPencairan[1]);

        //Menghitung tglAngsuranAwal berdasarkan tglPencairan
        var tglAngsuranAwalDate = new Date(tglPencairanDate);
        tglAngsuranAwalDate.setMonth(tglAngsuranAwalDate.getMonth() + 1);

        //Menghitung tglJatuhTempo berdasarkan tglPencairan dan tenor
        var tglJatuhTempoDate = new Date(tglPencairanDate);
        tglJatuhTempoDate.setMonth(tglJatuhTempoDate.getMonth() + tenor);

        //Konversi tanggal akhir ke format DD-MM-YYYY
        var tahunAngsuranAwal = tglAngsuranAwalDate.getFullYear();
        var bulanAngsuranAwal = tglAngsuranAwalDate.getMonth() + 1;
        var tanggalAngsuranAwal = tglAngsuranAwalDate.getDate();

        var tahunJatuhTempo = tglJatuhTempoDate.getFullYear();
        var bulanJatuhTempo = tglJatuhTempoDate.getMonth() + 1;
        var tanggalJatuhTempo = tglJatuhTempoDate.getDate();

        //Tambahkan '0' di depan tanggal dan bulan jika kurang dari 10
        var formattedTanggalAngsuranAwal = (tanggalAngsuranAwal < 10 ? '0' : '') + tanggalAngsuranAwal;
        var formattedBulanAngsuranAwal = (bulanAngsuranAwal < 10 ? '0' : '') + bulanAngsuranAwal;
        var formattedTanggalJatuhTempo = (tanggalJatuhTempo < 10 ? '0' : '') + tanggalJatuhTempo;
        var formattedBulanJatuhTempo = (bulanJatuhTempo < 10 ? '0' : '') + bulanJatuhTempo;

        //Mengisi nilai input tglAngsuranAwal dan tglJatuhTempo
        tglAngsuranAwal.value = `${formattedTanggalAngsuranAwal}-${formattedBulanAngsuranAwal}-${tahunAngsuranAwal}`;
        tglJatuhTempo.value = `${formattedTanggalJatuhTempo}-${formattedBulanJatuhTempo}-${tahunJatuhTempo}`;
    }


    //Validasi RT Jaminan 1
    var rtJaminan1 = document.getElementById("rtJaminan1");
    var falseRtJaminan1 = document.getElementById("falseRtJaminan1");

    rtJaminan1.addEventListener("input", function() {
        if (rtJaminan1.validity.patternMismatch) {
            falseRtJaminan1.style.display = "inline";
        } else {
            falseRtJaminan1.style.display = "none";
        }
    });

    //Validasi RW Jaminan 1
    var rwJaminan1 = document.getElementById("rwJaminan1");
    var falseRwJaminan1 = document.getElementById("falseRwJaminan1");

    rwJaminan1.addEventListener("input", function() {
        if (rwJaminan1.validity.patternMismatch) {
            falseRwJaminan1.style.display = "inline";
        } else {
            falseRwJaminan1.style.display = "none";
        }
    });
</script>
