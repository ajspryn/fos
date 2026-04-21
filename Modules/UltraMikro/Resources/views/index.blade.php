@extends('UltraMikro::layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="dashboard-ecommerce">

                    <div class="row mb-2">
                        {{-- Welcome Card --}}
                        <div class="col-xl-4 col-md-6 col-12 mb-2 mb-md-0">
                            <div class="card h-100 mb-0">
                                <div class="card-body" style="background:linear-gradient(118deg,#7367f0,rgba(115,103,240,.7));border-radius:inherit;">
                                    <div class="d-flex justify-content-between align-items-start mb-1">
                                        <div>
                                            <h5 class="text-white mb-25">{{ Auth::user()->name }}</h5>
                                            <p class="text-white font-small-3 mb-0">Dashboard Ultra Mikro</p>
                                        </div>
                                        <div class="avatar bg-white p-50">
                                            <div class="avatar-content">
                                                <i data-feather="activity" class="text-primary font-medium-3"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white rounded p-1 mt-2">
                                        <p class="mb-0 text-body font-small-3">
                                            <i data-feather="info" class="font-small-3 me-25"></i>
                                            Data dashboard sedang dalam pengembangan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Info Card --}}
                        <div class="col-xl-8 col-md-6 col-12">
                            <div class="card h-100 mb-0">
                                <div class="card-header">
                                    <h4 class="card-title">Informasi Modul Ultra Mikro</h4>
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <div class="text-center py-3">
                                        <div class="avatar bg-light-primary p-50 mb-2" style="width:60px;height:60px;">
                                            <div class="avatar-content" style="width:60px;height:60px;">
                                                <i data-feather="layers" style="width:28px;height:28px;" class="text-primary"></i>
                                            </div>
                                        </div>
                                        <h4 class="fw-bolder mb-1">Modul Ultra Mikro</h4>
                                        <p class="text-muted mb-0">Statistik dan grafik untuk modul ini sedang dalam proses pengembangan.</p>
                                        <p class="text-muted">Silakan gunakan menu di samping untuk mengakses fitur yang tersedia.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Quick Action Cards --}}
                    <div class="row g-3">
                        <div class="col-xl-3 col-md-6 col-6">
                            <div class="card text-center mb-0">
                                <div class="card-body">
                                    <div class="avatar bg-light-primary p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="file-plus" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <p class="card-text mb-0 fw-bold">Pengajuan</p>
                                    <p class="card-text font-small-3 text-muted">Buat proposal baru</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-6">
                            <div class="card text-center mb-0">
                                <div class="card-body">
                                    <div class="avatar bg-light-warning p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="clock" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <p class="card-text mb-0 fw-bold">Proses</p>
                                    <p class="card-text font-small-3 text-muted">Proposal dalam proses</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-6">
                            <div class="card text-center mb-0">
                                <div class="card-body">
                                    <div class="avatar bg-light-info p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="users" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <p class="card-text mb-0 fw-bold">Nasabah</p>
                                    <p class="card-text font-small-3 text-muted">Data nasabah</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-6">
                            <div class="card text-center mb-0">
                                <div class="card-body">
                                    <div class="avatar bg-light-success p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="check-circle" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <p class="card-text mb-0 fw-bold">Disetujui</p>
                                    <p class="card-text font-small-3 text-muted">Proposal disetujui</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
