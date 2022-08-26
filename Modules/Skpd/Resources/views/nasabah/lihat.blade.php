@extends('skpd::layouts.main')

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
                                    <li class="breadcrumb-item"><a href="/skpd">SKPD</a>
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
                                <h5 class="mb-0">{{ $nasabah->no_telp }}</h5>
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
                                <h5 class="mb-0">
                                    {{ $pembiayaan->instansi->nama_instansi }}</h5>
                                <small value="{{ $pembiayaan->golongan->id }}">
                                    Golongan {{ $pembiayaan->golongan->nama_golongan }}</small>
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
                                        <span> {{ $nasabah->tempat_lahir }} /
                                            {{ $nasabah->tgl_lahir }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Status Perkawinan :</span>
                                        <span value="{{ $nasabah->status_perkawinan->id }}">
                                            {{ $nasabah->status_perkawinan->nama_status_perkawinan }}</span>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5 class="badge bg-light-primary">Data Pekerjaan</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Pekerjaan : </span>
                                        <span value="{{ $pembiayaan->golongan->id }}">
                                            Golongan {{ $pembiayaan->golongan->nama_golongan }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25"> Nama Instansi : </span>
                                        <span> {{ $pembiayaan->instansi->nama_instansi }}</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center pt-2">
                        <a href="/" class="btn btn-primary me-1" data-bs-target="#ajukan" data-bs-toggle="modal">
                            Ajukan Pembiayaan Baru
                        </a>
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
                                <tr>
                                    <td style="text-align: center">
                                        {{ $loop->iteration }}</td>
                                    <td style="text-align: center">{{ $data->tanggal_pengajuan }} </td>
                                    <td style="text-align: center">Rp. {{ number_format($data->nominal_pembiayaan) }}
                                    </td>
                                    <td style="text-align: center">{{ $data->tenor }} Bulan
                                    </td>
                                    <td style="text-align: center">
                                        {{ $data->rate }} %
                                    </td>
                                    <td style="text-align: center">Rp. {{ number_format($angsuran) }}
                                    </td>
                                    <td style="text-align: center">
                                        {{ $data->jaminan->jenis_jaminan->nama_jaminan }}
                                    </td>
                                    <td style="text-align: center">
                                        <a href="/skpd/komite/{{ $data->id }}"
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
                            <a href="/form/skpd/{{ $pembiayaan->id }}/edit" type="submit"
                                class="btn btn-primary me-1 mt-1">Yes</a>
                            <button type="reset" class="btn btn-outline-secondary mt-1" data-bs-dismiss="modal"
                                aria-label="Close">
                                Cancel
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ User Sidebar -->

    <!-- User Content -->
@endsection
