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
                            <h2 class="content-header-title float-start mb-0">Data Status</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Status
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Data Status</a>
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
                                    {{-- <h4 class="card-title">Keterangan</h4> --}}
                                </div>
                                <div class="card-body">
                                    <div class="row" id="divDetail">
                                        <div class="col-md-3 col-12">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <td style="text-align: center;"><strong>Status ID</strong>
                                                        </td>
                                                        <td style="text-align: center;"><strong>Keterangan</strong>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    <tr>
                                                        <td style="text-align: center;">1</td>
                                                        <td>Diajukan oleh Nasabah</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">2</td>
                                                        <td>Dilengkapi</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">3</td>
                                                        <td>Diajukan ke Komite</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">4</td>
                                                        <td>Sedang Ditinjau</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">5</td>
                                                        <td>Disetujui</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">6</td>
                                                        <td>Ditolak</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">7</td>
                                                        <td>Rekomendasi Revisi</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">8</td>
                                                        <td>Akad Dicetak</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">9</td>
                                                        <td>Akad Berhasil</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">10</td>
                                                        <td>Akad Batal</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">11</td>
                                                        <td>Rekomendasi</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <td style="text-align: center;"><strong>Role ID</strong>
                                                        </td>
                                                        <td style="text-align: center;"><strong>Nama Role</strong>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="text-align: center;">1</td>
                                                        <td>Admin</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">2</td>
                                                        <td>User</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-md-3 col-12">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <td style="text-align: center;"><strong>Divisi ID</strong>
                                                        </td>
                                                        <td style="text-align: center;"><strong>Nama Divisi</strong>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="text-align: center;">0</td>
                                                        <td>Admin</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">1</td>
                                                        <td>SKPD</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">2</td>
                                                        <td>Pasar</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">3</td>
                                                        <td>UMKM</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">4</td>
                                                        <td>PPR</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">5</td>
                                                        <td>Custodian</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">6</td>
                                                        <td>PPPK</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-3 col-12">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <td style="text-align: center;"><strong>Jabatan ID</strong>
                                                        </td>
                                                        <td style="text-align: center;"><strong>Nama
                                                                Jabatan</strong>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="text-align: center;">0</td>
                                                        <td>Admin</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">1</td>
                                                        <td>Staff/AO</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">2</td>
                                                        <td>Kabag</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">3</td>
                                                        <td>Analis</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">4</td>
                                                        <td>Direktur Bisnis</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;">5</td>
                                                        <td>Direktur Utama</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div></div>
                </section>
                <!--/ Basic table -->
            </div>
        </div>
    </div>
@endsection
