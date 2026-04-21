@extends('dirbis::layouts.main')

@section('content')
    <style>
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
    </style>
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Data Komite</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dirbis">Dirbis</a></li>
                                    <li class="breadcrumb-item"><a href="/dirbis/p3k">P3K</a></li>
                                    <li class="breadcrumb-item active">Komite</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th class="midCenter" style="vertical-align: middle;">No.</th>
                                        <th class="midCenter d-none d-md-table-cell" style="vertical-align: middle;">Tanggal Pengajuan</th>
                                        <th class="midCenter" style="vertical-align: middle;">NIK</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nama Nasabah</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nilai yang Dimohon</th>
                                        <th class="midCenter" style="vertical-align: middle;">Jangka Waktu</th>
                                        <th class="midCenter" style="vertical-align: middle;">Status</th>
                                        <th class="midCenter" style="vertical-align: middle;">AO yang Menangani</th>
                                        <th class="midCenter" style="vertical-align: middle;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        @php
                                            $proposal_p3k = $proposal->p3kPembiayaan;

                                            $history = null;
                                            if ($proposal_p3k) {
                                                $history = Modules\P3k\Entities\P3kPembiayaanHistory::select()
                                                    ->where('p3k_pembiayaan_id', $proposal_p3k->id)
                                                    ->latest()
                                                    ->first();
                                            }

                                            $nasabah = optional($proposal_p3k)->nasabah;
                                            $tanggalPengajuan = optional($proposal_p3k)->tanggal_pengajuan ?? optional($proposal_p3k)->created_at;
                                        @endphp

                                        @continue(!$proposal_p3k || !$history)
                                        @continue(!$nasabah)
                                        @continue(!$history->statushistory || !$history->jabatan)

                                        <tr>
                                            <td class="midCenter">{{ $loop->iteration }}</td>
                                            <td class="midCenter d-none d-md-table-cell">
                                                {{ $tanggalPengajuan ? \Carbon\Carbon::parse($tanggalPengajuan)->format('d-m-Y') : '-' }}
                                            </td>
                                            <td class="midCenter">{{ $nasabah->no_ktp ?? '-' }}</td>
                                            <td class="midCenter">{{ $nasabah->nama_nasabah ?? '-' }}</td>
                                            <td class="midCenter">Rp{{ number_format($proposal_p3k->nominal_pembiayaan ?? 0, 0, ',', '.') }}</td>
                                            <td class="midCenter">{{ $proposal_p3k->tenor ?? '-' }} Bulan</td>
                                            <td class="midCenter" value="{{ $history?->statushistory?->id ?? '' }}, {{ $history?->jabatan?->jabatan_id ?? '' }}">
                                                @if ($history?->statushistory?->id ?? '' == 5)
                                                    <span class="badge rounded-pill badge-light-success">
                                                        {{ $history?->statushistory?->keterangan ?? '' }}
                                                        {{ $history?->jabatan?->keterangan ?? '' }}
                                                    </span>
                                                @elseif ($history?->statushistory?->id ?? '' == 9)
                                                    <span class="badge rounded-pill badge-light-success">
                                                        {{ $history?->statushistory?->keterangan ?? '' }}
                                                    </span>
                                                @elseif ($history?->statushistory?->id ?? '' == 4)
                                                    <span class="badge rounded-pill badge-light-info">
                                                        {{ $history?->statushistory?->keterangan ?? '' }}
                                                        {{ $history?->jabatan?->keterangan ?? '' }}
                                                    </span>
                                                @elseif ($history?->statushistory?->id ?? '' == 10)
                                                    <span class="badge rounded-pill badge-light-danger">
                                                        {{ $history?->statushistory?->keterangan ?? '' }}
                                                    </span>
                                                @else
                                                    <span class="badge rounded-pill badge-light-warning">
                                                        {{ $history?->statushistory?->keterangan ?? '' }}
                                                        {{ $history?->jabatan?->keterangan ?? '' }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="midCenter">{{ optional($proposal_p3k->user)->name ?? '-' }}</td>
                                            <td class="midCenter">
                                                <a href="/dirbis/p3k/komite/{{ $proposal_p3k->id }}" class="btn btn-outline-info btn-sm round">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->
        </div>
    </div>
    <!-- END: Content-->
@endsection
