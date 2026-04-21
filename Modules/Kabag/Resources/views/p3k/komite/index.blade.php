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
                                    <li class="breadcrumb-item"><a href="/kabag/p3k/komite">P3K</a>
                                    </li>
                                    <li class="breadcrumb-item active">Komite
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
                            <div class="card-datatable table-responsive pt-0">

                            <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center"></th>
                                        <th class="midCenter" style="vertical-align: middle;">No.</th>
                                        <th class="d-none d-md-table-cell midCenter" style="vertical-align: middle;">Tanggal Pengajuan</th>
                                        <th class="midCenter" style="vertical-align: middle;">NIK</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nama Nasabah</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nilai yang Dimohon</th>
                                        <th class="midCenter" style="vertical-align: middle;">Jangka Waktu</th>
                                        <th class="midCenter" style="vertical-align: middle;">Status</th>
                                        <th class="midCenter" style="vertical-align: middle;">AO yang Menangani</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse ($proposals as $proposal)
                                        @php($pembiayaan = $proposal->p3kPembiayaan)
                                        @php($pembiayaanId = $proposal->p3k_pembiayaan_id)

                                        <tr>
                                            <td></td>
                                            <td class="midCenter">{{ $loop->iteration }}</td>
                                            <td class="midCenter">{{ $pembiayaan && $pembiayaan->tanggal_pengajuan ? \Carbon\Carbon::parse($pembiayaan->tanggal_pengajuan)->format('d-m-Y') : '-' }}</td>
                                            <td class="midCenter">{{ optional(optional($pembiayaan)->nasabah)->no_ktp }}</td>
                                            <td class="midCenter">{{ optional(optional($pembiayaan)->nasabah)->nama_nasabah }}</td>
                                            <td class="midCenter">Rp. {{ number_format((int) (optional($pembiayaan)->nominal_pembiayaan ?? 0), 0, ',', '.') }}</td>
                                            <td class="midCenter">{{ optional($pembiayaan)->tenor }}</td>
                                            <td class="midCenter">
                                                @if ($proposal->status_id == 5)
                                                    <span class="badge rounded-pill badge-light-success">
                                                        {{ optional($proposal->statusHistory)->keterangan }} {{ optional($proposal->jabatan)->keterangan }}
                                                    </span>
                                                @elseif ($proposal->status_id == 9)
                                                    <span class="badge rounded-pill badge-light-success">{{ optional($proposal->statusHistory)->keterangan }}</span>
                                                @elseif ($proposal->status_id == 4)
                                                    <span class="badge rounded-pill badge-light-info">
                                                        {{ optional($proposal->statusHistory)->keterangan }} {{ optional($proposal->jabatan)->keterangan }}
                                                    </span>
                                                @elseif ($proposal->status_id == 10)
                                                    <span class="badge rounded-pill badge-light-danger">{{ optional($proposal->statusHistory)->keterangan }}</span>
                                                @else
                                                    <span class="badge rounded-pill badge-light-warning">
                                                        {{ optional($proposal->statusHistory)->keterangan }} {{ optional($proposal->jabatan)->keterangan }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="midCenter">{{ optional(optional($pembiayaan)->user)->name }}</td>
                                            <td style="text-align: center">
                                                <a href="/kabag/p3k/komite/{{ $pembiayaanId }}" class="btn btn-outline-info btn-sm round">Detail</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">Tidak ada data.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                            </table>

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
