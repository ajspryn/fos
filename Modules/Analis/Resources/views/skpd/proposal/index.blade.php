@extends('analis::layouts.main')

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
                                    <li class="breadcrumb-item"><a href="/analis/skpd">SKPD</a></li>
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
                                <form method="GET" action="/analis/skpd/proposal" class="d-flex gap-2">
                                    <input type="text" name="search" class="form-control" placeholder="Cari nama nasabah/NIK..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                    <a href="/analis/skpd/proposal" class="btn btn-secondary">Reset</a>
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
                                            <th style="text-align: center">Golongan</th>
                                            <th style="text-align: center">Nominal Pembiayaan</th>
                                            <th style="text-align: center">Status</th>
                                            <th style="text-align: center">AO Yang Menangani</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($proposals as $proposal)
                                            @php $history = $histories[$proposal->id] ?? null; @endphp
                                            <tr>
                                                <td style="text-align: center">{{ $loop->iteration + ($proposals->currentPage() - 1) * $proposals->perPage() }}</td>
                                                <td>{{ $proposal->nasabah->nama_nasabah }}</td>
                                                <td>{{ $proposal->nasabah->alamat }}, {{ $proposal->nasabah->rt }},
                                                    {{ $proposal->nasabah->rw }}, {{ $proposal->nasabah->desa_kelurahan }},
                                                    {{ $proposal->nasabah->kecamatan }}, {{ $proposal->nasabah->kabkota }},
                                                    {{ $proposal->nasabah->provinsi }}</td>
                                                <td style="text-align: center">{{ $proposal->instansi->nama_instansi }}</td>
                                                <td style="text-align: center">{{ $proposal->golongan->nama_golongan }}</td>
                                                <td style="text-align: center">Rp.
                                                    {{ number_format((float)str_replace('.', '', $proposal->nominal_pembiayaan ?? '0')) }}</td>
                                                <td style="text-align: center">
                                                    @if (($history?->statushistory?->id ?? '') == 5)
                                                        <span class="badge rounded-pill badge-light-success">{{ $history?->statushistory?->keterangan ?? '' }} {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                    @elseif (($history?->statushistory?->id ?? '') == 4)
                                                        <span class="badge rounded-pill badge-light-warning">{{ $history?->statushistory?->keterangan ?? '' }} {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                    @else
                                                        <span class="badge rounded-pill badge-light-info">{{ $history?->statushistory?->keterangan ?? '' }} {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                    @endif
                                                </td>
                                                <td style="text-align: center">{{ $proposal->user->name }}</td>
                                                <td style="text-align: center">
                                                    <a href="/analis/skpd/komite/{{ $proposal->id }}"
                                                        class="btn btn-outline-info round">Detail</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" style="text-align: center">Tidak ada data proposal.</td>
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
        </div>
    </div>
@endsection
