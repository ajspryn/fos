@extends('p3k::layouts.main')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row"></div>
            <div class="content-body">
                <section id="komite-clean">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Proposal Pengajuan Pembiayaan</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="komiteTabs" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#proposal">Proposal</a></li>
                                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#lampiran">Lampiran Pribadi</a></li>
                                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#legalitas">Legalitas Agunan</a></li>
                                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#keuangan">Keuangan</a></li>
                                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#ideb">IDEB</a></li>
                                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#timeline">Timeline</a></li>
                                    </ul>

                                    <div class="tab-content mt-3">
                                        <div class="tab-pane active show" id="proposal">
                                            @include('p3k::komite.summary-p3k')
                                        </div>

                                        <div class="tab-pane" id="lampiran">
                                            @foreach ($fotos->where('kategori', '!=', 'IDEB')->where('kategori', '!=', 'IDEB Pasangan') as $foto)
                                                <div class="mb-4">
                                                    <h6 class="mb-1">{{ $foto->kategori }} <small class="text-muted">• {{ $foto->created_at->diffForHumans() }}</small></h6>
                                                    <div class="ratio ratio-16x9">
                                                        <iframe src="{{ asset('storage/' . $foto->foto) }}" frameborder="0"></iframe>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="tab-pane" id="legalitas">
                                            <h6 class="mb-2">SK Pengangkatan/Terakhir</h6>
                                            <div class="ratio ratio-16x9 mb-3">
                                                <iframe src="{{ asset('storage/' . $pembiayaan->nasabah->pekerjaan->dokumen_sk) }}" frameborder="0"></iframe>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="keuangan">
                                            <h6 class="mb-2">Dokumen Keuangan</h6>
                                            <div class="ratio ratio-16x9 mb-3">
                                                <iframe src="{{ asset('storage/' . $pembiayaan->dokumen_keuangan) }}" frameborder="0"></iframe>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="ideb">
                                            <h6 class="mb-2">IDEB Pemohon</h6>
                                            <div class="ratio ratio-16x9 mb-3">
                                                <iframe src="{{ asset('storage/' . $pembiayaan->dokumen_ideb) }}" frameborder="0"></iframe>
                                            </div>
                                            @if ($pembiayaan->nasabah->status_pernikahan == 'Menikah')
                                                <h6 class="mt-3">IDEB Pasangan</h6>
                                                @if ($dokumenIdebPasangan)
                                                    <div class="ratio ratio-16x9 mb-3">
                                                        <iframe src="{{ asset('storage/' . $dokumenIdebPasangan->foto) }}" frameborder="0"></iframe>
                                                    </div>
                                                @else
                                                    <p class="text-muted">IDEB Pasangan tidak ada / belum di-upload.</p>
                                                @endif
                                            @endif
                                        </div>

                                        <div class="tab-pane" id="timeline">
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
                                                                <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
                                                                <div class="timeline-event">
                                                                    <div class="d-flex justify-content-between">
                                                                        <h6>{{ $timeline->statushistory?->keterangan ?? '' }} {{ $timeline->jabatan?->keterangan ?? '' }}</h6>
                                                                        <span class="text-muted">{{ $timeline->created_at->isoformat('dddd, D MMMM Y') }} • {{ $timeline->created_at->isoformat('HH:mm:ss') }}</span>
                                                                    </div>
                                                                    @if ($timeline->catatan)
                                                                        <p class="mt-2"><i>* Catatan</i>:<br>{!! nl2br($timeline->catatan) !!}</p>
                                                                    @endif
                                                                    @if ($arr != -1)
                                                                        <small class="text-muted">Waktu Diproses: {{ $selisih }}</small>
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
                            </div>
                        </div>

                        <!-- Actions moved to bottom of page -->
                    </div>

                    <!-- Actions block (moved to bottom) -->
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mb-0">Actions</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-wrap gap-2 align-items-center">
                                        @if ($history->status_id == 2)
                                            @if ($deviasi)
                                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#lanjut_komite"><i data-feather="check-square"></i> Lanjut Komite</button>
                                            @elseif ($total_score >= 2.5)
                                                @if ($dsr > 90 || $tenor > $sisaUsia || $pendapatanBersih - $angsuran < 0)
                                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ditolak">Ditolak</button>
                                                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUploadDeviasi"><i data-feather="file"></i> Upload Dokumen Deviasi</button>
                                                @else
                                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#lanjut_komite"><i data-feather="check-square"></i> Lanjut Komite</button>
                                                @endif
                                            @else
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ditolak">Ditolak</button>
                                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalUploadDeviasi"><i data-feather="file"></i> Upload Dokumen Deviasi</button>
                                            @endif
                                        @endif

                                        @if (!$bonMurabahah && $history->status_id == 9)
                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#bonMurabahah">Upload Bon Murabahah</button>
                                        @endif

                                        @if (!in_array($history->status_id, [6, 8, 9, 10]))
                                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit_proposal"><i data-feather="edit"></i> Edit Proposal</button>
                                        @endif

                                        <form action="/p3k/cetak" target="_blank" class="d-inline-block m-0">
                                            <input type="hidden" name="id" value="{{ $pembiayaan->id }}">
                                            <button class="btn btn-outline-info"><i data-feather="printer"></i> Cetak Proposal</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modals (kept from original implementation) -->
                    <!-- Modal Setuju -->
                    <div class="modal fade" id="lanjut_komite" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                    <h1 class="text-center mb-1" id="addNewCardTitle">Apakah Anda Yakin Untuk Melanjutkan Ke Komite ?</h1>
                                    <form method="POST" action="/p3k/komite">@csrf
                                        <div class="mb-2"><label class="form-label">Catatan</label><textarea name="catatan" class="form-control" rows="3"></textarea></div>
                                        <input type="hidden" name="p3k_pembiayaan_id" value="{{ $pembiayaan->id }}">
                                        <input type="hidden" name="status_id" value="3">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="text-center mt-2"><button type="submit" class="btn btn-primary">Submit</button> <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Bon Murabahah -->
                    <div class="modal fade" id="bonMurabahah" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                    <h1 class="text-center mb-1">Upload Bon Murabahah</h1>
                                    <form method="POST" action="/p3k/bonMurabahah" enctype="multipart/form-data">@csrf
                                        <input type="hidden" name="p3k_pembiayaan_id" value="{{ $pembiayaan->id }}">
                                        <div class="mb-2"><label class="form-label">*File berupa gambar .jpg/jpeg/png</label><input type="file" name="bon_murabahah" class="form-control" required></div>
                                        <div class="text-center"><button type="submit" class="btn btn-primary">Submit</button> <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit Proposal -->
                    <div class="modal fade" id="edit_proposal" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent"><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                    <h1 class="text-center mb-1">Revisi Proposal ?</h1>
                                    <form method="POST" action="/p3k/komite">@csrf
                                        <div class="mb-2"><label class="form-label">Catatan</label><textarea name="catatan" class="form-control" rows="3"></textarea></div>
                                        <input type="hidden" name="p3k_pembiayaan_id" value="{{ $pembiayaan->id }}">
                                        <input type="hidden" name="status_id" value="7">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="text-center"><button type="submit" class="btn btn-primary">Submit</button> <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Ditolak -->
                    <div class="modal fade" id="ditolak" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent"><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                    <h1 class="text-center mb-1">Apakah Anda Yakin Untuk Menolak Proposal Ini ?</h1>
                                    <form method="POST" action="/p3k/komite">@csrf
                                        <div class="mb-2"><label class="form-label">Catatan</label><textarea name="catatan" class="form-control" rows="3"></textarea></div>
                                        <input type="hidden" name="p3k_pembiayaan_id" value="{{ $pembiayaan->id }}">
                                        <input type="hidden" name="status_id" value="6">
                                        <input type="hidden" name="jabatan_id" value="1">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="text-center"><button type="submit" class="btn btn-primary">Submit</button> <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Upload Deviasi -->
                    <div class="modal fade" id="modalUploadDeviasi" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-transparent"><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
                                <div class="modal-body px-sm-5 mx-50 pb-5">
                                    <h1 class="text-center mb-1">Upload Lembar Deviasi</h1>
                                    <form method="POST" action="/p3k/komite" enctype="multipart/form-data">@csrf
                                        <input type="hidden" name="p3k_pembiayaan_id" value="{{ $pembiayaan->id }}">
                                        <input type="hidden" name="status_id" value="2">
                                        <input type="hidden" name="jabatan_id" value="1">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="mb-2"><label class="form-label">Kategori</label>
                                            <select name="kategori_deviasi" class="form-select" required>
                                                <option value="">Pilih Kategori</option>
                                                <option value="DSR">DSR</option>
                                                <option value="Slik">Slik</option>
                                                <option value="Tenor">Tenor</option>
                                            </select>
                                        </div>
                                        <div class="mb-2"><input type="file" name="dokumen_deviasi" class="form-control" required></div>
                                        <div class="text-center"><button type="submit" class="btn btn-primary">Submit</button> <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
@endsection
