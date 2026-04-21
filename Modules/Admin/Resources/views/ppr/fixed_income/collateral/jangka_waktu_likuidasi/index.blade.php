@extends('admin::layouts.main')

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
                            <h2 class="content-header-title float-start mb-0">{{ $title ?? 'Pengaturan Collateral Fixed Income Jangka Waktu Likuidasi' }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Pengaturan
                                    </li>
                                    <li class="breadcrumb-item active">PPR
                                    </li>
                                    <li class="breadcrumb-item active">Collateral Fixed Income Jangka Waktu Likuidasi</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <h5 class="card-header">Form Collateral Fixed Income Jangka Waktu Likuidasi</h5>
                                <div class="card-body">
                                    <form class="form" method="post"
                                        action="/admin/ppr/fixed_income/collateral/jangka_waktu_likuidasi">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="kode">Kode</label>
                                                    <input type="text" id="kode" class="form-control"
                                                        placeholder="Masukkan Kode" name="kode" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="keterangan">Keterangan</label>
                                                    <input type="text" id="keterangan" class="form-control"
                                                        placeholder="Masukkan Keterangan" name="keterangan" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="rating">Rating</label>
                                                    <input type="text" id="rating" class="form-control"
                                                        placeholder="Masukkan Rating" name="rating" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="bobot">Bobot</label>
                                                    <input type="text" id="bobot" class="form-control"
                                                        placeholder="Masukkan Bobot" name="bobot" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic table -->
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-datatable table-responsive pt-0">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">Kode</th>
                                            <th class="d-none d-md-table-cell" style="text-align: center">Keterangan</th>
                                            <th style="text-align: center">Rating</th>
                                            <th style="text-align: center">Bobot</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @forelse ($collateral_jangka_waktu_likuidasis as $collateral_jangka_waktu_likuidasi)
                                            <tr>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">{{ $collateral_jangka_waktu_likuidasi->kode }}</td>
                                                <td class="d-none d-md-table-cell">{{ $collateral_jangka_waktu_likuidasi->keterangan }}</td>
                                                <td style="text-align: center">{{ $collateral_jangka_waktu_likuidasi->rating }}</td>
                                                <td style="text-align: center">{{ $collateral_jangka_waktu_likuidasi->bobot }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Belum ada data.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Basic table -->
            </div>
        </div>
    </div>
@endsection
