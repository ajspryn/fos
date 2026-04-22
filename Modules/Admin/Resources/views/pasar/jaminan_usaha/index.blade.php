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
                            <h2 class="content-header-title float-start mb-0">{{ $title ?? 'Pengaturan Jaminan' }}</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Pengaturan
                                    </li>
                                    <li class="breadcrumb-item active">Pasar
                                    </li>
                                    <li class="breadcrumb-item active">Jaminan</li>
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
                                <h5 class="card-header">Form Jaminan</h5>
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

                                    <form class="form" method="post" action="/admin/pasar/jaminanusaha">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="kode-jaminan">Kode Jaminan</label>
                                                    <input type="number" id="kode-jaminan" class="form-control" placeholder="Isikan Kode Jaminan" name="kode_jaminan" value="{{ old('kode_jaminan') }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="nama-jaminan">Nama Jaminan</label>
                                                    <input type="text" id="nama-jaminan" class="form-control" placeholder="Isikan Nama Jaminan" name="nama_jaminan" value="{{ old('nama_jaminan') }}" />
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
                                                <th style="text-align: center">Jaminan</th>
                                                <th style="text-align: center">Rating</th>
                                                <th style="text-align: center">Bobot</th>
                                                <th style="text-align: center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @forelse ($jaminans as $jaminan)
                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">{{ $jaminan->kode_jaminan }}</td>
                                                    <td>{{ $jaminan->nama_jaminan }}</td>
                                                    <td style="text-align: center">{{ $jaminan->rating }}</td>
                                                    <td style="text-align: center">{{ $jaminan->bobot }}</td>
                                                
                                                    <td style="text-align: center">
                                                        <button type="button" class="btn btn-sm btn-warning" 
                                                            data-bs-toggle="modal" data-bs-target="#editModal-{{ $jaminan->id }}">
                                                            Edit
                                                        </button>
                                                        <form action="/admin/pasar/jaminanusaha/{{ $jaminan->id }}" method="POST" class="d-inline" 
                                                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                        </form>
                                                    </td>
</tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" style="text-align: center">Belum ada data</td>
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
@foreach ($jaminans as $jaminan)
<div class="modal fade" id="editModal-{{ $jaminan->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="/admin/pasar/jaminanusaha/{{ $jaminan->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Jaminan</label>
                        <input type="text" name="kode_jaminan" class="form-control" value="{{ $jaminan->kode_jaminan }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Jaminan</label>
                        <input type="text" name="nama_jaminan" class="form-control" value="{{ $jaminan->nama_jaminan }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rating</label>
                        <input type="number" name="rating" class="form-control" value="{{ $jaminan->rating }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bobot</label>
                        <input type="number" name="bobot" class="form-control" value="{{ $jaminan->bobot }}" required>
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
