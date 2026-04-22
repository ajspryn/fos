@extends('admin::layouts.main')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-body">
                <div class="row match-height">
                    {{-- Welcome Card --}}
                    <div class="col-12">
                        <div class="card card-congratulations">
                            <div class="card-body text-center">
                                <img src="{{ asset('app-assets/images/elements/decore-left.png') }}" class="congratulations-img-left" alt="" />
                                <img src="{{ asset('app-assets/images/elements/decore-right.png') }}" class="congratulations-img-right" alt="" />
                                <div class="avatar avatar-xl bg-primary shadow mb-1">
                                    <div class="avatar-content">
                                        <i data-feather="award" class="font-large-1"></i>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="mb-1 text-white">Hallo, {{ $user->name }}!</h1>
                                    <p class="card-text m-auto w-75">Awali Harimu Dengan Doa dan Selamat Bekerja.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- User Stats --}}
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="avatar bg-light-warning p-50 mb-1">
                                    <div class="avatar-content">
                                        <i data-feather="user-x" class="font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="fw-bolder {{ $usertidakadarole > 0 ? 'text-warning' : 'text-success' }}">{{ $usertidakadarole }}</h2>
                                <p class="card-text">Belum Punya Role</p>
                                @if($usertidakadarole > 0)
                                    <a href="/admin/user" class="btn btn-sm btn-warning mt-1">Lengkapi Sekarang</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="avatar bg-light-primary p-50 mb-1">
                                    <div class="avatar-content">
                                        <i data-feather="users" class="font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="fw-bolder">{{ $userlengkap }}</h2>
                                <p class="card-text">Total User</p>
                                <a href="/admin/user" class="btn btn-sm btn-outline-primary mt-1">Kelola User</a>
                            </div>
                        </div>
                    </div>

                    {{-- Pembiayaan Stats --}}
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="avatar bg-light-info p-50 mb-1">
                                    <div class="avatar-content">
                                        <i data-feather="file-text" class="font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="fw-bolder">{{ $totalSkpd + $totalUmkm + $totalPasar + $totalPpr + $totalP3k }}</h2>
                                <p class="card-text">Total Pembiayaan</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="avatar bg-light-success p-50 mb-1">
                                    <div class="avatar-content">
                                        <i data-feather="settings" class="font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="fw-bolder text-success">OK</h2>
                                <p class="card-text">Sistem Aktif</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pembiayaan Per Divisi --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Rekap Pembiayaan Per Divisi</h5>
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col">
                                        <h3 class="fw-bolder text-primary">{{ $totalSkpd }}</h3>
                                        <small class="text-muted">SKPD</small>
                                    </div>
                                    <div class="col">
                                        <h3 class="fw-bolder text-info">{{ $totalUmkm }}</h3>
                                        <small class="text-muted">UMKM</small>
                                    </div>
                                    <div class="col">
                                        <h3 class="fw-bolder text-warning">{{ $totalPasar }}</h3>
                                        <small class="text-muted">Pasar</small>
                                    </div>
                                    <div class="col">
                                        <h3 class="fw-bolder text-danger">{{ $totalPpr }}</h3>
                                        <small class="text-muted">PPR</small>
                                    </div>
                                    <div class="col">
                                        <h3 class="fw-bolder text-success">{{ $totalP3k }}</h3>
                                        <small class="text-muted">P3K</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Quick Links --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Menu Cepat</h5>
                            </div>
                            <div class="card-body d-flex flex-wrap gap-1">
                                <a href="/admin/user" class="btn btn-outline-primary"><i data-feather="users" class="me-50"></i> Kelola User</a>
                                <a href="/admin/skpd/golongan" class="btn btn-outline-secondary"><i data-feather="settings" class="me-50"></i> Parameter SKPD</a>
                                <a href="/admin/pasar/jenis-pasar" class="btn btn-outline-secondary"><i data-feather="settings" class="me-50"></i> Parameter Pasar</a>
                                <a href="/admin/ppr/fixed-income/character/motivasi" class="btn btn-outline-secondary"><i data-feather="settings" class="me-50"></i> Parameter PPR</a>
                                <a href="/admin/parameterbobot" class="btn btn-outline-info"><i data-feather="sliders" class="me-50"></i> Parameter Bobot</a>
                                <a href="/admin/status" class="btn btn-outline-dark"><i data-feather="info" class="me-50"></i> Referensi Status</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

