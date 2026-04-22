@extends('kabag::layouts.main')

@section('content')
    <style>
        .pCenter {
            text-align: center;
        }

        .midJustify {
            vertical-align: middle;
            text-align: justify;
        }

        .midCenter {
            vertical-align: middle;
            text-align: center;
        }
    </style>

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
                                    <li class="breadcrumb-item"><a href="/kabag/p3k/proposal">P3K</a>
                                    </li>
                                    <li class="breadcrumb-item active">Proposal
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
                <form method="GET" action="/kabag/p3k/proposal" class="d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama nasabah..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="/kabag/p3k/proposal" class="btn btn-secondary">Reset</a>
                </form>
            </div>
            <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center"></th>
                                        <th class="midCenter" style="vertical-align: middle;">No.</th>
                                        <th class="d-none d-md-table-cell" class="midCenter" style="vertical-align: middle;">Tanggal Pengajuan</th>
                                        <th class="midCenter" style="vertical-align: middle;">NIK</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nama Nasabah</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nama Unit</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nilai yang Dimohon
                                        </th>
                                        <th class="midCenter" style="vertical-align: middle;">Jangka Waktu</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse ($proposals as $proposal)
                                        @php($pembiayaan = $proposal->p3kPembiayaan)
                                        @php($nasabah = optional($pembiayaan)->nasabah)
                                        <tr>
                                            <td></td>
                                            <td class="midCenter">{{ $loop->iteration }}</td>
                                            <td class="midCenter">
                                                {{ optional($pembiayaan)->tanggal_pengajuan ? strtoupper(strftime('%d %B %Y', strtotime($pembiayaan->tanggal_pengajuan))) : '-' }}
                                            </td>
                                            <td class="midCenter">{{ $nasabah->no_ktp ?? '-' }}</td>
                                            <td class="midCenter">{{ $nasabah->nama_nasabah ?? '-' }}</td>
                                            <td class="midCenter">{{ optional(optional($nasabah)->pekerjaan)->nama_unit_kerja }}</td>
                                            <td class="midCenter">Rp{{ optional($pembiayaan)->nominal_pembiayaan ? number_format($pembiayaan->nominal_pembiayaan, 0, ',', '.') : '-' }}</td>
                                            <td class="midCenter">{{ optional($pembiayaan)->tenor ? $pembiayaan->tenor . ' Bulan' : '-' }}</td>
                                            <td style="text-align: center">
                                                <a href="/kabag/p3k/komite/{{ $proposal->p3k_pembiayaan_id }}" class="btn btn-outline-info btn-sm round">Detail</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Tidak ada data.</td>
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
            <!--/ Basic table -->
        </div>
    </div>
    <!-- END: Content-->
@endsection
