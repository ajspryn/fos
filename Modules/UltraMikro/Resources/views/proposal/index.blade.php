@extends('UltraMikro::layouts.main')

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
                                    <li class="breadcrumb-item"><a href="/ultra_mikro">Ultra Mikro</a>
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
                            <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center"></th>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Tanggal Pengajuan</th>
                                        <th style="text-align: center">Petugas Lapangan</th>
                                        <th style="text-align: center">NIK</th>
                                        <th style="text-align: center">Nama Nasabah</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        <tr>
                                            <td style="text-align: center">
                                                <button type="button"
                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-success">
                                                    <i data-feather="eye"></i>
                                                </button>
                                            </td>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ strftime('%d %B %Y', strtotime($proposal->tanggal_pengajuan)) }}
                                            <td>{{ $proposal->petugasLapangan->nama }}</td>
                                            <td>{{ $proposal->nasabah->no_ktp }}</td>
                                            <td>{{ $proposal->nasabah->nama_nasabah }}</td>
                                            <td style="text-align: center">Rp
                                                {{ number_format($proposal->nominal_pembiayaan, 0, ',', '.') }}</td>
                                            <td style="text-align: center">
                                                <a href="/ultra_mikro/cetak?id={{ $proposal->id }}"
                                                    class="btn btn-outline-info round" target="_blank">Cetak</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->
        </div>
    </div>
    <!-- END: Content-->
@endsection
