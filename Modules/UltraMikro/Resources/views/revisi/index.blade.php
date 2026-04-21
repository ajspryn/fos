@extends('UltraMikro::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Data Revisi Proposal</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/ultra_mikro">Ultra Mikro</a>
                                    </li>
                                    <li class="breadcrumb-item active">Revisi Proposal
                                    </li>
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
                                        <th style="text-align: center"></th>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Tanggal Pengajuan</th>
                                        <th style="text-align: center">Petugas Lapangan</th>
                                        <th style="text-align: center">NIK</th>
                                        <th style="text-align: center">Nama Nasabah</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        @php
                                            $history = Modules\UltraMikro\Entities\UltraMikroPembiayaanHistory::select()
                                                ->where('ultra_mikro_pembiayaan_id', $proposal->id)
                                                ->orderby('created_at', 'desc')
                                                ->first();
                                            $statusLabels = [1=>'Diajukan',2=>'Dilengkapi',3=>'Diajukan ke Komite',4=>'Sedang Ditinjau',5=>'Disetujui',6=>'Ditolak',7=>'Rekomendasi Revisi',8=>'Akad Dicetak',9=>'Akad Selesai',10=>'Akad Batal',11=>'Rekomendasi'];
                                            $jabatanLabels = [0=>'Nasabah',1=>'Staff/AO',2=>'Kabag',3=>'Analis',4=>'Direktur Bisnis',5=>'Direktur Utama'];
                                            $statusLabel = $history ? ($statusLabels[(int)$history->status_id] ?? '') : '';
                                            $jabatanLabel = $history ? ($jabatanLabels[(int)$history->jabatan_id] ?? '') : '';
                                        @endphp
                                        <tr>
                                            <td style="text-align: center">
                                                <button type="button"
                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-success">
                                                    <i data-feather="eye"></i>
                                                </button>
                                            </td>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ strftime('%d %B %Y', strtotime($proposal->tanggal_pengajuan)) }}</td>
                                            <td>{{ $proposal->petugasLapangan->nama ?? '-' }}</td>
                                            <td>{{ $proposal->nasabah->no_ktp ?? '-' }}</td>
                                            <td>{{ $proposal->nasabah->nama_nasabah ?? '-' }}</td>
                                            <td style="text-align: center">Rp
                                                {{ number_format($proposal->nominal_pembiayaan, 0, ',', '.') }}</td>
                                            <td style="text-align: center">
                                                @if ($history)
                                                    <span class="badge rounded-pill badge-light-warning">{{ $statusLabel }} {{ $jabatanLabel }}</span>
                                                @else
                                                    <span class="badge rounded-pill badge-light-secondary">-</span>
                                                @endif
                                            </td>
                                            <td style="text-align: center">
                                                <a href="/ultra_mikro/revisi/{{ $proposal->id }}/edit"
                                                    class="btn btn-outline-info round">Detail</a>
                                            </td>
                                        </tr>
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
