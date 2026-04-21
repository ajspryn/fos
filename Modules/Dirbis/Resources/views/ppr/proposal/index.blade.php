@extends('dirbis::layouts.main')

@section('content')
    <style>
        .pCenter {
            text-align: center;
        }

        .midJustify {
            vertical-align: middle;
            text-align: justify;
        }

        .midCenter {
            vertical-align: middle;
            text-align: center;
        }
    </style>

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Data Proposal</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dirbis">Dirbis</a></li>
                                    <li class="breadcrumb-item"><a href="/dirbis/ppr">PPR</a></li>
                                    <li class="breadcrumb-item active">Proposal</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th class="midCenter" style="vertical-align: middle;">No.</th>
                                        <th class="midCenter" style="vertical-align: middle;">Tanggal Pengajuan</th>
                                        <th class="midCenter" style="vertical-align: middle;">Jenis Nasabah</th>
                                        <th class="midCenter" style="vertical-align: middle;">NIK</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nama Nasabah</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nilai yang Dimohon</th>
                                        <th class="midCenter" style="vertical-align: middle;">Jangka Waktu</th>
                                        <th class="midCenter" style="vertical-align: middle;">Status</th>
                                        <th class="midCenter" style="vertical-align: middle;">AO yang Menangani</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        @php
                                            $proposal_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
                                                ->where('id', $proposal->form_ppr_pembiayaan_id)
                                                ->first();

                                            $history = null;
                                            if ($proposal_ppr) {
                                                $history = Modules\Ppr\Entities\PprPembiayaanHistory::select()
                                                    ->where('form_ppr_pembiayaan_id', $proposal_ppr->id)
                                                    ->latest()
                                                    ->first();
                                            }
                                        @endphp

                                        @continue(!$proposal_ppr || !$history)
                                        @continue(!$history->statushistory || !$history->jabatan)
                                        @continue(!$proposal_ppr->pemohon || !$proposal_ppr->user)

                                        @if (($history->jabatan_id == 1 && $history->status_id < 5) || ($history->jabatan_id == 3 && $history->status_id == 4))
                                            <tr>
                                                <td class="midCenter">{{ $loop->iteration }}</td>
                                                <td class="midCenter">{{ date_format($proposal_ppr->created_at, 'd-m-Y') }}</td>
                                                <td class="midCenter">{{ $proposal_ppr->jenis_nasabah }}</td>
                                                <td class="midCenter">{{ $proposal_ppr->pemohon->form_pribadi_pemohon_no_ktp }}</td>
                                                <td class="midCenter">{{ $proposal_ppr->pemohon->form_pribadi_pemohon_nama_lengkap }}</td>
                                                <td class="midCenter">Rp.{{ number_format($proposal_ppr->form_permohonan_nilai_ppr_dimohon) }}</td>
                                                <td class="midCenter">
                                                    {{ $proposal_ppr->form_permohonan_jangka_waktu_ppr }} Tahun
                                                    <br />
                                                    ({{ $proposal_ppr->form_permohonan_jml_bulan }} Bulan)
                                                </td>
                                                <td class="midCenter" value="{{ $history?->statushistory?->id ?? '' }}, {{ $history?->jabatan?->jabatan_id ?? '' }}">
                                                    @if ($history?->statushistory?->id ?? '' == 5)
                                                        <span class="badge rounded-pill badge-light-success">
                                                            {{ $history?->statushistory?->keterangan ?? '' }}
                                                            {{ $history?->jabatan?->keterangan ?? '' }}
                                                        </span>
                                                    @elseif ($history?->statushistory?->id ?? '' == 9)
                                                        <span class="badge rounded-pill badge-light-success">
                                                            {{ $history?->statushistory?->keterangan ?? '' }}
                                                        </span>
                                                    @elseif ($history?->statushistory?->id ?? '' == 4)
                                                        <span class="badge rounded-pill badge-light-info">
                                                            {{ $history?->statushistory?->keterangan ?? '' }}
                                                            {{ $history?->jabatan?->keterangan ?? '' }}
                                                        </span>
                                                    @elseif ($history?->statushistory?->id ?? '' == 10)
                                                        <span class="badge rounded-pill badge-light-danger">
                                                            {{ $history?->statushistory?->keterangan ?? '' }}
                                                        </span>
                                                    @else
                                                        <span class="badge rounded-pill badge-light-warning">
                                                            {{ $history?->statushistory?->keterangan ?? '' }}
                                                            {{ $history?->jabatan?->keterangan ?? '' }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="midCenter">{{ $proposal_ppr->user->name }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->
        </div>
    </div>
    <!-- END: Content-->
@endsection
