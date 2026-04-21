@extends('analis::layouts.main')

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
                                    <li class="breadcrumb-item"><a href="/analis/ultra_mikro">Ultra Mikro</a>
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
                            <div class="card-datatable table-responsive pt-0">
                                <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="midCenter" style="vertical-align: middle;">No.</th>
                                        <th class="midCenter" style="vertical-align: middle;">Tanggal Pengajuan</th>
                                        <th class="midCenter" style="vertical-align: middle;">NIK</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nama Nasabah</th>
                                        <th class="midCenter" style="vertical-align: middle;">Pekerjaan/Usaha</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nilai yang Dimohon
                                        </th>
                                        <th class="midCenter" style="vertical-align: middle;">Jangka Waktu</th>
                                        <th class="midCenter" style="vertical-align: middle;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        @php
                                            $history = $histories[$proposal->id] ?? null;
                                        @endphp
                                        @if ($history && (($history->status_id == 11 && $history->jabatan_id == 1) || ($history->status_id == 4 && $history->jabatan_id == 3)))
                                            <tr>
                                                <td></td>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">
                                                    {{ strtoupper(strftime('%d %B %Y', strtotime($proposal->tanggal_pengajuan))) }}
                                                </td>
                                                <td style="text-align: center">
                                                    {{ $proposal->nasabah->no_ktp }}</td>
                                                <td style="text-align: center">
                                                    {{ $proposal->nasabah->nama_nasabah }}</td>
                                                <td style="text-align: center">
                                                    {{ $proposal->nasabah->nama_pekerjaan }}</td>
                                                <td style="text-align: center">
                                                    Rp{{ number_format($proposal->nominal_pembiayaan, 0, ',', '.') }}
                                                </td>
                                                <td style="text-align: center">
                                                    {{ $proposal->tenor }} Bulan
                                                </td>
                                                <td>
                                                    <a href="/analis/ultra_mikro/komite/{{ $proposal->id }}"
                                                        class="btn btn-outline-info round">Detail</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
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
