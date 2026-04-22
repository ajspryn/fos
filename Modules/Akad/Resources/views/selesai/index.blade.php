@extends('akad::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <style>
        .rotate {
            -moz-transition: all 0.4s;
            -webkit-transition: all 0.4s;
            transition: all 0.4s;
        }

        .rotate.down {
            -moz-transform: rotate(-180deg);
            -webkit-transform: rotate(-180deg);
            transform: rotate(-180deg);
        }
    </style>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Data Proposal Akad</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/staff">Staff</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Proposal</a>
                                    </li>
                                    <li class="breadcrumb-item active">Selesai Akad
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- P3K Table -->
                <div class="card">
                    <h4 class="card-header">P3K<span class="rotate"><i data-feather="chevron-down" class="font-large-1"
                                onclick="toggleP3k()"></i></span>
                    </h4>
                    <section>
                        <div class="row" id="divP3kTable">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center"></th>
                                                <th style="text-align: center">No</th>
                                                <th class="d-none d-md-table-cell" style="text-align: center">Nama Nasabah</th>
                                                <th style="text-align: center">Unit Kerja</th>
                                                <th style="text-align: center">Plafond</th>
                                                <th style="text-align: center">Jangka Waktu</th>
                                                <th style="text-align: center">AO</th>
                                                <th style="text-align: center">Status</th>
                                                <th style="text-align: center">Bon Murabahah</th>
                                                <th style="text-align: center">Action</th>
                                    </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proposalP3ks as $proposalP3k)
                                                @php
                                                    $proposal_p3k = $p3kPembiayaansById[$proposalP3k->p3k_pembiayaan_id] ?? null;
                                                    $history = $proposalP3k;
                                                    $bonMurabahah = $proposal_p3k ? ($p3kBonMurabahahByPembiayaanId[$proposal_p3k->id] ?? null) : null;
                                                @endphp

                                                @continue(!$proposal_p3k || !$history)

                                                <tr>
                                                    <td style="text-align: center">
                                                        <button type="button"
                                                            class="btn btn-icon btn-icon rounded-circle btn-flat-success">
                                                            <i data-feather="eye"></i>
                                                        </button>
                                                    </td>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">
                                                        {{ strtoupper($proposal_p3k->nasabah->nama_nasabah) }}</td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_p3k->nasabah->pekerjaan->nama_unit_kerja }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        Rp {{ number_format($proposal_p3k->nominal_pembiayaan) }}</td>
                                                    <td style="text-align: center">{{ $proposal_p3k->tenor }} Bulan</td>
                                                    <td style="text-align: center">{{ $proposal_p3k->user->name }}</td>
                                                    <td style="text-align: center"
                                                        value="{{ $history?->statusHistory?->id ?? '' }}, {{ $history?->jabatan?->jabatan_id ?? '' }}">
                                                        @if ($history?->statusHistory?->id ?? '' == 5)
                                                            <span
                                                                class="badge rounded-pill badge-light-success">{{ $history?->statusHistory?->keterangan ?? '' }}
                                                                {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                        @elseif ($history?->statusHistory?->id ?? '' == 9)
                                                            <span class="badge rounded-pill badge-light-success">
                                                                {{ $history?->statusHistory?->keterangan ?? '' }}</span>
                                                        @elseif ($history?->statusHistory?->id ?? '' == 4)
                                                            <span
                                                                class="badge rounded-pill badge-light-info">{{ $history?->statusHistory?->keterangan ?? '' }}
                                                                {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                        @elseif ($history?->statusHistory?->id ?? '' == 10)
                                                            <a class="badge rounded-pill badge-light-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modalCatatanAkadBatal-{{ $history->id }}">{{ $history?->statusHistory?->keterangan ?? '' }}
                                                            </a>
                                                        @elseif ($history?->statusHistory?->id ?? '' == 6)
                                                            <span
                                                                class="badge rounded-pill badge-light-danger">{{ $history?->statusHistory?->keterangan ?? '' }}
                                                                {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                        @else
                                                            <span
                                                                class="badge rounded-pill badge-light-warning">{{ $history?->statusHistory?->keterangan ?? '' }}
                                                                {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center">
                                                        @if ($bonMurabahah)
                                                            <a class="badge rounded-pill badge-light-success"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#bonMurabahah-{{ $history->id }}">
                                                                Sudah Terlampir
                                                            </a>
                                                        @else
                                                            <span class="badge rounded-pill badge-light-danger">
                                                                Belum Terlampir
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center">
                                                        <a href="/staff/selesai/p3k/{{ $proposal_p3k->id }}"
                                                            class="btn btn-outline-info round">Detail</a>
                                                    </td>
                                </tr>
                                            @endforeach
                                            @foreach ($proposalP3ks as $forBonP3k)
                                                @php
                                                    $proposal_p3k = $p3kPembiayaansById[$forBonP3k->p3k_pembiayaan_id] ?? null;
                                                    $histForBonP3k = $forBonP3k;
                                                    $bonP3k = $proposal_p3k ? ($p3kBonMurabahahByPembiayaanId[$proposal_p3k->id] ?? null) : null;
                                                @endphp

                                                @continue(!$proposal_p3k || !$histForBonP3k)
                                                {{-- Modal Bon Murabahah --}}
                                                @if ($bonP3k)
                                                    <div class="modal fade" id="bonMurabahah-{{ $histForBonP3k->id }}"
                                                        aria-labelledby="addNewCardTitle" aria-hidden="true" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-transparent">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                    <h1 class="text-center mb-1" id="addNewCardTitle">
                                                                        Bon Murabahah
                                                                    </h1>
                                                                    <div class="card-body">
                                                                        <p class="text-center">Diupload pada tanggal
                                                                            {{ date_format($bonP3k->created_at, 'd F Y') }}
                                                                        </p>
                                                                        <img src="{{ asset('storage/' . $bonP3k->foto) }}"
                                                                            class="d-block w-100" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                {{-- End Modal Bon Murabahah --}}
                                            @endforeach
                                            @foreach ($proposalP3ks as $forCatatanP3kModal)
                                                @php
                                                    $proposal_p3k = $p3kPembiayaansById[$forCatatanP3kModal->p3k_pembiayaan_id] ?? null;
                                                    $historyCatatanP3k = $forCatatanP3kModal;
                                                @endphp

                                                @continue(!$proposal_p3k || !$historyCatatanP3k)
                                                <!-- Modal Catatan Akad Batal -->
                                                <div class="modal fade"
                                                    id="modalCatatanAkadBatal-{{ $historyCatatanP3k->id }}" tabindex="-1"
                                                    aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-transparent">
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                <h5 class="text-center">Catatan</h5>
                                                                <br />
                                                                <textarea class="form-control" name="catatan" rows="3" placeholder="Catatan">{{ $historyCatatanP3k->catatan }}</textarea>
                                                                <br />
                                                                <div class="row">
                                                                    <div class="col-md-6"
                                                                        style="width:150px; margin:0 auto;">
                                                                        <button type="button"
                                                                            class="btn btn-primary w-100"
                                                                            data-bs-dismiss="modal">Tutup</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Modal Catatan Akad Batal -->
                                            @endforeach
                                        </tbody>
                                    </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!--/ P3K Table -->

                <!-- SKPD Table -->
                <div class="card">
                    <h4 class="card-header">SKPD<span class="rotate"><i data-feather="chevron-down" class="font-large-1"
                                onclick="toggleSkpd()"></i></span>
                    </h4>
                    <section>
                        <div class="row" id="divSkpdTable">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center"></th>
                                                <th style="text-align: center">No</th>
                                                <th class="d-none d-md-table-cell" style="text-align: center">Nama Nasabah</th>
                                                <th style="text-align: center">Instansi</th>
                                                <th style="text-align: center">Plafond</th>
                                                <th style="text-align: center">Jangka Waktu</th>
                                                <th style="text-align: center">AO</th>
                                                <th style="text-align: center">Status</th>
                                                <th style="text-align: center">Bon Murabahah</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proposalskpds as $proposalskpd)
                                                @php
                                                    $proposal_skpd = $skpdPembiayaansById[$proposalskpd->skpd_pembiayaan_id] ?? null;
                                                    $history = $proposalskpd;
                                                    $bonMurabahah = $proposal_skpd ? ($skpdBonMurabahahByPembiayaanId[$proposal_skpd->id] ?? null) : null;
                                                @endphp

                                                @continue(!$proposal_skpd || !$history)

                                                <tr>
                                                    <td style="text-align: center">
                                                        <button type="button"
                                                            class="btn btn-icon btn-icon rounded-circle btn-flat-success">
                                                            <i data-feather="eye"></i>
                                                        </button>
                                                    </td>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">
                                                        {{ strtoupper($proposal_skpd->nasabah->nama_nasabah) }}</td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_skpd->instansi->nama_instansi }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        Rp.{{ number_format($proposal_skpd->nominal_pembiayaan) }}</td>
                                                    <td style="text-align: center">{{ $proposal_skpd->tenor }} Bulan</td>
                                                    <td style="text-align: center">{{ $proposal_skpd->user->name }}</td>
                                                    <td style="text-align: center"
                                                        value="{{ $history?->statusHistory?->id ?? '' }}, {{ $history?->jabatan?->jabatan_id ?? '' }}">
                                                        @if ($history?->statusHistory?->id ?? '' == 5)
                                                            <span
                                                                class="badge rounded-pill badge-light-success">{{ $history?->statusHistory?->keterangan ?? '' }}
                                                                {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                        @elseif ($history?->statusHistory?->id ?? '' == 9)
                                                            <span class="badge rounded-pill badge-light-success">
                                                                {{ $history?->statusHistory?->keterangan ?? '' }}</span>
                                                        @elseif ($history?->statusHistory?->id ?? '' == 4)
                                                            <span
                                                                class="badge rounded-pill badge-light-info">{{ $history?->statusHistory?->keterangan ?? '' }}
                                                                {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                        @elseif ($history?->statusHistory?->id ?? '' == 10)
                                                            <a class="badge rounded-pill badge-light-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modalCatatanAkadBatal-{{ $history->id }}">{{ $history?->statusHistory?->keterangan ?? '' }}
                                                            </a>
                                                        @elseif ($history?->statusHistory?->id ?? '' == 6)
                                                            <span
                                                                class="badge rounded-pill badge-light-danger">{{ $history?->statusHistory?->keterangan ?? '' }}
                                                                {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                        @else
                                                            <span
                                                                class="badge rounded-pill badge-light-warning">{{ $history?->statusHistory?->keterangan ?? '' }}
                                                                {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center">
                                                        @if ($bonMurabahah)
                                                            <a class="badge rounded-pill badge-light-success"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#bonMurabahah-{{ $history->id }}">
                                                                Sudah Terlampir
                                                            </a>
                                                        @else
                                                            <span class="badge rounded-pill badge-light-danger">
                                                                Belum Terlampir
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center">
                                                        <a href="/staff/selesai/skpd/{{ $proposal_skpd->id }}"
                                                            class="btn btn-outline-info round">Detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @foreach ($proposalskpds as $forBonSkpd)
                                                @php
                                                    $proposal_skpd = $skpdPembiayaansById[$forBonSkpd->skpd_pembiayaan_id] ?? null;
                                                    $histForBonSkpd = $forBonSkpd;
                                                    $bonSkpd = $proposal_skpd ? ($skpdBonMurabahahByPembiayaanId[$proposal_skpd->id] ?? null) : null;
                                                @endphp

                                                @continue(!$proposal_skpd || !$histForBonSkpd)
                                                {{-- Modal Bon Murabahah --}}
                                                @if ($bonSkpd)
                                                    <div class="modal fade" id="bonMurabahah-{{ $histForBonSkpd->id }}"
                                                        aria-labelledby="addNewCardTitle" aria-hidden="true"
                                                        tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-transparent">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                    <h1 class="text-center mb-1" id="addNewCardTitle">
                                                                        Bon Murabahah
                                                                    </h1>
                                                                    <div class="card-body">
                                                                        <p class="text-center">Diupload pada tanggal
                                                                            {{ date_format($bonSkpd->created_at, 'd F Y') }}
                                                                        </p>
                                                                        <img src="{{ asset('storage/' . $bonSkpd->foto) }}"
                                                                            class="d-block w-100" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                {{-- End Modal Bon Murabahah --}}
                                            @endforeach
                                            @foreach ($proposalskpds as $forCatatanSkpdModal)
                                                @php
                                                    $proposal_skpd = $skpdPembiayaansById[$forCatatanSkpdModal->skpd_pembiayaan_id] ?? null;
                                                    $historyCatatanSkpd = $forCatatanSkpdModal;
                                                @endphp

                                                @continue(!$proposal_skpd || !$historyCatatanSkpd)
                                                <!-- Modal Catatan Akad Batal -->
                                                <div class="modal fade"
                                                    id="modalCatatanAkadBatal-{{ $historyCatatanSkpd->id }}"
                                                    tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-transparent">
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                <h5 class="text-center">Catatan</h5>
                                                                <br />
                                                                <textarea class="form-control" name="catatan" rows="3" placeholder="Catatan">{{ $historyCatatanSkpd->catatan }}</textarea>
                                                                <br />
                                                                <div class="row">
                                                                    <div class="col-md-6"
                                                                        style="width:150px; margin:0 auto;">
                                                                        <button type="button"
                                                                            class="btn btn-primary w-100"
                                                                            data-bs-dismiss="modal">Tutup</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Modal Catatan Akad Batal -->
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!--/ SKPD Table -->

                <!-- Pasar Table -->
                <div class="card">
                    <h4 class="card-header">Pasar<span class="rotate"><i data-feather="chevron-down"
                                class="font-large-1" onclick="togglePasar()"></i></span>
                    </h4>
                    <section>
                        <div class="row" id="divPasarTable">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">Tanggal Pengajuan</th>
                                                <th style="text-align: center">NIK</th>
                                                <th class="d-none d-md-table-cell" style="text-align: center">Nama Nasabah</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proposalpasars as $proposalpasar)
                                                @php
                                                    $proposal_pasar = $pasarPembiayaansById[$proposalpasar->pasar_pembiayaan_id] ?? null;
                                                @endphp

                                                @continue(!$proposal_pasar)

                                                <tr>

                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">
                                                        {{ date('d F Y', strtotime($proposal_pasar->tgl_pembiayaan)) }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_pasar->nasabahh->no_ktp }}</td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_pasar->nasabahh->nama_nasabah }}</td>
                                                    <td style="text-align: center">
                                                        <a href="/staff/selesai/pasar/{{ $proposal_pasar->id }}"
                                                            class="btn btn-outline-info round">Detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!--/ Pasar Table -->

                <!--/ UMKM Table -->
                <div class="card">
                    <h4 class="card-header">UMKM<span class="rotate"><i data-feather="chevron-down" class="font-large-1"
                                onclick="toggleUmkm()"></i></span>
                    </h4>
                    <section>
                        <div class="row" id="divUmkmTable">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">Tanggal Pengajuan</th>
                                                <th style="text-align: center">NIK</th>
                                                <th class="d-none d-md-table-cell" style="text-align: center">Nama Nasabah</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proposalumkms as $proposalumkm)
                                                @php
                                                    $proposal_umkm = $umkmPembiayaansById[$proposalumkm->umkm_pembiayaan_id] ?? null;
                                                @endphp

                                                @continue(!$proposal_umkm)
                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">
                                                        {{ date('d F Y', strtotime($proposal_umkm->tgl_pembiayaan)) }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_umkm->nasabahh->no_ktp }}</td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_umkm->nasabahh->nama_nasabah }}</td>
                                                    <td style="text-align: center">
                                                        <a href="/staff/selesai/umkm/{{ $proposal_umkm->id }}"
                                                            class="btn btn-outline-info round">Detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!--/ UMKM Table -->

                <!--/ PPR Table -->
                <div class="card">
                    <h4 class="card-header">PPR<span class="rotate"><i data-feather="chevron-down" class="font-large-1"
                                onclick="togglePpr()"></i></span>
                    </h4>
                    <section>
                        <div class="row" id="divPprTable">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">Tanggal Pengajuan</th>
                                                <th style="text-align: center">NIK</th>
                                                <th class="d-none d-md-table-cell" style="text-align: center">Nama Nasabah</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proposalpprs as $proposalppr)
                                                @php
                                                    $proposal_ppr = $pprPembiayaansById[$proposalppr->form_ppr_pembiayaan_id] ?? null;
                                                @endphp

                                                @continue(!$proposal_ppr)

                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">
                                                        {{ date_format($proposal_ppr->created_at, 'd F Y') }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_ppr->pemohon->form_pribadi_pemohon_no_ktp }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_ppr->pemohon->form_pribadi_pemohon_nama_lengkap }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{-- <button class="btn btn-outline-info round" type="button"
                                                        data-bs-toggle="modal"data-bs-target="#modalAkadPpr">Detail</button> --}}
                                                        <a href="/staff/selesai/ppr/{{ $proposal_ppr->id }}"
                                                            class="btn btn-outline-info round">Detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Modals -->
                        <div class="modal fade" id="modalAkadPpr" tabindex="-1" aria-labelledby="addNewCardTitle"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-transparent">
                                        <h5 class="modal-title" id="pilihPendapatanTitle">
                                            Title
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ">
                                        <div class="row">
                                            {{-- <table>
                                            <tbody>
                                                <tr>
                                                    <td class="pe-1">&emsp;&nbsp;&nbsp;Nama Nasabah</td>
                                                    <td>:
                                                        {{ $proposal_ppr->pemohon->form_pribadi_pemohon_nama_lengkap }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">&emsp;&nbsp;&nbsp;Jenis Nasabah</td>
                                                    <td>:
                                                        {{ $proposal_ppr->jenis_nasabah }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">&emsp;&nbsp;&nbsp;Tanggal Pengajuan</td>
                                                    <td>:
                                                        {{ date_format($proposal_ppr->created_at, 'd-m-Y') }}
                                                    </td>
                                                </tr>
                                        </table> --}}
                                            <div class="col-md-12">
                                                <form action="">
                                                    <input type="hidden" name="" value="" />
                                                    <button type="submit"
                                                        class="btn btn-warning btn-block form-control">Cetak
                                                        Akad
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="">
                                                    <input type="hidden" name="" value="" />
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block form-control">Akad
                                                        Batal
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                @csrf
                                                @foreach ($proposalpprs as $proposalppre)
                                                    @php
                                                        $proposal_ppra = Modules\Form\Entities\FormPprPembiayaan::select()
                                                            ->where('id', $proposalppre->form_ppr_pembiayaan_id)
                                                            ->first();
                                                    @endphp

                                                    @continue(!$proposal_ppra)
                                                    <input type="hidden" name="segmen" value="PPR" />
                                                    <input type="hidden" name="cif"
                                                        value="{{ $proposal_ppra->pemohon->id }}" />
                                                    <input type="hidden" name="kode_tabungan"
                                                        value="{{ $proposal_ppra->id }}" />
                                                    <input type="hidden" name="plafond"
                                                        value="{{ $proposal_ppra->form_permohonan_nilai_ppr_dimohon }}" />
                                                    <input type="hidden" name="harga_jual"
                                                        value="{{ $proposal_ppra->form_permohonan_harga_jual }}" />
                                                @endforeach
                                                <button type="submit"
                                                    class="btn btn-success btn-block form-control">Selesai
                                                    Akad
                                                </button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Modals -->

                    </section>
                </div>
                <!--/ PPR Table -->


            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function togglePpr() {
            var pprTable = document.getElementById("divPprTable");
            if (pprTable.style.display === "none") {
                pprTable.style.display = "block";
            } else {
                pprTable.style.display = "none";
            }
        }

        function toggleSkpd() {
            var skpdTable = document.getElementById("divSkpdTable");
            if (skpdTable.style.display === "none") {
                skpdTable.style.display = "block";
            } else {
                skpdTable.style.display = "none";
            }
        }

        function togglePasar() {
            var pasarTable = document.getElementById("divPasarTable");
            if (pasarTable.style.display === "none") {
                pasarTable.style.display = "block";
            } else {
                pasarTable.style.display = "none";
            }
        }

        function toggleUmkm() {
            var umkmTable = document.getElementById("divUmkmTable");
            if (umkmTable.style.display === "none") {
                umkmTable.style.display = "block";
            } else {
                umkmTable.style.display = "none";
            }
        }

        function toggleP3k() {
            var p3kTable = document.getElementById("divP3kTable");
            if (p3kTable.style.display === "none") {
                p3kTable.style.display = "block";
            } else {
                p3kTable.style.display = "none";
            }
        }

        $(".rotate").click(function() {
            $(this).toggleClass("down");
        })
    </script>
@endsection
