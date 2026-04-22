@extends('kabag::layouts.main')

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
                            <h2 class="content-header-title float-start mb-0">Data Komite</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kabag/pasar/komite">Pasar</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/kabag/pasar/komite">Komite</a>
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
                            <div class="card-header">
                <form method="GET" action="/kabag/pasar/komite" class="d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama nasabah..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="/kabag/pasar/komite" class="btn btn-secondary">Reset</a>
                </form>
            </div>
            <div class="table-responsive">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center"></th>
                                            <th style="text-align: center">No</th>
                                            <th class="d-none d-md-table-cell" style="text-align: center">Nama Nasabah</th>
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
                                    <tbody class="table-border-bottom-0">
                                        @forelse ($komites as $komite)
                                            @php($history = $histories[$komite->id] ?? null)
                                            @php($bon = $bonmurabahah[$komite->id] ?? null)
                                            @php($modalId = 'bon-' . $komite->id)

                                            <tr>
                                                <td></td>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td>{{ optional($komite->nasabahh)->nama_nasabah }}</td>
                                                <td>{{ optional($komite->nasabahh)->alamat }}</td>
                                                <td style="text-align: center">{{ optional($komite->keteranganusaha)->nama_usaha }}</td>
                                                <td style="text-align: center">{{ optional(optional($komite->keteranganusaha)->jenispasar)->nama_pasar }}</td>
                                                <td style="text-align: center">{{ number_format($komite->harga) }}</td>
                                                <td style="text-align: center">{{ $komite->tgl_pembiayaan }}</td>
                                                <td style="text-align: center">
                                                    @php($statusId = optional(optional($history)->statushistory)->id)
                                                    @if ($statusId === 5)
                                                        <span class="badge rounded-pill badge-light-success">
                                                            {{ optional($history->statushistory)->keterangan }} {{ optional($history->jabatan)->keterangan }}
                                                        </span>
                                                    @elseif ($statusId === 4)
                                                        <span class="badge rounded-pill badge-light-warning">
                                                            {{ optional($history->statushistory)->keterangan }} {{ optional($history->jabatan)->keterangan }}
                                                        </span>
                                                    @elseif ($history)
                                                        <span class="badge rounded-pill badge-light-info">
                                                            {{ optional($history->statushistory)->keterangan }} {{ optional($history->jabatan)->keterangan }}
                                                        </span>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td style="text-align: center">
                                                    @if ($bon)
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#{{ $modalId }}">
                                                            Telah Terlampir
                                                        </button>

                                                        <div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-transparent">
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                        <h1 class="text-center mb-1" id="addNewCardTitle">Bon Murabahah</h1>
                                                                        <p class="text-center">Lampiran Foto Bon Murabahah</p>
                                                                        <div class="card-body">
                                                                            <img src="{{ asset('storage/' . $bon->foto) }}" class="d-block w-100" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        Belum Terlampir
                                                    @endif
                                                </td>
                                                <td style="text-align: center">{{ optional($komite->user)->name }}</td>
                                                <td style="text-align: center">
                                                    <a href="/kabag/pasar/komite/{{ $komite->id }}" class="btn btn-outline-info btn-sm round">Detail</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="12" class="text-center">Tidak ada data.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>
                            <div class="card-body">
                                {{ $komites->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->
            <!--/ foto kk  -->
        </div>
    </div>
@endsection
