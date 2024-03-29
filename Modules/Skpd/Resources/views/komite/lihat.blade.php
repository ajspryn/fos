@extends('skpd::layouts.main')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="nav-filled">
                    <div class="row match-height">

                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Proposal Pengajuan Pembiayaan</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab-justified" data-bs-toggle="tab"
                                                href="#proposal" role="tab" aria-controls="home-just"
                                                aria-selected="true">Proposal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab-justified" data-bs-toggle="tab"
                                                href="#identitas-pribadi" role="tab" aria-controls="profile-just"
                                                aria-selected="true">Identitas Pribadi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="messages-tab-justified" data-bs-toggle="tab"
                                                href="#legalitas-agunan" role="tab" aria-controls="messages-just"
                                                aria-selected="false">Legalitas Agunan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="settings-tab-justified" data-bs-toggle="tab"
                                                href="#legalitas-pekerjaan" role="tab" aria-controls="settings-just"
                                                aria-selected="false">Legalitas
                                                Pekerjaan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="settings-tab-justified" data-bs-toggle="tab"
                                                href="#keuangan" role="tab" aria-controls="settings-just"
                                                aria-selected="false">Keuangan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="settings-tab-justified" data-bs-toggle="tab"
                                                href="#ideb" role="tab" aria-controls="settings-just"
                                                aria-selected="false">IDEB</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="settings-tab-justified" data-bs-toggle="tab"
                                                href="#timeline" role="tab" aria-controls="settings-just"
                                                aria-selected="false">Timeline</a>
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
                                                                            <td class="pe-1">Tanggal Pengajuan</td>
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
                                                                            <td>: {{ $pembiayaan->nasabah->no_telp }}
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
                                                                            <td>: {{ $pembiayaan->nasabah->no_ktp }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Tempat, Tanggal Lahir</td>
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
                                                                            <td class="pe-1">Pendapatan Lainnya</td>
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
                                                                            <td class="pe-1 mt-2">Total Pendapatan</td>
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
                                                                            <td class="pe-1">Potongan Lainnya</td>
                                                                            <td>: Rp.
                                                                                {{ number_format($pembiayaan->potongan_lainnya) }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Kebutuhan Keluarga</td>
                                                                            <td>: Rp.
                                                                                {{ number_format($biayakeluarga) }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>nita
                                                                            <td class="pe-1 mt-1">Total Pengeluaran
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
                                                                        <td>Rp. {{ number_format($idep->plafond) }}
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
                                                                        <td>Rp. {{ number_format($idep->angsuran) }}
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
                                                                        <th style="text-align: center" class="py-1">Nama
                                                                            Bank</th>
                                                                        <th style="text-align: center" class="py-1">
                                                                            Plafond
                                                                        </th>
                                                                        <th style="text-align: center" class="py-1">
                                                                            Outstanding</th>
                                                                        <th style="text-align: center" class="py-1">
                                                                            Tenor
                                                                        </th>
                                                                        <th style="text-align: center" class="py-1">
                                                                            Margin
                                                                        </th>
                                                                        <th style="text-align: center" class="py-1">
                                                                            Angsuran
                                                                        </th>
                                                                        <th style="text-align: center" class="py-1">
                                                                            Agunan
                                                                        </th>
                                                                        <th style="text-align: center" class="py-1">Kol
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
                                                                            <td>{{ $ideppasangan->nama_bank }}</td>
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
                                                                                {{ $ideppasangan->kol_tertinggi }}</td>
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
                                                                                <td style="text-align: center">1</td>
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
                                                                                <td style="text-align: center">2</td>
                                                                                <td>DSR</td>
                                                                                <td>{{ $dsr->score_terendah }}% -
                                                                                    {{ $dsr->score_tertinggi }}%</td>
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
                                                                                    <td style="text-align: center">3
                                                                                    </td>
                                                                                    <td>Slik</td>
                                                                                    <td>Kol Tertinggi
                                                                                        {{ $slik->kol }}
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $slik->bobot * 100 }}%
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $rating_slik }}</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $nilai_slik }}</td>
                                                                                    <td style="text-align: center">
                                                                                        <button type="button"
                                                                                            class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#slik">
                                                                                            <i data-feather="eye"></i>
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
                                                                                    <td style="text-align: center">3
                                                                                    </td>
                                                                                    <td>Slik</td>
                                                                                    <td>Tidak Ada Slik
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $bobot_ta_slik * 100 }}%
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $rating_ta_slik }}</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $nilai_slik }}</td>
                                                                                    <td style="text-align: center">
                                                                                        <button type="button"
                                                                                            class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#slik">
                                                                                            <i data-feather="eye"></i>
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                            <tr>
                                                                                <td style="text-align: center">4</td>
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
                                                                                        data-bs-target="#ijazah">
                                                                                        <i data-feather="eye"></i>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="text-align: center">5</td>
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
                                                                                <td style="text-align: center">6</td>
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
                                                                            <button type="button" class="btn btn-primary"
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
                                                                                        <td class="pe-1">Total Nilai
                                                                                        </td>
                                                                                        <td>: {{ $total_score }}</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Status</td>
                                                                                        <td>:
                                                                                            @if ($nilai_dsr >= 40 || ($nilai_dsr1 < 0 && $total_score > 3.01))
                                                                                                @if ($nilai_dsr >= 40 && $total_score > 3.01)
                                                                                                    <span
                                                                                                        class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                                    <small
                                                                                                        class="text-danger">*DSR
                                                                                                        > 80%</small>
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
                                                                        <div class="col-xl-5 p-0 mt-xl-0 mt-2">
                                                                            <p class="mb-1 fw-bold">Note :</p>
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="pe-1 mb-2">Nilai < 2
                                                                                                </td>
                                                                                        <td>: <span class="fw-bold"><span
                                                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1 mb-2"><br>Nilai > 2
                                                                                            - 3
                                                                                        </td>
                                                                                        <td><br>: <span
                                                                                                class="fw-bold"><span
                                                                                                    class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                    Ulang</span></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1 mb-2"><br>Nilai > 3
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
                                                            <div class="col-xl-3 p-0">
                                                            </div>
                                                            <div class="col-xl-5 p-0 mt-xl-0 mt-2">
                                                                @if ($history->status_id == 2)
                                                                    @if ($total_score < 3.01)
                                                                        <div class="card-body">
                                                                            <button class="btn btn-danger w-100 mb-75"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#ditolak">
                                                                                Ditolak
                                                                            </button>
                                                                        </div>
                                                                        @if ($ideps->count() > 0)
                                                                            @if ($slik->kol > 3)
                                                                                <div class="card-body">
                                                                                    <button
                                                                                        class="btn btn-info w-100 mb-75"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modalUploadDeviasi"><i
                                                                                            data-feather="file"></i>
                                                                                        Upload Dokumen Deviasi
                                                                                    </button>
                                                                                </div>
                                                                            @endif
                                                                        @endif
                                                                    @else
                                                                        <div class="card-body">
                                                                            <button class="btn btn-success w-100 mb-75"
                                                                                data-bs-toggle="modal"data-bs-target="#lanjut_komite"><i
                                                                                    data-feather="check-square"></i>
                                                                                Lanjut Komite
                                                                            </button>
                                                                        </div>
                                                                    @endif
                                                                    <div class="card-body">
                                                                        <button class="btn btn-warning w-100 mb-75"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#edit_proposal"><i
                                                                                data-feather="edit"></i>
                                                                            Edit Proposal
                                                                        </button>
                                                                    </div>
                                                                @endif
                                                                <form action="/skpd/cetak">
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $pembiayaan->id }}">
                                                                    <div class="card-body">
                                                                        <button action="sumbit"
                                                                            class="btn btn-info w-100 mb-75"><i
                                                                                data-feather="printer"></i>
                                                                            Cetak Proposal
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                                @if ($bonMurabahah)
                                                                @else
                                                                    @if ($history->status_id == 9)
                                                                        <div class="card-body">
                                                                            <button class="btn btn-danger w-100 mb-75"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#bonMurabahah">
                                                                                Upload Bon Murabahah
                                                                            </button>
                                                                        </div>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Invoice Note ends -->
                                                    <!-- Modal Setuju  -->
                                                    <div class="modal fade" id="lanjut_komite" tabindex="-1"
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
                                                                        Apakah Anda Yakin Untuk Melanjutkan Ke Komite ?
                                                                    </h1>
                                                                    <p class="text-center"></p>

                                                                    <!-- form -->
                                                                    <form id="addNewCardValidation"
                                                                        class="row gy-1 gx-2 mt-75" method="POST"
                                                                        action="/skpd/komite"
                                                                        enctype="multipart/form-data">
                                                                        @csrf

                                                                        <div class="col-md-12">
                                                                            <label class="form-label"
                                                                                for="catatan">Catatan</label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                        </div>
                                                                        <input type="hidden" name="skpd_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}">
                                                                        <input type="hidden" name="status_id" value=3>
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ Auth::user()->id }}">

                                                                        @if ($nilai_dsr1 >= 40 || $nilai_dsr1 < 0)
                                                                            <label class="form-label"
                                                                                for="fotokk"><small
                                                                                    class="text-danger">*
                                                                                </small>Upload Dokumen Deviasi</label>
                                                                            <input type="file" name="dokumen_deviasi"
                                                                                id="fotokk" rows="3"
                                                                                class="form-control" required />
                                                                        @endif
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
                                                    <!--/ Modal Setuju  -->

                                                    <div class="modal fade" id="bonMurabahah" tabindex="-1"
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
                                                                        Upload Bon Murabahah
                                                                    </h1>
                                                                    <p class="text-center"></p>

                                                                    <!-- form -->
                                                                    <form id="addNewCardValidation"
                                                                        class="row gy-1 gx-2 mt-75" method="POST"
                                                                        action="/skpd/bonMurabahah"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <label class="form-label" for="bonMurabahah">*File
                                                                            berupa gambar .jpg/jpeg/png</label>
                                                                        <input type="hidden" name="skpd_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}">
                                                                        <input type="file" name="bon_murabahah"
                                                                            id="bonMurabahah" rows="3"
                                                                            class="form-control" required />
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

                                                    <!-- Modal Revisi  -->
                                                    <div class="modal fade" id="edit_proposal" tabindex="-1"
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
                                                                        Revisi Proposal ?
                                                                    </h1>
                                                                    <p class="text-center"></p>

                                                                    <!-- form -->
                                                                    <form id="addNewCardValidation"
                                                                        class="row gy-1 gx-2 mt-75" method="POST"
                                                                        action="/skpd/komite">
                                                                        @csrf

                                                                        <div class="col-md-12">
                                                                            <label class="form-label"
                                                                                for="catatan">Catatan</label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                        </div>
                                                                        <input type="hidden" name="skpd_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}">
                                                                        <input type="hidden" name="status_id" value=7>
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
                                                    <!--/ Modal Revisi  -->

                                                    @if ($deviasi)
                                                        <div class="modal fade" id="dokumendeviasi" tabindex="-1"
                                                            aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-transparent">
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                        <h3 class="text-center">Lampiran Dokumen Deviasi
                                                                        </h3>
                                                                        <div class="card-body">
                                                                            <iframe
                                                                                src="{{ asset('storage/' . $deviasi->dokumen_deviasi) }}"
                                                                                class="d-block w-100"
                                                                                height="500"></iframe>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <!-- Invoice Note ends -->

                                                    <div class="modal fade" id="ditolak" tabindex="-1"
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
                                                                        Apakah Anda Yakin Untuk Menolak Proposal Ini ?
                                                                    </h1>
                                                                    <p class="text-center"></p>

                                                                    <!-- form -->
                                                                    <form id="addNewCardValidation"
                                                                        class="row gy-1 gx-2 mt-75" method="POST"
                                                                        action="/skpd/komite">
                                                                        @csrf

                                                                        <div class="col-md-12">
                                                                            <label class="form-label"
                                                                                for="catatan">Catatan</label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                        </div>
                                                                        <input type="hidden" name="skpd_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}">
                                                                        <input type="hidden" name="status_id" value=6>
                                                                        <input type="hidden" name="jabatan_id" value=1>
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
                                                    <!-- /Invoice Actions -->

                                                    <!-- Modal Upload Deviasi  -->
                                                    <div class="modal fade" id="modalUploadDeviasi" tabindex="-1"
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
                                                                        Upload Lembar Deviasi
                                                                    </h1>
                                                                    <p class="text-center"></p>

                                                                    <!-- form -->
                                                                    <form id="formDeviasi" class="row gy-1 gx-2 mt-75"
                                                                        method="POST" action="/skpd/komite"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="skpd_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}">
                                                                        <input type="hidden" name="status_id" value=2>
                                                                        <input type="hidden" name="jabatan_id" value=1>
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ Auth::user()->id }}">
                                                                        <input type="file" name="dokumen_deviasi"
                                                                            id="dokumenDeviasi" class="form-control"
                                                                            required />

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
                                                    <!--/ Modal Upload Deviasi  -->

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
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
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
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
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
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
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
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
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
                                            <iframe src="{{ asset('storage/' . $ideb->foto) }}" class="d-block w-100"
                                                height="600"></iframe>
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

                                                                    // $waktu_mulai=Carbon\Carbon::parse($timelines[$arr]->created_at);
                                                                    // $waktu_selesai=Carbon\Carbon::parse($timeline->created_at);
                                                                    // $selisih=$waktu_mulai->diffAsCarbonInterval($waktu_selesai);

                                                                    // ddd($selisih);

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
                                                            <p class="fw-bold"> Total SLA = {{ $totalwaktu }}</p>
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
                                                    <td class="pe-1">Sisa Pendapatan Bersih</td>
                                                    <td>: Rp. {{ number_format($pendapatan_bersih) }} </td>
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



                <!-- jaminan  -->
                <div class="modal fade" id="ijazah" tabindex="-1" aria-labelledby="addNewCardTitle"
                    aria-hidden="true">
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

                <!-- ideb  -->
                <div class="modal fade" id="slik" tabindex="-1" aria-labelledby="addNewCardTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
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
                <div class="modal fade" id="modalKonfirmasiBendahara" tabindex="-1" aria-labelledby="addNewCardTitle"
                    aria-hidden="true">
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
                                        <iframe src="{{ asset('storage/' . $konfirmasi->foto) }}" class="d-block w-100"
                                            height='500' weight='800'></iframe>
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

                <!-- Jaminan  -->
                <div class="modal fade" id="iii" tabindex="-1" aria-labelledby="addNewCardTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-sm-12 mx-50 pb-5">
                                <h3 class="text-center">Lampiran Jaminan</h3>
                                <div class="card-body">
                                    {{-- <img src="{{ asset('storage/' .$jaminan->dokumen_jaminan) }}" class="d-block w-100"
                                    height='500'> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Jaminan  -->


                </div>
            </div>
        @endsection
