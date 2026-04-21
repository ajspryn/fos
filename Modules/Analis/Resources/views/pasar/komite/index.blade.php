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
                            <div class="card-header">
                                <form method="GET" action="/analis/pasar/komite" class="d-flex gap-2">
                                    <input type="text" name="search" class="form-control" placeholder="Cari nama / alamat..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                    <a href="/analis/pasar/komite" class="btn btn-secondary">Reset</a>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
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
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($komites as $komite)
                                        @php
                                            $history = $histories[$komite->id] ?? null;
                                        @endphp
                                            <tr>
                                                <td style="text-align: center">{{ $loop->iteration + ($komites->currentPage() - 1) * $komites->perPage() }}</td>
                                                <td>{{ $komite->nasabahh->nama_nasabah }}</td>
                                                <td>{{ $komite->nasabahh->alamat }}</td>
                                                <td style="text-align: center">{{ $komite->keteranganusaha->nama_usaha }}</td>
                                                <td style="text-align: center">{{ $komite->keteranganusaha->jenispasar->nama_pasar }}</td>
                                                <td style="text-align: center">{{ number_format((float)str_replace('.', '', $komite->harga ?? '0')) }}</td>
                                                <td style="text-align: center">{{ $komite->tgl_pembiayaan }}</td>
                                                <td style="text-align: center">
                                                    @if (in_array($history?->status_id, [5, 11]))
                                                        <span class="badge rounded-pill badge-light-success">{{ $history?->statushistory?->keterangan ?? '' }}</span>
                                                    @elseif ($history?->status_id == 9)
                                                        <span class="badge rounded-pill badge-light-success">{{ $history?->statushistory?->keterangan ?? '' }}</span>
                                                    @elseif (in_array($history?->status_id, [6, 10]))
                                                        <span class="badge rounded-pill badge-light-danger">{{ $history?->statushistory?->keterangan ?? '' }}</span>
                                                    @elseif ($history?->status_id == 7)
                                                        <span class="badge rounded-pill badge-light-warning">{{ $history?->statushistory?->keterangan ?? '' }}</span>
                                                    @else
                                                        <span class="badge rounded-pill badge-light-info">{{ $history?->statushistory?->keterangan ?? '' }} {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                    @endif
                                                </td>
                                                <td style="text-align: center">{{ $komite->user->name ?? '-' }}</td>
                                                <td style="text-align: center">
                                                    <a href="/analis/pasar/komite/{{ $komite->id }}" class="btn btn-outline-info round">Detail</a>
                                                </td>
                                            </tr>
                                    @empty
                                        <tr><td colspan="10" class="text-center">Tidak ada data komite.</td></tr>
                                    @endforelse
                                </tbody>
                                </table>
                            </div>
                            <div class="card-body">
                                {{ $komites->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->
        </div>
    </div>
@endsection
