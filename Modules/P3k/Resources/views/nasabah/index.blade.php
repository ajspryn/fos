@extends('p3k::layouts.main')

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
                            <h2 class="content-header-title mb-0">Data Nasabah</h2>
                            <div class="breadcrumb-wrapper mt-1">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/p3k">P3K</a>
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
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Data Nasabah</h5>
                                <form method="GET" action="/p3k/nasabah" class="d-flex gap-1">
                                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari nama / NIK..." value="{{ $search ?? '' }}" style="width:220px;">
                                    <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                                    @if($search ?? null)<a href="/p3k/nasabah" class="btn btn-outline-secondary btn-sm">Reset</a>@endif
                                </form>
                            </div>
                            <div class="table-responsive">
                                    <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">NIK</th>
                                        <th style="text-align: center">Nama Nasabah</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">No. HP</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($proposals as $proposal)
                                        <tr>
                                            <td></td>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ $proposal->no_ktp }}</td>
                                            <td>{{ $proposal->nama_nasabah }}</td>
                                            <td>{{ $proposal->alamat }}, {{ $proposal->rt }},
                                                {{ $proposal->rw }}</td>
                                            <td>{{ $proposal->no_hp }}</td>
                                            <td style="text-align: center">
                                                <a href="/p3k/nasabah/{{ $proposal->id }}"
                                                    class="btn btn-outline-info round">Detail</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="6" class="text-center">Tidak ada data nasabah.</td></tr>
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
                </div>
            </section>
            <!--/ Basic table -->
        </div>
    </div>
    <!-- END: Content-->
@endsection
