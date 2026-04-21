@extends('kabag::layouts.main')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">{{ $segmentLabel ?? 'Proposal' }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ $indexUrl ?? '/kabag' }}">{{ $segmentLabel ?? 'Proposal' }}</a></li>
                                    <li class="breadcrumb-item active">Detail</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section id="proposal-detail">
                <div class="row">
                    <div class="col-12 d-flex flex-wrap align-items-center justify-content-between gap-1 mb-2">
                        <div>
                            <h4 class="mb-0">{{ $title ?? 'Detail Proposal' }}</h4>
                            @if (!empty($history))
                                @php($statusText = trim(collect([
                                    optional($history->statushistory)->keterangan,
                                    optional($history->jabatan)->keterangan,
                                ])->filter()->implode(' ')))
                                @if ($statusText)
                                    <span class="badge rounded-pill badge-light-info">{{ $statusText }}</span>
                                @endif
                            @endif
                        </div>
                        <a href="{{ $indexUrl ?? '/kabag' }}" class="btn btn-outline-secondary">Kembali</a>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Ringkasan Nasabah</h5>
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0">
                                    @foreach (($detailsNasabah ?? []) as $label => $value)
                                        <dt class="col-5 text-muted">{{ $label }}</dt>
                                        <dd class="col-7">{{ $value ?? '-' }}</dd>
                                    @endforeach
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Ringkasan Pembiayaan</h5>
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0">
                                    @foreach (($detailsPembiayaan ?? []) as $label => $value)
                                        <dt class="col-5 text-muted">{{ $label }}</dt>
                                        <dd class="col-7">{{ $value ?? '-' }}</dd>
                                    @endforeach
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
