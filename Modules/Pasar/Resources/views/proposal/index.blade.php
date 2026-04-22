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
                            <h2 class="content-header-title float-start mb-0">Data Proposal</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/pasar">Pasar</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Proposal</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Pengajuan
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
                                <form method="GET" action="/pasar/proposal" class="d-flex gap-2">
                                    <input type="text" name="search" class="form-control" placeholder="Cari nama nasabah..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                    <a href="/pasar/proposal" class="btn btn-secondary">Reset</a>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center"></th>
                                        <th style="text-align: center">No</th>
                                        <th class="d-none d-md-table-cell" style="text-align: center">Nama Nasabah</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">Nama Kios / Los</th>
                                        <th style="text-align: center">Blok Kios / Los</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($proposals as $proposal)
                                        <tr>
                                            <td></td>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ $proposal->nasabahh->nama_nasabah }}</td>
                                            <td>{{ $proposal->nasabahh->alamat }}, {{ $proposal->nasabahh->rt }},
                                                {{ $proposal->nasabahh->rw }}, {{ $proposal->nasabahh->desa_kelurahan }},
                                                {{ $proposal->nasabahh->kecamatan }}, {{ $proposal->nasabahh->kabkota }},
                                                {{ $proposal->nasabahh->provinsi }}</td>
                                            <td style="text-align: center">{{ $proposal->keteranganusaha->nama_usaha }}</td>
                                            <td style="text-align: center">{{ $proposal->keteranganusaha->no_blok }}</td>
                                            <td style="text-align: center">Rp.{{ number_format($proposal->harga) }}</td>
                                            <td style="text-align: center">
                                                <a href="/pasar/proposal/{{ $proposal->id }}"
                                                    class="btn btn-outline-info round">Lengkapi</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="8" class="text-center">Tidak ada data proposal.</td></tr>
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
            <!--/ Basic table -->
        </div>
    </div>
    <!-- END: Content-->
@endsection
