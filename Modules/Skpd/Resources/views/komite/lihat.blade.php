@extends('skpd::layouts.main')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
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
                                                aria-selected="false">Legalitas Pekerjaan</a>
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
                                        <div class="tab-pane active show" id="proposal" role="tabpanel"
                                            aria-labelledby="home-tab-justified">
                                            <!-- proposal -->
                                            <div class="col-xl-12 col-md-8 col-12">
                                                <div class="invoice-preview-card">

                                                    @include('skpd::komite.summary-skpd')

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
                                                                                <td>
                                                                                    @if ($bendahara->rating == 1)
                                                                                        Kurang
                                                                                    @elseif($bendahara->rating == 2)
                                                                                        Cukup
                                                                                    @elseif($bendahara->rating == 3)
                                                                                        Baik
                                                                                    @else
                                                                                        Sangat Baik
                                                                                    @endif

                                                                                </td>
                                                                                <td style="text-align: center">
                                                                                    {{ $bendahara->bobot * 100 }}%
                                                                                </td>
                                                                                <td style="text-align: center">
                                                                                    {{ $rating_bendahara }}</td>
                                                                                <td style="text-align: center">
                                                                                    {{ number_format($nilai_bendahara, 1, ',', '.') }}
                                                                                </td>
                                                                                <td style="text-align: center">
                                                                                    <button type="button"
                                                                                        class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#modalKonfirmasiBendahara">
                                                                                        <i data-feather="eye"></i>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                            @if ($deviasiDSR)
                                                                                <tr>
                                                                                    <td style="text-align: center">2</td>
                                                                                    <td>DSR <strong>(Deviasi)</strong></td>
                                                                                    <td>{{ $dsr->score_terendah }}% -
                                                                                        {{ $dsr->score_tertinggi }}%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $dsr->bobot * 100 }}%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $rating_dsr }}</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ number_format($nilai_dsr, 1, ',', '.') }}
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <button type="button"
                                                                                            class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#dsr">
                                                                                            <i data-feather="eye"></i>
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                            @else
                                                                                <tr>
                                                                                    <td style="text-align: center">2</td>
                                                                                    <td>DSR</td>
                                                                                    <td>
                                                                                        @if ($dsr->id == 6)
                                                                                            {{ '< 0,00%' }}
                                                                                        @elseif($dsr->id == 7)
                                                                                            {{ '40,00% - 41,00%' }}
                                                                                        @elseif($dsr->id == 8)
                                                                                            {{ '> 41,00%' }}
                                                                                        @else
                                                                                            {{ number_format($dsr->score_terendah, 2, ',', '.') }}%
                                                                                            -
                                                                                            {{ number_format($dsr->score_tertinggi, 2, ',', '.') }}%
                                                                                        @endif
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $dsr->bobot * 100 }}%</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ $rating_dsr }}</td>
                                                                                    <td style="text-align: center">
                                                                                        {{ number_format($nilai_dsr, 1, ',', '.') }}
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <button type="button"
                                                                                            class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#dsr">
                                                                                            <i data-feather="eye"></i>
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                            @if ($ideps->count() > 0)
                                                                                @if ($deviasiSlik)
                                                                                    <tr>
                                                                                        <td style="text-align: center">3
                                                                                        </td>
                                                                                        <td>Slik <strong>(Deviasi)</strong>
                                                                                        </td>
                                                                                        <td>Kol Tertinggi
                                                                                            {{ $slik->kol }}
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ $slik->bobot * 100 }}%
                                                                                        </td>
                                                                                        <td style="text-align: center">
                                                                                            {{ 3 }}</td>
                                                                                        <td style="text-align: center">
                                                                                            {{ number_format($nilaiSlikDeviasi, 1, ',', '.') }}
                                                                                        </td>
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
                                                                                            {{ number_format($nilai_slik, 1, ',', '.') }}
                                                                                        </td>
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
                                                                            @else
                                                                                @php
                                                                                    $bobot_ta_slik = 0.2;
                                                                                    $rating_ta_slik = 4;
                                                                                    $nilai_slik =
                                                                                        $bobot_ta_slik *
                                                                                        $rating_ta_slik;
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
                                                                                        {{ number_format($nilai_slik, 1, ',', '.') }}
                                                                                    </td>
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
                                                                                    {{ number_format($nilai_jaminan, 1, ',', '.') }}
                                                                                </td>
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
                                                                                    {{ number_format($nilai_nasabah, 1, ',', '.') }}
                                                                                </td>
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
                                                                                    {{ number_format($nilai_instansi, 2, ',', '.') }}
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <hr style="margin-top:-1px;" />
                                                                </div>
                                                                @if ($ifDeviasi)
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
                                                                    if ($deviasiSlik) {
                                                                        $nilai_slik = $nilaiSlikDeviasi;
                                                                    }

                                                                    $total_score =
                                                                        $nilai_bendahara +
                                                                        $nilai_dsr +
                                                                        $nilai_slik +
                                                                        $nilai_jaminan +
                                                                        $nilai_nasabah +
                                                                        $nilai_instansi;
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
                                                                                            {{ number_format($total_score, 2, ',', '.') }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Status</td>
                                                                                        <td>:
                                                                                            @if ($nilai_dsr1 >= 40 || ($nilai_dsr1 < 0 && $total_score > 3))
                                                                                                @if ($nilai_dsr1 >= 40 && $total_score > 3)
                                                                                                    <span
                                                                                                        class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                                    <small
                                                                                                        class="text-danger">
                                                                                                        *DSR
                                                                                                        > 40%</small>
                                                                                                @elseif($nilai_dsr1 < 0 && $total_score > 3)
                                                                                                    <span
                                                                                                        class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                                    <small
                                                                                                        class="text-danger">
                                                                                                        *Pengeluaran
                                                                                                        >
                                                                                                        Pendapatan</small>
                                                                                                @elseif($total_score >= 2 && $total_score <= 3)
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
                                                                                                @elseif($total_score >= 2 && $total_score <= 3)
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
                                                                                        <td class="pe-1 mb-2">Nilai < 2,0
                                                                                                </td>
                                                                                        <td>: <span class="fw-bold"><span
                                                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1 mb-2"><br>Nilai ≥
                                                                                            2,0
                                                                                            - 3,0
                                                                                        </td>
                                                                                        <td><br>: <span
                                                                                                class="fw-bold"><span
                                                                                                    class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                    Ulang</span></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1 mb-2"><br>Nilai ≥
                                                                                            3,0 - 4,0
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
                                                            <div class="col-xl-9 p-0 mt-xl-0 mt-2">
                                                                <div class="d-flex flex-wrap gap-2 align-items-center">
                                                                @if ($history->status_id == 2)
                                                                    @php
                                                                        $canAjukanKomite = false;

                                                                        if ($total_score > 3) {
                                                                            if ($deviasiDSR) {
                                                                                $canAjukanKomite = true;
                                                                            } else {
                                                                                $canAjukanKomite = ($nilai_dsr1 > 0 && $nilai_dsr1 <= 40) &&
                                                                                    ($pendapatan_bersih - $angsuran1 >= 0);
                                                                            }
                                                                        }
                                                                    @endphp
                                                                    @if ($total_score <= 3)
                                                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ditolak">Ditolak</button>
                                                                        @if (($nilai_dsr1 > 40 && $nilai_dsr1 <= 41) || $nilai_dsr1 < 0)
                                                                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUploadDeviasiDsr"><i data-feather="file"></i> Upload Dokumen Deviasi DSR</button>
                                                                        @endif
                                                                        @if ($ideps->count() > 0)
                                                                            @if (!$deviasiSlik && $slik->kol > 3)
                                                                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUploadDeviasiSlik"><i data-feather="file"></i> Upload Dokumen Deviasi Slik</button>
                                                                            @endif
                                                                        @endif
                                                                    @else
                                                                        @if ($canAjukanKomite)
                                                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#lanjut_komite"><i data-feather="check-square"></i> Ajukan ke Komite</button>
                                                                        @else
                                                                            <button class="btn btn-secondary" type="button" disabled>Ajukan ke Komite</button>
                                                                            <span class="text-muted small">Cek DSR, sisa pendapatan bersih, atau dokumen deviasi sebelum pengajuan.</span>
                                                                        @endif
                                                                        @if (($nilai_dsr1 > 40 && $nilai_dsr1 <= 41) || $nilai_dsr1 < 0)
                                                                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUploadDeviasi"><i data-feather="file"></i> Upload Dokumen Deviasi DSR</button>
                                                                        @endif
                                                                    @endif
                                                                @endif
                                                                @if (!$bonMurabahah && $history->status_id == 9)
                                                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#bonMurabahah">Upload Bon Murabahah</button>
                                                                @endif
                                                                @if (!in_array($history->status_id, [6, 8, 9, 10]))
                                                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit_proposal"><i data-feather="edit"></i> Edit Proposal</button>
                                                                @endif
                                                                <form action="/skpd/cetak" target="_blank" class="d-inline-block m-0">
                                                                    <input type="hidden" name="id" value="{{ $pembiayaan->id }}">
                                                                    <button type="submit" class="btn btn-info"><i data-feather="printer"></i> Cetak Proposal</button>
                                                                </form>
                                                                </div>
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

                                                                        {{-- @if ($nilai_dsr1 > 40 || $nilai_dsr1 < 0)
                                                                            <label class="form-label"
                                                                                for="dokumenDeviasiDsr"><small
                                                                                    class="text-danger">*
                                                                                </small>Upload Dokumen Deviasi</label>
                                                                            <input type="file" name="dokumen_deviasi"
                                                                                id="dokumenDeviasiDsr"
                                                                                class="form-control" required />
                                                                        @endif --}}
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
                                                                            @foreach ($deviasi as $devItem)
                                                                                <h4 class="text-center">Deviasi
                                                                                    {{ $devItem->kategori_deviasi }}
                                                                                </h4>
                                                                                <iframe
                                                                                    src="{{ asset('storage/' . $devItem->dokumen_deviasi) }}"
                                                                                    class="d-block w-100"
                                                                                    height="500"></iframe>
                                                                                <br />
                                                                                <br />
                                                                            @endforeach
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

                                                    <!-- Modal Upload Deviasi Slik -->
                                                    <div class="modal fade" id="modalUploadDeviasiSlik" tabindex="-1"
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
                                                                    <form id="formDeviasiSlik" class="row gy-1 gx-2 mt-75"
                                                                        method="POST" action="/skpd/komite"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="skpd_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}">
                                                                        <input type="hidden" name="status_id" value=2>
                                                                        <input type="hidden" name="jabatan_id" value=1>
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ Auth::user()->id }}">
                                                                        @if ($ideps->count() > 0)
                                                                            @if ($slik->kol > 3)
                                                                                <input type="hidden"
                                                                                    name="kategori_deviasi" value="Slik"
                                                                                    required />
                                                                            @endif
                                                                        @endif

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
                                                    <!--/ Modal Upload Deviasi Slik -->

                                                    <!-- Modal Upload Deviasi DSR -->
                                                    <div class="modal fade" id="modalUploadDeviasiDsr" tabindex="-1"
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
                                                                    <form id="formDeviasiDsr" class="row gy-1 gx-2 mt-75"
                                                                        method="POST" action="/skpd/komite"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="skpd_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}">
                                                                        <input type="hidden" name="status_id" value=2>
                                                                        <input type="hidden" name="jabatan_id" value=1>
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ Auth::user()->id }}">

                                                                        @if ($nilai_dsr1 > 40)
                                                                            <input type="hidden" name="kategori_deviasi"
                                                                                value="DSR" required />
                                                                        @endif

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
                                                    <!--/ Modal Upload Deviasi DSR -->

                                                </div>
                                            </div>
                                            <!-- /proposal -->
                                        </div>
                                        <div class="tab-pane" id="identitas-pribadi" role="tabpanel"
                                            aria-labelledby="profile-tab-justified">
                                            @foreach ($fotos->where('kategori', '!=', 'IDEB')->where('kategori', '!=', 'IDEB Pasangan')->where('kategori', '!=', 'Konfirmasi Bendahara') as $foto)
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
                                                        <iframe src="{{ asset('storage/' . $foto->foto) }}"
                                                            class="d-block w-100" height="600"></iframe>
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
                                                                <small class="text-muted">Diupload pada:
                                                                    {{ $jaminan->created_at->diffForhumans() }}</small>
                                                            </div>
                                                        </div>
                                                        <iframe src="{{ asset('storage/' . $jaminan->dokumen_jaminan) }}"
                                                            class="d-block w-100" height="600"></iframe>
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
                                                                <small class="text-muted">Diupload pada:
                                                                    {{ $jaminanlainnya->created_at->diffForhumans() }}</small>
                                                            </div>
                                                        </div>
                                                        <iframe
                                                            src="{{ asset('storage/' . $jaminanlainnya->dokumen_jaminan_lainnya) }}"
                                                            class="d-block w-100" height="600"></iframe>
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
                                                                <small class="text-muted">Diupload pada:
                                                                    {{ $skpengangkatan->created_at->diffForhumans() }}</small>
                                                            </div>
                                                        </div>
                                                        <iframe
                                                            src="{{ asset('storage/' . $skpengangkatan->sk_pengangkatan) }}"
                                                            class="d-block w-100" height="600"></iframe>
                                                    </div>
                                                </div>
                                                <!--/ post 1 -->
                                            @endforeach
                                        </div>
                                        <div class="tab-pane" id="keuangan" role="tabpanel"
                                            aria-labelledby="settings-tab-justified">
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
                                                    <iframe src="{{ asset('storage/' . $pembiayaan->dokumen_keuangan) }}"
                                                        class="d-block w-100" height="600"></iframe>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-start align-items-center mb-1">
                                                        <div>
                                                            <h6 class="mb-0">
                                                                Slip Gaji
                                                            </h6>
                                                            <small class="text-muted">Diupload pada:
                                                                {{ $pembiayaan->created_at->diffForhumans() }}</small>
                                                        </div>
                                                    </div>
                                                    <iframe src="{{ asset('storage/' . $pembiayaan->dokumen_slip_gaji) }}"
                                                        class="d-block w-100" height="600"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="ideb" role="tabpanel"
                                            aria-labelledby="settings-tab-justified">
                                            <center>
                                                <h4>IDEB Pemohon</h4>
                                            </center>
                                            @if ($ideb)
                                            <iframe src="{{ asset('storage/' . $ideb->foto) }}" class="d-block w-100"
                                                height="600"></iframe>
                                            @else
                                            <center><br/><p class="text-muted">IDEB Pemohon belum di-upload</p></center>
                                            @endif
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
                                                                        $waktu_mulai = Carbon\Carbon::parse(
                                                                            $timelines[0]->created_at,
                                                                        );
                                                                        $waktu_selesai = Carbon\Carbon::parse(
                                                                            $timeline->created_at,
                                                                        );
                                                                        $selisih = $waktu_selesai->diffAsCarbonInterval(
                                                                            $waktu_mulai,
                                                                        );
                                                                    } elseif ($arr == $banyak_history) {
                                                                        $waktu_mulai = Carbon\Carbon::parse(
                                                                            $timelines[0]->created_at,
                                                                        );
                                                                        $waktu_selesai = Carbon\Carbon::parse(
                                                                            $timeline->created_at,
                                                                        );
                                                                        $selisih = $waktu_selesai->diffAsCarbonInterval(
                                                                            $waktu_mulai,
                                                                        );
                                                                    } elseif ($arr >= 0) {
                                                                        $waktu_mulai = Carbon\Carbon::parse(
                                                                            $timelines[$arr]->created_at,
                                                                        );
                                                                        $waktu_selesai = Carbon\Carbon::parse(
                                                                            $timeline->created_at,
                                                                        );
                                                                        $selisih = $waktu_selesai->diffAsCarbonInterval(
                                                                            $waktu_mulai,
                                                                        );
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
                                                            {{ number_format((float) $pembiayaan->nominal_pembiayaan, 0, ',', '.') }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Harga Jual</td>
                                                    <td>: Rp. {{ number_format($harga_jual, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Jangka Waktu</td>
                                                    <td>: {{ $tenor }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Equivalen Rate</td>
                                                    <td>: {{ number_format($pembiayaan->rate, 2, ',', '.') }} %</td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Sisa Pendapatan Bersih</td>
                                                    <td>: Rp. {{ number_format($pendapatan_bersih, 0, ',', '.') }} </td>
                                                </tr>

                                                <tr>
                                                    <td class="pe-1">Angsuran</td>
                                                    <td>: Rp. {{ number_format($angsuran1, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Pendapatan Bersih Stl. Angs.</td>
                                                    <td>: Rp.
                                                        {{ number_format($pendapatan_bersih - $angsuran1, 0, ',', '.') }}
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
                                    @if ($ideb)
                                    <iframe src="{{ asset('storage/' . $ideb->foto) }}" class="d-block w-100"
                                        height='500' weight='800'></iframe>
                                    @else
                                    <center><p class="text-muted">IDEB Pemohon belum di-upload</p></center>
                                    @endif
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
                                        {{-- <iframe
                                            src="http://docs.google.com/gview?url={{ asset('storage/' . $konfirmasi->foto) }}.doc&embedded=true"
                                            class="d-block w-100" height='500' weight='800'></iframe> --}}
                                        <iframe src="{{ asset('storage/' . $konfirmasi->foto) }}" class="d-block w-100"
                                            height='500'></iframe>
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
