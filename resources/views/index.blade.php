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
      <div class="card knowledge-base-bg text-center" style="background-image: url('../../../app-assets/images/banner/banner.png')">
        <div class="card-body">
          <h2>Maju Bersama BPRS BTB</h2>
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
  <div class="row kb-search-content-info match-height">
    <!-- sales card -->
    <div class="col-md-3 col-sm-6 col-12 kb-search-content">
      <div class="card">
        <a href="/form/skpd">
          <img src="https://pngimage.net/wp-content/uploads/2018/06/logo-kab-bogor-png.png" height="200" class="card-img-top" alt="knowledge-base-image"/>

          <div class="card-body text-center">
            <h4>Pembiayaan SKPD</h4>
            <p class="text-body mt-1 mb-0">
              Buat Kamu PNS Kabupaten Bogor.
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
