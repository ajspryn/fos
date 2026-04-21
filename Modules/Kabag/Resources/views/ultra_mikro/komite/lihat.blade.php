@extends('kabag::layouts.main')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="nav-filled">
                    <div class="row match-height">

                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Proposal Pengajuan Pembiayaan</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab-justified" data-bs-toggle="tab"
                                                href="#proposal" role="tab" aria-controls="home-just"
                                                aria-selected="true">Proposal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab-justified" data-bs-toggle="tab"
                                                href="#tab-lampiran-identitas" role="tab" aria-controls="profile-just"
                                                aria-selected="true">Lampiran Pribadi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="ideb-tab-justified" data-bs-toggle="tab"
                                                href="#ideb" role="tab" aria-controls="ideb"
                                                aria-selected="false">IDEB</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="timeline-tab-justified" data-bs-toggle="tab"
                                                href="#timeline" role="tab" aria-controls="timeline"
                                                aria-selected="false">Timeline</a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content mt-3">
                                        <div class="tab-pane active show" id="proposal" role="tabpanel"
                                            aria-labelledby="home-tab-justified">
                                            <!-- proposal -->
                                            <div class="col-xl-12 col-md-8 col-12">
                                                <div class="invoice-preview-card">

                                                    @include('UltraMikro::komite.summary-ultra-mikro')

                                                    <hr />
                                                    <!-- Tombol Aksi -->
                                                    <div class="card-body invoice-padding pt-0">
                                                        <div class="row invoice-spacing">
                                                            <div class="col-xl-3 p-0">
                                                            </div>
                                                            <div class="col-xl-5 p-0 mt-xl-0 mt-2">
                                                                    @if ($historyStatus && $historyStatus->status_id == 4 && $historyStatus->jabatan_id == 2)
                                                                    <div class="card-body">
                                                                        <button class="btn btn-success w-100"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#lanjut_komite">
                                                                            Setujui
                                                                        </button>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <button class="btn btn-danger w-100"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#tolak_komite">
                                                                            Tolak
                                                                        </button>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <button class="btn btn-warning w-100"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#edit_proposal">
                                                                            Rekomendasi Revisi
                                                                        </button>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/ Tombol Aksi -->

                                                    <!-- Modal Lanjut Komite  -->
                                                    <div class="modal fade" id="lanjut_komite" tabindex="-1"
                                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-transparent">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                    <h1 class="text-center mb-1" id="addNewCardTitle">
                                                                        Apakah Anda Yakin Untuk Menyetujui Proposal ?
                                                                    </h1>
                                                                    <p class="text-center"></p>

                                                                    <form id="addNewCardValidation"
                                                                        class="row gy-1 gx-2 mt-75" method="POST"
                                                                        action="/kabag/ultra_mikro/komite">
                                                                        @csrf

                                                                        <div class="col-md-12">
                                                                            <label class="form-label"
                                                                                for="catatan">Catatan</label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                        </div>
                                                                        <input type="hidden"
                                                                            name="ultra_mikro_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}">
                                                                        <input type="hidden" name="status_id" value=5>
                                                                        <input type="hidden" name="jabatan_id" value=2>
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ Auth::user()->id }}">

                                                                        <div class="col-12 text-center">
                                                                            <button type="submit"
                                                                                class="btn btn-primary me-1 mt-1">Submit</button>
                                                                            <button type="reset"
                                                                                class="btn btn-outline-secondary mt-1"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close">
                                                                                Cancel
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/ Modal Lanjut Komite  -->

                                                    <!-- Modal Tolak Komite  -->
                                                    <div class="modal fade" id="tolak_komite" tabindex="-1"
                                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-transparent">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                    <h1 class="text-center mb-1" id="addNewCardTitle">
                                                                        Apakah Anda Yakin Untuk Menolak Proposal ?
                                                                    </h1>
                                                                    <p class="text-center"></p>

                                                                    <form id="addNewCardValidation"
                                                                        class="row gy-1 gx-2 mt-75" method="POST"
                                                                        action="/kabag/ultra_mikro/komite">
                                                                        @csrf

                                                                        <div class="col-md-12">
                                                                            <label class="form-label"
                                                                                for="catatan">Catatan</label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                        </div>
                                                                        <input type="hidden"
                                                                            name="ultra_mikro_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}">
                                                                        <input type="hidden" name="status_id" value=6>
                                                                        <input type="hidden" name="jabatan_id" value=2>
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ Auth::user()->id }}">

                                                                        <div class="col-12 text-center">
                                                                            <button type="submit"
                                                                                class="btn btn-primary me-1 mt-1">Submit</button>
                                                                            <button type="reset"
                                                                                class="btn btn-outline-secondary mt-1"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close">
                                                                                Cancel
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/ Modal Tolak Komite  -->

                                                    <!-- Modal Rekomendasi Revisi  -->
                                                    <div class="modal fade" id="edit_proposal" tabindex="-1"
                                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-transparent">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                    <h1 class="text-center mb-1" id="addNewCardTitle">
                                                                        Rekomendasi Revisi Proposal ?
                                                                    </h1>
                                                                    <p class="text-center"></p>

                                                                    <form id="addNewCardValidation"
                                                                        class="row gy-1 gx-2 mt-75" method="POST"
                                                                        action="/kabag/ultra_mikro/komite">
                                                                        @csrf

                                                                        <div class="col-md-12">
                                                                            <label class="form-label"
                                                                                for="catatan">Catatan</label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                        </div>
                                                                        <input type="hidden"
                                                                            name="ultra_mikro_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}">
                                                                        <input type="hidden" name="status_id" value=7>
                                                                        <input type="hidden" name="jabatan_id" value=2>
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ Auth::user()->id }}">

                                                                        <div class="col-12 text-center">
                                                                            <button type="submit"
                                                                                class="btn btn-primary me-1 mt-1">Submit</button>
                                                                            <button type="reset"
                                                                                class="btn btn-outline-secondary mt-1"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close">
                                                                                Cancel
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/ Modal Rekomendasi Revisi  -->

                                                    {{-- <!-- Modal Dokumen Deviasi -->
                                                    @if ($deviasi)
                                                        <div class="modal fade" id="dokumenDeviasi" tabindex="-1"
                                                            aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-transparent">
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                        <h3 class="text-center">Lampiran Dokumen Deviasi
                                                                        </h3>
                                                                        <div class="card-body">
                                                                            <h4 class="text-center">Deviasi
                                                                                {{ $deviasi->kategori_deviasi }}
                                                                            </h4>
                                                                            <iframe
                                                                                src="{{ asset('storage/' . $deviasi->dokumen_deviasi) }}"
                                                                                class="d-block w-100"
                                                                                height="500"></iframe>
                                                                            <br />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <!--/ Modal Dokumen Deviasi --> --}}

                                                    <!-- Modal Surat Permohonan Restruct -->
                                                    <div class="modal fade" id="suratPermohonanRestruct" tabindex="-1"
                                                        aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-transparent">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                    <h3 class="text-center">Lampiran Surat Permohonan
                                                                        Restruct
                                                                    </h3>
                                                                    <div class="card-body">
                                                                        <iframe
                                                                            src="https://docs.google.com/gview?url={{ asset('storage/' . optional($fotoSuratPermohonanRestruct)->foto) }}&embedded=true"
                                                                            class="d-block w-100" height="500"></iframe>
                                                                        <br />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/ Modal Surat Permohonan Restruct -->
                                                </div>
                                            </div>
                                            <!-- /proposal -->
                                        </div>
                                        <div class="tab-pane" id="tab-lampiran-identitas" role="tabpanel"
                                            aria-labelledby="profile-tab-justified">
                                            @foreach ($fotos->where('kategori', '!=', 'IDEB')->where('kategori', '!=', 'IDEB Pasangan') as $foto)
                                                <!-- post 1 -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                                            <div>
                                                                <h6 class="mb-0">{{ $foto->kategori }}</h6>
                                                                <small class="text-muted">Diupload pada:
                                                                    {{ $foto->created_at->diffForhumans() }}</small>
                                                            </div>
                                                        </div>
                                                        <iframe src="{{ asset('storage/' . $foto->foto) }}"
                                                            class="d-block w-100" height="600"></iframe>
                                                    </div>
                                                </div>
                                                <!--/ post 1 -->
                                            @endforeach
                                        </div>

                                        <div class="tab-pane" id="ideb" role="tabpanel"
                                            aria-labelledby="ideb-tab-justified">
                                            <center>
                                                <h4>IDEB Pemohon</h4>
                                            </center>
                                            <iframe src="{{ asset('storage/' . optional($pembiayaan)->dokumen_ideb) }}"
                                                class="d-block w-100" height="600"></iframe>
                                            @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                                                <br /> <br />
                                                <hr />
                                                <center>
                                                    <h4>IDEB Pasangan</h4>
                                                </center>
                                                @if ($dokumenIdebPasangan)
                                                    <iframe src="{{ asset('storage/' . optional($dokumenIdebPasangan)->foto) }}"
                                                        class="d-block w-100" height="600"></iframe>
                                                @else
                                                    <center>
                                                        <br />
                                                        <p>IDEB Pasangan tidak ada/belum di-upload</p>
                                                    </center>
                                                @endif
                                            @endif

                                        </div>

                                        <div class="tab-pane" id="timeline" role="tabpanel"
                                            aria-labelledby="timeline-tab-justified">
                                            <div class="col-xl-12 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                                                <div class="card">
                                                    <!-- Timeline Starts -->
                                                    <div class="card-body">
                                                        <ul class="timeline">
                                                            @foreach ($timelines as $timeline)
                                                                @php

                                                                    $arr = $loop->iteration;
                                                                    if ($arr == -2) {
                                                                        $waktu_mulai = Carbon\Carbon::parse(
                                                                            $timelines[0]->created_at,
                                                                        );
                                                                        $waktu_selesai = Carbon\Carbon::parse(
                                                                            $timeline->created_at,
                                                                        );
                                                                        $selisih = $waktu_selesai->diffAsCarbonInterval(
                                                                            $waktu_mulai,
                                                                        );
                                                                    } elseif ($arr == $banyakHistory) {
                                                                        $waktu_mulai = Carbon\Carbon::parse(
                                                                            $timelines[0]->created_at,
                                                                        );
                                                                        $waktu_selesai = Carbon\Carbon::parse(
                                                                            $timeline->created_at,
                                                                        );
                                                                        $selisih = $waktu_selesai->diffAsCarbonInterval(
                                                                            $waktu_mulai,
                                                                        );
                                                                    } elseif ($arr >= 0) {
                                                                        $waktu_mulai = Carbon\Carbon::parse(
                                                                            $timelines[$arr]->created_at,
                                                                        );
                                                                        $waktu_selesai = Carbon\Carbon::parse(
                                                                            $timeline->created_at,
                                                                        );
                                                                        $selisih = $waktu_selesai->diffAsCarbonInterval(
                                                                            $waktu_mulai,
                                                                        );
                                                                    }

                                                                @endphp
                                                                <li class="timeline-item">
                                                                    <span
                                                                        class="timeline-point timeline-point-success timeline-point-indicator"></span>
                                                                    <div class="timeline-event">
                                                                        <div
                                                                            class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-0">
                                                                            <h6
                                                                                value="{{ $timeline->statushistory?->id ?? '' }}, {{ $timeline->jabatan?->jabatan_id ?? '' }}">
                                                                                {{ $timeline->statushistory?->keterangan ?? '' }}
                                                                                {{ $timeline->jabatan?->keterangan ?? '' }}
                                                                            </h6>
                                                                            <span class="timeline-event-time"
                                                                                style="text-align: right">{{ $timeline->created_at->isoformat('dddd, D MMMM Y') }}
                                                                                <br>{{ $timeline->created_at->isoformat('HH:mm:ss') }}
                                                                            </span>
                                                                        </div>
                                                                        @if ($timeline->catatan)
                                                                            <p value="{{ $timeline->id }}">
                                                                                <i>* Catatan</i>:<br />
                                                                                {!! nl2br($timeline->catatan) !!}
                                                                            <p>
                                                                        @endif
                                                                        @if ($arr == -1)
                                                                        @else
                                                                            <span class="timeline-event-time">Waktu
                                                                                Diproses : {{ $selisih }}</span>
                                                                        @endif
                                                                        <div class="d-flex flex-row align-items-center">

                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                            <p class="fw-bold"> Total SLA = {{ $totalWaktu }}</p>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Justified Tabs ends -->
                            </div>
                </section>
            </div>
        @endsection
