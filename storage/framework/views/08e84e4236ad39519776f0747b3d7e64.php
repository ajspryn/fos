<?php $__env->startSection('content'); ?>
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
                                            <a class="nav-link" id="keuangan-tab-justified" data-bs-toggle="tab"
                                                href="#keuangan" role="tab" aria-controls="keuangan"
                                                aria-selected="false">Keuangan</a>
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

                                                    <?php echo $__env->make('p3k::komite.summary-p3k', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                                                    <hr />
                                                    <!-- Tombol Aksi -->
                                                    <div class="card-body invoice-padding pt-0">
                                                        <div class="row invoice-spacing">
                                                            <div class="col-xl-3 p-0">
                                                            </div>
                                                            <div class="col-xl-5 p-0 mt-xl-0 mt-2">
                                                                <?php if($historyStatus && $historyStatus->status_id == 4 && $historyStatus->jabatan_id == 2): ?>
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
                                                                <?php endif; ?>
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
                                                                        action="/kabag/p3k/komite">
                                                                        <?php echo csrf_field(); ?>

                                                                        <div class="col-md-12">
                                                                            <label class="form-label"
                                                                                for="catatan">Catatan</label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                        </div>
                                                                        <input type="hidden" name="p3k_pembiayaan_id"
                                                                            value="<?php echo e($pembiayaan->id); ?>">
                                                                        <input type="hidden" name="status_id" value=5>
                                                                        <input type="hidden" name="jabatan_id" value=2>
                                                                        <input type="hidden" name="user_id"
                                                                            value="<?php echo e(Auth::user()->id); ?>">

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
                                                                        action="/kabag/p3k/komite">
                                                                        <?php echo csrf_field(); ?>

                                                                        <div class="col-md-12">
                                                                            <label class="form-label"
                                                                                for="catatan">Catatan</label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                        </div>
                                                                        <input type="hidden" name="p3k_pembiayaan_id"
                                                                            value="<?php echo e($pembiayaan->id); ?>">
                                                                        <input type="hidden" name="status_id" value=6>
                                                                        <input type="hidden" name="jabatan_id" value=2>
                                                                        <input type="hidden" name="user_id"
                                                                            value="<?php echo e(Auth::user()->id); ?>">

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
                                                                        action="/kabag/p3k/komite">
                                                                        <?php echo csrf_field(); ?>

                                                                        <div class="col-md-12">
                                                                            <label class="form-label"
                                                                                for="catatan">Catatan</label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                        </div>
                                                                        <input type="hidden" name="p3k_pembiayaan_id"
                                                                            value="<?php echo e($pembiayaan->id); ?>">
                                                                        <input type="hidden" name="status_id" value=7>
                                                                        <input type="hidden" name="jabatan_id" value=2>
                                                                        <input type="hidden" name="user_id"
                                                                            value="<?php echo e(Auth::user()->id); ?>">

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
                                                    <?php if($deviasi && $deviasi->dokumen_deviasi): ?>
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
                                                                                <?php echo e($deviasi->kategori_deviasi); ?>

                                                                            </h4>
                                                                            <iframe
                                                                                src="<?php echo e(asset('storage/' . optional($deviasi)->dokumen_deviasi)); ?>"
                                                                                class="d-block w-100"
                                                                                height="500"></iframe>
                                                                            <br />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <!--/ Modal Dokumen Deviasi -->
                                                </div>
                                            </div>
                                            <!-- /proposal -->
                                        </div>
                                        <div class="tab-pane" id="tab-lampiran-identitas" role="tabpanel"
                                            aria-labelledby="profile-tab-justified">
                                            <?php $__currentLoopData = $fotos->where('kategori', '!=', 'IDEB')->where('kategori', '!=', 'IDEB Pasangan'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <!-- post 1 -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                                            <div>
                                                                <h6 class="mb-0"><?php echo e($foto->kategori); ?></h6>
                                                                <small class="text-muted">Diupload pada:
                                                                    <?php echo e($foto->created_at->diffForhumans()); ?></small>
                                                            </div>
                                                        </div>
                                                        <iframe src="<?php echo e(asset('storage/' . $foto->foto)); ?>"
                                                            class="d-block w-100" height="600"></iframe>
                                                    </div>
                                                </div>
                                                <!--/ post 1 -->
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div class="tab-pane" id="legalitas-agunan" role="tabpanel"
                                            aria-labelledby="messages-tab-justified">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-start align-items-center mb-1">
                                                        <div>
                                                            <h6 class="mb-0">
                                                                SK Pengangkatan/Terakhir
                                                            </h6>
                                                            <small class="text-muted">Diupload pada:
                                                                <?php echo e($pembiayaan->created_at->diffForhumans()); ?></small>
                                                        </div>
                                                    </div>
                                                    <iframe
                                                        src="<?php echo e(asset('storage/' . optional(optional($pembiayaan->nasabah)->pekerjaan)->dokumen_sk)); ?>"
                                                        class="d-block w-100" height="600"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="keuangan" role="tabpanel"
                                            aria-labelledby="keuangan-tab-justified">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-start align-items-center mb-1">
                                                        <div>
                                                            <h6 class="mb-0">
                                                                Dokumen Keuangan
                                                            </h6>
                                                            <small class="text-muted">Diupload pada:
                                                                <?php echo e($pembiayaan->created_at->diffForhumans()); ?></small>
                                                        </div>
                                                    </div>
                                                    <iframe src="<?php echo e(asset('storage/' . optional($pembiayaan)->dokumen_keuangan)); ?>"
                                                        class="d-block w-100" height="600"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="ideb" role="tabpanel"
                                            aria-labelledby="ideb-tab-justified">
                                            <center>
                                                <h4>IDEB Pemohon</h4>
                                            </center>
                                            <iframe src="<?php echo e(asset('storage/' . optional($pembiayaan)->dokumen_ideb)); ?>"
                                                class="d-block w-100" height="600"></iframe>
                                            <?php if($pembiayaan->nasabah->status_pernikahan == 'Menikah'): ?>
                                                <br /> <br />
                                                <hr />
                                                <center>
                                                    <h4>IDEB Pasangan</h4>
                                                </center>
                                                <?php if($dokumenIdebPasangan): ?>
                                                    <iframe src="<?php echo e(asset('storage/' . optional($dokumenIdebPasangan)->foto)); ?>"
                                                        class="d-block w-100" height="600"></iframe>
                                                <?php else: ?>
                                                    <center>
                                                        <br />
                                                        <p>IDEB Pasangan tidak ada/belum di-upload</p>
                                                    </center>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>

                                        <div class="tab-pane" id="timeline" role="tabpanel"
                                            aria-labelledby="timeline-tab-justified">
                                            <div class="col-xl-12 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                                                <div class="card">
                                                    <!-- Timeline Starts -->
                                                    <div class="card-body">
                                                        <ul class="timeline">
                                                            <?php $__currentLoopData = $timelines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php

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

                                                                ?>
                                                                <li class="timeline-item">
                                                                    <span
                                                                        class="timeline-point timeline-point-success timeline-point-indicator"></span>
                                                                    <div class="timeline-event">
                                                                        <div
                                                                            class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-0">
                                                                            <h6
                                                                                value="<?php echo e($timeline->statushistory?->id ?? ''); ?>, <?php echo e($timeline->jabatan?->jabatan_id ?? ''); ?>">
                                                                                <?php echo e($timeline->statushistory?->keterangan ?? ''); ?>

                                                                                <?php echo e($timeline->jabatan?->keterangan ?? ''); ?>

                                                                            </h6>
                                                                            <span class="timeline-event-time"
                                                                                style="text-align: right"><?php echo e($timeline->created_at->isoformat('dddd, D MMMM Y')); ?>

                                                                                <br><?php echo e($timeline->created_at->isoformat('HH:mm:ss')); ?>

                                                                            </span>
                                                                        </div>
                                                                        <?php if($timeline->catatan): ?>
                                                                            <p value="<?php echo e($timeline->id); ?>">
                                                                                <i>* Catatan</i>:<br />
                                                                                <?php echo nl2br($timeline->catatan); ?>

                                                                            <p>
                                                                        <?php endif; ?>
                                                                        <?php if($arr == -1): ?>
                                                                        <?php else: ?>
                                                                            <span class="timeline-event-time">Waktu
                                                                                Diproses : <?php echo e($selisih); ?></span>
                                                                        <?php endif; ?>
                                                                        <div class="d-flex flex-row align-items-center">

                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <p class="fw-bold"> Total SLA = <?php echo e($totalWaktu); ?></p>
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
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('kabag::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Kabag/Resources/views/p3k/komite/lihat.blade.php ENDPATH**/ ?>