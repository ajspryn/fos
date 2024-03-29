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
        <div class="content-wrapper container-xxl p-0">
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
                <!-- SKPD Table -->
                <div class="card">
                    <h4 class="card-header">SKPD<span class="rotate"><i data-feather="chevron-down" class="font-large-1"
                                onclick="toggleSkpd()"></i></span>
                    </h4>
                    <section id="basic-datatable">
                        <div class="row" id="divSkpdTable">
                            <div class="col-12">
                                <div class="card">
                                    <table class="datatables-basic table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">Tanggal Pengajuan</th>
                                                <th style="text-align: center">NIK</th>
                                                <th style="text-align: center">Nama Nasabah</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($proposalskpds as $proposalskpd)
                                                @php
                                                    $proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
                                                        ->where('id', $proposalskpd->skpd_pembiayaan_id)
                                                        ->get()
                                                        ->first();
                                                @endphp

                                                <tr>

                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">
                                                        {{ date('d F Y', strtotime($proposal_skpd->tanggal_pengajuan)) }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_skpd->nasabah->no_ktp }}</td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_skpd->nasabah->nama_nasabah }}</td>
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
                    </section>
                </div>
                <!--/ SKPD Table -->

                <!-- Pasar Table -->
                <div class="card">
                    <h4 class="card-header">Pasar<span class="rotate"><i data-feather="chevron-down" class="font-large-1"
                                onclick="togglePasar()"></i></span>
                    </h4>
                    <section id="basic-datatable">
                        <div class="row" id="divPasarTable">
                            <div class="col-12">
                                <div class="card">
                                    <table class="datatables-basic table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">Tanggal Pengajuan</th>
                                                <th style="text-align: center">NIK</th>
                                                <th style="text-align: center">Nama Nasabah</th>
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

                                                <tr>

                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">
                                                        {{ date('d F Y', strtotime($proposal_pasar->tgl_pembiayaan)) }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_pasar->nasabahh->no_ktp }}</td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_pasar->nasabahh->nama_nasabah }}</td>
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
                    </section>
                </div>
                <!--/ Pasar Table -->

                <!--/ UMKM Table -->
                <div class="card">
                    <h4 class="card-header">UMKM<span class="rotate"><i data-feather="chevron-down" class="font-large-1"
                                onclick="toggleUmkm()"></i></span>
                    </h4>
                    <section id="basic-datatable">
                        <div class="row" id="divUmkmTable">
                            <div class="col-12">
                                <div class="card">
                                    <table class="datatables-basic table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">Tanggal Pengajuan</th>
                                                <th style="text-align: center">NIK</th>
                                                <th style="text-align: center">Nama Nasabah</th>
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
                                                <tr>
                                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                                    <td style="text-align: center">
                                                        {{ date('d F Y', strtotime($proposal_umkm->tgl_pembiayaan)) }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_umkm->nasabahh->no_ktp }}</td>
                                                    <td style="text-align: center">
                                                        {{ $proposal_umkm->nasabahh->nama_nasabah }}</td>
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
                    </section>
                </div>
                <!--/ UMKM Table -->

                <!--/ PPR Table -->
                <div class="card">
                    <h4 class="card-header">PPR<span class="rotate"><i data-feather="chevron-down" class="font-large-1"
                                onclick="togglePpr()"></i></span>
                    </h4>
                    <section id="basic-datatable">
                        <div class="row" id="divPprTable">
                            <div class="col-12">
                                <div class="card">
                                    <table class="datatables-basic table">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">Tanggal Pengajuan</th>
                                                <th style="text-align: center">NIK</th>
                                                <th style="text-align: center">Nama Nasabah</th>
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
                                                    <td style="text-align: center">
                                                        {{-- <button class="btn btn-outline-info round" type="button"
                                                        data-bs-toggle="modal"data-bs-target="#modalAkadPpr">Detail</button> --}}
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
                                            {{-- <table>
                                            <tbody>
                                                <tr>
                                                    <td class="pe-1">&emsp;&nbsp;&nbsp;Nama Nasabah</td>
                                                    <td>:
                                                        {{ $proposal_ppr->pemohon->form_pribadi_pemohon_nama_lengkap }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">&emsp;&nbsp;&nbsp;Jenis Nasabah</td>
                                                    <td>:
                                                        {{ $proposal_ppr->jenis_nasabah }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">&emsp;&nbsp;&nbsp;Tanggal Pengajuan</td>
                                                    <td>:
                                                        {{ date_format($proposal_ppr->created_at, 'd-m-Y') }}
                                                    </td>
                                                </tr>
                                        </table> --}}
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
