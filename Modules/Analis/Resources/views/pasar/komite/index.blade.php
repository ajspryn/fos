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
                            <h2 class="content-header-title float-start mb-0">Data Komite</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/analis/pasar">Pasar</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Komite</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Komite
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
                                        <th style="text-align: center">Nama Kios / Los</th>
                                        <th style="text-align: center">Alamat Pasar</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Tanggal Pengajuan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">AO Yang Menangani</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($komites as $komite)
                                        @php
                                            $history = $histories[$komite->id] ?? null;
                                        @endphp
                                        @if ($history)
                                            <tr>
                                                <td></td>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td>{{ $komite->nasabahh->nama_nasabah }}</td>
                                                <td>{{ $komite->nasabahh->alamat }}</td>
                                                <td style="text-align: center">{{ $komite->keteranganusaha->nama_usaha }}</td>
                                                <td style="text-align: center">{{ $komite->keteranganusaha->jenispasar->nama_pasar }}</td>
                                                <td style="text-align: center">{{ number_format($komite->harga) }}</td>
                                                <td style="text-align: center">{{ $komite->tgl_pembiayaan }}</td>
                                                <td style="text-align: center" value="{{ $history?->statushistory?->id ?? '' }},{{ $history?->jabatan?->jabatan_id ?? '' }}">
                                                    @if ($history?->statushistory?->id ?? '' == 5 || $history?->statushistory?->id ?? '' == 11)
                                                        <span class="badge rounded-pill badge-light-success">{{ $history?->statushistory?->keterangan ?? '' }} {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                    @elseif ($history?->statushistory?->id ?? '' == 4)
                                                        <span class="badge rounded-pill badge-light-warning">{{ $history?->statushistory?->keterangan ?? '' }} {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                    @else
                                                        <span class="badge rounded-pill badge-light-info">{{ $history?->statushistory?->keterangan ?? '' }} {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                    @endif
                                                </td>
                                                <td style="text-align: center">{{ $komite->user->name }}</td>
                                                <td style="text-align: center">
                                                    <a href="/analis/pasar/komite/{{ $komite->id }}" class="btn btn-outline-info round">Detail</a>
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
