@extends('layouts.front.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">
                <!-- Knowledge base Jumbotron -->
                <section id="knowledge-base-search">
                    <div class="row">
                        <div class="col-12">
                            <div class="card knowledge-base-bg text-center"
                                style="background-image: url('../../../app-assets/images/banner/banner.png')">
                                <div class="card-body">
                                    <h2>Berkah, Tumbuh dan Berkelanjutan</h2>
                                    <p class="card-text mb-2">
                                        <span>Silahkan Pilih Jenis Pembiayaan Anda</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Knowledge base Jumbotron -->

                <!-- Knowledge base -->
                <section id="knowledge-base-content">
                    <div class="row kb-search-content-info center-layout match-height">

                        <!-- sales card -->
                        <div class="col-md-3 col-sm-6 col-12 kb-search-content">
                            <div class="card">
                                <a href="/form/skpd">
                                    <img src="../../../Bogor.png"
                                        style="width: 77%; display: block; margin: 0 auto; padding-bottom: 15px"
                                        class="card-img-top" alt="pasar-image" />

                                    <div class="card-body text-center">
                                        <h4>Pembiayaan SKPD</h4>
                                        <p class="text-body mt-1 mb-0">
                                            PNS Kabupaten Bogor.
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Pasar dan UMKM -->
                        <div class="col-md-3 col-sm-6 col-12 kb-search-content">
                            <div class="card">
                                <a href="form/pasar">

                                    <img src="../../../Pasar_Tohaga.jpeg"
                                        style="width: 77%; display: block; margin: 0 auto; padding-bottom: 15px"
                                        class="card-img-top" alt="pasar-image" />

                                    <div class="card-body text-center">
                                        <h4>Pembiayaan Pasar (Kios)</h4>
                                        <p class="text-body mt-1 mb-0">

                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Pasar dan UMKM -->
                        <div class="col-md-3 col-sm-6 col-12 kb-search-content">
                            <div class="card">
                                <a href="form/umkm">

                                    <img src="../../../Pasar_Tohaga.jpeg"
                                        style="width: 77%; display: block; margin: 0 auto; padding-bottom: 15px"
                                        class="card-img-top" alt="pasar-image" />

                                    <div class="card-body text-center">
                                        <h4>Pembiayaan Modal Kerja</h4>
                                    </div>
                                </a>
                            </div>
                        </div>

                        {{-- <!-- Developer -->
                        <div class="col-md-3 col-sm-6 col-12 kb-search-content">
                            <div class="card">
                                <a href="form/pasar">
                                    <img src="../../../app-assets/images/illustration/api.svg" class="card-img-top"
                                        alt="knowledge-base-image" />
                                    <div class="card-body text-center">
                                        <h4>Pembiayaan Developer</h4>
                                        <p class="text-body mt-1 mb-0">every hero and coward, every creator and destroyer of
                                            civilization.</p>
                                    </div>
                                </a>
                            </div>
                        </div> --}}

                        <!-- Pembiayaan PPR -->
                        <div class="col-md-3 col-sm-6 col-12 kb-search-content">
                            <div class="card">
                                <a data-bs-toggle="modal" data-bs-target="#pilihPendapatan">
                                    <img src="../../../PPR.jpeg"
                                        style="width: 60%; display: block; margin: 0 auto; padding-top: 30px"
                                        class="card-img-top" alt="knowledge-base-image" />

                                    <div class="card-body text-center">
                                        <h4>PPR</h4>
                                        <p class="text-body mt-1 mb-0">
                                            Pembiayaan Pemilikan Rumah
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Vertical modal -->
                        <div class="vertical-modal-ex">
                            <!-- Modal -->
                            <div class="modal fade" id="pilihPendapatan" tabindex="-1"
                                aria-labelledby="pilihPendapatanTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="pilihPendapatanTitle">
                                                Silakan Pilih Jenis Pendapatan
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="/form/ppr">
                                                        <input type="hidden" name="jenis_nasabah" value="Fixed Income" />
                                                        <button type="submit"
                                                            class="btn btn-primary btn-block form-control">Fixed
                                                            Income
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-md-6">
                                                    <form action="/form/ppr">
                                                        <input type="hidden" name="jenis_nasabah"
                                                            value="Non Fixed Income" />
                                                        <button type="submit"
                                                            class="btn btn-primary btn-block form-control">Non Fixed
                                                            Income
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Vertical modal end-->


                        </div>

                    </div>
                </section>
                <!-- Knowledge base ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
