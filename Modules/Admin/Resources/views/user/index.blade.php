@extends('admin::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Pengaturan Role User</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">User
                                    </li>
                                    <li class="breadcrumb-item active">Data User
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Role User</a>
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
                                    <h4 class="card-title">Form Role User</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="post" action="/admin/user">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">User ID</label>
                                                    <input type="number" id="first-name-column" class="form-control"
                                                        placeholder="Isikan User ID" name="user_id" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Role ID</label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                        placeholder="Isikan Role" name="role_id" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Divisi ID</label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                        placeholder="Isikan Divisi" name="divisi_id" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-column">Jabatan ID</label>
                                                    <input type="text" id="first-name-column" class="form-control"
                                                        placeholder="Isikan Jabatan" name="jabatan_id" />
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
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center"></th>
                                            <th style="text-align: center">ID User</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th style="text-align: center">Role</th>
                                            <th style="text-align: center">Divisi</th>
                                            <th style="text-align: center">Jabatan</th>
                                            <th style="text-align: center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td style="text-align: center"></td>
                                                <td style="text-align: center">{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td style="text-align: center">
                                                    @if ($user->role_id == 1)
                                                        Admin
                                                    @elseif ($user->role_id == 2)
                                                        User
                                                    @endif
                                                </td>
                                                <td style="text-align: center">
                                                    @if ($user->divisi_id == 0)
                                                        Admin
                                                    @elseif ($user->divisi_id == 1)
                                                        SKPD
                                                    @elseif ($user->divisi_id == 2)
                                                        Pasar
                                                    @elseif ($user->divisi_id == 3)
                                                        UMKM
                                                    @elseif ($user->divisi_id == 4)
                                                        PPR
                                                    @else
                                                    @endif
                                                </td>
                                                <td style="text-align: center">
                                                    @if ($user->jabatan_id == 0)
                                                        Admin
                                                    @elseif ($user->jabatan_id == 1)
                                                        Staff/AO
                                                    @elseif ($user->jabatan_id == 2)
                                                        Kabag
                                                    @elseif ($user->jabatan_id == 3)
                                                        Analis
                                                    @elseif ($user->jabatan_id == 4)
                                                        Direktur Bisnis
                                                    @elseif ($user->jabatan_id == 5)
                                                        Direktur Utama
                                                    @else
                                                    @endif
                                                </td>
                                                <td style="text-align: center">
                                                    <div class="dropdown">
                                                        <button type="button"
                                                            class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                            data-bs-toggle="dropdown">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="/admin/user/{{ $user->id }}">
                                                                <i data-feather="edit-2" class="me-50"></i>
                                                                <span>Edit</span>
                                                            </a>
                                                            <a class="dropdown-item"
                                                                onclick="event.preventDefault(); document.getElementById('delete').submit();">
                                                                <i data-feather="trash" class="me-50"></i>
                                                                <span>Delete</span>
                                                            </a>
                                                            <form id="delete"
                                                                action="/admin/user/{{ $user->id }}" class="d-none"
                                                                method="POST">
                                                                @method('delete')
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Basic table -->
            </div>
        </div>
    </div>
@endsection
