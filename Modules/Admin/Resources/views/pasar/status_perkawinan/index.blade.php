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
                            <h2 class="content-header-title float-start mb-0">{{ $title ?? 'Pengaturan Status Perkawinan' }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Pengaturan
                                    </li>
                                    <li class="breadcrumb-item active">Pasar
                                    </li>
                                    <li class="breadcrumb-item active">Status Perkawinan</li>
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
                                <h5 class="card-header">Form Status Perkawinan</h5>
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

                                    <form class="form" method="post" action="/admin/pasar/statusperkawinan">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Kode Status Perkawinan</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Isikan Kode Status Perkawinan" name="kode_status_perkawinan" value="{{ old('kode_status_perkawinan') }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Status Perkawinan</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Isikan Status Perkawinan" name="nama_status_perkawinan" value="{{ old('nama_status_perkawinan') }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Biaya</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Isikan Biaya" name="biaya" value="{{ old('biaya') }}" />
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
                                                <th style="text-align: center">Kode</th>
                                                <th style="text-align: center">Status Perkawinan</th>
                                                <th style="text-align: center">Biaya</th>
                                                <th style="text-align: center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @forelse ($statusperkawinans as $statusperkawinan)
                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">{{ $statusperkawinan->kode_status_perkawinan }}</td>
                                                    <td>{{ $statusperkawinan->nama_status_perkawinan }}</td>
                                                    <td style="text-align: center">{{ $statusperkawinan->biaya }}</td>
                                                
                                                    <td style="text-align: center">
                                                        <button type="button" class="btn btn-sm btn-warning" 
                                                            data-bs-toggle="modal" data-bs-target="#editModal-{{ $statusperkawinan->id }}">
                                                            Edit
                                                        </button>
                                                        <form action="/admin/pasar/statusperkawinan/{{ $statusperkawinan->id }}" method="POST" class="d-inline" 
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
@foreach ($statusperkawinans as $statusperkawinan)
<div class="modal fade" id="editModal-{{ $statusperkawinan->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="/admin/pasar/statusperkawinan/{{ $statusperkawinan->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode</label>
                        <input type="text" name="kode_status_perkawinan" class="form-control" value="{{ $statusperkawinan->kode_status_perkawinan }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status Perkawinan</label>
                        <input type="text" name="nama_status_perkawinan" class="form-control" value="{{ $statusperkawinan->nama_status_perkawinan }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Biaya</label>
                        <input type="number" name="biaya" class="form-control" value="{{ $statusperkawinan->biaya }}" required>
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
