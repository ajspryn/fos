@extends('dirbis::layouts.main')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Data Proposal</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/skpd">SKPD</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Proposal</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Pengajuan
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
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama Nasabah</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">Instansi</th>
                                        <th style="text-align: center">Golongan</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">AO yang Menangani</th>
                                        {{-- <th style="text-align: center">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        @php
                                            $history = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
                                                ->where('skpd_pembiayaan_id', $proposal->id)
                                                ->orderby('created_at', 'desc')
                                                ->get()
                                                ->first();

                                            if ($history) {
                                                $proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
                                                    ->where('id', $history->skpd_pembiayaan_id)
                                                    ->get()
                                                    ->first();
                                            }
                                        @endphp
                                        @if ($history)
                                        @if (($history->jabatan_id == 1 || $history->jabatan_id == 2 || $history->jabatan_id == 0  || $history->jabatan_id == 3 && $history->status_id == 4))
                                        <tr>
                                                <tr>
                                                    
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td>{{ $proposal_skpd->nasabah->nama_nasabah }}</td>
                                                    <td>{{ $proposal_skpd->nasabah->alamat }},
                                                        {{ $proposal_skpd->nasabah->rt }},
                                                        {{ $proposal_skpd->nasabah->rw }},
                                                        {{ $proposal_skpd->nasabah->desa_kelurahan }},
                                                        {{ $proposal_skpd->nasabah->kecamatan }},
                                                        {{ $proposal_skpd->nasabah->kabkota }},
                                                        {{ $proposal_skpd->nasabah->provinsi }}</td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_skpd->instansi->nama_instansi }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_skpd->golongan->nama_golongan }}
                                                    </td>
                                                    <td style="text-align: center">Rp.
                                                        {{ number_format($proposal_skpd->nominal_pembiayaan) }}</td>
                                                    <td style="text-align: center"
                                                        value="{{ $history->statushistory->id }} ,{{ $history->jabatan->jabatan_id }} ">
                                                        @if ($history->statushistory->id == 5)
                                                            <span
                                                                class="badge rounded-pill badge-light-success">{{ $history->statushistory->keterangan }}
                                                                {{ $history->jabatan->keterangan }}</span>
                                                        @elseif ($history->statushistory->id == 4)
                                                            <span
                                                                class="badge rounded-pill badge-light-warning">{{ $history->statushistory->keterangan }}
                                                                {{ $history->jabatan->keterangan }}</span>
                                                        @elseif ($history->statushistory->id == 7)
                                                            <span
                                                                class="badge rounded-pill badge-light-warning">{{ $history->statushistory->keterangan }}
                                                                {{ $history->jabatan->keterangan }}</span>
                                                        @elseif ($history->statushistory->id == 6)
                                                            <span
                                                                class="badge rounded-pill badge-light-danger">{{ $history->statushistory->keterangan }}
                                                                {{ $history->jabatan->keterangan }}</span>
                                                        @else
                                                            <span
                                                                class="badge rounded-pill badge-light-info">{{ $history->statushistory->keterangan }}
                                                                {{ $history->jabatan->keterangan }}</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center">{{ $proposal_skpd->user->name }}</td>
                                                    {{-- <td style="text-align: center">
                                                        <a href="/dirbis/skpd/komite/{{ $proposal_skpd->id }}"
                                                            class="btn btn-outline-info round">Detail</a>
                                                    </td> --}}
                                                </tr>
                                            @endif
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
@endsection
