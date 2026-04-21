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
                                    <li class="breadcrumb-item"><a href="/analis/ppr">PPR</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/analis/ppr/komite">Komite</a>
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
                                        <th class="midCenter" style="vertical-align: middle;">Jenis Nasabah</th>
                                        <th class="midCenter" style="vertical-align: middle;">NIK</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nama Nasabah</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nilai yang Dimohon</th>
                                        <th class="midCenter" style="vertical-align: middle;">Jangka Waktu</th>
                                        <th class="midCenter" style="vertical-align: middle;">Status</th>
                                        <th class="midCenter" style="vertical-align: middle;">AO yang Menangani</th>
                                        <th class="midCenter" style="vertical-align: middle;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($komites as $komite)
                                        @php
                                            $history = $histories[$komite->id] ?? null;
                                        @endphp
                                        @if ($history)
                                            <tr>
                                                <td></td>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ date_format($komite->created_at, 'd-m-Y') }}</td>
                                                <td style="text-align: center">{{ $komite->jenis_nasabah }}</td>
                                                <td style="text-align: center">{{ $komite->pemohon->form_pribadi_pemohon_no_ktp }}</td>
                                                <td style="text-align: center">{{ $komite->pemohon->form_pribadi_pemohon_nama_lengkap }}</td>
                                                <td style="text-align: center">Rp. {{ number_format($komite->form_permohonan_nilai_ppr_dimohon) }}</td>
                                                <td style="text-align: center">
                                                    {{ $komite->form_permohonan_jangka_waktu_ppr }} Tahun
                                                    <br />({{ $komite->form_permohonan_jml_bulan }} Bulan)
                                                </td>
                                                <td style="text-align: center" value="{{ $history?->statushistory?->id ?? '' }},{{ $history?->jabatan?->jabatan_id ?? '' }}">
                                                    @if ($history?->statushistory?->id ?? '' == 5 || $history?->statushistory?->id ?? '' == 11)
                                                        <span class="badge rounded-pill badge-light-success">
                                                            {{ $history?->statusHistory?->keterangan ?? '' }} {{ $history?->jabatan?->keterangan ?? '' }}
                                                        </span>
                                                    @elseif ($history?->statusHistory?->id ?? '' == 9)
                                                        <span class="badge rounded-pill badge-light-success">{{ $history?->statusHistory?->keterangan ?? '' }}</span>
                                                    @elseif ($history?->statushistory?->id ?? '' == 4)
                                                        <span class="badge rounded-pill badge-light-info">
                                                            {{ $history?->statusHistory?->keterangan ?? '' }} {{ $history?->jabatan?->keterangan ?? '' }}
                                                        </span>
                                                    @else
                                                        <span class="badge rounded-pill badge-light-warning">
                                                            {{ $history?->statusHistory?->keterangan ?? '' }} {{ $history?->jabatan?->keterangan ?? '' }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td style="text-align: center">{{ $komite->user->name }}</td>
                                                <td style="text-align: center">
                                                    <a href="/analis/ppr/komite/{{ $komite->id }}" class="btn btn-outline-info round">Detail</a>
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
