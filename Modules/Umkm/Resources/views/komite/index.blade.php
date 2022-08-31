@extends('umkm::layouts.main')

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
                        <h2 class="content-header-title float-start mb-0">Data Proses Komite</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/umkm">UMKM</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Komite</a>
                                </li>
                                <li class="breadcrumb-item active">Data Diproses Komite
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
                                            @endphp
                                <tr>
                                    <td style="text-align: center">
                                        <button type="button" class="btn btn-icon btn-icon rounded-circle btn-flat-success">
                                            <i data-feather="eye"></i>
                                        </button>
                                    </td>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td>{{ $komite->nasabahh->nama_nasabah }}</td>
                                    <td>{{ $komite->nasabahh->alamat }}</td>
                                    <td style="text-align: center">{{ $komite->keteranganusaha->nama_usaha}}</td>
                                    <td style="text-align: center">{{ number_format($komite->nominal_pembiayaan)}}</td>
                                    <td style="text-align: center">{{ $komite->tgl_pembiayaan }}</td>
                                    <td style="text-align: center">
                                        @if ($history->statushistory->id == 5)
                                        <span
                                            class="badge rounded-pill badge-light-success">{{ $history->statushistory->keterangan }}
                                            {{ $history->jabatan->keterangan }}</span>
                                    @elseif ($history->statushistory->id == 3)
                                        <span
                                            class="badge rounded-pill badge-light-info">{{ $history->statushistory->keterangan }}
                                            {{ $history->jabatan->keterangan }}</span>
                                    @elseif ($history->statushistory->id == 6)
                                        <span
                                            class="badge rounded-pill badge-light-danger">{{ $history->statushistory->keterangan }}
                                            {{ $history->jabatan->keterangan }}</span>
                                     @else
                                        <span
                                            class="badge rounded-pill badge-light-warning">{{ $history->statushistory->keterangan }}
                                            {{ $history->jabatan->keterangan }}</span>
                                    @endif
                                    </td>
                                    <td style="text-align: center">
                                        <a href="/umkm/komite/{{ $komite->id }}" class="btn btn-outline-info round">Detail</a>
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
