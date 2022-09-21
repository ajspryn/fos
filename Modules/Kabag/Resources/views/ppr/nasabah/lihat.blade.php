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
                                    <li class="breadcrumb-item"><a href="/kabag/ppr">PPR</a>
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
                            {{-- <img class="img-fluid rounded mb-75" src="{{ asset('storage/' . $fotodiri->foto) }}"
                                height="300" width="300" alt="avatar img" /> --}}
                            <div class="user-info text-center">
                                <h4>{{ $nasabah->form_pribadi_pemohon_nama_lengkap }}</h4>
                                <span class="badge bg-light-secondary">{{ $nasabah->form_pribadi_pemohon_no_ktp }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around my-2 pt-75">
                        <div class="d-flex align-items-start me-2">
                            <span class="badge bg-light-primary p-75 rounded">
                                <i data-feather="phone" class="font-medium-2"></i>
                            </span>
                            <div class="ms-75">
                                <h5 class="mb-0">{{ $nasabah->form_pribadi_pemohon_no_handphone }}</h5>
                                <small>No. Telepon</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <span class="badge bg-light-primary p-75 rounded">
                                <i data-feather="home" class="font-medium-2"></i>
                            </span>
                            <div class="ms-75">
                                <h5 class="mb-0">{{ $nasabah->form_pribadi_pemohon_alamat_ktp }}, RT
                                    {{ $nasabah->form_pribadi_pemohon_alamat_ktp_rt }} RW
                                    {{ $nasabah->form_pribadi_pemohon_alamat_ktp_rw }}
                                    </h4>
                                    <small>{{ $nasabah->form_pribadi_pemohon_alamat_ktp_kelurahan }} ,
                                        {{ $nasabah->form_pribadi_pemohon_alamat_ktp_kecamatan }}</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start me-2">
                            <span class="badge bg-light-primary p-75 rounded">
                                <i data-feather="briefcase" class="font-medium-2"></i>
                            </span>
                            <div class="ms-75">
                                <h5 class="mb-0">
                                    {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_nama }}</h5>
                                <small>
                                    {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_pangkat_gol_jabatan }}</small>
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
                                        <span class="fw-bolder me-25">Tempat, tanggal lahir:</span>
                                        <span> {{ $nasabah->form_pribadi_pemohon_tempat_lahir }},
                                            {{ $nasabah->form_pribadi_pemohon_tanggal_lahir }}</span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Status Pernikahan:</span>
                                        <span>
                                            {{ $nasabah->form_pribadi_pemohon_status_pernikahan }}</span>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5 class="badge bg-light-primary">Data Pekerjaan</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Pekerjaan: </span>
                                        <span>
                                            {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_pangkat_gol_jabatan }}</small>
                                        </span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25"> Nama Instansi: </span>
                                        <span>
                                            {{ $pembiayaan->pekerjaan->form_pekerjaan_pemohon_nama }}</span>
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
                                <tr>
                                    <td style="text-align: center">
                                        {{ $loop->iteration }}</td>
                                    <td style="text-align: center">{{ date_format($data->created_at, 'd-m-Y') }} </td>
                                    <td style="text-align: center">Rp.
                                        {{ number_format($data->form_permohonan_nilai_ppr_dimohon) }}
                                    </td>
                                    <td style="text-align: center">{{ $data->form_permohonan_jml_bulan }} Bulan
                                    </td>
                                    <td style="text-align: center">
                                        %
                                    </td>
                                    <td style="text-align: center">Rp.
                                        {{ number_format($data->form_penghasilan_pengeluaran_kemampuan_mengangsur) }}
                                    </td>
                                    <td style="text-align: center">

                                    </td>
                                    <td style="text-align: center">
                                        <a href="/kabag/ppr/komite/{{ $data->id }}" class="btn btn-outline-info round">Detail
                                        </a>
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
