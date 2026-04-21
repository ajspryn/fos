<?php ($isFront = $isFront ?? false); ?>
<!-- BEGIN: Core JS-->
<script src="<?php echo e(asset('assets/vendor/libs/jquery/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/popper/popper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/node-waves/node-waves.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/pickr/pickr.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/hammer/hammer.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/js/menu.js')); ?>"></script>
<!-- END: Core JS-->

<!-- BEGIN: Vendor JS-->
<script src="<?php echo e(asset('assets/vendor/libs/apex-charts/apexcharts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/select2/select2.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/flatpickr/flatpickr.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/bs-stepper/bs-stepper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/dropzone/dropzone.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/cleave-zen/cleave-zen.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendor/libs/sweetalert2/sweetalert2.js')); ?>"></script>
<!-- END: Vendor JS-->

<!-- BEGIN: Main JS-->
<script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
<!-- END: Main JS-->

<!-- BEGIN: Page JS-->
<?php if($isFront): ?>
    <script src="<?php echo e(asset('assets/vendor/js/dropdown-hover.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/js/mega-dropdown.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/front-main.js')); ?>"></script>
<?php else: ?>
    <script src="<?php echo e(asset('assets/js/app-ecommerce-dashboard.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/tables-datatables-basic.js')); ?>?v=<?php echo e(filemtime(public_path('assets/js/tables-datatables-basic.js'))); ?>"></script>
    <script src="<?php echo e(asset('assets/js/forms-pickers.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/forms-extras.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/form-wizard-numbered.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/app-invoice-list.js')); ?>"></script>
<?php endif; ?>
<!-- END: Page JS-->

<?php echo $__env->yieldPushContent('page-js'); ?>

<style>
    .customizer,
    .customizer-toggle {
        display: none !important;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
    window.addEventListener('load', function() {
        if (window.feather) {
            window.feather.replace({ width: 16, height: 16 });
        }
    });

    (function() {
        function normalizeSidebarBrandLinks() {
            document.querySelectorAll('.layout-menu .app-brand-link').forEach(function(brandLink) {
                var currentHref = brandLink.getAttribute('href') || '';

                if (!currentHref || (currentHref !== '/' && currentHref !== '<?php echo e(url('/')); ?>')) {
                    try {
                        var resolvedUrl = new URL(brandLink.href, window.location.origin);
                        if (resolvedUrl.pathname !== '/') {
                            return;
                        }
                    } catch (error) {
                        return;
                    }
                }

                var menuRoot = brandLink.closest('.layout-menu');
                if (!menuRoot) {
                    return;
                }

                var firstMenuLink = menuRoot.querySelector('.menu-inner a[href]:not([href="/"]):not([href="#"]):not([href="javascript:void(0);"])');
                if (firstMenuLink) {
                    brandLink.setAttribute('href', firstMenuLink.getAttribute('href'));
                }
            });
        }

        function normalizeLogoutLinks() {
            document.querySelectorAll('a[onclick*="logout-form"]').forEach(function(link) {
                var onclickValue = link.getAttribute('onclick') || '';
                var formIdMatch = onclickValue.match(/getElementById\('([^']+)'\)/);
                var formId = formIdMatch ? formIdMatch[1] : 'logout-form';
                var logoutForm = document.getElementById(formId);

                if (logoutForm && logoutForm.action) {
                    link.setAttribute('href', logoutForm.action);
                }
            });
        }

        function maskNikValue(value) {
            var originalValue = (value || '').toString().trim();
            var digits = originalValue.replace(/\D/g, '');

            if (digits.length < 8) {
                return originalValue;
            }

            var maskedDigits = digits.slice(0, 4) + '*'.repeat(Math.max(digits.length - 8, 4)) + digits.slice(-4);

            if (/^\d+$/.test(originalValue)) {
                return maskedDigits;
            }

            return originalValue.replace(digits, maskedDigits);
        }

        function sanitizeDateValue(value) {
            var trimmedValue = (value || '').toString().trim();

            if (!trimmedValue) {
                return trimmedValue;
            }

            if (/0000/.test(trimmedValue) || /-0001/.test(trimmedValue) || /^30-11--0001$/.test(trimmedValue) || /^30\/11\/0000$/.test(trimmedValue)) {
                return '-';
            }

            return trimmedValue;
        }

        function fixTableDataPrivacyAndDates() {
            document.querySelectorAll('table').forEach(function(table) {
                var headerCells = Array.from(table.querySelectorAll('thead th'));

                if (!headerCells.length) {
                    return;
                }

                var nikColumnIndexes = headerCells
                    .map(function(cell, index) {
                        var headerText = cell.textContent.replace(/\s+/g, ' ').trim().toUpperCase();
                        return /(^|\s)NIK(\s|$)|NO\.?\s*KTP/.test(headerText) ? index : -1;
                    })
                    .filter(function(index) {
                        return index >= 0;
                    });

                table.querySelectorAll('tbody tr').forEach(function(row) {
                    var cells = row.querySelectorAll('td');

                    nikColumnIndexes.forEach(function(index) {
                        if (!cells[index]) {
                            return;
                        }

                        var currentValue = cells[index].textContent.trim();
                        var maskedValue = maskNikValue(currentValue);

                        if (currentValue && currentValue !== maskedValue) {
                            cells[index].textContent = maskedValue;
                        }
                    });

                    Array.from(cells).forEach(function(cell) {
                        var currentValue = cell.textContent.trim();
                        var sanitizedValue = sanitizeDateValue(currentValue);

                        if (currentValue && currentValue !== sanitizedValue) {
                            cell.textContent = sanitizedValue;
                        }
                    });
                });
            });
        }

        function applySharedUiFixes() {
            normalizeSidebarBrandLinks();
            normalizeLogoutLinks();
            fixTableDataPrivacyAndDates();
        }

        document.addEventListener('DOMContentLoaded', applySharedUiFixes);
        window.addEventListener('load', applySharedUiFixes);

        if (window.jQuery) {
            window.jQuery(document).on('draw.dt', applySharedUiFixes);
        }
    })();
</script>
<?php /**PATH /Users/ajspryn/Project/fos/resources/views/layouts/vuexy/footer-scripts.blade.php ENDPATH**/ ?>