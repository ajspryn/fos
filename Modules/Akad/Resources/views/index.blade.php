@extends('akad::layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <!-- Greeting Card -->
                    <div class="col-12 mb-4">
                        <div class="card" style="background: linear-gradient(118deg, #7367f0, rgba(115,103,240,.7));">
                            <div class="card-body d-flex align-items-center py-3">
                                <div class="avatar avatar-xl me-3" style="background-color: rgba(255,255,255,0.2); border-radius: 50%;">
                                    <div class="avatar-content">
                                        <i data-feather="award" class="text-white" style="width:28px;height:28px;"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="mb-1 text-white">Hallo {{ $user->name }},</h4>
                                    <p class="card-text text-white mb-0">
                                        Awali Harimu Dengan Doa dan Selamat Bekerja.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Greeting Card -->

                    <div class="row">
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-info p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="clipboard" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">
                                        {{ $proposalskpd + $proposalpasar + $proposalumkm + $proposalppr + $proposalP3k }}
                                    </h2>
                                    <p class="card-text">Proposal Akad</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-danger p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="x-circle" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">{{ $akadBatal }}</h2>
                                    <p class="card-text">Akad Batal</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-success p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="check-circle" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">{{ $akadSelesai }}</h2>
                                    <p class="card-text">Akad Selesai</p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-info p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="eye" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">0</h2>
                                    <p class="card-text">Komite</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-info p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="eye" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">0</h2>
                                    <p class="card-text">Disburse</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
