@extends('kabag::layouts.main')

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
                                    <li class="breadcrumb-item"><a href="/pasar">Pasar</a>
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
                                        <th style="text-align: center">Nama Kios / Los</th>
                                        <th style="text-align: center">Alamat Pasar</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Tanggal Pengajuan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Bon Murabahah</th>
                                        <th style="text-align: center">AO Yang Menangani</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($komites as $komite)
                                        @php
                                            $proposal_pasar = Modules\Pasar\Entities\PasarPembiayaan::select()
                                                ->where('id', $komite->pasar_pembiayaan_id)
                                                ->orderby('created_at', 'desc')
                                                ->get()
                                                ->first();
                                            
                                            $history = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
                                                ->where('pasar_pembiayaan_id', $proposal_pasar->id)
                                                ->orderby('created_at', 'desc')
                                                ->get()
                                                ->first();
                                            $bonmurabahah = Modules\Pasar\Entities\PasarFoto::select()
                                                ->where('pasar_pembiayaan_id', $proposal_pasar->id)
                                                ->where('kategori', 'Foto Bon Murabahah')
                                                ->get()
                                                ->first();
                                        @endphp
                                        @if ($history->status_id == 5 || $history->status_id == 4 || $history->status_id == 9)
                                            <tr>
                                                <td style="text-align: center">
                                                    <button type="button"
                                                        class="btn btn-icon btn-icon rounded-circle btn-flat-success">
                                                        <i data-feather="eye"></i>
                                                    </button>
                                                </td>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td>{{ $proposal_pasar->nasabahh->nama_nasabah }}</td>
                                                <td>{{ $proposal_pasar->nasabahh->alamat }}
                                                <td style="text-align: center">
                                                    {{ $proposal_pasar->keteranganusaha->nama_usaha }}</td>
                                                <td style="text-align: center"
                                                    value="{{ $proposal_pasar->keteranganusaha->jenispasar->nama_pasar }}">
                                                    {{ $proposal_pasar->keteranganusaha->jenispasar->nama_pasar }}</td>
                                                <td style="text-align: center">{{ number_format($proposal_pasar->harga) }}
                                                </td>
                                                <td style="text-align: center">{{ $proposal_pasar->tgl_pembiayaan }}</td>
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
                                                    @else
                                                        <span
                                                            class="badge rounded-pill badge-light-info">{{ $history->statushistory->keterangan }}
                                                            {{ $history->jabatan->keterangan }}</span>
                                                    @endif
                                                </td>
                                                <td style="text-align: center">
                                                    @if ($bonmurabahah)
                                                        <div class="mb-0 mt-1 col-md-1">
                                                            <button type="butt  on"  class="btn btn-success"
                                                                data-bs-toggle="modal" data-bs-target="#bon">
                                                                Telah Terlampir
                                                            </button>
                                                        </div>
                                                        <div class="modal fade" id="bon" tabindex="-1"
                                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-transparent">
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                    <h1 class="text-center mb-1" id="addNewCardTitle">
                                                                       Bon Murabahah
                                                                    </h1>
                                                                    <p class="text-center">Lampiran Foto Bon Murabaha</p>
                                                                    <div class="card-body">
                                                                        <img src="{{ asset('storage/' . $bonmurabahah->foto) }}"
                                                                            class="d-block w-100" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @else
                                                        Belum Terlampir
                                                    @endif
                                                </td>
                                                <td style="text-align: center">{{ $proposal_pasar->user->name }}</td>
                                                <td style="text-align: center">
                                                    <a href="/kabag/pasar/komite/{{ $proposal_pasar->id }}"
                                                        class="btn btn-outline-info round">Detail</a>
                                                </td>
                                            </tr>
                                        @endif
                                        <!-- foto kk -->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->
            <!--/ foto kk  -->
        </div>
    </div>
@endsection
