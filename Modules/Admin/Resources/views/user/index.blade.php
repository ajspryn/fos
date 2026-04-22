@extends('admin::layouts.main')

@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Pengaturan Role User</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">User</li>
                                    <li class="breadcrumb-item active"><a href="#">Role User</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                {{-- Flash Messages --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i data-feather="check-circle" class="me-50"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i data-feather="alert-circle" class="me-50"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Form Tambah Role User --}}
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Tambah / Assign Role User</h5>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="POST" action="/admin/user">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="user_id">User</label>
                                                    <select class="form-select" id="user_id" name="user_id" required>
                                                        <option value="">-- Pilih User --</option>
                                                        @foreach ($allUsers as $u)
                                                            <option value="{{ $u->id }}" {{ old('user_id') == $u->id ? 'selected' : '' }}>
                                                                [{{ $u->id }}] {{ $u->name }} ({{ $u->email }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="role_id">Role</label>
                                                    <select class="form-select" id="role_id" name="role_id" required>
                                                        <option value="">-- Pilih Role --</option>
                                                        @foreach ($roleLabels as $id => $label)
                                                            <option value="{{ $id }}" {{ old('role_id') == $id ? 'selected' : '' }}>
                                                                {{ $label }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="divisi_id">Divisi</label>
                                                    <select class="form-select" id="divisi_id" name="divisi_id" required>
                                                        <option value="">-- Pilih Divisi --</option>
                                                        @foreach ($divisiLabels as $id => $label)
                                                            <option value="{{ $id }}" {{ old('divisi_id') == $id ? 'selected' : '' }}>
                                                                {{ $label }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="jabatan_id">Jabatan</label>
                                                    <select class="form-select" id="jabatan_id" name="jabatan_id" required>
                                                        <option value="">-- Pilih Jabatan --</option>
                                                        @foreach ($jabatanLabels as $id => $label)
                                                            <option value="{{ $id }}" {{ old('jabatan_id') == $id ? 'selected' : '' }}>
                                                                {{ $label }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end mt-1">
                                                <button type="reset" class="btn btn-outline-secondary me-1">Reset</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Tabel Data User --}}
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-1">
                                    <h5 class="mb-0">Daftar User</h5>
                                    <form method="GET" action="/admin/user" class="d-flex gap-1">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Cari nama / email..." value="{{ request('search') }}" style="min-width:220px;">
                                        <button type="submit" class="btn btn-primary">
                                            <i data-feather="search" class="font-small-4"></i>
                                        </button>
                                        @if(request('search'))
                                            <a href="/admin/user" class="btn btn-outline-secondary">Reset</a>
                                        @endif
                                    </form>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width:50px">No.</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th class="text-center">Role</th>
                                                <th class="text-center">Divisi</th>
                                                <th class="text-center">Jabatan</th>
                                                <th class="text-center" style="width:60px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @forelse ($users as $user)
                                                <tr>
                                                    <td class="text-center">{{ $users->firstItem() + $loop->index }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td class="text-center">
                                                        @if(is_null($user->role_id))
                                                            <span class="badge bg-secondary">Belum diset</span>
                                                        @else
                                                            <span class="badge bg-{{ $user->role_id == 1 ? 'primary' : 'info' }}">
                                                                {{ $roleLabels[$user->role_id] ?? $user->role_id }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $divisiLabels[$user->divisi_id] ?? ($user->divisi_id === null ? '-' : $user->divisi_id) }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $jabatanLabels[$user->jabatan_id] ?? ($user->jabatan_id === null ? '-' : $user->jabatan_id) }}
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                                data-bs-toggle="dropdown">
                                                                <i data-feather="more-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" data-bs-toggle="modal"
                                                                    data-bs-target="#modalEditProfile-{{ $user->id }}">
                                                                    <i data-feather="user" class="me-50"></i>
                                                                    <span>Edit Data</span>
                                                                </a>
                                                                @if(!is_null($user->role_id))
                                                                <a class="dropdown-item" data-bs-toggle="modal"
                                                                    data-bs-target="#modalEditUser-{{ $user->id }}">
                                                                    <i data-feather="edit-2" class="me-50"></i>
                                                                    <span>Edit Role</span>
                                                                </a>
                                                                <a class="dropdown-item text-danger" data-bs-toggle="modal"
                                                                    data-bs-target="#modalDeleteRole-{{ $user->id }}">
                                                                    <i data-feather="trash" class="me-50"></i>
                                                                    <span>Hapus Role</span>
                                                                </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center py-3 text-muted">
                                                        Tidak ada data user ditemukan.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-body">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Modals --}}
                @foreach ($users as $userForModal)
                    <!-- Modal Edit Profile (Nama / Email / Password) -->
                    <div class="modal fade" id="modalEditProfile-{{ $userForModal->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Data Karyawan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body px-sm-5 pb-4">
                                    <form method="POST" action="/admin/user/{{ $userForModal->id }}/profile">
                                        @method('PUT')
                                        @csrf
                                        <div class="mb-1">
                                            <label class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $userForModal->name }}" required maxlength="255">
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $userForModal->email }}" required maxlength="255">
                                        </div>
                                        <hr>
                                        <p class="text-muted small mb-1">Kosongkan password jika tidak ingin mengubah.</p>
                                        <div class="mb-1">
                                            <label class="form-label">Password Baru</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Minimal 8 karakter" autocomplete="new-password">
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label">Konfirmasi Password</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                placeholder="Ulangi password baru" autocomplete="new-password">
                                        </div>
                                        <div class="d-flex justify-content-end gap-1 mt-2">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Modal Edit Profile -->

                    @if(!is_null($userForModal->role_id))
                        <!-- Modal Edit User -->
                        <div class="modal fade" id="modalEditUser-{{ $userForModal->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Role User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-sm-5 pb-4">
                                        <p class="text-muted mb-3">
                                            <strong>{{ $userForModal->name }}</strong> &mdash; {{ $userForModal->email }}
                                        </p>
                                        <form class="form" method="POST" action="/admin/user/{{ $userForModal->id }}">
                                            @method('PUT')
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 mb-1">
                                                    <label class="form-label">Role</label>
                                                    <select class="form-select" name="role_id" required>
                                                        @foreach ($roleLabels as $id => $label)
                                                            <option value="{{ $id }}" {{ $userForModal->role_id == $id ? 'selected' : '' }}>
                                                                {{ $label }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 mb-1">
                                                    <label class="form-label">Divisi</label>
                                                    <select class="form-select" name="divisi_id" required>
                                                        @foreach ($divisiLabels as $id => $label)
                                                            <option value="{{ $id }}" {{ $userForModal->divisi_id == $id ? 'selected' : '' }}>
                                                                {{ $label }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12 mb-1">
                                                    <label class="form-label">Jabatan</label>
                                                    <select class="form-select" name="jabatan_id" required>
                                                        @foreach ($jabatanLabels as $id => $label)
                                                            <option value="{{ $id }}" {{ $userForModal->jabatan_id == $id ? 'selected' : '' }}>
                                                                {{ $label }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end gap-1 mt-2">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Modal Edit User -->

                        <!-- Modal Hapus Role -->
                        <div class="modal fade" id="modalDeleteRole-{{ $userForModal->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-danger">Hapus Role</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center px-sm-4 pb-4">
                                        <i data-feather="alert-triangle" class="text-warning mb-1" style="width:48px;height:48px;"></i>
                                        <p>Hapus role dari user <strong>{{ $userForModal->name }}</strong>?</p>
                                        <form method="POST" action="/admin/user/{{ $userForModal->id }}">
                                            @method('DELETE')
                                            @csrf
                                            <div class="d-flex justify-content-center gap-1">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Modal Hapus Role -->
                    @endif
                @endforeach

            </div>
        </div>
    </div>
@endsection

