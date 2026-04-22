@extends('kabag::layouts.main')

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
                                    <li class="breadcrumb-item"><a href="/kabag/pasar">Pasar</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/kabag/pasar/nasabah">Nasabah</a>
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
                            <div class="card-header">
                <form method="GET" action="/kabag/pasar/nasabah" class="d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama nasabah..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="/kabag/pasar/nasabah" class="btn btn-secondary">Reset</a>
                </form>
            </div>
            <div class="table-responsive">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th style="text-align: center">No</th>
                                            <th class="d-none d-md-table-cell">Nama Nasabah</th>
                                            <th style="text-align: center">NIK</th>
                                            <th>Alamat</th>
                                            <th style="text-align: center">Telepon</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @forelse ($proposals as $proposal)
                                            <tr>
                                                <td></td>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td class="d-none d-md-table-cell">{{ $proposal->nama_nasabah ?? '-' }}</td>
                                                <td style="text-align: center">{{ $proposal->no_ktp ?? '-' }}</td>
                                                <td>
                                                    {{ $proposal->alamat ?? '-' }}
                                                    @if (!empty($proposal->rt) || !empty($proposal->rw))
                                                        , {{ $proposal->rt ?? '-' }}, {{ $proposal->rw ?? '-' }}
                                                    @endif
                                                </td>
                                                <td style="text-align: center">{{ $proposal->no_tlp ?? $proposal->no_telp ?? '-' }}</td>
                                                <td style="text-align: center">
                                                    <a href="/kabag/pasar/nasabah/{{ $proposal->id }}" class="btn btn-outline-info btn-sm round">Detail</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Belum ada data.</td>
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
    <!-- END: Content-->
@endsection
