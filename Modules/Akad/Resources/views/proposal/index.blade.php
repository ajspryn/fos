@extends('akad::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <style>
        .rotate {
            -moz-transition: all 0.4s;
            -webkit-transition: all 0.4s;
            transition: all 0.4s;
        }

        .rotate.down {
            -moz-transform: rotate(-180deg);
            -webkit-transform: rotate(-180deg);
            transform: rotate(-180deg);
        }
    </style>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Data Proposal Akad</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/staff">Staff</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Proposal</a>
                                    </li>
                                    <li class="breadcrumb-item active">Proposal Akad
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- P3K Table -->
                <div class="card">
                    <h4 class="card-header">P3K<span class="rotate"><i data-feather="chevron-down" class="font-large-1"
                                onclick="toggleP3k()"></i></span>
                    </h4>
                    <section>
                        <div class="row" id="divP3kTable">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">Tanggal Pengajuan</th>
                                                <th style="text-align: center">NIK</th>
                                                <th style="text-align: center">Nama Nasabah</th>
                                                <th style="text-align: center">Segmen</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proposalP3ks as $proposalP3k)
                                                @php
                                                    $proposal_p3k = Modules\P3k\Entities\P3kPembiayaan::select()
                                                        ->where('id', $proposalP3k->p3k_pembiayaan_id)
                                                        ->get()
                                                        ->first();
                                                @endphp

                                                @if (!$proposal_p3k)
                                                    @continue
                                                @endif

                                                <tr>

                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">
                                                        {{ strftime('%d %B %Y', strtotime($proposal_p3k->tanggal_pengajuan)) }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_p3k->nasabah->no_ktp }}</td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_p3k->nasabah->nama_nasabah }}</td>
                                                    <td style="text-align: center">PPPK</td>
                                                    <td style="text-align: center">
                                                        <a href="/staff/proposal/p3k/{{ $proposal_p3k->id }}"
                                                            class="btn btn-outline-info round">Detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!--/ P3K Table -->

                <!-- SKPD Table -->
                <div class="card">
                    <h4 class="card-header">SKPD<span class="rotate"><i data-feather="chevron-down" class="font-large-1"
                                onclick="toggleSkpd()"></i></span>
                    </h4>
                    <section>
                        <div class="row" id="divSkpdTable">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">Tanggal Pengajuan</th>
                                                <th style="text-align: center">NIK</th>
                                                <th style="text-align: center">Nama Nasabah</th>
                                                <th style="text-align: center">Segmen</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proposalskpds as $proposalP3k)
                                                @php
                                                    $proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
                                                        ->where('id', $proposalP3k->skpd_pembiayaan_id)
                                                        ->get()
                                                        ->first();
                                                @endphp

                                                @if (!$proposal_skpd)
                                                    @continue
                                                @endif

                                                <tr>

                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">
                                                        {{ strftime('%d %B %Y', strtotime($proposal_skpd->tanggal_pengajuan)) }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_skpd->nasabah->no_ktp }}</td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_skpd->nasabah->nama_nasabah }}</td>
                                                    <td style="text-align: center">SKPD</td>
                                                    <td style="text-align: center">
                                                        <a href="/staff/proposal/skpd/{{ $proposal_skpd->id }}"
                                                            class="btn btn-outline-info round">Detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!--/ SKPD Table -->

                <!-- Pasar Table -->
                <div class="card">
                    <h4 class="card-header">Pasar<span class="rotate"><i data-feather="chevron-down" class="font-large-1"
                                onclick="togglePasar()"></i></span>
                    </h4>
                    <section>
                        <div class="row" id="divPasarTable">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">Tanggal Pengajuan</th>
                                                <th style="text-align: center">NIK</th>
                                                <th style="text-align: center">Nama Nasabah</th>
                                                <th style="text-align: center">Segmen</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proposalpasars as $proposalpasar)
                                                @php
                                                    $proposal_pasar = Modules\Pasar\Entities\PasarPembiayaan::select()
                                                        ->where('id', $proposalpasar->pasar_pembiayaan_id)
                                                        ->get()
                                                        ->first();
                                                @endphp

                                                @if (!$proposal_pasar)
                                                    @continue
                                                @endif

                                                <tr>

                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">
                                                        {{ strftime('%d %B %Y', strtotime($proposal_pasar->tgl_pembiayaan)) }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_pasar->nasabahh->no_ktp }}</td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_pasar->nasabahh->nama_nasabah }}</td>
                                                    <td style="text-align: center">PASAR</td>
                                                    <td style="text-align: center">
                                                        <a href="/staff/proposal/pasar/{{ $proposal_pasar->id }}"
                                                            class="btn btn-outline-info round">Detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!--/ Pasar Table -->

                <!--/ UMKM Table -->
                <div class="card">
                    <h4 class="card-header">UMKM<span class="rotate"><i data-feather="chevron-down" class="font-large-1"
                                onclick="toggleUmkm()"></i></span>
                    </h4>
                    <section>
                        <div class="row" id="divUmkmTable">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">Tanggal Pengajuan</th>
                                                <th style="text-align: center">NIK</th>
                                                <th style="text-align: center">Nama Nasabah</th>
                                                <th style="text-align: center">Segmen</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proposalumkms as $proposalumkm)
                                                @php
                                                    $proposal_umkm = Modules\Umkm\Entities\UmkmPembiayaan::select()
                                                        ->where('id', $proposalumkm->umkm_pembiayaan_id)
                                                        ->get()
                                                        ->first();
                                                @endphp

                                                @if (!$proposal_umkm)
                                                    @continue
                                                @endif

                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">
                                                        {{ strftime('%d %B %Y', strtotime($proposal_umkm->tgl_pembiayaan)) }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_umkm->nasabahh->no_ktp }}</td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_umkm->nasabahh->nama_nasabah }}</td>
                                                    <td style="text-align: center">UMKM</td>
                                                    <td style="text-align: center">
                                                        <a href="/staff/proposal/umkm/{{ $proposal_umkm->id }}"
                                                            class="btn btn-outline-info round">Detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!--/ UMKM Table -->

                <!--/ PPR Table -->
                <div class="card">
                    <h4 class="card-header">PPR<span class="rotate"><i data-feather="chevron-down" class="font-large-1"
                                onclick="togglePpr()"></i></span>
                    </h4>
                    <section>
                        <div class="row" id="divPprTable">
                            <div class="col-12">
                                <div class="card">
                                    <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">Tanggal Pengajuan</th>
                                                <th style="text-align: center">NIK</th>
                                                <th style="text-align: center">Nama Nasabah</th>
                                                <th style="text-align: center">Segmen</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proposalpprs as $proposalppr)
                                                @php
                                                    $proposal_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
                                                        ->where('id', $proposalppr->form_ppr_pembiayaan_id)
                                                        ->get()
                                                        ->first();
                                                @endphp

                                                @if (!$proposal_ppr)
                                                    @continue
                                                @endif

                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">
                                                        {{ date_format($proposal_ppr->created_at, 'd F Y') }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_ppr->pemohon->form_pribadi_pemohon_no_ktp }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_ppr->pemohon->form_pribadi_pemohon_nama_lengkap }}
                                                    </td>
                                                    <td style="text-align: center">PPR</td>
                                                    <td style="text-align: center">
                                                        <a href="/staff/proposal/ppr/{{ $proposal_ppr->id }}"
                                                            class="btn btn-outline-info round">Detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Modals -->
                        <div class="modal fade" id="modalAkadPpr" tabindex="-1" aria-labelledby="addNewCardTitle"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-transparent">
                                        <h5 class="modal-title" id="pilihPendapatanTitle">
                                            Title
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="">
                                                    <input type="hidden" name="" value="" />
                                                    <button type="submit"
                                                        class="btn btn-warning btn-block form-control">Cetak
                                                        Akad
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="">
                                                    <input type="hidden" name="" value="" />
                                                    <button type="submit"
                                                        class="btn btn-primary btn-block form-control">Akad
                                                        Batal
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                @csrf
                                                @foreach ($proposalpprs as $proposalppre)
                                                    @php
                                                        $proposal_ppra = Modules\Form\Entities\FormPprPembiayaan::select()
                                                            ->where('id', $proposalppre->form_ppr_pembiayaan_id)
                                                            ->get()
                                                            ->first();
                                                    @endphp

                                                    @if (!$proposal_ppra)
                                                        @continue
                                                    @endif

                                                    <input type="hidden" name="segmen" value="PPR" />
                                                    <input type="hidden" name="cif"
                                                        value="{{ $proposal_ppra->pemohon->id }}" />
                                                    <input type="hidden" name="kode_tabungan"
                                                        value="{{ $proposal_ppra->id }}" />
                                                    <input type="hidden" name="plafond"
                                                        value="{{ $proposal_ppra->form_permohonan_nilai_ppr_dimohon }}" />
                                                    <input type="hidden" name="harga_jual"
                                                        value="{{ $proposal_ppra->form_permohonan_harga_jual }}" />
                                                @endforeach
                                                <button type="submit"
                                                    class="btn btn-success btn-block form-control">Selesai
                                                    Akad
                                                </button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Modals -->

                    </section>
                </div>
                <!--/ PPR Table -->


            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function togglePpr() {
            var pprTable = document.getElementById("divPprTable");
            if (pprTable.style.display === "none") {
                pprTable.style.display = "block";
            } else {
                pprTable.style.display = "none";
            }
        }

        function toggleSkpd() {
            var skpdTable = document.getElementById("divSkpdTable");
            if (skpdTable.style.display === "none") {
                skpdTable.style.display = "block";
            } else {
                skpdTable.style.display = "none";
            }
        }

        function toggleP3k() {
            var p3kTable = document.getElementById("divP3kTable");
            if (p3kTable.style.display === "none") {
                p3kTable.style.display = "block";
            } else {
                p3kTable.style.display = "none";
            }
        }

        function togglePasar() {
            var pasarTable = document.getElementById("divPasarTable");
            if (pasarTable.style.display === "none") {
                pasarTable.style.display = "block";
            } else {
                pasarTable.style.display = "none";
            }
        }

        function toggleUmkm() {
            var umkmTable = document.getElementById("divUmkmTable");
            if (umkmTable.style.display === "none") {
                umkmTable.style.display = "block";
            } else {
                umkmTable.style.display = "none";
            }
        }

        $(".rotate").click(function() {
            $(this).toggleClass("down");
        })
    </script>
@endsection
