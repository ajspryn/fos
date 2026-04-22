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
                            <h2 class="content-header-title float-start mb-0">Pengaturan Instansi</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Pengaturan
                                    </li>
                                    <li class="breadcrumb-item active">SKPD
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Instansi</a>
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
                                <h5 class="card-header">Form Instansi</h5>
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

                                    <form class="form" method="post" action="/admin/skpd/instansi">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Kode Instansi</label>
                                                    <input type="number" id="first-name-column" class="form-control" placeholder="Isikan Kode Instansi" name="kode_instansi" value="{{ old('kode_instansi') }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Nama Instansi</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Isikan Nama Instansi" name="nama_instansi" value="{{ old('nama_instansi') }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Alamat</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Isikan Alamat Instansi" name="alamat_instansi" value="{{ old('alamat_instansi') }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Rating</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Isikan Rating" name="rating" value="{{ old('rating') }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Bobot</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Isikan Bobot" name="bobot" value="{{ old('bobot') }}" />
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
                                                <th style="text-align: center">Nama</th>
                                                <th style="text-align: center">Alamat</th>
                                                <th style="text-align: center">Rating</th>
                                                <th style="text-align: center">Bobot</th>
                                                <th style="text-align: center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @forelse ($instansis as $instansi)
                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">{{ $instansi->kode_instansi }}</td>
                                                    <td>{{ $instansi->nama_instansi }}</td>
                                                    <td>{{ $instansi->alamat_instansi }}</td>
                                                    <td style="text-align: center">{{ $instansi->rating }}</td>
                                                    <td style="text-align: center">{{ $instansi->bobot }}</td>
                                                
                                                    <td style="text-align: center">
                                                        <button type="button" class="btn btn-sm btn-warning" 
                                                            data-bs-toggle="modal" data-bs-target="#editModal-{{ $instansi->id }}">
                                                            Edit
                                                        </button>
                                                        <form action="/admin/skpd/instansi/{{ $instansi->id }}" method="POST" class="d-inline" 
                                                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                        </form>
                                                    </td>
</tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" style="text-align: center">Belum ada data</td>
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
@foreach ($instansis as $instansi)
<div class="modal fade" id="editModal-{{ $instansi->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="/admin/skpd/instansi/{{ $instansi->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Instansi</label>
                        <input type="text" name="kode_instansi" class="form-control" value="{{ $instansi->kode_instansi }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Instansi</label>
                        <input type="text" name="nama_instansi" class="form-control" value="{{ $instansi->nama_instansi }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat_instansi" class="form-control" value="{{ $instansi->alamat_instansi }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rating</label>
                        <input type="number" name="rating" class="form-control" value="{{ $instansi->rating }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bobot</label>
                        <input type="number" name="bobot" class="form-control" value="{{ $instansi->bobot }}" required>
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
