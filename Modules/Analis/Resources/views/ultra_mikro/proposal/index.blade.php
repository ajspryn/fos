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
                            <h2 class="content-header-title float-start mb-0">Data Proposal</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/analis/ultra_mikro">Ultra Mikro</a></li>
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
                                <form method="GET" action="/analis/ultra_mikro/proposal" class="d-flex gap-2">
                                    <input type="text" name="search" class="form-control" placeholder="Cari nama nasabah/NIK..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                    <a href="/analis/ultra_mikro/proposal" class="btn btn-secondary">Reset</a>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">No.</th>
                                            <th style="text-align: center">Tanggal Pengajuan</th>
                                            <th style="text-align: center">NIK</th>
                                            <th style="text-align: center">Nama Nasabah</th>
                                            <th style="text-align: center">Pekerjaan/Usaha</th>
                                            <th style="text-align: center">Nilai yang Dimohon</th>
                                            <th style="text-align: center">Jangka Waktu</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($proposals as $proposal)
                                            <tr>
                                                <td style="text-align: center">{{ $loop->iteration + ($proposals->currentPage() - 1) * $proposals->perPage() }}</td>
                                                <td style="text-align: center">
                                                    {{ strtoupper(strftime('%d %B %Y', strtotime($proposal->tanggal_pengajuan))) }}
                                                </td>
                                                <td style="text-align: center">{{ $proposal->nasabah->no_ktp }}</td>
                                                <td style="text-align: center">{{ $proposal->nasabah->nama_nasabah }}</td>
                                                <td style="text-align: center">{{ $proposal->nasabah->nama_pekerjaan }}</td>
                                                <td style="text-align: center">
                                                    Rp{{ number_format((float)str_replace('.', '', $proposal->nominal_pembiayaan ?? '0'), 0, ',', '.') }}
                                                </td>
                                                <td style="text-align: center">{{ $proposal->tenor }} Bulan</td>
                                                <td>
                                                    <a href="/analis/ultra_mikro/komite/{{ $proposal->id }}"
                                                        class="btn btn-outline-info round">Detail</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" style="text-align: center">Tidak ada data proposal.</td>
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
    <!-- END: Content-->
@endsection
