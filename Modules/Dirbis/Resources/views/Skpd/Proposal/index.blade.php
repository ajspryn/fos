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
                            <h2 class="content-header-title float-start mb-0">Data Proposal</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dirbis">Dirbis</a></li>
                                    <li class="breadcrumb-item"><a href="/dirbis/skpd">SKPD</a></li>
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
                                        <th class="d-none d-md-table-cell" style="text-align: center">Alamat</th>
                                        <th style="text-align: center">Instansi</th>
                                        <th style="text-align: center">Golongan</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">AO yang Menangani</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        @php
                                            $history = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
                                                ->where('skpd_pembiayaan_id', $proposal->id)
                                                ->latest()
                                                ->first();
                                        @endphp

                                        @continue(!$history || !$history->statushistory || !$history->jabatan)
                                        @continue(!$proposal->nasabah || !$proposal->instansi || !$proposal->golongan || !$proposal->user)

                                        @if (
                                            $history->jabatan_id == 1 ||
                                                $history->jabatan_id == 2 ||
                                                $history->jabatan_id == 0 ||
                                                ($history->jabatan_id == 3 && $history->status_id == 4)
                                        )
                                            <tr>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td>{{ $proposal->nasabah->nama_nasabah }}</td>
                                                <td class="d-none d-md-table-cell">
                                                    {{ $proposal->nasabah->alamat }}, {{ $proposal->nasabah->rt }},
                                                    {{ $proposal->nasabah->rw }}, {{ $proposal->nasabah->desa_kelurahan }},
                                                    {{ $proposal->nasabah->kecamatan }}, {{ $proposal->nasabah->kabkota }},
                                                    {{ $proposal->nasabah->provinsi }}
                                                </td>
                                                <td style="text-align: center">{{ $proposal->instansi->nama_instansi }}</td>
                                                <td style="text-align: center">{{ $proposal->golongan->nama_golongan }}</td>
                                                <td style="text-align: center">Rp. {{ number_format($proposal->nominal_pembiayaan) }}</td>
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
