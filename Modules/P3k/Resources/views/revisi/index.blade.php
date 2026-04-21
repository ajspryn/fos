@extends('p3k::layouts.main')

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
                            <h2 class="content-header-title mb-0">Data Proposal</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/p3k">P3K</a>
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
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Revisi Proposal</h5>
                                <form method="GET" action="/p3k/revisi" class="d-flex gap-1">
                                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari nama / NIK..." value="{{ $search ?? '' }}" style="width:220px;">
                                    <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                                    @if($search ?? null)<a href="/p3k/revisi" class="btn btn-outline-secondary btn-sm">Reset</a>@endif
                                </form>
                            </div>
                            <div class="card-datatable table-responsive pt-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">Tanggal Pengajuan</th>
                                            <th style="text-align: center">NIK</th>
                                            <th style="text-align: center">Nama Nasabah</th>
                                            <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">Unit Kerja</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        <tr>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ strftime('%d %B %Y', strtotime($proposal->tanggal_pengajuan)) }}
                                            <td>{{ $proposal->nasabah->no_ktp }}</td>
                                            <td>{{ $proposal->nasabah->nama_nasabah }}</td>
                                            <td>{{ $proposal->nasabah->alamat }}, RT {{ $proposal->nasabah->rt }}/ RW
                                                {{ $proposal->nasabah->rw }}, {{ $proposal->nasabah->desa_kelurahan }},
                                                {{ $proposal->nasabah->kecamatan }}, {{ $proposal->nasabah->kabkota }},
                                                {{ $proposal->nasabah->provinsi }} {{ $proposal->nasabah->kd_pos }}
                                            </td>
                                            <td style="text-align: center">
                                                {{ $proposal->nasabah->pekerjaan->nama_unit_kerja }}</td>
                                            <td style="text-align: center">Rp
                                                {{ number_format($proposal->nominal_pembiayaan, 0, ',', '.') }}</td>
                                            <td style="text-align: center">
                                                <a href="/p3k/revisi/{{ $proposal->id }}/edit"
                                                    class="btn btn-outline-info round">Lengkapi</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                            <div class="px-2 pb-2">
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
