@extends('layouts.front.main')

@section('content')
    <div class="front-page-wrapper">
        <section class="section-py front-hero">
            <div class="container">
                <div class="row align-items-center gy-4">
                    <div class="col-lg-6">
                        <span class="badge bg-label-primary mb-3">BPRS BTB</span>
                        <h2 class="fw-bold mb-2">Berkah, Tumbuh, dan Berkelanjutan</h2>
                        <p class="text-muted mb-4">Pilih jenis pembiayaan yang sesuai kebutuhan Anda dan mulai pengajuan secara online.</p>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="/login" class="btn btn-primary">Masuk</a>
                            <a href="#produk" class="btn btn-outline-primary">Lihat Produk</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('foto2.png') }}"
                            alt="Berkah, Tumbuh dan Berkelanjutan" class="front-hero-image" loading="eager">
                    </div>
                </div>
            </div>
        </section>

        <section id="produk" class="section-py bg-body-tertiary">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
                    <div>
                        <h4 class="mb-1">Pilih Produk Pembiayaan</h4>
                        <small class="text-muted">Klik produk untuk memulai pengajuan</small>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-3 col-sm-6">
                        <div class="card h-100 product-card">
                            <a href="/form/skpd" class="text-decoration-none">
                                <div class="card-body text-center">
                                    <img src="{{ asset('Bogor.png') }}" class="front-product-image" loading="lazy" decoding="async" alt="Pembiayaan SKPD" />
                                    <h5 class="mt-2">Pembiayaan PNS</h5>
                                    <p class="text-muted mb-2">PNS Kabupaten Bogor</p>
                                    <span class="btn btn-outline-primary btn-sm">Mulai</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="card h-100 product-card">
                            <a href="/form/p3k" class="text-decoration-none">
                                <div class="card-body text-center">
                                    <img src="{{ asset('Bogor.png') }}" class="front-product-image" loading="lazy" decoding="async" alt="Pembiayaan P3K" />
                                    <h5 class="mt-2">Pembiayaan PPPK</h5>
                                    <p class="text-muted mb-2">PPPK Kabupaten Bogor</p>
                                    <span class="btn btn-outline-primary btn-sm">Mulai</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="card h-100 product-card">
                            <a data-bs-toggle="modal" data-bs-target="#pilihPasarUmkm" role="button" class="text-decoration-none">
                                <div class="card-body text-center">
                                    <img src="{{ asset('pasar.png') }}" class="front-product-image" loading="lazy" decoding="async" alt="Pembiayaan Pasar & UMKM" />
                                    <h5 class="mt-2">Pembiayaan Pasar & UMKM</h5>
                                    <p class="text-muted mb-2">Kios atau Modal Kerja</p>
                                    <span class="btn btn-outline-primary btn-sm">Pilih</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="card h-100 product-card">
                            <a data-bs-toggle="modal" data-bs-target="#pilihPendapatan" role="button" class="text-decoration-none">
                                <div class="card-body text-center">
                                    <img src="{{ asset('ppr.png') }}" class="front-product-image" loading="lazy" decoding="async" alt="PPR - Pembiayaan Pemilikan Rumah" />
                                    <h5 class="mt-2">PPR</h5>
                                    <p class="text-muted mb-2">Pembiayaan Pemilikan Rumah</p>
                                    <span class="btn btn-outline-primary btn-sm">Pilih</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="card h-100 product-card">
                            <a data-bs-toggle="modal" data-bs-target="#modalUltraMikro" role="button" class="text-decoration-none">
                                <div class="card-body text-center">
                                    <img src="{{ asset('um.png') }}" class="front-product-image" loading="lazy" decoding="async" alt="Pembiayaan Ultra Mikro" />
                                    <h5 class="mt-2">Pembiayaan Ultra Mikro</h5>
                                    <p class="text-muted mb-2">Baru atau Restruct</p>
                                    <span class="btn btn-outline-primary btn-sm">Pilih</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal PPR -->
        <div class="modal fade" id="pilihPendapatan" tabindex="-1"
            aria-labelledby="pilihPendapatanTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pilihPendapatanTitle">
                            Silakan Pilih Jenis Pendapatan
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <form action="/form/ppr">
                                    <input type="hidden" name="jenis_nasabah" value="Fixed Income" />
                                    <button type="submit" class="btn btn-primary w-100">Fixed Income</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form action="/form/ppr">
                                    <input type="hidden" name="jenis_nasabah" value="Non Fixed Income" />
                                    <button type="submit" class="btn btn-primary w-100">Non Fixed Income</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal UMKM -->
        <div class="modal fade" id="pilihPasarUmkm" tabindex="-1" aria-labelledby="pilihPasarUmkmTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pilihPasarUmkmTitle">
                            Silakan Pilih Pembiayaan
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <a href="/form/pasar" class="btn btn-primary w-100">Kios</a>
                            </div>
                            <div class="col-md-6">
                                <a href="/form/umkm" class="btn btn-primary w-100">Modal Kerja</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal UltraMikro -->
        <div class="modal fade" id="modalUltraMikro" tabindex="-1"
            aria-labelledby="modalUltraMikroTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalUltraMikroTitle">
                            Silakan Pilih Pembiayaan
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <form action="/form/ultra_mikro">
                                    <input type="hidden" name="jenis_pby_ultra_mikro" value="Baru" />
                                    <button type="submit" class="btn btn-primary w-100">Baru</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form action="/form/ultra_mikro">
                                    <input type="hidden" name="jenis_pby_ultra_mikro" value="Restruct" />
                                    <button type="submit" class="btn btn-primary w-100">Restruct</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
