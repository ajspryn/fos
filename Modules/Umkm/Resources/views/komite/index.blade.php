@extends('umkm::layouts.main')

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
                                    <li class="breadcrumb-item"><a href="/umkm">UMKM</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Komite</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Diproses Komite
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
                                <form method="GET" action="/umkm/komite" class="d-flex gap-2">
                                    <input type="text" name="search" class="form-control" placeholder="Cari nama nasabah..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                    <a href="/umkm/komite" class="btn btn-secondary">Reset</a>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center"></th>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama nasabahh</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">Nama Usaha</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Tanggal Pengajuan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($komites as $komite)
                                        @php
                                            $history = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
                                                ->where('umkm_pembiayaan_id', $komite->id)
                                                ->orderby('created_at', 'desc')
                                                ->first();
                                        @endphp
                                        <tr>
                                            <td></td>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ $komite->nasabahh->nama_nasabah }}</td>
                                            <td>{{ $komite->nasabahh->alamat }}</td>
                                            <td style="text-align: center">{{ $komite->keteranganusaha->nama_usaha }}</td>
                                            <td style="text-align: center">{{ number_format((float)($komite->nominal_pembiayaan ?? 0), 0, ',', '.') }}</td>
                                            <td style="text-align: center">{{ $komite->tgl_pembiayaan }}</td>
                                            <td style="text-align: center">
                                                @if ($history && $history?->statushistory?->id ?? '' == 5)
                                                    <span class="badge rounded-pill badge-light-success">{{ $history?->statushistory?->keterangan ?? '' }} {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                @elseif ($history && ($history?->statushistory?->id ?? '' == 3 || $history?->statushistory?->id ?? '' == 4))
                                                    <span class="badge rounded-pill badge-light-info">{{ $history?->statushistory?->keterangan ?? '' }} {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                @elseif ($history && $history?->statushistory?->id ?? '' == 6)
                                                    <span class="badge rounded-pill badge-light-danger">{{ $history?->statushistory?->keterangan ?? '' }} {{ $history?->jabatan?->keterangan ?? '' }}</span>
                                                @else
                                                    <span class="badge rounded-pill badge-light-warning">{{ $history?->statushistory?->keterangan }} {{ $history?->jabatan?->keterangan }}</span>
                                                @endif
                                            </td>
                                            <td style="text-align: center">
                                                <a href="/umkm/komite/{{ $komite->id }}" class="btn btn-outline-info round">Detail</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="8" class="text-center">Tidak ada data komite.</td></tr>
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
    <!-- END: Content-->
@endsection
