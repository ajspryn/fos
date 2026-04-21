    <!DOCTYPE html>
    <html class="loading" lang="en" data-textdirection="ltr">
    <!-- BEGIN: Head-->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Register</title>
        <link rel="apple-touch-icon" href="<?php echo e(asset('app-assets/images/ico/apple-icon-120.png')); ?>">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('favicon.png')); ?>">
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
            rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/vendors.min.css')); ?>">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/bootstrap-extended.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/colors.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/components.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/themes/dark-layout.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/themes/bordered-layout.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/themes/semi-dark-layout.min.css')); ?>">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css"
            href="<?php echo e(asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/plugins/forms/form-validation.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/pages/authentication.css')); ?>">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>">
        <!-- END: Custom CSS-->

    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->

    <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click"
        data-menu="vertical-menu-modern" data-col="blank-page">
        <!-- BEGIN: Content-->
        <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <div class="auth-wrapper auth-basic px-2">
                        <div class="auth-inner my-2">
                            <!-- Register basic -->
                            <div class="card mb-0">
                                <div class="card-body">
                                    <a href="#" class="brand-logo">
                                      <img src="<?php echo e(asset('logo.png')); ?>" height="150" alt="logo">
                                    </a>

                                    <h4 class="card-title mb-1">Selamat Datang! 👋</h4>
                                    <p class="card-text mb-2">Silakan Isi Data-Data Berikut Untuk Membuat Akun</p>
                                    <form class="auth-register-form mt-2" method="POST"
                                        action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="mb-1">
                                            <label for="name" class="form-label">Nama Lengkap</label>
                                            <input id="name" type="text" placeholder="Nama Lengkap"
                                                class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                                                value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>
                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="mb-1">
                                            <label for="email" class="form-label">E-mail</label>
                                            <input id="email" type="email" placeholder="nama@domain.com"
                                                class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                                                value="<?php echo e(old('email')); ?>" required autocomplete="email">
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                        <div class="mb-1">
                                            <div class="d-flex justify-content-between">
                                                <label for="password" class="form-label">Password</label>
                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input id="password" type="password"
                                                    placeholder="Minimal 8 Karakter"
                                                    class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control-merge"
                                                    name="password" required autocomplete="new-password">
                                                <span class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span>
                                            </div>
                                        </div>

                                        <div class="mb-1">
                                            <div class="d-flex justify-content-between">
                                                <label for="password-confirm" class="form-label">Konfirmasi
                                                    Password</label>
                                            </div>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input id="password-confirm" type="password"
                                                    placeholder="Konfirmasi Password"
                                                    class="form-control form-control-merge"
                                                    name="password_confirmation" required autocomplete="new-password">
                                                <span class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                        <div class="mb-1">
                                            <label for="foto" class="form-label"><?php echo e(__('Foto')); ?></label>
                                            <input id="foto" type="file" class="form-control" name="foto"
                                                required autocomplete="foto">
                                        </div>

                                        <div class="mt-2">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    <?php echo e(__('Register')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <p class="text-center mt-2" style="margin-bottom: -5px;">
                                        <span>Sudah Punya Akun?</span>
                                        <a href="/login">
                                            <span>Login</span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <!-- /Register basic -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content-->

        <!-- BEGIN: Vendor JS-->
        <script src="<?php echo e(asset('app-assets/vendors/js/vendors.min.js')); ?>"></script>
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <script src="<?php echo e(asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')); ?>"></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="<?php echo e(asset('app-assets/js/core/app-menu.min.js')); ?>"></script>
        <script src="<?php echo e(asset('app-assets/js/core/app.min.js')); ?>"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="<?php echo e(asset('app-assets/js/scripts/pages/auth-register.min.js')); ?>"></script>
        <!-- END: Page JS-->

        <script>
            $(window).on('load', function() {
                if (feather) {
                    feather.replace({
                        width: 14,
                        height: 14
                    });
                }
            })
        </script>
    </body>
    <!-- END: Body-->

    </html>


    
<?php /**PATH /Users/ajspryn/Project/fos/resources/views/auth/register.blade.php ENDPATH**/ ?>