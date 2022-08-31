@extends('dirbis::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Data Komite</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/umkm">Umkm</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Komite</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Komite
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
                                        <th style="text-align: center">Nama nasabahh</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">Nama Usaha</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Tanggal Pengajuan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">AO Yang Menangani</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($komites as $komite)
                                        @php
                                                 $history = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
                                                ->where('umkm_pembiayaan_id', $komite->id)
                                                ->orderby('created_at', 'desc')
                                                ->get()
                                                ->first();
                                            $proposal_umkm = Modules\Umkm\Entities\UmkmPembiayaan::select()
                                                ->where('id', $history->umkm_pembiayaan_id)
                                                ->get()
                                                ->first();
                                        @endphp
                                        @if ($history->jabatan_id == 4 || ($history->jabatan_id == 3 && $history->status_id == 5))
                                        <tr>
                                            <td style="text-align: center">
                                                <button type="button"
                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-success">
                                                    <i data-feather="eye"></i>
                                                </button>
                                            </td>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ $proposal_umkm->nasabahh->nama_nasabah }}</td>
                                            <td>{{ $proposal_umkm->nasabahh->alamat }}
                                            <td style="text-align: center">
                                                {{ $proposal_umkm->keteranganusaha->nama_usaha }}</td>
                                            <td style="text-align: center">{{number_format( $proposal_umkm->nominal_pembiayaan )}}</td>
                                            <td style="text-align: center">{{ $proposal_umkm->tgl_pembiayaan }}</td>
                                            <td style="text-align: center"
                                                value="{{ $history->statushistory->id }} ,{{ $history->jabatan->jabatan_id }} ">
                                                @if ($history->statushistory->id == 5 && $history->jabatan->jabatan_id == 4)
                                                <span
                                                    class="badge rounded-pill badge-light-success">{{ $history->statushistory->keterangan }}
                                                    {{ $history->jabatan->keterangan }}</span>
                                            @elseif ($history->statushistory->id == 4)
                                                <span
                                                    class="badge rounded-pill badge-light-warning">{{ $history->statushistory->keterangan }}
                                                    {{ $history->jabatan->keterangan }}</span>
                                            @elseif ($history->statushistory->id == 5 && $history->jabatan->jabatan_id == 3)
                                                <span
                                                    class="badge rounded-pill badge-light-info">{{ $history->statushistory->keterangan }}
                                                    {{ $history->jabatan->keterangan }}</span>
                                            @endif
                                            </td>
                                            <td style="text-align: center">{{ $proposal_umkm->user->name }}</td>
                                            <td>
                                                <a href="/dirbis/umkm/komite/{{ $proposal_umkm->id }}"
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
