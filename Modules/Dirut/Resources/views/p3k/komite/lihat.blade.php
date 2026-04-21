@extends('dirut::layouts.main')

@section('content')
<div class="app-content content">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h2>{{ $title }}</h2>
        <p>Pembiayaan ID: {{ $historyStatus->p3k_pembiayaan_id ?? '-' }}</p>
        <p>Status Terakhir: {{ $historyStatus->status_id ?? '-' }} | Jabatan: {{ $historyStatus->jabatan_id ?? '-' }}</p>

        @if($historyStatus && $historyStatus->jabatan_id == 4 && $historyStatus->status_id == 5)
        <div class="row mt-3">
            <div class="col-md-6">
                <form action="/dirut/p3k/komite" method="POST">
                    @csrf
                    <input type="hidden" name="p3k_pembiayaan_id" value="{{ $historyStatus->p3k_pembiayaan_id }}">
                    <input type="hidden" name="status_id" value="5">
                    <input type="hidden" name="jabatan_id" value="5">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-success w-100">Setujui (Dirut)</button>
                </form>
            </div>
            <div class="col-md-6">
                <form action="/dirut/p3k/komite" method="POST">
                    @csrf
                    <input type="hidden" name="p3k_pembiayaan_id" value="{{ $historyStatus->p3k_pembiayaan_id }}">
                    <input type="hidden" name="status_id" value="7">
                    <input type="hidden" name="jabatan_id" value="5">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-warning w-100">Revisi (Dirut)</button>
                </form>
            </div>
        </div>
        @else
        <div class="alert alert-info mt-3">
            Tidak ada aksi yang tersedia untuk status saat ini (status_id={{ $historyStatus->status_id ?? '-' }}, jabatan_id={{ $historyStatus->jabatan_id ?? '-' }}).
        </div>
        @endif
    </div>
</div>
@endsection
