@extends('analis::layouts.main')

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
                                        <th style="text-align: center"></th>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama Nasabah</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">Instansi</th>
                                        <th style="text-align: center">Golongan</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">AO Yang Menangani</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        @php
                                        
                                            $proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
                                                ->where('id', $proposal->skpd_pembiayaan_id)
                                                ->get()
                                                ->first();

                                            $history = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
                                                ->where('skpd_pembiayaan_id', $proposal_skpd->id)
                                                ->orderby('created_at', 'desc')
                                                ->get()
                                                ->first();
                                        @endphp
                                        @if ($history->status_id == 5 && $history->jabatan_id == 2 || $history->status_id == 4 && $history->jabatan_id == 3 )
                                        <tr>
                                            <td style="text-align: center">
                                                <button type="button"
                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-success">
                                                    <i data-feather="eye"></i>
                                                </button>
                                            </td>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ $proposal_skpd->nasabah->nama_nasabah }}</td>
                                            <td>{{ $proposal_skpd->nasabah->alamat }}, {{ $proposal_skpd->nasabah->rt }},
                                                {{ $proposal_skpd->nasabah->rw }}, {{ $proposal_skpd->nasabah->desa_kelurahan }},
                                                {{ $proposal_skpd->nasabah->kecamatan }}, {{ $proposal_skpd->nasabah->kabkota }},
                                                {{ $proposal_skpd->nasabah->provinsi }}</td>
                                            <td style="text-align: center">{{ $proposal_skpd->instansi->nama_instansi }}</td>
                                            <td style="text-align: center">{{ $proposal_skpd->golongan->nama_golongan }}</td>
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
                                                @endif
                                                </td>
                                                <td style="text-align: center">{{ $proposal_skpd->user->name }}</td>
                                            <td style="text-align: center">
                                                <a href="/analis/skpd/komite/{{ $proposal_skpd->id }}"
                                                    class="btn btn-outline-info round">Detail</a>
                                            </td>
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
@endsection
