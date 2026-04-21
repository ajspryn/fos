@extends('dirbis::layouts.main')

@section('content')
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
                                    <li class="breadcrumb-item"><a href="/dirbis">Dirbis</a></li>
                                    <li class="breadcrumb-item"><a href="/dirbis/pasar">Pasar</a></li>
                                    <li class="breadcrumb-item active">Proposal</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama Nasabah</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">Nama Kios / Los</th>
                                        <th style="text-align: center">Alamat Pasar</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Tanggal Pengajuan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">AO Yang Menangani</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        @php
                                            $history = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
                                                ->where('pasar_pembiayaan_id', $proposal->id)
                                                ->latest()
                                                ->first();
                                        @endphp

                                        @continue(!$history || !$history->statushistory || !$history->jabatan)
                                        @continue(!$proposal->nasabahh || !$proposal->keteranganusaha || !$proposal->user)
                                        @continue(!$proposal->keteranganusaha->jenispasar)

                                        @if (
                                            $history->jabatan_id == 0 ||
                                                $history->jabatan_id == 1 ||
                                                $history->jabatan_id == 2 ||
                                                ($history->jabatan_id == 3 && $history->status_id == 4)
                                        )
                                            <tr>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td>{{ $proposal->nasabahh->nama_nasabah }}</td>
                                                <td>{{ $proposal->nasabahh->alamat }}</td>
                                                <td style="text-align: center">{{ $proposal->keteranganusaha->nama_usaha }}</td>
                                                <td style="text-align: center">{{ $proposal->keteranganusaha->jenispasar->nama_pasar }}</td>
                                                <td style="text-align: center">Rp.{{ number_format($proposal->harga) }}</td>
                                                <td style="text-align: center">{{ $proposal->tgl_pembiayaan }}</td>
                                                <td style="text-align: center"
                                                    value="{{ $history?->statushistory?->id ?? '' }} ,{{ $history?->jabatan?->jabatan_id ?? '' }} ">
                                                    @if ($history?->statushistory?->id ?? '' == 5)
                                                        <span class="badge rounded-pill badge-light-success">
                                                            {{ $history?->statushistory?->keterangan ?? '' }}
                                                            {{ $history?->jabatan?->keterangan ?? '' }}
                                                        </span>
                                                    @elseif ($history?->statushistory?->id ?? '' == 4 || $history?->statushistory?->id ?? '' == 7)
                                                        <span class="badge rounded-pill badge-light-warning">
                                                            {{ $history?->statushistory?->keterangan ?? '' }}
                                                            {{ $history?->jabatan?->keterangan ?? '' }}
                                                        </span>
                                                    @elseif ($history?->statushistory?->id ?? '' == 6)
                                                        <span class="badge rounded-pill badge-light-danger">
                                                            {{ $history?->statushistory?->keterangan ?? '' }}
                                                            {{ $history?->jabatan?->keterangan ?? '' }}
                                                        </span>
                                                    @else
                                                        <span class="badge rounded-pill badge-light-info">
                                                            {{ $history?->statushistory?->keterangan ?? '' }}
                                                            {{ $history?->jabatan?->keterangan ?? '' }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td style="text-align: center">{{ $proposal->user->name }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
