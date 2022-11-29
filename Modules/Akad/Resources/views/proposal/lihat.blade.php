@extends('akad::layouts.main')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="nav-filled">

                    <div class="col-xl-12 col-lg-12">
                        @if ($segmen == 'PPR')
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Proposal Pengajuan Pembiayaan</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs nav-justified" id="komiteTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="proposal-tab" data-bs-toggle="tab"
                                                href="#proposal" role="tab" aria-controls="proposal-just"
                                                aria-selected="true">Proposal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="ftv-tab" data-bs-toggle="tab" href="#ftv"
                                                role="tab" aria-controls="ftv-just" aria-selected="true">FTV</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="lampiran-tab" data-bs-toggle="tab" href="#lampiran"
                                                role="tab" aria-controls="lampiran-just"
                                                aria-selected="true">Lampiran</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="timeline-tab" data-bs-toggle="tab" href="#timeline"
                                                role="tab" aria-controls="timeline-just"
                                                aria-selected="false">Timeline</a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content pt-1">
                                        <div class="tab-pane active" id="proposal" role="tabpanel"
                                            aria-labelledby="proposal-tab">
                                            <!-- proposal -->
                                            <div class="col-xl-12 col-md-8 col-12">
                                                <div class="card invoice-preview-card">


                                                    <!-- Address and Contact starts -->
                                                    <div class="card-body invoice-padding pt-0">
                                                        <div class="row invoice-spacing">
                                                            <div class="col-xl-8 p-0">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="pe-1">Nama AO</td>
                                                                            <td>:<span class="fw-bold">
                                                                                    {{ $pembiayaan->user->name }}</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Jenis Nasabah</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->jenis_nasabah }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Tanggal Pengajuan</td>
                                                                            <td>:
                                                                                {{ date_format($pembiayaan->created_at, 'd-m-Y') }}
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td class="pe-1">Akad</td>
                                                                            <td>:
                                                                                @if ($pembiayaan->form_permohonan_jenis_akad_pembayaran_lain != null)
                                                                                    {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran_lain }}
                                                                                @else
                                                                                    {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran }}
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Plafond</td>
                                                                            <td>:
                                                                                Rp.
                                                                                {{ number_format($pembiayaan->form_permohonan_nilai_ppr_dimohon) }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Tenor</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->form_permohonan_jangka_waktu_ppr }}
                                                                                Tahun
                                                                                ({{ $pembiayaan->form_permohonan_jml_bulan }}
                                                                                Bulan)
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Margin</td>
                                                                            <td>:
                                                                                {{ number_format((float) $persenMargin, 2, '.', '') }}%
                                                                                per Bulan
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Peruntukan</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->form_permohonan_peruntukan_ppr }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Nama Nasabah</td>
                                                                            <td>:<span class="fw-bold">
                                                                                    {{ $pembiayaan->pemohon->form_pribadi_pemohon_nama_lengkap }}</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Jenis Kelamin</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_jenis_kelamin }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Usia</td>
                                                                            <td>:
                                                                                {{ $usiaNasabah }} Tahun
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">No. HP</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_no_handphone }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Alamat</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_domisili }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">No. KTP</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_no_ktp }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Tempat, tanggal lahir
                                                                            </td>
                                                                            <td>:
                                                                                {{ $pembiayaan->pemohon->form_pribadi_pemohon_tempat_lahir }},
                                                                                @php
                                                                                    $tgl_lahir = Carbon\Carbon::parse($pembiayaan->pemohon->form_pribadi_pemohon_tanggal_lahir);
                                                                                @endphp
                                                                                {{ date_format($tgl_lahir, 'd-m-Y') }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Nama Tempat Bekerja</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_nama }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Dept./Bagian/Divisi</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_departemen }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Jabatan</td>
                                                                            <td>:
                                                                                {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_pangkat_gol_jabatan }}
                                                                            </td>
                                                                        </tr>
                                                                        {{-- <tr>
                                                                        <td class="pe-1">Kantor/Dinas</td>
                                                                        <td>:
                                                                            {{ $pembiayaan->instansi->nama_instansi }}
                                                                        </td>
                                                                    </tr> --}}
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                                                <h6 class="mb-1">Pendapatan :</h6>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="pe-1">Penghasilan Utama</td>
                                                                            <td>: <span class="fw-bold">Rp.
                                                                                    {{ number_format($pembiayaan->form_penghasilan_pengeluaran_penghasilan_utama_pemohon) }}</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Penghasilan Lainnya</td>
                                                                            <td>: Rp.
                                                                                {{ number_format($pembiayaan->form_penghasilan_pengeluaran_penghasilan_lain_pemohon) }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Penghasilan Utama Pasangan
                                                                            </td>
                                                                            <td>: <span class="fw-bold">Rp.
                                                                                    {{ number_format($pembiayaan->form_penghasilan_pengeluaran_penghasilan_utama_istri_suami) }}</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Penghasilan Lainnya Pasangan
                                                                            </td>
                                                                            <td>: Rp.
                                                                                {{ number_format($pembiayaan->form_penghasilan_pengeluaran_penghasilan_lain_istri_suami) }}
                                                                            </td>
                                                                        </tr>
                                                                        {{-- <tr>
                                                                        <td class="pe-1">Gaji TPP</td>
                                                                        <td>: Rp.
                                                                            {{ number_format($pembiayaan->gaji_tpp) }}
                                                                        </td>
                                                                    </tr> --}}
                                                                        <tr>
                                                                            <td class="pe-1 mt-2">Total Penghasilan</td>
                                                                            <td>: <span class="fw-bold">Rp.
                                                                                    {{ number_format($pembiayaan->form_penghasilan_pengeluaran_total_penghasilan) }}</span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <hr>
                                                                <h6 class="mb-1 mt-2">Pengeluaran :</h6>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="pe-1">Biaya Hidup Keluarga</td>
                                                                            <td>: Rp.
                                                                                {{ number_format($pembiayaan->form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga) }}
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td class="pe-1">Kewajiban Angsuran</td>
                                                                            <td>: <span class="fw-bold">Rp.
                                                                                    {{ number_format($pembiayaan->form_penghasilan_pengeluaran_kewajiban_angsuran) }}</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1 mt-1">Total Pengeluaran
                                                                            </td>
                                                                            <td>: <span class="fw-bold">Rp.
                                                                                    {{ number_format($pembiayaan->form_penghasilan_pengeluaran_total_pengeluaran) }}</span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <hr>
                                                                <h6>Sisa Penghasilan Bersih : Rp.
                                                                    {{ number_format($pembiayaan->form_penghasilan_pengeluaran_sisa_penghasilan) }}
                                                                </h6>
                                                                <h6>Kemampuan Mengangsur : Rp.
                                                                    {{ number_format($pembiayaan->form_penghasilan_pengeluaran_kemampuan_mengangsur) }}
                                                                </h6>
                                                                <hr />
                                                                <h6 style="text-align: center;">IDIR :
                                                                    {{ number_format((float) $idir, 2, '.', '') }}%
                                                                    &emsp; &emsp; &emsp;
                                                                    <small
                                                                        class="{{ $idir > 70 ? 'text-danger' : 'text-success' }}">*
                                                                        Maks. IDIR 70%</small>
                                                                </h6>

                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Address and Contact ends -->

                                                    <div class="card-body invoice-padding pb-0">
                                                        <!-- Header starts -->
                                                        <div
                                                            class="d-flex justify-content-center  flex-column invoice-spacing mt-0 col-xl-12 col-md-8 col-12">
                                                            <div>
                                                                <!-- Tabel Pinjaman/Ideb -->
                                                                <h4>Informasi Debitur Nasabah</h4>
                                                                <div class="table-responsive mt-1">
                                                                    {{-- IDEB Pinjaman --}}
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="text-align: center; vertical-align:middle; width: 5%;"
                                                                                    class="py-1">
                                                                                    No
                                                                                </th>
                                                                                <th style="text-align: center; vertical-align:middle;"
                                                                                    class="py-1">Nama
                                                                                    Bank
                                                                                </th>
                                                                                <th style="text-align: center; vertical-align:middle; width: 18%;"
                                                                                    class="py-1">
                                                                                    Plafond
                                                                                </th>
                                                                                <th style="text-align: center; vertical-align:middle;"
                                                                                    class="py-1">
                                                                                    Outstanding
                                                                                </th>
                                                                                <th style="text-align: center; vertical-align:middle;"
                                                                                    class="py-1">
                                                                                    Tenor (Bulan)
                                                                                </th>
                                                                                <th style="text-align: center; vertical-align:middle; width: 5%;"
                                                                                    class="py-1">
                                                                                    Margin
                                                                                </th>
                                                                                <th style="text-align: center; vertical-align:middle;"
                                                                                    class="py-1">
                                                                                    Angsuran
                                                                                </th>
                                                                                <th style="text-align: center; vertical-align:middle;"
                                                                                    class="py-1">
                                                                                    Agunan
                                                                                </th>
                                                                                <th style="text-align: center; vertical-align:middle;"
                                                                                    class="py-1">
                                                                                    Kol.
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if ($idebs->first())
                                                                                @foreach ($idebs as $ideb)
                                                                                    <tr>
                                                                                        <td style="text-align: center">
                                                                                            {{ $loop->iteration }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $ideb->form_pinjaman_nama_bank }}
                                                                                        </td>
                                                                                        <td>Rp.
                                                                                            {{ number_format($ideb->form_pinjaman_plafond) }}
                                                                                        </td>
                                                                                        <td>Rp.
                                                                                            {{ number_format($ideb->form_pinjaman_outstanding) }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $ideb->form_pinjaman_jangka_waktu_bulan }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ number_format($ideb->form_pinjaman_bunga_margin) }}%
                                                                                        </td>
                                                                                        <td>Rp.
                                                                                            {{ number_format($ideb->form_pinjaman_angsuran_per_bulan) }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $ideb->form_pinjaman_agunan }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $ideb->form_pinjaman_kolektibilitas }}
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            @else
                                                                                <tr>
                                                                                    <td colspan="9"
                                                                                        style="text-align: center;">
                                                                                        No Data
                                                                                        Available
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                        </tbody>
                                                                    </table>
                                                                    <hr style="margin-top:-1px;" />

                                                                    {{-- IDEB Pinjaman Kartu Kredit --}}
                                                                    @if ($idebKartuKredits->first())
                                                                        <br />
                                                                        <h6>Pinjaman Kartu Kredit</h6>
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="text-align: center; vertical-align:middle; width: 5%;"
                                                                                        class="py-1">
                                                                                        No
                                                                                    </th>
                                                                                    <th style="text-align: center; vertical-align:middle;"
                                                                                        class="py-1">Nama
                                                                                        Bank
                                                                                    </th>
                                                                                    <th style="text-align: center; vertical-align:middle; width: 18%;"
                                                                                        class="py-1">
                                                                                        Plafond
                                                                                    </th>
                                                                                    <th style="text-align: center; vertical-align:middle;"
                                                                                        class="py-1">
                                                                                        Outstanding
                                                                                    </th>
                                                                                    <th style="text-align: center; vertical-align:middle;"
                                                                                        class="py-1">
                                                                                        Tenor (Bulan)
                                                                                    </th>
                                                                                    <th style="text-align: center; vertical-align:middle; width: 5%;"
                                                                                        class="py-1">
                                                                                        Margin
                                                                                    </th>
                                                                                    <th style="text-align: center; vertical-align:middle;"
                                                                                        class="py-1">
                                                                                        Angsuran
                                                                                    </th>
                                                                                    <th style="text-align: center; vertical-align:middle;"
                                                                                        class="py-1">
                                                                                        Agunan
                                                                                    </th>
                                                                                    <th style="text-align: center; vertical-align:middle;"
                                                                                        class="py-1">
                                                                                        Kol.
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($idebKartuKredits as $idebKartuKredit)
                                                                                    <tr>
                                                                                        <td style="text-align: center">
                                                                                            {{ $loop->iteration }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $idebKartuKredit->form_pinjaman_kartu_kredit_nama_bank }}
                                                                                        </td>
                                                                                        <td>Rp.
                                                                                            {{ number_format($idebKartuKredit->form_pinjaman_kartu_kredit_plafond) }}
                                                                                        </td>
                                                                                        <td>Rp.
                                                                                            {{ number_format($idebKartuKredit->form_pinjaman_kartu_kredit_outstanding) }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $idebKartuKredit->form_pinjaman_kartu_kredit_jangka_waktu_bulan }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ number_format($idebKartuKredit->form_pinjaman_kartu_kredit_bunga_margin) }}%
                                                                                        </td>
                                                                                        <td>Rp.
                                                                                            {{ number_format($idebKartuKredit->form_pinjaman_kartu_kredit_angsuran_per_bulan) }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $idebKartuKredit->form_pinjaman_kartu_kredit_agunan }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $idebKartuKredit->form_pinjaman_kartu_kredit_kolektibilitas }}
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                        <hr style="margin-top:-1px;" />
                                                                    @endif

                                                                    {{-- IDEB Pinjaman Kartu Kredit --}}
                                                                    @if ($idebLains->first())
                                                                        <br />
                                                                        <h6>Pinjaman Lainnya (Lembaga Keuangan Non-Bank)
                                                                        </h6>
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="text-align: center; vertical-align:middle; width: 5%;"
                                                                                        class="py-1">
                                                                                        No
                                                                                    </th>
                                                                                    <th style="text-align: center; vertical-align:middle;"
                                                                                        class="py-1">Nama
                                                                                        Bank
                                                                                    </th>
                                                                                    <th style="text-align: center; vertical-align:middle; width: 18%;"
                                                                                        class="py-1">
                                                                                        Plafond
                                                                                    </th>
                                                                                    <th style="text-align: center; vertical-align:middle;"
                                                                                        class="py-1">
                                                                                        Outstanding
                                                                                    </th>
                                                                                    <th style="text-align: center; vertical-align:middle;"
                                                                                        class="py-1">
                                                                                        Tenor (Bulan)
                                                                                    </th>
                                                                                    <th style="text-align: center; vertical-align:middle; width: 5%;"
                                                                                        class="py-1">
                                                                                        Margin
                                                                                    </th>
                                                                                    <th style="text-align: center; vertical-align:middle;"
                                                                                        class="py-1">
                                                                                        Angsuran
                                                                                    </th>
                                                                                    <th style="text-align: center; vertical-align:middle;"
                                                                                        class="py-1">
                                                                                        Agunan
                                                                                    </th>
                                                                                    <th style="text-align: center; vertical-align:middle;"
                                                                                        class="py-1">
                                                                                        Kol.
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($idebLains as $idebLain)
                                                                                    <tr>
                                                                                        <td style="text-align: center">
                                                                                            {{ $loop->iteration }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $idebLain->form_pinjaman_lainnya_nama }}
                                                                                        </td>
                                                                                        <td>Rp.
                                                                                            {{ number_format($idebLain->form_pinjaman_lainnya_plafond) }}
                                                                                        </td>
                                                                                        <td>Rp.
                                                                                            {{ number_format($idebLain->form_pinjaman_lainnya_outstanding) }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $idebLain->form_pinjaman_lainnya_jangka_waktu_bulan }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ number_format($idebLain->form_pinjaman_lainnya_bunga_margin) }}%
                                                                                        </td>
                                                                                        <td>Rp.
                                                                                            {{ number_format($idebLain->form_pinjaman_lainnya_angsuran_per_bulan) }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $idebLain->form_pinjaman_lainnya_agunan }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $idebLain->form_pinjaman_lainnya_kolektibilitas }}
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                        <hr style="margin-top:-1px;" />
                                                                    @endif
                                                                </div>
                                                                <!-- /Tabel Pinjaman/Ideb -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br />
                                                    <hr class="invoice-spacing" />

                                                    <div class="card-body invoice-padding pb-0">
                                                        <!-- Header starts -->
                                                        <div
                                                            class="d-flex justify-content-center  flex-column invoice-spacing mt-0 col-xl-12 col-md-8 col-12">
                                                            <div>
                                                                <h4>Summary </h4>
                                                                <div class="table-responsive mt-1">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="text-align: center"
                                                                                    width="2%">No
                                                                                </th>
                                                                                <th style="text-align: center">
                                                                                    Parameter
                                                                                </th>
                                                                                <th style="text-align: center">% Bobot
                                                                                </th>
                                                                                <th style="text-align: center">Bobot Bersih
                                                                                </th>
                                                                                <th style="text-align: center">Keterangan
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if ($pembiayaan->jenis_nasabah == 'Fixed Income')
                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        <strong>1</strong>
                                                                                    </td>
                                                                                    <td style="vertical-align: middle;">
                                                                                        <strong>Ability To Repay</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>50%</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>
                                                                                            {{ $scoring->scoringAtrFixedIncome->atr_fixed_score }}
                                                                                        </strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        @if ($scoring->scoringAtrFixedIncome->atr_fixed_score >= 1.7)
                                                                                            <strong>Risiko Rendah</strong>
                                                                                        @elseif($scoring->scoringAtrFixedIncome->atr_fixed_score >= 1.4 &&
                                                                                            $scoring->scoringAtrFixedIncome->atr_fixed_score < 1.7)
                                                                                            <strong>Risiko Sedang</strong>
                                                                                        @else
                                                                                            <strong>Risiko Tinggi</strong>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pekerjaan
                                                                                    </td>
                                                                                    <td style="text-align: center">8%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_pekerjaan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pengalaman/Riwayat
                                                                                        Pembiayaan
                                                                                    </td>
                                                                                    <td style="text-align: center">8%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_pengalaman_riwayat_pembiayaan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Keamanan
                                                                                        Bisnis/Pekerjaan
                                                                                    </td>
                                                                                    <td style="text-align: center">12%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_keamanan_bisnis_pekerjaan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Potensi Pertumbuhan
                                                                                        Hasil
                                                                                    </td>
                                                                                    <td style="text-align: center">15%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_potensi_pertumbuhan_hasil }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pengalaman Kerja
                                                                                    </td>
                                                                                    <td style="text-align: center">5%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_pengalaman_kerja }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pendidikan
                                                                                    </td>
                                                                                    <td style="text-align: center">9%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_pendidikan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Usia
                                                                                    </td>
                                                                                    <td style="text-align: center">6%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_usia }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Sumber Pendapatan
                                                                                    </td>
                                                                                    <td style="text-align: center">10%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_sumber_pendapatan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pendapatan Bersih
                                                                                    </td>
                                                                                    <td style="text-align: center">20%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_pendapatan_gaji_bersih }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Jumlah Tanggungan
                                                                                        Keluarga
                                                                                    </td>
                                                                                    <td style="text-align: center">7%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_jml_tanggungan_keluarga }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td style="text-align: center"> Total
                                                                                    </td>
                                                                                    <td style="text-align: center">100%
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrFixedIncome->atr_fixed_total_bobot_bersih }}
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        <strong>2</strong>
                                                                                    </td>
                                                                                    <td class="pe-1">
                                                                                        <strong>Willingness To
                                                                                            Repay</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>25%</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>
                                                                                            {{ $scoring->scoringWtrFixedIncome->wtr_fixed_score }}
                                                                                        </strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        @if ($scoring->scoringWtrFixedIncome->wtr_fixed_score >= 0.9)
                                                                                            <strong>Risiko Rendah</strong>
                                                                                        @elseif($scoring->scoringWtrFixedIncome->wtr_fixed_score >= 0.75 &&
                                                                                            $scoring->scoringWtrFixedIncome->wtr_fixed_score < 0.9)
                                                                                            <strong>Risiko Sedang</strong>
                                                                                        @else
                                                                                            <strong>Risiko Tinggi</strong>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Tempat Bekerja
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrFixedIncome->wtr_fixed_tempat_bekerja }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Konsistensi
                                                                                    </td>
                                                                                    <td style="text-align: center">12%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrFixedIncome->wtr_fixed_konsistensi }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Kelengkapan dan
                                                                                        Validitas Data
                                                                                    </td>
                                                                                    <td style="text-align: center">15%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrFixedIncome->wtr_fixed_kelengkapan_validitas_data }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pembayaran Angsuran
                                                                                        Kolektif
                                                                                    </td>
                                                                                    <td style="text-align: center">20%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrFixedIncome->wtr_fixed_pembayaran_angsuran_kolektif }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pengalaman
                                                                                        Pembiayaan
                                                                                    </td>
                                                                                    <td style="text-align: center">10%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrFixedIncome->wtr_fixed_pengalaman_pembiayaan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Motivasi
                                                                                    </td>
                                                                                    <td style="text-align: center">20%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrFixedIncome->wtr_fixed_motivasi }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Referensi
                                                                                    </td>
                                                                                    <td style="text-align: center">10%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrFixedIncome->wtr_fixed_referensi }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td style="text-align: center"> Total
                                                                                    </td>
                                                                                    <td style="text-align: center">100%
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrFixedIncome->wtr_fixed_total_bobot_bersih }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        <strong>3</strong>
                                                                                    </td>
                                                                                    <td class="pe-1">
                                                                                        <strong>Collateral Coverage</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>25%</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>
                                                                                            {{ $scoring->scoringCollateralFixedIncome->cc_fixed_score }}
                                                                                        </strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        @if ($scoring->scoringCollateralFixedIncome->cc_fixed_score >= 0.9)
                                                                                            <strong>Risiko Rendah</strong>
                                                                                        @elseif($scoring->scoringCollateralFixedIncome->cc_fixed_score >= 0.75 &&
                                                                                            $scoring->scoringCollateralFixedIncome->cc_fixed_score < 0.9)
                                                                                            <strong>Risiko Sedang</strong>
                                                                                        @else
                                                                                            <strong>Risiko Tinggi</strong>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Marketabilitas
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralFixedIncome->cc_marketabilitas }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Kontribusi Pemohon
                                                                                        (FTV)
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralFixedIncome->cc_kontribusi_pemohon_ftv }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pertumbuhan Agunan
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralFixedIncome->cc_pertumbuhan_agunan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Daya Tarik Agunan
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralFixedIncome->cc_daya_tarik_agunan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Jangka Waktu
                                                                                        Likuidasi
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralFixedIncome->cc_jangka_waktu_likuidasi }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td style="text-align: center"> Total
                                                                                    </td>
                                                                                    <td style="text-align: center">100%
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralFixedIncome->cc_fixed_total_bobot_bersih }}
                                                                                    </td>
                                                                                </tr>
                                                                            @elseif ($pembiayaan->jenis_nasabah == 'Non Fixed Income')
                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        <strong>1</strong>
                                                                                    </td>
                                                                                    <td style="vertical-align: middle;">
                                                                                        <strong>Ability To Repay</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>50%</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>
                                                                                            {{ $scoring->scoringAtrNonFixedIncome->atr_non_fixed_score }}
                                                                                        </strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        @if ($scoring->scoringAtrNonFixedIncome->atr_non_fixed_score >= 1.7)
                                                                                            <strong>Risiko Rendah</strong>
                                                                                        @elseif($scoring->scoringAtrNonFixedIncome->atr_non_fixed_score >= 1.4 &&
                                                                                            $scoring->scoringAtrNonFixedIncome->atr_non_fixed_score < 1.7)
                                                                                            <strong>Risiko Sedang</strong>
                                                                                        @else
                                                                                            <strong>Risiko Tinggi</strong>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Situasi Pasar dan
                                                                                        Persaingan
                                                                                    </td>
                                                                                    <td style="text-align: center">14%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrNonFixedIncome->atr_non_fixed_situasi_persaingan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Kaderisasi
                                                                                    </td>
                                                                                    <td style="text-align: center">14%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrNonFixedIncome->atr_non_fixed_kaderisasi }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Kualifikasi
                                                                                        Komersial
                                                                                    </td>
                                                                                    <td style="text-align: center">14%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrNonFixedIncome->atr_non_fixed_kualifikasi_komersial }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Kualifikasi Teknis
                                                                                    </td>
                                                                                    <td style="text-align: center">15%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrNonFixedIncome->atr_non_fixed_kualifikasi_teknis }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Kualitas Produk dan
                                                                                        Jasa
                                                                                    </td>
                                                                                    <td style="text-align: center">15%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrNonFixedIncome->atr_non_fixed_kualitas_produk_jasa }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Sistem Pembayaran
                                                                                    </td>
                                                                                    <td style="text-align: center">14%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrNonFixedIncome->atr_non_fixed_sistem_pembayaran }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Lokasi Usaha
                                                                                    </td>
                                                                                    <td style="text-align: center">14%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrNonFixedIncome->atr_non_fixed_lokasi_usaha }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td style="text-align: center"> Total
                                                                                    </td>
                                                                                    <td style="text-align: center">100%
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringAtrNonFixedIncome->atr_non_fixed_total_bobot_bersih }}
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        <strong>2</strong>
                                                                                    </td>
                                                                                    <td class="pe-1">
                                                                                        <strong>Willingness To
                                                                                            Repay</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>25%</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>
                                                                                            {{ $scoring->scoringWtrNonFixedIncome->wtr_non_fixed_score }}
                                                                                        </strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        @if ($scoring->scoringWtrNonFixedIncome->wtr_non_fixed_score >= 0.9)
                                                                                            <strong>Risiko Rendah</strong>
                                                                                        @elseif($scoring->scoringWtrNonFixedIncome->wtr_non_fixed_score >= 0.75 &&
                                                                                            $scoring->scoringWtrNonFixedIncome->wtr_non_fixed_score < 0.9)
                                                                                            <strong>Risiko Sedang</strong>
                                                                                        @else
                                                                                            <strong>Risiko Tinggi</strong>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Tingkat Kepercayaan
                                                                                    </td>
                                                                                    <td style="text-align: center">25%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrNonFixedIncome->wtr_non_fixed_tingkat_kepercayaan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pengelolaan Rekening
                                                                                        Bank
                                                                                    </td>
                                                                                    <td style="text-align: center">25%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrNonFixedIncome->wtr_non_fixed_pengelolaan_rekening }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Reputasi Bisnis
                                                                                    </td>
                                                                                    <td style="text-align: center">15%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrNonFixedIncome->wtr_non_fixed_reputasi_bisnis }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Perilaku Pribadi
                                                                                        Debitur
                                                                                    </td>
                                                                                    <td style="text-align: center">20%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrNonFixedIncome->wtr_non_fixed_perilaku_pribadi }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td style="text-align: center"> Total
                                                                                    </td>
                                                                                    <td style="text-align: center">100%
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringWtrNonFixedIncome->wtr_non_fixed_total_bobot_bersih }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        <strong>3</strong>
                                                                                    </td>
                                                                                    <td class="pe-1">
                                                                                        <strong>Collateral Coverage</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>25%</strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <strong>
                                                                                            {{ $scoring->scoringCollateralNonFixedIncome->cc_non_fixed_score }}
                                                                                        </strong>
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        @if ($scoring->scoringCollateralNonFixedIncome->cc_non_fixed_score >= 0.9)
                                                                                            <strong>Risiko Rendah</strong>
                                                                                        @elseif($scoring->scoringCollateralNonFixedIncome->cc_non_fixed_score >= 0.75 &&
                                                                                            $scoring->scoringCollateralNonFixedIncome->cc_non_fixed_score < 0.9)
                                                                                            <strong>Risiko Sedang</strong>
                                                                                        @else
                                                                                            <strong>Risiko Tinggi</strong>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Marketabilitas
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralNonFixedIncome->cc_non_fixed_marketabilitas }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Kontribusi Pemohon
                                                                                        (FTV)
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralNonFixedIncome->cc_non_fixed_kontribusi_pemohon_ftv }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Pertumbuhan Agunan
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralNonFixedIncome->cc_non_fixed_pertumbuhan_agunan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Daya Tarik Agunan
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralNonFixedIncome->cc_non_fixed_daya_tarik_agunan }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td class="pe-1">Jangka Waktu
                                                                                        Likuidasi
                                                                                    </td>
                                                                                    <td style="text-align: center">13%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralNonFixedIncome->cc_non_fixed_jangka_waktu_likuidasi }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td></td>
                                                                                    <td style="text-align: center"> Total
                                                                                    </td>
                                                                                    <td style="text-align: center">100%
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $scoring->scoringCollateralNonFixedIncome->cc_non_fixed_total_bobot_bersih }}
                                                                                    </td>
                                                                                </tr>
                                                                            @else
                                                                            @endif
                                                                        </tbody>
                                                                    </table>
                                                                    <hr style="margin-top:-1px;" />
                                                                </div>
                                                                <br />
                                                                @php
                                                                    $score = $pembiayaan->scoring->ppr_total_score;
                                                                @endphp
                                                                <div class="card-body invoice-padding pt-0">
                                                                    <div class="row invoice-spacing">
                                                                        <div class="col-xl-7 p-0">
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="pe-1">Total Nilai
                                                                                        </td>
                                                                                        <td>:
                                                                                            <strong>{{ $score }}</strong>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Status</td>
                                                                                        <td>:
                                                                                            @if ($score >= 3.5)
                                                                                                <span
                                                                                                    class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                            @elseif($score >= 2.9 && $score < 3.5)
                                                                                                <span
                                                                                                    class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                    Ulang</span>
                                                                                            @else
                                                                                                <span
                                                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                                            @endif
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="col-xl-5 p-0 mt-xl-0 mt-2">
                                                                            <p class="mb-1 fw-bold">Note :</p>
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="pe-1 mb-2">Nilai < 2.9
                                                                                                </td>
                                                                                        <td>: <span class="fw-bold"><span
                                                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1 mb-2"><br>Nilai >=
                                                                                            2.9
                                                                                            dan < 3.5 </td>
                                                                                        <td><br>: <span
                                                                                                class="fw-bold"><span
                                                                                                    class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                    Ulang</span></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1 mb-2"><br>Nilai >=
                                                                                            3.5
                                                                                        </td>
                                                                                        <td><br>: <span
                                                                                                class="fw-bold"><span
                                                                                                    class="badge rounded-pill badge-glow bg-success">Diterima</span></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Invoice Note ends -->
                                                            </div>
                                                        </div>
                                                        <!-- Header ends -->
                                                    </div>
                                                    <br />

                                                    <div class="card-body invoice-padding pt-0">
                                                        <div class="row invoice-spacing">
                                                            <!-- Tombol Aksi -->
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <form action="">
                                                                        <input type="hidden" name=""
                                                                            value="" />
                                                                        <input type="hidden" name="cek_staff_akad"
                                                                            value="Dicetak" />
                                                                        <button type="submit" class="btn w-100"
                                                                            style="background-color:darkorange; color:wheat;"
                                                                            disabled><i data-feather="printer"></i>
                                                                            Cetak
                                                                            Akad
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <br />
                                                                <p></p>
                                                                <div class="col-md-6">
                                                                    <button type="button" class="btn btn-primary w-100"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#modalAkadPprBatal"><i
                                                                            data-feather="x"></i>
                                                                        Akad
                                                                        Batal
                                                                    </button>
                                                                </div>

                                                                <!-- Modal Batal-->
                                                                <div class="modal fade" id="modalAkadPprBatal"
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
                                                                                <form action="/staff/proposal"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @if ($pembiayaan->form_permohonan_jenis_akad_pembayaran == 'Akad Lainnya')
                                                                                        <input type="hidden"
                                                                                            name="akad"
                                                                                            value="{{ $pembiayaan->form_permohonan_jenis_akad_pembayaran_lain }}" />
                                                                                    @else
                                                                                        <input type="hidden"
                                                                                            name="akad"
                                                                                            value="{{ $pembiayaan->form_permohonan_jenis_akad_pembayaran }}" />
                                                                                    @endif
                                                                                    <input type="hidden" name="segmen"
                                                                                        value="PPR" />
                                                                                    <input type="hidden" name="ao_id"
                                                                                        value="{{ $pembiayaan->user_id }}" />
                                                                                    <input type="hidden" name="cif"
                                                                                        value="{{ $pembiayaan->pemohon->id }}" />
                                                                                    <input type="hidden"
                                                                                        name="nama_nasabah"
                                                                                        value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_nama_lengkap }}" />
                                                                                    <input type="hidden"
                                                                                        name="kode_tabungan"
                                                                                        value="{{ $pembiayaan->id }}" />
                                                                                    <input type="hidden" name="plafond"
                                                                                        value="{{ $pembiayaan->form_permohonan_nilai_ppr_dimohon }}" />
                                                                                    <input type="hidden"
                                                                                        name="harga_jual"
                                                                                        value="{{ $pembiayaan->form_permohonan_harga_jual }}" />
                                                                                    <input type="hidden" name="status"
                                                                                        value="Akad Batal" />
                                                                                    <h5 class="text-center">
                                                                                        Tuliskan
                                                                                        catatan
                                                                                        mengapa akad
                                                                                        batal!</h5>
                                                                                    <br />
                                                                                    <textarea class="form-control" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                                    <input type="hidden"
                                                                                        name="form_ppr_pembiayaan_id"
                                                                                        value="{{ $pembiayaan->id }}" />
                                                                                    <input type="hidden" name="status_id"
                                                                                        value="10" />
                                                                                    <input type="hidden"
                                                                                        name="cek_staff_akad"
                                                                                        value="Sudah" />
                                                                                    <br />
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <button type="button"
                                                                                                class="btn btn-outline-danger w-100"
                                                                                                data-bs-dismiss="modal">Cancel</button>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <button type="submit"
                                                                                                class="btn btn-primary w-100"><i
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

                                                                <div class="col-md-6">
                                                                    <form action="/staff/proposal" method="POST">
                                                                        @csrf
                                                                        @if ($pembiayaan->form_permohonan_jenis_akad_pembayaran == 'Akad Lainnya')
                                                                            <input type="hidden" name="akad"
                                                                                value="{{ $pembiayaan->form_permohonan_jenis_akad_pembayaran_lain }}" />
                                                                        @else
                                                                            <input type="hidden" name="akad"
                                                                                value="{{ $pembiayaan->form_permohonan_jenis_akad_pembayaran }}" />
                                                                        @endif
                                                                        <input type="hidden" name="segmen"
                                                                            value="PPR" />
                                                                        <input type="hidden" name="ao_id"
                                                                            value="{{ $pembiayaan->user_id }}" />
                                                                        <input type="hidden" name="cif"
                                                                            value="{{ $pembiayaan->pemohon->id }}" />
                                                                        <input type="hidden" name="nama_nasabah"
                                                                            value="{{ $pembiayaan->pemohon->form_pribadi_pemohon_nama_lengkap }}" />
                                                                        <input type="hidden" name="kode_tabungan"
                                                                            value="{{ $pembiayaan->id }}" />
                                                                        <input type="hidden" name="plafond"
                                                                            value="{{ $pembiayaan->form_permohonan_nilai_ppr_dimohon }}" />
                                                                        <input type="hidden" name="harga_jual"
                                                                            value="{{ $pembiayaan->form_permohonan_harga_jual }}" />
                                                                        <input type="hidden" name="status"
                                                                            value="Selesai Akad" />
                                                                        <input type="hidden"
                                                                            name="form_ppr_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}" />
                                                                        <input type="hidden" name="status_id"
                                                                            value="9" />
                                                                        <input type="hidden" name="cek_staff_akad"
                                                                            value="Sudah" />
                                                                        <button type="submit"
                                                                            class="btn btn-success w-100"><i
                                                                                data-feather="check"></i>
                                                                            Selesai
                                                                            Akad
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- /Tombol Aksi -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /proposal -->

                                        <div class="tab-pane" id="ftv" role="tabpanel" aria-labelledby="ftv-tab">
                                            <div class="col-xl-12 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                                                <div class="card">
                                                    <div class="card-body invoice-padding pb-0">
                                                        <!-- Header starts -->
                                                        <div
                                                            class="d-flex justify-content-center  flex-column invoice-spacing mt-0 col-xl-12 col-md-8 col-12">
                                                            <div>
                                                                <center>
                                                                    <h4>Financing To Value (FTV) </h4>
                                                                </center>
                                                                <br />
                                                                <div>
                                                                    <table>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="pe-1">&ensp;Nama
                                                                                    Nasabah</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->pemohon->form_pribadi_pemohon_nama_lengkap }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">&ensp;Jenis
                                                                                    Nasabah</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->jenis_nasabah }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">
                                                                                    &ensp;Tanggal Pengajuan</td>
                                                                                <td>:
                                                                                    {{ date_format($pembiayaan->created_at, 'd-m-Y') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">
                                                                                    &ensp;</td>
                                                                                <td>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1 mt-2">
                                                                                    &ensp;HPP</td>
                                                                                <td>:
                                                                                    Rp.
                                                                                    {{ number_format($hpp) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1 mt-2">
                                                                                    &ensp;Plafond</td>
                                                                                <td>:
                                                                                    Rp.
                                                                                    {{ number_format($pembiayaan->form_permohonan_nilai_ppr_dimohon) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">
                                                                                    &ensp;Tenor</td>
                                                                                <td>:
                                                                                    {{ $tenorTahun }}
                                                                                    Tahun
                                                                                    ({{ $tenorBulan }}
                                                                                    Bulan)
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">
                                                                                    &ensp;Margin</td>
                                                                                <td>:
                                                                                    Rp. {{ number_format($marginRp) }}
                                                                                    ({{ number_format((float) $persenMargin, 2, '.', '') }}%
                                                                                    per Bulan)
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">
                                                                                    &ensp;Harga Jual</td>
                                                                                <td>:
                                                                                    Rp. {{ number_format($hargaJual) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">
                                                                                    &ensp;Persentase FTV</td>
                                                                                <td>:
                                                                                    <strong>{{ number_format($ftv) }}%</strong>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">
                                                                                    &ensp;Pembagi</td>
                                                                                <td>:
                                                                                    {{ $pembagi }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">
                                                                                    &ensp;DP Nasabah</td>
                                                                                <td>:
                                                                                    {{ number_format($persenDp) }}%, yaitu
                                                                                    sebesar
                                                                                    Rp. {{ number_format($dp) }}
                                                                                </td>
                                                                            </tr>
                                                                    </table>
                                                                </div>
                                                                <br />
                                                                <div class="table-responsive mt-1">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th width="70%">Angsuran
                                                                                </th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Harga Beli</td>
                                                                                <td>Rp.
                                                                                    {{ number_format($plafond) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Tenor</td>
                                                                                <td>{{ $tenorBulan }}
                                                                                    Bulan
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Margin (% Per Bulan)</td>
                                                                                {{-- <td>{{ number_format((float) $persenMargin, 2, '.', '') }}
                                                                                   %
                                                                                </td> --}}
                                                                                <td>
                                                                                    {{ number_format((float) $persenMargin, 2, '.', '') }}%
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Margin (Rp)</td>
                                                                                <td>Rp.
                                                                                    {{ number_format($marginRp) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Harga Jual</td>
                                                                                <td>Rp. {{ number_format($hargaJual) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <strong>Besarnya Angsuran Per
                                                                                        Bulan</strong>
                                                                                </td>
                                                                                <td>Rp. {{ number_format($angsuran) }}
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                    <br />

                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th width="70%">Maksimal
                                                                                    Pembiayaan
                                                                                </th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Angsuran (RPC)</td>
                                                                                <td>Rp.
                                                                                    {{ number_format($angsuran) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Tenor</td>
                                                                                <td>{{ $tenorBulan }}
                                                                                    Bulan
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Margin (% Per Bulan)</td>
                                                                                <td>
                                                                                    {{ number_format((float) $persenMargin, 2, '.', '') }}%
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Margin (Rp)</td>
                                                                                <td>Rp.
                                                                                    {{ number_format($marginRp) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Harga Jual</td>
                                                                                <td>Rp. {{ number_format($hargaJual) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <strong>Besarnya Maksimal Pembiayaan
                                                                                        Yang
                                                                                        Diberikan</strong>
                                                                                </td>
                                                                                <td>Rp. {{ number_format($plafondMaks) }}
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                </div>
                                                                <br />
                                                            </div>
                                                        </div>
                                                        <!-- Header ends -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="tab-pane" id="lampiran" role="tabpanel"
                                            aria-labelledby="lampiran-tab">
                                            <div class="col-xl-12 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                                                <div class="card">
                                                    <div class="card-body invoice-padding pb-0">
                                                        <!-- Header starts -->
                                                        <div
                                                            class="d-flex justify-content-center  flex-column invoice-spacing mt-0 col-xl-12 col-md-8 col-12">
                                                            <div>
                                                                <center>
                                                                    <h4>Lampiran</h4>
                                                                </center>
                                                                <br />
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="mb-1 col-md-4">
                                                                <button type="button"
                                                                    class="btn btn-md btn-primary w-100"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#dokumenPemohon">
                                                                    Dokumen Pemohon
                                                                </button>
                                                            </div>
                                                            <div class="mb-1 col-md-4">
                                                                <button type="button"
                                                                    class="btn btn-md btn-primary w-100"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#dokumenWawancara">
                                                                    Dokumen Hasil Wawancara
                                                                </button>
                                                            </div>
                                                            <div class="mb-1 col-md-4">
                                                                <button type="button"
                                                                    class="btn btn-md btn-primary w-100"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#dokumenAgunan">
                                                                    Dokumen Agunan
                                                                </button>
                                                            </div>
                                                            <div class="mb-1 col-md-4">
                                                                <button type="button"
                                                                    class="btn btn-md btn-primary w-100"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#dokumenOtsAgunan">
                                                                    Dokumen OTS Agunan
                                                                </button>
                                                            </div>
                                                            <div class="mb-1 col-md-4">
                                                                <button type="button"
                                                                    class="btn btn-md btn-primary w-100"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#dokumenOtsTempatUsaha">
                                                                    Dokumen OTS Tempat Usaha
                                                                </button>
                                                            </div>
                                                            <div class="mb-1 col-md-4">
                                                                <button type="button"
                                                                    class="btn btn-md btn-primary w-100"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#dokumenAppraisalKjpp">
                                                                    Dokumen Appraisal Agunan KJPP
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal Lampiran -->

                                                    <!-- Dokumen Pemohon -->
                                                    <div class="modal fade" id="dokumenPemohon" tabindex="-1"
                                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-transparent">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                    <h4 class="text-center mb-1"
                                                                        style="margin-top:-40px;">
                                                                        <strong>Dokumen Pemohon</strong>
                                                                    </h4>
                                                                    <iframe
                                                                        src="{{ asset('storage/' . $lampiran->dokumen_pemohon) }}"
                                                                        class="d-block w-100" height="600"></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/ Dokumen Pemohon  -->

                                                    <!-- Dokumen Hasil Wawancara -->
                                                    <div class="modal fade" id="dokumenWawancara" tabindex="-1"
                                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-transparent">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                    <h4 class="text-center mb-1"
                                                                        style="margin-top:-40px;">
                                                                        <strong>Dokumen Hasil Wawancara</strong>
                                                                    </h4>
                                                                    <iframe
                                                                        src="{{ asset('storage/' . $lampiran->hasil_wawancara) }}"
                                                                        class="d-block w-100" height="600"></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/ Dokumen Hasil Wawancara  -->

                                                    <!-- Dokumen Agunan -->
                                                    <div class="modal fade" id="dokumenAgunan" tabindex="-1"
                                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-transparent">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                    <h4 class="text-center mb-1"
                                                                        style="margin-top:-40px;">
                                                                        <strong>Dokumen Agunan</strong>
                                                                    </h4>
                                                                    <iframe
                                                                        src="{{ asset('storage/' . $lampiran->dokumen_agunan) }}"
                                                                        class="d-block w-100" height="600"></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/ Dokumen Agunan  -->

                                                    <!-- Dokumen OTS Agunan -->
                                                    <div class="modal fade" id="dokumenOtsAgunan" tabindex="-1"
                                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-transparent">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                    <h4 class="text-center mb-1"
                                                                        style="margin-top:-40px;">
                                                                        <strong>Dokumen OTS Agunan</strong>
                                                                    </h4>
                                                                    <iframe
                                                                        src="{{ asset('storage/' . $lampiran->ots_agunan) }}"
                                                                        class="d-block w-100" height="600"></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/ Dokumen OTS Agunan  -->

                                                    <!-- Dokumen OTS Tempat Usaha -->
                                                    <div class="modal fade" id="dokumenOtsTempatUsaha" tabindex="-1"
                                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-transparent">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                    <h4 class="text-center mb-1"
                                                                        style="margin-top:-40px;">
                                                                        <strong>Dokumen OTS Tempat Usaha</strong>
                                                                    </h4>
                                                                    <iframe
                                                                        src="{{ asset('storage/' . $lampiran->ots_tempat_usaha) }}"
                                                                        class="d-block w-100" height="600"></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/ Dokumen OTS Tempat Usaha  -->

                                                    <!-- Dokumen Appraisal Agunan KJPP -->
                                                    <div class="modal fade" id="dokumenAppraisalKjpp" tabindex="-1"
                                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-transparent">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                    <h4 class="text-center mb-1"
                                                                        style="margin-top:-40px;">
                                                                        <strong>Dokumen Appraisal Agunan KJPP</strong>
                                                                    </h4>
                                                                    <iframe
                                                                        src="{{ asset('storage/' . $lampiran->appraisal_kjpp) }}"
                                                                        class="d-block w-100" height="600"></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/ Dokumen Appraisal Agunan KJPP  -->

                                                    <!-- /Modal Lampiran -->

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="timeline" role="tabpanel"
                                            aria-labelledby="timeline-tab">
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
                                                                    } elseif ($arr == $banyak_history) {
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
                                                                                value="{{ $timeline->statushistory->id }}, {{ $timeline->jabatan->jabatan_id }}">
                                                                                {{ $timeline->statushistory->keterangan }}
                                                                                {{ $timeline->jabatan->keterangan }}
                                                                            </h6>
                                                                            <span class="timeline-event-time"
                                                                                style="text-align: right">{{ $timeline->created_at->isoformat('dddd, D MMMM Y') }}
                                                                                <br>{{ $timeline->created_at->isoformat('HH:mm:ss') }}
                                                                            </span>
                                                                        </div>

                                                                        @if ($timeline->catatan)
                                                                            <p value="{{ $timeline->id }}"> <br>Catatan :
                                                                                {{ $timeline->catatan }}
                                                                            <p>
                                                                        @endif
                                                                        @if ($arr == -1)
                                                                        @else
                                                                            <span class="timeline-event-time">Waktu
                                                                                Diproses : {{ $selisih }}</span>
                                                                        @endif
                                                                        {{-- <span
                                                                        class="timeline-event-time">{{ $timeline->created_at->diffForHumans() }}</span> --}}
                                                                        {{-- <p>{{ $timeline->created_at->diffForHumans() }}</p> --}}
                                                                        <div class="d-flex flex-row align-items-center">

                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach

                                                            <p class="fw-bold"> Total SLA : {{ $totalwaktu }}</p>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Justified Tabs ends -->
                            </div>
                        @elseif ($segmen == 'Pasar')
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Proposal Pengajuan Pembiayaan Pasar</h4>
                                </div>
                                <div class="content-body">
                                    <section id="nav-filled">
                                        <div class="row match-height">

                                            <!-- Justified Tabs starts -->
                                            <div class="col-xl-12 col-lg-12">
                                                <div class="card">

                                                    <div class="card-body">
                                                        <ul class="nav nav-tabs nav-justified" id="myTab2"
                                                            role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="home-tab-justified"
                                                                    data-bs-toggle="tab" href="#proposal" role="tab"
                                                                    aria-controls="home-just"
                                                                    aria-selected="true">Proposal</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="profile-tab-justified"
                                                                    data-bs-toggle="tab" href="#identitas-pribadi"
                                                                    role="tab" aria-controls="profile-just"
                                                                    aria-selected="true">Identitas
                                                                    Pribadi</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="messages-tab-justified"
                                                                    data-bs-toggle="tab" href="#legalitas-agunan"
                                                                    role="tab" aria-controls="messages-just"
                                                                    aria-selected="false">Legalitas
                                                                    Agunan</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="settings-tab-justified"
                                                                    data-bs-toggle="tab" href="#legalitas-usaha"
                                                                    role="tab" aria-controls="settings-just"
                                                                    aria-selected="false">Legalitas
                                                                    Usaha</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="settings-tab-justified"
                                                                    data-bs-toggle="tab" href="#keuangan" role="tab"
                                                                    aria-controls="settings-just"
                                                                    aria-selected="false">Keuangan</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="settings-tab-justified"
                                                                    data-bs-toggle="tab" href="#ideb" role="tab"
                                                                    aria-controls="settings-just"
                                                                    aria-selected="false">Ideb</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="settings-tab-justified"
                                                                    data-bs-toggle="tab" href="#timeline" role="tab"
                                                                    aria-controls="settings-just"
                                                                    aria-selected="false">Timeline</a>
                                                            </li>
                                                        </ul>
                                                        <!-- Tab panes -->
                                                        <div class="tab-content pt-1">
                                                            <div class="tab-pane active " id="proposal"
                                                                role="tabpanel"aria-labelledby="home-tab-justified">
                                                                <!-- Invoice -->
                                                                <div class="col-xl-12 col-md-8 col-12">
                                                                    <div class="card invoice-preview-card">


                                                                        <hr class="invoice-spacing" />

                                                                        <!-- Address and Contact starts -->
                                                                        <div class="card-body invoice-padding pt-0">
                                                                            <div class="row invoice-spacing">
                                                                                <div class="col-xl-8 p-0">
                                                                                    <table>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="pe-1">Tanggal
                                                                                                    Pengajuan</td>
                                                                                                <td>:
                                                                                                    {{ $pembiayaan->tgl_pembiayaan }}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">
                                                                                                    Nama AO </td>
                                                                                                <td>:
                                                                                                    {{ $pembiayaan->user->name }}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">
                                                                                                    Penggunaan</td>
                                                                                                <td>:
                                                                                                    {{ $pembiayaan->penggunaan_id }}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">Sektor
                                                                                                </td>
                                                                                                <td
                                                                                                    value="{{ $pembiayaan->sektor->id }}">
                                                                                                    :
                                                                                                    {{ $pembiayaan->sektor->nama_sektor_ekonomi }}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">Akad
                                                                                                </td>
                                                                                                <td
                                                                                                    value="{{ $pembiayaan->akad->id }}">
                                                                                                    :
                                                                                                    {{ $pembiayaan->akad->nama_akad }}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">Nama
                                                                                                    Nasabah</td>
                                                                                                <td><span class="fw-bold">:
                                                                                                        {{ $pembiayaan->nasabahh->nama_nasabah }}</span>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">No Tlp
                                                                                                </td>
                                                                                                <td>:
                                                                                                    {{ $pembiayaan->nasabahh->no_tlp }}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">Alamat
                                                                                                </td>
                                                                                                <td>:
                                                                                                    {{ $pembiayaan->nasabahh->alamat }},
                                                                                                    {{ $pembiayaan->nasabahh->rt }},
                                                                                                    {{ $pembiayaan->nasabahh->rw }},
                                                                                                    {{ $pembiayaan->nasabahh->desa_kelurahan }},
                                                                                                    {{ $pembiayaan->nasabahh->kecamatan }},
                                                                                                    {{ $pembiayaan->nasabahh->kabkota }},
                                                                                                    {{ $pembiayaan->nasabahh->provinsi }}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">No KTP
                                                                                                </td>
                                                                                                <td>:
                                                                                                    {{ $pembiayaan->nasabahh->no_ktp }}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">
                                                                                                    Tempat/Tgl Lahir</td>
                                                                                                <td>:
                                                                                                    {{ $pembiayaan->nasabahh->tmp_lahir }}
                                                                                                    /
                                                                                                    {{ $pembiayaan->nasabahh->tgl_lahir }}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">Nama Ibu
                                                                                                    Kandung</td>
                                                                                                <td>:
                                                                                                    {{ $pembiayaan->nasabahh->nama_ibu }}
                                                                                                </td>

                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">Jenis
                                                                                                    Usaha</td>
                                                                                                <td
                                                                                                    value="{{ $pembiayaan->keteranganusaha->dagang->id }}">
                                                                                                    :
                                                                                                    {{ $pembiayaan->keteranganusaha->dagang->nama_jenisdagang }}
                                                                                                    </option>
                                                                                                </td>

                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">Alamat
                                                                                                    Usaha</td>
                                                                                                <td
                                                                                                    value="{{ $pembiayaan->keteranganusaha->jenispasar->id }}">
                                                                                                    :
                                                                                                    Pasar
                                                                                                    {{ $pembiayaan->keteranganusaha->jenispasar->nama_pasar }}
                                                                                                    </option>
                                                                                                </td>

                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">No Blok
                                                                                                    Kios / Los</td>
                                                                                                <td>:
                                                                                                    {{ $pembiayaan->keteranganusaha->no_blok }}
                                                                                                </td>

                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">
                                                                                                    Kepemilikan Usaha</td>
                                                                                                <td
                                                                                                    value="{{ $pembiayaan->keteranganusaha->id }}">
                                                                                                    :
                                                                                                    {{ $pembiayaan->keteranganusaha->kep_toko_id }}
                                                                                                </td>

                                                                                            </tr>
                                                                                            {{-- <tr>
                                                                    <td class="pe-1">Kantor/Dinas</td>
                                                                    <td>: {{ $pembiayaan->->nama_instansi }}</td>
                                                                </tr> --}}
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                                                                    <h6 class="mb-1">Pendapatan :</h6>
                                                                                    <table>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="pe-1">Omset
                                                                                                </td>
                                                                                                <td><span class="fw-bold">:
                                                                                                        Rp.
                                                                                                        {{ number_format($pembiayaan->omset) }}</span>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <div class="col-md-3">
                                                                                                <tr>
                                                                                                    <td class="pe-1">
                                                                                                        &emsp; HPP</td>
                                                                                                    <td>: Rp.
                                                                                                        {{ number_format($pembiayaan->hpp) }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="pe-1">
                                                                                                        &emsp; Transport
                                                                                                    </td>
                                                                                                    <td>: Rp.
                                                                                                        {{ number_format($pembiayaan->trasport) }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="pe-1">
                                                                                                        &emsp; Telpon</td>
                                                                                                    <td>: Rp.
                                                                                                        {{ number_format($pembiayaan->telpon) }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="pe-1">
                                                                                                        &emsp; Listrik</td>
                                                                                                    <td>: Rp.
                                                                                                        {{ number_format($pembiayaan->listrik) }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="pe-1">
                                                                                                        &emsp; Karyawan</td>
                                                                                                    <td>: Rp.
                                                                                                        {{ number_format($pembiayaan->karyawan) }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="pe-1">
                                                                                                        &emsp; Sewa Kios /
                                                                                                        Los
                                                                                                    </td>
                                                                                                    <td>: Rp.
                                                                                                        {{ number_format($pembiayaan->sewa) }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </div>
                                                                                            {{-- <tr>
                                                                    <td class="pe-1">Gaji TPP</td>
                                                                    <td>: Rp. {{ number_format($pembiayaan->gaji_tpp) }}</td>
                                                                </tr> --}}
                                                                                            <tr>
                                                                                                <td class="pe-1 mt-2">Laba
                                                                                                    Bersih</td>
                                                                                                <td><span class="fw-bold">:
                                                                                                        Rp.
                                                                                                        {{ number_format($pembiayaan->omset - ($pembiayaan->hpp + $pembiayaan->listrik + $pembiayaan->sewa + $pembiayaan->trasport + $pembiayaan->karyawan + $pembiayaan->telpon)) }}</span>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    <hr>
                                                                                    <h6 class="mb-1 mt-2">Pengeluaran :
                                                                                    </h6>
                                                                                    <table>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="pe-1">Cicilan
                                                                                                    Bank BTB</td>
                                                                                                <td>: Rp.
                                                                                                    {{ number_format($angsuran) }}</span>
                                                                                                </td>
                                                                                            </tr>

                                                                                            <tr>
                                                                                                <td class="pe-1">Cicilan
                                                                                                    Bank Lain</td>
                                                                                                <td>: Rp.
                                                                                                    {{ number_format($cicilan) }}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">
                                                                                                    Kebutuhan Keluarga</td>
                                                                                                <td>: Rp.
                                                                                                    {{ number_format($pengeluaran_lain) }}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1 mt-1">Total
                                                                                                    Pengeluaran
                                                                                                </td>
                                                                                                <td><span class="fw-bold">:
                                                                                                        Rp.
                                                                                                        {{ number_format($total_pengeluaran) }}</span>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    <hr>
                                                                                    <h6>Sisa Pendapatan Bersih : Rp.
                                                                                        {{ number_format($laba_bersih - $total_pengeluaran) }}
                                                                                    </h6>
                                                                                    <hr>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Address and Contact ends -->

                                                                        <!-- Invoice Description starts -->
                                                                        <div class="table-responsive">
                                                                            <small>Informasi Debitur Nasabah</small>
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th style="text-align: center; width: 5%;"
                                                                                            class="py-1">No</th>
                                                                                        <th style="text-align: center"
                                                                                            class="py-1">Nama
                                                                                            Bank</th>
                                                                                        <th style="text-align: center"
                                                                                            class="py-1">
                                                                                            Plafond
                                                                                        </th>
                                                                                        <th style="text-align: center"
                                                                                            class="py-1">
                                                                                            Outstanding</th>
                                                                                        <th style="text-align: center"
                                                                                            class="py-1">
                                                                                            Tenor
                                                                                        </th>
                                                                                        <th style="text-align: center"
                                                                                            class="py-1">
                                                                                            Margin
                                                                                        </th>
                                                                                        <th style="text-align: center"
                                                                                            class="py-1">
                                                                                            Angsuran
                                                                                        </th>
                                                                                        <th style="text-align: center"
                                                                                            class="py-1">
                                                                                            Agunan
                                                                                        </th>
                                                                                        <th style="text-align: center"
                                                                                            class="py-1">Kol
                                                                                            Tertinggi</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($idebs as $idep)
                                                                                        @php
                                                                                            // if ($idep) {
                                                                                            //     $margin = $idep->margin / 12 / 100;
                                                                                            //     $plafond = $idep->plafond * $margin * $idep->tenor + $idep->plafond;
                                                                                            //     $angsuran = $plafond / $idep->tenor;
                                                                                            // }
                                                                                        @endphp
                                                                                        <tr>
                                                                                            <td style="text-align: center">
                                                                                                {{ $loop->iteration }}
                                                                                            </td>
                                                                                            <td>{{ $idep->nama_bank }}
                                                                                            </td>
                                                                                            <td>Rp.
                                                                                                {{ number_format($idep->plafond) }}
                                                                                            </td>
                                                                                            <td>Rp.
                                                                                                {{ number_format($idep->outstanding) }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $idep->tenor }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ number_format($idep->margin) }}%
                                                                                            </td>
                                                                                            <td>Rp.
                                                                                                {{ number_format($idep->angsuran) }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $idep->agunan }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $idep->kol_tertinggi }}
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        @if ($cekcicilanpasangan > 0)
                                                                            <br>
                                                                            <div class="table-responsive">
                                                                                <small>Informasi Debitur Pasangan
                                                                                    Nasabah</small>
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th style="text-align: center; width: 5%;"
                                                                                                class="py-1">No</th>
                                                                                            <th style="text-align: center"
                                                                                                class="py-1">Nama
                                                                                                Bank</th>
                                                                                            <th style="text-align: center"
                                                                                                class="py-1">
                                                                                                Plafond
                                                                                            </th>
                                                                                            <th style="text-align: center"
                                                                                                class="py-1">
                                                                                                Outstanding</th>
                                                                                            <th style="text-align: center"
                                                                                                class="py-1">
                                                                                                Tenor
                                                                                            </th>
                                                                                            <th style="text-align: center"
                                                                                                class="py-1">
                                                                                                Margin
                                                                                            </th>
                                                                                            <th style="text-align: center"
                                                                                                class="py-1">
                                                                                                Angsuran
                                                                                            </th>
                                                                                            <th style="text-align: center"
                                                                                                class="py-1">
                                                                                                Agunan
                                                                                            </th>
                                                                                            <th style="text-align: center"
                                                                                                class="py-1">Kol
                                                                                                Tertinggi</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        @foreach ($cicilanpasangans as $ideppasangan)
                                                                                            @php
                                                                                                // if ($ideppasangan) {
                                                                                                //     $margin = $ideppasangan->margin / 12 / 100;
                                                                                                //     $plafond = $ideppasangan->plafond * $margin * $ideppasangan->tenor + $ideppasangan->plafond;
                                                                                                //     $angsuran = $plafond / $ideppasangan->tenor;
                                                                                                // }
                                                                                            @endphp
                                                                                            <tr>
                                                                                                <td
                                                                                                    style="text-align: center">
                                                                                                    {{ $loop->iteration }}
                                                                                                </td>
                                                                                                <td>{{ $ideppasangan->nama_bank }}
                                                                                                </td>
                                                                                                <td>Rp.
                                                                                                    {{ number_format($ideppasangan->plafond) }}
                                                                                                </td>
                                                                                                <td>Rp.
                                                                                                    {{ number_format($ideppasangan->outstanding) }}
                                                                                                </td>
                                                                                                <td
                                                                                                    style="text-align: center">
                                                                                                    {{ $ideppasangan->tenor }}
                                                                                                </td>
                                                                                                <td
                                                                                                    style="text-align: center">
                                                                                                    {{ number_format($ideppasangan->margin) }}%
                                                                                                </td>
                                                                                                <td>Rp.
                                                                                                    {{ number_format($ideppasangan->angsuran) }}
                                                                                                </td>
                                                                                                <td
                                                                                                    style="text-align: center">
                                                                                                    {{ $ideppasangan->agunan }}
                                                                                                </td>
                                                                                                <td
                                                                                                    style="text-align: center">
                                                                                                    {{ $ideppasangan->kol_tertinggi }}
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endforeach

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        @endif

                                                                        <hr class="invoice-spacing" />


                                                                        <div class="card-body invoice-padding pb-0">
                                                                            <div class="row invoice-sales-total-wrapper">
                                                                                <div
                                                                                    class="col-md-8 order-md-1 order-2 mt-md-0 mt-3">
                                                                                    <p class="card-text mb-0">
                                                                                    </p>
                                                                                </div>
                                                                                <div
                                                                                    class="col-md-4 d-flex order-md-2 order-1">
                                                                                    <table>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="pe-1">Harga
                                                                                                    Beli</td>
                                                                                                <td><span class="fw-bold">:
                                                                                                        Rp.
                                                                                                        {{ number_format($pembiayaan->harga) }}</span>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">Harga
                                                                                                    Jual</td>
                                                                                                <td>: Rp.
                                                                                                    {{ number_format($harga_jual) }}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">Jangka
                                                                                                    Waktu</td>
                                                                                                <td>:
                                                                                                    {{ $pembiayaan->tenor }}
                                                                                                    bulan</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">
                                                                                                    Equivalen Rate</td>
                                                                                                <td>:
                                                                                                    {{ $pembiayaan->rate }}
                                                                                                    %</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">Angsuran
                                                                                                </td>
                                                                                                <td>: Rp.
                                                                                                    {{ number_format($angsuran) }}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1 mt-1">IDIR
                                                                                                </td>
                                                                                                <td><span class="fw-bold">:
                                                                                                        {{ $nilai_idir }}
                                                                                                        %</span></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Invoice Description ends -->

                                                                        <hr class="invoice-spacing" />


                                                                    </div>
                                                                </div>
                                                                <!-- /Invoice -->

                                                                <!-- Invoice Actions -->
                                                                <hr class="invoice-spacing" />

                                                                <div class="card-body invoice-padding pb-0">
                                                                    <!-- Header starts -->
                                                                    <div
                                                                        class="d-flex justify-content-center flex-xl-row flex-column invoice-spacing mt-0">
                                                                        <div>
                                                                            <h4>Summary</h4>
                                                                            <hr>

                                                                            <div class="table-responsive mt-1">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th style="text-align: center">
                                                                                                No</th>
                                                                                            <th style="text-align: center">
                                                                                                Parameter
                                                                                            </th>
                                                                                            <th style="text-align: center">
                                                                                                Kategori
                                                                                            </th>
                                                                                            <th style="text-align: center">
                                                                                                Bobot
                                                                                            </th>
                                                                                            <th style="text-align: center">
                                                                                                Rating
                                                                                            </th>
                                                                                            <th style="text-align: center">
                                                                                                Nilai
                                                                                            </th>
                                                                                            <th style="text-align: center">
                                                                                                Detail
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="text-align: center">
                                                                                                1</td>
                                                                                            <td>IDIR</td>
                                                                                            <td>
                                                                                                {{ $idir->idir_rendah }}%
                                                                                                -
                                                                                                {{ $idir->idir_tinggi }}%
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $idir->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $rating_idir }}</td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $score_idir }}</td>
                                                                                            <td style="text-align: center">
                                                                                                <button type="button"
                                                                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#idir">
                                                                                                    <i
                                                                                                        data-feather="eye"></i>
                                                                                                </button>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align: center">
                                                                                                2</td>
                                                                                            <td>Cash Pick Up</td>
                                                                                            <td
                                                                                                value="{{ $cashs->id }}">
                                                                                                {{ $cashs->nama_jeniscash }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $cashs->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $rating_cashpick }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $score_cashpick }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align: center">
                                                                                                3</td>
                                                                                            <td>Legalitas Kepemilikkan Rumah
                                                                                            </td>
                                                                                            <td
                                                                                                value="{{ $rumahs->id }}">
                                                                                                {{ $rumahs->nama_jaminan }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $rumahs->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $rating_jaminanrumah }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $score_jaminanrumah }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align: center">
                                                                                                4</td>
                                                                                            <td>Slik</td>
                                                                                            <td>{{ $slik->kategori }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $slik->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $rating_slik }}</td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $score_slik }}</td>
                                                                                            <td style="text-align: center">
                                                                                                <button type="button"
                                                                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#slik">
                                                                                                    <i
                                                                                                        data-feather="eye"></i>
                                                                                                </button>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td style="text-align: center">
                                                                                                5</td>
                                                                                            <td>Jenis Nasabah</td>
                                                                                            <td
                                                                                                value="{{ $nasabahs->id }}">
                                                                                                {{ $nasabahs->nama_jenisnasabah }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $nasabahs->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $rating_jenisnasabah }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $score_jenisnasabah }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align: center">
                                                                                                6</td>
                                                                                            <td>Konfirmasi Kepala Pasar</td>
                                                                                            <td>
                                                                                                {{ $kepalapasar->kategori }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $kepalapasar->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $rating_kepalapasar }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $score_kepalapasar }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                <button type="button"
                                                                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#kepalapasar">
                                                                                                    <i
                                                                                                        data-feather="eye"></i>
                                                                                                </button>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align: center">
                                                                                                7</td>
                                                                                            <td>Jaminan Kios</td>
                                                                                            <td>{{ $jaminans->nama_jaminan }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $jaminans->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $rating_jaminanlain }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $score_jaminanlain }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                <button type="button"
                                                                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#jaminankios">
                                                                                                    <i
                                                                                                        data-feather="eye"></i>
                                                                                                </button>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align: center">
                                                                                                8</td>
                                                                                            <td>Lama Berdagang</td>
                                                                                            <td
                                                                                                value="{{ $lamas->id }}">
                                                                                                {{ $lamas->nama_lamaberdagang }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $lamas->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $rating_lamadagang }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $score_lamadagang }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align: center">
                                                                                                9</td>
                                                                                            <td>Jenis Dagangan</td>
                                                                                            <td
                                                                                                value="{{ $dagangs->id }}">
                                                                                                {{ $dagangs->nama_jenisdagang }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $dagangs->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $rating_jenisdagang }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $score_jenisdagang }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                <button type="button"
                                                                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#fototoko">
                                                                                                    <i
                                                                                                        data-feather="eye"></i>
                                                                                                </button>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align: center">
                                                                                                10</td>
                                                                                            <td>Suku Bangsa</td>
                                                                                            <td
                                                                                                value="{{ $sukus->id }}">
                                                                                                {{ $sukus->nama_suku }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $sukus->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $rating_sukubangsa }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $score_sukubangsa }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="text-align: center">
                                                                                                11</td>
                                                                                            <td>Jenis Pasar</td>
                                                                                            <td
                                                                                                value="{{ $pasars->id }}">
                                                                                                {{ $pasars->nama_pasar }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $pasars->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $rating_jenispasar }}
                                                                                            </td>
                                                                                            <td style="text-align: center">
                                                                                                {{ $score_jenispasar }}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            @if ($deviasi)
                                                                                <div
                                                                                    class="card-body invoice-padding pt-0">
                                                                                    <div class="mb-0 mt-1 col-md-4">
                                                                                        <button type="button"
                                                                                            class="btn btn-primary"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#dokumendeviasi">Dokumen
                                                                                            Deviasi
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                            @php
                                                                                $total_score = $score_idir + $score_slik + $score_cashpick + $score_jaminanrumah + $score_kepalapasar + $score_lamadagang + $score_jenisnasabah + $score_jenisdagang + $score_sukubangsa + $score_jenispasar;
                                                                            @endphp
                                                                            <div class="card-body invoice-padding pt-0">
                                                                                <div class="row invoice-spacing">
                                                                                    <div class="col-xl-8 p-0">
                                                                                        <table>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td class="pe-1">
                                                                                                        Total Nilai
                                                                                                    </td>
                                                                                                    <td>:
                                                                                                        {{ $total_score }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="pe-1">
                                                                                                        Status</td>
                                                                                                    <td>:
                                                                                                        @if ($nilai_idir >= 80 || $nilai_idir < 0)
                                                                                                            @if ($nilai_idir >= 80 && $total_score > 3)
                                                                                                                <span
                                                                                                                    class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                                                <small
                                                                                                                    class="text-danger">*IDIR
                                                                                                                    >
                                                                                                                    80%</small>
                                                                                                            @elseif($nilai_idir < 0 && $total_score > 3)
                                                                                                                <span
                                                                                                                    class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                                                <small
                                                                                                                    class="text-danger">*Pengeluaran
                                                                                                                    >
                                                                                                                    Pendapatan</small>
                                                                                                            @elseif($total_score > 2 || $total_score > 3)
                                                                                                                <span
                                                                                                                    class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                                    Ulang</span>
                                                                                                            @else
                                                                                                                <span
                                                                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                                                            @endif
                                                                                                        @else
                                                                                                            @if ($total_score > 3)
                                                                                                                <span
                                                                                                                    class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                                            @elseif($total_score > 2 || $total_score > 3)
                                                                                                                <span
                                                                                                                    class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                                    Ulang</span>
                                                                                                            @else
                                                                                                                <span
                                                                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                                                            @endif
                                                                                                        @endif
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-xl-4 p-10 mt-xl-0 mt-2">
                                                                                        <p class="mb-1 fw-bold">Note :</p>
                                                                                        <table>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td class="pe-1 mb-2">
                                                                                                        Nilai < 2 </td>
                                                                                                    <td>: <span
                                                                                                            class="fw-bold"><span
                                                                                                                class="badge rounded-pill badge-glow bg-danger">Ditolak</span></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="pe-1 mb-2">
                                                                                                        <br>Nilai > 2
                                                                                                        - 3
                                                                                                    </td>
                                                                                                    <td><br>: <span
                                                                                                            class="fw-bold"><span
                                                                                                                class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                                Ulang</span></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="pe-1 mb-2">
                                                                                                        <br>Nilai > 3
                                                                                                    </td>
                                                                                                    <td><br>: <span
                                                                                                            class="fw-bold"><span
                                                                                                                class="badge rounded-pill badge-glow bg-success">Diterima</span></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Header ends -->
                                                                </div>

                                                                <!--akhir Slik -->

                                                                <div class="card-body invoice-padding pt-0">
                                                                    <div class="row invoice-spacing">
                                                                        <!-- Tombol Aksi -->
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <form action="">
                                                                                    <input type="hidden" name=""
                                                                                        value="" />
                                                                                    <input type="hidden"
                                                                                        name="cek_staff_akad"
                                                                                        value="Dicetak" />
                                                                                    <a type="submit" class="btn w-100"
                                                                                        style="background-color:darkorange; color:wheat
                                                                                        "
                                                                                        href="/staff/cetak/pasar/{{ $pembiayaan->id }}"><i
                                                                                            data-feather="printer"></i>

                                                                                        Cetak
                                                                                        Akad
                                                                                    </a>
                                                                                </form>
                                                                            </div>
                                                                            <br />
                                                                            <p></p>
                                                                            <div class="col-md-6">
                                                                                <form action="">
                                                                                    <input type="hidden" name=""
                                                                                        value="" />
                                                                                    <a class="btn btn-primary w-100"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modalAkadPasarBatal"><i
                                                                                            data-feather="x"></i>
                                                                                        Akad
                                                                                        Batal
                                                                                    </a>
                                                                                </form>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <form action="/staff/proposal"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    <input type="hidden" name="segmen"
                                                                                        value="Pasar" />
                                                                                    <input type="hidden" name="ao_id"
                                                                                        value="{{ $pembiayaan->AO_id }}" />
                                                                                    <input type="hidden" name="cif"
                                                                                        value="{{ $pembiayaan->nasabahh->id }}" />
                                                                                    <input type="hidden"
                                                                                        name="nama_nasabah"
                                                                                        value="{{ $pembiayaan->nasabahh->nama_nasabah }}" />
                                                                                    <input type="hidden"
                                                                                        name="kode_tabungan"
                                                                                        value="{{ $pembiayaan->id }}" />
                                                                                    <input type="hidden" name="plafond"
                                                                                        value="{{ $pembiayaan->harga }}" />
                                                                                    <input type="hidden" name="akad"
                                                                                        value="{{ $pembiayaan->akad->nama_akad }}" />
                                                                                    <input type="hidden"
                                                                                        name="harga_jual"
                                                                                        value="{{ $harga_jual }}" />
                                                                                    <input type="hidden" name="status"
                                                                                        value="Selesai Akad" />
                                                                                    <input type="hidden"
                                                                                        name="pasar_pembiayaan_id"
                                                                                        value="{{ $pembiayaan->id }}" />
                                                                                    <input type="hidden"
                                                                                        name="status_id"
                                                                                        value="9" />
                                                                                    <input type="hidden"
                                                                                        name="cek_staff_akad"
                                                                                        value="Sudah" />
                                                                                    <button type="submit"
                                                                                        class="btn btn-success w-100"><i
                                                                                            data-feather="check"></i>
                                                                                        Selesai
                                                                                        Akad
                                                                                    </button>
                                                                                </form>
                                                                            </div>


                                                                            <!-- Modal Batal-->
                                                                            <div class="modal fade"
                                                                                id="modalAkadPasarBatal" tabindex="-1"
                                                                                aria-labelledby="addNewCardTitle"
                                                                                aria-hidden="true">
                                                                                <div
                                                                                    class="modal-dialog modal-dialog-centered">
                                                                                    <div class="modal-content">
                                                                                        <div
                                                                                            class="modal-header bg-transparent">
                                                                                            <button type="button"
                                                                                                class="btn-close"
                                                                                                data-bs-dismiss="modal"
                                                                                                aria-label="Close"></button>
                                                                                        </div>
                                                                                        <div
                                                                                            class="modal-body px-sm-5 mx-50 pb-5">
                                                                                            <form action="/staff/proposal"
                                                                                                method="POST">
                                                                                                <h5 class="text-center">
                                                                                                    Tuliskan catatan
                                                                                                    mengapa akad
                                                                                                    batal!</h5>
                                                                                                <br />
                                                                                                <textarea class="form-control" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                                                <br />

                                                                                                @csrf

                                                                                                <input type="hidden"
                                                                                                    name="segmen"
                                                                                                    value="Pasar" />
                                                                                                <input type="hidden"
                                                                                                    name="ao_id"
                                                                                                    value="{{ $pembiayaan->AO_id }}" />
                                                                                                <input type="hidden"
                                                                                                    name="cif"
                                                                                                    value="{{ $pembiayaan->id }}" />
                                                                                                <input type="hidden"
                                                                                                    name="nama_nasabah"
                                                                                                    value="{{ $pembiayaan->nasabahh->nama_nasabah }}" />
                                                                                                <input type="hidden"
                                                                                                    name="kode_tabungan"
                                                                                                    value="{{ $pembiayaan->id }}" />
                                                                                                <input type="hidden"
                                                                                                    name="akad"
                                                                                                    value="{{ $pembiayaan->akad->nama_akad }}" />
                                                                                                <input type="hidden"
                                                                                                    name="plafond"
                                                                                                    value="{{ $pembiayaan->harga }}" />
                                                                                                <input type="hidden"
                                                                                                    name="harga_jual"
                                                                                                    value="{{ $harga_jual }}" />
                                                                                                <input type="hidden"
                                                                                                    name="status"
                                                                                                    value="Akad Batal" />
                                                                                                <input type="hidden"
                                                                                                    name="pasar_pembiayaan_id"
                                                                                                    value="{{ $pembiayaan->id }}" />
                                                                                                <input type="hidden"
                                                                                                    name="status_id"
                                                                                                    value="10" />
                                                                                                <input type="hidden"
                                                                                                    name="cek_staff_akad"
                                                                                                    value="Sudah" />
                                                                                                <div class="row">
                                                                                                    <div class="col-md-6">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="btn btn-outline-danger w-100"
                                                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <button
                                                                                                            type="submit"
                                                                                                            class="btn btn-primary w-100"><i
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
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /Tombol Aksi -->
                                                                <!-- Invoice Note ends -->
                                                                <!-- add new card modal  -->
                                                                <div class="modal fade" id="lanjut_komite"
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
                                                                                    Apakah Anda Yakin Untuk Melanjutkan Ke
                                                                                    Komite ?
                                                                                </h1>
                                                                                <p class="text-center"></p>

                                                                                <!-- form -->
                                                                                <form id="addNewCardValidation"
                                                                                    class="row gy-1 gx-2 mt-75"
                                                                                    method="POST"
                                                                                    action="/dirbis/pasar/komite">
                                                                                    @csrf

                                                                                    <div class="col-md-12">
                                                                                        <label class="form-label"
                                                                                            for="catatan">Catatan</label>
                                                                                        <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                                    </div>
                                                                                    <input type="hidden"
                                                                                        name="pasar_pembiayaan_id"
                                                                                        value="{{ $pembiayaan->id }}">
                                                                                    <input type="hidden"
                                                                                        name="status_id" value=5>
                                                                                    <input type="hidden" name="user_id"
                                                                                        value="{{ Auth::user()->id }}">

                                                                                    <div class="col-12 text-center">
                                                                                        <button type="submit"
                                                                                            class="btn btn-primary me-1 mt-1">Submit</button>
                                                                                        <button type="reset"
                                                                                            class="btn btn-outline-secondary mt-1"
                                                                                            data-bs-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                            Cancel
                                                                                        </button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                @if ($deviasi)
                                                                    <div class="modal fade" id="dokumendeviasi"
                                                                        tabindex="-1" aria-labelledby="addNewCardTitle"
                                                                        aria-hidden="true">
                                                                        <div
                                                                            class="modal-dialog modal-dialog-centered modal-lg">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header bg-transparent">
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body ">
                                                                                    <h3 class="text-center">Lampiran
                                                                                        Dokumen Deviasi</h3>
                                                                                    <div class="card-body">
                                                                                        <iframe
                                                                                            src="{{ asset('storage/' . $deviasi->dokumen_deviasi) }}"
                                                                                            class="d-block w-100"
                                                                                            height="1000"
                                                                                            width='1000'></iframe>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                <!-- /Invoice Actions -->
                                                            </div>

                                                            <div class="tab-pane" id="identitas-pribadi"
                                                                role="tabpanel" aria-labelledby="profile-tab-justified">
                                                                <!-- post 1 -->
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div
                                                                            class="d-flex justify-content-start align-items-center mb-1">
                                                                            <div>
                                                                                <h6 class="mb-0">
                                                                                    {{ $fotodiri->kategori }}</h6>
                                                                                <small class="text-muted">Diupload Pada :
                                                                                    {{ $fotodiri->created_at->diffForhumans() }}</small>
                                                                            </div>
                                                                        </div>
                                                                        <!-- post img -->
                                                                        <img class="img-fluid rounded mb-75"
                                                                            src="{{ asset('storage/' . $fotodiri->foto) }}"
                                                                            alt="avatar img" />
                                                                        <!--/ post img -->
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div
                                                                            class="d-flex justify-content-start align-items-center mb-1">
                                                                            <div>
                                                                                <h6 class="mb-0">
                                                                                    {{ $fotoktp->kategori }}</h6>
                                                                                <small class="text-muted">Diupload Pada :
                                                                                    {{ $fotoktp->created_at->diffForhumans() }}</small>
                                                                            </div>
                                                                        </div>
                                                                        <!-- post img -->
                                                                        <img class="img-fluid rounded mb-75"
                                                                            src="{{ asset('storage/' . $fotoktp->foto) }}"
                                                                            alt="avatar img" />
                                                                        <!--/ post img -->
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div
                                                                            class="d-flex justify-content-start align-items-center mb-1">
                                                                            <div>
                                                                                <h6 class="mb-0">
                                                                                    {{ $fotodiribersamaktp->kategori }}
                                                                                </h6>
                                                                                <small class="text-muted">Diupload Pada :
                                                                                    {{ $fotodiribersamaktp->created_at->diffForhumans() }}</small>
                                                                            </div>
                                                                        </div>
                                                                        <!-- post img -->
                                                                        <img class="img-fluid rounded mb-75"
                                                                            src="{{ asset('storage/' . $fotodiribersamaktp->foto) }}"
                                                                            alt="avatar img" />
                                                                        <!--/ post img -->
                                                                    </div>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div
                                                                            class="d-flex justify-content-start align-items-center mb-1">
                                                                            <div>
                                                                                <h6 class="mb-0">
                                                                                    {{ $fotokk->kategori }}</h6>
                                                                                <small class="text-muted">Diupload Pada :
                                                                                    {{ $fotokk->created_at->diffForhumans() }}</small>
                                                                            </div>
                                                                        </div>
                                                                        <!-- post img -->
                                                                        <img class="img-fluid rounded mb-75"
                                                                            src="{{ asset('storage/' . $fotokk->foto) }}"
                                                                            alt="avatar img" />
                                                                        <!--/ post img -->
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="tab-pane" id="legalitas-agunan"
                                                                role="tabpanel"aria-labelledby="messages-tab-justified">
                                                                @foreach ($jaminanusahas as $jaminan)
                                                                    <!-- post 1 -->
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div
                                                                                class="d-flex justify-content-start align-items-center mb-1">
                                                                                <div>
                                                                                    <h6 class="mb-0"> Jaminan :
                                                                                        {{ $jaminans->nama_jaminan }}
                                                                                    </h6>
                                                                                    <h6 class="mb-0"><br>No KTB :
                                                                                        {{ $jaminan->no_ktb }}
                                                                                    </h6>
                                                                                    <small class="text-muted">Diupload
                                                                                        Pada
                                                                                        :
                                                                                        {{ $jaminan->created_at->diffForhumans() }}</small>
                                                                                </div>
                                                                            </div>
                                                                            <!-- post img -->
                                                                            <img class="img-fluid rounded mb-75"
                                                                                src="{{ asset('storage/' . $jaminan->dokumenktb) }}"
                                                                                alt="avatar img" />
                                                                            <!--/ post img -->
                                                                        </div>
                                                                    </div>
                                                                    <!--/ post 1 -->
                                                                @endforeach
                                                                @foreach ($jaminanlainusahas as $jaminanlainnya)
                                                                    <!-- post 1 -->
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div
                                                                                class="d-flex justify-content-start align-items-center mb-1">
                                                                                <div>
                                                                                    <small class="text-muted">Diupload
                                                                                        Pada
                                                                                        :
                                                                                        {{ $jaminanlainnya->created_at->diffForhumans() }}</small>
                                                                                </div>
                                                                            </div>
                                                                            <!-- post img -->
                                                                            <img class="img-fluid rounded mb-75"
                                                                                src="{{ asset('storage/' . $jaminanlainnya->dokumen_jaminan) }}"
                                                                                alt="avatar img" />
                                                                            <!--/ post img -->
                                                                        </div>
                                                                    </div>
                                                                    <!--/ post 1 -->
                                                                @endforeach
                                                            </div>
                                                            @if ($nota)
                                                                <div class="tab-pane" id="keuangan"
                                                                    role="tabpanel"aria-labelledby="messages-tab-justified">

                                                                    <!-- post 1 -->
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div
                                                                                class="d-flex justify-content-start align-items-center mb-1">
                                                                                <div>
                                                                                    <h6 class="mb-0">
                                                                                        {{ $nota->kategori }}
                                                                                    </h6>
                                                                                    <small class="text-muted">Diupload
                                                                                        Pada
                                                                                        :
                                                                                        {{ $nota->created_at->diffForhumans() }}</small>
                                                                                </div>
                                                                            </div>
                                                                            <!-- post img -->
                                                                            <img class="img-fluid rounded mb-75"
                                                                                src="{{ asset('storage/' . $nota->foto) }}"
                                                                                alt="avatar img" />
                                                                            <!--/ post img -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <div class="tab-pane" id="legalitas-usaha"
                                                                role="tabpanel"aria-labelledby="messages-tab-justified">

                                                                <!-- post 1 -->
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div
                                                                            class="d-flex justify-content-start align-items-center mb-1">
                                                                            <div>
                                                                                <h6 class="mb-0">Foto Kios / Los :
                                                                                    {{ $fototoko->kategori }}
                                                                                </h6>
                                                                                <small class="text-muted">Diupload Pada :
                                                                                    {{ $fototoko->created_at->diffForhumans() }}</small>
                                                                            </div>
                                                                        </div>
                                                                        <!-- post img -->
                                                                        <img class="img-fluid rounded mb-75"
                                                                            src="{{ asset('storage/' . $fototoko->foto) }}"
                                                                            alt="avatar img" />
                                                                        <!--/ post img -->
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="tab-pane" id="ideb" role="tabpanel"
                                                                aria-labelledby="settings-tab-justified">
                                                                {{-- <iframe src="{{ asset('storage/' . $ideb->foto) }}" frameborder="0"
                                                        width="1000" height="900"></iframe> --}}
                                                                <iframe
                                                                    src="{{ asset('storage/' . $pembiayaan->dokumen_keuangan) }}"
                                                                    class="d-block w-100" height='500'
                                                                    weight='800'></iframe>
                                                            </div>

                                                            <div class="tab-pane" id="timeline" role="tabpanel"
                                                                aria-labelledby="settings-tab-justified">
                                                                <div
                                                                    class="col-xl-12 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
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
                                                                                        } elseif ($arr == $banyak_history) {
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
                                                                                                    value="{{ $timeline->statushistory->id }}, {{ $timeline->jabatan->jabatan_id }}">
                                                                                                    {{ $timeline->statushistory->keterangan }}
                                                                                                    {{ $timeline->jabatan->keterangan }}
                                                                                                </h6>
                                                                                                <span
                                                                                                    class="timeline-event-time"
                                                                                                    style="text-align: right">{{ $timeline->created_at->isoformat('dddd, D MMMM Y') }}
                                                                                                    <br>{{ $timeline->created_at->isoformat('HH:mm:ss') }}
                                                                                                </span>
                                                                                            </div>
                                                                                            @if ($timeline->catatan)
                                                                                                <p
                                                                                                    value="{{ $timeline->id }}">
                                                                                                    <br>Catatan :
                                                                                                    {{ $timeline->catatan }}
                                                                                                <p>
                                                                                            @endif
                                                                                            @if ($arr == -1)
                                                                                            @else
                                                                                                <span
                                                                                                    class="timeline-event-time">Waktu
                                                                                                    Diproses :
                                                                                                    {{ $selisih }}</span>
                                                                                            @endif
                                                                                            {{-- <span
                                                                                                class="timeline-event-time">{{ $timeline->created_at->diffForHumans() }}</span> --}}
                                                                                            {{-- <p>{{ $timeline->created_at->diffForHumans() }}</p> --}}
                                                                                            <div
                                                                                                class="d-flex flex-row align-items-center">

                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                @endforeach
                                                                                <hr class="invoice-spacing" />
                                                                                <p class="fw-bold"> Total SLA =
                                                                                    {{ $totalwaktu }}</p>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Justified Tabs ends -->
                                                    </div>
                                    </section>
                                    <div class="modal fade" id="idir" tabindex="-1"
                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-transparent">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                    <h3 class="text-center">Nilai IDIR </h3>
                                                    <hr class="invoice-spacing" />
                                                    <div class="card-body">
                                                        <div class="col-md-12 d-flex order-md-2 order-1">
                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="pe-1">Harga Beli</td>
                                                                        <td><span class="fw-bold">: Rp.
                                                                                {{ number_format($pembiayaan->harga) }}</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="pe-1">Harga Jual</td>
                                                                        <td>: Rp. {{ number_format($harga_jual) }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="pe-1">Jangka Waktu</td>
                                                                        <td>: {{ $pembiayaan->tenor }} bulan</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="pe-1">Equivalen Rate</td>
                                                                        <td>: {{ $pembiayaan->rate }} %</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="pe-1">Angsuran</td>
                                                                        <td>: Rp. {{ number_format($angsuran) }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="pe-1">Cicilan Bank Lain</td>
                                                                        <td>: Rp. {{ number_format($cicilan) }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="pe-1">Pendapatan Bersih</td>
                                                                        <td>: Rp.
                                                                            {{ number_format($laba_bersih - $total_pengeluaran) }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="pe-1 mt-1">IDIR</td>
                                                                        <td><span class="fw-bold">:
                                                                                {{ $nilai_idir }}
                                                                                %</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--akhir idir -->

                                    <!-- Slik -->
                                    <div class="modal fade" id="slik" tabindex="-1"
                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header bg-transparent">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body px-sm-12 mx-50 pb-5">
                                                    <h3 class="text-center">IDEB </h3>
                                                    <hr class="invoice-spacing" />
                                                    <div class="card-body">
                                                        <div class="col-md-12 d-flex order-md-2 order-1">
                                                            <iframe
                                                                src="{{ asset('storage/' . $pembiayaan->dokumen_keuangan) }}"
                                                                class="d-block w-100" height='500'
                                                                weight='800'></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--akhir Slik -->
                                    <!-- Slik -->
                                    <div class="modal fade" id="kepalapasar" tabindex="-1"
                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-transparent">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body px-sm-12 mx-50 pb-5">
                                                    <h3 class="text-center">Konfirmasi Kepala Pasar </h3>
                                                    <hr class="invoice-spacing" />
                                                    <div class="card-body">
                                                        <div class="col-md-12 d-flex order-md-2 order-1">
                                                            <img src="{{ asset('storage/' . $konfirmasi->foto) }}"
                                                                class="d-block w-100" height='500' weight='800'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--akhir Slik -->
                                    <!-- Slik -->
                                    <div class="modal fade" id="fototoko" tabindex="-1"
                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-transparent">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body px-sm-12 mx-50 pb-5">
                                                    <h3 class="text-center">Jenis Dagangan </h3>
                                                    <hr class="invoice-spacing" />
                                                    <div class="card-body">
                                                        <div class="col-md-12 d-flex order-md-2 order-1">
                                                            <img src="{{ asset('storage/' . $fototoko->foto) }}"
                                                                class="d-block w-100" height='500' weight='800'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--akhir Slik -->
                                    <!-- Slik -->
                                    <div class="modal fade" id="jaminankios" tabindex="-1"
                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-transparent">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body px-sm-12 mx-50 pb-5">
                                                    <h3 class="text-center">Jaminan Kios </h3>
                                                    <hr class="invoice-spacing" />
                                                    <div class="card-body">
                                                        <div class="col-md-12 d-flex order-md-2 order-1">
                                                            <img src="{{ asset('storage/' . $jaminan->dokumenktb) }}"
                                                                class="d-block w-100" height='500' weight='800'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                    </div>
            </div>
        @elseif ($segmen == 'UMKM')
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Proposal Pengajuan Pembiayaan UMKM</h4>
                </div>
                <div class="card-body">
                    <div class="col-xl-12 col-md-8 col-12">
                        <div class="content-body">
                            <section id="nav-filled">
                                <div class="row match-height">

                                    <!-- Justified Tabs starts -->
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab-justified"
                                                            data-bs-toggle="tab" href="#proposal" role="tab"
                                                            aria-controls="home-just" aria-selected="true">Proposal</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profile-tab-justified"
                                                            data-bs-toggle="tab" href="#identitas-pribadi"
                                                            role="tab" aria-controls="profile-just"
                                                            aria-selected="true">Identitas
                                                            Pribadi</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="messages-tab-justified"
                                                            data-bs-toggle="tab" href="#legalitas-agunan"
                                                            role="tab" aria-controls="messages-just"
                                                            aria-selected="false">Legalitas
                                                            Agunan</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="settings-tab-justified"
                                                            data-bs-toggle="tab" href="#keuangan" role="tab"
                                                            aria-controls="settings-just"
                                                            aria-selected="false">Keuangan</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="settings-tab-justified"
                                                            data-bs-toggle="tab" href="#ideb" role="tab"
                                                            aria-controls="settings-just" aria-selected="false">Ideb</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="settings-tab-justified"
                                                            data-bs-toggle="tab" href="#timeline" role="tab"
                                                            aria-controls="settings-just"
                                                            aria-selected="false">Timeline</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content pt-1">
                                                    <div class="tab-pane active " id="proposal" role="tabpanel"
                                                        aria-labelledby="home-tab-justified">
                                                        <!-- Invoice -->
                                                        <div class="col-xl-12 col-md-8 col-12">
                                                            <div class="card invoice-preview-card">


                                                                <!-- Address and Contact starts -->
                                                                <div class="card-body invoice-padding pt-0">
                                                                    <div class="row invoice-spacing">
                                                                        <div class="col-xl-8 p-0">
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="pe-1">Tanggal
                                                                                            Pengajuan</td>
                                                                                        <td>:
                                                                                            {{ $pembiayaan->tgl_pembiayaan }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">
                                                                                            Nama AO </td>
                                                                                        <td>:
                                                                                            {{ $pembiayaan->user->name }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Penggunaan</td>
                                                                                        <td>:
                                                                                            {{ $pembiayaan->penggunaan_id }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Sektor</td>
                                                                                        <td
                                                                                            value="{{ $pembiayaan->sektor->id }}">
                                                                                            :
                                                                                            {{ $pembiayaan->sektor->nama_sektor_ekonomi }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Akad</td>
                                                                                        <td
                                                                                            value="{{ $pembiayaan->akad->id }}">
                                                                                            :
                                                                                            {{ $pembiayaan->akad->nama_akad }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Nama Nasabah
                                                                                        </td>
                                                                                        <td><span class="fw-bold">:
                                                                                                {{ $pembiayaan->nasabahh->nama_nasabah }}</span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">No Tlp</td>
                                                                                        <td>:
                                                                                            {{ $pembiayaan->nasabahh->no_tlp }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Alamat</td>
                                                                                        <td>:
                                                                                            {{ $pembiayaan->nasabahh->alamat }},
                                                                                            {{ $pembiayaan->nasabahh->rt }},
                                                                                            {{ $pembiayaan->nasabahh->rw }},
                                                                                            {{ $pembiayaan->nasabahh->desa_kelurahan }},
                                                                                            {{ $pembiayaan->nasabahh->kecamatan }},
                                                                                            {{ $pembiayaan->nasabahh->kabkota }},
                                                                                            {{ $pembiayaan->nasabahh->provinsi }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">No KTP</td>
                                                                                        <td>:
                                                                                            {{ $pembiayaan->nasabahh->no_ktp }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Tempat/Tgl
                                                                                            Lahir</td>
                                                                                        <td>:
                                                                                            {{ $pembiayaan->nasabahh->tmp_lahir }}
                                                                                            /
                                                                                            {{ $pembiayaan->nasabahh->tgl_lahir }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Nama Ibu
                                                                                            Kandung</td>
                                                                                        <td>:
                                                                                            {{ $pembiayaan->nasabahh->nama_ibu }}
                                                                                        </td>

                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Jenis Usaha
                                                                                        </td>
                                                                                        <td
                                                                                            value="{{ $pembiayaan->keteranganusaha->dagang->id }}">
                                                                                            :
                                                                                            {{ $pembiayaan->keteranganusaha->dagang->nama_jenisdagang }}
                                                                                            </option>
                                                                                        </td>

                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Kepemilikan
                                                                                            Usaha</td>
                                                                                        <td
                                                                                            value="{{ $pembiayaan->keteranganusaha->id }}">
                                                                                            :
                                                                                            {{ $pembiayaan->keteranganusaha->kep_toko_id }}
                                                                                        </td>

                                                                                    </tr>
                                                                                    {{-- <tr>
                                                                    <td class="pe-1">Kantor/Dinas</td>
                                                                    <td>: {{ $pembiayaan->->nama_instansi }}</td>
                                                                </tr> --}}
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                                                            <h6 class="mb-1">Pendapatan :</h6>
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="pe-1">Omset</td>
                                                                                        <td><span class="fw-bold">: Rp.
                                                                                                {{ number_format($pembiayaan->omset) }}</span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <div class="col-md-3">
                                                                                        <tr>
                                                                                            <td class="pe-1"> &emsp; HPP
                                                                                            </td>
                                                                                            <td>: Rp.
                                                                                                {{ number_format($pembiayaan->hpp) }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="pe-1">&emsp;
                                                                                                Transport</td>
                                                                                            <td>: Rp.
                                                                                                {{ number_format($pembiayaan->trasport) }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="pe-1">&emsp;
                                                                                                Telpon</td>
                                                                                            <td>: Rp.
                                                                                                {{ number_format($pembiayaan->telpon) }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="pe-1">&emsp;
                                                                                                Listrik</td>
                                                                                            <td>: Rp.
                                                                                                {{ number_format($pembiayaan->listrik) }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="pe-1">&emsp;
                                                                                                Karyawan</td>
                                                                                            <td>: Rp.
                                                                                                {{ number_format($pembiayaan->karyawan) }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="pe-1">&emsp; Sewa
                                                                                                Kios / Los
                                                                                            </td>
                                                                                            <td>: Rp.
                                                                                                {{ number_format($pembiayaan->sewa) }}
                                                                                            </td>
                                                                                        </tr>
                                                                                    </div>
                                                                                    {{-- <tr>
                                                                    <td class="pe-1">Gaji TPP</td>
                                                                    <td>: Rp. {{ number_format($pembiayaan->gaji_tpp) }}</td>
                                                                </tr> --}}
                                                                                    <tr>
                                                                                        <td class="pe-1 mt-2">Laba Bersih
                                                                                        </td>
                                                                                        <td><span class="fw-bold">: Rp.
                                                                                                {{ number_format($pembiayaan->omset - ($pembiayaan->hpp + $pembiayaan->listrik + $pembiayaan->sewa + $pembiayaan->trasport + $pembiayaan->karyawan + $pembiayaan->telpon)) }}</span>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <hr>
                                                                            <h6 class="mb-1 mt-2">Pengeluaran :</h6>
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="pe-1">Cicilan Bank
                                                                                            BTB</td>
                                                                                        <td>: Rp.
                                                                                            {{ number_format($angsuran) }}</span>
                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td class="pe-1">Cicilan Bank
                                                                                            Lain</td>
                                                                                        <td>: Rp.
                                                                                            {{ number_format($cicilan) }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Kebutuhan
                                                                                            Keluarga</td>
                                                                                        <td>: Rp.
                                                                                            {{ number_format($pengeluaran_lain) }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1 mt-1">Total
                                                                                            Pengeluaran</td>
                                                                                        <td><span class="fw-bold">: Rp.
                                                                                                {{ number_format($total_pengeluaran) }}</span>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <hr>
                                                                            <h6>Sisa Pendapatan Bersih : Rp.
                                                                                {{ number_format($laba_bersih - $total_pengeluaran) }}
                                                                            </h6>
                                                                            <hr>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Address and Contact ends -->

                                                                <!-- Invoice Description starts -->
                                                                <div class="table-responsive">
                                                                    <small>Informasi Debitur Nasabah</small>
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="text-align: center; width: 5%;"
                                                                                    class="py-1">No</th>
                                                                                <th style="text-align: center"
                                                                                    class="py-1">Nama
                                                                                    Bank</th>
                                                                                <th style="text-align: center"
                                                                                    class="py-1">
                                                                                    Plafond
                                                                                </th>
                                                                                <th style="text-align: center"
                                                                                    class="py-1">
                                                                                    Outstanding</th>
                                                                                <th style="text-align: center"
                                                                                    class="py-1">
                                                                                    Tenor
                                                                                </th>
                                                                                <th style="text-align: center"
                                                                                    class="py-1">
                                                                                    Margin
                                                                                </th>
                                                                                <th style="text-align: center"
                                                                                    class="py-1">
                                                                                    Angsuran
                                                                                </th>
                                                                                <th style="text-align: center"
                                                                                    class="py-1">
                                                                                    Agunan
                                                                                </th>
                                                                                <th style="text-align: center"
                                                                                    class="py-1">Kol
                                                                                    Tertinggi</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($idebs as $idep)
                                                                                @php
                                                                                    // if ($idep) {
                                                                                    //     $margin = $idep->margin / 12 / 100;
                                                                                    //     $plafond = $idep->plafond * $margin * $idep->tenor + $idep->plafond;
                                                                                    //     $angsuran = $plafond / $idep->tenor;
                                                                                    // }
                                                                                @endphp
                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        {{ $loop->iteration }}</td>
                                                                                    <td>{{ $idep->nama_bank }}</td>
                                                                                    <td>Rp.
                                                                                        {{ number_format($idep->plafond) }}
                                                                                    </td>
                                                                                    <td>Rp.
                                                                                        {{ number_format($idep->outstanding) }}
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $idep->tenor }}
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ number_format($idep->margin) }}%
                                                                                    </td>
                                                                                    <td>Rp.
                                                                                        {{ number_format($idep->angsuran) }}
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $idep->agunan }}
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $idep->kol_tertinggi }}</td>
                                                                                </tr>
                                                                            @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                @if ($cekcicilanpasangan > 0)
                                                                    <br>
                                                                    <div class="table-responsive">
                                                                        <small>Informasi Debitur Pasangan Nasabah</small>
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="text-align: center; width: 5%;"
                                                                                        class="py-1">No</th>
                                                                                    <th style="text-align: center"
                                                                                        class="py-1">Nama
                                                                                        Bank</th>
                                                                                    <th style="text-align: center"
                                                                                        class="py-1">
                                                                                        Plafond
                                                                                    </th>
                                                                                    <th style="text-align: center"
                                                                                        class="py-1">
                                                                                        Outstanding</th>
                                                                                    <th style="text-align: center"
                                                                                        class="py-1">
                                                                                        Tenor
                                                                                    </th>
                                                                                    <th style="text-align: center"
                                                                                        class="py-1">
                                                                                        Margin
                                                                                    </th>
                                                                                    <th style="text-align: center"
                                                                                        class="py-1">
                                                                                        Angsuran
                                                                                    </th>
                                                                                    <th style="text-align: center"
                                                                                        class="py-1">
                                                                                        Agunan
                                                                                    </th>
                                                                                    <th style="text-align: center"
                                                                                        class="py-1">Kol
                                                                                        Tertinggi</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($cicilanpasangans as $ideppasangan)
                                                                                    @php
                                                                                        // if ($ideppasangan) {
                                                                                        //     $margin = $ideppasangan->margin / 12 / 100;
                                                                                        //     $plafond = $ideppasangan->plafond * $margin * $ideppasangan->tenor + $ideppasangan->plafond;
                                                                                        //     $angsuran = $plafond / $ideppasangan->tenor;
                                                                                        // }
                                                                                    @endphp
                                                                                    <tr>
                                                                                        <td style="text-align: center">
                                                                                            {{ $loop->iteration }}</td>
                                                                                        <td>{{ $ideppasangan->nama_bank }}
                                                                                        </td>
                                                                                        <td>Rp.
                                                                                            {{ number_format($ideppasangan->plafond) }}
                                                                                        </td>
                                                                                        <td>Rp.
                                                                                            {{ number_format($ideppasangan->outstanding) }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $ideppasangan->tenor }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ number_format($ideppasangan->margin) }}%
                                                                                        </td>
                                                                                        <td>Rp.
                                                                                            {{ number_format($ideppasangan->angsuran) }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $ideppasangan->agunan }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $ideppasangan->kol_tertinggi }}
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                @endif

                                                                <hr class="invoice-spacing" />


                                                                <div class="card-body invoice-padding pb-0">
                                                                    <div class="row invoice-sales-total-wrapper">
                                                                        <div
                                                                            class="col-md-8 order-md-1 order-2 mt-md-0 mt-3">
                                                                            <p class="card-text mb-0">
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-md-4 d-flex order-md-2 order-1">
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="pe-1">Harga Beli</td>
                                                                                        <td><span class="fw-bold">: Rp.
                                                                                                {{ number_format($pembiayaan->nominal_pembiayaan) }}</span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Harga Jual</td>
                                                                                        <td>: Rp.
                                                                                            {{ number_format($harga_jual) }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Jangka Waktu
                                                                                        </td>
                                                                                        <td>: {{ $pembiayaan->tenor }}
                                                                                            bulan</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Equivalen Rate
                                                                                        </td>
                                                                                        <td>: {{ $pembiayaan->rate }} %
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Angsuran</td>
                                                                                        <td>: Rp.
                                                                                            {{ number_format($angsuran) }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1 mt-1">IDIR</td>
                                                                                        <td><span class="fw-bold">:
                                                                                                {{ $nilai_idir }}
                                                                                                %</span></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Invoice Description ends -->

                                                                <hr class="invoice-spacing" />

                                                                <div class="card-body invoice-padding pb-0">
                                                                    <!-- Header starts -->
                                                                    <div
                                                                        class="d-flex justify-content-center flex-xl-row flex-column invoice-spacing mt-0">
                                                                        <div>
                                                                            <h4>Summary</h4>
                                                                            <hr>
                                                                            <div class="table-responsive mt-1">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th
                                                                                                style="text-align: center">
                                                                                                No</th>
                                                                                            <th
                                                                                                style="text-align: center">
                                                                                                Parameter
                                                                                            </th>
                                                                                            <th
                                                                                                style="text-align: center">
                                                                                                Kategori
                                                                                            </th>
                                                                                            <th
                                                                                                style="text-align: center">
                                                                                                Bobot
                                                                                            </th>
                                                                                            <th
                                                                                                style="text-align: center">
                                                                                                Rating
                                                                                            </th>
                                                                                            <th
                                                                                                style="text-align: center">
                                                                                                Nilai
                                                                                            </th>
                                                                                            <th
                                                                                                style="text-align: center">
                                                                                                Detail
                                                                                            </th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                1</td>
                                                                                            <td>IDIR</td>
                                                                                            <td>
                                                                                                {{ $idir->idir_rendah }}%
                                                                                                -
                                                                                                {{ $idir->idir_tinggi }}%
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $idir->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $rating_idir }}</td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $score_idir }}</td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                <button type="button"
                                                                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#idir">
                                                                                                    <i
                                                                                                        data-feather="eye"></i>
                                                                                                </button>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                2</td>
                                                                                            <td>Cash Pick Up</td>
                                                                                            <td
                                                                                                value="{{ $cashs->id }}">
                                                                                                {{ $cashs->nama_jeniscash }}
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $cashs->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $rating_cashpick }}
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $score_cashpick }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                3</td>
                                                                                            <td>Legalitas Kepemilikkan Rumah
                                                                                            </td>
                                                                                            <td
                                                                                                value="{{ $rumahs->id }}">
                                                                                                {{ $rumahs->nama_jaminan }}
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $rumahs->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $rating_jaminanrumah }}
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $score_jaminanrumah }}
                                                                                            </td>

                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                4</td>
                                                                                            <td>Slik</td>
                                                                                            <td>{{ $slik->kategori }}
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $slik->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $rating_slik }}</td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $score_slik }}</td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                <button type="button"
                                                                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#slik">
                                                                                                    <i
                                                                                                        data-feather="eye"></i>
                                                                                                </button>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                5</td>
                                                                                            <td>Jenis Nasabah</td>
                                                                                            <td
                                                                                                value="{{ $nasabahs->id }}">
                                                                                                {{ $nasabahs->nama_jenisnasabah }}
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $nasabahs->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $rating_jenisnasabah }}
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $score_jenisnasabah }}
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                7</td>
                                                                                            <td>Jaminan Kios</td>
                                                                                            <td>{{ $jaminans->nama_jaminan }}
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $jaminans->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $rating_jaminanlain }}
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $score_jaminanlain }}
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                <button type="button"
                                                                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#jaminankios">
                                                                                                    <i
                                                                                                        data-feather="eye"></i>
                                                                                                </button>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                8</td>
                                                                                            <td>Lama Berdagang</td>
                                                                                            <td
                                                                                                value="{{ $lamas->id }}">
                                                                                                {{ $lamas->nama_lamaberdagang }}
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $lamas->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $rating_lamadagang }}
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $score_lamadagang }}
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                9</td>
                                                                                            <td>Jenis Dagangan</td>
                                                                                            <td
                                                                                                value="{{ $dagangs->id }}">
                                                                                                {{ $dagangs->nama_jenisdagang }}
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $dagangs->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $rating_jenisdagang }}
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $score_jenisdagang }}
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                <button type="button"
                                                                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#fototoko">
                                                                                                    <i
                                                                                                        data-feather="eye"></i>
                                                                                                </button>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                10</td>
                                                                                            <td>Suku Bangsa</td>
                                                                                            <td
                                                                                                value="{{ $sukus->id }}">
                                                                                                {{ $sukus->nama_suku }}
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $sukus->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $rating_sukubangsa }}
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $score_sukubangsa }}
                                                                                            </td>
                                                                                        </tr>

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            @if ($deviasi)
                                                                                <div
                                                                                    class="card-body invoice-padding pt-0">
                                                                                    <div class="mb-0 mt-1 col-md-4">
                                                                                        <button type="button"
                                                                                            class="btn btn-primary"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#dokumendeviasi">Dokumen
                                                                                            Deviasi
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                            @php
                                                                                $total_score = $score_idir + $score_slik + $score_cashpick + $score_jaminanrumah + $score_lamadagang + $score_jenisnasabah + $score_jenisdagang + $score_sukubangsa;
                                                                            @endphp
                                                                            <div class="card-body invoice-padding pt-0">
                                                                                <div class="row invoice-spacing">
                                                                                    <div class="col-xl-8 p-0">
                                                                                        <table>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td class="pe-1">
                                                                                                        <br>Total Nilai
                                                                                                    </td>
                                                                                                    <td><br>:
                                                                                                        {{ $total_score }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="pe-1">
                                                                                                        Status</td>
                                                                                                    <td>:
                                                                                                        @if ($nilai_idir >= 80 || $nilai_idir < 0)
                                                                                                            @if ($nilai_idir >= 80 && $total_score > 3)
                                                                                                                <span
                                                                                                                    class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                                                <small
                                                                                                                    class="text-danger">*IDIR
                                                                                                                    >
                                                                                                                    80%</small>
                                                                                                            @elseif($nilai_idir < 0 && $total_score > 3)
                                                                                                                <span
                                                                                                                    class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                                                <small
                                                                                                                    class="text-danger">*Pengeluaran
                                                                                                                    >
                                                                                                                    Pendapatan</small>
                                                                                                            @elseif($total_score > 2 || $total_score > 3)
                                                                                                                <span
                                                                                                                    class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                                    Ulang</span>
                                                                                                            @else
                                                                                                                <span
                                                                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                                                            @endif
                                                                                                        @else
                                                                                                            @if ($total_score > 3)
                                                                                                                <span
                                                                                                                    class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                                            @elseif($total_score > 2 || $total_score > 3)
                                                                                                                <span
                                                                                                                    class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                                    Ulang</span>
                                                                                                            @else
                                                                                                                <span
                                                                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                                                            @endif
                                                                                                        @endif
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                    <div
                                                                                        class="col-xl-4 p-10 mt-xl-0 mt-2">
                                                                                        <p class="mb-1 fw-bold"><br>Note :
                                                                                        </p>
                                                                                        <table>
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td class="pe-1 mb-2">
                                                                                                        Nilai < 2 </td>
                                                                                                    <td>: <span
                                                                                                            class="fw-bold"><span
                                                                                                                class="badge rounded-pill badge-glow bg-danger">Ditolak</span></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="pe-1 mb-2">
                                                                                                        <br>Nilai > 2
                                                                                                        - 3
                                                                                                    </td>
                                                                                                    <td><br>: <span
                                                                                                            class="fw-bold"><span
                                                                                                                class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                                Ulang</span></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="pe-1 mb-2">
                                                                                                        <br>Nilai > 3
                                                                                                    </td>
                                                                                                    <td><br>: <span
                                                                                                            class="fw-bold"><span
                                                                                                                class="badge rounded-pill badge-glow bg-success">Diterima</span></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Header ends -->
                                                                </div>

                                                                <hr class="invoice-spacing" />

                                                                <div class="card-body invoice-padding pt-0">
                                                                    <div class="row invoice-spacing">
                                                                        <!-- Tombol Aksi -->
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <form action="">
                                                                                    <input type="hidden" name=""
                                                                                        value="" />
                                                                                    <input type="hidden"
                                                                                        name="cek_staff_akad"
                                                                                        value="Dicetak" />
                                                                                    <a type="submit" class="btn w-100"
                                                                                        style="background-color:darkorange; color:wheat
                                                                                    "
                                                                                        href="/staff/cetak/umkm/{{ $pembiayaan->id }}"><i
                                                                                            data-feather="printer"></i>

                                                                                        Cetak
                                                                                        Akad
                                                                                    </a>
                                                                                </form>
                                                                            </div>
                                                                            <br />
                                                                            <p></p>
                                                                            <div class="col-md-6">
                                                                                <form action="">
                                                                                    <input type="hidden" name=""
                                                                                        value="" />
                                                                                    <a class="btn btn-primary w-100"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modalAkadUmkmBatal"><i
                                                                                            data-feather="x"></i>
                                                                                        Akad
                                                                                        Batal
                                                                                    </a>
                                                                                </form>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <form action="/staff/proposal"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    <input type="hidden" name="segmen"
                                                                                        value="UMKM" />
                                                                                    <input type="hidden" name="ao_id"
                                                                                        value="{{ $pembiayaan->AO_id }}" />
                                                                                    <input type="hidden" name="cif"
                                                                                        value="{{ $pembiayaan->nasabahh->id }}" />
                                                                                    <input type="hidden"
                                                                                        name="nama_nasabah"
                                                                                        value="{{ $pembiayaan->nasabahh->nama_nasabah }}" />
                                                                                    <input type="hidden"
                                                                                        name="kode_tabungan"
                                                                                        value="{{ $pembiayaan->id }}" />
                                                                                    <input type="hidden" name="akad"
                                                                                        value="{{ $pembiayaan->akad->nama_akad }}" />
                                                                                    <input type="hidden" name="plafond"
                                                                                        value="{{ $pembiayaan->nominal_pembiayaan }}" />
                                                                                    <input type="hidden"
                                                                                        name="harga_jual"
                                                                                        value="{{ $harga_jual }}" />
                                                                                    <input type="hidden" name="status"
                                                                                        value="Selesai Akad" />
                                                                                    <input type="hidden"
                                                                                        name="umkm_pembiayaan_id"
                                                                                        value="{{ $pembiayaan->id }}" />
                                                                                    <input type="hidden"
                                                                                        name="status_id"
                                                                                        value="9" />
                                                                                    <input type="hidden"
                                                                                        name="cek_staff_akad"
                                                                                        value="Sudah" />
                                                                                    <button type="submit"
                                                                                        class="btn btn-success w-100"><i
                                                                                            data-feather="check"></i>
                                                                                        Selesai
                                                                                        Akad
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /Tombol Aksi -->
                                                                <div class="modal fade" id="modalAkadUmkmBatal"
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
                                                                                <form action="/staff/proposal"
                                                                                    method="POST">
                                                                                    <h5 class="text-center">Tuliskan
                                                                                        Catatan
                                                                                        Mengapa Akad
                                                                                        Batal!</h5>
                                                                                    <br />
                                                                                    <textarea class="form-control" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                                    <br />

                                                                                    @csrf
                                                                                    <input type="hidden" name="segmen"
                                                                                        value="UMKM" />
                                                                                    <input type="hidden" name="ao_id"
                                                                                        value="{{ $pembiayaan->AO_id }}" />
                                                                                    <input type="hidden" name="cif"
                                                                                        value="{{ $pembiayaan->id }}" />
                                                                                    <input type="hidden"
                                                                                        name="nama_nasabah"
                                                                                        value="{{ $pembiayaan->nasabahh->nama_nasabah }}" />
                                                                                    <input type="hidden"
                                                                                        name="kode_tabungan"
                                                                                        value="{{ $pembiayaan->id }}" />
                                                                                    <input type="hidden" name="akad"
                                                                                        value="{{ $pembiayaan->akad->nama_akad }}" />
                                                                                    <input type="hidden" name="plafond"
                                                                                        value="{{ $pembiayaan->nominal_pembiayaan }}" />
                                                                                    <input type="hidden"
                                                                                        name="harga_jual"
                                                                                        value="{{ $harga_jual }}" />
                                                                                    <input type="hidden" name="status"
                                                                                        value="Akad Batal" />
                                                                                    <input type="hidden"
                                                                                        name="umkm_pembiayaan_id"
                                                                                        value="{{ $pembiayaan->id }}" />
                                                                                    <input type="hidden"
                                                                                        name="status_id"
                                                                                        value="10" />
                                                                                    <input type="hidden"
                                                                                        name="cek_staff_akad"
                                                                                        value="Sudah" />
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <button type="button"
                                                                                                class="btn btn-outline-danger w-100"
                                                                                                data-bs-dismiss="modal">Cancel</button>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <button type="submit"
                                                                                                class="btn btn-primary w-100"><i
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

                                                                @if ($deviasi)
                                                                    <div class="modal fade" id="dokumendeviasi"
                                                                        tabindex="-1" aria-labelledby="addNewCardTitle"
                                                                        aria-hidden="true">
                                                                        <div
                                                                            class="modal-dialog modal-dialog-centered modal-lg">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header bg-transparent">
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div
                                                                                    class="modal-body px-sm-5 mx-50 pb-5">
                                                                                    <h3 class="text-center">Lampiran
                                                                                        Dokumen Deviasi
                                                                                    </h3>
                                                                                    <div class="card-body">
                                                                                        <iframe
                                                                                            src="{{ asset('storage/' . $deviasi->dokumen_deviasi) }}"
                                                                                            class="d-block w-100"
                                                                                            height="500"
                                                                                            weight='900'></iframe>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>



                                                            <hr class="invoice-spacing" />


                                                        </div>
                                                    </div>
                                                    <!-- /Invoice -->

                                                    <!-- Invoice Actions -->
                                                    <div class="tab-pane" id="identitas-pribadi" role="tabpanel"
                                                        aria-labelledby="profile-tab-justified">
                                                        <!-- post 1 -->
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">{{ $fotodiri->kategori }}
                                                                        </h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $fotodiri->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $fotodiri->foto) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">{{ $fotoktp->kategori }}</h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $fotoktp->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $fotoktp->foto) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">
                                                                            {{ $fotodiribersamaktp->kategori }}</h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $fotodiribersamaktp->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $fotodiribersamaktp->foto) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">{{ $fotokk->kategori }}</h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $fotokk->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $fotokk->foto) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="tab-pane" id="keuangan"
                                                        role="tabpanel"aria-labelledby="messages-tab-justified">

                                                        @if ($nota)
                                                            <!-- post 1 -->
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div
                                                                        class="d-flex justify-content-start align-items-center mb-1">
                                                                        <div>
                                                                            <h6 class="mb-0">
                                                                                {{ $nota->kategori }}
                                                                            </h6>
                                                                            <small class="text-muted">Diupload Pada :
                                                                                {{ $nota->created_at->diffForhumans() }}</small>
                                                                        </div>
                                                                    </div>
                                                                    <!-- post img -->
                                                                    <img class="img-fluid rounded mb-75"
                                                                        src="{{ asset('storage/' . $nota->foto) }}"
                                                                        alt="avatar img" />
                                                                    <!--/ post img -->
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="tab-pane" id="ideb" role="tabpanel"
                                                        aria-labelledby="settings-tab-justified">
                                                        {{-- <iframe src="{{ asset('storage/' . $ideb->foto) }}" frameborder="0"
                                                    width="1000" height="900"></iframe> --}}
                                                        <iframe
                                                            src="{{ asset('storage/' . $pembiayaan->dokumen_keuangan) }}"
                                                            class="d-block w-100" height='500'
                                                            weight='800'></iframe>
                                                    </div>
                                                    <div class="tab-pane" id="legalitas-agunan"
                                                        role="tabpanel"aria-labelledby="messages-tab-justified">
                                                        @foreach ($jaminanusahas as $jaminan)
                                                            <!-- post 1 -->
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div
                                                                        class="d-flex justify-content-start align-items-center mb-1">
                                                                        <div>
                                                                            <h6 class="mb-0"> Jaminan :
                                                                                {{ $jaminans->nama_jaminan }}
                                                                            </h6>
                                                                            <h6 class="mb-0"><br> KTB :
                                                                                {{ $jaminan->no_ktb }}
                                                                            </h6>
                                                                            <small class="text-muted">Diupload Pada :
                                                                                {{ $jaminan->created_at->diffForhumans() }}</small>
                                                                        </div>
                                                                    </div>
                                                                    <!-- post img -->
                                                                    <img class="img-fluid rounded mb-75"
                                                                        src="{{ asset('storage/' . $jaminan->dokumenktb) }}"
                                                                        alt="avatar img" />
                                                                    <!--/ post img -->
                                                                </div>
                                                            </div>
                                                            <!--/ post 1 -->
                                                        @endforeach
                                                        @foreach ($jaminanlainusahas as $jaminanlainnya)
                                                            <!-- post 1 -->
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div
                                                                        class="d-flex justify-content-start align-items-center mb-1">
                                                                        <div>

                                                                            <small class="text-muted">Diupload Pada :
                                                                                {{ $jaminanlainnya->created_at->diffForhumans() }}</small>
                                                                        </div>
                                                                    </div>
                                                                    <!-- post img -->
                                                                    <img class="img-fluid rounded mb-75"
                                                                        src="{{ asset('storage/' . $jaminanlainnya->dokumen_jaminan) }}"
                                                                        alt="avatar img" />
                                                                    <!--/ post img -->
                                                                </div>
                                                            </div>
                                                            <!--/ post 1 -->
                                                        @endforeach
                                                    </div>

                                                    <div class="tab-pane" id="timeline" role="tabpanel"
                                                        aria-labelledby="settings-tab-justified">
                                                        <div
                                                            class="col-xl-12 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
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
                                                                                } elseif ($arr == $banyak_history) {
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
                                                                                            value="{{ $timeline->statushistory->id }}, {{ $timeline->jabatan->jabatan_id }}">
                                                                                            {{ $timeline->statushistory->keterangan }}
                                                                                            {{ $timeline->jabatan->keterangan }}
                                                                                        </h6>
                                                                                        <span class="timeline-event-time"
                                                                                            style="text-align: right">{{ $timeline->created_at->isoformat('dddd, D MMMM Y') }}
                                                                                            <br>{{ $timeline->created_at->isoformat('HH:mm:ss') }}
                                                                                        </span>
                                                                                    </div>
                                                                                    @if ($timeline->catatan)
                                                                                        <p value="{{ $timeline->id }}">
                                                                                            <br>Catatan :
                                                                                            {{ $timeline->catatan }}
                                                                                        <p>
                                                                                    @endif
                                                                                    @if ($arr == -1)
                                                                                    @else
                                                                                        <span
                                                                                            class="timeline-event-time">Waktu
                                                                                            Diproses :
                                                                                            {{ $selisih }}</span>
                                                                                    @endif
                                                                                    {{-- <span
                                                                                        class="timeline-event-time">{{ $timeline->created_at->diffForHumans() }}</span> --}}
                                                                                    {{-- <p>{{ $timeline->created_at->diffForHumans() }}</p> --}}
                                                                                    <div
                                                                                        class="d-flex flex-row align-items-center">

                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        @endforeach
                                                                        <hr class="invoice-spacing" />
                                                                        <p class="fw-bold"> Total SLA =
                                                                            {{ $totalwaktu }}</p>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Invoice Actions -->
                                                </div>
                            </section>
                            <!-- Idir -->
                            <div class="modal fade" id="idir" tabindex="-1" aria-labelledby="addNewCardTitle"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-transparent">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-sm-5 mx-50 pb-5">
                                            <h3 class="text-center">Nilai IDIR </h3>
                                            <hr class="invoice-spacing" />
                                            <div class="card-body">
                                                <div class="col-md-12 d-flex order-md-2 order-1">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="pe-1">Harga Beli</td>
                                                                <td><span class="fw-bold">: Rp.
                                                                        {{ number_format($pembiayaan->nominal_pembiayaan) }}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pe-1">Harga Jual</td>
                                                                <td>: Rp. {{ number_format($harga_jual) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pe-1">Jangka Waktu</td>
                                                                <td>: {{ $pembiayaan->tenor }} bulan</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pe-1">Equivalen Rate</td>
                                                                <td>: {{ $pembiayaan->rate }} %</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pe-1">Angsuran</td>
                                                                <td>: Rp. {{ number_format($angsuran) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pe-1 mt-1">IDIR</td>
                                                                <td><span class="fw-bold">:
                                                                        {{ $nilai_idir }}
                                                                        %</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--akhir idir -->

                            <!-- Slik -->
                            <div class="modal fade" id="fototoko" tabindex="-1" aria-labelledby="addNewCardTitle"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-transparent">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-sm-12 mx-50 pb-5">
                                            <h3 class="text-center">Jenis Dagangan </h3>
                                            <hr class="invoice-spacing" />
                                            <div class="card-body">
                                                <div class="col-md-12 d-flex order-md-2 order-1">
                                                    <img src="{{ asset('storage/' . $fototoko->foto) }}"
                                                        class="d-block w-100" height='500' weight='800'>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--akhir Slik -->

                            <!-- Slik -->
                            <div class="modal fade" id="slik" tabindex="-1" aria-labelledby="addNewCardTitle"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-transparent">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-sm-12 mx-50 pb-5">
                                            <h3 class="text-center">IDEB </h3>
                                            <hr class="invoice-spacing" />
                                            <div class="card-body">
                                                <div class="col-md-12 d-flex order-md-2 order-1">
                                                    <iframe
                                                        src="{{ asset('storage/' . $pembiayaan->dokumen_keuangan) }}"
                                                        class="d-block w-100" height='500' weight='800'></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--akhir Slik -->


                            <!-- Slik -->
                            <div class="modal fade" id="jaminankios" tabindex="-1"
                                aria-labelledby="addNewCardTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-transparent">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-sm-12 mx-50 pb-5">
                                            <h3 class="text-center">Jaminan Kios </h3>
                                            <hr class="invoice-spacing" />
                                            <div class="card-body">
                                                <div class="col-md-12 d-flex order-md-2 order-1">
                                                    <img src="{{ asset('storage/' . $jaminan->dokumenktb) }}"
                                                        class="d-block w-100" height='500' weight='800'>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--akhir Slik -->

                        </div>

                    </div>
                </div>
            </div>
        @elseif ($segmen == 'SKPD')
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Proposal Pengajuan Pembiayaan SKPD</h4>
                </div>
                <div class="card-body">
                    <div class="content-body">
                        <section id="nav-filled">
                            <div class="row match-height">

                                <!-- Justified Tabs starts -->
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab-justified"
                                                        data-bs-toggle="tab" href="#proposal" role="tab"
                                                        aria-controls="home-just" aria-selected="true">Proposal</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab-justified"
                                                        data-bs-toggle="tab" href="#identitas-pribadi" role="tab"
                                                        aria-controls="profile-just" aria-selected="true">Identitas
                                                        Pribadi</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="messages-tab-justified"
                                                        data-bs-toggle="tab" href="#legalitas-agunan" role="tab"
                                                        aria-controls="messages-just" aria-selected="false">Legalitas
                                                        Agunan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="settings-tab-justified"
                                                        data-bs-toggle="tab" href="#legalitas-pekerjaan"
                                                        role="tab" aria-controls="settings-just"
                                                        aria-selected="false">Legalitas
                                                        Pekerjaan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="settings-tab-justified"
                                                        data-bs-toggle="tab" href="#keuangan" role="tab"
                                                        aria-controls="settings-just" aria-selected="false">Keuangan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="settings-tab-justified"
                                                        data-bs-toggle="tab" href="#ideb" role="tab"
                                                        aria-controls="settings-just" aria-selected="false">IDEB</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="settings-tab-justified"
                                                        data-bs-toggle="tab" href="#timeline" role="tab"
                                                        aria-controls="settings-just" aria-selected="false">Timeline</a>
                                                </li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content pt-1">
                                                <div class="tab-pane active" id="proposal" role="tabpanel"
                                                    aria-labelledby="home-tab-justified">
                                                    <!-- proposal -->
                                                    <div class="col-xl-12 col-md-8 col-12">
                                                        <div class="card invoice-preview-card">


                                                            <!-- Summary Identitas Nasabah -->
                                                            <div class="card-body invoice-padding pt-0">
                                                                <div class="row invoice-spacing">
                                                                    <div class="col-xl-8 p-0">
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="pe-1">Tanggal Pengajuan
                                                                                    </td>
                                                                                    <td>:
                                                                                        {{ strtoupper(date('d F Y', strtotime($pembiayaan->tanggal_pengajuan))) }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1">Penggunaan</td>
                                                                                    <td>:
                                                                                        {{ strtoupper($pembiayaan->jenis_penggunaan->jenis_penggunaan) }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1">Sektor</td>
                                                                                    <td>:
                                                                                        {{ strtoupper($pembiayaan->sektor->nama_sektor_ekonomi) }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1">Akad</td>
                                                                                    <td>:
                                                                                        {{ strtoupper($pembiayaan->akad->nama_akad) }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1">Nama Nasabah</td>
                                                                                    <td><span class="fw-bold">:
                                                                                            {{ strtoupper($pembiayaan->nasabah->nama_nasabah) }}</span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1">No. Telepon</td>
                                                                                    <td>:
                                                                                        {{ $pembiayaan->nasabah->no_telp }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1">Alamat</td>
                                                                                    <td>:
                                                                                        {{ strtoupper($pembiayaan->nasabah->alamat) }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1">No. KTP</td>
                                                                                    <td>:
                                                                                        {{ $pembiayaan->nasabah->no_ktp }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1">Tempat, Tanggal
                                                                                        Lahir</td>
                                                                                    <td>:
                                                                                        {{ strtoupper($pembiayaan->nasabah->tempat_lahir) }},
                                                                                        {{ strtoupper(date('d F Y', strtotime($pembiayaan->nasabah->tgl_lahir))) }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1">Kantor/Dinas</td>
                                                                                    <td>:
                                                                                        {{ strtoupper($pembiayaan->instansi->nama_instansi) }}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                                                        <h6 class="mb-1">Pendapatan :</h6>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="pe-1">Gaji Pokok</td>
                                                                                    <td><span class="fw-bold">: Rp.
                                                                                            {{ number_format($pembiayaan->gaji_pokok) }}</span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1">Pendapatan Lainnya
                                                                                    </td>
                                                                                    <td>: Rp.
                                                                                        {{ number_format($pembiayaan->pendapatan_lainnya) }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1">Gaji TPP</td>
                                                                                    <td>: Rp.
                                                                                        {{ number_format($pembiayaan->gaji_tpp) }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1 mt-2">Total Pendapatan
                                                                                    </td>
                                                                                    <td><span class="fw-bold">: Rp.
                                                                                            {{ number_format($pembiayaan->pendapatan_lainnya + $pembiayaan->gaji_pokok + $pembiayaan->gaji_tpp) }}</span>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <hr>
                                                                        <h6 class="mb-1 mt-2">Pengeluaran :</h6>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="pe-1">Cicilan Bank</td>
                                                                                    <td><span class="fw-bold">: Rp.
                                                                                            {{ number_format($cicilan) }}</span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1">Potongan Lainnya
                                                                                    </td>
                                                                                    <td>: Rp.
                                                                                        {{ number_format($pembiayaan->potongan_lainnya) }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1">Kebutuhan Keluarga
                                                                                    </td>
                                                                                    <td>: Rp.
                                                                                        {{ number_format($biayakeluarga) }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1 mt-1">Total
                                                                                        Pengeluaran
                                                                                    </td>
                                                                                    <td><span class="fw-bold">: Rp.
                                                                                            {{ number_format($cicilan + $pembiayaan->potongan_lainnya + $biayakeluarga) }}</span>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <hr>
                                                                        <h6>Sisa Pendapatan Bersih : Rp.
                                                                            {{ number_format($pendapatan_bersih) }}</h6>
                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/ Summary Identitas Nasabah -->

                                                            <!-- Informasi Debitur Nasabah -->
                                                            <div class="table-responsive">
                                                                <h4>Informasi Debitur Nasabah</h4>
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="text-align: center;  vertical-align:middle;; width: 5%;"
                                                                                class="py-1">No</th>
                                                                            <th style="text-align: center;  vertical-align:middle;"
                                                                                class="py-1">Nama
                                                                                Bank</th>
                                                                            <th style="text-align: center;  vertical-align:middle;"
                                                                                class="py-1">
                                                                                Plafond
                                                                            </th>
                                                                            <th style="text-align: center;  vertical-align:middle;"
                                                                                class="py-1">
                                                                                Outstanding</th>
                                                                            <th style="text-align: center;  vertical-align:middle;"
                                                                                class="py-1">
                                                                                Tenor
                                                                            </th>
                                                                            <th style="text-align: center;  vertical-align:middle;"
                                                                                class="py-1">
                                                                                Margin
                                                                            </th>
                                                                            <th style="text-align: center;  vertical-align:middle;"
                                                                                class="py-1">
                                                                                Angsuran
                                                                            </th>
                                                                            <th style="text-align: center;  vertical-align:middle;"
                                                                                class="py-1">
                                                                                Agunan
                                                                            </th>
                                                                            <th style="text-align: center;  vertical-align:middle;"
                                                                                class="py-1">Kol
                                                                                Tertinggi</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($ideps as $idep)
                                                                            @php
                                                                                // if ($idep) {
                                                                                //     $margin = $idep->margin / 12 / 100;
                                                                                //     $plafond = $idep->plafond * $margin * $idep->tenor + $idep->plafond;
                                                                                //     $angsuran = $plafond / $idep->tenor;
                                                                                // }
                                                                            @endphp
                                                                            <tr>
                                                                                <td style="text-align: center">
                                                                                    {{ $loop->iteration }}</td>
                                                                                <td>{{ $idep->nama_bank }}</td>
                                                                                <td>Rp.
                                                                                    {{ number_format($idep->plafond) }}
                                                                                </td>
                                                                                <td>Rp.
                                                                                    {{ number_format($idep->outstanding) }}
                                                                                </td>
                                                                                <td style="text-align: center">
                                                                                    {{ $idep->tenor }}
                                                                                </td>
                                                                                <td style="text-align: center">
                                                                                    {{ number_format($idep->margin) }}%
                                                                                </td>
                                                                                <td>Rp.
                                                                                    {{ number_format($idep->angsuran) }}
                                                                                </td>
                                                                                <td style="text-align: center">
                                                                                    {{ $idep->agunan }}
                                                                                </td>
                                                                                <td style="text-align: center">
                                                                                    {{ $idep->kol_tertinggi }}</td>
                                                                            </tr>
                                                                        @endforeach

                                                                    </tbody>
                                                                </table>
                                                                <hr style="margin-top:-1px;" />
                                                            </div>
                                                            @if ($cekcicilanpasangan > 0)
                                                                <br>
                                                                <div class="table-responsive">
                                                                    <small>Informasi Debitur Pasangan Nasabah</small>
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="text-align: center; width: 5%;"
                                                                                    class="py-1">No</th>
                                                                                <th style="text-align: center"
                                                                                    class="py-1">Nama
                                                                                    Bank</th>
                                                                                <th style="text-align: center"
                                                                                    class="py-1">
                                                                                    Plafond
                                                                                </th>
                                                                                <th style="text-align: center"
                                                                                    class="py-1">
                                                                                    Outstanding</th>
                                                                                <th style="text-align: center"
                                                                                    class="py-1">
                                                                                    Tenor
                                                                                </th>
                                                                                <th style="text-align: center"
                                                                                    class="py-1">
                                                                                    Margin
                                                                                </th>
                                                                                <th style="text-align: center"
                                                                                    class="py-1">
                                                                                    Angsuran
                                                                                </th>
                                                                                <th style="text-align: center"
                                                                                    class="py-1">
                                                                                    Agunan
                                                                                </th>
                                                                                <th style="text-align: center"
                                                                                    class="py-1">Kol
                                                                                    Tertinggi</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($ideppasangans as $ideppasangan)
                                                                                @php
                                                                                    // if ($ideppasangan) {
                                                                                    //     $margin = $ideppasangan->margin / 12 / 100;
                                                                                    //     $plafond = $ideppasangan->plafond * $margin * $ideppasangan->tenor + $ideppasangan->plafond;
                                                                                    //     $angsuran = $plafond / $ideppasangan->tenor;
                                                                                    // }
                                                                                @endphp
                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        {{ $loop->iteration }}</td>
                                                                                    <td>{{ $ideppasangan->nama_bank }}
                                                                                    </td>
                                                                                    <td>Rp.
                                                                                        {{ number_format($ideppasangan->plafond) }}
                                                                                    </td>
                                                                                    <td>Rp.
                                                                                        {{ number_format($ideppasangan->outstanding) }}
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $ideppasangan->tenor }}
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ number_format($ideppasangan->margin) }}%
                                                                                    </td>
                                                                                    <td>Rp.
                                                                                        {{ number_format($ideppasangan->angsuran) }}
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $ideppasangan->agunan }}
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $ideppasangan->kol_tertinggi }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            @endif

                                                            <div class="card-body invoice-padding pb-0">
                                                                <div class="row invoice-sales-total-wrapper">
                                                                    <div class="col-md-8 order-md-1 order-2 mt-md-0 mt-3">
                                                                        <p class="card-text mb-0">
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-4 d-flex order-md-2 order-1">
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="pe-1">Harga Beli</td>
                                                                                    <td><span class="fw-bold">: Rp.
                                                                                            {{ number_format($pembiayaan->nominal_pembiayaan) }}</span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1">Harga Jual</td>
                                                                                    <td>: Rp.
                                                                                        {{ number_format($harga_jual) }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1">Jangka Waktu</td>
                                                                                    <td>: {{ $tenor }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1">Equivalen Rate</td>
                                                                                    <td>: {{ $pembiayaan->rate }} %</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1">Angsuran</td>
                                                                                    <td>: Rp.
                                                                                        {{ number_format($angsuran1) }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="pe-1 mt-1">DSR</td>
                                                                                    <td><span class="fw-bold">:
                                                                                            {{ $nilai_dsr1 }}
                                                                                            %</span></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/ Informasi Debitur Nasabah -->

                                                            <hr class="invoice-spacing" />

                                                            <!-- Summary Score -->
                                                            <div class="card-body invoice-padding pb-0">
                                                                <div
                                                                    class="d-flex justify-content-center flex-md-row flex-column invoice-spacing mt-0">
                                                                    <div>
                                                                        <h4>Summary</h4>
                                                                        <hr>
                                                                        <div class="table-responsive mt-1">
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th
                                                                                            style="text-align: center; vertical-align:middle;">
                                                                                            No</th>
                                                                                        <th
                                                                                            style="text-align: center; vertical-align:middle;">
                                                                                            Parameter
                                                                                        </th>
                                                                                        <th
                                                                                            style="text-align: center; vertical-align:middle;">
                                                                                            Kategori
                                                                                        </th>
                                                                                        <th
                                                                                            style="text-align: center; vertical-align:middle;">
                                                                                            Bobot
                                                                                        </th>
                                                                                        <th
                                                                                            style="text-align: center; vertical-align:middle;">
                                                                                            Rating
                                                                                        </th>
                                                                                        <th
                                                                                            style="text-align: center; vertical-align:middle;">
                                                                                            Nilai
                                                                                        </th>
                                                                                        <th
                                                                                            style="text-align: center; vertical-align:middle;">
                                                                                            Detail
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="text-align: center">1
                                                                                        </td>
                                                                                        <td>Konfirmasi Bendahara</td>
                                                                                        <td></td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $bendahara->bobot * 100 }}%
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $rating_bendahara }}</td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $nilai_bendahara }}</td>
                                                                                        <td style="text-align: center">
                                                                                            <button type="button"
                                                                                                class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#modalKonfirmasiBendahara">
                                                                                                <i data-feather="eye"></i>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="text-align: center">2
                                                                                        </td>
                                                                                        <td>DSR</td>
                                                                                        <td>{{ $dsr->score_terendah }}% -
                                                                                            {{ $dsr->score_tertinggi }}%
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $dsr->bobot * 100 }}%</td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $rating_dsr }}</td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $nilai_dsr }}</td>
                                                                                        <td style="text-align: center">
                                                                                            <button type="button"
                                                                                                class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#dsr">
                                                                                                <i data-feather="eye"></i>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    @if ($ideps->count() > 0)
                                                                                        <tr>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                3
                                                                                            </td>
                                                                                            <td>Slik</td>
                                                                                            <td>Kol Tertinggi
                                                                                                {{ $slik->kol }}
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $slik->bobot * 100 }}%
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $rating_slik }}</td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $nilai_slik }}</td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                <button type="button"
                                                                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#slik">
                                                                                                    <i
                                                                                                        data-feather="eye"></i>
                                                                                                </button>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @else
                                                                                        @php
                                                                                            $bobot_ta_slik = 0.2;
                                                                                            $rating_ta_slik = 4;
                                                                                            $nilai_slik = $bobot_ta_slik * $rating_ta_slik;
                                                                                        @endphp
                                                                                        <tr>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                3
                                                                                            </td>
                                                                                            <td>Slik</td>
                                                                                            <td>Tidak Ada Slik
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $bobot_ta_slik * 100 }}%
                                                                                            </td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $rating_ta_slik }}</td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                {{ $nilai_slik }}</td>
                                                                                            <td
                                                                                                style="text-align: center">
                                                                                                <button type="button"
                                                                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#slik">
                                                                                                    <i
                                                                                                        data-feather="eye"></i>
                                                                                                </button>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endif
                                                                                    <tr>
                                                                                        <td style="text-align: center">4
                                                                                        </td>
                                                                                        <td>Jaminan</td>
                                                                                        <td>{{ $jaminan->nama_jaminan }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $jaminan->bobot * 100 }}%
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $rating_jaminan }}</td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $nilai_jaminan }}</td>
                                                                                        <td style="text-align: center">
                                                                                            <button type="button"
                                                                                                class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#modalJaminanSkpd">
                                                                                                <i data-feather="eye"></i>
                                                                                            </button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="text-align: center">5
                                                                                        </td>
                                                                                        <td>Jenis Nasabah</td>
                                                                                        <td>{{ $jenis_nasabah }}</td>
                                                                                        <td style="text-align: center">
                                                                                            {{ 0.1 * 100 }}%</td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $rating_nasabah }}</td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $nilai_nasabah }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="text-align: center">6
                                                                                        </td>
                                                                                        <td>Instansi</td>
                                                                                        <td>{{ $instansi->nama_instansi }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $instansi->bobot * 100 }}%
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $rating_instansi }}</td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $nilai_instansi }}</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <hr style="margin-top:-1px;" />
                                                                        </div>
                                                                        @if ($deviasi)
                                                                            <div class="card-body invoice-padding pt-0">
                                                                                <div class="mb-0 mt-1 col-md-4">
                                                                                    <button type="button"
                                                                                        class="btn btn-primary"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#dokumendeviasi">Dokumen
                                                                                        Deviasi
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        @php
                                                                            if ($deviasi) {
                                                                                $total_score = $nilai_bendahara + $nilai_dsr + $nilaiSlikDeviasi + $nilai_jaminan + $nilai_nasabah + $nilai_instansi;
                                                                            } else {
                                                                                $total_score = $nilai_bendahara + $nilai_dsr + $nilai_slik + $nilai_jaminan + $nilai_nasabah + $nilai_instansi;
                                                                            }
                                                                        @endphp

                                                                        <div class="card-body invoice-padding pt-0">
                                                                            <div class="row invoice-spacing">
                                                                                <div class="col-xl-7 p-0">
                                                                                    <table>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="pe-1">Total
                                                                                                    Nilai
                                                                                                </td>
                                                                                                <td>: {{ $total_score }}
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1">Status
                                                                                                </td>
                                                                                                <td>:
                                                                                                    @if ($nilai_dsr >= 40 || $nilai_dsr < 0)
                                                                                                        @if ($nilai_dsr >= 40 && $total_score > 3.01)
                                                                                                            <span
                                                                                                                class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                                            <small
                                                                                                                class="text-danger">*DSR
                                                                                                                >
                                                                                                                80%</small>
                                                                                                        @elseif($nilai_dsr < 0 && $total_score > 3.01)
                                                                                                            <span
                                                                                                                class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                                            <small
                                                                                                                class="text-danger">*Pengeluaran
                                                                                                                >
                                                                                                                Pendapatan</small>
                                                                                                        @elseif($total_score > 2 || $total_score < 3)
                                                                                                            <span
                                                                                                                class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                                Ulang</span>
                                                                                                        @else
                                                                                                            <span
                                                                                                                class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                                                        @endif
                                                                                                    @else
                                                                                                        @if ($total_score > 3.01)
                                                                                                            <span
                                                                                                                class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                                        @elseif($total_score > 2 || $total_score > 3.01)
                                                                                                            <span
                                                                                                                class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                                Ulang</span>
                                                                                                        @else
                                                                                                            <span
                                                                                                                class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                                                        @endif
                                                                                                    @endif

                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div class="col-xl-5 p-0 mt-xl-0 mt-2">
                                                                                    <p class="mb-1 fw-bold">Note :</p>
                                                                                    <table>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class="pe-1 mb-2">
                                                                                                    Nilai < 2 </td>
                                                                                                <td>: <span
                                                                                                        class="fw-bold"><span
                                                                                                            class="badge rounded-pill badge-glow bg-danger">Ditolak</span></span>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1 mb-2">
                                                                                                    <br>Nilai > 2
                                                                                                    - 3
                                                                                                </td>
                                                                                                <td><br>: <span
                                                                                                        class="fw-bold"><span
                                                                                                            class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                            Ulang</span></span>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="pe-1 mb-2">
                                                                                                    <br>Nilai > 3
                                                                                                </td>
                                                                                                <td><br>: <span
                                                                                                        class="fw-bold"><span
                                                                                                            class="badge rounded-pill badge-glow bg-success">Diterima</span></span>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Invoice Note ends -->
                                                                    </div>
                                                                </div>
                                                                <!-- Header ends -->
                                                            </div>
                                                            <!--/ Summary Score -->

                                                            <hr class="invoice-spacing" />
                                                            <!-- Invoice Note starts -->
                                                            <div class="card-body invoice-padding pt-0">
                                                                <div class="row invoice-spacing">
                                                                    <!-- Tombol Aksi -->
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <form action="">
                                                                                <input type="hidden" name=""
                                                                                    value="" />
                                                                                <input type="hidden"
                                                                                    name="cek_staff_akad"
                                                                                    value="Dicetak" />
                                                                                <a type="submit" class="btn w-100"
                                                                                    style="background-color:darkorange; color:wheat
                                                                                "
                                                                                    href="/staff/cetak/skpd/{{ $pembiayaan->id }}"><i
                                                                                        data-feather="printer"></i>

                                                                                    Cetak
                                                                                    Akad
                                                                                </a>
                                                                            </form>
                                                                        </div>
                                                                        <br />
                                                                        <p></p>
                                                                        <div class="col-md-6">
                                                                            <form action="">
                                                                                <input type="hidden" name=""
                                                                                    value="" />
                                                                                <a class="btn btn-primary w-100"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#modalAkadSkpdBatal"><i
                                                                                        data-feather="x"></i> Akad
                                                                                    Batal
                                                                                </a>
                                                                            </form>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <form action="/staff/proposal"
                                                                                method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="segmen"
                                                                                    value="SKPD" />
                                                                                <input type="hidden" name="ao_id"
                                                                                    value="{{ $pembiayaan->user_id }}" />
                                                                                <input type="hidden" name="cif"
                                                                                    value="{{ $pembiayaan->nasabah->id }}" />
                                                                                <input type="hidden"
                                                                                    name="nama_nasabah"
                                                                                    value="{{ $pembiayaan->nasabah->nama_nasabah }}" />
                                                                                <input type="hidden"
                                                                                    name="kode_tabungan"
                                                                                    value="{{ $pembiayaan->id }}" />
                                                                                <input type="hidden" name="plafond"
                                                                                    value="{{ $pembiayaan->nominal_pembiayaan }}" />
                                                                                <input type="hidden" name="harga_jual"
                                                                                    value="{{ $harga_jual }}" />
                                                                                <input type="hidden" name="status"
                                                                                    value="Selesai Akad" />
                                                                                <input type="hidden" name="akad"
                                                                                    value="{{ $pembiayaan->akad->nama_akad }}" />
                                                                                <input type="hidden"
                                                                                    name="skpd_pembiayaan_id"
                                                                                    value="{{ $pembiayaan->id }}" />
                                                                                <input type="hidden" name="status_id"
                                                                                    value="9" />
                                                                                <input type="hidden"
                                                                                    name="cek_staff_akad"
                                                                                    value="Sudah" />
                                                                                <button type="submit"
                                                                                    class="btn btn-success w-100"><i
                                                                                        data-feather="check"></i>
                                                                                    Selesai
                                                                                    Akad
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Modal Batal-->
                                                                    <div class="modal fade" id="modalAkadSkpdBatal"
                                                                        tabindex="-1" aria-labelledby="addNewCardTitle"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header bg-transparent">
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"
                                                                                        aria-label="Close"></button>
                                                                                </div>
                                                                                <div
                                                                                    class="modal-body px-sm-5 mx-50 pb-5">
                                                                                    <form action="/staff/proposal"
                                                                                        method="POST">
                                                                                        <h5 class="text-center">Tuliskan
                                                                                            catatan
                                                                                            mengapa akad
                                                                                            batal!</h5>
                                                                                        <br />
                                                                                        <textarea class="form-control" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                                        <br />

                                                                                        @csrf

                                                                                        <input type="hidden"
                                                                                            name="segmen"
                                                                                            value="SKPD" />
                                                                                        <input type="hidden"
                                                                                            name="ao_id"
                                                                                            value="{{ $pembiayaan->user_id }}" />
                                                                                        <input type="hidden"
                                                                                            name="cif"
                                                                                            value="{{ $pembiayaan->id }}" />
                                                                                        <input type="hidden"
                                                                                            name="nama_nasabah"
                                                                                            value="{{ $pembiayaan->nasabah->nama_nasabah }}" />
                                                                                        <input type="hidden"
                                                                                            name="kode_tabungan"
                                                                                            value="{{ $pembiayaan->id }}" />
                                                                                        <input type="hidden"
                                                                                            name="akad"
                                                                                            value="{{ $pembiayaan->akad->nama_akad }}" />
                                                                                        <input type="hidden"
                                                                                            name="plafond"
                                                                                            value="{{ $pembiayaan->nominal_pembiayaan }}" />
                                                                                        <input type="hidden"
                                                                                            name="harga_jual"
                                                                                            value="{{ $harga_jual }}" />
                                                                                        <input type="hidden"
                                                                                            name="status"
                                                                                            value="Akad Batal" />
                                                                                        <input type="hidden"
                                                                                            name="skpd_pembiayaan_id"
                                                                                            value="{{ $pembiayaan->id }}" />
                                                                                        <input type="hidden"
                                                                                            name="status_id"
                                                                                            value="10" />
                                                                                        <input type="hidden"
                                                                                            name="cek_staff_akad"
                                                                                            value="Sudah" />
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <button type="button"
                                                                                                    class="btn btn-outline-danger w-100"
                                                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <button type="submit"
                                                                                                    class="btn btn-primary w-100"><i
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
                                                                </div>
                                                            </div>

                                                            @if ($deviasi)
                                                                <div class="modal fade" id="dokumendeviasi"
                                                                    tabindex="-1" aria-labelledby="addNewCardTitle"
                                                                    aria-hidden="true">
                                                                    <div
                                                                        class="modal-dialog modal-dialog-centered modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header bg-transparent">
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                                <h3 class="text-center">Lampiran Dokumen
                                                                                    Deviasi
                                                                                </h3>
                                                                                <div class="card-body">
                                                                                    <iframe
                                                                                        src="{{ asset('storage/' . $deviasi->dokumen_deviasi) }}"
                                                                                        class="d-block w-100"
                                                                                        height="500"
                                                                                        weight='900'></iframe>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!-- /proposal -->
                                                </div>
                                                <div class="tab-pane" id="identitas-pribadi" role="tabpanel"
                                                    aria-labelledby="profile-tab-justified">
                                                    @foreach ($fotos as $foto)
                                                        <!-- post 1 -->
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">{{ $foto->kategori }}</h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $foto->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $foto->foto) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>
                                                        <!--/ post 1 -->
                                                    @endforeach
                                                </div>
                                                <div class="tab-pane" id="legalitas-agunan" role="tabpanel"
                                                    aria-labelledby="messages-tab-justified">
                                                    @foreach ($jaminans as $jaminan)
                                                        <!-- post 1 -->
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">
                                                                            {{ $jaminan->jenis_jaminan->nama_jaminan }}
                                                                        </h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $jaminan->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $jaminan->dokumen_jaminan) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>
                                                        <!--/ post 1 -->
                                                    @endforeach
                                                    @foreach ($jaminanlainnyas as $jaminanlainnya)
                                                        <!-- post 1 -->
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">
                                                                            {{ $jaminanlainnya->nama_jaminan_lainnya }}
                                                                        </h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $jaminanlainnya->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $jaminanlainnya->dokumen_jaminan_lainnya) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>
                                                        <!--/ post 1 -->
                                                    @endforeach
                                                </div>
                                                <div class="tab-pane" id="legalitas-pekerjaan" role="tabpanel"
                                                    aria-labelledby="settings-tab-justified">
                                                    @foreach ($skpengangkatans as $skpengangkatan)
                                                        <!-- post 1 -->
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">
                                                                            SK Pengangkatan
                                                                        </h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $skpengangkatan->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $skpengangkatan->sk_pengangkatan) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>
                                                        <!--/ post 1 -->
                                                    @endforeach
                                                </div>
                                                <div class="tab-pane" id="keuangan" role="tabpanel"
                                                    aria-labelledby="settings-tab-justified">
                                                    <embed type="application/pdf"
                                                        src="{{ asset('storage/' . $pembiayaan->dokumen_keuangan) }}"
                                                        width="1000" height="900">
                                                    <embed type="application/pdf"
                                                        src="{{ asset('storage/' . $pembiayaan->dokumen_slip_gaji) }}"
                                                        width="1000" height="900">
                                                </div>
                                                <div class="tab-pane" id="ideb" role="tabpanel"
                                                    aria-labelledby="settings-tab-justified">
                                                    <center>
                                                        <h4>IDEB Pemohon</h4>
                                                    </center>
                                                    <iframe src="{{ asset('storage/' . $ideb->foto) }}"
                                                        class="d-block w-100" height="600"></iframe>
                                                    @if ($pembiayaan->nasabah->skpd_status_perkawinan_id == 2)
                                                        <br /> <br />
                                                        <hr />
                                                        <center>
                                                            <h4>IDEB Pasangan</h4>
                                                        </center>
                                                        @if ($idebPasangan)
                                                            <iframe src="{{ asset('storage/' . $idebPasangan->foto) }}"
                                                                class="d-block w-100" height="600"></iframe>
                                                        @else
                                                            <center>
                                                                <br />
                                                                <p>IDEB Pasangan tidak ada/belum di-upload</p>
                                                            </center>
                                                        @endif
                                                    @endif
                                                </div>

                                                <div class="tab-pane" id="timeline" role="tabpanel"
                                                    aria-labelledby="settings-tab-justified">
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
                                                                            } elseif ($arr == $banyak_history) {
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
                                                                                        value="{{ $timeline->statushistory->id }}, {{ $timeline->jabatan->jabatan_id }}">
                                                                                        {{ $timeline->statushistory->keterangan }}
                                                                                        {{ $timeline->jabatan->keterangan }}
                                                                                    </h6>
                                                                                    <span
                                                                                        class="timeline-event-time">{{ $timeline->created_at->isoformat('dddd, D MMMM Y') }}</span>
                                                                                </div>
                                                                                @if ($timeline->catatan)
                                                                                    <p value="{{ $timeline->id }}">
                                                                                        <br>Catatan :
                                                                                        {{ $timeline->catatan }}
                                                                                    <p>
                                                                                @endif
                                                                                @if ($arr == -1)
                                                                                @else
                                                                                    <span
                                                                                        class="timeline-event-time">Waktu
                                                                                        Diproses :
                                                                                        {{ $selisih }}</span>
                                                                                @endif
                                                                                {{-- <span
                                                                                    class="timeline-event-time">{{ $timeline->created_at->diffForHumans() }}</span> --}}
                                                                                {{-- <p>{{ $timeline->created_at->diffForHumans() }}</p> --}}
                                                                                <div
                                                                                    class="d-flex flex-row align-items-center">

                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                    <hr class="invoice-spacing" />
                                                                    <p class="fw-bold"> Total SLA = {{ $totalwaktu }}
                                                                    </p>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Justified Tabs ends -->
                                    </div>
                        </section>
                        <!-- Idir -->
                        <div class="modal fade" id="dsr" tabindex="-1" aria-labelledby="addNewCardTitle"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-transparent">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-sm-5 mx-50 pb-5">
                                        <h3 class="text-center">Nilai DSR </h3>
                                        <hr class="invoice-spacing" />
                                        <div class="card-body">
                                            <div class="col-md-12 d-flex order-md-2 order-1">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="pe-1">Harga Beli</td>
                                                            <td><span class="fw-bold">: Rp.
                                                                    {{ number_format($pembiayaan->nominal_pembiayaan) }}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pe-1">Harga Jual</td>
                                                            <td>: Rp. {{ number_format($harga_jual) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pe-1">Jangka Waktu</td>
                                                            <td>: {{ $tenor }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pe-1">Equivalen Rate</td>
                                                            <td>: {{ $pembiayaan->rate }} %</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pe-1">Angsuran</td>
                                                            <td>: Rp. {{ number_format($angsuran1) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pe-1 mt-1">DSR</td>
                                                            <td><span class="fw-bold">:
                                                                    {{ $nilai_dsr1 }}
                                                                    %</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--akhir idir -->

                        <!-- ideb  -->
                        <div class="modal fade" id="slik" tabindex="-1" aria-labelledby="addNewCardTitle"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-transparent">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-sm-12 mx-50 pb-5">
                                        <h3 class="text-center">Lampiran IDEB</h3>
                                        <div class="card-body">
                                            <iframe src="{{ asset('storage/' . $ideb->foto) }}" class="d-block w-100"
                                                height='500' weight='800'></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ ideb  -->

                        <!-- Modal Konfirmasi Bendahara  -->
                        <div class="modal fade" id="modalKonfirmasiBendahara" tabindex="-1"
                            aria-labelledby="addNewCardTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-transparent">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-sm-12 mx-50 pb-5">
                                        <h3 class="text-center">Konfirmasi Bendahara</h3>
                                        <div class="card-body">
                                            @if ($konfirmasi)
                                                <iframe src="{{ asset('storage/' . $konfirmasi->foto) }}"
                                                    class="d-block w-100" height='500' weight='800'></iframe>
                                            @else
                                                <br />
                                                <center>
                                                    <h5>Tidak ada/belum di-Upload</h5>
                                                </center>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Modal Konfirmasi Bendahara  -->

                        <!-- jaminan  -->
                        <div class="modal fade" id="modalJaminanSkpd" tabindex="-1"
                            aria-labelledby="addNewCardTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-transparent">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-sm-12 mx-50 pb-5">
                                        <h3 class="text-center">Lampiran Jaminan</h3>
                                        <div class="card-body">
                                            <iframe src="{{ asset('storage/' . $jaminan->dokumen_jaminan) }}"
                                                class="d-block w-100" height='500' weight='800'></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ jaminan  -->
                    </div>


                    <!-- /Tombol Aksi -->
                </div>
            </div>
        </div>
    </div>
@else
    @endif
    </div>
    </section>
    </div>
    </div>
    </div>
@endsection
