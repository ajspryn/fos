@extends('pasar::layouts.main')
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
                            <h2 class="content-header-title float-start mb-0">Data Revisi Proposal</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/pasar">Pasar</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Proposal</a>
                                    </li>
                                    <li class="breadcrumb-item active">Revisi Proposal
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic table -->
            <section>
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
                                        <th style="text-align: center"></th>
                                        <th style="text-align: center">No</th>
                                        <th class="d-none d-md-table-cell" style="text-align: center">Nama nasabahh</th>
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
                                    @forelse($komites as $komite)
                                        @php
                                            $history = $histories[$komite->id] ?? null;
                                            $statusLabels = [1=>'Diajukan',2=>'Dilengkapi',3=>'Diajukan ke Komite',4=>'Sedang Ditinjau',5=>'Disetujui',6=>'Ditolak',7=>'Rekomendasi Revisi',8=>'Akad Dicetak',9=>'Akad Selesai',10=>'Akad Batal',11=>'Rekomendasi'];
                                            $jabatanLabels = [0=>'Nasabah',1=>'Staff/AO',2=>'Kabag',3=>'Analis',4=>'Direktur Bisnis',5=>'Direktur Utama'];
                                            $statusLabel = $history ? ($statusLabels[(int)$history->status_id] ?? '') : '';
                                            $jabatanLabel = $history ? ($jabatanLabels[(int)$history->jabatan_id] ?? '') : '';
                                        @endphp
                                        <tr>
                                            <td></td>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ $komite->nasabahh->nama_nasabah }}</td>
                                            <td>{{ $komite->nasabahh->alamat }}</td>
                                            <td style="text-align: center">{{ $komite->keteranganusaha->nama_usaha }}</td>
                                            <td style="text-align: center">{{ $komite->keteranganusaha->jenispasar->nama_pasar }}</td>
                                            <td style="text-align: center">{{ number_format($komite->harga) }}</td>
                                            <td style="text-align: center">{{ $komite->tgl_pembiayaan }}</td>
                                            <td style="text-align: center">
                                                <span class="badge rounded-pill badge-light-warning">{{ $statusLabel }} {{ $jabatanLabel }}</span>
                                            </td>
                                            <td style="text-align: center">{{ $komite->user->name }}</td>
                                            <td>
                                                <a href="/pasar/revisi/{{ $komite->id }}" class="btn btn-outline-info round">Detail</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="11" class="text-center">Tidak ada data revisi.</td></tr>
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
