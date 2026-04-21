@extends('analis::layouts.main')

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
                                    <li class="breadcrumb-item"><a href="/analis/ppr">PPR</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/analis/ppr/nasabah">Nasabah</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Nasabah
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
                            <div class="card-datatable table-responsive pt-0">
                                <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th style="text-align: center">No.</th>
                                        <th style="text-align: center">Nama Nasabah</th>
                                        <th style="text-align: center">NIK</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">No. Telepon/HP</th>
                                        <th style="text-align: center">Detail</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        <tr>
                                            <td></td>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ $proposal->form_pribadi_pemohon_nama_lengkap }}</td>
                                            <td style="text-align: center">{{ $proposal->form_pribadi_pemohon_no_ktp }}</td>
                                            <td>
                                                {{ $proposal->form_pribadi_pemohon_alamat_ktp }}
                                                RT {{ $proposal->form_pribadi_pemohon_alamat_ktp_rt }},
                                                RW {{ $proposal->form_pribadi_pemohon_alamat_ktp_rw }},
                                                KEL. {{ $proposal->form_pribadi_pemohon_alamat_ktp_kelurahan }},
                                                KEC. {{ $proposal->form_pribadi_pemohon_alamat_ktp_kecamatan }}
                                            </td>
                                            <td>{{ $proposal->form_pribadi_pemohon_no_handphone }}</td>
                                            <td style="text-align: center">
                                                <a href="/analis/ppr/nasabah/{{ $proposal->id }}"
                                                    class="btn btn-outline-info round">Detail</a>
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
