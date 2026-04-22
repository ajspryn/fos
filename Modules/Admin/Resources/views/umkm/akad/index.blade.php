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
                            <h2 class="content-header-title float-start mb-0">Pengaturan Akad</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Pengaturan
                                    </li>
                                    <li class="breadcrumb-item active">UMKM
                                    </li>
                                    <li class="breadcrumb-item active"><a href="/umkm/komite/{{ $proposal->id }}">Akad</a>
                                    </li>
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
                                <h5 class="card-header">Form Akad</h5>
                                <div class="card-body">
                                    <form class="form" method="post" action="admin/skpd/akad">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Kode Akad</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Isikan Kode Jaminan" name="kode_akad"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Jenis Akad</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Isikan Nama Akad" name="nama_akad"/>
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
                                <div class="table-responsive">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center"></th>
                                                <th>No</th>
                                            <th>Kode</th>
                                            <th class="d-none d-md-table-cell">Akad</th>
                                            <th style="text-align: center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>                                            <td style="text-align: center">
                                                <a href="/umkm/komite/{{ $proposal->id }}" class="btn btn-icon btn-icon rounded-circle btn-flat-success">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </td>                                            <td style="text-align: center">
                                                <a href="/umkm/komite/{{ $proposal->id }}" class="btn btn-icon btn-icon rounded-circle btn-flat-success">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </td>


                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $akad->kode_akad }}</td>
                                            <td>{{ $akad->nama_akad }}</td>
                                            <td></td>
                                <td style="text-align: center">
                                    <a href="/umkm/komite/{{ $proposal->id }}" class="btn btn-outline-info btn-sm round">Detail</a>
                                </td>
                                </tr>
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
