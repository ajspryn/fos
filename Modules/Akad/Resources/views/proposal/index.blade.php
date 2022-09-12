@extends('akad::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Data Proposal Akad</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/staff">Staff</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Proposal</a>
                                    </li>
                                    <li class="breadcrumb-item active">Proposal Akad
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic table -->
                <h4 class="card-title">SKPD</h4>
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">Tanggal Pengajuan</th>
                                            <th style="text-align: center">Nama Nasabah</th>
                                            <th style="text-align: center">Actionn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($proposalskpds as $proposalskpd)
                                            @php
                                                $proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
                                                    ->where('id', $proposalskpd->skpd_pembiayaan_id)
                                                    ->get()
                                                    ->first();
                                            @endphp

                                            <tr>

                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $proposal_skpd->tanggal_pengajuan }}
                                                </td>
                                                <td style="text-align: center">
                                                    {{ $proposal_skpd->nasabah->nama_nasabah }}</td>
                                                <td style="text-align: center">
                                                    <a href="/" class="btn btn-outline-info round">Detail</a>
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
                <h4 class="card-title">PASAR</h4>
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">Tanggal Pengajuan</th>
                                            <th style="text-align: center">Nama Nasabah</th>
                                            <th style="text-align: center">Actionn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($proposalpasars as $proposalpasar)
                                            @php
                                                $proposal_pasar = Modules\Pasar\Entities\PasarPembiayaan::select()
                                                    ->where('id', $proposalpasar->pasar_pembiayaan_id)
                                                    ->get()
                                                    ->first();
                                            @endphp

                                            <tr>

                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $proposal_pasar->tgl_pembiayaan }}
                                                </td>
                                                <td style="text-align: center">
                                                    {{ $proposal_pasar->nasabahh->nama_nasabah }}</td>
                                                <td style="text-align: center">
                                                    <a href="/" class="btn btn-outline-info round">Detail</a>
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
                <!--/ Basic table -->
                <h4 class="card-title">UMKM</h4>
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">Tanggal Pengajuan</th>
                                            <th style="text-align: center">Nama Nasabah</th>
                                            <th style="text-align: center">Actionn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($proposalumkms as $proposalumkm)
                                            @php
                                                $proposal_umkm = Modules\Umkm\Entities\UmkmPembiayaan::select()
                                                    ->where('id', $proposalumkm->umkm_pembiayaan_id)
                                                    ->get()
                                                    ->first();
                                            @endphp

                                            <tr>

                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $proposal_umkm->tgl_pembiayaan }}
                                                </td>
                                                <td style="text-align: center">
                                                    {{ $proposal_umkm->nasabahh->nama_nasabah }}</td>
                                                <td style="text-align: center">
                                                    <a href="/" class="btn btn-outline-info round">Detail</a>
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

                <!--/ Basic table -->
                <h4 class="card-title">PPR</h4>
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">Tanggal Pengajuan</th>
                                            <th style="text-align: center">Nama Nasabah</th>
                                            <th style="text-align: center">Actionn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($proposalpprs as $proposalppr)
                                            @php
                                                $proposal_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
                                                    ->where('id', $proposalppr->form_ppr_pembiayaan_id)
                                                    ->get()
                                                    ->first();
                                            @endphp

                                            <tr>

                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">
                                                    {{ date_format($proposal_ppr->created_at, 'd-m-Y') }}
                                                </td>
                                                <td style="text-align: center">
                                                    {{ $proposal_ppr->pemohon->form_pribadi_pemohon_nama_lengkap }}</td>
                                                <td style="text-align: center">
                                                    <a href="/" class="btn btn-outline-info round">Detail</a>
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
    </div>
@endsection
<
