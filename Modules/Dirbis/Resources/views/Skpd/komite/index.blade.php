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
                            <h2 class="content-header-title float-start mb-0">Data Proses Komite</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dirbis">Dirbis</a></li>
                                    <li class="breadcrumb-item"><a href="/dirbis/skpd">SKPD</a></li>
                                    <li class="breadcrumb-item active">Komite</li>
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
                            <div class="card-header">
                                <form method="GET" action="" class="d-flex gap-2">
                                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari nama nasabah...">
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                </form>
                            </div>
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama Nasabah</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">Instansi</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Tanggal Pengajuan</th>
                                        <th style="text-align: center">AO Yang Menangani</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        @php
                                            $skpdPembiayaanId = $proposal->skpd_pembiayaan_id ?? $proposal->id;

                                            $history = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
                                                ->where('skpd_pembiayaan_id', $skpdPembiayaanId)
                                                ->latest()
                                                ->first();

                                            $proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
                                                ->where('id', $skpdPembiayaanId)
                                                ->first();
                                        @endphp

                                        @continue(!$history || !$proposal_skpd)
                                        @continue(!$history->statushistory || !$history->jabatan)
                                        @continue(!$proposal_skpd->nasabah || !$proposal_skpd->instansi || !$proposal_skpd->user)

                                        @if ($history->jabatan_id == 4 || ($history->jabatan_id == 3 && $history->status_id == 5))
                                            <tr>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td>{{ $proposal_skpd->nasabah->nama_nasabah }}</td>
                                                <td>{{ $proposal_skpd->nasabah->alamat }}</td>
                                                <td style="text-align: center">{{ $proposal_skpd->instansi->nama_instansi }}</td>
                                                <td style="text-align: center">
                                                    Rp.{{ number_format($proposal_skpd->nominal_pembiayaan) }}
                                                </td>
                                                <td style="text-align: center"
                                                    value="{{ $history?->statushistory?->id ?? '' }} ,{{ $history?->jabatan?->jabatan_id ?? '' }} ">
                                                    @if ($history?->statushistory?->id ?? '' == 5 && $history?->jabatan?->jabatan_id ?? '' == 4)
                                                        <span class="badge rounded-pill badge-light-success">
                                                            {{ $history?->statushistory?->keterangan ?? '' }}
                                                            {{ $history?->jabatan?->keterangan ?? '' }}
                                                        </span>
                                                    @elseif ($history?->statushistory?->id ?? '' == 4)
                                                        <span class="badge rounded-pill badge-light-warning">
                                                            {{ $history?->statushistory?->keterangan ?? '' }}
                                                            {{ $history?->jabatan?->keterangan ?? '' }}
                                                        </span>
                                                    @elseif ($history?->statushistory?->id ?? '' == 5 && $history?->jabatan?->jabatan_id ?? '' == 3)
                                                        <span class="badge rounded-pill badge-light-info">
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
                                                <td style="text-align: center">{{ $proposal_skpd->tanggal_pengajuan }}</td>
                                                <td style="text-align: center">{{ $proposal_skpd->user->name }}</td>
                                                <td style="text-align: center">
                                                    <a href="/dirbis/skpd/komite/{{ $proposal_skpd->id }}"
                                                        class="btn btn-outline-info btn-sm round">Detail</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
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
        </div>
    </div>
@endsection
