@extends('admin::layouts.main')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Parameter Bobot</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Pengaturan</li>
                                    <li class="breadcrumb-item active"><a href="#">Parameter Bobot</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <h5 class="card-header">SKPD - Score Terbobot</h5>
                                <div class="card-datatable table-responsive pt-0">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">Score Terendah</th>
                                                <th style="text-align: center">Score Tertinggi</th>
                                                <th style="text-align: center">Keterangan</th>
                                                <th style="text-align: center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @forelse ($skpdScoreTerbobots as $row)
                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">{{ $row->score_terendah }}</td>
                                                    <td style="text-align: center">{{ $row->score_tertinggi }}</td>
                                                    <td>{{ $row->keterangan }}</td>
                                                    <td style="text-align: center">{{ $row->status }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" style="text-align: center">Belum ada data</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card">
                                <h5 class="card-header">Pasar / UMKM - Score Bobot</h5>
                                <div class="card-datatable table-responsive pt-0">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">Score Terendah</th>
                                                <th style="text-align: center">Score Tertinggi</th>
                                                <th style="text-align: center">Rating</th>
                                                <th style="text-align: center">Bobot</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @forelse ($pasarScoreBobots as $row)
                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">{{ $row->score_terendah }}</td>
                                                    <td style="text-align: center">{{ $row->score_tertinggi }}</td>
                                                    <td style="text-align: center">{{ $row->rating }}</td>
                                                    <td style="text-align: center">{{ $row->bobot }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" style="text-align: center">Belum ada data</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
