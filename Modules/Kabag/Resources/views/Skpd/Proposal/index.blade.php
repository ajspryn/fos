@extends('kabag::layouts.main')

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
                                        <th style="text-align: center">Tanggal Pengajuan</th>
                                        <th style="text-align: center">NIK</th>
                                        <th style="text-align: center">Nama Nasabah</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">Instansi</th>
                                        <th style="text-align: center">Golongan</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
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
                                                ->latest()
                                                ->get()
                                                ->first();
                                        @endphp
                                        @if (($history->status_id == 3 && $history->jabatan_id == 1) ||
                                            ($history->status_id == 4 && $history->jabatan_id == 2))
                                            <tr>
                                                <td style="text-align: center">
                                                    <button type="button"
                                                        class="btn btn-icon btn-icon rounded-circle btn-flat-success">
                                                        <i data-feather="eye"></i>
                                                    </button>
                                                </td>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td>{{ date('d F Y', strtotime($proposal_skpd->tanggal_pengajuan)) }}
                                                </td>
                                                <td>{{ $proposal_skpd->nasabah->no_ktp }}</td>
                                                <td>{{ $proposal_skpd->nasabah->nama_nasabah }}</td>
                                                <td>{{ $proposal_skpd->nasabah->alamat }},
                                                    RT {{ $proposal_skpd->nasabah->rt }},
                                                    RW {{ $proposal_skpd->nasabah->rw }},
                                                    KEL. {{ $proposal_skpd->nasabah->desa_kelurahan }},
                                                    KEC. {{ $proposal_skpd->nasabah->kecamatan }},
                                                    {{ $proposal_skpd->nasabah->kabkota }}</td>
                                                <td style="text-align: center">
                                                    {{ $proposal_skpd->instansi->nama_instansi }}
                                                </td>
                                                <td style="text-align: center">
                                                    {{ $proposal_skpd->golongan->nama_golongan }}
                                                </td>
                                                <td style="text-align: center">Rp.
                                                    {{ number_format($proposal_skpd->nominal_pembiayaan) }}</td>
                                                <td style="text-align: center">
                                                    <a href="/kabag/skpd/komite/{{ $proposal_skpd->id }}"
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
