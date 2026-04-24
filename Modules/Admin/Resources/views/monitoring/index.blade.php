@extends('admin::layouts.main')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">

            {{-- Breadcrumb --}}
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Monitoring Pengajuan</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Monitoring Pengajuan</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Summary Cards --}}
            <div class="row mb-2">
                @php
                    $modules = [
                        ['key' => 'semua', 'label' => 'Semua',  'icon' => 'layers',    'color' => 'primary'],
                        ['key' => 'pasar', 'label' => 'Pasar',  'icon' => 'shopping-bag','color' => 'info'],
                        ['key' => 'skpd',  'label' => 'SKPD',   'icon' => 'briefcase', 'color' => 'warning'],
                        ['key' => 'umkm',  'label' => 'UMKM',   'icon' => 'package',   'color' => 'success'],
                        ['key' => 'p3k',   'label' => 'P3K',    'icon' => 'heart',     'color' => 'danger'],
                        ['key' => 'ppr',   'label' => 'PPR',    'icon' => 'home',      'color' => 'secondary'],
                    ];
                @endphp
                @foreach ($modules as $mod)
                    <div class="col-xl-2 col-sm-4 col-6 mb-1">
                        <a href="/admin/monitoring?type={{ $mod['key'] }}" class="text-decoration-none">
                            <div class="card {{ $type === $mod['key'] ? 'border border-' . $mod['color'] : '' }} mb-0">
                                <div class="card-body p-2 text-center">
                                    <div class="avatar bg-light-{{ $mod['color'] }} p-50 mb-50 mx-auto" style="width:38px;height:38px">
                                        <div class="avatar-content">
                                            <i data-feather="{{ $mod['icon'] }}" style="width:16px;height:16px"></i>
                                        </div>
                                    </div>
                                    <h5 class="fw-bolder mb-0 text-{{ $mod['color'] }}">{{ $counts[$mod['key']] ?? 0 }}</h5>
                                    <small class="text-muted">{{ $mod['label'] }}</small>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- Flash Messages --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Tabel Pengajuan --}}
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-1">
                    <h5 class="card-title mb-0">
                        Daftar Pengajuan
                        @if ($type !== 'semua')
                            – <span class="text-uppercase">{{ $type }}</span>
                        @endif
                    </h5>
                    <form method="GET" action="/admin/monitoring" class="d-flex gap-1">
                        <input type="hidden" name="type" value="{{ $type }}">
                        <input type="text" name="search" class="form-control form-control-sm"
                               placeholder="Cari nama nasabah..." value="{{ $search ?? '' }}" style="min-width:200px">
                        <button type="submit" class="btn btn-sm btn-primary">Cari</button>
                        @if ($search)
                            <a href="/admin/monitoring?type={{ $type }}" class="btn btn-sm btn-outline-secondary">Reset</a>
                        @endif
                    </form>
                    <a href="/admin/monitoring/export?type={{ $type }}&search={{ $search }}" class="btn btn-sm btn-outline-success">
                        <i data-feather="download" style="width:13px;height:13px"></i> Export CSV
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th style="width:40px">#</th>
                                <th>Modul</th>
                                <th>Nama Nasabah</th>
                                <th>Nominal</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>AO</th>
                                <th>Aging</th>
                                <th style="width:140px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($proposals as $p)
                                <tr>
                                    <td>{{ $proposals->firstItem() + $loop->index }}</td>
                                    <td>
                                        @php
                                            $badgeColor = match($p->type) {
                                                'pasar' => 'info',
                                                'skpd'  => 'warning',
                                                'umkm'  => 'success',
                                                'p3k'   => 'danger',
                                                'ppr'   => 'secondary',
                                                default => 'primary',
                                            };
                                        @endphp
                                        <span class="badge rounded-pill badge-light-{{ $badgeColor }}">
                                            {{ strtoupper($p->type) }}
                                        </span>
                                    </td>
                                    <td>{{ $p->nama_nasabah }}</td>
                                    <td>
                                        @if ($p->nominal > 0)
                                            Rp {{ number_format((float)$p->nominal, 0, ',', '.') }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $p->tanggal ?? '-' }}</td>
                                    <td>
                                        @php
                                            $statusColor = match((int)$p->status_id) {
                                                5       => 'success',
                                                6       => 'danger',
                                                7       => 'warning',
                                                8, 9    => 'info',
                                                10      => 'secondary',
                                                default => 'primary',
                                            };
                                        @endphp
                                        <span class="badge rounded-pill badge-light-{{ $statusColor }}">
                                            {{ $p->status }}
                                        </span>
                                    </td>
                                    <td>{{ $p->ao_name }}</td>
                                    <td>
                                        @php $aging = (int)($p->aging_days ?? 0); @endphp
                                        @if ($aging > 7)
                                            <span class="badge bg-danger">{{ $aging }}h</span>
                                        @elseif ($aging > 3)
                                            <span class="badge bg-warning text-dark">{{ $aging }}h</span>
                                        @else
                                            <span class="badge bg-light text-muted">{{ $aging }}h</span>
                                        @endif
                                    </td>
                                    <td class="d-flex gap-1">
                                        <a href="/admin/monitoring/{{ $p->type }}/{{ $p->id }}"
                                           class="btn btn-sm btn-outline-primary">
                                            Detail
                                        </a>
                                        <form method="POST"
                                              action="{{ route('admin.monitoring.destroy', [$p->type, $p->id]) }}"
                                              onsubmit="return confirm('Hapus data pembiayaan ini beserta semua data terkait? Tindakan tidak dapat dibatalkan.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i data-feather="trash-2" style="width:13px;height:13px"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-3">Tidak ada data pengajuan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-body">
                    {{ $proposals->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
