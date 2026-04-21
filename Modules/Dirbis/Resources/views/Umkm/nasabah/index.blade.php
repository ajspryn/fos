@extends('dirbis::layouts.main')

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
                            <h2 class="content-header-title float-start mb-0">Data Nasabah</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/dirbis') }}">Dirbis</a></li>
                                    <li class="breadcrumb-item"><a href="#">UMKM</a></li>
                                    <li class="breadcrumb-item active">Data Nasabah</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic table -->
            <section>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive text-nowrap">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama Nasabah</th>
                                        <th style="text-align: center">NIK</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">Telepon</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach($proposals as $proposal)
                                        <tr>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ $proposal->nama_nasabah }}</td>
                                            <td>{{ $proposal->no_ktp }}</td>
                                            <td>{{ $proposal->alamat }}, {{ $proposal->rt }}, {{ $proposal->rw }}</td>
                                            <td>{{ $proposal->no_tlp }}</td>
                                            <td style="text-align: center">
                                                <a href="{{ url('/dirbis/umkm/nasabah/' . $proposal->id) }}" class="btn btn-outline-info btn-sm round">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
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
    <!-- END: Content-->
@endsection
