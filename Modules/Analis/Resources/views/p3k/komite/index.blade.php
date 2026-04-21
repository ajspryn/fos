@extends('analis::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Data Proposal</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/analis/p3k">P3K</a>
                                    </li>
                                    <li class="breadcrumb-item active">Komite
                                    </li>
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
                            <div class="card-header">
                                <form method="GET" action="/analis/p3k/komite" class="d-flex gap-2">
                                    <input type="text" name="search" class="form-control" placeholder="Cari nama / NIK..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                    <a href="/analis/p3k/komite" class="btn btn-secondary">Reset</a>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No.</th>
                                        <th style="text-align: center">Tanggal Pengajuan</th>
                                        <th style="text-align: center">NIK</th>
                                        <th style="text-align: center">Nama Nasabah</th>
                                        <th style="text-align: center">Nilai yang Dimohon</th>
                                        <th style="text-align: center">Jangka Waktu</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">AO yang Menangani</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($proposals as $proposal)
                                        @php
                                            $proposal_p3k = $proposal->p3kPembiayaan;
                                            $history = $proposal;
                                        @endphp
                                        @if ($proposal_p3k)
                                        <tr>
                                            <td style="text-align: center">{{ $loop->iteration + ($proposals->currentPage() - 1) * $proposals->perPage() }}</td>
                                            <td style="text-align: center">
                                                {{ strtoupper(strftime('%d %B %Y', strtotime($proposal_p3k->tanggal_pengajuan))) }}
                                            </td>
                                            <td style="text-align: center">{{ $proposal_p3k->nasabah->no_ktp }}</td>
                                            <td style="text-align: center">{{ $proposal_p3k->nasabah->nama_nasabah }}</td>
                                            <td style="text-align: center">
                                                Rp{{ number_format((float)($proposal_p3k->nominal_pembiayaan ?? 0), 0, ',', '.') }}
                                            </td>
                                            <td style="text-align: center">{{ $proposal_p3k->tenor }} Bulan</td>
                                            <td style="text-align: center">
                                                @if (in_array($history->status_id, [5, 11]))
                                                    <span class="badge rounded-pill badge-light-success">
                                                        {{ $history?->statusHistory?->keterangan ?? '' }}
                                                    </span>
                                                @elseif ($history->status_id == 9)
                                                    <span class="badge rounded-pill badge-light-success">
                                                        {{ $history?->statusHistory?->keterangan ?? '' }}
                                                    </span>
                                                @elseif ($history->status_id == 6)
                                                    <span class="badge rounded-pill badge-light-danger">
                                                        {{ $history?->statusHistory?->keterangan ?? '' }}
                                                    </span>
                                                @elseif ($history->status_id == 10)
                                                    <span class="badge rounded-pill badge-light-danger">
                                                        {{ $history?->statusHistory?->keterangan ?? '' }}
                                                    </span>
                                                @elseif ($history->status_id == 7)
                                                    <span class="badge rounded-pill badge-light-warning">
                                                        {{ $history?->statusHistory?->keterangan ?? '' }}
                                                    </span>
                                                @else
                                                    <span class="badge rounded-pill badge-light-info">
                                                        {{ $history?->statusHistory?->keterangan ?? '' }}
                                                        {{ $history?->jabatan?->keterangan ?? '' }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td style="text-align: center">{{ $proposal_p3k->user->name ?? '-' }}</td>
                                            <td style="text-align: center">
                                                <a href="/analis/p3k/komite/{{ $proposal_p3k->id }}"
                                                    class="btn btn-outline-info round">Detail</a>
                                            </td>
                                        </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Tidak ada data komite.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                </table>
                            </div>
                            <div class="card-body">
                                {{ $proposals->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->
        </div>
    </div>
    <!-- END: Content-->
@endsection
