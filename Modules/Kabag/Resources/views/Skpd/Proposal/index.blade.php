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
                            <h2 class="content-header-title float-start mb-0">Data Proposal</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kabag/skpd/proposal">SKPD</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/kabag/skpd/proposal">Proposal</a>
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
                            <div class="card-header">
                <form method="GET" action="/kabag/skpd/proposal" class="d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama nasabah..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="/kabag/skpd/proposal" class="btn btn-secondary">Reset</a>
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
                                        <th style="text-align: center">Golongan</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse ($proposals as $proposal)
                                        @php($history = $histories[$proposal->id] ?? null)
                                        <tr>
                                            <td></td>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ optional($proposal->nasabah)->nama_nasabah }}</td>
                                            <td>
                                                {{ optional($proposal->nasabah)->alamat }}
                                                {{ optional($proposal->nasabah)->rt ? ', ' . $proposal->nasabah->rt : '' }}
                                                {{ optional($proposal->nasabah)->rw ? ', ' . $proposal->nasabah->rw : '' }}
                                                {{ optional($proposal->nasabah)->desa_kelurahan ? ', ' . $proposal->nasabah->desa_kelurahan : '' }}
                                                {{ optional($proposal->nasabah)->kecamatan ? ', ' . $proposal->nasabah->kecamatan : '' }}
                                                {{ optional($proposal->nasabah)->kabkota ? ', ' . $proposal->nasabah->kabkota : '' }}
                                                {{ optional($proposal->nasabah)->provinsi ? ', ' . $proposal->nasabah->provinsi : '' }}
                                            </td>
                                            <td style="text-align: center">{{ optional($proposal->instansi)->nama_instansi }}</td>
                                            <td style="text-align: center">{{ optional($proposal->golongan)->nama_golongan }}</td>
                                            <td style="text-align: center">Rp. {{ number_format($proposal->nominal_pembiayaan) }}</td>
                                            <td style="text-align: center">
                                                <a href="/kabag/skpd/proposal/{{ $proposal->id }}" class="btn btn-outline-info btn-sm round">Detail</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada data.</td>
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
