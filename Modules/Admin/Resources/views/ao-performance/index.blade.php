@extends('admin::layouts.main')

@section('title', 'Performa AO')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Admin /</span> Performa AO
    </h4>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Rekap Pengajuan per Account Officer</h5>
            <small class="text-muted">Total pengajuan dari semua status, seluruh modul.</small>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="text-center" style="width:50px">No.</th>
                        <th>Nama AO</th>
                        @foreach($modules as $m)
                            <th class="text-center">{{ $m }}</th>
                        @endforeach
                        <th class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($summary as $i => $row)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>
                                <strong>{{ $users[$row->user_id] ?? '—' }}</strong>
                                <br><small class="text-muted">ID: {{ $row->user_id }}</small>
                            </td>
                            @foreach($modules as $m)
                                <td class="text-center">
                                    @if($row->$m > 0)
                                        <span class="badge bg-label-primary">{{ $row->$m }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                            @endforeach
                            <td class="text-center">
                                <span class="badge bg-primary fs-6">{{ $row->total }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($modules) + 3 }}" class="text-center py-4 text-muted">
                                Belum ada data pengajuan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                @if($summary->count() > 0)
                <tfoot class="table-light">
                    <tr>
                        <td colspan="2" class="fw-bold">Total Keseluruhan</td>
                        @foreach($modules as $m)
                            <td class="text-center fw-bold">{{ $summary->sum($m) }}</td>
                        @endforeach
                        <td class="text-center fw-bold">{{ $summary->sum('total') }}</td>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>
    </div>
</div>
@endsection
