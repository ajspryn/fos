@extends('admin::layouts.main')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-body">

                {{-- Welcome + Aging Alert --}}
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card card-congratulations">
                            <div class="card-body text-center">
                                <img src="{{ asset('app-assets/images/elements/decore-left.png') }}" class="congratulations-img-left" alt="" />
                                <img src="{{ asset('app-assets/images/elements/decore-right.png') }}" class="congratulations-img-right" alt="" />
                                <div class="avatar avatar-xl bg-primary shadow mb-1">
                                    <div class="avatar-content"><i data-feather="award" class="font-large-1"></i></div>
                                </div>
                                <h1 class="mb-1 text-white">Hallo, {{ $user->name }}!</h1>
                                <p class="card-text m-auto w-75">Awali Harimu Dengan Doa dan Selamat Bekerja.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Aging Alert --}}
                @if ($agingCount > 0)
                    <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center gap-1 mb-2" role="alert">
                        <i data-feather="clock" class="text-warning"></i>
                        <strong>Perhatian!</strong>&nbsp; Ada <strong>{{ $agingCount }}</strong> pengajuan yang tertahan lebih dari 3 hari dan belum selesai.
                        <a href="/admin/monitoring" class="ms-2 btn btn-sm btn-warning">Lihat Monitoring</a>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- User tidak ada role alert --}}
                @if ($usertidakadarole > 0)
                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-1 mb-2" role="alert">
                        <i data-feather="user-x" class="text-danger"></i>
                        <strong>{{ $usertidakadarole }}</strong>&nbsp; user belum memiliki role.
                        <a href="/admin/user" class="ms-2 btn btn-sm btn-danger">Lengkapi Sekarang</a>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- Stat Cards Row 1 --}}
                <div class="row">
                    <div class="col-xxl-3 col-md-6 mb-2">
                        <div class="card card-statistics">
                            <div class="card-header pb-0">
                                <h6 class="card-title mb-0">Total User</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div>
                                        <h2 class="fw-bolder mb-0">{{ $userlengkap }}</h2>
                                        <small class="text-muted">Pengguna Aktif</small>
                                    </div>
                                    <div class="avatar bg-light-primary p-50">
                                        <div class="avatar-content"><i data-feather="users"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6 mb-2">
                        <div class="card card-statistics">
                            <div class="card-header pb-0">
                                <h6 class="card-title mb-0">Pengajuan Hari Ini</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div>
                                        <h2 class="fw-bolder mb-0 text-success">{{ $todayTotal }}</h2>
                                        <small class="text-muted">Pengajuan Baru</small>
                                    </div>
                                    <div class="avatar bg-light-success p-50">
                                        <div class="avatar-content"><i data-feather="calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6 mb-2">
                        <div class="card card-statistics">
                            <div class="card-header pb-0">
                                <h6 class="card-title mb-0">Menumpuk (>3 Hari)</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div>
                                        <h2 class="fw-bolder mb-0 {{ $agingCount > 0 ? 'text-warning' : 'text-muted' }}">{{ $agingCount }}</h2>
                                        <small class="text-muted">Perlu Ditindaklanjuti</small>
                                    </div>
                                    <div class="avatar {{ $agingCount > 0 ? 'bg-light-warning' : 'bg-light-secondary' }} p-50">
                                        <div class="avatar-content"><i data-feather="alert-triangle"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6 mb-2">
                        <div class="card card-statistics">
                            <div class="card-header pb-0">
                                <h6 class="card-title mb-0">Total Pembiayaan</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div>
                                        <h2 class="fw-bolder mb-0">{{ $totalSkpd + $totalUmkm + $totalPasar + $totalPpr + $totalP3k }}</h2>
                                        <small class="text-muted">Seluruh Modul</small>
                                    </div>
                                    <div class="avatar bg-light-info p-50">
                                        <div class="avatar-content"><i data-feather="briefcase"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Pengajuan Hari Ini per Modul --}}
                <div class="row mb-2">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0"><i data-feather="calendar" class="me-1"></i> Pengajuan Hari Ini — {{ now()->isoFormat('D MMMM YYYY') }}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col">
                                        <h3 class="fw-bolder text-warning mb-0">{{ $todaySkpd }}</h3>
                                        <small class="text-muted">SKPD</small>
                                    </div>
                                    <div class="col">
                                        <h3 class="fw-bolder text-success mb-0">{{ $todayUmkm }}</h3>
                                        <small class="text-muted">UMKM</small>
                                    </div>
                                    <div class="col">
                                        <h3 class="fw-bolder text-info mb-0">{{ $todayPasar }}</h3>
                                        <small class="text-muted">Pasar</small>
                                    </div>
                                    <div class="col">
                                        <h3 class="fw-bolder text-danger mb-0">{{ $todayP3k }}</h3>
                                        <small class="text-muted">P3K</small>
                                    </div>
                                    <div class="col">
                                        <h3 class="fw-bolder text-secondary mb-0">{{ $todayPpr }}</h3>
                                        <small class="text-muted">PPR</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Rekap Per Divisi + Status Distribusi --}}
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header pb-1">
                                <h5 class="mb-0"><i data-feather="pie-chart" class="me-1"></i> Rekap Pembiayaan Per Divisi</h5>
                            </div>
                            <div class="card-body p-1">
                                <div class="row text-center">
                                    <div class="col">
                                        <h3 class="fw-bolder text-warning mb-0">{{ $totalSkpd }}</h3>
                                        <small class="text-muted">SKPD</small>
                                    </div>
                                    <div class="col">
                                        <h3 class="fw-bolder text-success mb-0">{{ $totalUmkm }}</h3>
                                        <small class="text-muted">UMKM</small>
                                    </div>
                                    <div class="col">
                                        <h3 class="fw-bolder text-info mb-0">{{ $totalPasar }}</h3>
                                        <small class="text-muted">Pasar</small>
                                    </div>
                                    <div class="col">
                                        <h3 class="fw-bolder text-danger mb-0">{{ $totalP3k }}</h3>
                                        <small class="text-muted">P3K</small>
                                    </div>
                                    <div class="col">
                                        <h3 class="fw-bolder text-secondary mb-0">{{ $totalPpr }}</h3>
                                        <small class="text-muted">PPR</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header pb-1">
                                <h5 class="mb-0"><i data-feather="bar-chart-2" class="me-1"></i> Distribusi Status Pengajuan</h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <tbody>
                                            @foreach ($statusDist as $s)
                                                <tr class="align-middle">
                                                    <td class="ps-2 py-2">
                                                        <span class="text-body">{{ $s->keterangan }}</span>
                                                    </td>
                                                    <td class="pe-2 py-2 text-end">
                                                        <h5 class="fw-bolder mb-0">{{ $s->total }}</h5>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- AO Performance + Recent Submissions --}}
                <div class="row mb-2">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center pb-1">
                                <h5 class="mb-0"><i data-feather="trending-up" class="me-1"></i> Top AO (Total Pengajuan)</h5>
                                <a href="/admin/ao-performance" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead><tr><th class="ps-2">#</th><th>Nama AO</th><th class="pe-2 text-end">Total</th></tr></thead>
                                        <tbody>
                                            @forelse ($aoPerformance as $i => $ao)
                                                <tr class="align-middle">
                                                    <td class="ps-2 py-2">{{ $i + 1 }}</td>
                                                    <td class="py-2">{{ $ao->name }}</td>
                                                    <td class="pe-2 py-2 text-end"><h6 class="fw-bolder mb-0">{{ $ao->total }}</h6></td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="3" class="text-center py-3 text-muted">Belum ada data AO</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center pb-1">
                                <h5 class="mb-0"><i data-feather="clock" class="me-1"></i> Pengajuan Terbaru</h5>
                                <a href="/admin/monitoring" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead><tr><th class="ps-2">Modul</th><th>Nama</th><th class="pe-2">Tanggal</th></tr></thead>
                                        <tbody>
                                            @forelse ($recentSubmissions as $r)
                                                <tr class="align-middle">
                                                    <td class="ps-2">
                                                        @php $rc = match($r->type){ 'pasar'=>'info','skpd'=>'warning','umkm'=>'success','p3k'=>'danger','ppr'=>'secondary',default=>'primary' }; @endphp
                                                        <span class="badge badge-light-{{ $rc }} py-1">{{ strtoupper($r->type) }}</span>
                                                    </td>
                                                    <td class="py-2">
                                                        <a href="/admin/monitoring/{{ $r->type }}/{{ $r->id }}" class="text-body">{{ $r->nama }}</a>
                                                    </td>
                                                    <td class="pe-2 py-2 text-muted small">{{ $r->tgl }}</td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="3" class="text-center py-3 text-muted">Belum ada pengajuan</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Quick Links --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header pb-1">
                                <h5 class="mb-0"><i data-feather="zap" class="me-1"></i> Menu Cepat</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="/admin/monitoring" class="btn btn-outline-primary btn-sm"><i data-feather="activity" class="me-50"></i> Monitoring</a>
                                    <a href="/admin/user" class="btn btn-outline-primary btn-sm"><i data-feather="users" class="me-50"></i> Kelola User</a>
                                    <a href="/admin/ao-performance" class="btn btn-outline-info btn-sm"><i data-feather="trending-up" class="me-50"></i> Performa AO</a>
                                    <a href="/admin/activity-log" class="btn btn-outline-secondary btn-sm"><i data-feather="list" class="me-50"></i> Log Aktivitas</a>
                                    <a href="/admin/parameterbobot" class="btn btn-outline-info btn-sm"><i data-feather="sliders" class="me-50"></i> Parameter Bobot</a>
                                    <a href="/admin/status" class="btn btn-outline-dark btn-sm"><i data-feather="info" class="me-50"></i> Referensi Status</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

