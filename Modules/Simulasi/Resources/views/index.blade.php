@extends('layouts.front.main')

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
                            <h2 class="content-header-title float-start mb-0">Simulasi Pembiayaan</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Simulasi</a>
                                    </li>
                                    <li class="breadcrumb-item active">Form Simulasi
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Input Mask start -->
                <section id="input-mask-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Input Mask</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2">
                                            <label class="form-label" for="plafond">Plafond</label>
                                            <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                                id="plafond" onkeyup="simulasi(this.value);" />
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2">
                                            <label class="form-label" for="margin">Margin/Tahun</label>
                                            <select class="form-select" id="margin" onclick="simulasi(this.value);">
                                                <option value="1.25">1.25%</option>
                                                <option value="1.50">1.50%</option>
                                                <option value="1.75">1.75%</option>
                                                <option value="2.00">2.00%</option>
                                                <option value="2.25">2.25%</option>
                                                <option value="2.50">2.50%</option>
                                                <option value="2.75">2.75%</option>
                                                <option value="3.00">3.00%</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 mb-2">
                                            <label class="form-label" for="tenor">Tenor Dalam Bulan</label>
                                            <input type="text" class="form-control" placeholder="Tenor Dalam Bulan"
                                                id="tenor" onkeyup="simulasi(this.value);" />
                                            <input type="hidden" class="form-control" placeholder="Tenor Dalam Bulan"
                                                id="angsuran" />
                                            <input type="hidden" class="form-control" placeholder="Tenor Dalam Bulan"
                                                id="angsuranDummy" />
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-12 col-sm-12 mb-2">
                                        <!-- Congratulations Card -->
                                        <div class="card card-congratulations">
                                            <div class="card-body text-center">
                                                {{-- <img src="../../../app-assets/images/elements/decore-left.png"
                                                    class="congratulations-img-left" alt="card-img-left" />
                                                <img src="../../../app-assets/images/elements/decore-right.png"
                                                    class="congratulations-img-right" alt="card-img-right" /> --}}
                                            <div class="avatar avatar-xl bg-primary shadow">
                                                {{-- <div class="avatar-content">
                                                        <i data-feather="dolar" class="font-large-1"></i>
                                                    </div> --}}
                                            </div>
                                            <div class="text-center">
                                                <h3 class="mb-2 text-white" >Hasil Perhitungan Simulasi</h3>
                                                <div class="row">
                                                    <div class="col-xl-6 mb-1 text-white">
                                                        <h5 class="mb-1 text-white">Angsuran</h5>
                                                        {{-- <h1><span id="angsuranDummyfix"></span></h1> --}}
                                                        <input type="text" class="form-control" id="angsuranDummyfix" />
                                                    </div>
                                                    <div class="col-xl-6 mb-1 text-white">
                                                        <h5 class="mb-1 text-white">Harga Jual</h5>

                                                        {{-- <h1><span id="angsuranDummyfix"></span></h1> --}}
                                                        {{-- <input type="text" class="form-control" id="harga_jualDummy" /> --}}
                                                        <input type="text" class="form-control" id="harga_jual" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ Congratulations Card -->
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
            <!-- Input Mask End -->

        </div>
    </div>
    </div>
    <!-- END: Content-->

    <script>
        function simulasi(value) {
            var plafond, margin, tenor, hitung_harga, harga_jual, hasil, angsuran, angsuranDummy, angsuranDummyfix, rate, harga_jualDummy, harga_jualDummyfix ;
            plafond = document.getElementById("plafond").value.replace(/,/g, "");
            margin = document.getElementById("margin").value;
            tenor = document.getElementById("tenor").value.replace(/,/g, "");

            rate = margin / 100;
            hitung_harga = plafond * rate * tenor;
            harga_jual = +hitung_harga + +plafond;
            angsuran = harga_jual / tenor;

            document.getElementById("harga_jual").value = "Rp."+" "+harga_jual.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("angsuran").value = "Rp."+" "+angsuran.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            // harga_jualDummy = harga_jual.toFixed(2);
            // document.getElementById("harga_jualDummy").value = harga_jualDummy.toFixed(2);
            // harga_jualDummyfix = document.getElementById("harga_jualDummy").value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            // document.getElementById("harga_jualDummyfix").value = "Rp."+" "+harga_jualDummyfix.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            angsuranDummy = angsuran;
            document.getElementById("angsuranDummy").value = angsuranDummy.toFixed(2);
            angsuranDummyfix = document.getElementById("angsuranDummy").value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById("angsuranDummyfix").value = "Rp."+" "+angsuranDummyfix;


        }
    </script>
@endsection
