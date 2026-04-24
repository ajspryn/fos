@extends('admin::layouts.main')

@section('title', 'Log Aktivitas Admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Admin /</span> Log Aktivitas
    </h4>

    {{-- Flash message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-1">
            <h5 class="mb-0">Riwayat Aktivitas</h5>
            <form method="GET" action="/admin/activity-log" class="d-flex gap-1 flex-wrap">
                <select name="module" class="form-select" style="min-width:130px">
                    <option value="">Semua Modul</option>
                    @foreach($modules as $m)
                        <option value="{{ $m }}" {{ $module == $m ? 'selected' : '' }}>{{ $m }}</option>
                    @endforeach
                </select>
                <input type="text" name="search" class="form-control" placeholder="Cari aksi / user / deskripsi..."
                    value="{{ $search }}" style="min-width:240px;">
                <button type="submit" class="btn btn-primary">
                    <i data-feather="search" class="font-small-4"></i>
                </button>
                @if($search || $module)
                    <a href="/admin/activity-log" class="btn btn-outline-secondary">Reset</a>
                @endif
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="text-center" style="width:50px">No.</th>
                        <th style="width:160px">Waktu</th>
                        <th>User</th>
                        <th>Aksi</th>
                        <th>Modul</th>
                        <th>Deskripsi</th>
                        <th>IP</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($logs as $log)
                        <tr>
                            <td class="text-center">{{ $logs->firstItem() + $loop->index }}</td>
                            <td class="text-muted small">{{ $log->created_at->format('d/m/Y H:i:s') }}</td>
                            <td>{{ $log->user->name ?? '<em class="text-muted">System</em>' }}</td>
                            <td>
                                @php
                                    $badgeClass = match($log->action) {
                                        'delete'         => 'bg-danger',
                                        'reset_password' => 'bg-warning',
                                        'toggle_aktif'   => 'bg-info',
                                        'export'         => 'bg-success',
                                        default          => 'bg-secondary',
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }}">{{ $log->action }}</span>
                            </td>
                            <td>{{ $log->module ?? '-' }}</td>
                            <td class="small">{{ $log->description ?? '-' }}</td>
                            <td class="text-muted small">{{ $log->ip_address ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Belum ada log aktivitas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-body pt-2">
            {{ $logs->links() }}
        </div>
    </div>
</div>
@endsection
