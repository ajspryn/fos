@extends('analis::layouts.main')
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
                                            <a class="nav-link" id="messages-tab-justified" data-bs-toggle="tab"
                                                href="#legalitas-agunan" role="tab" aria-controls="messages-just"
                                                aria-selected="false">Legalitas Agunan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="settings-tab-justified" data-bs-toggle="tab"
                                                href="#keuangan" role="tab" aria-controls="settings-just"
                                                aria-selected="false">Keuangan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="settings-tab-justified" data-bs-toggle="tab"
                                                href="#ideb" role="tab" aria-controls="settings-just"
                                                aria-selected="false">IDEB</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="settings-tab-justified" data-bs-toggle="tab"
                                                href="#timeline" role="tab" aria-controls="settings-just"
                                                aria-selected="false">Timeline</a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content mt-3">
                                        <div class="tab-pane active show" id="proposal" role="tabpanel"
                                            aria-labelledby="home-tab-justified">
                                            <!-- proposal -->
                                            @include('p3k::komite.summary-p3k')

                                            <!-- Tombol Aksi -->
                                            @if ($historyStatus && $historyStatus->status_id == 4 && $historyStatus->jabatan_id == 3)
                                                <div class="mt-3">
                                                    <div class="d-grid gap-2 d-md-flex">
                                                        <button class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#lanjut_komite">
                                                            Lanjut Proses
                                                        </button>
                                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#edit_proposal">
                                                            Rekomendasi Revisi
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
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
                                                                        Apakah Anda Yakin Untuk Melanjutkan Ke Komite ?
                                                                    </h1>
                                                                    <p class="text-center"></p>

                                                                    <form id="addNewCardValidation"
                                                                        class="row gy-1 gx-2 mt-75" method="POST"
                                                                        action="/analis/p3k/komite">
                                                                        @csrf

                                                                        <div class="col-md-12">
                                                                            <label class="form-label"
                                                                                for="catatan">Catatan</label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                        </div>
                                                                        <input type="hidden" name="p3k_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}">
                                                                        <input type="hidden" name="status_id" value=11>
                                                                        <input type="hidden" name="jabatan_id" value=3>
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
                                                                        action="/analis/p3k/komite">
                                                                        @csrf

                                                                        <div class="col-md-12">
                                                                            <label class="form-label"
                                                                                for="catatan">Catatan</label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                        </div>
                                                                        <input type="hidden" name="p3k_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}">
                                                                        <input type="hidden" name="status_id" value=7>
                                                                        <input type="hidden" name="jabatan_id" value=3>
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

                                                    <!-- Modal Dokumen Deviasi -->
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
                                                    <!--/ Modal Dokumen Deviasi -->
                                            <!-- /proposal -->
                                        </div>
                                        <div class="tab-pane" id="tab-lampiran-identitas" role="tabpanel"
                                            aria-labelledby="profile-tab-justified">
                                            @foreach ($fotos->where('kategori', '!=', 'IDEB')->where('kategori', '!=', 'IDEB Pasangan') as $foto)
                                                <div class="mb-4">
                                                    <h6 class="mb-1">{{ $foto->kategori }} <small
                                                            class="text-muted">•
                                                            {{ $foto->created_at->diffForHumans() }}</small></h6>
                                                    <div class="ratio ratio-16x9">
                                                        <iframe src="{{ asset('storage/' . $foto->foto) }}"
                                                            frameborder="0"></iframe>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="tab-pane" id="legalitas-agunan" role="tabpanel"
                                            aria-labelledby="messages-tab-justified">
                                            <h6 class="mb-2">SK Pengangkatan/Terakhir</h6>
                                            <div class="ratio ratio-16x9 mb-3">
                                                <iframe
                                                    src="{{ asset('storage/' . $pembiayaan->nasabah->pekerjaan->dokumen_sk) }}"
                                                    frameborder="0"></iframe>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="keuangan" role="tabpanel"
                                            aria-labelledby="settings-tab-justified">
                                            <h6 class="mb-2">Dokumen Keuangan</h6>
                                            <div class="ratio ratio-16x9 mb-3">
                                                <iframe src="{{ asset('storage/' . $pembiayaan->dokumen_keuangan) }}"
                                                    frameborder="0"></iframe>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="ideb" role="tabpanel"
                                            aria-labelledby="settings-tab-justified">
                                            <h6 class="mb-2">IDEB Pemohon</h6>
                                            <div class="ratio ratio-16x9 mb-3">
                                                <iframe src="{{ asset('storage/' . $pembiayaan->dokumen_ideb) }}"
                                                    frameborder="0"></iframe>
                                            </div>
                                            @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                                                <h6 class="mt-3">IDEB Pasangan</h6>
                                                @if ($dokumenIdebPasangan)
                                                    <div class="ratio ratio-16x9 mb-3">
                                                        <iframe
                                                            src="{{ asset('storage/' . $dokumenIdebPasangan->foto) }}"
                                                            frameborder="0"></iframe>
                                                    </div>
                                                @else
                                                    <p class="text-muted">IDEB Pasangan tidak ada / belum di-upload.</p>
                                                @endif
                                            @endif
                                        </div>

                                        <div class="tab-pane" id="timeline" role="tabpanel"
                                            aria-labelledby="settings-tab-justified">
                                            <div class="card">
                                                <div class="card-body">
                                                    <ul class="timeline">
                                                        @foreach ($timelines as $timeline)
                                                            @php

                                                                $arr = $loop->iteration;
                                                                if ($arr == -2) {
                                                                    $waktu_mulai = Carbon\Carbon::parse($timelines[0]->created_at);
                                                                    $waktu_selesai = Carbon\Carbon::parse($timeline->created_at);
                                                                    $selisih = $waktu_selesai->diffAsCarbonInterval($waktu_mulai);
                                                                } elseif ($arr == $banyakHistory) {
                                                                    $waktu_mulai = Carbon\Carbon::parse($timelines[0]->created_at);
                                                                    $waktu_selesai = Carbon\Carbon::parse($timeline->created_at);
                                                                    $selisih = $waktu_selesai->diffAsCarbonInterval($waktu_mulai);
                                                                } elseif ($arr >= 0) {
                                                                    $waktu_mulai = Carbon\Carbon::parse($timelines[$arr]->created_at);
                                                                    $waktu_selesai = Carbon\Carbon::parse($timeline->created_at);
                                                                    $selisih = $waktu_selesai->diffAsCarbonInterval($waktu_mulai);
                                                                }

                                                            @endphp
                                                            <li class="timeline-item">
                                                                <span
                                                                    class="timeline-point timeline-point-success timeline-point-indicator"></span>
                                                                <div class="timeline-event">
                                                                    <div
                                                                        class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-0">
                                                                        <h6
                                                                            value="{{ optional($timeline->statushistory)->id }}, {{ optional($timeline->jabatan)->jabatan_id }}">
                                                                            {{ optional($timeline->statushistory)->keterangan }}
                                                                            {{ optional($timeline->jabatan)->keterangan }}
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
                                                                        </p>
                                                                    @endif
                                                                    @if ($arr != -1)
                                                                        <span class="timeline-event-time">Waktu Diproses
                                                                            : {{ $selisih }}</span>
                                                                    @endif
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <p class="fw-bold">Total SLA = {{ $totalWaktu }}</p>
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
