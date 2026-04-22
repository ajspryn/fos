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
                            <h2 class="content-header-title float-start mb-0">Data Proposal Nasabah</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kabag/pasar/proposal">Pasar</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/kabag/pasar/proposal">Proposal</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Proposal
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
                <form method="GET" action="/kabag/pasar/proposal" class="d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama nasabah..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="/kabag/pasar/proposal" class="btn btn-secondary">Reset</a>
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
                                        <th style="text-align: center">AO Yang Menangani</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse ($proposals as $proposal)
                                        @php($history = $histories[$proposal->id] ?? null)
                                        <tr>
                                            <td></td>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ optional($proposal->nasabahh)->nama_nasabah }}</td>
                                            <td>{{ optional($proposal->nasabahh)->alamat }}</td>
                                            <td style="text-align: center">{{ optional($proposal->keteranganusaha)->nama_usaha }}</td>
                                            <td style="text-align: center">{{ optional(optional($proposal->keteranganusaha)->jenispasar)->nama_pasar }}</td>
                                            <td style="text-align: center">{{ number_format($proposal->harga) }}</td>
                                            <td style="text-align: center">{{ $proposal->tgl_pembiayaan }}</td>
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
                                            <td style="text-align: center">{{ optional($proposal->user)->name }}</td>
                                            <td style="text-align: center">
                                                <a href="/kabag/pasar/proposal/{{ $proposal->id }}" class="btn btn-outline-info btn-sm round">Detail</a>
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

