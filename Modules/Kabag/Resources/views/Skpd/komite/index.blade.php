@extends('kabag::layouts.main')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Data Proses Komite</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kabag/skpd/komite">SKPD</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/kabag/skpd/komite">Komite</a>
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
                            <div class="card-header">
                <form method="GET" action="/kabag/skpd/komite" class="d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama nasabah..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="/kabag/skpd/komite" class="btn btn-secondary">Reset</a>
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
                                        <th style="text-align: center">Instansi</th>
                                        {{-- <th style="text-align: center">Golongan</th> --}}
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Tanggal Pengajuan</th>
                                        <th style="text-align: center">Bon Murabahah</th>
                                        <th style="text-align: center">AO Yang Menangani</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse ($proposals as $proposal)
                                        @php($history = $histories[$proposal->id] ?? null)
                                        @php($bonmurabahah = $bonmurabahahByPembiayaan[$proposal->id] ?? null)
                                        @php($modalId = 'bon-' . $proposal->id)

                                        <tr>
                                            <td></td>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ optional($proposal->nasabah)->nama_nasabah }}</td>
                                            <td>{{ optional($proposal->nasabah)->alamat }}</td>
                                            <td style="text-align: center">{{ optional($proposal->instansi)->nama_instansi }}</td>
                                            <td style="text-align: center">Rp.{{ number_format($proposal->nominal_pembiayaan) }}</td>
                                            <td style="text-align: center">
                                                @php($statusId = optional(optional($history)->statushistory)->id)
                                                @if ($statusId === 5)
                                                    <span class="badge rounded-pill badge-light-success">
                                                        {{ optional($history->statushistory)->keterangan }} {{ optional($history->jabatan)->keterangan }}
                                                    </span>
                                                @elseif ($statusId === 4)
                                                    <span class="badge rounded-pill badge-light-info">
                                                        {{ optional($history->statushistory)->keterangan }} {{ optional($history->jabatan)->keterangan }}
                                                    </span>
                                                @elseif ($history)
                                                    <span class="badge rounded-pill badge-light-warning">
                                                        {{ optional($history->statushistory)->keterangan }} {{ optional($history->jabatan)->keterangan }}
                                                    </span>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td style="text-align: center">{{ $proposal->tanggal_pengajuan }}</td>
                                            <td style="text-align: center">
                                                @if ($bonmurabahah)
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
                                                                        <img src="{{ asset('storage/' . $bonmurabahah->foto) }}" class="d-block w-100" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    Belum Terlampir
                                                @endif
                                            </td>
                                            <td style="text-align: center">{{ optional($proposal->user)->name }}</td>
                                            <td style="text-align: center">
                                                <a href="/kabag/skpd/komite/{{ $proposal->id }}" class="btn btn-outline-info btn-sm round">Detail</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11" class="text-center">Tidak ada data.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                            </table>

                            </div>
            <div class="card-body">
                {{ $proposals->links() }}
            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->
        </div>
    </div>
@endsection
