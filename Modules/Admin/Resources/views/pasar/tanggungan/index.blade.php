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
                            <h2 class="content-header-title float-start mb-0">{{ $title ?? 'Pengaturan Tanggungan' }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Pengaturan
                                    </li>
                                    <li class="breadcrumb-item active">Pasar
                                    </li>
                                    <li class="breadcrumb-item active">Tanggungan</li>
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
                                <h5 class="card-header">Form Tanggungan</h5>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show"><button type="button" class="btn-close" data-bs-dismiss="alert"></button>{{ session('success') }}</div>
                                    @endif

                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show"><button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form class="form" method="post" action="/admin/pasar/tanggungan">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="kode-tanggungan">Kode Tanggungan</label>
                                                    <input type="number" id="kode-tanggungan" class="form-control" placeholder="Isikan Kode Tanggungan" name="kode_tanggungan" value="{{ old('kode_tanggungan') }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="banyak-tanggungan">Banyak Tanggungan</label>
                                                    <input type="number" id="banyak-tanggungan" class="form-control" placeholder="Isikan Banyak Tanggungan" name="bannyak_tanggungan" value="{{ old('bannyak_tanggungan') }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Biaya</label>
                                                    <input type="number" id="first-name-column" class="form-control number-mask" placeholder="Isikan Biaya" name="biaya" value="{{ old('biaya') }}" />
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
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">Kode Tanggungan</th>
                                                <th style="text-align: center">Banyak Tanggungan</th>
                                                <th style="text-align: center">Biaya</th>
                                                <th style="text-align: center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @forelse ($tanggungans as $tanggungan)
                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">{{ $tanggungan->kode_tanggungan }}</td>
                                                    <td style="text-align: center">{{ $tanggungan->bannyak_tanggungan }}</td>
                                                    <td style="text-align: center">{{ $tanggungan->biaya }}</td>
                                                
                                                    <td style="text-align: center">
                                                        <button type="button" class="btn btn-sm btn-warning" 
                                                            data-bs-toggle="modal" data-bs-target="#editModal-{{ $tanggungan->id }}">
                                                            Edit
                                                        </button>
                                                        <form action="/admin/pasar/tanggungan/{{ $tanggungan->id }}" method="POST" class="d-inline" 
                                                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                        </form>
                                                    </td>
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
                <!--/ Basic table -->
            </div>
        </div>
    </div>
{{-- Edit Modals --}}
@foreach ($tanggungans as $tanggungan)
<div class="modal fade" id="editModal-{{ $tanggungan->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="/admin/pasar/tanggungan/{{ $tanggungan->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Tanggungan</label>
                        <input type="text" name="kode_tanggungan" class="form-control" value="{{ $tanggungan->kode_tanggungan }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Banyak Tanggungan</label>
                        <input type="number" name="bannyak_tanggungan" class="form-control" value="{{ $tanggungan->bannyak_tanggungan }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Biaya</label>
                        <input type="number" name="biaya" class="form-control" value="{{ $tanggungan->biaya }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection
