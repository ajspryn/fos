@extends('UltraMikro::layouts.main')

@section('content')
    <style>
        /* Validate style for Select2 class */
        .was-validated select.select2:invalid+.select2 .select2-selection {
            border-color: #dc3545 !important;
        }

        .was-validated select.select2:valid+.select2 .select2-selection {
            border-color: #28a745 !important;
        }

        #ifIdebPasangan {
            height: 40px;
            transition: all 0.5s;
        }

        #ifIdebPasangan.hide {
            height: 0;
            opacity: 0;
            overflow: hidden;
        }

        /* Style Modal Loading */
        .modal-loading {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-loading-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 10px;
            border: 1px solid #888;
            width: 15%;
            position: relative;
        }

        /* Spinner Loading */
        .spinner-loading {
            border: 0.3rem solid #f3f3f3;
            border-top: 0.3rem solid #bd120d;
            border-radius: 50%;
            width: 1.5rem;
            height: 1.5rem;
            animation: spin 1s linear infinite;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <!-- BEGIN: Content-->
    <div id="modalLoading" class="modal-loading">
        <div class="modal-loading-content">
            <div class="spinner-loading" style="margin-left:-12px;"></div>
            <center>
                <p>Sedang diproses, harap tunggu...</p>
                <br />
                <br />
            </center>
        </div>
    </div>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Form Proposal</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/ultra_mikro">Ultra Mikro</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/ultra_mikro/proposal">Proposal</a>
                                    </li>
                                    <li class="breadcrumb-item active">Lengkapi Proposal
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body" style="margin-top:-75px;">
                <!-- Form Pengajuan -->
                <section class="modern-horizontal-wizard">
                    <div class="bs-stepper wizard-modern modern-wizard-example">
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#form" role="tab" id="account-details-modern-trigger">
                                <button type="button" class="step-trigger">

                                </button>
                            </div>

                        </div>
                        <div class="bs-stepper-content">
                            @if ($pembiayaan->jenis_pby_ultra_mikro == 'Restruct')
                                @include('UltraMikro::proposal.lihat-restruct')
                            @else
                                @include('UltraMikro::proposal.lihat-baru')
                            @endif

                            <!-- Modal Lampiran -->

                            <!-- Foto KTP -->
                            <div class="modal fade" id="modalFotoKtp" tabindex="-1" aria-labelledby="addNewCardTitle"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header bg-transparent">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-sm-5 mx-50 pb-5">
                                            <h4 class="text-center mb-1" style="margin-top:-40px;">
                                                <strong>Foto KTP</strong>
                                            </h4>
                                            <iframe src="{{ asset('storage/' . $fotoKtp->foto) }}" class="d-block w-100"
                                                height="600"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Foto KTP  -->

                            <!-- Foto Kartu Keluarga -->
                            <div class="modal fade" id="modalFotoKartuKeluarga" tabindex="-1"
                                aria-labelledby="addNewCardTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header bg-transparent">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-sm-5 mx-50 pb-5">
                                            <h4 class="text-center mb-1" style="margin-top:-40px;">
                                                <strong>Foto Kartu Keluarga</strong>
                                            </h4>
                                            <iframe src="{{ asset('storage/' . $fotoKartuKeluarga->foto) }}"
                                                class="d-block w-100" height="600"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Foto Kartu Keluarga  -->

                            {{-- <!-- Foto NPWP -->
                            <div class="modal fade" id="modalFotoNpwp" tabindex="-1" aria-labelledby="addNewCardTitle"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header bg-transparent">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-sm-5 mx-50 pb-5">
                                            <h4 class="text-center mb-1" style="margin-top:-40px;">
                                                <strong>Foto NPWP</strong>
                                            </h4>
                                            <iframe src="{{ asset('storage/' . $fotoNpwp->foto) }}" class="d-block w-100"
                                                height="600"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Foto NPWP  --> --}}

                            @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                                <!-- Foto KTP Pasangan -->
                                <div class="modal fade" id="modalFotoKtpPasangan" tabindex="-1"
                                    aria-labelledby="addNewCardTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header bg-transparent">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                                <h4 class="text-center mb-1" style="margin-top:-40px;">
                                                    <strong>Foto KTP Pasangan</strong>
                                                </h4>
                                                <iframe src="{{ asset('storage/' . $fotoKtpPasangan->foto) }}"
                                                    class="d-block w-100" height="600"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Foto KTP Pasangan  -->
                            @endif

                            @if ($pembiayaan->nasabah->status_pernikahan != 'Belum Menikah')
                                <!-- Foto Akta Status Pernikahan/Perceraian -->
                                <div class="modal fade" id="fotoAktaStatusPernikahan" tabindex="-1"
                                    aria-labelledby="addNewCardTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header bg-transparent">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                                <h4 class="text-center mb-1" style="margin-top:-40px;">
                                                    <strong>Foto Akta Status Pernikahan/Perceraian</strong>
                                                </h4>
                                                <iframe src="{{ asset('storage/' . $fotoStatusPernikahan->foto) }}"
                                                    class="d-block w-100" height="600"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Foto Akta Status Pernikahan/Perceraian  -->
                            @endif

                            <!-- Foto Rumah -->
                            <div class="modal fade" id="modalFotoRumah" tabindex="-1" aria-labelledby="addNewCardTitle"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header bg-transparent">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-sm-5 mx-50 pb-5">
                                            <h4 class="text-center mb-1" style="margin-top:-40px;">
                                                <strong>Foto Rumah</strong>
                                            </h4>
                                            <iframe src="{{ asset('storage/' . $fotoRumah->foto) }}" class="d-block w-100"
                                                height="600"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Foto Rumah  -->

                            <!-- Foto Pekerjaan -->
                            <div class="modal fade" id="modalFotoPekerjaan" tabindex="-1"
                                aria-labelledby="addNewCardTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header bg-transparent">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-sm-5 mx-50 pb-5">
                                            <h4 class="text-center mb-1" style="margin-top:-40px;">
                                                <strong>Foto Pekerjaan/Usaha</strong>
                                            </h4>
                                            <iframe src="{{ asset('storage/' . $fotoPekerjaan->foto) }}"
                                                class="d-block w-100" height="600"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ Foto Pekerjaan  -->



                            <!-- /Modal Lampiran -->
                        </div>
                    </div>
                </section>
                <!-- /Form Pengajuan -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        //Form Validation (Bootstrap)
        var bootstrapForm = $('.needs-validation');

        const modalLoading = document.getElementById('modalLoading'); //Modal Loading
        Array.prototype.filter.call(bootstrapForm, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    form.classList.add('invalid');
                    // form.bootstrapValidator('defaultSubmit');

                } else {
                    form.classList.add('was-validated');
                    modalLoading.style.display = 'block'; //Show modal ketika proses submit
                    form.bootstrapValidator('defaultSubmit');

                }
                form.classList.add('was-validated');
                event.preventDefault();
            });
        });

        //Hide modal setelah loading selesai
        window.addEventListener('load', () => {
            modalLoading.style.display = 'none';
        })



        // function changeStatusPernikahan() {
        //     var status = document.getElementById("statusPernikahan");
        //     if (status.value == 1) { //Belum Menikah
        //         document.getElementById("fotoPasanganPemohon").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoPasanganPemohon").removeAttribute("disabled"),
        //             document.getElementById("kategoriPasanganPemohon").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoAktaNikahCerai").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoAktaNikahCerai").removeAttribute("disabled"),
        //             document.getElementById("kategoriAktaNikahCerai").setAttribute("disabled", "disabled");
        //     } else if (status.value == 2) { //Sudah Menikah
        //         document.getElementById("fotoPasanganPemohon").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoPasanganPemohon").removeAttribute("disabled"),
        //             document.getElementById("kategoriPasanganPemohon").removeAttribute("disabled"),
        //             document.getElementById("fotoAktaNikahCerai").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoAktaNikahCerai").removeAttribute("disabled"),
        //             document.getElementById("kategoriAktaNikahCerai").removeAttribute("disabled");
        //     } else { //Cerai
        //         document.getElementById("fotoPasanganPemohon").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoPasanganPemohon").removeAttribute("disabled"),
        //             document.getElementById("kategoriPasanganPemohon").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoAktaNikahCerai").setAttribute("disabled", "disabled"),
        //             document.getElementById("fotoAktaNikahCerai").removeAttribute("disabled"),
        //             document.getElementById("kategoriAktaNikahCerai").removeAttribute("disabled");
        //     }
        // }
    </script>
@endsection
