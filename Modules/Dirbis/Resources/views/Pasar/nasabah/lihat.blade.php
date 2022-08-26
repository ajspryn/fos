@extends('dirbis::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
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
                                    <li class="breadcrumb-item"><a href="/dirbis">Pasar</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Nasabah</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Nasabah
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Card -->
            <div class="card">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <img class="img-fluid rounded mb-75" src="{{ asset('storage/' . $fotodiri->foto) }}"
                                height="300" width="300" alt="avatar img" />
                            <div class="user-info text-center">
                                <h4>{{ $nasabah->nama_nasabah }}</h4>
                                <span class="badge bg-light-secondary">{{ $nasabah->no_ktp }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around my-2 pt-75">
                        <div class="d-flex align-items-start me-2">
                            <span class="badge bg-light-primary p-75 rounded">
                                <i data-feather="phone" class="font-medium-2"></i>
                            </span>
                            <div class="ms-75">
                                <h5 class="mb-0">{{ $nasabah->no_tlp }}</h5>
                                <small>No Telepon Genggam</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <span class="badge bg-light-primary p-75 rounded">
                                <i data-feather="home" class="font-medium-2"></i>
                            </span>
                            <div class="ms-75">
                                <h5 class="mb-0">{{ $nasabah->alamat }}, Rt
                                    {{ $nasabah->rt }}/{{ $nasabah->rw }}</h4>
                                    <small>{{ $nasabah->desa_kelurahan }} ,
                                        {{ $nasabah->kecamatan }}</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start me-2">
                            <span class="badge bg-light-primary p-75 rounded">
                                <i data-feather="briefcase" class="font-medium-2"></i>
                            </span>
                            <div class="ms-75">
                                <h5 class="mb-0"value="{{ $pembiayaan->keteranganusaha->dagang->id }}">
                                    {{ $pembiayaan->keteranganusaha->dagang->nama_jenisdagang }}</h5>
                                <small value="{{ $pembiayaan->keteranganusaha->jenispasar->id }}">
                                    Pasar {{ $pembiayaan->keteranganusaha->jenispasar->nama_pasar }}</small>
                            </div>
                        </div>
                    </div>
                    <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                    <div class="info-container">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="badge bg-light-primary">Data Diri</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Tempat / Tanggal Lahir :</span>
                                        <span> {{ $nasabah->tmp_lahir }} /
                                            {{ $nasabah->tgl_lahir }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Jenis Kelamin :</span>
                                        <span>{{ $nasabah->jk_id }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Agama : </span>
                                        <span>{{ $nasabah->agama_id }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Nama Ibu Kandung</span>
                                        <span> {{ $nasabah->nama_ibu }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Status Perkawinan :</span>
                                        <span {{ $nasabah->status->id }}>
                                            {{ $nasabah->status->nama_status_perkawinan }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Nama Pasangan :</span>
                                        <span> {{ $nasabah->nama_pasangan }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5 class="badge bg-light-primary">Data Pekerjaan</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Pekerjaan : </span>
                                        <span value="{{ $pembiayaan->keteranganusaha->dagang->id }}">
                                            {{ $pembiayaan->keteranganusaha->dagang->nama_jenisdagang }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Nama Usaha : </span>
                                        <span>{{ $pembiayaan->keteranganusaha->nama_usaha }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Lama Usaha : </span>
                                        <span value="{{ $pembiayaan->keteranganusaha->lamadagang->id }}">
                                            {{ $pembiayaan->keteranganusaha->lamadagang->nama_lamaberdagang }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Alamat Pasar : </span>
                                        <span value="{{ $pembiayaan->keteranganusaha->jenispasar->id }}">
                                            {{ $pembiayaan->keteranganusaha->jenispasar->nama_pasar }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">No. Blok Kios / Los : </span>
                                        <span>
                                            {{ $pembiayaan->keteranganusaha->no_blok }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Omset Perbulan :</span>
                                        <span>
                                            Rp. {{ number_format($pembiayaan->omset) }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /User Card -->
        <!-- Plan Card -->
        <div class="card border-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <h5 class="badge bg-light-primary">History Pembiayaan Nasabah</h5>
                    <div class="d-flex justify-content-center">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 5%;" class="py-1">No</th>
                                <th style="text-align: center" class="py-1">Tanggal Pembiayaan</th>
                                <th style="text-align: center" class="py-1">
                                    Plafond
                                </th>
                                <th style="text-align: center" class="py-1">
                                    Tenor
                                </th>
                                <th style="text-align: center" class="py-1">
                                    Margin
                                </th>
                                <th style="text-align: center" class="py-1">
                                    Angsuran
                                </th>
                                <th style="text-align: center" class="py-1">
                                    Agunan
                                </th>
                                <th style="text-align: center" class="py-1">
                                    Detail
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                @php
                                    $tenor = $data->tenor;
                                    $harga = $data->harga;
                                    $rate = $data->rate;
                                    $margin = ($rate * $tenor) / 100;
                                    
                                    $harga1 = $harga * $margin;
                                    $harga_jual = $harga1 + $harga;
                                    
                                    $angsuran1 = (int) ($harga_jual / $tenor);
                                @endphp
                                <tr>
                                    <td style="text-align: center">
                                        {{ $loop->iteration }}</td>
                                    <td style="text-align: center">{{ $data->tgl_pembiayaan }} </td>
                                    <td style="text-align: center">Rp. {{ number_format($data->harga) }}
                                    </td>
                                    <td style="text-align: center">{{ $data->tenor }} Bulan
                                    </td>
                                    <td style="text-align: center">
                                        {{ $data->rate }} %
                                    </td>
                                    <td style="text-align: center">Rp. {{ number_format($angsuran1) }}
                                    </td>
                                    <td style="text-align: center">
                                        {{ $jaminans->nama_jaminan }}
                                    </td>
                                    <td style="text-align: center">
                                        <a href="/dirbis/pasar/komite/{{ $data->id }}"
                                            class="btn btn-outline-info round">Detail</a>
                                    </td>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/ User Sidebar -->

    <!-- User Content -->
@endsection
