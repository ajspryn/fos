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
                                    {{-- <li class="breadcrumb-item active">Data User
                                    </li> --}}
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
                                    <form class="form" method="POST" action="/admin/user">
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
                                            <div class="col-12"
                                                style="text-align: right; margin-top:10px; padding-right:30px;">
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                                <button type="submit" class="btn btn-primary me-1">Submit</button>
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
                                            <th style="text-align: center">No.</th>
                                            <th style="text-align: center">Nama</th>
                                            <th style="text-align: center">Email</th>
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
                                                <td style="text-align: center">{{ $user->name }}</td>
                                                <td style="text-align: center">{{ $user->email }}</td>
                                                <td style="text-align: center">{{ $user->role_id }}</td>
                                                <td style="text-align: center">{{ $user->divisi_id }}</td>
                                                <td style="text-align: center">{{ $user->jabatan_id }}
                                                </td>
                                                <td style="text-align: center">
                                                    <div class="dropdown">
                                                        <button type="button"
                                                            class="btn btn-sm dropdown-toggle hide-arrow py-0"
                                                            data-bs-toggle="dropdown">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item"data-bs-toggle="modal"
                                                                data-bs-target="#modalEditUser-{{ $user->id }}">
                                                                <i data-feather="edit-2" class="me-50"></i>
                                                                <span>Edit</span>
                                                            </a>

                                                            <a class="dropdown-item"data-bs-toggle="modal"
                                                                data-bs-target="#modalDeleteRole-{{ $user->id }}">
                                                                <i data-feather="trash" class="me-50"></i>
                                                                <span>Delete</span>
                                                            </a>


                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                @foreach ($users as $userForModal)
                                    <!-- Modal Edit User -->
                                    <div class="modal fade" id="modalEditUser-{{ $userForModal->id }}" tabindex="-1"
                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-transparent">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                    <h3 class="text-center">Edit Role User</h3>
                                                    <br />
                                                    {{-- <textarea class="form-control" name="catatan" rows="3" placeholder="Catatan">{{ $historyCatatan->catatan }}</textarea> --}}
                                                    <form class="form" method="POST"
                                                        action="/admin/user/{{ $userForModal->id }}">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="first-name-column">User
                                                                        ID</label>
                                                                    <input type="number" id="first-name-column"
                                                                        class="form-control" placeholder="Isikan User ID"
                                                                        name="user_id" value="{{ $userForModal->id }}"
                                                                        disabled />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="roleId">Role
                                                                        ID</label>
                                                                    <input type="text" id="roleId"
                                                                        class="form-control" placeholder="Isikan Role"
                                                                        name="role_id"
                                                                        value="{{ $userForModal->role_id }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="divisiId">Divisi
                                                                        ID</label>
                                                                    <input type="text" id="divisiId"
                                                                        class="form-control" placeholder="Isikan Divisi"
                                                                        name="divisi_id"
                                                                        value="{{ $userForModal->divisi_id }}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="jabatanId">Jabatan
                                                                        ID</label>
                                                                    <input type="text" id="jabatanId"
                                                                        class="form-control" placeholder="Isikan Jabatan"
                                                                        name="jabatan_id"
                                                                        value="{{ $userForModal->jabatan_id }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br />
                                                        <div class="row">
                                                            <div class="col-md-6" style="width:150px; margin:0 auto;">
                                                                <button type="reset"
                                                                    class="btn btn-outline-secondary w-100">Reset</button>
                                                            </div>
                                                            <div class="col-md-6" style="width:150px; margin:0 auto;">
                                                                <button type="submit"
                                                                    class="btn btn-primary me-1 w-100">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Modal Edit User -->

                                    <!-- Modal Delete Role -->
                                    <div class="modal fade" id="modalDeleteRole-{{ $userForModal->id }}" tabindex="-1"
                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-transparent">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                    <h3 class="text-center">Apakah Anda yakin untuk menghapus Role dari
                                                        User ini?</h3>
                                                    <br />
                                                    <form class="form" method="POST"
                                                        action="/admin/user/{{ $userForModal->id }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <div>
                                                            <br />
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <button class="btn btn-primary form-control"
                                                                        type="submit">Ya
                                                                        <input type="hidden" name="delete_repeater"
                                                                            value="Hapus Kekayaan Simpanan">
                                                                    </button>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <button type="button"
                                                                        class="btn btn-outline-danger form-control"
                                                                        data-bs-dismiss="modal">Tidak</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Modal Delete Role -->
                                @endforeach

                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Basic table -->
            </div>
        </div>
    </div>
@endsection
