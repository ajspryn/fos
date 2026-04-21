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

                        <!-- Justified Tabs starts -->
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
                                                href="#identitas-pribadi" role="tab" aria-controls="profile-just"
                                                aria-selected="true">Identitas Pribadi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="messages-tab-justified" data-bs-toggle="tab"
                                                href="#legalitas-agunan" role="tab" aria-controls="messages-just"
                                                aria-selected="false">Legalitas Agunan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="legalitas-pekerjaan-tab-justified" data-bs-toggle="tab"
                                                href="#legalitas-pekerjaan" role="tab" aria-controls="legalitas-pekerjaan"
                                                aria-selected="false">Legalitas
                                                Pekerjaan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="keuangan-tab-justified" data-bs-toggle="tab"
                                                href="#keuangan" role="tab" aria-controls="keuangan"
                                                aria-selected="false">Keuangan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="ideb-tab-justified" data-bs-toggle="tab"
                                                href="#ideb" role="tab" aria-controls="ideb"
                                                aria-selected="false">Ideb</a>
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


                                                    <!-- Address and Contact starts -->
                                                    <div class="card-body invoice-padding pt-0">
                                                        <div class="row invoice-spacing">
                                                            <div class="col-xl-8 p-0">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="pe-1">Tanggal Pengajuan</td>
                                                                            <td>: <?php echo e($pembiayaan->tanggal_pengajuan); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Penggunaan</td>
                                                                            <td>:
                                                                                <?php echo e($pembiayaan->jenis_penggunaan->jenis_penggunaan); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Sektor</td>
                                                                            <td>:
                                                                                <?php echo e(optional($pembiayaan->sektor)->nama_sektor_ekonomi ?? '-'); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Akad</td>
                                                                            <td>: <?php echo e(optional($pembiayaan->akad)->nama_akad ?? '-'); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Nama Nasabah</td>
                                                                            <td><span class="fw-bold">:
                                                                                    <?php echo e($pembiayaan->nasabah->nama_nasabah); ?></span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">No Tlp</td>
                                                                            <td>: <?php echo e($pembiayaan->nasabah->no_telp); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Alamat</td>
                                                                            <td>: <?php echo e($pembiayaan->nasabah->alamat); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">No KTP</td>
                                                                            <td>: <?php echo e($pembiayaan->nasabah->no_ktp); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Tempat/Tgl Lahir</td>
                                                                            <td>:
                                                                                <?php echo e($pembiayaan->nasabah->tempat_lahir); ?>/<?php echo e($pembiayaan->nasabah->tgl_lahir); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Kantor/Dinas</td>
                                                                            <td>:
                                                                                <?php echo e($pembiayaan->instansi->nama_instansi); ?>

                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                                                <h6 class="mb-1">Pendapatan :</h6>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="pe-1">Gaji Pokok</td>
                                                                            <td><span class="fw-bold">: Rp.
                                                                                    <?php echo e(number_format($pembiayaan->gaji_pokok)); ?></span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Pendapatan Lainnya</td>
                                                                            <td>: Rp.
                                                                                <?php echo e(number_format($pembiayaan->pendapatan_lainnya)); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Gaji TPP</td>
                                                                            <td>: Rp.
                                                                                <?php echo e(number_format($pembiayaan->gaji_tpp)); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1 mt-2">Total Pendapatan</td>
                                                                            <td><span class="fw-bold">: Rp.
                                                                                    <?php echo e(number_format($pembiayaan->pendapatan_lainnya + $pembiayaan->gaji_pokok + $pembiayaan->gaji_tpp)); ?></span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <hr>
                                                                <h6 class="mb-1 mt-2">Pengeluaran :</h6>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="pe-1">Cicilan Bank</td>
                                                                            <td><span class="fw-bold">: Rp.
                                                                                    <?php echo e(number_format($cicilan)); ?></span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Potongan Lainnya</td>
                                                                            <td>: Rp.
                                                                                <?php echo e(number_format($pembiayaan->potongan_lainnya)); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Kebutuhan Keluarga</td>
                                                                            <td>: Rp.
                                                                                <?php echo e(number_format($biayakeluarga)); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1 mt-1">Total Pengeluaran
                                                                            </td>
                                                                            <td><span class="fw-bold">: Rp.
                                                                                    <?php echo e(number_format($cicilan + $pembiayaan->potongan_lainnya + $biayakeluarga)); ?></span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <hr>
                                                                <h6>Sisa Pendapatan Bersih : Rp.
                                                                    <?php echo e(number_format($pendapatan_bersih)); ?></h6>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Address and Contact ends -->

                                                    <!-- Invoice Description starts -->
                                                    <!-- Invoice Description starts -->
                                                    <div class="table-responsive">
                                                        <small>Informasi Debitur Nasabah</small>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align: center; width: 5%;"
                                                                        class="py-1">No</th>
                                                                    <th style="text-align: center" class="py-1">Nama
                                                                        Bank</th>
                                                                    <th style="text-align: center" class="py-1">
                                                                        Plafond
                                                                    </th>
                                                                    <th style="text-align: center" class="py-1">
                                                                        Outstanding</th>
                                                                    <th style="text-align: center" class="py-1">
                                                                        Tenor
                                                                    </th>
                                                                    <th style="text-align: center" class="py-1">
                                                                        Margin
                                                                    </th>
                                                                    <th style="text-align: center" class="py-1">
                                                                        Angsuran
                                                                    </th>
                                                                    <th style="text-align: center" class="py-1">
                                                                        Agunan
                                                                    </th>
                                                                    <th style="text-align: center" class="py-1">Kol
                                                                        Tertinggi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $__currentLoopData = $ideps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php
                                                                        // if ($idep) {
                                                                        //     $margin = $idep->margin / 12 / 100;
                                                                        //     $plafond = $idep->plafond * $margin * $idep->tenor + $idep->plafond;
                                                                        //     $angsuran = $plafond / $idep->tenor;
                                                                        // }
                                                                    ?>
                                                                    <tr>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($loop->iteration); ?></td>
                                                                        <td><?php echo e($idep->nama_bank); ?></td>
                                                                        <td>Rp. <?php echo e(number_format($idep->plafond)); ?>

                                                                        </td>
                                                                        <td>Rp.
                                                                            <?php echo e(number_format($idep->outstanding)); ?>

                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($idep->tenor); ?>

                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e(number_format($idep->margin)); ?>%
                                                                        </td>
                                                                        <td>Rp. <?php echo e(number_format($idep->angsuran)); ?>

                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($idep->agunan); ?>

                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <?php echo e($idep->kol_tertinggi); ?></td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <?php if($cekcicilanpasangan > 0): ?>
                                                        <br>
                                                        <div class="table-responsive">
                                                            <small>Informasi Debitur Pasangan Nasabah</small>
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="text-align: center; width: 5%;"
                                                                            class="py-1">No</th>
                                                                        <th style="text-align: center" class="py-1">Nama
                                                                            Bank</th>
                                                                        <th style="text-align: center" class="py-1">
                                                                            Plafond
                                                                        </th>
                                                                        <th style="text-align: center" class="py-1">
                                                                            Outstanding</th>
                                                                        <th style="text-align: center" class="py-1">
                                                                            Tenor
                                                                        </th>
                                                                        <th style="text-align: center" class="py-1">
                                                                            Margin
                                                                        </th>
                                                                        <th style="text-align: center" class="py-1">
                                                                            Angsuran
                                                                        </th>
                                                                        <th style="text-align: center" class="py-1">
                                                                            Agunan
                                                                        </th>
                                                                        <th style="text-align: center" class="py-1">Kol
                                                                            Tertinggi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $__currentLoopData = $ideppasangans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ideppasangan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        
                                                                        <tr>
                                                                            <td style="text-align: center">
                                                                                <?php echo e($loop->iteration); ?></td>
                                                                            <td><?php echo e($ideppasangan->nama_bank); ?></td>
                                                                            <td>Rp.
                                                                                <?php echo e(number_format($ideppasangan->plafond)); ?>

                                                                            </td>
                                                                            <td>Rp.
                                                                                <?php echo e(number_format($ideppasangan->outstanding)); ?>

                                                                            </td>
                                                                            <td style="text-align: center">
                                                                                <?php echo e($ideppasangan->tenor); ?>

                                                                            </td>
                                                                            <td style="text-align: center">
                                                                                <?php echo e(number_format($ideppasangan->margin)); ?>%
                                                                            </td>
                                                                            <td>Rp.
                                                                                <?php echo e(number_format($ideppasangan->angsuran)); ?>

                                                                            </td>
                                                                            <td style="text-align: center">
                                                                                <?php echo e($ideppasangan->agunan); ?>

                                                                            </td>
                                                                            <td style="text-align: center">
                                                                                <?php echo e($ideppasangan->kol_tertinggi); ?></td>
                                                                        </tr>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="card-body invoice-padding pb-0">
                                                        <div class="row invoice-sales-total-wrapper">
                                                            <div class="col-md-8 order-md-1 order-2 mt-md-0 mt-3">
                                                                <p class="card-text mb-0">
                                                                </p>
                                                            </div>
                                                            <div class="col-md-4 d-flex order-md-2 order-1">
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="pe-1">Harga Beli</td>
                                                                            <td><span class="fw-bold">: Rp.
                                                                                    <?php echo e(number_format($pembiayaan->nominal_pembiayaan)); ?></span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Harga Jual</td>
                                                                            <td>: Rp. <?php echo e(number_format($harga_jual)); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Jangka Waktu</td>
                                                                            <td>: <?php echo e($tenor); ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Equivalen Rate</td>
                                                                            <td>: <?php echo e($pembiayaan->rate); ?> %</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1">Angsuran</td>
                                                                            <td>: Rp. <?php echo e(number_format($angsuran1)); ?>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-1 mt-1">DSR</td>
                                                                            <td><span class="fw-bold">:
                                                                                    <?php echo e($nilai_dsr1); ?>

                                                                                    %</span></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Invoice Description ends -->

                                                    <hr class="invoice-spacing" />

                                                    <div class="card-body invoice-padding pb-0">
                                                        <!-- Header starts -->
                                                        <div
                                                            class="d-flex justify-content-center flex-md-row flex-column invoice-spacing mt-0">
                                                            <div>
                                                                <h4>Summary Kabag</h4>
                                                                <hr>
                                                                <div class="table-responsive mt-1">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="text-align: center">No</th>
                                                                                <th style="text-align: center">
                                                                                    Parameter
                                                                                </th>
                                                                                <th style="text-align: center">Kategori
                                                                                </th>
                                                                                <th style="text-align: center">Bobot
                                                                                </th>
                                                                                <th style="text-align: center">Rating
                                                                                </th>
                                                                                <th style="text-align: center">Nilai
                                                                                </th>
                                                                                <th style="text-align: center">Detail
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="text-align: center">1</td>
                                                                                <td>Konfirmasi Bendahara</td>
                                                                                <td></td>
                                                                                <td style="text-align: center">
                                                                                    <?php echo e($bendahara->bobot * 100); ?>%
                                                                                </td>
                                                                                <td style="text-align: center">
                                                                                    <?php echo e($rating_bendahara); ?></td>
                                                                                <td style="text-align: center">
                                                                                    <?php echo e($nilai_bendahara); ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="text-align: center">2</td>
                                                                                <td>DSR</td>
                                                                                <td><?php echo e($dsr->score_terendah); ?>% -
                                                                                    <?php echo e($dsr->score_tertinggi); ?>%</td>
                                                                                <td style="text-align: center">
                                                                                    <?php echo e($dsr->bobot * 100); ?>%</td>
                                                                                <td style="text-align: center">
                                                                                    <?php echo e($rating_dsr); ?></td>
                                                                                <td style="text-align: center">
                                                                                    <?php echo e($nilai_dsr); ?></td>
                                                                                <td style="text-align: center">
                                                                                    <button type="button"
                                                                                        class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#dsr">
                                                                                        <i data-feather="eye"></i>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                            <?php if($ideps->count() > 0): ?>
                                                                                <tr>
                                                                                    <td style="text-align: center">3
                                                                                    </td>
                                                                                    <td>Slik</td>
                                                                                    <td>Kol Tertinggi
                                                                                        <?php echo e($slik->kol); ?>

                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <?php echo e($slik->bobot * 100); ?>%
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <?php echo e($rating_slik); ?></td>
                                                                                    <td style="text-align: center">
                                                                                        <?php echo e($nilai_slik); ?></td>
                                                                                    <td style="text-align: center">
                                                                                        <button type="button"
                                                                                            class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#slik">
                                                                                            <i data-feather="eye"></i>
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php else: ?>
                                                                                <?php
                                                                                    $bobot_ta_slik = 0.2;
                                                                                    $rating_ta_slik = 4;
                                                                                    $nilai_slik = $bobot_ta_slik * $rating_ta_slik;
                                                                                ?>
                                                                                <tr>
                                                                                    <td style="text-align: center">3
                                                                                    </td>
                                                                                    <td>Slik</td>
                                                                                    <td>Tidak Ada Slik
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <?php echo e($bobot_ta_slik * 100); ?>%
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        <?php echo e($rating_ta_slik); ?></td>
                                                                                    <td style="text-align: center">
                                                                                        <?php echo e($nilai_slik); ?></td>
                                                                                    <td style="text-align: center">
                                                                                        <button type="button"
                                                                                            class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#slik">
                                                                                            <i data-feather="eye"></i>
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php endif; ?>
                                                                            <tr>
                                                                                <td style="text-align: center">4</td>
                                                                                <td>Jaminan</td>
                                                                                <td><?php echo e($jaminan->nama_jaminan); ?>

                                                                                </td>
                                                                                <td style="text-align: center">
                                                                                    <?php echo e($jaminan->bobot * 100); ?>%
                                                                                </td>
                                                                                <td style="text-align: center">
                                                                                    <?php echo e($rating_jaminan); ?></td>
                                                                                <td style="text-align: center">
                                                                                    <?php echo e($nilai_jaminan); ?></td>
                                                                                <td style="text-align: center">
                                                                                    <button type="button"
                                                                                        class="btn btn-icon btn-icon rounded-circle btn-flat-success"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#ijazah">
                                                                                        <i data-feather="eye"></i>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="text-align: center">5</td>
                                                                                <td>Jenis Nasabah</td>
                                                                                <td><?php echo e($jenis_nasabah); ?></td>
                                                                                <td style="text-align: center">
                                                                                    <?php echo e(0.1 * 100); ?>%</td>
                                                                                <td style="text-align: center">
                                                                                    <?php echo e($rating_nasabah); ?></td>
                                                                                <td style="text-align: center">
                                                                                    <?php echo e($nilai_nasabah); ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td style="text-align: center">6</td>
                                                                                <td>Instansi</td>
                                                                                <td><?php echo e($instansi->nama_instansi); ?>

                                                                                </td>
                                                                                <td style="text-align: center">
                                                                                    <?php echo e($instansi->bobot * 100); ?>%
                                                                                </td>
                                                                                <td style="text-align: center">
                                                                                    <?php echo e($rating_instansi); ?></td>
                                                                                <td style="text-align: center">
                                                                                    <?php echo e($nilai_instansi); ?></td>

                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <?php if($deviasi): ?>
                                                                    <div class="card-body invoice-padding pt-0">
                                                                        <div class="mb-0 mt-1 col-md-4">
                                                                            <button type="button" class="btn btn-primary"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#dokumendeviasi">Dokumen
                                                                                Deviasi
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php
                                                                    $total_score = $nilai_bendahara + $nilai_dsr + $nilai_slik + $nilai_jaminan + $nilai_nasabah + $nilai_instansi;
                                                                ?>
                                                                <div class="card-body invoice-padding pt-0">
                                                                    <div class="row invoice-spacing">
                                                                        <div class="col-xl-7 p-0">
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="pe-1">Total Nilai
                                                                                        </td>
                                                                                        <td>: <?php echo e($total_score); ?></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1">Status</td>
                                                                                        <td>:

                                                                                            <?php if($nilai_dsr >= 40 || $nilai_dsr < 0): ?>
                                                                                                <?php if($nilai_dsr >= 40 && $total_score > 3): ?>
                                                                                                    <span
                                                                                                        class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                                    <small
                                                                                                        class="text-danger">*DSR
                                                                                                        > 80%</small>
                                                                                                <?php elseif($nilai_dsr < 0 && $total_score > 3): ?>
                                                                                                    <span
                                                                                                        class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                                    <small
                                                                                                        class="text-danger">*Pengeluaran
                                                                                                        >
                                                                                                        Pendapatan</small>
                                                                                                <?php elseif($total_score > 2 || $total_score < 3): ?>
                                                                                                    <span
                                                                                                        class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                        Ulang</span>
                                                                                                <?php else: ?>
                                                                                                    <span
                                                                                                        class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                                                <?php endif; ?>
                                                                                            <?php else: ?>
                                                                                                <?php if($total_score > 3): ?>
                                                                                                    <span
                                                                                                        class="badge rounded-pill badge-glow bg-success">Diterima</span>
                                                                                                <?php elseif($total_score > 2 || $total_score > 3): ?>
                                                                                                    <span
                                                                                                        class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                        Ulang</span>
                                                                                                <?php else: ?>
                                                                                                    <span
                                                                                                        class="badge rounded-pill badge-glow bg-danger">Ditolak</span>
                                                                                                <?php endif; ?>
                                                                                            <?php endif; ?>

                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="col-xl-5 p-0 mt-xl-0 mt-2">
                                                                            <p class="mb-1 fw-bold">Note :</p>
                                                                            <table>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="pe-1 mb-2">Nilai < 2
                                                                                                </td>
                                                                                        <td>: <span class="fw-bold"><span
                                                                                                    class="badge rounded-pill badge-glow bg-danger">Ditolak</span></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1 mb-2"><br>Nilai > 2
                                                                                            - 3
                                                                                        </td>
                                                                                        <td><br>: <span
                                                                                                class="fw-bold"><span
                                                                                                    class="badge rounded-pill badge-glow bg-warning">Tinjau
                                                                                                    Ulang</span></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="pe-1 mb-2"><br>Nilai > 3
                                                                                        </td>
                                                                                        <td><br>: <span
                                                                                                class="fw-bold"><span
                                                                                                    class="badge rounded-pill badge-glow bg-success">Diterima</span></span>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Invoice Note ends -->
                                                            </div>
                                                        </div>
                                                        <!-- Header ends -->
                                                    </div>

                                                    <hr class="invoice-spacing" />
                                                    <!-- Invoice Note starts -->
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
                                                                            Disetujui
                                                                        </button>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <button class="btn btn-warning w-100"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#edit_proposal">
                                                                            Edit Proposal
                                                                        </button>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Invoice Note ends -->
                                                    <!-- add new card modal  -->
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
                                                                        action="/kabag/skpd/komite">
                                                                        <?php echo csrf_field(); ?>

                                                                        <div class="col-md-12">
                                                                            <label class="form-label"
                                                                                for="catatan">Catatan</label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                        </div>
                                                                        <input type="hidden" name="skpd_pembiayaan_id"
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
                                                    <!--/ add new card modal  -->

                                                    <!-- add new card modal  -->
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

                                                                    <!-- form -->
                                                                    <form id="addNewCardValidation"
                                                                        class="row gy-1 gx-2 mt-75" method="POST"
                                                                        action="/kabag/skpd/komite">
                                                                        <?php echo csrf_field(); ?>

                                                                        <div class="col-md-12">
                                                                            <label class="form-label"
                                                                                for="catatan">Catatan</label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                        </div>
                                                                        <input type="hidden" name="skpd_pembiayaan_id"
                                                                            value="<?php echo e($pembiayaan->id); ?>">
                                                                        <input type="hidden" name="status_id" value=7>
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
                                                    <!--/ add new card modal  -->

                                                    <?php if($deviasi && $deviasi->first()): ?>
                                                        <div class="modal fade" id="dokumendeviasi" tabindex="-1"
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
                                                                            <iframe
                                                                                src="<?php echo e(asset('storage/' . $deviasi->first()->dokumen_deviasi)); ?>"
                                                                                class="d-block w-100" height="500"
                                                                                weight='900'></iframe>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <!-- /proposal -->
                                        </div>
                                        <div class="tab-pane" id="identitas-pribadi" role="tabpanel"
                                            aria-labelledby="profile-tab-justified">
                                            <?php $__currentLoopData = $fotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <!-- post 1 -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                                            <div>
                                                                <h6 class="mb-0"><?php echo e($foto->kategori); ?></h6>
                                                                <small class="text-muted">Diupload Pada :
                                                                    <?php echo e($foto->created_at->diffForhumans()); ?></small>
                                                            </div>
                                                        </div>
                                                        <!-- post img -->
                                                        <iframe src="<?php echo e(asset('storage/' . optional($foto)->foto)); ?>"
                                                            class="d-block w-100" height='500' weight='800'></iframe>
                                                        
                                                        <!--/ post img -->
                                                    </div>
                                                </div>
                                                <!--/ post 1 -->
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div class="tab-pane" id="legalitas-agunan" role="tabpanel"
                                            aria-labelledby="messages-tab-justified">
                                            <?php $__currentLoopData = $jaminans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jaminan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <!-- post 1 -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                                            <div>
                                                                <h6 class="mb-0">
                                                                    <?php echo e($jaminan->jenis_jaminan->nama_jaminan); ?>

                                                                </h6>
                                                                <small class="text-muted">Diupload Pada :
                                                                    <?php echo e($jaminan->created_at->diffForhumans()); ?></small>
                                                            </div>
                                                        </div>
                                                        <!-- post img -->
                                                        <img class="img-fluid rounded mb-75"
                                                            src="<?php echo e(asset('storage/' . optional($jaminan)->dokumen_jaminan)); ?>"
                                                            alt="avatar img" />
                                                            <iframe src="<?php echo e(asset('storage/' . optional($jaminan)->dokumen_jaminan)); ?>"
                                                            class="d-block w-100" height='500' weight='800'></iframe>
                                                        <!--/ post img -->
                                                    </div>
                                                </div>
                                                <!--/ post 1 -->
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $jaminanlainnyas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jaminanlainnya): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <!-- post 1 -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                                            <div>
                                                                <h6 class="mb-0">
                                                                    <?php echo e($jaminanlainnya->nama_jaminan_lainnya); ?>

                                                                </h6>
                                                                <small class="text-muted">Diupload Pada :
                                                                    <?php echo e($jaminanlainnya->created_at->diffForhumans()); ?></small>
                                                            </div>
                                                        </div>
                                                        <!-- post img -->
                                                        <img class="img-fluid rounded mb-75"
                                                            src="<?php echo e(asset('storage/' . optional($jaminanlainnya)->dokumen_jaminan_lainnya)); ?>"
                                                            alt="avatar img" />
                                                        <!--/ post img -->
                                                    </div>
                                                </div>
                                                <!--/ post 1 -->
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div class="tab-pane" id="legalitas-pekerjaan" role="tabpanel"
                                            aria-labelledby="legalitas-pekerjaan-tab-justified">
                                            <?php $__currentLoopData = $skpengangkatans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skpengangkatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <!-- post 1 -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                                            <div>
                                                                <h6 class="mb-0">
                                                                    SK Pengangkatan
                                                                </h6>
                                                                <small class="text-muted">Diupload Pada :
                                                                    <?php echo e($skpengangkatan->created_at->diffForhumans()); ?></small>
                                                            </div>
                                                        </div>
                                                        <!-- post img -->
                                                        <img class="img-fluid rounded mb-75"
                                                            src="<?php echo e(asset('storage/' . optional($skpengangkatan)->sk_pengangkatan)); ?>"
                                                            alt="avatar img" />
                                                        <!--/ post img -->
                                                    </div>
                                                </div>
                                                <!--/ post 1 -->
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div class="tab-pane" id="keuangan" role="tabpanel"
                                            aria-labelledby="keuangan-tab-justified">
                                            <embed type="application/pdf"
                                                src="<?php echo e(asset('storage/' . optional($pembiayaan)->dokumen_keuangan)); ?>"
                                                width="1000" height="900">
                                            <embed type="application/pdf"
                                                src="<?php echo e(asset('storage/' . optional($pembiayaan)->dokumen_slip_gaji)); ?>"
                                                width="1000" height="900">
                                                <?php if(isset($bon_murabahah)): ?>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                                            <div>
                                                                <h6 class="mb-0">
                                                                    <?php echo e($bon_murabahah->kategori); ?>

                                                                </h6>
                                                                <small class="text-muted">Diupload Pada :
                                                                    <?php echo e($bon_murabahah->created_at->diffForhumans()); ?></small>
                                                            </div>
                                                        </div>
                                                        <!-- post img -->
                                                        <img class="img-fluid rounded mb-75"
                                                            src="<?php echo e(asset('storage/' . optional($bon_murabahah)->foto)); ?>"
                                                            alt="avatar img" />
                                                        <!--/ post img -->
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                        </div>
                                        <div class="tab-pane" id="ideb" role="tabpanel"
                                            aria-labelledby="ideb-tab-justified">
                                            <iframe src="<?php echo e(asset('storage/' . optional($ideb)->foto)); ?>" frameborder="0"
                                                width="1000" height="900"></iframe>
                                            
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
                                                                    } elseif ($arr == $banyak_history) {
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
                                                                                value="<?php echo e(optional($timeline->statushistory)->id); ?>, <?php echo e(optional($timeline->jabatan)->jabatan_id); ?>">
                                                                                <?php echo e(optional($timeline->statushistory)->keterangan ?? '-'); ?>

                                                                                <?php echo e(optional($timeline->jabatan)->keterangan ?? '-'); ?>

                                                                            </h6>
                                                                            <span
                                                                                class="timeline-event-time"><?php echo e($timeline->created_at->isoformat('dddd, D MMMM Y')); ?></span>
                                                                        </div>
                                                                        <?php if($timeline->catatan): ?>
                                                                            <p value="<?php echo e($timeline->id); ?>"> <br>Catatan :
                                                                                <?php echo e($timeline->catatan); ?>

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
                                                            <hr class="invoice-spacing" />
                                                            <p class="fw-bold"> Total SLA = <?php echo e($totalwaktu); ?></p>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Justified Tabs ends -->
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Idir -->
                <div class="modal fade" id="dsr" tabindex="-1" aria-labelledby="addNewCardTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                <h3 class="text-center">Nilai DSR </h3>
                                <hr class="invoice-spacing" />
                                <div class="card-body">
                                    <div class="col-md-12 d-flex order-md-2 order-1">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="pe-1">Harga Beli</td>
                                                    <td><span class="fw-bold">: Rp.
                                                            <?php echo e(number_format($pembiayaan->nominal_pembiayaan)); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Harga Jual</td>
                                                    <td>: Rp. <?php echo e(number_format($harga_jual)); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Jangka Waktu</td>
                                                    <td>: <?php echo e($tenor); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Equivalen Rate</td>
                                                    <td>: <?php echo e($pembiayaan->rate); ?> %</td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1">Sisa Pendapatan Bersih</td>
                                                    <td>: Rp. <?php echo e(number_format($pendapatan_bersih)); ?> </td>
                                                </tr>

                                                <tr>
                                                    <td class="pe-1">Angsuran</td>
                                                    <td>: Rp. <?php echo e(number_format($angsuran1)); ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-1 mt-1">DSR</td>
                                                    <td><span class="fw-bold">:
                                                            <?php echo e($nilai_dsr1); ?>

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

                <!-- LampiranJaminan  -->
                <div class="modal fade" id="ijazah" tabindex="-1" aria-labelledby="addNewCardTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-sm-12 mx-50 pb-5">
                                <h3 class="text-center">Lampiran Jaminan</h3>
                                <div class="card-body">
                                    <iframe src="<?php echo e(asset('storage/' . optional($jaminan)->dokumen_jaminan)); ?>"
                                        class="d-block w-100" height='500' weight='800'></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ LampiranJaminan  -->

                <!-- ideb  -->
                <div class="modal fade" id="slik" tabindex="-1" aria-labelledby="addNewCardTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-sm-12 mx-50 pb-5">
                                <h3 class="text-center">Lampiran IDEB</h3>
                                <div class="card-body">
                                    <iframe src="<?php echo e(asset('storage/' . optional($ideb)->foto)); ?>" class="d-block w-100"
                                        height='500' weight='800'></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ ideb  -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('kabag::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Kabag/Resources/views/skpd/komite/lihat.blade.php ENDPATH**/ ?>