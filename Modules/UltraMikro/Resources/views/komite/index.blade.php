@extends('UltraMikro::layouts.main')

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
                            <h2 class="content-header-title float-start mb-0">Data Proses Komite</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/ultra_mikro">Ultra Mikro</a>
                                    </li>
                                    <li class="breadcrumb-item active">Komite
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-datatable table-responsive pt-0">
                                <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center"></th>
                                        <th style="text-align: center">No</th>
                                        <th class="d-none d-md-table-cell" style="text-align: center">Tanggal Pengajuan</th>
                                        <th style="text-align: center">Petugas Lapangan</th>
                                        <th style="text-align: center">NIK</th>
                                        <th style="text-align: center">Nama Nasabah</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($proposals as $proposal)
                                        @php
                                            $history = Modules\UltraMikro\Entities\UltraMikroPembiayaanHistory::select()
                                                ->where('ultra_mikro_pembiayaan_id', $proposal->id)
                                                ->orderby('created_at', 'desc')
                                                ->first();
                                        @endphp
                                        <tr>
                                            <td></td>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ strftime('%d %B %Y', strtotime($proposal->tanggal_pengajuan)) }}</td>
                                            <td>{{ $proposal->petugasLapangan->nama }}</td>
                                            <td>{{ $proposal->nasabah->no_ktp }}</td>
                                            <td>{{ $proposal->nasabah->nama_nasabah }}</td>
                                            <td style="text-align: center">Rp{{ number_format($proposal->nominal_pembiayaan, 0, ',', '.') }}</td>
                                            <td style="text-align: center">
                                                @if ($history && $history?->statusHistory?->id ?? '' == 5)
                                                    <span class="badge rounded-pill badge-light-success">{{ $history?->statusHistory?->keterangan ?? '' }} {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                @elseif ($history && $history?->statusHistory?->id ?? '' == 9)
                                                    <span class="badge rounded-pill badge-light-success">{{ $history?->statusHistory?->keterangan ?? '' }}</span>
                                                @elseif ($history && $history?->statusHistory?->id ?? '' == 4)
                                                    <span class="badge rounded-pill badge-light-info">{{ $history?->statusHistory?->keterangan ?? '' }} {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                @elseif ($history && $history?->statusHistory?->id ?? '' == 10)
                                                    <a class="badge rounded-pill badge-light-danger" data-bs-toggle="modal" data-bs-target="#modalCatatanAkadBatal-{{ $history->id }}">{{ $history?->statusHistory?->keterangan ?? '' }}</a>
                                                @elseif ($history && $history?->statusHistory?->id ?? '' == 6)
                                                    <span class="badge rounded-pill badge-light-danger">{{ $history?->statusHistory?->keterangan ?? '' }} {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                @else
                                                    <span class="badge rounded-pill badge-light-warning">{{ $history?->statusHistory?->keterangan }} {{ $history?->jabatan?->keterangan }}</span>
                                                @endif
                                            </td>
                                            <td style="text-align: center">
                                                <a href="/ultra_mikro/komite/{{ $proposal->id }}" class="btn btn-outline-info round">Detail</a>
                                            </td>
                                        </tr>
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
    <!-- END: Content-->
@endsection
