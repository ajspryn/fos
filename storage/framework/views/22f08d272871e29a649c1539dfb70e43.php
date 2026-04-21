<?php $__env->startSection('content'); ?>
    <!-- BEGIN: Content-->
    <div class="app-content content ">
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
                                    <li class="breadcrumb-item">User
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
                                <h5 class="card-header">Form Role User</h5>
                                <div class="card-body">
                                    <form class="form" method="POST" action="/admin/user">
                                        <?php echo csrf_field(); ?>
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
                                            <div class="col-md-2 col-12">
                                                <button type="button" class="btn btn-primary" onclick="toggleDetail()">
                                                    <i data-feather="info" class="font-md-1"></i>
                                                    Keterangan</button>
                                                <br />
                                            </div>
                                            <div class="row hidden" id="divDetail">
                                                <div class="col-md-4 col-12">
                                                    <div class="card-datatable table-responsive pt-0">

                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align: center;"><strong>Role ID</strong></th>
                                                                <th style="text-align: center;"><strong>Nama Role</strong></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0">
                                                            <tr>
                                                                <td style="text-align: center;">1</td>
                                                                <td>Admin</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: center;">2</td>
                                                                <td>User</td>
                                                            </tr>
                                    </tbody>
                                                    </table>

                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="card-datatable table-responsive pt-0">

                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <td style="text-align: center;"><strong>Divisi ID</strong>
                                                                </td>
                                                                <td style="text-align: center;"><strong>Nama Divisi</strong>
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0">
                                                            <tr>
                                                                <td style="text-align: center;">0</td>
                                                                <td>Admin</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: center;">1</td>
                                                                <td>SKPD</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: center;">2</td>
                                                                <td>Pasar</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: center;">3</td>
                                                                <td>UMKM</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: center;">4</td>
                                                                <td>PPR</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: center;">5</td>
                                                                <td>Custodian</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: center;">6</td>
                                                                <td>PPPK</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="card-datatable table-responsive pt-0">

                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <td style="text-align: center;"><strong>Jabatan ID</strong>
                                                                </td>
                                                                <td style="text-align: center;"><strong>Nama
                                                                        Jabatan</strong>
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0">
                                                            <tr>
                                                                <td style="text-align: center;">0</td>
                                                                <td>Admin</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: center;">1</td>
                                                                <td>Staff/AO</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: center;">2</td>
                                                                <td>Kabag</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: center;">3</td>
                                                                <td>Analis</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: center;">4</td>
                                                                <td>Direktur Bisnis</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: center;">5</td>
                                                                <td>Direktur Utama</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <br />
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
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center"></th>
                                            <th class="d-none d-md-table-cell" style="text-align: center">No.</th>
                                            <th style="text-align: center">Nama</th>
                                            <th style="text-align: center">Email</th>
                                            <th style="text-align: center">Role</th>
                                            <th style="text-align: center">Divisi</th>
                                            <th style="text-align: center">Jabatan</th>
                                            <th style="text-align: center"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td style="text-align: center"></td>
                                                <td style="text-align: center"><?php echo e($user->id); ?></td>
                                                <td style="text-align: center"><?php echo e($user->name); ?></td>
                                                <td style="text-align: center"><?php echo e($user->email); ?></td>
                                                <td style="text-align: center"><?php echo e($user->role_id); ?></td>
                                                <td style="text-align: center"><?php echo e($user->divisi_id); ?></td>
                                                <td style="text-align: center"><?php echo e($user->jabatan_id); ?>

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
                                                                data-bs-target="#modalEditUser-<?php echo e($user->id); ?>">
                                                                <i data-feather="edit-2" class="me-50"></i>
                                                                <span>Edit</span>
                                                            </a>

                                                            <a class="dropdown-item"data-bs-toggle="modal"
                                                                data-bs-target="#modalDeleteRole-<?php echo e($user->id); ?>">
                                                                <i data-feather="trash" class="me-50"></i>
                                                                <span>Delete</span>
                                                            </a>


                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>

                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userForModal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <!-- Modal Edit User -->
                                    <div class="modal fade" id="modalEditUser-<?php echo e($userForModal->id); ?>" tabindex="-1"
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
                                                    
                                                    <form class="form" method="POST"
                                                        action="/admin/user/<?php echo e($userForModal->id); ?>">
                                                        <?php echo method_field('PUT'); ?>
                                                        <?php echo csrf_field(); ?>
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="first-name-column">User
                                                                        ID</label>
                                                                    <input type="number" id="first-name-column"
                                                                        class="form-control" placeholder="Isikan User ID"
                                                                        name="user_id" value="<?php echo e($userForModal->id); ?>"
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
                                                                        value="<?php echo e($userForModal->role_id); ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="divisiId">Divisi
                                                                        ID</label>
                                                                    <input type="text" id="divisiId"
                                                                        class="form-control" placeholder="Isikan Divisi"
                                                                        name="divisi_id"
                                                                        value="<?php echo e($userForModal->divisi_id); ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="jabatanId">Jabatan
                                                                        ID</label>
                                                                    <input type="text" id="jabatanId"
                                                                        class="form-control" placeholder="Isikan Jabatan"
                                                                        name="jabatan_id"
                                                                        value="<?php echo e($userForModal->jabatan_id); ?>" />
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
                                    <div class="modal fade" id="modalDeleteRole-<?php echo e($userForModal->id); ?>" tabindex="-1"
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
                                                        action="/admin/user/<?php echo e($userForModal->id); ?>">
                                                        <?php echo method_field('DELETE'); ?>
                                                        <?php echo csrf_field(); ?>
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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Basic table -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function toggleDetail() {
        var divDetail = document.getElementById("divDetail");
        divDetail.classList.toggle("hidden");
    }
</script>

<?php echo $__env->make('admin::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Admin/Resources/views/user/index.blade.php ENDPATH**/ ?>