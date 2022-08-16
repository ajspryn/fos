@extends('admin::layouts.main')

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
                            <h2 class="content-header-title float-start mb-0">Pengaturan Jaminan Rumah</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Pengaturan
                                    </li>
                                    <li class="breadcrumb-item active">UMKM
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Jaminan Rumah</a>
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
                                <div class="card-header">
                                    <h4 class="card-title">Form Jaminan Rumah</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="post" action="/admin/pasar/jaminanrumah">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Kode Jaminan Rumah</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Isikan jaminan rumah" name="kode_jaminan"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Jaminan Rumah</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Isikan Jenis Jaminan" name="nama_jaminan"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Rating</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Isikan Rating" name="rating"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Bobot</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Isikan Bobot" name="bobot"/>
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
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Jaminan</th>
                                            <th>Rating</th>
                                            <th>Bobot</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rumahs as $rumah)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $rumah->kode_jaminan }}</td>
                                            <td>{{ $rumah->nama_jaminan }}</td>
                                            <td>{{ $rumah->rating }}</td>
                                            <td>{{ $rumah->bobot}}</td>
                                            <td></td>
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
    </div>
@endsection
