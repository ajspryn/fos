
<div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2023<a
                    class="ms-25" href="#" target="_blank">BPRS BTB</a><span
                    class="d-none d-sm-inline-block">, All rights Reserved</span></span><span
                class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    @include('layouts.vuexy.footer-scripts')
    {{--
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" defer></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    {{-- <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jszip.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}" defer></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/vendors/js/forms/cleave/cleave.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') }}" defer></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/js/core/app.min.js') }}" defer></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/forms/form-wizard.min.js') }}" defer></script>
    {{-- <script src="{{ asset('app-assets/js/scripts/pages/dashboard-ecommerce.min.js') }}"></script> --}}
    <script src="{{ asset('app-assets/js/scripts/forms/pickers/form-pickers.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/js/scripts/tables/table-datatables-basic.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-repeater.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-input-mask.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-wizard.min.js') }}" defer></script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-invoice.min.js') }}" defer></script>
    @stack('page-js')
    <!-- END: Page JS-->

    <script defer>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    --}}
    </body>
    <!-- END: Body-->

    </html>
