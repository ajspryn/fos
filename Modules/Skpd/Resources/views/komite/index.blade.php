@extends('skpd::layouts.main')

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
                                    <li class="breadcrumb-item"><a href="/skpd">SKPD</a>
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
                                        <th style="text-align: center">Tanggal Pengajuan</th>
                                        <th style="text-align: center">Nama Nasabah</th>
                                        {{-- <th style="text-align: center">Alamat</th> --}}
                                        <th style="text-align: center">Instansi</th>
                                        {{-- <th style="text-align: center">Golongan</th> --}}
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Bon Murabahah</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        @php
                                            $proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
                                                ->where('id', $proposal->skpd_pembiayaan_id)
                                                ->orderby('created_at', 'desc')
                                                ->get()
                                                ->first();
                                            $history = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
                                                ->where('skpd_pembiayaan_id', $proposal->id)
                                                ->latest()
                                                ->first();
                                            $bonMurabahah = Modules\Skpd\Entities\SkpdFoto::select()
                                                ->where('skpd_pembiayaan_id', $proposal->id)
                                                ->where('kategori', 'Bon Murabahah')
                                                ->get()
                                                ->first();
                                        @endphp
                                        <tr>
                                            <td style="text-align: center">
                                                <button type="button"
                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-success">
                                                    <i data-feather="eye"></i>
                                                </button>
                                            </td>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ date('d F Y', strtotime($proposal->tanggal_pengajuan)) }}
                                            </td>
                                            <td>{{ $proposal->nasabah->nama_nasabah }}</td>
                                            {{-- <td>{{ $proposal->nasabah->alamat }}</td> --}}
                                            <td style="text-align: center">{{ $proposal->instansi->nama_instansi }}</td>
                                            {{-- <td style="text-align: center">{{ $proposal->golongan->nama_golongan }}</td> --}}
                                            <td style="text-align: center">
                                                Rp.{{ number_format($proposal->nominal_pembiayaan) }}</td>
                                            <td style="text-align: center"
                                                value="{{ $history->statushistory->id }}, {{ $history->jabatan->jabatan_id }}">
                                                @if ($history->statusHistory->id == 5)
                                                    <span
                                                        class="badge rounded-pill badge-light-success">{{ $history->statusHistory->keterangan }}
                                                        {{ $history->jabatan->keterangan }}</span>
                                                @elseif ($history->statusHistory->id == 9)
                                                    <span class="badge rounded-pill badge-light-success">
                                                        {{ $history->statusHistory->keterangan }}</span>
                                                @elseif ($history->statusHistory->id == 4)
                                                    <span
                                                        class="badge rounded-pill badge-light-info">{{ $history->statusHistory->keterangan }}
                                                        {{ $history->jabatan->keterangan }}</span>
                                                @elseif ($history->statusHistory->id == 10)
                                                    <a class="badge rounded-pill badge-light-danger" data-bs-toggle="modal"
                                                        data-bs-target="#modalCatatanAkadBatal-{{ $history->id }}">{{ $history->statusHistory->keterangan }}
                                                    </a>
                                                @elseif ($history->statusHistory->id == 6)
                                                    <span
                                                        class="badge rounded-pill badge-light-danger">{{ $history->statusHistory->keterangan }}
                                                        {{ $history->jabatan->keterangan }}</span>
                                                @else
                                                    <span
                                                        class="badge rounded-pill badge-light-warning">{{ $history->statusHistory->keterangan }}
                                                        {{ $history->jabatan->keterangan }}</span>
                                                @endif
                                            </td>
                                            <td style="text-align: center">
                                                @if ($bonMurabahah)
                                                    <a class="badge rounded-pill badge-light-success" data-bs-toggle="modal"
                                                        data-bs-target="#bonMurabahah-{{ $history->id }}">
                                                        Sudah Terlampir
                                                    </a>
                                                @else
                                                    <span class="badge rounded-pill badge-light-danger">
                                                        Belum Terlampir
                                                    </span>
                                                @endif
                                            </td>
                                            <td style="text-align: center">
                                                <a href="/skpd/komite/{{ $proposal->id }}"
                                                    class="btn btn-outline-info round">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach ($proposals as $forBon)
                                        @php
                                            $proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
                                                ->where('id', $forBon->skpd_pembiayaan_id)
                                                ->latest()
                                                ->get()
                                                ->first();

                                            $histForBon = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
                                                ->where('skpd_pembiayaan_id', $forBon->id)
                                                ->latest()
                                                ->first();

                                            $bon = Modules\Skpd\Entities\SkpdFoto::select()
                                                ->where('skpd_pembiayaan_id', $forBon->id)
                                                ->where('kategori', 'Bon Murabahah')
                                                ->get()
                                                ->first();
                                        @endphp
                                        {{-- Modal Bon Murabahah --}}
                                        @if ($bon)
                                            <div class="modal fade" id="bonMurabahah-{{ $histForBon->id }}" tabindex="-1"
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
                                                            <div class="card-body">
                                                                <p class="text-center">Diupload pada tanggal
                                                                    {{ date_format($bon->created_at, 'd F Y') }}
                                                                </p>
                                                                <img src="{{ asset('storage/' . $bon->foto) }}"
                                                                    class="d-block w-100" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        {{-- End Modal Bon Murabahah --}}
                                    @endforeach
                                    @foreach ($proposals as $forCatatanModal)
                                        @php
                                            $historyCatatan = Modules\Skpd\Entities\SkpdPembiayaanHistory::where('skpd_pembiayaan_id', $forCatatanModal->id)
                                                ->latest()
                                                ->first();
                                        @endphp
                                        <!-- Modal Catatan Akad Batal -->
                                        <div class="modal fade" id="modalCatatanAkadBatal-{{ $historyCatatan->id }}"
                                            tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-transparent">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body px-sm-5 mx-50 pb-5">
                                                        <h5 class="text-center">Catatan</h5>
                                                        <br />
                                                        <textarea class="form-control" name="catatan" rows="3" placeholder="Catatan">{{ $historyCatatan->catatan }}</textarea>
                                                        <br />
                                                        <div class="row">
                                                            <div class="col-md-6" style="width:150px; margin:0 auto;">
                                                                <button type="button" class="btn btn-primary w-100"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Modal Catatan Akad Batal -->
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
