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
                            <h2 class="content-header-title float-start mb-0">Data Proposal</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/skpd">SKPD</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Proposal</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Pengajuan
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Profile Card -->
            {{-- @foreach ($proposals as $proposal)
            @php
            $fotoktp=Modules\Skpd\Entities\SkpdFoto::select()->where('skpd_pembiayaan_id',$proposal->id)->where('kategori', 'foto ktp')->get()->first();
            $fotodiri=Modules\Skpd\Entities\SkpdFoto::select()->where('skpd_pembiayaan_id',$proposal->id)->where('kategori', 'foto diri')->get()->first();
            @endphp
                <div class="col-lg-12 col-md-6 col-12">
                    <div class="card card-profile">
                        <img src="{{ asset('storage/' . $fotoktp) }}"
                            class="img-fluid card-img-top" alt="Profile Cover Photo" />
                        <div class="card-body">
                            <div class="profile-image-wrapper">
                                <div class="profile-image">
                                    <div class="avatar">
                                        <img src="{{ asset('storage/' . $fotoktp) }}"
                                            alt="Profile Picture" />
                                    </div>
                                </div>
                            </div>
                            <h3>Curtis Stone</h3>
                            <h6 class="text-muted">Malaysia</h6>
                            <span class="badge badge-light-primary profile-badge">Pro Level</span>
                            <hr class="mb-2" />
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted fw-bolder">Followers</h6>
                                    <h3 class="mb-0">10.3k</h3>
                                </div>
                                <div>
                                    <h6 class="text-muted fw-bolder">Projects</h6>
                                    <h3 class="mb-0">156</h3>
                                </div>
                                <div>
                                    <h6 class="text-muted fw-bolder">Rank</h6>
                                    <h3 class="mb-0">23</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach --}}
            <!--/ Profile Card -->
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
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">Instansi</th>
                                        <th style="text-align: center">Golongan</th>
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
                                            <td>{{ $proposal->nasabah->nama_nasabah }}</td>
                                            <td>{{ $proposal->nasabah->alamat }}, {{ $proposal->nasabah->rt }},
                                                {{ $proposal->nasabah->rw }}, {{ $proposal->nasabah->desa_kelurahan }},
                                                {{ $proposal->nasabah->kecamatan }}, {{ $proposal->nasabah->kabkota }},
                                                {{ $proposal->nasabah->provinsi }}</td>
                                            <td style="text-align: center">{{ $proposal->instansi->nama_instansi }}</td>
                                            <td style="text-align: center">{{ $proposal->golongan->nama_golongan }}</td>
                                            <td style="text-align: center">Rp.
                                                {{ number_format($proposal->nominal_pembiayaan) }}</td>
                                            <td style="text-align: center">
                                                <a href="/skpd/proposal/{{ $proposal->id }}"
                                                    class="btn btn-outline-info round">Lengkapi</a>
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
