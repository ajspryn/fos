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
                            <h2 class="content-header-title float-start mb-0">{{ $segmentLabel ?? 'Proposal' }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/admin/monitoring">Monitoring Pengajuan</a></li>
                                    <li class="breadcrumb-item active">Detail</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
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

            {{-- Header + Status Badge --}}
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-1 mb-2">
                <div>
                    <h4 class="mb-0">{{ $title ?? 'Detail Pengajuan' }}</h4>
                    @if (!empty($history))
                        @php
                            $statusText = trim(collect([
                                optional($history->statushistory ?? $history->statusHistory)->keterangan,
                                optional($history->jabatan)->keterangan,
                            ])->filter()->implode(' – '));

                            $statusId = optional($history->statushistory ?? $history->statusHistory)->id ?? 0;
                            $statusColor = match((int)$statusId) {
                                5       => 'success',
                                6       => 'danger',
                                7       => 'warning',
                                8, 9    => 'info',
                                10      => 'secondary',
                                default => 'primary',
                            };
                        @endphp
                        @if ($statusText)
                            <span class="badge rounded-pill badge-light-{{ $statusColor }}">{{ $statusText }}</span>
                        @endif
                    @endif
                </div>
                <div class="d-flex gap-1">
                    <a href="/admin/monitoring?type={{ $type ?? 'semua' }}" class="btn btn-outline-secondary">
                        &larr; Kembali
                    </a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus">
                        <i data-feather="trash-2" class="me-1"></i> Hapus
                    </button>
                </div>
            </div>

            {{-- Modal Konfirmasi Hapus --}}
            <div class="modal fade" id="modalHapus" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus data pembiayaan ini?</p>
                            <p class="text-danger fw-bold">Tindakan ini tidak dapat dibatalkan. Semua data terkait (slik, jaminan, foto, riwayat, dll) akan ikut dihapus.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                            <form method="POST" action="{{ route('admin.monitoring.destroy', [$type, $proposalId]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- Kartu Nasabah --}}
                <div class="col-12 col-lg-6 mb-2">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i data-feather="user" class="me-1" style="width:16px;height:16px"></i>
                                Data Nasabah
                            </h5>
                        </div>
                        <div class="card-body">
                            <dl class="row mb-0">
                                @foreach (($detailsNasabah ?? []) as $label => $value)
                                    <dt class="col-5 text-muted fw-normal">{{ $label }}</dt>
                                    <dd class="col-7">{{ $value ?? '-' }}</dd>
                                @endforeach
                            </dl>
                        </div>
                    </div>
                </div>

                {{-- Kartu Pembiayaan --}}
                <div class="col-12 col-lg-6 mb-2">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i data-feather="file-text" class="me-1" style="width:16px;height:16px"></i>
                                Data Pembiayaan
                            </h5>
                        </div>
                        <div class="card-body">
                            <dl class="row mb-0">
                                @foreach (($detailsPembiayaan ?? []) as $label => $value)
                                    <dt class="col-5 text-muted fw-normal">{{ $label }}</dt>
                                    <dd class="col-7">{{ $value ?? '-' }}</dd>
                                @endforeach
                            </dl>
                        </div>
                    </div>
                </div>

                {{-- Riwayat Status --}}
                <div class="col-12 mb-2">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i data-feather="clock" class="me-1" style="width:16px;height:16px"></i>
                                Riwayat Status Pengajuan
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            @if (isset($histories) && $histories->count())
                                <div class="table-responsive">
                                    <table class="table table-sm mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th>Jabatan</th>
                                                <th>Catatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($histories as $h)
                                                @php
                                                    $hStatus = $h->statushistory ?? $h->statusHistory ?? null;
                                                    $hStatusId = optional($hStatus)->id ?? 0;
                                                    $hColor = match((int)$hStatusId) {
                                                        5       => 'success',
                                                        6       => 'danger',
                                                        7       => 'warning',
                                                        8, 9    => 'info',
                                                        10      => 'secondary',
                                                        default => 'primary',
                                                    };
                                                @endphp
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $h->created_at ? $h->created_at->format('d M Y H:i') : '-' }}</td>
                                                    <td>
                                                        <span class="badge rounded-pill badge-light-{{ $hColor }}">
                                                            {{ optional($hStatus)->keterangan ?? '-' }}
                                                        </span>
                                                    </td>
                                                    <td>{{ optional($h->jabatan)->keterangan ?? '-' }}</td>
                                                    <td>{{ $h->catatan ?? '-' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="p-3 text-muted">Belum ada riwayat status.</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
