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
                            <h2 class="content-header-title mb-0">Data Nasabah</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/p3k">P3K</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/p3k/nasabah">Data Nasabah</a>
                                    </li>
                                    <li class="breadcrumb-item active">Detail Data Nasabah
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Card -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail Data Nasabah</h4>
                    </div>
                    <div class="card-body">
                    <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <img class="img-fluid rounded mb-75"
                                src="{{ $fotoKtp ? asset('storage/' . $fotoKtp->foto) : asset('app-assets/images/portrait/small/avatar-s-11.jpg') }}"
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
                                <h5 class="mb-0">{{ $nasabah->no_hp }}</h5>
                                <small>No. Handphone</small>
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
                                <h5 class="mb-0">
                                    {{ optional(optional(optional($pembiayaan)->nasabah)->pekerjaan)->nama_unit_kerja }}</h5>
                                <small> {{ optional(optional(optional($pembiayaan)->nasabah)->pekerjaan)->jabatan }}</small>
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
                                        <span class="fw-bolder me-25">Tempat, Tanggal Lahir :</span>
                                        <span> {{ $nasabah->tempat_lahir }},
                                            {{ strftime('%d %B %Y', strtotime($nasabah->tgl_lahir)) }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Status Pernikahan :</span>
                                        {{ $nasabah->status_pernikahan }}</span>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5 class="badge bg-light-primary">Data Pekerjaan</h5>
                                <ul class="list-unstyled">

                                    <li class="mb-75">
                                        <span class="fw-bolder me-25"> Nama Unit Kerja : </span>
                                        <span> {{ optional(optional(optional($pembiayaan)->nasabah)->pekerjaan)->nama_unit_kerja }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25"> Jabatan : </span>
                                        <span> {{ optional(optional(optional($pembiayaan)->nasabah)->pekerjaan)->jabatan }}</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center pt-2">
                        <a href="javascript:void(0);" class="btn btn-primary me-1" data-bs-target="#ajukan" data-bs-toggle="modal">
                            Ajukan Pembiayaan Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /User Card -->
        <!-- Plan Card -->
        <div class="card border-primary">
            <div class="card-header">
                <h4 class="card-title">History Pembiayaan Nasabah</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="d-flex justify-content-center">
                    </div>


                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 5%;" class="py-1">No.</th>
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
                                    Detail
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td style="text-align: center">
                                        {{ $loop->iteration }}</td>
                                    <td style="text-align: center">
                                        {{ strftime('%d %B %Y', strtotime($data->tanggal_pengajuan)) }} </td>
                                    <td style="text-align: center">Rp
                                        {{ number_format($data->nominal_pembiayaan, 0, ',', '.') }}
                                    </td>
                                    <td style="text-align: center">{{ $data->tenor }} Bulan
                                    </td>
                                    <td style="text-align: center">
                                        {{ number_format($data->rate, 2, ',', '.') }} %
                                    </td>
                                    <td style="text-align: center">Rp {{ number_format($angsuran, 0, ',', '.') }}
                                    </td>
                                    <td style="text-align: center">
                                        <a href="/p3k/komite/{{ $data->id }}"
                                            class="btn btn-outline-info round">Detail</a>
                                    </td>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /Plan Card -->
        <div class="modal fade" id="ajukan" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-sm-5 mx-50 pb-5">
                        <h1 class="text-center mb-1" id="addNewCardTitle">
                            Apakah Anda Yakin Untuk Mengajukan Pembiayaan Baru ?
                        </h1>
                        <p class="text-center"></p>
                        <div class="col-12 text-center">
                            <a href="/form/p3k/{{ $pembiayaan->id ?? $nasabah->id }}/edit" type="submit"
                                class="btn btn-primary me-1 mt-1">Ya</a>
                            <button type="reset" class="btn btn-outline-secondary mt-1" data-bs-dismiss="modal"
                                aria-label="Close">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ User Sidebar -->

    <!-- User Content -->
@endsection
