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
                                        <span>Silahkan Pilih Jenis Pinjaman Anda</span>
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
                                    <img src="https://pngimage.net/wp-content/uploads/2018/06/logo-kab-bogor-png.png"
                                        height="200" class="card-img-top" alt="knowledge-base-image" />

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
                                        <h4>Pembiayaan Pasar</h4>
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
                                        <h4>Pembiayaan Pasar</h4>
                                        <p class="text-body mt-1 mb-0">
                                            UMKM
                                        </p>
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

                        <!-- Pembiayaan KPR -->
                        <div class="col-md-3 col-sm-6 col-12 kb-search-content">
                            <div class="card">
                                <a href="/form/kpr">
                                    <img src="../../../KPR.jpeg"
                                        style="width: 60%; display: block; margin: 0 auto; padding-top: 30px"
                                        class="card-img-top" alt="knowledge-base-image" />

                                    <div class="card-body text-center">
                                        <h4>Pembiayaan PPR</h4>
                                        <p class="text-body mt-1 mb-0">
                                            Deskripsi.
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </section>
                <!-- Knowledge base ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
