<<<<<<< Updated upstream
@extends('kabag::layouts.main')

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
                        <h2 class="content-header-title float-start mb-0">Data Nasabah</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/pasar">Pasar</a>
                                </li>
                                <li class="breadcrumb-item active">Data Nasabah
                                </li>
                            </ol>
=======
@extends('dirbis::layouts.main')

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
                            <h2 class="content-header-title float-start mb-0">Data Nasabah</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dirbis">UMKM</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Nasabah</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Nasabah
                                    </li>
                                </ol>
                            </div>
>>>>>>> Stashed changes
                        </div>
                    </div>
                </div>
            </div>
<<<<<<< Updated upstream
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
                                    <th style="text-align: center">Nama nasabahh</th>
                                    <th style="text-align: center">Alamat</th>
                                    <th style="text-align: center">Nama Kios / Los</th>
                                    <th style="text-align: center">Alamat Pasar</th>
                                    <th style="text-align: center">Nominal Pembiayaan</th>
                                    <th style="text-align: center">Tanggal Pengajuan</th>
                                    {{-- <th style="text-align: center">AO Yang Menangani</th> --}}
                                    <th style="text-align: center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($komites as $komite)
                                    @php

                                            $history = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
                                                    ->where('pasar_pembiayaan_id', $komite->id)
                                                    ->orderby('created_at', 'desc')
                                                    ->get()
                                                    ->first();
                                    @endphp
                                    <tr>
                                        <td style="text-align: center">
                                            <button type="button"
                                                class="btn btn-icon btn-icon rounded-circle btn-flat-success">
                                                <i data-feather="eye"></i>
                                            </button>
                                        </td>
                                        <td style="text-align: center">{{ $loop->iteration }}</td>
                                        <td>{{ $komite->nasabahh->nama_nasabah }}</td>
                                        <td>{{ $komite->nasabahh->alamat }},
                                            {{ $komite->nasabahh->rt }},
                                            {{ $komite->nasabahh->rw }},
                                            {{ $komite->nasabahh->desa_kelurahan }},
                                            {{ $komite->nasabahh->kecamatan }},
                                            {{ $komite->nasabahh->kabkota }},
                                            {{ $komite->nasabahh->provinsi }}</td>
                                        <td style="text-align: center">
                                            {{ $komite->keteranganusaha->nama_usaha }}</td>
                                        <td style="text-align: center"
                                            value="{{ $komite->keteranganusaha->jenispasar->nama_pasar }}">
                                            {{ $komite->keteranganusaha->jenispasar->nama_pasar }}</td>
                                        <td style="text-align: center">{{ $komite->harga }}</td>
                                        <td style="text-align: center">{{ $komite->tgl_pembiayaan }}</td>
                                        <td style="text-align: center"><span class="badge rounded-pill badge-light-info">{{ $history->status }}</span>
                                        </td>
                                        {{-- <td style="text-align: center">{{ $komite->user->name }}</td> --}}
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
=======
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
                                        <th style="text-align: center">Nama Nasabah</th>
                                        <th style="text-align: center">NIK</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">Telepon</th>
                                        <th style="text-align: center">Detail</th>

                                       
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
                                            <td style="text-align: center">
                                            {{ $proposal->nama_nasabah }}</td>
                                            <td style="text-align: center">{{ $proposal->no_ktp }}</td>
                                            <td style="text-align: center">{{ $proposal->alamat }}, {{ $proposal->rt }},
                                                {{ $proposal->rw }}</td>
                                            <td>{{ $proposal->no_tlp}}</td>
                                            <td style="text-align: center">
                                                <a href="/dirbis/umkm/nasabah/{{ $proposal->id }}"
                                                    class="btn btn-outline-info round">Detail</a>
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
>>>>>>> Stashed changes
@endsection
