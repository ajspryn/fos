@extends('akad::layouts.main')

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
                            <h2 class="content-header-title float-start mb-0">Data Proposal Berhasil Akad</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/staff">Staff</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Proposal</a>
                                    </li>
                                    <li class="breadcrumb-item active">Selesai Akad
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
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
                                            <th style="text-align: center">Tanggal</th>
                                            <th style="text-align: center">Kode Kontrak</th>
                                            <th style="text-align: center">Akad</th>
                                            <th style="text-align: center">Segmen</th>
                                            <th style="text-align: center">CIF</th>
                                            <th style="text-align: center">Kode Tabungan</th>
                                            <th style="text-align: center">Plafond</th>
                                            <th style="text-align: center">Harga Jual</th>
                                            <th style="text-align: center">Status</th>
                                            {{-- <th style="text-align: center">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($akadBerhasils as $akadBerhasil)
                                            <tr>
                                                <td style="text-align: center"></td>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">
                                                    {{ date_format($akadBerhasil->created_at, 'd-m-Y') }}</td>
                                                <td style="text-align: center">{{ $akadBerhasil->kode_kontrak }}
                                                </td>
                                                <td style="text-align: center">
                                                    {{ $akadBerhasil->akad }}</td>
                                                <td style="text-align: center">
                                                    {{ $akadBerhasil->segmen }}</td>
                                                <td style="text-align: center">
                                                    {{ $akadBerhasil->cif }}</td>
                                                <td style="text-align: center">
                                                    {{ $akadBerhasil->kode_tabungan }}</td>
                                                <td style="text-align: center">
                                                    {{ number_format($akadBerhasil->plafond) }}</td>
                                                <td style="text-align: center">
                                                    {{ number_format($akadBerhasil->harga_jual) }}</td>
                                                <td style="text-align: center">
                                                    @if ($akadBerhasil->status == 'Selesai Akad')
                                                        <span class="badge rounded-pill badge-light-success">
                                                            {{ $akadBerhasil->status }}</span>
                                                    @else
                                                        <a class="badge rounded-pill badge-light-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalCatatanAkadBatal-{{ $akadBerhasil->id }}">
                                                            {{ $akadBerhasil->status }}</a>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                        @foreach ($akadBerhasils as $forCatatanModal)
                                            <!-- Modal Catatan Akad Batal -->
                                            <div class="modal fade" id="modalCatatanAkadBatal-{{ $forCatatanModal->id }}"
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
                                                            <textarea class="form-control" rows="3">{{ $forCatatanModal->catatan }}</textarea>
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
            </div>
        </div>
    </div>
@endsection
