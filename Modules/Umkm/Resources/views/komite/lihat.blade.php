@extends('umkm::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="nav-filled">
                    <div class="row match-height">

                        <!-- Justified Tabs starts -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Proposal Pengajuan Pembiayaan</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab-justified" data-bs-toggle="tab"
                                                href="#proposal" role="tab" aria-controls="home-just"
                                                aria-selected="true">Proposal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab-justified" data-bs-toggle="tab"
                                                href="#identitas-pribadi" role="tab" aria-controls="profile-just"
                                                aria-selected="true">Identitas Pribadi</a>
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
                                                aria-selected="false">Ideb</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="settings-tab-justified" data-bs-toggle="tab"
                                                href="#timeline" role="tab" aria-controls="settings-just"
                                                aria-selected="false">Timeline</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content pt-1">
                                        <div class="tab-pane active show " id="proposal" role="tabpanel"
                                            aria-labelledby="home-tab-justified">
                                            <!-- Invoice -->
                                            <div class="col-xl-12 col-md-8 col-12">
                                                <div class="card invoice-preview-card">
                                                    {{-- Redeclare variabel yang dibutuhkan --}}
                                                    @php
                                                        $total_score = $score_idir + $score_slik + $score_cashpick + $score_jaminanrumah + $score_lamadagang + $score_jenisnasabah + $score_jenisdagang + $score_sukubangsa;
                                                    @endphp

                                                    @include('umkm::komite.summary-umkm')

                                                    <div class="card-body invoice-padding pt-0">
                                                        <div class="row invoice-spacing">
                                                            <div class="col-xl-3 p-0">
                                                            </div>
                                                            <div class="col-xl-9 p-0 mt-xl-0 mt-2">
                                                                <div class="d-flex flex-wrap gap-2 align-items-center">
                                                                @if ($history->status_id == 2)
                                                                    @if ($total_score < 3)
                                                                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ditolak">Ditolak</button>
                                                                    @else
                                                                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#lanjut_komite">Lanjut Komite</button>
                                                                    @endif
                                                                @endif
                                                                @if (!$bon_murabahah && $history->status_id == 9)
                                                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#bon">Upload Bon Murabahah</button>
                                                                @endif
                                                                @if (!in_array($history->status_id, [6, 8, 9, 10]))
                                                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit_proposal">Edit Proposal</button>
                                                                @endif
                                                                <form action="/umkm/cetak" target="_blank" class="d-inline-block m-0">
                                                                    <input type="hidden" name="id" value="{{ $pembiayaan->id }}">
                                                                    <button type="submit" class="btn btn-info"><i data-feather="printer"></i> Cetak Proposal</button>
                                                                </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Invoice Note ends -->
                                                    <div class="modal fade" id="bon" tabindex="-1"
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
                                                                        Upload Bon Murabahah
                                                                    </h1>
                                                                    <p class="text-center"></p>

                                                                    <!-- form -->
                                                                    <form id="addNewCardValidation"
                                                                        class="row gy-1 gx-2 mt-75" method="POST"
                                                                        action="/umkm/bonmurabahah"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <label class="form-label" for="fotokk"><small
                                                                                class="text-danger">*
                                                                            </small>Upload Bon Murabahah</label>
                                                                        <input type="hidden" name="umkm_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}">
                                                                        <input type="file" name="Foto_Bon_Murabahah"
                                                                            id="fotokk" rows="3"
                                                                            class="form-control" required />
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

                                                    <div class="modal fade" id="lanjut_komite" tabindex="-1"
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
                                                                        Apakah Anda Yakin Untuk Melanjutkan Ke Komite ?
                                                                    </h1>
                                                                    <p class="text-center"></p>

                                                                    <!-- form -->
                                                                    <form id="addNewCardValidation"
                                                                        class="row gy-1 gx-2 mt-75" method="POST"
                                                                        action="/umkm/komite"
                                                                        enctype="multipart/form-data">
                                                                        @csrf

                                                                        <div class="col-md-12">
                                                                            <label class="form-label"
                                                                                for="catatan">Catatan</label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                        </div>
                                                                        <input type="hidden" name="umkm_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}">
                                                                        <input type="hidden" name="status_id" value=3>
                                                                        <input type="hidden" name="jabatan_id" value=1>
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ Auth::user()->id }}">
                                                                        @if ($nilai_idir >= 80 || $nilai_idir < 0)
                                                                            <label class="form-label"
                                                                                for="fotokk"><small
                                                                                    class="text-danger">*
                                                                                </small>Upload Dokumen Deviasi</label>
                                                                            <input type="file" name="dokumen_deviasi"
                                                                                id="fotokk" rows="3"
                                                                                class="form-control">
                                                                        @endif
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
                                                    <!-- /Invoice Actions -->

                                                    <!-- Invoice Note ends -->

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
                                                                        Revisi Proposal ?
                                                                    </h1>
                                                                    <p class="text-center"></p>

                                                                    <!-- form -->
                                                                    <form id="addNewCardValidation"
                                                                        class="row gy-1 gx-2 mt-75" method="POST"
                                                                        action="/umkm/komite">
                                                                        @csrf

                                                                        <div class="col-md-12">
                                                                            <label class="form-label"
                                                                                for="catatan">Catatan</label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                        </div>
                                                                        <input type="hidden" name="umkm_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}">
                                                                        <input type="hidden" name="status_id" value=7>
                                                                        <input type="hidden" name="jabatan_id" value=1>
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
                                                    <!-- /Invoice Actions -->

                                                    <!-- Invoice Note ends -->

                                                    <div class="modal fade" id="ditolak" tabindex="-1"
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
                                                                        Apakah Anda Yakin Untuk Menolak Proposal Ini ?
                                                                    </h1>
                                                                    <p class="text-center"></p>

                                                                    <!-- form -->
                                                                    <form id="addNewCardValidation"
                                                                        class="row gy-1 gx-2 mt-75" method="POST"
                                                                        action="/umkm/komite">
                                                                        @csrf

                                                                        <div class="col-md-12">
                                                                            <label class="form-label"
                                                                                for="catatan">Catatan</label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                        </div>
                                                                        <input type="hidden" name="umkm_pembiayaan_id"
                                                                            value="{{ $pembiayaan->id }}">
                                                                        <input type="hidden" name="status_id" value=6>
                                                                        <input type="hidden" name="jabatan_id" value=1>
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
                                                    <!-- /Invoice Actions -->
                                                </div>



                                                <hr class="invoice-spacing" />


                                            </div>
                                        </div>
                                        <!-- /Invoice -->

                                        <!-- Invoice Actions -->
                                        <div class="tab-pane" id="identitas-pribadi" role="tabpanel"
                                            aria-labelledby="profile-tab-justified">
                                            <!-- post 1 -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-start align-items-center mb-1">
                                                        <div>
                                                            <h6 class="mb-0">{{ $fotodiri->kategori }}</h6>
                                                            <small class="text-muted">Diupload Pada :
                                                                {{ $fotodiri->created_at->diffForhumans() }}</small>
                                                        </div>
                                                    </div>
                                                    <!-- post img -->
                                                    <img class="img-fluid rounded mb-75"
                                                        src="{{ asset('storage/' . $fotodiri->foto) }}"
                                                        alt="avatar img" />
                                                    <!--/ post img -->
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-start align-items-center mb-1">
                                                        <div>
                                                            <h6 class="mb-0">{{ $fotoktp->kategori }}</h6>
                                                            <small class="text-muted">Diupload Pada :
                                                                {{ $fotoktp->created_at->diffForhumans() }}</small>
                                                        </div>
                                                    </div>
                                                    <!-- post img -->
                                                    <img class="img-fluid rounded mb-75"
                                                        src="{{ asset('storage/' . $fotoktp->foto) }}"
                                                        alt="avatar img" />
                                                    <!--/ post img -->
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-start align-items-center mb-1">
                                                        <div>
                                                            <h6 class="mb-0">{{ $fotodiribersamaktp->kategori }}</h6>
                                                            <small class="text-muted">Diupload Pada :
                                                                {{ $fotodiribersamaktp->created_at->diffForhumans() }}</small>
                                                        </div>
                                                    </div>
                                                    <!-- post img -->
                                                    <img class="img-fluid rounded mb-75"
                                                        src="{{ asset('storage/' . $fotodiribersamaktp->foto) }}"
                                                        alt="avatar img" />
                                                    <!--/ post img -->
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-start align-items-center mb-1">
                                                        <div>
                                                            <h6 class="mb-0">{{ $fotokk->kategori }}</h6>
                                                            <small class="text-muted">Diupload Pada :
                                                                {{ $fotokk->created_at->diffForhumans() }}</small>
                                                        </div>
                                                    </div>
                                                    <!-- post img -->
                                                    <img class="img-fluid rounded mb-75"
                                                        src="{{ asset('storage/' . $fotokk->foto) }}" alt="avatar img" />
                                                    <!--/ post img -->
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="keuangan"
                                            role="tabpanel"aria-labelledby="messages-tab-justified">

                                            @if ($nota)
                                                <!-- post 1 -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                                            <div>
                                                                <h6 class="mb-0">
                                                                    {{ $nota->kategori }}
                                                                </h6>
                                                                <small class="text-muted">Diupload Pada :
                                                                    {{ $nota->created_at->diffForhumans() }}</small>
                                                            </div>
                                                        </div>
                                                        <!-- post img -->
                                                        <img class="img-fluid rounded mb-75"
                                                            src="{{ asset('storage/' . $nota->foto) }}"
                                                            alt="avatar img" />
                                                        <!--/ post img -->
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($bon_murabahah)
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                                            <div>
                                                                <h6 class="mb-0">
                                                                    {{ $bon_murabahah->kategori }}
                                                                </h6>
                                                                <small class="text-muted">Diupload Pada :
                                                                    {{ $bon_murabahah->created_at->diffForhumans() }}</small>
                                                            </div>
                                                        </div>
                                                        <!-- post img -->
                                                        <img class="img-fluid rounded mb-75"
                                                            src="{{ asset('storage/' . $bon_murabahah->foto) }}"
                                                            alt="avatar img" />
                                                        <!--/ post img -->
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="tab-pane" id="ideb" role="tabpanel"
                                            aria-labelledby="settings-tab-justified">
                                            {{-- <iframe src="{{ asset('storage/' . $ideb->foto) }}" frameborder="0"
                                        width="1000" height="900"></iframe> --}}
                                            <iframe src="{{ asset('storage/' . $pembiayaan->dokumen_keuangan) }}"
                                                class="d-block w-100" height='500' weight='800'></iframe>
                                        </div>
                                        <div class="tab-pane" id="legalitas-agunan"
                                            role="tabpanel"aria-labelledby="messages-tab-justified">
                                            @foreach ($jaminanusahas as $jaminan)
                                                <!-- post 1 -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                                            <div>
                                                                <h6 class="mb-0"> Jaminan :
                                                                    {{ $jaminans->nama_jaminan }}
                                                                </h6>
                                                                <h6 class="mb-0"><br> KTB :
                                                                    {{ $jaminan->no_ktb }}
                                                                </h6>
                                                                <small class="text-muted">Diupload Pada :
                                                                    {{ $jaminan->created_at->diffForhumans() }}</small>
                                                            </div>
                                                        </div>
                                                        <!-- post img -->
                                                        <img class="img-fluid rounded mb-75"
                                                            src="{{ asset('storage/' . $jaminan->dokumenktb) }}"
                                                            alt="avatar img" />
                                                        <!--/ post img -->
                                                    </div>
                                                </div>
                                                <!--/ post 1 -->
                                            @endforeach
                                            @foreach ($jaminanlainusahas as $jaminanlainnya)
                                                <!-- post 1 -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                                            <div>

                                                                <small class="text-muted">Diupload Pada :
                                                                    {{ $jaminanlainnya->created_at->diffForhumans() }}</small>
                                                            </div>
                                                        </div>
                                                        <!-- post img -->
                                                        <img class="img-fluid rounded mb-75"
                                                            src="{{ asset('storage/' . $jaminanlainnya->dokumen_jaminanlain) }}"
                                                            alt="avatar img" />
                                                        <!--/ post img -->
                                                    </div>
                                                </div>
                                                <!--/ post 1 -->
                                            @endforeach
                                        </div>

                                        <div class="tab-pane" id="timeline" role="tabpanel"
                                            aria-labelledby="settings-tab-justified">
                                            <div class="col-xl-12 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                                                <div class="card">
                                                    <!-- Timeline Starts -->
                                                    <div class="card-body">
                                                        <ul class="timeline">
                                                            @foreach ($timelines as $timeline)
                                                                @php

                                                                    $arr = $loop->iteration;
                                                                    if ($arr == -2) {
                                                                        $waktu_mulai = Carbon\Carbon::parse($timelines[0]->created_at);
                                                                        $waktu_selesai = Carbon\Carbon::parse($timeline->created_at);
                                                                        $selisih = $waktu_selesai->diffAsCarbonInterval($waktu_mulai);
                                                                    } elseif ($arr == $banyak_history) {
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
                                                                        {{-- <span
                                                                            class="timeline-event-time">{{ $timeline->created_at->diffForHumans() }}</span> --}}
                                                                        {{-- <p>{{ $timeline->created_at->diffForHumans() }}</p> --}}
                                                                        <div class="d-flex flex-row align-items-center">

                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach

                                                            <p class="fw-bold"> Total SLA : {{ $totalwaktu }}</p>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Invoice Actions -->
                                    </div>
                </section>
                <!-- Idir -->
                <div class="modal fade" id="idir" tabindex="-1" aria-labelledby="addNewCardTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                <h3 class="text-center">Nilai IDIR </h3>
                                <hr class="invoice-spacing" />
                                <div class="card-body">
                                    <div class="col-md-12 d-flex order-md-2 order-1">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="pe-1">Harga Beli</td>
                                                    <td><span class="fw-bold">: Rp.
                                                            {{ number_format((float)($pembiayaan->nominal_pembiayaan ?? 0)) }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Harga Jual</td>
                                                    <td>: Rp. {{ number_format($harga_jual) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Jangka Waktu</td>
                                                    <td>: {{ $pembiayaan->tenor }} bulan</td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Equivalen Rate</td>
                                                    <td>: {{ $pembiayaan->rate }} %</td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Angsuran</td>
                                                    <td>: Rp. {{ number_format($angsuran) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1 mt-1">IDIR</td>
                                                    <td><span class="fw-bold">:
                                                            {{ $nilai_idir }}
                                                            %</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--akhir idir -->

                <!-- Slik -->
                <div class="modal fade" id="fototoko" tabindex="-1" aria-labelledby="addNewCardTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-sm-12 mx-50 pb-5">
                                <h3 class="text-center">Jenis Dagangan </h3>
                                <hr class="invoice-spacing" />
                                <div class="card-body">
                                    <div class="col-md-12 d-flex order-md-2 order-1">
                                        <img src="{{ asset('storage/' . $fototoko->foto) }}" class="d-block w-100"
                                            height='500' weight='800'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--akhir Slik -->

                <!-- Slik -->
                <div class="modal fade" id="slik" tabindex="-1" aria-labelledby="addNewCardTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-sm-12 mx-50 pb-5">
                                <h3 class="text-center">IDEB </h3>
                                <hr class="invoice-spacing" />
                                <div class="card-body">
                                    <div class="col-md-12 d-flex order-md-2 order-1">
                                        <iframe src="{{ asset('storage/' . $pembiayaan->dokumen_keuangan) }}"
                                            class="d-block w-100" height='500' weight='800'></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--akhir Slik -->


                <!-- Slik -->
                <div class="modal fade" id="jaminankios" tabindex="-1" aria-labelledby="addNewCardTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-sm-12 mx-50 pb-5">
                                <h3 class="text-center">Jaminan Kios </h3>
                                <hr class="invoice-spacing" />
                                <div class="card-body">
                                    <div class="col-md-12 d-flex order-md-2 order-1">
                                        <img src="{{ asset('storage/' . $jaminan->dokumenktb) }}" class="d-block w-100"
                                            height='500' weight='800'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--akhir Slik -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
