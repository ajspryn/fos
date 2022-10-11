@extends('admin::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row match-height">
                    <!-- Congratulations Card -->
                    <div class="col-12 col-md-6 col-lg-12">
                      <div class="card card-congratulations">
                        <div class="card-body text-center">
                          <img
                            src="../../../app-assets/images/elements/decore-left.png"
                            class="congratulations-img-left"
                            alt="card-img-left"
                          />
                          <img
                            src="../../../app-assets/images/elements/decore-right.png"
                            class="congratulations-img-right"
                            alt="card-img-right"
                          />
                          <div class="avatar avatar-xl bg-primary shadow">
                            <div class="avatar-content">
                              <i data-feather="award" class="font-large-1"></i>
                            </div>
                          </div>
                          <div class="text-center">
                            <h1 class="mb-1 text-white">Hallo {{ $user->name }},</h1>
                            <p class="card-text m-auto w-75">
                              Awali Harimu Dengan Doa dan Selamat Bekerja.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--/ Congratulations Card -->
                    <div class="row">
                        <div class="col-xl-6 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-info p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="eye" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">{{ $usertidakadarole }}</h2>
                                    <p class="card-text">Lengkapi Role User</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-6 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-info p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="eye" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">{{ $userlengkap }}</h2>
                                    <p class="card-text">Total User</p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
