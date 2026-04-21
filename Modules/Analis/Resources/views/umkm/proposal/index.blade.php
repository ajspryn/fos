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
                            <h2 class="content-header-title float-start mb-0">Data Proposal Nasabah</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/analis/umkm">UMKM</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Proposal</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Proposal
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
                            <div class="card-datatable table-responsive pt-0">
                                <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama Nasabah</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">Nama Usaha</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Tanggal Pengajuan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">AO Yang Menangani</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        @php
                                            $history = $histories[$proposal->id] ?? null;
                                        @endphp

                                        @if ($history && (($history->status_id == 11 && $history->jabatan_id == 1) || ($history->status_id == 4 && $history->jabatan_id == 3)))
                                            <tr>
                                                <td></td>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td>{{ $proposal->nasabahh->nama_nasabah }}</td>
                                                <td>{{ $proposal->nasabahh->alamat }}</td>
                                                <td style="text-align: center">
                                                    {{ $proposal->keteranganusaha->nama_usaha }}</td>
                                                <td style="text-align: center">{{ number_format($proposal->nominal_pembiayaan) }}
                                                </td>
                                                <td style="text-align: center">{{ $proposal->tgl_pembiayaan }}</td>
                                                <td style="text-align: center"
                                                    value="{{ $history?->statushistory?->id ?? '' }} ,{{ $history?->jabatan?->jabatan_id ?? '' }} ">
                                                    @if ($history?->statushistory?->id ?? '' == 5)
                                                        <span
                                                            class="badge rounded-pill badge-light-success">{{ $history?->statushistory?->keterangan ?? '' }}
                                                            {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                    @elseif ($history?->statushistory?->id ?? '' == 4)
                                                        <span
                                                            class="badge rounded-pill badge-light-warning">{{ $history?->statushistory?->keterangan ?? '' }}
                                                            {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                    @else
                                                        <span
                                                            class="badge rounded-pill badge-light-info">{{ $history?->statushistory?->keterangan ?? '' }}
                                                            {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                    @endif
                                                </td>
                                                <td style="text-align: center">{{ $proposal->user->name }}</td>
                                                <td>
                                                    <a href="/analis/umkm/komite/{{ $proposal->id }}"
                                                        class="btn btn-outline-info round">Detail</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->
        </div>
    </div>
@endsection
