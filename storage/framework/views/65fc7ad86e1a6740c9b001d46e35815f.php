<?php $__env->startPush('page-css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/plugins/forms/form-validation.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('page-js'); ?>
    <script src="<?php echo e(asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/js/scripts/pages/auth-login.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="card mb-0">
    <div class="card-body">
        <div class="text-center mb-2">
            <a href="/" class="brand-logo d-inline-flex align-items-center justify-content-center mb-1">
                <img src="<?php echo e(asset('logo.png')); ?>" height="110" alt="logo" class="form-logo">
            </a>
            <h3 class="fw-bolder mb-25">BPRS BTB</h3>
            <p class="text-muted mb-0">Sistem Pembiayaan Terintegrasi</p>
        </div>

        <h4 class="card-title mb-1">Selamat Datang!</h4>
        <p class="card-text mb-2">Silakan masukkan email/username dan password Anda untuk melanjutkan.</p>

        <form class="auth-login-form mt-2" method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-1">
                <label for="login-email" class="form-label">Email / Username</label>
                <div class="input-group input-group-merge">
                    <span class="input-group-text"><i data-feather="mail"></i></span>
                    <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="login-email" placeholder="email atau username" aria-describedby="login-email" name="email" value="<?php echo e(old('email')); ?>" required autofocus tabindex="1" />
                </div>
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
                    <label class="form-label" for="login-password">Password</label>
                    <?php if(Route::has('password.request')): ?>
                        <a class="small" href="<?php echo e(route('password.request')); ?>">Lupa Password?</a>
                    <?php endif; ?>
                </div>
                <div class="input-group input-group-merge form-password-toggle">
                    <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control-merge" id="login-password" tabindex="2" placeholder="••••••••••" aria-describedby="login-password" name="password" required autocomplete="current-password" />
                    <span class="input-group-text cursor-pointer" style="position: relative; z-index: 10;" onclick="(function(btn){var inp=document.getElementById('login-password');if(!inp)return;var show=inp.type==='password';inp.type=show?'text':'password';var svg=btn.querySelector('svg');if(svg&&window.feather){svg.outerHTML=feather.icons[show?'eye-off':'eye'].toSvg({width:16,height:16});}})(this)"><i data-feather="eye"></i></span>
                </div>
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

            <div class="mb-1 d-flex align-items-center justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" tabindex="3" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> />
                    <label class="form-check-label" for="remember-me">Ingat Saya</label>
                </div>
                <a href="/" class="small text-muted">Kembali ke Beranda</a>
            </div>

            <button type="submit" class="btn btn-primary w-100" tabindex="4">
                <i data-feather="log-in" class="me-50"></i>Masuk
            </button>
        </form>

        <div class="mt-2 text-center text-muted small">
            Butuh bantuan? Hubungi admin cabang Anda.
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/resources/views/auth/login.blade.php ENDPATH**/ ?>